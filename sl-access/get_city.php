<?php
include("../con_base/functions.inc.php");
 $state_id=$_POST['state_id'];
 ?>
<select name="city_id" id="city_id" class="form-control text-uppercase" required>
 <option value="">Select City</option>
 <?php
 $qur=mysqli_query($DB_LINK,"select * from city where state_id='$state_id' and status=1 order by city") or die(mysqli_error());
 foreach($qur as $city)
 {
  ?><option value="<?php echo $city['city_id'];?>"><?php echo $city['city'];?></option>
        <?php } ?>
</select>
 