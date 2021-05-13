<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar    static-top ">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>

	<!-- Topbar Search -->
	<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 "><!--navbar-search-->
		<div class="input-group">
			<h6 class="m-0 font-weight-bold text-primary"><?php echo ucfirst( $_SESSION[ 'a_name' ]);?> [<?php echo $_SESSION[ 'a_userid' ];?>]</h6>
		</div>
	</div>

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">

		<!--Topbar Search (Visible Only XS) -->
		<!-- Topbar Search -->
		<div class="  d-sm-none ">
			<div class="input-group">
				<small class=" mt-3   text-primary"><?php echo ucfirst( $_SESSION[ 'a_name' ]);?>  [<?php echo $_SESSION[ 'a_userid' ];?>]</small>
			</div>
		</div>
		<?php
		$sql_noticec = " select * from tbl_notice  where ondate='".date('Y-m-d')."'";
		$qry_noticec = mysqli_query( $DB_LINK, $sql_noticec );
		$notice_count=mysqli_num_rows($qry_noticec);
		?>
		<!-- Nav Item - Alerts -->
		<li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle text-primary  " href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="fas fa-bell fa-fw <?php if($notice_count>0) echo 'text-success  animated fa-lg';?>  faa-horizontal   "></i>
				<!-- Counter - Alerts -->
				<?php if($notice_count>0) { ?>
				<span class="badge badge-danger badge-counter  "> <?php echo $notice_count?> </span>
				<?php } ?>

			</a>
			<!-- Dropdown - Alerts -->
			<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
				<h6 class="dropdown-header">
					Alerts Center
				</h6>
				<?php
				$sql_notice = " select * from tbl_notice  order by id desc limit 0,3";
				$qry_notice = mysqli_query( $DB_LINK, $sql_notice );
				foreach($qry_notice as $data_notice) { ?>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="mr-3">
						<div class="icon-circle bg-success	">
							<i class="fas fa-info-circle text-white"></i>
						</div>
					</div>
					<div>
						<div class="small text-gray-500"><?php echo date_dm($data_notice['ondate']);?></div>
						<span  ><?php echo  ($data_notice['notice_text']);?></span>
					</div>
				</a>
				<?php } ?>
				<a class="dropdown-item text-center small text-danger" href="page_notice.php"> <i class="fas fa-eye"></i> Show All Alerts</a>

			</div>
		</li>





		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small">My Account</span>
			<!--	<?php /*if($data_member['user_image']!='') {*/?>
					<img src="../upload/user_image/<?php /*echo $data_member['user_image'];*/?>" class="img-profile rounded-circle"/>
				<?php /*} else if($data_foruser['pic']!=''){ */?>
				<img class="img-profile rounded-circle" src="../upload/user/<?php /*echo $data_foruser['pic'];*/?>">
				--><?php /*} */?>
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="#">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
					Profile
				</a>
				<a class="dropdown-item" href="#">
					<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400 faa-wrench "></i>
					Settings
				</a>

				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>

	</ul>

</nav>

<div class="horizontal-menu mb-4 shadow static-top bg-gradient-info">

  <nav class="bottom-navbar">
    <div class=".container  pl-2  ">
      <ul class="nav page-navigation">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if($currentPG=="index.php") echo 'active';?> ">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <!--<span class="menu-title">Dashboard</span>--></a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-user"></i>
            <span class="menu-title">My Account</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="user_profile.php">View  Profile</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="user_profile_update.php">  Edit Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_bank_profile.php">View  Bank Details</a>
              </li>  <li class="nav-item">
                <a class="nav-link" href="user_bank_profile_update.php"> Edit Bank Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_id_profile.php">View  ID Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_id_profile_update.php">  Edit ID Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_change_password.php">  Change Password</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-atlas"></i>
            <span class="menu-title">Courses</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <?php $sql=mysqli_query($DB_LINK,"select * from tbl_master_course_typ   order by t_name asc") or die(mysqli_error());
              foreach($sql as $state)
              {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="master_course.php?type=<?php echo $state['t_name'];?>"><?php echo $state['t_name'];?></a>
                </li>
                <?php } ?>


            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-user-secret"></i>

            <span class="menu-title">Directors</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
             <!-- <li class="nav-item">
                <a class="nav-link" href="#">Add District Directors</a>
              </li><li class="nav-item">
                <a class="nav-link" href="#">View District Directors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Add Frenchise Directors</a>
              </li><li class="nav-item">
                <a class="nav-link" href="#">View Frenchise Directors</a>
              </li>-->
              <li class="nav-item">
                <a class="nav-link" href="#">Add Faculty / Teachers</a>
              </li><li class="nav-item">
                <a class="nav-link" href="#">View Faculty / Teachers</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            
            <span class="menu-title">Classrooom</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="#">Continue Classes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Revise Classes </a>
              </li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-diagnoses"></i>
            <span class="menu-title">Examination</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="#">Online Course Examination </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">View Course Result</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">View Scholarship Result</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Certificate Verification</a>
              </li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-medal"></i>
            <span class="menu-title">Scholarship</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="#">Apply Scholarship</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">View Scholarship Details</a>
              </li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-wallet"></i>
            <span class="menu-title">Wallet  </span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="#">Scholarship Wallet </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Direct Referral Admission  Wallet</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Group Wallet</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span class="menu-title">Our Students</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="student_add.php">Add New</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="student_list_unverified.php">Direct / Referral - Pending Student</a>

              </li>

              <li class="nav-item">
                <a class="nav-link" href="student_list_verified.php">Direct / Referral - Verified Student</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">All Students Group  </a>

              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-university"></i>
            <span class="menu-title">Institute  </span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="master_institute_add.php">Add Institute </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="master_institute.php">View Institute</a>
              </li>

            </ul>
          </div>
        </li>





        <li class="nav-item">
          <a class="nav-link"  href="#" data-toggle="modal" data-target="#logoutModal" title="Logout">
            <i class="fas fa-fw fa-sign-out-alt faa-passing animated "></i>

          </a>
        </li>




        <?php /*?>
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

<? */ ?>



        <!-- <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="mdi mdi-compass-outline menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-fw fa-diagnoses"></i>
            <span class="menu-title">UI Elements</span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item">
                <a class="nav-link" href="#">Buttons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Dropdown</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Typography</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/forms/basic_elements.html">
            <i class="mdi mdi-clipboard-text menu-icon"></i>
            <span class="menu-title">Forms</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <i class="mdi mdi-contacts menu-icon"></i>
            <span class="menu-title">Icons</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/charts/chartjs.html">
            <i class="mdi mdi-chart-bar menu-icon"></i>
            <span class="menu-title">Charts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/tables/basic-table.html">
            <i class="mdi mdi-table-large menu-icon"></i>
            <span class="menu-title">Tables</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://www.bootstrapdash.com/demo/plus-free/documentation/documentation.html" class="nav-link" target="_blank">
            <i class="mdi mdi-file-document-box menu-icon"></i>
            <span class="menu-title">Docs</span></a>
        </li>
        <li class="nav-item">
          <div class="nav-link d-flex">
            <button class="btn btn-sm bg-danger text-white"> Trailing </button>
            <div class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle text-white font-weight-semibold" id="notificationDropdown" href="#" data-toggle="dropdown"> English </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <a class="dropdown-item" href="#">
                  <i class="flag-icon flag-icon-bl mr-3"></i> French </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="flag-icon flag-icon-cn mr-3"></i> Chinese </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="flag-icon flag-icon-de mr-3"></i> German </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="flag-icon flag-icon-ru mr-3"></i>Russian </a>
              </div>
            </div>
            <a class="text-white" href="index.html"><i class="mdi mdi-home-circle"></i></a>
          </div>
        </li>-->
      </ul>
    </div>
  </nav>
</div>
<!-- End of Topbar -->