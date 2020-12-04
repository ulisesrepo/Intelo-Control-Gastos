$(document).ready(function () {

	cargaTabla_Empleados()

	var form_validate_agregar = $('#form_empleados').validate({
		rules: {},
		messages: {},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid").removeClass("is-valid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).addClass("is-valid").removeClass("is-invalid");
		},
		submitHandler: function () {
			Swal.fire({
				title: '¿Esta seguro?',
				text: "",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#2c9faf',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, deseo guardar',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.value) {
					guardar_empleados()
				}
			})
		}
	});


	var form_validate_update =$("#form_empleados_update").validate({
		rules: {},
		messages: {},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid").removeClass("is-valid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).addClass("is-valid").removeClass("is-invalid");
		},
		submitHandler: function () {
			Swal.fire({
				title: '¿Esta seguro?',
				text: "",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#2c9faf',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, deseo actualizar',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.value) {
					actualizar_empleado()
				}
			})
		}
	});
	

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

	$(document).on('click', '#btn_borrar_empleados', function () {

		var tabla = $("#dataTable_listaempleados").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_empleado = data.id_empleados;

		Swal.fire({
			title: "¿Estas seguro?",
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#2c9faf',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Eliminar!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				// var id_empleado = data.id_empleados;
				$.ajax({
					url: "Empleados/eliminar_empleado",
					type: "POST",
					data: {
						id_empleado: id_empleado
					},
					dataType: "json",
					success: function (data) {
						if (data.response_code == 200) {
							successAlert("Eliminado!", data.response_text, "success");
							cargaTabla_Empleados()
							// tabla.row(row).remove().draw(false);
							// tabla.clear().draw(false);
						} else if (data.response_code == 500) {
							infoAlert("Verificar", data.response_text);
						}
					},
					error: function (xhr) {
						infoAlert("Verifica", data.response_text);
					}
				})
			} else {
				infoAlert("Cancelado", "La eliminación ha sido cancelada");
			}
		});
	});

	$(document).on('click', '#btn_activar_empleados', function () {

		var tabla = $("#dataTable_listaempleados").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_empleado = data.id_empleados;

		Swal.fire({
			title: "¿Estas seguro?",
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#2c9faf',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Activar',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: "Empleados/activar_empleado",
					type: "POST",
					data: {
						id_empleado: id_empleado
					},
					dataType: "json",
					success: function (data) {
						if (data.response_code == 200) {
							successAlert("Activado!", data.response_text, "success");
							cargaTabla_Empleados()
						} else if (data.response_code == 500) {
							infoAlert("Verificar", data.response_text);
						}
					},
					error: function (xhr) {
						infoAlert("Verifica", data.response_text);
					}
				});
			} else {
				infoAlert("Cancelado", "La activación ha sido cancelada");
			}
		});
	});


	$(document).on('click', '#btn_editar_empleados', function () {
		var tabla = $("#dataTable_listaempleados").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_empleado = data.id_empleados;
		var email = data.email;
		var password =data.password;
		var sucursal =data.sucursal;
		var id_usuario=data.id_usuario;
		$('#id_empleado_update').val(id_empleado);
		$('#email_modal').val(email);
        $('#password_modal').val(password);
		$('#sucursal_modal').val(sucursal);
		$('#id_usuario_modal').val(id_usuario);
		$("#modal_editar_empleados").modal("show");
	});

	
	function cargaTabla_Empleados() {
		$.ajax({
			url: "Empleados/mostrar_empleados",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#dataTable_listaempleados').DataTable({
						"language": {
							"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
						},
						"pageLength": 15,
						"scrollCollapse": true,
						"destroy": true,
						"bPaginate": false,
						"data": data.response_data,
						"columnDefs": [{
							"className": "text-center",
							"targets": "_all"
						}],
						"columns": [{
								'data': "id_empleados"
							},
							{ 	'data': null, 
								'render': function ( data, type, row ) {
								return data.nombre+' '+data.apellidos;
							} 
							},
							{
								'data': "email"
							},
							{
								'data': "sucursal"
							},
							{
								'data': null,
								'render': function (data, type, row) {
									var tipousuario = "";
									if (data.id_usuario == 1) {
										tipousuario = "<h9 class='m-0 '>Administrador</h9>"

									} else if (data.id_usuario == 2) {
										tipousuario = "<h9 class='m-0 '>Empleado</h9>"
									}
									return tipousuario;
								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return "<h9 class='m-0 text-success'>Activado</h9>"
									} else {
										return "<h9 class='m-0 text-danger'>Desactivado</h9>"
									}
								}
							},

							{
								"data": null,
								'render': function (data, type, row) {
									var boton = "";
									if (data.estatus == 1) {
										boton = "<a id='btn_borrar_empleados' class='btn btn-danger btn-sm btn_borrar_empleados'" +
											" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Borrar empleado'>" +
											"<i class='far fa-trash-alt'></i></a>"
									} else {
										boton = "<a id='btn_activar_empleados' class='btn btn-success btn-sm btn_activar_empleados'" +
											" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Activar empleado'>" +
											"<i class='fas fa-trash-restore-alt'></i></a>"
									}
									return "<a id='btn_editar_empleados' class='btn btn-dark btn-sm btn_editar_empleados'" +
										" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Editar empleado'>" +
										"<i class='far fa-edit'></i></a>    " + boton;

								}
							}
						],
					});
				} else if (data.response_code == 500) {}
			},
			error: function (xhr) {
				infoAlert('Error Fatal', 'Se produjo un error desconocido');
			}
		});
	}

	function guardar_empleados() {
		var nombre = $('#nombre').val();
		var apellidos = $('#apellidos').val()
		var email = $('#email').val()
		var password = $('#password').val()
		var sucursal = $('#sucursal').val()
		var id_usuario = $('#id_usuario').val()
		$.ajax({
			url: "Empleados/guardar_empleados",
			type: "POST",
			dataType: "json",
			data: {
				nombre: nombre,
				apellidos: apellidos,
				email: email,
				password: password,
				sucursal: sucursal,
				id_usuario: id_usuario,
			},
			success: function (data) {
				if (data.response_code == 200) {
					successAlert(data.response_text);
					limpiar_formulario_empleado();
				} else if (data.response_code == 500) {
					infoAlert("Verifica", data.response_text);
				} else {
					infoAlert("Verifica", data.response_text);
				}
			}
		});
	}

	function  actualizar_empleado() {
		var id_empleado = $('#id_empleado_update').val();
		var email_modal 	 = $('#email_modal').val();
		var password_modal   = $('#password_modal').val();
		var sucursal_modal   = $('#sucursal_modal').val();
		var id_usuario_modal = $('#id_usuario_modal').val();
		$.ajax({
		  url: "Empleados/actualizar_empleado",
		  type: "POST",
		  dataType: "json",
		  data: {
			id_empleado: id_empleado,
			email_modal: email_modal,
			password_modal: password_modal,
			sucursal_modal:sucursal_modal,
			id_usuario_modal: id_usuario_modal,
		  },
		  
		  success: function (data) {
			if (data.response_code == 200) {
			  successAlert(data.response_text);
			  $('#modal_editar_empleados').modal("hide");
			  cargaTabla_Empleados()
			} else if (data.response_code == 500) {
				infoAlert("Verifica", data.response_text);
			} else {
				infoAlert("Verifica", data.response_text);
			}
		  },
		  error: function (xhr) {
			infoAlert("Verifica", data.response_text);
		  }
		});
	}

	function limpiar_formulario_empleado() {
		$("#nombre").val('');
		$("#apellidos").val('');
		$("#email").val('');
		$("#password").val('');
	}

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
})
