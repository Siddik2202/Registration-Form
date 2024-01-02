<?php 
// Session start or destroy and switch to login page

session_start();
session_destroy();
header('Location:login.php');

?>





