<?php
include 'connection.php'; // Include the correct connection file

header('Content-Type: application/json'); // Set the header to indicate JSON response

if ($pdo) {
    $term = isset($_GET['term']) ? $_GET['term'] : '';

    $queryBankNames = "SELECT bank_name FROM bank WHERE bank_name LIKE :term";
    $stmtBankNames = $pdo->prepare($queryBankNames);
    $stmtBankNames->execute(['term' => "%{$term}%"]);

    $results = [];
    while ($row = $stmtBankNames->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $row['bank_name'];
    }

    echo json_encode($results);
} else {
    // Handle connection error
    echo json_encode(["error" => "Database connection error"]);
}
?>