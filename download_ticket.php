<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

if (isset($_GET['file'])) {
    $filePath = urldecode($_GET['file']);
    
    if (file_exists($filePath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="MovieTicket_'.basename($filePath).'"');
        readfile($filePath);
        exit;
    } else {
        $_SESSION['error'] = "No Ticket!";
        header('location: profile.php');
    }
} else {
    header('location: profile.php');
}
?>