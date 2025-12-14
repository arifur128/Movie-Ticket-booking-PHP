<?php include('header.php'); ?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>

<?php
include('form.php');
$frm = new formBuilder;
?>

<style>
    body {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
        padding: 40px 15px;
    }

    .panel {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        padding: 30px 25px;
        max-width: 500px;
        width: 100%;
    }

    .panel-heading {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px;
    }

    .btn-primary {
        width: 100%;
        border-radius: 8px;
        font-weight: 600;
        background: #3b40a4;
        border: none;
    }

    .btn-primary:hover {
        background:rgb(58, 119, 234);
    }

    .form-group {
        margin-bottom: 20px;
    }

    select.form-control {
        padding: 10px 12px;
    }
</style>

<div class="content">
    <div class="wrap">
        <div class="form-wrapper">
            <div class="panel">
                <div class="panel-heading">Register</div>
                <form action="process_registration.php" method="post" id="form1">
                    <div class="form-group has-feedback">
                        <input name="name" type="text" placeholder="Name" class="form-control"/>
                        <?php $frm->validate("name",["required","label"=>"Name","regexp"=>"name"]); ?>
                    </div>

                    <div class="form-group has-feedback">
                        <input name="age" type="text" placeholder="Age" class="form-control"/>
                        <?php $frm->validate("age",["required","label"=>"Age","regexp"=>"age"]); ?>
                    </div>

                    <div class="form-group has-feedback">
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <?php $frm->validate("gender",["required","label"=>"Gender"]); ?>
                    </div>

                    <div class="form-group has-feedback">
                        <input name="phone" type="text" placeholder="Mobile Number" class="form-control"/>
                        <?php $frm->validate("phone",["required","label"=>"Mobile Number","regexp"=>"mobile"]); ?>
                    </div>

                    <div class="form-group has-feedback">
                        <input name="email" type="text" placeholder="Email" class="form-control"/>
                        <?php $frm->validate("email",["required","label"=>"Email","email"]); ?>
                    </div>

                    <div class="form-group has-feedback">
                        <input name="password" type="password" placeholder="Password" class="form-control"/>
                        <?php $frm->validate("password",["required","label"=>"Password","min"=>"7"]); ?>
                    </div>

                    <div class="form-group has-feedback">
                        <input name="cpassword" type="password" placeholder="Confirm Password" class="form-control"/>
                        <?php $frm->validate("cpassword",["required","label"=>"Confirm Password","min"=>"7","identical"=>"password Password"]); ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    <?php $frm->applyvalidations("form1"); ?>
</script>
