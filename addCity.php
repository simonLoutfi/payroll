<?php
include 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $casa_name = $_POST['casa'];
    $city_name = $_POST['city'];

    try {
        // Fetching casa_id
        $casa_id_query = "SELECT casa_id FROM casa WHERE casa_name = :casa_name";
        $casa_id_stmt = $pdo->prepare($casa_id_query);
        $casa_id_stmt->bindParam(':casa_name', $casa_name);
        $casa_id_stmt->execute();
        $row2 = $casa_id_stmt->fetch(PDO::FETCH_ASSOC);
        $casa_id = $row2['casa_id'];

        // Inserting into city table
        $sqlci = "INSERT INTO city (city_name, casa_id) VALUES (:city_name, :casa_id)";
        $insert_stmt = $pdo->prepare($sqlci);
        $insert_stmt->bindParam(':city_name', $city_name);
        $insert_stmt->bindParam(':casa_id', $casa_id);
        
        if (!$insert_stmt->execute()) {
            echo "Error adding city: " . $pdo->errorInfo()[2];
        } 
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>
