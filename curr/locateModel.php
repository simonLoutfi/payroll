
<?php
require_once "connect.php";
class CurrencyModel {
    public static function fetchData($find, $inputState) {
        global $conn;
        switch($inputState){
            case 'code':
                $sql = "SELECT c.*, r.rate, r.rate_date, ref.cur_codeName AS ref_codeName
                FROM currency_table c
                LEFT JOIN rate r ON c.cur_id = r.cur_id
                LEFT JOIN currency_table ref ON c.cur_reference = ref.cur_id
                WHERE c.cur_codeName = ? AND c.cur_deleted = 0
                ORDER BY ABS(DATEDIFF(CURRENT_DATE(), r.rate_date))
                LIMIT 1";
                break;
            case 'name':
                $sql = "SELECT c.*, r.rate, r.rate_date, ref.cur_codeName AS ref_codeName
                FROM currency_table c
                LEFT JOIN rate r ON c.cur_id = r.cur_id
                LEFT JOIN currency_table ref ON c.cur_reference = ref.cur_id
                WHERE c.cur_name = ? AND c.cur_deleted = 0
                ORDER BY ABS(DATEDIFF(CURRENT_DATE(), r.rate_date))
                LIMIT 1";
                break;
        }
        $result = null;
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $find);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
        }
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();
            return $row;
        } else {
            $conn->close();
            return array('error' => 'No results found');
        }
    }
}
?>
