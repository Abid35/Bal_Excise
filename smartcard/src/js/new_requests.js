async function fetchNewRequests(page = 1, params = {}) {
	const qp = new URLSearchParams(Object.assign({ page: page }, params));
	const res = await fetch("api/etanb_paid_vehicles.php?" + qp.toString());
	if (!res.ok) throw new Error("Failed to fetch");
	const json = await res.json();
	return json;
}

function renderTable(data) {
	const tbody = document.querySelector("#nrTable tbody");
	tbody.innerHTML = "";
	data.forEach((row) => {
		// format Date to dd-MM-yyyy hh:mm:ss
		function formatDatetime(dt) {
			if (!dt) return "";
			const m = String(dt).match(
				/^(\d{4})-(\d{2})-(\d{2})[ T](\d{2}):(\d{2}):(\d{2})/
			);
			if (m) return `${m[3]}-${m[2]}-${m[1]} ${m[4]}:${m[5]}:${m[6]}`;
			const d = new Date(dt);
			if (isNaN(d)) return dt;
			const pad = (n) => String(n).padStart(2, "0");
			return `${pad(d.getDate())}-${pad(
				d.getMonth() + 1
			)}-${d.getFullYear()} ${pad(d.getHours())}:${pad(d.getMinutes())}:${pad(
				d.getSeconds()
			)}`;
		}

		const tr = document.createElement("tr");
		const dtFormatted = formatDatetime(row.Date);
		tr.innerHTML = `<td>${row.RegistrationNo}</td><td>${row.EtoId}</td><td>${
			row.DistricId
		}</td><td>${
			row.PSID
		}</td><td>${dtFormatted}</td><td><button class="btn btn-sm btn-primary view-request" data-reg="${encodeURIComponent(
			row.RegistrationNo
		)}" data-district="${encodeURIComponent(
			row.DistricId
		)}" data-eto="${encodeURIComponent(
			row.EtoId
		)}" data-psid="${encodeURIComponent(row.PSID)}">View</button></td>`;
		tbody.appendChild(tr);
	});
}

function renderPagination(pagination, params) {
	const el = document.getElementById("nrPagination");
	el.innerHTML = "";
	const current = pagination.current_page;
	const last = pagination.last_page;

	function pageItem(p, label, disabled) {
		const li = document.createElement("li");
		li.className = "page-item" + (disabled ? " disabled" : "");
		const a = document.createElement("a");
		a.className = "page-link";
		a.href = "#";
		a.dataset.page = p;
		a.textContent = label || p;
		li.appendChild(a);
		return li;
	}

	// prev
	el.appendChild(pageItem(Math.max(1, current - 1), "Prev", current === 1));

	// pages window
	const start = Math.max(1, current - 2);
	const end = Math.min(last, current + 2);
	for (let p = start; p <= end; p++) {
		const li = pageItem(p, p, false);
		if (p === current) li.classList.add("active");
		el.appendChild(li);
	}

	// next
	el.appendChild(
		pageItem(Math.min(last, current + 1), "Next", current === last)
	);

	// click handler
	el.querySelectorAll("a.page-link").forEach((a) => {
		a.addEventListener("click", async function (ev) {
			ev.preventDefault();
			const p = parseInt(this.dataset.page);
			await loadAndRender(p, params);
		});
	});
}

async function loadAndRender(page = 1, params = {}) {
	const loader = document.getElementById("nrLoader");
	try {
		if (loader) loader.classList.remove("d-none");
		const json = await fetchNewRequests(page, params);
		if (json && json.data) {
			renderTable(json.data);
			if (json.pagination) renderPagination(json.pagination, params);
		}
	} catch (err) {
		console.error(err);
		alert("Failed to load requests");
	} finally {
		if (loader) loader.classList.add("d-none");
	}
}

document.addEventListener("DOMContentLoaded", function () {
	const form = document.getElementById("nrSearchForm");
	const params = {};
	// include logged-in user's eto id if present on the page
	const mainEl = document.querySelector("main[data-eto-id]");
	if (mainEl) {
		const eto = mainEl.getAttribute("data-eto-id");
		if (eto) params.EtoId = eto;
		const districtAttr = mainEl.getAttribute("data-district-id");
		if (districtAttr) params.DistrictID = districtAttr;
	}

	// wire search form to include RegNo and DistrictID
	if (form) {
		form.addEventListener("submit", function (ev) {
			ev.preventDefault();
			params.RegNo = form.elements["RegNo"]
				? form.elements["RegNo"].value.trim()
				: "";
			params.DistrictID = form.elements["DistrictID"]
				? form.elements["DistrictID"].value.trim()
				: "";
			loadAndRender(1, params);
		});
	}

	// initial load
	loadAndRender(1, params);

	// handle view button clicks
	document.body.addEventListener("click", function (ev) {
		if (ev.target.classList.contains("view-request")) {
			const reg = decodeURIComponent(ev.target.dataset.reg);
			const district = decodeURIComponent(ev.target.dataset.district);
			const eto = decodeURIComponent(
				ev.target.dataset.eto || params.eto_id || params.EtoId || ""
			);
			const psid = decodeURIComponent(ev.target.dataset.psid || "");

			document.getElementById("vrReg").textContent = reg;
			document.getElementById("vrRegInput").value = reg;
			document.getElementById("vrDistrictInput").value = district;
			document.getElementById("vrEtoInput").value = eto;
			document.getElementById("vrPsIdInput").value = psid;
			// reset checkboxes
			document.getElementById("vrVerify").checked = false;
			document.getElementById("vrData").checked = false;
			document.getElementById("vrFee").checked = false;
			var modal = new bootstrap.Modal(
				document.getElementById("viewRequestModal")
			);
			modal.show();
		}
	});

	// Approve handler
	const approveBtn = document.getElementById("vrApprove");
	if (approveBtn)
		approveBtn.addEventListener("click", async function () {
			const form = document.getElementById("vrForm");
			// ensure required checkboxes are checked
			const verify = form.elements["verify"];
			const dataEntered = form.elements["data_entered"];
			const feePaid = form.elements["fee_paid"];
			if (!verify.checked || !dataEntered.checked || !feePaid.checked) {
				alert("Please complete all checklist items before approving.");
				return;
			}

			const originalText = approveBtn.innerHTML;
			approveBtn.disabled = true;
			approveBtn.innerHTML =
				'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Approving...';

			try {
				const fd = new FormData(form);
				const psid = form.elements["psid"].value;
				// build status summary
				const checks = [];
				if (verify.checked) checks.push("Verification Completed");
				if (dataEntered.checked) checks.push("Data Entered");
				if (feePaid.checked) checks.push("Fee Paid");
				const status = checks.join(", ");
				fd.append("status", status);
				fd.append("psid", psid);

				console.log(fd);

				// POST to api/printing_queue.php
				const res = await fetch("api/printing_queue.php", {
					method: "POST",
					body: fd,
				});
				if (!res.ok) throw new Error("Request failed");
				const txt = await res.text();
				// close modal on success
				var modalEl = document.getElementById("viewRequestModal");
				var modal = bootstrap.Modal.getInstance(modalEl);
				if (modal) modal.hide();
			} catch (err) {
				console.error(err);
				alert("Failed to approve request. Please try again.");
			} finally {
				approveBtn.disabled = false;
				approveBtn.innerHTML = originalText;
			}
		});
});
