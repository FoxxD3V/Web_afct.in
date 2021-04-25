<?php
require_once("../con_base/functions.inc.php");
if(isset($_POST['login']))
{
    $tmpuserid=trim(clean($_POST['loginid']));
    $tmppassword=trim($_POST['pass']);
     $sql = " select * from registration where user='$tmpuserid' ";

   $result = mysqli_query( $DB_LINK1, $sql );
   $GetRows = mysqli_num_rows( $result );
   if ( $GetRows > 0 )
   {
    $line = mysqli_fetch_array( $result );
    if ( $line[ 'password' ] == $tmppassword ) 
    {
				if($line['status']==0)
							{
									$now = time(); // or your date as well
									$your_date = strtotime($line['joining_date']);
									$datediff = $now - $your_date;
									$ddt=floor($datediff/(60*60*24));
									if( $ddt>30)
									{
							 	$_SESSION['warn_msg']="User Id Inactive Contact Admin";
								 $_SESSION['msg']=array('error', 'User Id Inactive Contact Admin');
									header( "Location: login.php" );
								 exit;
									}
							}

					if($line['status']==3)
					{
							$_SESSION['warn_msg']="Sorry!! This associate ID is terminated";
							$_SESSION['msg']=array('error', 'Sorry!! This associate ID is terminated');
							header( "Location: login.php" );
							exit;
					}
      
      $_SESSION[ 'a_id' ] = $line[ 'id' ];
      $_SESSION[ 'a_mid' ] = $line[ 'id' ];
      $_SESSION[ 'a_name' ] = $line[ 'member' ];
      $_SESSION[ 'a_mobile' ] = $line[ 'mobile' ];
      $_SESSION[ 'a_email' ] = $line[ 'email' ];
      $_SESSION[ 'a_status' ] = $line[ 'status' ];
      ip_store($log_type,$line[ 'id' ]);       
      $_SESSION[ 'info_msg' ] = "Login Successfully";
      $_SESSION['msg']=array('success', 'Login Successfully');
					header( "Location: index.php" );
					exit();
    } 
     else 
     {
      $_SESSION[ 'warn_msg' ] = "Please Enter Valid Password";
      $_SESSION['msg']=array('error', 'Please Enter Valid Password');
      header( "Location: login.php" );
      exit();
    }
   } 
  else 
  {
    $_SESSION[ 'warn_msg' ] = "Please Enter Valid Username";
    $_SESSION['msg']=array('error', 'Please Enter Valid Username');
			header( "Location: login.php" );
			exit();
   }
}
?>
<html>
<Head>
	<title>Login Processing..</title>
</Head>
<body>
<center>
	<img height="200px" src="http://customer.edusmart.com/website/sites/default/files/images/redirectUrl.gif"/></center>
</body>
</html>

