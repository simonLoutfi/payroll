<?php
// famSubsInfo.php

// Database connection
require 'connection.php';

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
    try {
        $sql = "SELECT fas.famAllSubs_basis AS basis, fas.famAllSubs_perc AS perc
                FROM fam_allowance_subs fas
                INNER JOIN (
                    SELECT MAX(changeDate) AS max_changeDate
                    FROM fam_allowance_subs
                    WHERE DATE(changeDate) = DATE(:selectedDate)
                ) max_date ON fas.changeDate = max_date.max_changeDate";
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
