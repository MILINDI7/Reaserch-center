<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contactus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Check if user exists
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $user['email'];
    $_SESSION['is_admin'] = ($user['role'] === 'admin');

    if ($_SESSION['is_admin']) {
        header('Location: admin.html');
    } else {
        header('Location: index.html');
    }
    exit;
} else {
    echo "Invalid email or password!";
}

$conn->close();

