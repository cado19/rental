<?php 
// save a payment that comes from pesapal
	function save_payment($booking_no, $currency, $amount, $payment_account, $payment_status, $message, $payment_method, $confirmation_code, $order_tracking_id, $payment_time){
		global $con;
		global $res;

		try {
			$con->beginTransaction();

			$sql = "INSERT INTO payments (booking_no, currency, amount, payment_account, status, message, payment_method, confirmation_code, order_tracking_id, payment_time) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			if ($stmt->execute([$booking_no, $currency, $amount, $payment_account, $payment_status, $message, $payment_method, $confirmation_code, $order_tracking_id, $payment_time])) {
				$res = true;
			} else {
				$res = false;
			}
			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $res;
	}

	// function to get all payments 
	function all_payments(){
		global $con;
		global $res;

		try {
			$con->beginTransaction();
			$sql = "SELECT * FROM payments";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$res = $stmt->fetchAll();
			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}
		
		return $res;
	}

	function existing_payment($order_tracking_id){
		global $con;
		global $res;

		try {
			$con->beginTransaction();
			$sql = "SELECT id FROM payments WHERE order_tracking_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$order_tracking_id]);
			if ($stmt->rowCount == 1) {
				$res = "Exists";
			} else {
				$res = "New";
			}
			
			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}
		
		return $res;
	}
 ?>