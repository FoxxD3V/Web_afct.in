<?php
require_once("../con_base/functions.inc.php");

if(isset($_POST['update']))
{

  $c_id = (trim($_POST['c_id']));
  $image = (trim($_POST['image']));

  $a_fdl_id=(trim($_POST['a_fdl_id']));
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
  //$validity=(trim($_POST['validity']));

  $c_code=(trim($_POST['c_code']));
  $c_subj=(trim($_POST['c_subj']));
  $education=(trim($_POST['education']));
  $edu_year=(trim($_POST['edu_year']));
  $edu_mon=(trim($_POST['edu_mon']));
  $ip=get_ip();


  ///Image Setup
  $finame ="";
  require_once("uploader-file-master.php");
  $i1='';

  if (isset($_FILES['uploaded_file1']))
  {
    uploadmaster("../upload/tl_data/image/", 'uploaded_file1');
    if ($finame != '')
    {
      unlink("../upload/tl_data/image/".$image);

      $f1= $finame;
      $i1=",image='$f1' ";
    }
  }


  if ($_POST['state_id'] != '') {
    $sqlst = mysqli_query($DB_LINK, "select state  from state where state_id='" . $_POST['state_id'] . "'") or die(mysqli_error());
    $datas_name = mysqli_fetch_array($sqlst);
    $state = $datas_name['state'];

  }
  if ($_POST['city_id'] != '') {
    $sqlct = mysqli_query($DB_LINK, "select city from city where city_id='" . $_POST['city_id'] . "'") or die(mysqli_error());
    $datac_name = mysqli_fetch_array($sqlct);
    $city = $datac_name['city'];
  }

  /// ins code
 /* if ($c_code != '') {
    $sqlct = mysqli_query($DB_LINK, "select  c_name from  tbl_master_course where c_code='" . $_POST['c_code'] . "'") or die(mysqli_error());
    $datac_name = mysqli_fetch_array($sqlct);
    $c_name = $datac_name['c_name'];
    //$c_sort_name = $datac_name['c_sort_name'];
  }*/
  /// ins code


  //`t_name`='$t_name',c_code`='$c_code',  `c_name`='$c_name',`validity`='$validity',
  $sql_reg="update tbl_team_fact set 
             
            
            `pass`='$pass', 
              
            
            `mobile`='$mobile',
            `email`='$email',
            `address`='$address',
            
             
            `c_subj`='$c_subj',
            `education`='$education',
            `edu_year`='$edu_year',
            `edu_mon`='$edu_mon',
            
            `state_id`='$state_id',
            `state_name`='$state',
            `city_id`='$city_id',
            `city_name`='$city',
            
            
           
            `pin`='$pincode',
            
                       
            `ipaddress` ='$ip' $i1 
              where id='$c_id'";

  if(mysqli_query($DB_LINK,$sql_reg))
  {
    $text='Record updated successfully' ;
    $_SESSION['msg']=array('success',  $text);

    header("Location: user_profile.php");
    exit;
  }
  else	{
    $_SESSION['msg'] = array('error', 'Something went wrong !!!');
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

  <title>Faculty / Teacher Profile Update	| <?php echo $SITE_NAME;?></title>
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
      <?php include("include/header.php");
      $sql_reg="select * from  tbl_team_fact where id= '".trim($_SESSION[ 'a_id' ])."'";
      $edit_qry=mysqli_query($DB_LINK,$sql_reg);
      $edit_data=mysqli_fetch_assoc($edit_qry);
      ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Faculty / Teacher Profile Update	</h1>
        <!--  <p class="mb-4"> My Profile	Form</p>-->



        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


          <!-- Select -->

          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"> <strong> Assign To Frenchise Director  </strong></h6>


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

                      <div class="form-group"onmouseover="onchangeajax_for_ddl(a_fdl_id.value);">
                        <div class="input-group mb-3">
                          <!--onblur="onchangeajax_for_ddl(this.value);"-->
                          <input type="text"  value="<?php    echo $edit_data['a_fdl_id'];  ?>"
                                 onmouseover="onchangeajax_for_ddl(a_fdl_id.value);" onmouseenter="onchangeajax_for_ddl(a_fdl_id.value);"
                                 name="a_fdl_id" id="a_fdl_id" required placeholder="Frenchise Director ID *" class="form-control text-uppercase  "   placeholder="Frenchise Director ID" aria-label="Frenchise Director ID" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-primary text-white " type="button" onmouseover="onchangeajax_for_ddl(a_fdl_id.value);">Find</button>
                          </div>
                        </div>


                      </div>

                      <div class="form-group  " id="city_d_info">
                        <?php
                        {
                          $sqlst = mysqli_query($DB_LINK, "select *  from tbl_team_fren where user='" .  $edit_data['a_fdl_id'] . "'") or die(mysqli_error());
                          if(mysqli_num_rows($sqlst)>0)
                          {
                            $datas_name = mysqli_fetch_assoc($sqlst);

                            ?>
                            <div class="card text-center">
                              <div class="card-header bg-gradient-info text-white">
                                <?php echo $datas_name['t_name']?>
                              </div>
                              <div class="card-body">
                                <h5 class="card-title"><?php echo  $edit_data['a_fdl_id'];?></h5>
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
                        <input type="text" readonly value="<?php    echo $edit_data['t_name'];?>" class="form-control text-uppercase" placeholder="Faculty Name *" name="t_name" required >
                      </div>

                      <div class="form-group">

                        <div class="row">
                          <!--<div class="col-sm-6  ">
                            <div class="form-group">
                              <label> Course Type</label>
                              <select class="form-control  text-uppercase" name="c_typ" id="c_typ"      onChange="onchangeajax_for_course_cat(this.value);">
                                <option value="">--Select Course Type--</option>
                                <?php /*$sql=mysqli_query($DB_LINK,"select * from tbl_master_course_typ   order by t_name asc") or die(mysqli_error());
                                foreach($sql as $state)
                                {
                                  */?>
                                  <option value="<?php /*echo $state['t_name'];*/?>" <?php /*   if($edit_data['t_name']==$state['t_name']) { echo 'selected';   }  */?>><?php /*echo $state['t_name'];*/?></option>
                                <?php /*} */?>
                              </select>

                            </div>
                          </div>
-->

                          <div class="col-sm-6"><label>Course Name</label>
                            <div class="form-group" id="get_course">

                              <select class="form-control  text-uppercase" name="c_code" id="c_code"   required  onChange="onchangeajax_for_course(this.value);">
                                <option value="">--Select Course--</option>
                                <?php $sql=mysqli_query($DB_LINK,"select * from tbl_master_course where c_code='".$edit_data['c_code']."' order by c_name asc") or die(mysqli_error());
                                foreach($sql as $state)
                                {
                                  ?>
                                  <option value="<?php echo $state['c_code'];?>" <?php    if($edit_data['c_code']==$state['c_code']) { echo 'selected';   } ?>>[<?php echo $state['c_code'];?>] - <?php echo $state['c_sort_name'];?> - <?php echo $state['c_name'];?></option>
                                <?php } ?>
                              </select>

                            </div>
                          </div>
                        </div>



                      </div>

                      <div class="form-group">

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label> Course Subject</label>
                              <input type="text" value="<?php    echo $edit_data['c_subj'];?>" class="form-control text-uppercase" placeholder="Enter Course Subject *" name="c_subj" required >



                            </div>
                          </div>


                          <div class="col-sm-6"><label>Education Qualification</label>
                            <div class="form-group"  >
                              <input type="text" value="<?php    echo $edit_data['education'];?>" class="form-control text-uppercase" placeholder="Enter Education Qualification *" name="education" required >



                            </div>
                          </div>
                        </div>



                      </div>

                      <div class="form-group">

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label> Experience of Education : Year</label>

                              <select class="form-control mr-2 text-uppercase" name="edu_year" id="edu_year"    >
                                <option value="">--Year--</option>
                                <?php
                                for ( $i=0;$i<=15;$i++)
                                {
                                  ?>
                                  <option value="<?php echo  $i;?>" <?php    if($edit_data['edu_year']==$i)   { echo 'selected';   } ?>><?php echo  $i;?></option>
                                <?php } ?>
                              </select>


                            </div>
                          </div>


                          <div class="col-sm-6"><label>Month</label>
                            <div class="form-group"  >
                              <select class="form-control mr-2 text-uppercase" name="edu_mon" id="edu_mon"    >
                                <option value="">--Month--</option>
                                <?php
                                for ( $i=0;$i<=12;$i++)
                                {
                                  ?>
                                  <option value="<?php echo  $i;?>" <?php    if($edit_data['edu_mon']==$i)   { echo 'selected';   } ?>><?php echo  $i;?></option>
                                <?php } ?>
                              </select>


                            </div>
                          </div>
                        </div>



                      </div>

                      <div class="form-group">
                        <label>Upload Faculty Photo</label>
                        <input name="uploaded_file1" class="form-control" type="file" id="uploaded_file1">

                        (For Best resolution use resolution 150 X 150 )
                        <?php     {
                          if($edit_data['image']!='') {?>
                            <input type="hidden" value="<?php    echo $edit_data['image'];?>"  name="image"   >

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
                                    <img src="../upload/tl_data/image/<?php echo $edit_data['image'];?>" class="img-responsive img-fluid">

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
                                                <input type="text" value="<?php    echo $edit_data['state'];?>" class="form-control text-uppercase" placeholder="Father name *" name="father_name" required >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php    echo $edit_data['state'];?>" class="form-control text-uppercase" placeholder="Husband name " name="husband_name" required >
                                            </div>
                                            <div class="form-group  ">
                                                <select class="form-control  text-uppercase " name="gender" required>
                                                    <option value="">-- Please select Gender --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>-->
                     <!-- <div class="form-group  ">

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                          </div>

                          <input readonly value="<?php /*   echo $edit_data['validity'];*/?>"  type="text" class="form-control datepicker text-uppercase " aria-required="true"  name="validity" required placeholder="Please choose Date Of Validity *" aria-label="Username" aria-describedby="basic-addon1">


                        </div>

                        <div class="input-append date">

                          </span>
                        </div>

                      </div>-->





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
                        <input type="text" value="<?php    echo $edit_data['address'];?>" class="form-control text-uppercase" placeholder="Enter Full Address *" name="address" required="" aria-required="true" aria-invalid="true"  >
                      </div>
                      <div class="form-group  ">
                        <select class="form-control  text-uppercase" name="state_id" id="state_id" onChange="onchangeajax(this.value);" required>
                          <option value="">--Select State--</option>
                          <?php $sql=mysqli_query($DB_LINK,"select * from state where status=1 order by state") or die(mysqli_error());
                          foreach($sql as $state)
                          {
                            ?>
                            <option value="<?php echo $state['state_id'];?>" <?php  if($edit_data['state_id']==$state['state_id']) { echo 'selected';   } ?>><?php echo $state['state'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group  ">
                        <div id="city_upd">
                          <select name="city_id" id="city_id" class="form-control  text-uppercase" required>
                            <option value="">--Select City--</option>
                            <?php
                            {
                              $qur=mysqli_query($DB_LINK,"select * from city where state_id='".$edit_data['state_id']."' and status=1 order by city") or die(mysqli_error());
                              foreach($qur as $city)
                              {
                                ?><option value="<?php echo $city['city_id'];?>" <?php  if($edit_data['city_id']==$city['city_id']) { echo 'selected';   } ?>><?php echo $city['city'];?></option>
                                <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>


                      <div class="form-group  mt-2">
                        <input type="tel" minlength="6" maxlength="6" value="<?php    echo $edit_data['pin'];?>" class="form-control  text-uppercase" placeholder="PinCode *" name="pin" required="" aria-required="true" aria-invalid="true"  >
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
                        <input type="tel" minlength="10" maxlength="10" value="<?php    echo $edit_data['mobile'];?>" class="form-control  text-uppercase" placeholder="Mobile No *" name="mobile" required="" aria-required="true" aria-invalid="true"  >
                      </div>
                      <div class="form-group">
                        <input type="email" value="<?php    echo $edit_data['email'];?>" class="form-control text-uppercase" placeholder="Email Id  " name="email"     >
                      </div>
                      <div class="form-group  ">
                        <input type="text" value="<?php    echo dec($edit_data['pass']);?>" class="form-control  text-uppercase" placeholder="Password * " name="pass"  maxlength="10" minlength="3" required >
                      </div>
                      <div class="form-group  ">


                          <input type="hidden" value="<?php    echo $edit_data['id'];?>"  name="c_id"   >
                          <button class="btn float-right btn-raised btn-success btn-round waves-effect" type="submit" name="update">Update Now</button>



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
            url: "../con_base/request/get_fren_director.php",
            data: 'id=' + val,
            success: function(data) {

                $("#city_d_info").html(data);
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
