$(document).ready(function () {
	$("#form-search").css("display", "none").removeClass(["d-none", "d-sm-inline-block"]);
	getDatatableData();
	$("#btn-new-supplier").on("click", function () {
		$('#newSupplierModal').modal('show');
	});
	$("#btn-add-supplier").on("click", function () {
		addNewSupplier();
	});
});

const dataTableSuppliers = $('#dataTableSuppliers').DataTable({
	language: {
		url: contextPath + "/vendor/datatables/es.json",
	},
	searching: true,
	autoWidth: false,
	columnDefs: [
		{"width": "100%", orderable: false, targets: [0]},
	],
	aaSorting: [],
});

function getDatatableData() {
	blockScreen();
	$.ajax({
		type: "GET",
		url: rest + "supplier/readAll.php",
		success: function (data) {
			renderTableLogs(dataTableSuppliers, data);
		},
		error: function () {
			unblockScreen();
		}
	});
}

function renderTableLogs(dataTable, data) {
	dataTable.clear();
	const array = JSON.parse(data).list;
	$.each(array, function (ind, o) {
		if (o.id === "1") {
			return;
		}
		const name = null === o["name"] ? "" : o["name"];
		dataTable.row.add([
			'<input id="supplier-' + o.id + '" class="form-control" type="text" onchange="saveSupplier(' + o.id + ')" value="' + escapeHTML(name) + '">'
		]);
	});
	dataTable.draw();
	unblockScreen();
}

function saveSupplier(id) {
	const name = document.getElementById("supplier-" + id).value;
	$.ajax({
		type: "PUT",
		url: rest + "supplier/update.php",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		data: JSON.stringify({
			id,
			name,
		}),
	});
}

function addNewSupplier() {
	const name = document.getElementById("name").value;
	document.getElementById("name").value = "";
	blockScreen();
	$.ajax({
		type: "POST",
		url: rest + "supplier/create.php",
		contentType: "application/json; charset=utf-8",
		processData: false,
		dataType: "json",
		data: JSON.stringify({
			name,
		}),
		success: function () {
			location.reload();
			unblockScreen();
		},
	});
}