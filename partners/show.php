<?php
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
}

?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
				<div class="row d-flex justify-content-center">

	                <div class="col-12 col-sm-4">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Partner</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($partner['name']);?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-4">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Tel</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($partner['phone_no']);?></span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-4">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Email</span>
	                      <span class="info-box-number text-center text-muted mb-0"><?php show_value($partner['email']);?> days</span>
	                    </div>
	                  </div>
	                </div>

				</div>

				<div class="row d-flex justify-content-center">

	                <div class="col-12 col-sm-4">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Partner's vehicles</span>
	                      <span class="info-box-number text-center text-muted mb-0">10</span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-4">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Bookings with partner's vehicles</span>
	                      <span class="info-box-number text-center text-muted mb-0">22</span>
	                    </div>
	                  </div>
	                </div>

	                <div class="col-12 col-sm-4">
	                  <div class="info-box bg-light">
	                    <div class="info-box-content">
	                      <span class="info-box-text text-center text-muted">Percentage of bookings with partner's vehicles</span>
	                      <span class="info-box-number text-center text-muted mb-0">4%</span>
	                    </div>
	                  </div>
	                </div>

				</div>



			</div>
		</div>
	</div>
</section>