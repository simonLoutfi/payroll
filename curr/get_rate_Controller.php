<?php
require_once "./get_rate_model.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_GET['curID'])){
    $curID = $_GET['curID'];
    $data = CurrencyModel::fetchData($curID);
    echo json_encode($data);
}
?>

