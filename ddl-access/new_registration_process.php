<?php
ob_start();
require_once("../con_base/functions.inc.php");
if(isset($_POST['save']))
{
   $sponcer_id=$_POST['sponsor_id'];
	$placement=$_POST['placement'];
	$country=strtoupper($_POST['country']);
	$package=strtoupper($_POST['package']);
	$member=strtoupper($_POST['member']);
	$father_name=strtoupper($_POST['father_name']);
	$gender=strtoupper($_POST['gender']);
	$dob=$_POST['dob'];
	$mobile=$_POST['mobile'];
	$email=strtoupper($_POST['email']);
	$password=$_POST['password'];
//	$pan=$_POST['pan'];
$husband_name =strtoupper(trim($_POST['husband_name'])) ;
$address=strtoupper(trim($_POST['address'])) ;
$pincode=strtoupper(trim($_POST['pincode'])) ;
$nname=strtoupper(trim($_POST['nname'])) ;
$nrel=strtoupper(trim($_POST['nrel'])) ;
$nage=strtoupper(trim($_POST['nage']));
$state_id=strtoupper(trim($_POST['state_id']));
$city_id=strtoupper(trim($_POST['city_id']));


	/////Get New id/////
	$select_maxid = mysqli_query($DB_LINK1,"SELECT MAX(id) as gen_id FROM registration");
	$row1 = mysqli_fetch_assoc($select_maxid);
	$max_id = $row1['gen_id'];
	$new_id=$max_id+1;

	////State City Data/////
	if ($_POST['state_id'] != '')	{
		$sqlst = mysqli_query($DB_LINK1, "select state from state where state_id='" . $_POST['state_id'] . "'") or die(mysqli_error());
		$datas_name = mysqli_fetch_array($sqlst);
		$state = $datas_name['state'];
	}
	if ($_POST['city_id'] != '')	{
		$sqlct = mysqli_query($DB_LINK1, "select city from city where city_id='" . $_POST['city_id'] . "'") or die(mysqli_error());
		$datac_name = mysqli_fetch_array($sqlct);
		$city = $datac_name['city'];
	}

	/////Checkk   Referal status////
	$qur=mysqli_query($DB_LINK1,"select * from registration where sponsor_id='$sponcer_id'");
	$r1=0;
	$b=0;
	$str='';
	while($k=mysqli_fetch_array($qur))
	{
	 $str.=$k["placement"].",";
		$r1=$r1+1;
	}
	$str1=explode(",",$str);
	$placem=$placement;
	if (in_array($placem,$str1))
	{
		$b=1;
	}

	if($r1<2 and $b!=1)
	{
		//pan='$pan',
        $sql_reg="insert into registration set 
id='$new_id',
sponsor_id='$sponcer_id', 
placement='$placement', 
`user`='$new_id',
password='$password',
tpass='$password',
member='$member',
father_husband_name='$father_name',
gender='$gender',
country='$country',
mobile='$mobile',	
email='$email',
dob='$dob',
status='0',
joining_date=now(), 
is_active='Y',
active_date=now(), 
package='$package',
husband_name='$husband_name',
address='$address',
city='$city',
state='$state',
state_id='$state_id',
city_id='$city_id',
pincode='$pincode',
nname='$nname', 
nrel='$nrel',
nage='$nage'
 ";

if(mysqli_query($DB_LINK1,$sql_reg))
{
     //SMS is attched on success page
	 $text='Congratulation for joining G.N.F. Global Pvt Ltd '.$member.' your Mem ID- '.$new_id.' Password- '.$password.' Warm Regards www.geolifecare.com';
	 sms_sender( $mobile, $text,'1207161848214557666');
	$_SESSION['msg']=array('success', 'Registration Successfully completed');
	header("Location: new_registration_success.php?id=".$new_id);
	echo 'Success';
}

	}

}
else	{
	$_SESSION['msg'] = array('error', 'Something went wrong !!!');
	header("Location: index.php");
}
