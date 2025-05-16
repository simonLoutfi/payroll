<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $basis = isset($_POST['basis']) ? $_POST['basis'] : null;
    $percentage = isset($_POST['perc']) ? $_POST['perc'] : null;

    $sql = "INSERT INTO income_contractual (incomeCont_perc,	incomeLabor_perc) VALUES (:basis, :percentage)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':basis', $basis);
    $stmt->bindParam(':percentage', $percentage);

    try {
        $stmt->execute();
    } catch(PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Family Allowances Subscription</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

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
      <h1>Income Tax Contractual</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Parameters</li>
          <li class="breadcrumb-item active">Income Tax Contractual</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <form action="incomeContract.php" method="post" id='myForm'>
    <div>
        <label for="date" style="margin-left:1%;">Date:</label>
        <?php
        require 'connection.php';

        try {
            $sql = "SELECT MAX(changeDate) AS max_date FROM income_contractual";   
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $maxDate = $row['max_date'];
            // Format maxDate to be compatible with the input type 'date'
            $maxDateFormatted = date('Y-m-d', strtotime($maxDate));
            echo "<input id='date' name='date' type='date' style='margin-left:1%;' value='" . $maxDateFormatted . "' />";
        } catch (PDOException $e) {
            echo "PDO Error: " . $e->getMessage();
        }
        ?>

    </div>
    <div>
        <div style='margin-top:1%'>
            <label for='basis' style='margin-left:1%;'>Income Tax Contractual:</label>
            <input id='basis' name='basis' type='text' value='' style='margin-left:1%;'/>
        </div>
        <div style='margin-top:1%'>
            <label for='perc' style='margin-left:1%;'>Income Tax Labor:</label>
            <input id='perc' name='perc' type='text' value='' style='margin-left:1%;'/>
        </div>
    </div>
    <br/>
    <button type="submit" class="btn btn-primary">Change</button>
</form>


<script>
    function checkDisplay(obj) {
        var selectedDate = obj.value;

        // AJAX request to fetch values from the database based on the selected date
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById('basis').value = response['basis'];
                document.getElementById('perc').value = response['perc'];
            }
        };

        // Adjust the date format to match DATETIME format (YYYY-MM-DD HH:MM:SS)
        var formattedDate = selectedDate + ' 00:00:00'; // Assuming time is always 00:00:00 for the selected date

        xhr.open("GET", "incomeContractValues.php?date=" + encodeURIComponent(formattedDate), true);
        xhr.send();
    }



    document.addEventListener("DOMContentLoaded", function() {
        checkDisplay(document.getElementById("date"));
        
    });
    document.getElementById("date").addEventListener("change", function() {
            checkDisplay(this);
        });
</script>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  </footer><!-- End Footer -->

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

</body>

</html>