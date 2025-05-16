<?php

require 'connection.php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //single
    $yearly0 = isset ($_POST['yearly0']) ? $_POST['yearly0'] : null;
    $monthly0 = isset ($_POST['monthly0']) ? $_POST['monthly0'] : null;

//maried+0
    $yearly1 = isset ($_POST['yearly1']) ? $_POST['yearly1'] : null;
    $monthly1 = isset ($_POST['monthly1']) ? $_POST['monthly1'] : null;

    //maried+1
    $yearly2 = isset ($_POST['yearly2']) ? $_POST['yearly2'] : null;
    $monthly2 = isset ($_POST['monthly2']) ? $_POST['monthly2'] : null;

//maried+2
    $yearly3 = isset ($_POST['yearly3']) ? $_POST['yearly3'] : null;
    $monthly3 = isset ($_POST['monthly3']) ? $_POST['monthly3'] : null;


    //maried+3
    $yearly4 = isset ($_POST['yearly4']) ? $_POST['yearly4'] : null;
    $monthly4 = isset ($_POST['monthly4']) ? $_POST['monthly4'] : null;

 //maried+4
    $yearly5 = isset ($_POST['yearly5']) ? $_POST['yearly5'] : null;
    $monthly5 = isset ($_POST['monthly5']) ? $_POST['monthly5'] : null;


    //maried+5
    $yearly6 = isset ($_POST['yearly6']) ? $_POST['yearly6'] : null;
    $monthly6 = isset ($_POST['monthly6']) ? $_POST['monthly6'] : null;


    $sql_check = "SELECT COUNT(*) FROM exemptions_tax WHERE changeDate = CURDATE()";

 try {
        $stmt_check = $pdo->query($sql_check);
        $row_count = $stmt_check->fetchColumn();
    
        if ($row_count > 0) {
            // If there are existing values, perform an UPDATE
            $sql1 = "UPDATE exemptions_tax SET monthly = :monthly0, yearly = :yearly0 WHERE changeDate = CURDATE() AND statuss = 'single'";
            $sql2 = "UPDATE exemptions_tax SET monthly = :monthly1, yearly = :yearly1 WHERE changeDate = CURDATE() AND statuss = 'maried+0'";
            $sql3 = "UPDATE exemptions_tax SET monthly = :monthly2, yearly = :yearly2 WHERE changeDate = CURDATE() AND statuss = 'maried+1'";
            $sql4 = "UPDATE exemptions_tax SET monthly = :monthly3, yearly = :yearly3 WHERE changeDate = CURDATE() AND statuss = 'maried+2'";
            $sql5 = "UPDATE exemptions_tax SET monthly = :monthly4, yearly = :yearly4 WHERE changeDate = CURDATE() AND statuss = 'maried+3'";
            $sql6 = "UPDATE exemptions_tax SET monthly = :monthly5, yearly = :yearly5 WHERE changeDate = CURDATE() AND statuss = 'maried+4'";
            $sql7 = "UPDATE exemptions_tax SET monthly = :monthly6, yearly = :yearly6 WHERE changeDate = CURDATE() AND statuss = 'maried+5'";


        } else {
            // If there are no existing values, perform an INSERT
            $sql1 = "INSERT INTO exemptions_tax (statuss, monthly, yearly, changeDate) VALUES ('single', :monthly0, :yearly0, CURDATE())";
            $sql2 = "INSERT INTO exemptions_tax (statuss, monthly, yearly, changeDate) VALUES ('maried+0', :monthly1, :yearly1, CURDATE())";
            $sql3 = "INSERT INTO exemptions_tax (statuss, monthly, yearly, changeDate) VALUES ('maried+1', :monthly2, :yearly2, CURDATE())";
            $sql4 = "INSERT INTO exemptions_tax (statuss, monthly, yearly, changeDate) VALUES ('maried+2', :monthly3, :yearly3, CURDATE())";
            $sql5 = "INSERT INTO exemptions_tax (statuss, monthly, yearly, changeDate) VALUES ('maried+3', :monthly4, :yearly4, CURDATE())";
            $sql6 = "INSERT INTO exemptions_tax (statuss, monthly, yearly, changeDate) VALUES ('maried+4', :monthly5, :yearly5, CURDATE())";
            $sql7 = "INSERT INTO exemptions_tax (statuss, monthly, yearly, changeDate) VALUES ('maried+5', :monthly6, :yearly6, CURDATE())";

        }
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':yearly0', $yearly0);
        $stmt1->bindParam(':monthly0', $monthly0);
        $stmt1->execute();

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':yearly1', $yearly1);
        $stmt2->bindParam(':monthly1', $monthly1);
        $stmt2->execute();

        $stmt3 = $pdo->prepare($sql3);
        $stmt3->bindParam(':yearly2', $yearly2);
        $stmt3->bindParam(':monthly2', $monthly2);
        $stmt3->execute();

        $stmt4 = $pdo->prepare($sql4);
        $stmt4->bindParam(':yearly3', $yearly3);
        $stmt4->bindParam(':monthly3', $monthly3);
        $stmt4->execute();

        $stmt5 = $pdo->prepare($sql5);
        $stmt5->bindParam(':yearly4', $yearly4);
        $stmt5->bindParam(':monthly4', $monthly4);
        $stmt5->execute();

        $stmt6 = $pdo->prepare($sql6);
        $stmt6->bindParam(':yearly5', $yearly5);
        $stmt6->bindParam(':monthly5', $monthly5);
        $stmt6->execute();

        $stmt7 = $pdo->prepare($sql7);
        $stmt7->bindParam(':yearly6', $yearly6);
        $stmt7->bindParam(':monthly6', $monthly6);
        $stmt7->execute();

        header("Location: Tax-Exemptions.php");

    } catch (PDOException $e) {
        // Handle database errors
        echo "PDO Error: " . $e->getMessage();
    }


}
?>
