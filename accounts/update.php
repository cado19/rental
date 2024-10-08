<?php
// THIS SCRIPT UPDATES PASSWORD OF AN AGENT AND EVEN ACCOUNT
$name = $email = $password = "";
$username_err = $email_err = "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST['id'];
	// $email = $_POST['email'];
	$password = $_POST['password'];

	// $log->info('posts', $posts);

	// Validate username
	// $taken_email = unique_email($email);
	// if ($taken_email == "Email Taken") {
	// 	$email_err = "Choose another email";
	// 	header("Location: index.php?page=accounts/new&msg=" . $email_err);
	// } else {
	// 	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	// }

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$posts = [
		"id" => $id,
		"password" => $password,
		"hashed_password" => $hashed_password,
	];
	$response = update_agent_password($id, $hashed_password);
	header("Location: index.php");

}
?>

<script>
	console.log(<?php echo json_encode($posts); ?>);

</script>