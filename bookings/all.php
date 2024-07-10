<?php
    include_once 'partials/content_start.php'; 
    $bookings = bookings();

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