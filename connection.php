<?php

$servername = "localhost";
$username = "siddik";
$pass = "absiddik";
$database = "registration";
$port ='3307';
 

  $conn = new mysqli($servername,$username,$pass,$database, $port);
  if(!$conn){
    echo "Connection failed: ". $conn->connect_error;
  }
//   echo "Connected successfully by con"; 





  
// try{

//     $connection = new PDO("mysql:host=$servername; dbnname=$database; port= $port", $username, $password);
//     $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     // $connection -> setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
//     // echo "Connection established";

// }catch(PDOException $ex){
//     echo "Connection Failed: " . $ex->getMessage();
// }




// $con = mysqli_connect($servername,$username,$password,$database, $port); // echo "<pre>"; print_r($con);
// if (!$con) {
//     echo "Connection failed: " . mysqli_connect_error();
//   }
//   echo "Connected successfully by con"; 




?>