<?php
// THIS FILE IS THE FORM FOR CREATING A NEW BOOKING

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "New lease";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=partners/all";
$home_link_name = "All Partners";

$new_link = "index.php?page=partners/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Lease";
$breadcrumb_active = "New partner Lease";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

$account_id = $_SESSION['account']['id'];

$id = $_GET['id']; // get partner_id from url

$vehicles = partner_vehicles($id);

$log->info('vehicles', $vehicles);
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="index.php?page=partners/lease/create" method="post" autocomplete="off">
                            <input type="hidden" name="partner_id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="vehicle_id">Vehicle</label>
                                <select name="vehicle_id"  class="form-control form-control-border">
                                    <?php foreach ($vehicles as $vehicle): ?>
                                        <option value="<?php echo $vehicle['id']; ?>"> <?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?> <?php echo $vehicle['reg']; ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Start Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">End Date</label>
                                        <div class="input-group date" id="enddate" data-target-input="nearest">
                                            <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#enddate"/>
                                            <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <?php if (isset($_GET['end_date_err'])): ?>
                                            <p class="text-danger"> <?php echo $_GET['end_date_err']; ?> </p>
                                        <?php endif;?>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <label for="rate">Daily Rate</label>
                                <input type="text" name="rate" id="" class="form-control form-control-border">
                            </div>
                            <?php if (isset($_GET['rate_err'])): ?>
                                <p class="text-danger"> <?php echo $_GET['rate_err']; ?> </p>
                            <?php endif;?>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Create</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>