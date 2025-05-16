 <?php

// Database connection
//  require 'connection.php';

//  if (isset($_GET['date'])) {
//      $selectedDate = $_GET['date'];
//      try {
        //  $sql = "SELECT fas.famAllSubs_basis AS basis, fas.famAllSubs_perc AS perc
        //          FROM fam_allowance_subs fas
        //          INNER JOIN (
        //              SELECT MAX(changeDate) AS max_changeDate
        //              FROM fam_allowance_subs
        //              WHERE DATE(changeDate) = DATE(:selectedDate)
        //          ) max_date ON fas.changeDate = max_date.max_changeDate";


//         $sql = "SELECT tx.monthly AS month1 , tx.tax_earning_perc AS perc_month1 , tx.monthly_taxable_amount AS tx.month1_taxable_amount , tx.monthly_tax_amount AS month1_tax_amount , tx.yearly_taxable_amount AS yearly_taxable_amount , tx.yearly_tax_amount AS yearly_tax_amount , tx.cumulative_taxable_amount AS cumulative_month1
//                 FROM taxonearning tx
//                 INNER JOIN (
//                     SELECT MAX(changeDate) AS max_changeDate
//                         FROM taxonearning
//                         WHERE DATE(changeDate) = DATE(:selectedDate)
//                     ) max_date ON tx.changeDate = max_date.max_changeDate";


//          $stmt = $pdo->prepare($sql);
//          $stmt->bindParam(':selectedDate', $selectedDate);
//          $stmt->execute();
//          $result = $stmt->fetch(PDO::FETCH_ASSOC);
//          echo json_encode($result);
//      } catch (PDOException $e) {
//          echo "PDO Error: " . $e->getMessage();
//      }
//  }
?> 

<?php
// famSubsInfo.php

// Database connection
require 'connection.php';

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
    try {
        $sql = "SELECT `tax_earning_perc`, `monthly_taxable_amount`, `monthly_tax_amount` , `yearly_taxable_amount` , `yearly_tax_amount` , `cumulative_taxable_amount`   FROM `taxonearning` WHERE DATE(`changeDate`) = DATE(:selectedDate);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selectedDate', $selectedDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>

