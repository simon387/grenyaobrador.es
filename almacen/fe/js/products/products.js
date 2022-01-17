$(document).ready(function () {
	$("#form-search").css("display", "none").removeClass(["d-none", "d-sm-inline-block"]);
	getDatatableData();
	// $("#btn-new-supplier").on("click", function () {
	// 	$('#newSupplierModal').modal('show');
	// });
	// $("#btn-add-supplier").on("click", function () {
	// 	addNewSupplier();
	// });
});

const dataTableProducts = $('#dataTableProducts').DataTable({
	language: {
		url: contextPath + "/vendor/datatables/es.json",
	},
	searching: true,
	autoWidth: false,
	columnDefs: [
		{"width": "10%", orderable: false, targets: [0]},
		{"width": "20%", orderable: false, targets: [1]},
		{"width": "20%", orderable: false, targets: [2]},
		{"width": "20%", orderable: false, targets: [3]},
		{"width": "20%", orderable: false, targets: [4]},
		{"width": "10%", orderable: false, targets: [5]},
	],
	aaSorting: [],
});

function getDatatableData() {
	blockScreen();
	$.ajax({
		type: "GET",
		url: rest + "controllers/product.php",
		success: function (data) {
			renderTableProducts(dataTableProducts, data);
		},
		error: function () {
			unblockScreen();
		}
	});
}

function renderTableProducts(dataTable, data) {
	dataTable.clear();
	// const array = JSON.parse(data).list;
	$.each(data.list, function (ind, o) {
		const id = o["id"];
		const name = null === o["name"] ? "" : o["name"];
		const supplier = null === o["supplier"] ? "" : o["supplier"];
		const unit = null === o["unit"] ? "" : o["unit"];
		const note = null === o["note"] ? "" : o["note"];
		dataTable.row.add([
			id,
			'<input id="name-' + o.id + '" class="form-control" type="text" onchange="saveProduct(' + o.id + ')" value="' + escapeHTML(name) + '">',
			'<input id="supplier-' + o.id + '" class="form-control" type="text" onchange="saveProduct(' + o.id + ')" value="' + escapeHTML(supplier) + '">',
			'<input id="unit-' + o.id + '" class="form-control" type="text" onchange="saveProduct(' + o.id + ')" value="' + escapeHTML(unit) + '">',
			'<input id="note-' + o.id + '" class="form-control" type="text" onchange="saveProduct(' + o.id + ')" value="' + escapeHTML(note) + '">',
			"btn delete"
		]);
	});
	dataTable.draw();
	unblockScreen();
}

function saveProduct(id) {

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