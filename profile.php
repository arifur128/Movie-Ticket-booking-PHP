<?php 
include('header.php');
if(!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

?>
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="section group">
                <div class="about span_1_of_2">    
                    <h3 style="color:black;" class="text-center">BOOKING HISTORY</h3>
                    <?php include('msgbox.php'); ?>
                    <?php
                    $user_id = $_SESSION['user'];

                    // Optimized JOIN query
                    $query = "
                        SELECT 
                            b.*,
                            m.movie_name,
                            t.name AS theatre_name,
                            s.screen_name,
                            st.name AS show_time
                        FROM tbl_bookings b
                        JOIN tbl_shows sh ON b.show_id = sh.s_id
                        JOIN tbl_movie m ON sh.movie_id = m.movie_id
                        JOIN tbl_theatre t ON b.t_id = t.id
                        JOIN tbl_screens s ON b.screen_id = s.screen_id
                        JOIN tbl_show_time st ON sh.st_id = st.st_id
                        WHERE b.user_id = '$user_id'
                        ORDER BY b.date DESC
                    ";

                    $bk = mysqli_query($con, $query);

                    if(mysqli_num_rows($bk)) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Movie</th>
                                    <th>Theatre</th>
                                    <th>Screen</th>
                                    <th>Show</th>
                                    <th>Seats</th>
                                    <th>Seat Numbers</th>
                                    <th>Amount</th>
                                    <th>Booking Date</th>
                                    <th>Show Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($bkg = mysqli_fetch_assoc($bk)) {
                                // Get seat numbers
                                $seat_numbers = [];
                                $seat_query = mysqli_query($con, "SELECT seat_number FROM tbl_seat_bookings WHERE booking_id='".$bkg['book_id']."'");
                                while($seat = mysqli_fetch_assoc($seat_query)) {
                                    $seat_numbers[] = $seat['seat_number'];
                                }
                                ?>
                                <tr>
                                    <td><?php echo $bkg['ticket_id']; ?></td>
                                    <td><?php echo htmlspecialchars($bkg['movie_name']); ?></td>
                                    <td><?php echo htmlspecialchars($bkg['theatre_name']); ?></td>
                                    <td><?php echo htmlspecialchars($bkg['screen_name']); ?></td>
                                    <td><?php echo htmlspecialchars($bkg['show_time']); ?></td>
                                    <td><?php echo $bkg['no_seats']; ?></td>
                                    <td><?php echo implode(', ', $seat_numbers); ?></td>
                                    <td>BDT. <?php echo $bkg['amount']; ?></td>
                                    <td><?php echo date('d M Y', strtotime($bkg['date'])); ?></td>
                                    <td><?php echo date('d M Y', strtotime($bkg['ticket_date'])); ?></td>
                                    <td>
                                        <?php if($bkg['ticket_date'] < date('Y-m-d')) { ?>
                                            <span class="label label-success">Completed</span>
                                        <?php } else { ?>
                                            <a href="cancel.php?id=<?php echo $bkg['book_id']; ?>" class="btn btn-danger btn-xs">Cancel</a>
                                        <?php } ?>
                                        
                                        <?php if(!empty($bkg['ticket_pdf'])) { ?>
                                            <a href="download_ticket.php?file=<?php echo urlencode($bkg['ticket_pdf']); ?>" 
                                               class="btn btn-primary btn-xs" 
                                               title="Download Ticket">
                                                <i class="fa fa-download"></i> Ticket
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="alert alert-info">
                            <h4 style="color:red;" class="text-center">No Previous Bookings Found!</h4>
                            <p class="text-center">Once you start booking movie tickets with this account, you'll be able to see all the booking history.</p>
                        </div>
                    <?php } ?>
                </div>            
                <?php include('movie_sidebar.php'); ?>
            </div>
            <div class="clear"></div>        
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

<script type="text/javascript">
    $('#seats').change(function(){
        var charge = <?php 
        // fetch screen charge dynamically
        $screen_id = isset($bkg['screen_id']) ? $bkg['screen_id'] : 0;
        $screen_query = mysqli_query($con, "SELECT charge FROM tbl_screens WHERE screen_id = '$screen_id'");
        $screen = mysqli_fetch_assoc($screen_query);
        echo isset($screen['charge']) ? $screen['charge'] : 0;
        ?>;
        amount = charge * $(this).val();
        $('#amount').html("BDT " + amount);
        $('#hm').val(amount);
    });
</script>
