<?php
include 'config.php';

$sql = "SELECT m.movie_name, SUM(b.amount) AS earning
        FROM tbl_bookings b
        JOIN tbl_shows s ON b.show_id = s.s_id
        JOIN tbl_movie m ON s.movie_id = m.movie_id
        WHERE MONTH(b.date) = MONTH(CURDATE()) AND YEAR(b.date) = YEAR(CURDATE()) AND b.status = 1
        GROUP BY m.movie_name";

$result = mysqli_query($con, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = ['movie' => $row['movie_name'], 'earning' => $row['earning']];
}

echo json_encode($data);
?>
