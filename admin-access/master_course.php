<?php
require_once("../con_base/functions.inc.php");
// Table creation /////

$qry_table_creation = "
CREATE TABLE IF NOT EXISTS `tbl_master_course` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) DEFAULT NULL,
  `c_sort_name` varchar(50) DEFAULT NULL,
  `c_code` varchar(10) NOT NULL,
  `c_typ` varchar(50) NOT NULL,
  `c_dur` varchar(2) NOT NULL DEFAULT '0',
  `c_dur_typ` enum('M','Y') NOT NULL DEFAULT 'M',
  `eligi` varchar(100) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `c_fee` varchar(10) NOT NULL DEFAULT '0',
  `sdl_ref_inc` varchar(10) NOT NULL DEFAULT '0',
  `ddl_ref_inc` varchar(10) NOT NULL DEFAULT '0',
  `fl_ref_inc` varchar(10) NOT NULL DEFAULT '0',
  `tl_ref_inc` varchar(10) NOT NULL DEFAULT '0',
  `sl_ref_inc` varchar(10) NOT NULL DEFAULT '0',
  `team_inc` varchar(10) NOT NULL DEFAULT '0',
  `ipaddress` varchar(18) DEFAULT NULL,
  `auto_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('0','1','','') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `c_code` (`c_code`)
)";
mysqli_query($DB_LINK, $qry_table_creation) or die(mysqli_error());
// Table creation /////

if (isset($_GET['del'])) {
  mysqli_query($DB_LINK, "delete from tbl_master_course where id=" . $_GET['del']) or die(mysqli_error());
  $_SESSION['msg'] = array('success', 'Deleted Successfully');
  header("location:master_course.php");
  exit;
}

if (isset($_REQUEST['ban'])) {
  mysqli_query($DB_LINK, "update tbl_master_course set status='0' where id=" . $_GET['ban']) or die(mysqli_error());
  $_SESSION['msg'] = array('success', 'Banned Successfully');
  header("location:master_course.php");
  exit;
}
if (isset($_REQUEST['unban'])) {
  mysqli_query($DB_LINK, "update tbl_master_course set status='1' where id='" . $_GET['unban'] . "'   ") or die(mysqli_error());
  $_SESSION['msg'] = array('success', 'Unbanned Successfully');
  header("location:master_course.php");
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

  <title>Course | <?php echo $SITE_NAME; ?></title>
  <?php include("include/top.php"); ?>
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
  <?php include("include/sidebar.php"); ?>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <?php include("include/header.php"); ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-1">
          <h1 class="h3 mb-2 text-gray-800">Course</h1>

          <a href="master_course_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
             class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <!-- Page Heading -->

        <p class="mb-4">Course list with basic info </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Course</h6>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableFullPage" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>#</th>
                  <th>CODE</th>
                  <th>INFO</th>
                  <th>ONLINE COURSE + CERTIFICATE FEE</th>
                  <th>CERTIFICATE FEE</th>
                  <th>DURATION</th>

                  <th>ACTION</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>CODE</th>
                  <th>INFO</th>
                  <th>ONLINE COURSE + CERTIFICATE FEE</th>
                  <th>CERTIFICATE FEE</th>
                  <th>DURATION</th>


                  <th>ACTION</th>
                </tr>
                </tfoot>
                <tbody>
                <?php
                $jcount = 0;
                $qry_user = mysqli_query($DB_LINK, "SELECT * FROM tbl_master_course order by id desc ");
                foreach ($qry_user as $data_user) {
                  $jcount++;
                  ?>
                  <tr>
                    <td><?php echo $jcount; ?></td>
                    <td> <?php echo $data_user['c_sort_name']; ?> </td>
                    <td><?php echo $data_user['c_name']; ?><br>
                      <small>[<?php echo $data_user['c_code']; ?>] <?php echo $data_user['c_sort_name']; ?>
                      </small>
                      <br>Eligibility : <?php echo $data_user['eligi']; ?>
                    </td>
                    <td><?php echo $data_user['c_fee']; ?>/-</td>
                    <td><?php echo $data_user['o_c_fee']; ?>/-</td>
                    <td><?php echo $data_user['c_dur']; ?><?php echo course_dur_data($data_user['c_dur_typ']); ?></td>

                    <td>
                      <a href="javascript:void(0);" title="<?php echo $data_user['detail']; ?> "><i style="color:green "
                                                                                                    class="fa fa-info-circle fa-lg"> </i></a>

                      <a href="master_course_add.php?edit=<?php echo $data_user['id']; ?>"><i style="color:blue "
                                                                                              class="fa fa-edit fa-lg"></i></a> <?php if ($data_user['status'] == 1) { ?>
                        &nbsp;<a href="master_course.php?ban=<?php echo $data_user['id']; ?> "><i
                           class="fa fa-check fa-lg" style="color:green" title="Ban"></i> </a>
                      <?php } else { ?>
                        &nbsp;<a href="master_course.php?unban=<?php echo $data_user['id']; ?> "><i
                           class="fa fa-ban fa-lg" style="color:red" title="Unban"></i> </a>
                      <?php } ?>
                      <a href="javascript:void(0)"
                         onClick="return del(<?php echo $data_user['id']; ?>,'master_course.php')"> <i
                         class=" fa-lg fa fa-trash  " style="color:red" title="Delete"></i> </a>

                    </td>

                  </tr>
                <?php } ?>

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
    <?php include("include/footer.php"); ?>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include("include/last.php"); ?>

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
