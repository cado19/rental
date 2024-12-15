<?php
    // THIS FILE DISPLAYS ALL THE PAYMENTS

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Payments";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=payments/all";
    $home_link_name = "All Payments";

    $new_link      = "index.php?page=payments/all";
    $new_link_name = "New Payment";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Payments";
    $breadcrumb_active = "All Payments";

    // File Inclusions
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    // $account_id = $_SESSION['account']['id'];

    //Fetch all payments
    $payments = all_payments();

    // Log customers for testing purposes
    $log->info('payments:', $payments);
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <?php if (empty($payments)): ?>
                            <p>No payments</p>
                        <?php else: ?>
                            <table id="example1" class="table">
                                <thead>
                                    <tr>
                                        <th>Booking Number</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Payment Date</th>
                                        <th>Payment Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $payment): ?>
                                        <tr>
                                            <td><?php show_value($payment, 'booking_no'); ?> </td>
                                            <td><?php show_value($payment, 'currency'); ?> </td>
                                            <td><?php show_value($payment, 'amount'); ?> </td>
                                            <td> <?php show_value($payment, 'payment_method'); ?> </td>
                                            <td> 
                                                <?php 
                                                    $date = strtotime($payment['payment_time']);
                                                    $display_date = date("l jS \of F Y", $date);
                                                    echo $display_date;
                                                ?> 
                                            </td>

                                            <td> 
                                                <?php 
                                                    $time = strtotime($payment['payment_time']);
                                                    $display_time = date("H:i:s", $time);
                                                    echo $display_time;
                                                ?> 
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php";?>
