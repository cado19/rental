<?php
    $page = "Add Vehicle";
    include_once 'partials/client-header.php';

    if (isset($_GET['id'])) {
        $partner_id = $_GET['id'];
    }

    $categories = categories();
?>

<div class="container bootstrap snippets bootdeys">
    <div class="row d-flex justify-content-center">
        <div class="col-xs-12 col-sm-9 col-8">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <img src="assets/kizusi_logo_white.png" class="img-circle profile-avatar" alt="User avatar">
                </div>
            </div>

            <form action="index.php?page=client/vehicle/create" method="POST">
                <!-- partner_id -->
                <input type="hidden" name="partner_id" value="<?php echo $partner_id ?>">
                <div class="panel panel-default">
                    <h6>Basic Vehicle Details</h6>
                      <?php // Make and Model Input ?> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="make">Make</label>
                                <input type="text" name="make" placeholder="eg: Toyota" class="form-control form-control-border" required>
                                <?php if (isset($_GET['make_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['make_err']; ?></p>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" name="model" placeholder="eg: Land Cruiser" class="form-control form-control-border" required>
                                <?php if (isset($_GET['model_err'])): ?>
                                    <p class="text-danger"><?php echo $_GET['model_err']; ?></p>
                                <?php endif;?>
                            </div>
                        </div>

                    </div>
                    <?php // Number Plate Input ?> 
                    <div class="row">
                        <h6 class="text-center"><b>Number Plate:</b></h6>
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="num_plate_1" placeholder="eg: KAA" class="form-control form-control-border" required>
                                    <?php if (isset($_GET['num_plate_1_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['num_plate_1_err']; ?></p>
                                    <?php endif;?>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="num_plate_2" placeholder="eg: 123X" class="form-control form-control-border" required>
                                    <?php if (isset($_GET['num_plate_2_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['num_plate_2_err']; ?></p>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php // Number Plate Input ?>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control form-control-border">
                                <option value="">--Please choose an option--</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach;?>
                        </select>
                        <?php if (isset($_GET['category_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['category_err']; ?></p>
                        <?php endif;?>
                    </div>

                    <?php // Transmission Input ?>
                    <div class="form-group">
                        <label for="transmission">Transmission</label>
                        <select name="transmission" class="form-control form-control-border">
                                <option value="">--Please choose an option--</option>
                                <option value="Automatic"> Automatic </option>
                                <option value="Manual"> Manual </option>
                        </select>
                        <?php if (isset($_GET['transmission_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['transmission_err']; ?></p>
                        <?php endif;?>
                    </div>

                    <?php // Transmission Input ?>
                    <div class="form-group">
                        <label for="fuel">Fuel Type</label>
                        <select name="fuel" class="form-control form-control-border">
                                <option value="">--Please choose an option--</option>
                                <option value="Petrol"> Petrol </option>
                                <option value="Diesel"> Diesel </option>
                                <option value="Hybrid"> Hybrid </option>
                        </select>
                        <?php if (isset($_GET['fuel_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['fuel_err']; ?></p>
                        <?php endif;?>
                    </div>

                    <div class="form-group">
                        <label for="fuel">Drive Train</label>
                        <select name="drive_train" class="form-control form-control-border">
                                <option value="">--Please choose an option--</option>
                                <option value="2WD"> 2WD </option>
                                <option value="4WD"> 4WD </option>
                        </select>
                        <?php if (isset($_GET['drive_train_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['drive_train_err']; ?></p>
                        <?php endif;?>
                    </div>

                    <div class="form-group">
                        <label for="seats">Seats</label>
                        <input type="text" name="seats" class="form-control form-control-border" required>
                        <?php if (isset($_GET['seats_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['seats_err']; ?></p>
                        <?php endif;?>
                    </div>

                    <div class="form-group">
                        <label for="seats">Colour</label>
                        <input type="text" name="colour" class="form-control form-control-border" required>
                        <?php if (isset($_GET['colour_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['colour_err']; ?></p>
                        <?php endif;?>
                    </div>

                </div>

                <div class="panel panel-default">
                    <h5>Vehicle Pricing</h5>

                    <div class="form-group">
                        <label for="daily_rate">Daily Rate</label>
                        <input type="text" name="daily_rate" class="form-control form-control-border" required>
                        <?php if (isset($_GET['daily_rate_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['daily_rate_err']; ?></p>
                        <?php endif;?>
                    </div>


                    <div class="form-group">
                        <label for="vehicle_excess">Vehicle Excess</label>
                        <input type="text" name="vehicle_excess" class="form-control form-control-border" required>
                        <?php if (isset($_GET['vehicle_excess_err'])): ?>
                            <p class="text-danger"><?php echo $_GET['vehicle_excess_err']; ?></p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <buttton type="submit" class="btn btn-outline-dark">Save</buttton>
                </div>
            </form>
        </div>
    </div>
</div>