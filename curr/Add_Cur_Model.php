<?php
require_once "connect.php";

class CurrencyModel {
    public static function insertCurrencyAndRate($id, $cur_name, $cur_codeName, $rate, $cur_reference, $rate_date) {
        global $conn;
        $query = "INSERT INTO currency_table (cur_id, cur_name, cur_codeName, cur_deleted) VALUES (?, ?, ?, 0)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iss", $id, $cur_name, $cur_codeName);
        $stmt->execute();
        
        $reference_id = null;
        
        if ($cur_codeName === $cur_reference) {
            $reference_id = $id;
        } else if (!empty($cur_reference)) {
            $reference_id = CurrencyModel::getCurrencyIdByName($cur_reference);
        }
    
        $query = "INSERT INTO rate (cur_id, rate, rate_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ids", $id, $rate, $rate_date);
        $stmt->execute();
    
      
        if ($reference_id !== null) {
            $query = "UPDATE currency_table SET cur_reference = ? WHERE cur_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $reference_id, $id);
            $stmt->execute();
        }
    }
    

    public static function getCurrencyIdByName($cur_name) {
        global $conn;
        $query = "SELECT cur_id FROM currency_table WHERE cur_codeName = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $cur_name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            return $row['cur_id'];
        } else {
            return null;
        }
    }
}
?>