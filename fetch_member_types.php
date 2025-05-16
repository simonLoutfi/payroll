<?php
require 'connection.php';
try {
    $memberTypes = array(); // Initialize an array to store member type data

    // Query the database to fetch member type data
    $sql = 'SELECT * FROM `member type`';
    $stmt = $pdo->query($sql);

    // Fetch member type data and store it in the array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $memberTypes[] = array(
            'memberType_id' => $row['memberType_id'],
            'memberType_desc' => $row['memberType_desc']
        );
    }

    // Output the member type data as JSON
    echo json_encode($memberTypes);
} catch(PDOException $e) {
    // Handle any PDO exceptions
    echo json_encode(array('error' => 'PDO Error: ' . $e->getMessage()));
}
?>
