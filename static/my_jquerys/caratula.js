$(document).ready(function () {
	$('#dataTable_detalle_gastos').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});
	var array_total = [];
	var image_base_64_logo = "";
	var imagen_logo = 'http://localhost:8080/intelo/assets/img/intelo123.png'

	function toDataURL(url, callback) {
		var xhr = new XMLHttpRequest();
		xhr.onload = function () {
			var reader = new FileReader();
			reader.onloadend = function () {
				callback(reader.result);
			}
			reader.readAsDataURL(xhr.response);
		};
		xhr.open('GET', url);
		xhr.responseType = 'blob';
		xhr.send();
	}

	toDataURL(imagen_logo, function (dataUrl) {
		image_base_64_logo = dataUrl
	});

	var form_validate_caratula = $('#formulario_caratula').validate({
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
		}
	});


	$(document).on('blur', '#fecha_comprobacion', function () {
		fecha = $('#fecha_comprobacion').val();
		cargar_gatos(fecha)
	});

	$(document).on('change', '#empresa', function () {
		var id_general = $(this).val();
		cargar_detalle(id_general);
	});

	function cargar_detalle(id_general) {
		$.ajax({
			url: "CaratulaGastos/cargar_gastos_caratula/" + id_general,
			type: "get",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					var fila = [];
					var array_content_pdf = [
						[{
								text: 'Grupo gasto',
								fontSize: 13,
								bold: true,
								alignment: 'center'
							},
							{
								text: 'Tipo gasto',
								fontSize: 13,
								bold: true,
								alignment: 'center'
							},
							{
								text: 'I.V.A',
								fontSize: 13,
								bold: true,
								alignment: 'center'
							},
							{
								text: 'Subtotal',
								fontSize: 13,
								bold: true,
								alignment: 'center'
							},
							{
								text: 'Total',
								fontSize: 13,
								bold: true,
								alignment: 'center'
							}
						]
					];

					if (typeof (data.response_data.vehiculos) != "undefined") {
						var vehiculos = data.response_data.vehiculos;
						for (var i = 0; i < vehiculos.length; i++) {
							if (vehiculos[i].casetas != "") {
								
								var array_iva_calculado = calcular_iva(vehiculos[i].casetas);
							

								fila = [{
										text: "Vehiculos",
										fontSize: 9,
										bold: true
									},
									{
										text: "Casetas",
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + vehiculos[i].casetas,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(vehiculos[i].casetas));
							}
							if (vehiculos[i].combustible != "") {

								var array_iva_calculado = calcular_iva(vehiculos[i].combustible);
								
								fila = [{
										text: "Vehiculos ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Combustible ",
										fontSize: 9,
										bold: true
									},

									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + vehiculos[i].combustible,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(vehiculos[i].ser_unidades));
							}
							if (vehiculos[i].ser_unidades != "") {

								var array_iva_calculado = calcular_iva(vehiculos[i].ser_unidades);
								
								fila = [{
										text: "Vehiculos ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Serv.Unidades ",
										fontSize: 9,
										bold: true
									},

									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + vehiculos[i].ser_unidades,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(vehiculos[i].combustible));
							}
						}
					}

					if (typeof (data.response_data.viaticos) != "undefined") {
						var viaticos = data.response_data.viaticos;
						for (var i = 0; i < viaticos.length; i++) {

							if (viaticos[i].estacionamientoViaticos != "") {
								var array_iva_calculado = calcular_iva(viaticos[i].estacionamientoViaticos);
								
								fila = [{
										text: "Viaticos ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Estacionamiento",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + viaticos[i].estacionamientoViaticos,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(viaticos[i].estacionamientoViaticos));

							}

							if (viaticos[i].alimentos != "") {

								var array_iva_calculado = calcular_iva(viaticos[i].alimentos);
								
								fila = [{
										text: "Viaticos",
										fontSize: 9,
										bold: true
									},
									{
										text: "Alimentos",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + viaticos[i].alimentos,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(viaticos[i].alimentos));
							}
							
							if (viaticos[i].hospedaje != "") {
								var array_iva_calculado = calcular_iva(viaticos[i].hospedaje);
								
								fila = [{
										text: "Viaticos ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Hospedaje",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + viaticos[i].hospedaje,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(viaticos[i].hospedaje));
							}

							if (viaticos[i].taxis != "") {
								var array_iva_calculado = calcular_iva(viaticos[i].taxis);
								
								fila = [{
										text: "Viaticos ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Taxis",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + viaticos[i].taxis,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(viaticos[i].taxis));

							}

							if (viaticos[i].pasajes != "") {
								var array_iva_calculado = calcular_iva(viaticos[i].pasajes);
								
								fila = [{
										text: "Viaticos ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Pasajes",
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " +array_iva_calculado[1],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + viaticos[i].pasajes,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(viaticos[i].pasajes));
							}
						}
					}

					if (typeof (data.response_data.gastos_udn) != "undefined") {
						var gastos_udn = data.response_data.gastos_udn;
						for (var i = 0; i < gastos_udn.length; i++) {
							if (gastos_udn[i].papeleria != "") {
								var array_iva_calculado = calcular_iva(gastos_udn[i].papeleria);
							
								fila = [{
										text: "Gastos_udn",
										fontSize: 9,
										bold: true
									},
									{
										text: "Papeleria",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + gastos_udn[i].papeleria,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(gastos_udn[i].papeleria));
							}
							if (gastos_udn[i].impuestos != "") {
								var array_iva_calculado = calcular_iva(gastos_udn[i].impuestos);
								
								fila = [{
										text: "Gastos_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Impuestos",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + gastos_udn[i].impuestos,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(gastos_udn[i].impuestos));
							}
							if (gastos_udn[i].sistemasgastos != "") {
								var array_iva_calculado = calcular_iva(gastos_udn[i].sistemasgastos);
								
								fila = [{
										text: "Gastos_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Sistemas",
										fontSize: 9,
										bold: true
									},

									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + gastos_udn[i].sistemasgastos,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(gastos_udn[i].sistemasgastos));
							}
							if (gastos_udn[i].cajachica != "") {
								var array_iva_calculado = calcular_iva(gastos_udn[i].cajachica);
								
								fila = [{
										text: "Gastos_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Caja chica",
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + gastos_udn[i].cajachica,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(gastos_udn[i].cajachica));
							}
							if (gastos_udn[i].arrenamunidades != "") {
								var array_iva_calculado = calcular_iva(gastos_udn[i].arrenamunidades);
								
								fila = [{
										text: "Gastos_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Arren. Unidades",
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + gastos_udn[i].arrenamunidades,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(gastos_udn[i].arrenamunidades));
							}
							if (gastos_udn[i].servcomputo != "") {
								var array_iva_calculado = calcular_iva(gastos_udn[i].servcomputo);
								
								fila = [{
										text: "Gastos_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Serv. Computo",
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + gastos_udn[i].servcomputo,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(gastos_udn[i].servcomputo));
							}
						}
					}

					if (typeof (data.response_data.fletes) != "undefined") {
						var fletes = data.response_data.fletes;
						for (var i = 0; i < fletes.length; i++) {
							if (fletes[i].maniobras != "") {
								var array_iva_calculado = calcular_iva(fletes[i].maniobras);
								
								fila = [{
										text: "fletes",
										fontSize: 9,
										bold: true
									},
									{
										text: "Maniobras",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + fletes[i].maniobras,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(fletes[i].maniobras));
							}
							if (fletes[i].infraccionesfletes != "") {
								var array_iva_calculado = calcular_iva(fletes[i].infraccionesfletes);
								
								fila = [{
										text: "fletes ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Infracciones",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + fletes[i].infraccionesfletes,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(fletes[i].infraccionesfletes));
							}
							if (fletes[i].fletes != "") {
								var array_iva_calculado = calcular_iva(fletes[i].fletes);
								
								fila = [{
										text: "fletes ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Fletes",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + fletes[i].fletes,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(fletes[i].fletes));
							}
							if (fletes[i].paqueteria != "") {
								var array_iva_calculado = calcular_iva(fletes[i].paqueteria);
								
								fila = [{
										text: "fletes ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Paqueteria",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + fletes[i].paqueteria,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(fletes[i].paqueteria));
							}
						}
					}

					if (typeof (data.response_data.servicios_udn) != "undefined") {
						var servicios_udn = data.response_data.servicios_udn;
						for (var i = 0; i < servicios_udn.length; i++) {
							if (servicios_udn[i].gas != "") {
								var array_iva_calculado = calcular_iva(servicios_udn[i].gas);
								
								fila = [{
										text: "servicios_udn",
										fontSize: 9,
										bold: true
									},
									{
										text: "Gas",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + servicios_udn[i].gas,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(servicios_udn[i].gas));
							}
							if (servicios_udn[i].arrendamientoinmuebles != "") {
								var array_iva_calculado = calcular_iva(servicios_udn[i].arrendamientoinmuebles);
								console.log(array_iva_calculado);
								fila = [{
										text: "servicios_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Arren.Inmuebles",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + servicios_udn[i].arrendamientoinmuebles,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(servicios_udn[i].arrendamientoinmuebles));
							}
							if (servicios_udn[i].ServiciosAGL != "") {
								var array_iva_calculado = calcular_iva(servicios_udn[i].ServiciosAGL);
								console.log(array_iva_calculado);
								fila = [{
										text: "servicios_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Servicios.AGL",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + servicios_udn[i].ServiciosAGL,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(servicios_udn[i].ServiciosAGL));
							}
							if (servicios_udn[i].Internet != "") {
								var array_iva_calculado = calcular_iva(servicios_udn[i].Internet);
								console.log(array_iva_calculado);
								fila = [{
										text: "servicios_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Internet",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + servicios_udn[i].Internet,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(servicios_udn[i].Internet));
							}
							if (servicios_udn[i].monitoreo != "") {
								var array_iva_calculado = calcular_iva(servicios_udn[i].monitoreo);
								console.log(array_iva_calculado);
								fila = [{
										text: "servicios_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Monitoreo",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + servicios_udn[i].monitoreo,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(servicios_udn[i].monitoreo));
							}
							if (servicios_udn[i].fianzas != "") {
								var array_iva_calculado = calcular_iva(servicios_udn[i].fianzas);
								console.log(array_iva_calculado);
								fila = [{
										text: "servicios_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Fianzas",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + servicios_udn[i].fianzas,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(servicios_udn[i].fianzas));
							}
							if (servicios_udn[i].facturacion != "") {
								var array_iva_calculado = calcular_iva(servicios_udn[i].facturacion);
								console.log(array_iva_calculado);
								fila = [{
										text: "servicios_udn ",
										fontSize: 9,
										bold: true
									},
									{
										text: "Facturacion",
										fontSize: 9,
										bold: true
									},
									
									{
										text: "$ " + array_iva_calculado[0],
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + array_iva_calculado[1] ,
										fontSize: 9,
										bold: true
									},
									{
										text: "$ " + servicios_udn[i].facturacion,
										fontSize: 9,
										bold: true
									}
								];
								array_content_pdf.push(fila);
								array_total.push(parseInt(servicios_udn[i].facturacion));
							}
						}
					}

					generar_pdf_carga(array_content_pdf);

				} else if (data.response_code == 500) {
					infoAlert("Verificar", data.response_text);
				}
			},
			error: function (xhr) {
				infoAlert("Verifica", data.response_text);
			}
		});
	}

	function cargar_gatos(fecha) {
		$.ajax({
			url: "CaratulaGastos/cargar_gastos_empleado/" + fecha,
			type: "get",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#empresa').empty();
					var empresa = data.response_data;
					var select_2 = $('#empresa');
					select_2.append('<option value="">Seleccione una opción</option>');
					for (var i = 0; i < empresa.length; i++) {
						select_2.append('<option value="' + empresa[i].id_general + '">' +
							empresa[i].Empresa + '</option>');
					}
				} else if (data.response_code == 500) {
					infoAlert("Verificar", data.response_text);
				}
			},
			error: function (xhr) {
				infoAlert("Verifica", data.response_text);
			}
		});

	}
	
	function generar_pdf_carga(detalle) {
		var solicitante = $('#solicitante').val();
		var Plaza = $('#Plaza').val();
		var Motivo = $('#Motivo').val();
		var id_general = $('#empresa').val();
		var dia_gasto = $('#dia_gasto').val();
		var fecha_comprobacion = $('#fecha_comprobacion').val();
		var empresa = $('#empresa option:selected').text();
		let total = 0;
		for (i = 0; i < array_total.length; i++) {
			total = array_total[i] + total;	
		}
		console.log(detalle);
	
		var docDefinition = {
			pageSize: 'LETTER',
			pageMargins: [40, 60, 40, 0],
			content: [

				{
					image: image_base_64_logo, 
					width: 150, 
					height: 90, 
					margin: 80,
					absolutePosition: { x: 450, y: 10 },
				},
				{
					absolutePosition: { x: 41, y: 44 },
					margin: [0, 30],
					text: 'No.' + id_general,
					style: 'header',
					fontSize: 22,
					bold: true,
				},
				{
					absolutePosition: { x: 52, y: 111 },
					margin: [0, 30],
					alignment: 'center',
					text: 'CARATULA DE COMPROBACIÓN DE GASTOS',
					style: 'header',
					fontSize: 18,
					bold: true,
				},
				{
					style: 'tableExample',
					absolutePosition: { x: 41, y: 170},
					margin: [0, 0],
					table: {
						widths: ['66%'],
						headerRows: 1,
					 body: [
							[{ text: 'EMPRESA:  ' + empresa, fontSize: 12, bold: true }],
							[{ text: 'SOLICITANTE:  ' + solicitante, fontSize: 12, bold: true }],
							[{ text: 'PLAZA:  ' + Plaza, fontSize: 12, bold: true }],
							[{ text: 'MOTIVO DEL GASTO:  ' + Motivo, fontSize: 12, bold: true }],
							[{ text: 'FECHA DIA DEL GASTO:  ' + dia_gasto, fontSize: 12, bold: true }],
							[{ text: 'FECHA COMPROBACION GASTO:  ' + fecha_comprobacion, fontSize: 12, bold: true }],
		                ]
					},

					layout: {
						fillColor: function (rowIndex, node, columnIndex) {
							return (rowIndex === 0) ? '#FFFFFF' : null;
						},
						hLineWidth: function (i, node) {
							return (i === 0 || i === node.table.body.length) ? 1 : 1;
						},
						vLineWidth: function (i, node) {
							return (i === 0 || i === node.table.widths.length) ? 1 : 1;
						},
						hLineColor: function (i, node) {
							return (i === 0 || i === node.table.body.length) ? '#dee2e6' : '#dee2e6';
						},
						vLineColor: function (i, node) {
							return (i === 0 || i === node.table.widths.length) ? '#dee2e6' : '#dee2e6';
						},
					},
				},
				{
					style: 'tableExample',
					margin: [0,15],
					table: { 
						widths: ['20%', '20%', '20%','20%','20%'],
						headerRows: 1,
						body: detalle
					},
					layout: {
						fillColor: function (rowIndex, node, columnIndex) {
							return (rowIndex === 0) ? '#6F9FD0' : null;
						},
						hLineWidth: function (i, node) {
							return (i === 0 || i === node.table.body.length) ? 1 : 1;
						},
						vLineWidth: function (i, node) {
							return (i === 0 || i === node.table.widths.length) ? 1 : 1;
						},
						hLineColor: function (i, node) {
							return (i === 0 || i === node.table.body.length) ? '#dee2e6' : '#dee2e6';
						},
						vLineColor: function (i, node) {
							return (i === 0 || i === node.table.widths.length) ? '#dee2e6' : '#dee2e6';
						},
					},
				},


				{
					style: 'tableExample',
					margin: [315, 0, 0, 0],
					table: {
						alignment: 'right',
						widths: ['97%'],
						headerRows: 1,
					 body: [
							[{ text: 'TOTAL GASTADO:  $ ' + total, fontSize: 10, bold: true }],
							[{ text: 'TOTAL AUTORIZADO:  $ ', fontSize: 10, bold: true }],
							[{ text: 'Dif. A favor L23R:  ', fontSize: 10, bold: true }],
		                ]
					},
					layout: {
						fillColor: function (rowIndex, node, columnIndex) {
							return (rowIndex === 0) ? '#FFFFFF' : null;
						},
						hLineWidth: function (i, node) {
							return (i === 0 || i === node.table.body.length) ? 1 : 1;
						},
						vLineWidth: function (i, node) {
							return (i === 0 || i === node.table.widths.length) ? 1 : 1;
						},
						hLineColor: function (i, node) {
							return (i === 0 || i === node.table.body.length) ? '#dee2e6' : '#dee2e6';
						},
						vLineColor: function (i, node) {
							return (i === 0 || i === node.table.widths.length) ? '#dee2e6' : '#dee2e6';
						},
					},
				},
				{
					absolutePosition: { x: 40, y: 740},
					text: '_________________________________',
					style: 'header',
					fontSize: 12,
					bold: true,
					margin: [0, 60],
				},
				{
					absolutePosition: { x: 67, y: 760},
					text: 'Entrega de comprobacion:',
					style: 'header',
					fontSize: 12,
					bold: true,
					margin: [0, 60],
				},

				{
					absolutePosition: { x: 390, y: 740},
					text: '_________________________________',
					style: 'header',
					fontSize: 12,
					bold: true,
					margin: [0, 60],
				},
				{
					absolutePosition: { x: 414, y: 760},
					text: 'Recibe comprobacion:',
					style: 'header',
					fontSize: 12,
					bold: true,
					margin: [0, 60],
				},
			],
		};
		pdfMake.createPdf(docDefinition).open();
		pdfMake.createPdf(docDefinition).download();
		array_total=[]; 
		total=0;
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

	function calcular_iva(total){
		var array = [];
		var iva = 0.16;
		var subtotal = 0;
		var iva_calculado = 0;
		iva_calculado = total * iva;
		subtotal = total - iva_calculado
		return [parseFloat(iva_calculado).toFixed( 2 ),
			 parseFloat(subtotal).toFixed( 2 )]
	}
})
