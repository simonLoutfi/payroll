<?php
require_once "connect.php";
class CurrencyModel {
    public static function fetchData($curID) {
        global $conn;
        $sql = "SELECT * FROM rate WHERE cur_id = ? ORDER BY rate_date DESC"  ;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $curID);
        $stmt->execute();
        $result = $stmt->get_result();    
        if ($result && $result->num_rows > 0) {
            $coderate = array();
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                $ID = $counter;
                $Rate = $row['rate'];
                $date = $row['rate_date'];
                $coderate[] = [
                    'ID' => $ID,
                    'Rate' => $Rate,
                    'Date' => $date
                ];
                $counter++;
            }
            $stmt->close();
            $conn->close();
            return array('data' => $coderate);
        } else {
            $stmt->close();
            $conn->close();
            return array('error' => 'No results found');
        }
    }   
}
?>
