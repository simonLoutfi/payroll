<?php
require_once "connect.php";

class CurrencyModel {
    public static function DeleteCurrencyAndRate($id, $userID) {
        global $conn;
    
        $sql = "SELECT * FROM currency_table WHERE cur_reference = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $sql = "SELECT * FROM running_account WHERE cur_id = ? AND Run_deleted = 0";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result2 = $stmt->get_result();
    
        if ($result->num_rows > 0 || $result2->num_rows > 0) {
            return "Currency is used";
        } else {
            $updateSql = "UPDATE currency_table SET cur_deleted = 1, cur_deleted_by_user = ? WHERE cur_id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param('is', $userID, $id);
            $updateStmt->execute();
            return "Currency deleted successfully.";
        }
    }
}


?>
