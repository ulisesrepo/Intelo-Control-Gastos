$(document).ready(function () {
    $('#dataTable_detalle_gastos').DataTable({
		"searching": false, // Search Box will Be Disabled
		"ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
		"info": false, // Will show "1 to n of n entries" Text at bottom
		"lengthChange": false, // Will Disabled Record number per page
		"bPaginate": false,
    });
    
    var form_validate_agregar = $('#formulario_caratula').validate({
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
            fecha = $('#fecha_comprobacion').val();
			cargar_gatos(fecha)
		}
    });
    
    function cargar_gatos(fecha) {
        $.ajax({
            url: "CaratulaGastos/cargar_gastos_empleado/" + fecha,
            type: "get",
            dataType: "json",
            success: function (data) {
                if (data.response_code == 200) {
                 $('#empresas').val(data.response_data.Empresa)
                } else if (data.response_code == 500) {
                    infoAlert("Verificar", data.response_text);
                }
            },
            error: function (xhr) {
                infoAlert("Verifica", data.response_text);
            }
        });
    }

	function generar_pdf_carga(data_paquetes, data_transporte) {
        var empleado = $('#operadores option:selected').text();
        var texto_separado = empleado.split(' | ');
        var empleado_split = texto_separado[1].split(': ')
        var nombre_empleado = empleado_split[1];
        var hoy = new Date();
        var fecha_convertida = moment(hoy).format('YYYY-MM-DD h:mm:ss');
        var array_content_pdf = [[
            { text: 'Folio', fontSize: 9, bold: true, alignment: 'center' },
            { text: 'Cantidad', fontSize: 9, bold: true, alignment: 'center' },
            { text: 'Destino', fontSize: 9, bold: true, alignment: 'center' }
        ]];
        var fila = [];
        var no_paquete = "";
        var destino_paquete = "";
        var cantida_paquetes = data_paquetes.length;
        for (i = 0; i < data_paquetes.length; i++) {
            no_paquete = data_paquetes[i].no_paquete;
            destino_paquete = "Calle " + data_paquetes[i].calle_destino
                + " No. exterior " + data_paquetes[i].no_exterior_destino
                + " No. interio " + data_paquetes[i].no_interior_destino
                + ", Colonia " + data_paquetes[i].colonia_destino
                + ", CP. " + data_paquetes[i].codigo_postal_destino
                + " " + data_paquetes[i].municipio_destino
                + ", " + data_paquetes[i].estado_destino;
            fila = [
                { text: no_paquete, fontSize: 9, bold: true },
                { text: 1, fontSize: 9, bold: true },
                { text: destino_paquete, fontSize: 9, bold: true },
            ];
            array_content_pdf.push(fila);
        }

        var docDefinition = {
            pageSize: 'LETTER',
            pageMargins: [40, 60, 40, 60],
            header: function (currentPage, pageCount, pageSize) {
                return [
                    {
                        text: 'InteloPack, Sistema de gestión de Paqueteria',
                        absolutePosition: { x: 95, y: 28 },
                        fontSize: 18,
                        margin: 70
                    },
                    {
                        image: image_base_64_logo, 
                        width: 100, 
                        height: 75, 
                        margin: 70,
                        absolutePosition: { x: 480, y: 5 },
                    },
                    
                ]
            },
            
            content: [
                {
                    alignment: 'center',
                    text: 'Enbarque de Salida',
                    style: 'header',
                    fontSize: 18,
                    bold: true,
                    margin: [0, 15],
                },
                {
                    margin: [0, 0, 0, 10],
                    table: {
                        widths: ['100%'],
                        body: [
                            [{ text: 'Nombre del operador: ' + nombre_empleado, fontSize: 9, bold: true }],
                            [{ text: 'Fecha de enbarque: ' + fecha_convertida, fontSize: 9, bold: true }],
                            [{ text: 'Cantidad folios: ' + cantida_paquetes, fontSize: 9, bold: true }],
                        ]
                    },
                    layout: {
                        fillColor: function (rowIndex, node, columnIndex) {
                            return (rowIndex % 2 === 0) ? '#ebebeb' : '#f5f5f5';
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
                    alignment: 'center',
                    text: 'Detalle de enbarque',
                    style: 'header',
                    fontSize: 18,
                    bold: true,
                    margin: [0, 10],
                },
                {
                    style: 'tableExample',
                    table: {
                        widths: ['20%', '20%', '60%'],
                        headerRows: 1,
                        body: array_content_pdf
                    },
                    layout: {
                        fillColor: function (rowIndex, node, columnIndex) {
                            return (rowIndex === 0) ? '#e9ecef' : null;
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
                    alignment: 'center',
                    text: 'Datos de unidad',
                    style: 'header',
                    fontSize: 18,
                    bold: true,
                    margin: [0, 10],
                },
                {
                    margin: [0, 0, 0, 10],
                    table: {
                        widths: ['100%'],
                        body: [
                            [{
                                text: 'Matricula: ' + data_transporte.matricula_transporte,
                                fontSize: 9, bold: true
                            }],
                            [{
                                text: 'Número economico: ' + data_transporte.no_economico_transporte,
                                fontSize: 9, bold: true
                            }],
                            [{
                                text: 'Tipo unidad: ' + data_transporte.descripcion_tipo_transporte,
                                fontSize: 9, bold: true
                            }],
                            [{
                                text: 'Marca: ' + data_transporte.marca_transporte,
                                fontSize: 9, bold: true
                            }],
                        ],
                    },
                    layout: {
                        fillColor: function (rowIndex, node, columnIndex) {
                            return (rowIndex % 2 === 0) ? '#ebebeb' : '#f5f5f5';
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
                    text: 'Firma: __________________________________________',
                    style: 'header',
                    fontSize: 12,
                    bold: true,
                    margin: [0, 60],
                },
            ],
            footer: function (page, currentPage, pageCount) {
                return {
                    style: 'footer',
                    table: {
                        widths: ['*', 100],
                        body: [[{ text: 'Fecha de creacion: ', alignment: 'center' },]]
                    },
                    layout: 'noBorders'
                };
            },
        };
        pdfMake.createPdf(docDefinition).open();
        pdfMake.createPdf(docDefinition).dowmload();
    }

	
})
