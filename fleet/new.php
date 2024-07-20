<?php 
    include_once 'partials/header.php';
    include_once 'partials/content_start.php'; 
?>

<main>
    
    <div class="info-collect">
        <h2>Add Vehicle</h2>
        <div class="form-container">
            <form action="index.php?page=customers/create" method="post" autocomplete="off">
                <div class="dates">
                    
                    <div class="form-group">
                        <label for="make">Make</label>
                        <input type="text" name="make" placeholder="eg: Toyota" required>
                    </div>

                    <div class="form-group">
                        <label for="model">Last Name</label>
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
                            <option value="mid-size suv"> Mid Size SUV </option>
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
                            <option value="national_id"> Automatic </option>
                            <option value="passport"> Manual </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fuel">Fuel Type</label>
                    <select name="fuel">
                            <option value="">--Please choose an option--</option>
                            <option value="petrol"> Petrol </option>
                            <option value="Diesel"> Diesel </option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="id">Seats</label>
                    <input type="text" name="seats" required>
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