<?php 
    include_once 'partials/header.php';
    include_once 'partials/content_start.php'; 
    $account_id = $_SESSION['account']['id'];
?>

<main>
    
    <div class="info-collect">
        <h2>Add Customer</h2>
        <div class="form-container">
            <form action="index.php?page=customers/create" method="post" autocomplete="off">
                <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
                <div class="dates">
                    
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" placeholder="eg: Michelle" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" placeholder="eg: Ngele" required>
                    </div>

                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="id">Id Number</label>
                    <input type="text" name="id_number" required>
                </div>

                <div class="form-group">
                    <label for="tel">Tel</label>
                    <div class="InputAddOn">
                        <span class="InputAddOn-Item" style="width: 10%; margin: auto; font-size: 15px;"><label for="">+254</label></span>
                        <input type="text" name="tel" class="InputAddOn-field" placeholder="without '0'" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="text" name="date_of_birth" id="start_date_picker" required>
                </div>

                <div class="form-group">
                    <button type="submit">Add Driver</button>
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
                    <a href="index.php?page=drivers/all">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                    </a>
                </div>
                <div class="content">
                    <div class="info">
                        All Dribers
                    </div>
                </div>
        </div>
    </div>

</div>