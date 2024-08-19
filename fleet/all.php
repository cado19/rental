<?php
    // THIS PAGE OUGHT TO SHOW ALL VEHICLES 

    //page name. We set this inn the content start and also in the page title programatically
    $page = "Vehicles";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link = "index.php?page=fleet/all";
    $home_link_name = "All Vehicles";

    $new_link = "index.php?page=fleet/new";
    $new_link_name = "New Vehicle";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb = "Vehicles";
    $breadcrumb_active= "All Vehicles";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    $account_id = $_SESSION['account']['id'];
    $vehicles = all_vehicles($account_id);
    $log->info('vehicles', $vehicles)
?>

<!-- Main Content  -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card--body">

                        <div class="recent-orders">
                            <table id="example1" class="table">
                                <thead>
                                    <tr>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th>Registration</th>
                                        <th>Category</th>
                                        <th>Rate</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php forEach($vehicles as $vehicle): ?>
                                        <tr>
                                            <td> <?php echo $vehicle['model']; ?> </td>
                                            <td> <?php echo $vehicle['make']; ?> </td>
                                            <td> <?php echo $vehicle['reg']; ?> </td>
                                            <td> <?php echo $vehicle['category']; ?> </td>
                                            <td> <?php echo number_format($vehicle['rate']); ?>/- </td>
                                            <td> <a href="index.php?page=fleet/show&id=<?php echo $vehicle['id']; ?>">Details</a> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>