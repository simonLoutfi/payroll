<?php
require_once "./Add_Cur_Model.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_GET['id'], $_GET['name'], $_GET['codeName'], $_GET['rate'], $_GET['ref_codeName'], $_GET['rate_date'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $codeName = $_GET['codeName'];
    $rate = $_GET['rate'];
    $ref_codeName = $_GET['ref_codeName'];
    $rate_date = $_GET['rate_date'];


    CurrencyModel::insertCurrencyAndRate($id, $name, $codeName, $rate, $ref_codeName, $rate_date);
}

?>
