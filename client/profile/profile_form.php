
<?php
    // THIS PAGE ALLOWS A USER TO TAKE A SELFIE FOR CLIENT'S PROFILE IMAGE
    $page = "Capture Profile Picture";
    include_once 'partials/client-header.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>



	<div class="container">
		<div class="row mt-3">
			<div class="col-10">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Upload Profile Image</h3>
					</div>
					<div class="card-body">
						<form action="index.php?page=client/profile/profile_upload" method="post" enctype="multipart/form-data">
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
	</div>
