<?php
require_once("../con_base/functions.inc.php");


if(isset($_GET['del']))
{
  mysqli_query($DB_LINK,"delete from city where city_id=".$_GET['del']) or die(mysqli_error());
  $_SESSION['msg']=array('success', 'Deleted Successfully');
  header("location:master_city.php");
  exit;
}
if(isset($_REQUEST['ban']))
{
    mysqli_query($DB_LINK,"update city set status='0' where city_id=".$_GET['ban']) or die(mysqli_error());
    $_SESSION['msg']=array('success', 'Banned Successfully');
    header("location:master_city.php");
    exit;
}
if(isset($_REQUEST['unban']))
{
    mysqli_query($DB_LINK,"update city set status='1' where city_id='".$_GET['unban']."'   ") or die(mysqli_error());
    $_SESSION['msg']=array('success', 'Unbanned Successfully');
    header("location:master_city.php");
    exit;
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

  <title>City Master | <?php echo $SITE_NAME;?></title>
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
                                    <h1 class="h3 mb-2 text-gray-800">City Master</h1>

                                   <a href="master_city_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                                </div>
								<!-- Page Heading -->

								<p class="mb-4">City Master list with basic info </p>


                                <!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">City Master</h6>

                                    </div>
                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTableFullPage" width="100%" cellspacing="0">
												<thead>
												<tr>

                                                    <th >#</th>
                                                    <th>Name</th>
                                                    <th>State Name</th>

                                                    <th>ACTION</th>
												</tr>
												</thead>
												<tfoot>
												<tr>
                                                    <th >#</th>
                                                    <th>Name</th>
                                                    <th>State Name</th>

                                                    <th>ACTION</th>
												</tr>
												</tfoot>
												<tbody>
												<?php
                                                $jcount=0;
                                                $qry_user= mysqli_query($DB_LINK,"SELECT * FROM city order by city asc ");
                                                foreach($qry_user as $data_user )
                                                {
                                                    $jcount++;
                                                ?>
														<tr>
															<td><?php echo $jcount;?></td>
															<td><?php echo $data_user['city'];?>  </td>
															<td><?php echo $data_user['state_name'];



                                                               

															?>  </td>


                                                            <td>
                                                                <a title="Edit"  href="master_city_add.php?edit=<?php   echo $data_user['city_id'];  ?>" ><i  style="color:blue " class="fa fa-edit fa-lg"></i></a>

                                                                <?php if($data_user['status']=='1'){?>
                                                                &nbsp;<a href="master_city.php?ban=<?php echo $data_user['city_id'];?> "  ><i class="fa fa-check fa-lg" style="color:green" title="Ban"></i>  </a>
                                                                <?php } else  { ?>
                                                                &nbsp;<a href="master_city.php?unban=<?php echo $data_user['city_id'];?> "  ><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i>  </a>
                                                                <?php }  ?>
                                                                <a title="Delete" href="javascript:void(0)"  onClick="return del(<?php echo $data_user['city_id'];?>,'master_city.php')"> <i class=" fa-lg fa fa-trash  "  style="color:red" title="Delete"></i>   </a>

                                                            </td>


														</tr>
												 <?php    $sql_reg="select * from  state where state_id= '".trim($data_user['state_id'])."'";
                                                  $edit_qry=mysqli_query($DB_LINK,$sql_reg);
                                                  $edit_data=mysqli_fetch_assoc($edit_qry);
                                                  if(strtoupper($edit_data['state'])!=$data_user['state_name']) {
                                                    $sql_upd = "update  city set state_name='" . strtoupper($edit_data['state']) . "' where city_id= '" . trim($data_user['city_id']) . "'";
                                                    mysqli_query($DB_LINK, $sql_upd);
                                                  } } ?>


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
		<script src="../core/js/demo/datatables-demo.js"></script>

</body>

</html>
