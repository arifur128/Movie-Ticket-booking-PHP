
<?php include('header.php'); ?>
<div class="container mt-5">
  <h2>💳 Select Your Payment Method</h2>
  <form method="POST" action="payment-process.php">
    <label>Select Payment Method:</label><br>
    <input type="radio" name="payment_method" value="bkash" required> bKash<br>
    <input type="radio" name="payment_method" value="nagad"> Nagad<br>
    <input type="radio" name="payment_method" value="card"> Card Payment<br><br>
    <button type="submit" class="btn btn-success">Pay Now</button>
  </form>
</div>
<?php include('footer.php'); ?>
