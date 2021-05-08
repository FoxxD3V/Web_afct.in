<?php ob_start(); include('../con_base/functions.inc.php');
$pan_data=$_POST['pan'];
$data=array('success'=>false,'message'=>'' );
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'))
{
	if(strlen($pan_data)==10)	{
		$qur = mysqli_query($DB_LINK1, "SELECT  pan from   registration where  pan='$pan_data' ") or die(mysqli_error());
		if (mysqli_num_rows($qur) < 1)	{
			$data['success'] = true;
			$data['message'] = "PAN card avaliable.";
		}	else	{
			$data['message'] = "PAN card already registered.";
		}
	}
	else{
		$data['message'] = "PAN card no is invalid";
	}
}
echo json_encode($data);