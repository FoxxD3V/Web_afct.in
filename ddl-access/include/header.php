<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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



		<div class="topbar-divider d-none d-sm-block"></div>

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
<!-- End of Topbar -->