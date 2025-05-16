<?php
require 'connection.php';

try {
    $genders = array(); // Initialize an array to store gender data

    // Query the database to fetch gender data
    $sql = 'SELECT * FROM gender';
    $stmt = $pdo->query($sql);

    // Fetch gender data and store it in the array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $genders[] = array(
            'id' => $row['gender_id'],
            'name' => $row['gender_name']
        );
    }

    // Output the gender data as JSON
    echo json_encode($genders);
} catch(PDOException $e) {
    // Handle any PDO exceptions
    echo json_encode(array('error' => 'PDO Error: ' . $e->getMessage()));
}
?>
