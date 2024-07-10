<?php


/* 
 * Custom function to compress image size and 
 * upload to the server using PHP 
 */ 
function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
} 
 
 
// File upload path 
$uploadPath = __DIR__."/contracts/signatures/"; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $status = 'error'; 
    $id = $_POST['id'];
    if(!empty($_FILES["signature"]["name"])) { 

        // File info 
        $fileName = basename($_FILES["signature"]["name"]); 
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileNameNew = uniqid('', true).".".$fileExt;
        $imageUploadPath = $uploadPath . $fileNameNew; 
        // $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $imageTemp = $_FILES["signature"]["tmp_name"]; 
            $imageSize = $_FILES["signature"]["size"];
             
            // Compress size and upload image 
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75); 
             
            if($compressedImage){ 
                $compressedImageSize = filesize($compressedImage);
                sign_contract($id, $fileNameNew);
                $status = 'success'; 
                header("Location: index.php?page=bookings/all");
                // $statusMsg = "Image compressed successfully."; 
            }else{ 
                $statusMsg = "Image compress failed!"; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
?>