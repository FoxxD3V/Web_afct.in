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

  <title>My Profile	| <?php echo $SITE_NAME;?></title>
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

    .profile-nav, .profile-info{
      margin-top:30px;
    }

    .profile-nav .user-heading {
      background: #fbc02d;
      color: #fff;
      border-radius: 4px 4px 0 0;
      -webkit-border-radius: 4px 4px 0 0;
      padding: 30px;
      text-align: center;
    }

    .profile-nav .user-heading.round a  {
      border-radius: 50%;
      -webkit-border-radius: 50%;
      border: 10px solid rgba(255,255,255,0.3);
      display: inline-block;
    }

    .profile-nav .user-heading a img {
      width: 112px;
      height: 112px;
      border-radius: 50%;
      -webkit-border-radius: 50%;
    }

    .profile-nav .user-heading h1 {
      font-size: 22px;
      font-weight: 300;
      margin-bottom: 5px;
    }

    .profile-nav .user-heading p {
      font-size: 12px;
    }

    .profile-nav ul {
      margin-top: 1px;
    }

    .profile-nav ul > li {
      border-bottom: 1px solid #ebeae6;
      margin-top: 0;
      line-height: 30px;
    }

    .profile-nav ul > li:last-child {
      border-bottom: none;
    }

    .profile-nav ul > li > a {
      border-radius: 0;
      -webkit-border-radius: 0;
      color: #89817f;
      border-left: 5px solid #fff;
    }

    .profile-nav ul > li > a:hover, .profile-nav ul > li > a:focus, .profile-nav ul li.active  a {
      background: #f8f7f5 !important;
      border-left: 5px solid #fbc02d;
      color: #89817f !important;
    }

    .profile-nav ul > li:last-child > a:last-child {
      border-radius: 0 0 4px 4px;
      -webkit-border-radius: 0 0 4px 4px;
    }

    .profile-nav ul > li > a > i{
      font-size: 16px;
      padding-right: 10px;
      color: #bcb3aa;
    }

    .r-activity {
      margin: 6px 0 0;
      font-size: 12px;
    }


    .p-text-area, .p-text-area:focus {
      border: none;
      font-weight: 300;
      box-shadow: none;
      color: #c3c3c3;
      font-size: 16px;
    }

    .profile-info .panel-footer {
      background-color:#f8f7f5 ;
      border-top: 1px solid #e7ebee;
    }

    .profile-info .panel-footer ul li a {
      color: #7a7a7a;
    }

    .bio-graph-heading {
      background: #fbc02d;
      color: #fff;
      text-align: center;
      font-style: italic;
      padding: 40px 110px;
      border-radius: 4px 4px 0 0;
      -webkit-border-radius: 4px 4px 0 0;
      font-size: 16px;
      font-weight: 300;
    }

    .bio-graph-info {
      color: #89817e;
    }

    .bio-graph-info h1 {
      font-size: 22px;
      font-weight: 300;
      margin: 0 0 20px;
    }

    .bio-row {
      width: 50%;
      float: left;
      margin-bottom: 10px;
      padding:0 15px;
    }

    .bio-row p span {
      width: 100px;
      display: inline-block;
    }

    .bio-chart, .bio-desk {
      float: left;
    }

    .bio-chart {
      width: 40%;
    }

    .bio-desk {
      width: 60%;
    }

    .bio-desk h4 {
      font-size: 15px;
      font-weight:400;
    }

    .bio-desk h4.terques {
      color: #4CC5CD;
    }

    .bio-desk h4.red {
      color: #e26b7f;
    }

    .bio-desk h4.green {
      color: #97be4b;
    }

    .bio-desk h4.purple {
      color: #caa3da;
    }

    .file-pos {
      margin: 6px 0 10px 0;
    }

    .profile-activity h5 {
      font-weight: 300;
      margin-top: 0;
      color: #c3c3c3;
    }

    .summary-head {
      background: #ee7272;
      color: #fff;
      text-align: center;
      border-bottom: 1px solid #ee7272;
    }

    .summary-head h4 {
      font-weight: 300;
      text-transform: uppercase;
      margin-bottom: 5px;
    }

    .summary-head p {
      color: rgba(255,255,255,0.6);
    }

    ul.summary-list {
      display: inline-block;
      padding-left:0 ;
      width: 100%;
      margin-bottom: 0;
    }

    ul.summary-list > li {
      display: inline-block;
      width: 19.5%;
      text-align: center;
    }

    ul.summary-list > li > a > i {
      display:block;
      font-size: 18px;
      padding-bottom: 5px;
    }

    ul.summary-list > li > a {
      padding: 10px 0;
      display: inline-block;
      color: #818181;
    }

    ul.summary-list > li  {
      border-right: 1px solid #eaeaea;
    }

    ul.summary-list > li:last-child  {
      border-right: none;
    }

    .activity {
      width: 100%;
      float: left;
      margin-bottom: 10px;
    }

    .activity.alt {
      width: 100%;
      float: right;
      margin-bottom: 10px;
    }

    .activity span {
      float: left;
    }

    .activity.alt span {
      float: right;
    }
    .activity span, .activity.alt span {
      width: 45px;
      height: 45px;
      line-height: 45px;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      background: #eee;
      text-align: center;
      color: #fff;
      font-size: 16px;
    }

    .activity.terques span {
      background: #8dd7d6;
    }

    .activity.terques h4 {
      color: #8dd7d6;
    }
    .activity.purple span {
      background: #b984dc;
    }

    .activity.purple h4 {
      color: #b984dc;
    }
    .activity.blue span {
      background: #90b4e6;
    }

    .activity.blue h4 {
      color: #90b4e6;
    }
    .activity.green span {
      background: #aec785;
    }

    .activity.green h4 {
      color: #aec785;
    }

    .activity h4 {
      margin-top:0 ;
      font-size: 16px;
    }

    .activity p {
      margin-bottom: 0;
      font-size: 13px;
    }

    .activity .activity-desk i, .activity.alt .activity-desk i {
      float: left;
      font-size: 18px;
      margin-right: 10px;
      color: #bebebe;
    }

    .activity .activity-desk {
      margin-left: 70px;
      position: relative;
    }

    .activity.alt .activity-desk {
      margin-right: 70px;
      position: relative;
    }

    .activity.alt .activity-desk .panel {
      float: right;
      position: relative;
    }

    .activity-desk .panel {
      background: #F4F4F4 ;
      display: inline-block;
    }


    .activity .activity-desk .arrow {
      border-right: 8px solid #F4F4F4 !important;
    }
    .activity .activity-desk .arrow {
      border-bottom: 8px solid transparent;
      border-top: 8px solid transparent;
      display: block;
      height: 0;
      left: -7px;
      position: absolute;
      top: 13px;
      width: 0;
    }

    .activity-desk .arrow-alt {
      border-left: 8px solid #F4F4F4 !important;
    }

    .activity-desk .arrow-alt {
      border-bottom: 8px solid transparent;
      border-top: 8px solid transparent;
      display: block;
      height: 0;
      right: -7px;
      position: absolute;
      top: 13px;
      width: 0;
    }

    .activity-desk .album {
      display: inline-block;
      margin-top: 10px;
    }

    .activity-desk .album a{
      margin-right: 10px;
    }

    .activity-desk .album a:last-child{
      margin-right: 0px;
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


        <!-- Page Heading -->

        <!--  <p class="mb-4"> My Profile	Form</p>-->
        <?php
        $sql_reg="select * from  tbl_team_fren where   id= '".trim($_SESSION[ 'a_id' ])."'";
        $edit_qry=mysqli_query($DB_LINK,$sql_reg);
        $edit_data=mysqli_fetch_assoc($edit_qry);  ?>

        <div class="container">
          <div class="main-body">

            <!-- Breadcrumb -->
           <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
              </ol>
            </nav>-->
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="../upload/fdl_data/image/<?php echo $edit_data['image'];?>" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4><?php echo $edit_data['t_name']?></h4>
                        <p class="text-secondary mb-1">Frenchise Director</p>
                        <p class="text-muted font-size-sm"><?php echo $edit_data['a_city_name']?> <?php echo $edit_data['a_state_name']?></p>
                       <!-- <button class="btn btn-primary">Follow</button>
                        <button class="btn btn-outline-primary">Message</button>-->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">  Validity </h6>
                      <span class="text-secondary"><?php     echo $edit_data['validity'];?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"> State Director ID</h6>
                      <span class="text-secondary"><?php     echo $edit_data['a_sdl_id'];?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"> State Director Name</h6>

                    </li><li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">

                      <span class="text-secondary"><?php     echo $edit_data['a_sdl_name'];?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"> District Director ID</h6>
                      <span class="text-secondary"><?php     echo $edit_data['a_ddl_id'];?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"> District Director Name</h6>

                    </li><li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">

                      <span class="text-secondary"><?php     echo $edit_data['a_ddl_name'];?></span>
                    </li>



                  </ul>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <h3 class="d-flex align-items-center mb-3"> My Basic Profile Info</h3>

                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['t_name']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['email']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['mobile']?>
                      </div>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['address']?>
                        <br><?php echo $edit_data['city_name']?>
                        <?php echo $edit_data['state_name']?>
                        Pincode : <?php echo $edit_data['pin']?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3">
                  <div class="card-body">
                    <h3 class="d-flex align-items-center mb-3"> Bank Account Info</h3>

                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0"> Beneficiary / Account name </h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['benf_name'];?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">  Account No. :</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['acc'];?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Bank Name  :</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['bank'];?>
                      </div>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">  IFSC Code. :</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['ifsc'];?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">  Bank Branch :</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['branch'];?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3">
                  <div class="card-body">
                    <h3 class="d-flex align-items-center mb-3"> ID Address Proof Info</h3>

                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0"> Aadhar Card No </h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['uid'];?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <img src="../upload/fdl_data/uid/<?php echo $edit_data['uid_img'];?>" alt="Admin" class="img-fluid" >

                      </div>
                      <div class="col-sm-6  ">
                        <img src="../upload/fdl_data/uid/<?php echo $edit_data['uid_img_back'];?>" alt="Admin" class="img-fluid"  >

                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Pan Card No.  :</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php echo $edit_data['pan'];?>
                      </div>
                    </div>
                    <hr>


                    <div class="row">
                      <div class="col-sm-6">
                        <img src="../upload/fdl_data/pan/<?php echo $edit_data['pan_img'];?>" alt="Admin" class="img-fluid"  >

                      </div>

                    </div>
                  </div>
                </div>

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
    function onchangeajax_for_sdl(val) {

        $.ajax({
            type: "POST",
            url: "get_city_by_sdl.php",
            data: 'sdl_id=' + val,
            success: function(data) {

                $("#city_upd_by_sdl").html(data);
            }
        });
    }

    // INITIALIZE DATEPICKER PLUGIN
    $(function () {
        // INITIALIZE DATEPICKER PLUGIN
        $('.datepicker').datepicker({
            clearBtn: true,
            todayHighlight: true,
            startDate: '0d',
            format: "yyyy-mm-dd",
            value: '01/01/2018'
        });
    });
</script>
</body>

</html>
