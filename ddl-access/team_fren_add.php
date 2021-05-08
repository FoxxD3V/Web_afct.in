<?php
require_once("../con_base/functions.inc.php");
if(isset($_POST['save']))
{

    $a_ddl_id=(trim($_POST['a_ddl_id']));
    $t_name=strtoupper(trim($_POST['t_name']));
    //$study_center=strtoupper(trim($_POST['study_center']));
   // $study_center_code=$_SESSION['study_center_code'];
    //$study_center_code=strtoupper(trim($_POST['study_center_code']));
    $mobile=$_POST['mobile'];
    $email=($_POST['email']);
    $pass=enc($_POST['pass']);
    $address=(trim($_POST['address'])) ;
    $pincode=(trim($_POST['pin'])) ;
    $state_id=(trim($_POST['state_id']));
    $city_id=(trim($_POST['city_id']));
    $validity=(trim($_POST['validity']));


    $ip=get_ip();


    ///Image Setup
    $finame ="";
    require_once("uploader-file-master.php");
    $i1='';

    if (isset($_FILES['uploaded_file1']))
    {
        uploadmaster("../upload/fdl_data/image/", 'uploaded_file1');
        if ($finame != '')
        {
            $f1= $finame;
            $i1=",image='$f1' ";
        }
    }

    ////State City Data/////
    ///
     if ($_POST['a_ddl_id'] != '') {
       $sqlst = mysqli_query($DB_LINK, "select *  from tbl_team_city where user='" . $_POST['a_ddl_id'] . "' and status='1'") or die(mysqli_error());
       if (mysqli_num_rows($sqlst) > 0)
       {
         $datas_name = mysqli_fetch_array($sqlst);
         $a_ddl_name = $datas_name['t_name'];
         /////Get State Director info//
         $a_sdl_id = $datas_name['a_sdl_id'];
         $a_sdl_name = $datas_name['a_sdl_name'];
         //////Get Assign City///
         $a_city_id = $datas_name['a_city_id'];
         $a_city_name = $datas_name['a_city_name'];
         //Get Assign State
         $a_state_id = $datas_name['a_state_id'];
         $a_state_name = $datas_name['a_state_name'];

         $state_code = substr($a_sdl_id, 0, 2);

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
         /////Get New id/////
         $new_id = $state_code . '' . $_POST['city_id'] . 'F' . rand(100000, 999999);

            $sql_reg = "insert into tbl_team_fren set 
            `user`='$new_id',
            `pass`='$pass', 
              
            `t_name`='$t_name',
            `mobile`='$mobile',
            `email`='$email',
            `address`='$address',
            
            `state_id`='$state_id',
            `state_name`='$state',
            `city_id`='$city_id',
            `city_name`='$city',
            
            `a_sdl_id`='$a_sdl_id',
            `a_sdl_name`='$a_sdl_name', 
            `a_ddl_id`='$a_ddl_id',
            `a_ddl_name`='$a_ddl_name', 
            `a_city_id`='$a_city_id',
            `a_city_name`='$a_city_name',
            `a_state_id`='$a_state_id',
            `a_state_name`='$a_state_name', 
            `pin`='$pincode',
            `status`=0, 
            `validity`='$validity',             
            `ipaddress` ='$ip' $i1 ";

         if (mysqli_query($DB_LINK, $sql_reg)) {
           //Mail is attached on page
           $text = 'Congratulation your registration is successfully completed with name ' . $t_name . ' your login ID- ' . $new_id . ' Password- ' . dec($pass) . ' Warm Regards ' . $SITE_NAME;
           mail_sender($email, "yes", $text, $t_name, "Franchise Director Registration : AFCT ");
           $_SESSION['msg'] = array('success', 'Registration Successfully completed your login ID- ' . $new_id . ' Password- ' . dec($pass));
           header("Location: team_fren.php");
           exit;
         } else {
           $_SESSION['msg'] = array('error', 'Something went wrong !!!');
         }
       } else {
         $_SESSION['msg'] = array('error', 'District Director id not found !!!');
       }
     }



}


/*if(isset($_GET['edit']))
{
  $sql_reg="select * from  tbl_team_fren where id= '".trim($_GET['edit'])."'";
  $edit_qry=mysqli_query($DB_LINK,$sql_reg);
  $edit_data=mysqli_fetch_assoc($edit_qry);
} */

//$study_center_code="AFCT-".rand(10000,99999);
//$_SESSION['study_center_code']=$study_center_code;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Franchise Director Registration	| <?php echo $SITE_NAME;?></title>
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
                <h1 class="h3 mb-2 text-gray-800">New Franchise Director Registration</h1>
              <!--  <p class="mb-4">New Franchise Director Registration	Form</p>-->


                <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


                    <!-- Select -->

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> <strong> Assign To District Director  </strong></h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">

                                          <!--<div class="form-group">
                                            <label>AUTHORISED STUDY CENTER CODE</label>
                                            <input type="text" readonly value="<?php /*  if(isset($_GET['edit'])) echo $edit_data['study_center_code']; else echo $study_center_code;*/?>" class="form-control text-uppercase disabled" placeholder="AUTHORISED STUDY CENTER CODE *" name="study_center_code" required >
                                          </div>
                                          <div class="form-group">
                                            <input type="text" value="<?php /*  if(isset($_GET['edit'])) echo $edit_data['study_center'];*/?>" class="form-control text-uppercase" placeholder="AUTHORISED STUDY CENTER NAME *" name="study_center" required >
                                          </div>-->

                                            <div class="form-group"onmouseover="onchangeajax_for_ddl(a_ddl_id.value);">
                                              <div class="input-group mb-3">
                                                <!--onblur="onchangeajax_for_ddl(this.value);"-->
                                                <input type="text"  value="<?php   if(isset($_GET['edit'])) echo $edit_data['a_ddl_id']; else echo $_SESSION[ 'a_userid' ];?>" onmouseover="onchangeajax_for_ddl(a_ddl_id.value);" onmouseenter="onchangeajax_for_ddl(a_ddl_id.value);" name="a_ddl_id" id="a_ddl_id" required placeholder="Destrict Director ID *" class="form-control text-uppercase disabled" readonly placeholder="Destrict Director ID" aria-label="Destrict Director ID" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-primary btn-primary text-white " type="button" onmouseover="onchangeajax_for_ddl(a_ddl_id.value);">Find</button>
                                                </div>
                                              </div>


                                            </div>

                                            <div class="form-group  " id="city_d_info">
                                              <?php   if(isset($_GET['edit']))
                                              {
                                                 $sqlst = mysqli_query($DB_LINK, "select *  from tbl_team_city where user='" .  $edit_data['a_ddl_id'] . "'") or die(mysqli_error());
                                              if(mysqli_num_rows($sqlst)>0)
                                              {
                                              $datas_name = mysqli_fetch_assoc($sqlst);

                                              ?>
                                              <div class="card text-center">
                                                <div class="card-header bg-gradient-info text-white">
                                                  <?php echo $datas_name['t_name']?>
                                                </div>
                                                <div class="card-body">
                                                  <h5 class="card-title"><?php echo  $edit_data['a_ddl_id'];?></h5>
                                                  <p class="card-text"> <?php echo $datas_name['a_city_name'];?> - <?php echo $datas_name['a_state_name'];?></p>
                                                </div>

                                              </div>
                                              <?php }
                                              else
                                                echo "<span class='text-danger'>No record found !!!</span>";
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
                          <h6 class="m-0 font-weight-bold text-primary">  Account  Basic Information  </strong> </h6>


                        </div>
                        <div class="card-body">
                          <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['t_name'];?>" class="form-control text-uppercase" placeholder="Director Name *" name="t_name" required >
                              </div>

                              <div class="form-group">
                                <label>Upload Director Photo</label>
                                <input name="uploaded_file1" class="form-control" type="file" id="uploaded_file1">

                                (For Best resolution use resolution 150 X 150 )
                                <?php   if(isset($_GET['edit']))  {
                                  if($edit_data['image']!='') {?>
                                    <input type="hidden" value="<?php   if(isset($_GET['edit'])) echo $edit_data['image'];?>"  name="image"   >

                                    <br><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                                      View Image
                                    </button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Profile Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <img src="../upload/fdl_data/image/<?php echo $edit_data['image'];?>" class="img-responsive img-fluid">

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <?php }  } ?>
                              </div>
                              <!--  <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['state'];?>" class="form-control text-uppercase" placeholder="Father name *" name="father_name" required >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['state'];?>" class="form-control text-uppercase" placeholder="Husband name " name="husband_name" required >
                                            </div>
                                            <div class="form-group  ">
                                                <select class="form-control  text-uppercase " name="gender" required>
                                                    <option value="">-- Please select Gender --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>-->
                              <div class="form-group  ">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                  </div>

                                  <input readonly value="<?php   if(isset($_GET['edit'])) echo $edit_data['validity'];?>"  type="text" class="form-control datepicker text-uppercase " aria-required="true"  name="validity" required placeholder="Please choose Date Of Validity *" aria-label="Username" aria-describedby="basic-addon1">


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
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['address'];?>" class="form-control text-uppercase" placeholder="Enter Full Address *" name="address" required="" aria-required="true" aria-invalid="true"  >
                              </div>
                              <div class="form-group  ">
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
                              <div class="form-group  ">
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


                              <div class="form-group  mt-2">
                                <input type="tel" minlength="6" maxlength="6" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pin'];?>" class="form-control  text-uppercase" placeholder="PinCode *" name="pin" required="" aria-required="true" aria-invalid="true"  >
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
                                <input type="tel" minlength="10" maxlength="10" value="<?php   if(isset($_GET['edit'])) echo $edit_data['mobile'];?>" class="form-control  text-uppercase" placeholder="Mobile No *" name="mobile" required="" aria-required="true" aria-invalid="true"  >
                              </div>
                              <div class="form-group">
                                <input type="email" value="<?php   if(isset($_GET['edit'])) echo $edit_data['email'];?>" class="form-control text-uppercase" placeholder="Email Id  " name="email"     >
                              </div>
                              <div class="form-group  ">
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo dec($edit_data['pass']);?>" class="form-control  text-uppercase" placeholder="Password * " name="pass"  maxlength="10" minlength="3" required >
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
    function onchangeajax_for_ddl(val) {

        $.ajax({
            type: "POST",
            url: "get_city_director.php",
            data: 'ddl_id=' + val,
            success: function(data) {

                $("#city_d_info").html(data);
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
