<?php
require_once("../con_base/functions.inc.php");
if(isset($_POST['save']))
{

    $a_sdl_id=(trim($_POST['a_sdl_id']));
    $t_name=strtoupper(trim($_POST['t_name']));
    $mobile=$_POST['mobile'];
    $email=($_POST['email']);
    $pass=enc($_POST['pass']);
    $address=(trim($_POST['address'])) ;
    $pincode=(trim($_POST['pin'])) ;
    $state_id=(trim($_POST['state_id']));
    $city_id=(trim($_POST['city_id']));
    $a_city_id=(trim($_POST['a_city_id']));
    $validity=(trim($_POST['validity']));

    $a_state_id=(trim($_POST['a_state_id']));
    $a_state_name=(trim($_POST['a_state_name']));
    $ip=get_ip();


    ///Image Setup
    $finame ="";
    require_once("uploader-file-master.php");
    $i1='';

    if (isset($_FILES['uploaded_file1']))
    {
        uploadmaster("../upload/ddl_data/image/", 'uploaded_file1');
        if ($finame != '')
        {
            $f1= $finame;
            $i1=",image='$f1' ";
        }
    }

    ////State City Data/////
    ///
     if ($_POST['a_sdl_id'] != '')	{
         $sqlst = mysqli_query($DB_LINK, "select t_name  from tbl_team_state where user='" . $_POST['a_sdl_id'] . "'") or die(mysqli_error());
         $datas_name = mysqli_fetch_array($sqlst);
         $a_sdl_name  = $datas_name['t_name'];
         $state_code=substr($_POST['a_sdl_id'],0,2);

     }
    if ($_POST['state_id'] != '')	{
        $sqlst = mysqli_query($DB_LINK, "select state from state where state_id='" . $_POST['state_id'] . "'") or die(mysqli_error());
        $datas_name = mysqli_fetch_array($sqlst);
        $state = $datas_name['state'];
    }
    if ($_POST['city_id'] != '')	{
        $sqlct = mysqli_query($DB_LINK, "select city from city where city_id='" . $_POST['city_id'] . "'") or die(mysqli_error());
        $datac_name = mysqli_fetch_array($sqlct);
        $city = $datac_name['city'];
    }

    if ($_POST['a_city_id'] != '')	{
        $sqlct = mysqli_query($DB_LINK, "select city from city where city_id='" . $_POST['a_city_id'] . "'") or die(mysqli_error());
        $datac_name = mysqli_fetch_array($sqlct);
        $a_city = $datac_name['city'];
    }

    /////Get New id/////
	$new_id=$state_code.''.$_POST['city_id'].'/'.rand(100000,999999);


            $sql_reg="insert into tbl_team_city set 
            `user`='$new_id',
            `pass`='$pass', 
            `t_name`='$t_name',
            `mobile`='$mobile',
            `email`='$email',
            `address`='$address',
            `a_sdl_id`='$a_sdl_id',
            `a_sdl_name`='$a_sdl_name', 
            `state_id`='$state_id',
            `state_name`='$state',
            `city_id`='$city_id',
            `city_name`='$city',
            `a_city_id`='$a_city_id',
            `a_city_name`='$a_city',
            `a_state_id`='$a_state_id',
            `a_state_name`='$a_state_name', 
            `pin`='$pincode',
            `status`=0, 
            `validity`='$validity',             
            `ipaddress` ='$ip' $i1 ";

        if(mysqli_query($DB_LINK,$sql_reg))
        {
            //Mail is attached on page
            $text='Congratulation your registration is successfully completed with name '.$t_name.' your login ID- '.$new_id.' Password- '.dec($pass).' Warm Regards '.$SITE_NAME ;
            mail_sender($email,"yes",$text,$t_name,"District Director Registration : AFCT " );
            $_SESSION['msg']=array('success', 'Registration Successfully completed your login ID- '.$new_id.' Password- '.dec($pass));
             header("Location: team_city_add.php");
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

    <title>New District Director Registration	| <?php echo $SITE_NAME;?></title>
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
                <h1 class="h3 mb-2 text-gray-800">New District Director Registration</h1>
              <!--  <p class="mb-4">New District Director Registration	Form</p>-->


                <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


                    <!-- Select -->

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> <strong> Assign To State Director  </strong></h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">


                                            <div class="form-group">
                                                <select class="form-control  text-uppercase" name="a_sdl_id" id="a_sdl_id"   required  onChange="onchangeajax_for_sdl(this.value);">
                                                    <option value="">--Select State Director--</option>
                                                    <?php $sql=mysqli_query($DB_LINK,"select * from tbl_team_state where status=1 order by user asc") or die(mysqli_error());
                                                    foreach($sql as $state)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $state['user'];?>" <?php /*if('34'==$state['state_id']) { echo 'selected';   }*/?>><?php echo $state['user'];?> - <?php echo $state['t_name'];?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                            <div class="form-group  ">
                                                <div id="city_upd_by_sdl">
                                                    <select name=a_city_id" id="a_city_id" class="form-control  text-uppercase" required>
                                                        <option value="">--Assign To City Related To State Director--</option>

                                                    </select>
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
                                    <h6 class="m-0 font-weight-bold text-primary">  Account  Basic Information  </strong> </h6>


                                </div>
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" value="" class="form-control text-uppercase" placeholder="Member name *" name="t_name" required >
                                            </div>

                                            <div class="form-group">
                                                <label>Select Image</label>
                                                <input name="uploaded_file1" class="form-control" type="file" id="uploaded_file1">

                                                (For Best resolution use resolution 150 X 150 )     </div>

                                            <div class="form-group  ">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                                    </div>

                                                    <input readonly type="text" class="form-control datepicker text-uppercase " aria-required="true"  name="validity" required placeholder="Please choose Date Of Validity *" aria-label="Username" aria-describedby="basic-addon1">


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
                                                <input type="text" value="" class="form-control text-uppercase" placeholder="Enter Full Address *" name="address" required="" aria-required="true" aria-invalid="true"  >
                                            </div>
                                            <div class="form-group  ">
                                                <select class="form-control  text-uppercase" name="state_id" id="state_id" onChange="onchangeajax(this.value);" required>
                                                    <option value="">--Select State--</option>
                                                    <?php $sql=mysqli_query($DB_LINK,"select * from state where status=1 order by state") or die(mysqli_error());
                                                    foreach($sql as $state)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $state['state_id'];?>" <?php /*if('34'==$state['state_id']) { echo 'selected';   }*/?>><?php echo $state['state'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group  ">
                                                <div id="city_upd">
                                                    <select name="city_id" id="city_id" class="form-control  text-uppercase" required>
                                                        <option value="">--Select City--</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group  mt-2">
                                                <input type="tel" minlength="6" maxlength="6" value="" class="form-control  text-uppercase" placeholder="PinCode *" name="pin" required="" aria-required="true" aria-invalid="true"  >
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
                                                <input type="tel" minlength="10" maxlength="10" value="" class="form-control  text-uppercase" placeholder="Mobile No *" name="mobile" required="" aria-required="true" aria-invalid="true"  >
                                            </div>
                                            <div class="form-group">
                                                <input type="email" value="" class="form-control text-uppercase" placeholder="Email Id  " name="email"     >
                                            </div>
                                            <div class="form-group  ">
                                                <input type="text" value="" class="form-control  text-uppercase" placeholder="Password * " name="pass"  maxlength="10" minlength="3" required >
                                            </div>
                                            <div class="form-group  ">
                                                <button class="btn float-right btn-raised btn-primary btn-round waves-effect" type="submit" name="save">Register Now</button>

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
