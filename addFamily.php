<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['code'])) {
    try {
        $code = $_POST['code'];
        
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'row_') === 0) {
                $memberName = $value['memberName'];
                $age = $value['age'];
                $secured = $value['secured'];
                $memberType = $value['memberType'];
                $gender = $value['gender'];

                $stmt = $pdo->prepare("INSERT INTO family_member (member_name, member_age, f_secured, memberType_id, emp_id, gender_id) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $memberName);
                $stmt->bindParam(2, $age);
                $stmt->bindParam(3, $secured);
                $stmt->bindParam(4, $memberType);
                $stmt->bindParam(5, $code); 
                $stmt->bindParam(6, $gender);
                $stmt->execute();

                echo "Inserted data for member: $memberName\n";
            }
        }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Form data is missing or invalid.";
}
?>
