<?php
require_once("../con_base/functions.inc.php");

 if(isset($_POST['save']))
{
require_once("uploader-file-master_vid.php");
if (isset($_FILES['uploaded_file']))
{
  uploadmaster("../upload/content/video/", 'uploaded_file');
  if ($finame != '') {
    $f1 = $finame;

    if ($_POST['c_code'] != '') {
      $sqlct = mysqli_query($DB_LINK, "select  * from  tbl_master_course where c_code='" . $_POST['c_code'] . "'") or die(mysqli_error());
      $datac_name = mysqli_fetch_array($sqlct);
      $c_name = $datac_name['c_name'];
      $c_sort_name = $datac_name['c_sort_name'];
    }

    $c_typ = strtoupper(trim($_POST['c_typ']));
    $c_code = strtoupper(trim($_POST['c_code']));
    $topic_name = (trim($_POST['topic_name']));
    $topic_summary = (trim($_POST['topic_summary']));
    $csd = (trim($_POST['csd']));
    $cst = (trim($_POST['cst']));
    $state_id  =0;// (trim($_POST['state_id']));
    $state_name="All State";
    /*if($state_id!=0) {
      $sql_reg = "select * from  state where state_id= '" . trim($state_id) . "'";
      $edit_qry = mysqli_query($DB_LINK, $sql_reg);
      $edit_data = mysqli_fetch_assoc($edit_qry);
      $state_name = $edit_data['state'];
    }*/


    $ip = get_ip();
    $sql_reg = "insert into  tbl_master_course_content set              
            `c_typ`='$c_typ',            
            `c_name`='$c_name',            
            `c_sort_name`='$c_sort_name',            
            `c_code`='$c_code',            
            `csd`='$csd',            
            `cst`='$cst',            
            `state_id`='$state_id',            
            `state_name`='$state_name',            
            `topic_name`='$topic_name',            
            `topic_summary`='$topic_summary',  
            `video`='$f1',  
             posted_by='".$_SESSION[ 'a_userid' ]."',
             posted_by_type ='".strtolower($_SESSION[ 'user_role' ])."' ,
             `status`='0',              
            `ipaddress` ='$ip'  ";

    if (mysqli_query($DB_LINK, $sql_reg)) {
      $_SESSION['msg'] = array('success', 'Data Saved Successfully');
      header("Location: master_course_content.php");
      exit;
    } else {
      $_SESSION['msg'] = array('error', 'Something went wrong !!!');
    }
  }
  else {
    $_SESSION['msg'] = array('error', 'No File Updated !!!');
  }
}
else {
  $_SESSION['msg'] = array('error', 'Select Video File !!!');
}
}
if(isset($_POST['update']))
{





      $topic_name = (trim($_POST['topic_name']));
      $c_id = (trim($_POST['c_id']));
      $topic_summary = (trim($_POST['topic_summary']));
      $csd = (trim($_POST['csd']));
      $cst = (trim($_POST['cst']));
      $state_id  =0; // (trim($_POST['state_id']));
      $state_name="All State";
     /* if($state_id!=0) {
        $sql_reg = "select * from  state where state_id= '" . trim($state_id) . "'";
        $edit_qry = mysqli_query($DB_LINK, $sql_reg);
        $edit_data = mysqli_fetch_assoc($edit_qry);
        $state_name = $edit_data['state'];
      }*/


      $ip = get_ip();
       $sql_reg = "update  tbl_master_course_content set             
            `csd`='$csd',            
            `cst`='$cst',            
            `state_id`='$state_id',            
            `state_name`='$state_name',            
            `topic_name`='$topic_name',            
            `topic_summary`='$topic_summary',         
             `ipaddress` ='$ip' where id='$c_id'
              ";



      if (mysqli_query($DB_LINK, $sql_reg)) {
        $_SESSION['msg'] = array('success', 'Data Saved Successfully');
        header("Location: master_course_content.php");
        exit;
      } else {
        $_SESSION['msg'] = array('error', 'Something went wrong !!!');
      }
    }






if(isset($_GET['edit']))
{
    $sql_reg="select * from  tbl_master_course_content where id= '".trim($_GET['edit'])."'";
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

    <title>New Course Content	| <?php echo $SITE_NAME;?></title>
    <?php include("include/top.php");?>
  <link href="../core/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!--	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">--><!--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet">-->

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
                <h1 class="h3 mb-2 text-gray-800">New Course Content</h1>
              <!--  <p class="mb-4">New Course Type	Form</p>-->


                <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


                    <!-- Select -->

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> <strong> Basic Info and topic / content info  </strong></h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
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
                                                      <option value="<?php echo $state['t_name'];?>" <?php  if(isset($_GET['edit']))  if($edit_data['c_typ']==$state['t_name']) { echo 'selected';   } ?>><?php echo $state['t_name'];?></option>
                                                    <?php } ?>
                                                  </select>

                                                </div>
                                              </div>


                                              <div class="col-sm-6"><label>Course Name</label>
                                                <div class="form-group" id="get_course">

                                                  <select class="form-control  text-uppercase" name="c_code" id="c_code"   required  onChange="onchangeajax_for_course(this.value);">
                                                    <option value="">--Select Course--</option>
                                                    <?php if(isset($_GET['edit']))
                                                    {
                                                        $qry="select * from tbl_master_course where status='1' and c_typ ='".$edit_data['c_typ']."' order by c_name asc";

                                                      $sql=mysqli_query($DB_LINK,$qry) or die(mysqli_error());

                                                    foreach($sql as $state)
                                                    {
                                                      ?>
                                                      <option value="<?php echo $state['c_code'];?>" <?php  if(isset($_GET['edit']))  if($edit_data['c_code']==$state['c_code']) { echo 'selected';   } ?>>[<?php echo $state['c_code'];?>] - <?php echo $state['c_sort_name'];?> - <?php echo $state['c_name'];?></option>
                                                    <?php } } ?>
                                                  </select>

                                                </div>
                                              </div>
                                            </div>



                                          </div>
                                          <div class="form-group">

                                            <div class="row">
                                              <div class="col-sm-6">

                                                <div class="form-group">
                                                  <label for="id_end_time">Class Start Date</label>
                                                  <div class="input-group date" id="id_4">
                                                    <input type="text" name="csd" value="<?php   if(isset($_GET['edit'])) echo $edit_data['csd'];?>"   class="form-control" required/>
                                                    <div class="input-group-addon input-group-append">
                                                      <div class="input-group-text">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                  <label for="id_end_time">Class Start Time</label>
                                                  <div class="input-group date" id="id_3">
                                                    <input type="text" name="cst"  value="<?php   if(isset($_GET['edit'])) echo $edit_data['cst'];?>"   class="form-control"    required id="id_end_time"/>
                                                    <div class="input-group-addon input-group-append">
                                                      <div class="input-group-text">
                                                        <i class="   fas fa-clock"></i>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                                </div>
                                              </div>
                                      





                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['topic_name'];?>" class="form-control text-uppercase" placeholder="Topic Name  *" name="topic_name" required >
                                            </div>
                                            <div class="form-group">
                                              <textarea  class="form-control text-uppercase" placeholder="Topic Detail" name="topic_summary" id="editor"   ><?php   if(isset($_GET['edit'])) echo $edit_data['topic_summary'];?></textarea>
                                            </div>
                                          <?php if(!isset($_GET['edit'])){ ?>
                                            <div class="form-group row">
                                            <label  class="col-sm-4 col-form-label">
                                              Select Video File (MP4):
                                            </label>
                                            <div class="col-sm-8">
                                              <input
                                               type="file"
                                               name="uploaded_file"
                                               id="uploaded_file" required
                                              >
                                              Imp : Not More Then 30MB
                                            </div>
                                          </div> <?php } ?>

                                          <div class="form-group  ">
                                            <?php   if(isset($_GET['edit'])) { ?>
                                              <input type="hidden" value="<?php   if(isset($_GET['edit'])) echo $edit_data['id'];?>"  name="c_id"   >
                                              <button class="btn float-right btn-raised btn-success btn-round waves-effect" type="submit" name="update">Update Now</button>

                                            <?php }
                                            else { ?>
                                              <button class="btn float-right btn-raised btn-primary btn-round waves-effect" type="submit" name="save">Save Now</button>
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
      <?php include("include/ckeditor.php");?>
        <!-- End of Footer -->

      </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include("include/last.php");?>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>

<script type="text/javascript" src="../core/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


<!--		  Page level plugins -->
<!--		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>-->

<!-- Page level custom scripts --
<script src="core/js/demo/datatables-demo.js"></script>--><!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->



<script>


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

    (function($){
        $(function(){


            $('#id_3').datetimepicker({
                "allowInputToggle": true,
                "showClose": true,
                "showClear": true,
                "showTodayButton": true,
                "format": "HH:mm:00",
            });
            $('#id_4').datetimepicker({
                "allowInputToggle": true,
                "showClose": true,
                "showClear": true,
                "showTodayButton": true,
                "format": "YYYY-MM-DD",
            });
        });
    })(jQuery);
</script>
</body>

</html>
