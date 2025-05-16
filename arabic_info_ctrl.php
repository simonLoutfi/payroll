<?php

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Retrieve form data
  $fname_arb = $_POST['firstName'];
  $lname_arb = $_POST['lastName'];
  $father_arb = $_POST['father'];
  $nssf_arb = $_POST['NssfNum'];
  $job_desc_arb = $_POST['jobDesc'];
  $status_arb = $_POST['status'];
  $child_num_arb = $_POST['children'];
  $work_type_arb = $_POST['workType'];
  $work_hour_arb = $_POST['workHour'];
  $payment_type_arb = $_POST['paymentType'];
  $leaving_arb = $_POST['LeavingReason'];
  $district_arb = $_POST['District'];
  $street_arb = $_POST['street'];
  $building_arb = $_POST['building'];
  $floor_arb = $_POST['floor'];
  $phone_arb = $_POST['phone'];
  $email_arb = $_POST['email'];
  //$mohafaza_arb_id = $_POST['mohafaza'];
  //$casa_arb_id = $_POST['casa'];
  $region_arb_id = $_POST['region'];
  //$city_arb_id = $_POST['city'];


  try {

    $check_sql = "SELECT COUNT(*) AS count FROM `employee_arabic_info` WHERE nssf_arb = :nssf";

    $stmt = $pdo->prepare($check_sql);
    $stmt->bindParam(':nssf', $nssf_arb);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nssf_count = $row['count'];

    if ($nssf_count > 0) {

      $sql = "UPDATE `employee_arabic_info` 
        SET `fname_arb` = :firstName,
            `lname_arb` = :lastname,
            `father_arb` = :father,
            `nssf_arb` = :nssf,
            `job_desc_arb` = :jobDesc,
            `status_arb` = :statuss,
            `child_num_arb` = :children,
            `work_type_arb` = :workType,
            `work_hour_arb` = :workHour,
            `payment_type_arb` = :paymentType,
            `leaving_arb` = :LeavingReason,
            `district_arb` = :District,
            `street_arb` = :street,
            `building_arb` = :building,
            `floor_arb` = :floor,
            `phone_arb` = :phone,
            `email_arb` = :email,
            `region_arb_id` = :region
             WHERE nssf_arb = :nssf ";

      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':firstName', $fname_arb);
      $stmt->bindParam(':lastname', $lname_arb);
      $stmt->bindParam(':father', $father_arb);
      $stmt->bindParam(':nssf', $nssf_arb);
      $stmt->bindParam(':jobDesc', $job_desc_arb);
      $stmt->bindParam(':statuss', $status_arb);
      $stmt->bindParam(':children', $child_num_arb);
      $stmt->bindParam(':workType', $work_type_arb);
      $stmt->bindParam(':workHour', $work_hour_arb);
      $stmt->bindParam(':paymentType', $payment_type_arb);
      $stmt->bindParam(':LeavingReason', $leaving_arb);
      $stmt->bindParam(':District', $district_arb);
      $stmt->bindParam(':street', $street_arb);
      $stmt->bindParam(':building', $building_arb);
      $stmt->bindParam(':floor', $floor_arb);
      $stmt->bindParam(':phone', $phone_arb);
      $stmt->bindParam(':email', $email_arb);
      // $stmt->bindParam(':mohafaza', $mohafaza_arb_id);
// $stmt->bindParam(':casa', $casa_arb_id);
      $stmt->bindParam(':region', $region_arb_id);
      //$stmt->bindParam(':city', $city_arb_id);


      $stmt->execute();

      echo '<script type="text/javascript">';
      echo 'window.onload = function() {';
      echo 'alert("update information successfully");';
      echo 'setTimeout(function(){ window.location.href = "employee-arabic.php"; }, 1000);'; // Delaying redirection for 1 second (1000 milliseconds)
      echo '};';
      echo '</script>';
      // echo "<script type='text/javascript'>alert('Info added previously');</script>";
      // // Redirect back to the same page with the same values
      // // Pass the form values as URL parameters
      // $params = http_build_query($_POST);
      // header("Location: employee-arabic.php?$params");
      // exit; // Stop execution


    } else {

      $sql = "INSERT INTO `employee_arabic_info`(`fname_arb`, `lname_arb`, `father_arb`, `nssf_arb`, `job_desc_arb`, `status_arb`, `child_num_arb`, `work_type_arb`, `work_hour_arb`, `payment_type_arb`, `leaving_arb`, `district_arb`, `street_arb`, `building_arb`, `floor_arb`, `phone_arb`, `email_arb` , `region_arb_id` ) 
                                            VALUES ( :firstName  ,  :lastname  ,  :father  ,   :nssf ,  :jobDesc  ,  :statuss  , :children  ,  :workType  ,  :workHour  ,  :paymentType ,  :LeavingReason  ,  :District   ,  :street  ,  :building ,  :floor  ,  :phone ,  :email  , :region  )";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':firstName', $fname_arb);
      $stmt->bindParam(':lastname', $lname_arb);
      $stmt->bindParam(':father', $father_arb);
      $stmt->bindParam(':nssf', $nssf_arb);
      $stmt->bindParam(':jobDesc', $job_desc_arb);
      $stmt->bindParam(':statuss', $status_arb);
      $stmt->bindParam(':children', $child_num_arb);
      $stmt->bindParam(':workType', $work_type_arb);
      $stmt->bindParam(':workHour', $work_hour_arb);
      $stmt->bindParam(':paymentType', $payment_type_arb);
      $stmt->bindParam(':LeavingReason', $leaving_arb);
      $stmt->bindParam(':District', $district_arb);
      $stmt->bindParam(':street', $street_arb);
      $stmt->bindParam(':building', $building_arb);
      $stmt->bindParam(':floor', $floor_arb);
      $stmt->bindParam(':phone', $phone_arb);
      $stmt->bindParam(':email', $email_arb);
      // $stmt->bindParam(':mohafaza', $mohafaza_arb_id);
      // $stmt->bindParam(':casa', $casa_arb_id);
      $stmt->bindParam(':region', $region_arb_id);
      //$stmt->bindParam(':city', $city_arb_id);


      $stmt->execute();

      echo '<script type="text/javascript">';
      echo 'window.onload = function() {';
      echo 'alert("insert information successfully");';
      echo 'setTimeout(function(){ window.location.href = "employee-arabic.php"; }, 1000);'; // Delaying redirection for 1 second (1000 milliseconds)
      echo '};';
      echo '</script>';


    }

  } catch (PDOException $e) {
    echo "PDO Error: " . $e->getMessage();
  }
}

?>