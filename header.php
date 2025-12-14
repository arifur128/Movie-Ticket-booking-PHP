<?php
include('config.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set('Asia/Dhaka');
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Movie Ticket Booking</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.color-RGBa-patch.js"></script>
    <script src="js/example.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="header">
    <div class="header-top">
        <div class="wrap">

            <div class="h-logo">
                <a href="index.php"><img src="images/t-logo.png" alt="Logo"/></a>
            </div>

            <!-- ✅ User Info Top Right -->
            <div class="user-panel" style="float: right; margin-top: 30px;">
                <?php 
                if(isset($_SESSION['user'])){
                    $us = mysqli_query($con, "SELECT name FROM tbl_registration WHERE user_id='".$_SESSION['user']."'");
                    $user = mysqli_fetch_array($us);
                    echo "<span style='color: white; margin-right: 10px;'>👤 ".$user['name']."</span>";
                    echo "<a href='logout.php' style='color: red; font-weight: bold;'>Logout</a>";
                } else {
                    echo "<a href='login.php' style='color: white; margin-right: 10px;'>Login</a>";
                    echo "<a href='registration.php' style='color: white;'>Register</a>";
                }
                ?>
            </div>

            <!-- ✅ Navigation -->
            <div class="nav-wrap">
                <ul class="group" id="example-one">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="movies_events.php">Movies</a></li>
                    <li><a href="ab2.php">About Us</a></li>
                    <li><a href="contact2.php">Contact</a></li>
                </ul>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <!-- ✅ Search Bar -->
    <div class="block">
        <div class="wrap">
            <form action="process_search.php" id="reservation-form" method="post" onsubmit="return validateSearch()">
                <fieldset>
                    <div class="field">
                        <input type="text" placeholder="Enter A Movie Name" style="height:30px;width:300px" required name="search">
                        <input type="submit" value="Search" style="height:32px;padding-top: 3px; color:red; " >
                    </div>
                </fieldset>
            </form>
            <div class="clear"></div>
        </div>
    </div>
</div>

<script>
function validateSearch() {
    const input = document.querySelector("input[name='search']");
    if (!input.value.trim()) {
        alert("Please enter movie name...");
        return false;
    }
    return true;
}
</script>
