<?php
require_once("../con_base/functions.inc.php");
if(isset($_POST['save']))
{
    $state_id=strtoupper(trim($_POST['state_id']));
    $city=strtoupper(trim($_POST['city']));
  $sql_reg="select * from  state where state_id= '".trim($_POST['state_id'])."'";
  $edit_qry=mysqli_query($DB_LINK,$sql_reg);
  $edit_data=mysqli_fetch_assoc($edit_qry);
  $state_name=$edit_data['state'];


            $sql_reg="insert into city set              
            `state_id`='$state_id',            
            `state_name`='$state_name',            
            `city`='$city',            
            `status`=0   ";

        if(mysqli_query($DB_LINK,$sql_reg))
        {

             $_SESSION['msg']=array('success', 'Data Saved Successfully');
             header("Location: master_city.php");
            exit;
        }
        else{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }
}
if(isset($_POST['update']))
{
  $state_id=strtoupper(trim($_POST['state_id']));
  $city=strtoupper(trim($_POST['city']));
  $sql_reg="select * from  state where state_id= '".trim($_POST['state_id'])."'";
  $edit_qry=mysqli_query($DB_LINK,$sql_reg);
  $edit_data=mysqli_fetch_assoc($edit_qry);
  $state_name=$edit_data['state'];

              $sql_reg="update `city` set              
            `city`='$city',            
            `state_id`='$state_id',            
            `state_name`='$state_name',  
            where city_id='".$city_id."'
               ";


        if(mysqli_query($DB_LINK,$sql_reg))
        {

             $_SESSION['msg']=array('success', 'Data Updated Successfully');
             header("Location: master_city.php");
            exit;
        }
        else{
            $_SESSION['msg'] = array('error', 'Something went wrong !!!');
        }
}

if(isset($_GET['edit']))
{
    $sql_reg="select * from  city where city_id= '".trim($_GET['edit'])."'";
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

    <title>City Master	| <?php echo $SITE_NAME;?></title>
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
                <h1 class="h3 mb-2 text-gray-800">City Master</h1>
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
                                              <select class="form-control  text-uppercase" name="state_id" id="state_id"   required>
                                                <option value="">--Select State--</option>
                                                <?php $sql=mysqli_query($DB_LINK,"select * from state where status=1 order by state") or die(mysqli_error());
                                                foreach($sql as $state)
                                                {
                                                  ?>
                                                  <option value="<?php echo $state['state_id'];?>" <?php if(isset($_GET['edit'])) if($edit_data['state_id']==$state['state_id']) { echo 'selected';   } ?>><?php echo $state['state'];?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php   if(isset($_GET['edit'])) echo $edit_data['city'];?>" class="form-control text-uppercase" placeholder="City Name *" name="city" required >
                                            </div>

                                            <div class="form-group  ">

                                                <?php   if(isset($_GET['edit'])) { ?>
                                                    <input type="hidden" value="<?php   if(isset($_GET['edit'])) echo $edit_data['city_id'];?>"  name="city_id"   >
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
