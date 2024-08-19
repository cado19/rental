<?php
$page = "New Driver";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=fleet/all";
$home_link_name = "All Drivers";

$new_link = "index.php?page=fleet/new";
$new_link_name = "New Driver";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Drivers";
$breadcrumb_active = "New Driver";

include_once 'partials/header.php';
include_once 'partials/content_start.php';
$account_id = $_SESSION['account']['id'];
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="index.php?page=fleet/create" method="post" autocomplete="off">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vehicle's Primary Details</h3>
                           <div class="card-tools">
                               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="make">Make</label>
                                        <input type="text" name="make" placeholder="eg: Toyota" class="form-control form-control-border" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" placeholder="eg: Land Cruiser" class="form-control form-control-border" required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="email">Number Plate</label>
                                <input type="text" name="number_plate" class="form-control form-control-border" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control form-control-border">
                                        <option value="">--Please choose an option--</option>
                                        <option value="Mid-size SUV"> Mid Size SUV </option>
                                        <option value="Mid-size SUV"> Crossover SUV </option>
                                        <option value="Medium Car"> Medium Car </option>
                                        <option value="Small Car "> Small Car </option>
                                        <option value="Safari"> Safari </option>
                                        <option value="Luxury"> Luxury </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="transmission">Transmission</label>
                                <select name="transmission" class="form-control form-control-border">
                                        <option value="">--Please choose an option--</option>
                                        <option value="Automatic"> Automatic </option>
                                        <option value="Manual"> Manual </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fuel">Fuel Type</label>
                                <select name="fuel" class="form-control form-control-border">
                                        <option value="">--Please choose an option--</option>
                                        <option value="Petrol"> Petrol </option>
                                        <option value="Diesel"> Diesel </option>
                                        <option value="Hybrid"> Hybrid </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fuel">Drive Train</label>
                                <select name="drive_train" class="form-control form-control-border">
                                        <option value="">--Please choose an option--</option>
                                        <option value="2WD"> 2WD </option>
                                        <option value="4WD"> 4WD </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="seats">Seats</label>
                                <input type="text" name="seats" class="form-control form-control-border" required>
                            </div>

                          </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Pricing</h3>
                           <div class="card-tools">
                               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum..
                            <div class="form-group">
                                <label for="daily_rate">Daily Rate</label>
                                <input type="text" name="daily_rate" class="form-control form-control-border" required>
                            </div>

                            <div class="form-group">
                                <label for="vehicle_excess">Vehicle Excess</label>
                                <input type="text" name="vehicle_excess" class="form-control form-control-border" required>
                            </div>

                            <div class="form-group">
                                <label for="deposit">Refundable Security Deposit</label>
                                <input type="text" name="deposit" class="form-control form-control-border" required>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Extras</h3>
                           <div class="card-tools">
                               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="bluetooth">Bluetooth</label>
                                <select name="bluetooth" class="form-control form-control-border">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vehicle_excess">Keyless Entry</label>
                                <select name="keyless_entry" class="form-control form-control-border">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="reverse_cam">Reverse Camera</label>
                                <select name="reverse_cam" class="form-control form-control-border">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="audio_input">Audio Input</label>
                                <select name="audio_input" class="form-control form-control-border">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gps">GPS</label>
                                <select name="gps" class="form-control form-control-border">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="android_auto">Android Auto</label>
                                <select name="android_auto" class="form-control form-control-border">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="apple_carplay">Apple Car Play</label>
                                <select name="apple_carplay" class="form-control form-control-border">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Add Vehicle</button>
                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>
</section>