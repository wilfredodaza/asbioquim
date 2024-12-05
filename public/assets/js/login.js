async function sendLogin(e){
	e.preventDefault();
	Swal.fire({
		showConfirmButton: false,
		allowOutsideClick: false,
		customClass: {},
		willOpen: function () {
			Swal.showLoading();
		}
	});
	let url = base_url(['validation']);
	let data = $(e.target).serialize();
	const res = await proceso_fetch(url, data);
	Swal.close();
	if(res.errors){
		return Swal.fire({
			position: 'top-end',
			icon: 'error',
			text: res.errors,
		});
	}
	location.href = res.login;
}