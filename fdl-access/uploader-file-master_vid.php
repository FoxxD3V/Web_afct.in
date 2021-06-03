<?php

function uploadmaster($folder_name,$uploder_name)
{
	global $finame;
	global $bn_ext;
	global $co;
	$finame='';


 	$target_dir = $folder_name;
    $target_file = $target_dir . basename($_FILES[$uploder_name]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//     // Check if image file is a actual image or fake image
//
//         $check = getSize($_FILES[$uploder_name]["tmp_name"]);
//         if($check !== false) {
//             $co=  "File is an image - " . $check["mime"] . ".";
//             $uploadOk = 1;
//         } else {
//             $co.=  "File is not an image.";
//             $uploadOk = 0;
//         }

    // Check if file already exists
    if (file_exists($target_file)) {
        $co.= "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] >      30000000) {
        $co.= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if( $imageFileType != "mp4" ) {
        $co.= "Sorry, only Mp4 files are
        allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $co.= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {

    $filename = strtolower(basename($_FILES[$uploder_name]['name']));
    $ext = substr($filename, strrpos($filename, '.') + 1);
    $nam=time().date("d-m-Y");
    $name=$nam.".";
    $finame=$name.$ext;
    $newname = $folder_name.$name.$ext;

        if (move_uploaded_file($_FILES[$uploder_name]["tmp_name"], $newname)) {
            $co.= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            $co.= "Sorry, there was an error uploading your file.";
        }
    }

}






?>