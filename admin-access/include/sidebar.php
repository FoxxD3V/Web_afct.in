<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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

    <li class="nav-item <?php  if($currentPG=="master_course.php" || $currentPG=="master_city.php" || $currentPG=="master_state.php"   ) echo 'active  ';  ?> ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#maste_manager" aria-expanded="true" aria-controls="maste_manager">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div id="maste_manager" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a href="master_course.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Course Master</a>
                <a href="master_city.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> City Master</a>
                <a href="master_state.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> State Master</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php  if($currentPG=="team_state.php" || $currentPG=="team_city.php" || $currentPG=="team_fren.php"   ) echo 'active  ';  ?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#team_members" aria-expanded="true" aria-controls="team_members">
			<i class="fas fa-fw fa-users"></i>
			<span>Directors</span>
		</a>
		<div id="team_members" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
	 <a href="team_state.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> State Directors</a>
	 <a href="team_city.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> City Directors</a>
	 <a href="team_fren.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Franchise Directors</a>
			</div>
		</div>
	</li>


    <!--
<li class="nav-item <?php /*if($currentPG=="business_designation.php"  ) echo 'active  '; */?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#business" aria-expanded="true" aria-controls="team_members">

			<i class="fas  fa-fw fa-business-time"></i>
			<span>Business</span>
		</a>
		<div id="business" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
 <a  class="collapse-item" href="business_designation.php"><i class="fas fa-angle-double-right"></i> My Designation </a>
 <a  class="collapse-item" href="tree_view.php"><i class="fas fa-angle-double-right"></i> Tree View</a>
	<?php /*if($data_member['designation_id']>=5) { */?>
 <a  class="collapse-item" href="tree_view_big.php"><i class="fas fa-angle-double-right"></i> Tree View 12 Level</a>  <?php /*} */?>

	 </div>
		</div>
	</li>
	<li class="nav-item <?php /*if($currentPG=="income_binary.php" || $currentPG=="income_salary.php" || $currentPG=="income_royalty.php"  ) echo 'active  '; */?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payouts" aria-expanded="true" aria-controls="team_members">

			<i class="far fa-fw fa-money-bill-alt"></i>
			<span>Payout</span>
		</a>
		<div id="payouts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
	 <a href="income_binary.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Binary</a>
	 <a href="income_salary.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Salary</a>
	 <a href="income_royalty.php" class="collapse-item"><i class="fas fa-angle-double-right"></i> Royalty</a>
			</div>
		</div>
	</li>
	<li class="nav-item  ">
		<a class="nav-link" href="page_extra.php"  >

			<i class="fas fa-fw fa-file-signature"></i>
			<span>Extra Facilities</span></a>
	</li>
	<li class="nav-item <?php /*if($currentPG=="setting_changepassword.php" || $currentPG=="setting_updateimage.php"  ) echo 'active  '; */?> ">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting" aria-expanded="true" aria-controls="team_members">
			<i class="fas fa-fw fa-tools   faa-wrench animated  "></i>

			<span>Settings</span>
		</a>
		<div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a href="setting_updateimage.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Update Profile Image</a>
				<a href="setting_updatepan.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Update PAN Data</a>
				<a href="setting_update_bankaccount.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Update Bank Account</a>
				<a href="setting_changepassword.php" class="collapse-item"><i class="fas fa-angle-double-right "></i> Change Password</a>
		  	</div>
		</div>
	</li>
	<li class="nav-item <?php /*if($currentPG=="support_create.php" || $currentPG=="support_list_pending.php" || $currentPG=="support_list_replied.php"   ) echo 'active  '; */?> ">
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

	<?php /*if($data_foruser['status']==0) { */?><!--
	<li class="nav-item  ">
		<a class="nav-link" target="_blank" href="form_transfer.php" >
			<i class="fas fa-fw fa-exchange-alt"></i>

			<span>Transfer Form</span></a>
	</li>
	--><?php /*}*/ ?>
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
