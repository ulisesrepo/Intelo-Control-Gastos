$(document).ready(function () {
	var array_globla = []
	$('#data_table_costos').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	
	$(document).on('click', '#btn_datos_general', function () {
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
				var empresas = $('#empresas').val();
				var diaGasto = $('#dia_gasto').val();
				var mes = $('#Mes').val();
				var plaza = $('#Plaza').val();
				var cliente = $('#cliente').val();
				var fechaCaptura = $('#fecha_cap').val();

				var general = {
					'empresas': empresas,
					'dia_gasto': diaGasto,
					'Mes': mes,
					'Plaza': plaza,
					'cliente': cliente,
					'fecha_cap': fechaCaptura,
				}
				
				var myJson = JSON.stringify(general);
				localStorage.setItem('array_general', myJson);
				
			}else {
				var mensaje = "Verificar";
				var text = "Favor de ingresar datos";
				infoAlert(mensaje, text)
			}
		})
	});

	$(document).on('click', '#btn_datos_vehiculo', function () {
		
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
				var unidad = $('#unidad').val().trim().toUpperCase();
				var km_inicial = $('#km_inicial').val().trim().toUpperCase();
				var km_final = $('#km_final').val().trim().toUpperCase();
				var lts_consumidos = $('#lts_consumidos').val();
				var combustible = $('#inputcombustible').val().trim().toUpperCase();
				var casetas = $('#inputcasetas').val().trim().toUpperCase();
				var noDeduVehi = $('#noDeduVehi').val().trim().toUpperCase();
				var ser_unidades = $('#inputserviunidades').val().trim().toUpperCase();;
				var km_total = (km_final - km_inicial);
				var totalrendimiento = km_total;
				var rendimiento = (totalrendimiento) / (lts_consumidos);
				if (km_inicial >= km_final) {
					var mensaje = "Verificar";
					var text = "El kilometro Inicial no puede ser mayor o igual al kilometro Final";
                    infoAlert(mensaje, text)
                    if (km_total && lts_consumidos == 0) {
                        var mensaje = "Verificar";
						var text = "Favor de ingresar correctamente los litros consumidos";
						infoAlert(mensaje, text)
					} else {
                        $("#rendimiento").val(rendimiento);
                    }
				} else {
					$("#km_total").val(km_total)
					var vehiculo = {
						'unidad': unidad,
						'km_inicial': km_inicial,
						'km_final': km_final,
						'km_total': km_total,
						'lts_consumidos': lts_consumidos,
						'rendimiento': rendimiento,
						'inputcombustible': combustible,
						'inputcasetas': casetas,
						'noDeduVehi': noDeduVehi,
						'inputserviunidades': ser_unidades
					}
				
				}
				var myJson = JSON.stringify(vehiculo);
				localStorage.setItem('array_vehiculos', myJson);

				
			}
		})
	});

	$(document).on('click', '#btn_datos_viaticos', function () {
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
				var estacionamientoViaticos = $('#inputestacionamientoViaticos').val();
				var alimentos = $('#inputalimentos').val();
				var hospedaje = $('#inputhospedaje').val();
				var taxis = $('#taxis').val();
				var pasajes = $('#inputpasajes').val();
				var noDeduVia = $('#noDeduVia').val();

				var viaticos = {
					'inputestacionamientoViaticos': estacionamientoViaticos,
					'inputalimentos': alimentos,
					'inputhospedaje': hospedaje,
					'taxis': taxis,
					'inputpasajes': pasajes,
					'noDeduVia': noDeduVia,
				}
				var myJson = JSON.stringify(viaticos);
				localStorage.setItem('array_viaticos', myJson);
			}
		})
	});

	$(document).on('click', '#btn_datos_gastosUDN', function () {
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
				var papeleria = $('#inputpapeleria').val();
				var empaque = $('#empaque').val();
				var equipoSeguridad = $('#inputequipoSeguridad').val();
				var infracciones = $('#infracciones').val();
				var plomeria = $('#plomeria').val();
				var ferreteria = $('#ferreteria').val();
				var impuestos = $('#inputimpuestos').val();
				var sistemas = $('#inputsistemas').val();
				var caja = $('#inputcaja').val();
				var asesoria = $('#asesoria').val();
				var arreunidades = $('#inputarreunidades').val();
				var computo = $('#inputcomputo').val();
				var noDeduGastos = $('#noDeduGastos').val();

				var gastosUDN = {
					'inputpapeleria': papeleria,
					'empaque': empaque,
					'inputequipoSeguridad': equipoSeguridad,
					'infracciones': infracciones,
					'plomeria': plomeria,
					'ferreteria': ferreteria,
					'inputimpuestos': impuestos,
					'inputsistemas': sistemas,
					'inputcaja': caja,
					'asesoria': asesoria,
					'inputarreunidades': arreunidades,
					'inputcomputo': computo,
					'noDeduGastos': noDeduGastos,
				}
				var myJson = JSON.stringify(gastosUDN);
				localStorage.setItem('array_gastosUDN', myJson);
			}
		})
	});

	$(document).on('click', '#btn_datos_fletes', function () {
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
				var maniobras = $('#inmaniobras').val();
				var infraccionesFletes = $('#infraccionesFletes').val();
				var fletes = $('#inputfletes').val();
				var paqueteria = $('#inputpaqueteria').val();
				var noDeduFletes = $('#noDeduFletes').val();

				var fletes = {
					'inmaniobras': maniobras,
					'infraccionesFletes': infraccionesFletes,
					'inputfletes': fletes,
					'inputpaqueteria': paqueteria,
					'noDeduFletes': noDeduFletes,
				}
				var myJson = JSON.stringify(fletes);
				localStorage.setItem('array_Gastosfletes', myJson);
			}
		})
	});

	$(document).on('click', '#btn_datos_serviciosUDN', function () {
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
				var gas = $('#gas').val();
				var arrendamientoinmuebles = $('#inputarrendamientoinmuebles').val();
				var ServiciosAGL = $('#inputServiciosAGL').val();
				var manttoGRAL = $('#manttoGRAL').val();
				var ManttoAlmacen = $('#ManttoAlmacen').val();
				var Internet = $('#inputInternet').val();
				var limpieza = $('#limpieza').val();
				var seguros = $('#seguros').val();
				var seguridad = $('#seguridad').val();
				var monitoreo = $('#inputmonitoreo').val();
				var plagas = $('#plagas').val();
				var basura = $('#basura').val();
				var higiene = $('#higiene').val();
				var publicidad1 = $('#publicidad1').val();
				var fianzas = $('#inputfianzas').val();
				var almacenaje = $('#almacenaje').val();
				var facturacion = $('#inputfacturacion').val();
				var gastolegal = $('#gastolegal').val();
				var noDeduServ = $('#noDeduServ').val();

				var serviciosUDN = {
					'gas': gas,
					'inputarrendamientoinmuebles': arrendamientoinmuebles,
					'inputServiciosAGL': ServiciosAGL,
					'manttoGRAL': manttoGRAL,
					'ManttoAlmacen': ManttoAlmacen,
					'inputInternet': Internet,
					'limpieza': limpieza,
					'seguros': seguros,
					'seguridad': seguridad,
					'inputmonitoreo': monitoreo,
					'plagas': plagas,
					'basura': basura,
					'higiene': higiene,
					'publicidad1': publicidad1,
					'inputfianzas': fianzas,
					'almacenaje': almacenaje,
					'inputfacturacion': facturacion,
					'gastolegal': gastolegal,
					'noDeduServ': noDeduServ,
				}
				var myJson = JSON.stringify(serviciosUDN);
				localStorage.setItem('array_serviciosUDN', myJson);
			}
		})
	});

	$(document).on('click', '#btn_datos_almacen', function () {
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
				var merma = $('#merma').val();
				var noDeduAlm = $('#noDeduAlm').val();
				var sistemasAlm = $('#sistemasAlm').val();

				var almacen = {
					'merma': merma,
					'noDeduAlm': noDeduAlm,
					'sistemasAlm': sistemasAlm,
				}
				var myJson = JSON.stringify(almacen);
				localStorage.setItem('array_almacen', myJson);
				
				
			}
		})
	});

	$(document).on('click', '#btn_agregar_datos_tabla', function () {
		var tabla = $('#data_table_costos').DataTable();
		var no_factura = $('#no_factura').val();
		var sub_total = $('#sub_total').val();
		var iva = $('#iva').val();
		// var resultado_iva = sub_total + iva;
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
		var tabla = $("#data_table_costos").DataTable();
		var row = tabla.row($(this).parent().parent());
		tabla.row(row).remove().draw(false);
	});

	$(document).on('click', '.btn_agregar_costos', function () {
		var elemento = $(this);
		valor_attr = elemento.attr('data-value');
		$('#input_modal').val(valor_attr);
		$('#modal_costos').modal({
			backdrop: 'static',
			keyboard: false
		});
		$("#modal_costos").modal("show");
	});

	$(document).on('click', '.btn_cancelar', function () {
		var tabla = $("#data_table_costos").DataTable();
		var row = tabla.row($(this).parent().parent());
		limpiar_formularios();
		tabla.clear().draw(false);
		$("#modal_costos").modal("hide");
	});

	$(document).on('click', '#btn_guardar_tabla', function () {
		var sufijoarray = $("#input_modal").val();
		var tabla = $("#data_table_costos").DataTable();
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
				var tabla = $("#data_table_costos").DataTable();
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
					$('#input' + sufijoarray).val(totalfilas);
					limpiar_formularios();
					tabla.clear().draw(false);
					$("#modal_costos").modal("hide");
				} else {
					var mensaje = "Verificar";
					var text = "Favor de ingresar datos";
					infoAlert(mensaje, text)
				}
			}
		})
	});

	


	function limpiar_formularios() {
		$("#no_factura").val('');
		$("#sub_total").val('');
		$("#iva").val('');
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
