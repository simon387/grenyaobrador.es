<?php
require_once '../rest/config/protect.php';
with('components/pages/login.php', "scope");
?>
<!DOCTYPE html>
<html lang="es">
<?php include "components/head.php"; ?>

<body id="page-top">

<div id="wrapper">
	<?php include "components/sidebar.php"; ?>
	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
			<?php include "components/topbar.php"; ?>
			<?php include "components/pages/dashboard.php"; ?>
		</div>
		<?php include "components/footer.php"; ?>
	</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
	<em class="fas fa-angle-up"></em>
</a>
<?php include "components/modals/logoutModal.php"; ?>
<?php include "components/modals/newPeriodModal.php"; ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="vendor/datatables-responsive/db-resp-min.js"></script>
<script src="js/custom.js"></script>
<script src="js/dashboard/dashboard.js"></script>

<script type="application/javascript">
	const userId = <?php echo $_SESSION['userid'] ?>;
	const username = "<?php echo $_SESSION['username'] ?>";
</script>

<div class="loading" style="display:none;">Loading&#8230;</div>

</body>
</html>
