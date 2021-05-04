<?php
require_once("../con_base/functions.inc.php");

$c_typ=strtoupper(trim($_POST['c_typ']));
$c_name =ucwords(trim($_POST['c_name']));
$c_sort_name =strtoupper(trim($_POST['c_sort_name']));
$c_code =strtoupper(trim($_POST['c_code']));
$c_dur =(trim($_POST['c_dur']));
$c_dur_typ  =(trim($_POST['c_dur_typ']));
$eligi =ucwords(trim($_POST['eligi']));
$detail =ucwords(trim($_POST['detail']));
$c_fee =ucwords(trim($_POST['c_fee']));
$sdl_ref_inc =ucwords(trim($_POST['sdl_ref_inc']));
$ddl_ref_inc =ucwords(trim($_POST['ddl_ref_inc']));
$fl_ref_inc =ucwords(trim($_POST['fl_ref_inc']));
$tl_ref_inc =ucwords(trim($_POST['tl_ref_inc']));
$sl_ref_inc =ucwords(trim($_POST['sl_ref_inc']));
$team_inc =ucwords(trim($_POST['team_inc']));

$ip=get_ip();


 if(isset($_POST['save']))
{
            $sql_reg="insert into tbl_master_course set              
            `c_typ`='$c_typ',            
            `c_name`='$c_name',            
            `c_sort_name`='$c_sort_name',            
            `c_code`='$c_code',            
            `c_dur`='$c_dur',            
            `c_dur_typ`='$c_dur_typ',            
            `eligi`='$eligi',            
            `detail`='$detail',            
            `c_fee`='$c_fee',            
            `sdl_ref_inc`='$sdl_ref_inc',            
            `ddl_ref_inc`='$ddl_ref_inc',            
            `fl_ref_inc`='$fl_ref_inc',            
            `tl_ref_inc`='$tl_ref_inc',            
            `sl_ref_inc`='$sl_ref_inc',            
            `team_inc`='$team_inc',            
            `status`='0',              
            `ipaddress` ='$ip'  ";

        if(mysqli_query($DB_LINK,$sql_reg))
        {

             $_SESSION['msg']=array('success', 'Data Saved Successfully');
             header("Location: master_course.php");
            exit;
        }
        else	{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }
}

 if(isset($_POST['update']))
{
    $c_id = (trim($_POST['c_id']));



    $sql_update="update tbl_master_course set              
            `c_typ`='$c_typ',            
            `c_name`='$c_name',            
            `c_sort_name`='$c_sort_name',            
            `c_code`='$c_code',            
            `c_dur`='$c_dur',            
            `c_dur_typ`='$c_dur_typ',            
            `eligi`='$eligi',            
            `detail`='$detail',            
            `c_fee`='$c_fee',            
            `sdl_ref_inc`='$sdl_ref_inc',            
            `ddl_ref_inc`='$ddl_ref_inc',            
            `fl_ref_inc`='$fl_ref_inc',            
            `tl_ref_inc`='$tl_ref_inc',            
            `sl_ref_inc`='$sl_ref_inc',            
            `team_inc`='$team_inc'
             where id='$c_id'
             ";

        if(mysqli_query($DB_LINK,$sql_update))
        {

             $_SESSION['msg']=array('success', 'Data Updated Successfully');
             header("Location: master_course.php");
            exit;
        }
        else	{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }
}

if(isset($_GET['edit']))
{
    $sql_reg="select * from  tbl_master_course where id= '".trim($_GET['edit'])."'";
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

    <title>New Course 	| <?php echo $SITE_NAME;?></title>
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
                <h1 class="h3 mb-2 text-gray-800">New Course </h1>
              <!--  <p class="mb-4">New Course Type	Form</p>-->


                <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


                    <!-- Select -->

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> <strong> Basic Info   </strong></h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control  text-uppercase" name="c_typ" id="c_typ"   required>
                                                    <option value="">--Select Course Type--</option>
                                                    <?php $sql=mysqli_query($DB_LINK,"select * from tbl_master_course_typ where status='1' order by t_name asc") or die(mysqli_error());
                                                    foreach($sql as $state)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $state['t_name'];?>" <?php  if(isset($_GET['edit'])) if($edit_data['c_typ']==$state['t_name']) { echo 'selected';   } ?>><?php echo $state['t_name'];?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['c_name'];?>" class="form-control text-uppercase" placeholder="Course name *" name="c_name" required >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['c_sort_name'];?>" class="form-control text-uppercase" placeholder="Course Sort name *" name="c_sort_name" required >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['c_code'];?>" class="form-control text-uppercase" placeholder="Course Code *" name="c_code" required >
                                            </div>
                                            <div class="form-group btn-group">
                                            <label class="mr-2">Time</label>

                                                <div class="form-check mr-2">
                                                    <label for="c_dur_typ_a" class="form-check-label"><input class="form-check-input" checked type="radio" id="c_dur_typ_a" name="c_dur_typ" value="M" required <?php  if(isset($_GET['edit'])) if($edit_data['c_dur_typ']=="M") { echo 'checked';  }?>> Month</label>
                                                </div>
                                                <div class="form-check mr-2">
                                                    <label for="c_dur_typ_b" class="form-check-label"><input class="form-check-input" type="radio" id="c_dur_typ_b" name="c_dur_typ" value="Y" required <?php  if(isset($_GET['edit'])) if($edit_data['c_dur_typ']=="Y") { echo 'checked';  }?>> Year</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="btn-group mr-2">
                                                    <select class="form-control mr-2 text-uppercase" name="c_dur" id="c_dur"   required>
                                                        <option value="">--Duration--</option>
                                                        <?php
                                                        for ( $i=1;$i<=48;$i++)
                                                        {
                                                            ?>
                                                            <option value="<?php echo  $i;?>" <?php   if(isset($_GET['edit'])) if($edit_data['c_dur']==$i)   { echo 'selected';   } ?>><?php echo  $i;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['eligi'];?>" class="form-control text-uppercase" placeholder="Course Eligibility  *" name="eligi" required >
                                            </div>
                                            <div class="form-group">
                                                <textarea  class="form-control text-uppercase" placeholder="Course Detail" name="detail"   ><?php   if(isset($_GET['edit'])) echo $edit_data['detail'];?></textarea>
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
                                    <h6 class="m-0 font-weight-bold text-primary">   Commission Information  </strong> </h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="number"  class="form-control text-uppercase" placeholder="State Director Referral Income " name="sdl_ref_inc"  value="<?php   if(isset($_GET['edit'])) echo $edit_data['sdl_ref_inc'];?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="number"  class="form-control text-uppercase" placeholder="District Director Referral Income " name="ddl_ref_inc" value="<?php   if(isset($_GET['edit'])) echo $edit_data['ddl_ref_inc'];?>">
                                            </div>
                                             <div class="form-group">
                                                <input type="number"  class="form-control text-uppercase" placeholder="Franchise Director Referral Income " name="fl_ref_inc" value="<?php   if(isset($_GET['edit'])) echo $edit_data['fl_ref_inc'];?>">
                                            </div>

                                             <div class="form-group">
                                                <input type="number"  class="form-control text-uppercase" placeholder="Teacher Referral Income " name="tl_ref_inc" value="<?php   if(isset($_GET['edit'])) echo $edit_data['tl_ref_inc'];?>">
                                            </div>
                                             <div class="form-group">
                                                <input type="number"  class="form-control text-uppercase" placeholder="Student Referral Income " name="sl_ref_inc" value="<?php   if(isset($_GET['edit'])) echo $edit_data['sl_ref_inc'];?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="number"  class="form-control text-uppercase" placeholder="Team Distribution Income " name="team_inc" value="<?php   if(isset($_GET['edit'])) echo $edit_data['team_inc'];?>">
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
                                    <h6 class="m-0 font-weight-bold text-primary">   Fee Information  </strong> </h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="number" value="<?php   if(isset($_GET['edit'])) echo $edit_data['c_fee'];?>" class="form-control text-uppercase" placeholder="Course Fees *" name="c_fee" required >
                                            </div>
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
