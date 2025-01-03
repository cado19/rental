<?php
// THIS FILE IS THE FORM FOR CREATING A NEW BOOKING

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "New Organisation booking";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=organisation_bookings/all";
$home_link_name = "All Organisation Bookings";

$new_link = "index.php?page=organisation_bookings/new";
$new_link_name = "New Organisation booking";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Organisation Bookings";
$breadcrumb_active = "New Organisation Booking";

include_once 'partials/header.php';
include_once 'partials/content_start.php';
$account_id = $_SESSION['account']['id'];

$vehicles = booking_vehicles();
$organisations = booking_organisations();
$drivers = booking_drivers();
?>
<script>
    console.log(<?php echo json_encode($organisations) ?>);
</script>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="index.php?page=organisation_bookings/create" method="post" autocomplete="off">
                            <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
                            <div class="form-group">
                                <label for="vehicle_id">Vehicle</label>
                                <select name="vehicle_id"  class="form-control form-control-border">
                                    <?php foreach ($vehicles as $vehicle): ?>
                                        <option value="<?php echo $vehicle['id']; ?>"> <?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?> <?php echo $vehicle['number_plate']; ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                                <?php if (isset($_GET['vehicle_error'])): ?>
                                    <p class="text-danger"> <?php echo $_GET['vehicle_error']; ?> </p>
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="customer_id">Organisation</label>
                                <select name="organisation_id" class="form-control form-control-border">
                                    <?php foreach ($organisations as $organisation): ?>
                                        <option value="<?php echo $organisation['id']; ?>"> <?php echo $organisation['name']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="driver_id">Driver</label>
                                <select name="driver_id" class="form-control form-control-border">
                                    <?php foreach ($drivers as $driver): ?>
                                        <option value="<?php echo $driver['id']; ?>"> <?php echo $driver['first_name']; ?> <?php echo $driver['last_name']; ?> </option>
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
                                        <?php if (isset($_GET['start_date_err'])): ?>
                                            <p class="text-danger"> <?php echo $_GET['start_date_err']; ?> </p>
                                        <?php endif;?>
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

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Start Time</label>
                                        <div class="input-group date" id="starttime" data-target-input="nearest">
                                            <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#starttime"/>
                                            <div class="input-group-append" data-target="#starttime" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php if (isset($_GET['start_time_err'])): ?>
                                            <p class="text-danger"> <?php echo $_GET['start_time_err']; ?> </p>
                                        <?php endif;?>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">End Time</label>
                                        <div class="input-group date" id="endtime" data-target-input="nearest">
                                            <input type="text" name="end_time" class="form-control datetimepicker-input" data-target="#endtime"/>
                                            <div class="input-group-append" data-target="#endtime" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                            </div>
                                        </div>
                                        <?php if (isset($_GET['end_time_err'])): ?>
                                            <p class="text-danger"> <?php echo $_GET['end_time_err']; ?> </p>
                                        <?php endif;?>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>