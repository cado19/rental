<?php
// function to insert contract into database
function create_contract($bk_id) {
	global $con;
	global $res;
	// global $lastId;

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

// function to insert organisation contract into database
function create_organisation_contract($bk_id) {
	global $con;
	global $res;
	global $lastId;

	try {
		$con->beginTransaction();

		$sql = "INSERT INTO organisation_contracts (organisation_booking_id) VALUES (?)";
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

// function to insert partner lease contract into database
function create_lease_contract($lease_id) {
	global $con;
	global $res;
	// global $lastId;

	try {
		$con->beginTransaction();

		$sql = "INSERT INTO lease_contracts (lease_id) VALUES (?)";
		$stmt = $con->prepare($sql);

		if ($stmt->execute([$lease_id])) {
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
function contract_to_sign($id) {
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

// fetch id of the organisation contract that is to be signed
function organisation_contract_to_sign($id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT id from organisation_contracts WHERE organisation_booking_id = ?";
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
function sign_contract($id, $file) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "UPDATE contracts SET signature = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$file, $id])) {
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

// function to upload signature
function sign_organisation_contract($id, $file) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "UPDATE organisation_contracts SET signature = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$file, $id])) {
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



function contract($id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT c.first_name AS c_fname, c.last_name AS c_lname, c.id_no AS c_id_no, c.phone_no AS c_phone_no, c.email AS c_email,
					c.residential_address, d.first_name, d.last_name, d.id_no, d.phone_no, vb.make, vb.model, vb.number_plate, vp.daily_rate, vp.vehicle_excess,bk.start_date, bk.end_date, bk.total, ct.signature, ct.created_at FROM bookings bk INNER JOIN customer_details c ON bk.customer_id = c.id INNER JOIN drivers d ON bk.driver_id = d.id INNER JOIN vehicle_basics vb ON bk.vehicle_id = vb.id INNER JOIN contracts ct ON ct.booking_id = bk.id INNER JOIN vehicle_pricing vp ON bk.vehicle_id = vp.vehicle_id WHERE bk.id = ?";

		$stmt = $con->prepare($sql);
		$stmt->execute([$id]);
		$res = $stmt->fetch(PDO::FETCH_ASSOC);

		$con->commit();

	} catch (\Throwable $th) {
		$con->rollback();
	}

	return $res;
}

// get contract for an organisation's booking
function organisation_contract($id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT o.name AS o_name, o.company_no AS company_no, o.phone_no AS o_phone_no, o.email AS o_email,
					o.company_address, d.first_name, d.last_name, d.id_no, d.phone_no, vb.make, vb.model, vb.number_plate, vp.daily_rate, vp.vehicle_excess,bk.start_date, bk.end_date, bk.start_time, bk.end_time, bk.total, ct.signature, ct.created_at FROM organisation_bookings bk INNER JOIN organisation_details o ON bk.organisation_id = o.id INNER JOIN drivers d ON bk.driver_id = d.id INNER JOIN vehicle_basics vb ON bk.vehicle_id = vb.id INNER JOIN organisation_contracts ct ON ct.organisation_booking_id = bk.id INNER JOIN vehicle_pricing vp ON bk.vehicle_id = vp.vehicle_id WHERE bk.id = ?";

		$stmt = $con->prepare($sql);
		$stmt->execute([$id]);
		$res = $stmt->fetch(PDO::FETCH_ASSOC);

		$con->commit();

	} catch (\Throwable $th) {
		$con->rollback();
	}

	return $res;
}

// get lease contract 
function lease_contract($lease_id){
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT l.lease_no, v.make, v.model, v.number_plate, l.start_date, l.end_date, l.rate AS rate, l.total, l.created_at, p.name AS partner_name, p.certificate_no AS certificate_no, lct.status AS signature_status, lct.signature FROM partner_lease l INNER JOIN vehicle_basics v ON v.id = l.vehicle_id INNER JOIN partners p ON l.partner_id = p.id INNER JOIN lease_contracts lct ON l.id = lct.lease_id WHERE l.id = ? LIMIT 0,1";
		$stmt = $con->prepare($sql);
		$stmt->execute([$lease_id]);
		$res = $stmt->fetch();
		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	
	return $res;
}



// get booking id using contract id
function booking_from_contract($id) {
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