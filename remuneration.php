<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Remuneration</title>
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
      <h1>Remuneration</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Remuneration</li>
          <li class="breadcrumb-item active">Remuneration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div id="iframeContainer"></div>

        <form action="remuneration.php" method="post" id='myForm'>
            <div style='margin-top:1%'>
                <label for='month' style='margin-left:1%;'>Month:</label>
                <select id="monthSelect" name="monthSelect" class="form-control" required style="width: 20%; display:inline-block;">
                  <?php
                    require 'connection.php';

                    try {
                        $sql = "SELECT period_id, period_name FROM `period`";
                        $stmt = $pdo->query($sql);
                        
                        if ($stmt->rowCount() > 0) {
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row["period_id"] . "'>" . $row["period_name"] . "</option>";
                            }
                        }
                    } catch(PDOException $e) {
                        echo "PDO Error: " . $e->getMessage();
                    }
                  ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:2%; margin-bottom:2%;">Calculate</button>
            <?php
              require_once 'connection.php';

              if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['monthSelect'])) {
                  try {
                    $month = $_POST['monthSelect'];

                    $query = "SELECT * FROM remuneration WHERE emp_id = :employeeId AND YEAR(period) = YEAR(CURRENT_DATE()) AND MONTH(period) = :selectedMonth";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
                    $stmt->bindParam(':selectedMonth', $month, PDO::PARAM_INT);
                    $stmt->execute();
                    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($rows!== false){
                    ?>

              <table>
                  <thead>
                      <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Tax to Pay</th>
                        <th>Family Allowances</th>
                        <th>Non Taxable Amount</th>
                        <th>Deductions Amount</th>
                        <th>Nssf Amount</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($rows as $row): ?>
                          <tr>
                            <td><?php echo $employeeId; ?></td>
                            <td><?php echo $employeeName; ?></td>
                            <td><?php echo $amount; ?></td>
                            <td><?php echo $taxToPay[$employeeId]; ?></td>
                            <td><?php echo $amountFamily; ?></td>
                            <td><?php echo $rowNoTax['amountNoTax']; ?></td>
                            <td><?php echo $deductionRows[0]['amountToPay']; ?></td>
                            <td><?php echo $payToNssf; ?></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
              <?php }else{

                    $sqlTax = "SELECT *
                    FROM taxonearning
                    WHERE tax_earning_perc != 0
                      AND (
                        (
                          MONTH(changeDate) = :month
                          AND YEAR(changeDate) = YEAR(NOW())
                          AND changeDate = (
                            SELECT MAX(changeDate)
                            FROM taxonearning
                            WHERE MONTH(changeDate) = :month
                              AND YEAR(changeDate) = YEAR(NOW())
                          )
                        )
                        OR (
                          :month NOT IN (SELECT DISTINCT MONTH(changeDate) FROM taxonearning WHERE YEAR(changeDate) = YEAR(NOW()))
                          AND changeDate = (
                            SELECT MAX(changeDate)
                            FROM taxonearning
                            WHERE MONTH(changeDate) < :month
                              AND YEAR(changeDate) = YEAR(NOW())
                          )
                        )
                      )
                    ORDER BY changeDate DESC;
                    ";
      
                    $stmtTax = $pdo->prepare($sqlTax);
                    $stmtTax->bindParam(':month', $month, PDO::PARAM_INT);
                    $stmtTax->execute();
                    $taxInfo = $stmtTax->fetchAll(PDO::FETCH_ASSOC);

                      if ($taxInfo && is_array($taxInfo)) {
                          $sql = "SELECT e.emp_id, e.concat_fname_lname, e.cur_id, SUM(s.amount) AS total_amount, e.emp_famAllowance, e.emp_famAllowanceSub,e.emp_eosSub,e.emp_motherhood
                          FROM employee e
                          INNER JOIN salary s ON e.emp_id = s.emp_id
                          INNER JOIN `salary category` sc ON sc.salCat_id = s.salCat_id
                          INNER JOIN `salary category type` sct ON sc.salCatType_id = sct.salCatType_id
                          WHERE sct.salCatType_desc = 'taxable' 
                          GROUP BY e.emp_id
                          ORDER BY e.emp_id
                          ";

                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          $taxToPay = []; 
                          $closedMessageDisplayed = false;

                          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          echo '<script>console.log('.json_encode($results).');</script>';

                          ?>

                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Employee ID</th>
                                      <th>Name</th>
                                      <th>Amount</th>
                                      <th>Tax to Pay</th>
                                      <th>Family Allowances</th>
                                      <th>Non Taxable Amount</th>
                                      <th>Nssf Amount</th>
                                      <th>Deductions Amount</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>

                          <?php
                          foreach ($results as $row) {
                              $employeeId = $row['emp_id'];
                              $employeeName = $row['concat_fname_lname'];
                              $curId = $row['cur_id'];
                              $amountFamily = 0;
                              $membersCounter=0;
                              $payToNssf=0;

                              $beginningOfYear = date('Y-01-01');
                              $currentYear = date('Y');
                              $selectedDate = date('Y-m-d', strtotime($currentYear . '-' . $month . '-30'));


                              $sql = "SELECT 
                                          rate
                                      FROM 
                                          rate r
                                      WHERE 
                                          r.cur_id = :curr AND
                                          (
                        (
                          MONTH(r.rate_date) = :month
                          AND YEAR(r.rate_date) = YEAR(NOW())
                          AND r.rate_date = (
                            SELECT MAX(r.rate_date)
                            FROM rate r
                            WHERE MONTH(r.rate_date) = :month
                              AND YEAR(r.rate_date) = YEAR(NOW())
                          )
                        )
                        OR (
                          :month NOT IN (SELECT DISTINCT MONTH(r.rate_date) FROM rate r WHERE YEAR(r.rate_date) = YEAR(NOW()))
                          AND r.rate_date = (
                            SELECT MAX(r.rate_date)
                            FROM rate r
                            WHERE MONTH(r.rate_date) <= :month
                              AND YEAR(r.rate_date) = YEAR(NOW())
                          )
                        )
                      )";

                  
    
                              $stmt = $pdo->prepare($sql);
                              $stmt->bindParam(':curr', $curId);
                              $stmt->bindParam(':month', $month);
                              $stmt->execute();
                              $currResult = $stmt->fetch(PDO::FETCH_ASSOC);
                              if( !isset($currResult['rate'])) $rate =1; //line 519
                              else $rate=$currResult['rate'];
                              

                              $amount = $row['total_amount']*$rate;

                              $sql = "SELECT 
                                          SUM(amount) AS total_amount, 
                                          SUM(taxToPay) AS paidTaxes
                                      FROM 
                                          remuneration r
                                      WHERE 
                                          r.emp_id = :employee AND
                                          r.period >= :beginningOfYear AND
                                          MONTH(r.period) < :selectedMonth ";
    
                              $stmt = $pdo->prepare($sql);
                              $stmt->bindParam(':employee', $employeeId, PDO::PARAM_INT);
                              $stmt->bindParam(':beginningOfYear', $beginningOfYear, PDO::PARAM_STR);
                              $stmt->bindParam(':selectedMonth', $month, PDO::PARAM_STR);
                              $stmt->execute();
                              $remunerationResult = $stmt->fetch(PDO::FETCH_ASSOC);
                              $taxToPay = []; 
                              $taxToPay[$employeeId] = 0;

                              $sqlMembers = "SELECT 
                                          COUNT(member_id) as total_members
                                      FROM 
                                          family_member fm
                                      WHERE 
                                          fm.emp_id = :employee AND
                                          fm.f_secured = 0 AND
                                          fm.member_age < 25";
    
                              $stmtMembers = $pdo->prepare($sqlMembers);
                              $stmtMembers->bindParam(':employee', $employeeId, PDO::PARAM_INT);
                              $stmtMembers->execute();
                              $membersResult = $stmtMembers->fetch(PDO::FETCH_ASSOC);
                              $nbOfMembers = $membersResult['total_members'] + 2;
$nbOfMembersAll=$nbOfMembers-3;
                              $sqlExemptions = "SELECT 
                                                    monthly
                                                FROM 
                                                    exemptions_tax et
                                                WHERE 
                                                    et.id_exemption = :famStatus AND
                                                    et.changeDate = (SELECT MAX(changeDate) 
                                                                    FROM exemptions_tax 
                                                                    WHERE MONTH(changeDate) <= :selectedMonth 
                                                                    AND changeDate <= :selectedDate) ";
    
                              $stmtExemptions = $pdo->prepare($sqlExemptions);
                              $stmtExemptions->bindParam(':famStatus', $nbOfMembers, PDO::PARAM_INT);
                              $stmtExemptions->bindParam(':selectedMonth', $month);
                              $stmtExemptions->bindParam(':selectedDate', $selectedDate);
                              $stmtExemptions->execute();
                              $exemptionsResult = $stmtExemptions->fetch(PDO::FETCH_ASSOC);
                              $exemptionsValues = $exemptionsResult['monthly'];
                              echo "<script>console.log(" . json_encode($exemptionsValues) . ");</script>";

                              //if ($nbOfMembersAll > 1) {
                                $sqlFam = "SELECT f.memberType_id
                                          FROM family_member f
                                          INNER JOIN `member type` mt ON f.memberType_id = mt.memberType_id 
                                          WHERE f.f_secured = 1 AND f.emp_id = :employeeId AND mt.memberType_desc='partner'";


                                $stmt = $pdo->prepare($sqlFam);
                                $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
                                $stmt->execute();
                                $wifeSecured = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                if ($wifeSecured !== false) {
                                    $wifeMoney = 0;
                                    $single = 0;
                                    
                                    // if ($nbOfMembersAll == 2) {
                                    //     $sqlFam = "SELECT monthly
                                    //                 FROM exemptions_tax et
                                    //                 WHERE et.statuss = 'single' AND
                                    //                     et.changeDate = (SELECT MAX(changeDate) 
                                    //                                     FROM exemptions_tax 
                                    //                                     WHERE MONTH(changeDate) <= :selectedMonth 
                                    //                                     AND changeDate <= :selectedDate)";
                                        
                                    //     $stmt = $pdo->prepare($sqlFam);
                                    //     $stmt->bindParam(':selectedMonth', $month);
                                    //     $stmt->bindParam(':selectedDate', $selectedDate);
                                    //     $stmt->execute();
                                    //     $wifeExemp = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        
                                    //     if (!empty($wifeExemp)) {
                                    //         $wifeMoney = $exemptionsValues - $wifeExemp[0]['monthly'];
                                    //         $single = $wifeExemp[0]['monthly'];
                                    //         $exemptionsValues -= $wifeMoney;
                                    //     }
                                    // } else {
                                      $sqlFam = "SELECT monthly
                                                    FROM exemptions_tax et
                                                    WHERE et.statuss = 'single' AND
                                                        et.changeDate = (SELECT MAX(changeDate) 
                                                                        FROM exemptions_tax 
                                                                        WHERE MONTH(changeDate) <= :selectedMonth 
                                                                        AND changeDate <= :selectedDate)";
                                        
                                        $stmt = $pdo->prepare($sqlFam);
                                        $stmt->bindParam(':selectedMonth', $month);
                                        $stmt->bindParam(':selectedDate', $selectedDate);
                                        $stmt->execute();
                                        $wifeExemp = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        if (!empty($wifeExemp)) {
                                            $wifeMoney = $wifeExemp[0]['monthly']/2;
                                            $single = $wifeExemp[0]['monthly'];
                                            
                                        }
                                        $childs = ($single/10);
                                        $exemptionsValues -= ($wifeMoney + $childs);
                                        echo "<script>console.log($exemptionsValues);</script>";
                                    //}
                                }
                            //}
                            



                              if($remunerationResult['paidTaxes'] !== null){
                                $previousSalaries = $remunerationResult['total_amount'];
                                $previousTaxes = $remunerationResult['paidTaxes'];

                                $cumulativeAmount = $amount + $previousSalaries;

                                $sqlMonth = "SELECT MONTH(MIN(period)) AS min_month
                                            FROM remuneration
                                            WHERE emp_id = :employee
                                            GROUP BY emp_id";

                                $stmtMonth = $pdo->prepare($sqlMonth);
                                $stmtMonth->bindParam(':employee', $employeeId, PDO::PARAM_INT);
                                $stmtMonth->execute();
                                $rowMonth = $stmtMonth->fetch(PDO::FETCH_ASSOC); 
                                $workedMonths = 0;
                              if ($rowMonth !== false) {
                                    $minMonth = $rowMonth["min_month"]; 
                                    $workedMonths = 1;
                                    if ($minMonth !== $month) {
                                        $workedMonths = $month - $minMonth + 1;
                                    }
                                }

                                $cumulativeAmount -= $exemptionsValues*$workedMonths; 

                                foreach ($taxInfo as $taxBracket) {
                                  $monthlyTaxableAmount = $taxBracket['monthly_taxable_amount'];
                                  $monthlyTaxAmount = $taxBracket['monthly_tax_amount'];
                                  $taxPerc = $taxBracket['tax_earning_perc'];

                                  if ($cumulativeAmount > ($monthlyTaxableAmount*$workedMonths)) {
                                      $taxToPay[$employeeId] += ($monthlyTaxAmount*$workedMonths); 
                                      $cumulativeAmount -= ($monthlyTaxableAmount*$workedMonths);
                                  } else {
                                      $taxToPay[$employeeId] += ($cumulativeAmount * ($taxPerc/100));
                                      break; 
                                  }
                                  
                                }
                                $taxToPay[$employeeId] -= $previousTaxes;

                              }else{
                                $cumulativeAmount = $amount - $exemptionsValues;
                                foreach ($taxInfo as $taxBracket) {
                                  $monthlyTaxableAmount = $taxBracket['monthly_taxable_amount'];
                                  $monthlyTaxAmount = $taxBracket['monthly_tax_amount'];
                                  $taxPerc = $taxBracket['tax_earning_perc'];

                                  if ($cumulativeAmount > $monthlyTaxableAmount) {
                                      $taxToPay[$employeeId] += $monthlyTaxAmount; 
                                      $cumulativeAmount -= $monthlyTaxableAmount;
                                  } else {
                                      $taxToPay[$employeeId] += ($cumulativeAmount * ($taxPerc/100));
                                      break; 
                                  }
                                  
                                }
                              }


                              if ($row['emp_famAllowance'] == 1) {
                                $sqlFam = "SELECT mt.memberType_id, mt.memberType_desc 
                                            FROM family_member f
                                            INNER JOIN `member type` mt ON f.memberType_id=mt.memberType_id 
                                            WHERE f.f_secured = 0 AND f.emp_id = :employeeId AND f.member_age < 25";
                            
                                $stmt = $pdo->prepare($sqlFam);
                                $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
                                $stmt->execute();
                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                foreach ($results as $innerRow) { 
                                  if($membersCounter<5){
                                    $sqlAllowance = "SELECT amount
                                                    FROM family_allowances
                                                    WHERE MONTH(changeDate) <= :month
                                                    AND changeDate = (
                                                        SELECT MAX(changeDate)
                                                        FROM family_allowances
                                                        WHERE MONTH(changeDate) <= :month)
                                                    AND memberType_id = :member";
                            
                                    $stmt = $pdo->prepare($sqlAllowance);
                                    $stmt->bindParam(':month', $month, PDO::PARAM_INT);
                                    $stmt->bindParam(':member', $innerRow['memberType_id'], PDO::PARAM_INT); 
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            
                                    $amountFamily += $result['amount'];  //line 517
                                    if($innerRow['memberType_desc'] == 'child'){
                                      $membersCounter++;
                                    }
                                    
                                  }
                                }
                            }
                            

                            $sqlNoTax = "SELECT SUM(s.amount) AS amountNoTax
                                                FROM salary s
                                                INNER JOIN `salary category` sc ON sc.salCat_id = s.salCat_id
                                                INNER JOIN `salary category type` sct ON sc.salCatType_id = sct.salCatType_id
                                                WHERE s.emp_id = :employeeId
                                                AND sct.salCatType_desc = 'non taxable'";
                            $stmtNoTax = $pdo->prepare($sqlNoTax);
                            $stmtNoTax->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
                            $stmtNoTax->execute();
                            $rowNoTax = $stmtNoTax->fetch(PDO::FETCH_ASSOC);
                            

                            if ($row['emp_famAllowanceSub'] == 1 ) {
                              $sqlSub = $pdo->prepare("SELECT famAllSubs_perc, famAllSubs_basis
                                                        FROM fam_allowance_subs fms
                                                        WHERE fms.changeDate = (
                                                            SELECT MAX(changeDate)
                                                            FROM fam_allowance_subs
                                                            WHERE MONTH(changeDate) <= ?)");

                              $sqlSub->bindParam(1, $month);
                              $sqlSub->execute();
                              $rowSub = $sqlSub->fetch(PDO::FETCH_ASSOC);

                              if($amount>$rowSub['famAllSubs_basis']){
                                $payToNssf += ($rowSub['famAllSubs_basis'] * ($rowSub['famAllSubs_perc']/100));
                              }else{
                                $payToNssf += ($amount * ($rowSub['famAllSubs_perc']/100));
                              }

                            }
                   
                            if ($row['emp_motherhood'] == 1 ) {
                              $sqlSub = $pdo->prepare("SELECT motherhood_basis, motherhood_staff
                                                        FROM motherhood m
                                                        WHERE m.changeDate = (
                                                            SELECT MAX(changeDate)
                                                            FROM motherhood
                                                            WHERE MONTH(changeDate) <= ?)");

                              $sqlSub->bindParam(1, $month);
                              $sqlSub->execute();
                              $rowSub = $sqlSub->fetch(PDO::FETCH_ASSOC);

                              if($amount>$rowSub['motherhood_basis']){
                                $payToNssf += ($rowSub['motherhood_basis'] * ($rowSub['motherhood_staff']/100));
                              }else{
                                $payToNssf += ($amount * ($rowSub['motherhood_staff']/100));
                              }

                            }
                           
                            if ($row['emp_eosSub'] == 1 ) {
                              $sqlSub = $pdo->prepare("SELECT eosSubs_compContr, eosSubs_compSur
                                                        FROM eos_subscription eos
                                                        WHERE eos.changeDate = (
                                                            SELECT MAX(changeDate)
                                                            FROM eos_subscription
                                                            WHERE MONTH(changeDate) <= ?)");

                              $sqlSub->bindParam(1, $month);
                              $sqlSub->execute();
                              $rowSub = $sqlSub->fetch(PDO::FETCH_ASSOC);

                              $payToNssf += ($amount * (($rowSub['eosSubs_compContr']+$rowSub['eosSubs_compSur'])/100));
   
                            }
                                

                              
                              
                              ?>

                              <tr>
                                  <td><?php echo $employeeId; ?></td>
                                  <td><?php echo $employeeName; ?></td>
                                  <td><?php echo $amount; ?></td>
                                  <td><?php echo $taxToPay[$employeeId]; ?></td>
                                  <td><?php echo $amountFamily; ?></td>
                                  <td><?php echo $rowNoTax['amountNoTax']*$rate; ?></td>
                                  
                                  <td><?php echo $payToNssf; ?></td>
                              

                              <?php     

                                try {
                                  $checkQuery = "SELECT period_id FROM period WHERE f_closed=1 AND period_id = :selectedMonth";
                                  $stmtCheck = $pdo->prepare($checkQuery);
                                  $stmtCheck->bindParam(':selectedMonth', $month, PDO::PARAM_INT);
                                  $stmtCheck->execute();
                                  $rowCount = $stmtCheck->rowCount();

                                  if ($rowCount > 0 ) {
                                    if(!$closedMessageDisplayed){
                                      echo 'Month Closed!';
                                      $closedMessageDisplayed = true;
                                    }
                                    
                                }else{
                                    $checkQuery = "SELECT COUNT(*) FROM remuneration WHERE emp_id = :employeeId AND YEAR(period) = YEAR(CURRENT_DATE()) AND MONTH(period) = :selectedMonth";
                                    $stmtCheck = $pdo->prepare($checkQuery);
                                    $stmtCheck->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
                                    $stmtCheck->bindParam(':selectedMonth', $month, PDO::PARAM_INT);
                                    $stmtCheck->execute();
                                    $rowCount = $stmtCheck->fetchColumn();

                                    if ($rowCount > 0) {
                                        $updateQuery = "UPDATE remuneration SET emp_name = :fullName, amount = :totalAmount, taxToPay = :taxToPay, famAllowance = :familyAllowances, nonTaxable = :nonTaxableAmount, deduction = :deductionsAmount, nssf = :nssfAmount WHERE emp_id = :employeeId AND YEAR(period) = YEAR(CURRENT_DATE()) AND MONTH(period) = :selectedMonth";
                                        $stmtUpdate = $pdo->prepare($updateQuery);
                                        $stmtUpdate->bindParam(':fullName', $employeeName);
                                        $stmtUpdate->bindParam(':totalAmount', $amount);
                                        $stmtUpdate->bindParam(':taxToPay', $taxToPay[$employeeId]);
                                        $stmtUpdate->bindParam(':familyAllowances', $amountFamily);
                                        $stmtUpdate->bindParam(':nonTaxableAmount', $rowNoTax['amountNoTax']);
                                        $stmtUpdate->bindParam(':deductionsAmount', $rowDeduction['amountToPay']);
                                        $stmtUpdate->bindParam(':nssfAmount', $payToNssf);
                                        $stmtUpdate->bindParam(':employeeId', $employeeId);
                                        $stmtUpdate->bindParam(':selectedMonth', $month, PDO::PARAM_INT);
                                        $stmtUpdate->execute();
                                    } else {
                                        $currentYear = date('Y');
                                        $monthYear = sprintf("%04d-%02d-01", $currentYear, $month);

                                        $insertQuery = "INSERT INTO remuneration (emp_id, emp_name, period, amount, taxToPay, famAllowance, nonTaxable, deduction, nssf) VALUES (:employeeId, :fullName, :monthYear, :totalAmount, :taxToPay, :familyAllowances, :nonTaxableAmount, :deductionsAmount, :nssfAmount)";
                                        $stmtInsert = $pdo->prepare($insertQuery);
                                        $stmtInsert->bindParam(':fullName', $employeeName);
                                        $stmtInsert->bindParam(':employeeId', $employeeId);
                                        $stmtInsert->bindParam(':monthYear', $monthYear);
                                        $stmtInsert->bindParam(':totalAmount', $amount);
                                        $stmtInsert->bindParam(':taxToPay', $taxToPay[$employeeId]);
                                        $stmtInsert->bindParam(':familyAllowances', $amountFamily);
                                        $stmtInsert->bindParam(':nonTaxableAmount', $rowNoTax['amountNoTax']);
                                        $stmtInsert->bindParam(':deductionsAmount', $rowDeduction['amountToPay']);
                                        $stmtInsert->bindParam(':nssfAmount', $payToNssf);
                                        $stmtInsert->execute();

                                          try {
                                            $sqlDeduction = "SELECT *, SUM(d.deduction_amountPerMonth) AS amountToPay
                                                            FROM deduction d
                                                            WHERE d.emp_id = :employeeId
                                                            AND d.deduction_month != deduction_paidMonth";
                                          $stmtDeduction = $pdo->prepare($sqlDeduction);
                                          $stmtDeduction->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
                                          $stmtDeduction->execute();
                                          $deductionRows = $stmtDeduction->fetchAll(PDO::FETCH_ASSOC);

                                          foreach ($deductionRows as $rowDeduction) {
                                            $newAmount = $rowDeduction['deduction_paidAmount'] + $rowDeduction['deduction_amountPerMonth'];
                                            $newMonths = $rowDeduction['deduction_paidMonth'] + 1;
                                    
                                            $stmt = $pdo->prepare("UPDATE deduction SET deduction_paidAmount = ?, deduction_paidMonth = ? WHERE salCat_id = ? AND emp_id = ?");
                                            $stmt->bindParam(1, $newAmount);
                                            $stmt->bindParam(2, $newMonths);
                                            $stmt->bindParam(3, $rowDeduction['salCat_id']);
                                            $stmt->bindParam(4, $employeeId);
                                            $stmt->execute();
                                          }


                                        
                                                  ?>
                                                  <td><?php echo $deductionRows[0]['amountToPay']; ?></td></tr>

                                                  <?php
                                                  } catch (PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                                }}

                                                
                                              } catch (PDOException $e) {
                                                echo "Error inserting/remuneration details for employee " . $employeeId . ": " . $e->getMessage();
                                              }
                                            
                                            
                                        }
                          ?>
                              </tbody>
                          </table>

                          <?php
        
                      
                    } else {
                          echo "No data found for the entered month.";
                      }
                  }} catch (PDOException $e) {
                      echo "Error: " . $e->getMessage();
                  }
              }
              ?>

        </form>
    </section>

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

</body>

</html>