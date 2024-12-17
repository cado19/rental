<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// validate start, end date, vehicle id, partner id
        if (empty($_POST['start_date'])) {
            $start_date_err = "Required";
            header("Location: index.php?page=partners/lease/new&start_date_err=$start_date_err");
            exit;
        }
        if (empty($_POST['end_date'])) {
            $end_date_err = "Required";
            header("Location: index.php?page=partners/lease/new&end_date_err=$end_date_err");
            exit;
        }
        if (empty($_POST['rate'])) {
            $rate_err = "Required";
            header("Location: index.php?page=partners/lease/new&rate_err=$rate_err");
            exit;
        }

        

        $p_id       = $_POST['partner_id'];
        $v_id       = $_POST['vehicle_id'];
        $start_date = $_POST['start_date'];
        $end_date   = $_POST['end_date'];
        $rate      = $_POST['rate'];

        // GET THE DURATION (TOTAL NUMBER OF DAYS OF THE BOOKING)
        $start_date_time = strtotime($_POST['start_date']);
        $end_date_time   = strtotime($_POST['end_date']);
        $duration        = ($end_date_time - $start_date_time) / 86400;

        // GET THE TOTAL PRICE OF THE BOOKING BY MULTIPLYING THE DURATION WITH THE DAILY RATE OF THE VEHICLE
        $total = (int) $rate * (int) $duration;

        // save the lease
        $result = save_lease($p_id, $v_id, $start_date, $end_date, $rate, $total);

        // update lease no
        if ($result == "No Success") {
            $err = "An error occured. Try again later";
            header("Location: index.php?page=partners/lease/new&err_msg=$err");
            exit;
        } else {
            $no = "LS-" . str_pad($result, 3, "0", STR_PAD_LEFT);
            save_lease_number($result, $no);


            // CREATE A CONTRACT WITH THE CURRENT LAST LEASE ID AS THE REFERENCE ID (THIS JUST MIGHT BE IN THE FUNCTIONS FILE)
            $response = create_lease_contract($result);

            $msg = "Successfully Created Lease";

            header("Location: index.php?page=partners/lease/show&id=$result&msg=$msg");
        }
        

        // create lease contract
	} else {
		// code...
	}
	
 ?>