<?php
include '../../config.php'; // ঠিকঠাক লোকেশন

$result = mysqli_query($con, "
    SELECT m.movie_name, SUM(b.amount) AS earning
    FROM tbl_bookings b
    JOIN tbl_shows s ON b.show_id = s.s_id
    JOIN tbl_movie m ON s.movie_id = m.movie_id
    WHERE b.status = 1
    GROUP BY m.movie_name
");

if (!$result) {
    die('Query error: ' . mysqli_error($con));
}

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['movie_name'] . ' — ' . $row['earning'] . ' BDT<br>';
}
?>
