<?php
include("../con_base/functions.inc.php");
   $id=$_POST['id'];
   $typ=$_POST['typ'];
   $typ_full="";
   if($typ!='')
   {
    if($typ=='sdl') {
      $qry = "select *  from tbl_team_state where user like '%" . $_POST['id'] . "%'   ";
      $typ_full="State Director";
    }
    else if($typ=='ddl'){
    $qry="select *  from tbl_team_city where user like '%" . $_POST['id'] . "%'   ";
      $typ_full="District Director";
    }
    else if($typ=='fdl'){
    $qry="select *  from tbl_team_fren where user like '%" . $_POST['id'] . "%'   ";
      $typ_full="Franchise Director";
    }
    else if($typ=='tl'){
    $qry="select *  from tbl_team_teacher where user like '%" . $_POST['id'] . "%'   ";
      $typ_full="Faculty  ";
    }
    else if($typ=='sl'){
    $qry="select *  from tbl_team_student where user like '%" . $_POST['id'] . "%'   ";
      $typ_full="Student";
    }

  $sqlst = mysqli_query($DB_LINK,$qry ) or die(mysqli_error());
  if(mysqli_num_rows($sqlst)>0)
  {
  $datas_name = mysqli_fetch_assoc($sqlst);

   ?>
<div class="card text-center">
  <div class="card-header bg-gradient-info text-white">
    <?php echo $typ_full;?>

  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $datas_name['user'];?> - <?php echo $datas_name['t_name'];?></h5>
    <p class="card-text"> <?php if($typ!='sdl') { echo $datas_name['a_city_name']; ?> - <?php } echo $datas_name['a_state_name'];?></p>
  </div>

</div>
<?php } else echo "<span class='text-danger'>No record found !!!</span>";
   } else echo "<span class='text-danger'>No data found !!!</span>";?>



