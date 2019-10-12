<!-- 
Name: Poobalan A.V
Student ID: IT18160130
-->

<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
?>