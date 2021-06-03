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

  if(trim($_POST['ref_id'])=='')
    $_SESSION['msg'] = array('error', 'Enter referral ID first !!!');
  else if(trim($_POST['c_code'])=='')
    $_SESSION['msg'] = array('error', 'Select course first !!!');
  else if(member_counter_by_id($tab_name,$_POST['ref_id'])<1)
    $_SESSION['msg'] = array('error', 'Referral ID Not Found !!!');
  else {
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
    ///
    /// $ref_name
    $sqlrt = mysqli_query($DB_LINK, "select *  from $tab_name where user='" . $_POST['ref_id'] . "' ") or die(mysqli_error());
    $datrt = mysqli_fetch_array($sqlrt);
    $ref_name = $datrt['t_name'];
    /// $ref_name
    ///
    /// ins code
    if ($_POST['ins_id'] != '') {
      $sqlct = mysqli_query($DB_LINK, "select  * from  tbl_master_institute where t_code='" . $_POST['ins_id'] . "'") or die(mysqli_error());
      $datac_name = mysqli_fetch_array($sqlct);
      $ins_name = $datac_name['t_name'];
    }
    /// ins code
    if ($_POST['c_code'] != '') {
      $sqlct = mysqli_query($DB_LINK, "select  * from  tbl_master_course where c_code='" . $_POST['c_code'] . "'") or die(mysqli_error());
      $datac_name = mysqli_fetch_array($sqlct);
      $c_name = $datac_name['c_name'];
      $c_sort_name = $datac_name['c_sort_name'];
    }
    /// ins code

    $Session_name = date("Y");

    //$new_id = $Session_name . "" . $c_sort_name . rand(100000, 999999);
    $new_id = time();
    $pass = enc($_POST['pass']);
    $reg_typ =  (trim($_POST['reg_typ']));
    $s_title =  (trim($_POST['s_title']));
    $t_name = strtoupper(trim($_POST['t_name']));
    $m_name = strtoupper(trim($_POST['m_name']));
    $l_name = strtoupper(trim($_POST['l_name']));
    $f_name = strtoupper(trim($_POST['f_name']));
    $mot_name = strtoupper(trim($_POST['mot_name']));
    $gender = strtoupper(trim($_POST['gender']));
    $dob = strtoupper(trim($_POST['dob']));
    $mobile = $_POST['mobile'];
    $email = ($_POST['email']);
    $cat_name = ($_POST['cat_name']);
    $id_aadhar = ($_POST['id_aadhar']);
    $id_pan = ($_POST['id_pan']);

    $ref_typ = (trim($_POST['ref_typ']));
    $ref_id = (trim($_POST['ref_id']));
    $ref_name = $ref_name;

    $address = (trim($_POST['address']));
    $pincode = (trim($_POST['pin']));
    $state_id = (trim($_POST['state_id']));
    $city_id = (trim($_POST['city_id']));

    $ins_code = (trim($_POST['ins_id']));
    $ins_name = $ins_name;

    $c_code = (trim($_POST['c_code']));
    $c_code = (trim($_POST['c_code']));

    $doj = (trim($_POST['doj']));
    $ip = get_ip();

    $h_board = $_POST['h_board'];
    $h_year = $_POST['h_year'];
    $h_enrol = $_POST['h_enrol'];
    $h_fmark = $_POST['h_fmark'];
    $h_omark = $_POST['h_omark'];
    $h_grade = $_POST['h_grade'];

    $i_board = $_POST['i_board'];
    $i_year = $_POST['i_year'];
    $i_enrol = $_POST['i_enrol'];
    $i_fmark = $_POST['i_fmark'];
    $i_omark = $_POST['i_omark'];
    $i_grade = $_POST['i_grade'];

    $g_board = $_POST['g_board'];
    $g_year = $_POST['g_year'];
    $g_enrol = $_POST['g_enrol'];
    $g_fmark = $_POST['g_fmark'];
    $g_omark = $_POST['g_omark'];
    $g_grade = $_POST['g_grade'];

    $pg_board = $_POST['pg_board'];
    $pg_year = $_POST['pg_year'];
    $pg_enrol = $_POST['pg_enrol'];
    $pg_fmark = $_POST['pg_fmark'];
    $pg_omark = $_POST['pg_omark'];
    $pg_grade = $_POST['pg_grade'];

    $o_board = $_POST['o_board'];
    $o_year = $_POST['o_year'];
    $o_enrol = $_POST['o_enrol'];
    $o_fmark = $_POST['o_fmark'];
    $o_omark = $_POST['o_omark'];
    $o_grade = $_POST['o_grade'];

    ///Image Setup
    $finame = "";
    require_once("uploader-file-master.php");
    $i1 = '';

    if (isset($_FILES['uploaded_file1'])) {
      uploadmaster("../upload/sl_data/image/", 'uploaded_file1');
      if ($finame != '') {
        $f1 = $finame;
        $i1 = ",image='$f1' ";
      }
    }

     $sql_reg = "insert into  tbl_team_student set 
  `user`='$new_id',
  `pass`='$pass',
   `reg_typ`='$reg_typ',
  `s_title`='$s_title',
  `t_name`='$t_name',
  `m_name`='$m_name',
  `l_name`='$l_name',
  `f_name`='$f_name',
  `mot_name`='$mot_name',
  `gender`='$gender',
  `dob`='$dob',
  `mobile`='$mobile',
  `email`='$email',
  `address`='$address',
  `ref_typ`='$ref_typ',
  `ref_id`='$ref_id',
  `ref_name`='$ref_name',
  `state_id`='$state_id',
  `state_name`='$state',
  `city_id`='$city_id',
  `city_name`='$city',
  `pin`='$pincode',
   cat_name='$cat_name',
   id_aadhar='$id_aadhar',
   id_pan='$id_pan',
  `ins_code`='$ins_code',
  `ins_name`='$ins_name',
  `c_code`='$c_code',
  `c_name`='$c_name',
  `doj`='$doj',
   `status`=0,
   ipaddress='$ip',
   
  `h_board`='$h_board',
  `h_year`='$h_year',
  `h_enrol`='$h_enrol',
  `h_fmark`='$h_fmark',
  `h_omark`='$h_omark',
  `h_grade`='$h_grade',
  
  `i_board`='$i_board',
  `i_year`='$i_year',
  `i_enrol`='$i_enrol',
  `i_fmark`='$i_fmark',
  `i_omark`='$i_omark',
  `i_grade`='$i_grade',
  
  `g_board`='$g_board',
  `g_year`='$g_year',
  `g_enrol`='$g_enrol',
  `g_fmark`='$g_fmark',
  `g_omark`='$g_omark',
  `g_grade`='$g_grade',
  
   `pg_board`='$pg_board',
  `pg_year`='$pg_year',
  `pg_enrol`='$pg_enrol',
  `pg_fmark`='$pg_fmark',
  `pg_omark`='$pg_omark',
  `pg_grade`='$pg_grade',
  
  `o_board`='$o_board',
  `o_year`='$o_year',
  `o_enrol`='$o_enrol',
  `o_fmark`='$o_fmark',
   o_omark='$o_omark',
  `o_grade`='$o_grade'
   
   $i1";



    if (mysqli_query($DB_LINK, $sql_reg)) {
      //Mail is attached on page
      $text = 'Congratulation your registration is successfully completed with name ' . $t_name . ' your login ID- ' . $new_id . ' Password- ' . dec($pass) . ' for login visit www.afct.in  Warm Regards ' . $SITE_NAME;
      mail_sender($email, "yes", $text, $t_name, "Student Registration : AFCT ");
      $_SESSION['msg'] = array('success', $text);
      header("Location: student_add.php");
      exit;
    } else {
      $_SESSION['msg'] = array('error', 'Something went wrong !!!');
    }
  }





}
/*if(isset($_POST['update']))
{
  $c_id = (trim($_POST['c_id']));
  $image = (trim($_POST['image']));

    $t_name=strtoupper(trim($_POST['t_name']));
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
          unlink("../upload/fdl_data/image/".$image);
            $f1= $finame;
            $i1=",image='$f1' ";
        }
    }

    ////State City Data/////
    ///


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

            $sql_reg = "update tbl_team_fren set 
            
            `pass`='$pass', 
            `t_name`='$t_name',
            `mobile`='$mobile',
            `email`='$email',
            `address`='$address',
            
            `state_id`='$state_id',
            `state_name`='$state',
            `city_id`='$city_id',
            `city_name`='$city',
            
       
            
            `pin`='$pincode',
            `status`=0, 
            `validity`='$validity',             
            `ipaddress` ='$ip' $i1 ";

         if (mysqli_query($DB_LINK, $sql_reg)) {
           $text='Record updated successfully' ;
           $_SESSION['msg']=array('success',  $text);
           header("Location: team_fren.php");
           exit;
         } else {
           $_SESSION['msg'] = array('error', 'Something went wrong !!!');
         }




}

if(isset($_GET['edit']))
{
  $sql_reg="select * from  tbl_team_fren where id= '".trim($_GET['edit'])."'";
  $edit_qry=mysqli_query($DB_LINK,$sql_reg);
  $edit_data=mysqli_fetch_assoc($edit_qry);
}*/


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Student Registration	| <?php echo $SITE_NAME;?></title>
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

<body id="page-top" class="sidebar-toggled">

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
                <h1 class="h3 mb-2 text-gray-800">New Student Registration</h1>
              <!--  <p class="mb-4">New Student Registration	Form</p>-->


                <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


                    <!-- Select -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> <strong> Assign To Study Center / Referral ID  </strong></h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6  d-none">
                                            <label>Select Institute  </label>
                                            <div class="form-group mt-3">
                                              <div class="input-group mb-3">
                                                <select class="form-control  text-uppercase" name="ins_id" id="ins_id"      onChange="onchangeajax_get_sc(ins_id.value);">

                                                  <?php $sql=mysqli_query($DB_LINK,"select * from tbl_master_institute where a_fdl_id='".$_SESSION[ 'a_userid' ]."'   order by t_name asc") or die(mysqli_error());
                                                  foreach($sql as $state)
                                                  {
                                                    ?>
                                                    <option value="<?php echo $state['t_code'];?>" <?php  if(isset($_GET['edit']))  if($edit_data['ins_id']==$state['t_name']) { echo 'selected';   } ?>><?php echo $state['t_code'];?> <?php echo $state['t_name'];?></option>
                                                  <?php } ?>
                                                </select>

                                                <!--onblur="onchangeajax_for_ddl(this.value);"-->
                                               <!-- <input type="text" value="<?php /*  if(isset($_GET['edit'])) echo $edit_data['ins_id'];*/?>" name="ins_id" id="ins_id"     class="form-control text-uppercase"   aria-label="Institute Code"  placeholder="Institute Code" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-primary btn-primary text-white " type="button" onclick="onchangeajax_get_sc(ins_id.value);">Find</button>
                                                </div>-->
                                              </div>


                                            </div>

                                            <div class="form-group  " id="ref_d_info">
                                              <?php   if(isset($_GET['edit']))
                                              {

                                              }
                                              ?>
                                            </div>


                                        </div>
                                        <div class="col-sm-6">

                                          <div class="form-group btn-group">
                                            <label class="mr-2">Referral Type </label>

                                            <!--<div class="form-check mr-2">
                                              <label for="ref_typ_a" class="form-check-label">
                                                <input class="form-check-input" checked type="radio" id="ref_typ_a" name="ref_typ" value="sdl" required <?php /* if(isset($_GET['edit'])) {  if($edit_data['ref_typ']=="sdl") { echo 'checked';  } } else if($_SESSION[ 'user_role' ]=="SDL")  echo 'checked';*/?>>
                                                State  </label>
                                            </div>
                                            <div class="form-check mr-2">
                                              <label for="ref_typ_b" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_b" name="ref_typ" value="ddl" required <?php /* if(isset($_GET['edit'])) {  if($edit_data['ref_typ']=="ddl") { echo 'checked';  } } else if($_SESSION[ 'user_role' ]=="DDL")  echo 'checked';*/?>>
                                                District  </label>
                                            </div>
                                            <div class="form-check mr-3">
                                              <label for="ref_typ_c" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_c" name="ref_typ" value="fdl" required <?php /* if(isset($_GET['edit'])) { if($edit_data['ref_typ']=="fdl") { echo 'checked';  } } else if($_SESSION[ 'user_role' ]=="FDL")  echo 'checked';*/?>>
                                                Franchise  </label>
                                            </div>-->
                                             <div class="form-check mr-4">
                                              <label for="ref_typ_d" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_d" name="ref_typ" value="tl" required checked <?php /* if(isset($_GET['edit'])) if($edit_data['ref_typ']=="tl") { echo 'checked';  }*/?>>
                                                Faculty</label>
                                            </div>
                                            <!--<div class="form-check mr-5">
                                              <label for="ref_typ_e" class="form-check-label">
                                                <input class="form-check-input" type="radio" id="ref_typ_e" name="ref_typ" value="sl" required <?php /* if(isset($_GET['edit']))  { if($edit_data['ref_typ']=="sl") { echo 'checked';  } } else if($_SESSION[ 'user_role' ]=="SL")  echo 'checked'; */?>>
                                                Student</label>
                                            </div>-->
                                          </div>

                                            <div class="form-group">
                                              <div class="input-group mb-3">
                                                <!--onblur="onchangeajax_for_ddl(this.value);"-->
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['referral_code']; else echo $_SESSION[ 'a_userid' ];?>" name="ref_id" id="ref_id" required placeholder="Enter Referral ID *" class="form-control text-uppercase" placeholder="Destrict Director ID" aria-label="Destrict Director ID" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-primary btn-primary text-white " type="button" onclick="onchangeajax_get_ref(ref_id.value);">Find</button>
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
                          <h6 class="m-0 font-weight-bold text-primary"> <strong> Assign Course / Joining  </strong></h6>


                        </div>
                        <div class="card-body">
                          <div class="row clearfix">
                            <div class="col-sm-12">




                              <div class="form-group">

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label> Registration Type</label>
                                      <select class="form-control  text-uppercase" name="reg_typ" id="reg_typ"   required   >
                                        <option value="">--Select Registration Type--</option>
                                        <option value="Online" <?php  if(isset($_GET['edit']))  if($edit_data['reg_typ']=="Online") { echo 'selected';   } ?>>Online</option>
                                        <option value="Offline" <?php  if(isset($_GET['edit']))  if($edit_data['reg_typ']=="Offline") { echo 'selected';   } ?>>Offline</option>

                                      </select>

                                    </div>
                                  </div>


                                  <div class="col-sm-6">
                                    <label> Date of Admission </label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                      </div>

                                      <input readonly value="<?php   if(isset($_GET['edit'])) echo $edit_data['doj'];?>"  type="text"   class="form-control datepicker2 text-uppercase " aria-required="true"  name="doj" required placeholder="Please choose Date of Admission *" aria-label="Username" aria-describedby="basic-addon1">


                                    </div>

                                    <div class="input-append date">



                                    </div>
                                  </div>
                                </div>



                              </div>

                              <div class="form-group">

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label> Course Type</label>
                                      <select class="form-control  text-uppercase" name="c_typ" id="c_typ"   required  onChange="onchangeajax_for_course_cat(this.value);">
                                        <option value="">--Select Course Type--</option>
                                        <?php $sql=mysqli_query($DB_LINK,"select * from tbl_master_course_typ   order by t_name asc") or die(mysqli_error());
                                        foreach($sql as $state)
                                        {
                                          ?>
                                          <option value="<?php echo $state['t_name'];?>" <?php  if(isset($_GET['edit']))  if($edit_data['t_name']==$state['t_name']) { echo 'selected';   } ?>><?php echo $state['t_name'];?></option>
                                        <?php } ?>
                                      </select>

                                    </div>
                                  </div>


                                  <div class="col-sm-6"><label>Course Name</label>
                                    <div class="form-group" id="get_course">

                                      <select class="form-control  text-uppercase" name="c_code" id="c_code"   required  onChange="onchangeajax_for_course(this.value);">
                                        <option value="">--Select Course--</option>
                                        <?php $sql=mysqli_query($DB_LINK,"select * from tbl_master_course where status=1 order by c_name asc") or die(mysqli_error());
                                        foreach($sql as $state)
                                        {
                                          ?>
                                          <option value="<?php echo $state['c_code'];?>" <?php  if(isset($_GET['edit']))  if($edit_data['course_id']==$state['c_code']) { echo 'selected';   } ?>>[<?php echo $state['c_code'];?>] - <?php echo $state['c_sort_name'];?> - <?php echo $state['c_name'];?></option>
                                        <?php } ?>
                                      </select>

                                    </div>
                                  </div>
                                </div>



                              </div>

                              <div class="form-group  " id="course_info">
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
                          <h6 class="m-0 font-weight-bold text-primary">  Account  Basic Information  </strong> </h6>


                        </div>
                        <div class="card-body">
                          <div class="row clearfix">
                            <div class="col-sm-12">
                            <div class="row">


                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Select Title</label>

                                    <select class="form-control  text-uppercase " name="s_title" required>

                                      <option value="Mr" <?php   if(isset($_GET['edit'])) if($edit_data['s_title']=='Mr') echo 'selected'; ?>>Mr</option>
                                      <option value="Mrs" <?php   if(isset($_GET['edit'])) if($edit_data['s_title']=='Mrs') echo 'selected'; ?>>Mrs</option>
                                      <option value="Miss" <?php   if(isset($_GET['edit'])) if($edit_data['s_title']=='Miss') echo 'selected'; ?>>Miss</option>
                                    </select> </div>
                                </div>

                                  <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Enter First Name</label>
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['t_name'];?>" class="form-control text-uppercase" placeholder="Student First Name *" name="t_name" required >
                              </div>
                                  </div>


                                <div class="col-sm-3">
                                <div class="form-group">
                                  <label>Enter Middle Name</label>
                                  <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['m_name'];?>" class="form-control text-uppercase" placeholder="Student Middle Name " name="m_name"   >
                                </div>
                                </div>


                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Enter Last Name </label>
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['l_name'];?>" class="form-control text-uppercase" placeholder="Student Last Name  " name="l_name"  >
                              </div>
                              </div>

                            </div>

                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Enter Father Name</label>
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['f_name'];?>" class="form-control text-uppercase" placeholder="Father name *" name="f_name" required >

                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Enter Mother Name</label>
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['mot_name'];?>" class="form-control text-uppercase" placeholder="Mother name *" name="mot_name" required >

                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Enter Aadhar card no.</label>
                                    <input type="number" value="<?php   if(isset($_GET['edit'])) echo $edit_data['id_aadhar'];?>" class="form-control text-uppercase" placeholder="Aadhar Card No. *" name="id_aadhar"   >

                                  </div>
                                </div>

                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Enter PAN Card No.</label>
                                    <input type="text" maxlength="10" value="<?php   if(isset($_GET['edit'])) echo $edit_data['id_pan'];?>" class="form-control text-uppercase" placeholder="PAN Card No.  " name="id_pan"   >

                                  </div>
                                </div>

                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Select Gender</label>
                                    <select class="form-control  text-uppercase " name="gender" required>
                                      <option value="">-- Please select Gender * --</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control  text-uppercase " name="cat_name" required>
                                      <option value="">-- Please select Category * --</option>
                                      <option value="Gen">Gen</option>
                                      <option value="OBC">OBC</option>
                                      <option value="SC">SC</option>
                                      <option value="ST">ST</option>
                                    </select>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>Select Date Of Birth</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                      </div>

                                      <input readonly value="<?php   if(isset($_GET['edit'])) echo $edit_data['dob'];?>"  type="text" class="form-control datepicker text-uppercase " aria-required="true"  name="dob" required placeholder="Select Date Of Birth *" aria-label="Username" aria-describedby="basic-addon1">


                                    </div>

                                    <div class="input-append date">


                                    </div>
                                  </div>
                                </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">

                                      <label>Upload Student Photo</label>
                                      <input name="uploaded_file1" class="form-control" type="file" id="uploaded_file1">
 <small>(Best Resolution 150 X 150 )</small>
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
                                <label>Enter Full Address</label>
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['address'];?>" class="form-control text-uppercase" placeholder="  Full Address *" name="address" required="" aria-required="true" aria-invalid="true"  >
                              </div>








                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>Select State</label>
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
                                    <label>Select City</label>
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
                                    <label>Enter Pin Code</label>
                                    <input type="tel" minlength="6" maxlength="6" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pin'];?>" class="form-control  text-uppercase" placeholder="PinCode *" name="pin" required="" aria-required="true" aria-invalid="true"  >

                                  </div>
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
                          <h6 class="m-0 font-weight-bold text-primary">  Educational Qualification </strong></h6>


                        </div>
                        <div class="card-body">
                          <div class="row clearfix">

                            <div class="col-sm-12">
                              <div class="row ">
                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <label><small>HIGH SCHOOL</small></label>
                                  </div>
                                </div>

                                <div class="col-sm-3">
                                  <div class="form-group">
                                      <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['h_board']?>" class="form-control text-uppercase"  name="h_board"  placeholder=" Board / University " required="" aria-required="true" aria-invalid="true"  >
                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['h_year']?>" class="form-control text-uppercase"  name="h_year" placeholder="Year " required="" aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['h_enrol']?>" class="form-control text-uppercase"  name="h_enrol" placeholder="Enrollment No. " required="" aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['h_fmark'];?>" class="form-control text-uppercase"  name="h_fmark" placeholder=" Full Marks" required="" aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['h_omark'];?>" class="form-control text-uppercase"  name="h_omark" placeholder=" Obtain Marks" required="" aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['h_grade'];?>" class="form-control text-uppercase"  name="h_grade" placeholder=" Per%" required="" aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>



                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <label><small>INTERMEDIATE</small></label>
                                  </div>
                                </div>

                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['i_board'];?>" class="form-control text-uppercase"  name="i_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['i_year'];?>" class="form-control text-uppercase"  name="i_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['i_enrol'];?>" class="form-control text-uppercase"  name="i_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['i_fmark'];?>" class="form-control text-uppercase"  name="i_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['i_omark'];?>" class="form-control text-uppercase"  name="i_omark" placeholder=" Obtain Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['i_grade'];?>" class="form-control text-uppercase"  name="i_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>



                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <label><small>GRADUATION</small></label>
                                  </div>
                                </div>

                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['g_board'];?>" class="form-control text-uppercase"  name="g_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['g_year'];?>" class="form-control text-uppercase"  name="g_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['g_enrol'];?>" class="form-control text-uppercase"  name="g_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['g_fmark'];?>" class="form-control text-uppercase"  name="g_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['g_omark'];?>" class="form-control text-uppercase"  name="g_omark" placeholder=" Obtain Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['g_grade'];?>" class="form-control text-uppercase"  name="g_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>



                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <label><small>POST GRADUATION</small></label>
                                  </div>
                                </div>

                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pg_board'];?>" class="form-control text-uppercase"  name="pg_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pg_year'];?>" class="form-control text-uppercase"  name="pg_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pg_enrol'];?>" class="form-control text-uppercase"  name="pg_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pg_fmark']?>" class="form-control text-uppercase"  name="pg_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pg_omark'];?>" class="form-control text-uppercase"  name="pg_omark" placeholder=" Obtain Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['pg_grade'];?>" class="form-control text-uppercase"  name="pg_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>



                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <label><small>OTHER</small></label>
                                  </div>
                                </div>

                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['o_board'];?>" class="form-control text-uppercase"  name="o_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['o_year'];?>" class="form-control text-uppercase"  name="o_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['o_enrol'];?>" class="form-control text-uppercase"  name="o_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['o_fmark'];?>" class="form-control text-uppercase"  name="o_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['o_omark'];?>" class="form-control text-uppercase"  name="o_omark" placeholder="  Obtain Marks"   aria-required="true" aria-invalid="true"  >

                                  </div>
                                </div>

                                <div class="col-sm-1">
                                  <div class="form-group">
                                    <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['o_grade'];?>" class="form-control text-uppercase"  name="o_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

                                  </div>
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
                          <h6 class="m-0 font-weight-bold text-primary">  Account Contact / Login Information   </strong></h6>


                        </div>
                        <div class="card-body">
                          <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group ">
                                <label>Enter Mobile No </label>
                                <input type="tel" minlength="10" maxlength="10" value="<?php   if(isset($_GET['edit'])) echo $edit_data['mobile'];?>" class="form-control  text-uppercase" placeholder="Mobile No *" name="mobile"  aria-required="true" aria-invalid="true"  >
                              </div>
                              <div class="form-group">
                                <label>Enter E-mail Id</label>
                                <input type="email" value="<?php   if(isset($_GET['edit'])) echo $edit_data['email'];?>" class="form-control text-uppercase" placeholder="Email Id  " name="email"     >
                              </div>
                              <div class="form-group  ">
                                <label>  Enter Password </label>
                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo dec($edit_data['pass']);?>" class="form-control  text-uppercase" placeholder="Password * " required name="pass"  maxlength="10" minlength="3" required >
                              </div>
                              <div class="form-group  ">
                              <label> <input type="checkbox" name="chk" required> I have read all the rule and regulation of the institute and admission of the course applied for I declare that the above information is true and correct to my knowledge and belief and fully understand that my admission will be cancelled if any information by me is found to be false or twisted.</label>
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
