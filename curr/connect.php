<?php
$servername = "localhost";
$username = "user_id";
$password = "user_password";
$database = "fyp";
$conn = new mysqli($servername, $username, $password, $database);                        
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>