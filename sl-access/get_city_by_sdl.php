<?php
include("../con_base/functions.inc.php");
 $sdl_id=$_POST['sdl_id'];
 ?>
<select name="a_city_id" id="a_city_id" class="form-control text-uppercase" required>
 <option value="">Assign To City Related To State Director</option>
 <?php
 // Get State Id
 $qur_sdl=mysqli_query($DB_LINK,"select a_state_id from tbl_team_state where user='$sdl_id'  ") or die(mysqli_error());
 $data=mysqli_fetch_assoc($qur_sdl);
 $state_id=$data['a_state_id'];
 // Get State Data
 $sqlst = mysqli_query($DB_LINK, "select state from state where state_id='" . $state_id . "'") or die(mysqli_error());
 $datas_name = mysqli_fetch_array($sqlst);
 $state_name = $datas_name['state'];
 //Get City List Related to state
 $qur=mysqli_query($DB_LINK,"select * from city where state_id='$state_id' and status=1 order by city") or die(mysqli_error());
 foreach($qur as $city)
 {
  ?><option value="<?php echo $city['city_id'];?>"><?php echo $city['city'];?></option>
        <?php } ?>
</select>
<input type="hidden" name="a_state_id" value="<?php echo $state_id;?>">
<input type="hidden" name="a_state_name" value="<?php echo $state_name;?>">
