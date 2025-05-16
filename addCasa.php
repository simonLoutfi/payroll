<?php
include 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mohafaza_name = $_POST['mohafaza'];
    $casa_name = $_POST['casa'];

    try {
        // Fetching mohafaza_id
        $mohafaza_id_query = "SELECT mohafaza_id FROM mohafaza WHERE mohafaza_name = :mohafaza_name";
        $mohafaza_id_stmt = $pdo->prepare($mohafaza_id_query);
        $mohafaza_id_stmt->bindParam(':mohafaza_name', $mohafaza_name);
        $mohafaza_id_stmt->execute();
        $row1 = $mohafaza_id_stmt->fetch(PDO::FETCH_ASSOC);
        $mohafaza_id = $row1['mohafaza_id'];

        // Inserting into casa table
        $sqlca = "INSERT INTO casa (casa_name, mohafaza_id) VALUES (:casa_name, :mohafaza_id)";
        $insert_stmt = $pdo->prepare($sqlca);
        $insert_stmt->bindParam(':casa_name', $casa_name);
        $insert_stmt->bindParam(':mohafaza_id', $mohafaza_id);
        
        if (!$insert_stmt->execute()) {
            echo "Error adding casa: " . $pdo->errorInfo()[2];
        } 
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>
