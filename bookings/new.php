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