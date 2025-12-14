<?php include('header.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Contact Us - Riverview Theater</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
    }
    .contact-form {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .contact-form h3 {
      margin-bottom: 20px;
    }
    .contact_info, .company_address {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 1px 8px rgba(0,0,0,0.05);
      margin-top: 30px;
    }
    iframe {
      width: 100%;
      border: none;
      border-radius: 6px;
    }
    @media (max-width: 768px) {
      .contact-form, .contact_info, .company_address {
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="contact-form">
        <h3>Contact Us</h3>
        <form action="process_contact.php" method="post">
          <label>NAME</label>
          <input type="text" name="name" required>

          <label>E-MAIL</label>
          <input type="email" name="email" required>

          <label>MOBILE.NO</label>
          <input type="number" name="mobile" required>

          <label>SUBJECT</label>
          <textarea name="subect" rows="5" required></textarea>

          <button type="submit" class="btn btn-warning">Submit</button>
        </form>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="contact_info">
        <h4>Find Us Here</h4>
        <iframe height="200" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dhanmondi,+Dhaka&amp;output=embed"></iframe>
        <small><a href="https://maps.google.com" target="_blank">View Larger Map</a></small>
      </div>
      <div class="company_address mt-4">
        <h4>Riverview Movie Hall</h4>
        <p>Dhanmondi, Dhaka</p>
        <p>Phone: (00) 222 666 444</p>
        <p>Email: <a href="mailto:arifur@gmail.com">arifur@gmail.com</a></p>
        <p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
