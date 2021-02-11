$(document).ready(function () {

	var parent_ul = $("a[href$='finish']").parent();
	parent_ul.parent().addClass('d-none');

	cargaTabla_Analisis()


	$(document).on('click', '#btn_borrar_registro', function () {

		var tabla = $("#dataTable_analisis_gastos").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_general = data.id_general;

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
				
				$.ajax({
					url: "AnalisisGastos/eliminar_registro",
					type: "POST",
					data: {
						id_general: id_general
					},
					dataType: "json",
					success: function (data) {
						if (data.response_code == 200) {
							successAlert("Eliminado!", data.response_text, "success");
							cargaTabla_Analisis()
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

	$(document).on('click', '#btn_activar_registro', function () {

		var tabla = $("#dataTable_analisis_gastos").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_general = data.id_general;

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
					url: "AnalisisGastos/activar_registro",
					type: "POST",
					data: {
						id_general: id_general
					},
					dataType: "json",
					success: function (data) {
						if (data.response_code == 200) {
							successAlert("Activado!", data.response_text, "success");
							cargaTabla_Analisis()
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

	$(document).on('click', '#btn_editar_registros', function () {
		var tabla = $("#dataTable_analisis_gastos").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var Empresa=data.Empresa;
		var Dia_gasto=data.Dia_gasto;
		var Mes=data.Mes;
		var Plaza=data.Plaza;
		var Cliente=data.Cliente;
		var Fecha_captura=data.Fecha_captura;
		var unidad=data.unidad;
		var km_inicial=data.km_inicial;
		var km_final=data.km_final;
		var km_total=data.km_total;
		var lts_consumidos=data.lts_consumidos;
		var rendimiento=data.rendimiento;
		var merma =data.merma;
		var sistemas= data.sistemas;
		var noDeduAlm= data.noDeduAlm;
		var id_general = data.id_general;
		$('#empresas_modal').val(Empresa);
		$('#dia_gasto_modal').val(Dia_gasto);
 		$('#mes_modal').val(Mes);
		$('#plaza_modal').val(Plaza);
		$('#cliente_modal').val(Cliente);
		$('#fecha_cap_modal').val(Fecha_captura);
		$('#unidad_modal').val(unidad);
		$('#km_inicial_modal').val(km_inicial);
		$('#km_final_modal').val(km_final);
		$('#km_total_modal').val(km_total);
		$('#rendimiento_modal').val(rendimiento);
		$('#lts_consumidos_modal').val(lts_consumidos);
		$('#id_general_update').val(id_general);
		$('#merma_modal').val(merma);
		$('#sistemasAlm_modal').val(sistemas);
		$('#noDeduAlm_modal').val(noDeduAlm);
		$("#modal_editar_registros").modal("show");
	});

	function cargaTabla_Analisis() {
		$.ajax({
			url: "AnalisisGastos/mostrar_analisis_gastos",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#dataTable_analisis_gastos').DataTable({
						"language": {
							"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
						},
						dom: 'Bfrtip',
						buttons: [
							'excelHtml5'
							// 'csvHtml5',
							// 'copyHtml5'
						],
						"select": true,
						"pageLength":15,
						"scroller": true,
						"scrollCollapse": true,
						"destroy": true,
						"bPaginate": false,
						"data": data.response_data,
						"columnDefs": [{
							"className": "text-center",
							"targets": "_all"
						}],
						"columns": [
							
							
							{
								"data": null,
								'render': function (data, type, row) {
									var boton = "";
									if (data.estatus == 1) {
										boton = "<a id='btn_borrar_registro' class='btn btn-danger btn-sm btn_borrar_registro'" +
											" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Borrar Registro'>" +
											"<i class='far fa-trash-alt'></i></a>"
									} else {
										boton = "<a id='btn_activar_registro' class='btn btn-primary btn-sm btn_activar_registro'" +
											" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Activar Registro'>" +
											"<i class='fas fa-trash-restore-alt'></i></a>"
									}
									return "<a id='btn_editar_registros' class='btn btn-dark btn-sm btn_editar_registros'" +
										" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Editar registro'>" +
										"<i class='far fa-edit'></i></a>    " + boton;

								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return "<h9 class='m-0 font-weight-bold text-primary'>Activado</h9>"
									} else {
										return "<h9 class='m-0 text-danger'>Desactivado</h9>"
									}
								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.id_general}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.id_general}</h9>`
									
									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${ data.nombre + ' ' + data.apellidos}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${ data.nombre + ' ' + data.apellidos}</h9>`
									
									}
								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.Empresa}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Empresa}</h9>`
									
									}
								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.Dia_gasto}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Dia_gasto}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.Mes}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Mes}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.Plaza}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Plaza}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.Cliente}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Cliente}</h9>`
									
									}
								}
								
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.Fecha_captura}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Fecha_captura}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.unidad}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.unidad}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.km_inicial}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.km_inicial}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.km_final}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.km_final}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.km_total}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.km_total}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.lts_consumidos}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.lts_consumidos}</h9>`
									
									}
								}
								
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.rendimiento}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.rendimiento}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.combustible}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.combustible}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.casetas}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.casetas}</h9>`
									
									}
								}
								
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.ser_unidades}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ser_unidades}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduVehi}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduVehi}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.estacionamientoViaticos}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.estacionamientoViaticos}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.alimentos}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.alimentos}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.hospedaje}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.hospedaje}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.taxis}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.taxis}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.pasajes}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.pasajes}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduVia}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduVia}</h9>`
									
									}
								}
								
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.papeleria}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.papeleria}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.materialempaque}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.materialempaque}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.equipoSeguridad}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.equipoSeguridad}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.infracciones}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.infracciones}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.plomeria}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.plomeria}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.ferreteria}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ferreteria}</h9>`
									
									}
								}
								
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.impuestos}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.impuestos}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.sistemas}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.sistemas}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.cajachica}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.cajachica}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.asesoria}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.asesoria}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.arrenamunidades}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.arrenamunidades}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.servcomputo}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.servcomputo}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduUDN}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduUDN}</h9>`
									
									}
								}
			
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.maniobras}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.maniobras}</h9>`
									
									}
								}
		
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.infraccionesfletes}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.infraccionesfletes}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.fletes}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.fletes}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.paqueteria}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.paqueteria}</h9>`
									
									}
								}
		
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduFletes}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduFletes}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.gas}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.gas}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.arrendamientoinmuebles}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.arrendamientoinmuebles}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.ServiciosAGL}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ServiciosAGL}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.manttoGRAL}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.manttoGRAL}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.ManttoAlmacen}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ManttoAlmacen}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.Internet}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Internet}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.limpieza}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.limpieza}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.seguros}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.seguros}</h9>`
									
									}
								}
				
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.seguridad}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.seguridad}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.monitoreo}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.monitoreo}</h9>`
									
									}
								}
					
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.plagas}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.plagas}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.basura}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.basura}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.higiene}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.higiene}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.publicidad}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.publicidad}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.fianzas}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.fianzas}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.almacenaje}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.almacenaje}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.facturacion}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.facturacion}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.gastolegal}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.gastolegal}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduServ}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduServ}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.merma}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.merma}</h9>`
									
									}
								}
							
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.sistemas}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.sistemas}</h9>`
									
									}
								}
						
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return  `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduAlm}</h9>` ;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduAlm}</h9>`
									
									}
								}
								
							},
						],
					});

				} else if (data.response_code == 500) {
				
				}
			},
			error: function (xhr) {
				infoAlert('Error Fatal', 'Se produjo un error desconocido');
			}
		});
	}

// -----------------------------Actualizar datos vehiculos------------------------------------------
	function  actualizar_registro_vehiculos() {
	var id_general = $('#id_general_update').val();
	var combustible_modal 	 = $('#inputmodalcombustible').val();
	var caseta_modal 	 = $('#inputmodalcasetas').val();
	var serviunidades_modal 	 = $('#inputmodalserviunidades').val();
	var noDeduVehi_modal   = $('#noDeduVehi_modal').val();
	$.ajax({
	  url: "AnalisisGastos/actualizar_registro_almacen",
	  type: "POST",
	  dataType: "json",
	  data: {
		id_general: id_general,
		combustible_modal: combustible_modal,
		caseta_modal: caseta_modal,
		serviunidades_modal: serviunidades_modal,
		noDeduVehi_modal: noDeduVehi_modal,
	  },
	  
	  success: function (data) {
		if (data.response_code == 200) {
		  successAlert(data.response_text);
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

	$(document).on('click', '#btn_datos_vehiculos_modal', function () {
		actualizar_registro_vehiculos();
	});

	function actualizar_registro_combustible(){}
// -------------------------------------------------------------------------------------------------

// -----------------------------Actualizar datos viaticos------------------------------------------

// -------------------------------------------------------------------------------------------------

// -----------------------------Actualizar datos almacen--------------------------------------------
	function  actualizar_registro_almacen() {
		var id_general = $('#id_general_update').val();
		var merma_modal 	 = $('#merma_modal').val();
		var sistemasAlm_modal   = $('#sistemasAlm_modal').val();
		var noDeduAlm_modal   = $('#noDeduAlm_modal').val();
		$.ajax({
		  url: "AnalisisGastos/actualizar_registro_almacen",
		  type: "POST",
		  dataType: "json",
		  data: {
			id_general: id_general,
			merma_modal: merma_modal,
			sistemasAlm_modal: sistemasAlm_modal,
			noDeduAlm_modal: noDeduAlm_modal,
		  },
		  
		  success: function (data) {
			if (data.response_code == 200) {
			  successAlert(data.response_text);
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

	$(document).on('click', '#btn_datos_almacen_modal', function () {
		actualizar_registro_almacen();
	});
// -------------------------------------------------------------------------------------------------

$(document).on('click', '#btn_agregar_datos_tabla', function () {
	var tabla = $('#data_table_costos_update').DataTable();
	var no_factura = $('#no_factura').val();
	var sub_total = $('#sub_total').val();
	var iva = $('#iva').val();
	var total = parseFloat(sub_total) + parseFloat(iva);
	tabla.row.add([
		no_factura,
		sub_total,
		iva,
		total,
		"<a id='btn_remover_fila' class='btn btn-danger btn-sm'" +
		" data-toggle='tooltip' data-placement='right' title='Realzar baja de la fila'>" +
		"<i class='fa fa-trash'></i></a>"
	]).draw(false);

});

$(document).on('click', '#btn_remover_fila', function () {
	var tabla = $('#data_table_costos_update').DataTable();
	var row = tabla.row($(this).parent().parent());
	tabla.row(row).remove().draw(false);
});

$(document).on('click', '.btn_agregar_costos_modal', function () {
	var elemento = $(this);
	valor_attr = elemento.attr('data-value');
	$('#input_modal_update').val(valor_attr);
	$('#modal_costos_update').modal({
		backdrop: 'static',
		keyboard: false
	});
	$("#modal_costos_update").modal("show");
});

$(document).on('click', '.btn_cancelar', function () {
	var tabla = $('#data_table_costos_update').DataTable();
	var row = tabla.row($(this).parent().parent());
	limpiar_formularios();
	tabla.clear().draw(false);
	$("#modal_costos_update").modal("hide");
});

$(document).on('click', '#btn_guardar_tabla_update', function () {
	var sufijoarray = $("#input_modal_update").val();
	var tabla = $('#data_table_costos_update').DataTable();
	var row = tabla.row($(this).parent().parent());
	// var data = row.data();
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
			var tabla = $('#data_table_costos_update').DataTable();
			var datos_tabla = tabla.rows().data();
			var arreglo = [];
			if (datos_tabla.length > 0) {
				for (i = 0; i < datos_tabla.length; i++) {
					var row = datos_tabla[i];
					var person = {
						no_factura: row[0],
						sub_total: row[1],
						iva: row[2],
						total: row[3]
					};
					arreglo.push(person);
				}
				var myJson = JSON.stringify(arreglo);
				localStorage.setItem('array_' + sufijoarray, myJson)
				var totalfilas = arreglo.reduce((sum, value) => (typeof value.total == "number" ? sum + value.total : sum), 0);
				$('#inputmodal' + sufijoarray).val(totalfilas);
				limpiar_formularios();
				tabla.clear().draw(false);
				$("#modal_costos_update").modal("hide");
			} else {
				var mensaje = "Verificar";
				var text = "Favor de ingresar datos";
				infoAlert(mensaje, text)
			}
		}
	})
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

	function limpiar_formularios() {
		$("#no_factura").val('');
		$("#sub_total").val('');
		$("#iva").val('');
    }

});
