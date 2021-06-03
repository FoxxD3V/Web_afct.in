<?php
include("../con_base/functions.inc.php");
   $id=$_POST['id'];
  $sqlst = mysqli_query($DB_LINK, "select *  from tbl_team_fren 
  where study_center_code like '%" . $_POST['id'] . "%' or user like '%" . $_POST['id'] . "%'") or die(mysqli_error());
  if(mysqli_num_rows($sqlst)>0)
  {
  $datas_name = mysqli_fetch_assoc($sqlst);

   ?>
<div class="card text-center">
  <div class="card-header bg-gradient-info text-white">
     <?php echo $datas_name['study_center_code']?>
     <small><?php echo $datas_name['study_center']?> </small>

  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $datas_name['user'];?> - <?php echo $datas_name['t_name'];?></h5>
    <p class="card-text"> <?php echo $datas_name['a_city_name'];?> - <?php echo $datas_name['a_state_name'];?></p>
  </div>

</div>
<?php } else echo "<span class='text-danger'>No record found !!!</span>";?>


