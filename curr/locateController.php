<?php
require_once "./locateModel.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_GET['findValue']) && isset($_GET['inputStateValue'])) {
    $findValue = $_GET['findValue'];
    $inputStateValue = $_GET['inputStateValue'];
    $data = CurrencyModel::fetchData($findValue, $inputStateValue);
    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'Missing parameters'));
}
?>
