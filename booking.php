<?php include('header.php');
if(!isset($_SESSION['user'])) {
    header('location:login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
?>
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="section group">
                <div class="about span_1_of_2">
                    <h3><?php echo $movie['movie_name']; ?></h3>
                    <div class="about-top">
                        <div class="grid images_3_of_2">
                            <img src="<?php echo $movie['image']; ?>" alt=""/>
                        </div>
                        <div class="desc span_3_of_2">
                            <p class="p-link" style="font-size:15px"><b>Cast : </b><?php echo $movie['cast']; ?></p>
                            <p class="p-link" style="font-size:15px"><b>Release Date : </b><?php echo date('d-M-Y', strtotime($movie['release_date'])); ?></p>
                            <p style="font-size:15px"><?php echo $movie['desc']; ?></p>
                            <a href="<?php echo $movie['video_url']; ?>" target="_blank" class="watch_but">Watch Trailer</a>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <!-- START FORM -->
                    <form action="process_booking.php" method="post">

                    <table class="table table-hover table-bordered text-center">
                        <?php
                        $s = mysqli_query($con, "select * from tbl_shows where s_id='" . $_SESSION['show'] . "'");
                        $shw = mysqli_fetch_array($s);

                        $t = mysqli_query($con, "select * from tbl_theatre where id='" . $shw['theatre_id'] . "'");
                        $theatre = mysqli_fetch_array($t);
                        ?>
                        <tr>
                            <td class="col-md-6">Theatre</td>
                            <td><?php echo $theatre['name'] . ", " . $theatre['place']; ?></td>
                        </tr>
                        <tr>
                            <td>Screen</td>
                            <td>
                                <?php
                                $ttm = mysqli_query($con, "select * from tbl_show_time where st_id='" . $shw['st_id'] . "'");
                                $ttme = mysqli_fetch_array($ttm);

                                $sn = mysqli_query($con, "select * from tbl_screens where screen_id='" . $ttme['screen_id'] . "'");
                                $screen = mysqli_fetch_array($sn);
                                echo $screen['screen_name'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>
                                <?php
                                if (isset($_GET['date'])) {
                                    $date = $_GET['date'];
                                } else {
                                    if ($shw['start_date'] > date('Y-m-d')) {
                                        $date = date('Y-m-d', strtotime($shw['start_date'] . "-1 days"));
                                    } else {
                                        $date = date('Y-m-d');
                                    }
                                    $_SESSION['dd'] = $date;
                                }
                                ?>
                                <div class="col-md-12 text-center" style="padding-bottom:20px">
                                    <?php if ($date > $_SESSION['dd']) { ?>
                                        <a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "-1 days")); ?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button></a>
                                    <?php } ?>
                                    <span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y', strtotime($date)); ?></span>
                                    <?php if ($date != date('Y-m-d', strtotime($_SESSION['dd'] . "+4 days"))) { ?>
                                        <a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "+1 days")); ?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
                                    <?php } 
                                    $av = mysqli_query($con, "select sum(no_seats) from tbl_bookings where show_id='" . $_SESSION['show'] . "' and ticket_date='$date'");
                                    $avl = mysqli_fetch_array($av);
                                    ?>
                                </div>
                                <input type="hidden" name="date" value="<?php echo $date; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Show Time</td>
                            <td><?php echo date('h:i A', strtotime($ttme['start_time'])) . " " . $ttme['name']; ?> Show</td>
                        </tr>
                        <tr>
                            <td>Number of Seats</td>
                            <td>
                                <input type="hidden" name="screen" value="<?php echo $screen['screen_id']; ?>"/>
                                <input type="number" required title="Number of Seats" max="<?php echo $screen['seats'] - $avl[0]; ?>" min="1" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
                                <input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td id="amount" style="font-weight:bold;font-size:18px">BDT <?php echo $screen['charge']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="seat-map-container">
                                    <h3>Select Your Seats</h3>
                                    <div class="screen-label">SCREEN THIS WAY</div>
                                    <div class="seat-map">
                                        <?php
                                        $booked_seats = [];
                                        $seat_query = mysqli_query($con, "SELECT seat_number FROM tbl_seat_bookings WHERE show_id='" . $_SESSION['show'] . "' AND booking_date='" . $date . "'");
                                        while ($seat = mysqli_fetch_array($seat_query)) {
                                            $booked_seats[] = $seat['seat_number'];
                                        }

                                        $layout = $screen['seat_layout'] ? json_decode($screen['seat_layout'], true) : [
                                            'rows' => 10,
                                            'cols' => 15,
                                            'gap_after' => [4, 9]
                                        ];

                                        $alphabet = range('A', 'Z');
                                        for ($row = 0; $row < $layout['rows']; $row++): ?>
                                            <div class="seat-row">
                                                <span class="row-label"><?php echo $alphabet[$row]; ?></span>
                                                <?php for ($col = 1; $col <= $layout['cols']; $col++):
                                                    $seat_num = $alphabet[$row] . $col;
                                                    $is_booked = in_array($seat_num, $booked_seats);
                                                    $is_gap = in_array($col - 1, $layout['gap_after']);
                                                    ?>
                                                    <?php if ($is_gap): ?>
                                                        <div class="seat-gap"></div>
                                                    <?php endif; ?>
                                                    <div class="seat <?php echo $is_booked ? 'booked' : 'available'; ?>" 
                                                        data-seat="<?php echo $seat_num; ?>" 
                                                        onclick="selectSeat(this)">
                                                        <?php echo $col; ?>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="seat-legend">
                                        <div><span class="seat available"></span> Available</div>
                                        <div><span class="seat booked"></span> Booked</div>
                                        <div><span class="seat selected"></span> Selected</div>
                                    </div>
                                    <input type="hidden" name="selected_seats" id="selected_seats">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php if ($avl[0] == $screen['seats']) { ?>
                                    <button type="button" class="btn btn-danger" style="width:100%">House Full</button>
                                <?php } else { ?>
                                    <button class="btn btn-info" style="width:100%">Book Now</button>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <!-- END FORM -->

                </div>
                <?php include('movie_sidebar.php'); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

<style>
.seat-map-container { margin: 20px 0; text-align: center; }
.screen-label { background: #007bff; color: white; padding: 5px; margin-bottom: 20px; border-radius: 5px; }
.seat-row { display: flex; justify-content: center; margin-bottom: 10px; align-items: center; }
.seat { width: 30px; height: 30px; margin: 0 3px; background: #28a745; color: white; display: flex; align-items: center; justify-content: center; border-radius: 5px; cursor: pointer; transition: all 0.3s; }
.seat.booked { background: #dc3545; cursor: not-allowed; }
.seat.selected { background: #ffc107; color: #000; }
.seat-gap { width: 20px; }
.row-label { width: 20px; margin-right: 10px; font-weight: bold; }
.seat-legend { display: flex; justify-content: center; gap: 20px; margin-top: 20px; }
.seat-legend .seat { cursor: default; margin-right: 5px; }
</style>

<script type="text/javascript">
$('#seats').change(function(){
    var charge = <?php echo $screen['charge']; ?>;
    let amount = charge * $(this).val();
    $('#amount').html("BDT " + amount);
    $('#hm').val(amount);
});

let selectedSeats = [];

function selectSeat(element) {
    const seatNum = element.getAttribute('data-seat');

    if (element.classList.contains('booked')) {
        alert("This seat is already booked!");
        return;
    }

    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        selectedSeats = selectedSeats.filter(s => s !== seatNum);
    } else {
        const maxSeats = parseInt(document.getElementById('seats').value) || 1;
        if (selectedSeats.length >= maxSeats) {
            alert(`You can only select ${maxSeats} seats`);
            return;
        }
        element.classList.add('selected');
        selectedSeats.push(seatNum);
    }

    document.getElementById('selected_seats').value = selectedSeats.join(',');
    document.getElementById('seats').value = selectedSeats.length;

    var charge = <?php echo $screen['charge']; ?>;
    let amount = charge * selectedSeats.length;
    $('#amount').html("BDT " + amount);
    $('#hm').val(amount);
}
</script>
