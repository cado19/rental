 <?php
    // THIS PAGE SHOWS ALL BOOKINGS

    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Organisation Bookings";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=bookings/all";
    $home_link_name = "All Bookings";

    $new_link      = "index.php?page=bookings/new";
    $new_link_name = "New Booking";

    $organisation_booking_link = "index.php?page=organisation_bookings/all";
    $organisation_booking_link_name = "Organisation bookings";

    $new_organisation_booking_link = "index.php?page=organisation_bookings/new";
    $new_organisation_booking_link_name = "New Organisation booking";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Bookings";
    $breadcrumb_active = "All Bookings";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
    $account_id = $_SESSION['account']['id'];
    $bookings   = organisation_bookings();

?>

<!-- Main Content  -->

<section class="content">
    <div class="container-fluid">
        <?php include_once 'partials/organisation_booking_nav.php';?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Client</th>
                                    <th>Vehicle</th>
                                    <th>Plate</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Ownership</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookings as $booking): ?>
                                    <tr>
                                        <td><?php show_value($booking, 'booking_no');?>  </td>
                                        <td><?php echo $booking['name']; ?></td>
                                        <td><?php echo $booking['model']; ?><?php echo " "; ?><?php echo " "; ?><?php echo $booking['make']; ?> </td>
                                        <td><?php echo $booking['number_plate']; ?> </td>
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
                                        <td>
                                            <?php show_owner($booking, 'partner_id') ?>
                                        </td>
                                        <td> <a href="index.php?page=organisation_bookings/show&id=<?php echo $booking['id']; ?>">Details</a> </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php";?>