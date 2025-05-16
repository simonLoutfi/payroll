<?php
include 'connection.php';

// Initialize variables
$currentEmployeeId = isset($_GET['emp_id']) ? $_GET['emp_id'] : 1;

// Function to fetch employee data by ID
function fetchEmployeeById($pdo, $employeeId) {
  $query = "SELECT * FROM `employee` WHERE `emp_id` = :employeeId";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['employeeId' => $employeeId]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

$stmt = $pdo->query("SELECT MAX(emp_id) AS max_id FROM employee");
$maxEmployeeId = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];

// API to fetch department names and IDs for dropdown list
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'get_departments') {
    $query = "SELECT `dep_id`, `dep_name` FROM `departement`";
    $stmt = $pdo->query($query);
    $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($departments);
    exit;
}

// API to fetch currency IDs and names for dropdown list
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'get_currencies') {
    $query = "SELECT `cur_id`, `cur_name` FROM `currency`";
    $stmt = $pdo->query($query);
    $currencies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($currencies);
    exit;
}


// API to fetch frequency of payment IDs and descriptions for dropdown list
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'get_frequencies') {
    $query = "SELECT `freq_id`, `freqPay_desc` FROM `frequency of payment`";
    $stmt = $pdo->query($query);
    $frequencies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($frequencies);
    exit;
}

// API to fetch mode of payment IDs and descriptions for dropdown list
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'get_modes') {
    $query = "SELECT `mode_id`, `modePay_desc` FROM `mode of payment`";
    $stmt = $pdo->query($query);
    $modes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($modes);
    exit;
}

// API to fetch status IDs and names for dropdown list
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'get_statuses') {
    $query = "SELECT `status_id`, `status_name` FROM `family_status`";
    $stmt = $pdo->query($query);
    $statuses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($statuses);
    exit;
}


// API to fetch gender IDs and names for dropdown list
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'get_genders') {
    $query = "SELECT `gender_id`, `gender_name` FROM `gender`";
    $stmt = $pdo->query($query);
    $genders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($genders);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['name'])) {
  $name = '%' . $_GET['name'] . '%'; // Add wildcards to the provided name
  $query = "SELECT * FROM `employee` WHERE `concat_fname_lname` LIKE :name";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['name' => $name]);
  $employeeData = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll to get only one result

  header('Content-Type: application/json');
  echo json_encode($employeeData);
  exit;
}


function updateEmployee($pdo, $employeeId, $data) {
  // Prepare the SQL query
  $query = "UPDATE `employee` SET 
                `emp_name` = :emp_name,
                `emp_lastName`= :emp_lastName,
                `concat_fname_lname`= :concat_fname_lname,
                `emp_nssf` = :emp_nssf,
                `emp_firstDate` = :emp_firstDate,
                `emp_nssfDate` = :emp_nssfDate,
                `emp_eosStartDate` = :emp_eosStartDate,
                `emp_jobTitle` = :emp_jobTitle,
                `emp_father` = :emp_father,
                `emp_mother` = :emp_mother,
                `emp_dateOfBirth` = :emp_dateOfBirth,
                `emp_placeOfBirth` = :emp_placeOfBirth,
                `emp_phone` = :emp_phone,
                `emp_email1` = :emp_email1,
                `emp_email2` = :emp_email2,
                `dep_id` = :dep_id,
                `freq_id` = :freq_id,
                `mode_id` = :mode_id,
                `cur_id` = :cur_id,
                `status_id` = :status_id,
                `gender_id` = :gender_id
            WHERE `emp_id` = :employeeId"; // Specify the condition here

  error_log("Employee ID being updated: " . $employeeId); // Log the employee ID being updated

  // Prepare the SQL statement
  $stmt = $pdo->prepare($query);

  // Concatenate first name, father name, and last name
  $concat_fname_lname = $data['emp_name'] . ' ' . $data['emp_father'] . ' ' . $data['emp_lastName'];

  // Bind parameters
  $stmt->bindValue(':emp_name', $data['emp_name']);
  $stmt->bindValue(':emp_lastName', $data['emp_lastName']);
  $stmt->bindValue(':concat_fname_lname', $concat_fname_lname); // Bind concat_fname_lname value
  $stmt->bindValue(':emp_nssf', $data['emp_nssf']);
  $stmt->bindValue(':emp_firstDate', $data['emp_firstDate']);
  $stmt->bindValue(':emp_nssfDate', $data['emp_nssfDate']);
  $stmt->bindValue(':emp_eosStartDate', $data['emp_eosStartDate']);
  $stmt->bindValue(':emp_jobTitle', $data['emp_jobTitle']);
  $stmt->bindValue(':emp_father', $data['emp_father']);
  $stmt->bindValue(':emp_mother', $data['emp_mother']);
  $stmt->bindValue(':emp_dateOfBirth', $data['emp_dateOfBirth']);
  $stmt->bindValue(':emp_placeOfBirth', $data['emp_placeOfBirth']);
  $stmt->bindValue(':emp_phone', $data['emp_phone']);
  $stmt->bindValue(':emp_email1', $data['emp_email1']);
  $stmt->bindValue(':emp_email2', $data['emp_email2']);
  $stmt->bindValue(':dep_id', $data['dep_id']);
  $stmt->bindValue(':freq_id', $data['freq_id']);
  $stmt->bindValue(':mode_id', $data['mode_id']);
  $stmt->bindValue(':cur_id', $data['cur_id']);
  $stmt->bindValue(':status_id', $data['status_id']);
  $stmt->bindValue(':gender_id', $data['gender_id']);
  $stmt->bindValue(':employeeId', $employeeId);

  // Execute the statement
  $result = $stmt->execute();

  // Check for errors in SQL execution
  if ($result === false) {
      return ['error' => true, 'message' => "Failed to update employee data: " . $stmt->errorInfo()[2]];
  }

  return ['error' => false, 'message' => "Employee data with ID $employeeId updated successfully!"];
}


function updateIncomesData($pdo, $currentEmployeeId, $incomes) {
  try {
      $sql = "UPDATE salary SET amount = :amt WHERE emp_id = :emp AND salCat_id = :salCat";
      $stmt = $pdo->prepare($sql);
      $sqlHist = "INSERT INTO salary_history (emp_id, salCat_id, amount) VALUES (:emp, :salCat, :amt)";
      $stmtHist = $pdo->prepare($sqlHist);

      // Loop through the income data and update each row
      foreach ($incomes as $index => $amount) {
          // Check if the corresponding salCat_id exists
          if (isset($_POST['salCat_id'][$index])) {
              $salCatId = $_POST['salCat_id'][$index];

              // Bind parameters and execute the query
              $stmt->bindParam(':emp', $currentEmployeeId);
              $stmt->bindParam(':salCat', $salCatId);
              $stmt->bindParam(':amt', $amount);
              $stmt->execute();
              $stmtHist->bindParam(':emp', $currentEmployeeId);
              $stmtHist->bindParam(':salCat', $salCatId);
              $stmtHist->bindParam(':amt', $amount);
              $stmtHist->execute();
          } else {
              // If the salCat_id is missing, log an error
              $errorMessage = "Failed to update income data: salCat_id missing for index $index";
              error_log($errorMessage);
              return ['error' => true, 'message' => $errorMessage];
          }
      }

      // Return success message
      return ['error' => false, 'message' => 'Income data updated successfully.'];
  } catch (PDOException $e) {
      // Return error message if update fails
      return ['error' => true, 'message' => 'Failed to update income data: ' . $e->getMessage()];
  }
}

function updateRevenuesData($pdo, $currentEmployeeId, $revenues) {
  try {
      $sql = "UPDATE salary SET amount = :amt WHERE emp_id = :emp AND salCat_id = :salCat";
      $stmt = $pdo->prepare($sql);
      $sqlHist = "INSERT INTO salary_history (emp_id, salCat_id, amount) VALUES (:emp, :salCat, :amt)";
      $stmtHist = $pdo->prepare($sqlHist);

      // Loop through the revenue data and update each row
      foreach ($revenues as $index => $amount) {
          // Check if the corresponding salCat_id exists
          if (isset($_POST['salCat_id'][$index])) {
              $salCatId = $_POST['salCat_id'][$index];

              // Bind parameters and execute the query
              $stmt->bindParam(':emp', $currentEmployeeId);
              $stmt->bindParam(':salCat', $salCatId);
              $stmt->bindParam(':amt', $amount);
              $stmt->execute();
              $stmtHist->bindParam(':emp', $currentEmployeeId);
              $stmtHist->bindParam(':salCat', $salCatId);
              $stmtHist->bindParam(':amt', $amount);
              $stmtHist->execute();
          } else {
              // If the salCat_id is missing, log an error
              $errorMessage = "Failed to update revenue data: salCat_id missing for index $index";
              error_log($errorMessage);
              return ['error' => true, 'message' => $errorMessage];
          }
      }

      // Return success message
      return ['error' => false, 'message' => 'Revenue data updated successfully.'];
  } catch (PDOException $e) {
      // Return error message if update fails
      return ['error' => true, 'message' => 'Failed to update revenue data: ' . $e->getMessage()];
  }
}

function insertDeductionData($pdo, $currentEmployeeId, $deductions, $monthsArray, $salCatIds) {
  try {
      // Prepare the SQL query
      $sql = "INSERT INTO deduction (deduction_amount, deduction_month, emp_id, salCat_id, deduction_amountPerMonth) 
      VALUES (:amount, :startMonth, :emp, :salCat, :amtPmonth)";
      $stmt = $pdo->prepare($sql);

      // Loop through the deduction data and insert each row
      foreach ($deductions as $index => $amount) {
          // Ensure $amount and $months are numeric values
          if (is_numeric($amount) && is_numeric($monthsArray[$index])) {
              // Get the salCat_id for this deduction from the provided array
              $salCatId = $salCatIds[$index];

              // Retrieve the number of months
              $months = $monthsArray[$index];

              // Calculate amount per month
              $monthly = ($months != 0) ? ($amount / $months) : 0;

              // Bind parameters and execute the query
              $stmt->bindParam(':amount', $amount);
              $stmt->bindParam(':startMonth', $months);
              $stmt->bindParam(':emp', $currentEmployeeId);
              $stmt->bindParam(':salCat', $salCatId); // Bind salCat_id here
              $stmt->bindParam(':amtPmonth', $monthly);

              $stmt->execute();
          } else {
              // Log or handle invalid data appropriately
              echo "Invalid deduction data at index: $index";
          }
      }
      // Return success message
      return ['error' => false, 'message' => 'Deduction data inserted successfully.'];
  } catch (PDOException $e) {
      // Return error message if insertion fails
      return ['error' => true, 'message' => 'Failed to insert deduction data: ' . $e->getMessage()];
  }
}

function updateFamilyMemberData($pdo, $memberId, $data) {
  try {
      // Prepare the SQL query
      $query = "UPDATE family_member SET 
                  member_name = :member_name,
                  member_age = :member_age,
                  f_secured = :f_secured,
                  memberType_id = :memberType_id,
                  gender_id = :gender_id,
                  deleted = :deleted
              WHERE member_id = :member_id";

      // Prepare the SQL statement
      $stmt = $pdo->prepare($query);

      // Bind parameters
      $stmt->bindValue(':member_name', isset($data['member_name']) ? $data['member_name'] : null);
      $stmt->bindValue(':member_age', isset($data['member_age']) ? $data['member_age'] : null);
      $stmt->bindValue(':f_secured', isset($data['f_secured']) ? 1 : 0);
      $stmt->bindValue(':memberType_id', isset($data['memberType_id']) ? $data['memberType_id'] : null);
      $stmt->bindValue(':gender_id', isset($data['gender_id']) ? $data['gender_id'] : null);
      $stmt->bindValue(':deleted', isset($data['deleted']) ? 1 : 0);
      $stmt->bindValue(':member_id', $memberId);

      // Execute the statement
      $result = $stmt->execute();

      // Check for errors in SQL execution
      if ($result === false) {
          return ['error' => true, 'message' => "Failed to update family member data: " . $stmt->errorInfo()[2]];
      }

      return ['error' => false, 'message' => "Family member data with ID $memberId updated successfully!"];
  } catch (PDOException $e) {
      // Log the error
      error_log('PDO Error: ' . $e->getMessage());
      // Return error message
      return ['error' => true, 'message' => 'An error occurred. Please try again later.'];
  }
}

function insertFamilyMember($pdo, $memberData) {
  try {
      // Check if the 'deleted' checkbox is checked
      $deleted = isset($memberData['deleted']) && $memberData['deleted'] == '1' ? 1 : 0;

      // Prepare the SQL query
      $query = "INSERT INTO family_member (member_name, member_age, f_secured, memberType_id, emp_id, gender_id, deleted) 
                  VALUES (:member_name, :member_age, :f_secured, :memberType_id, :emp_id, :gender_id, :deleted)";

      // Prepare the SQL statement
      $stmt = $pdo->prepare($query);

      // Bind parameters
      $stmt->bindValue(':member_name', $memberData['member_name']);
      $stmt->bindValue(':member_age', $memberData['member_age']);
      $stmt->bindValue(':f_secured', $memberData['f_secured']);
      $stmt->bindValue(':memberType_id', $memberData['memberType_id']);
      $stmt->bindValue(':emp_id', $memberData['emp_id']);
      $stmt->bindValue(':gender_id', $memberData['gender_id']);
      $stmt->bindValue(':deleted', $deleted); // Use the calculated 'deleted' value

      // Execute the statement
      $result = $stmt->execute();

      // Check for errors in SQL execution
      if ($result === false) {
          return ['error' => true, 'message' => "Failed to insert family member data: " . $stmt->errorInfo()[2]];
      }

      // Return success message
      return ['error' => false, 'message' => "Family member data inserted successfully!"];
  } catch (PDOException $e) {
      // Log the error
      error_log('PDO Error: ' . $e->getMessage());
      // Return error message
      return ['error' => true, 'message' => 'An error occurred. Please try again later.'];
  }
}


$employeeData = fetchEmployeeById($pdo, $currentEmployeeId);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the emp_id from the form data
    $employeeId = isset($_POST['emp_id']) ? $_POST['emp_id'] : null;
    echo "Employee ID: " . $employeeId; // Inserted echo for the employee id

    if ($employeeId !== null) {
        // Update the employee data using the retrieved emp_id
        updateEmployee($pdo, $employeeId, $_POST);

        // Insert income data if provided
        if (isset($_POST['salCatInc']) && is_array($_POST['salCatInc']) && count($_POST['salCatInc']) > 0) {
            // Call the updateIncomesData function to update income data
            $updateIncomeResult = updateIncomesData($pdo, $employeeId, $_POST['salCatInc']);

            // Output success or error message
            if ($updateIncomeResult['error']) {
                echo "Error updating income data: " . $updateIncomeResult['message'];
            } else {
                echo "Income data updated successfully.";
            }
        } else {
            echo "No income data provided.";
        }

        // Insert revenue data if provided
        if (isset($_POST['salCatRev']) && is_array($_POST['salCatRev']) && count($_POST['salCatRev']) > 0) {
            // Call the updateRevenuesData function to update revenue data
            $updateRevenueResult = updateRevenuesData($pdo, $employeeId, $_POST['salCatRev']);

            // Output success or error message
            if ($updateRevenueResult['error']) {
                echo "Error updating revenue data: " . $updateRevenueResult['message'];
            } else {
                echo "Revenue data updated successfully.";
            }
        } else {
            echo "No revenue data provided.";
        }

        // Insert deduction data if provided
        if (!empty($_POST['salCatDed']) && !empty($_POST['deductionMonths'])) {
            $salCatIds = $_POST['salCat_id'];

            // Check if $salCatIds is not empty and is an array
            if (!empty($salCatIds) && is_array($salCatIds)) {
                // Call the insertDeductionData function to insert deduction data
                $insertDeductionResult = insertDeductionData($pdo, $employeeId, $_POST['salCatDed'], $_POST['deductionMonths'], $salCatIds);

                // Output success or error message
                if ($insertDeductionResult['error']) {
                    echo "Error inserting deduction data: " . $insertDeductionResult['message'];
                } else {
                    echo "Deduction data inserted successfully.";
                }
            } else {
                echo "No salCatIds provided or salCatIds is not an array.";
            }
        } else {
            echo "No deduction data provided.";
        }
        
        // Check if new family member data is provided
        // (Assuming insertFamilyMember function exists)
        if (isset($_POST['new_family_member']) && !empty($_POST['new_family_member'])) {
            $newMemberData = $_POST['new_family_member'];

            // Check if member_name and member_age are not empty
            if (!empty($newMemberData['member_name']) && !empty($newMemberData['member_age'])) {
                $newMemberData['emp_id'] = $_POST['emp_id']; // Add emp_id to the new member data

                // Call the insertFamilyMember function to insert family member data
                $insertFamilyMemberResult = insertFamilyMember($pdo, $newMemberData);

                // Output success or error message
                if ($insertFamilyMemberResult['error']) {
                    echo "Error inserting family member data: " . $insertFamilyMemberResult['message'];
                } else {
                    echo "Family member data inserted successfully.";
                }
            } else {
                echo "Error: Member name or age is empty.";
            }
        } else {
            echo "No new family member data submitted.";
        }

        // Check if existing family member data is provided
        // (Assuming updateFamilyMemberData function exists)
        if (isset($_POST['family_members']) && !empty($_POST['family_members'])) {
            $familyMembersData = $_POST['family_members'];

            foreach ($familyMembersData as $memberId => $memberData) {
                $updateFamilyMemberResult = updateFamilyMemberData($pdo, $memberId, $memberData);

                // Check the result of the update operation
                if ($updateFamilyMemberResult['error']) {
                    echo "Error updating family member data for member ID $memberId: " . $updateFamilyMemberResult['message'];
                } else {
                    echo "Family member data for member ID $memberId updated successfully.";
                }
            }
        } else {
            echo "No family member data submitted.";
        }

        // Refresh employee data after update
        $employeeData = fetchEmployeeById($pdo, $employeeId);

        // Reset the employee ID after updating
        $currentEmployeeId = $employeeId;
    } else {
        echo "Error: Employee ID is not provided.";
    }
}

?>

 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Employee</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include jQuery UI library -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Include jQuery UI CSS (for styling) -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Payroll</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <button id="backButton" class="btn btn-primary" type="button"><i class="bi bi-arrow-return-left"></i></button>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="generalInfoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              General Info
            </a>
            <ul class="dropdown-menu" aria-labelledby="generalInfoDropdown">
            <li >
            <a class="dropdown-item" href="#" onclick="loadPage('generalInfo-location.php')">Add Location</a>
          </li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('generalInfo-branch.php')">Add Branch</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('generalInfo-dept.php')">Add Department</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('generalInfo-bank.php')">Add Bank</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('generalInfo-curr.php')">Add Currency rate/Month</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('generalInfo-info.php')">Add Information</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="employeeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Employee
            </a>
            <ul class="dropdown-menu" aria-labelledby="employeeDropdown">
              <li><a class="dropdown-item" href="#" onclick="loadPage('employee-add.php')">Add Employee</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('forms-editors.php')">Edit Employee</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('additional-information.php')">Additional Information</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('employee-arabic.php')">Arabic Information</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('edit_employee_arabic.php')">Edit Arabic Information</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('editListemp.php')">Edit Employee By List</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="parametersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Parameters
            </a>
            <ul class="dropdown-menu" aria-labelledby="parametersDropdown">
              <li><a class="dropdown-item" href="#" onclick="loadPage('famAllowance.php')">Family Allowances</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('./famAllowanceSubscription.php')">Family Allowance Subscription</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('eosSubs.php')">EOS endemnity subscription</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('motherhood.php')">Motherhood and illness Subscription</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('incomeContract.php')">Income tax contractual</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('Tax-Exemptions.php')">Income tax Exemptions</a></li>
              <li><a class="dropdown-item" href="#" onclick="loadPage('taxOnEarning.php')">Personal income tax on earning</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadPage('remuneration.php')">Remuneration</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="printOutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Print Out
            </a>
            <ul class="dropdown-menu" aria-labelledby="printOutDropdown">
              <li><a class="dropdown-item" href="#" onclick="loadPage('generalPayslip.php')">General Payslip</a></li>
              
            </ul>
          </li>
          
        </ul>
      </div>
    </div>
  </nav><!-- End Navbar -->

<script>
    // Function to load page in iframe
    function loadPage(pageUrl) {
      var iframeContainer = document.getElementById('iframeContainer');
      iframeContainer.innerHTML = '<iframe src="' + pageUrl + '" width="100%" height="600" frameborder="0" scrolling="auto"></iframe>';
    }
  
document.addEventListener('DOMContentLoaded', function() {
  var backButton = document.getElementById('backButton');
  backButton.addEventListener('click', function() {
    window.history.back();
    
  });
});


document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('myForm');
        form.addEventListener('keypress', function(event) {
          if (event.key === 'Enter') {
            var activeElement = document.activeElement;
            var inputs = Array.from(form.querySelectorAll('input'));
            var index = inputs.indexOf(activeElement);
            if (index > -1 && index < inputs.length - 1) {
              event.preventDefault(); 
              inputs[index + 1].focus(); 
            }
          }
        });
      });
</script>

</header>
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <span>Payroll</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <span>General Info</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="generalInfo-location.php">
          <i class="bi bi-circle"></i><span>Add Location</span>
        </a>
      </li>
      <li>
        <a href="generalInfo-branch.php">
          <i class="bi bi-circle"></i><span>Add Branch</span>
        </a>
      </li>
      <li>
        <a href="generalInfo-dept.php">
          <i class="bi bi-circle"></i><span>Add Department</span>
        </a>
      </li>
      <li>
        <a href="generalInfo-bank.php">
          <i class="bi bi-circle"></i><span>Add Bank</span>
        </a>
      </li>
      <li>
        <a href="generalInfo-curr.php">
          <i class="bi bi-circle"></i><span>Add Currency rate/Month</span>
        </a>
      </li>
      <li>
        <a href="generalInfo-info.php">
          <i class="bi bi-circle"></i><span>Add Information</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="employee-add.php">
          <i class="bi bi-circle"></i><span>Add Employee</span>
        </a>
      </li>
      <li>
        <a href="forms-editors.php">
          <i class="bi bi-circle"></i><span>Edit Employee</span>
        </a>
      </li>
      <li>
        <a href="additional-information.php">
          <i class="bi bi-circle"></i><span>Additional Information</span>
        </a>
      </li>
      <li>
        <a href="employee-arabic.php">
          <i class="bi bi-circle"></i><span>Arabic Information</span>
        </a>
      </li>
      <li>
        <a href="edit_employee_arabic.php">
          <i class="bi bi-circle"></i><span>Edit Arabic Information</span>
        </a>
      </li>
      <li>
            <a href="editListemp.php">
              <i class="bi bi-circle"></i><span>Edit Employee By List</span>
            </a>
          </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <span>Parameters</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="famAllowance.php">
          <i class="bi bi-circle"></i><span>Family Allowances</span>
        </a>
      </li>
      <li>
        <a href="./famAllowanceSubscription.php">
          <i class="bi bi-circle"></i><span>Family Allowance Subscription</span>
        </a>
      </li>
      <li>
        <a href="eosSubs.php">
          <i class="bi bi-circle"></i><span>EOS endemnity subscription</span>
        </a>
      </li>
      <li>
        <a href="motherhood.php">
          <i class="bi bi-circle"></i><span>Motherhood and illness Subscription</span>
        </a>
      </li>
      <li>
        <a href="incomeContract.php">
          <i class="bi bi-circle"></i><span>Income tax contractual</span>
        </a>
      </li>
      <li>
        <a href="Tax-Exemptions.php">
          <i class="bi bi-circle"></i><span>Income tax Exemptions</span>
        </a>
      </li>
      <li>
        <a href="taxOnEarning.php">
          <i class="bi bi-circle"></i><span>Personal income tax on earning</span>
        </a>
      </li>
      <li>
            <a href="closeOpenMonth.php">
              <i class="bi bi-circle"></i><span>Close/Open Month</span>
            </a>
          </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="remuneration.php"> 
        <span>Remuneration</span>
    </a>
  </li>



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <span>Print Out</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="generalPayslip.php">
          <i class="bi bi-circle"></i><span>general payslip</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>r6</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>r7</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed"> 
        <span>Sign Out</span>
    </a>
  </li>      
  

</ul>

</aside>

  <main id="main" class="main">

  <div class="pagetitle">
  <h1>Employee Data Editor</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Edit Employee</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="employee-navigation pb-3">
    <button id="prevEmployee" class="btn btn-primary me-2">Previous</button>
    <span id="currentEmployee" class="fw-bold">Employee: <?php echo $currentEmployeeId; ?></span>
    <button id="nextEmployee" class="btn btn-primary ms-2">Next</button>
</div>
<div class="pb-3">
    <div class="row">
        <div class="col-md-2">
            <input type="text" id="employeeName" class="form-control me-2" style="width: 100%;" placeholder="Enter Employee Name">
        </div>
        <div class="col-md-2">
            <button id="searchEmployee" class="btn btn-primary">Search</button>
        </div>
    </div>
</div>

  <form action="forms-editors.php" method="POST"> 
    <?php
    // Check if $employeeData is not false before iterating over it
    if ($employeeData !== false) {
        $fields = array(
            'emp_name' => 'Employee Name',
            'emp_lastName' => 'Employee Last Name',
            'concat_fname_lname' => 'Complete Name',
            'emp_nssf' => 'Employee NSSF',
            'emp_firstDate' => 'First Date',
            'emp_nssfDate' => 'NSSF Date',
            'emp_eosStartDate' => 'EOS Start Date',
            'emp_jobTitle' => 'Job Title',
            'emp_father' => 'Father',
            'emp_mother' => 'Mother',
            'emp_dateOfBirth' => 'Date of Birth',
            'emp_placeOfBirth' => 'Place of Birth',
            'emp_phone' => 'Phone',
            'emp_email1' => 'Email 1',
            'emp_email2' => 'Email 2',
            'dep_id' => 'Department ID',
            'freq_id' => 'Frequency ID',
            'mode_id' => 'Mode ID',
            'cur_id' => 'Currency ID',
            'status_id' => 'Status ID',
            'gender_id' => 'Gender ID'
        );

        echo '<div style="padding-top: 30px;"></div>';

        $counter = 0;
        foreach ($fields as $key => $label) {
            if ($counter % 4 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-3 mb-3">';
            echo '<label for="' . $key . '" class="form-label">' . $label . '</label>';
            
            // Initialize $required variable
            $required = '';
    
           // Check if the field is one of the dropdown APIs
            if ($key === 'dep_id' || $key === 'freq_id' || $key === 'mode_id' || $key === 'cur_id' || $key === 'status_id' || $key === 'gender_id') {
              echo '<select id="' . $key . '" name="' . $key . '" class="form-select">';
              $selected = isset($employeeData[$key]) ? $employeeData[$key] : '';
              echo '<option value="" selected disabled>Select ' . $label . '</option>';
              echo '</select>';
            } elseif (stripos($key, 'Date') !== false) { // Check if the key contains 'Date' (case-insensitive)
              echo '<input type="date" id="' . $key . '" name="' . $key . '" value="' . htmlspecialchars($employeeData[$key]) . '" class="form-control">';
            } else {
              // For non-dropdown fields
              echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . htmlspecialchars($employeeData[$key]) . '" class="form-control">';
            }
                  
            echo '</div>';
            if ($counter % 4 == 3 || $counter == count($fields) - 1) {
                echo '</div>';
            }
            $counter++;
        }

        echo '<div style="padding-top: 40px;"></div>';
 
        try {
          $sql = "SELECT sc.salCat_id, sc.salCat_name, s.amount 
          FROM `salary category` sc
          INNER JOIN `salary category type` sct ON sc.salCatType_id = sct.salCatType_id
          INNER JOIN salary s ON sc.salCat_id = s.salCat_id
          INNER JOIN (
              SELECT emp_id, salCat_id 
              FROM salary
              WHERE emp_id = :currentEmployeeId
              GROUP BY emp_id, salCat_id
          ) latest_salary ON s.emp_id = latest_salary.emp_id 
                          AND s.salCat_id = latest_salary.salCat_id
          WHERE sct.salCatType_desc = 'taxable' AND s.emp_id = :currentEmployeeId;";
      
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':currentEmployeeId', $currentEmployeeId, PDO::PARAM_INT);
          $stmt->execute();
      
          if ($stmt->rowCount() > 0) {
              echo '<h4 style="margin-bottom: 10px;">Incomes</h4>'; // Header
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="form-group row" style="margin-top: 1%;">';
                echo '<label for="' . $row["salCat_id"] . '" class="col-sm-1 col-form-label">' . $row["salCat_name"] . '</label>';
                echo '<div class="col-sm-9">';
                echo '<input type="number" id="' . $row["salCat_id"] . '" name="salCatInc[]" class="form-control" style="width: 50%;" value="' . $row['amount'] . '">';
                echo '<input type="hidden" name="salCat_id[]" value="' . $row["salCat_id"] . '">';
                echo '</div>';
                echo '</div>';
              }
          }
      } catch (PDOException $e) {
          echo "PDO Error: " . $e->getMessage();
      }
    }
          
  echo '<div style="padding-top: 40px;"></div>';
 
  try {
    $sql = "SELECT sc.salCat_id, sc.salCat_name, s.amount 
            FROM `salary category` sc
            INNER JOIN `salary category type` sct ON sc.salCatType_id = sct.salCatType_id
            INNER JOIN salary s ON sc.salCat_id = s.salCat_id
            INNER JOIN (
                SELECT emp_id, salCat_id
                FROM salary
                WHERE emp_id = :currentEmployeeId
                GROUP BY emp_id, salCat_id
            ) latest_salary ON s.emp_id = latest_salary.emp_id 
                            AND s.salCat_id = latest_salary.salCat_id
            WHERE sct.salCatType_desc = 'non taxable' AND s.emp_id = :currentEmployeeId;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':currentEmployeeId', $currentEmployeeId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo '<h4 style="margin-bottom: 10px;">Revenues</h4>'; // Header
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="form-group row" style="margin-top: 1%;">';
        echo '<label for="' . $row["salCat_id"] . '" class="col-sm-1 col-form-label">' . $row["salCat_name"] . '</label>';
        echo '<div class="col-sm-9">';
        echo '<input type="number" id="' . $row["salCat_id"] . '" name="salCatInc[]" class="form-control" style="width: 50%;" value="' . $row['amount'] . '">';
        echo '<input type="hidden" name="salCat_id[]" value="' . $row["salCat_id"] . '">';
        echo '</div>';
        echo '</div>';
      }
  }
} catch (PDOException $e) {
  echo "PDO Error: " . $e->getMessage();
}

      echo '<div style="padding-top: 40px;"></div>';
      try {
        $sql = "SELECT sc.salCat_id, sc.salCat_name, NULL AS deduction_amount
                FROM `salary category` sc
                INNER JOIN `salary category type` sct ON sc.salCatType_id = sct.salCatType_id
                LEFT JOIN deduction d ON sc.salCat_id = d.salCat_id AND d.emp_id = :currentEmployeeId
                WHERE sct.salCatType_desc = 'deduction' 
                AND d.emp_id IS NULL";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':currentEmployeeId', $currentEmployeeId, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0 && $currentEmployeeId !== 'undefined') {
          echo '<h4 style="margin-bottom: 10px;">Deductions</h4>'; // Header
          echo '<div class="row">';
            
          // Loop through deduction categories
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="pair col-md-6">'; // Adjust column width as needed
              echo "<div class='d-flex'>"; // Start of the pair
      
              echo "<label for='deduction_" . $row["salCat_id"] . "' style='margin-right: 5%;'>" . $row["salCat_name"] . ":</label>"; 
              echo "<input type='number' id='deduction_" . $row["salCat_id"] . "' name='salCatDed[".$row["salCat_id"]."]' class='form-control mr-2 ml-2' style='width: 50%; margin-right: 5%;' value='".$row['deduction_amount']."'><br>";
      
              echo "<label for='months_" . $row["salCat_id"] ."' style='margin-right: 5%;' class='mr-2 ml-4'>Months:</label>"; // Adjusted margin-left here
              echo "<input type='number' id='months_" . $row["salCat_id"] . "' name='deductionMonths[".$row["salCat_id"]."]' class='form-control mr-2' style='width: 15%;' value='1'>"; // Adjusted margin-right here
      
              echo "<input type='hidden' name='salCat_id[" . $row["salCat_id"] . "]' value='" . $row["salCat_id"] . "'>"; // Hidden input for salCat_id
              echo '</div>'; // End of the pair
              echo '</div>'; // Close pair div
          }
            
          echo '</div>'; // Close row div
      }
      
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }

    echo '<div style="padding-top: 40px;"></div>';


    try {
      // Open the wrapping div
      echo '<div class="row">';
      
      // Prepare and execute the query
      $stmt = $pdo->prepare("SELECT * FROM family_member WHERE emp_id = :currentEmployeeId AND deleted = 0");
      $stmt->execute(['currentEmployeeId' => $currentEmployeeId]);
      $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      // Check if $members is not null and has elements
      if ($members !== false && count($members) > 0) {
          // Display the members
          echo '<h4 style="margin-bottom: 10px;">Family Member</h4>'; // Header
          foreach ($members as $member) {
              echo '<div class="col-md-2">';
              echo '<label for="member_name">Member Name:</label>';
              echo '<input type="text" id="member_name" name="family_members[' . $member['member_id'] . '][member_name]" class="form-control" value="' . htmlspecialchars($member['member_name']) . '">';
              echo '</div>';
              
              echo '<div class="col-md-2">';
              echo '<label for="member_age">Member Age:</label>';
              echo '<input type="text" id="member_age" name="family_members[' . $member['member_id'] . '][member_age]" class="form-control" value="' . htmlspecialchars($member['member_age']) . '">';
              echo '</div>';
              
              echo '<div class="col-md-2">';
              echo '<label for="f_secured">F-Secured:</label>';
              echo '<input type="checkbox" id="f_secured" name="family_members[' . $member['member_id'] . '][f_secured]" class="form-check-input" ' . ($member['f_secured'] == 1 ? 'checked' : '') . '>';
              echo '</div>';
              
              echo '<div class="col-md-2">';
              echo '<label for="memberType_id">Member Type:</label>';
              echo '<select id="memberType_id" name="family_members[' . $member['member_id'] . '][memberType_id]" class="form-control">';
              // Fetch and display member types
              $stmtType = $pdo->query("SELECT * FROM `member type`");
              while ($type = $stmtType->fetch(PDO::FETCH_ASSOC)) {
                  echo '<option value="' . $type['memberType_id'] . '"' . ($member['memberType_id'] == $type['memberType_id'] ? ' selected' : '') . '>' . htmlspecialchars($type['memberType_desc']) . '</option>';
              }
              echo '</select>';
              echo '</div>';
              
              echo '<div class="col-md-2">';
              echo '<label for="gender_id">Gender:</label>';
              echo '<select id="gender_id" name="family_members[' . $member['member_id'] . '][gender_id]" class="form-control">';
              // Fetch and display genders
              $stmtGender = $pdo->query("SELECT * FROM gender");
              while ($gender = $stmtGender->fetch(PDO::FETCH_ASSOC)) {
                  echo '<option value="' . $gender['gender_id'] . '"' . ($member['gender_id'] == $gender['gender_id'] ? ' selected' : '') . '>' . htmlspecialchars($gender['gender_name']) . '</option>';
              }
              echo '</select>';
              echo '</div>';
              
              echo '<div class="col-md-2">';
              echo '<label for="deleted">Delete:</label>';
              echo '<input type="checkbox" id="deleted" name="family_members[' . $member['member_id'] . '][deleted]" class="form-check-input" value="1" ' . ($member['deleted'] == 1 ? 'checked' : '') . '>';
              echo '</div>';
          }
      }
      
      // Close the wrapping div
      echo '</div>'; // Close row
  } catch (PDOException $e) {
      // Log the error
      error_log('PDO Error: ' . $e->getMessage());
      // Output a friendly error message to the user
 
  }


  echo '<div style="padding-top: 40px;"></div>';


try {
    // Open the wrapping div
    echo '<div class="row">';
    
    // Prepare and execute the query to check if emp_id exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM employee WHERE emp_id = :currentEmployeeId");
    $stmt->execute(['currentEmployeeId' => $currentEmployeeId]);
    $rowCount = $stmt->fetchColumn();

    // Check if emp_id exists
    if ($rowCount > 0) {
        // Fetch member types
        $stmtType = $pdo->query("SELECT * FROM `member type`");
        $memberTypes = $stmtType->fetchAll(PDO::FETCH_ASSOC);

        // Fetch genders
        $stmtGender = $pdo->query("SELECT * FROM gender");
        $genders = $stmtGender->fetchAll(PDO::FETCH_ASSOC);

        // Display form inputs for adding new family members
      echo '<h4 style="margin-bottom: 10px;">Add New Family Member</h4>'; // Header
        // Member Name
        echo '<div class="col-md-2">';
        echo '<label for="new_member_name">Member Name:</label>';
        echo '<input type="text" id="new_member_name" name="new_family_member[member_name]" class="form-control" value="">';
        echo '</div>';

        // Member Age
        echo '<div class="col-md-2">';
        echo '<label for="new_member_age">Member Age:</label>';
        echo '<input type="text" id="new_member_age" name="new_family_member[member_age]" class="form-control" value="">';
        echo '</div>';

        echo '<div class="col-md-2">';
        echo '<label for="new_f_secured">F-Secured:</label>';
        
        // Check if the $new_family_member is set and checkbox is checked
        $fSecuredChecked = isset($new_family_member['f_secured']) && $new_family_member['f_secured'] == 1 ? 'checked' : '';
        
        echo '<input type="hidden" name="new_family_member[f_secured]" value="0">'; // Hidden input with initial value 0
        echo '<input type="checkbox" id="new_f_secured" name="new_family_member[f_secured]" class="form-check-input" value="1" ' . $fSecuredChecked . '>';
        
        echo '</div>';

        // Member Type
        echo '<div class="col-md-2">';
        echo '<label for="new_memberType_id">Member Type:</label>';
        echo '<select id="new_memberType_id" name="new_family_member[memberType_id]" class="form-control">';
        foreach ($memberTypes as $type) {
            echo '<option value="' . $type['memberType_id'] . '">' . htmlspecialchars($type['memberType_desc']) . '</option>';
        }
        echo '</select>';
        echo '</div>';

        // Gender
        echo '<div class="col-md-2">';
        echo '<label for="new_gender_id">Gender:</label>';
        echo '<select id="new_gender_id" name="new_family_member[gender_id]" class="form-control">';
        foreach ($genders as $gender) {
            echo '<option value="' . $gender['gender_id'] . '">' . htmlspecialchars($gender['gender_name']) . '</option>';
        }
        echo '</select>';
        echo '</div>';

        // Deleted
        echo '<div class="col-md-2">';
        echo '<label for="new_deleted">Deleted:</label>';
        echo '<input type="hidden" name="new_family_member[deleted]" value="0">'; // Hidden input with initial value 0
        echo '<input type="checkbox" id="new_deleted" name="new_family_member[deleted]" class="form-check-input" value="1" onchange="updateDeletedValue(this)">';
        echo '</div>';
    } 
    
    echo '</div>'; // Close row
} catch (PDOException $e) {
    // Log the error
    error_log('PDO Error: ' . $e->getMessage());
    // Output a friendly error message to the user
    echo 'An error occurred. Please try again later.';
}

  ?>
<div class="mt-4">
    <input type="hidden" name="emp_id" value="<?php echo $currentEmployeeId; ?>">
    <?php
    if ($currentEmployeeId === 'undefined') {
        echo '<button type="button" class="btn btn-primary" onclick="window.location.href=\'http://localhost/payroll/forms-editors.php\'">Back</button>';
    } else {
        echo '<button type="submit" class="btn btn-primary">Update Employee</button>';
    }
    ?>
</div>
</form>


  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    $(document).ready(function() {
        // Previous and next employee navigation
        $('#prevEmployee').click(function() {
            var currentId = parseInt(<?php echo $currentEmployeeId; ?>);
            if (currentId > 1) {
                currentId--;
                window.location.href = 'forms-editors.php?emp_id=' + currentId;
            }
        });
      });
        $('#nextEmployee').click(function() {
            var currentId = parseInt(<?php echo $currentEmployeeId; ?>);
            var maxEmployeeId = <?php echo $maxEmployeeId; ?>;
            if (currentId < maxEmployeeId) {
                currentId++;
                window.location.href = 'forms-editors.php?emp_id=' + currentId;
            }
        });

        // Search for employee by name
        $('#searchEmployee').click(function() {
            var employeeName = $('#employeeName').val().trim();
            if (employeeName !== '') {
                $.ajax({
                    url: 'forms-editors.php',
                    method: 'GET',
                    data: { name: employeeName },
                    dataType: 'json',
                    success: function(data) {
                        if (data !== null) {
                            updateFormFields(data);
                            setCurrentEmployeeId(data.emp_id);
                            $('input[name="emp_id"]').val(data.emp_id);
                            window.location.href = 'forms-editors.php?emp_id=' + data.emp_id;
                        } else {
                            alert('Employee not found!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Error searching for employee!');
                    }
                });
            } else {
                alert('Please enter an employee name to search.');
            }
        });

        // Update form fields with employee data
        function updateFormFields(employeeData) {
            $.each(employeeData, function(key, value) {
                $('#' + key).val(value);
            });
        }

        // Set the current employee ID
        function setCurrentEmployeeId(employeeId) {
            $('#currentEmployee').text('Employee: ' + employeeId);
        }
      
        function updateDeletedValue(checkbox) {
    if (checkbox.checked) {
        checkbox.value = '1'; // If checked, update value to 1
    } else {
        checkbox.value = '0'; // If unchecked, update value to 0
    }
}
</script>


<script>
    // Function to fetch department data and populate the dropdown
 // Function to fetch department data and populate the dropdown
 function fetchDepartments() {
    $.ajax({
        url: 'forms-editors.php?action=get_departments',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var select = $('#dep_id');
            select.empty();
            $.each(data, function(index, item) {
                var option = $('<option value="' + item.dep_id + '">' + item.dep_name + '</option>');
                if (item.dep_id == '<?php echo $employeeData["dep_id"]; ?>') { // Use == instead of === for loose comparison
                    option.prop('selected', true); // Set the option as selected
                }
                select.append(option);
            });
        }
    });
}


// Function to fetch currency data and populate the dropdown
function fetchCurrencies() {
    $.ajax({
        url: 'forms-editors.php?action=get_currencies',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var select = $('#cur_id');
            select.empty();
            $.each(data, function(index, item) {
                var option = $('<option value="' + item.cur_id + '">' + item.cur_name + '</option>');
                if (item.cur_id == '<?php echo $employeeData["cur_id"]; ?>') {
                    option.prop('selected', true);
                }
                select.append(option);
            });
        }
    });
}


// Function to fetch frequency data and populate the dropdown
function fetchFrequencies() {
    $.ajax({
        url: 'forms-editors.php?action=get_frequencies',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var select = $('#freq_id');
            select.empty();
            $.each(data, function(index, item) {
                var option = $('<option></option>').attr('value', item.freq_id).text(item.freqPay_desc);
                if (item.freq_id == '<?php echo $employeeData["freq_id"]; ?>') {
                    option.prop('selected', true);
                }
                select.append(option);
            });
        }
    });
}
// Function to fetch mode of payment data and populate the dropdown
function fetchModes() {
    $.ajax({
        url: 'forms-editors.php?action=get_modes',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var select = $('#mode_id');
            select.empty();
            $.each(data, function(index, item) {
                var option = $('<option value="' + item.mode_id + '">' + item.modePay_desc + '</option>');
                if (item.mode_id == '<?php echo $employeeData["mode_id"]; ?>') {
                    option.prop('selected', true);
                }
                select.append(option);
            });
        }
    });
}

// Function to fetch status data and populate the dropdown
function fetchStatuses() {
    $.ajax({
        url: 'forms-editors.php?action=get_statuses',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var select = $('#status_id');
            select.empty();
            $.each(data, function(index, item) {
                var option = $('<option value="' + item.status_id + '">' + item.status_name + '</option>');
                if (item.status_id == '<?php echo $employeeData["status_id"]; ?>') {
                    option.prop('selected', true);
                }
                select.append(option);
            });
        }
    });
}

// Function to fetch gender data and populate the dropdown
function fetchGenders() {
    $.ajax({
        url: 'forms-editors.php?action=get_genders',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var select = $('#gender_id');
            select.empty();
            $.each(data, function(index, item) {
                var option = $('<option value="' + item.gender_id + '">' + item.gender_name + '</option>');
                if (item.gender_id == '<?php echo $employeeData["gender_id"]; ?>') {
                    option.prop('selected', true);
                }
                select.append(option);
            });
        }
    });
}
// Call the functions to fetch data for dropdowns when the page loads
$(document).ready(function() {
    fetchDepartments();
    fetchCurrencies();
    fetchFrequencies();
    fetchModes();
    fetchStatuses();
    fetchGenders();
});
    // Rest of your JavaScript code
</script>


</body>

</html>
