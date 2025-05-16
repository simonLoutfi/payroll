<?php
require_once "./get_currency_code_names_model.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}
$data = CurrencyModel::fetchData();
    echo json_encode($data);
?>


