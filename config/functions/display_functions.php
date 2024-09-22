<?php
// function that will show record value or NA if absent
function show_value($object, $value) {
	if (array_key_exists($value, $object)) {
		if (isset($object[$value])) {
			echo $object[$value];
		} else {
			echo "N/A";
		}
	} else {
		echo "N/A";
	}
}

function show_numeric_value($object, $value) {
	global $res;
	if (array_key_exists($value, $object)) {
		if (isset($object[$value])) {
			$res = (float) ($object[$value]);
			echo number_format($res);
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}

}

// function that will show record value or empty string in field in edit form
function edit_input_value($value, $object) {
	if (array_key_exists($value, $object)) {
		if (isset($object[$value])) {
			echo $object[$value];
		} else {
			echo "";
		}
	} else {
		echo "";
	}
}
// function that will show record value or empty string in dropdown field in edit form
function edit_dropdown_value($value) {
	if (isset($value)) {
		echo $value;
	} else {
		echo "--Please choose an option--";
	}
}

?>

