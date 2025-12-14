<?php
include('header.php');
include('../../config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$today = date('Y-m-d');
$theatreId = mysqli_real_escape_string($con, $_SESSION['theatre']);

// Helper function
function runQuery($con, $query) {
    $res = mysqli_query($con, $query);
    if (!$res) {
        die("❌ SQL ERROR: " . mysqli_error($con) . "<br><code>$query</code>");
    }
    return mysqli_fetch_assoc($res);
}

// Main Stats
$totalMovies = runQuery($con, "SELECT COUNT(*) AS total_movies FROM tbl_movie WHERE t_id = '$theatreId'")['total_movies'];
$totalBookings = runQuery($con, "SELECT COUNT(*) AS total_bookings FROM tbl_bookings WHERE ticket_date='$today' AND t_id = '$theatreId'")['total_bookings'];
$totalRevenue = runQuery($con, "SELECT SUM(amount) AS revenue FROM tbl_bookings WHERE ticket_date='$today' AND t_id = '$theatreId'")['revenue'] ?? 0;
$totalShows = runQuery($con, "SELECT COUNT(*) AS total_shows FROM tbl_shows WHERE start_date='$today' AND theatre_id = '$theatreId'")['total_shows'];

// Booking trend (past 7 days)
$trendDates = [];
$trendCounts = [];

for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $q = mysqli_query($con, "SELECT COUNT(*) AS count FROM tbl_bookings WHERE ticket_date = '$date' AND t_id = '$theatreId'");
    $row = mysqli_fetch_assoc($q);
    $trendDates[] = date('D', strtotime($date)); // e.g. Mon, Tue
    $trendCounts[] = $row['count'];
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <div class="row">
      <!-- Boxes -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner"><h3><?php echo $totalMovies; ?></h3><p>Total Movies</p></div>
          <div class="icon"><i class="fa fa-film"></i></div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner"><h3><?php echo $totalBookings; ?></h3><p>Today's Bookings</p></div>
          <div class="icon"><i class="fa fa-ticket"></i></div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner"><h3>৳<?php echo $totalRevenue; ?></h3><p>Today's Revenue</p></div>
          <div class="icon"><i class="fa fa-money"></i></div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner"><h3><?php echo $totalShows; ?></h3><p>Today's Shows</p></div>
          <div class="icon"><i class="fa fa-clock-o"></i></div>
        </div>
      </div>
    </div>

    <!-- Chart Area -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">🗓 Booking Trend (Last 7 Days)</h3>
      </div>
      <div class="box-body">
        <canvas id="bookingChart" height="100"></canvas>
      </div>
    </div>
  </section>
</div>

<?php include('footer.php'); ?>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('bookingChart').getContext('2d');
const bookingChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($trendDates); ?>,
        datasets: [{
            label: 'Tickets Booked',
            data: <?php echo json_encode($trendCounts); ?>,
            backgroundColor: '#0073b7'
        }]
    },
    options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
