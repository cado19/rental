<?php
$name = $email = $password = "";
$username_err = $email_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$posts = [$name, $email, $password];

	$log->info('posts', $posts);

	// Validate username
	$taken_email = unique_customer_email($email);
	if ($taken_email == "Email taken") {
		$email_err = "An account exists with such an email. Log in.";
		header("Location: index.php?page=client/auth/signup&msg=$email_err");
	} else {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$response = create_customer_account($name, $email, $hashed_password);
		if ($response == "No Success") {
			$msg = "An error occured";
			header("Location: index.php?page=client/auth/signup&msg=$msg");
		} else {
			$signed_in_user = login_customer($response);
			$msg = "Your account has been successfully created.";

			header("Location: index.php?page=client/catalog/all&msg=$msg");
		}

	}

}
?>