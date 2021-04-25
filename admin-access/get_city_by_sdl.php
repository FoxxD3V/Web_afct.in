<?php
include("../con_base/functions.inc.php");
 $sdl_id=$_POST['sdl_id'];
 ?>
<select name="a_city_id" id="a_city_id" class="form-control text-uppercase" required>
 <option value="">Assign To City Related To State Director</option>
 <?php
 $qur_sdl=mysqli_query($DB_LINK,"select a_state_id from tbl_team_state where user='$sdl_id'  ") or die(mysqli_error());
 $data=mysqli_fetch_assoc($qur_sdl);
 $state_id=$data['a_state_id'];
 $qur=mysqli_query($DB_LINK,"select * from city where state_id='$state_id' and status=1 order by city") or die(mysqli_error());
 foreach($qur as $city)
 {
  ?><option value="<?php echo $city['city_id'];?>"><?php echo $city['city'];?></option>
        <?php } ?>
</select>
 