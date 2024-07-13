<?php
    	if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['id'];
            $new_id = (string)$id;
            $file = $_FILES['signature'];
            $log->warning($id);
    
            $fileName = $file['name'];
            $fileTmPName = $file['tmp_name'];
            $filesize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];
    
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    
            $allowed = array('jpg', 'jpeg', 'png');
    
            if (in_array($fileExt, $allowed)) {
                // So uniqid gets a random number based on the current time. Microseconds. We then append that to the extension ($fileExt)
                $fileNameNew = uniqid('', true).".".$fileExt;
                $fileDestination = 'contracts/signatures/'.$fileNameNew;
                $sql = "UPDATE contracts SET signature = ? WHERE id = ?";
                $stmt = $con->prepare($sql);
                $stmt->execute([$fileNameNew, $new_id]);
                // $response = sign_contract($new_id, $fileNameNew);
                move_uploaded_file($fileTmPName, $fileDestination);
                // $log->info($response);
                // CHANGE BOOKING TO ACTIVE
            } else {
                echo "There was an error uploading your file";
            }
            
        }
    


?>