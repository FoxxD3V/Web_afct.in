<!-- Sidebar -->
<style>
.mobileshow {
display:none;
}
@media screen and (max-width: 500px) {
.mobileshow {
display:block; }
}
</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
<?php /*
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center " href="#">
		<div class="sidebar-brand-icon  ">
			 <img src="../core/img/logo.jpg" class="img-fluid p-5 d-none  d-md-block" />
			<img src="../core/img/logo.jpg"  class="d-md-none d-sm-block" style="width: 100%" />

		</div>

	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item ">
		<a class="nav-link" target="_blank" href="http://www.afctinstitute.com">
			<i class="fas fa-fw fa-globe-asia faa-spin animated "></i>
			<span>Website</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">
*/ ?>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item  mobileshow   <?php if($currentPG=="index.php") echo 'active';?> ">
		<a class="nav-link" href="index.php">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>



  <li class="nav-item  mobileshow  ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#myaccount" aria-expanded="true" aria-controls="myaccount">
      <i class="fas fa-fw fa-user"></i>
      <span>My Account</span>
    </a>
    <div id="myaccount" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">

    <a class="   collapse-item"  href="user_profile.php"><i class="fas fa-angle-double-right"></i> View  Profile</a>

    <a class="  collapse-item" href="user_profile_update.php"><i class="fas fa-angle-double-right"></i>  Edit Profile</a>

    <a class="  collapse-item" href="user_bank_profile.php"><i class="fas fa-angle-double-right"></i>View  Bank Details</a>

    <a class="  collapse-item"  href="user_bank_profile_update.php"><i class="fas fa-angle-double-right"></i> Edit Bank Details</a>

    <a class="  collapse-item" href="user_id_profile.php"><i class="fas fa-angle-double-right"></i> View  ID Details</a>

    <a class="  collapse-item" href="user_id_profile_update.php"><i class="fas fa-angle-double-right"></i>  Edit ID Details</a>

    <a class="  collapse-item" href="user_change_password.php"><i class="fas fa-angle-double-right"></i>  Change Password</a>

  </div>
    </div>
  </li>


  <li class="nav-item  mobileshow  ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#course" aria-expanded="true" aria-controls="myaccount">
      <i class="fas fa-fw fa-atlas"></i>
      <span>Courses</span>
    </a>
    <div id="course" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      <?php $sql=mysqli_query($DB_LINK,"select * from tbl_master_course_typ   order by t_name asc") or die(mysqli_error());
        foreach($sql as $state)
        {
        ?>

    <a class="  collapse-item" href="master_course.php?type=<?php echo $state['t_name'];?>"><i class="fas fa-angle-double-right"></i> <?php echo $state['t_name'];?></a>

<?php } ?>

  </div>
    </div>
  </li>



    <li class="nav-item  mobileshow   ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#team_members" aria-expanded="true" aria-controls="team_members">
			<i class="fas fa-fw fa-user-secret"></i>
			<span>Directors</span>
		</a>
		<div id="team_members" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
     <a class="collapse-item" href="team_city_add.php"><i class="fas fa-angle-double-right"></i> Add District Directors</a>

    <a class="collapse-item" href="team_city.php"><i class="fas fa-angle-double-right"></i> View District Directors</a>

    <a class="collapse-item" href="team_fren_add.php"><i class="fas fa-angle-double-right"></i> Add Frenchise Directors</a>

    <a class="collapse-item" href="team_fren.php"><i class="fas fa-angle-double-right"></i> View Frenchise Directors</a>


    <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> Add Faculty / Teachers</a>

    <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> View Faculty / Teachers</a>

	  		</div>
		</div>
	</li>


  <li class="nav-item  mobileshow    ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#classroom" aria-expanded="true" aria-controls="team_members">
      <i class="fas fa-fw fa-chalkboard-teacher"></i>
      <span>Classrooom</span>
    </a>
    <div id="classroom" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="class_continue.php"><i class="fas fa-angle-double-right"></i> Continue Class</a>

     <a class="collapse-item" href="class_upcoming.php"><i class="fas fa-angle-double-right"></i> Upcoming Class </a>
        <a href="master_course_content_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Course Content Add</a>
        <a href="master_course_content.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Course Content List</a>

      </div>
    </div>
  </li>

  <li class="nav-item  mobileshow    ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#exam" aria-expanded="true" aria-controls="team_members">
      <i class="fas fa-fw fa-diagnoses"></i>
      <span>Examination</span>
    </a>
    <div id="exam" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> Online Course Examination</a>
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> View Course Result</a>
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> View Scholarship Result</a>
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> Certificate Verification</a>

      </div>
    </div>
  </li>


  <li class="nav-item  mobileshow     ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#scholarship" aria-expanded="true" aria-controls="team_members">
      <i class="fas fa-fw fa-chalkboard-teacher"></i>
      <span>Scholarship</span>
    </a>
    <div id="scholarship" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> Apply Scholarship</a>
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> View Course Result</a>

      </div>
    </div>
  </li>


  <li class="nav-item  mobileshow    ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#wallet" aria-expanded="true" aria-controls="team_members">
      <i class="fas fa-fw fa-wallet"></i>
      <span>Wallet</span>
    </a>
    <div id="wallet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="wallet_bonus.php"><i class="fas fa-angle-double-right"></i> Bonus Wallet</a>
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> Scholarship Wallet</a>
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> Direct Referral Admission  Wallet</a>
        <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i>Group Wallet </a>

      </div>
    </div>
  </li>


  <li class="nav-item  mobileshow    ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#students" aria-expanded="true" aria-controls="team_members">
      <i class="fas fa-fw fa-user-graduate"></i>
      <span>Students</span>
    </a>
    <div id="students" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">

        <a class="collapse-item" href="student_add.php"><i class="fas fa-angle-double-right"></i>  Add New</a>

    <a class="collapse-item" href="student_list_unverified.php"><i class="fas fa-angle-double-right"></i>  Direct / Referral - Pending Student</a>


    <a class="collapse-item" href="student_list_verified.php"><i class="fas fa-angle-double-right"></i> Direct / Referral - Verified Student</a>

    <a class="collapse-item" href="#"><i class="fas fa-angle-double-right"></i> All Students Group  </a>

      </div>
    </div>
  </li>


<!--
	<li class="nav-item  mobileshow <?php /* if($currentPG=="support_create.php" || $currentPG=="support_list_pending.php" || $currentPG=="support_list_replied.php"   ) echo 'active  ';  */?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#support" aria-expanded="true" aria-controls="team_members">

			<i class="far fa-fw fa-comments"></i>

			<span>Support</span>
		</a>
		<div id="support" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a href="support_create.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Create message</a>
				<a href="support_list_pending.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Pending message</a>
				<a href="support_list_replied.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Replied message</a>
			</div>
		</div>
	</li>
-->
	<!-- Divider -->
	<hr class="sidebar-divider  my-0">

	<li class="nav-item  mobileshow  ">
		<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-fw fa-sign-out-alt faa-passing animated "></i>
			<span>Logout</span></a>
	</li>
	<hr class="sidebar-divider  d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<!--<div class="text-center d-none d-md-inline    ">
		<button class="rounded-circle border-0 mobileshow" id="sidebarToggle"></button>
	</div>
-->
</ul>
<!-- End of Sidebar -->


