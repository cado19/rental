<?php
    // THIS FILE WILL HOLD VARIOUS FUNCTIONS OF THE APP. MOST ARE DATABASE FUNCTIONS 

    //INCLUDE DATABASE CONNECTION FILE
    include_once "config/db_conn.php"; 

                //   ******************* */ CUSTOMER FUNCTIONS ******************* */
    function all_customers(){
        global $con;
        global $drivers;

        try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last me, email, id_no, phone_no FROM customer_details";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

        return $drivers;
    }


                //   ******************* */ VEHICLE FUNCTIONS ******************* */
    
    function all_vehicles(){
        global $con;
        global $vehicles;

        try {

			$con->beginTransaction();

			$sql = "SELECT vb.make AS make, vb.model AS model, vb.number_plate AS reg, vb.category AS category, vp.daily_rate AS rate FROM `kisuzi-rental`.`vehicle_basics` vb INNER JOIN `kisuzi-rental`.`vehicle_pricing` vp ON vb.id = vp.vehicle_id;   ";
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
?>