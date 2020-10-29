<?php 
session_start();
// unset($_SESSION["usename"]);
// session_unset();
session_destroy();
header("Location:index.php");
?>
