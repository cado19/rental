<?php
    $vehicles = booking_vehicles();
    $customers = booking_customers();
    $drivers = booking_drivers();
    // echo "<pre>";
    // print_r($customers);
    // echo "</pre>";
    include_once 'partials/content_start.php';
?>

<main>
    
    <div class="info-collect">
        <h2>Create Booking</h2>
        <div class="form-container">
            <form action="index.php?page=bookings/create" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="vehicle_id">Vehicle</label>
                    <select name="vehicle_id">
                        <?php foreach($vehicles as $vehicle): ?>
                            <option value="<?php echo $vehicle['id']; ?>"> <?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?> <?php echo $vehicle['number_plate'];?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id">
                        <?php foreach($customers as $customer): ?>
                            <option value="<?php echo $customer['id']; ?>"> <?php echo $customer['first_name']; ?> <?php echo $customer['last_name']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="driver_id">Driver</label>
                    <select name="driver_id">
                        <?php foreach($drivers as $driver): ?>
                            <option value="<?php echo $driver['id']; ?>"> <?php echo $driver['first_name']; ?> <?php echo $driver['last_name']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="dates">
                
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="text" name="start_date" id="start_date_picker">
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="text" name="end_date" id="end_date_picker">
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit">Proceed to Contract</button>
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
                    <a href="index.php?page=bookings/all">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                    </a>
                </div>
                <div class="content">
                    <div class="info">
                        All Bookings
                    </div>
                </div>
        </div>
    </div>

</div>