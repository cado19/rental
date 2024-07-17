<?php
    include_once 'partials/content_start.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $booking = booking($id);
        $log->info('Foo: ', $booking);
    }
    $start_date = strtotime($booking['start_date']);
    $end_date = strtotime($booking['end_date']); 
    $duration = ($end_date - $start_date)/86400;
    $total = $booking['daily_rate'] * $duration;
    $log->warning($total);
?>

<main>
    <h2>Booking for:</h2> <h3><?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?> </h3>
    <div class="analyze">
        <div class="sales">
            <div class="status">
                <div class="info">
                    <h3>Start Date</h3>
                    <h2> <?php echo date("l jS \of F Y", $start_date); ?> </h2>
                </div>
                <div class="progress">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M180-80q-24 0-42-18t-18-42v-620q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600v-430H180v430Zm0-490h600v-130H180v130Zm0 0v-130 130Zm300 230q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/></svg>
                </div>  
            </div>
        </div>

        <div class="sales">
            <div class="status">
                <div class="info">
                    <h3>End Date</h3>
                    <h2> <?php echo date("l jS \of F Y", $end_date); ?> </h2>
                </div>
                <div class="progress">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M180-80q-24 0-42-18t-18-42v-620q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600v-430H180v430Zm0-490h600v-130H180v130Zm0 0v-130 130Zm300 230q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/></svg>
                </div>  
            </div>
        </div>

    </div>


    <!-- New Users  -->
    <div class="new-users">
        <h2>Hire Details</h2>
        <div class="user-list">
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M70-80q-12 0-21-8.63-9-8.62-9-21.37v-333l88-209q5.11-12.86 16.05-20.43Q155-680 169-680h383q13.5 0 24.75 7.5T593-652l87 209v333q0 12.75-8.62 21.37Q662.75-80 650-80h-41q-12 0-21-8.63-9-8.62-9-21.37v-50H141v50q0 12.75-8.62 21.37Q123.75-80 111-80H70Zm60-422h461l-49-118H179l-49 118Zm-30 282h520v-222H100v222Zm110.82-61q21.18 0 35.68-15t14.5-35.5q0-20.5-14.62-35.5t-35.5-15Q190-382 175-367.13q-15 14.88-15 36.13 0 20 14.82 35 14.83 15 36 15Zm299 0q21.18 0 35.68-15t14.5-35.5q0-20.5-14.62-35.5t-35.5-15Q489-382 474-367.13q-15 14.88-15 36.13 0 20 14.82 35 14.83 15 36 15ZM740-203v-344l-81-193H237l13.68-32.25Q256-785 267.25-792.5T292-800h377q13.75 0 25.2 7.57T711-772l89 213v326q0 12.75-8.62 21.37Q782.75-203 770-203h-30Zm120-123v-344l-80-190H360l13.68-32.25Q379-905 390.25-912.5T415-920h375q13.75 0 25.2 7.57T832-892l88 210v326q0 12.75-8.62 21.37Q902.75-326 890-326h-30Zm-500-5Z"/></svg>
                <h2><?php echo $booking['model']; ?> <?php echo $booking['make']; ?></h2>
                <p><?php echo $booking['number_plate'] ?></p>
            </div>
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M360-860v-60h240v60H360Zm90 447h60v-230h-60v230Zm30 332q-74 0-139.5-28.5T226-187q-49-49-77.5-114.5T120-441q0-74 28.5-139.5T226-695q49-49 114.5-77.5T480-801q67 0 126 22.5T711-716l51-51 42 42-51 51q36 40 61.5 97T840-441q0 74-28.5 139.5T734-187q-49 49-114.5 77.5T480-81Zm0-60q125 0 212.5-87.5T780-441q0-125-87.5-212.5T480-741q-125 0-212.5 87.5T180-441q0 125 87.5 212.5T480-141Zm0-299Z"/></svg>
                <h2>Duration</h2>
                <p><?php echo $duration; ?> days</p>
            </div>
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M225-80q-43.75 0-74.37-30.63Q120-141.25 120-185v-135h120v-560h600v695q0 43.75-30.62 74.37Q778.75-80 735-80H225Zm509.91-60Q754-140 767-152.94q13-12.94 13-32.06v-635H300v500h390v135q0 19.12 12.91 32.06 12.91 12.94 32 12.94ZM360-640v-60h360v60H360Zm0 120v-60h360v60H360ZM224-140h406v-120H180v75q0 19.12 13 32.06Q206-140 224-140Zm0 0h-44 450-406Z"/></svg>
                <h2>Contract</h2>
                <p>Unsigned</p>
            </div>
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M540-420q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM220-280q-24.75 0-42.37-17.63Q160-315.25 160-340v-400q0-24.75 17.63-42.38Q195.25-800 220-800h640q24.75 0 42.38 17.62Q920-764.75 920-740v400q0 24.75-17.62 42.37Q884.75-280 860-280H220Zm100-60h440q0-42 29-71t71-29v-200q-42 0-71-29t-29-71H320q0 42-29 71t-71 29v200q42 0 71 29t29 71Zm480 180H100q-24.75 0-42.37-17.63Q40-195.25 40-220v-460h60v460h700v60ZM220-340v-400 400Z"/></svg>
                <h2>Payment</h2>
                <p> <?php echo number_format($booking['total']); ?>/- </p>
            </div>
        </div>
    </div>
<!-- End of New Users  -->

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

        <div class="notification">
            <div class="icon">
                <a href="index.php?page=contracts/edit&id=<?php echo $id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                </a>
            </div>
            <div class="content">
                <div class="info">
                    Edit Contract
                </div>
            </div>
        </div>

        <div class="notification">
            <div class="icon">
                <a href="index.php?page=contracts/show&id=<?php echo $id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                </a>
            </div>
            <div class="content">
                <div class="info">
                    Show Contract
                </div>
            </div>
        </div>

    </div>

</div>