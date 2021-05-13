<?php
function uploadmaster($folder_name,$uploder_name)
{
	global $finame;
	global $bn_ext;
	global $co;
	$finame='';
	$abcd=0;
	if((!empty($_FILES[$uploder_name])) && ($_FILES[$uploder_name]['error'] == 0))
	{
		$filename = strtolower(basename($_FILES[$uploder_name]['name']));
 		$ext = substr($filename, strrpos($filename, '.') + 1);
		$bn_ext=$ext;

 		if (($ext == "jpg")||($ext == "jpeg")||($ext == "JPEG")||($ext == "JPG")||($ext == "png") &&($_FILES[$uploder_name]["size"] < 100000))
		{
			$nam=time().rand(0,1000);
			$name=$nam.".";
			$finame=$name.$ext;
			$newname = $folder_name.$name.$ext;
			if (!file_exists($newname)) 
			{
				if ((move_uploaded_file($_FILES[$uploder_name]['tmp_name'],$newname))) 
				{
                    $co_yes="<span style='color:green; font-size:14px;'> File Uploded</span>";
 				} 
				else 
				{ 
					$co="<span style='color:red; font-size:14px;'> A problem occurred during file upload!</span>";
				}
 			} 
			else 
			{
 				$co="<span style='color:red; font-size:14px;'> File ".$_FILES[$uploder_name]["name"]." already exists</span>";
 			} 
 		} 
		else 
		{
 			$co="<span style='color:red; font-size:14px;'>  Only .jpg/.gif/.png images under 5MB are accepted for upload</span>";
 		}
 	} 
	else 
	{
 		$co= "<span style='color:red; font-size:14px;'>Error: No file uploaded</span>";
 	}
}


?>