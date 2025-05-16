<?php
// save_data.php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $xmlData = file_get_contents("php://input");

    // Validate XML data (optional)
    // You can perform validation here if needed

    // Parse XML data
    $xml = simplexml_load_string($xmlData);

    // Perform database insertion
    require 'connection.php'; // Include your database connection script

    try {
        // Prepare a SQL statement to insert data into the database
        $stmt = $pdo->prepare("INSERT INTO family_member (member_name, member_age, f_secured, memberType_id, emp_id, gender_id) VALUES (:name, :age, :secured, :memberType, :emp, :gender)");

        // Bind parameters and execute the statement for each row of data
        foreach ($xml->row as $row) {
            $stmt->bindParam(':name', $row->name);
            $stmt->bindParam(':age', $row->age);
            $stmt->bindParam(':secured', $row->secured, PDO::PARAM_INT);
            $stmt->bindParam(':memberType', $row->memberType);
            $stmt->bindParam(':emp',$row->code);
            $stmt->bindParam(':gender', $row->gender);
            $stmt->execute();
        }

        echo "Data inserted successfully.";
    } catch (PDOException $e) {
        // Handle database errors
        echo "PDO Error: " . $e->getMessage();
    }
} else {
    // If the request method is not POST, return an error message
    echo "Invalid request method.";
}
?>
