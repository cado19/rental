<?php
function all_vehicles() {
	global $con;
	global $vehicles;
	$status = "false";

	try {

		$con->beginTransaction();

		$sql = "SELECT vb.id, vb.make AS make, vb.model AS model, vb.number_plate AS reg, vb.category AS category, vp.daily_rate AS rate FROM vehicle_basics vb INNER JOIN vehicle_pricing vp ON vb.id = vp.vehicle_id AND vb.deleted = ? AND partner_id IS NULL";
		$stmt = $con->prepare($sql);
		$stmt->execute([$status]);
		$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $vehicles;
}

// function to get deleted vehicles
function deleted_vehicles() {
	global $con;
	global $vehicles;
	$status = "true";

	try {

		$con->beginTransaction();

		$sql = "SELECT vb.id, vb.make AS make, vb.model AS model, vb.number_plate AS reg, vb.category AS category, vp.daily_rate AS rate FROM vehicle_basics vb INNER JOIN vehicle_pricing vp ON vb.id = vp.vehicle_id AND vb.deleted = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$status]);
		$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $vehicles;
}

function get_vehicle($id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT vb.make, vb.model, vb.number_plate, vb.category, vb.drive_train, vb.seats, vb.fuel, vb.transmission, vb.image, vp.daily_rate, vp.vehicle_excess, vp.refundable_security_deposit, ve.bluetooth, ve.keyless_entry, ve.reverse_cam, ve.audio_input, ve.gps, ve.android_auto, ve.apple_carplay FROM vehicle_basics vb INNER JOIN vehicle_pricing vp ON vb.id = vp.vehicle_id INNER JOIN vehicle_extras ve ON vb.id = ve.vehicle_id WHERE vb.id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function vehicle_bookings($id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT b.id, c.first_name, c.last_name, v.model, v.make, v.number_plate, b.start_date, b.end_date, b.total FROM customer_details c INNER JOIN bookings b ON c.id = b.customer_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE b.vehicle_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$id]);
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function unique_registration($plate) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT id from vehicle_basics WHERE number_plate = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		if ($stmt->rowCount == 1) {
			$res = "Taken";
		} else {
			$res = "Proceed";
		}
		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function save_vehicle($make, $model, $number_plate, $category, $transmission, $fuel, $seats, $drive_train) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "INSERT INTO vehicle_basics (make,model,number_plate,category,transmission,fuel,seats,drive_train,account_id) VALUES (?,?,?,?,?,?,?,?,?)";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$make, $model, $number_plate, $category, $transmission, $fuel, $seats, $drive_train, $account_id])) {
			$res = $con->lastInsertId();
		} else {
			$res = "Couldn't save vehicle";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function save_vehicle_pricing($id, $daily_rate, $vehicle_excess, $deposit) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "INSERT INTO vehicle_pricing (vehicle_id, daily_rate, vehicle_excess, refundable_security_deposit) VALUES (?,?,?,?)";
		$stmt = $con->prepare($sql);
		if ($stmt->execute()) {
			$res = "Success";
		} else {
			$res = "Failed";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function update_daily_rate($id, $rate) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "UPDATE vehicle_pricing SET daily_rate = ? WHERE vehicle_id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$rate, $id])) {
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

// function to delete a vehicle
function delete_vehicle($id) {
	global $con;
	global $res;
	$status = "true";

	try {
		$con->beginTransaction();

		$sql = "UPDATE vehicle_basics SET deleted = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$status, $id])) {
			$res = "Deleted";
		} else {
			$res = "Failed to delete";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// get all partner vehicles
function partner_vehicles($partner_id) {
	global $con;
	global $vehicles;
	$status = "false";

	try {

		$con->beginTransaction();

		$sql = "SELECT vb.id, vb.make AS make, vb.model AS model, vb.number_plate AS reg, vb.category AS category, vp.daily_rate AS rate FROM vehicle_basics vb INNER JOIN vehicle_pricing vp ON vb.id = vp.vehicle_id INNER JOIN partners p ON vb.partner_id = p.id WHERE vb.partner_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$partner_id]);
		$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $vehicles;
}

?>