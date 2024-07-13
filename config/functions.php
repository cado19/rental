<?php
    // THIS FILE WILL HOLD VARIOUS FUNCTIONS OF THE APP. MOST ARE DATABASE FUNCTIONS 

    //INCLUDE DATABASE CONNECTION FILE
    include_once "config/db_conn.php"; 

                //   ******************* */ HOMEPAGE FUNCTIONS ******************* */
    function vehicle_count(){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT COUNT(id) AS number_of_cars FROM vehicle_basics";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$res = $stmt->fetch(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (\Throwable $th) {
			//throw $th;
		}
	}
				
	function customer_count(){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "SELECT COUNT(id) AS number_of_customers FROM customer_details";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$res = $stmt->fetch(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (\Throwable $th) {
			//throw $th;
		}
	}		
				
	function active_bookings(){
		
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

	function save_customer($first_name,$last_name,$email,$id_type,$id_number,$tel,$residential_address,$work_address,$date_of_birth){
		global $con;
        global $res;

		try {

			$con->beginTransaction();

			$sql = "INSERT INTO customer_details (first_name, last_name, email, id_type, phone_no, id_no, residential_address, work_address, date_of_birth) VALUES (?,?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$first_name,$last_name,$email,$id_type,$id_number,$tel,$residential_address,$work_address,$date_of_birth])){
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
    
    function all_vehicles(){
        global $con;
        global $vehicles;

        try {

			$con->beginTransaction();

			$sql = "SELECT vb.make AS make, vb.model AS model, vb.number_plate AS reg, vb.category AS category, vp.daily_rate AS rate FROM `kisuzi-rental`.`vehicle_basics` vb INNER JOIN `kisuzi-rental`.`vehicle_pricing` vp ON vb.id = vp.vehicle_id";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $vehicles;
    }

	
                //   ******************* */ DRIVER FUNCTIONS ******************* */
	function all_drivers(){
		global $con;
		global $drivers;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name, email, id_no, phone_no FROM drivers";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $drivers;
	}

	 //   ******************* */ BOOKING FUNCTIONS ******************* */

	 // function to get all bookings 
	 function bookings(){
		global $con;
		global $res;

		try {

			$con->beginTransaction();

			$sql = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id;";
			$stmt = $con->prepare($sql);
			$stmt->execute();
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

			$sql = "SELECT c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$id]);
			$res = $stmt->fetch();

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $res;
	 }

	// function to get all vehicles for the booking process 
	function booking_vehicles(){
		global $con;
		global $bk_vehicles;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, make, model, number_plate FROM vehicle_basics ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$bk_vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $bk_vehicles;
	}

	// function to get all customers for the booking process 
	function booking_customers(){
		global $con;
		global $bk_customers;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name FROM customer_details ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$bk_customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $bk_customers;
	}

	// function to get all drivers for the booking process 
	function booking_drivers(){
		global $con;
		global $bk_drivers;

		try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name FROM drivers ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$bk_drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $bk_drivers;
	}

	// function to insert booking into database
	function save_booking($v_id, $c_id, $d_id, $start_date, $end_date){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "INSERT INTO bookings (vehicle_id, customer_id, driver_id, start_date, end_date) VALUES (?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$v_id, $c_id, $d_id, $start_date, $end_date])) {
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


?>