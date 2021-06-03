<?php
require_once("../con_base/functions.inc.php");
if(isset($_POST['save']))
{
  if($_POST['ref_typ']=='sdl')
    $tab_name="tbl_team_state";
  if($_POST['ref_typ']=='ddl')
    $tab_name="tbl_team_city";
  if($_POST['ref_typ']=='fdl')
    $tab_name="tbl_team_fren";
  if($_POST['ref_typ']=='sl')
    $tab_name="tbl_team_student";
  if($_POST['ref_typ']=='tl')
    $tab_name="tbl_team_teacher";

  if(trim($_POST['ref_code'])=='')
    $_SESSION['msg'] = array('error', 'Enter Account ID first !!!');

  else if(member_counter_by_id($tab_name,$_POST['ref_code'])<1)
    $_SESSION['msg'] = array('error', 'ACCOUNT ID Not Found !!!');
  else {

    /// $ref_name
    $sqlrt = mysqli_query($DB_LINK, "select *  from $tab_name where user='" . $_POST['ref_code'] . "' ") or die(mysqli_error());
    $datrt = mysqli_fetch_array($sqlrt);
    $ref_name = $datrt['t_name'];
    $email = $datrt['email'];
    /// $ref_name


    $binaryInc=$_POST['amt'];
    echo $pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set 
    m_id_typ='".$_POST['ref_typ']."',
    `m_id`='" . $_POST['ref_code'] . "',
		 `m_name`='$ref_name', 
		 `mode`='CR',  
		 `amt`='$binaryInc' ,
		 on_date ='" . date('Y-m-d') . "',
		 summary='Wallet Credit For Bonus Payment Rs $binaryInc by Admin',
		 admin_summ='".$_POST['summ']."'
		 ";





    if (mysqli_query($DB_LINK, $pay_qry_r)) {
      //Mail is attached on page
      $text = 'Congratulation ' . $ref_name . ' ID- ' .$_POST['ref_code'] . ' your bonus wallet is successfully credited by admin for Rs. '.$binaryInc.' /- Warm Regards ' . $SITE_NAME;
      mail_sender($email, "yes", $text, $ref_name, "Bonus Wallet credit : AFCT ");
      $_SESSION['msg'] = array('success', 'bonus wallet is successfully credited for  ' . $ref_name . ' ID- ' .  ($_POST['ref_code']));
      header("Location: wallet_bonus.php");
      exit;
    } else {
      $_SESSION['msg'] = array('error', 'Something went wrong !!!');
    }
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

    <title>Add Bonus Wallet</title>
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
                <h1 class="h3 mb-2 text-gray-800">Credit Bonus Wallet</h1>
              <!--  <p class="mb-4">Credit Bonus Wallet	Form</p>-->


                <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


                    <!-- Select -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> <strong> Find Account to credit bonus wallet  </strong></h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">

                                        <div class="col-sm-12">

                                          <div class="form-group btn-group">
                                            <label class="mr-2">Account Id Type </label>

                                            <div class="form-check mr-2">
                                              <label for="ref_typ_a" class="form-check-label">
                                                <input class="form-check-input" checked type="radio" id="ref_typ_a" name="ref_typ" value="sdl" required <?php  if(isset($_GET['edit'])) if($edit_data['ref_typ']=="sdl") { echo 'checked';  }?>>
                                                State  </label>
                                            </div>
                                            <div class="form-check mr-2">
                                              <label for="ref_typ_b" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_b" name="ref_typ" value="ddl" required <?php  if(isset($_GET['edit'])) if($edit_data['ref_typ']=="ddl") { echo 'checked';  }?>>
                                                District  </label>
                                            </div>
                                            <div class="form-check mr-3">
                                              <label for="ref_typ_c" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_c" name="ref_typ" value="fdl" required <?php  if(isset($_GET['edit'])) if($edit_data['ref_typ']=="fdl") { echo 'checked';  }?>>
                                                Franchise  </label>
                                            </div>
                                             <div class="form-check mr-4">
                                              <label for="ref_typ_d" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_d" name="ref_typ" value="tl" required <?php /* if(isset($_GET['edit'])) if($edit_data['ref_typ']=="tl") { echo 'checked';  }*/?>>
                                                Faculty</label>
                                            </div>
                                            <div class="form-check mr-5">
                                              <label for="ref_typ_e" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_e" name="ref_typ" value="sl" required <?php /* if(isset($_GET['edit'])) if($edit_data['ref_typ']=="sl") { echo 'checked';  }*/?>>
                                                Student</label>
                                            </div>
                                          </div>

                                            <div class="form-group">
                                              <div class="input-group mb-3">
                                                <!--onblur="onchangeajax_for_ddl(this.value);"-->
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['referral_code'];?>" name="ref_code" id="ref_code" required placeholder="Enter Account ID *" class="form-control text-uppercase" placeholder="Account ID" aria-label="Destrict Director ID" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-primary btn-primary text-white " type="button" onclick="onchangeajax_get_ref(ref_code.value);">Find</button>
                                                </div>
                                              </div>


                                            </div>

                                            <div class="form-group  " id="ref_info">
                                              <?php   if(isset($_GET['edit']))
                                              {

                                              }
                                              ?>
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
                          <h6 class="m-0 font-weight-bold text-primary"> Credit Summary    </strong></h6>


                        </div>
                        <div class="card-body">
                          <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group ">
                                <label>Amount </label>
                                <input type="number" minlength="5" maxlength="5"   class="form-control  text-uppercase" placeholder="Bonus Amount *" name="amt"  aria-required="true" aria-invalid="true"  >
                              </div>
                              <div class="form-group">
                                <label>Summary</label>
                                <input type="text"   class="form-control text-uppercase" placeholder="Credit Summary  " name="summ"     >
                              </div>


                              <div class="form-group  ">


                                  <button class="btn float-right btn-raised btn-primary btn-round waves-effect" type="submit" name="save">Credit Bonus Wallet</button>


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
    function onchangeajax_get_sc(val) {


        $.ajax({
            type: "POST",
            url: "../con_base/request/get_institute.php",
            data: 'ins_id=' + val,
            success: function(data) {
                $("#ref_d_info").html(data);
            }
        });
    }

    function onchangeajax_for_course_cat(val) {


        $.ajax({
            type: "POST",
            url: "../con_base/request/get_course_list.php",
            data: 'type_name=' + val,
            success: function(data) {
                $("#get_course").html(data);
            }
        });
    }
    function onchangeajax_for_course(val) {


        $.ajax({
            type: "POST",
            url: "../con_base/request/get_course_info.php",
            data: 'course_id=' + val,
            success: function(data) {
                $("#course_info").html(data);
            }
        });
    }
    function onchangeajax_get_ref(val) {
        var radios = document.getElementsByName('ref_typ');
        var radio_value;

        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                // do whatever you want with the checked radio
                //alert(radios[i].value);
                radio_value=radios[i].value ;

                // only one radio can be logically checked, don't check the rest
                break;
            }
        }


        $.ajax({
            type: "POST",
            url: "get_referral.php",
            data: 'id=' + val+'&typ='+radio_value,
            success: function(data) {
                $("#ref_info").html(data);
            }
        });
    }


    // INITIALIZE DATEPICKER PLUGIN
    $(function () {
        // INITIALIZE DATEPICKER PLUGIN
        $('.datepicker').datepicker({
            clearBtn: true,
            todayHighlight: true,
            endDate: '0d',
            format: "yyyy-mm-dd",
            value: '01/01/2018'
        });
        $('.datepicker2').datepicker({
            clearBtn: true,
            todayHighlight: true,

            format: "yyyy-mm-dd",
            value: '01/01/2018'
        });
    });
</script>
</body>

</html>
