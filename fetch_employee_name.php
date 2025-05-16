<?php
// Connect to your database (replace these values with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the employee code from the request
$empCode = $_GET['Code'];

// Fetch the employee name from the database
$sql = "SELECT emp_name FROM employee WHERE emp_id = '$empCode'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['emp_name'];
} else {
    echo "Employee not found";
}

$conn->close();
?>
