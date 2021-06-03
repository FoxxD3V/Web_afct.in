<?php
require_once("../con_base/functions.inc.php");


$sql_data = " select * from  tbl_team_fact where user='".$_SESSION[ 'a_userid' ]."'  ";
$data_qry = mysqli_query( $DB_LINK, $sql_data );
$data_res = mysqli_fetch_array( $data_qry );


if(isset($_POST['upd_data']))
{

  ///Image Setup
  $finame ="";
  require_once("uploader-file-master.php");
  $i2='';$i3='';$i4 ='';

  if (isset($_FILES['uploaded_file2']))
  {
    uploadmaster("../upload/tl_data/uid/", 'uploaded_file2');
    if ($finame != '')
    {
      $qry=mysqli_query($DB_LINK,"select 	uid_img from tbl_team_fact where user='".$_SESSION[ 'a_userid' ]."' ") ;
      $row=mysqli_fetch_array($qry);
      unlink('../upload/tl_data/uid/'.$row['uid_img']);

      $f1= $finame;
      $i2="uid_img='$f1', ";
    }
  }

  if (isset($_FILES['uploaded_file3']))
  {
    uploadmaster("../upload/tl_data/uid/", 'uploaded_file3');
    if ($finame != '')
    {
      $qry=mysqli_query($DB_LINK,"select 	uid_img_back from  tbl_team_fact where user='".$_SESSION[ 'a_userid' ]."' ") ;
      $row=mysqli_fetch_array($qry);
      unlink('../upload/tl_data/uid/'.$row['uid_img_back']);

      $f1= $finame;
      $i3="uid_img_back='$f1', ";
    }
  }


  if (isset($_FILES['uploaded_file4']))
  {
    uploadmaster("../upload/tl_data/pan/", 'uploaded_file4');
    if ($finame != '')
    {
      $qry=mysqli_query($DB_LINK,"select pan_img from tbl_team_fact where user='".$_SESSION[ 'a_userid' ]."' ") ;
      $row=mysqli_fetch_array($qry);
      unlink('../upload/tl_data/pan/'.$row['pan_img']);

      $f1= $finame;
      $i4="pan_img='$f1', ";
    }
  }




  $qry2="update  tbl_team_fact set   
$i2 $i3 $i4 
uid='".$_POST['uid']."' , 
	pan='".$_POST['pan']."', 
        bank_edit_flag='0'           
            where user='".$_SESSION[ 'a_userid' ]."'  ";
  if(mysqli_query($DB_LINK,$qry2 ))
  {

    $_SESSION['msg']=array('success', 'ID Details Updated Successfully');
    //$_SESSION['suc_msg']="Updated Successfully";
    // $text2 = "Dear " . $_POST[ 'name' ] . " your Bank Details updated successfully Regards ".$SITE_NAME;


    //sms_sender($data_res['mobile'], $text2);
    header("location:user_id_profile.php");
    exit;
  }
  else
  {
    $_SESSION['msg']=array('error', 'Something went wrong !!!');

    header("location:user_id_profile_update.php");
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

  <title>Update ID Address Proof Details | <?php echo $SITE_NAME;?></title>
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
                                    <h1 class="h3 mb-2 text-gray-800">Update ID Address Proof Details</h1>

                              <!--      <a href="team_city_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                              -->  </div>
								<!-- Page Heading -->

								<p class="mb-4">Update ID Details </p>


                                <!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">ID Details</h6>

           <form class="form-horizontal" role="form" method="post" action="" target="_parent" enctype="multipart/form-data">



                                            <div class="card-body text-primary">

                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Aadhar No / Voter ID Card :
                                                </label>
                                                <div class="col-sm-8 ">  <input name="uid"      type="text"  placeholder="Enter Aadhar No." class="form-control" id="uid"  value="<?php echo $data_res['uid']?>"   required/>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <label class="col-sm-4 control-label no-padding-right" > Update Scan Copy (Front) Aadhar No / Voter ID Card </label>
                                                <div class="col-sm-8">

                                                  <input name="uploaded_file2" class="form-control" type="file" id="uploaded_file2">

                                                  (For Best resolution use resolution 550 X 400 )
                                                  <?php if($data_res['uid_img']!='') {?>
                                                  <input type="hidden" value="<?php     echo $data_res['uid_img'];?>"  name="uid_img"   >

                                                  <br><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                                                    View Image
                                                  </button>

                                                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Addhar Image Front</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <img src="../upload/tl_data/uid/<?php echo $data_res['uid_img'];?>" class="img-responsive img-fluid">

                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <?php }    ?>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-4 control-label no-padding-right" > Update Scan Copy (Back) Aadhar No / Voter ID Card </label>
                                                <div class="col-sm-8">

                                                  <input name="uploaded_file3" class="form-control" type="file" id="uploaded_file3">

                                                  (For Best resolution use resolution 550 X 400 )
                                                  <?php if($data_res['uid_img_back']!='') {?>
                                                    <input type="hidden" value="<?php     echo $data_res['uid_img_back'];?>"  name="uid_img_back"   >

                                                    <br><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal1">
                                                      View Image
                                                    </button>

                                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Addhar Image Front</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <img src="../upload/tl_data/uid/<?php echo $data_res['uid_img_back'];?>" class="img-responsive img-fluid">

                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  <?php }    ?>
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Pan No :
                                                </label>
                                                <div class="col-sm-8 col-form-label">

                                                  <input name="pan" placeholder="Pan Card"  type="text"  class="form-control" id="pan" value="<?php echo $data_res['pan']?>"  pattern=".{10}" maxlength="10"/>

                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-4 control-label no-padding-right" > Update Pan Image </label>
                                                <div class="col-sm-8">

                                                  <input name="uploaded_file4" class="form-control" type="file" id="uploaded_file4">


                                                  (For Best resolution use resolution 150 X 150 )
                                                  <?php if($data_res['pan_img']!='') {?>
                                                    <input type="hidden" value="<?php     echo $data_res['pan_img'];?>"  name="pan_img"   >

                                                    <br><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal2">
                                                      View Image
                                                    </button>

                                                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">PAN Image  </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <img src="../upload/tl_data/pan/<?php echo $data_res['pan_img'];?>" class="img-responsive img-fluid">

                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  <?php }    ?>
                                                </div>
                                              </div>
                                              <div class="form-group text-center">
                                                <div>
                                                  <button type="submit" class="btn btn-primary waves-effect waves-light" name="upd_data">
                                                    Update ID Data
                                                  </button>
                                                  <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                  </button>
                                                </div> </div>



                                            </div>
           </form>


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
