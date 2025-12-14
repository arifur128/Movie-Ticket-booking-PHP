<?php
include('header.php');
include('../../config.php');
?>
<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Movies List</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Movies List</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php include('../../msgbox.php'); ?>
                <div class="row">
                    <?php 
                    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 0) {
                        // admin user
                        $qry7 = mysqli_query($con, "SELECT * FROM tbl_movie ORDER BY movie_id DESC");
                    } else if (isset($_SESSION['theatre'])) {
                        // theatre user
                        $qry7 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE t_id='".$_SESSION['theatre']."' ORDER BY movie_id DESC");
                    } else {
                        $qry7 = false;
                    }

                    if ($qry7 && mysqli_num_rows($qry7) > 0) {
                        while ($c = mysqli_fetch_array($qry7)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card" style="margin-bottom:20px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
                            <img src="../../<?php echo htmlspecialchars($c['image']); ?>" 
                                 alt="Movie Image" 
                                 class="img-responsive" 
                                 style="height:200px; width:100%; object-fit:cover;">
                            <div class="card-body" style="padding:15px;">
                                <h4><?php echo htmlspecialchars($c['movie_name']); ?></h4>
                                <p><?php echo htmlspecialchars($c['desc']); ?></p>
                                <button class="btn btn-danger" onclick="del(<?php echo $c['movie_id']; ?>)">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo '<p>No Movies Found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php'); ?>

<script>
function del(m) {
    if (confirm("Are you sure you want to delete this movie?")) {
        window.location = "del_movie.php?mid=" + m;
    }
}
</script>
