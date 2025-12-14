<?php include('header.php'); ?>

<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    color: #333;
  }
  .about-section h3 {
    color: #222;
    margin-top: 30px;
  }
  .about-section ul {
    padding-left: 20px;
  }
  .about-section ul li {
    margin-bottom: 10px;
  }
  .event-gallery {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  }
  .event-gallery h5 {
    font-size: 1.1rem;
    margin-top: 10px;
  }
  .event-gallery small {
    color: #666;
  }
  .event-img {
    border-radius: 6px;
    margin-bottom: 10px;
  }
</style>

<section class="container py-5 about-section">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <h1 class="text-center mb-4">About Riverview Cineplex</h1>
      <p class="lead text-center">Your Ultimate Destination for Entertainment</p>

      <div class="row align-items-center mt-5">
        <div class="col-md-6">
          <h3>Who We Are</h3>
          <p>Riverview Cineplex is more than just a movie theater — it's a place where stories come alive. Since our inception, we’ve been committed to delivering the ultimate cinema experience for moviegoers of all ages. From thrilling blockbusters to heartfelt dramas, we bring the best of cinema right to your seat.</p>

          <h3>Our Mission</h3>
          <p>We aim to create unforgettable movie experiences by combining cutting-edge technology, luxurious comfort, and exceptional service. Our goal is to be the preferred choice for entertainment in the community we serve.</p>

          <h3>Why Choose Us?</h3>
          <ul class="list-unstyled">
            <li><i class="bi bi-camera-reels-fill text-warning"></i> 4K Ultra HD Projection</li>
            <li><i class="bi bi-speaker-fill text-warning"></i> Dolby Atmos Sound System</li>
            <li><i class="bi bi-cup-straw text-warning"></i> Delicious Snacks & Beverages</li>
            <li><i class="bi bi-laptop text-warning"></i> Online Ticket Booking</li>
            <li><i class="bi bi-couch text-warning"></i> Recliner Seating</li>
          </ul>
        </div>
        <div class="col-md-6">
          <img src="images/theater_about.jpg" class="img-fluid rounded shadow" style="width:100%; max-height:350px; object-fit:cover;" alt="About Galaxy Cineplex">
        </div>
      </div>

      <div class="mt-5 text-center">
        <h3>Our Commitment</h3>
        <p>We are passionate about movies, and even more passionate about our guests. Whether it’s your first visit or your fiftieth, you’ll always find something exciting at Galaxy Cineplex. Join us and be part of the magic!</p>
      </div>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>
