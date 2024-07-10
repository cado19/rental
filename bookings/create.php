<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $v_id = $_POST['vehicle_id'];
        $c_id = $_POST['customer_id'];
        $d_id = $_POST['driver_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $posts = array($v_id, $c_id, $d_id, $start_date, $end_date);
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";

        // INSERT BOOKING DATA INTO THE DATABASE

        $result = save_booking($v_id, $c_id, $d_id, $start_date, $end_date);

        // CREATE A CCONTRACT WITH THE CURRENT LAST BOOKING ID AS THE REFERENCE ID (THIS JUST MIGHT BE IN THE FUNCTIONS FILE)
        $response = create_contract($result);
        
        //REDIRECT TO THE CONTRACT PAGE SO THAT A SIGNATURE CAN BE UPLOADED IF IT IS AVAILABLE
        $msg = "Booking created";
        header("Location: index.php?page=contracts/edit&id=".$result);

        // if ($result == "Successfully created contract") {
        // } else {
        //     $msg = "An error occured";
        //     header("Location: index.php?page=bookings/all");
        // }
        
        

        // SIGNATURE UPLOAD
    }
?>