<?php
include 'connection.php'; 

if(isset($_POST['country'])) {
  try {
      require 'connection.php'; // Include your database connection script

      // Check if the country exists
      $check_country_query = "SELECT * FROM country WHERE country_name = :country_name";
      $check_country_stmt = $pdo->prepare($check_country_query);
      $check_country_stmt->bindParam(':country_name', $_POST['country']);
      $check_country_stmt->execute();

      if($check_country_stmt->rowCount() > 0) { // Country already exists
          // Check if the mohafaza exists
          $check_mohafaza_query = "SELECT * FROM mohafaza WHERE mohafaza_name = :mohafaza_name";
          $check_mohafaza_stmt = $pdo->prepare($check_mohafaza_query);
          $check_mohafaza_stmt->bindParam(':mohafaza_name', $_POST['mohafaza']);
          $check_mohafaza_stmt->execute();

          if($check_mohafaza_stmt->rowCount() > 0) { // Mohafaza already exists
              // Check if the casa exists
              $check_casa_query = "SELECT * FROM casa WHERE casa_name = :casa_name";
              $check_casa_stmt = $pdo->prepare($check_casa_query);
              $check_casa_stmt->bindParam(':casa_name', $_POST['casa']);
              $check_casa_stmt->execute();

              if($check_casa_stmt->rowCount() > 0) { // Casa already exists
                  // Check if the city exists
                  $check_city_query = "SELECT * FROM city WHERE city_name = :city_name";
                  $check_city_stmt = $pdo->prepare($check_city_query);
                  $check_city_stmt->bindParam(':city_name', $_POST['city']);
                  $check_city_stmt->execute();

                  if($check_city_stmt->rowCount() > 0) { // City already exists
                      // Check if the region exists
                      $check_region_query = "SELECT * FROM region WHERE region_name = :region_name";
                      $check_region_stmt = $pdo->prepare($check_region_query);
                      $check_region_stmt->bindParam(':region_name', $_POST['region']);
                      $check_region_stmt->execute();

                      if($check_region_stmt->rowCount() > 0) { // Region already exists
                          echo "<script type='text/javascript'>alert('Info added previously');</script>";
                      } else {
                          // Add region
                          require_once 'addRegion.php';
                      }
                  } else { // City does not exist
                      // Add city
                      require_once 'addCity.php';
                      
                      // Add region
                      require_once 'addRegion.php';
                  }
              } else { // Casa does not exist
                  // Add casa
                  require_once 'addCasa.php';
                  
                  // Add city
                  require_once 'addCity.php';
                  
                  // Add region
                  require_once 'addRegion.php';
              }
          } else { // Mohafaza does not exist
              // Add mohafaza
              require_once 'addMohafaza.php';
              
              // Add casa
              require_once 'addCasa.php';
              
              // Add city
              require_once 'addCity.php';
              
              // Add region
              require_once 'addRegion.php';
          }
      } else { // Country does not exist
          // Add country
          $sqlco = "INSERT INTO country (country_name) VALUES (:country_name)";
          $insert_country_stmt = $pdo->prepare($sqlco);
          $insert_country_stmt->bindParam(':country_name', $_POST['country']);
          $insert_country_stmt->execute();
          
          // Add mohafaza
          require_once 'addMohafaza.php';
          
          // Add casa
          require_once 'addCasa.php';
          
          // Add city
          require_once 'addCity.php';
          
          // Add region
          require_once 'addRegion.php';
      }
  } catch(PDOException $e) {
      die('Error: '.$e->getMessage());
  }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Location</title>
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
      <h1>Location</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">General Info</li>
          <li class="breadcrumb-item active">Location</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    

    <div>
    <script>
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
    <form action="generalInfo-location.php" method='post' id='myForm'>
        <div>
        <label for="country">Country:</label>
<select id="country" name="country" class="form-control" required>
    <option value="">Select Country</option>
    <?php
    require 'connection.php';

    try {
        $sql = "SELECT country_name FROM country";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row["country_name"] . "'>" . $row["country_name"] . "</option>";
            }
        }
    } catch(PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
    ?>
</select><br>

<label for="mohafaza">Mohafaza:</label>
<select id="mohafaza" name="mohafaza" class="form-control">
    <option value="">Select Mohafaza</option>
    <?php
    try {
        $sql = "SELECT mohafaza_name FROM mohafaza";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row["mohafaza_name"] . "'>" . $row["mohafaza_name"] . "</option>";
            }
        }
    } catch(PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
    ?>
</select><br>

<label for="casa">Casa:</label>
<select id="casa" name="casa" class="form-control">
    <option value="">Select Casa</option>
    <?php
    try {
        $sql = "SELECT casa_name FROM casa";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row["casa_name"] . "'>" . $row["casa_name"] . "</option>";
            }
        }
    } catch(PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
    ?>
</select><br>

<label for="city">City:</label>
<select id="city" name="city" class="form-control">
    <option value="">Select City</option>
    <?php
    try {
        $sql = "SELECT city_name FROM city";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row["city_name"] . "'>" . $row["city_name"] . "</option>";
            }
        }
    } catch(PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
    ?>
</select><br>

            <label for="region">Region:</label>
            <input type="text" id="region" name="region" class="form-control" />
        </div>
        <div style="margin: 20px;">
          <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Save</button>
        </div>
      </form>

        <?php
          require 'connection.php';
          echo "<table border='1' class='table datatable'>";
          echo "<thead><tr><th>Country</th><th>Mohafaza</th><th>Casa</th><th>City</th><th>Region</th></tr></thead>";
          echo "<tbody>";

          $sql = "SELECT country.country_name, mohafaza.mohafaza_name, casa.casa_name, city.city_name, region.region_name 
                  FROM country 
                  INNER JOIN mohafaza ON country.country_id = mohafaza.country_id
                  INNER JOIN casa ON mohafaza.mohafaza_id = casa.mohafaza_id
                  INNER JOIN city ON casa.casa_id = city.casa_id 
                  INNER JOIN region ON city.city_id = region.city_id ";

          try {
              $stmt = $pdo->query($sql);

              if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td>".$row["country_name"]."</td>";
                      echo "<td>".$row["mohafaza_name"]."</td>";
                      echo "<td>".$row["casa_name"]."</td>";
                      echo "<td>".$row["city_name"]."</td>";
                      echo "<td>".$row["region_name"]."</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='5'>No data found</td></tr>";
              }
          } catch(PDOException $e) {
              echo "PDO Error: " . $e->getMessage();
          }

          echo "</tbody>";
          echo "</table>";
        ?>

</div>
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