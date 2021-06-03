<?php
require_once("../con_base/functions.inc.php");


if(isset($_POST['upd_pass']))
{
	$sql = "select * from tbl_team_fact where user='".$_SESSION[ 'a_userid' ]."'  ";
	$result=mysqli_query($DB_LINK,$sql);
	$line=mysqli_fetch_array($result);
	if($line['pass']==enc(trim($_POST['opass'])))
	{
		if(mysqli_query($DB_LINK," update tbl_team_fact set pass='".enc(trim($_POST['cpass']))."' where user='".$_SESSION[ 'a_userid' ]."'   and pass='".enc(trim($_POST['opass']))."'"))
		{
			//$_SESSION['suc_msg']="Password Updated Succesfully";
			$_SESSION['msg']=array('success', 'Password Updated Succesfully');
			header("Location: user_change_password.php");
			exit;
		}
		else
		{
			//$_SESSION['err_msg']="Something went wrong !!!";
			$_SESSION['msg']=array('error', 'Something went wrong !!!');
			header("Location: user_change_password.php");
			exit;
		}
	}
	else
	{
		//$_SESSION['err_msg']="Old Password Not correct !!!";
		$_SESSION['msg']=array('error', 'Old Password Not correct !!!');
		header("Location: user_change_password.php");
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

  <title>Update Password	| <?php echo $SITE_NAME;?></title>
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
								<h1 class="h3 mb-2 text-gray-800">Update Password	</h1>
								<p class="mb-4">Update your Login Password</p>


								<form id="form_validation" method="POST" action="">


									<!-- Select -->

									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> Update Password  </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">

															<div class="form-group">

																<div class="input-group mb-3">
																	<div class="input-group-append">
																		<span class="input-group-text  " id="basic-addon2">	<i class="fas fa-key"   ></i></span>
																	</div>
																	<input type="password" class="form-control  " required  placeholder="Old password" name="opass"   id="opass"   aria-label="Recipient's username" aria-describedby="basic-addon2"  >

																</div>
															</div>
															<div class="form-group">

																<div class="input-group mb-3">
																	<div class="input-group-append">
																		<span class="input-group-text  " id="basic-addon2">	<i class="fas fa-key"   ></i></span>
																	</div>
																	<input type="text" class="form-control  " required  name="npass" placeholder="New password"    id="npass"   aria-label="Recipient's username" aria-describedby="basic-addon2" >

																</div>
															</div>
															<div class="form-group">

																<div class="input-group mb-3">
																	<div class="input-group-append">
																		<span class="input-group-text  " id="basic-addon2">	<i class="fas fa-key"   ></i></span>
																	</div>
																	<input type="password" class="form-control  " placeholder="Confirm password"   name="cpass"    id="cpass"    aria-label="Recipient's username" aria-describedby="basic-addon2"  >

																</div>
															</div>

															<div class="form-group">

													 <button type="submit" name="upd_pass" required class="btn btn-success bg-gradient-success right" onClick="return Validate()">Update Password</button>
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

		<script type="text/javascript">
			function Validate() {

				var npass = document.getElementById("npass").value;
				var cpass= document.getElementById("cpass").value;
				if (npass != cpass) {
					alert("Passwords do not match.");
					return false;
				}
				return true;
			}
		</script>
</body>

</html>
