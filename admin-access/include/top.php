<?php validate_newmember_version2();
$sql_member = " select * from tbl_member_info where mem_id='".$_SESSION[ 'a_mid' ]."' ";
$qry_member = mysqli_query( $DB_LINK1, $sql_member );
$data_member = mysqli_fetch_array( $qry_member );
$sql_foruser = " select id,pic,status,pan_image,is_kyc,bank_data_flag,account_holder,bank_name,account_number,branch,ifsc_code,member_refresh_time    from registration where user='".$_SESSION[ 'a_mid' ]."' ";
$qry_foruser = mysqli_query( $DB_LINK1, $sql_foruser );
$data_foruser = mysqli_fetch_array( $qry_foruser );
?>
<!-- Custom fonts for this template-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css"   />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="core/css/sb-admin-2.min.css" rel="stylesheet">
<link href="core/sweetalert/sweetalert.css" rel="stylesheet">


