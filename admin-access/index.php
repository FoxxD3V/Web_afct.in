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

  <title>My Dashboard | <?php echo $SITE_NAME;?></title>

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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Dashboard</h1>
           <!-- <span class="pull-right text-right" ><small><?php /*echo "Updated On : ".$data_foruser['member_refresh_time'];*/?></small></span>
             <a href="member_update_queue.php" class="  d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-refresh fa-sm text-white-50"></i> Update A/c</a>
         --> </div>

<!--            Content Row -->
<!--          <div class="row">-->
<!---->
<!---->

<!--            <div class="col-xl-3 col-md-6 mb-4">-->
<!--              <div class="card border-left-primary shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                  <div class="row no-gutters align-items-center">-->
<!--                    <div class="col mr-2">-->
<!--                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Team (All Left+Right)</div>-->
<!--                      <div class="h5 mb-0 font-weight-bold text-primary">--><?php //echo $data_member['right_members']+$data_member['left_members'];?><!--</div>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!--                      <i class="fas  fa-users  fa-2x text-primary"></i>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!---->

<!--            <div class="col-xl-3 col-md-6 mb-4">-->
<!--              <div class="card border-left-success shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                  <div class="row no-gutters align-items-center">-->
<!--                    <div class="col mr-2">-->
<!--                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>-->
<!--                      <div class="h5 mb-0 font-weight-bold text-gray-800">--><?php //echo $data_member['total_income'];?><!--</div>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!--                      <i class="fas   fa-rupee-sign fa-2x text-success"></i>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!---->

<!--            <div class="col-xl-3 col-md-6 mb-4">-->
<!--              <div class="card border-left-info shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                  <div class="row no-gutters align-items-center">-->
<!--                    <div class="col mr-2">-->
<!--                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">All PV</div>-->
<!--																					<div class="h5 mb-0 font-weight-bold text-gray-800">--><?php //echo $data_member['right_pv']+$data_member['left_pv'];?><!--</div>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!--                      <i class="fab fa-pinterest-square fa-2x text-info"></i>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!---->

<!--            <div class="col-xl-3 col-md-6 mb-4">-->
<!--              <div class="card border-left-warning shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                  <div class="row no-gutters align-items-center">-->
<!--                    <div class="col mr-2">-->
<!--                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Designation</div>-->
<!--                      <div class="h5 mb-0 font-weight-bold text-gray-800">--><?php //echo $data_member['designation'];?><!--</div>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!---->
<!--																					<i class="fas fa-medal fa-2x text-warning "></i>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->

									<div class="row">

										<?php/* $p_status=0;
										if($data_foruser['status']=='2') $p_status+=20;
										if($data_foruser['is_kyc']=='1') $p_status+=20;
										if($data_member['is_kyc']=='1') $p_status+=20;
										if($data_member['user_image_flag']=='1') $p_status+=20;
										if($data_foruser['bank_data_flag']=='1') $p_status+=20;*/


										?>
										<!--<div class="col-xl-12 col-md-12 mb-12">
											<h5>Profile Status <span class="badge badge-secondary badge-success"><?/*=$p_status*/?>% Complete</span></h5>
											<div class="progress">
												<div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?/*=$p_status*/?>%"></div>
											</div>
										</div>-->
										<div class="col-xl-3 col-md-6 mb-4" >
											<div class="card <?php if('1'=='2') echo 'border-success'; else echo 'border-danger'; ?>   mt-3" >
												<div class="card-header">My Account</div>
												<div class="card-body ">
													<!--	<h5 class="card-title">Primary card title</h5>-->
													<?php /*if($data_foruser['status']=='2') { */?><!--
														<p class="card-text text-success">Account Status : Upgraded</p><?php /*}  else { */?>
														<p class="card-text text-danger">Account Status : Registered</p>--><?php /*} */?>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-md-6 mb-4" >
										<div class="card <?php if("1"=='1') echo 'border-success'; else echo 'border-danger'; ?>  mt-3" >
											<div class="card-header">KYC Status</div>
											<div class="card-body ">
											<!--	<h5 class="card-title">Primary card title</h5>-->

												<?php /*if($data_member['is_kyc']=='1') { */?><!--
													<span class="card-text text-success">Admin Verified</span><?php /*}  else { */?>
													<span class="card-text text-danger">Admin Pending</span>--><?php /*} */?>
											</div>
										</div>
										</div>
										<div class="col-xl-3 col-md-6 mb-4" >
										<div class="card <?php if("2"=='1') echo 'border-success'; else echo 'border-danger'; ?>  mt-3  " >
											<div class="card-header">Bank Details</div>
											<div class="card-body  ">
												<?php /*if($data_foruser['bank_data_flag']=='1') { */?><!--
													<span class="card-text text-success">Bank Info Updated</span><?php /*}  else { */?>
													<span class="card-text text-danger">Bank Info Pending</span>--><?php /*} */?>
											</div>
										</div>
										</div>
										<div class="col-xl-3 col-md-6 mb-4" >
										<div class="card <?php if("1"=='1') echo 'border-success'; else echo 'border-danger'; ?> mt-3  " >
											<div class="card-header">Profile Image</div>
											<div class="card-body  ">
												<?php /*if($data_member['user_image_flag']=='1') { */?><!--
													<span class="card-text text-success">Image Verified</span><?php /*}  else { */?>
													<span class="card-text text-danger">Image Verification Pending</span>--><?php /*} */?>
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
		<script src="../core/vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<?php include "include/chart_data.php"; ?>
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
