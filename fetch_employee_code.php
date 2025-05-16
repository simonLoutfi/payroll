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

// Get the employee name from the request
$empName = $_GET['Name'];

// Fetch the employee code from the database
$sql = "SELECT emp_id FROM employee WHERE concat_fname_lname = '$empName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['emp_id'];
} else {
    // For debugging purposes, let's output the received name
    echo "Employee not found for name: $empName";
    // Setting status code 200 to avoid the browser interpreting it as an error
    http_response_code(200); // Set HTTP status code to 200
}

$conn->close();
?>
