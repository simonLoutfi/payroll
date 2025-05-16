<?php
require_once "connection.php";

class CurrencyModel {
    public static function fetchData($conn, $region) {
        
        $sql = "";
        $result = null;

        $sql = "SELECT city.city_name, casa.casa_name, mohafaza.mohafaza_name, country.country_name FROM country inner join mohafaza on country.country_id = mohafaza.country_id INNER JOIN casa on mohafaza.mohafaza_id = casa.mohafaza_id inner join city on casa.casa_id = city.casa_id inner join region on city.city_id = region.city_id WHERE region.region_id = :region";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(':region', $region);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if ($result ) {
            return $result;
        } else {
            $conn->close();
            // Handle case when no results are found
            return array('error' => 'No results found');
            
        }

        
    }
}
?>