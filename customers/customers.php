<?php
    $customers = all_customers();
    // echo "<pre>";
    // print_r($customers);
    // echo "</pre>";
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
                <?php forEach($customers as $customer): ?>
                    <tr>
                        <td> 
                            <?php 
                                $full_name = $customer['first_name'] . ' ' . $customer['last_name'];
                                echo $full_name;
                            ?> 
                        </td>
                        <td> <?php echo $customer['email']; ?> </td>
                        <td> <?php echo $customer['id_no']; ?> </td>
                        <td> 254<?php echo $customer['phone_no']; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>