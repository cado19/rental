<?php
// THIS FILE DISPLAYS ALL LEASES

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

//page name. We set this inn the content start and also in the page title programatically
$page = "Partner Leases";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=partners/all";
$home_link_name = "All Partners";

$new_link = "index.php?page=partners/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Partners";
$breadcrumb_active = "All Leases";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

// fetch account_id from the account session set in login
$account_id = $_SESSION['account']['id'];

// fetch all the partners
$leases = all_leases();
?>

<!-- Main Content  -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">


                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Lease No</th>
                                    <th>Partner</th>
                                    <th>Vehicle</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php forEach ($leases as $lease): ?>
                                    <tr>
                                        <td><?php echo $lease['lease_no'] ?> </td>
                                        <td> <?php echo $lease['partner_name']; ?> </td>
                                        <td> <?php echo $lease['make']; ?> <?php echo $lease['model']; ?> <?php echo $lease['number_plate']; ?> </td>
                                        <td> <?php echo $lease['start_date']; ?> </td>
                                        <td> <?php echo $lease['end_date']; ?> </td>
                                        <td> <a href="index.php?page=partners/lease/show&id=<?php echo $lease['id']; ?>">Details</a> </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>