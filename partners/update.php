<?php
// THIS FILE WILL HANDLE UPDATING OF PARTNER IN THE DB
$name = $email = $tel = '';
$name_err = $email_err = $tel_err = $msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VALIDATIONS
	if (empty($_POST['name'])) {
		$name_err = "Required";
		header("Location: index.php?page=partners/edit&first_name_err=$first_name_err");
		exit;
	}

	if (empty($_POST['email'])) {
		$email_err = "Required";
		header("Location: index.php?page=partners/edit&email_err=$email_err");
		exit;
	}

	if (empty($_POST['tel'])) {
		$tel_err = "Required";
		header("Location: index.php?page=partners/edit&tel_err=$tel_err");
	}
	$id 				= $_POST['id'];
	$name 				= ucwords($_POST['name']);
	$email 				= $_POST['email'];
	$tel 				= $_POST['tel'];
	$address 			= $_POST['address'];
	$certificate_no		= $_POST['certificate_no'];
	$kra_pin 			= $_POST['kra_pin'];

	$details = [$name, $email, $tel, $address, $certificate_no, $kra_pin, $id];

	$result = update_partner($name, $email, $tel, $address, $certificate_no, $kra_pin, $id);

	if ($result == "Success") {
		$msg = "Successfully updated partner";
		header("Location: index.php?page=partners/show&id=$id&msg=$msg");
		exit;
	} else {
		$msg = "An error occured. Please try again later";
		header("Location: index.php?page=partners/show&id=$id&err_msg=$msg");
		exit;
	}

	// $log->info($result);

} else {
	$msg = "Unauthorized activity";
	session_start();
	session_destroy();
	header("Location: index.php?err_msg=$msg");
	exit;
}

?>