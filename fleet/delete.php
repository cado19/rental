<?php

if (isset($_GET['id'])) {
	echo $id;
} else {
	$msg = "No such vehicle";
	header("Location: index.php?page=fleet/all&msg=$msg");
	exit;
}