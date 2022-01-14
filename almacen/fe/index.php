<?php
require_once '../rest/config/protect.php';
with('components/pages/login.php', "scope");
?>

<!DOCTYPE html>
<html lang="es">
<?php include "components/head.php"; ?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
	<?php include "components/sidebar.php"; ?>

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">
			<?php include "components/topbar.php"; ?>
			<?php include "components/pages/dashboard.php"; ?>
		</div>
		<!-- End of Main Content -->

		<?php include "components/footer.php"; ?>
	</div>
	<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<em class="fas fa-angle-up"></em>
</a>

<?php include "components/modals/logoutModal.php"; ?>
<?php include "components/modals/newPeriodModal.php"; ?>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="js/custom.js"></script>

<!-- Page level custom scripts -->
<script src="js/dashboard/dashboard.js"></script>

<script type="application/javascript">
	const userId = <?php echo $_SESSION['userid'] ?>;
	const username = "<?php echo $_SESSION['username'] ?>";
</script>

<!-- Modal spinner in overlay -->
<div class="loading" style="display:none;">Loading&#8230;</div>

</body>
</html>
