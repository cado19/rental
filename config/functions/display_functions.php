<?php
// function that will show record value or NA if absent
function show_value($value) {
	if (isset($value)) {
		echo $value;
	} else {
		echo "N/A";
	}
}

// function that will show record value or empty string in field in edit form
function edit_input_value($value) {
	if (isset($value)) {
		echo $value;
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