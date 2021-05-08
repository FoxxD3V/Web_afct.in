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

  <title>New Registration	| <?php echo $SITE_NAME;?></title>
	<?php include("include/top.php");?>
	<!-- Custom styles for this page -->
<!--	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet">
<style >

	.datepicker td, .datepicker th {
		width: 2.5rem;
		height: 2.5rem;
		font-size: 0.85rem;
	}

	.datepicker {
		margin-bottom: 3rem;
	}

</style>

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
								<h1 class="h3 mb-2 text-gray-800">New Registration	</h1>
								<p class="mb-4">New Registration	Form</p>


								<form id="form_validation" method="POST" action="new_registration_process.php">


									<!-- Select -->

									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary"> <strong> Account  Primary Information   </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">

															<div class="form-group">

																<div class="input-group mb-3">
																	<input type="text" class="form-control  text-uppercase"  name="sponsor_id" readonly  placeholder="Introducer ID *"  aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php if(isset($_GET['ref']))	echo $_GET['ref'];?>">
																	<div class="input-group-append">
																		<span class="input-group-text  text-uppercase" id="basic-addon2">Introducer Id</span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<input type="hidden"  name="placement" value="<?php if(isset($_GET['place']))	echo $_GET['place'];?>">
																<input type="text" value="Placement <?php if(isset($_GET['place']))	echo $_GET['place'];?>" class="form-control  text-uppercase"  name="placement_view" readonly >
															</div>
															<div class="form-group">
															<select class="form-control text-uppercase" name="country"  required>
																<option value="">-- Please select country --</option>
																<option value="India">India</option>
																<option value="UAE">UAE</option>
																<option value="Others">Others</option>
															</select>
															</div>
															<div class="form-group">
															<select class="form-control  text-uppercase" name="package" required>
																<option value="">-- Please select Package --</option>
																<option value="Insurence">Insurence</option>
																<option value="Investment">Investment</option>
																<option value="Realestate">Realestate</option>
															</select>
															</div>

														</div>


													</div>

												</div>
											</div>
										</div>
									</div>
									<!-- #END# Select -->

									<!-- Select -->
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary">  Account  Basic Information  </strong> </h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">
															<div class="form-group">
																<input type="text" value="" class="form-control text-uppercase" placeholder="Director Name *" name="member" required >
															</div>
															<div class="form-group">
																<input type="text" value="" class="form-control text-uppercase" placeholder="Father name *" name="father_name" required >
															</div>
															<div class="form-group">
																<input type="text" value="" class="form-control text-uppercase" placeholder="Husband name " name="husband_name" required >
															</div>
															<div class="form-group  ">
															<select class="form-control  text-uppercase " name="gender" required>
																<option value="">-- Please select Gender --</option>
																<option value="Male">Male</option>
																<option value="Female">Female</option>
															</select>
															</div>
															<div class="form-group  ">
																<div class="input-group mb-3">
																	<div class="input-group-prepend">
																		<span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
																	</div>

																	<input readonly type="text" class="form-control datepicker text-uppercase "  name="dob" required placeholder="Please choose Date Of Birth  " aria-label="Username" aria-describedby="basic-addon1">


																</div>

																<div class="input-append date">

																 </span>
																</div>

															</div>





														</div>


													</div>

												</div>
											</div>
										</div>
									</div>
									<!-- #END# Select -->

									<!-- Select -->
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary">  Address Information   </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">
															<div class="form-group ">
																<input type="text" value="" class="form-control text-uppercase" placeholder="Enter Full Address *" name="address" required="" aria-required="true" aria-invalid="true"  >
															</div>
															<div class="form-group  ">
															<select class="form-control  text-uppercase" name="state_id" id="state_id" onChange="onchangeajax(this.value);" required>
																<option value="">--Select State--</option>
																<?php $sql=mysqli_query($DB_LINK1,"select * from state where status=1 order by state") or die(mysqli_error());
																foreach($sql as $state)
																{
																	?>
																	<option value="<?php echo $state['state_id'];?>" <?php /*if('34'==$state['state_id']) { echo 'selected';   }*/?>><?php echo $state['state'];?></option>
																<?php } ?>
															</select>
															</div>
															<div class="form-group  ">
															<div id="city_upd">
																<select name="city_id" id="city_id" class="form-control  text-uppercase" required>
																	<option value="">--Select City--</option>

																</select>
															</div>
															</div>


															<div class="form-group  mt-2">
																<input type="tel" minlength="6" maxlength="6" value="" class="form-control  text-uppercase" placeholder="PinCode *" name="pincode" required="" aria-required="true" aria-invalid="true"  >
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- #END# Select -->

									<!-- Select -->
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary">  Nominee Information   </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">
															<div class="form-group ">
																<input type="text"  value="" class="form-control text-uppercase" placeholder="Nominee name *" name="nname"  required   >
															</div>
															<div class="form-group">
																<input type="text" value="" class="form-control text-uppercase" placeholder="Relation with nominee * " name="nrel"  required   >
															</div>
															<div class="form-group  ">
																<input type="tel" type="tel" minlength="2" maxlength="2" class="form-control text-uppercase" placeholder="Nominee Age * " name="nage"    required >
															</div>






														</div>


													</div>

												</div>
											</div>
										</div>
									</div>
									<!-- #END# Select -->

									<!-- Select -->
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary">  Account Contact / Login Information   </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">
															<div class="form-group ">
																<input type="tel" minlength="10" maxlength="10" value="" class="form-control  text-uppercase" placeholder="Mobile No *" name="mobile" required="" aria-required="true" aria-invalid="true"  >
															</div>
															<div class="form-group">
																<input type="email" value="" class="form-control text-uppercase" placeholder="Email Id  " name="email"     >
															</div>
															<div class="form-group  ">
																<input type="text" value="" class="form-control  text-uppercase" placeholder="Password * " name="password"  maxlength="10" minlength="3" required >
															</div>






														</div>


													</div>

												</div>
											</div>
										</div>
									</div>
									<!-- #END# Select -->

									<!-- Select -->
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="card shadow mb-4">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary">  Account Legal Information   </strong></h6>


												</div>
												<div class="card-body">
													<div class="row clearfix">
														<div class="col-sm-12">

															<!--			<div class="form-group  ">
																			<input type="text" value="" class="form-control" placeholder="PAN Card No * " name="pan" id="pan" onblur="verify_pan()"    >
																			<span id="pan_data"></span>
																		</div>-->
															<div class="form-group">
																<div class="form-check">
																<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
																<label class="form-check-label text-uppercase" for="defaultCheck1">
																	I have read and accept the Terms and conditions,<br>
																	Admin has full authority to change the plan any time without any prior notice.<br>
																	Admin can eliminate any member without any prior notice.<br>
																	In case of any dispute case can be handled in jurisdiction.<br>
																	If any member wants to quit then money will not be refunded.<br>
																	I agree to the all GNF Global Pvt Ltd terms and conditions.
																</label>
																</div>

															</div>

															<button class="btn float-right btn-raised btn-primary btn-round waves-effect" type="submit" name="save">Register Now</button>





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

<!--		  Page level plugins -->
<!--		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>-->

		<!-- Page level custom scripts --
		<script src="core/js/demo/datatables-demo.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
		<script>
			function verify_pan() {
				var pan=$('#pan').val();
				$.ajax({
					type: "ajax",
					method: "post",
					url:"get_pan.php",
					data: {'pan':pan},
					dataType:'json',
					asycn:true,
					beforeSend: function () {
						$('#pan_data').html('Processing....');
					},
					success: function (response) {
						if(response.success)
						{
							$('#pan_data').html(response.message);
							$('#pan_data').css('color', "green");
						}
						else
						{
							$('#pan_data').html(response.message);
							$('#pan_data').css('color', "red");

						}
					}
				});
			}
			function onchangeajax(val) {

				$.ajax({
					type: "POST",
					url: "get_city.php",
					data: 'state_id=' + val,
					success: function(data) {

						$("#city_upd").html(data);
					}
				});
			}

			// INITIALIZE DATEPICKER PLUGIN
			$(function () {
				// INITIALIZE DATEPICKER PLUGIN
				$('.datepicker').datepicker({
					clearBtn: true,
					format: "yyyy-mm-dd",
					value: '01/01/2018'
				});
			});
		</script>
</body>

</html>
