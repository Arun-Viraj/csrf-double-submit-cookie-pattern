<!-- 
Name: Poobalan A.V
Student ID: IT18160130
-->

<?php

class token {
   
	public static function checkToken($token,$cookiecsrf){
			if($cookiecsrf == $token) {
				return true;
			}
	}
}
?>