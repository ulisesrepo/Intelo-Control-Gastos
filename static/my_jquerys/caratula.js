$(document).ready(function () {
	carga_CaratulaGastos()
	$('#data_table_caratula').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
    });


	
    function carga_CaratulaGastos() {
		$.ajax({
			url: "CaratulaGastos/mostrar_caratula",
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data.response_code == 200) {
					$('#data_table_caratula').DataTable({
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
								'data': ""
							},
							{
								'data': ""
							},
							{
								'data': ""
							},
							{
								'data': ""
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
