<?php
require_once("../con_base/functions.inc.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registration Successfully completed	| <?php echo $SITE_NAME;?></title>
	<?php include("include/top.php");?>
	<!-- Custom styles for this page -->

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

								<!-- Page Heading -->
								<h1 class="h3 mb-2 text-gray-800">New Registration	</h1>
								<p class="mb-4">Registration Successfully completed</p>


								<?php
								$sql_foruser_n = " select *  from registration where user='".$_GET[ 'id' ]."' ";
								$qry_foruser_n = mysqli_query( $DB_LINK1, $sql_foruser_n);
								$data_foruser_n = mysqli_fetch_array( $qry_foruser_n );
								?>
								<!-- Select -->
								<div class="row clearfix">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="card shadow mb-4">
											<div class="card-header py-3">
												<h6 class="m-0 font-weight-bold text-primary"> <strong> Account Registered  </strong></h6>


											</div>
											<div class="card-body">
												<div class="row clearfix">
													<div class="col-sm-12">
														<h6 class="card-inside-title">Member Id</h6>
														<div class="form-group">
															<?php echo $data_foruser_n['id'] ?>
														</div>
														<h6 class="card-inside-title">Password</h6>
														<div class="form-group">
															<?php echo $data_foruser_n['password'] ?>
														</div>
														<h6 class="card-inside-title">Director Name</h6>
														<div class="form-group">
															<?php echo $data_foruser_n['member'] ?>
														</div>
														<h6 class="card-inside-title">Mobile No</h6>
														<div class="form-group">
															<?php echo $data_foruser_n['mobile'] ?>
														</div>

                                                        <?php
                                                       //  $text='Congratulation for joining G.N.F. Global Pvt Ltd '.$data_foruser_n['member'].' your Mem ID- '.$data_foruser_n['id'].' Password- '.$data_foruser_n['password'].' Warm Regards www.geolifecare.com';
                                                       //  sms_sender( $data_foruser_n['mobile'], $text,'1207161848214557666');
                                                        ?>



													</div>


												</div>

											</div>
										</div>
									</div>
								</div>
								<!-- #END# Select -->






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


</body>

</html>
