<?php
session_start();
include('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Detect user type (admin or theatre)
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 0) {
        $t_id = mysqli_real_escape_string($con, $_POST['t_id']);
    } elseif (isset($_SESSION['theatre'])) {
        $t_id = $_SESSION['theatre'];
    } else {
        $_SESSION['error'] = "Theatre ID not found!";
        header("Location: add_movie.php");
        exit();
    }

    // Form field names corrected to match your HTML form
    $movie_name   = mysqli_real_escape_string($con, $_POST['name']);
    $cast         = mysqli_real_escape_string($con, $_POST['cast']);
    $desc         = mysqli_real_escape_string($con, $_POST['desc']);
    $release_date = mysqli_real_escape_string($con, $_POST['rdate']);
    $video_url    = mysqli_real_escape_string($con, $_POST['video']);

    // Handle image upload
    $img_name = $_FILES['image']['name'];
    $img_tmp  = $_FILES['image']['tmp_name'];

    if (!is_dir("../../images/")) {
        mkdir("../../images/", 0777, true);
    }

    $img_path = "../../images/" . basename($img_name);
    if (move_uploaded_file($img_tmp, $img_path)) {

        $img_relative_path = 'images/' . basename($img_name);

        // Insert into database
        $sql = "INSERT INTO tbl_movie (t_id, movie_name, cast, `desc`, release_date, image, video_url, status)
                VALUES ('$t_id', '$movie_name', '$cast', '$desc', '$release_date', '$img_relative_path', '$video_url', 0)";

        if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = "✅ Movie added successfully!";
        } else {
            $_SESSION['error'] = "❌ SQL Error: " . mysqli_error($con);
        }

    } else {
        $_SESSION['error'] = "❌ Failed to upload image!";
    }

    header("Location: add_movie.php");
    exit();

} else {
    header("Location: add_movie.php");
    exit();
}
?>
