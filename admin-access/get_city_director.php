<?php
include("../con_base/functions.inc.php");
 $ddl_id=$_POST['ddl_id'];
  $sqlst = mysqli_query($DB_LINK, "select *  from tbl_team_city where user='" . $_POST['ddl_id'] . "'") or die(mysqli_error());
  if(mysqli_num_rows($sqlst)>0)
  {
  $datas_name = mysqli_fetch_assoc($sqlst);

   ?>
<div class="card text-center">
  <div class="card-header bg-gradient-info text-white">
     <?php echo $datas_name['t_name']?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['ddl_id'];?></h5>
    <p class="card-text"> <?php echo $datas_name['a_city_name'];?> - <?php echo $datas_name['a_state_name'];?></p>
  </div>

</div>
<?php } else echo "<span class='text-danger'>No record found !!!</span>";?>


