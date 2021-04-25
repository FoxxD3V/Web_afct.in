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

  <title>Right Team Members | <?php echo $SITE_NAME;?></title>
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
								<h1 class="h3 mb-2 text-gray-800">Right Team Members</h1>
								<p class="mb-4">All  right team members list with basic info </p>

								<!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Right Team Members Data</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTableFullPage" width="100%" cellspacing="0">
												<thead>
												<tr>
													<th >#</th>
													<th>MEMBER INFO  </th>
													<!-- <th>DESIGNATION</th>-->
													<th>MOBILE  </th>
													<th>J.DATE  </th>
													<th>INTRO_ID  </th>
													<th>PV     </th>
													<th>Status</th>
												</tr>
												</thead>
												<tfoot>
												<tr>
													<th >#</th>
													<th>MEMBER INFO  </th>
													<!--<th>DESIGNATION</th>-->
													<th>MOBILE  </th>
													<th>J.DATE  </th>
													<th>INTRO_ID  </th>
													<th>PV     </th>
													<th>Status</th>
												</tr>
												</tfoot>
												<tbody>
												<?php
												 $allmem=$data_member['right_members_data'] ;
												$arar_fullmem=explode('~',$allmem);
												rsort($arar_fullmem);
												$count=sizeof($arar_fullmem);
												$jcount=0;

												for($i=0;$i<$count;$i++)
												{
													if($arar_fullmem[$i]!='')
													{
														$jcount++;

														$qry_user= mysqli_query($DB_LINK1,"SELECT id,pic,member,mobile,sponsor_id,joining_date,pv,status FROM registration WHERE id='".$arar_fullmem[$i]."' ");
														$data_user=mysqli_fetch_array($qry_user);

														?>
														<tr>
															<td><?php echo $jcount;?></td>
															<td><?php echo $data_user['id'];?> <small><a href="javascript:void(0);"><?php echo ucfirst(strtolower($data_user['member']));?></a></small></td>
															<!-- <td><?php /*echo getdesignation_bylevel($data_deg['level']);*/?></td>
                                         --><td><?php echo $data_user['mobile'];?></td>
															<td><?php echo date_dmy_small($data_user['joining_date']);?></td>
															<td><?php echo $data_user['sponsor_id'];?></td>
															<td><?php echo $data_user['pv'];?></td>
															<?php if($data_user['status']==2){?>
																<td class="bg-gradient-success text-white">Active</td><?php
															} else { ?>
																<td class="bg-gradient-danger text-white">Pending</td>
															<?php } ?>


														</tr>
													<?php }  } ?>


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
		<script src="core/js/demo/datatables-demo.js"></script>

</body>

</html>
