document.addEventListener("DOMContentLoaded", function () {
	const form = document.getElementById("spSearchForm");
	const resultCard = document.getElementById("spResult");
	const detailsEl = document.getElementById("spDetails");
	const regEl = document.getElementById("spReg");
	const spEto = document.getElementById("spEto");
	const spRemarks = document.getElementById("spRemarks");
	const addBtn = document.getElementById("spAddBtn");
	const clearBtn = document.getElementById("spClearBtn");
	const spMessage = document.getElementById("spMessage");
	let currentData = null;

	form.addEventListener("submit", async function (ev) {
		ev.preventDefault();
		const fd = new FormData(form);
		const params = new URLSearchParams();
		for (const [k, v] of fd.entries()) params.append(k, v);
		try {
			const res = await fetch("api/vehicle_info.php", {
				method: "POST",
				body: params,
			});
			if (!res.ok) throw new Error("fetch failed");
			const json = await res.json();
			if (json && json.data) {
				currentData = json.data;
				renderData(currentData);
				resultCard.classList.remove("d-none");
				// prefill eto with logged in user's eto if available
				const mainEl = document.querySelector("main[data-eto-id]");
				if (mainEl) spEto.value = mainEl.getAttribute("data-eto-id") || "";
				spMessage.classList.add("d-none");
			} else {
				spMessage.classList.remove("d-none");
				spMessage.className = "alert alert-info mt-3";
				spMessage.textContent =
					"No vehicle information found for the provided Registration and District.";
				resultCard.classList.add("d-none");
			}
		} catch (err) {
			console.error(err);
			spMessage.classList.remove("d-none");
			spMessage.className = "alert alert-danger mt-3";
			spMessage.textContent =
				"Failed to fetch vehicle info. Please try again later.";
		}
	});

	function toTitle(str) {
		return String(str)
			.replace(/_/g, " ")
			.replace(/\w\S*/g, function (txt) {
				return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
			});
	}

	function renderData(d) {
		// registration header if present
		regEl.textContent = d.registration_number || "";
		detailsEl.innerHTML = "";

		// sort keys so output is stable and predictable
		const keys = Object.keys(d).sort();
		keys.forEach((key) => {
			let val = d[key];
			if (val === null || typeof val === "undefined") val = "";
			else if (typeof val === "object") val = JSON.stringify(val);
			const li = document.createElement("li");
			li.className = "list-group-item";
			li.innerHTML = `<strong>${toTitle(key)}:</strong> ${String(val)}`;
			detailsEl.appendChild(li);
		});
	}

	addBtn.addEventListener("click", async function () {
		if (!currentData) {
			spMessage.classList.remove("d-none");
			spMessage.className = "alert alert-warning mt-3";
			spMessage.textContent = "No vehicle selected to add.";
			return;
		}
		const eto = spEto.value ? parseInt(spEto.value) : 0;
		const remarks = spRemarks.value || "";
		// client-side validation
		if (!eto || eto <= 0) {
			spMessage.classList.remove("d-none");
			spMessage.className = "alert alert-danger mt-3";
			spMessage.textContent = "ETO ID is required.";
			return;
		}
		if (remarks.length < 12) {
			spMessage.classList.remove("d-none");
			spMessage.className = "alert alert-danger mt-3";
			spMessage.textContent = "Remarks must be at least 12 characters.";
			return;
		}
		// prefer DistrictID from the search form (keeps user's explicit input)
		const districtFromForm = form.elements["DistrictID"]
			? form.elements["DistrictID"].value
			: "";
		const fd = new URLSearchParams({
			reg_no: currentData.registration_number,
			district_id: districtFromForm || currentData.district_id || "",
			eto_id: eto,
			status: "Pending",
			remarks: remarks,
			priority: 1,
		});
		try {
			addBtn.disabled = true;
			addBtn.textContent = "Adding...";
			const res = await fetch("api/printing_queue_add.php", {
				method: "POST",
				body: fd,
			});
			if (!res.ok) throw new Error("add failed");
			const txt = await res.text();
			if (res.ok) {
				spMessage.classList.remove("d-none");
				spMessage.className = "alert alert-success mt-3";
				spMessage.textContent = "Added to printing queue.";
				// clear the displayed data but keep the success message
				clearResult(true);
			} else {
				spMessage.classList.remove("d-none");
				spMessage.className = "alert alert-danger mt-3";
				spMessage.textContent = txt || "Failed to add to printing queue.";
			}
		} catch (err) {
			console.error(err);
			spMessage.classList.remove("d-none");
			spMessage.className = "alert alert-danger mt-3";
			spMessage.textContent = "Failed to add to printing queue.";
		} finally {
			addBtn.disabled = false;
			addBtn.textContent = "Add to Print";
		}
	});

	function clearResult(keepMessage) {
		currentData = null;
		resultCard.classList.add("d-none");
		detailsEl.innerHTML = "";
		regEl.textContent = "";
		spRemarks.value = "";
		if (!keepMessage) spMessage.classList.add("d-none");
	}

	clearBtn.addEventListener("click", function () {
		clearResult(false);
	});
});
