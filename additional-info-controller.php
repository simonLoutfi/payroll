<?php

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Retrieve form data
  $code = $_POST['code'];
  $branch = $_POST["branch"];
  $job = $_POST['job'];
  //$father = $_POST['father'];
  $mother = $_POST['mother'];
  $birth_date = $_POST['birth'];
  $birth_place = $_POST['birth_place'];
  $region = $_POST['region'];
  $phone = $_POST['phone'];
  $email1 = $_POST['email1'];
  $email2 = $_POST['email2'];
  $region_id = $_POST['region'];
  

  try {

    $check_sql = "SELECT COUNT(*) as count FROM employee WHERE emp_id = :code";

    $check_stmt = $pdo->prepare($check_sql);
    $check_stmt->bindParam(':code', $code);
    $check_stmt->execute();
    $row = $check_stmt->fetch(PDO::FETCH_ASSOC);
    $employee_count = $row['count'];

    if ($employee_count > 0) {

       $update_sql =" UPDATE employee SET  emp_jobTitle = :job, emp_mother = :mother, emp_dateOfBirth = :birth, emp_placeOfBirth = :birth_place, emp_phone = :phone , emp_email1 = :email1 , emp_email2 = :email2 , region_id = :region , branch_name = :branch  WHERE emp_id = :code ";

      $update_stmt = $pdo->prepare($update_sql);
      $update_stmt->bindParam(':branch', $branch);
      $update_stmt->bindParam(':code', $code);
      $update_stmt->bindParam(':job', $job);
      //$update_stmt->bindParam(':father', $father);
      $update_stmt->bindParam(':mother', $mother);
      $update_stmt->bindParam(':birth', $birth_date);
      $update_stmt->bindParam(':birth_place', $birth_place);
      $update_stmt->bindParam(':phone', $phone);
      $update_stmt->bindParam(':email1', $email1);
      $update_stmt->bindParam(':email2', $email2);
      $update_stmt->bindParam(':region', $region_id);
      $update_stmt->execute();

      echo "<script>alert('Successful update'); window.location.href = 'additional-information.php';</script>";
        

    } else {
     // echo "<script>alert('This employee does not exist. Please try again.'); window.location.href = 'additional-information.php?code=$code&branch=$branch&job=$job&mother=$mother&birth=$birth_date&birth_place=$birth_place&region=$region&phone=$phone&email1=$email1&email2=$email2&region_id=$region_id';</script>";

     // echo "<script> alert(' this employee does not exist'); event.preventDefault();  </script>";
     echo "<script>alert('This employee does not exist. Please try again.');";
     echo "window.location.href = 'additional-information.php?" . http_build_query($_POST) . "';</script>";
    
    }
  } catch (PDOException $e) {
    echo "PDO Error: " . $e->getMessage();
  }
}

?>

<!-- echo "<script>alert(' this employee does not exist'); window.location.href = 'additional-information.php';</script>"; -->

