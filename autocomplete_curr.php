<?php
include 'connection.php'; // Include the correct connection file

header('Content-Type: application/json'); // Set the header to indicate JSON response

if ($pdo) {
    $term = isset($_GET['term']) ? $_GET['term'] : '';

    // Query to select currency names matching the search term
    $autocompleteCurNameQuery = "SELECT cur_name FROM currency WHERE cur_name LIKE :term";
    $stmtCurName = $pdo->prepare($autocompleteCurNameQuery);
    $stmtCurName->execute(['term' => "$term%"]);

    $data = [];

    // Fetch and store results
    while ($row = $stmtCurName->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row['cur_name'];
    }

    echo json_encode($data);
} else {
    // Handle connection error
    echo json_encode(["error" => "Database connection error"]);
}
?>

