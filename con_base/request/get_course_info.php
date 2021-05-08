<?php
include("../functions.inc.php");
    $course_id=$_POST['course_id'];
  $sqlst = mysqli_query($DB_LINK, "select *  from tbl_master_course where c_code='".$_POST['course_id']."'") or die(mysqli_error());
  if(mysqli_num_rows($sqlst)>0)
  {
  $datas_name = mysqli_fetch_assoc($sqlst);

   ?>
<div class="card text-center">
  <div class="card-header bg-gradient-success  text-white">
    <?php echo $datas_name['c_sort_name'];?> - <?php echo $datas_name['c_code'];?> [<?php echo $datas_name['c_typ'];?>]
  </div>
  <div class="card-body">
    <h5 class="card-title"> <?php echo $datas_name['c_name']?></h5>
    <p class="card-text"> Eligibility  : <?php echo $datas_name['eligi'];?> Duration : <?php echo $datas_name['c_dur'];?> <?php echo course_dur_data($datas_name['c_dur_typ']);?>  Fee : <?php echo $datas_name['c_fee'];?>  <br>
    <pre> <?php echo $datas_name['detail'];?></pre>
    </pre>
  </div>

</div>
<?php } else echo "<span class='text-danger'>No record found !!!</span>";?>


