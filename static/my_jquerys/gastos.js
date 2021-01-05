$(document).ready(function () {

	cargaTabla_Analisis()

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
							'copyHtml5',
							'excelHtml5',
							'csvHtml5'
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
						"columns": [{
								"data": null,
								'render': function (data, type, row) {
									return data.id_general;
								}
							},
							{
								'data': null,
								'render': function (data, type, row) {
									return data.nombre + ' ' + data.apellidos;
								}
							},
							{
								'data': "Empresa"
							},
							{
								'data': "Dia_gasto"
							},
							{
								'data': "Mes"
							},
							{
								'data': "Plaza"
							},
							{
								'data': "Cliente"
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
								'data': "km_total"
							},
							{
								'data': "lts_consumidos"
							},
							{
								'data': "rendimiento"
							},
							{
								'data': "combustible"
							},
							{
								'data': "casetas"
							},
							{
								'data': "ser_unidades"
							},
							{
								'data': "noDeduVehi"
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
								'data': "taxis"
							},
							{
								'data': "pasajes"
							},
							{
								'data': "noDeduVia"
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
								'data': "infracciones"
							},
							{
								'data': "plomeria"
							},
							{
								'data': "ferreteria"
							},
							{
								'data': "impuestos"
							},
							{
								'data': "sistemas"
							},
							{
								'data': "cajachica"
							},
							{
								'data': "asesoria"
							},
							{
								'data': "arrenamunidades"
							},
							{
								'data': "servcomputo"
							},
							{
								'data': "noDeduUDN"
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
								'data': "paqueteria"
							},
							{
								'data': 'noDeduFletes'
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
							},
							{
								'data': "seguros"
							},
							{
								'data': "seguridad"
							},
							{
								'data': "monitoreo"
							},
							{
								'data': "plagas"
							},
							{
								'data': "basura"
							},
							{
								'data': "higiene"
							},
							{
								'data': "publicidad"
							},
							{
								'data': "fianzas"
							},
							{
								'data': "almacenaje"
							},
							{
								'data': "facturacion"
							},
							{
								'data': "gastolegal"
							},
							{
								'data': "noDeduServ"
							},
							{
								'data': "merma"
							},
							{
								'data': "sistemas"
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

});
