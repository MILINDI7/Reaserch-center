<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contactus";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error){

    die("unable to connect to the server". $conn->connect_error);
}
else{
    echo"success";
}

$name = $_POST("name");
$phone = $_POST("phone");
$email = $_POST("email");
$message = $_POST("message");

$sql = "INSERT INTO contactinfo (fullname, phone, email, `message`) VALUES ($name, $phone, $email, $message);";

if ($conn->query($sql)) {
    echo "info submitted successfully";
}
else {
    echo "Error occurred".$sql.$conn->error;

    $conn->close();
}

