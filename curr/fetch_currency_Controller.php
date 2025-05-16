<?php
require_once "./fetch_currency_Model.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_GET['direction']) && isset($_GET['currentCurId'])) {
    $direction = $_GET['direction'];
    $currentCurId = $_GET['currentCurId'];
    $data = CurrencyModel::fetchData($direction, $currentCurId);
    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'Missing parameters'));
}
?>
