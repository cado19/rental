<?php
    $page = "Sign Up";
    include_once 'partials/client-header.php';

    $countries = countries();
?>

<div class="container bootstrap snippets bootdeys">
<div class="row d-flex justify-content-center">
  <div class="col-xs-12 col-sm-9 col-8">
    <div class="panel panel-default">
      <div class="panel-body text-center">
       <img src="assets/kizusi_logo_white.png" class="img-circle profile-avatar" alt="User avatar">
      </div>
        <ul class="nav nav-pills justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?page=client/register/new">Individual</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=client/register/new_organisation">Organisation</a>
          </li>
        </ul>
    </div>

    <form class="form-horizontal" method="POST" action="index.php?page=client/register/create" enctype="multipart/form-data">

      <div class="panel panel-default">


        <div class="panel-body">
    	  <!-- Country  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">Location</label>
            <div class="col-sm-10">
              <select name="country" class="form-control">
                <option selected="">Select country</option>
                    <?php foreach ($countries as $country): ?>
                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                    <?php endforeach;?>
              </select>
            </div>
          </div>
          <!-- Name  -->
          <div class="row">
          	<div class="col-6">
          		<div class="form-group">

	          		<label for="first_name" class="col-sm-2 control-label">First Name</label>
	          		<div class="col-sm-10">

		                <input type="text" name="first_name" placeholder="eg: Michelle" class="form-control" required>
		                <?php if (isset($_GET['first_name_err'])): ?>
		                    <p class="text-danger"><?php echo $_GET['first_name_err']; ?></p>
		                <?php endif;?>
	          		</div>
          		</div>
          	</div>
          	<div class="col-6">
          		<div class="form-group">

	          		<label for="last_name" class="col-sm-2 control-label">Last Name</label>
	          		<div class="col-sm-10">
		                <input type="text" name="last_name" placeholder="eg: Ngele" class="form-control" required>
		                <?php if (isset($_GET['last_name_err'])): ?>
		                    <p class="text-danger"><?php echo $_GET['last_name_err']; ?></p>
		                <?php endif;?>
	          		</div>
          		</div>
          	</div>
          </div>

          <!-- Date of Birth  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">Date of Birth</label>
            <div class="col-sm-10">
	            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="date_of_birth" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
          </div>

          <!-- ID Type  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">ID Type</label>
            <div class="col-sm-10">
            <select name="id_type" class="form-control">
                    <option value="">--Please choose an option--</option>
                    <option value="national_id"> National ID </option>
                    <option value="passport"> Passport </option>
                    <option value="military_id"> Military ID </option>
            </select>
            <?php if (isset($_GET['id_type_err'])): ?>
                <p class="text-danger"><?php echo $_GET['id_type_err']; ?></p>
            <?php endif;?>
            </div>
          </div>

          <!-- ID Number  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">ID Number</label>
            <div class="col-sm-10">
              <input type="text" name="id_number" class="form-control">
            </div>
            <?php if (isset($_GET['id_number_err'])): ?>
                <p class="text-danger"><?php echo $_GET['id_number_err']; ?></p>
            <?php endif;?>
          </div>

          <!-- DL Number  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">DL Number</label>
            <div class="col-sm-10">
              <input type="text" name="dl_number" class="form-control">
            </div>
            <?php if (isset($_GET['id_number_err'])): ?>
                <p class="text-danger"><?php echo $_GET['dl_number_err']; ?></p>
            <?php endif;?>
          </div>

          <!-- DL Expiry  -->
          <div class="form-group">
            <label class="col-sm-2 control-label">DL Expiry</label>
            <div class="col-sm-10">
            	<div class="input-group date" id="dl_expiry" data-target-input="nearest">
                    <input type="text" name="dl_expiry" class="form-control datetimepicker-input" data-target="#dl_expiry"/>
                    <div class="input-group-append" data-target="#dl_expiry" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
          </div>
        </div>


      <!-- </div> -->

      <div class="panel panel-default">

        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Mobile number</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="phone" name="tel">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail address</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email">
            </div>
            <?php if (isset($_GET['email_err'])): ?>
                <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
            <?php endif;?>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Work address</label>
            <div class="col-sm-10">
            	<input type="text" name="work_address" id="" class="form-control" >
            </div>
          </div>

		  <div class="form-group">
            <label class="col-sm-2 control-label">Residential address</label>
            <div class="col-sm-10">
            	<input type="text" name="residential_address" class="form-control >
            </div>
          </div>


        </div>
      </div>

      <div class="panel panel-default">
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2 col-8 mt-2">
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

<?php include_once 'partials/client-footer.php';?>