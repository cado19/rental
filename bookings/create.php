<?php
    // THIS SCRIPT WILL HANDLE THE NEW BOOKING FORM PROCESSING

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $account_id = trim($_POST['account_id']);
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

        //GET BOOKING USING LAST INSERT ID
        $booking = booking($result);

        $start_date = strtotime($booking['start_date']);
        $end_date = strtotime($booking['end_date']); 

        // GET THE DURATION (TOTAL NUMBER OF DAYS OF THE BOOKING)
        $duration = ($end_date - $start_date)/86400;

        // GET THE TOTAL PRICE OF THE BOOKING BY MULTIPLYING THE DURATION WITH THE DAILY RATE OF THE VEHICLE 
        $total = $booking['daily_rate'] * $duration;

        // UPDATE THE TOTAL PRICE 
        $total = update_booking($total, $result); 

        // CREATE A CONTRACT WITH THE CURRENT LAST BOOKING ID AS THE REFERENCE ID (THIS JUST MIGHT BE IN THE FUNCTIONS FILE)
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