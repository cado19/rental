<?php
// get all partners
function all_partners() {
	global $con;
	global $res;
	$status = "false";

	try {

		$con->beginTransaction();

		$sql = "SELECT * FROM partners WHERE deleted = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$status]);
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

// get single partner
function get_partner($partner_id) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "SELECT * FROM partners WHERE id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$partner_id]);
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function partners_for_vehicle() {
	global $con;
	global $res;
	$status = "false";

	try {

		$con->beginTransaction();

		$sql = "SELECT id, name FROM partners WHERE deleted = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$status]);
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

function save_partner($name, $email, $tel, $address, $cerificate_no, $kra_pin, $id) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "INSERT INTO partners ($name, $email, $tel, $address, $cerificate_no, $kra_pin) VALUES (?,?,?,?,?,?)";

		$stmt = $con->prepare($sql);
		if ($stmt->execute([$name, $email, $tel, $address, $cerificate_no, $kra_pin])) {
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
// update partner
function update_partner($name, $email, $tel, $address, $cerificate_no, $kra_pin, $id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "UPDATE partners SET name = ?, email = ?, phone_no = ?, address = ?, cerificate_no = ?, kra_pin = ? WHERE id = ?";
		$stmt = $con->prepare($sql);

		if ($stmt->execute([$name, $email, $tel, $address, $cerificate_no, $kra_pin, $id])) {
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

// partner vehicle count
function partner_vehicle_count($partner_id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT count(v.id) AS vehicle_count FROM vehicle_basics v INNER JOIN partners p on v.partner_id = p.id WHERE v.partner_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$partner_id]);
		$res = $stmt->fetch();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

//partner booking count
function partner_booking_count($partner_id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT count(b.id) AS booking_count FROM bookings b INNER JOIN vehicle_basics v ON v.id = b.vehicle_id WHERE v.partner_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$partner_id]);
		$res = $stmt->fetch();
	} catch (Exception $e) {
		$con->rollback();
	}

	return $res;
}

	// LEASE FUNCTIONS 
// function to fetch all leases 
function all_leases(){
	global $con;
	global $res;

	try {
		$con->beginTransaction();
		$sql = "SELECT l.id, l.lease_no, v.make, v.model, v.number_plate, l.start_date, l.end_date, p.name AS partner_name FROM partner_lease l INNER JOIN vehicle_basics v ON v.id = l.vehicle_id INNER JOIN partners p ON l.partner_id = p.id ORDER BY l.lease_no DESC";

		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	
	return $res;
}

// function to get a single lease using id 
function get_lease($lease_id){
	global $con;
	global $res;

	try {
		$con->beginTransaction();
		$sql = "SELECT l.lease_no, v.make, v.model, v.number_plate, l.start_date, l.end_date, l.rate AS rate, l.total, p.name AS partner_name, lct.status AS signature_status FROM partner_lease l INNER JOIN vehicle_basics v ON v.id = l.vehicle_id INNER JOIN partners p ON l.partner_id = p.id INNER JOIN lease_contracts lct ON l.id = lct.lease_id WHERE l.id = ? LIMIT 0,1";

		$stmt = $con->prepare($sql);
		$stmt->execute([$lease_id]);
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	
	return $res;
}

function save_lease($partner_id, $vehicle_id, $start_date, $end_date, $rate, $total){
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "INSERT INTO partner_lease (partner_id, vehicle_id, start_date, end_date, rate, total) VALUES (?,?,?,?,?,?)";
		$stmt = $con->prepare($sql);
		if ($stmt->execute([$partner_id, $vehicle_id, $start_date, $end_date,  $rate, $total])) {
			$res = $con->lastInsertId();
		} else {
			$res = "No Success";
		}
		
		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	
	return $res;
}

function save_lease_number($id, $number)
{
    global $con;
    global $res;

    try {
        $con->beginTransaction();

        $sql  = "UPDATE partner_lease SET lease_no = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$number, $id]);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

}

?>