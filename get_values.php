<?php
// get_values.php

// Database connection
require 'connection.php';

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];

    try {
        // Prepare SQL query to fetch the latest values for each memberType_id on the selected date
        $sql = "SELECT fa.memberType_id, fa.amount
                FROM family_allowances fa
                INNER JOIN (
                    SELECT memberType_id, MAX(changeDate) AS max_changeDate
                    FROM family_allowances
                    WHERE DATE(changeDate) = :selectedDate
                    GROUP BY memberType_id
                ) max_dates ON fa.memberType_id = max_dates.memberType_id AND fa.changeDate = max_dates.max_changeDate";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selectedDate', $selectedDate);
        $stmt->execute();

        $result = array();

        // Fetch values and store them in an array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['memberType_id']] = $row['amount'];
        }

        // Return JSON response
        echo json_encode($result);
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>
