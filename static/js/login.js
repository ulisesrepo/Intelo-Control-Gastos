$("#login").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: 'Login/acceso_usuario',
      type: 'POST',
      dataType: 'json',
      data: $(this).serialize(),
      success: function (json) {
        if (json.response_code == "200") {
          customAlert(json.response_text);
  
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
            //   case '3':
            //     window.location.href = "aprobar";
            //     break;
            //   case '4':
            //     window.location.href = "autorizar";
            //     break;
            //   case '5':
            //     window.location.href = "ejecutivo_cuenta";
            //     break;
            //   case '6':
            //     window.location.href = "vendedor_asesor";
            //     break;
            //   case '7':
            //     window.location.href = "comercial_operativo";
            //     break;
            //   case '8':
            //     window.location.href = "comercial_autorizador";
            //     break;
            //   case '9':
            //     window.location.href = "juridico_operativo";
            //     break;
            //   case '10':
            //     window.location.href = "juridico_autorizador";
            //     break;
            //   case '11':
            //     window.location.href = "direccion";
            //     break;
            //   case '12':
            //     window.location.href = "tesoreria";
            //     break;
            //   case '13':
            //     window.location.href = "operacion";
            //     break;
            // }
          }, 2000);
        } else if (json.response_code == "500") {
          errorAlert("Oops", json.response_text);
          $(".input-group").addClass('has-warning');
        }
      },
      error: function (xhre) {
        console.log('No enviado 1');
      }
    });
  });
  
  function errorAlert(title, text) {
    swal("¡" + title + "!", "¡" + text + "!", "error")
  }
  
  function successAlert(text) {
    swal("¡Felicidades!", "¡" + text + "!", "success")
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