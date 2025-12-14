<div class="panel panel-default">
    <div class="panel-body" id="disp">
    <?php
        extract($_POST);
        include('../../config.php');

        $w = mysqli_query($con, "SELECT * FROM tbl_shows WHERE st_id='$id' AND r_status='1'");
        $swt = mysqli_fetch_array($w);

        // ✅ Safe check
        if ($swt && !empty($swt['s_id'])) {
            $qq = mysqli_query($con, "SELECT * FROM tbl_bookings WHERE show_id='" . $swt['s_id'] . "' AND date=CURDATE()");

            if (mysqli_num_rows($qq) > 0) {
                $m = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='" . $swt['movie_id'] . "'");
                $movie = mysqli_fetch_array($m);
                ?>
                
                <h3>
                    <small>Movie : </small>
                    <img src="../../<?php echo htmlspecialchars($movie['image']); ?>"
                         alt="Movie Poster"
                         style="height:50px; width:auto; border-radius:5px; margin-right:10px;">
                    <?php echo htmlspecialchars($movie['movie_name']); ?>
                </h3>
                
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Slno</th>
                            <th>Ticket ID</th>
                            <th>Viewer Name</th>
                            <th>Phone</th>
                            <th>Number of Tickets</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = 1;
                        while ($sh = mysqli_fetch_array($qq)) {
                            $us = mysqli_query($con, "SELECT * FROM tbl_registration WHERE user_id='" . $sh['user_id'] . "'");
                            $user = mysqli_fetch_array($us);
                            ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo htmlspecialchars($sh['ticket_id']); ?></td>
                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                <td><?php echo htmlspecialchars($user['phone']); ?></td>
                                <td><?php echo htmlspecialchars($sh['no_seats']); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo '<h3>No Bookings Found For Today.</h3>';
            }
        } else {
            echo '<h3>No Show Found.</h3>';
        }
    ?>
    </div>
</div>
