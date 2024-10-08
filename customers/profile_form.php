<?php
// THIS PAGE DISPLAYS DISPLAYS A FORM TO UPLOAD PROFILE IMAGE
// head to login screen if user is not signed in.
include_once 'config/session_script.php';

$page = "Upload Profile Picture";

include_once 'partials/client-header.php';
include_once 'partials/client-nav.php';

$vehicles = catalog_vehicles();
$client = $_SESSION['client'];
$id = $client['id'];
?>


	<div class="container">
		<div class="row mt-3">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Upload Profile Image</h3>
				</div>
				<div class="card-body">
					<form action="index.php?page=customers/profile_upload" method="post" enctype="multipart/form-data">
					    <div class="form-group">
						    <label for="id_profile">Select Image Files to Upload:</label>
						    <input type="hidden" name="id" value="<?php echo $id ?>">
						    <input type="file" class="form-control-file" name="profile_image">
					    </div>
					    <input type="submit" name="submit" class="btn btn-outline-dark" value="UPLOAD">
					</form>
				</div>
			</div>
		</div>
	</div>
