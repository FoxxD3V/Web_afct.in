<?php
require_once("con_base/functions.inc.php");
if(isset($_POST['login']))
{
    $user_role="";
    $tmpusertyp=trim(clean($_POST['login_typ']));
    $tmpuserid=trim(clean($_POST['loginid']));
    $tmppassword=trim(enc($_POST['pass']));
    if($tmpusertyp=='')
    {
        $sql = " select * from tbl_login where user='$tmpuserid' ";
        $user_role='admin';
    }
    else
    {
        $user_role=$tmpusertyp;
        $_SESSION[ 'warn_msg' ] = "Sorry this login is under development ";
        $_SESSION['msg']=array('error', 'Sorry this login is under development');
        header( "Location: index.php" );
        exit();
    }

   $result = mysqli_query($DB_LINK, $sql );
   $GetRows = mysqli_num_rows( $result );
   if ( $GetRows > 0 )
   {
    $line = mysqli_fetch_array( $result );
    if ( $line[ 'pass' ] == $tmppassword )
    {
        $_SESSION[ 'user_role' ] = $user_role;
        $_SESSION[ 'a_id' ] = $line[ 'id' ];
        $_SESSION[ 'a_userid' ] = $tmpuserid;
        $_SESSION[ 'a_name' ] = $line[ 'username' ];
        $_SESSION[ 'a_mobile' ] = $line[ 'mobile' ];
        $_SESSION[ 'a_email' ] = $line[ 'email' ];
        $_SESSION[ 'a_status' ] = $line[ 'status' ];
        ip_store($user_role,$line[ 'id' ]);
        $_SESSION[ 'info_msg' ] = "Login Successfully";
        $_SESSION['msg']=array('success', 'Login Successfully');
        if($user_role=='admin')
        {
            header("Location: admin-access/index.php");
            exit();
        }

			/*	if($line['status']==0)
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
      

					 */
    } 
     else 
     {
      $_SESSION[ 'warn_msg' ] = "Please Enter Valid Password";
      $_SESSION['msg']=array('error', 'Please Enter Valid  Password');
      header( "Location: index.php" );
      exit();
    }
   } 
  else 
  {
    $_SESSION[ 'warn_msg' ] = "Please Enter Valid Username";
    $_SESSION['msg']=array('error', 'Please Enter Valid Username ');
			header( "Location: index.php" );
			exit();
   }
}
?>
<html>
<Head>
	<title>Login Processing..</title>
</Head>
<body style="alignment: center">
	<img height="200px" src="core/img/login_process.gif"/>
</body>
</html>

