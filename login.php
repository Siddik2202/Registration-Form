<?php 

// Session start
session_start();
if(isset($_SESSION["user"])){
header('Location:welcome.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
 
<div class="container">

    <?php 

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $passwords = $_POST['password'];
 

        require_once 'connection.php';
        $sql = "SELECT * FROM user WHERE Email='$email' ";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($user){
            // if(password_verify($passwords, $user["Password"])){
                //  If If email is exist then check whether password is match from existing password or not
            if($passwords == $user["Password"]){
                session_start();
                $_SESSION ['user']="yes";
                header('Location:welcome.php');
                die();

            }else{
                echo "<div class='alert alert-danger'>Password Does not match. </div>";
            }
        }else{
            echo "<div class='alert alert-danger'> Email Does not match. </div>";
        }
    }

    ?>


<!--  This is the login form -->

    <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="login" value="LogIn" >
        </div>
    </form>
    <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
</div>



    
</body>
</html>