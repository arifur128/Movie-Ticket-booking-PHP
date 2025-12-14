<?php
include '../../config.php'; // ✅ DB config file

date_default_timezone_set('Asia/Dhaka');

// Query to fetch earnings with movie image
$sql = "SELECT m.movie_name, m.image, SUM(b.amount) AS earning
        FROM tbl_bookings b
        JOIN tbl_shows s ON b.show_id = s.s_id
        JOIN tbl_movie m ON s.movie_id = m.movie_id
        WHERE b.status = 1
          AND b.date >= CURDATE() - INTERVAL 1 DAY
        GROUP BY m.movie_name, m.image
        ORDER BY earning DESC";

$result = mysqli_query($con, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'movie' => $row['movie_name'],
        'image' => $row['image'], // e.g. 'images/gvkpster.jpg'
        'earning' => $row['earning']
    ];
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
