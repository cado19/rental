<?php
    $drivers = all_drivers();
    // echo "<pre>";
    // print_r($drivers);
    // echo "</pre>";
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
?>

<!-- Main Content  -->
<main>
    <h1>Customers</h1>

    <div class="recent-orders">
        <table id="myTable" class="dataTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>ID</th>
                    <th>Tel</th>
                </tr>
            </thead>
            <tbody>
                <?php forEach($drivers as $driver): ?>
                    <tr>
                        <td> 
                            <?php 
                                $full_name = $driver['first_name'] . ' ' . $driver['last_name'];
                                echo $full_name;
                            ?> 
                        </td>
                        <td> <?php echo $driver['email']; ?> </td>
                        <td> <?php echo $driver['id_no']; ?> </td>
                        <td> 254<?php echo $driver['phone_no']; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>