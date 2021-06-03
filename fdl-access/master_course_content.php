<?php
require_once("../con_base/functions.inc.php");

if (isset($_GET['del'])) {

  $sql_reg="select video from  tbl_master_course_content where id= '".trim($_GET['del'])."'";
  $edit_qry=mysqli_query($DB_LINK,$sql_reg);
  $edit_data=mysqli_fetch_assoc($edit_qry);
  $video = (trim($edit_data['video']));
  unlink("../upload/content/video/".$video);


  mysqli_query($DB_LINK, "delete from tbl_master_course_content where id=" . $_GET['del']) or die(mysqli_error());
  $_SESSION['msg'] = array('success', 'Deleted Successfully');
  header("location:master_course_content.php");
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

  <title>Course Content | <?php echo $SITE_NAME; ?></title>
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
          <h1 class="h3 mb-2 text-gray-800">Course Content</h1>

          <a href="master_course_content_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
             class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <!-- Page Heading -->

        <p class="mb-4">Course Content list with basic info </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Course Content</h6>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableFullPage" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>#</th>
                  <th>COURSE</th>
                  <th>SUMMARY</th>
                  <th>TIMING</th>
                  <th>TOPIC</th>
                  <th>VIDEO</th>
                  <th>POSTED BY</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>COURSE</th>
                  <th>SUMMARY</th>
                  <th>TIMING</th>
                  <th>TOPIC</th>
                  <th>VIDEO</th>
                  <th>POSTED BY</th>
                  <th>ACTION</th>
                </tr>
                </tr>
                </tfoot>
                <tbody>
                <?php
                $jcount = 0;
                $qry_user = mysqli_query($DB_LINK, "SELECT * FROM tbl_master_course_content 
                where posted_by='".$_SESSION[ 'a_userid' ]."' and  	
                posted_by_type ='".strtolower($_SESSION[ 'user_role' ])."'  order by id desc ");
                foreach ($qry_user as $data_user) {
                  $jcount++;
                  ?>
                  <tr>
                    <td><?php echo $jcount; ?></td>

                    <td><?php echo $data_user['c_name']; ?><br>
                      <small>[<?php echo $data_user['c_code']; ?>] <?php echo $data_user['c_sort_name']; ?>
                      </small>

                    </td>
                    <td>
                      <a target="_blank"
                         href="master_course_content_view.php?id=<?php echo $data_user['id']; ?>&view=summary">View</a>
                    </td>
                    <td><?php echo $data_user['csd']; ?> - <?php echo $data_user['cst']; ?></td>
                    <td><?php echo $data_user['topic_name']; ?> </td>
                    <td> 
                      <a target="_blank"
                         href="master_course_content_view.php?id=<?php echo $data_user['id']; ?>&view=video">View</a>
                    </td>

                    <td><?php echo $data_user['posted_by']; ?><br><?php echo date_dmy_small($data_user['auto_date']); ?> </td>


                    <td>
                      <a href="master_course_content_add.php?edit=<?php echo $data_user['id']; ?>"><i style="color:blue "
                                                                                              class="fa fa-edit fa-lg"></i></a>

                      <a href="javascript:void(0)"
                         onClick="return del(<?php echo $data_user['id']; ?>,'master_course_content.php')"> <i
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
