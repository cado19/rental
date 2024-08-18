<?php
$first_name = $last_name = $email = $id_number = $dl_number = $tel = $date_of_birth = $msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$id_number = $_POST['id_number'];
	$dl_number = $_POST['dl_number'];
	$tel = $_POST['tel'];
	$date_of_birth = $_POST['date_of_birth'];

	$details = [$first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth];

	$result = save_driver($first_name, $last_name, $email, $id_number, $dl_number, $tel, $date_of_birth);

	$log->info($result);

	header("Location: index.php?page=drivers/all&msg=$result");
}

?>