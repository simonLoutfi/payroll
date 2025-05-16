<?php
require_once "fetchData.php";
require_once "connection.php";

    if (isset($_GET["region"])) {
        $region = $_GET['region'];
    }

    $data = CurrencyModel::fetchData($pdo, $region);
    echo json_encode($data);

?>