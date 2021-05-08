<?php
require_once("../con_base/functions.inc.php");


if(isset($_POST['upd_pass']))
{
	$sql = "select * from registration where user='".$_SESSION[ 'a_mid' ]."'  ";
	$result=mysqli_query($DB_LINK1,$sql);
	$line=mysqli_fetch_array($result);
	if($line['password']==trim($_POST['opass']))
	{
			if(mysqli_query($DB_LINK1," update registration set password='".(trim($_POST['cpass']))."' where user='".$_SESSION[ 'a_mid' ]."'   and password='".(trim($_POST['opass']))."'"))
			{
			//$_SESSION['suc_msg']="Password Updated Succesfully";
			$_SESSION['msg']=array('success', 'Password Updated Succesfully');
			header("Location: setting_changepassword.php");
			exit;
		}
		else
		{
			//$_SESSION['err_msg']="Something went wrong !!!";
			$_SESSION['msg']=array('error', 'Something went wrong !!!');
			header("Location: setting_changepassword.php");
			exit;
		}
	}
	else
	{
		//$_SESSION['err_msg']="Old Password Not correct !!!";
		$_SESSION['msg']=array('error', 'Old Password Not correct !!!');
		header("Location: setting_changepassword.php");
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

  <title>Update Profile Image	| <?php echo $SITE_NAME;?></title>
	<?php include("include/top.php");?>
	<link href="core/uploadcrop-image/croppie.css" rel="stylesheet">


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
								<h1 class="h3 mb-2 text-gray-800">Update Profile Image</h1>
								<p class="mb-4">Update your Profile Image</p>


								<form id="form_validation" method="POST" action="">


									<!-- Select -->

									<div class="row clearfix">
										<div class="col-lg-8 col-md-8 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> Select and update your profile image </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">

															<div class="form-group">

																<input type="file" class=" form-control" name="upload_image" id="upload_image" />

															</div>

															<?php if($data_member['user_image']!='') { if($data_member['user_image_flag']=='0') {?>
															<div class="alert alert-warning " role="alert">
																Image approval pending from admin
															</div>
															<?php } else if($data_member['user_image_flag']=='2') {?>
																<div class="alert alert-danger " role="alert">
																	Image rejected from admin update another image
																</div>
															<?php } else { ?>
															<div class="alert alert-success" role="alert">
																Image approved by admin now this image show in tree view and other associates
															</div>
															<?php   } } ?>





														</div>


													</div>

												</div>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> Your uploaded image preview </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">


															<div id="uploaded_image" class="col-sm-12 text-center">
																<?php if($data_member['user_image']!='') {?>
																<img src="../upload/user_image/<?php echo $data_member['user_image'];?>" class="img-fluid rounded-circle"/>

															<?php   } ?>
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
		<script src="core/uploadcrop-image/croppie.js"></script>

		<div id="uploadimageModal" class="modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">

						<h4 class="modal-title">Upload & Crop Image</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 text-center">
								<div id="image_demo" style="width:100%;  "></div>
							</div>
							<div class="col-md-12 text-center" >

								<button id="btn_start" class="btn btn-success crop_image">Crop & Upload Image</button>
								<span id="btn_process" style="display: none;"><h5> <i   class="fas fa-spinner text-primary faa-spin animated  " style="font-size: 28px;"></i> Processing.......</h5></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<script>
			$(document).ready(function(){

				$image_crop = $('#image_demo').croppie({
					enableExif: true,
					viewport: {
						width:200,
						height:200,
						type:'square' //circle
					},
					boundary:{
						width:300,
						height:300
					}
				});

				$('#upload_image').on('change', function(){
					var reader = new FileReader();
					reader.onload = function (event) {
						$image_crop.croppie('bind', {
							url: event.target.result
						}).then(function(){
							console.log('jQuery bind complete');
						});
					}
					reader.readAsDataURL(this.files[0]);
					$('#uploadimageModal').modal('show');
				});

				$('.crop_image').click(function(event){
					$image_crop.croppie('result', {
						type: 'canvas',
						size: 'viewport'
					}).then(function(response){
						$.ajax({
							url:"get_img_upload.php",
							type: "POST",
							data:{"image": response},
							beforeSend: function() {
								// setting a timeout
								$('#btn_start').hide();
								$('#btn_process').show();

							},
							success:function(data)
							{
								$('#uploadimageModal').modal('hide');
								$('#uploaded_image').html(data);
								$('#btn_start').show();
								$('#btn_process').hide();

							swal({
								title: "Image updated successfully",
								//text: "You clicked the button!",
								type: "success"
							});


							}
						});
					})
				});

			});
		</script>
</body>

</html>
