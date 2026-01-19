async function fetchUsers() {
	const res = await fetch("api/users.php");
	const data = await res.json();
	const tbody = document.querySelector("#usersTable tbody");
	tbody.innerHTML = "";
	data.forEach((u) => {
		const tr = document.createElement("tr");
		tr.innerHTML = `<td>${u.id}</td><td>${u.username}</td><td>${u.role}</td><td>${u.district_id}</td><td>${u.eto_id}</td><td><button class="btn btn-sm btn-secondary edit-user" data-id="${u.id}">Edit</button> <button class="btn btn-sm btn-danger delete-user" data-id="${u.id}">Delete</button></td>`;
		tbody.appendChild(tr);
	});
}

document.addEventListener("DOMContentLoaded", function () {
	const createBtn = document.getElementById("createUserBtn");
	if (createBtn)
		createBtn.addEventListener("click", function () {
			const form = document.getElementById("userForm");
			form.reset();
			form.elements["id"].value = "";
		});

	document.body.addEventListener("click", async function (e) {
		if (e.target.classList.contains("edit-user")) {
			const id = e.target.dataset.id;
			const res = await fetch("api/users.php?id=" + id);
			const user = await res.json();
			const form = document.getElementById("userForm");
			form.elements["id"].value = user.id;
			form.elements["username"].value = user.username;
			form.elements["role"].value = user.role;
			form.elements["district_id"].value = user.district_id;
			form.elements["eto_id"].value = user.eto_id;
			var modal = new bootstrap.Modal(document.getElementById("userModal"));
			modal.show();
		}
	});

	const userForm = document.getElementById("userForm");
	if (userForm)
		userForm.addEventListener("submit", async function (ev) {
			ev.preventDefault();
			const fd = new FormData(userForm);
			const file = userForm.elements["signature"]
				? userForm.elements["signature"].files[0]
				: null;
			if (file) {
				const base64 = await fileToBase64(file);
				fd.append("signature_base64", base64.split(",")[1]);
			}
			const res = await fetch("api/users.php", { method: "POST", body: fd });
			const txt = await res.text();
			var modalEl = document.getElementById("userModal");
			var modal = bootstrap.Modal.getInstance(modalEl);
			if (modal) modal.hide();
			fetchUsers();
		});

	const userSettingsForm = document.getElementById("userSettingsForm");
	if (userSettingsForm)
		userSettingsForm.addEventListener("submit", async function (ev) {
			ev.preventDefault();
			const fd = new FormData(userSettingsForm);
			const file = userSettingsForm.elements["signature"].files[0];
			if (file) {
				const base64 = await fileToBase64(file);
				fd.append("signature_base64", base64.split(",")[1]);
			}
			const res = await fetch("api/settings_save.php", {
				method: "POST",
				body: fd,
			});
			const txt = await res.text();
			alert(txt);
		});

	const changePasswordForm = document.getElementById("changePasswordForm");
	if (changePasswordForm)
		changePasswordForm.addEventListener("submit", async function (ev) {
			ev.preventDefault();
			const fd = new FormData(changePasswordForm);
			const res = await fetch("api/settings_save.php", {
				method: "POST",
				body: fd,
			});
			const txt = await res.text();
			alert(txt);
		});

	// load users if admin
	if (document.querySelector("#usersTable")) fetchUsers();

	// handle delete clicks
	let deleteId = null;
	document.body.addEventListener("click", function (ev) {
		if (ev.target.classList.contains("delete-user")) {
			// ensure admin UI shows delete buttons only, but double-check before calling
			const mainEl = document.querySelector("main[data-is-admin]");
			const isAdmin = mainEl && mainEl.getAttribute("data-is-admin") === "1";
			if (!isAdmin) return;
			if (!confirm("Delete this user?")) return;
			const id = ev.target.dataset.id;
			fetch("api/users_delete.php", {
				method: "POST",
				body: new URLSearchParams({ id: id }),
			})
				.then((r) => {
					if (!r.ok) throw new Error("delete failed");
					return r.text();
				})
				.then((txt) => fetchUsers())
				.catch((err) => {
					console.error(err);
					alert("Delete failed");
				});
		}
	});
});

function fileToBase64(file) {
	return new Promise((res, rej) => {
		const reader = new FileReader();
		reader.onload = function (e) {
			res(e.target.result);
		};
		reader.onerror = rej;
		reader.readAsDataURL(file);
	});
}
