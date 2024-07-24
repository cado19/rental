<?php
    // echo "<pre>";
    // print_r($drivers);
    // echo "</pre>";
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
    $account_id = $_SESSION['account']['id'];
    $drivers = all_drivers($account_id);
?>

<!-- Main Content  -->
<main>
    <h1>Drivers</h1>

    <div class="recent-orders">
        <table id="myTable" class="dataTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>ID</th>
                    <th>Tel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php forEach($drivers as $driver): ?>
                    <tr>
                        <td><?php echo $driver['first_name'] ?> <?php echo $driver['first_name'] ?> </td>
                        <td> <?php echo $driver['email']; ?> </td>
                        <td> <?php echo $driver['id_no']; ?> </td>
                        <td> 254<?php echo $driver['phone_no']; ?> </td>
                        <td> <a href="index.php?page=drivers/show&id=<?php echo $driver['id']; ?>">Details</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<div class="right-section">

    <div class="reminders">
        <div class="header">
            <h3>Actions</h3>
        </div>

        <div class="notification">
            <div class="icon">
                    <a href="index.php?page=drivers/new">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    </a>
                </div>
                <div class="content">
                    <div class="info">
                        New Driver
                    </div>
                </div>
        </div>
    </div>

</div>