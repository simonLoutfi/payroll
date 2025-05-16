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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="number"] {
            width: 80%;
            text-align: right;
        }
    </style>
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

        <div class="pagetitle">
            <h1>Personal Income Tax on Earning</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Parameters</li>
                    <li class="breadcrumb-item active">Personal Income Tax on Earning</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <form action="taxOnEarningCtrl.php" method="post">
                <div>
                    <label for="date" style="margin-left:1%;">Date:</label>

                    <!-- 3am bekhoud akbar date mawjoude bel table  kermrl el user yshouf ekher data feto -->
                    <?php
                    require 'connection.php';
                    try {
                        $sql = "SELECT MAX(changeDate) AS max_date FROM taxonearning";
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
                </div></br>

                <h6><u>Income Tax Exemptions</u></h6>

                <div>

                    <table style="border: 1px;">
                        <thead>
                            <tr>
                                <th style="text-align : center ; width:10% ;">Monthly</th>
                                <th style="text-align : center ;">Percentage</th>
                                <th style="text-align : center ;">Monthly Taxable Amount</th>
                                <th style="text-align : center ;">Monthly Tax Amount</th>
                                <th style="text-align : center ;">Yearly Taxable Amount</th>
                                <th style="text-align : center ;">Yearly Tax Amount</th>
                                <th style="text-align : center ;">Cumulative Taxable Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" id="month1" name="month1" value="1" style="width:40%"
                                        readonly /></td>
                                <td>% <input type="number" id="perc_month1" name="perc_month1" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month1_taxable_amount" name="month1_taxable_amount"></td>
                                <td><input type="number" id="month1_tax_amount" name="month1_tax_amount"></td>
                                <td><input type="number" id="yearlyM1_taxable_amount" name="yearlyM1_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM1_tax_amount" name="yearlyM1_tax_amount"  readonly ></td>
                                <td><input type="number" id="cumulative_month1" name="cumulative_month1"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month2" name="month2" value="2" style="width:40%"
                                        readonly /></td>
                                <td>% <input type="number" id="perc_month2" name="perc_month2" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month2_taxable_amount" name="month2_taxable_amount"></td>
                                <td><input type="number" id="month2_tax_amount" name="month2_tax_amount"></td>
                                <td><input type="number" id="yearlyM2_taxable_amount" name="yearlyM2_taxable_amount" readonly >
                                </td>
                                <td><input type="number" id="yearlyM2_tax_amount" name="yearlyM2_tax_amount" readonly ></td>
                                <td><input type="number" id="cumulative_month2" name="cumulative_month2"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month3" name="month3" value="3" style="width:40%"
                                        readonly /></td>
                                <td>% <input type="number" id="perc_month3" name="perc_month3" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month3_taxable_amount" name="month3_taxable_amount"></td>
                                <td><input type="number" id="month3_tax_amount" name="month3_tax_amount"></td>
                                <td><input type="number" id="yearlyM3_taxable_amount" name="yearlyM3_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM3_tax_amount" name="yearlyM3_tax_amount" readonly ></td>
                                <td><input type="number" id="cumulative_month3" name="cumulative_month3"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month3" name="month4" value="4" style="width:40%"
                                        readonly /></td>
                                <td>% <input type="number" id="perc_month4" name="perc_month4" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month4_taxable_amount" name="month4_taxable_amount"></td>
                                <td><input type="number" id="month4_tax_amount" name="month4_tax_amount"></td>
                                <td><input type="number" id="yearlyM4_taxable_amount" name="yearlyM4_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM4_tax_amount" name="yearlyM4_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month4" name="cumulative_month4"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month5" name="month5" value="5" style="width:40%"
                                        readonly /></td>
                                <td>% <input type="number" id="perc_month5" name="perc_month5" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month5_taxable_amount" name="month5_taxable_amount"></td>
                                <td><input type="number" id="month5_tax_amount" name="month5_tax_amount"></td>
                                <td><input type="number" id="yearlyM5_taxable_amount" name="yearlyM5_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM5_tax_amount" name="yearlyM5_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month5" name="cumulative_month5"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month6" name="month6" value="6" style="width:40%"
                                        readonly /></td>
                                <td>% <input type="number" id="perc_month6" name="perc_month6" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month6_taxable_amount" name="month6_taxable_amount"></td>
                                <td><input type="number" id="month6_tax_amount" name="month6_tax_amount"></td>
                                <td><input type="number" id="yearlyM6_taxable_amount" name="yearlyM6_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM6_tax_amount" name="yearlyM6_tax_amount" readonly ></td>
                                <td><input type="number" id="cumulative_month6" name="cumulative_month6"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month7" name="month7" value="7" id="perc_month7"
                                        name="perc_month7" style="width:40%" readonly />
                                </td>
                                <td>% <input type="number" id="perc_month7" name="perc_month7" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month7_taxable_amount" name="month7_taxable_amount"></td>
                                <td><input type="number" id="month7_tax_amount" name="month7_tax_amount"></td>
                                <td><input type="number" id="yearlyM7_taxable_amount" name="yearlyM7_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM7_tax_amount" name="yearlyM7_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month7" name="cumulative_month7"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month8" name="month8" value="8" id="perc_month8"
                                        name="perc_month8" style="width:40%" readonly />
                                </td>
                                <td>% <input type="number" id="perc_month8" name="perc_month8" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month8_taxable_amount" name="month8_taxable_amount"></td>
                                <td><input type="number" id="month8_tax_amount" name="month8_tax_amount"></td>
                                <td><input type="number" id="yearlyM8_taxable_amount" name="yearlyM8_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM8_tax_amount" name="yearlyM8_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month8" name="cumulative_month8"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month9" name="month9" value="9" id="perc_month9"
                                        name="perc_month9" style="width:40%" readonly />
                                </td>
                                <td>% <input type="number" id="perc_month9" name="perc_month9" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month9_taxable_amount" name="month9_taxable_amount"></td>
                                <td><input type="number" id="month9_tax_amount" name="month9_tax_amount"></td>
                                <td><input type="number" id="yearlyM9_taxable_amount" name="yearlyM9_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM9_tax_amount" name="yearlyM9_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month9" name="cumulative_month9"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month10" name="month10" value="10" id="perc_month10"
                                        name="perc_month10" style="width:40%" readonly />
                                </td>
                                <td>% <input type="number" id="perc_month10" name="perc_month10" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month10_taxable_amount" name="month10_taxable_amount"></td>
                                <td><input type="number" id="month10_tax_amount" name="month10_tax_amount"></td>
                                <td><input type="number" id="yearlyM10_taxable_amount" name="yearlyM10_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM10_tax_amount" name="yearlyM10_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month10" name="cumulative_month10"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month11" name="month11" value="11" id="perc_month11"
                                        name="perc_month11" style="width:40%" readonly />
                                </td>
                                <td>% <input type="number" id="perc_month11" name="perc_month11" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month11_taxable_amount" name="month11_taxable_amount"></td>
                                <td><input type="number" id="month11_tax_amount" name="month11_tax_amount"></td>
                                <td><input type="number" id="yearlyM11_taxable_amount" name="yearlyM11_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM11_tax_amount" name="yearlyM11_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month11" name="cumulative_month11"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month12" name="month12" value="12" id="perc_month12"
                                        name="perc_month12" style="width:40%" readonly />
                                </td>
                                <td>% <input type="number" id="perc_month12" name="perc_month12" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month12_taxable_amount" name="month12_taxable_amount"></td>
                                <td><input type="number" id="month12_tax_amount" name="month12_tax_amount"></td>
                                <td><input type="number" id="yearlyM12_taxable_amount" name="yearlyM12_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM12_tax_amount" name="yearlyM12_tax_amount" readonly ></td>
                                <td><input type="number" id="cumulative_month12" name="cumulative_month12"></td>
                            </tr>
                            <tr>
                                <td><input type="number" id="month13" name="month13" value="13" id="perc_month13"
                                        name="perc_month13" style="width:40%" readonly />
                                </td>
                                <td>% <input type="number" id="perc_month13" name="perc_month13" min="0" max="100"
                                        style="width:60%"></td>
                                <td><input type="number" id="month13_taxable_amount" name="month13_taxable_amount"></td>
                                <td><input type="number" id="month13_tax_amount" name="month13_tax_amount"></td>
                                <td><input type="number" id="yearlyM13_taxable_amount" name="yearlyM13_taxable_amount" readonly>
                                </td>
                                <td><input type="number" id="yearlyM13_tax_amount" name="yearlyM13_tax_amount" readonly></td>
                                <td><input type="number" id="cumulative_month13" name="cumulative_month13"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <br />
                <button type="submit" class="btn btn-primary">Change</button>
            </form>


            <script>
                function checkDisplay(obj) {
                    var selectedDate = obj.value;

                    // AJAX request to fetch values from the database based on the selected date
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var response = JSON.parse(xhr.responseText);
                            console.log(response);

                            // Loop through the yearly and monthly inputs
                            for (var i = 0; i < 13; i++) {
                                var record = response[i];
                                var j = i + 1;
                                console.log(record);
                                // Access yearly, monthly, and statuss properties of each object
                                document.getElementById('perc_month' + j).value = record.tax_earning_perc;
                                document.getElementById('month' + j + '_taxable_amount').value = record.monthly_taxable_amount;
                                document.getElementById('month' + j + '_tax_amount').value = record.monthly_tax_amount;
                                document.getElementById('yearlyM' + j + '_taxable_amount').value = record.yearly_taxable_amount
                                document.getElementById('yearlyM' + j + '_tax_amount').value = record.yearly_tax_amount;                                    //document.getElementById('yearlyM' + j + '_tax_amount').value = record.yearly_tax_amount;
                                document.getElementById('cumulative_month' + j).value = record.cumulative_taxable_amount;
                            }
                        }
                    };

                    // Adjust the date format to match DATETIME format (YYYY-MM-DD HH:MM:SS)
                    var formattedDate = selectedDate + ' 00:00:00'; // Assuming time is always 00:00:00 for the selected date

                    xhr.open("GET", "taxOnEarningInfo.php?date=" + encodeURIComponent(formattedDate), true);
                    xhr.send();
                }




                document.addEventListener("DOMContentLoaded", function () {
                    checkDisplay(document.getElementById("date"));

                });
                document.getElementById("date").addEventListener("change", function () {
                    checkDisplay(this);
                });
            </script>

            <script>
                // Function to calculate yearly values
                function calculateYearly(monthlyTaxableId, monthlyTaxId, yearlyTaxableId, yearlyTaxId) {
                    var monthlyTaxable = parseFloat(document.getElementById(monthlyTaxableId).value);
                    var monthlyTax = parseFloat(document.getElementById(monthlyTaxId).value);
                    if (!isNaN(monthlyTaxable) && !isNaN(monthlyTax)) {
                        var yearlyTaxable = monthlyTaxable * 12;
                        var yearlyTax = monthlyTax * 12;
                        document.getElementById(yearlyTaxableId).value = yearlyTaxable;
                        document.getElementById(yearlyTaxId).value = yearlyTax;
                    }
                }

                // Attach event listeners to monthly taxable and tax amount fields
                document.getElementById('month1_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month1_taxable_amount', 'month1_tax_amount', 'yearlyM1_taxable_amount', 'yearlyM1_tax_amount');
                });
                document.getElementById('month1_tax_amount').addEventListener('change', function () {
                    calculateYearly('month1_taxable_amount', 'month1_tax_amount', 'yearlyM1_taxable_amount', 'yearlyM1_tax_amount');
                });
                
                // for month 2
                document.getElementById('month2_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month2_taxable_amount', 'month2_tax_amount', 'yearlyM2_taxable_amount', 'yearlyM2_tax_amount');
                });
                document.getElementById('month2_tax_amount').addEventListener('change', function () {
                    calculateYearly('month2_taxable_amount', 'month2_tax_amount', 'yearlyM2_taxable_amount', 'yearlyM2_tax_amount');
                });

                // for month 3
                document.getElementById('month3_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month3_taxable_amount', 'month3_tax_amount', 'yearlyM3_taxable_amount', 'yearlyM3_tax_amount');
                });
                document.getElementById('month3_tax_amount').addEventListener('change', function () {
                    calculateYearly('month3_taxable_amount', 'month3_tax_amount', 'yearlyM3_taxable_amount', 'yearlyM3_tax_amount');
                });

                // for month 4
                document.getElementById('month4_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month4_taxable_amount', 'month4_tax_amount', 'yearlyM4_taxable_amount', 'yearlyM4_tax_amount');
                });
                document.getElementById('month4_tax_amount').addEventListener('change', function () {
                    calculateYearly('month4_taxable_amount', 'month4_tax_amount', 'yearlyM4_taxable_amount', 'yearlyM4_tax_amount');
                });

                // for month 5
                document.getElementById('month5_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month5_taxable_amount', 'month5_tax_amount', 'yearlyM5_taxable_amount', 'yearlyM5_tax_amount');
                });
                document.getElementById('month5_tax_amount').addEventListener('change', function () {
                    calculateYearly('month5_taxable_amount', 'month5_tax_amount', 'yearlyM5_taxable_amount', 'yearlyM5_tax_amount');
                });

                // for month 6
                document.getElementById('month6_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month6_taxable_amount', 'month6_tax_amount', 'yearlyM6_taxable_amount', 'yearlyM6_tax_amount');
                });
                document.getElementById('month6_tax_amount').addEventListener('change', function () {
                    calculateYearly('month6_taxable_amount', 'month6_tax_amount', 'yearlyM6_taxable_amount', 'yearlyM6_tax_amount');
                });

                // for month 7
                document.getElementById('month7_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month7_taxable_amount', 'month7_tax_amount', 'yearlyM7_taxable_amount', 'yearlyM7_tax_amount');
                });
                document.getElementById('month7_tax_amount').addEventListener('change', function () {
                    calculateYearly('month7_taxable_amount', 'month7_tax_amount', 'yearlyM7_taxable_amount', 'yearlyM7_tax_amount');
                });

                // for month 8
                document.getElementById('month8_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month8_taxable_amount', 'month8_tax_amount', 'yearlyM8_taxable_amount', 'yearlyM8_tax_amount');
                });
                document.getElementById('month8_tax_amount').addEventListener('change', function () {
                    calculateYearly('month8_taxable_amount', 'month8_tax_amount', 'yearlyM8_taxable_amount', 'yearlyM8_tax_amount');
                });

                // for month 9
                document.getElementById('month9_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month9_taxable_amount', 'month9_tax_amount', 'yearlyM9_taxable_amount', 'yearlyM9_tax_amount');
                });
                document.getElementById('month9_tax_amount').addEventListener('change', function () {
                    calculateYearly('month9_taxable_amount', 'month9_tax_amount', 'yearlyM9_taxable_amount', 'yearlyM9_tax_amount');
                });

                // for month 10
                document.getElementById('month10_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month10_taxable_amount', 'month10_tax_amount', 'yearlyM10_taxable_amount', 'yearlyM10_tax_amount');
                });
                document.getElementById('month10_tax_amount').addEventListener('change', function () {
                    calculateYearly('month10_taxable_amount', 'month10_tax_amount', 'yearlyM10_taxable_amount', 'yearlyM10_tax_amount');
                });

                // for month 11
                document.getElementById('month11_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month11_taxable_amount', 'month11_tax_amount', 'yearlyM11_taxable_amount', 'yearlyM11_tax_amount');
                });
                document.getElementById('month11_tax_amount').addEventListener('change', function () {
                    calculateYearly('month11_taxable_amount', 'month11_tax_amount', 'yearlyM11_taxable_amount', 'yearlyM11_tax_amount');
                });

                // for month 12
                document.getElementById('month12_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month12_taxable_amount', 'month12_tax_amount', 'yearlyM12_taxable_amount', 'yearlyM12_tax_amount');
                });
                document.getElementById('month12_tax_amount').addEventListener('change', function () {
                    calculateYearly('month12_taxable_amount', 'month12_tax_amount', 'yearlyM12_taxable_amount', 'yearlyM12_tax_amount');
                });

                // for month 13
                document.getElementById('month13_taxable_amount').addEventListener('change', function () {
                    calculateYearly('month13_taxable_amount', 'month13_tax_amount', 'yearlyM13_taxable_amount', 'yearlyM13_tax_amount');
                });
                document.getElementById('month13_tax_amount').addEventListener('change', function () {
                    calculateYearly('month13_taxable_amount', 'month13_tax_amount', 'yearlyM13_taxable_amount', 'yearlyM13_tax_amount');
                });
            </script>

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></>
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