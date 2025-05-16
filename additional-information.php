<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Additional information</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
      <h1>Additional Information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Employee</li>
          <li class="breadcrumb-item active">Additional Information</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div>


        <?php
        // Extract the URL parameters
        $code = $_GET['code'] ?? '';
        $branch = $_GET['branch'] ?? '';
        $job = $_GET['job'] ?? '';
        $mother = $_GET['mother'] ?? '';
        $birth_date = $_GET['birth'] ?? '';
        $birth_place = $_GET['birth_place'] ?? '';
        $region_id = $_GET['region'] ?? '';
        $phone = $_GET['phone'] ?? '';
        $email1 = $_GET['email1'] ?? '';
        $email2 = $_GET['email2'] ?? '';
        ?>

        <form action="additional-info-controller.php" method='post'>
          <div>
            <label for="name">name</label>
            <input type="text" id="Name" name="Name" class="form-control" placeholder="Name"
              oninput="fetchEmployeeCode()" required style="width: 20%; display: inline-block" list="nameList"
              value="<?php echo $_GET['Name'] ?? ''; ?>" />
            <datalist id="nameList">
              <?php
              require 'connection.php';

              try {
                $sql = "SELECT concat_fname_lname FROM employee";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["concat_fname_lname"] . "'>" . $row["concat_fname_lname"] . "</option>";
                  }
                }
              } catch (PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
              }
              ?>
            </datalist>


            <input type="number" id="code" name="code" class="form-control" placeholder="code" readonly required
              style="width: 10%; display: inline-block; margin-right: 2%;" />


            </br></br>



            <label for="branch">Branch Name</label>
            <select id="branch" name="branch" class="form-control" required>
              <option value=""></option>
              <!-- <datalist id="branches"> -->
              <?php
              require 'connection.php';

              try {
                $sql = "SELECT branch_name FROM branch";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["branch_name"] . "'>" . $row["branch_name"] . "</option>";
                  }
                }
              } catch (PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
              }
              ?>
            </select></br>

            <label for="job">Job Title</label>
            <input id="job" name="job" class="form-control" required /><br />

            <!-- <label for="father">Father</label>
            <input id="father" name="father" class="form-control" required /><br /> -->

            <label for="mother">Mother</label>
            <input id="mother" name="mother" class="form-control" required /><br />

            <label for="birth">Date of birth</label>
            <input type="date" id="birth" name="birth" onkeydown="return false" onclick="enableKeyboard()" max=""
              class="form-control" required /><br />

            <label for="birth_place">Place of birth</label>
            <input id="birth_place" name="birth_place" class="form-control" required /><br />

            <label for="region">Region</label>
            <select id="region" name="region" class="form-control" onchange="fetchData()" required>
              <option value=""></option>
              <?php
              require 'connection.php';

              try {
                $sql = "SELECT region_id, region_name FROM region";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["region_id"] . "'>" . $row["region_name"] . "</option>";
                  }
                }
              } catch (PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
              }
              ?>

            </select></br>
            <label for="city">City</label>
            <select id="city" name="city" class="form-control" readonly disabled required>
              <option value=""></option>
              <!-- <datalist id="branches"> -->
              <?php
              require 'connection.php';

              try {
                $sql = "SELECT city_id , city_name FROM city";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["city_id"] . "'>" . $row["city_name"] . "</option>";
                  }
                }
              } catch (PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
              }
              ?>
            </select><br />

            <label for="casa">Casa</label>
            <select id="casa" name="casa" class="form-control" readonly disabled required>
              <option id="" value=""></option>
              <!-- <datalist id="branches"> -->
              <?php
              require 'connection.php';

              try {
                $sql = "SELECT casa_id , casa_name FROM casa";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["casa_id"] . "'>" . $row["casa_name"] . "</option>";
                  }
                }
              } catch (PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
              }
              ?>
            </select><br />

            <label for="country">Country</label>
            <select id="country" name="country" class="form-control" readonly disabled required>
              <option id="" value=""></option>
              <!-- <datalist id="branches"> -->
              <?php
              require 'connection.php';

              try {
                $sql = "SELECT country_id , country_name FROM country";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["country_id"] . "'>" . $row["country_name"] . "</option>";
                  }
                }
              } catch (PDOException $e) {
                echo "PDO Error: " . $e->getMessage();
              }
              ?>
            </select></br>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" class="form-control" required><br />

            <label for="email1">Email1</label>
            <input type="email1" id="email1" name="email1" class="form-control" required /><br />

            <label for="email2">Email2</label>
            <input type="email2" id="email2" name="email2" class="form-control" value="<?php echo $email2; ?>" required /><br />
          </div>
          <button type='submit' class="btn btn-primary" style="margin: 20px;"><i class="bi bi-save-fill"></i>
            Submit</button>
        </form>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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


<!-- script for region , city , casa -->
<script>
  function fetchData() {
    var region = document.getElementById('region').value; // Get the value of input1

    // Send AJAX request to PHP script
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = JSON.parse(xhr.responseText); // Parse JSON response

        // Check if there's an error
        if (response.error) {
          // Handle error (e.g., display error message)
          console.error(response.error);
        } else {

          setSelectedValue(document.getElementById("city"), response.city_name);
          setSelectedValue(document.getElementById("casa"), response.casa_name);
          setSelectedValue(document.getElementById("country"), response.country_name);

        }
      }
    };

    var url = "fetchDataController.php?region=" + region;
    xhr.open("GET", url, true);
    xhr.send();
  }
  function setSelectedValue(selectObj, valueToSet) {
    for (var i = 0; i < selectObj.options.length; i++) {
      if (selectObj.options[i].text == valueToSet) {
        selectObj.options[i].selected = true;
        return;
      }
    }
  }
</script>


<!-- script for birth date -->
<script>
  // Get today's date
  var today = new Date().toISOString().split('T')[0];

  // Set the maximum date for the input field
  document.getElementById("birth").setAttribute("max", today);

  function enableKeyboard() {
    // Enable keyboard input when the input field is clicked
    document.getElementById("birth").removeAttribute("onkeydown");
  }


</script>


<!-- 
<script>
function fetchEmployeeCode() {
    var empName = document.getElementById('Name').value;

    // Make an AJAX request to fetch the employee code based on the name
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = JSON.parse(xhr.responseText); // Parse JSON response

        // Check if there's an error
        if (response.error) {
          // Handle error (e.g., display error message)
          alert("Employee does not exist");
   
          console.error(response.error);
        } else {

          document.getElementById('code').value = xhr.responseText;

        } 
      }
    };

    xhr.open('GET', 'fetch_employee_code.php?Name=' + empName, true);
    xhr.send();
}
</script>  -->



<script>
  function fetchEmployeeCode() {
    var empName = document.getElementById('Name').value;

    // Make an AJAX request to fetch the employee code based on the name
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          // Check if the response indicates employee found
          if (xhr.responseText.trim() !== "Employee not found") {
            // Update the employee code field with the fetched data
            document.getElementById('code').value = xhr.responseText;
            //alert("Employee code: " + xhr.responseText);
          } else {
            // Display alert if employee not found
            alert("Employee does not exist");
            alert("Error: " + xhr.status + " - " + xhr.statusText);
            document.getElementById('Name').value = "";
            document.getElementById('Name').focus();
          }
        } else {
          // Handle other status codes (e.g., server errors)
          //alert("Error: " + xhr.status + " - " + xhr.statusText);
          document.getElementById('Name').value = "";
          document.getElementById('code').value = "";
          document.getElementById('Name').focus();
          alert("Error: " + xhr.status + " - " + xhr.statusText);
        }
      }
    };

    xhr.open('GET', 'fetch_employee_code.php?Name=' + encodeURIComponent(empName), true);
    xhr.send();
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('job').value = '<?php echo $job; ?>';
    document.getElementById('mother').value = '<?php echo $mother; ?>';
    document.getElementById('birth').value = '<?php echo $birth_date; ?>';
    document.getElementById('birth_place').value = '<?php echo $birth_place; ?>';
    document.getElementById('phone').value = '<?php echo $phone; ?>';
    document.getElementById('email1').value = '<?php echo $email1; ?>';
    document.getElementById('email2').value = '<?php echo $email2; ?>';
    document.getElementById('region').value = '<?php echo $region_id; ?>';
    document.getElementById('branch').value = '<?php echo $branch; ?>';
  });
</script>
