<?php
require_once '../../../rest/config/protect.php';
with('components/pages/login.php', "scope");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php include "../head.title.php"; ?>
	<!-- Custom fonts for this template-->
	<link href="/almacen/fe/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="/almacen/fe/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="/almacen/fe/css/spinner-overlay.css" rel="stylesheet">
	<link href="/almacen/fe/css/custom.css" rel="stylesheet">
	<link rel="shortcut icon" href="/almacen/fe/img/warehouse_122331.ico"/>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
	<?php include "../sidebar.php"; ?>

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">
			<?php include "../topbar.php"; ?>
			<?php include "../pages/suppliers_body.php"; ?>
		</div>
		<!-- End of Main Content -->

		<?php include "../footer.php"; ?>
	</div>
	<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<em class="fas fa-angle-up"></em>
</a>

<?php include "../modals/logoutModal.php"; ?>
<?php include "../modals/newSupplierModal.php"; ?>

<!-- Bootstrap core JavaScript-->
<script src="/almacen/fe/vendor/jquery/jquery.min.js"></script>
<script src="/almacen/fe/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/almacen/fe/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/almacen/fe/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/almacen/fe/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/almacen/fe/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="/almacen/fe/js/custom.js"></script>

<!-- Page level custom scripts -->
<script src="/almacen/fe/js/suppliers/suppliers.js"></script>

<script type="application/javascript">
	const userId = <?php echo $_SESSION['userid'] ?>;
	const username = "<?php echo $_SESSION['username'] ?>";
</script>

<!-- Modal spinner in overlay -->
<div class="loading" style="display:none;">Loading&#8230;</div>

</body>
</html>
