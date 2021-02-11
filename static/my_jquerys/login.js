$(document).ready(function () {
	$(document).on('click', '#show-password', function () {
		password1 = document.querySelector('.password1');
		if (password1.type === "password") {
			password1.type = "text";
			$('#eye').removeClass('fa-eye');
			$('#eye').addClass('fa-eye-slash');
		} else {
			password1.type = "password";
			$('#eye').removeClass('fa-eye-slash');
			$('#eye').addClass('fa-eye');
		}

	});

	var formlogin = $("#login").submit(function (event) {
		event.preventDefault();
		$.ajax({
			url: 'Login/acceso_usuario',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			success: function (json) {
				if (json.response_code == 200) {
					customAlert(json.response_text);
					// localStorage.setItem("id_usuario", json.response_data);
					// localStorage.setItem("tipo_usuario", json.response_data1);
					setTimeout(function () {
						// window.location.href = "Principal";
						switch(json.response_data) {
						  case '1':
						    window.location.href = "Principal";
						    break;
						  case '2':
						    window.location.href = "Principal";
							break;
							case '3':
						    window.location.href = "AnalisisGastos";
						    break;
						}
					}, 1000);
				} else if (json.response_code == 500) {
					infoAlert("Verifica", json.response_text);
				} else {
					infoAlert("Verifica", json.response_text);
				}
			},
			error: function (xhr) {
				infoAlert("Verifica", json.response_text);
			}
		});
	});

	function successAlert(text) {
		Swal.fire(
			'¡Exito!', text, 'success'
		)
	}

	function infoAlert(mensaje, text) {
		Swal.fire(
			mensaje, text, 'question'
		)
	}

	function customAlert(text) {
		Swal.fire({
			title: "¡Acceso Correcto!",
			text: text,
			type: "success",
			timer: 1000,
			showConfirmButton: false
		})
	}
})
