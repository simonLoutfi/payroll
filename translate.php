<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function translateWord(word, key) {
        var url = "proxy.php?word=" + word + "&tool=api&account_id=000006&prot=https%3A&hostname=www.yamli.com&path=%2F&build=5515&sxhr_id=4";
        
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function(response) {
                var dataArray = response.split("|");
                var firstElement = dataArray[0];
                var elem = getArabicText(String(firstElement));
                switch (key) {
                    case 'emp_name':
                        console.log("اسم المستخدم:", elem);
                        break;
                    case 'emp_father':
                        console.log("اسم الأب:", elem);
                        break;
                    case 'emp_lastName':
                        console.log("اسم الشهرة:", elem);
                        break;
                    case 'emp_nssf':
                        console.log("رقم التسجيل الشخصي:", elem);
                        break;
                    case 'emp_name':
                        console.log("اسم المستخدم:", elem);
                        break;
                    case 'emp_father':
                        console.log("اسم الأب:", elem);
                        break;
                    default:
                        console.log(key + elem);
                        break;
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function getArabicText(string) {
        let ar = [];

        string.split('').forEach(function(i) {
            if (/[\u0600-\u06FF]/.test(i)) {
                ar.push(i);
            }
        });

        return ar.join('');
    }
</script>

<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nssfCode"])) {
        $nssfCode = $_POST["nssfCode"];

        try {
            $sql = "SELECT * FROM employee WHERE emp_nssf = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nssfCode]);
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($results) {
                foreach ($results as $key => $value) {
                    if($key=='status_id'){
                        switch($value){
                            case 1:
                                echo "<script>console.log('أعزب');</script>";
                                break;
                            case 2:
                                echo "<script>console.log('متزوج');</script>";
                                break;
                            case 3:
                                echo "<script>console.log('أرمل');</script>";
                                break;
                            case 4:
                                echo "<script>console.log('مطلق');</script>";
                                break;
                        }
                    }
                    else if($key=='freq_id'){
                        switch($value){
                            case 1:
                                echo "<script>console.log('شهري');</script>";
                                break;
                            case 2:
                                echo "<script>console.log('يومي');</script>";
                                break;
                            case 3:
                                echo "<script>console.log('بالساعة');</script>";
                                break;
                            
                        }
                    }

                    else{
                        echo "<script>translateWord('$value', '$key');</script>";
                    }
                }
            } else {
                echo "No results found for the specified NSSF code.";
            }
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "NSSF code is required.";
    }
} else {
    echo "Form was not submitted.";
}
?>
