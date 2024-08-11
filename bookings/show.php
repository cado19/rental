<?php
    // THIS PAGE WILL SHOW INDIVIDUAL BOOKING'S DETAILS 

     //page name. We set this inn the content start and also in the page title programatically
    $page = "Bookings";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link = "index.php?page=bookings/all";
    $home_link_name = "All Bookings";

    $new_link = "index.php?page=bookings/new";
    $new_link_name = "New Bookings";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb = "Bookings";
    $breadcrumb_active= "Booking";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    // GET BOOKING ID FROM URL 
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Booking for: </h2> <h3 class="card-title"><?php echo $booking['first_name']; ?> <?php echo $booking['last_name']; ?> </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Start Date</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo date("l jS \of F Y", $start_date); ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">End Date</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo date("l jS \of F Y", $end_date); ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Duration</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo $duration; ?> days</span>
                                    </div>
                                  </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4>Summary</h4>
                                    <div class="post">
                                      <div class="user-block">
                                        <span class="username">
                                          <a href="#"><?php echo $booking['model']; ?> <?php echo $booking['make']; ?></a>
                                        </span>
                                        <span class="description"><?php echo $booking['number_plate'] ?></span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        The [car name] is a [drive train] [vehicle category] loved by many. It can carry [seats]
                                        people. The hire rate is [daily rate].
                                      </p>

                                      <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                      </p>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                          <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Contract Details</h3>
                          <p class="text-muted">This is the contract between The renter and [client name]. The current state of the contract is [contract state(signed/unsigned)].</p>
                          <br>
                          <div class="text-muted">
                            <p class="text-sm">Company Name
                              <b class="d-block">[Our Company Name]</b>
                            </p>
                            <p class="text-sm">Client
                              <b class="d-block">[Client Name]</b>
                            </p>
                          </div>

                          <h5 class="mt-5 text-muted">Signature</h5>
                          <ul class="list-unstyled">
                            <li>
                              <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                            </li>
                            <li>
                              <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                            </li>
                            <li>
                              <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                            </li>
                            <li>
                              <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                            </li>
                            <li>
                              <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                            </li>
                          </ul>
                          <div class="text-center mt-5 mb-3">
                            <a href="index.php?page=contracts/edit&id=<?php echo $id; ?>" class="btn btn-sm btn-primary">Sign Contract</a>
                            <a href="index.php?page=contracts/show&id=<?php echo $id; ?>" class="btn btn-sm btn-warning">Show contact</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

