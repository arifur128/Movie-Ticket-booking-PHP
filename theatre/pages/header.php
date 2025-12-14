<?php
// IMPORTANT: DO NOT ADD ANY SPACES OR LINES BEFORE THIS TAG!

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('../../config.php');

date_default_timezone_set('Asia/Dhaka');

// Prevent redirect loops
$current_page = basename($_SERVER['PHP_SELF']);
$login_pages = ['index.php', 'login.php'];

if (!isset($_SESSION['theatre']) && !in_array($current_page, $login_pages)) {
    header('location: ../index.php');
    exit();
}

// Fetch theatre data
$theatre = null;
if (isset($_SESSION['theatre'])) {
    $th = mysqli_query($con, "SELECT * FROM tbl_theatre WHERE id = '".mysqli_real_escape_string($con, $_SESSION['theatre'])."'");
    $theatre = mysqli_fetch_array($th);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Theatre Assistance</title>

  <!-- jQuery + Validation -->
  <script src="../validation/vendor/jquery/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="../validation/dist/css/bootstrapValidator.css"/>
  <script src="../validation/dist/js/bootstrapValidator.js"></script>

  <!-- Responsive -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSS Frameworks -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-mini"><b>T</b>A</span>
      <span class="logo-lg"><b>Theatre</b> Assistant</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="cinema.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo isset($theatre['name']) ? htmlspecialchars($theatre['name']) : 'Guest'; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="cinema.png" class="img-circle" alt="User Image">
                <p>Theatre Assistance</p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="cinema.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo isset($theatre['name']) ? htmlspecialchars($theatre['name']) : 'Guest'; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li><a href="add_movie.php"><i class="fa fa-plus"></i> <span>Add Movie</span></a></li>
        <li><a href="view_movie.php"><i class="fa fa-list-alt"></i> <span>View Movies</span></a></li>
        <li><a href="add_show.php"><i class="fa fa-ticket"></i> <span>Add Show</span></a></li>
        <li><a href="todays_shows.php"><i class="fa fa-calendar"></i> <span>Todays Shows</span></a></li>
       <!-- <li><a href="tickets.php"><i class="fa fa-film"></i> <span>Todays Bookings</span></a></li> -->
        <li><a href="view_shows.php"><i class="fa fa-eye"></i> <span>View Show</span></a></li>
        <li><a href="add_theatre_2.php"><i class="fa fa-film"></i> <span>Theatre Details</span></a></li>
       <li><a href="earnings_report.php"><i class="fa fa-bar-chart"></i> <span>Earnings Dashboard</span></a></li>

      </ul>
    </section>
  </aside>
