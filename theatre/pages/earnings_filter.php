<?php
include('header.php');
include('../../config.php');

$start_date = $_POST['start_date'] ?? date('Y-m-01');
$end_date = $_POST['end_date'] ?? date('Y-m-d');

$q = mysqli_query($con, "SELECT SUM(amount) AS total_earning, COUNT(*) AS total_tickets 
                         FROM tbl_bookings 
                         WHERE t_id='" . $_SESSION['theatre'] . "' 
                         AND date BETWEEN '$start_date' AND '$end_date' 
                         AND status = 1");

$data = mysqli_fetch_array($q);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Earning Report: Filter By Date</h1>
    </section>
    <section class="content">
        <form method="POST">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>From Date:</label>
                    <input type="date" name="start_date" value="<?php echo $start_date; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label>To Date:</label>
                    <input type="date" name="end_date" value="<?php echo $end_date; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-4" style="margin-top: 32px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div class="card card-dark">
            <div class="card-body">
                <h3>Total Earning: ৳ <?php echo $data['total_earning'] ? $data['total_earning'] : 0; ?></h3>
                <h4>Total Tickets Sold: <?php echo $data['total_tickets']; ?></h4>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php'); ?>
