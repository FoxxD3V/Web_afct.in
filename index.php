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
            <span class="pull-right text-right" ><small><?php echo "Updated On : ".$data_foruser['member_refresh_time'];?></small></span>
             <a href="member_update_queue.php" class="  d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-refresh fa-sm text-white-50"></i> Update A/c</a>
          </div>

          <!-- Content Row -->
          <div class="row">


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Team (All Left+Right)</div>
                      <div class="h5 mb-0 font-weight-bold text-primary"><?php echo $data_member['right_members']+$data_member['left_members'];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas  fa-users  fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_member['total_income'];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas   fa-rupee-sign fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">All PV</div>
																					<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_member['right_pv']+$data_member['left_pv'];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-pinterest-square fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Designation</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_member['designation'];?></div>
                    </div>
                    <div class="col-auto">

																					<i class="fas fa-medal fa-2x text-warning "></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

									<div class="row">

										<?php $p_status=0;
										if($data_foruser['status']=='2') $p_status+=20;
										if($data_foruser['is_kyc']=='1') $p_status+=20;
										if($data_member['is_kyc']=='1') $p_status+=20;
										if($data_member['user_image_flag']=='1') $p_status+=20;
										if($data_foruser['bank_data_flag']=='1') $p_status+=20;


										?>
										<div class="col-xl-12 col-md-12 mb-12">
											<h5>Profile Status <span class="badge badge-secondary badge-success"><?=$p_status?>% Complete</span></h5>
											<div class="progress">
												<div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?=$p_status?>%"></div>
											</div>
										</div>
										<div class="col-xl-3 col-md-6 mb-4" >
											<div class="card <?php if($data_foruser['status']=='2') echo 'border-success'; else echo 'border-danger'; ?>   mt-3" >
												<div class="card-header">My Account</div>
												<div class="card-body ">
													<!--	<h5 class="card-title">Primary card title</h5>-->
													<?php if($data_foruser['status']=='2') { ?>
														<p class="card-text text-success">Account Status : Upgraded</p><?php }  else { ?>
														<p class="card-text text-danger">Account Status : Registered</p><?php } ?>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-md-6 mb-4" >
										<div class="card <?php if($data_member['is_kyc']=='1') echo 'border-success'; else echo 'border-danger'; ?>  mt-3" >
											<div class="card-header">KYC Status</div>
											<div class="card-body ">
											<!--	<h5 class="card-title">Primary card title</h5>-->
												<?php if($data_foruser['is_kyc']=='1') { ?>
													<span class="card-text text-success">Branch Verified </span><?php }  else { ?>
													<span class="card-text text-danger">Branch Pending </span><?php } ?>
												<?php if($data_member['is_kyc']=='1') { ?>
													<span class="card-text text-success">Admin Verified</span><?php }  else { ?>
													<span class="card-text text-danger">Admin Pending</span><?php } ?>
											</div>
										</div>
										</div>
										<div class="col-xl-3 col-md-6 mb-4" >
										<div class="card <?php if($data_foruser['bank_data_flag']=='1') echo 'border-success'; else echo 'border-danger'; ?>  mt-3  " >
											<div class="card-header">Bank Details</div>
											<div class="card-body  ">
												<?php if($data_foruser['bank_data_flag']=='1') { ?>
													<span class="card-text text-success">Bank Info Updated</span><?php }  else { ?>
													<span class="card-text text-danger">Bank Info Pending</span><?php } ?>
											</div>
										</div>
										</div>
										<div class="col-xl-3 col-md-6 mb-4" >
										<div class="card <?php if($data_member['user_image_flag']=='1') echo 'border-success'; else echo 'border-danger'; ?> mt-3  " >
											<div class="card-header">Profile Image</div>
											<div class="card-body  ">
												<?php if($data_member['user_image_flag']=='1') { ?>
													<span class="card-text text-success">Image Verified</span><?php }  else { ?>
													<span class="card-text text-danger">Image Verification Pending</span><?php } ?>
											</div>
										</div>
										</div>


									</div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
               <!--   <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>-->
                </div>
                <!-- Card Body -->
                <div class="card-body">
																	<div class="row text-center">
																		<div class="col-sm-4 col-4">
																			<h4 class="margin-0"><?php echo $data_member['incomefor7'];?> <i class="fas fa-chart-line"></i></h4>
																			<p class="text-muted"> Last 10 Days Income</p>
																		</div>
																		<div class="col-sm-4 col-4">
																			<h4 class="margin-0"><?php echo $data_member['incomefor30'];?> <i class="fas fa-chart-line"></i></h4>
																			<p class="text-muted">Last 30 Days Income</p>
																		</div>
																		<div class="col-sm-4 col-4">
																			<h4 class="margin-0"><?php echo $data_member['incomefor365'];?> <i class="fas fa-chart-line"></i></h4>
																			<p class="text-muted">Last 365 Days Income</p>
																		</div>

																	</div>
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Account Summary</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
																	<table class="table table-striped m-b-0">
																		<tbody>
																		<tr>
																			<td>SPONCER ID</td>
																			<td class="font-medium"><?php echo $data_member['sponcer_id'];?></td>
																		</tr>
																		<tr>
																			<td>JOINING DATE</td>
																			<td class="font-medium"><?php echo date_dmy_small($data_member['joining_date']);?></td>
																		</tr>
																		<tr>
																			<td>JOINING AMOUNT</td>
																			<td class="font-medium"><?php echo $data_member['joining_amt'];?></td>
																		</tr>
																		<tr>
																			<td>LEFT MEMBERS</td>
																			<td class="font-medium"><?php echo $data_member['left_members'];?></td>
																		</tr>
																		<tr>
																			<td>LEFT PV</td>
																			<td class="font-medium"><?php echo $data_member['left_pv'];?></td>
																		</tr>
																		<tr>
																			<td>RIGHT MEMBERS</td>
																			<td class="font-medium"><?php echo $data_member['right_members'];?></td>
																		</tr>
																		<tr>
																			<td>RIGHT PV</td>
																			<td class="font-medium"><?php echo $data_member['right_pv'];?></td>
																		</tr>

																		<tr>
																			<td>TOTAL INCOME</td>
																			<td class="font-medium"><?php echo $data_member['total_income'];?></td>
																		</tr>
																	<!--	<tr>
																			<td>DESIGNATION</td>
																			<td class="font-medium"><?php /*echo $data_member['designation'];*/?></td>
																		</tr>-->


																		</tbody>
																	</table>


                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4 col-sm-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
																			Members Profiles
																		<small>Members Preformance /Designation Status</small>
																		</h6>
                </div>
                <div class="card-body">
																	<div class="table-responsive">
																		<table class="table table-bordered table-hover" id="dataTablemin1" width="100%" cellspacing="0">

																			<thead>
																			<tr>
																				<th >MEMBER</th>
																				<th>DESIGNATION</th>


																			</tr>
																			</thead>
																			<tbody>
																			<?php
																			$allmem=$data_member['left_members_data_ver'].$data_member['right_members_data_ver'] ;
																			$arar_fullmem=explode('~',$allmem);
																			rsort($arar_fullmem);
																			$count=sizeof($arar_fullmem);
																			$jcount=0;

																			for($i=0;$i<$count;$i++)
																			{
																				$qry_deg=mysqli_query($DB_LINK1,"select * from salary  where uid='".$arar_fullmem[$i]."' order by id desc ");
																				if(mysqli_num_rows($qry_deg)>0)
																				{
																					$data_deg=mysqli_fetch_array($qry_deg);
																					$qry_user= mysqli_query($DB_LINK1,"SELECT id,pic,member,mobile,sponsor_id,joining_date,pv,status FROM registration WHERE id='".$arar_fullmem[$i]."' ");
																					$data_user=mysqli_fetch_array($qry_user);
																					$jcount++;
																					if($jcount>19)$count=0;
																					?>
																					<tr>
																						<td>[<?php echo $data_user['id'];?>] <small><a href="javascript:void(0);"><?php echo ucfirst(strtolower($data_user['member']));?></a></small></td>

																						<td><?php echo getdesignation_bylevel($data_deg['level']);?></td>





																					</tr>
																				<?php }  } ?>
																			</tbody>
																		</table>
																	</div>
                </div>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-6 mb-4 col-sm-12">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Binary Income
																			<small>Top 20 Binary Records</small>
																		</h6>
                </div>
                <div class="card-body">
																	<div class="table-responsive">
																		<table class="table table-bordered" id="dataTablemin2" width="100%" cellspacing="0">
																			<thead>
																			<tr>


																				<th># </th>
																				<th>DATE    </th>
																				<th title="Point matched">P. M.   </th>
																			<!--	<th>LPV </th>
																				<th> RPV </th>-->
																				<th> INCOME  </th>
																				<th>STATUS</th>



																			</tr>
																			</thead>
																			<tbody>
																			<?php
																			$i=1;
																			$sql_bin="SELECT * FROM `binary1` where member='".$_SESSION['a_id']."'  order by dt desc limit 0,20 ";
																			$qry_bin=mysqli_query($DB_LINK1,$sql_bin);
																			foreach ($qry_bin as $data_bin)
																			{

																				?>
																				<tr>
																					<td><?php echo $i;?></td>
																					<td><?php echo date_dmy_small($data_bin['dt']);?></td>
																					<td><?php echo $data_bin['pm'];?></td>
																			<!--		<td><?php /*echo $data_bin['lpv'];*/?></td>
																					<td><?php /*echo $data_bin['rpv'];*/?></td>-->
																					<td><?php echo $data_bin['income'];?></td>
																					<?php if($data_bin['stat']==2){?>
																						<td class="bg-gradient-success text-white">Approve</td><?php
																					} else { ?>
																						<td class="bg-gradient-danger text-white">Pending</td>
																					<?php } ?>

																				</tr>
																			<?php $i++;} ?>


																			</tbody>
																		</table>
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
		<script src="core/vendor/chart.js/Chart.min.js"></script>

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
		<script src="core/js/demo/datatables-demo.js"></script>

</body>

</html>
