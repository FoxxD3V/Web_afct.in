<?php
require_once("../con_base/functions.inc.php");

  if(isset($_POST['sent_message']))
 {
		$sql_count10 = "select * from tbl_mailbox where on_date='".date("Y-m-d")."'  ";
		$result_count10=mysqli_query($DB_LINK1,$sql_count10);
		if(mysqli_num_rows($result_count10)<=10)	{
			$sql = "select * from tbl_mailbox where on_date='" . date("Y-m-d") . "' and uid='" . $_SESSION['a_mid'] . "'   ";
			$result = mysqli_query($DB_LINK1, $sql);
			if (mysqli_num_rows($result) < 1) {
				if ($_POST['message'] != '') {
					if (mysqli_query($DB_LINK1, "  INSERT INTO `tbl_mailbox` set  
  			uid='" . $_SESSION['a_mid'] . "' ,
				 msg='" . strtoupper(trim($_POST['message'])) . "',
				 on_date='" . date("Y-m-d") . "'")) {
						//$_SESSION['suc_msg']="Password Updated Succesfully";
						$_SESSION['msg'] = array('success', 'Support message created successufully');
						header("Location: support_list_pending.php");
						exit;
					} else {
						$_SESSION['msg'] = array('error', 'Sorry Kindly Retry !!!');
						header("Location: support_create.php");
						exit;
					}
				} else {
					$_SESSION['msg'] = array('error', 'Sorry Kindly Enter Message.');
					header("Location: support_create.php");
					exit;
				}
			}	else {
				$_SESSION['msg'] = array('error', 'Sorry you are already sent support message today kindly retry next day.');
				header("Location: support_create.php");
				exit;
			}
		}
		else {
			$_SESSION['msg'] = array('error', 'Sorry today message request limit is full kindly try after 24 hrs');
			header("Location: support_create.php");
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

  <title>Create Support Message | <?php echo $SITE_NAME;?></title>
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
								<h1 class="h3 mb-2 text-gray-800">Support Message</h1>
								<p class="mb-4">Create Your Support Message to Admin</p>


								<form id="form_validation" method="POST" action="">


									<!-- Select -->

									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> Support Message  </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">

															<div class="form-group">

																<div class="input-group mb-3">
																	<div class="input-group-append">
																		<span class="input-group-text  " id="basic-addon2">	<i class="fas fa-envelope-open-text"   ></i></span>
																	</div>
																																<textarea name="message" rows="5"  required  id="message"  maxlength="1000" placeholder="Enter your message" class="form-control  text-uppercase"></textarea>


																</div>
															</div>


															<div class="form-group">

													 <button type="submit" name="sent_message" required class="btn btn-success bg-gradient-success right"  >Send Message</button>


															<!--	This service is under processing .....-->



															</div>


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
