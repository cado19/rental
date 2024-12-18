<?php
    // THIS PAGE WILL SHOW INDIVIDUAL lease'S DETAILS

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Lease Details";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=partnes/lease/all";
    $home_link_name = "All Bookings";

    $new_link      = "index.php?page=partnes/lease/new";
    $new_link_name = "New Bookings";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Partner Leases";
    $breadcrumb_active = "Lease";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    // GET LEASE ID FROM URL
    if (isset($_GET['id'])) {
        $id      = $_GET['id'];
        $lease = get_lease($id);
        $log->info('Foo: ', $lease);
    }

    $start_date = strtotime($lease['start_date']);
    $end_date   = strtotime($lease['end_date']);
    $duration   = ($end_date - $start_date) / 86400;
    // $log->warning($total);

    $account_id = $_SESSION['account']['id'];

    $current_date = date('Y-m-d');
?>
<script>console.log(<?php echo json_encode($lease); ?>)</script>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="card-title">lease: </h2> <h3 class="card-title"> <?php echo " "; ?><?php show_value($lease, 'lease_no');?> </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row d-flex justify-content-center">

                                <div class="col-12 col-sm-3">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Partner</span>
                                      <span class="info-box-number text-center text-muted mb-0">
                                        <?php echo $lease['partner_name']; ?>
                                      </span>
                                    </div>
                                  </div>
                                </div>


                                <div class="col-12 col-sm-3">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Start Date</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo date("l jS \of F Y", $start_date); ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-3">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">End Date</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo date("l jS \of F Y", $end_date); ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 col-sm-3">
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
                                          <a href="#"><?php echo $lease['model']; ?><?php echo $lease['make']; ?></a>
                                        </span>
                                        <span class="description"><?php echo $lease['number_plate'] ?></span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        <p><b>Rate: </b><?php echo number_format($lease['rate'], 2) ; ?>/-</p>
                                        <p><b>Total: </b><?php echo number_format($lease['total'], 2); ?>/-</p>
     .
                                      </p>

                                    </div>

                                    <div class="row">
                                      <!-- A box with a form to extend lease in one column -->
                                      <div class="col-12 col-sm-4">
                                          <div class="info-box bg-light">
                                            <div class="info-box-content">


                                              <form action="index.php?page=bookings/extend" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="start_date" value="<?php echo $lease['start_date']; ?>" >
                                                <input type="hidden" name="rate" value="<?php echo $lease['rate']; ?>" >

                                                <div class="form-group">
                                                    <label for="date_of_birth">New End Date</label>
                                                    <div class="input-group date" id="extenddate" data-target-input="nearest">
                                                        <input type="text" name="extend_date" class="form-control datetimepicker-input" data-target="#extenddate"/>
                                                        <div class="input-group-append" data-target="#extenddate" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <?php if (isset($_GET['extend_date_err'])): ?>
                                                        <p class="text-danger"><?php echo $_GET['extend_date_err']; ?> </p>
                                                    <?php endif;?>
                                                </div>
                                                <button type="submit" class="btn btn-outline-dark text-sm"> Extend lease </button>
                                              </form>
                                            </div>
                                          </div>
                                      </div>

                                      <!-- A box with a form to stop lease early in one column -->
                                      <div class="col-4 col-sm-4">
                                          <div class="info-box bg-light">
                                            <div class="info-box-content">
                                              <form action="index.php?page=bookings/cancel" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <button type="submit" class="btn btn-outline-danger"> Cancel lease </button>
                                              </form>
                                            </div>
                                          </div>
                                      </div>

                                       <!-- A box with a link to edit lease -->
                                   <!--    <div class="col-4 col-sm-4">
                                            <div class="info-box bg-light">
                                              <div class="info-box-content">
                                                <a href="index.php?page=bookings/edit&id=<?php echo $id; ?>" class="btn btn-outline-danger">Edit lease</a>
                                              </div>
                                            </div>
                                      </div> -->

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                          <h3 class="text-primary"><i class="fa fa-sticky-note"></i> Contract Details</h3>
                          <p class="text-muted">This is the contract between The renter and <?php echo $lease['partner_name']; ?>. The current state of the contract is<?php echo " "; ?><b><?php echo $lease['signature_status']; ?></b>.</p>
                          <br>
                          <div class="text-muted">
                            <p class="text-sm">Company Name
                              <b class="d-block">Kizusi Rentals</b>
                            </p>
                            <p class="text-sm">Partner
                              <b class="d-block"><?php echo $lease['partner_name']; ?></b>
                            </p>                            
                            <p class="text-sm">Total
                              <b class="d-block"><?php show_numeric_value($lease, 'total'); ?></b>
                            </p>
                          </div>

                          <div class="text-center mt-5 mb-3">
                            <?php if ($lease['signature_status'] == "unsigned"): ?>
                              <a href="index.php?page=partners/lease/contract_edit&id=<?php echo $id; ?>" class="btn btn-sm btn-primary">Sign Contract</a>
                            <?php endif;?>
                            <a href="index.php?page=partners/lease/contract_show&id=<?php echo $id; ?>" class="btn btn-sm btn-warning" target="_blank">Show contract</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php";?>