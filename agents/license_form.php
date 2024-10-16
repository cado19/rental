<?php
// THIS PAGE WILL DISPLAY A FORM FOR UPLOADING A CLIENT'S LICENSE CARD IMAGE

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Upload Agent ID";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=agents/all";
$home_link_name = "All agents";

$new_link = "index.php?page=agents/new";
$new_link_name = "New Agent";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Agents";
$breadcrumb_active = "Upload License";

// GET customer ID FROM URL
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

include_once 'partials/header.php';
include_once 'partials/content_start.php';

?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Upload License Image</h3>
				</div>
				<div class="card-body">
					<form action="index.php?page=agents/license_upload" method="post" enctype="multipart/form-data">
					    <div class="form-group">
						    <label for="id_profile">Select Image Files to Upload:</label>
						    <input type="hidden" name="id" value="<?php echo $id; ?>">
						    <input type="file" class="form-control-file" name="license_image">
					    </div>
					    <input type="submit" name="submit" class="btn btn-outline-dark" value="UPLOAD">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>