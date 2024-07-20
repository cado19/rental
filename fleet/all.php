<?php
    $vehicles = all_vehicles();
    // echo "<pre>";
    // print_r($vehicles);
    // echo "</pre>";
    include_once 'partials/header.php';
    include_once 'partials/content_start.php';
?>

<!-- Main Content  -->
<main>
    <h1>Fleet</h1>

    <div class="recent-orders">
        <table id="myTable" class="dataTable">
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
</main>