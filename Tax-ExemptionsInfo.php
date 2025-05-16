<?php
// famSubsInfo.php

// Database connection
require 'connection.php';

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
    try {
        $sql = "SELECT `yearly`, `monthly`, `statuss` FROM `exemptions_tax` WHERE DATE(`changeDate`) = DATE(:selectedDate);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selectedDate', $selectedDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>
