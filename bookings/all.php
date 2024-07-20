<?php
    include_once 'partials/header.php';
    include_once 'partials/content_start.php'; 
    $account_id = $_SESSION['account']['id'];
    $bookings = bookings($account_id);

    // echo "<pre>";
    // print_r($bookings);
    // echo "</pre>";
?>

<!-- Main Content  -->
<main>
    <h1>Bookings</h1>

    <div class="recent-orders">
        <table id="myTable" class="dataTable">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Vehicle</th>
                    <th>Plate</th>
                    <th>Start</th>
                    <th>End</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php forEach($bookings as $booking): ?>
                    <tr>
                        <td> <?php echo $booking['first_name'];?> <?php echo $booking['last_name']; ?> </td>
                        <td> <?php echo $booking['model']; ?> <?php echo $booking['make']; ?> </td>
                        <td> <?php echo $booking['number_plate']; ?> </td>
                        <td> 
                            <?php
                                $start = strtotime($booking['start_date']);
                                echo date("l jS \of F Y", $start); 
                            ?> 
                        </td>
                        <td> 
                            <?php
                                $end = strtotime($booking['end_date']);
                                echo date("l jS \of F Y", $end); 
                            ?> 
                        </td>
                        <td> <a href="index.php?page=bookings/show&id=<?php echo $booking['id']; ?>">Details</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<div class="right-section">

    <div class="reminders">
        <div class="header">
            <h3>Actions</h3>
        </div>

        <div class="notification">
            <div class="icon">
                    <a href="index.php?page=bookings/new">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    </a>
                </div>
                <div class="content">
                    <div class="info">
                        New Booking
                    </div>
                </div>
        </div>
    </div>

</div>