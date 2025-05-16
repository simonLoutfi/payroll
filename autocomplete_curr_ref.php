<?php
include 'connection.php'; // Include the correct connection file

header('Content-Type: application/json'); // Set the header to indicate JSON response

if ($pdo) {
    $term = isset($_GET['term']) ? $_GET['term'] : '';

    // Query to select currency references matching the search term
    $autocompleteCurRefQuery = "SELECT cur_reference FROM currency WHERE cur_reference LIKE :term";
    $stmtCurRef = $pdo->prepare($autocompleteCurRefQuery);
    $stmtCurRef->execute(['term' => "$term%"]);

    $data = [];

    // Fetch and store results
    while ($row = $stmtCurRef->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row['cur_reference'];
    }

    echo json_encode($data);
} else {
    // Handle connection error
    echo json_encode(["error" => "Database connection error"]);
}
?>
