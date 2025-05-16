<?php
require_once "connect.php";
class CurrencyModel {
    public static function fetchData() {
        global $conn;       
        $sql = "SELECT cur_codeName FROM currency_table WHERE cur_deleted = 0";
        $result = $conn->query($sql);   
        if ($result && $result->num_rows > 0) {
            $codeNames = array();
            while ($row = $result->fetch_assoc()) {
                $codeNames[] = $row['cur_codeName'];               
            }
            $conn->close();
            return $codeNames;
        } else {
            $conn->close();
            return array('error' => 'No results found');
        }
    }        
}
?>
