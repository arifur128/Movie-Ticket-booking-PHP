<?php
session_start();
include('header.php');

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit();
}
?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css" />
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>

<?php
include('form.php');
$frm = new formBuilder;
?>

</div>
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <h3>Payment</h3>
            <form action="bank.php" method="post" id="form1">
                <div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
                    <div class="form-group">
                        <label class="control-label">Name on Card</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Card Number</label>
                        <input type="text" class="form-control" name="number" required title="Enter 16 digit card number">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Expiration date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-group">
                        <label class="control-label">CVV</label>
                        <input type="text" class="form-control" name="cvv">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Make Payment</button>
                    </div>
                </div>

                <!-- Hidden inputs from previous POST -->
                <?php
                // Only process these if the user is coming from booking.php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $screen = $_POST['screen'] ?? '';
                    $selected_seats = $_POST['selected_seats'] ?? '';
                    $amount = $_POST['amount'] ?? '';
                    $date = $_POST['date'] ?? '';

                    // Save to session
                    $_SESSION['screen'] = $screen;
                    $_SESSION['seats'] = $selected_seats;
                    $_SESSION['amount'] = $amount;
                    $_SESSION['date'] = $date;

                    // Pass these values to bank.php via hidden inputs
                    echo "<input type='hidden' name='screen' value='" . htmlspecialchars($screen) . "' />";
                    echo "<input type='hidden' name='selected_seats' value='" . htmlspecialchars($selected_seats) . "' />";
                    echo "<input type='hidden' name='amount' value='" . htmlspecialchars($amount) . "' />";
                    echo "<input type='hidden' name='date' value='" . htmlspecialchars($date) . "' />";
                }
                ?>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include('footer.php'); ?>

<script>
    $(document).ready(function () {
        $('#form1').bootstrapValidator({
            fields: {
                name: {
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'The Name is required and can\'t be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'The Name can only consist of alphabets'
                        }
                    }
                },
                number: {
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'The Card Number is required and can\'t be empty'
                        },
                        stringLength: {
                            min: 16,
                            max: 16,
                            message: 'The Card Number must be 16 characters long'
                        },
                        regexp: {
                            regexp: /^[0-9 ]+$/,
                            message: 'Enter a valid Card Number'
                        }
                    }
                },
                date: {
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'The Expire Date is required and can\'t be empty'
                        }
                    }
                },
                cvv: {
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'The CVV is required and can\'t be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 3,
                            message: 'The CVV must be 3 characters long'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Enter a valid CVV'
                        }
                    }
                }
            }
        });
    });
</script>
