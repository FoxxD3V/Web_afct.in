<?php
require_once("con_base/functions.inc.php");
if(isset($_SESSION[ 'a_id' ]))
{
    $user_role=$_SESSION[ 'user_role' ]  ;

    if($user_role=='admin')
    {
        header("Location: admin-access/index.php");
        exit();
    }
    if($user_role=='SDL')
    {
        //$_SESSION[ 'a_state_id' ] = $line[ 'a_state_id' ];
        header("Location: sdl-access/index.php");
        exit();
    }
    if($user_role=='DDL')
    {
        //$_SESSION[ 'a_state_id' ] = $line[ 'a_state_id' ];
        header("Location: ddl-access/index.php");
        exit();
    }
    if($user_role=='FDL')
    {
        //$_SESSION[ 'a_state_id' ] = $line[ 'a_state_id' ];
        header("Location: fdl-access/index.php");
        exit();
    }
    if($user_role=='SL')
    {
        //$_SESSION[ 'a_state_id' ] = $line[ 'state_id' ];
        header("Location: sl-access/index.php");
        exit();
    }
    if($user_role=='TL')
    {
        //$_SESSION[ 'a_state_id' ] = $line[ 'state_id' ];
        header("Location: tl-access/index.php");
        exit();
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

  <title>Member Login</title>

  <!-- Custom fonts for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="core/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="core/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">

                      <img src="core/img/logo.jpg" class="img-fluid"/>

                  </div>
                  <form class="user" action="log.php" method="post">
                      <?php if(isset($_GET['log_typ']))
                      {
                          ?>
                          <input name="login_typ" type="hidden" value="<?=$_GET['log_typ']?>" >
                          <h1 class="h4 text-gray-900 mb-4 text-center" ><?php echo login_role_fullname($_GET['log_typ']);?> Login </h1>
                          <hr>

                          <?php
                      } else
                      {?>
                      <div class="form-group">

                          <select class="form-control text-uppercase" name="login_typ"   >
                              <option value="">-- Select Login --</option>
                              <option value="sdl">STATE DIRECTOR LOGIN</option>
                              <option value="ddl">DISTRICT DIRECTOR LOGIN</option>
                              <option value="fdl">FRANCHISE DIRECTOR LOGIN</option>
                              <option value="tl">FACULTIES / TEACHERS LOGIN</option>
                              <option value="sl">STUDENTS LOGIN</option>
                          </select> </div>
                      <?php } ?>
                    <div class="form-group">
                      <input name="loginid" type="text"   class="form-control form-control-user"     placeholder="Enter User Id">
                    </div>
                    <div class="form-group">
                      <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button  type="submit" name="login" href="index.php" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-sign-in-alt"></i> Login Now
                    </button>
                      <?php if(!isset($_GET['log_typ']))
                      {
                      ?>
                    <hr>
                    <a href="app/afctver1.0.apk"   onclick="fun()">
                         <img src="core/img/android_btn.png" class="img-fluid img-responsive"/>
                    </a>
                      <?php } ?>
                    <!--<a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>--><!---->
                  </form>
                  <!--<hr>
                  <div class="text-center">
                    <a class="small" href="#">Forgot Password?</a>
                  </div>-->
                  <div class="text-center">
																			<?php if(isset($_SESSION['warn_msg'])) {
																				echo $_SESSION['warn_msg'];
																				$_SESSION['warn_msg'] = '';
																			}
																				?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="core/vendor/jquery/jquery.min.js"></script>
  <script src="core/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="core/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="core/js/sb-admin-2.min.js"></script>


		<script src="core/sweetalert/sweetalert.min.js"></script>

		<script>
			<?php if(isset($_SESSION['msg'])){ if($_SESSION['msg']!='')
			{
			$result = alert_msg($_SESSION['msg'][0], 'User');
			?>
			swal({
				title: "<?php echo $_SESSION['msg'][1];?>",
				//text: "You clicked the button!",
				type: "<?php echo $result[1];?>"
			});
			<?php $_SESSION['msg']=''; } }?>

            function fun()
            {
                swal({
                    title: "App Download",
                    text: "AFCT Android App downloading started.....",
                    type: "success"
                });
            }
		</script>

</body>

</html>
