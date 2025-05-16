<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['periodId'])) {
    try {
        $period = $_POST['periodId'];
        
        $stmt = $pdo->prepare("UPDATE period SET f_closed = 1 WHERE period_id = :periodId");
        $stmt->bindParam(':periodId', $period);
        $stmt->execute();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Form data is missing or invalid.";
}
?>
