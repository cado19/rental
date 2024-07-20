<?php
    $first_name = $last_name = $email = $id_type = $tel = $residential_address = $work_address = $date_of_birth = $account_id = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $account_id = trim($_POST['account_id']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $id_number = $_POST['id_number'];
        $tel = $_POST['tel'];
        $date_of_birth = $_POST['date_of_birth'];

        $details = [$first_name,$last_name,$email,$id_type,$id_number,$tel,$residential_address,$work_address,$date_of_birth];

        $result = save_customer($first_name,$last_name,$email,$id_number,$tel,$date_of_birth,$account_id);

        $log->info($result);

        header("Location: index.php?page=drivers/all");
    }

?>