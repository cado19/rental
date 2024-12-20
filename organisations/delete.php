<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo $id;
	$response = delete_organisation($id);
	if ($response == "Deleted") {
		$msg = "Successfully deleted organisation";
		header("Location: index.php?page=organisations/all&msg=$msg");
	} else {
		$msg = "Could not delete organisation. Try again";
		header("Location: index.php?page=organisations/all&err_msg=$msg");
	}

} else {
	$msg = "No such organisation";
	header("Location: index.php?page=organisations/all&err_msg=$msg");
	exit;
}