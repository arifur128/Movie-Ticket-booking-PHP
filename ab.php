<?php include 'header.php'; ?>

<!-- Hero Section -->
<section style="background: url('images/banner.jpg') center center/cover no-repeat; height: 320px; display: flex; align-items: center; justify-content: center;">
    <h1 style="color: #fff; font-size: 3rem; text-shadow: 2px 2px 6px rgba(0,0,0,0.7);">Welcome to Arifur Rahman Cinema Hall</h1>
</section>

<!-- About Us Section - Card -->
<section style="background: #f8f9fa; padding: 60px 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-5 bg-white rounded shadow">
                <h2 class="text-center mb-4">About Us</h2>
                <p class="lead mb-4 text-center">For the past <span class="counter">10</span> years, we have been serving movie lovers with blockbuster films, premium cinematic experience, and an easy ticket booking system — both online and at the counter.</p>
                <p class="text-center">Founded in 2015, <strong>Riverview Cinema Hall</strong> has grown into one of the most loved movie destinations in the city. Over the past decade, we’ve constantly upgraded our services to give you the best movie-watching experience.</p>
            </div>
        </div>
    </div>
</section>

<!-- What We Offer Section - Card -->
<section style="background: #f8f9fa; padding: 60px 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-5 bg-white rounded shadow">
                <h3 class="text-center mb-5">🎟️ What We Offer</h3>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <h5>Online Ticket Booking</h5>
                        <p>Book your tickets easily through our website with real-time seat selection.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5>Secure Payments</h5>
                        <p>Pay online securely and receive instant e-tickets.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5>Comfortable Cinematic Experience</h5>
                        <p>Modern sound systems, cozy seating, and clean environment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team Section - Card -->
<section style="background: #f8f9fa; padding: 60px 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-5 bg-white rounded shadow">
                <h3 class="text-center mb-5">👥 Meet Our Team</h3>
                <div class="row justify-content-center">
                    <div class="col-md-3 mx-3 mb-4 text-center p-3 bg-white rounded shadow-sm">
                        <img src="images/arifur.jpg" alt="Arifur Rahman" class="img-fluid rounded-circle mb-3" width="120" height="120">
                        <h5>Arifur Rahman</h5>
                        <p>Founder & CEO</p>
                    </div>
                    <div class="col-md-3 mx-3 mb-4 text-center p-3 bg-white rounded shadow-sm">
                        <img src="images/hamza.jpg" alt="Hamza Chowdhuri" class="img-fluid rounded-circle mb-3" width="120" height="120">
                        <h5>Hamza Chowdhuri</h5>
                        <p>Operations Manager</p>
                    </div>
                    <div class="col-md-3 mx-3 mb-4 text-center p-3 bg-white rounded shadow-sm">
                        <img src="images/fahmidul.jpg" alt="Fahmidul Islam" class="img-fluid rounded-circle mb-3" width="120" height="120">
                        <h5>Fahmidul Islam</h5>
                        <p>Lead Developer & Tech Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Section - Card -->
<section style="background: #f8f9fa; padding: 60px 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-5 bg-white rounded shadow text-center">
                <h3 class="mb-4">📞 Contact Us</h3>
                <p class="lead">
                    📧 Email: support@arrahman-cinema.com<br>
                    📱 Phone: +880-1234-567890<br>
                    🏢 Address: 123 Cinema Road, Dhaka, Bangladesh
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Counter Animation -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let counter = document.querySelector(".counter");
        let count = 0;
        let target = 10;
        let interval = setInterval(() => {
            if(count < target){
                count++;
                counter.textContent = count;
            } else {
                clearInterval(interval);
            }
        }, 100);
    });
</script>

<?php include 'footer.php'; ?>
