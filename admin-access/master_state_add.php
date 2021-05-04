<?php
require_once("../con_base/functions.inc.php");
if(isset($_POST['save']))
{
    $state=strtoupper(trim($_POST['state']));
    $sort_code=strtoupper(trim($_POST['sort_code']));
    $ip=get_ip();

            $sql_reg="insert into state set              
            `state`='$state',            
            `sort_code`='$sort_code',            
            `status`=0   ";

        if(mysqli_query($DB_LINK,$sql_reg))
        {

             $_SESSION['msg']=array('success', 'Data Saved Successfully');
             header("Location: master_state.php");
            exit;
        }
        else{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }
}
if(isset($_POST['update']))
{
    $state_id=strtoupper(trim($_POST['state_id']));
    $state=strtoupper(trim($_POST['state']));
    $sort_code=strtoupper(trim($_POST['sort_code']));
    $ip=get_ip();

              $sql_reg="update `state` set              
            `state`='$state',            
            `sort_code`='$sort_code' 
            where state_id='".$state_id."'
               ";


        if(mysqli_query($DB_LINK,$sql_reg))
        {

             $_SESSION['msg']=array('success', 'Data Updated Successfully');
             header("Location: master_state.php");
            exit;
        }
        else{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }
}

if(isset($_GET['edit']))
{
    $sql_reg="select * from  state where state_id= '".trim($_GET['edit'])."'";
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

    <title>State Master	| <?php echo $SITE_NAME;?></title>
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
                <h1 class="h3 mb-2 text-gray-800">State Master</h1>
              <!--  <p class="mb-4">State Master	Form</p>-->


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
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['state'];?>" class="form-control text-uppercase" placeholder="State Name *" name="state" required >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['sort_code'];?>" class="form-control text-uppercase" placeholder="State Sort Name *" name="sort_code" required >
                                            </div>
                                            <div class="form-group  ">

                                                <?php   if(isset($_GET['edit'])) { ?>
                                                    <input type="hidden" value="<?php   if(isset($_GET['edit'])) echo $edit_data['state_id'];?>"  name="state_id"   >
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
