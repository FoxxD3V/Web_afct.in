<?php
require_once("../con_base/functions.inc.php");
/*if(isset($_GET['del']))
{
    mysqli_query($DB_LINK,"delete from tbl_team_city where id=".$_GET['del']) or die(mysqli_error());
    $_SESSION['msg']=array('success', 'Deleted Successfully');
    header("location:team_city.php");
    exit;
}

if(isset($_REQUEST['ban']))
{
    mysqli_query($DB_LINK,"update tbl_team_city set status=0 where id=".$_GET['ban']) or die(mysqli_error());
    $_SESSION['msg']=array('success', 'Banned Successfully');
    header("location:team_city.php");
    exit;
}
if(isset($_REQUEST['unban']))
{
    mysqli_query($DB_LINK,"update tbl_team_city set status=1 where id='".$_GET['unban']."'   ") or die(mysqli_error());
    $_SESSION['msg']=array('success', 'Unbanned Successfully');
    header("location:team_city.php");
    exit;
}*/

$sql_data = " select * from  tbl_team_fren where user='".$_SESSION[ 'a_userid' ]."'  ";
$data_qry = mysqli_query( $DB_LINK, $sql_data );
$data_res = mysqli_fetch_array( $data_qry );
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>View Bank Details | <?php echo $SITE_NAME;?></title>
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

                                <div class="d-sm-flex align-items-center justify-content-between mb-1">
                                    <h1 class="h3 mb-2 text-gray-800">Bank Details</h1>

                              <!--      <a href="team_city_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                              -->  </div>
								<!-- Page Heading -->

								<p class="mb-4">View Bank Details </p>


                                <!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Bank Details</h6>




                                            <div class="card-body text-primary">


                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Beneficiary / Account name in your passbook :
                                                </label>
                                                <label class="col-sm-8 col-form-label">
                                                  <?php echo $data_res['benf_name'];?>
                                                </label>

                                              </div>
                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Account No. :
                                                </label>
                                                <label class="col-sm-8 col-form-label"> <?php echo $data_res['acc'];?>
                                                </label>
                                              </div>
                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Bank Name  :
                                                </label>
                                                <label class="col-sm-8 col-form-label"> <?php echo $data_res['bank'];?>
                                                </label>
                                              </div>




                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Account Type :
                                                </label>
                                                <label class="col-sm-8 col-form-label"> <?php echo ($data_res['actype']);?>
                                                </label>
                                              </div>

                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  IFSC Code. :
                                                </label>
                                                <label class="col-sm-8 col-form-label">  <?php echo $data_res['ifsc'];?>
                                                </label>
                                              </div>

                                              <div class="form-group row">
                                                <label  class="col-sm-4 col-form-label">
                                                  Bank Branch :
                                                </label>
                                                <label class="col-sm-8 col-form-label"> <?php echo $data_res['branch'];?>
                                                </label>
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
		<script src="../core/js/demo/datatables-demo.js"></script>

</body>

</html>
