<?php
// THIS PAGE OUGHT TO SHOW A SINGLE VEHICLE

//page name. We set this inn the content start and also in the page title programatically
$page = "Vehicle";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=fleet/all";
$home_link_name = "All Vehicles";

$new_link = "index.php?page=fleet/new";
$new_link_name = "New Vehicle";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Vehicles";
$breadcrumb_active = "Vehicle";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$vehicle = get_vehicle($id);
	$bookings = vehicle_bookings($id);
	$log->info('Foo: ', $vehicle);
} else {
	$msg = "Couldn't fetch fetch vehicle";
	header("Location: index.php?page=fleet/all&msg=$msg");
}

?>
<script>
    console.log(<?php echo json_encode($bookings); ?>);
</script>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?></h3>
                    <h6 class="card-subtitle"><?php echo $vehicle['number_plate']; ?></h6>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                            <div class="white-box text-center"><img src="https://www.bootdey.com/image/430x600/00CED1/000000" class="img-responsive"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-5">Product description</h4>
                            <p> The <?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?> is a <?php echo $vehicle['drive_train']; ?> <?php echo $vehicle['category']; ?> loved by many. It can carry <?php echo $vehicle['seats']; ?> people. It's transmission is <?php echo $vehicle['transmission']; ?> and it uses <?php echo $vehicle['fuel']; ?> fuel .</p>
                            <h2 class="mt-5">
                                <?php echo number_format($vehicle['daily_rate']); ?>/- <small class="text-success">(per day)</small>
                            </h2>

                            <em><b><h5>Update Daily Rate</h5></b></em>
                            <form action="index.php?page=fleet/update_daily" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <input type="text" name="daily_rate" placeholder="Daily Rate" class="form-control form-control-border" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-dark btn-rounded mr-1" type="submit">Update</button>
                                </div>
                            </form>



                            <h3 class="box-title mt-5">Key Highlights</h3>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check text-success"></i><?php echo $vehicle['seats']; ?> seater</li>
                                <li><i class="fa fa-check text-success"></i><?php echo $vehicle['category']; ?></li>
                                <li><i class="fa fa-check text-success"></i><?php echo $vehicle['drive_train']; ?></li>
                            </ul>
                            <a href="index.php?page=fleet/edit&id=<?php echo $id; ?>" class="btn btn-dark btn-rounded">Edit Vehicle</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title mt-5">General Info</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-product">
                                    <tbody>
                                        <tr>
                                            <td width="390">Brand</td>
                                            <td><?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Registration</td>
                                            <td><?php echo $vehicle['number_plate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td><?php echo $vehicle['category']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Daily Rate</td>
                                            <td><?php echo number_format($vehicle['daily_rate']); ?>/-</td>
                                        </tr>
                                        <tr>
                                            <td>Deposit</td>
                                            <td><?php echo number_format($vehicle['refundable_security_deposit']); ?>/-</td>
                                        </tr>
                                        <tr>
                                            <td>Vehicle Excess</td>
                                            <td><?php echo number_format($vehicle['vehicle_excess']); ?>/-</td>
                                        </tr>
                                        <tr>
                                            <td>Transmission</td>
                                            <td><?php echo $vehicle['transmission']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Type</td>
                                            <td><?php echo $vehicle['fuel']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Seats</td>
                                            <td><?php echo $vehicle['seats']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bluetooth</td>
                                            <td><?php echo $vehicle['bluetooth']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Reverse Camera</td>
                                            <td><?php echo $vehicle['reverse_cam']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keyless Entry</td>
                                            <td><?php echo $vehicle['keyless_entry']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Audio Input</td>
                                            <td><?php echo $vehicle['audio_input']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Android Auto</td>
                                            <td><?php echo $vehicle['android_auto']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Apple Car Play</td>
                                            <td><?php echo $vehicle['apple_carplay']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="index.php?page=fleet/delete&id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2>Vehicle's bookings</h2>
                            <?php if (empty($bookings)): ?>
                                <h4>You currently have no bookings yet</h4>
                            <?php else: ?>
                            <table id="example1" class="table">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php forEach ($bookings as $booking): ?>
                                        <tr>
                                            <td> <?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?> </td>
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
                                            <td><?php echo $booking['total']; ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>
