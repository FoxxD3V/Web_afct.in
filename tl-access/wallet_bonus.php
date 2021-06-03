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

  <title>Credit Bonus Wallet List | <?php echo $SITE_NAME;?></title>
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
                                    <h1 class="h3 mb-2 text-gray-800">Credit Bonus Wallet List</h1>

                                    <a href="wallet_bonus_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                                </div>
								<!-- Page Heading -->

								<p class="mb-4">Credit Bonus Wallet List   </p>


                                <!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Credit Bonus Wallet List</h6>

                                    </div>
                                    <div class="card-body">
                                      <form id="form_validation" method="POST" action="" enctype="multipart/form-data">



										<div class="table-responsive">
											<table class="table table-bordered" id="dataTableFullPage" width="100%" cellspacing="0">
                <thead>
               <tr>
                 <th>Sr.No.</th>
                 <th>Account Type</th>
                 <th>Account Info</th>
                 <th>Date</th>
                 <th>Credit</th>
                 <th>Debit</th>
                 <th>Summary</th>
                 <th>Admin Note</th>



               </tr>
               </thead>
               <tbody>
               <form action="" method="post" name="cform">
                 <?php

                //$where="where `m_id`='".$_SESSION[ 'staff_login_id' ]."'";
                 $where="where `m_id`='".$_SESSION[ 'a_userid' ]."'  and m_id_typ='".$_SESSION[ 'user_role' ]."'";

                 $limit=" order by id desc limit 0,150 ";

                 $count=1;
                 $qry=mysqli_query($DB_LINK,"SELECT * from tbl_ledger_bonus  $where $limit");
                 $cr=0;
                 $dr=0;
                 foreach($qry as $row)
                 {
                   ?><tr class="<?php if($row['flag']=='1') { echo 'text-success';} else { echo 'text-danger' ; } ?>" >
                   <td ><?php echo $count;?></td>
                   <td><?php echo login_role_fullname($row['m_id_typ']);?></td>
                   <td><?php echo $row['m_id'];?> / <?php echo $row['m_name'];?></td>
                   <td><?php echo date_dm($row['on_date']);?></td>
                   <td><?php if($row['mode']=='CR'){ echo $row['amt']; $cr=$cr+$row['amt']; } else echo '--'; ?></td>
                   <td><?php if($row['mode']=='DR'){ echo $row['amt']; $dr=$dr+$row['amt']; }  else echo '--';?></td>
                   <td><?php echo $row['summary'];?></td>
                   <td><?php echo $row['admin_summ'];?></td>


                   </tr>
                   <?php  $count++;}
                 //update_member($_SESSION['staff_login_id'],$balance,'wallet_contact');
                 ?>
               </form>
               </tbody>


           </table>
										</div>
                                      </form>
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
