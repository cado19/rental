<?php
    // THIS SCRIPT WILL HANDLE THE NEW CUSTOMER FORM PROCESSING

    $first_name = $last_name = $email = $id_type = $id_number = $dl_number = $dl_expiry = $tel = $residential_address = $work_address = $date_of_birth = $account_id = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //VALIDATIONS
        if (empty($_POST['first_name'])) {
            $first_name_err = "Required";
            header("Location: index.php?page=client/register/new&first_name_err=$first_name_err");
            exit;
        }
        if (empty($_POST['last_name'])) {
            $last_name_err = "Required";
            header("Location: index.php?page=client/register/new&last_name_err=$last_name_err");
            exit;
        }
        if (empty($_POST['email'])) {
            $email_err = "Required";
            header("Location: index.php?page=client/register/new&email_err=$email_err");
            exit;
        }
        if (empty($_POST['id_type'])) {
            $id_type_err = "Required";
            header("Location: index.php?page=client/register/new&id_type_err=$id_type_err");
            exit;
        }

        if (empty($_FILES['id_image'])) {
            $id_image_err = "Required";
            header("Location: index.php?page=client/register/new&id_image_err=$id_image_err");
            exit;
        }

        if (empty($_FILES['id_image_back'])) {
            $id_image_back_err = "Required";
            header("Location: index.php?page=client/register/new&id_image_back_err=$id_image_back_err");
            exit;
        }

        

        if (empty($_FILES['dl_image'])) {
            $dl_image_err = "Required";
            header("Location: index.php?page=client/register/new&dl_image_err=$dl_image_err");
            exit;
        }

        $front_filename = $_FILES["id_image"]["name"];
        $front_tempname = $_FILES["id_image"]["tmp_name"];

        $back_filename = $_FILES["id_image_back"]["name"];
        $back_tempname = $_FILES["id_image_back"]["tmp_name"];

        // new file name to eliminate conflicts even if someone uploads the same file twice for different records.
        $front_filenameNew = "id_front_" . date("his") . ".png";
        $back_filenameNew  = "id_back_" . date("his") . ".png";

        // folder to upload the image and also its destination
        $front_folder = "customers/id/" . $front_filenameNew;
        $back_folder  = "customers/id/" . $back_filenameNew;

        //DL_IMAGE DETAILS PROCESSING
        $dl_filename = $_FILES["dl_image"]["name"];
        $dl_tempname = $_FILES["dl_image"]["tmp_name"];
        // new file name to eliminate conflicts even if someone uploads the same file twice for different records.
        $dl_filenameNew = "license_" . date("his") . ".png";

        // folder to upload the image and also its destination
        $dl_folder = "customers/license/" . $dl_filenameNew;

        if (empty($_POST['date_of_birth'])) {
            $date_of_birth_err = "Required";
            header("Location: index.php?page=client/register/new&date_of_birth_err=$date_of_birth_err");
            exit;
        }

        $first_name          = ucfirst($_POST['first_name']);
        $last_name           = ucfirst($_POST['last_name']);
        $email               = $_POST['email'];
        $id_type             = $_POST['id_type'];
        $id_number           = $_POST['id_number'];
        $dl_number           = $_POST['dl_number'];
        $dl_expiry           = $_POST['dl_expiry'];
        $tel                 = $_POST['tel'];
        $residential_address = $_POST['residential_address'];
        $work_address        = $_POST['work_address'];
        $date_of_birth       = $_POST['date_of_birth'];

        // Validate email uniqueness
        $taken_email = unique_customer_email($email);
        if ($taken_email == "Email taken") {
            $email_err = "An account exists with such an email.";
            header("Location: index.php?page=client/register/new&email_err=$email_err");
            exit;
        }

        // $details = [$first_name, $last_name, $email, $id_type, $id_number, $dl_number, $dl_expiry, $tel, $residential_address, $work_address, $date_of_birth, $account_id];

        $result = save_client($first_name, $last_name, $email, $id_type, $id_number, $dl_number, $dl_expiry, $tel, $residential_address, $work_address, $date_of_birth, $front_filenameNew, $back_filenameNew, $dl_filenameNew);

        if ($result == "Success") {
            // UPLOAD THE IMAGES
            upload_image($front_folder, $front_tempname);
            upload_image($back_folder, $back_tempname);
            upload_image($dl_folder, $dl_tempname);

            $msg = "Successfully registered";
            header("Location: index.php?page=client/register/success&msg=$msg");
        } else {
            $msg = "An error occured";
            header("Location: index.php?page=client/register/new&err_msg=$msg");
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
<!-- <script>
	console.log(<?php echo json_encode($details); ?>);
</script> -->