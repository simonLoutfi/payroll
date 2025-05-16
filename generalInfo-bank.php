<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bankName = $_POST['bank_name'];
    $branchLocation = $_POST['branch_location'];

    // Check if bank name already exists in the database
    $queryCheckBank = "SELECT bank_id FROM bank WHERE bank_name = :bankName";
    $stmtCheckBank = $pdo->prepare($queryCheckBank);
    $stmtCheckBank->execute(['bankName' => $bankName]);
    $existingBank = $stmtCheckBank->fetch(PDO::FETCH_ASSOC);

    if (!$existingBank) {
        // Insert new bank name if it doesn't exist
        $queryInsertBank = "INSERT INTO bank (bank_name) VALUES (:bankName)";
        $stmtInsertBank = $pdo->prepare($queryInsertBank);
        $stmtInsertBank->execute(['bankName' => $bankName]);

        $bankId = $pdo->lastInsertId(); // Get the ID of the newly inserted bank
    } else {
        $bankId = $existingBank['bank_id']; // Use the existing bank ID
    }

    // Insert branch location along with bank ID
    $queryInsertBranch = "INSERT INTO `bank branch` (bank_id, bankBranch_location) VALUES (:bankId, :branchLocation)";
    $stmtInsertBranch = $pdo->prepare($queryInsertBranch);
    $stmtInsertBranch->execute(['bankId' => $bankId, 'branchLocation' => $branchLocation]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>bank</title>
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

  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Include jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
        <!-- <img src="assets/img/logo.png" alt=""> -->
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
  </script>
<script>
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

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
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
  <div id="iframeContainer"></div>

    <div class="pagetitle">
      <h1>Bank</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">General Info</li>
          <li class="breadcrumb-item active">Bank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        <!-- Horizontal Form -->
        <form action="generalInfo-bank.php" method="post" id='myForm'>
          <div class="row mb-3">
          <label for="bankNameInput" class="col-sm-2 col-form-label">Bank name</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="bankNameInput" name="bank_name">
            </div>
          </div>
          <div class="row mb-3">
            <label for="branchLocationInput" class="col-sm-2 col-form-label">Branch location</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="branchLocationInput" name="branch_location">
            </div>
          </div>
          <div class="text-start">
            <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form><!-- End Horizontal Form -->
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
   $(document).ready(function() {
  $('#bankNameInput').autocomplete({
    source: function(request, response) {
      $.ajax({
        url: "generalInfo-bank_names.php",
        type: "GET",
        dataType: "json",
        data: {
          action: 'bankNames', // Specify the action for bank names
          term: request.term
        },
        success: function(data) {
          console.log("Received bank names data from port " + window.location.port + ":", data); // Include port information
          response(data);
        },
        error: function(xhr, status, error) {
          console.error("Error fetching bank names from port " + window.location.port + ":", error); // Include port information
        }
      });
    },
    minLength: 1
  });

  $('#branchLocationInput').autocomplete({
    source: function(request, response) {
      $.ajax({
        url: "generalInfo-bank_branches.php",
        type: "GET",
        dataType: "json",
        data: {
          action: 'branchLocations', // Specify the action for branch locations
          term: request.term
        },
        success: function(data) {
          console.log("Received branch locations data from port " + window.location.port + ":", data); // Include port information
          response(data);
        },
        error: function(xhr, status, error) {
          console.error("Error fetching branch locations from port " + window.location.port + ":", error); // Include port information
        }
      });
    },
    minLength: 1
  });
});
</script>

</body>

</html>