<?php
// THIS FILE DISPLAYS INDIVIDUAL PARTNER

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Partner";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=partners/all";
$home_link_name = "All Partners";

$new_link = "index.php?page=partners/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Partners";
$breadcrumb_active = "Partner";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//fetch partner
	$partner = get_partner($id);
	$no_of_vehicles = partner_vehicle_count($id);
	$no_of_bookings = partner_booking_count($id);
	$vehicles = partner_vehicles($id);
	$partner_vehicle_link = partner_vehicle_link($id);
}

// Program to display complete URL
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$link = "https";
} else {
	$link = "http";
}

// Here append the common URL characters
$link .= "://";

// Append the host(domain name,
// ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource
// location to the URL
$link .= $_SERVER['PHP_SELF'];

$link .= "?page=partners/show&id=${id}";
?>
<script>
	console.log(<?php echo json_encode($vehicles); ?>);
</script>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
				<div class="row d-flex">

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Partner</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($partner, 'name');?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Tel</span>
	                      <span class="info-box-number text-center text-muted mb-0">254<?php show_value($partner, 'phone_no');?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Email</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($partner, 'email');?> days</span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">New Lease</span>
	                      <span class="info-box-number text-center text-muted mb-0"><a href="index.php?page=partners/lease/new&id=<?php echo $id; ?>">Create <span class="fa fa-arrow-right"></span></a></span>
	                    </div>
	                  </div>
	                </div>

				</div>

				<div class="row ">

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Partner's vehicles</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_numeric_value($no_of_vehicles, 'vehicle_count');?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Bookings with partner's vehicles</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_numeric_value($no_of_bookings, 'booking_count');?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Percentage of bookings with partner's vehicles</span>
	                      <span class="info-box-number text-center text-muted mb-0">4%</span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-3 col-md-3">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Copy Partner Vehicle Link</span>
                          <p id="profile-pic-link" class="d-none"><?php echo $partner_vehicle_link; ?></p>
	                      <button onclick="copyToClipboard('#profile-pic-link')" class="btn btn-sm btn-success btn-block mt-2">Copy Link</button>
	                      <span class="info-box-number text-center text-muted mb-0">4%</span>
	                    </div>
	                  </div>
	                </div>

	                

				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-10">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Partner's Vehicles</h4>
	                    <table id="example1" class="table">
	                        <thead>
	                            <tr>
	                                <th>Model</th>
	                                <th>Make</th>
	                                <th>Registration</th>
	                                <th></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php forEach ($vehicles as $vehicle): ?>
	                                <tr>
	                                    <td><?php echo $vehicle['model'] ?> </td>
	                                    <td> <?php echo $vehicle['make']; ?> </td>
	                                    <td> <?php echo $vehicle['reg']; ?> </td>
	                                    <td><a href="index.php?page=fleet/show&id=<?php echo $vehicle['id']; ?>">Details</a></td>
	                                </tr>
	                            <?php endforeach;?>
	                        </tbody>
	                    </table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<?php echo $link; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include_once "partials/footer.php";?>