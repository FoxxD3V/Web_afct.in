<?php
require_once("../con_base/functions.inc.php");
// Table creation /////

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Course | <?php echo $SITE_NAME;?></title>
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
                                    <h1 class="h3 mb-2 text-gray-800">Course</h1>

                                   <!-- <a href="master_course_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                               --> </div>
								<!-- Page Heading -->

								<p class="mb-4">Course list with basic info </p>


                                <!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Course</h6>

                                    </div>
                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTableFullPage" width="100%" cellspacing="0">
												<thead>
												<tr>
													<th >#</th>
													<th>INFO</th>
                                                    <th>FEE</th>
													<th>DURATION</th>
													<th>ELIGIBILITY</th>
                                                     <th>DETAILS</th>
												</tr>
												</thead>
												<tfoot>
												<tr>
                                                    <th >#</th>
                                                    <th>INFO</th>
                                                    <th>FEE</th>
                                                    <th>DURATION</th>
                                                    <th>ELIGIBILITY</th>
                                                    <th>DETAILS</th>
												</tr>
												</tfoot>
												<tbody>
												<?php
                                                $jcount=0;
                                                $qry_user= mysqli_query($DB_LINK,"SELECT * FROM tbl_master_course where c_typ='".$_GET['type']."' order by id desc ");
                                                foreach($qry_user as $data_user )
                                                {
                                                    $jcount++;
                                                ?>
														<tr>
															<td><?php echo $jcount;?></td>
															<td><?php echo $data_user['c_name'];?><br>
                                                                <small>[<?php echo $data_user['c_code'];?>] <?php echo $data_user['c_sort_name'];?></small>
                                                            </td>
                                                            <td> <?php echo $data_user['c_fee'];?></td>
                                                            <td><?php echo $data_user['c_dur'];?> <?php echo $data_user['c_dur_typ'];?></td>
                                                            <td> <?php echo $data_user['eligi'];?></td>




                                                            <td>
                                                            <!--   <a href="javascript:void(0);" title="<?php /*echo $data_user['detail'];*/?> "><i  style="color:green " class="fa fa-info-circle fa-lg"> </i></a>
                                                            -->  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $jcount;?>">
                                                                View
                                                              </button>

                                                              <div class="modal fade" id="exampleModal<?php echo $jcount;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h5 class="modal-title" id="exampleModalLabel">Course Details</h5>
                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                      <?php
                                                                      echo '<pre>';
                                                                      echo $data_user['detail'];
                                                                      echo '</pre>';
                                                                      ?>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>

                                                              <script> $('#myModal<?php echo $jcount;?>').on('shown.bs.modal', function () {
                                                                      $('#myInput').trigger('focus')
                                                                  })</script>

                                                              <!--
                                                                                                                              <a  href="master_course_add.php?edit=<?php /*echo $data_user['id'];*/?>" ><i  style="color:blue " class="fa fa-edit fa-lg"></i></a> <?php /*if($data_user['status']==1){*/?>
                                                                                                                              &nbsp;<a href="master_course.php?ban=<?php /*echo $data_user['id'];*/?> "  ><i class="fa fa-check fa-lg" style="color:green" title="Ban"></i>  </a>
                                                                                                                              <?php /*} else  { */?>
                                                                                                                              &nbsp;<a href="master_course.php?unban=<?php /*echo $data_user['id'];*/?> "  ><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i>  </a>
                                                                                                                              <?php /*}  */?>
                                                                                                                              <a href="javascript:void(0)"  onClick="return del(<?php /*echo $data_user['id'];*/?>,'master_course.php')"> <i class=" fa-lg fa fa-trash  "  style="color:red" title="Delete"></i>   </a>
                                                              -->
                                                            </td>


														</tr>
												 <?php  } ?>


												</tbody>
											</table>
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
