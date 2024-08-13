<?php
    // THIS FILE WILL DISPLAY AN INDIVIDUAL CUSTOMER 

     //page name. We set this inn the content start and also in the page title programatically
    $page = "Customers";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link = "index.php?page=customers/all";
    $home_link_name = "All Customers";

    $new_link = "index.php?page=customers/new";
    $new_link_name = "New Customers";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb = "Customers";
    $breadcrumb_active= "Customer";

    // include navbar, functions, db_conn and sidebar
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    // fetch id from url and use to fetch client record from database 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $customer = get_customer($id);
        $log->info('Foo: ', $customer);
    }
    
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                        <?php if(isset($customer['profile_image'])): ?>
                            <img class="profile-user-img img-fluid img-circle"
                               src="customers/profile/<?php echo $customer['profile_image']; ?>"
                               alt="User profile picture">
                        <?php else: ?>
                            <img class="profile-user-img img-fluid img-circle"
                               src="images/male-laughter-avatar.jpg"
                               alt="User profile picture">
                        <?php endif; ?>

                    </div>

                    <h3 class="profile-username text-center"><?php echo $customer['first_name']; ?> <?php echo $customer['last_name']; ?></h3>

                    <p class="text-muted text-center">customer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Driving License No</b> <a class="float-right"><?php echo $customer['dl_no'] ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>National ID</b> <a class="float-right"><?php echo $customer['id_no']; ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Tel</b> <a class="float-right">254<?php echo ($customer['phone_no']);  ?></a>
                      </li>
                    </ul>

                    <a href="index.php?page=customers/profile_form&id=<?php echo $id; ?>" class="btn btn-primary btn-block"><b>Edit Profile Picture</b></a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-9">
                <div class="row">
                    <!-- show id images through a carousel -->
                    <div class="col-6">
                        <div class="card mb-3">
                            <?php if(isset($customer['id_image'])): ?>
                                <img src="customers/id/<?php echo $customer['id_image']; ?>" class="card-img-top" alt="Client ID Image">
                            <?php else: ?>
                                <img src="images/male-laughter-avatar.jpg" class="card-img-top" alt="Client ID Image">
                            <?php endif; ?>

                          <div class="card-body">
                            <h5 class="card-title">Identification</h5>
                            <p class="card-text">This is the customer's identification card.</p>
                            <a href="index.php?page=customers/id_form&id=<?php echo $id; ?>" class="btn btn-primary">Upload ID Card</a>
                          </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="card mb-3">
                            <?php if(isset($customer['license_image'])): ?>
                                <img src="customers/license/<?php echo $customer['license_image']; ?>" class="card-img-top" alt="Client License Image">
                            <?php else: ?>
                                <img src="images/male-laughter-avatar.jpg" class="card-img-top" alt="Client License Image">
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title">License</h5>
                                <p class="card-text">This is the customer's license.</p>
                                <a href="#" class="btn btn-primary">Upload customer's License</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
