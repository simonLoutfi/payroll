<?php
require 'connection.php';

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];			
    try {
        $sql = "SELECT motherhood_basis AS basis, motherhood_company AS company, motherhood_staff AS staff
                FROM motherhood
                INNER JOIN (
                    SELECT MAX(changeDate) AS max_changeDate
                    FROM motherhood
                    WHERE DATE(changeDate) = DATE(:selectedDate)
                ) max_date ON changeDate = max_date.max_changeDate";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selectedDate', $selectedDate);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>
