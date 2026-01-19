async function fetchPrintingLogs(page = 1, params = {}) {
	const qp = new URLSearchParams(Object.assign({ page: page }, params));
	const res = await fetch("api/printing_logs_list.php?" + qp.toString());
	if (!res.ok) throw new Error("Failed to fetch");
	const json = await res.json();
	return json;
}

function renderPLTable(data) {
	const tbody = document.querySelector("#plTable tbody");
	tbody.innerHTML = "";
	data.forEach((row) => {
		// format datetime to dd-MM-yyyy hh:mm:ss
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
		const dtFormatted = formatDatetime(row.datetime);
		const serial = row.serial_no ? String(row.serial_no).padStart(8, "0") : "";
		const serialHtml = serial
			? `<span class="serial-text">${serial}</span> <button class="btn btn-sm btn-outline-secondary copy-serial" data-serial="${serial}">Copy</button>`
			: "";
		tr.innerHTML = `<td>${row.id}</td><td>${serialHtml}</td><td>${
			row.reg_no
		}</td><td>${row.district_id}</td><td>${
			row.eto_id
		}</td><td>${dtFormatted}</td><td>${row.remarks || ""}</td><td>${
			row.psid || ""
		}</td>`;
		tbody.appendChild(tr);
	});
}

function renderPLPagi(pagination, params) {
	const el = document.getElementById("plPagination");
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

	el.appendChild(pageItem(Math.max(1, current - 1), "Prev", current === 1));
	const start = Math.max(1, current - 2);
	const end = Math.min(last, current + 2);
	for (let p = start; p <= end; p++) {
		const li = pageItem(p, p, false);
		if (p === current) li.classList.add("active");
		el.appendChild(li);
	}
	el.appendChild(
		pageItem(Math.min(last, current + 1), "Next", current === last)
	);

	el.querySelectorAll("a.page-link").forEach((a) => {
		a.addEventListener("click", async function (ev) {
			ev.preventDefault();
			const p = parseInt(this.dataset.page);
			await loadPL(p, params);
		});
	});
}

async function loadPL(page = 1, params = {}) {
	try {
		const json = await fetchPrintingLogs(page, params);
		if (json && json.data) {
			renderPLTable(json.data);
			if (json.pagination) renderPLPagi(json.pagination, params);
		}
	} catch (err) {
		console.error(err);
		alert("Failed to load printing logs");
	}
}

document.addEventListener("DOMContentLoaded", function () {
	const form = document.getElementById("plSearchForm");
	const params = {};
	form.addEventListener("submit", function (ev) {
		ev.preventDefault();
		params.reg_no = form.elements["reg_no"].value.trim();
		loadPL(1, params);
	});

	loadPL(1, params);
});

// delegated handler for copy buttons
document.body.addEventListener("click", function (ev) {
	const btn = ev.target.closest && ev.target.closest(".copy-serial");
	if (!btn) return;
	const serial = btn.dataset.serial;
	if (!serial) return;
	navigator.clipboard
		.writeText(serial)
		.then(function () {
			const old = btn.innerHTML;
			btn.innerHTML = "Copied!";
			btn.disabled = true;
			setTimeout(function () {
				btn.innerHTML = old;
				btn.disabled = false;
			}, 1500);
		})
		.catch(function (err) {
			console.error("copy failed", err);
			alert("Copy failed");
		});
});
