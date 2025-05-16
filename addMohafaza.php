<?php
include 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $country_name = $_POST['country'];
    $mohafaza_name = $_POST['mohafaza'];

    try {
        // Fetching country_id
        $country_id_query = "SELECT country_id FROM country WHERE country_name = :country_name";
        $country_id_stmt = $pdo->prepare($country_id_query);
        $country_id_stmt->bindParam(':country_name', $country_name);
        $country_id_stmt->execute();
        $row = $country_id_stmt->fetch(PDO::FETCH_ASSOC);
        $country_id = $row['country_id'];

        // Inserting into mohafaza table
        $sqlm = "INSERT INTO mohafaza (mohafaza_name, country_id) VALUES (:mohafaza_name, :country_id)";
        $insert_stmt = $pdo->prepare($sqlm);
        $insert_stmt->bindParam(':mohafaza_name', $mohafaza_name);
        $insert_stmt->bindParam(':country_id', $country_id);
        
        if (!$insert_stmt->execute()) {
            echo "Error adding mohafaza: " . $pdo->errorInfo()[2];
        } 
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>
