<?php
include 'connection.php';
// Initialize variables
$currentEmployeeId = isset($_GET['id_arb']) ? $_GET['id_arb'] : 1;

// Function to fetch employee data by ID
function fetchEmployeeByIdArb($pdo, $employeeIdArb) {
    $query = "SELECT * FROM `employee_arabic_info` WHERE `id_arb` = :employeeIdArb";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['employeeIdArb' => $employeeIdArb]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$stmt = $pdo->query("SELECT MAX(id_arb) AS max_id FROM employee_arabic_info");
$maxEmployeeIdArb = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];

// Function to update employee Arabic info
function updateEmployeeArabicInfo($pdo, $employeeId, $data) {
  // Prepare the SQL query
  $query = "UPDATE `employee_arabic_info` SET 
          `fname_arb` = :fname_arb,
          `lname_arb` = :lname_arb,
          `father_arb` = :father_arb,
          `emp_fullname_arb` = :emp_fullname_arb,
          `nssf_arb` = :nssf_arb,
          `job_desc_arb` = :job_desc_arb,
          `status_arb` = :status_arb,
          `child_num_arb` = :child_num_arb,
          `work_type_arb` = :work_type_arb,
          `work_hour_arb` = :work_hour_arb,
          `payment_type_arb` = :payment_type_arb,
          `leaving_arb` = :leaving_arb,
          `district_arb` = :district_arb,
          `street_arb` = :street_arb,
          `building_arb` = :building_arb,
          `floor_arb` = :floor_arb,
          `phone_arb` = :phone_arb,
          `email_arb` = :email_arb,
          `mohafaza_arb_id` = :mohafaza_arb_id,
          `casa_arb_id` = :casa_arb_id,
          `region_arb_id` = :region_arb_id,
          `city_arb_id` = :city_arb_id
      WHERE `id_arb` = :employeeId"; // Specify the condition here

  error_log("Employee Arabic Info ID being updated: " . $employeeId); // Log the employee ID being updated

  // Prepare the SQL statement
  $stmt = $pdo->prepare($query);

  // Concatenate first name, last name, and father name to create emp_fullname_arb
  $emp_fullname_arb = $data['fname_arb'] . ' ' . $data['father_arb'] . ' ' . $data['lname_arb'];

  // Bind parameters
  $stmt->bindValue(':fname_arb', $data['fname_arb']);
  $stmt->bindValue(':lname_arb', $data['lname_arb']);
  $stmt->bindValue(':father_arb', $data['father_arb']);
  $stmt->bindValue(':emp_fullname_arb', $emp_fullname_arb); // Bind emp_fullname_arb value
  $stmt->bindValue(':nssf_arb', $data['nssf_arb']);
  $stmt->bindValue(':job_desc_arb', $data['job_desc_arb']);
  $stmt->bindValue(':status_arb', $data['status_arb']);
  $stmt->bindValue(':child_num_arb', $data['child_num_arb']);
  $stmt->bindValue(':work_type_arb', $data['work_type_arb']);
  $stmt->bindValue(':work_hour_arb', $data['work_hour_arb']);
  $stmt->bindValue(':payment_type_arb', $data['payment_type_arb']);
  $stmt->bindValue(':leaving_arb', $data['leaving_arb']);
  $stmt->bindValue(':district_arb', $data['district_arb']);
  $stmt->bindValue(':street_arb', $data['street_arb']);
  $stmt->bindValue(':building_arb', $data['building_arb']);
  $stmt->bindValue(':floor_arb', $data['floor_arb']);
  $stmt->bindValue(':phone_arb', $data['phone_arb']);
  $stmt->bindValue(':email_arb', $data['email_arb']);
  $stmt->bindValue(':mohafaza_arb_id', $data['mohafaza_arb_id']);
  $stmt->bindValue(':casa_arb_id', $data['casa_arb_id']);
  $stmt->bindValue(':region_arb_id', $data['region_arb_id']);
  $stmt->bindValue(':city_arb_id', $data['city_arb_id']);
  $stmt->bindValue(':employeeId', $employeeId);

  // Execute the statement
  $result = $stmt->execute();

  // Check for errors in SQL execution
  if ($result === false) {
      return ['error' => true, 'message' => "Failed to update employee Arabic info: " . $stmt->errorInfo()[2]];
  }

  return ['error' => false, 'message' => "Employee Arabic info with ID $employeeId updated successfully!"];
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['arabic_name'])) {
  $arabic_name = '%' . $_GET['arabic_name'] . '%'; // Add wildcards to the provided Arabic name
  $query = "SELECT * FROM `employee_arabic_info` WHERE `emp_fullname_arb` LIKE :arabic_name";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['arabic_name' => $arabic_name]);
  $employeeData = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll to get only one result

  header('Content-Type: application/json');
  echo json_encode($employeeData);
  exit;
}

// Fetch employee Arabic info data
$employeeData = fetchEmployeeByIdArb($pdo, $currentEmployeeId);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the employee ID from the hidden input field
  // Get the employee ID from the hidden input field
  $employeeId = $_POST['id_arb']; // Assuming the name of the hidden input is 'id_arb'

  // Concatenate first name, last name, and father name to create emp_fullname_arb
  $emp_fullname_arb = $_POST['fname_arb'] . ' ' . $_POST['lname_arb'] . ' ' . $_POST['father_arb'];

  // Get data from the form
  $data = [
      'fname_arb' => $_POST['fname_arb'],
      'lname_arb' => $_POST['lname_arb'],
      'father_arb' => $_POST['father_arb'],
      'emp_fullname_arb' => $emp_fullname_arb,
      'nssf_arb' => $_POST['nssf_arb'],
      'job_desc_arb' => $_POST['job_desc_arb'],
      'status_arb' => $_POST['status_arb'],
      'child_num_arb' => $_POST['child_num_arb'],
      'work_type_arb' => $_POST['work_type_arb'],
      'work_hour_arb' => $_POST['work_hour_arb'],
      'payment_type_arb' => $_POST['payment_type_arb'],
      'leaving_arb' => $_POST['leaving_arb'],
      'district_arb' => $_POST['district_arb'],
      'street_arb' => $_POST['street_arb'],
      'building_arb' => $_POST['building_arb'],
      'floor_arb' => $_POST['floor_arb'],
      'phone_arb' => $_POST['phone_arb'],
      'email_arb' => $_POST['email_arb'],
      'mohafaza_arb_id' => $_POST['mohafaza_arb_id'],
      'casa_arb_id' => $_POST['casa_arb_id'],
      'region_arb_id' => $_POST['region_arb_id'],
      'city_arb_id' => $_POST['city_arb_id'],
  ];

  // Update employee Arabic info
    $updateResult = updateEmployeeArabicInfo($pdo, $employeeId, $data);

 // Check if update was successful
 if (!$updateResult['error']) {
  // Display success notification using JavaScript
  echo "<script>alert('Employee $employeeId updated');</script>";
} else {
  echo '<div class="alert alert-danger" role="alert">' . $updateResult['message'] . '</div>';
}
}

// Check if form was submitted or if there's a search criteria
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['arabic_name'])) {
// If the form was submitted without any search criteria
if (!isset($_GET['arabic_name'])) {
  // Redirect back to the same employee's page
  header("Location: edit_employee_arabic.php?id_arb=$employeeId");
  exit;
} else {
  // If the form was submitted with search criteria
  // Redirect back to the same page with the search results
  header("Location: edit_employee_arabic.php?arabic_name=" . urlencode($_GET['arabic_name']));
  exit;
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Arabic Info</title>
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
  <h1>Employee Arabic Data Editor</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Employee</li>
      <li class="breadcrumb-item active">Edit arabic Employee</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="employee-navigation pb-3">
    <button id="prevEmployee" class="btn btn-primary me-2">السابق</button>
    <span id="currentEmployee" class="fw-bold">رقم الموظف: <?php echo $currentEmployeeId; ?></span>
    <button id="nextEmployee" class="btn btn-primary ms-2">التالي</button>
</div>
<div class="pb-3">
    <div class="row">
        <div class="col-md-2">
        <input type="text" id="employeeName" class="form-control me-2" style="width: 100%;" placeholder="أدخل اسم الموظف">

        </div>
        <div class="col-md-2">
            <button id="searchEmployee" class="btn btn-primary">بحث</button>
        </div>
    </div>
</div>

<form action="edit_employee_arabic.php" method="POST">

<?php
   // Check if $employeeData is not false before iterating over it
   $fields = array(      
     'fname_arb' => 'الاسم ',
     'lname_arb' => 'اسم العائلة',
     'emp_fullname_arb' => 'الاسم الكامل',
     'father_arb' => 'اسم الأب',
     'nssf_arb' => 'NSSF ',
     'job_desc_arb' => 'وصف الوظيفة',
     'status_arb' => 'الحالة',
     'child_num_arb' => 'عدد الأطفال ',
     'payment_type_arb' => 'طريقة دفع الاجر',
     'work_hour_arb' => 'ساعات العمل',
     'work_type_arb' => 'نوع الأجر',
     'leaving_arb' => 'المغادرة',
     'district_arb' => 'الحي',
     'street_arb' => 'الشارع',
     'building_arb' => 'المبنى',
     'floor_arb' => 'الطابق',
     'phone_arb' => 'الهاتف',
     'email_arb' => 'البريد الإلكتروني',
     'mohafaza_arb_id' => 'المحافظة',
     'casa_arb_id' => 'القرية',
     'region_arb_id' => 'المنطقة',
     'city_arb_id' => 'المدينة'
 );

       echo '<div style="padding-top: 30px;"></div>';

       $counter = 0;
       foreach ($fields as $key => $label) {
           if ($counter % 4 == 0) {
               echo '<div class="row">';
           }
           echo '<div class="col-md-3 mb-3">';
           echo '<label for="' . $key . '" class="form-label">' . $label . '</label>';

           // Check if the key contains 'arb' to determine the Arabic input fields
           if ($key == 'status_arb') {
               // Dropdown select list for status_arb
               $status_options = array(
                'أعزب' => 'أعزب',
                'متزوج' => 'متزوج',
                'مطلق' => 'مطلق',
                'أرمل' => 'أرمل'
            );

               echo '<select id="' . $key . '" name="' . $key . '" class="form-control">';
               foreach ($status_options as $option_value => $option_label) {
                   echo '<option value="' . $option_value . '"';
                   if (isset($employeeData['status_arb']) && $employeeData['status_arb'] == $option_value) {
                       echo ' selected';
                   }
                   echo '>' . $option_label . '</option>';
               }
               echo '</select>';
           } elseif ($key == 'work_type_arb') {
               
               $work_type_arb = array(
                   'بالساعة' => 'بالساعة',
                   'يومي' => 'يومي',
                   'شهري' => 'شهري'
               );

               echo '<select id="' . $key . '" name="' . $key . '" class="form-control">';
               foreach ($work_type_arb as $option_value => $option_label) {
                   echo '<option value="' . $option_value . '"';
                   if (isset($employeeData['work_type_arb']) && $employeeData['work_type_arb'] == $option_value) {
                       echo ' selected';
                   }
                   echo '>' . $option_label . '</option>';
               }
               echo '</select>';
           } elseif ($key == 'payment_type_arb') {
               // Dropdown select list for payment_type_arb
               $payment_type_arb = array(
                   'على الانتاج' => 'على الانتاج',
                   'لقاء عمولة' => 'لقاء عمولة',
                   'يومي' => 'يومي',
                   'اسبوعي' => 'اسبوعي',
                   'شهري' => 'شهري'
               );

               echo '<select id="' . $key . '" name="' . $key . '" class="form-control">';
               foreach ($payment_type_arb as $option_value => $option_label) {
                   echo '<option value="' . $option_value . '"';
                   if (isset($employeeData['payment_type_arb']) && $employeeData['payment_type_arb'] == $option_value) {
                       echo ' selected';
                   }
                   echo '>' . $option_label . '</option>';
               }
               echo '</select>';
           } else {
               // For non-Arabic fields, disable input
               echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . htmlspecialchars($employeeData[$key] ?? '') . '" class="form-control">';
           }

           echo '</div>';
           if ($counter % 4 == 3 || $counter == count($fields) - 1) {
               echo '</div>';
           }
           $counter++;
       }
   ?>
    


    <div class="mt-4">
        <input type="hidden" name="id_arb" value="<?php echo $currentEmployeeId; ?>">
        <button  type="submit" class="btn btn-primary">تحديث الموظف</button>

    </div>
</form>


<script>
    $(document).ready(function() {
        // Previous and next employee navigation
        $('#prevEmployee').click(function() {
            var currentId = parseInt(<?php echo $currentEmployeeId; ?>);
            if (currentId > 1) {
                currentId--;
                window.location.href = 'edit_employee_arabic.php?id_arb=' + currentId;
            }
        });

        $('#nextEmployee').click(function() {
            var currentId = parseInt(<?php echo $currentEmployeeId; ?>);
            var maxEmployeeId = <?php echo $maxEmployeeIdArb; ?>;
            if (currentId < maxEmployeeId) {
                currentId++;
                window.location.href = 'edit_employee_arabic.php?id_arb=' + currentId;
            }
        });

// Search for employee by Arabic name
$('#searchEmployee').click(function() {
    var employeeName = $('#employeeName').val().trim();
    if (employeeName !== '') {
        $.ajax({
            url: 'edit_employee_arabic.php',
            method: 'GET',
            data: { arabic_name: employeeName }, // Send the Arabic name as 'arabic_name'
            dataType: 'json',
            success: function(data) {
                if (data !== null) {
                    updateFormFields(data);
                    setCurrentEmployeeId(data.id_arb);
                    $('input[name="id_arb"]').val(data.id_arb);
                    window.location.href = 'edit_employee_arabic.php?id_arb=' + data.id_arb;
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
        alert('Please enter an Arabic employee name to search.');
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
    $('#currentEmployee').text('Employee ID: ' + employeeId); // Change 'Employee' to 'Employee ID'
}
    });
</script>



</body>

</html>
