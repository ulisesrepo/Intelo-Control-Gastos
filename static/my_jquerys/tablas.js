$(document).ready(function () {
	$('#dataTable_viaticos').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	$('#dataTable_vehiculos').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	$('#dataTable_gastosudn').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	$('#dataTable_fletes').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	$('#dataTable_serviciosudn').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	$('#dataTable_almacen').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	$(document).on('click', '#btn_visualizar_vehiculos', function () {
		// $('#modal_visualizacion_vehiculos').modal({backdrop: 'static', keyboard: false});
		$('#modal_visualizacion_vehiculos').modal('show');
		cargaTabla_Vehiculos();
	});
 
	$(document).on('click', '#btn_visualizar_viaticos', function () {
		// $('#modal_visualizacion_viaticos').modal({backdrop: 'static', keyboard: false});
		$("#modal_visualizacion_viaticos").modal("show");
		cargaTabla_Viaticos();
	});

	$(document).on('click', '#btn_visualizar_gastosudn', function () {
		// $('#modal_visualizacion_gastosudn').modal({backdrop: 'static', keyboard: false});
		$("#modal_visualizacion_gastosudn").modal("show");
		cargaTabla_Gastosudn();
	});

	$(document).on('click', '#btn_visualizar_fletes', function () {
		// $('#modal_visualizacion_fletes').modal({backdrop: 'static', keyboard: false});
		$("#modal_visualizacion_fletes").modal("show");
		cargaTabla_Fletes();
	});
	
	$(document).on('click', '#btn_visualizar_servudn', function () {
		// $('#modal_visualizacion_servudn').modal({backdrop: 'static', keyboard: false});
		$("#modal_visualizacion_servudn").modal("show");
		cargaTabla_Servudn();
	});

	$(document).on('click', '#btn_visualizar_almacen', function () {
		// $('#modal_visualizacion_almacen').modal({backdrop: 'static', keyboard: false});
		$("#modal_visualizacion_almacen").modal("show");
		cargaTabla_Almacen();
	});
	
	//---------------------------Vehiculos--------------------------------------------------------
	function cargaTabla_Vehiculos() {
		$.ajax({
			url: "Tablas/mostrar_vehiculos",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#data_table_vizualizar_vehiculos').DataTable({
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
						"columns": [
							{
								"data": null,
								'render': function (data, type, row) {
									return  "<a id='btn_mostrar_" + data.id_general +"' class='btn btn-success btn-sm btn_mostrar_detalle'" +
									" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Desactivar empleado'>" +
									"<i class='fa fa-plus-circle'></i></a>";
								}
							},
							{
								"data": null,
								'render': function (data, type, row) {
									return data.id_general;
								}
							},
							{ 	'data': null, 
								'render': function ( data, type, row ) {
								return data.nombre+' '+data.apellidos;
							}
							},
							{
								'data': "Empresa"
							},
							{
								'data': "Dia_gasto"
							},
							{
								'data': "Plaza"
							},
							{
								'data': "Fecha_captura"
							},
							{
								'data': "unidad"
							},
							{
								'data': "km_inicial"
							},
							{
								'data': "km_final"
							},
							{
								'data': 'km_total'
							},
							{
								'data': 'lts_consumidos'
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
	
	function format_vehiculos(d) {
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +	
			'<tr>' +
			'<td>Rendimiento:</td>' +
			'<td>' + d.rendimiento + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Combustible:</td>' +
			'<td>' + d.combustible + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Casetas:</td>' +
			'<td>' + d.casetas + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Serv. unidades:</td>' +
			'<td>' + d.ser_unidades + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>No deducibles:</td>' +
			'<td>' + d.noDeduVehi + '</td>' +
			'</tr>' +
			'<tr>' +
			'</table>';
	}

	$(document).on('click', '.btn_mostrar_detalle', function () {
		var elemento = $(this);
		var mostra = elemento.attr('data-attr');
		var tabla = $("#data_table_vizualizar_vehiculos").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_general = data.id_general;
		if (mostra == "is_checken") {
			$("#btn_mostrar_" + id_general).removeClass('btn-success');
			$("#btn_mostrar_" + id_general).addClass('btn-danger');
			$("#btn_mostrar_" + id_general).empty('');
			$("#btn_mostrar_" + id_general).append("<i class='fa fa-minus-circle'></i></a>");
			elemento.attr('data-attr', "no_checken");
			row.child(format_vehiculos(data)).show();
		} else if (mostra == "no_checken") {
			$("#btn_mostrar_" + id_general).removeClass('btn-danger');
			$("#btn_mostrar_" + id_general).addClass('btn-success');
			$("#btn_mostrar_" + id_general).empty('');
			$("#btn_mostrar_" + id_general).append("<i class='fa fa-plus-circle'></i></a>");
			elemento.attr('data-attr', "is_checken");
			row.child.hide();
		}

	});
	//---------------------------Viaticos--------------------------------------------------------
	function cargaTabla_Viaticos() {
		$.ajax({
			url: "Tablas/mostrar_viaticos",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#data_table_vizualizar_viaticos').DataTable({
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
						"columns": [ 
							{
								"data": null,
								'render': function (data, type, row) {
									return data.id_general;
								}
							},
							{ 	'data': null, 
								'render': function ( data, type, row ) {
								return data.nombre+' '+data.apellidos;
							}
							},
							{
								'data': "Empresa"
							},
							{
								'data': "Dia_gasto"
							},
							{
								'data': "Plaza"
							},
							{
								'data': "Fecha_captura"
							},
							{
								'data': "estacionamientoViaticos"
							},
							{
								'data': "alimentos"
							},
							{
								'data': "hospedaje"
							},
							{
								'data': 'taxis'
							},
							{
								'data': 'pasajes'
							},
							{
								'data': 'noDeduVia'
							},
						],
					});

				} else if (data.response_code == 500) {
					//infoAlert('Error', data.response_text);
				}
			},
			error: function (xhr) {
				infoAlert('Error Fatal', 'Se produjo un error desconocido');
			}
		});
	}
	//---------------------------GastosUDN--------------------------------------------------------
	
	function cargaTabla_Gastosudn() {
		$.ajax({
			url: "Tablas/mostrar_gastosudn",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#data_table_vizualizar_gastosudn ').DataTable({
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
						"columns": [
							{
								"data": null,
								'render': function (data, type, row) {
									return  "<a id='btn_mostrar_" + data.id_general +"' class='btn btn-success btn-sm btn_mostrar_detalles'" +
									" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Desactivar empleado'>" +
									"<i class='fa fa-plus-circle'></i></a>";
								}
							},
							{
								"data": null,
								'render': function (data, type, row) {
									return data.id_general;
								}
							},
							{ 	'data': null, 
								'render': function ( data, type, row ) {
								return data.nombre+' '+data.apellidos;
							}
							},
							{
								'data': "Empresa"
							},
							{
								'data': "Dia_gasto"
							},
							{
								'data': "Plaza"
							},
							{
								'data': "Fecha_captura"
							},
							{
								'data': "papeleria"
							},
							{
								'data': "materialempaque"
							},
							{
								'data': "equipoSeguridad"
							},
							{
								'data': 'infracciones'
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

	function format_gastosudn(d) {
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
			'<tr>' +
			'<td>Plomeria:</td>' +
			'<td>' + d.plomeria + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Ferreteria:</td>' +
			'<td>' + d.ferreteria + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Impuestos:</td>' +
			'<td>' + d.impuestos + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Sistemas:</td>' +
			'<td>' + d.sistemasgastos + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Caja chica:</td>' +
			'<td>' + d.cajachica + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Asesoria:</td>' +
			'<td>' + d.asesoria + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Arre.Unidades:</td>' +
			'<td>' + d.arrenamunidades + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Serv.Computo:</td>' +
			'<td>' + d.servcomputo + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>No deducibles:</td>' +
			'<td>' + d.noDeduUDN + '</td>' +
			'</tr>' +
			'<tr>' +
			'</table>';
	}

	$(document).on('click', '.btn_mostrar_detalles', function () {
		var elemento = $(this);
		var mostra = elemento.attr('data-attr');
		var tabla = $("#data_table_vizualizar_gastosudn").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_general = data.id_general;
		if (mostra == "is_checken") {
			$("#btn_mostrar_" + id_general).removeClass('btn-success');
			$("#btn_mostrar_" + id_general).addClass('btn-danger');
			$("#btn_mostrar_" + id_general).empty('');
			$("#btn_mostrar_" + id_general).append("<i class='fa fa-minus-circle'></i></a>");
			elemento.attr('data-attr', "no_checken");
			row.child(format_gastosudn(data)).show();
		} else if (mostra == "no_checken") {
			$("#btn_mostrar_" + id_general).removeClass('btn-danger');
			$("#btn_mostrar_" + id_general).addClass('btn-success');
			$("#btn_mostrar_" + id_general).empty('');
			$("#btn_mostrar_" + id_general).append("<i class='fa fa-plus-circle'></i></a>");
			elemento.attr('data-attr', "is_checken");
			row.child.hide();
		}

	});

	//---------------------------Fletes--------------------------------------------------------

	function cargaTabla_Fletes() {
		$.ajax({
			url: "Tablas/mostrar_fletes",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#data_table_vizualizar_fletes').DataTable({
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
						"columns": [
							 
							{
								"data": null,
								'render': function (data, type, row) {
									return data.id_general;
								}
							},
							{ 	'data': null, 
								'render': function ( data, type, row ) {
								return data.nombre+' '+data.apellidos;
							}
							}, 
							{
								'data': "Empresa"
							},
							{
								'data': "Dia_gasto"
							},
							{
								'data': "Plaza"
							},
							{
								'data': "Fecha_captura"
							},
							{
								'data': "maniobras"
							},
							{
								'data': "infraccionesfletes"
							},
							{
								'data': "fletes"
							},
							{
								'data': 'paqueteria'
							},
							{
								'data': 'noDeduFletes'
							},
						],
					});

				} else if (data.response_code == 500) {
					//infoAlert('Error', data.response_text);
				}
			},
			error: function (xhr) {
				infoAlert('Error Fatal', 'Se produjo un error desconocido');
			}
		});
	}


	//---------------------------ServiciosUDN--------------------------------------------------------
	function cargaTabla_Servudn() {
		$.ajax({
			url: "Tablas/mostrar_servudn",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#data_table_vizualizar_servudn').DataTable({
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
						"columns": [
							{
								"data": null,
								'render': function (data, type, row) {
									return  "<a id='btn_mostrar_" + data.id_general +"' class='btn btn-success btn-sm btn_mostrar_detall'" +
									" data-toggle='tooltip' data-attr='is_checken' data-placement='right' title='Desactivar empleado'>" +
									"<i class='fa fa-plus-circle'></i></a>";
								}
							},
							{
								"data": null,
								'render': function (data, type, row) {
									return data.id_general;
								}
							},
							{ 	'data': null, 
								'render': function ( data, type, row ) {
								return data.nombre+' '+data.apellidos;
							}
							},
							{
								'data': "Empresa"
							},
							{
								'data': "Dia_gasto"
							},
							{
								'data': "Plaza"
							},
							{
								'data': "Fecha_captura"
							},
							{
								'data': "gas"
							},
							{
								'data': "arrendamientoinmuebles"
							},
							{
								'data': "ServiciosAGL"
							},
							{
								'data': 'manttoGRAL'
							},
							{
								'data': 'ManttoAlmacen'
							},
							{
								'data': 'Internet'
							},
							{
								'data': 'limpieza'
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

	function format_servudn(d) {
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
			'<tr>' +
			'<td>Seguros:</td>' +
			'<td>' + d.seguros + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Seguridad:</td>' +
			'<td>' + d.seguridad + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Monitoreo:</td>' +
			'<td>' + d.monitoreo + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Plagas:</td>' +
			'<td>' + d.plagas + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Basura:</td>' +
			'<td>' + d.basura + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Higiente:</td>' +
			'<td>' + d.higiene + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Publicidad:</td>' +
			'<td>' + d.publicidad + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Fianzas:</td>' +
			'<td>' + d.fianzas + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Almacenaje:</td>' +
			'<td>' + d.almacenaje + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Facturacion:</td>' +
			'<td>' + d.facturacion + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>Gasto Legal:</td>' +
			'<td>' + d.gastolegal + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td>No deducibles:</td>' +
			'<td>' + d.noDeduServ + '</td>' +
			'</tr>' +
			'<tr>' +
			'</table>';
	}

	$(document).on('click', '.btn_mostrar_detall', function () {
		var elemento = $(this);
		var mostra = elemento.attr('data-attr');
		var tabla = $("#data_table_vizualizar_servudn").DataTable();
		var row = tabla.row($(this).parent().parent());
		var data = row.data();
		var id_general = data.id_general;
		if (mostra == "is_checken") {
			$("#btn_mostrar_" + id_general).removeClass('btn-success');
			$("#btn_mostrar_" + id_general).addClass('btn-danger');
			$("#btn_mostrar_" + id_general).empty('');
			$("#btn_mostrar_" + id_general).append("<i class='fa fa-minus-circle'></i></a>");
			elemento.attr('data-attr', "no_checken");
			row.child(format_servudn(data)).show();
		} else if (mostra == "no_checken") {
			$("#btn_mostrar_" + id_general).removeClass('btn-danger');
			$("#btn_mostrar_" + id_general).addClass('btn-success');
			$("#btn_mostrar_" + id_general).empty('');
			$("#btn_mostrar_" + id_general).append("<i class='fa fa-plus-circle'></i></a>");
			elemento.attr('data-attr', "is_checken");
			row.child.hide();
		}

	});

//---------------------------Almacen--------------------------------------------------------

function cargaTabla_Almacen() {
	$.ajax({
		url: "Tablas/mostrar_almacen",
		method: "POST",
		dataType: "json",
		success: function (data) {
			if (data.response_code == 200) {
				$('#data_table_vizualizar_almacen').DataTable({
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
					"columns": [
						{
							"data": null,
							'render': function (data, type, row) {
								return data.id_general;
							}
						},
						{ 	'data': null, 
								'render': function ( data, type, row ) {
								return data.nombre+' '+data.apellidos;
							}
						}, 
						{
							'data': "Empresa"
						},
						{
							'data': "Dia_gasto"
						},
						{
							'data': "Plaza"
						},
						{
							'data': "Fecha_captura"
						},
						{
							'data': "merma"
						},
						{
							'data': "sistemasALM"
						},
						{
							'data': 'noDeduAlm'
						},
					],
				});

			} else if (data.response_code == 500) {
				//infoAlert('Error', data.response_text);
			}
		},
		error: function (xhr) {
			infoAlert('Error Fatal', 'Se produjo un error desconocido');
		}
	});
}

})
