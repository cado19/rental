<?php

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

function save_partner($name, $email, $tel) {
	global $con;
	global $res;

	try {

		$con->beginTransaction();

		$sql = "INSERT INTO partners (name, email, phone_no) VALUES (?,?,?)";

		$stmt = $con->prepare($sql);
		if ($stmt->execute([$name, $email, $tel])) {
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
?>