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

  <title>Alerts	| <?php echo $SITE_NAME;?></title>
	<?php include("include/top.php");?>

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
								<h1 class="h3 mb-2 text-gray-800">Alerts</h1>
							 <p class="mb-4">View all notice and alerts given by Administrator</p>

								<?php
								$sql_notice = " select * from tbl_notice  order by id desc  ";
								$qry_notice = mysqli_query( $DB_LINK, $sql_notice );
								foreach($qry_notice as $data_notice) { ?>

									<?php if( $data_notice['ondate']==date('Y-m-d'))
										{ ?>
											<!-- Collapsable Card Example Open -->
											<div class="card shadow mb-4">
												<!-- Card Header - Accordion -->
												<a href="#collapseCardExample<?php echo  $data_notice['id'] ;?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
													<h6 class="m-0 font-weight-bold text-primary"><i class="fas text-success fa-spin fa-star"></i> <?php echo date_dm($data_notice['ondate']);?></h6>
												</a>
												<!-- Card Content - Collapse -->
												<div class="collapse show" id="collapseCardExample<?php echo  $data_notice['id'] ;?>">
													<div class="card-body">
														<?php echo  ($data_notice['notice_text']);?>
													</div>
												</div>
											</div>
										<?php } else { ?>
									<!-- Collapsable Card Example Close-->
									<div class="card shadow mb-4">
										<!-- Card Header - Accordion -->
										<a href="#collapseCardExample<?php echo  $data_notice['id'] ;?>" class="d-block card-header py-3 collapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
											<h6 class="m-0 font-weight-bold text-primary"><?php echo date_dm($data_notice['ondate']);?></h6>
										</a>
										<!-- Card Content - Collapse -->
										<div class="collapse  " id="collapseCardExample<?php echo  $data_notice['id'] ;?>">
											<div class="card-body">
												<?php echo  ($data_notice['notice_text']);?>
											</div>
										</div>
									</div>



								<?php } } ?>






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
