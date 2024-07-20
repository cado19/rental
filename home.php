<?php
    // FOR NOW THIS WILL BE THE HOME DASHBOARD. wE'LL CUSTOMIZE IT AS THE APP GROWS
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
    
    $account_id = $_SESSION['account']['id'];
    $vehicle_count = vehicle_count($account_id);
    $customer_count = customer_count($account_id);
    $active_bookings = active_bookings($account_id);
    $bookings = home_bookings($account_id);

    $log->info('bookings',$bookings);
?>


      <main>
        <h1>Analytics</h1>
        <!-- Analyses  -->

        <div class="analyze">
            <div class="sales">
                <div class="status">
                    <div class="info">
                        <h3>Total Vehicles</h3>
                        <h1><?php echo $vehicle_count['number_of_cars']; ?></h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>+82%</p>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="visits">
                <div class="status">
                    <div class="info">
                        <h3>Your customers</h3>
                        <h1><?php echo $customer_count->number_of_customers; ?></h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>48%</p>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="searches">
                <div class="status">
                    <div class="info">
                        <h3>Bookings</h3>
                        <h1><?php echo $active_bookings->number_of_bookings ?></h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>21%</p>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <!-- End of Analyses  -->

        <!-- New Users  -->
        <div class="new-users">
            <h2>New Users</h2>
            <div class="user-list">
                <div class="user">
                    <img src="images/profile-2-min.jpg">
                    <h2>Jack</h2>
                    <p>54 Min ago</p>
                </div>
                <div class="user">
                    <img src="images/profile-3-min.jpg">
                    <h2>Amir</h2>
                    <p>3 Hours ago</p>
                </div>
                <div class="user">
                    <img src="images/profile-4-min.jpg">
                    <h2>Ember</h2>
                    <p>54 min ago</p>
                </div>
                <div class="user">
                    <img src="images/plus.png">
                    <h2>More</h2>
                    <p>New User</p>
                </div>
            </div>
        </div>
        <!-- End of New Users  -->

        <!-- Recent Orders Table  -->
         <div class="recent-orders">
            <h2>Recent Orders</h2>
            <?php if(empty($bookings)): ?>
                <h4>You currently have no bookings yet</h4>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Car</th>
                        <th>Registration</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                </thead>
                <tbody>
                    <?php forEach($bookings as $booking): ?>
                        <tr>
                            <td> <?php echo $booking['first_name'];?> <?php echo $booking['last_name']; ?> </td>
                            <td> <?php echo $booking['model']; ?> <?php echo $booking['make']; ?> </td>
                            <td> <?php echo $booking['number_plate']; ?> </td>
                            <td> 
                                <?php
                                    $start = strtotime($booking['start_date']);
                                    echo date("l jS \of F Y", $start); 
                                ?> 
                            </td>
                            <td> 
                                <?php
                                    $end = strtotime($booking['end_date']);
                                    echo date("l jS \of F Y", $end); 
                                ?> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
            <a href="index.php?page=bookings/all">Show All</a>
         </div>

         <!-- End of Recent Orders  -->

      </main>
      <!-- End of Main Content  -->

      <!-- Right Side  -->
       <div class="right-section">
            <!-- Nav  -->
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="dark-mode">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined active">dark_mode</span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $_SESSION['account']['name']; ?></b></p>
                        <span class="text-muted">Admin</span>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1-min.jpg">
                    </div>
                </div>
            </div>
            <!-- End of Nav  -->

            <div class="user-profile">
                <div class="log">
                    <img src="images/logo.png">
                    <h2>Kisuzi Smartex</h2>
                    <p>Simple Rental for you</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-symbols-outlined">notifications_none</span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-symbols-outlined">volume_up</span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text-muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-symbols-outlined"></span>
                    </div>
                </div>
                
                <div class="notification">
                    <div class="icon">
                        <span class="material-symbols-outlined">volume_up</span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text-muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-symbols-outlined"></span>
                    </div>
                </div>


            </div>
       </div>
</div>