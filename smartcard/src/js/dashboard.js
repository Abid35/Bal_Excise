document.addEventListener("DOMContentLoaded", async function () {
	try {
		const res = await fetch("api/dashboard_stats.php");
		if (!res.ok) throw new Error("failed");
		const json = await res.json();
		document.getElementById("dsPrinted").textContent = json.printed ?? "-";
		document.getElementById("dsPending").textContent = json.pending ?? "-";
		document.getElementById("dsInPrinting").textContent =
			json.in_printing ?? "-";
	} catch (e) {
		console.error(e);
	}
});
