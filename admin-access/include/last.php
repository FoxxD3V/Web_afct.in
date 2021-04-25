<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="logout.php">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../core/vendor/jquery/jquery.min.js"></script>
<script src="../core/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../core/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../core/js/sb-admin-2.min.js"></script>

<script src="../core/sweetalert/sweetalert.min.js"></script>

<script>
	<?php if(isset($_SESSION['msg'])){ if($_SESSION['msg']!='')
	{
	$result = alert_msg($_SESSION['msg'][0], 'User');
	?>
	swal({
		title: "<?php echo $_SESSION['msg'][1];?>",
		//text: "You clicked the button!",
		type: "<?php echo $result[1];?>"
	});
	<?php $_SESSION['msg']=''; } }?>
</script>

<script>
	function del(delId, table)
	{
		swal({
				title: "Are you sure want to remove?",
				text: "You will not be able to recover this item",
				type: "warning",
				showCancelButton: true,
				/*confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',*/
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Confirm",
				cancelButtonText: "Cancel",
				closeOnConfirm: false,
				closeOnCancel: true
			},
			function(isConfirm) {
				if (isConfirm) {
					//swal("Deleted!", "Your item deleted.", "success");
					window.location.href = table+"?del="+delId;
				} else {
					swal("Cancelled", "You Cancelled", "error");
				}
			});
	}
</script>

