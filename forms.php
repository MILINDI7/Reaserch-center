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

$text = $_POST["text"];
$Number = $_POST["Number"];
$email = $_POST["email"];
$placeholder = $_POST["placeholder"];

// $sql = "INSERT INTO contactinfo (fullname, phone, email, `message`) VALUES ('$name', $phone, '$email', '$message')";

$stmt = $conn->prepare("INSERT INTO contactinfo (fullname, phone, email, `message`) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $text, $Number, $email, $placeholder);

// if ($conn->query($sql)) {
//     echo "info submitted successfully";
// }
// else {
//     echo "Error occurred".$sql.$conn->error;

if ($stmt->execute()) {
    echo "Info submitted successfully";
} else {
    echo "Error occurred: " . $stmt->error;
}
$stmt->close();

    $conn->close();
?>

