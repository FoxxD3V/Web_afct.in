<?php
require_once("../con_base/functions.inc.php");

if(isset($_POST['update']))
{
  $c_id = (trim($_POST['c_id']));
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






    $sql_reg="update tbl_team_student set 
             
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

  <title>Educational Qualification | <?php echo $SITE_NAME;?></title>
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
        <h1 class="h3 mb-2 text-gray-800">Educational Qualification</h1>
        <!--  <p class="mb-4"> My Profile	Form</p>-->
        <?php
        $sql_reg="select * from  tbl_team_student where   id= '".trim($_SESSION[ 'a_id' ])."'";
        $edit_qry=mysqli_query($DB_LINK,$sql_reg);
        $edit_data=mysqli_fetch_assoc($edit_qry);  ?>


        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">


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
                      <div class="row">
                        <div class="col-sm-1">
                          <div class="form-group ">
                            <label ><small>QUALIFICATION</small></label>
                          </div>
                        </div>

                        <div class="col-sm-3">
                          <div class="form-group text-center">
                            <label><small>BOARD / UNIVERSITY NAME</small></label>
                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group text-center">
                            <label><small>YEAR</small></label>
                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group text-center">
                            <label><small>ENROLLMENT NO.</small></label>
                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group text-center">
                            <label><small>FULL MARKS</small></label>
                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group text-center">
                            <label><small>OBTAINED MARKS</small></label>
                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <label><small>Per(%) / GRADE </small></label>
                          </div>
                        </div>



                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="row ">
                        <div class="col-sm-1">
                          <div class="form-group">
                            <label><small>HIGH SCHOOL</small></label>
                          </div>
                        </div>

                        <div class="col-sm-3">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['h_board']?>" class="form-control text-uppercase"  name="h_board"  placeholder=" Board / University " required="" aria-required="true" aria-invalid="true"  >
                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['h_year']?>" class="form-control text-uppercase"  name="h_year" placeholder="Year " required="" aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['h_enrol']?>" class="form-control text-uppercase"  name="h_enrol" placeholder="Enrollment No. " required="" aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['h_fmark'];?>" class="form-control text-uppercase"  name="h_fmark" placeholder=" Full Marks" required="" aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['h_omark'];?>" class="form-control text-uppercase"  name="h_omark" placeholder=" Obtain Marks" required="" aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['h_grade'];?>" class="form-control text-uppercase"  name="h_grade" placeholder=" Per%" required="" aria-required="true" aria-invalid="true"  >

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
                            <input type="text" value="<?php    echo $edit_data['i_board'];?>" class="form-control text-uppercase"  name="i_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['i_year'];?>" class="form-control text-uppercase"  name="i_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['i_enrol'];?>" class="form-control text-uppercase"  name="i_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['i_fmark'];?>" class="form-control text-uppercase"  name="i_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['i_omark'];?>" class="form-control text-uppercase"  name="i_omark" placeholder=" Obtain Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['i_grade'];?>" class="form-control text-uppercase"  name="i_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

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
                            <input type="text" value="<?php    echo $edit_data['g_board'];?>" class="form-control text-uppercase"  name="g_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['g_year'];?>" class="form-control text-uppercase"  name="g_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['g_enrol'];?>" class="form-control text-uppercase"  name="g_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['g_fmark'];?>" class="form-control text-uppercase"  name="g_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['g_omark'];?>" class="form-control text-uppercase"  name="g_omark" placeholder=" Obtain Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['g_grade'];?>" class="form-control text-uppercase"  name="g_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

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
                            <input type="text" value="<?php    echo $edit_data['pg_board'];?>" class="form-control text-uppercase"  name="pg_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['pg_year'];?>" class="form-control text-uppercase"  name="pg_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['pg_enrol'];?>" class="form-control text-uppercase"  name="pg_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['pg_fmark']?>" class="form-control text-uppercase"  name="pg_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['pg_omark'];?>" class="form-control text-uppercase"  name="pg_omark" placeholder=" Obtain Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['pg_grade'];?>" class="form-control text-uppercase"  name="pg_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

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
                            <input type="text" value="<?php    echo $edit_data['o_board'];?>" class="form-control text-uppercase"  name="o_board" placeholder=" Board / University "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['o_year'];?>" class="form-control text-uppercase"  name="o_year" placeholder="Year "   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['o_enrol'];?>" class="form-control text-uppercase"  name="o_enrol" placeholder="Enrollment No. "  aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['o_fmark'];?>" class="form-control text-uppercase"  name="o_fmark" placeholder=" Full Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['o_omark'];?>" class="form-control text-uppercase"  name="o_omark" placeholder="  Obtain Marks"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <input type="text" value="<?php    echo $edit_data['o_grade'];?>" class="form-control text-uppercase"  name="o_grade" placeholder=" Per%"   aria-required="true" aria-invalid="true"  >

                          </div>
                        </div>



                      </div>
                    </div>


                  </div>
                  <div class="form-group  ">

                    <input type="hidden" value="<?php      echo  ($edit_data['id']); ?>"     name="c_id"     >


                    <button class="btn float-right btn-raised btn-primary btn-round waves-effect" type="submit" name="update">Update Details</button>


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
