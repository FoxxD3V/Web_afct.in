<?php
require_once("../con_base/functions.inc.php");
if(isset($_POST['save']))
{
  ////State City ///////
  if ($_POST['state_id'] != '') {
    $sqlst = mysqli_query($DB_LINK, "select state from state where state_id='" . $_POST['state_id'] . "'") or die(mysqli_error());
    $datas_name = mysqli_fetch_array($sqlst);
    $state = $datas_name['state'];
  }
  if ($_POST['city_id'] != '') {
    $sqlct = mysqli_query($DB_LINK, "select city from city where city_id='" . $_POST['city_id'] . "'") or die(mysqli_error());
    $datac_name = mysqli_fetch_array($sqlct);
    $city = $datac_name['city'];
  }
  ////State City ///////
  $t_name=strtoupper(trim($_POST['t_name']));
  $t_code='AFCT/INS/'.rand(10000,99990);
  $a_fdl_id=$_SESSION[ 'a_userid' ];
  $address = (trim($_POST['address']));
  $pincode = (trim($_POST['pin']));
  $state_id = (trim($_POST['state_id']));
  $city_id = (trim($_POST['city_id']));
  $mobile = $_POST['mobile'];
  $email = ($_POST['email']);


    $sqlst = mysqli_query($DB_LINK, "select t_name  from tbl_team_fren where user='" . $_SESSION[ 'a_userid' ] . "'") or die(mysqli_error());
    $datas_name = mysqli_fetch_array($sqlst);
    $a_fdl_name  = $datas_name['t_name'];

    $ip=get_ip();

      $sql_reg="insert into tbl_master_institute set              
      `t_name`='$t_name',            
      `t_code`='$t_code',            
      `a_fdl_id`='$a_fdl_id',            
      `a_fdl_name`='$a_fdl_name',            
      `status`=0,      
      `mobile`='$mobile',
      `email`='$email',
      `address`='$address',
      `state_id`='$state_id',
      `state_name`='$state',
      `city_id`='$city_id',
      `city_name`='$city',
      `pincode`='$pincode'   ";

        if(mysqli_query($DB_LINK,$sql_reg))
        {

             $_SESSION['msg']=array('success', 'Data Saved Successfully');
             header("Location: master_institute.php");
            exit;
        }
        else	{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }

}
if(isset($_POST['update']))
{
  ////State City ///////
  if ($_POST['state_id'] != '') {
    $sqlst = mysqli_query($DB_LINK, "select state from state where state_id='" . $_POST['state_id'] . "'") or die(mysqli_error());
    $datas_name = mysqli_fetch_array($sqlst);
    $state = $datas_name['state'];
  }
  if ($_POST['city_id'] != '') {
    $sqlct = mysqli_query($DB_LINK, "select city from city where city_id='" . $_POST['city_id'] . "'") or die(mysqli_error());
    $datac_name = mysqli_fetch_array($sqlct);
    $city = $datac_name['city'];
  }
  ////State City ///////
    $c_id = (trim($_POST['c_id']));
  $t_name=strtoupper(trim($_POST['t_name']));
  $t_code='AFCT/INS/'.rand(10000,99990);
  $a_fdl_id=$_SESSION[ 'a_userid' ];
  $address = (trim($_POST['address']));
  $pincode = (trim($_POST['pin']));
  $state_id = (trim($_POST['state_id']));
  $city_id = (trim($_POST['city_id']));
  $mobile = $_POST['mobile'];
  $email = ($_POST['email']);


    $sqlst = mysqli_query($DB_LINK, "select t_name  from tbl_team_fren where user='" . $_SESSION[ 'a_userid' ] . "'") or die(mysqli_error());
    $datas_name = mysqli_fetch_array($sqlst);
    $a_fdl_name  = $datas_name['t_name'];

    $ip=get_ip();
  //`t_name`='$t_name',
      $sql_reg="update tbl_master_institute set              
                
               
                 
         
      `mobile`='$mobile',
      `email`='$email',
      `address`='$address',
      `state_id`='$state_id',
      `state_name`='$state',
      `city_id`='$city_id',
      `city_name`='$city',
      `pincode`='$pincode' 
      where id='$c_id'  ";

        if(mysqli_query($DB_LINK,$sql_reg))
        {

             $_SESSION['msg']=array('success', 'Data Updated Successfully');
             header("Location: master_institute.php");
            exit;
        }
        else	{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }

}

if(isset($_GET['edit']))
{
  $sql_reg="select * from  tbl_master_institute where id= '".trim($_GET['edit'])."'";
  $edit_qry=mysqli_query($DB_LINK,$sql_reg);
  $edit_data=mysqli_fetch_assoc($edit_qry);
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

    <title>New Institute Master	| <?php echo $SITE_NAME;?></title>
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
                <h1 class="h3 mb-2 text-gray-800">New Institute Master</h1>
              <!--  <p class="mb-4">New Institute Master	Form</p>-->


                <form id="form_validation" method="POST" action="" enctype="multipart/form-data">




                    <!-- Select -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">   Basic Information  </strong> </h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text"   class="form-control text-uppercase" value="<?php   if(isset($_GET['edit'])) echo $edit_data['t_name'];?>" placeholder="Institute Name *" name="t_name" required >
                                            </div>
                                          <div class="form-group ">
                                            <input type="tel" minlength="10" maxlength="10" value="<?php   if(isset($_GET['edit'])) echo $edit_data['mobile'];?>" class="form-control  text-uppercase" placeholder="Mobile No *" name="mobile" required="" aria-required="true" aria-invalid="true"  >
                                          </div>
                                          <div class="form-group">
                                            <input type="email" value="<?php   if(isset($_GET['edit'])) echo $edit_data['email'];?>" class="form-control text-uppercase" placeholder="Email Id  " name="email"     >
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
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['address'];?>" class="form-control text-uppercase" placeholder="Enter Full Address *" name="address" required="" aria-required="true" aria-invalid="true"  >
                              </div>








                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <select class="form-control  text-uppercase" name="state_id" id="state_id" onChange="onchangeajax(this.value);" required>
                                      <option value="">--Select State--</option>
                                      <?php $sql=mysqli_query($DB_LINK,"select * from state where status=1 order by state") or die(mysqli_error());
                                      foreach($sql as $state)
                                      {
                                        ?>
                                        <option value="<?php echo $state['state_id'];?>" <?php if(isset($_GET['edit'])) if($edit_data['state_id']==$state['state_id']) { echo 'selected';   } ?>><?php echo $state['state'];?></option>
                                      <?php } ?>
                                    </select>

                                  </div>
                                </div>

                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <div id="city_upd">
                                      <select name="city_id" id="city_id" class="form-control  text-uppercase" required>
                                        <option value="">--Select City--</option>
                                        <?php if(isset($_GET['edit']))
                                        {
                                          $qur=mysqli_query($DB_LINK,"select * from city where state_id='".$edit_data['state_id']."' and status=1 order by city") or die(mysqli_error());
                                          foreach($qur as $city)
                                          {
                                            ?><option value="<?php echo $city['city_id'];?>" <?php if(isset($_GET['edit'])) if($edit_data['city_id']==$city['city_id']) { echo 'selected';   } ?>><?php echo $city['city'];?></option>
                                            <?php
                                          }
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <input type="tel" minlength="6" maxlength="6" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pincode'];?>" class="form-control  text-uppercase" placeholder="PinCode *" name="pin" required="" aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>







                              </div>


                            <div class="form-group  ">
                              <?php   if(isset($_GET['edit'])) { ?>
                                <input type="hidden" value="<?php   if(isset($_GET['edit'])) echo $edit_data['id'];?>"  name="c_id"   >
                                <button class="btn float-right btn-raised btn-success btn-round waves-effect" type="submit" name="update">Update Now</button>

                              <?php }
                              else { ?>
                                <button class="btn float-right btn-raised btn-primary btn-round waves-effect" type="submit" name="save">Register Now</button>
                              <?php } ?>


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
