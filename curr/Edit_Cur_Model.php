<?php
require_once "connect.php";

class CurrencyModel {
    public static function EditCurrencyAndRate($id, $cur_name, $cur_codeName, $rate, $cur_reference, $rate_date) {
        global $conn;
        $query = "UPDATE currency_table SET cur_name = ?, cur_codeName = ? WHERE cur_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $cur_name, $cur_codeName, $id);
        $stmt->execute();
        $query_existing_rates = "SELECT rate FROM rate WHERE cur_id = ? ORDER BY rate_date DESC";
        $stmt_existing_rates = $conn->prepare($query_existing_rates);
        $stmt_existing_rates->bind_param("i", $id);
        $stmt_existing_rates->execute();
        $result_existing_rates = $stmt_existing_rates->get_result();
        $insert_rate = true;
        while ($row = $result_existing_rates->fetch_assoc()) {
            if ($row['rate'] == $rate) {
                $insert_rate = false;
                break;
            }
        }
        if ($insert_rate) {
            $query_insert_rate = "INSERT INTO rate (cur_id, rate, rate_date) VALUES (?, ?, ?)";
            $stmt_insert_rate = $conn->prepare($query_insert_rate);
            $stmt_insert_rate->bind_param("ids", $id, $rate, $rate_date);
            $stmt_insert_rate->execute();
        }
        if (!empty($cur_reference)) {
            $reference_id = CurrencyModel::getCurrencyIdByName($cur_reference);
            if ($reference_id !== null) {
                $query = "UPDATE currency_table SET cur_reference = ? WHERE cur_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ii", $reference_id, $id);
                $stmt->execute();
            }
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
