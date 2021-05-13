<?php
require_once("../con_base/functions.inc.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>View ID Details | <?php echo $SITE_NAME;?></title>
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
			<?php include("include/sidebar.php");

   $sql_data = " select * from  tbl_team_student where user='".$_SESSION[ 'a_userid' ]."'  ";
   $data_qry = mysqli_query( $DB_LINK, $sql_data );
   $data_res = mysqli_fetch_array( $data_qry );?>
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
                                    <h1 class="h3 mb-2 text-gray-800">View ID / Address proof Details</h1>

                              <!--      <a href="team_city_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                              -->  </div>
								<!-- Page Heading -->

								<p class="mb-4">View ID Details </p>


                                <!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">ID Details</h6>




                                            <div class="card-body text-primary">

                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Aadhar No / Voter ID Card :
                                                </label>
                                                <label class="col-sm-8 ">
                                                  <?php echo $data_res['id_aadhar']?>
                                                </label>
                                              </div>

                                              <div class="form-group row">
                                                <label class="col-sm-4 control-label no-padding-right" >   Scan Copy (Front) Aadhar No / Voter ID Card </label>
                                                <div class="col-sm-8">


                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
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
                                                            <img src="../upload/sl_data/uid/<?php echo $data_res['uid_img'];?>" class="img-responsive img-fluid">

                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-4 control-label no-padding-right" >   Scan Copy (Back) Aadhar No / Voter ID Card </label>
                                                <div class="col-sm-8">


                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal1">
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
                                                            <img src="../upload/sl_data/uid/<?php echo $data_res['uid_img_back'];?>" class="img-responsive img-fluid">

                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Pan No :
                                                </label>
                                                <label class="col-sm-8 col-form-label">

                                                <?php echo $data_res['id_pan']?>

                                                </label>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-4 control-label no-padding-right" > Update Pan Image </label>
                                                <div class="col-sm-8">

                                                 <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal2">
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
                                                            <img src="../upload/sl_data/pan/<?php echo $data_res['pan_img'];?>" class="img-responsive img-fluid">

                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                 
                                                </div>
                                              </div>

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
