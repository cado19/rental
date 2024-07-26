<?php 
    include_once 'partials/header.php';
    include_once 'partials/content_start.php'; 
    $account_id = $_SESSION['account']['id'];
?>

<main>
    
    <div class="info-collect">
        <h2>Add Vehicle</h2>
        <div class="form-container">
            <form action="index.php?page=fleet/create" method="post" autocomplete="off">
                <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
                <div class="dates">
                    
                    <div class="form-group">
                        <label for="make">Make</label>
                        <input type="text" name="make" placeholder="eg: Toyota" required>
                    </div>

                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" name="model" placeholder="eg: Land Cruiser" required>
                    </div>

                </div>

                <div class="form-group">
                    <label for="email">Number Plate</label>
                    <input type="text" name="number_plate" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category">
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
                    <select name="transmission">
                            <option value="">--Please choose an option--</option>
                            <option value="Automatic"> Automatic </option>
                            <option value="Manual"> Manual </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fuel">Fuel Type</label>
                    <select name="fuel">
                            <option value="">--Please choose an option--</option>
                            <option value="Petrol"> Petrol </option>
                            <option value="Diesel"> Diesel </option>
                            <option value="Hybrid"> Hybrid </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fuel">Drive Train</label>
                    <select name="drive_train">
                            <option value="">--Please choose an option--</option>
                            <option value="2WD"> 2WD </option>
                            <option value="4WD"> 4WD </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="seats">Seats</label>
                    <input type="text" name="seats" required>
                </div>

                <hr>

                <h2>Pricing</h2>
                


                <div class="form-group">
                    <label for="daily_rate">Daily Rate</label>
                    <input type="text" name="daily_rate" required>
                </div>

                <div class="form-group">
                    <label for="vehicle_excess">Vehicle Excess</label>
                    <input type="text" name="vehicle_excess" required>
                </div>

                <div class="form-group">
                    <label for="deposit">Refundable Security Deposit</label>
                    <input type="text" name="deposit" required>
                </div>


                <div class="form-group">
                    <button type="submit">Add Vehicle</button>
                </div>
            </form>
        </div>
    </div>
</main>

<div class="right-section">

    <div class="reminders">
        <div class="header">
            <h3>Actions</h3>
        </div>

        <div class="notification">
            <div class="icon">
                    <a href="index.php?page=fleet/all">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                    </a>
                </div>
                <div class="content">
                    <div class="info">
                        All Vehicles
                    </div>
                </div>
        </div>
    </div>

</div>