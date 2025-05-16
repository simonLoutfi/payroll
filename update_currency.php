<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary data is provided
    if(isset($_POST['currencyId']) && isset($_POST['rate'])) {
        $cur_id = $_POST['currencyId'];
        $rate_value = $_POST['rate'];

        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO rate (cur_id, rate) VALUES (:cur_id, :rate)";
            $stmt = $pdo->prepare($sql);
            // Bind parameters
            $stmt->bindParam(':cur_id', $cur_id, PDO::PARAM_INT);
            $stmt->bindParam(':rate', $rate_value, PDO::PARAM_STR);
            // Execute the query
            if ($stmt->execute()) {
                echo "Data inserted successfully into the rate table.";
            } else {
                echo "Error: Failed to insert data into the rate table.";
            }
        } catch(PDOException $e) {
            echo "PDO Error: " . $e->getMessage();
        }
    } else {
        echo "Error: Required data is missing.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
