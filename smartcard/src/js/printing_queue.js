async function fetchPrintingQueue(page = 1, params = {}) {
	const qp = new URLSearchParams(Object.assign({ page: page }, params));
	const res = await fetch("api/printing_queue_list.php?" + qp.toString());
	if (!res.ok) throw new Error("Failed to fetch");
	const json = await res.json();
	return json;
}

function renderPQTable(data) {
	const tbody = document.querySelector("#pqTable tbody");
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
		const dtFormatted = formatDatetime(row.Datetime);
		tr.innerHTML = `<td>${row.id}</td><td>${row.reg_no}</td><td>${row.district_id}</td><td>${row.eto_id}</td><td>${dtFormatted}</td><td>${row.status}</td><td><button class="btn btn-sm btn-danger pq-delete" data-id="${row.id}">Delete</button></td>`;
		tbody.appendChild(tr);
	});
	// hide delete buttons if not admin
	const mainEl = document.querySelector("main[data-is-admin]");
	const isAdmin = mainEl && mainEl.getAttribute("data-is-admin") === "1";
	if (!isAdmin) {
		document
			.querySelectorAll(".pq-delete")
			.forEach((b) => (b.style.display = "none"));
	}
}

function renderPQPagi(pagination, params) {
	const el = document.getElementById("pqPagination");
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
			await loadPQ(p, params);
		});
	});
}

async function loadPQ(page = 1, params = {}) {
	try {
		const json = await fetchPrintingQueue(page, params);
		if (json && json.data) {
			renderPQTable(json.data);
			if (json.pagination) renderPQPagi(json.pagination, params);
		}
	} catch (err) {
		console.error(err);
		alert("Failed to load printing queue");
	}
}

document.addEventListener("DOMContentLoaded", function () {
	const params = {};
	const form = document.getElementById("pqSearchForm");
	form.addEventListener("submit", function (ev) {
		ev.preventDefault();
		params.reg_no = form.elements["reg_no"].value.trim();
		loadPQ(1, params);
	});

	// delete handling
	let deleteId = null;
	document.body.addEventListener("click", function (ev) {
		if (ev.target.classList.contains("pq-delete")) {
			deleteId = ev.target.dataset.id;
			var modal = new bootstrap.Modal(document.getElementById("pqDeleteModal"));
			modal.show();
		}
	});
	const deleteConfirm = document.getElementById("pqDeleteConfirm");
	if (deleteConfirm)
		deleteConfirm.addEventListener("click", async function () {
			if (!deleteId) return;
			try {
				const res = await fetch("api/printing_queue_delete.php", {
					method: "POST",
					body: new URLSearchParams({ id: deleteId }),
				});
				if (!res.ok) throw new Error("delete failed");
				const txt = await res.text();
				// reload
				loadPQ(1, params);
				var modalEl = document.getElementById("pqDeleteModal");
				var modal = bootstrap.Modal.getInstance(modalEl);
				if (modal) modal.hide();
			} catch (err) {
				alert("Delete failed");
				console.error(err);
			}
		});

	loadPQ(1, params);
});
