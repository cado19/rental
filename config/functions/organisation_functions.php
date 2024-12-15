<?php
function all_organisations() {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT * FROM organisation_details";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	return $res;
}

function get_organisation($organisation_id) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();

		$sql = "SELECT name, email, phone_no, company_no, company_address, kra_pin, certificate_of_inc, country FROM organisation_details WHERE id = ?";

		$stmt = $con->prepare($sql);
		$stmt->execute([$organisation_id]);
		$res = $stmt->fetch();

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	return $res;
}

function save_organisation($name, $email, $company_no, $country, $tel, $kra_pin) {
	global $con;
	global $res;

	try {
		$con->beginTransaction();
		$sql = "INSERT INTO organisation_details (name, email, company_no, country, phone_no, kra_pin) VALUES (?,?,?,?,?,?)";

		$stmt = $con->prepare($sql);
		if ($stmt->execute([$name, $email, $company_no, $country, $tel, $kra_pin])) {
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

function update_organisation($name, $email, $contact_name, $contact_no, $kra_pin) {

}

function delete_organisation($organisation_id){
	global $con;
	global $res;
	$deleted = "true";

	try {
		$con->beginTransaction();

		$sql = "UPDATE organisation_details SET deleted = ? WHERE id = ?";

		$stmt = $con->prepare($sql);

		if ($stmt->execute([$deleted, $organisation_id])) {
			$res = "Deleted";
		} else {
			$res = "Failed";
		}

		$con->commit();
	} catch (Exception $e) {
		$con->rollback();
	}
	return $res;
}

// get bookings for an organisation with organisation_id provided
function current_organisation_bookings($organisation_id)
{
    global $con;
    global $res;

    try {

        $con->beginTransaction();

        $sql  = "SELECT b.id, o.name, v.model, v.make, v.number_plate, b.start_date, b.end_date FROM organisation_details o INNER JOIN organisation_bookings b ON o.id = b.organisation_id INNER JOIN vehicle_basics v ON b.vehicle_id = v.id WHERE o.id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$organisation_id]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con->commit();
    } catch (Exception $e) {
        $con->rollback();
    }

    return $res;
}
?>