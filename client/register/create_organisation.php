<?php
// THIS FILE WILL HANDLE SAVING OF PARTNER INTO THE DB
$name = $email = $company_no = $country = $tel = $kra_pin = '';
$name_err = $email_err = $tel_err = $msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VALIDATIONS
	if (empty($_POST['name'])) {
		$name_err = "Required";
		header("Location: index.php?page=client/register/new_organisation&name_err=$first_name_err");
		exit;
	}

	if (empty($_POST['email'])) {
		$email_err = "Required";
		header("Location: index.php?page=client/register/new_organisation&email_err=$email_err");
		exit;
	}

	if (empty($_POST['country'])) {
		$country_err = "Required";
		header("Location: index.php?page=client/register/new_organisation&country_err=$country_err");
		exit;
	}
	

	if (!empty($_POST['company_no'])) {
		$company_no = $_POST['company_no'];
	}

	

	$name = ucwords($_POST['name']);

	$contact_name = ucwords($_POST['contact_name']);

	$kra_pin = ucfirst($_POST['kra_pin']);

	$email = $_POST['email'];

	$country = $_POST['country'];

	$tel = $_POST['tel'];


	$details = [$name, $email, $company_no, $country, $tel, $kra_pin];

	$result = save_organisation($name, $email, $company_no, $country, $tel, $kra_pin);

	if ($result == "Success") {
		$msg = "Successfully added organisation";
		header("Location: index.php?page=client/register/success&msg=$msg");
		exit;
	} else {
		$msg = "An error occured. Please try again later";
		header("Location: index.php?page=client/register/new_organisation&err_msg=$msg");
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
<script>
	console.log(<?php echo json_encode($details); ?>);
</script>