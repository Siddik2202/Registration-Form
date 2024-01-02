<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>

    <!-- This is for bootstrap CDN link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- This is for css file -->
    <link rel="stylesheet" href="style.css">

</head>
<body>




<div class="container">

<?php

// This is for fetching the data from registration form

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    // $password_hash = password_hash($password, PASSWORD_DEFAULT);


//  This is for vallidation empty/email/password
    $errors = array();
    if(empty($name) OR empty($email) OR empty($phone) OR empty($password) OR empty($repeat_password)){
        array_push($errors, "All The fields are required. ");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid. ");
    }
    if(strlen($password) < 5){
        array_push($errors, "Password must be at least 8 characters long. ");
    }
    if($password !== $repeat_password){
        array_push($errors, "Passwords do not match. ");
    }



    // This is for checking whether email alrady exists or not
    require_once 'connection.php';
    $sql = "SELECT * FROM user WHERE Email='$email' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        array_push($errors, "Email is already taken. ");
    }

    // If there have nay error then show otherwise fetch the data in database 
    if(count($errors) > 0) {
        foreach($errors as $error){
            echo "<div class='alert alert-danger'> $error </div>";
        }
    }else{
        $sql = "INSERT INTO user (Full_Name, Email, Contact, Password) VALUES ( ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $preparstmt = mysqli_stmt_prepare($stmt,$sql);

        if($preparstmt){
            mysqli_stmt_bind_param($stmt, "ssss",$name, $email, $phone, $password);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'> User Created Successfully </div>";
        }else{
            die("Doing something wrong");
        }         
    }
}
?>

<!-- This is the registration form -->
    <form action="registration.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="contact" placeholder="Contact">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Register" >
        </div>
    </form>
    <div><p>Alrady Registered <a href="login.php">LogIn Here</a></p></div>

</div>
    
</body>
</html>