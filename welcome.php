<!-- 

    Befor starting this page make sure Your database connectivity is one
    And This files will be under htdocs folder.
    *** If you port working on 3306 then ok If you working on another then define the port.
    *** Also define the localhost and password.
    *** 

    Thank you sor much , ****  This created by Abu Bakkar Siddik.  ****
-->


<?php 
// Session start and can switch to login form
 
session_start();
if(!isset($_SESSION["user"])){
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>


<!--  This is for welcome dashbord -->
<div class="container">

<h2>Welcome to user dashbord. </h2>
<a href="logout.php" class="btn btn-warning">Logout</a>

</div>
    
</body>
</html>