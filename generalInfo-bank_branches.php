<?php
include 'connection.php'; // Include the correct connection file

header('Content-Type: application/json'); // Set the header to indicate JSON response

if ($pdo) {
    $term = isset($_GET['term']) ? $_GET['term'] : '';

    $queryBranchLocations = "SELECT bankBranch_location FROM `bank branch` WHERE bankBranch_location LIKE :term";
    $stmtBranchLocations = $pdo->prepare($queryBranchLocations);
    $stmtBranchLocations->execute(['term' => "%{$term}%"]);

    $results = [];
    while ($row = $stmtBranchLocations->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $row['bankBranch_location'];
    }

    echo json_encode($results);
} else {
    // Handle connection error
    echo json_encode(["error" => "Database connection error"]);
}
?>
