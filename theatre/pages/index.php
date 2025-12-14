<?php include('header.php'); ?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Theatre Assistance</h1>
    <ol class="breadcrumb">
      <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Home</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Running Movies</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Screen</th>
                <th class="col-md-4">Show Time</th>
                <th class="col-md-4">Movie</th>
              </tr>

              <?php 
              $qry8 = mysqli_query($con, "SELECT * FROM tbl_shows WHERE r_status=1 AND theatre_id='" . $_SESSION['theatre'] . "'");
              $no = 1;

              if ($qry8 && mysqli_num_rows($qry8) > 0) {
                while ($mn = mysqli_fetch_array($qry8)) {

                  // Movie
                  $qry9 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='" . $mn['movie_id'] . "'");
                  $mov = $qry9 ? mysqli_fetch_array($qry9) : null;

                  // Show Time
                  $qry10 = mysqli_query($con, "SELECT * FROM tbl_show_time WHERE st_id='" . $mn['st_id'] . "'");
                  $scr = $qry10 ? mysqli_fetch_array($qry10) : null;

                  // Screen
                  $qry11 = (!empty($scr['screen_id'])) ? mysqli_query($con, "SELECT * FROM tbl_screens WHERE screen_id='" . $scr['screen_id'] . "'") : false;
                  $scn = $qry11 ? mysqli_fetch_array($qry11) : null;
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><span class="badge bg-green">
                  <?php echo !empty($scn['screen_name']) ? htmlspecialchars($scn['screen_name']) : 'N/A'; ?>
                </span></td>
                <td><span class="badge bg-light-blue">
                  <?php echo !empty($scr['start_time']) ? htmlspecialchars($scr['start_time']) : 'N/A'; ?>
                  <?php if (!empty($scr['name'])) echo ' (' . htmlspecialchars($scr['name']) . ')'; ?>
                </span></td>
                <td>
                  <?php 
                    if (!empty($mov['image'])) {
                      echo '<img src="../../' . htmlspecialchars($mov['image']) . '" alt="Movie Poster" style="width:50px;height:auto;margin-right:5px;">'; 
                    }
                    echo !empty($mov['movie_name']) ? htmlspecialchars($mov['movie_name']) : 'N/A'; 
                  ?>
                </td>
              </tr>
              <?php
                  $no++;
                }
              } else {
                echo '<tr><td colspan="4" class="text-center">No shows currently running.</td></tr>';
              }
              ?>
            </table>
          </div>
          <!-- /.box-body -->
        </div>

      </div> 
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>

<?php include('footer.php'); ?>
