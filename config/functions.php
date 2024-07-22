<?php
    // THIS FILE WILL HOLD VARIOUS FUNCTIONS OF THE APP. MOST ARE DATABASE FUNCTIONS 

    //INCLUDE DATABASE CONNECTION FILE
    include_once "config/db_conn.php"; 

                //   ******************* */ HOMEPAGE FUNCTIONS ******************* */
    function vehicle_count($account_id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT COUNT(id) AS number_of_cars FROM vehicle_basics WHERE account_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$res = $stmt->fetch();

			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}
				
	function customer_count($account_id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT COUNT(id) AS number_of_customers FROM customer_details WHERE account_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$res = $stmt->fetch(PDO::FETCH_OBJ);

			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}		
				
	function active_bookings($account_id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT COUNT(id) AS number_of_bookings FROM bookings WHERE account_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$res = $stmt->fetch(PDO::FETCH_OBJ);

			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}	

	function home_bookings($account_id){
		global $con;
		global $res;

		try {

			$con->beginTransaction();

			$sql = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.account_id = ? ORDER BY b.created_at DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $res;
	}
				
				
				//   ******************* */ ACCOUNT FUNCTIONS ******************* */

	function unique_email($email){
		global $con;
        global $res;

        try {

			// $con->BEGIN;

			$sql = "SELECT id FROM accounts WHERE email = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()  == 1) {
				$res = "Email Taken";
			} else {
				$res = "Proceed";
			}
			
			// $con->COMMIT;
		} catch (Exception $e) {
			// $con->ROLLBACK();
		}

        return $res;
    }

    function create_account($name, $email, $password){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "INSERT INTO accounts (name, email, password) VALUES (?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param("sss", $name, $email, $password);
			if ($stmt->execute()) {
				$res = $con->lastInsertId();
			} else {
				$res = "No Success";
			}

			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
    }

    function fetch_account($email){
    	global $con;
        global $res;

        try {

			$con->beginTransaction();

			$sql = "SELECT * FROM accounts WHERE email = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$email]);
			if ($stmt->rowCount() == 1) {
				$res = $stmt->fetch();
				// $res = ["Proceed"];
			} else {
				$res = ["No such person"];
			}
			
			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

        return $res;
    }

    function login(){

    }



				//   ******************* */ CUSTOMER FUNCTIONS ******************* */
    function all_customers(){
        global $con;
        global $res;

        try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name, email, id_no, phone_no FROM customer_details";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

        return $res;
    }

	function save_customer($first_name,$last_name,$email,$id_type,$id_number,$tel,$residential_address,$work_address,$date_of_birth,$account_id){
		global $con;
        global $res;

		try {

			$con->beginTransaction();

			$sql = "INSERT INTO customer_details (first_name, last_name, email, id_type, phone_no, id_no, residential_address, work_address, date_of_birth,account_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$first_name,$last_name,$email,$id_type,$id_number,$tel,$residential_address,$work_address,$date_of_birth,$account_id])){
				$res = "Success";
			} else {
				$res = "Uncsuccessful";
			}

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

        return $res;
	}


                //   ******************* */ VEHICLE FUNCTIONS ******************* */
    
    function all_vehicles($account_id){
        global $con;
        global $vehicles;

        try {

			$con->beginTransaction();

			$sql = "SELECT vb.id, vb.make AS make, vb.model AS model, vb.number_plate AS reg, vb.category AS category, vp.daily_rate AS rate FROM `kisuzi-rental`.`vehicle_basics` vb INNER JOIN `kisuzi-rental`.`vehicle_pricing` vp ON vb.id = vp.vehicle_id WHERE vb.account_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $vehicles;
    }

    function get_vehicle($id){
    	global $con;
    	global $res;

    	try{
    		$con->beginTransaction();

    		$sql = "SELECT vb.make, vb.model, vb.number_plate, vb.category, vb.drive_train, vb.seats, vp.daily_rate, vp.vehicle_excess FROM vehicle_basics vb INNER JOIN vehicle_pricing vp ON vb.id = vp.vehicle_id WHERE vb.id = ?";
    		$stmt = $con->prepare($sql);
    		$stmt->execute([$id]);
    		$res = $stmt->fetch();

    		$con->commit();
    	} catch(Exception $e) {
    		$con->rollback();
    	}

    	return $res;
    }

    function save_vehicle($make,$model,$number_plate,$category,$transmission,$fuel,$seats,$account_id){
    	global $con;
        global $res;

		try {

			$con->beginTransaction();

			$sql = "INSERT INTO vehicle_basics (make,model,number_plate,category,transmission,fuel,seats,account_id) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$make,$model,$number_plate,$category,$transmission,$fuel,$seats,$account_id])){
				$res = "Success";
			} else {
				$res = "Uncsuccessful";
			}

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

        return $res;
    }

    function update_daily_rate($id, $rate){
	    global $con;
        global $res;

		try {

			$con->beginTransaction();

			$sql = "UPDATE vehicle_pricing SET daily_rate = ? WHERE vehicle_id = ?";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$rate, $id])){
				$res = "Success";
			} else {
				$res = "Uncsuccessful";
			}

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

        return $res;	
    }

	
                //   ******************* */ DRIVER FUNCTIONS ******************* */
	function all_drivers($account_id){
		global $con;
		global $drivers;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name, email, id_no, phone_no FROM drivers WHERE account_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $drivers;
	}

	function driver($first_name,$last_name,$email,$id_number,$tel,$date_of_birth,$account_id){
		global $con;
	    global $res;

		try {

			$con->beginTransaction();

			$sql = "INSERT INTO customer_details (first_name, last_name, email, phone_no, id_no, date_of_birth,account_id) VALUES (?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$first_name,$last_name,$email,$id_number,$tel,$date_of_birth,$account_id])){
				$res = "Success";
			} else {
				$res = "Uncsuccessful";
			}

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

	    return $res;
	}


	 //   ******************* */ BOOKING FUNCTIONS ******************* */

	 // function to get all bookings 
	 function bookings(){
		global $con;
		global $res;

		try {

			$con->beginTransaction();

			$sql = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.account_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $res;
	 }

	 // function to get single booking
	 function booking($id){
		global $con;
		global $res;

		try {

			$con->beginTransaction();

			$sql = "SELECT c.first_name, c.last_name, v.model, v.make, v.number_plate, vp.daily_rate, b.start_date, b.end_date, b.total FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id INNER JOIN vehicle_pricing vp ON b.vehicle_id = vp.vehicle_id WHERE b.id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$id]);
			$res = $stmt->fetch();

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $res;
	 }

	 // function to update last booking details (total_price)
	 function update_booking($total, $id){
	 	global $con;
		global $res;

		try {

			$con->beginTransaction();

			$sql = "UPDATE bookings SET total = ? WHERE id = ?";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$total, $id])){
				$res = "Success";
			} else {
				$res = "Error";
			}

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $res;
	 }

	// function to get all vehicles for the booking process 
	function booking_vehicles($account_id){
		global $con;
		global $bk_vehicles;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, make, model, number_plate FROM vehicle_basics WHERE account_id = ? ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$bk_vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $bk_vehicles;
	}

	// function to get all customers for the booking process 
	function booking_customers($account_id){
		global $con;
		global $bk_customers;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name FROM customer_details WHERE account_id = ? ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$bk_customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $bk_customers;
	}

	// function to get all drivers for the booking process 
	function booking_drivers($account_id){
		global $con;
		global $bk_drivers;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name FROM drivers WHERE account_id = ? ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute([$account_id]);
			$bk_drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $bk_drivers;
	}

	// function to insert booking into database
	function save_booking($v_id, $c_id, $d_id, $start_date, $end_date,$account_id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "INSERT INTO bookings (vehicle_id, customer_id, driver_id, start_date, end_date, account_id) VALUES (?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$v_id, $c_id, $d_id, $start_date, $end_date,$account_id])) {
				$res = $con->lastInsertId();
			} else {
				$res = "No Success";
			}

			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}
	
	// function to insert contract into database
	function create_contract($bk_id){
		global $con;
		global $res;
		global $lastId;

		try {
			$con->beginTransaction();

			$sql = "INSERT INTO contracts (booking_id) VALUES (?)";
			$stmt = $con->prepare($sql);

			if ($stmt->execute([$bk_id])) {
				$res = "Successfully created contract";
			} else {
				$res = "An error occurred";
			}
			
			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}

	// fetch id of the contract that is to be signed
	function contract_to_sign($id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT id from contracts WHERE booking_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$id]);
			$res = $stmt->fetch(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}

	// function to upload signature
	function sign_contract($id, $file){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "UPDATE contracts SET signature = ? WHERE id = ?";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$file,$id])){
				$res = "success";
			} else {
				$res = "Failed";
			}

			$con->comit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}

	function contract($id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT c.first_name AS c_fname, c.last_name AS c_lname, c.id_no AS c_id_no, c.phone_no AS c_phone_no, c.email AS c_email,
					c.residential_address, d.first_name, d.last_name, d.id_no, d.phone_no, vb.make, vb.model, vb.number_plate, vp.daily_rate, 
					bk.start_date, bk.end_date, ct.signature FROM bookings bk INNER JOIN customer_details c ON bk.customer_id = c.id 
					INNER JOIN drivers d ON bk.driver_id = d.id INNER JOIN vehicle_basics vb ON bk.vehicle_id = vb.id INNER JOIN contracts ct 
					ON ct.booking_id = bk.id INNER JOIN vehicle_pricing vp ON bk.vehicle_id = vp.vehicle_id WHERE bk.id = ?";

			$stmt = $con->prepare($sql);
			$stmt->execute([$id]);
			$res = $stmt->fetch(PDO::FETCH_ASSOC);

			$con->commit();

		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}

	// get booking id using contract id
	function booking_from_contract($id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT booking_id from contracts WHERE id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$id]);
			$res = $stmt->fetch(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (\Throwable $th) {
			$con->rollback();
		}

		return $res;
	}


?>