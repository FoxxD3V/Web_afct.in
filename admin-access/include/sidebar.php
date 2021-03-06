<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

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

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if($currentPG=="index.php") echo 'active';?> ">
		<a class="nav-link" href="index.php">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

    <li class="nav-item <?php  if($currentPG=="master_course.php" || $currentPG=="master_city.php" || $currentPG=="master_state.php" || $currentPG=="master_course_typ.php"   ) echo 'active  ';  ?> ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#maste_manager" aria-expanded="true" aria-controls="maste_manager">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div id="maste_manager" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a href="master_course_typ_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add Course Type  </a>
                <a href="master_course_typ.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Course Type List </a>
                <a href="master_course_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add Course </a>
                <a href="master_course.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Course List</a>
                <a href="master_course_content_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Course Content Add</a>
                <a href="master_course_content.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Course Content List</a>
                <a href="master_city_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add City  </a>
                <a href="master_city.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> City List </a>
                <a href="master_state_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add State  </a>
                <a href="master_state.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> State List </a>
            </div>
        </div>
    </li>

  <li class="nav-item <?php  if($currentPG=="master_institute.php" || $currentPG=="master_institute_add.php" || $currentPG=="master_state.php" || $currentPG=="master_course_typ.php"   ) echo 'active  ';  ?> ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#inst_manager" aria-expanded="true" aria-controls="maste_manager">
      <i class="fas fa-fw  fa-university"></i>
      <span>Institute</span>
    </a>
    <div id="inst_manager" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a href="master_institute_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add Institute </a>
        <a href="master_institute.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Institute List  </a>
        </div>
    </div>
  </li>



    <li class="nav-item <?php  if($currentPG=="team_state.php" || $currentPG=="team_city.php" || $currentPG=="team_fren.php"   ) echo 'active  ';  ?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#team_members" aria-expanded="true" aria-controls="team_members">
			<i class="fas fa-fw fa-user-secret"></i>
			<span>Directors</span>
		</a>
		<div id="team_members" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
	 <a href="team_state_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add State Directors</a>
	 <a href="team_state.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> State Directors</a>
	 <a href="team_city_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add District Directors</a>
	 <a href="team_city.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> District Directors</a>
	 <a href="team_fren_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add Franchise Directors</a>
	 <a href="team_fren.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Franchise Directors</a>
			</div>
		</div>
	</li>

    <li class="nav-item <?php  if($currentPG=="team_faculties.php" || $currentPG=="team_faculties_add.php" || $currentPG=="team_faculties_new.php"   ) echo 'active  ';  ?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#faculties" aria-expanded="true" aria-controls="faculties">
			<i class="fas fa-fw fa-user-shield"></i>
			<span>Faculties</span>
		</a>
		<div id="faculties" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
	 <a href="team_fact_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add New</a>
	 <a href="team_fact.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Faculties List (Pending)</a>
	 <a href="team_fact_apr.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Faculties List (Approved)</a>
			</div>
		</div>
	</li>

    <li class="nav-item <?php  if($currentPG=="student_add.php" || $currentPG=="student_list.php" || $currentPG=="student_list_verified.php"   ) echo 'active  ';  ?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="student">
			<i class="fas fa-fw fa-user-graduate"></i>
			<span>Students</span>
		</a>
		<div id="student" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
     <a href="student_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add New</a>
     <a href="student_list_unverified.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Pending Student</a>
     <a href="student_list_verified.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Verified Student</a>
   </div>
		</div>
	</li>


  <li class="nav-item <?php  if($currentPG=="wallet_bonus.php" || $currentPG=="wallet_bonus_add.php" || $currentPG=="student_list_verified.php"   ) echo 'active  ';  ?> ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#wallet" aria-expanded="true" aria-controls="wallet">
      <i class="fas fa-fw fa-wallet"></i>
      <span>Wallet</span>
    </a>
    <div id="wallet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a href="wallet_direct.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Direct Wallet</a>
        <a href="wallet_bonus.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Bonus Wallet Status</a>
        <a href="wallet_bonus_add.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Add Bonus Wallet</a>
       </div>
    </div>
  </li>

    <li class="nav-item <?php  if($currentPG=="setting_changepassword.php" || $currentPG=="setting_updateimage.php"  ) echo 'active  ';  ?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting" aria-expanded="true" aria-controls="team_members">
			<i class="fas fa-fw fa-tools   faa-wrench animated  "></i>

			<span>Settings</span>
		</a>
		<div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<!--<a href="setting_updateimage.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Update Profile Image</a>
				<a href="setting_updatepan.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Update PAN Data</a>
				<a href="setting_update_bankaccount.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Update Bank Account</a>-->
				<a href="setting_changepassword.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Change Password</a>
		  	</div>
		</div>
	</li>

	<li class="nav-item <?php  if($currentPG=="support_create.php" || $currentPG=="support_list_pending.php" || $currentPG=="support_list_replied.php"   ) echo 'active  ';  ?> ">
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

	<!-- Divider -->
	<hr class="sidebar-divider  my-0">

	<li class="nav-item  ">
		<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-fw fa-sign-out-alt faa-passing animated "></i>
			<span>Logout</span></a>
	</li>
	<hr class="sidebar-divider  d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
