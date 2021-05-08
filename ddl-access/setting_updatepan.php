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

  <title>Update PAN Card	| <?php echo $SITE_NAME;?></title>
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
								<h1 class="h3 mb-2 text-gray-800">Update PAN Card</h1>
								<p class="mb-4">Update your Pan Card </p>


								<form id="form_validation" method="POST" action="">


									<!-- Select -->

									<div class="row clearfix">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> Select and update your PAN image </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">



															<?php   if($data_foruser['is_kyc']=='0') { ?>
																<div class="form-group">

																	<input type="file" class=" form-control" name="upload_image" id="upload_image" />

																</div>
															<div class="alert alert-danger " role="alert">
																KYC approval pending from admin
															</div>
															<?php  } else {  ?>
															<div class="alert alert-success" role="alert">
																KYC approved by admin
															</div>
																<?php if($data_member['kyc_approve_date']!=null) { ?>
																	<div class="form-group">
																	 <label>KYC Approved On Date : <?php echo  date_dmy_small($data_member['kyc_approve_date']); ?> </label>
																</div>
																	<?php }
																if($data_member['kyc_approve_by']!=null) {
																	?>
																<div class="form-group">
																	<label>KYC Approved BY : <?php echo kyc_approveby_data($data_member['kyc_approve_by']); ?></label>
																</div>
													 <?php  } }   ?>





														</div>


													</div>

												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> Your uploaded PAN image preview </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">


															<div id="uploaded_image" class="col-sm-12 text-center">
																<?php if($data_foruser['pan_image']!='') {?>
																<img src="../upload/userpan/<?php echo $data_foruser['pan_image'];?>" class="img-fluid "/>

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
			<div class="modal-dialog  modal-lg">
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
						width:400,
						height:250,
						type:'square' //circle
					},
					boundary:{
						width:600,
						height:400
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
							url:"get_panimg_upload.php",
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
