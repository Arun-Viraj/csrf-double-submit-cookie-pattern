<!-- 
Name: Poobalan A.V
Student ID: IT18160130
-->

<!DOCTYPE html>
<html>
	<head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CSRF-Synchronizer Token Pattern</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <link href="main.css" rel="stylesheet" id="bootstrap-css">
	<script>
	
	$(document).ready(function(){
	
	var cookie_value = "";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
	var csrf = decodedCookie.split(';')[2]
	// alert(decodedCookie)
	if(csrf.split('=')[0] = "csrfTokenCookie" ){
		// alert(csrf.split('csrfTokenCookie=')[1])
		cookie_value = csrf.split('csrfTokenCookie=')[1];
		document.getElementById("tokenIn_hidden_field").setAttribute('value', cookie_value) ;
	}
	});

    </script>

  <head>
	<body>
			<?php
				if(isset($_POST['username'],$_POST['password'])){
					$uname = $_POST['username'];
					$pwd = $_POST['password'];
					if($uname == 'arun' && $pwd == 'pass1'){
						echo '<h1 id="title"> Hello, '.$uname.'! </br> You have successfully logged in</h1>';
						session_start();
						$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
						$session_id = session_id();
						setcookie('sessionCookie',$session_id,time()+ 60*60*24*365 ,'/');
						setcookie('csrfTokenCookie',$_SESSION['token'],time()+ 60*60*24*365 ,'/');
						
					}else{
						echo '<h1>Invalid Credentials</h1>';
						exit();
					}
				}
			?>
        
        <div class="login-page">
            
          <div class="form">
              
            <form class="login-form" action="home.php" method="post">
                
              <label for="heading">You Can Say Something...</label>
              <input type="text" name="updatepost"/>
                
              <input type="hidden" name="token" value="" id="tokenIn_hidden_field">
                
              <button type="submit" name="update">Update</button>
                
              </form>
              <form action="logout.php">
                  <button type="submit" name="logout">Logout</button>
            </form>
          </div>
        </div>
        
    </body>
</html>