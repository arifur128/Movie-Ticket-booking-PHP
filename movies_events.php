<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Now Showing - Riverview Theater</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
    }
    .movie-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    .movie-card:hover {
      transform: translateY(-5px);
    }
    .movie-card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }
    .movie-card-body {
      padding: 15px;
    }
    .movie-card-body h5 {
      font-weight: 600;
    }
    .movie-card-body a {
      text-decoration: none;
      color: #dc3545;
      font-weight: 500;
    }
    .movie-section-title {
      font-size: 2rem;
      margin-bottom: 30px;
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="movie-section-title">🎬 Now Showing at Riverview Theater</h2>
  <div class="row g-4">
    <?php
      $today = date("Y-m-d");
      $qry2 = mysqli_query($con, "SELECT * FROM tbl_movie");
      if ($qry2) {
        while ($m = mysqli_fetch_array($qry2)) {
    ?>
      <div class="col-md-4">
        <div class="movie-card">
          <img src="<?php echo $m['image']; ?>" alt="<?php echo $m['movie_name']; ?>">
          <div class="movie-card-body">
            <h5><a href="about.php?id=<?php echo $m['movie_id']; ?>" class="text-dark" style="text-decoration:none;">
              <?php echo $m['movie_name']; ?></a></h5>
            <p>Cast: <span class="text-muted"><?php echo $m['cast']; ?></span></p>
            <a href="about.php?id=<?php echo $m['movie_id']; ?>">🎟 More Info</a>
          </div>
        </div>
      </div>
    <?php 
        }
      }
    ?>
  </div>
</div>
    </div>
   

<?php include('footer.php'); ?>
</body>
</html>
