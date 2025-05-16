<?php
if(isset($_POST['values'])) {
    $values = json_decode($_POST['values']);
    echo "<script>console.log($values);</script>";
} else {
    echo "No values received";
}
?>
