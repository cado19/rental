<?php
    // THIS PAGE ALLOWS A USER TO TAKE A SELFIE FOR CLIENT'S PROFILE IMAGE
    $page = "Upload License image";
    include_once 'partials/client-header.php';

    if (isset($_GET['id'])) {
        $id       = $_GET['id'];
        $customer = get_customer($id);
    }
?>

<div class="container bootstrap snippets bootdeys">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<!-- Banner Image -->
	        <div class="panel panel-default">
	        	<div class="panel-body text-center">
		        	<img src="assets/kizusi_logo_white.png" class="img-circle profile-avatar" alt="User avatar">
		        </div>
	        </div>

	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<h4 class="panel-title">Upload License image</h4>
	        	</div>

	        	<div class="panel-body">
	        		<form class="form-horizontal" method="POST" action="index.php?page=client/register/license_process" enctype="multipart/form-data">

					    <input type="hidden" name="id" value="<?php echo $id ?>">
		        		<div class="form-group">
		        			<label for="id_profile">License Image:</label>
						    <input type="file" class="form-control-file" name="license_image">
		        		</div>

		        		<div class="form-group">
		        			<button type="submit" class="btn btn-outline-primary">Submit</button>
		        		</div>
	        		</form>
	        	</div>
	        </div>
		</div>
	</div>
</div>
