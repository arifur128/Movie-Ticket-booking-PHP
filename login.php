<?php include('header.php'); ?>
<style>
    body {
        background: linear-gradient(to right, #4e54c8, #8f94fb);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 100px);
    }

    .login-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        min-height: 500px;
    }

    .login-card h3 {
        margin-bottom: 25px;
        color: #4e54c8;
        font-weight: 600;
        text-align: center;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-primary {
        background: #4e54c8;
        border: none;
        border-radius: 8px;
        margin-top: 8px;
        padding: 10px 10;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: #3b40a4;
    }

    .login-footer {
        text-align: center;
        margin-top: 20px;
    }

    .login-footer a {
        color: #4e54c8;
        font-weight: 500;
        text-decoration: none;
    }
</style>

<div class="content login-container">
    <div class="login-card">
        <?php include('msgbox.php'); ?>
        <h3>Login to Your Account</h3>
        <form action="process_login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="Email" type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="Password" type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="login-footer">
            <p class="mt-3">New Here? <a href="registration.php">Create an Account</a></p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
