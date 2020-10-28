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
				// var id_empleado = data.id_empleados;
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
				infoAlert("Cancelado", "La activación ha sido cancelada");
			}
		});
	});


	function guardar_empleados() {
		var nombre = $('#nombre').val();
		var apellidos = $('#apellidos').val()
		var email = $('#email').val().trim();
		var password = $('#password').val()
		var sucursal = $('#sucursal').val()
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

			},
			success: function (data) {
				if (data.response_code == 200) {
					successAlert(data.response_text);
					cargaTabla_Empleados()
					// tabla.clear().draw(false);
					// limpiar_inputs();
				} else if (data.response_code == 500) {
					infoAlert("Verifica", data.response_text);
				} else {
					infoAlert("Verifica", data.response_text);
				}
			}
			// error: function (xhre) {
			// 	Swal.close();
			// 	infoAlert("Verifica", data.response_text);


		});
	}

	function cargaTabla_Empleados() {
		$.ajax({
			url: "Empleados/mostrar_empleados",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#dataTable_listaempleados').DataTable({
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
							{
								'data': "nombre"
							},
							{
								'data': "apellidos"
							},
							{
								'data': "sucursal"
							},
							{
								'data': null,
								'render': function (data, type, row) {
									
									if (row.estatus == 1) {
										"<label class='mr-1'> Ser.Unidades/Refacciones:</label>"
									} else {
										"<label class='mr-1'> Ser.Unidades/Refacciones:</label>"
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
									return "<a id='btn_mostrar_' class='btn btn-warning btn-sm btn_editar_empleados'" +
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




// $(document).ready(function () {
//     var id_empresa = localStorage.getItem('id_empresa');
//     var razon_social = localStorage.getItem('razon_social');
//     document.getElementById("nombre_empresa_label").innerHTML = razon_social;

//     cargaTabla(id_empresa);
//     $('#data_table_empleados').DataTable({});
//     $('#modal_detalles_productos_emp').modal({ dismissible: false });
//     $('#modal_actualizar_empleado').modal({ dismissible: false, });
//     $('#modal_agregar_producto').modal({ dismissible: false, });
//     $('#modal_perfil_usuario').modal();
//     $('.collapsible').collapsible();
//     $('select').formSelect();
//     $('#data_table_productos_emp').DataTable({
//         'language': {
//             "sProcessing": "Procesando...",
//             "sLengthMenu": "Mostrar _MENU_ registros",
//             "sZeroRecords": "No se encontraron resultados",
//             "sEmptyTable": "Ningún dato disponible en esta tabla",
//             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//             "sInfoPostFix": "",
//             "sSearch": "Buscar:",
//             "sUrl": "",
//             "sInfoThousands": ",",
//             "loadingRecords": "Cargando...",
//             "oPaginate": {
//                 "sFirst": "Primero",
//                 "sLast": "Último",
//                 "sNext": "Siguiente",
//                 "sPrevious": "Anterior"
//             },
//             "oAria": {
//                 "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
//                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//             },
//         }
//     });
//     $('#data_table_productos_contratados').DataTable({
//         'language': {
//             "sProcessing": "Procesando...",
//             "sLengthMenu": "Mostrar _MENU_ registros",
//             "sZeroRecords": "No se encontraron resultados",
//             "sEmptyTable": "Ningún dato disponible en esta tabla",
//             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//             "sInfoPostFix": "",
//             "sSearch": "Buscar:",
//             "sUrl": "",
//             "sInfoThousands": ",",
//             "loadingRecords": "Cargando...",
//             "oPaginate": {
//                 "sFirst": "Primero",
//                 "sLast": "Último",
//                 "sNext": "Siguiente",
//                 "sPrevious": "Anterior"
//             },
//             "oAria": {
//                 "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
//                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//             },
//         }
//     });
//     $('.datepicker').datepicker({
//         selectMonths: true,
//         selectYears: 200,
//         format: 'yyyy/mm/dd',
//         i18n: {
//             cancel: 'Cancelar',
//             clear: 'Limpiar',
//             done: 'Ok',
//             previousMonth: '‹',
//             nextMonth: '›',
//             months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
//             monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
//             weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
//             weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
//             weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
//         }
//     });

//     $("#form_validation_producto").validate({
//         rules: {
//             vigencia_producto_emp: {
//                 required: true,
//             },
//             referencia_producto_emp: {
//                 required: true,
//             },
//             fecha_contratacion_emp: {
//                 required: true,
//             },
//             tipo_producto_empre_model: {
//                 required: true,
//             }
//         },
//         messages: {},
//         errorElement: 'div',
//         errorPlacement: function (error, element) {
//             var placement = $(element).data('error');
//             if (placement) {
//                 $(placement).append(error)
//             } else {
//                 error.insertAfter(element);
//             }
//         },
//         submitHandler: function (e) {
//             var vigencia_producto = $('#vigencia_producto_emp').val().trim();
//             var GivenDate = vigencia_producto;
//             var CurrentDate = new Date();
//             GivenDate = new Date(GivenDate);
//             if (GivenDate > CurrentDate) {
//                 añadir_producto_data_table();
//             } else {
//                 alert('La fecha dada no es mayor que la fecha actual.');
//             };
//         }
//     });

//     $("#form_validation_update_empleado").validate({
//         rules: {
//             email_emp_update_modal: {
//                 required: true,
//             },
//             tel_cel_emp_update_modal: {
//                 required: true,
//             }
//         },
//         messages: {},
//         errorElement: 'div',
//         errorPlacement: function (error, element) {
//             var placement = $(element).data('error');
//             if (placement) {
//                 $(placement).append(error)
//             } else {
//                 error.insertAfter(element);
//             }
//         },
//         submitHandler: function (e) {
//             swal({
//                 title: "¿Estas seguro?",
//                 text: "",
//                 type: "warning",
//                 showCancelButton: true,
//                 confirmButtonClass: "btn-danger",
//                 confirmButtonText: "¡Si, Desea actualizar!",
//                 cancelButtonText: "¡No, cancelar!",
//                 closeOnConfirm: false,
//                 closeOnCancel: false
//             }, function (isConfirm) {
//                     if (isConfirm) {
//                         actualizar_empleado();
//                     } else {
//                         infoAlert("Cancelado", "Actualizar los datos ha sido Cancelada");
//                     }
//                 }
//             );
//         }
//     });

//     $(document).on('click', '#btn_mostrar_detalle_prod', function () {
//         $('#modal_detalles_productos_emp').modal('open');
//         var tabla = $("#data_table_empleados").DataTable();
//         var row = tabla.row($(this).parent().parent());
//         var data = row.data();
//         var id_empleado = data.id_rel_er_el;
//         var tabla1 = $("#data_table_productos_emp").DataTable();
//         var datos_tabla = tabla1.rows().data();
//         document.getElementById("nombre_empresa_3").innerHTML = razon_social;
//         if (datos_tabla.length == 0) {
//             cargaTabla_detalle_prod_emp(id_empleado);
//             $('select').formSelect();
//         } else {
//             tabla1.clear().draw(false);
//             cargaTabla_detalle_prod_emp(id_empleado);
//             $('select').formSelect();
//         }
//     });

//     $(document).on('click', '#btn_actualizar_empleado', function () {
//         var tabla = $("#data_table_empleados").DataTable();
//         var row = tabla.row($(this).parent().parent());
//         var data = row.data();
//         var email_empleado = data.email;
//         var id_empleado = data.id_empleados;
//         var app_activa = data.app_activa;
//         var tel_cel = data.tel_cel;
//         if (app_activa == "1") {
//             $('#filled-in-box').prop('checked', true);
//         } else {
//             $('#filled-in-box').prop('checked', false);
//         }
//         document.getElementById("nombre_empresa_2").innerHTML = razon_social;
//         $('#email_emp_update_modal').val(email_empleado);
//         $('#id_empleado_update_modal').val(id_empleado);
//         $('#tel_cel_emp_update_modal').val(tel_cel);
//         $('#modal_actualizar_empleado').modal('open');
//     });

//     $(document).on('click', '#btn_agregar_productos', function () {
//         $('#modal_agregar_producto').modal('open');
//         var tabla = $("#data_table_empleados").DataTable();
//         var row = tabla.row($(this).parent().parent());
//         var data = row.data();
//         var id_empleado = data.id_rel_er_el;
//         document.getElementById("nombre_empresa_1").innerHTML = razon_social;
//         $('#id_empleado_producto').val(id_empleado);
//         cargar_select_producto();
//     });

//     $(document).on('click', '#btn_remover_fila', function () {
//         var tabla = $("#data_table_productos_contratados").DataTable();
//         var row = tabla.row($(this).parent().parent());
//         tabla.row(row).remove().draw(false);
//     });

//     $(document).on('click', '#btn_quitar_producto', function () {
//         var tabla = $("#data_table_productos_emp").DataTable();
//         var row = tabla.row($(this).parent().parent());
//         var data = row.data();
//         swal({
//             title: "¿Estas seguro?",
//             text: "",
//             type: "warning",
//             showCancelButton: true,
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Si, eliminar!",
//             cancelButtonText: "No, cancelar!",
//             closeOnConfirm: false,
//             closeOnCancel: false
//         },
//             function (isConfirm) {
//                 if (isConfirm) {
//                     var id_empleado_producto = data.id_empleado_producto;
//                     $.ajax({
//                         url: "empleados/eliminar_empleado_producto",
//                         type: "POST",
//                         data: {
//                             id_empleado_producto: id_empleado_producto
//                         },
//                         dataType: "json",
//                         success: function (data) {
//                             if (data.response_code == 200) {
//                                 successAlert("Eliminado!", data.response_text, "success");
//                                 tabla.row(row).remove().draw(false);
//                             } else if (data.response_code == 500) {
//                                 infoAlert("Verificar", data.response_text);
//                             }
//                         },
//                         error: function (xhr) {
//                             infoAlert("Verifica", data.response_text);
//                         }
//                     })
//                 } else {
//                     infoAlert("Cancelado", "La eliminación ha sido cancelada");
//                 }
//             }
//         );
//     });

//     $(document).on('click', '#btn_cerra_limpiar', function () {
//         var tabla = $("#data_table_productos_contratados").DataTable();
//         tabla.clear().draw(false);
//         $('#tipo_producto_empre_model').empty()
//     });

//     $('#btn_guardar_producto_em').on('click', function () {
//         swal({
//             title: "¿Estas seguro?",
//             text: "",
//             type: "warning",
//             showCancelButton: true,
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "¡Si, Desea guardar!",
//             cancelButtonText: "¡No, cancelar!",
//             closeOnConfirm: false,
//             closeOnCancel: false
//         },
//             function (isConfirm) {
//                 if (isConfirm) {
//                     var tabla = $("#data_table_productos_contratados").DataTable();
//                     var datos_tabla = tabla.rows().data();
//                     var arreglo = [];
//                     var id_empleado = $('#id_empleado_producto').val().trim();
//                     for (i = 0; i < datos_tabla.length; i++) {
//                         var row = datos_tabla[i];
//                         var person = { id_producto: row[0], nombre_producto: row[1], fecha_vigencia: row[2], referencia: row[3], fecha_contratacion: row[4] };
//                         arreglo.push(person);
//                     }
//                     var myJson = JSON.stringify(arreglo);
//                     var longitud_datos_tabla = datos_tabla.length;
//                     $.ajax({
//                         url: "empleados/agregar_productos",
//                         type: "POST",
//                         dataType: "json",
//                         data: {
//                             myJson: myJson,
//                             longitud_datos_tabla: longitud_datos_tabla,
//                             id_empleado: id_empleado
//                         },
//                         dataType: "json",
//                         success: function (data) {
//                             if (data.response_code == 200) {
//                                 successAlert("Guardados!", data.response_text, "success");
//                                 tabla.clear().draw(false);
//                             } else if (data.response_code == 500) {
//                                 infoAlert("Verificar", data.response_text);
//                             }
//                         },
//                         error: function (xhr) {
//                             infoAlert("Verifica", data.response_text);
//                         }
//                     })
//                 } else {
//                     infoAlert("Cancelado", "Guradar los datos ha sido Cancelada");
//                 }
//             }
//         );
//     });

//     $(document).on('click', '#btn_borrar_empleado', function () {
//         var tabla = $("#data_table_empleados").DataTable();
//         var row = tabla.row($(this).parent().parent());
//         var data = row.data();
//         swal({
//             title: "¿Estas seguro?",
//             text: "",
//             type: "warning",
//             showCancelButton: true,
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Si, eliminar!",
//             cancelButtonText: "No, cancelar!",
//             closeOnConfirm: false,
//             closeOnCancel: false
//         },
//             function (isConfirm) {
//                 if (isConfirm) {
//                     var id_empleado = data.id_empleados;
//                     $.ajax({
//                         url: "empleados/eliminar_empleado",
//                         type: "POST",
//                         data: {
//                             id_empleado: id_empleado
//                         },
//                         dataType: "json",
//                         success: function (data) {
//                             if (data.response_code == 200) {
//                                 successAlert("Eliminado!", data.response_text, "success");
//                                 tabla.row(row).remove().draw(false);
//                             } else if (data.response_code == 500) {
//                                 infoAlert("Verificar", data.response_text);
//                             }
//                         },
//                         error: function (xhr) {
//                             infoAlert("Verifica", data.response_text);
//                         }
//                     })
//                 } else {
//                     infoAlert("Cancelado", "La eliminación ha sido cancelada");
//                 }
//             }
//         );
//     });

//     function actualizar_empleado() {
//         var email_usu = $('#email_emp_update_modal').val().trim();
//         var id_empleado = $('#id_empleado_update_modal').val().trim();
//         var tel_empleado = $('#tel_cel_emp_update_modal').val().trim();
//         var esta_app_activa = document.getElementById('filled-in-box');
//         var app_activa = 0;
//         if (esta_app_activa.checked === true) {
//             app_activa = 1
//         } else {
//             app_activa = 0
//         }
//         $.ajax({
//             url: "empleados/actualizar_empleado",
//             type: "POST",
//             dataType: "json",
//             data: {
//                 email_usu: email_usu,
//                 id_empleado: id_empleado,
//                 app_activa: app_activa,
//                 tel_empleado: tel_empleado
//             },
//             success: function (data) {
//                 if (data.response_code == 200) {
//                     successAlert(data.response_text);
//                     $('#modal_actualizar_empleado').modal('close');
//                     var id_empresa = localStorage.getItem('id_empresa')
//                     cargaTabla(id_empresa);
//                 } else if (data.response_code == 500) {

//                     infoAlert("Verifica", data.response_text);
//                 } else {
//                     infoAlert("Verifica", data.response_text);
//                 }
//             },
//             error: function (xhr) {
//                 //limpiar_inputs();
//                 infoAlert("Verifica", data.response_text);
//             }
//         })
//     }

//     function cargaTabla(id_empresa) {
//         $.ajax({
//             url: "empleados/cargar_datos_empledo/" + id_empresa,
//             method: "POST",
//             dataType: "json",
//             success: function (data) {
//                 if (data.response_code == 200) {
//                     $('#data_table_empleados').DataTable({
//                         "destroy": true,
//                         'paging': true,
//                         "pageLength": 15,
//                         "data": data.response_data,
//                         "columns": [{
//                             'data': "id_empleados"
//                         },
//                         {
//                             'data': 'nombre'
//                         },
//                         {
//                             'data': 'fecha_alta'
//                         },
//                         {
//                             'data': 'tel_cel'
//                         },
//                         {
//                             'data': null,
//                             'render': function (data, type, row) {
//                                 if (data.app_activa == 1) {
//                                     return 'APP ACTIVA';
//                                 } else {
//                                     return 'APP NO ACTIVA';
//                                 }
//                             }
//                         },
//                         {
//                             'data': null,
//                             'defaultContent': "<a id='btn_agregar_productos' class='waves-effect waves-light btn b-bene'><i class='fa fa-shopping-cart'></i></a>"

//                         },
//                         {
//                             'data': null,
//                             'defaultContent': "<a id='btn_mostrar_detalle_prod' class='waves-effect waves-light btn b-bene'><i class='far fa-eye'></i></a>"

//                         },
//                         {
//                             'data': null,
//                             'defaultContent': "<a id='btn_actualizar_empleado' class='waves-effect waves-light btn b-bene'><i class='far fa-edit'></i></a>"

//                         },
//                         {
//                             'data': null,
//                             'defaultContent': "<a id='btn_borrar_empleado' class='waves-effect waves-light btn b-bene'><i class='far fa-trash-alt'></i></a>"
//                         }
//                         ],
//                         'language': {
//                             "sProcessing": "Procesando...",
//                             "sLengthMenu": "Mostrar _MENU_ registros",
//                             "sZeroRecords": "No se encontraron resultados",
//                             "sEmptyTable": "Ningún dato disponible en esta tabla",
//                             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//                             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//                             "sInfoPostFix": "",
//                             "sSearch": "Buscar:",
//                             "sUrl": "",
//                             "sInfoThousands": ",",
//                             "loadingRecords": "Cargando...",
//                             "oPaginate": {
//                                 "sFirst": "Primero",
//                                 "sLast": "Último",
//                                 "sNext": "Siguiente",
//                                 "sPrevious": "Anterior"
//                             },
//                             "oAria": {
//                                 "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
//                                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//                             },
//                         },
//                         "columnDefs": [
//                             { "className": "dt-center", "targets": "_all" }
//                         ],
//                     });
//                     $('select').formSelect();
//                 } else if (data.response_code == 500) {
//                     //infoAlert('Verificar', data.response_text);
//                 }
//             },
//             error: function (xhr) {
//                 infoAlert('Error Fatal', 'Se produjo un error desconocido');
//             }
//         });
//     }

//     function cargaTabla_detalle_prod_emp(id_empleado) {
//         $('select').formSelect();
//         $.ajax({
//             url: "empleados/cargar_datos_productos_emp/" + id_empleado,
//             method: "POST",
//             dataType: "json",
//             success: function (data) {
//                 if (data.response_code == 200) {
//                     $('#data_table_productos_emp').DataTable({
//                         "destroy": true,
//                         "pageLength": 15,
//                         "data": data.response_data,
//                         "columns": [{
//                             'data': "descripcion_producto"
//                         },
//                         {
//                             'data': 'referencia'
//                         },
//                         {
//                             'data': 'fecha_contratacion'
//                         },
//                         {
//                             'data': 'vigencia'
//                         },
//                         {
//                             'data': null,
//                             'defaultContent': "<a id='btn_quitar_producto' class='waves-effect waves-light btn b-bene'><i class='fas fa-times'></i></a>"
//                         }
//                         ],
//                         'language': {
//                             "sProcessing": "Procesando...",
//                             "sLengthMenu": "Mostrar _MENU_ registros",
//                             "sZeroRecords": "No se encontraron resultados",
//                             "sEmptyTable": "Ningún dato disponible en esta tabla",
//                             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//                             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//                             "sInfoPostFix": "",
//                             "sSearch": "Buscar:",
//                             "sUrl": "",
//                             "sInfoThousands": ",",
//                             "loadingRecords": "Cargando...",
//                             "oPaginate": {
//                                 "sFirst": "Primero",
//                                 "sLast": "Último",
//                                 "sNext": "Siguiente",
//                                 "sPrevious": "Anterior"
//                             },
//                             "oAria": {
//                                 "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
//                                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//                             },
//                         },
//                         "columnDefs": [
//                             { "className": "dt-center", "targets": "_all" }
//                         ],
//                     });
//                     $('select').formSelect();
//                 } else if (data.response_code == 500) {

//                 }
//             },
//             error: function (xhr) {
//                 infoAlert('Error', 'Se produjo un error desconocido');
//             }
//         });
//     }

//     function cargar_select_producto() {
//         var id_empresa = localStorage.getItem('id_empresa')
//         var productos_select = $("#tipo_producto_empre_model");
//         $.ajax({
//             url: "empleados/cargar_select_productos/" + id_empresa,
//             method: "POST",
//             dataType: "json",
//             success: function (data) {
//                 $.each(data.response_data, function (key, value) {
//                     productos_select.append('<option value="' + value.id_producto + '">' + value.descripcion_producto + '</option>');
//                 });
//                 $('select').formSelect();
//             },
//             error: function () {
//                 alert('Ocurrio un error en el servidor ..');
//             }
//         });
//     }

//     function añadir_producto_data_table() {
//         var tabla = $('#data_table_productos_contratados').DataTable();
//         var clave_producto = $('#tipo_producto_empre_model').val().trim();
//         var tipo_producto = $('#tipo_producto_empre_model').find('option:selected').text();
//         var vigencia_producto = $('#vigencia_producto_emp').val().trim();
//         var referencia_producto = $('#referencia_producto_emp').val().trim();
//         var fecha_contratacion = $('#fecha_contratacion_emp').val().trim();
//         tabla.row.add([
//             clave_producto,
//             tipo_producto,
//             vigencia_producto,
//             referencia_producto,
//             fecha_contratacion,
//             "<a class='waves-effect waves-light btn b-bene' id='btn_remover_fila'><i class='fas fa-times'></i></a>"
//         ]).draw(false);
//         limpiar_inputs_producto()
//     }

//     function limpiar_inputs_producto() {
//         $('#vigencia_producto_emp').val('');
//         $('#referencia_producto_emp').val('');
//         $('#fecha_contratacion_emp').val('');
//     }

//     function errorAlert(title, text) {
//         swal("¡" + title + "!", "¡" + text + "!", "error")
//     }

//     function successAlert(text) {
//         swal("¡Exito!", "¡" + text + "!", "success")
//     }

//     function infoAlert(title, text) {
//         swal("¡" + title + "!", text, "info")
//     }

//     function customAlert(title, text, type, time) {
//         swal({
//             title: title,
//             text: text,
//             timer: time,
//             type: type,
//             showConfirmButton: false
//         });
//     }
// });
