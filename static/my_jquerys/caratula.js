$(document).ready(function () {
	$('#dataTable_detalle_gastos').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
	});

	// var form_validate_agregar = $('#formulario_caratula').validate({
	// 	rules: {},
	// 	messages: {},
	// 	errorElement: 'span',
	// 	errorPlacement: function (error, element) {
	// 		error.addClass('invalid-feedback');
	// 		element.closest('.form-group').append(error);
	// 	},
	// 	highlight: function (element, errorClass, validClass) {
	// 		$(element).addClass("is-invalid").removeClass("is-valid");
	// 	},
	// 	unhighlight: function (element, errorClass, validClass) {
	// 		$(element).addClass("is-valid").removeClass("is-invalid");
	// 	},
	// 	submitHandler: function () {
	//         fecha = $('#fecha_comprobacion').val();
	// 		cargar_gatos(fecha)
	// 	}
	// });


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
								text: 'Total (i.v.a incluido)',
								fontSize: 13,
								bold: true,
								alignment: 'center'
							}
						]
					];
					if(typeof(data.response_data.vehiculos) != "undefined"){
						var vehiculos = data.response_data.vehiculos;
						for(var i = 0 ; i < vehiculos.length ; i++){
							if(vehiculos[i].casetas != ""){
								fila = [
									{ text: "Vehiculos",fontSize: 9, bold: true },
									{ text: "Casetas", 	fontSize: 9, bold: true },
									{ text: "$ "+vehiculos[i].casetas, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(vehiculos[i].combustible != ""){
								fila = [
									{ text: "Vehiculos ",fontSize: 9, bold: true },
									{ text: "Combustible ", 	fontSize: 9, bold: true },
									{ text: "$ "+vehiculos[i].combustible, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
						}
					}

					if(typeof(data.response_data.viaticos) != "undefined"){
						var viaticos = data.response_data.viaticos;
						for(var i = 0 ; i < viaticos.length ; i++){
							if(viaticos[i].alimentos != ""){
								fila = [
									{ text: "Viaticos",fontSize: 9, bold: true },
									{ text: "Alimentos", 	fontSize: 9, bold: true },
									{ text: "$ "+viaticos[i].alimentos, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(viaticos[i].estacionamientoViaticos != ""){
								fila = [
									{ text: "Viaticos ",fontSize: 9, bold: true },
									{ text: "Estacionamiento", fontSize: 9, bold: true },
									{ text: "$ "+viaticos[i].estacionamientoViaticos, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(viaticos[i].hospedaje != ""){
								fila = [
									{ text: "Viaticos ",fontSize: 9, bold: true },
									{ text: "Estacionamiento", fontSize: 9, bold: true },
									{ text: "$ "+viaticos[i].hospedaje, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(viaticos[i].pasajes != ""){
								fila = [
									{ text: "Viaticos ",fontSize: 9, bold: true },
									{ text: "Estacionamiento", fontSize: 9, bold: true },
									{ text: "$ "+viaticos[i].pasajes, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
						}
					}

					if(typeof(data.response_data.gastos_udn) != "undefined"){
						var gastos_udn = data.response_data.gastos_udn;
						for(var i = 0 ; i < gastos_udn.length ; i++){
							if(gastos_udn[i].papeleria != ""){
								fila = [
									{ text: "Gastos_udn",fontSize: 9, bold: true },
									{ text: "Papeleria", fontSize: 9, bold: true },
									{ text: "$ "+gastos_udn[i].papeleria, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(gastos_udn[i].impuestos != ""){
								fila = [
									{ text: "Gastos_udn ",fontSize: 9, bold: true },
									{ text: "Impuestos", fontSize: 9, bold: true },
									{ text: "$ "+gastos_udn[i].impuestos, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(gastos_udn[i].sistemas != ""){
								fila = [
									{ text: "Gastos_udn ",fontSize: 9, bold: true },
									{ text: "Sistemas", fontSize: 9, bold: true },
									{ text: "$ "+gastos_udn[i].sistemas, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(gastos_udn[i].cajachica != ""){
								fila = [
									{ text: "Gastos_udn ",fontSize: 9, bold: true },
									{ text: "Caja chica", fontSize: 9, bold: true },
									{ text: "$ "+gastos_udn[i].cajachica, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(gastos_udn[i].arrenamunidades != ""){
								fila = [
									{ text: "Gastos_udn ",fontSize: 9, bold: true },
									{ text: "Arrendamiento unds.", fontSize: 9, bold: true },
									{ text: "$ "+gastos_udn[i].arrenamunidades, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(gastos_udn[i].servcomputo != ""){
								fila = [
									{ text: "Gastos_udn ",fontSize: 9, bold: true },
									{ text: "Serv. Computo", fontSize: 9, bold: true },
									{ text: "$ "+gastos_udn[i].servcomputo, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
						}
					}

					if(typeof(data.response_data.fletes) != "undefined"){
						var fletes = data.response_data.fletes;
						for(var i = 0 ; i < fletes.length ; i++){
							if(fletes[i].maniobras != ""){
								fila = [
									{ text: "fletes",fontSize: 9, bold: true },
									{ text: "Maniobras", 	fontSize: 9, bold: true },
									{ text: "$ "+fletes[i].maniobras, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(fletes[i].infraccionesfletes != ""){
								fila = [
									{ text: "fletes ",fontSize: 9, bold: true },
									{ text: "infraccionesfletes", fontSize: 9, bold: true },
									{ text: "$ "+fletes[i].infraccionesfletes, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(fletes[i].fletes != ""){
								fila = [
									{ text: "fletes ",fontSize: 9, bold: true },
									{ text: "fletes", fontSize: 9, bold: true },
									{ text: "$ "+fletes[i].fletes, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(fletes[i].paqueteria != ""){
								fila = [
									{ text: "fletes ",fontSize: 9, bold: true },
									{ text: "paqueteria", fontSize: 9, bold: true },
									{ text: "$ "+fletes[i].paqueteria, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
						}
					}

					if(typeof(data.response_data.servicios_udn) != "undefined"){
						var servicios_udn = data.response_data.servicios_udn;
						for(var i = 0 ; i < servicios_udn.length ; i++){
							if(servicios_udn[i].gas != ""){
								fila = [
									{ text: "servicios_udn",fontSize: 9, bold: true },
									{ text: "Gas", fontSize: 9, bold: true },
									{ text: "$ "+servicios_udn[i].gas, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(servicios_udn[i].arrendamientoinmuebles != ""){
								fila = [
									{ text: "servicios_udn ",fontSize: 9, bold: true },
									{ text: "arrendamientoinmuebles", fontSize: 9, bold: true },
									{ text: "$ "+servicios_udn[i].arrendamientoinmuebles, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(servicios_udn[i].ServiciosAGL != ""){
								fila = [
									{ text: "servicios_udn ",fontSize: 9, bold: true },
									{ text: "ServiciosAGL", fontSize: 9, bold: true },
									{ text: "$ "+servicios_udn[i].ServiciosAGL, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(servicios_udn[i].Internet != ""){
								fila = [
									{ text: "servicios_udn ",fontSize: 9, bold: true },
									{ text: "Internet", fontSize: 9, bold: true },
									{ text: "$ "+servicios_udn[i].Internet, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}	
							if(servicios_udn[i].monitoreo != ""){
								fila = [
									{ text: "servicios_udn ",fontSize: 9, bold: true },
									{ text: "monitoreo", fontSize: 9, bold: true },
									{ text: "$ "+servicios_udn[i].monitoreo, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(servicios_udn[i].fianzas != ""){
								fila = [
									{ text: "servicios_udn ",fontSize: 9, bold: true },
									{ text: "fianzas", fontSize: 9, bold: true },
									{ text: "$ "+servicios_udn[i].fianzas, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
							}
							if(servicios_udn[i].facturacion != ""){
								fila = [
									{ text: "servicios_udn ",fontSize: 9, bold: true },
									{ text: "facturacion", fontSize: 9, bold: true },
									{ text: "$ "+servicios_udn[i].facturacion, fontSize: 9, bold: true }
								];
								array_content_pdf.push(fila);
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
		var docDefinition = {
			pageSize: 'LETTER',
			pageMargins: [40, 60, 40, 60],
			content: [
				{
					
					alignment: 'center',
					text: 'CARATULA DE COMPROBACIÓN DE GASTOS',
					style: 'header',
					fontSize: 18,
					bold: true,
					margin: [0, 50],
				},
				{
					style: 'tableExample',
					table: { 
						widths: ['33%', '33%', '33%'],
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
					alignment: 'right',
					text: 'Recibe comprobacion: __________________________________________',
					style: 'header',
					fontSize: 12,
					bold: true,
					margin: [0, 60],
				},
				{
					alignment: 'left',
					text: 'Entrega de comprbacion: __________________________________________',
					style: 'header',
					fontSize: 12,
					bold: true,
					margin: [0, 60],
				},
			],
		};
		pdfMake.createPdf(docDefinition).open();
		pdfMake.createPdf(docDefinition).download();
	}


})
