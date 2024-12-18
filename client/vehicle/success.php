<?php
$page = "Success";
include_once 'partials/client-header.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

// $countries = countries();
?>

<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="row d-flex justify-content-center align-items-center">

			<div class="col success-col">
				<div id="success" class="text-center ">
					<img src="assets/kizusi_logo_white.png" class="img-circle profile-avatar" alt="User avatar">
					<span class="success-icon"><i class="fa fa-check fa-5x"></i></span>
					<h3>Vehicle was saved successfully.</h3>
					<div class="row">
						<a href="index.php?page=client/vehicle/new&id=$id" class="btn btn-outline-primary">Add another vehicle</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>