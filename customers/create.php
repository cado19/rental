<?php
// THIS SCRIPT WILL HANDLE THE NEW CUSTOMER FORM PROCESSING

$first_name = $last_name = $email = $id_type = $tel = $residential_address = $work_address = $date_of_birth = $account_id = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VALIDATIONS
	if (empty($_POST['first_name'])) {
		$first_name_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&first_name_err=$first_name_err");
		exit;
	}
	if (empty($_POST['last_name'])) {
		$last_name_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&last_name_err=$last_name_err");
		exit;
	}
	if (empty($_POST['email'])) {
		$email_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&email_err=$email_err");
		exit;
	}
	if (empty($_POST['id_type'])) {
		$id_type_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&id_type_err=$id_type_err");
		exit;
	}
	if (empty($_POST['id_number'])) {
		$id_number_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&id_number_err=$id_number_err");
		exit;
	}
	if (empty($_POST['tel'])) {
		$tel_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&tel_err=$tel_err");
	}
	if (empty($_POST['residential_address'])) {
		$residential_address_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&residential_address_err=$residential_address_err");
		exit;
	}
	if (empty($_POST['work_address'])) {
		$work_address_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&work_address_err=$work_address_err");
		exit;
	}
	if (empty($_POST['date_of_birth'])) {
		$date_of_birth_err = "Required";
		header("Location: index.php?page=customers/new&id=$id&date_of_birth_err=$date_of_birth_err");
		exit;
	}

	$first_name = ucfirst($_POST['first_name']);
	$last_name = ucfirst($_POST['last_name']);
	$email = $_POST['email'];
	$id_type = $_POST['id_type'];
	$id_number = $_POST['id_number'];
	$tel = $_POST['tel'];
	$residential_address = $_POST['residential_address'];
	$work_address = $_POST['work_address'];
	$date_of_birth = $_POST['date_of_birth'];

	$details = [$first_name, $last_name, $email, $id_type, $id_number, $tel, $residential_address, $work_address, $date_of_birth, $account_id];
	// $log->warning('client:',$details);

	$result = save_customer($first_name, $last_name, $email, $id_type, $id_number, $tel, $residential_address, $work_address, $date_of_birth);

	if ($result == "Success") {
		$msg = "Successfully created customers";
		header("Location: index.php?page=customers/all&msg=$msg");
	} else {
		$msg = "An error occured";
		header("Location: index.php?page=customers/all&err_msg=$msg");
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
<script>
	console.log(<?php echo json_encode($details); ?>);
</script>