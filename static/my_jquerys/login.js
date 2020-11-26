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
  
  var formlogin =$("#login").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: 'Login/acceso_usuario',
      type: 'POST',
      dataType: 'json',
      data: $(this).serialize(),
      success: function (json) {
        if (json.response_code == 200) {
          successAlert(json.response_text);
          localStorage.setItem("id_perfil_usuario", json.response_data);
          localStorage.setItem("descripcion_usuario", json.response_data1);
          setTimeout(function () {
            window.location.href = "admin";
            // switch(json.response_data) {
            //   case '1':
            //     window.location.href = "admin";
            //     break;
            //   case '2':
            //     window.location.href = "validar";
            //     break;
            // }
          }, 2000);
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
    swal({
      title: "¡Acceso Correcto!",
      text: text,
      timer: 2000,
      type: "success",
      showConfirmButton: false
    })
  }
  })