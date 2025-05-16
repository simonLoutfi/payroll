<?php

require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //for month 1
    $month1 = isset ($_POST['month1']) ? $_POST['month1'] : null;
    $percentageM1 = isset ($_POST['perc_month1']) ? $_POST['perc_month1'] : null;
    $taxableM1_amount = isset ($_POST['month1_taxable_amount']) ? $_POST['month1_taxable_amount'] : null;
    $taxM1_amount = isset ($_POST['month1_tax_amount']) ? $_POST['month1_tax_amount'] : null;
    $yearM1_taxable = isset ($_POST['yearlyM1_taxable_amount']) ? $_POST['yearlyM1_taxable_amount'] : null;
    $yearM1_tax = isset ($_POST['yearlyM1_tax_amount']) ? $_POST['yearlyM1_tax_amount'] : null;
    $cumulativeM1 = isset ($_POST['cumulative_month1']) ? $_POST['cumulative_month1'] : null;

    //for month 2
    $month2 = isset ($_POST['month2']) ? $_POST['month2'] : null;
    $percentageM2 = isset ($_POST['perc_month2']) ? $_POST['perc_month2'] : null;
    $taxableM2_amount = isset ($_POST['month2_taxable_amount']) ? $_POST['month2_taxable_amount'] : null;
    $taxM2_amount = isset ($_POST['month2_tax_amount']) ? $_POST['month2_tax_amount'] : null;
    $yearM2_taxable = isset ($_POST['yearlyM2_taxable_amount']) ? $_POST['yearlyM2_taxable_amount'] : null;
    $yearM2_tax = isset ($_POST['yearlyM2_tax_amount']) ? $_POST['yearlyM2_tax_amount'] : null;
    $cumulativeM2 = isset ($_POST['cumulative_month2']) ? $_POST['cumulative_month2'] : null;

    //for month 3
    $month3 = isset ($_POST['month3']) ? $_POST['month3'] : null;
    $percentageM3 = isset ($_POST['perc_month3']) ? $_POST['perc_month3'] : null;
    $taxableM3_amount = isset ($_POST['month3_taxable_amount']) ? $_POST['month3_taxable_amount'] : null;
    $taxM3_amount = isset ($_POST['month3_tax_amount']) ? $_POST['month3_tax_amount'] : null;
    $yearM3_taxable = isset ($_POST['yearlyM3_taxable_amount']) ? $_POST['yearlyM3_taxable_amount'] : null;
    $yearM3_tax = isset ($_POST['yearlyM3_tax_amount']) ? $_POST['yearlyM3_tax_amount'] : null;
    $cumulativeM3 = isset ($_POST['cumulative_month3']) ? $_POST['cumulative_month3'] : null;

    //for month 4
    $month4 = isset ($_POST['month4']) ? $_POST['month4'] : null;
    $percentageM4 = isset ($_POST['perc_month4']) ? $_POST['perc_month4'] : null;
    $taxableM4_amount = isset ($_POST['month4_taxable_amount']) ? $_POST['month4_taxable_amount'] : null;
    $taxM4_amount = isset ($_POST['month4_tax_amount']) ? $_POST['month4_tax_amount'] : null;
    $yearM4_taxable = isset ($_POST['yearlyM4_taxable_amount']) ? $_POST['yearlyM4_taxable_amount'] : null;
    $yearM4_tax = isset ($_POST['yearlyM4_tax_amount']) ? $_POST['yearlyM4_tax_amount'] : null;
    $cumulativeM4 = isset ($_POST['cumulative_month4']) ? $_POST['cumulative_month4'] : null;


    //for month 5
    $month5 = isset ($_POST['month5']) ? $_POST['month5'] : null;
    $percentageM5 = isset ($_POST['perc_month5']) ? $_POST['perc_month5'] : null;
    $taxableM5_amount = isset ($_POST['month5_taxable_amount']) ? $_POST['month5_taxable_amount'] : null;
    $taxM5_amount = isset ($_POST['month5_tax_amount']) ? $_POST['month5_tax_amount'] : null;
    $yearM5_taxable = isset ($_POST['yearlyM5_taxable_amount']) ? $_POST['yearlyM5_taxable_amount'] : null;
    $yearM5_tax = isset ($_POST['yearlyM5_tax_amount']) ? $_POST['yearlyM5_tax_amount'] : null;
    $cumulativeM5 = isset ($_POST['cumulative_month5']) ? $_POST['cumulative_month5'] : null;

    //for month 6
    $month6 = isset ($_POST['month6']) ? $_POST['month6'] : null;
    $percentageM6 = isset ($_POST['perc_month6']) ? $_POST['perc_month6'] : null;
    $taxableM6_amount = isset ($_POST['month6_taxable_amount']) ? $_POST['month6_taxable_amount'] : null;
    $taxM6_amount = isset ($_POST['month6_tax_amount']) ? $_POST['month6_tax_amount'] : null;
    $yearM6_taxable = isset ($_POST['yearlyM6_taxable_amount']) ? $_POST['yearlyM6_taxable_amount'] : null;
    $yearM6_tax = isset ($_POST['yearlyM6_tax_amount']) ? $_POST['yearlyM6_tax_amount'] : null;
    $cumulativeM6 = isset ($_POST['cumulative_month6']) ? $_POST['cumulative_month6'] : null;


    //for month 7
    $month7 = isset ($_POST['month7']) ? $_POST['month7'] : null;
    $percentageM7 = isset ($_POST['perc_month7']) ? $_POST['perc_month7'] : null;
    $taxableM7_amount = isset ($_POST['month7_taxable_amount']) ? $_POST['month7_taxable_amount'] : null;
    $taxM7_amount = isset ($_POST['month7_tax_amount']) ? $_POST['month7_tax_amount'] : null;
    $yearM7_taxable = isset ($_POST['yearlyM7_taxable_amount']) ? $_POST['yearlyM7_taxable_amount'] : null;
    $yearM7_tax = isset ($_POST['yearlyM7_tax_amount']) ? $_POST['yearlyM7_tax_amount'] : null;
    $cumulativeM7 = isset ($_POST['cumulative_month7']) ? $_POST['cumulative_month7'] : null;


    //for month 8
    $month8 = isset ($_POST['month8']) ? $_POST['month8'] : null;
    $percentageM8 = isset ($_POST['perc_month8']) ? $_POST['perc_month8'] : null;
    $taxableM8_amount = isset ($_POST['month8_taxable_amount']) ? $_POST['month8_taxable_amount'] : null;
    $taxM8_amount = isset ($_POST['month8_tax_amount']) ? $_POST['month8_tax_amount'] : null;
    $yearM8_taxable = isset ($_POST['yearlyM8_taxable_amount']) ? $_POST['yearlyM8_taxable_amount'] : null;
    $yearM8_tax = isset ($_POST['yearlyM8_tax_amount']) ? $_POST['yearlyM8_tax_amount'] : null;
    $cumulativeM8 = isset ($_POST['cumulative_month8']) ? $_POST['cumulative_month8'] : null;


    //for month 9
    $month9 = isset ($_POST['month9']) ? $_POST['month9'] : null;
    $percentageM9 = isset ($_POST['perc_month9']) ? $_POST['perc_month9'] : null;
    $taxableM9_amount = isset ($_POST['month9_taxable_amount']) ? $_POST['month9_taxable_amount'] : null;
    $taxM9_amount = isset ($_POST['month9_tax_amount']) ? $_POST['month9_tax_amount'] : null;
    $yearM9_taxable = isset ($_POST['yearlyM9_taxable_amount']) ? $_POST['yearlyM9_taxable_amount'] : null;
    $yearM9_tax = isset ($_POST['yearlyM9_tax_amount']) ? $_POST['yearlyM9_tax_amount'] : null;
    $cumulativeM9 = isset ($_POST['cumulative_month9']) ? $_POST['cumulative_month9'] : null;


    //for month 10
    $month10 = isset ($_POST['month10']) ? $_POST['month10'] : null;
    $percentageM10 = isset ($_POST['perc_month10']) ? $_POST['perc_month10'] : null;
    $taxableM10_amount = isset ($_POST['month10_taxable_amount']) ? $_POST['month10_taxable_amount'] : null;
    $taxM10_amount = isset ($_POST['month10_tax_amount']) ? $_POST['month10_tax_amount'] : null;
    $yearM10_taxable = isset ($_POST['yearlyM10_taxable_amount']) ? $_POST['yearlyM10_taxable_amount'] : null;
    $yearM10_tax = isset ($_POST['yearlyM10_tax_amount']) ? $_POST['yearlyM10_tax_amount'] : null;
    $cumulativeM10 = isset ($_POST['cumulative_month10']) ? $_POST['cumulative_month10'] : null;


    //for month 11
    $month11 = isset ($_POST['month11']) ? $_POST['month11'] : null;
    $percentageM11 = isset ($_POST['perc_month11']) ? $_POST['perc_month11'] : null;
    $taxableM11_amount = isset ($_POST['month11_taxable_amount']) ? $_POST['month11_taxable_amount'] : null;
    $taxM11_amount = isset ($_POST['month11_tax_amount']) ? $_POST['month11_tax_amount'] : null;
    $yearM11_taxable = isset ($_POST['yearlyM11_taxable_amount']) ? $_POST['yearlyM11_taxable_amount'] : null;
    $yearM11_tax = isset ($_POST['yearlyM11_tax_amount']) ? $_POST['yearlyM11_tax_amount'] : null;
    $cumulativeM11 = isset ($_POST['cumulative_month11']) ? $_POST['cumulative_month11'] : null;


    //for month 12
    $month12 = isset ($_POST['month12']) ? $_POST['month12'] : null;
    $percentageM12 = isset ($_POST['perc_month12']) ? $_POST['perc_month12'] : null;
    $taxableM12_amount = isset ($_POST['month12_taxable_amount']) ? $_POST['month12_taxable_amount'] : null;
    $taxM12_amount = isset ($_POST['month12_tax_amount']) ? $_POST['month12_tax_amount'] : null;
    $yearM12_taxable = isset ($_POST['yearlyM12_taxable_amount']) ? $_POST['yearlyM12_taxable_amount'] : null;
    $yearM12_tax = isset ($_POST['yearlyM12_tax_amount']) ? $_POST['yearlyM12_tax_amount'] : null;
    $cumulativeM12 = isset ($_POST['cumulative_month12']) ? $_POST['cumulative_month12'] : null;


    //for month 13
    $month13 = isset ($_POST['month13']) ? $_POST['month13'] : null;
    $percentageM13 = isset ($_POST['perc_month13']) ? $_POST['perc_month13'] : null;
    $taxableM13_amount = isset ($_POST['month13_taxable_amount']) ? $_POST['month13_taxable_amount'] : null;
    $taxM13_amount = isset ($_POST['month13_tax_amount']) ? $_POST['month13_tax_amount'] : null;
    $yearM13_taxable = isset ($_POST['yearlyM13_taxable_amount']) ? $_POST['yearlyM13_taxable_amount'] : null;
    $yearM13_tax = isset ($_POST['yearlyM13_tax_amount']) ? $_POST['yearlyM13_tax_amount'] : null;
    $cumulativeM13 = isset ($_POST['cumulative_month13']) ? $_POST['cumulative_month13'] : null;


    $sql_check = "SELECT COUNT(*) FROM taxonearning WHERE changeDate = CURDATE()";

    try {
        $stmt_check = $pdo->query($sql_check);
        $row_count = $stmt_check->fetchColumn();

        if ($row_count > 0) {
            // If there are existing values, perform an UPDATE
            $sql1 = "UPDATE taxonearning SET monthly = :month1 , tax_earning_perc = :percentageM1  , monthly_taxable_amount = :taxableM1_amount , monthly_tax_amount = :taxM1_amount , yearly_taxable_amount = :yearM1_taxable , yearly_tax_amount = :yearM1_tax , cumulative_taxable_amount = :cumulativeM1 WHERE changeDate = CURDATE() AND monthly = 1 ";
            $sql2 = "UPDATE taxonearning SET monthly = :month2 , tax_earning_perc = :percentageM2  , monthly_taxable_amount = :taxableM2_amount , monthly_tax_amount = :taxM2_amount , yearly_taxable_amount = :yearM2_taxable , yearly_tax_amount = :yearM2_tax , cumulative_taxable_amount = :cumulativeM2 WHERE changeDate = CURDATE() AND monthly = 2 ";
            $sql3 = "UPDATE taxonearning SET monthly = :month3 , tax_earning_perc = :percentageM3  , monthly_taxable_amount = :taxableM3_amount , monthly_tax_amount = :taxM3_amount , yearly_taxable_amount = :yearM3_taxable , yearly_tax_amount = :yearM3_tax , cumulative_taxable_amount = :cumulativeM3 WHERE changeDate = CURDATE() AND monthly = 3 ";
            $sql4 = "UPDATE taxonearning SET monthly = :month4 , tax_earning_perc = :percentageM4  , monthly_taxable_amount = :taxableM4_amount , monthly_tax_amount = :taxM4_amount , yearly_taxable_amount = :yearM4_taxable , yearly_tax_amount = :yearM4_tax , cumulative_taxable_amount = :cumulativeM4 WHERE changeDate = CURDATE() AND monthly = 4 ";
            $sql5 = "UPDATE taxonearning SET monthly = :month5 , tax_earning_perc = :percentageM5  , monthly_taxable_amount = :taxableM5_amount , monthly_tax_amount = :taxM5_amount , yearly_taxable_amount = :yearM5_taxable , yearly_tax_amount = :yearM5_tax , cumulative_taxable_amount = :cumulativeM5 WHERE changeDate = CURDATE() AND monthly = 5 ";
            $sql6 = "UPDATE taxonearning SET monthly = :month6 , tax_earning_perc = :percentageM6  , monthly_taxable_amount = :taxableM6_amount , monthly_tax_amount = :taxM6_amount , yearly_taxable_amount = :yearM6_taxable , yearly_tax_amount = :yearM6_tax , cumulative_taxable_amount = :cumulativeM6 WHERE changeDate = CURDATE() AND monthly = 6 ";
            $sql7 = "UPDATE taxonearning SET monthly = :month7 , tax_earning_perc = :percentageM7  , monthly_taxable_amount = :taxableM7_amount , monthly_tax_amount = :taxM7_amount , yearly_taxable_amount = :yearM7_taxable , yearly_tax_amount = :yearM7_tax , cumulative_taxable_amount = :cumulativeM7 WHERE changeDate = CURDATE() AND monthly = 7 ";
            $sql8 = "UPDATE taxonearning SET monthly = :month8 , tax_earning_perc = :percentageM8  , monthly_taxable_amount = :taxableM8_amount , monthly_tax_amount = :taxM8_amount , yearly_taxable_amount = :yearM8_taxable , yearly_tax_amount = :yearM8_tax , cumulative_taxable_amount = :cumulativeM8 WHERE changeDate = CURDATE() AND monthly = 8 ";
            $sql9 = "UPDATE taxonearning SET monthly = :month9 , tax_earning_perc = :percentageM9  , monthly_taxable_amount = :taxableM9_amount , monthly_tax_amount = :taxM9_amount , yearly_taxable_amount = :yearM9_taxable , yearly_tax_amount = :yearM9_tax , cumulative_taxable_amount = :cumulativeM9 WHERE changeDate = CURDATE() AND monthly = 9 ";
            $sql10 = "UPDATE taxonearning SET monthly = :month10 , tax_earning_perc = :percentageM10  , monthly_taxable_amount = :taxableM10_amount , monthly_tax_amount = :taxM10_amount , yearly_taxable_amount = :yearM10_taxable , yearly_tax_amount = :yearM10_tax , cumulative_taxable_amount = :cumulativeM10 WHERE changeDate = CURDATE() AND monthly = 10 ";
            $sql11 = "UPDATE taxonearning SET monthly = :month11 , tax_earning_perc = :percentageM11  , monthly_taxable_amount = :taxableM11_amount , monthly_tax_amount = :taxM11_amount , yearly_taxable_amount = :yearM11_taxable , yearly_tax_amount = :yearM11_tax , cumulative_taxable_amount = :cumulativeM11 WHERE changeDate = CURDATE() AND monthly = 11 ";
            $sql12 = "UPDATE taxonearning SET monthly = :month12 , tax_earning_perc = :percentageM12  , monthly_taxable_amount = :taxableM12_amount , monthly_tax_amount = :taxM12_amount , yearly_taxable_amount = :yearM12_taxable , yearly_tax_amount = :yearM12_tax , cumulative_taxable_amount = :cumulativeM12 WHERE changeDate = CURDATE() AND monthly = 12 ";
            $sql13 = "UPDATE taxonearning SET monthly = :month13 , tax_earning_perc = :percentageM13  , monthly_taxable_amount = :taxableM13_amount , monthly_tax_amount = :taxM13_amount , yearly_taxable_amount = :yearM13_taxable , yearly_tax_amount = :yearM13_tax , cumulative_taxable_amount = :cumulativeM13 WHERE changeDate = CURDATE() AND monthly = 13 ";


        } else {
            // If there are no existing values, perform an INSERT
            $sql1 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month1, :percentageM1, :taxableM1_amount, :taxM1_amount, :yearM1_taxable, :yearM1_tax, :cumulativeM1, CURDATE())";
            $sql2 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month2, :percentageM2, :taxableM2_amount, :taxM2_amount, :yearM2_taxable, :yearM2_tax, :cumulativeM2, CURDATE())";
            $sql3 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month3, :percentageM3, :taxableM3_amount, :taxM3_amount, :yearM3_taxable, :yearM3_tax, :cumulativeM3, CURDATE())";
            $sql4 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month4, :percentageM4, :taxableM4_amount, :taxM4_amount, :yearM4_taxable, :yearM4_tax, :cumulativeM4, CURDATE())";
            $sql5 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month5, :percentageM5, :taxableM5_amount, :taxM5_amount, :yearM5_taxable, :yearM5_tax, :cumulativeM5, CURDATE())";
            $sql6 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month6, :percentageM6, :taxableM6_amount, :taxM6_amount, :yearM6_taxable, :yearM6_tax, :cumulativeM6, CURDATE())";
            $sql7 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month7, :percentageM7, :taxableM7_amount, :taxM7_amount, :yearM7_taxable, :yearM7_tax, :cumulativeM7, CURDATE())";
            $sql8 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month8, :percentageM8, :taxableM8_amount, :taxM8_amount, :yearM8_taxable, :yearM8_tax, :cumulativeM8, CURDATE())";
            $sql9 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month9, :percentageM9, :taxableM9_amount, :taxM9_amount, :yearM9_taxable, :yearM9_tax, :cumulativeM9, CURDATE())";
            $sql10 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month10, :percentageM10, :taxableM10_amount, :taxM10_amount, :yearM10_taxable, :yearM10_tax, :cumulativeM10, CURDATE())";
            $sql11 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month11, :percentageM11, :taxableM11_amount, :taxM11_amount, :yearM11_taxable, :yearM11_tax, :cumulativeM11, CURDATE())";
            $sql12 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month12, :percentageM12, :taxableM12_amount, :taxM12_amount, :yearM12_taxable, :yearM12_tax, :cumulativeM12,CURDATE())";
            $sql13 = "INSERT INTO taxonearning (monthly, tax_earning_perc, monthly_taxable_amount, monthly_tax_amount, yearly_taxable_amount, yearly_tax_amount, cumulative_taxable_amount, changeDate) VALUES (:month13, :percentageM13, :taxableM13_amount, :taxM13_amount, :yearM13_taxable, :yearM13_tax, :cumulativeM13, CURDATE())";


        }
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':month1', $month1);
        $stmt1->bindParam(':percentageM1', $percentageM1);
        $stmt1->bindParam(':taxableM1_amount', $taxableM1_amount);
        $stmt1->bindParam(':taxM1_amount', $taxM1_amount);
        $stmt1->bindParam(':yearM1_taxable', $yearM1_taxable);
        $stmt1->bindParam(':yearM1_tax', $yearM1_tax);
        $stmt1->bindParam(':cumulativeM1', $cumulativeM1);
        $stmt1->execute();

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':month2', $month2);
        $stmt2->bindParam(':percentageM2', $percentageM2);
        $stmt2->bindParam(':taxableM2_amount', $taxableM2_amount);
        $stmt2->bindParam(':taxM2_amount', $taxM2_amount);
        $stmt2->bindParam(':yearM2_taxable', $yearM2_taxable);
        $stmt2->bindParam(':yearM2_tax', $yearM2_tax);
        $stmt2->bindParam(':cumulativeM2', $cumulativeM2);
        $stmt2->execute();

        $stmt3 = $pdo->prepare($sql3);
        $stmt3->bindParam(':month3', $month3);
        $stmt3->bindParam(':percentageM3', $percentageM3);
        $stmt3->bindParam(':taxableM3_amount', $taxableM3_amount);
        $stmt3->bindParam(':taxM3_amount', $taxM3_amount);
        $stmt3->bindParam(':yearM3_taxable', $yearM3_taxable);
        $stmt3->bindParam(':yearM3_tax', $yearM3_tax);
        $stmt3->bindParam(':cumulativeM3', $cumulativeM3);
        $stmt3->execute();

        $stmt4 = $pdo->prepare($sql4);
        $stmt4->bindParam(':month4', $month4);
        $stmt4->bindParam(':percentageM4', $percentageM4);
        $stmt4->bindParam(':taxableM4_amount', $taxableM4_amount);
        $stmt4->bindParam(':taxM4_amount', $taxM4_amount);
        $stmt4->bindParam(':yearM4_taxable', $yearM4_taxable);
        $stmt4->bindParam(':yearM4_tax', $yearM4_tax);
        $stmt4->bindParam(':cumulativeM4', $cumulativeM4);
        $stmt4->execute();

        $stmt5 = $pdo->prepare($sql5);
        $stmt5->bindParam(':month5', $month5);
        $stmt5->bindParam(':percentageM5', $percentageM5);
        $stmt5->bindParam(':taxableM5_amount', $taxableM5_amount);
        $stmt5->bindParam(':taxM5_amount', $taxM5_amount);
        $stmt5->bindParam(':yearM5_taxable', $yearM5_taxable);
        $stmt5->bindParam(':yearM5_tax', $yearM5_tax);
        $stmt5->bindParam(':cumulativeM5', $cumulativeM5);
        $stmt5->execute();

        $stmt6 = $pdo->prepare($sql6);
        $stmt6->bindParam(':month6', $month6);
        $stmt6->bindParam(':percentageM6', $percentageM6);
        $stmt6->bindParam(':taxableM6_amount', $taxableM6_amount);
        $stmt6->bindParam(':taxM6_amount', $taxM6_amount);
        $stmt6->bindParam(':yearM6_taxable', $yearM6_taxable);
        $stmt6->bindParam(':yearM6_tax', $yearM6_tax);
        $stmt6->bindParam(':cumulativeM6', $cumulativeM6);
        $stmt6->execute();

        $stmt7 = $pdo->prepare($sql7);
        $stmt7->bindParam(':month7', $month7);
        $stmt7->bindParam(':percentageM7', $percentageM7);
        $stmt7->bindParam(':taxableM7_amount', $taxableM7_amount);
        $stmt7->bindParam(':taxM7_amount', $taxM7_amount);
        $stmt7->bindParam(':yearM7_taxable', $yearM7_taxable);
        $stmt7->bindParam(':yearM7_tax', $yearM7_tax);
        $stmt7->bindParam(':cumulativeM7', $cumulativeM7);
        $stmt7->execute();

        $stmt8 = $pdo->prepare($sql8);
        $stmt8->bindParam(':month8', $month8);
        $stmt8->bindParam(':percentageM8', $percentageM8);
        $stmt8->bindParam(':taxableM8_amount', $taxableM8_amount);
        $stmt8->bindParam(':taxM8_amount', $taxM8_amount);
        $stmt8->bindParam(':yearM8_taxable', $yearM8_taxable);
        $stmt8->bindParam(':yearM8_tax', $yearM8_tax);
        $stmt8->bindParam(':cumulativeM8', $cumulativeM8);
        $stmt8->execute();

        $stmt9 = $pdo->prepare($sql9);
        $stmt9->bindParam(':month9', $month9);
        $stmt9->bindParam(':percentageM9', $percentageM9);
        $stmt9->bindParam(':taxableM9_amount', $taxableM9_amount);
        $stmt9->bindParam(':taxM9_amount', $taxM9_amount);
        $stmt9->bindParam(':yearM9_taxable', $yearM9_taxable);
        $stmt9->bindParam(':yearM9_tax', $yearM9_tax);
        $stmt9->bindParam(':cumulativeM9', $cumulativeM9);
        $stmt9->execute();

        $stmt10 = $pdo->prepare($sql10);
        $stmt10->bindParam(':month10', $month10);
        $stmt10->bindParam(':percentageM10', $percentageM10);
        $stmt10->bindParam(':taxableM10_amount', $taxableM10_amount);
        $stmt10->bindParam(':taxM10_amount', $taxM10_amount);
        $stmt10->bindParam(':yearM10_taxable', $yearM10_taxable);
        $stmt10->bindParam(':yearM10_tax', $yearM10_tax);
        $stmt10->bindParam(':cumulativeM10', $cumulativeM10);
        $stmt10->execute();

        $stmt11 = $pdo->prepare($sql11);
        $stmt11->bindParam(':month11', $month11);
        $stmt11->bindParam(':percentageM11', $percentageM11);
        $stmt11->bindParam(':taxableM11_amount', $taxableM11_amount);
        $stmt11->bindParam(':taxM11_amount', $taxM11_amount);
        $stmt11->bindParam(':yearM11_taxable', $yearM11_taxable);
        $stmt11->bindParam(':yearM11_tax', $yearM11_tax);
        $stmt11->bindParam(':cumulativeM11', $cumulativeM11);
        $stmt11->execute();

        $stmt12 = $pdo->prepare($sql12);
        $stmt12->bindParam(':month12', $month12);
        $stmt12->bindParam(':percentageM12', $percentageM12);
        $stmt12->bindParam(':taxableM12_amount', $taxableM12_amount);
        $stmt12->bindParam(':taxM12_amount', $taxM12_amount);
        $stmt12->bindParam(':yearM12_taxable', $yearM12_taxable);
        $stmt12->bindParam(':yearM12_tax', $yearM12_tax);
        $stmt12->bindParam(':cumulativeM12', $cumulativeM12);
        $stmt12->execute();

        $stmt13 = $pdo->prepare($sql13);
        $stmt13->bindParam(':month13', $month13);
        $stmt13->bindParam(':percentageM13', $percentageM13);
        $stmt13->bindParam(':taxableM13_amount', $taxableM13_amount);
        $stmt13->bindParam(':taxM13_amount', $taxM13_amount);
        $stmt13->bindParam(':yearM13_taxable', $yearM13_taxable);
        $stmt13->bindParam(':yearM13_tax', $yearM13_tax);
        $stmt13->bindParam(':cumulativeM13', $cumulativeM13);
        $stmt13->execute();

        header("Location: TaxOnEarning.php");

    } catch (PDOException $e) {
        // Handle database errors
        echo "PDO Error: " . $e->getMessage();
    }


}
?>