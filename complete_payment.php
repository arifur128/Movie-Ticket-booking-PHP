<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

include('config.php');

// Initialize variables
$otp = isset($_POST['otp']) ? $_POST['otp'] : '';
$number = isset($_SESSION['card_number']) ? $_SESSION['card_number'] : 'XXXX-XXXX-XXXX-1234'; // fallback

// Load FPDF library (Composer or manual)
$fpdfLoaded = false;
$fpdfPaths = [
    __DIR__.'/vendor/autoload.php',  // Composer
    __DIR__.'/fpdf/fpdf.php',        // Manual
    __DIR__.'/fpdf.php'              // Direct
];
foreach ($fpdfPaths as $path) {
    if (file_exists($path)) {
        require_once $path;
        $fpdfLoaded = true;
        break;
    }
}
if (!$fpdfLoaded) {
    die("FPDF library not found. Install via composer or download from fpdf.org");
}

if ($otp == "271198") {
    $bookid = "BKID" . rand(1000000, 9999999);

    // Get movie/show details
    $show_query = mysqli_query($con, "SELECT m.movie_name, st.name as show_time 
                                    FROM tbl_shows s
                                    JOIN tbl_movie m ON s.movie_id = m.movie_id
                                    JOIN tbl_show_time st ON s.st_id = st.st_id
                                    WHERE s.s_id = '" . $_SESSION['show'] . "'");
    $show_data = mysqli_fetch_assoc($show_query);
    if (!$show_data) {
        die("Show data not found.");
    }

    // Insert booking
    $booking_query = "INSERT INTO tbl_bookings VALUES(
        NULL,
        '$bookid',
        '" . $_SESSION['theatre'] . "',
        '" . $_SESSION['user'] . "',
        '" . $_SESSION['show'] . "',
        '" . $_SESSION['screen'] . "',
        '" . count(explode(',', $_SESSION['seats'])) . "',
        '" . $_SESSION['amount'] . "',
        '" . $_SESSION['date'] . "',
        CURDATE(),
        '1',
        ''
    )";

    if (mysqli_query($con, $booking_query)) {
        $book_id = mysqli_insert_id($con);

        // Insert seat bookings
        $seats = explode(',', $_SESSION['seats']);
        foreach ($seats as $seat) {
            mysqli_query($con, "INSERT INTO tbl_seat_bookings VALUES(
                NULL,
                '" . $_SESSION['show'] . "',
                '" . $_SESSION['screen'] . "',
                '$seat',
                '$book_id',
                '" . $_SESSION['date'] . "'
            )");
        }

        // Generate ticket PDF
        try {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->SetTextColor(0, 0, 128);
            $pdf->Cell(0, 10, 'MOVIE TICKET', 0, 1, 'C');
            $pdf->Ln(10);

            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(40, 10, 'Booking ID:', 0, 0); $pdf->Cell(0, 10, $bookid, 0, 1);
            $pdf->Cell(40, 10, 'Movie:', 0, 0); $pdf->Cell(0, 10, $show_data['movie_name'], 0, 1);
            $pdf->Cell(40, 10, 'Theatre:', 0, 0); $pdf->Cell(0, 10, $_SESSION['theatre'], 0, 1);
            $pdf->Cell(40, 10, 'Screen:', 0, 0); $pdf->Cell(0, 10, $_SESSION['screen'], 0, 1);
            $pdf->Cell(40, 10, 'Seats:', 0, 0); $pdf->Cell(0, 10, $_SESSION['seats'], 0, 1);
            $pdf->Cell(40, 10, 'Date:', 0, 0); $pdf->Cell(0, 10, $_SESSION['date'], 0, 1);
            $pdf->Cell(40, 10, 'Show Time:', 0, 0); $pdf->Cell(0, 10, $show_data['show_time'], 0, 1);
            $pdf->Cell(40, 10, 'Amount:', 0, 0); $pdf->Cell(0, 10, '₹' . $_SESSION['amount'], 0, 1);

            if (!file_exists('tickets')) {
                mkdir('tickets', 0777, true);
            }
            $pdf_filename = 'tickets/ticket_' . $bookid . '.pdf';
            $pdf->Output('F', $pdf_filename);

            mysqli_query($con, "UPDATE tbl_bookings SET ticket_pdf='$pdf_filename' WHERE book_id='$book_id'");

            $_SESSION['success'] = "Booking Successful!";
            $_SESSION['ticket_pdf'] = $pdf_filename;
        } catch (Exception $e) {
            $_SESSION['error'] = "PDF generation failed: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Booking DB failed: " . mysqli_error($con);
    }
} else {
    $_SESSION['error'] = "Invalid OTP.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Processing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<table align='center'>
    <tr><td><strong>Transaction is being processed...</strong></td></tr>
    <tr><td><font color='blue'>Please wait <i class="fa fa-spinner fa-pulse fa-fw"></i></font></td></tr>
    <tr><td>(Do not RELOAD or CLOSE this page)</td></tr>
</table>
<script>
    setTimeout(function () {
        window.location = "profile.php";
    }, 3000);
</script>
</body>
</html>
