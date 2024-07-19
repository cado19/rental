<?php
	$make = $model = $number_plate = $category = $transmission = $fuel = $seats = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$make = trim($_POST['make']);
		$model = trim($_POST['model']);
		$number_plate = trim($_POST['number_plate']);
		$category = trim($_POST['category']);
		$transmission = trim($_POST['transmission']);
		$fuel = trim($_POST['fuel']);
		$seats = trim($_POST['seats']);
		$response = save_vehicle($make,$model,$number_plate,$category,$transmission,$fuel,$seats);
		header("Location: index.php?page=fleet/all")
	}
?>