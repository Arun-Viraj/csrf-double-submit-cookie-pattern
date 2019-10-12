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
	
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("token_to_be_added").setAttribute('value', this.responseText) ;
		}
	
	
	};
	
	xhttp.open("GET", "csrf_token_generator.php", true);
	xhttp.send();
	
	});
</script>
	</head>
	<body>
        <?php
                if(isset($_POST['username'],$_POST['password'])){
                    $uname = $_POST['username'];
                    $pwd = $_POST['password'];
                    if($uname == 'arun' && $pwd == 'pass1'){
                        echo '<h1 id="title"> Hello, '.$uname.'! <br/> You are successfully logged in</h1>';

                    }
                    else{
                        echo 'Invalid Credentials';
                        exit();
                    }
                }
            ?>
        
        <div class="login-page">
            
          <div class="form">
              
            <form class="login-form" action="home.php" method="post">
                
              <label for="heading">You Can Say Something...</label>
              <input type="text" name="updatepost"/>
                
              <input type="hidden" name="token" value="" id="token_to_be_added">
                
              <button type="submit" name="update">Update</button>
                
              </form>
              <form action="logout.php">
                  <button type="submit" name="logout">Logout</button>
            </form>
          </div>
        </div>
        
    </body>
</html>