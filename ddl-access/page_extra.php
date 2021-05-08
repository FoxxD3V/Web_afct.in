<?php
require_once("../con_base/functions.inc.php");

								$page_title=show_title('150');
								$page_content=show_content('150');
								?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $page_title;?>	| <?php echo $SITE_NAME;?></title>
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
								<h1 class="h3 mb-2 text-gray-800"><?php echo $page_title;?></h1>
								<!--<p class="mb-4">Registration Successfully completed</p>-->





								<!-- Collapsable Card Example -->
								<div class="card shadow mb-4">
									<!-- Card Header - Accordion -->
									<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
										<h6 class="m-0 font-weight-bold text-primary"><?php echo $page_title;?> </h6>
									</a>
									<!-- Card Content - Collapse -->
									<div class="collapse show" id="collapseCardExample">
										<div class="card-body">
											<?php echo $page_content;?>
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


</body>

</html>
