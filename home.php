<?php
    // FOR NOW THIS WILL BE THE HOME DASHBOARD. WE'LL CUSTOMIZE IT AS THE APP GROWS

     
    //page name. We set this inn the content start and also in the page title programatically
    $page = "Customers";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link = "index.php?";
    $home_link_name = "Home";

    $new_link = "index.php";
    $new_link_name = "Dashboard";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb = "Home";
    $breadcrumb_active= "Dashboard";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
    
    $account_id = $_SESSION['account']['id'];
    $vehicle_count = vehicle_count();
    $customer_count = customer_count();
    $active_bookings = active_bookings();
    $bookings = home_bookings();

    $log->info('bookings',$bookings);
?>

    <section class="content">
        <div class="container-fluid">
             <!-- Small boxes (Stat box) -->
             <div class="row">
                 <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo $vehicle_count['number_of_cars']; ?></h3>

                        <p>Total Vehicles</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-android-car"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->

                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3><?php echo $customer_count['number_of_customers']; ?></h3>

                        <p>Your customers</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->

                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo $active_bookings['number_of_bookings']; ?></h3>

                        <p>Your bookings</p>
                      </div>
                      <div class="icon">
                        <i class="ion-android-list"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->


             </div>

             <div class="row">
                 
                <!-- Recent Orders Table  -->
                 <div class="recent-orders">
                    <h2>Recent Orders</h2>
                    <?php if(empty($bookings)): ?>
                        <h4>You currently have no bookings yet</h4>
                    <?php else: ?>
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th>Client</th>
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
             </div>

        </div>
    </section>
      <main>
        <h1>Analytics</h1>
        <!-- Analyses  -->

        <!-- End of Analyses  -->



      </main>
      <!-- End of Main Content  -->

    

