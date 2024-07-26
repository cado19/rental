<?php
	include_once 'config/db_conn.php';
	$make = $model = $number_plate = $category = $transmission = $fuel = $seats = $account_id = $res = $response = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// vehicle basics data 
		$account_id = trim($_POST['account_id']);
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
		 	'account_id' => $account_id
		];

		$log->info('foo:', $post);


		// insert vehicle basics data


    		$sql = "INSERT INTO vehicle_basics (make,model,number_plate,category,transmission,fuel,seats,drive_train,account_id) VALUES (?,?,?,?,?,?,?,?,?)";
    		$stmt = $con->prepare($sql);
    		if ($stmt->execute([$make,$model,$number_plate,$category,$transmission,$fuel,$seats,$drive_train,$account_id])) {
    			$res = $con->lastInsertId();
    		} else {
    			$res = "Couldn't save vehicle";
    		}



    	// insert vehicle pricing data
    	$log->info($res);



    		$sql1 = "INSERT INTO vehicle_pricing (vehicle_id, daily_rate, vehicle_excess, refundable_security_deposit) VALUES (?,?,?,?)";
    		$stmt1 = $con->prepare($sql1);
    		if($stmt1->execute([$res, $daily_rate, $vehicle_excess, $deposit])){
    			$response = "Success";
    		} else {
    			$response = "Failed";
    		}

		$log->warning($response);

		header("Location: index.php?page=fleet/all&result=".$response);
	}
?>