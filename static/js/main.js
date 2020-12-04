$(function () {
	var steps = $("#form-total").steps({
		headerTag: "h2",
		bodyTag: "section",
		transitionEffect: "fade",
		enableAllSteps: true,
		autoFocus: true,
		transitionEffectSpeed: 500,
		titleTemplate: '<div class="title">#title#</div>',
		labels: {
			finish: 'Hecho',
			current: ''
		},
		onStepChanging: function (event, currentIndex, newIndex) {
			return true;
		},
		onFinished: function (event, currentIndex, newIndex) {
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
					//tablas padre
					var array_general = localStorage.getItem('array_general');

					//tablas de vehiculas 
					var array_vehiculos = localStorage.getItem('array_vehiculos');
					var array_combustible = localStorage.getItem('array_combustible');
					var array_casetas = localStorage.getItem('array_casetas');
					var array_serviunidades = localStorage.getItem('array_serviunidades');

					//tabla de viaticos
					var array_viaticos = localStorage.getItem('array_viaticos');
					var array_estacionamientoViaticos = localStorage.getItem('array_estacionamientoViaticos');
					var array_alimentos = localStorage.getItem('array_alimentos');
					var array_hospedaje = localStorage.getItem('array_hospedaje');
					var array_pasajes = localStorage.getItem('array_pasajes');

					//tabla de gastos UDN
					var array_gastosUDN = localStorage.getItem('array_gastosUDN');
					var array_papeleria = localStorage.getItem('array_papeleria');
					var array_impuestos = localStorage.getItem('array_impuestos');
					var array_sistemas = localStorage.getItem('array_sistemas');
					var array_caja = localStorage.getItem('array_caja');
					var array_arreunidades = localStorage.getItem('array_arreunidades');
					var array_computo = localStorage.getItem('array_computo');

					//tabla de fletes 
					var array_Gastosfletes = localStorage.getItem('array_Gastosfletes');
					var array_fletes = localStorage.getItem('array_fletes');
					var array_paqueteria = localStorage.getItem('array_paqueteria');

					//tabla de Servios UDN
					var array_serviciosUDN = localStorage.getItem('array_serviciosUDN');
					var array_arrendamientoinmuebles = localStorage.getItem('array_arrendamientoinmuebles');
					var array_ServiciosAGL = localStorage.getItem('array_ServiciosAGL');
					var array_Internet = localStorage.getItem('array_Internet');
					var array_monitoreo = localStorage.getItem('array_monitoreo');
					var array_fianzas = localStorage.getItem('array_fianzas');
					var array_facturacion = localStorage.getItem('array_facturacion');

					var array_almacen = localStorage.getItem('array_almacen');
					
					$.ajax({
							url: "Principal/guardar_dato",
							type: "POST",
							dataType: "json",
							data: {
								array_general: array_general,
								array_vehiculos: array_vehiculos,

								array_combustible:array_combustible,
								array_casetas:array_casetas,
								array_serviunidades:array_serviunidades,

								array_viaticos: array_viaticos,
								array_estacionamientoViaticos:array_estacionamientoViaticos,
								array_alimentos:array_alimentos,
								array_hospedaje:array_hospedaje,
								array_pasajes:array_pasajes,

								array_papeleria:array_papeleria,
								array_impuestos:array_impuestos,
								array_sistemas:array_sistemas,
								array_caja:array_caja,
								array_arreunidades:array_arreunidades, 
								array_computo:array_computo,

								array_fletes:array_fletes,
								array_paqueteria:array_paqueteria,

								array_arrendamientoinmuebles:array_arrendamientoinmuebles,
								array_ServiciosAGL:array_ServiciosAGL,
								array_Internet:array_Internet,
								array_monitoreo:array_monitoreo,
								array_fianzas:array_fianzas,
								array_facturacion:array_facturacion,					

								
								array_gastosUDN: array_gastosUDN,
								array_Gastosfletes:array_Gastosfletes,
								array_serviciosUDN:array_serviciosUDN,
								array_almacen:array_almacen
							}
							
							// swal.closer //
						}),
						localStorage.clear();
				}
				loader()
				setTimeout(function () {
					window.location.href = "Principal";
				}, 2000);
			});
		}
	})
	
	function loader() {
		Swal.fire({
			title: '<h1 class="font-weight-bold text-light">Espere un momento...</h1>',
			allowOutsideClick: false,
            showConfirmButton: false,
			allowEscapeKey: false,
			timer: 1500,
            width: 600,
            padding: '3em',
			background: 'rgb(0 0 0 / 0%)',
			backdrop: 'rgba(48, 81, 143, 0.69) left top no-repeat',
			html: '<div class="sk-cube-grid mt-2">' +
				'<div class="sk-cube sk-cube1"></div>' +
				'<div class="sk-cube sk-cube2"></div>' +
				'<div class="sk-cube sk-cube3"></div>' +
				'<div class="sk-cube sk-cube4"></div>' +
				'<div class="sk-cube sk-cube5"></div>' +
				'<div class="sk-cube sk-cube6"></div>' +
				'<div class="sk-cube sk-cube7"></div>' +
				'<div class="sk-cube sk-cube8"></div>' +
				'<div class="sk-cube sk-cube9"></div>' +
				'</div>'
		})
		
	}
	
	

	$("a[href$='next']").parent().addClass('d-none');
	$("a[href$='previous']").parent().addClass('d-none');
	var parent_ul = $("a[href$='finish']").parent();
	parent_ul.parent().addClass('justify-content-sm-end');
});
