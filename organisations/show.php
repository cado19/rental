<?php
// THIS PAGE WILL SHOW INDIVIDUAL ORGANISATION'S DETAILS

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Organisation";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=organisations/all";
$home_link_name = "All organisations";

$new_link = "index.php?page=organisations/new";
$new_link_name = "New organisation";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Organisations";
$breadcrumb_active = "Organisations";

// include navbar, functions, db_conn and sidebar
include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch id from url and use to fetch organisation record from database
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// get organisation 
	$organisation = get_organisation($id);

	// get organisation's booknings 
	$bookings = current_organisation_bookings($id);

	$log->info('Foo: ', $organisation);
} else {
	$msg = "Couldn't fetch user";
	header("Location: index.php?page=organisations/all&err_msg=$msg");

}

?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<div class="card shadow mb-4 mb-xl-0">
					<div class="card-body">
						<p>Name: <?php show_value($organisation, 'name'); ?></p>
						<p>Email: <?php show_value($organisation, 'email'); ?></p>
						<p>Company No: <?php show_value($organisation, 'company_no'); ?></p>
						<p>Address: <?php show_value($organisation, 'company_address'); ?></p>
						<p>Tel: <?php show_value($organisation, 'phone_no'); ?></p>
						<p>Country: <?php show_value($organisation, 'country'); ?></p>
						<br>
						<a href="index.php?page=organisations/delet&id=<?php echo $id; ?>" class="btn btn-outline-danger">Delete</a>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<!-- // info box to upload certificate -->

				<!-- // info box to upload kra pin -->
			</div>
		</div>
		<div class="row  mt-3">
			<!-- Show organisation's bookings -->
			<div class="card shadow mb-4 mb-xl-0">
				<div class="card-header">
					<?php show_value($organisation, 'name'); ?>'s Bookings
					<div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
				</div>
				<div class="card-body">
                    <?php if (empty($bookings)): ?>
                        <p><?php echo $customer['first_name']; ?> has no bookings</p>
                    <?php else: ?>
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Vehicle</th>
                                    <th>Plate</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookings as $booking): ?>
                                    <tr>
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
                                        <td> <a href="index.php?page=organisation_bookings/show&id=<?php echo $booking['id']; ?>">Details</a> </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif;?>
				</div>
			</div>
		</div>
	</div>
</section>