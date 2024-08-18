<?php
include_once 'config/db_conn.php';
$make = $model = $number_plate = $category = $transmission = $fuel = $seats = $account_id = $res = $response = '';
$bluetooth = $keyless_entry = $reverse_cam = $audio_input = $gps = $android_auto = $apple_carplay = 'No';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// vehicle basics data
	$make = $_POST['make'];
	$model = $_POST['model'];
	$number_plate = $_POST['number_plate'];
	$category = $_POST['category'];
	$transmission = $_POST['transmission'];
	$fuel = $_POST['fuel'];
	$seats = $_POST['seats'];
	$drive_train = $_POST['drive_train'];

	// vehicle pricing data
	$daily_rate = $_POST['daily_rate'];
	$vehicle_excess = $_POST['vehicle_excess'];
	$deposit = $_POST['deposit'];

	// vehicle extras
	if (isset($_POST['bluetooth'])) {
		$bluetooth = $_POST['bluetooth'];
	}

	if (isset($_POST['keyless_entry'])) {
		$keyless_entry = $_POST['keyless_entry'];
	}

	if (isset($_POST['reverse_cam'])) {
		$reverse_cam = $_POST['reverse_cam'];
	}

	if (isset($_POST['audio_input'])) {
		$audio_input = $_POST['audio_input'];
	}

	if (isset($_POST['gps'])) {
		$gps = $_POST['gps'];
	}

	if (isset($_POST['android_auto'])) {
		$android_auto = $_POST['android_auto'];
	}

	if (isset($_POST['apple_carplay'])) {
		$apple_carplay = $_POST['apple_carplay'];
	}

	$post = [
		'make' => $make,
		'model' => $model,
		'number_plate' => $number_plate,
		'category' => $category,
		'transmission' => $transmission,
		'fuel' => $fuel,
		'seats' => $seats,
		'daily_rate' => $daily_rate,
		'vehicle_excess' => $vehicle_excess,
		'drive_train' => $drive_train,
		'account_id' => $account_id,
	];

	$log->info('foo:', $post);

	// insert vehicle basics data

	$sql = "INSERT INTO vehicle_basics (make,model,number_plate,category,transmission,fuel,seats,drive_train) VALUES (?,?,?,?,?,?,?,?)";
	$stmt = $con->prepare($sql);
	if ($stmt->execute([$make, $model, $number_plate, $category, $transmission, $fuel, $seats, $drive_train])) {
		$res = $con->lastInsertId();
	} else {
		$res = "Couldn't save vehicle";
	}

	// insert vehicle pricing data
	$log->info($res);

	$sql1 = "INSERT INTO vehicle_pricing (vehicle_id, daily_rate, vehicle_excess, refundable_security_deposit) VALUES (?,?,?,?)";
	$stmt1 = $con->prepare($sql1);
	if ($stmt1->execute([$res, $daily_rate, $vehicle_excess, $deposit])) {
		$result = "Success";
	} else {
		$result = "Failed";
	}

	$sql2 = "INSERT INTO vehicle_extras (vehicle_id,bluetooth,keyless_entry,reverse_cam,audio_input,gps,android_auto,apple_carplay)
			 VALUES (?,?,?,?,?,?,?,?)";
	$stmt2 = $con->prepare($sql2);
	if ($stmt2->execute([$res, $bluetooth, $keyless_entry, $reverse_cam, $audio_input, $gps, $android_auto, $apple_carplay])) {
		$response = "Success";
	} else {
		$response = "Failed";
	}
	$log->warning($response);

	header("Location: index.php?page=fleet/all&msg=$response");
}
?>