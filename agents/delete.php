<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$status = "true";
		$sql = "UPDATE accounts SET deleted = ? WHERE id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute([$status, $id]);
		$msg = "Successfully deleted agent";
		header("Location: index.php?page=agents/all&msg=$msg");
	}
 ?>