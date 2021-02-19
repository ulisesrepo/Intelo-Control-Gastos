$(document).ready(function () {

	let id_vehiculos = '';
	let id_viaticos = '';
	let id_gastosudn = '';
	let id_fletes = '';
	let id_serviciosudn = '';
	let nombre_tabla_hija_update = '';
	let nombre_id_hija_update = '';

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

		var Empresa = data.Empresa;
		var Dia_gasto = data.Dia_gasto;
		var Mes = data.Mes;
		var Plaza = data.Plaza;
		var Cliente = data.Cliente;
		var Fecha_captura = data.Fecha_captura;
		var unidad = data.unidad;
		var km_inicial = data.km_inicial;
		var km_final = data.km_final;
		var km_total = data.km_total;
		var lts_consumidos = data.lts_consumidos;
		var rendimiento = data.rendimiento;
		var noDeduVehi = data.noDeduVehi;
		var merma = data.merma;
		var sistemasALM = data.sistemasALM;
		var noDeduAlm = data.noDeduAlm;
		var id_general = data.id_general;
		var combustible = data.combustible;
		var casetas = data.casetas;
		var ser_unidades = data.ser_unidades;
		var estacionamientoViaticos = data.estacionamientoViaticos;
		var alimentos = data.alimentos;
		var hospedaje = data.hospedaje;
		var taxis = data.taxis;
		var pasajes = data.pasajes;
		var noDeduVia = data.noDeduVia;
		var papeleria = data.papeleria;
		var materialempaque = data.materialempaque;
		var equipoSeguridad = data.equipoSeguridad;
		var infracciones = data.infracciones;
		var plomeria = data.plomeria;
		var ferreteria = data.ferreteria;
		var impuestos = data.impuestos;
		var sistemasgastos = data.sistemasgastos;
		var cajachica = data.cajachica;
		var asesoria = data.asesoria;
		var arrenamunidades = data.arrenamunidades;
		var servcomputo = data.servcomputo;
		var noDeduUDN = data.noDeduUDN;
		var maniobras = data.maniobras;
		var infraccionesfletes = data.infraccionesfletes;
		var fletes = data.fletes;
		var paqueteria = data.paqueteria;
		var noDeduFletes = data.noDeduFletes;


		var gas = data.gas;
		var arrendamientoinmuebles = data.arrendamientoinmuebles;
		var ServiciosAGL = data.ServiciosAGL;
		var manttoGRAL = data.manttoGRAL;
		var ManttoAlmacen = data.ManttoAlmacen;
		var Internet = data.Internet;
		var limpieza = data.limpieza;
		var seguros = data.seguros;
		var seguridad = data.seguridad;
		var monitoreo = data.monitoreo;
		var plagas = data.plagas;
		var basura = data.basura;
		var higiene = data.higiene;
		var publicidad = data.publicidad;
		var fianzas = data.fianzas;
		var almacenaje = data.almacenaje;
		var facturacion = data.facturacion;
		var gastolegal = data.gastolegal;
		var noDeduServ = data.noDeduServ;

		id_vehiculos = data.id_vehiculos;
		id_viaticos = data.id_viaticos;
		id_gastosudn = data.id_gastosudn;
		id_fletes = data.id_fletes;
		id_serviciosudn = data.id_serviciosudn;
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
		$('#inputmodalcasetas').val(casetas);
		$('#inputmodalcombustible').val(combustible);
		$('#inputmodalserviunidades').val(ser_unidades);
		$('#noDeduVehi_modal').val(noDeduVehi);

		$('#inputmodalestacionamientoViaticos').val(estacionamientoViaticos);
		$('#inputmodalalimentos').val(alimentos);
		$('#inputmodalhospedaje').val(hospedaje);
		$('#taxis_modal').val(taxis);
		$('#inputmodalpasajes').val(pasajes);
		$('#noDeduVia_modal').val(noDeduVia);

		$('#inputmodalpapeleria').val(papeleria);
		$('#empaque_modal').val(materialempaque);
		$('#inputequipoSeguridad').val(equipoSeguridad);
		$('#infracciones_modal').val(infracciones);
		$('#plomeria_modal').val(plomeria);
		$('#ferreteria_modal').val(ferreteria);
		$('#inputmodalimpuestos').val(impuestos);
		$('#inputmodalsistemas').val(sistemasgastos);
		$('#inputmodalcaja').val(cajachica);
		$('#asesoria_modal').val(asesoria);
		$('#inputmodalarreunidades').val(arrenamunidades);
		$('#inputmodalcomputo').val(servcomputo);
		$('#noDeduGastos_modal').val(noDeduUDN);

		$('#maniobras_modal').val(maniobras);
		$('#infraccionesFletes_modal').val(infraccionesfletes);
		$('#inputmodalfletes').val(fletes);
		$('#inputmodalpaqueteria').val(paqueteria);
		$('#noDeduFletes_modal').val(noDeduFletes);

		$('#gas_modal').val(gas);
		$('#inputmodalarrendamientoinmuebles').val(arrendamientoinmuebles);
		$('#inputmodalServiciosAGL').val(ServiciosAGL);
		$('#manttoGRAL_modal').val(manttoGRAL);
		$('#ManttoAlmacen_modal').val(ManttoAlmacen);
		$('#inputmodalInternet').val(Internet);
		$('#limpieza_modal').val(limpieza);
		$('#seguros_modal').val(seguros);
		$('#seguridad_modal').val(seguridad);
		$('#inputmodalmonitoreo').val(monitoreo);
		$('#plagas_modal').val(plagas);
		$('#basura_modal').val(basura);
		$('#higiene_modal').val(higiene);
		$('#publicidad1_modal').val(publicidad);
		$('#inputmodalfianzas').val(fianzas);
		$('#almacenaje_modal').val(almacenaje);
		$('#inputmodalfacturacion').val(facturacion);
		$('#gastolegal_modal').val(gastolegal);
		$('#noDeduServ_modal').val(noDeduServ);

		$('#id_general_update').val(id_general);
		$('#merma_modal').val(merma);
		$('#sistemasAlm_modal').val(sistemasALM);
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
						"pageLength": 15,
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
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.id_general}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.id_general}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.nombre + ' ' + data.apellidos}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.nombre + ' ' + data.apellidos}</h9>`

									}
								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.Empresa}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Empresa}</h9>`

									}
								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.Dia_gasto}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Dia_gasto}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.Mes}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Mes}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.Plaza}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Plaza}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.Cliente}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Cliente}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.Fecha_captura}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Fecha_captura}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.unidad}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.unidad}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.km_inicial}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.km_inicial}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.km_final}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.km_final}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.km_total}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.km_total}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.lts_consumidos}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.lts_consumidos}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.rendimiento}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.rendimiento}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.combustible}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.combustible}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.casetas}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.casetas}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.ser_unidades}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ser_unidades}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduVehi}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduVehi}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.estacionamientoViaticos}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.estacionamientoViaticos}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.alimentos}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.alimentos}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.hospedaje}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.hospedaje}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.taxis}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.taxis}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.pasajes}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.pasajes}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduVia}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduVia}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.papeleria}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.papeleria}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.materialempaque}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.materialempaque}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.equipoSeguridad}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.equipoSeguridad}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.infracciones}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.infracciones}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.plomeria}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.plomeria}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.ferreteria}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ferreteria}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.impuestos}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.impuestos}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.sistemasgastos}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.sistemasgastos}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.cajachica}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.cajachica}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.asesoria}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.asesoria}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.arrenamunidades}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.arrenamunidades}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.servcomputo}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.servcomputo}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduUDN}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduUDN}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.maniobras}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.maniobras}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.infraccionesfletes}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.infraccionesfletes}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.fletes}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.fletes}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.paqueteria}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.paqueteria}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduFletes}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduFletes}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.gas}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.gas}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.arrendamientoinmuebles}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.arrendamientoinmuebles}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.ServiciosAGL}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ServiciosAGL}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.manttoGRAL}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.manttoGRAL}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.ManttoAlmacen}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.ManttoAlmacen}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.Internet}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.Internet}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.limpieza}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.limpieza}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.seguros}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.seguros}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.seguridad}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.seguridad}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.monitoreo}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.monitoreo}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.plagas}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.plagas}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.basura}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.basura}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.higiene}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.higiene}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.publicidad}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.publicidad}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.fianzas}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.fianzas}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.almacenaje}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.almacenaje}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.facturacion}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.facturacion}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.gastolegal}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.gastolegal}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduServ}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.noDeduServ}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.merma}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.merma}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.sistemasALM}</h9>`;
									} else {
										return `<h9 class='m-0 text-danger'>${data.sistemasALM}</h9>`

									}
								}

							},
							{
								'data': null,
								'render': function (data, type, row) {
									if (data.estatus == 1) {
										return `<h9 class='m-0 font-weight-bold text-primary'>${data.noDeduAlm}</h9>`;
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
	// *+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+
	// -----------------------------Actualizar datos vehiculos--------------------------------------------------------------------
	function actualizar_registro_vehiculos() {
		var id_general = $('#id_general_update').val();
		var combustible_modal = $('#inputmodalcombustible').val();
		var caseta_modal = $('#inputmodalcasetas').val();
		var serviunidades_modal = $('#inputmodalserviunidades').val();
		var noDeduVehi_modal = $('#noDeduVehi_modal').val();
		var array_combustible = localStorage.getItem('array_detalles_gastoscombustible');
		var array_caseta = localStorage.getItem('array_detalles_gastoscasetas');
		var array_unidad = localStorage.getItem('array_detalles_gastosserviunidades');
		$.ajax({
			url: "AnalisisGastos/actualizar_registro_vehiculos",
			type: "POST",
			dataType: "json",
			data: {
				id_general: id_general,
				combustible_modal: combustible_modal,
				caseta_modal: caseta_modal,
				serviunidades_modal: serviunidades_modal,
				noDeduVehi_modal: noDeduVehi_modal,
				array_combustible: array_combustible,
				array_caseta: array_caseta,
				array_unidad: array_unidad
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
	// ---------------------------------------------------------------------------------------------------------------------------

	// -----------------------------Actualizar datos viaticos--------------------------------------------------------------------
	function actualizar_registro_viaticos() {
		var id_general = $('#id_general_update').val();
		var estacionamientoViaticos_modal = $('#inputmodalestacionamientoViaticos').val();
		var alimentos_modal = $('#inputmodalalimentos').val();
		var hospedaje_modal = $('#inputmodalhospedaje').val();
		var taxis_modal = $('#taxis_modal').val();
		var pasajes_modal = $('#pasajes_modal').val();
		var noDeduVia_modal = $('#noDeduVia_modal').val();
		var array_hospedaje = localStorage.getItem('array_detalles_gastoshospedaje');
		var array_alimentos = localStorage.getItem('array_detalles_gastosalimentos');
		var array_estacionamiento = localStorage.getItem('array_detalles_gastosestacionamientoViaticos');
		var array_pasaje = localStorage.getItem('array_detalles_gastospasajes');
		$.ajax({
			url: "AnalisisGastos/actualizar_registro_viaticos",
			type: "POST",
			dataType: "json",
			data: {
				id_general: id_general,
				estacionamientoViaticos_modal: estacionamientoViaticos_modal,
				alimentos_modal: alimentos_modal,
				hospedaje_modal: hospedaje_modal,
				taxis_modal: taxis_modal,
				pasajes_modal: pasajes_modal,
				noDeduVia_modal: noDeduVia_modal,
				array_hospedaje: array_hospedaje,
				array_alimentos: array_alimentos,
				array_estacionamiento: array_estacionamiento,
				array_pasaje: array_pasaje
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

	$(document).on('click', '#btn_datos_viaticos_modal', function () {
		actualizar_registro_viaticos();
	});
	// ---------------------------------------------------------------------------------------------------------------------------
	// -----------------------------Actualizar datos Gastos UDN--------------------------------------------------------------------
	function actualizar_registro_gastosudn() {
		var id_general = $('#id_general_update').val();
		var papeleria_modal = $('#inputmodalpapeleria').val();
		var empaque_modal = $('#empaque_modal').val();
		var equipoSeguridad_modal = $('#inputequipoSeguridad').val();
		var infracciones_modal = $('#infracciones_modal').val();
		var plomeria_modal = $('#plomeria_modal').val();
		var ferreteria_modal = $('#ferreteria_modal').val();
		var impuestos_modal = $('#inputmodalimpuestos').val();
		var sistemasgastos_modal = $('#inputmodalsistemas').val();
		var cajachica_modal = $('#inputmodalcaja').val();
		var asesoria_modal = $('#asesoria_modal').val();
		var arreunidades_modal = $('#inputmodalarreunidades').val();
		var computo_modal = $('#inputmodalcomputo').val();
		var noDeduGastos_modal = $('#noDeduGastos_modal').val();
		var array_papeleria = localStorage.getItem('array_detalles_gastospapeleria');
		var array_sistema = localStorage.getItem('array_detalles_gastossistemas');
		var array_caja_chica = localStorage.getItem('array_detalles_gastoscaja_chica');
		var array_impuestos = localStorage.getItem('array_detalles_gastosimpuestos');
		var array_serv_computo = localStorage.getItem('array_detalles_gastosserv_computo');
		var array_arrendamiento = localStorage.getItem('array_detalles_gastosarrendam_unidades');
		$.ajax({
			url: "AnalisisGastos/actualizar_registro_gastosudn",
			type: "POST",
			dataType: "json",
			data: {
				id_general: id_general,
				papeleria_modal: papeleria_modal,
				empaque_modal: empaque_modal,
				equipoSeguridad_modal: equipoSeguridad_modal,
				infracciones_modal: infracciones_modal,
				plomeria_modal: plomeria_modal,
				ferreteria_modal: ferreteria_modal,
				impuestos_modal: impuestos_modal,
				sistemasgastos_modal: sistemasgastos_modal,
				cajachica_modal: cajachica_modal,
				asesoria_modal: asesoria_modal,
				arreunidades_modal: arreunidades_modal,
				computo_modal: computo_modal,
				noDeduGastos_modal: noDeduGastos_modal,
				array_papeleria: array_papeleria,
				array_impuestos: array_impuestos,
				array_caja_chica: array_caja_chica,
				array_arrendamiento: array_arrendamiento,
				array_sistema: array_sistema,
				array_serv_computo: array_serv_computo
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

	$(document).on('click', '#btn_datos_gastosudn_modal', function () {
		actualizar_registro_gastosudn();
	});
	// -------------------------------------------------------------------------------------------------------------------
	// -----------------------------Actualizar datos Gastos Fletes------------------------------------------------------------
	function actualizar_registro_gastosfletes() {
		var id_general = $('#id_general_update').val();
		var maniobras_modal = $('#maniobras_modal').val();
		var infraccionesFletes_modal = $('#infraccionesFletes_modal').val();
		var fletes_modal = $('#inputmodalfletes').val();
		var paqueteria_modal = $('#inputmodalpaqueteria').val();
		var noDeduFletes_modal = $('#noDeduFletes_modal').val();
		var array_fletes = localStorage.getItem('array_detalles_gastosfletes');
		var array_paqueteria = localStorage.getItem('array_detalles_gastospaqueteria');
		$.ajax({
			url: "AnalisisGastos/actualizar_registro_gastosfletes",
			type: "POST",
			dataType: "json",
			data: {
				id_general: id_general,
				maniobras_modal: maniobras_modal,
				infraccionesFletes_modal: infraccionesFletes_modal,
				fletes_modal: fletes_modal,
				paqueteria_modal: paqueteria_modal,
				noDeduFletes_modal: noDeduFletes_modal,
				array_fletes: array_fletes,
				array_paqueteria: array_paqueteria
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

	$(document).on('click', '#btn_datos_gastosfletes_modal', function () {
		actualizar_registro_gastosfletes();
	});

	// -----------------------------------------------------------------------------------------------------------------------
	// -----------------------------Actualizar datos Servicios UDN------------------------------------------------------------
	function actualizar_registro_serviciosudn() {
		var id_general = $('#id_general_update').val();
		var gas_modal = $('#gas_modal').val();
		var arrendamientoinmuebles_modal = $('#inputmodalarrendamientoinmuebles').val();
		var ServiciosAGL_modal = $('#inputmodalServiciosAGL').val();
		var manttoGRAL_modal = $('#manttoGRAL_modal').val();
		var ManttoAlmacen_modal = $('#ManttoAlmacen_modal').val();
		var Internet_modal = $('#inputmodalInternet').val();
		var limpieza_modal = $('#limpieza_modal').val();
		var seguros_modal = $('#seguros_modal').val();
		var seguridad_modal = $('#seguridad_modal').val();
		var monitoreo_modal = $('#inputmodalmonitoreo').val();
		var plagas_modal = $('#plagas_modal').val();
		var basura_modal = $('#basura_modal').val();
		var higiene_modal = $('#higiene_modal').val();
		var publicidad1_modal = $('#publicidad1_modal').val();
		var fianzas_modal = $('#inputmodalfianzas').val();
		var almacenaje_modal = $('#almacenaje_modal').val();
		var facturacion_modal = $('#inputmodalfacturacion').val();
		var gastolegal_modal = $('#gastolegal_modal').val();
		var noDeduServ_modal = $('#noDeduServ_modal').val();
		var array_serv_agua_luz = localStorage.getItem('array_detalles_gastosServiciosagl');
		var array_fianzas = localStorage.getItem('array_detalles_gastosfianzas');
		var array_facturacion = localStorage.getItem('array_detalles_gastosfacturacion');
		var array_arrendam_inmueble = localStorage.getItem('array_detalles_gastosarrendamientoinmuebles');
		var array_internet = localStorage.getItem('array_detalles_gastosinternet');
		var array_monitoreo = localStorage.getItem('array_detalles_gastosmonitoreo');
		$.ajax({
			url: "AnalisisGastos/actualizar_registro_serviciosudn",
			type: "POST",
			dataType: "json",
			data: {
				id_general: id_general,
				gas_modal: gas_modal,
				arrendamientoinmuebles_modal: arrendamientoinmuebles_modal,
				ServiciosAGL_modal: ServiciosAGL_modal,
				manttoGRAL_modal: manttoGRAL_modal,
				ManttoAlmacen_modal: ManttoAlmacen_modal,
				Internet_modal: Internet_modal,
				limpieza_modal: limpieza_modal,
				seguros_modal: seguros_modal,
				seguridad_modal: seguridad_modal,
				monitoreo_modal: monitoreo_modal,
				plagas_modal: plagas_modal,
				basura_modal: basura_modal,
				higiene_modal: higiene_modal,
				publicidad1_modal: publicidad1_modal,
				fianzas_modal: fianzas_modal,
				almacenaje_modal: almacenaje_modal,
				facturacion_modal: facturacion_modal,
				gastolegal_modal: gastolegal_modal,
				noDeduServ_modal: noDeduServ_modal,
				array_serv_agua_luz: array_serv_agua_luz,
				array_fianzas: array_fianzas,
				array_facturacion: array_facturacion,
				array_arrendam_inmueble: array_arrendam_inmueble,
				array_internet: array_internet,
				array_monitoreo: array_monitoreo
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

	$(document).on('click', '#btn_datos_serviciosudn_modal', function () {
		actualizar_registro_serviciosudn();
	});

	// -----------------------------------------------------------------------------------------------------------------------

	// *+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+

	// -----------------------------Actualizar datos almacen--------------------------------------------
	function actualizar_registro_almacen() {
		var id_general = $('#id_general_update').val();
		var merma_modal = $('#merma_modal').val();
		var sistemasAlm_modal = $('#sistemasAlm_modal').val();
		var noDeduAlm_modal = $('#noDeduAlm_modal').val();
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

	$(document).on('click', '.btn_cancelar', function () {
		var tabla = $('#data_table_costos_update').DataTable();
		var row = tabla.row($(this).parent().parent());
		limpiar_formularios();
		tabla.clear().draw(false);
		$("#modal_costos_update").modal("hide");
	});

	$(document).on('click', '.btn_agregar_costos_modal', function () {
		var elemento = $(this);
		value_attr = elemento.attr('data-value');
		mostrar_tablas_hijas(value_attr)
	});

	function mostrar_tablas_hijas(value_attr) {
		console.log(value_attr);
		let id = '';
		let split_array = value_attr.split(',')
		let nombre_tabla_hija = split_array[0];
		let nombre_id_hija = split_array[1];
		let nombre_id_padre = split_array[2];
		let nombre_tabla_padre = split_array[3];
		if (nombre_tabla_padre == 'vehiculo') {
			id = id_vehiculos;
		}
		if (nombre_tabla_padre == 'viaticos') {
			id = id_viaticos;
		}
		if (nombre_tabla_padre == 'gastosudn') {
			id = id_gastosudn;
		}
		if (nombre_tabla_padre == 'gastosfletes') {
			id = id_fletes;
		}
		if (nombre_tabla_padre == 'serviciosudn') {
			id = id_serviciosudn;
		}
		$.ajax({
			url: "AnalisisGastos/gastos_detalle",
			type: "POST",
			dataType: "json",
			data: {
				nombre_tabla_hija: nombre_tabla_hija,
				nombre_id_hija: nombre_id_hija,
				nombre_id_padre: nombre_id_padre,
				id: id,
			},
			success: function (data) {
				if (data.response_code == 200) {
					nombre_tabla_hija_update = nombre_tabla_hija;
					nombre_id_hija_update = nombre_id_hija
					var tabla = $("#data_tabledit").DataTable();
					tabla.clear().draw(false);
					$("#data_tabledit").DataTable({
						"destroy": true,
						processing: true,
						"searching": false,
						"ordering": false,
						"info": false,
						"bPaginate": false,
						"data": data.response_data,
						"columns": [
							{ "data": 'id', },
							{ "data": 'no_factura' },
							{ "data": 'iva' },
							{ "data": 'sub_total' },
							{ "data": 'total' }
						]
					});
					$('#modal_costos_update').modal({ backdrop: 'static', keyboard: false });
					$("#modal_costos_update").modal("show");
				} else if (data.response_code == 500) { } else { }
			},
			error: function (xhr) {
				infoAlert("Verifica", data.response_text);
			}
		});
	}

	$("#data_tabledit").on("draw.dt", function () {
		$("#data_tabledit").Tabledit({
			url: "AnalisisGastos/prueba2edit",
			dataType: "json",
			eventType: 'dblclick',
			buttons: {
				edit: {
					class: 'btn btn-sm btn-primary',
					html: `<i class="fas fa-edit"></i> Editar`,
					action: 'edit'
				},
				save: {
					class: 'btn btn-sm btn-success',
					html: '<i class="fas fa-save"></i> Guardar'
				},
			},
			columns: {
				identifier: [0, "id"],
				editable: [
					[1, "no_factura"],
					[2, "sub_total"],
					[3, "iva"],
					[4, "total"],
				],
			},
			restoreButton: false,
			onSuccess: function (data, textStatus, jqXHR) {
				if (data.action == "edit") {
					var objecto = [];
					var json = '';
					var existe = false
					var array = {
						nombre_tabla: nombre_tabla_hija_update,
						nombre_id_hija: nombre_id_hija_update,
						id: data.id,
						iva: data.iva,
						no_factura: data.no_factura,
						sub_total: data.sub_total,
						total: data.total
					}
					if (localStorage.getItem('array_detalles_gastos' + nombre_tabla_hija_update) == undefined) {
						objecto.push(array);
						json = JSON.stringify(objecto);
						localStorage.setItem('array_detalles_gastos' + nombre_tabla_hija_update, json);
						console.log('entra en este if'); // aun no existe el array
					} else {
						var array_storage = localStorage.getItem('array_detalles_gastos' + nombre_tabla_hija_update);
						var array_parse = JSON.parse(array_storage);
						array_parse.forEach(item => {
							if (item.id == array.id) { existe = true }
						});
						if (!existe) {
							array_parse.push(array);
						} else {
							var index = array_parse.findIndex(x => x.id === array.id)
							var nombre_local_storage = 'array_detalles_gastos' + nombre_tabla_hija_update
							reditar_fila(index, nombre_local_storage)
						}
						var json_stringify = JSON.stringify(array_parse);
						localStorage.setItem('array_detalles_gastos' + nombre_tabla_hija_update, json_stringify);
					}
				}
			},
		});
	});

	function reditar_fila(index, nombre_local_storage) {
		Swal.fire({
			title: 'Reeditar',
			text: "Esta fila ya fue editado con anterioridad. ¿Desean volver a editar?",
			icon: 'question',
			iconHtml: '?',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si',
			cancelButtonText: 'No'
		}).then((result) => {
			if (result.value) {
				var array_local = localStorage.getItem(nombre_local_storage);
				var array_parse = JSON.parse(array_local);
				var json_stringify = "";
				array_parse.splice(index, 1)
				json_stringify = JSON.stringify(array_parse)
				localStorage.setItem(nombre_local_storage, json_stringify);
			} else {
				infoAlert("Cancelado", "La eliminación ha sido cancelada");
			}
		});
	}


	// function mostrar_tablas_hijas(value_attr) {
	// 	let id = '';
	// 	let split_array = value_attr.split(',')
	// 	let nombre_tabla_hija = split_array[0];
	// 	let nombre_id_hija = split_array[1];
	// 	let nombre_id_padre = split_array[2];
	// 	let nombre_tabla_padre = split_array[3];
	// 	if (nombre_tabla_padre == 'vehiculo') {
	// 		id = id_vehiculos;
	// 	}
	// 	if (nombre_tabla_padre == 'viaticos') {
	// 		id = id_viaticos;
	// 	}
	// 	if (nombre_tabla_padre == 'gastosudn') {
	// 		id = id_gastosudn;
	// 	}
	// 	if (nombre_tabla_padre == 'gastosfletes') {
	// 		id = id_fletes;
	// 	}
	// 	if (nombre_tabla_padre == 'serviciosudn') {
	// 		id = id_serviciosudn;
	// 	}
	// 	$.ajax({
	// 		url: "AnalisisGastos/gastos_detalle",
	// 		type: "POST",
	// 		dataType: "json",
	// 		data: {
	// 			nombre_tabla_hija: nombre_tabla_hija,
	// 			nombre_id_hija: nombre_id_hija,
	// 			nombre_id_padre: nombre_id_padre,
	// 			id: id,
	// 		},
	// 		success: function (data) {
	// 			if (data.response_code == 200) {
	// 				var tabla = $("#data_tabledit").DataTable();
	// 				tabla.clear().draw(false);
	// 				$("#data_tabledit").DataTable({
	// 					"destroy": true,
	// 					processing: true,
	// 					"searching": false,
	// 					"ordering": false,
	// 					"info": false,
	// 					"bPaginate": false,
	// 					"data": data.response_data,
	// 					"columns": [
	// 						{ "data": 'id', },
	// 						{
	// 							"data": 'no_factura',
	// 						},
	// 						{
	// 							"data": 'iva',
	// 						},
	// 						{
	// 							"data": 'sub_total',
	// 						},
	// 						{
	// 							"data": 'total',
	// 						}
	// 					]
	// 				});
	// 				$('#modal_costos_update').modal({ backdrop: 'static', keyboard: false });
	// 				$("#modal_costos_update").modal("show");
	// 			} else if (data.response_code == 500) {

	// 			} else {

	// 			}
	// 		},
	// 		error: function (xhr) {
	// 			infoAlert("Verifica", data.response_text);
	// 		}
	// 	});
	// }

	// $("#data_tabledit").on("draw.dt", function () {
	// 	$("#data_tabledit").Tabledit({
	// 		url: "AnalisisGastos/prueba2edit",
	// 		dataType: "json",
	// 		eventType: 'dblclick',
	// 		buttons: {
	// 			edit: {
	// 				class: 'btn btn-sm btn-primary',
	// 				html: ' EDIT',
	// 				action: 'edit'
	// 			}
	// 		},
	// 		columns: {
	// 			identifier: [0, "id"],
	// 			editable: [
	// 				[1, "no_factura"],
	// 				[2, "sub_total"],
	// 				[3, "iva"],
	// 				[4, "total"],
	// 			],
	// 		},
	// 		restoreButton: false,
	// 		onSuccess: function (data, textStatus, jqXHR) {
	// 			if (data.action == "edit") {
	// 				localStorage.setItem('variablePrueba', data.action)
	// 			}
	// 		},
	// 	});
	// });


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
