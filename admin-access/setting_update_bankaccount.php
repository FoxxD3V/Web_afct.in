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

  <title>View Bank Account info	| <?php echo $SITE_NAME;?></title>
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
								<h1 class="h3 mb-2 text-gray-800"> Bank Account	Info</h1>
								<p class="mb-4">View your Bank Account	 </p>


								<form id="form_validation" method="POST" action="">


									<!-- Select -->

									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> View your Bank Info </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">





															<div class="form-group">

																<div class="input-group mb-3">

																	<input type="text" value="<?php echo $data_foruser['account_holder'];?>" class="form-control  text-uppercase" required  placeholder="Account holder name" name="account_holder"   id="account_holder"   aria-label="Recipient's username" aria-describedby="basic-addon2"  >

																</div>
															</div>
															<div class="form-group">

																<div class="input-group mb-3">

																	<input type="number" class="form-control  text-uppercase" required value="<?php echo $data_foruser['account_number'];?>" name="account_number" placeholder="Account number"    id="account_number"   aria-label="Recipient's username" aria-describedby="basic-addon2" >

																</div>
															</div>
															<div class="form-group">

																<div class="input-group mb-3">

																	<input type="text" class="form-control  text-uppercase" placeholder="Ifsc Code"  value="<?php echo $data_foruser['ifsc_code'];?>"  name="ifsc_code"    id="ifsc_code"    aria-label="Recipient's username" aria-describedby="basic-addon2"  >

																</div>
															</div>
															<div class="form-group">

																<div class="input-group mb-3">

																	<input type="text" class="form-control  text-uppercase" placeholder="Bank Name"   name="bank_name"   value="<?php echo $data_foruser['bank_name'];?>"  id="bank_name"    aria-label="Recipient's username" aria-describedby="basic-addon2"  >

																</div>
															</div>

															<div class="form-group">

																<div class="input-group mb-3">

																	<input type="text" class="form-control  text-uppercase" placeholder="Bank Branch Name"  value="<?php echo $data_foruser['branch'];?>"  name="branch"    id="branch"    aria-label="Recipient's username" aria-describedby="basic-addon2"  >

																</div>
															</div>

													<!--		<div class="form-group">

																<button type="submit" name="upd_pass" required class="btn btn-success bg-gradient-success right" onClick="return Validate()">Update Password</button>
															</div>
-->




														</div>


													</div>

												</div>
											</div>
										</div>

									</div>
									<!-- #END# Select -->




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


</body>

</html>
