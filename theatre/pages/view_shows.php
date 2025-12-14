<?php
include('header.php');
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>View Shows</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">View Shows</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Available Shows</h3>
      </div>
      <div class="box-body">
        <?php include('../../msgbox.php'); ?>
        <?php
        $sw = mysqli_query($con, "SELECT * FROM tbl_shows WHERE st_id IN (
                    SELECT st_id FROM tbl_show_time WHERE screen_id IN (
                      SELECT screen_id FROM tbl_screens WHERE t_id='" . $_SESSION['theatre'] . "')) 
                    AND status='1'");

        if (mysqli_num_rows($sw)) {
        ?>
          <table class="table">
            <th class="col-md-1">Sl.no</th>
            <th class="col-md-2">Screen</th>
            <th class="col-md-3">Show Time</th>
            <th class="col-md-3">Movie</th>
            <th class="col-md-3">Options</th>
            <?php
            $sl = 1;
            while ($shows = mysqli_fetch_array($sw)) {

              // Safely fetch show time
              $st = mysqli_query($con, "SELECT * FROM tbl_show_time WHERE st_id='" . $shows['st_id'] . "'");
              $show_time = mysqli_fetch_array($st);
              if (!$show_time) continue;

              // Safely fetch screen
              $sr = mysqli_query($con, "SELECT * FROM tbl_screens WHERE screen_id='" . $show_time['screen_id'] . "'");
              $screen = mysqli_fetch_array($sr);
              if (!$screen) continue;

              // Safely fetch movie
              $mv = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='" . $shows['movie_id'] . "'");
              $movie = mysqli_fetch_array($mv);
              if (!$movie) continue;
            ?>
              <tr>
                <td><?php echo $sl;
                    $sl++; ?></td>
                <td><?php echo $screen['screen_name']; ?></td>
                <td><?php echo date('h:i A', strtotime($show_time['start_time'])) . " ( " . $show_time['name'] . " Show )"; ?></td>
                <td><?php echo $movie['movie_name']; ?></td>
                <td>
                  <?php if ($shows['r_status'] == 1) { ?>
                    <a href="change_running.php?id=<?php echo $shows['s_id']; ?>&status=0">
                      <button class="btn btn-danger">Stop Running</button>
                    </a>
                  <?php } else { ?>
                    <a href="change_running.php?id=<?php echo $shows['s_id']; ?>&status=1">
                      <button class="btn btn-success">Start Running</button>
                    </a>
                  <?php } ?>
                  <a href="stop_running.php?id=<?php echo $shows['s_id']; ?>">
                    <button class="btn btn-warning">Stop Show</button>
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </table>
        <?php
        } else {
        ?>
          <h3>No Shows Added</h3>
        <?php
        }
        ?>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<?php
include('footer.php');
?>
