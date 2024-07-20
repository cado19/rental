<?php
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $vehicle = get_vehicle($id);
        $log->info('Foo: ', $vehicle);
    }
    
?>

<main>
    <h2>Showing Vehicle:</h2> <h3>  </h3>
    <div class="analyze">
        <div class="sales">
            <div class="status">
                <div class="info">
                    <h3>Model</h3>
                    <h2> <?php echo $vehicle['model']; ?> <?php echo $vehicle['make']; ?> </h2>
                </div>
                <div class="progress">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M180-80q-24 0-42-18t-18-42v-620q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600v-430H180v430Zm0-490h600v-130H180v130Zm0 0v-130 130Zm300 230q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/></svg>
                </div>  
            </div>
        </div>

        <div class="sales">
            <div class="status">
                <div class="info">
                    <h3>Registration</h3>
                    <h2> <?php echo $vehicle['number_plate']; ?> </h2>
                </div>
                <div class="progress">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M180-80q-24 0-42-18t-18-42v-620q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600v-430H180v430Zm0-490h600v-130H180v130Zm0 0v-130 130Zm300 230q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/></svg>
                </div>  
            </div>
        </div>

    </div>


    <!-- New Users  -->
    <div class="new-users">
        <h2>More Details</h2>
        <div class="user-list">
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M70-80q-12 0-21-8.63-9-8.62-9-21.37v-333l88-209q5.11-12.86 16.05-20.43Q155-680 169-680h383q13.5 0 24.75 7.5T593-652l87 209v333q0 12.75-8.62 21.37Q662.75-80 650-80h-41q-12 0-21-8.63-9-8.62-9-21.37v-50H141v50q0 12.75-8.62 21.37Q123.75-80 111-80H70Zm60-422h461l-49-118H179l-49 118Zm-30 282h520v-222H100v222Zm110.82-61q21.18 0 35.68-15t14.5-35.5q0-20.5-14.62-35.5t-35.5-15Q190-382 175-367.13q-15 14.88-15 36.13 0 20 14.82 35 14.83 15 36 15Zm299 0q21.18 0 35.68-15t14.5-35.5q0-20.5-14.62-35.5t-35.5-15Q489-382 474-367.13q-15 14.88-15 36.13 0 20 14.82 35 14.83 15 36 15ZM740-203v-344l-81-193H237l13.68-32.25Q256-785 267.25-792.5T292-800h377q13.75 0 25.2 7.57T711-772l89 213v326q0 12.75-8.62 21.37Q782.75-203 770-203h-30Zm120-123v-344l-80-190H360l13.68-32.25Q379-905 390.25-912.5T415-920h375q13.75 0 25.2 7.57T832-892l88 210v326q0 12.75-8.62 21.37Q902.75-326 890-326h-30Zm-500-5Z"/></svg>
                <h2>Compensation: </h2>
                <p><?php echo number_format($vehicle['vehicle_excess']);  ?>/-</p>
            </div>
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M550-440q-28.87 0-49.44-20.56Q480-481.13 480-510v-220q0-28.88 20.56-49.44Q521.13-800 550-800h100q28.88 0 49.44 20.56T720-730v220q0 28.87-20.56 49.44Q678.88-440 650-440H550Zm-10-60h120v-240H540v240ZM372-240q-23 0-42-13.5T305-290L200-643v-157h60v148l104.55 352H720v60H372Zm-52 120v-60h400v60H320Zm220-620h120-120Z"/></svg>
                <h2>Seats</h2>
                <p><?php echo $vehicle['seats']; ?> days</p>
            </div>
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M770-319q-72 0-122.5-44.5T583-478H413l-35-60h205q3-27 15-53.5t31-47.5H317l-36-60h383l-55-161H440v-60h169q20.09 0 35.55 11.5Q660-897 666-879l61 180h33q87 0 143.5 52T960-509q0 78-56 134t-134 56Zm0-60q52 0 91-39t39-91q0-56-37-93t-92.88-37q-1.12 0-9.62.5t-9.5.5l40 110-56 20-41-111q-27 23-40.5 49.5T640-509q0 54.17 37.92 92.08Q715.83-379 770-379ZM280-40q-45.42 0-77.21-31.79Q171-103.58 171-149v-11H0v-60h197q13-15 34-26.5t49-11.5q25 0 45.5 10t37.5 28h127v-120H0v-60h90v-120H0v-60h282l108 180h100q24.75 0 42.38 17.62Q550-364.75 550-340v120q0 24.75-17.62 42.37Q514.75-160 490-160H389v11q0 45.42-31.79 77.21Q325.42-40 280-40ZM150-400h170l-72-120h-98v120Zm130 300q20 0 34.5-14.5T329-149q0-20-14.5-34.5T280-198q-20 0-34.5 14.5T231-149q0 20 14.5 34.5T280-100Zm-35-180Z"/></svg>
                <h2>Category</h2>
                <p><?php echo $vehicle['category'] ?></p>
            </div>
            <div class="user">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="M540-420q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM220-280q-24.75 0-42.37-17.63Q160-315.25 160-340v-400q0-24.75 17.63-42.38Q195.25-800 220-800h640q24.75 0 42.38 17.62Q920-764.75 920-740v400q0 24.75-17.62 42.37Q884.75-280 860-280H220Zm100-60h440q0-42 29-71t71-29v-200q-42 0-71-29t-29-71H320q0 42-29 71t-71 29v200q42 0 71 29t29 71Zm480 180H100q-24.75 0-42.37-17.63Q40-195.25 40-220v-460h60v460h700v60ZM220-340v-400 400Z"/></svg>
                <h2>Payment</h2>
                <p> <?php echo number_format($vehicle['daily_rate']); ?>/- </p>
            </div>
        </div>
    </div>
<!-- End of New Users  -->

    <div class="analyze">
        <div class="sales">
            <div class="status">
                <div class="info">
                    <h3>Update Daily Rate</h3>
                    <div class="form-container">
                        <form action="index.php?page=fleet/update_daily" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <input type="text" name="daily_rate" placeholder="Daily Rate" required>
                            </div>
                            <div class="form-group">
                                <button type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

        <div class="notification">
            <div class="icon">
                <a href="index.php?page=fleet/edit&id=<?php echo $id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                </a>
            </div>
            <div class="content">
                <div class="info">
                    Edit Vehicle
                </div>
            </div>
        </div>

    </div>

</div>