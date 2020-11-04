<?php 
session_start();
setcookie('userEmail', $email, time() - 3600);
setcookie('userPassword', $mypassword, time() - 3600);
             
session_destroy();
header("Location:index.php");
?>
