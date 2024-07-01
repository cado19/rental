<?php
    // THIS FILE WILL HOLD VARIOUS FUNCTIONS OF THE APP. MOST ARE DATABASE FUNCTIONS 

    //INCLUDE DATABASE CONNECTION FILE
    include_once "config/db_conn.php"; 

                //   ******************* */ CUSTOMER FUNCTIONS ******************* */
    function all_customers(){
        global $con;
        global $customers;

        try {

			$con->beginTransaction();

			$sql = "SELECT id, first_name, last_name, email, id_no, phone_no FROM customer_details";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

        return $customers;
    }

?>