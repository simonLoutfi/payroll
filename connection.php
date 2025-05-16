<?php
$HOSTNAME = 'sql105.infinityfree.com';
$USERNAME = 'if0_38999241';
$PASSWORD = 'P4yr0II4408';
$DATABASE = 'if0_38999241_payroll';

try {
    // PDO connection
    $pdo = new PDO("mysql:host=$HOSTNAME;dbname=$DATABASE", $USERNAME, $PASSWORD);
    
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("PDO Connection failed: " . $e->getMessage());
}
?>
