let period;
let user;

$(document).ready(function () {
	getLastPeriod();
	getSuppliers();
	$("#btn-new-page").on("click", function () {
		$('#newPeriodModal').modal('show');
	});
	$("#btn-prev-page").on("click", function () {
		$.ajax({
			type: 'GET',
			url: rest + "period/previous.php?id=" + period["id"],
			processData: false,
			contentType: false,
			success: function (data) {
				try {
					const previous = JSON.parse(data);
					if (null !== previous["id"]) {
						period = previous;
						refreshPeriod();
						document.getElementById("btn-next-page").disabled = false;
					} else {
						document.getElementById("btn-prev-page").disabled = true;
					}
				} catch(error) {
					document.getElementById("btn-prev-page").disabled = true;
				}
			},
		});
	});
	$("#btn-next-page").on("click", function () {
		$.ajax({
			type: 'GET',
			url: rest + "period/next.php?id=" + period["id"],
			processData: false,
			contentType: false,
			success: function (data) {
				document.getElementById("btn-prev-page").disabled = false;
				const next = JSON.parse(data);
				if (null !== next["id"]) {
					period = next;
					refreshPeriod();
				}
			},
		});
	});
	$("#input-search").on("textInput input", function () {
		search();
	});
	$("#btn-search").on("click", function () {
		search();
	});
});

function search() {
	document.getElementById("supplier-selected").innerHTML = "todos los proveedores";
	const query = document.getElementById("input-search").value;
	if ("" === query) {
		return;
	}
	$.ajax({
		type: "POST",
		url: rest + "product/search.php",
		contentType: "application/json; charset=utf-8",
		processData: false,
		dataType: "json",
		data: JSON.stringify({
			query,
			period: period["id"],
		}),
		success: function (data_) {
			removeActiveClassFromSupplier();
			renderTableDashboard(dataTableDashboard, data_, true);
		},
		error: function () {
			console.clear();
			dataTableDashboard.clear();
			dataTableDashboard.draw();
		},
	});
}

const dataTableDashboard = $('#dataTableDashboard').DataTable({
	paging: true, //ASK MARIO
	language: {
		url: contextPath + "/vendor/datatables/es.json",
	},
	searching: true,
	autoWidth: false,
	columnDefs: [
		{"width": "20%", orderable: false, targets: [0]},
		{"width": "10%", orderable: false, targets: [1]},
		{"width": "10%", orderable: false, targets: [2]},
		{"width": "10%", orderable: false, targets: [3]},
		{"width": "10%", orderable: false, targets: [4]},
		{"width": "10%", orderable: false, targets: [5]},
		{"width": "10%", orderable: false, targets: [6]},
		{"width": "20%", orderable: false, targets: [7]},
	],
	aaSorting: [],
	responsive: true,
	rowReorder: {
		selector: 'td:nth-child(2)'
	},
});

function getLastPeriod() {
	$.ajax({
		type: 'GET',
		url: rest + "period/readLast.php",
		processData: false,
		contentType: false,
		success: function (data) {
			period = JSON.parse(data);
			getUserInfo();
		},
	});
}

function getUserInfo() {
	$.ajax({
		type: 'GET',
		url: rest + "user/read.php?id=" + userId,
		processData: false,
		contentType: false,
		success: function (data) {
			user = JSON.parse(data);
			refreshPeriod();
		},
	});
}

function refreshPeriod() {
	document.getElementById("period-from").innerHTML = period["start"];
	document.getElementById("period-to").innerHTML = period["end"] === null ? "ahora" : period["end"];
	if (null === period["end"]) {
		document.getElementById("btn-next-page").disabled = true;
	}
	if ("1" === period["counter"]) {
		document.getElementById("btn-prev-page").disabled = true;
	}
	getDatatableDataBySupplierAndPeriod(2, period["id"]);
}

function getSuppliers() {
	$.ajax({
		type: 'GET',
		url: rest + "supplier/readAll.php",
		processData: false,
		contentType: false,
		success: function (data) {
			const array = JSON.parse(data).list;
			let innerHTML = "";
			for (let i = 1; i < array.length; i++) {
				let active = "";
				if (i === 1) {
					active = "active";
					document.getElementById("supplier-selected").innerHTML = array[i]["name"].toUpperCase();
				}
				innerHTML += '<li class="page-item ' + active + '" data-text="' + array[i]["id"] +
					'"><a class="page-link" href="#">' + array[i]["name"].toUpperCase() + '</a></li>';
			}

			document.getElementById("main-paginator").innerHTML = innerHTML;

			$(".page-item").on("click", function () {
				removeActiveClassFromSupplier();
				$(this).addClass('active');
				document.getElementById("supplier-selected").innerHTML = this.innerText;
				getDatatableDataBySupplierAndPeriod($(this).attr("data-text"), period["id"]);
			});
		}
	});
}

function removeActiveClassFromSupplier() {
	const elems = document.querySelectorAll(".page-item");
	[].forEach.call(elems, function (el) {
		el.classList.remove("active");
	});
}

function getDatatableDataBySupplierAndPeriod(supplierID, periodID) {
	blockScreen();
	$.ajax({
		type: "GET",
		url: rest + "product/read.php?supplier_id=" + supplierID + "&period_id=" + periodID,
		success: function (data) {
			renderTableDashboard(dataTableDashboard, data);
		},
		error: function () {
			console.clear();
			unblockScreen();
			dataTableDashboard.clear();
			dataTableDashboard.draw();
		}
	});
}

function renderTableDashboard(dataTable, data, isFromSearch = false) {
	dataTable.clear();
	const array = isFromSearch ? data.list : JSON.parse(data).list;
	const disabledDeposit = user["role"] === "admin" || user["role"] === "super-admin" ? "" : "disabled";
	const disabledOf0 = user["role"] === "comarea" ? "disabled" : "";
	const disabledOf1 = user["role"] === "placa" ? "disabled" : "";
	$.each(array, function (ind, o) {
		const id = o["id"];
		const name = isFromSearch ? o["supplier"].toUpperCase() + " - <strong>" + o["name"] + "</strong>" : o["name"];
		const unit = null === o["unit"] ? "" : o["unit"];
		const note = null === o["note"] ? "" : o["note"];
		const deposit = null === o["deposit"] ? "" : o["deposit"];
		const outflow0 = null === o["outflow0"] ? "" : o["outflow0"];
		const outflow1 = null === o["outflow1"] ? "" : o["outflow1"];
		const left = calcFlow(deposit, outflow0, outflow1);
		const lastOperation = null === o["lastOperation"] ? "" : o["lastOperation"];
		dataTable.row.add([
			name,
			unit,
			note,
			'<input ' + disabledDeposit + ' onchange="updateProduct(' + id + ', 0)" type="number" min="0" value="' + deposit + '" class="form-control" id="deposit-' + id + '">',
			'<input ' + disabledOf0 + ' onchange="updateProduct(' + id + ', 1)" type="number" min="0" value="' + outflow0 + '" class="form-control" id="outflow0-' + id + '">',
			'<input ' + disabledOf1 + ' onchange="updateProduct(' + id + ', 2)" type="number" min="0" value="' + outflow1 + '" class="form-control" id="outflow1-' + id + '">',
			'<input disabled type="number" value="' + left + '" class="form-control" id="left-' + id + '">',
			'<div id="lastOperation-' + id + '">' + lastOperation + '</div>',
		]);
	});
	dataTable.draw();
	unblockScreen();
}

function updateProduct(id, operation) {
	let deposit = document.getElementById("deposit-" + id).value;
	let outflow0 = document.getElementById("outflow0-" + id).value;
	let outflow1 = document.getElementById("outflow1-" + id).value;
	deposit = deposit === "" ? 0 : deposit;
	outflow0 = outflow0 === "" ? 0 : outflow0;
	outflow1 = outflow1 === "" ? 0 : outflow1;
	const left = calcFlow(deposit, outflow0, outflow1);
	document.getElementById("left-" + id).value = left;
	let num;
	switch (operation) {
		case 0:
			operation = "<em>Entrada</em>";
			num = deposit;
			break;
		case 1:
			operation = "<em>Salida Plaça</em>";
			num = outflow0;
			break;
		case 2:
			operation = "<em>Salida Comarea</em>";
			num = outflow1;
			break;
	}
	const lastOperation = getCurrentFormattedTimestamp() + " - <strong>" + username + "</strong> ha puesto " + operation + " a " + num;
	document.getElementById("lastOperation-" + id).innerHTML = lastOperation;
	$.ajax({
		type: "PUT",
		url: rest + "product/update.php",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		data: JSON.stringify({
			id,
			deposit,
			outflow0,
			outflow1,
			left,
			userId,
			lastOperation,
		}),
	});
}

$("#btn-new-page-confirm").on("click", function () {
	blockScreen();
	$.ajax({
		type: "POST",
		url: rest + "period/create.php",
		success: function () {
			location.reload();
			unblockScreen();
		},
	});
});

function calcFlow(deposit, outflow0, outflow1) {
	let left = deposit - outflow0 - outflow1;
	if (left < 0) {
		left = 0;
	}
	return left;
}