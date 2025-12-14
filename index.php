<?php
// ===== Step 3: Review Form Processing =====
if (isset($_POST['submit_review'])) {
    $name = trim($_POST['user_name']);
    $review = trim($_POST['review_text']);

    // Correct connection file
    include('config.php'); // NOT dbconnection.php

    if (!empty($name) && !empty($review)) {
        $stmt = mysqli_prepare($con, "INSERT INTO tbl_reviews (user_name, review_text) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $name, $review);
        mysqli_stmt_execute($stmt);
        echo "<script>alert('Thanks for your review!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<html>
<body>

<?php include('header.php'); ?>
<?php include('banner_slider.php'); ?>
<br><br>

<div id="bannerCarousel" class="carousel slide mb-2" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#bannerCarousel" data-slide-to="0" class="active"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/ban5.jpg" class="d-block w-100" alt="Special Offer">
      <div class="carousel-caption d-none d-md-block">
        <h5>🎉 Special Festival Offer!</h5>
        <p>Buy 1 Get 1 Free this Eid week only!</p>
      </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>

<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="listview_1_of_3 images_1_of_3">
                <h2 style="color:#555;">Upcoming Movies</h2>
                <?php 
                include('config.php'); // Ensure DB connection available
                $qry3 = mysqli_query($con, "SELECT * FROM tbl_news LIMIT 5");
                if ($qry3) {
                    while ($n = mysqli_fetch_array($qry3)) {
                ?>
                <div class="content-left">
                    <div class="listimg listimg_1_of_2">
                        <img src="admin/<?php echo $n['attachment']; ?>">
                    </div>
                    <div class="text list_1_of_2">
                        <div class="extra-wrap">
                            <span class="data"><strong><?php echo $n['name']; ?></strong><br>
                            <span class="data"><strong>Cast: <?php echo $n['cast']; ?></strong><br>
                            <div class="data">Release Date: <?php echo $n['news_date']; ?></div>
                            <span class="text-top"><?php echo $n['description']; ?></span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }} ?>
            </div>

            <div class="listview_1_of_3 images_1_of_3">
                <h2 style="color:#555;">Movie Trailers</h2>
                <div class="middle-list">
                <?php 
                $qry4 = mysqli_query($con, "SELECT * FROM tbl_movie ORDER BY rand() LIMIT 6");
                if ($qry4) {
                    while ($nm = mysqli_fetch_array($qry4)) {
                ?>
                    <div class="listimg1">
                        <a target="_blank" href="<?php echo $nm['video_url']; ?>"><img src="<?php echo $nm['image']; ?>" alt=""/></a>
                        <a target="_blank" href="<?php echo $nm['video_url']; ?>" class="link" style="text-decoration:none; font-size:14px;"><?php echo $nm['movie_name']; ?></a>
                    </div>
                <?php }} ?>
                </div>
            </div>

            <?php include('movie_sidebar.php'); ?>
        </div>
    </div>

    <!-- ======== User Review Section ======= -->
    <div class="container mt-5 mb-5">
        <h3 class="text-center">📢 Audience Reviews</h3>
        <?php
        $review_q = mysqli_query($con, "SELECT * FROM tbl_reviews ORDER BY created_at DESC LIMIT 5");
        if ($review_q && mysqli_num_rows($review_q) > 0) {
            echo '<ul class="list-group mb-4">';
            while ($rev = mysqli_fetch_array($review_q)) {
                echo '<li class="list-group-item">';
                echo '<strong>' . htmlspecialchars($rev['user_name']) . '</strong><br>';
                echo nl2br(htmlspecialchars($rev['review_text']));
                echo '<br><small class="text-muted">' . $rev['created_at'] . '</small>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo "<p class='text-muted'>No reviews yet.</p>";
        }
        ?>

        <form method="POST" action="">
            <div class="form-group">
                <label>Your Name</label>
                <input type="text" name="user_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Your Review</label>
                <textarea name="review_text" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" name="submit_review" class="btn btn-primary">Submit Review</button>
        </form>
    </div>

    <!-- === IMDb & Awards Section === -->
    <div class="wrap mt-5">
        <h2 style="color:#555;">🎖️ Awards & IMDb Ratings</h2>
        <div class="listview_1_of_3 images_1_of_3">
        <?php
        $qry = mysqli_query($con, "SELECT movie_name, image, imdb_rating, awards FROM tbl_movie ORDER BY imdb_rating DESC LIMIT 3");
        if ($qry) {
            while ($row = mysqli_fetch_array($qry)) {
        ?>
            <div class="content-left">
                <div class="listimg listimg_1_of_2">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['movie_name']; ?>">
                </div>
                <div class="text list_1_of_2">
                    <div class="extra-wrap">
                        <strong><?php echo $row['movie_name']; ?></strong><br>
                        ⭐ IMDb Rating: <?php echo $row['imdb_rating']; ?>/10<br>
                        🏆 Awards: <?php echo $row['awards']; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        <?php }} ?>
        </div>
    </div>

    <br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Footer and Searchbar -->
     <div>
    <div><?php include('footer.php'); ?></div>
    <?php include('searchbar.php'); ?>
</div>
</body>
</html>
