<?php
require_once "connect.php";

class CurrencyModel {
    public static function fetchData($direction, $currentCurId) {
        global $conn;        
        $sql = "";
        $result = null;

        switch ($direction) {
            case 'first':
                $sql = "SELECT c.*, r.rate, r.rate_date, ref.cur_codeName AS ref_codeName
                        FROM currency_table c
                        LEFT JOIN rate r ON c.cur_id = r.cur_id
                        LEFT JOIN currency_table ref ON c.cur_reference = ref.cur_id
                        WHERE c.cur_deleted = 0
                        ORDER BY c.cur_id, r.rate_date DESC
                        LIMIT 1";
                $result = $conn->query($sql);
                break;

            case 'prev':
                for ($i = $currentCurId - 1; $i >= 1; $i--) {
                    $sql = "SELECT c.*, r.rate, r.rate_date, ref.cur_codeName AS ref_codeName
                            FROM currency_table c
                            LEFT JOIN rate r ON c.cur_id = r.cur_id
                            LEFT JOIN currency_table ref ON c.cur_reference = ref.cur_id
                            WHERE c.cur_id = ? AND c.cur_deleted = 0
                            ORDER BY r.rate_date DESC
                            LIMIT 1";
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("i", $i);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $stmt->close();
                            break;
                        }
                        $stmt->close();
                    }
                }
                break;

            case 'next':
                $sql_max_id = "SELECT MAX(cur_id) AS max_id FROM currency_table";
                $result_max_id = $conn->query($sql_max_id);
                $row_max_id = $result_max_id->fetch_assoc();
                $max_id = $row_max_id['max_id'];

                for ($i = $currentCurId + 1; $i <= $max_id; $i++) {
                    $sql = "SELECT c.*, r.rate, r.rate_date, ref.cur_codeName AS ref_codeName
                            FROM currency_table c
                            LEFT JOIN rate r ON c.cur_id = r.cur_id
                            LEFT JOIN currency_table ref ON c.cur_reference = ref.cur_id
                            WHERE c.cur_id = ? AND c.cur_deleted = 0
                            ORDER BY r.rate_date DESC
                            LIMIT 1";
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("i", $i);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $stmt->close();
                            break;
                        }
                        $stmt->close();
                    }
                }
                break;

            case 'last':
                $sql = "SELECT c.*, r.rate, r.rate_date, ref.cur_codeName AS ref_codeName
                        FROM currency_table c
                        LEFT JOIN rate r ON c.cur_id = r.cur_id
                        LEFT JOIN currency_table ref ON c.cur_reference = ref.cur_id
                        WHERE c.cur_deleted = 0
                        ORDER BY c.cur_id DESC, r.rate_date DESC
                        LIMIT 1";
                $result = $conn->query($sql);
                break;
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
