<?php
require_once("../con_base/functions.inc.php");
if(isset($_GET['id']))
{
  $sql_reg="select * from  tbl_master_course_content where id= '".trim($_GET['id'])."'";
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

  <title>Course Content Video | <?php echo $SITE_NAME; ?></title>
  <?php include("include/top.php"); ?>
  <!-- Custom styles for this page -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">

  <link href="//vjs.zencdn.net/7.0/video-js.min.css" rel="stylesheet">
  <script src="//vjs.zencdn.net/7.0/video.min.js"></script>
  <script>
      document.addEventListener("contextmenu", function(e){
          e.preventDefault();
      }, false);

      var isCtrl = false;
      document.onkeyup=function(e)
      {
          if(e.which == 17)
              isCtrl=false;
      }
      document.onkeydown=function(e)
      {
          if(e.which == 123)
              isCtrl=true;
          if (((e.which == 85) || (e.which == 65) || (e.which == 88) || (e.which == 67) || (e.which == 86) || (e.which == 2) || (e.which == 3) || (e.which == 123) || (e.which == 83)) && isCtrl == false)
          {
             // alert('This is Function Disabled');
              return false;
          }
      }
      // right click code
      var isNS = (navigator.appName == "Netscape") ? 1 : 0;
      if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
      function mischandler(){
          alert('This is Function Disabled');
          return false;
      }
      function mousehandler(e){
          var myevent = (isNS) ? e : event;
          var eventbutton = (isNS) ? myevent.which : myevent.button;
          if((eventbutton==2)||(eventbutton==3)) return false;
      }
      document.oncontextmenu = mischandler;
      document.onmousedown = mousehandler;
      document.onmouseup = mousehandler;
      //select content code disable  alok goyal
      function killCopy(e){
          return false
      }
      function reEnable(){
          return true
      }
      document.onselectstart=new Function ("return false")
      if (window.sidebar){
          document.onmousedown=killCopy
          document.onclick=reEnable
      }

      jQuery(document).bind("keyup keydown", function(e){
          if(e.ctrlKey && e.keyCode == 80){
              alert('fine');
              return false;
          }
      });
  </script>

  <style type="text/css" media="print">
    BODY {display:none;visibility:hidden;}
  </style>


</head>

<body id="page-top" oncopy="return false" onpaste="return false" oncut="return false" class="hidden-print " oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <?php include("include/sidebar.php"); ?>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <?php include("include/header.php"); ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-1">
         <!-- <h1 class="h3 mb-2 text-gray-800">Course Content Video</h1>-->


        </div>
        <!-- Page Heading -->

       <!-- <p class="mb-4">Course Content Video Viewer </p>
-->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Course Content  </h6>

          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php if(isset($_GET['view'])) {
                  if ($_GET['view'] == 'summary') {
                    ?>
                    <div class="row text-center ">
                      <h1 class="h3 mb-2 text-gray-800 text-center text-center">Summary</h1>
                      <br>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-5 ">
                        <?php echo $edit_data['topic_summary']; ?>
                      </div>

                    </div>
                    <?php
                  } else {
                    ?>
                    <div class="row">



                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-5 text-center">
                      <h1 class="h3 mb-2 text-gray-800 text-center">VIDEO</h1><br>

                      <!-- <video width="100%" height="auto" controls autoplay  preload="yes">
                  <source src="../upload/content/video/<?php /*echo
                  $edit_data['video'];*/
                      ?>" type="video/mp4">
                  Your browser does not support the video tag.
                </video>-->

                      <video
                       id="my-player"
                       class="video-js"
                       controls
                       preload="auto"
                       poster="../core/img/video_poster.jpg"
                       data-setup='{}'>
                        <source src="../upload/content/video/<?php echo
                        $edit_data['video']; ?>" type="video/mp4"></source>

                        <p class="vjs-no-js">
                          To view this video please enable JavaScript, and consider upgrading to a web browser that
                          <a href="http://videojs.com/html5-video-support/" target="_blank">
                            supports HTML5 video
                          </a>
                        </p>
                      </video>
                    </div>

                    </div><?php
                  }
                }
                  ?>



          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include("include/footer.php"); ?>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include("include/last.php"); ?>

<!-- Page level plugins -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<!-- Page level custom scripts -->
<script src="../core/js/demo/datatables-demo.js"></script>

</body>

</html>
