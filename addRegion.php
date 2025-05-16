<?php
include 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $city_name = $_POST['city'];
    $region_name = $_POST['region'];

    try {
        // Fetching city_id
        $city_id_query = "SELECT city_id FROM city WHERE city_name = :city_name";
        $city_id_stmt = $pdo->prepare($city_id_query);
        $city_id_stmt->bindParam(':city_name', $city_name);
        $city_id_stmt->execute();
        $row3 = $city_id_stmt->fetch(PDO::FETCH_ASSOC);
        $city_id = $row3['city_id'];

        // Inserting into region table
        $sqlr = "INSERT INTO region (region_name, city_id) VALUES (:region_name, :city_id)";
        $insert_stmt = $pdo->prepare($sqlr);
        $insert_stmt->bindParam(':region_name', $region_name);
        $insert_stmt->bindParam(':city_id', $city_id);
        
        if (!$insert_stmt->execute()) {
            echo "Error adding region: " . $pdo->errorInfo()[2];
        } 
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>
