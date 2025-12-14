
<?php
include('dbconnection.php');

$method = $_POST['payment_method'] ?? '';

if ($method) {
    // Save payment method in database if required (example only)
    echo "<script>alert('Payment method selected: $method'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Please select a payment method.'); window.history.back();</script>";
}
?>
