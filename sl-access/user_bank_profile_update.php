<?php
require_once("../con_base/functions.inc.php");


$sql_data = " select * from  tbl_team_student where user='".$_SESSION[ 'a_userid' ]."'  ";
$data_qry = mysqli_query( $DB_LINK, $sql_data );
$data_res = mysqli_fetch_array( $data_qry );

if(isset($_POST['upd_data_req']))
{
  $sqlst=mysqli_query($DB_LINK,"select * from tbl_request where `m_id`='".$_SESSION[ 'staff_m_id' ]."' and  `req_for`='Bank Edit Request' and status=0  ") or die(mysqli_error());
  if(mysqli_num_rows($sqlst)<1)
  {
    mysqli_query($DB_LINK," INSERT INTO `tbl_request` set  `m_id`='".$_SESSION[ 'staff_m_id' ]."' , `req_for`='Bank Edit Request'  ") or die(mysqli_error());
    $_SESSION['msg']=array('success', "Request submitted kindly wait from admin responce");
    header("location:my-profile-edit-bank.php");
    exit;
  }
  else
  {
    $_SESSION['msg']=array('error', "Your Request already submitted kindly wait for admin responce");
    header("location:my-profile-edit-bank.php");
    exit;
  }

}


if(isset($_POST['upd_data']))
{

  $qry2="update  tbl_team_student set   
	bank='".$_POST['bank']."', 
	acc='".$_POST['acc']."', 
	actype='".$_POST['actype']."', 
	ifsc='".$_POST['ifsc']."', 
	branch='".$_POST['branch']."',
	benf_name='".$_POST['benf_name']."',
        bank_edit_flag='0'           
            where user='".$_SESSION[ 'a_userid' ]."'  ";
  if(mysqli_query($DB_LINK,$qry2 ))
  {

    $_SESSION['msg']=array('success', 'Bank Details Updated Successfully');
    //$_SESSION['suc_msg']="Updated Successfully";
   // $text2 = "Dear " . $_POST[ 'name' ] . " your Bank Details updated successfully Regards ".$SITE_NAME;


    //sms_sender($data_res['mobile'], $text2);
    header("location:user_bank_profile.php");
    exit;
  }
  else
  {
    $_SESSION['msg']=array('error', 'Something went wrong !!!');

    header("location:user_bank_profile_update.php");
    exit;
  }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Update Bank Details | <?php echo $SITE_NAME;?></title>
	<?php include("include/top.php");?>
	<!-- Custom styles for this page -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
			<?php include("include/sidebar.php");?>
			<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

							<!-- Topbar -->
							<?php include("include/header.php");?>
							<!-- End of Topbar -->

							<!-- Begin Page Content -->
							<div class="container-fluid">

                                <div class="d-sm-flex align-items-center justify-content-between mb-1">
                                    <h1 class="h3 mb-2 text-gray-800">Bank Details Update</h1>

                              <!--      <a href="team_city_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                              -->  </div>
								<!-- Page Heading -->

								<p class="mb-4">Update your bank details </p>


                                <!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Update Bank Details</h6>
           <form class="form-horizontal" role="form" method="post" action="" target="_parent" enctype="multipart/form-data">




                                            <div class="card-body text-primary">


                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Beneficiary /  Account name in your passbook :
                                                </label>
                                                <div class="col-sm-8">
                                                  <input type="text" placeholder="Enter Beneficiary / Account Name" class="form-control" name="benf_name"    value="<?php echo $data_res['benf_name'];?>"   />
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Account No. :
                                                </label>
                                                <div class="col-sm-8">
                                                  <input type="text" placeholder="Enter A/C No." class="form-control" name="acc"   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" maxlength="20" value="<?php echo $data_res['acc'];?>"   />
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Bank Name  :
                                                </label>
                                                <div class="col-sm-8">

                                                  <select class="form-control" name="bank" id="bank"  required >
                                                    <option value="">Select Bank Name</option>
                                                    <?php $sql=mysqli_query($DB_LINK,"select * from tbl_bank   order by bank_name") or die(mysqli_error());
                                                    foreach($sql as $state)
                                                    {
                                                      ?>
                                                      <option value="<?php echo $state['bank_name'];?>"
                                                       <?php if(isset($data_res['bank'])){if($data_res['bank']==$state['bank_name']) { echo 'selected'; } }?>><?php echo $state['bank_name'];?></option>
                                                    <?php } ?>
                                                  </select>


                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  IFSC Code. :
                                                </label>
                                                <div class="col-sm-8">
                                                  <input type="text" placeholder="Enter IFSC" class="form-control" name="ifsc" style="text-transform:uppercase" value="<?php echo $data_res['ifsc'];?>"    />
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Account Type :
                                                </label>
                                                <div class="col-sm-8" id="sandbox-container">
                                                  <select class="form-control"  name="actype"  >
                                                    <option value="SAVING" <?php if($data_res['actype']=='SAVING' ) echo 'checked';?> >SAVING</option>
                                                    <option value="CURRENT" <?php if($data_res['actype']=='CURRENT' ) echo 'checked';?> >CURRENT</option>
                                                  </select>
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Bank Branch :
                                                </label>
                                                <div class="col-sm-8">
                                                  <input type="text"  placeholder="Enter Branch" class="form-control"   name="branch" value="<?php echo $data_res['branch'];?>" />
                                                </div>
                                              </div>






                                              <?php //if($data_res['bank_edit_flag']==1) { ?>
                                                <div class="form-group text-center">
                                                  <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="upd_data">
                                                      Update Bank Data
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                      Cancel
                                                    </button>
                                                  </div> </div>
                                              <?php  /*}else  {  */ ?>
                                                <!--<div class="form-group text-center">
                                                  <div>
                                                    <button type="submit" class="btn btn-pink waves-effect waves-light" name="upd_data_req"> Bank Data Editing is locked Sent Edit Request   </button>

                                                  </div> </div>-->
                                              <?php// }  ?>
                                            </div>
           </form>
                                            </div>


							</div>
							<!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

					<!-- Footer -->
					<?php include("include/footer.php");?>
					<!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

		<?php include("include/last.php");?>

		<!-- Page level plugins -->
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="../core/js/demo/datatables-demo.js"></script>

</body>

</html>
