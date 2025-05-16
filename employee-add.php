<?php

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nssf = $_POST['nssf'];
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $fatherName = $_POST['fatherName'];
    $fullName = $name . ' ' . $fatherName . ' ' . $lastName;
    $deptCode = $_POST['deptCode'];
    $empDate = $_POST['empDate'];
    $nssfDate = $_POST['nssfDate'];
    $eosDate = $_POST['eosDate'];
    $statusSelect = $_POST['statusSelect'];
    $paymentCurrency = $_POST['radiogroup'];
    $paymentFrequency = $_POST['freqgroup']; 
    $modeOfPayment = $_POST['modegroup'];
    $gender = $_POST['gendergroup'];
    $cd = $_POST['code'];
    $famAllSub = isset($_POST['famAllSub']) ? 1 : 0;
    $eos = $_POST['eosHidden'];



    $query = "SELECT status_id FROM family_status WHERE status_name = :statusName";

    
    try {
        $statement = $pdo->prepare($query);
        $statement->bindParam(':statusName', $statusSelect);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $statusId = $row['status_id'];
        
    echo "<script type='text/javascript'>console.log($statusId);</script><br>";
      
        $check_sql = "SELECT COUNT(*) as count FROM employee WHERE emp_nssf = :nssf";
        $check_stmt = $pdo->prepare($check_sql);
        $check_stmt->bindParam(':nssf', $nssf);
        $check_stmt->execute();
        $row = $check_stmt->fetch(PDO::FETCH_ASSOC);
        $nssf_count = $row['count'];

        if ($nssf_count > 0) {
          echo "<script type='text/javascript'>alert('Info added previously');</script>";
        } else {
          $empDate1 = new DateTime($_POST['empDate']);
          $nssfDate1 = new DateTime($_POST['nssfDate']);
          $eosDate1 = new DateTime($_POST['eosDate']);

          $currentDate = new DateTime(); 

          $empDateComparison = $empDate1->format('Y-m-d') > $currentDate->format('Y-m-d');
          $nssfDateComparison = $nssfDate1->format('Y-m-d') > $currentDate->format('Y-m-d');
          $eosDateComparison = $eosDate1->format('Y-m-d') > $currentDate->format('Y-m-d');

          if ($empDateComparison || $nssfDateComparison || $eosDateComparison) {
            echo "Date in the future";
          } else {
              $sql = "INSERT INTO employee (emp_nssf, emp_name, emp_father, emp_lastName, dep_id, emp_firstDate, emp_nssfDate, emp_eosStartDate, status_id, cur_id, freq_id, mode_id, gender_id, emp_famAllowanceSub, emp_famAllowance, emp_eosSub, emp_motherhood, concat_fname_lname) 
            VALUES (:nssf, :name, :father, :lastName, :deptCode, :empDate, :nssfDate, :eosDate, :statusId, :paymentCurrency, :paymentFrequency, :modeOfPayment, :gender, :famAllowanceSub, :famAllowance, :eosSub, :motherhood, :fullname)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nssf', $nssf);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':father', $fatherName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':deptCode', $deptCode);
            $stmt->bindParam(':empDate', $empDate);
            $stmt->bindParam(':nssfDate', $nssfDate);
            $stmt->bindParam(':eosDate', $eosDate);
            $stmt->bindParam(':statusId', $statusId);
            $stmt->bindParam(':paymentCurrency', $paymentCurrency);
            $stmt->bindParam(':paymentFrequency', $paymentFrequency);
            $stmt->bindParam(':modeOfPayment', $modeOfPayment);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':famAllowanceSub', $famAllSub);
            $stmt->bindParam(':famAllowance', $famAllSub);
            $stmt->bindParam(':eosSub', $eos);
            $stmt->bindParam(':motherhood', $famAllSub);
            $stmt->bindParam(':fullname', $fullName);
    
            
            $stmt->execute();


            $sql1 = "INSERT INTO salary (emp_id, salCat_id, amount) 
                     VALUES (:emp, :salCat, :amt)";
            $stmt = $pdo->prepare($sql1);
            $sqlHist = "INSERT INTO salary_history (emp_id, salCat_id, amount) 
                     VALUES (:emp, :salCat, :amt)";
            $stmtHist = $pdo->prepare($sqlHist);
            for ($i = 0; $i < count($_POST['salCat_id']); $i++) {
              $salCatId = $_POST['salCat_id'][$i];
              $salCatInc = $_POST['salCatInc'][$i];
              
              $stmt->bindParam(':emp',$cd);
              $stmt->bindParam(':salCat', $salCatId);
              $stmt->bindParam(':amt', $salCatInc);
              $stmtHist->bindParam(':emp',$cd);
              $stmtHist->bindParam(':salCat', $salCatId);
              $stmtHist->bindParam(':amt', $salCatInc);
              
              $stmt->execute();
              $stmtHist->execute();
            }
            for ($i = 0; $i < count($_POST['salCat_id1']); $i++) {
              $salCatId = $_POST['salCat_id1'][$i];
              $salCatInc = $_POST['salCatRev'][$i];
              
              $stmt->bindParam(':emp',$cd);
              $stmt->bindParam(':salCat', $salCatId);
              $stmt->bindParam(':amt', $salCatInc);
              $stmtHist->bindParam(':emp',$cd);
              $stmtHist->bindParam(':salCat', $salCatId);
              $stmtHist->bindParam(':amt', $salCatInc);
              
              $stmt->execute();
              $stmtHist->execute();
            }
            $sql2 = "INSERT INTO deduction (deduction_amount, deduction_month, emp_id, salCat_id, deduction_amountPerMonth) 
             VALUES (:amount, :startMonth, :emp, :salCat, :amtPmonth)";
            $stmt = $pdo->prepare($sql2);

            for ($i = 0; $i < count($_POST['salCat_id2']); $i++) {
                $salCatId = $_POST['salCat_id2'][$i];
                $salCatInc = intval($_POST['salCatded'][$i]); 
                $salMonths = intval($_POST['nbOfMonths'][$i]); 

                if ($salMonths != 0) {
                    $monthly = $salCatInc / $salMonths;
                } else {
                    $monthly = 0; 
                }

                if ($salCatInc > 0) {
                    $stmt->bindParam(':amount', $salCatInc);
                    $stmt->bindParam(':startMonth', $salMonths);
                    $stmt->bindParam(':emp', $cd);  
                    $stmt->bindParam(':salCat', $salCatId);
                    $stmt->bindParam(':amtPmonth', $monthly);

                    $stmt->execute();
                }
            }
          }
            
          
          
          }


        

        

}catch(PDOException $e) {  
        echo "PDO Error: " . $e->getMessage();
    }}

?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Employee</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
    var form = document.getElementById('dataForm');
    form.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            var activeElement = document.activeElement;
            var inputs = Array.from(form.querySelectorAll('input[type="text"], input[type="number"], input[type="password"], input[type="email"], input[type="tel"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="week"], input[type="month"], input[type="search"], input[type="url"], input[type="color"]'));
            var index = inputs.indexOf(activeElement);
            console.log('Active element:', activeElement);
console.log('Next input element:', inputs[index + 1]);
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
      <h1>Add Employee</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Employee</li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div>
        <form action='employee-add.php' method='post' name="frm" id="dataForm">
      <label for="code">Code:</label>
      <input type="text" id="code" name="code" class="form-control" readonly required style="width: 20%; display:inline-block; margin-right:2%;"/>

      <?php
        require 'connection.php'; 

        try {
            $sql = "SELECT MAX(emp_id) AS max_code FROM employee";
            $stmt = $pdo->query($sql);
            
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $maxCode = $row['max_code'];
                
                $newCode = $maxCode + 1;
                
                echo "<script>document.getElementById('code').value = $newCode;</script>";
            } else {
                echo "Error in query execution";
            }
        } catch(PDOException $e) {
            echo "PDO Error: " . $e->getMessage();
        }
      ?>

        <label for="nssf">Nssf Num:</label>
        <input type="text" id="nssf" name="nssf" class="form-control" required style="width: 20%; display:inline-block"/><br>
      </div>
      <div style="display:inline-block;">
        <br/>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required />
      </div>
      <div style="display:inline-block;">
        <br/>
        <label for="fatherName">Father Name:</label>
        <input type="text" id="fatherName" name="fatherName" class="form-control" required />
      </div>
      <div style="display:inline-block;">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" class="form-control" required />
      </div>
      <div style="margin-top:2%;">
        <label for="deptCode">Department:</label>
        <script>
          function autofill() {
              var deptCodeInput = document.getElementById('deptCode');
              var deptNameInput = document.getElementById('deptName');
              var deptCodes = document.getElementById('deptCodes').getElementsByTagName('option');
              var deptNames = document.getElementById('deptNames').getElementsByTagName('option');

              deptCodeInput.addEventListener('change', function() {
                  for (var i = 0; i < deptCodes.length; i++) {
                      if (deptCodes[i].value === deptCodeInput.value) {
                          deptNameInput.value = deptNames[i].value;
                          break;
                      }
                  }
              });

              deptNameInput.addEventListener('change', function() {
                  for (var i = 0; i < deptNames.length; i++) {
                      if (deptNames[i].value === deptNameInput.value) {
                          deptCodeInput.value = deptCodes[i].value;
                          break;
                      }
                  }
              });
          }

          window.addEventListener('load', autofill);
        </script>

        <input type="text" id="deptCode" list="deptCodes" name="deptCode" readonly class="form-control" placeholder="Code" required style="width: 10%; display: inline-block; margin-right: 2%;"/>
        <datalist id="deptCodes">
            <?php
            require 'connection.php';

            try {
                $sql = "SELECT dep_id FROM departement";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row["dep_id"] . "'>" . $row["dep_id"] . "</option>";
                    }
                }
            } catch(PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
            }
            ?>
        </datalist>
        <select type="text" id="deptName" name="deptName" class="form-control" placeholder="Name" required style="width: 20%; display: inline-block">
        <option> Select Department</option>
            <?php
            require 'connection.php';

            try {
                $sql = "SELECT dep_name FROM departement";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row["dep_name"] . "'>" . $row["dep_name"] . "</option>";
                    }
                }
            } catch(PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
            }
            ?>
        </select>
      </div><br/>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
        function checkDate(inputId) {
            var inputElement = document.getElementById(inputId);
            var inputDiv = document.getElementById('dateDiv');
            if (inputElement) {
                var selectedDate = new Date(inputElement.value);
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                
                selectedDate.setHours(0, 0, 0, 0);
                if (selectedDate > today) {
                    inputDiv.classList.add('bg-danger', 'text-white');
                } else {
                    inputDiv.classList.remove('bg-danger', 'text-white');
                }
            } else {
                console.error("Input element with ID '" + inputId + "' not found.");
            }
        }

        
      </script>
      <div id="dateDiv">
        <label for="empDate">Empl. Date:</label>
        <input type="date" id="empDate" name="empDate"  class="form-control" required style="width: 20%; display:inline-block; margin-right:2%;" onchange="checkDate('empDate')"/>
        <label for="nssfDate">Nssf Date:</label>
        <input type="date" id="nssfDate" name="nssfDate" class="form-control" required style="width: 20%; display:inline-block" onchange="checkDate('nssfDate')"/>
        <label for="eosDate">EOS start Date:</label>
        <input type="date" id="eosDate" name="eosDate" class="form-control" style="width: 20%; display:inline-block" />
        <input type="hidden" id="eosHidden" name="eosHidden" value="0">

      </div>

      <script>
          document.getElementById('empDate').addEventListener('change', function() {
              var empDateValue = this.value;
              if (empDateValue) {
                  var nssfDateField = document.getElementById('nssfDate');
                  
                  nssfDateField.value = empDateValue;
              }
          });

          document.getElementById('eosDate').addEventListener('change', function() {
            var eosDate = document.getElementById('eosDate').value;
            var eosHidden = document.getElementById('eosHidden');
            eosHidden.value = eosDate ? 1 : 0;
        });
      </script>
      <br/>
      <div>
      
      <select id="statusSelect" name="statusSelect" class="form-control" required style="width: 20%; display:inline-block" onchange="checkDisplay(this)">
        <?php
          require 'connection.php';

          try {
              $sql = "SELECT status_id, status_name FROM family_status";
              $stmt = $pdo->query($sql);
              
              if ($stmt->rowCount() > 0) {
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "<option value='" . $row["status_name"] . "'>" . $row["status_name"] . "</option>";
                  }
              }
          } catch(PDOException $e) {
              echo "PDO Error: " . $e->getMessage();
          }
        ?>
    </select>




        <div style='display:block;'><br/>Payment Currency:
          <?php
                    require 'connection.php';

                    try {
                        $sql = "SELECT cur_id,cur_name FROM currency"; 
                        $stmt = $pdo->query($sql);

                        if ($stmt->rowCount() > 0) {
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<input type='radio' id='" . $row["cur_id"] . "' name='radiogroup' value='" . $row["cur_id"] . "' ' style='margin-left:1%;'>";
                                echo "<label for='" . $row["cur_id"] . "' style='padding-left:1%;'>" . $row["cur_name"] . "</label>"; 
                            }
                        }
                    } catch(PDOException $e) {
                        echo "PDO Error: " . $e->getMessage();
                    }
                  ?>
          </div><br/>
          <div style='display:block;'>Payment Frequency:
          <?php
                    require 'connection.php';

                    try {
                        $sql = "SELECT freq_id,freqPay_desc FROM `frequency of payment`";
                        $stmt = $pdo->query($sql);

                        if ($stmt->rowCount() > 0) {
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<input type='radio' id='" . $row["freq_id"] . "' name='freqgroup' value='" . $row["freq_id"] . "' ' style='margin-left:1%;'>";
                                echo "<label for='" . $row["freq_id"] . "' style='padding-left:1%;'>" . $row["freqPay_desc"] . "</label>"; 
                            }
                        }
                    } catch(PDOException $e) {
                        echo "PDO Error: " . $e->getMessage();
                    }
                  ?>
          </div>
      </div>
      <br/>
      <div>Mode of Payment:
          <?php
                    require 'connection.php';

                    try {
                        $sql = "SELECT mode_id,modePay_desc FROM `mode of payment`";
                        $stmt = $pdo->query($sql);

                        if ($stmt->rowCount() > 0) {
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<input type='radio' id='" . $row["mode_id"] . "' name='modegroup' value='" . $row["mode_id"] . "' ' style='margin-left:1%;'>";
                                echo "<label for='" . $row["mode_id"] . "' style='padding-left:1%;'>" . $row["modePay_desc"] . "</label>"; 
                            }
                        }
                    } catch(PDOException $e) {
                        echo "PDO Error: " . $e->getMessage();
                    }
                  ?>
          </div><br/>
          <div>Gender:
          <?php
                    require 'connection.php';

                    try {
                        $sql = "SELECT gender_id,gender_name FROM gender";
                        $stmt = $pdo->query($sql);

                        if ($stmt->rowCount() > 0) {
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<input type='radio' id='" . $row["gender_id"] . "' name='gendergroup' value='" . $row["gender_id"] . "' ' style='margin-left:1%;'>";
                                echo "<label for='" . $row["gender_id"] . "' style='padding-left:1%;'>" . $row["gender_name"] . "</label>"; 
                            }
                        }
                    } catch(PDOException $e) {
                        echo "PDO Error: " . $e->getMessage();
                    }
                  ?>
          </div><br/>
          <div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              console.log("Document ready");
              $("#dataForm").on('submit', function() {
                
                  console.log("Form submitted");
                  $(this).find('input[type=checkbox]:not(:checked)').each(function () {
                      console.log("Checkbox not checked");
                      $(this).prop('checked', true).val(0);
                  });
              });
          });

        </script>
             <div style="margin-bottom:1%;">
                <label for="famAllSub" disabled>Secured</label>
                <input type="checkbox" id="famAllSub" name="famAllSub" value="1"/>
            </div>
            
          </div>
                  <div>
                    <h3>Incomes</h3>
                    <?php
                        require 'connection.php';

                        try {
                            $sql = "SELECT salCat_id, salCat_name FROM `salary category`
                                            INNER JOIN  `salary category type` ON `salary category`.salCatType_id = `salary category type`.salCatType_id
                                            WHERE salCatType_desc = 'taxable' ";
                            $stmt = $pdo->query($sql);

                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<div style='margin-top:1%;'><label for='" . $row["salCat_id"] . "' style='padding-left:1%;'>" . $row["salCat_name"] . "</label>"; 
                                    echo "<input type='number' id='" . $row["salCat_id"] . "' name='salCatInc[]'  style='margin-left:1%;'>";
                                    echo "<input type='hidden' name='salCat_id[]' value='" . $row["salCat_id"] . "'>";
                                    echo "</div><br/>";
                                }
                            }
                        } catch (PDOException $e) {
                            echo "PDO Error: " . $e->getMessage();
                        }
                    ?>
                  </div>
                 

          
              
              <div>
                <h3>Revenues</h3>
                <?php
                      require 'connection.php';

                      try {
                          $sql = "SELECT salCat_id,salCat_name FROM `salary category`
                                  INNER JOIN  `salary category type` ON `salary category`.salCatType_id=`salary category type`.salCatType_id
                                  WHERE salCatType_desc = 'non taxable' ";
                          $stmt = $pdo->query($sql);

                          if ($stmt->rowCount() > 0) {
                              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                echo "<div style='margin-top:1%;'><label for='" . $row["salCat_id"] . "' style='padding-left:1%;'>" . $row["salCat_name"] . "</label>"; 
                                echo "<input type='number' id='" . $row["salCat_id"] . "' name='salCatRev[]'  style='margin-left:1%;'>";
                                echo "<input type='hidden' name='salCat_id1[]' value='" . $row["salCat_id"] . "'>";
                                echo "</div><br/>";
                              }
                          }
                      } catch(PDOException $e) {
                          echo "PDO Error: " . $e->getMessage();
                      }
                  ?>
              </div>

              <div>
                <h3>Deductions</h3>
                <?php
                      require 'connection.php';

                      try {
                          $sql = "SELECT salCat_id,salCat_name FROM `salary category`
                                  INNER JOIN  `salary category type` ON `salary category`.salCatType_id=`salary category type`.salCatType_id
                                  WHERE salCatType_desc = 'deduction' ";
                          $stmt = $pdo->query($sql);

                          if ($stmt->rowCount() > 0) {
                              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                echo "<div style='margin-top:1%;'><label for='" . $row["salCat_id"] . "' style='padding-left:1%;'>" . $row["salCat_name"] . "</label>"; 
                                echo "<input type='number' id='" . $row["salCat_id"] . "' name='salCatded[]'  style='margin-left:1%;'>";
                                echo "<input type='number' id='nbOfMonths' name='nbOfMonths[]'  style='margin-left:1%;'>";
                                echo "<input type='hidden' name='salCat_id2[]' value='" . $row["salCat_id"] . "'>";
                                echo "</div><br/>";
                              }
                          }
                      } catch(PDOException $e) {
                          echo "PDO Error: " . $e->getMessage();
                      }
                  ?>
              </div>

              
          
          <script>

            document.addEventListener("DOMContentLoaded", function() {
                    checkDisplay(document.getElementById("statusSelect"));
            });

            function checkDisplay(obj) {
                var sec = obj;
                var select = sec.options[sec.selectedIndex].value;
                var button = document.getElementById("addRow");
                
                if (select !== "single") {
                    button.style.display = "inline-block"; 
                } else {
                    button.style.display = "none";
                }
            }



            
          </script>


                      <div id="inputContainer">
                        <h3>Family Members</h3>
                        <div id="show_item">
                          <div class="row">
                            <table width="40%" cellpadding="0" cellspacing="0" id="table1">
                              <tr>
                                <td><strong>Name</strong></td>
                                <td><strong>Age</strong> </td>
                                <td><strong>Secured</strong> </td>
                                <td><strong>Member Type</strong> </td>
                                <td><strong>Gender</strong> </td>
                              </tr>
                           

                            </table>
                            
                          </div>


                        </div>

                      
 



                      </div><br>
                      <button id="addRow" type="button" class="btn btn-success add_item_btn" >Add Row</button><br>

          <button type="submit" id="addEmployeeButton" class="btn btn-primary" style="margin-top:2%;" ><i class="bi bi-save-fill"></i> Add Employee</button>
          </form>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
    var i = 0;
    

    function addRow() {
        var tbl = document.getElementById('table1');
        var lastRow = tbl.rows.length;
        var iteration = lastRow - 1;
        var row = tbl.insertRow(lastRow);

        var firstCell = row.insertCell(0);
        var el = document.createElement('input');
        el.type = 'text';
        el.name = 'memberName';
        el.id = 'name_' + i;
        el.size = 10;
        el.maxlength = 10;
        firstCell.appendChild(el);

        var secondCell = row.insertCell(1);
        var el2 = document.createElement('input');
        el2.type = 'number';
        el2.name = 'age';
        el2.id = 'age_' + i;
        el2.size = 10;
        el2.maxlength = 10;
        secondCell.appendChild(el2);

        var thirdCell = row.insertCell(2);
        var el3 = document.createElement('input');
        el3.type = 'checkbox';
        el3.name = 'secured';
        el3.id = 'secured_' + i;
        thirdCell.appendChild(el3);

        var fourCell = row.insertCell(3);
        var el4 = document.createElement('select');
        el4.name = 'memberType';
        el4.id = 'memberType_' + i;
        el4.size = 1;
        
        fourCell.appendChild(el4);

        var fifthCell = row.insertCell(4);
        var el5 = document.createElement('select');
        el5.name = 'gender';
        el5.id = 'gender_' + i;
        el5.size = 1;
        fifthCell.appendChild(el5);

        var sixthCell = row.insertCell(5);
        var removeBtn = document.createElement('button');
        removeBtn.innerHTML = 'Remove';
        removeBtn.type = 'button';
        removeBtn.className = 'btn btn-danger';
        removeBtn.onclick = function() {
            removeRow(row);
        };
        sixthCell.appendChild(removeBtn);

        fetchMemberTypes(el4);
        fetchGenders(el5);

        i++;
    }

    function removeRow(row) {
        var rowIndex = row.rowIndex;
        document.getElementById('table1').deleteRow(rowIndex);
    }

    function fetchMemberTypes(selectElement) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'fetch_member_types.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var memberTypes = JSON.parse(xhr.responseText);
                    memberTypes.forEach(function(type) {
                        var option = document.createElement("option");
                        option.value = type.memberType_id;
                        option.text = type.memberType_desc;
                        selectElement.appendChild(option);
                    });
                } else {
                    console.error('Failed to fetch member types:', xhr.status);
                }
            }
        };
        xhr.send();
    }

          function fetchGenders(selectElement) {
              var xhr = new XMLHttpRequest();
              xhr.open('GET', 'fetch_genders.php', true);
              xhr.onreadystatechange = function() {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                          var genders = JSON.parse(xhr.responseText); 
                          genders.forEach(function(gender) {
                              var option = document.createElement("option");
                              option.value = gender.id;
                              option.text = gender.name;
                              selectElement.appendChild(option);
                          });
                      } else {
                          console.error('Failed to fetch genders:', xhr.status);
                      }
                  }
              };
              xhr.send();
          }

          $('#addEmployeeButton').click(function(event) {
            var isFutureDate = false;

            var empDate = new Date($('#empDate').val());
            var nssfDate = new Date($('#nssfDate').val());
            var eosDate = new Date($('#eosDate').val());
            var currentDate = new Date();

            if (empDate > currentDate || nssfDate > currentDate || eosDate > currentDate) {
                isFutureDate = true;
            }

            if (isFutureDate) {
                event.preventDefault();
                alert('Date in the future. Please correct the dates.');
            } else {
                var formDataObject = {
                    'code': $('#code').val()
                };

                $('#table1 tbody tr').each(function(index, row) {
                    var rowData = {};

                    $(row).find('input, select').each(function(index, input) {
                        if (input.tagName === 'SELECT') {
                            rowData[input.name] = $(input).val();
                        } else if (input.type === 'checkbox') {
                            rowData[input.name] = input.checked ? 1 : 0;
                        } else {
                            rowData[input.name] = input.value;
                        }
                    });

                    formDataObject['row_' + index] = rowData;
                });

                sendDataToServer(formDataObject);
            }
        });

        function sendDataToServer(formDataObject) {
            $.ajax({
                type: "POST",
                url: "addFamily.php",
                data: formDataObject,
                success: function(response) {
                    console.log("Success:", response);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }





              document.getElementById("addRow").addEventListener("click", addRow);
          </script>
    </section>

  </main>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
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

</body>

</html>