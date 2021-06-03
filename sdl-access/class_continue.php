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

  <title>Continue / Live  Classs | <?php echo $SITE_NAME; ?></title>
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
          <h1 class="h3 mb-2 text-gray-800">Continue / Live  Classs</h1>

          <!--<a href="master_course_content_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
             class="fas fa-plus fa-sm text-white-50"></i> Add New</a>-->
        </div>
        <!-- Page Heading -->

        <p class="mb-4">Continue / Live  Classs list with basic info </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Continue / Live  Classs</h6>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableFullPage" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>#</th>
                  <th>COURSE</th>
                  <th>CLASS TIMING</th>
                  <th>TOPIC</th>
                  <th>POSTED BY</th>
                  <th>START VIDEO</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>COURSE</th>
                  <th>CLASS TIMING</th>
                  <th>TOPIC</th>
                  <th>POSTED BY</th>
                    <th>START VIDEO</th>


                </tr>

                </tfoot>
                <tbody>
                <?php
                $jcount = 0;
                $where="  where posted_by='".$_SESSION[ 'a_userid' ]."' and  posted_by_type ='".strtolower($_SESSION[ 'user_role' ])."' ";
                $where="  where status='1' and csd>='".date('Y-m-d')."' and cst>='".date('H:i:s')."' ";
                $where="  where status='1' and  ((state_id='0' or  posted_by='".$_SESSION[ 'a_userid' ]."')  or state_id='".$_SESSION[ 'a_state_id' ]."')";
                  $qry="SELECT * FROM tbl_master_course_content $where order by id desc ";
                $qry_user = mysqli_query($DB_LINK, $qry);
                foreach ($qry_user as $data_user) {
                      $curr_time=time();
                     $vid_time=strtotime($data_user['csd']." ".$data_user['cst']);
                   // echo "<br>";
                    if($curr_time>$vid_time)
                    {
                  $jcount++;
                  ?>
                  <tr>
                    <td><?php echo $jcount; ?></td>

                    <td><?php echo $data_user['c_name']; ?><br>
                      <small>[<?php echo $data_user['c_code']; ?>] <?php echo $data_user['c_sort_name']; ?>
                      </small>

                    </td>

                    <td><?php echo $data_user['csd']; ?> - <?php echo $data_user['cst']; ?> </td>
                    <td><?php echo $data_user['topic_name']; ?> </td>


                    <td><?php echo $data_user['posted_by']; ?><br>
                        <?php echo date_dmy_small($data_user['auto_date']); ?><br>
                        For : <?php echo ($data_user['state_name']); ?> </td>

                      <td>
                          <a target="_blank"
                             href="class_view.php?id=<?php echo enc($data_user['id']); ?>">View</a>
                      </td>


                  </tr>



                <?php } }  ?>

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
