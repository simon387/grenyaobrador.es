const contextPath = "/almacen/fe";
const rest = "/almacen/rest/";

$(document).ready(function () {
	$("#sidebarToggleTop-custom").on("click", function () {
		if ("flex" === $("#accordionSidebar").css("display")) {
			$("#accordionSidebar").css("display", "none");
		} else {
			$("#accordionSidebar").css("display", "flex");
		}
	});
});

function blockScreen() {
	$(".loading").fadeIn();
}

function unblockScreen() {
	$(".loading").fadeOut();
}

function getCurrentFormattedTimestamp() {
	const d = new Date();
	return d.getFullYear() + "-" + (d.getMonth() + 1).toString().padStart(2, "0") + "-" +
		d.getDate().toString().padStart(2, "0") + " " + d.getHours().toString().padStart(2, "0") + ":" +
		d.getMinutes().toString().padStart(2, "0") + ":" + d.getSeconds().toString().padStart(2, "0");
}

function escapeHTML(text) {
	let result;
	if (text != null) {
		result = text.replace(/"/g, '&quot;')
	}
	return result;
}