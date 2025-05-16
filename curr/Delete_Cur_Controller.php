<?php
require_once "./Delete_Cur_Model.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userID = $_SESSION['user_id'];
    $data = CurrencyModel::DeleteCurrencyAndRate($id, $userID);
    echo $data;
}


?>
