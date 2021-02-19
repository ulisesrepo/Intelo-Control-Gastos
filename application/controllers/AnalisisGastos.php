<?php
class AnalisisGastos extends CI_Controller { 

    public function __construct() {
        parent::__construct();
        $this->load->model('model_analisis_gastos');
        $this->load->model('model_general');
        $this->load->model('model_gastos_vehiculos');
        $this->load->model('model_gastos_viaticos');
        $this->load->model('model_gastos_UDN');
        $this->load->model('model_gastos_fletes');
        $this->load->model('model_gastos_servicios');
        $this->load->model('model_gastos_almacen');
        $this->load->model('model_gastosFacturables');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, TRUE);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, TRUE);
        $data['work_area'] = $this->load->view('work_area/analisis_gastos_view', $data, TRUE);
        $data['titulo']    = "Gastos | Intelo";
        $data['my_jquery'] = "gastos.js";
        $this->load->view("main_view", $data, FALSE);
    }

    public function mostrar_analisis_gastos() {
        $datos_analisis = $this->model_analisis_gastos->select_analisis();
        if ($datos_analisis != null && $datos_analisis != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_analisis;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

    public function eliminar_registro() {
        $id_general = $this->input->post('id_general');
        if ($this->model_analisis_gastos->delete_registro($id_general)) {
            $json['response_code'] = 200;
            $json['response_text'] = "Se elimino el Registro con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se elimino el Registro";
        }
        echo json_encode($json);
    }

    public function activar_registro() {
        $id_general = $this->input->post('id_general');

        if ($this->model_analisis_gastos->activate_registro($id_general)) {
            $json['response_code'] = 200;
            $json['response_text'] = "Se activo el Registro con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se activo el Registro";
        }
        echo json_encode($json);
    }
    // +*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*
    public function actualizar_registro_vehiculos() {
        $combustible       = $this->input->post('inputmodalcombustible');
        $casetas           = $this->input->post('inputmodalcasetas');
        $id_general        = $this->input->post('id_general');
        $serviunidades     = $this->input->post('inputmodalserviunidades');
        $noDeduVehi        = $this->input->post('noDeduVehi_modal');
        $array_combustible = json_decode($_POST['array_combustible']);
        $array_caseta      = json_decode($_POST['array_caseta']);
        $array_unidad      = json_decode($_POST['array_unidad']);
        if ($this->model_analisis_gastos->update_registros_vehiculos($combustible, $casetas,
            $id_general, $serviunidades, $noDeduVehi)) {
            if (isset($array_combustible)) {
                $length = count($array_combustible);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_combustible[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_combustible[$i]->nombre_id_hija,
                        'no_factura'     => $array_combustible[$i]->no_factura,
                        'subtotal'       => $array_combustible[$i]->sub_total,
                        'iva'            => $array_combustible[$i]->iva,
                        'total'          => $array_combustible[$i]->total,
                        'id'             => $array_combustible[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_caseta)) {
                $length = count($array_caseta);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_caseta[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_caseta[$i]->nombre_id_hija,
                        'no_factura'     => $array_caseta[$i]->no_factura,
                        'subtotal'       => $array_caseta[$i]->sub_total,
                        'iva'            => $array_caseta[$i]->iva,
                        'total'          => $array_caseta[$i]->total,
                        'id'             => $array_caseta[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_unidad)) {
                $length = count($array_unidad);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_unidad[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_unidad[$i]->nombre_id_hija,
                        'no_factura'     => $array_unidad[$i]->no_factura,
                        'subtotal'       => $array_unidad[$i]->sub_total,
                        'iva'            => $array_unidad[$i]->iva,
                        'total'          => $array_unidad[$i]->total,
                        'id'             => $array_unidad[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Se Actualizaron los gastos de Vehiculos con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se pudo Actualizar los gastos de Vehiculos";
        }
        echo json_encode($json);
    }

    public function actualizar_registro_viaticos() {
        $estacionamientoViaticos = $this->input->post('inputmodalestacionamientoViaticos');
        $alimentos               = $this->input->post('inputmodalalimentos');
        $hospedaje               = $this->input->post('inputmodalhospedaje');
        $taxis                   = $this->input->post('taxis_modal');
        $pasajes                 = $this->input->post('pasajes_modal');
        $id_general              = $this->input->post('id_general');
        $noDeduVia               = $this->input->post('noDeduVia_modal');
        $array_estacionemiento   = json_decode($_POST['array_estacionamiento']);
        $array_hospedaje         = json_decode($_POST['array_hospedaje']);
        $array_pasaje            = json_decode($_POST['array_pasaje']);
        $array_alimentos         = json_decode($_POST['array_alimentos']);
        if ($this->model_analisis_gastos->update_registros_viaticos($estacionamientoViaticos,
            $alimentos, $hospedaje, $taxis, $pasajes, $id_general, $noDeduVia)) {
            if (isset($array_estacionemiento)) {
                $length = count($array_estacionemiento);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_estacionemiento[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_estacionemiento[$i]->nombre_id_hija,
                        'no_factura'     => $array_estacionemiento[$i]->no_factura,
                        'subtotal'       => $array_estacionemiento[$i]->sub_total,
                        'iva'            => $array_estacionemiento[$i]->iva,
                        'total'          => $array_estacionemiento[$i]->total,
                        'id'             => $array_estacionemiento[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_hospedaje)) {
                $length = count($array_hospedaje);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_hospedaje[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_hospedaje[$i]->nombre_id_hija,
                        'no_factura'     => $array_hospedaje[$i]->no_factura,
                        'subtotal'       => $array_hospedaje[$i]->sub_total,
                        'iva'            => $array_hospedaje[$i]->iva,
                        'total'          => $array_hospedaje[$i]->total,
                        'id'             => $array_hospedaje[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_alimentos)) {
                $length = count($array_alimentos);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_alimentos[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_alimentos[$i]->nombre_id_hija,
                        'no_factura'     => $array_alimentos[$i]->no_factura,
                        'subtotal'       => $array_alimentos[$i]->sub_total,
                        'iva'            => $array_alimentos[$i]->iva,
                        'total'          => $array_alimentos[$i]->total,
                        'id'             => $array_alimentos[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_pasaje)) {
                $length = count($array_pasaje);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_pasaje[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_pasaje[$i]->nombre_id_hija,
                        'no_factura'     => $array_pasaje[$i]->no_factura,
                        'subtotal'       => $array_pasaje[$i]->sub_total,
                        'iva'            => $array_pasaje[$i]->iva,
                        'total'          => $array_pasaje[$i]->total,
                        'id'             => $array_pasaje[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Se Actualizaron los gastos de Viaticos con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se pudo Actualizar los gastos de Viaticos";
        }
        echo json_encode($json);
    }

    public function actualizar_registro_gastosudn() {
        $papeleria           = $this->input->post('inputmodalpapeleria');
        $materialempaque     = $this->input->post('empaque_modal');
        $equipoSeguridad     = $this->input->post('inputequipoSeguridad');
        $infracciones        = $this->input->post('infracciones_modal');
        $plomeria            = $this->input->post('plomeria_modal');
        $ferreteria          = $this->input->post('ferreteria_modal');
        $impuestos           = $this->input->post('inputmodalimpuestos');
        $sistemasgastos      = $this->input->post('inputmodalsistemas');
        $cajachica           = $this->input->post('inputmodalcaja');
        $asesoria            = $this->input->post('asesoria_modal');
        $arrenamunidades     = $this->input->post('inputmodalarreunidades');
        $servcomputo         = $this->input->post('inputmodalcomputo');
        $id_general          = $this->input->post('id_general');
        $noDeduUDN           = $this->input->post('noDeduGastos_modal');
        $array_papeleria     = json_decode($_POST['array_papeleria']);
        $array_impuestos     = json_decode($_POST['array_impuestos']);
        $array_caja_chica    = json_decode($_POST['array_caja_chica']);
        $array_arrendamiento = json_decode($_POST['array_arrendamiento']);
        $array_sistema       = json_decode($_POST['array_sistema']);
        $array_serv_computo  = json_decode($_POST['array_serv_computo']);
        if ($this->model_analisis_gastos->update_registros_gastosudn($papeleria, $materialempaque,
            $equipoSeguridad, $infracciones, $plomeria, $ferreteria,
            $impuestos, $sistemasgastos, $cajachica, $asesoria,
            $arrenamunidades, $servcomputo, $id_general, $noDeduUDN)) {
            if (isset($array_papeleria)) {
                $length = count($array_papeleria);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_papeleria[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_papeleria[$i]->nombre_id_hija,
                        'no_factura'     => $array_papeleria[$i]->no_factura,
                        'subtotal'       => $array_papeleria[$i]->sub_total,
                        'iva'            => $array_papeleria[$i]->iva,
                        'total'          => $array_papeleria[$i]->total,
                        'id'             => $array_papeleria[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_impuestos)) {
                $length = count($array_impuestos);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_impuestos[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_impuestos[$i]->nombre_id_hija,
                        'no_factura'     => $array_impuestos[$i]->no_factura,
                        'subtotal'       => $array_impuestos[$i]->sub_total,
                        'iva'            => $array_impuestos[$i]->iva,
                        'total'          => $array_impuestos[$i]->total,
                        'id'             => $array_impuestos[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_caja_chica)) {
                $length = count($array_caja_chica);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_caja_chica[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_caja_chica[$i]->nombre_id_hija,
                        'no_factura'     => $array_caja_chica[$i]->no_factura,
                        'subtotal'       => $array_caja_chica[$i]->sub_total,
                        'iva'            => $array_caja_chica[$i]->iva,
                        'total'          => $array_caja_chica[$i]->total,
                        'id'             => $array_caja_chica[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_arrendamiento)) {
                $length = count($array_arrendamiento);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_arrendamiento[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_arrendamiento[$i]->nombre_id_hija,
                        'no_factura'     => $array_arrendamiento[$i]->no_factura,
                        'subtotal'       => $array_arrendamiento[$i]->sub_total,
                        'iva'            => $array_arrendamiento[$i]->iva,
                        'total'          => $array_arrendamiento[$i]->total,
                        'id'             => $array_arrendamiento[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_sistema)) {
                $length = count($array_sistema);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_sistema[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_sistema[$i]->nombre_id_hija,
                        'no_factura'     => $array_sistema[$i]->no_factura,
                        'subtotal'       => $array_sistema[$i]->sub_total,
                        'iva'            => $array_sistema[$i]->iva,
                        'total'          => $array_sistema[$i]->total,
                        'id'             => $array_sistema[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_serv_computo)) {
                $length = count($array_serv_computo);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_serv_computo[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_serv_computo[$i]->nombre_id_hija,
                        'no_factura'     => $array_serv_computo[$i]->no_factura,
                        'subtotal'       => $array_serv_computo[$i]->sub_total,
                        'iva'            => $array_serv_computo[$i]->iva,
                        'total'          => $array_serv_computo[$i]->total,
                        'id'             => $array_serv_computo[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }

            $json['response_code'] = 200;
            $json['response_text'] = "Se Actualizaron los gastos de Gastos UDN con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se pudo Actualizar los gastos de Gastos UDN";
        }
        echo json_encode($json);
    }

    public function actualizar_registro_gastosfletes() {
        $maniobras          = $this->input->post('maniobras_modal');
        $infraccionesfletes = $this->input->post('infraccionesFletes_modal');
        $fletes             = $this->input->post('inputmodalfletes');
        $paqueteria         = $this->input->post('inputmodalpaqueteria');
        $id_general         = $this->input->post('id_general');
        $noDeduFletes       = $this->input->post('noDeduFletes_modal');
        $array_fletes       = json_decode($_POST['array_fletes']);
        $array_paqueteria   = json_decode($_POST['array_paqueteria']);
        if ($this->model_analisis_gastos->update_registros_gastosfletes($maniobras,
            $infraccionesfletes, $fletes, $paqueteria, $id_general, $noDeduFletes)) {
            if (isset($array_fletes)) {
                $length = count($array_fletes);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_fletes[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_fletes[$i]->nombre_id_hija,
                        'no_factura'     => $array_fletes[$i]->no_factura,
                        'subtotal'       => $array_fletes[$i]->sub_total,
                        'iva'            => $array_fletes[$i]->iva,
                        'total'          => $array_fletes[$i]->total,
                        'id'             => $array_fletes[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_paqueteria)) {
                $length = count($array_paqueteria);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_paqueteria[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_paqueteria[$i]->nombre_id_hija,
                        'no_factura'     => $array_paqueteria[$i]->no_factura,
                        'subtotal'       => $array_paqueteria[$i]->sub_total,
                        'iva'            => $array_paqueteria[$i]->iva,
                        'total'          => $array_paqueteria[$i]->total,
                        'id'             => $array_paqueteria[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Se Actualizaron los gastos de Fletes con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se pudo Actualizar los gastos de Fletes";
        }
        echo json_encode($json);
    }

    public function actualizar_registro_serviciosudn() {
        $gas                    = $this->input->post('gas_modal');
        $arrendamientoinmuebles = $this->input->post('inputmodalarrendamientoinmuebles');
        $ServiciosAGL           = $this->input->post('inputmodalServiciosAGL');
        $manttoGRAL             = $this->input->post('manttoGRAL_modal');
        $ManttoAlmacen          = $this->input->post('ManttoAlmacen_modal');
        $Internet               = $this->input->post('inputmodalInternet');
        $limpieza               = $this->input->post('limpieza_modal');
        $seguros                = $this->input->post('seguros_modal');
        $seguridad              = $this->input->post('seguridad_modal');
        $monitoreo              = $this->input->post('inputmodalmonitoreo');
        $plagas                 = $this->input->post('plagas_modal');
        $basura                 = $this->input->post('basura_modal');
        $higiene                = $this->input->post('higiene_modal');
        $publicidad             = $this->input->post('publicidad1_modal');
        $fianzas                = $this->input->post('inputmodalfianzas');
        $almacenaje             = $this->input->post('almacenaje_modal');
        $facturacion            = $this->input->post('inputmodalfacturacion');
        $gastolegal             = $this->input->post('gastolegal_modal');
        $id_general             = $this->input->post('id_general');
        $noDeduServ             = $this->input->post('noDeduServ_modal');
        $array_serv_alg         = json_decode($_POST['array_serv_agua_luz']);
        $array_fianza           = json_decode($_POST['array_fianzas']);
        $array_facturacion      = json_decode($_POST['array_facturacion']);
        $array_inmuebles        = json_decode($_POST['array_arrendam_inmueble']);
        $array_internet         = json_decode($_POST['array_internet']);
        $array_monitoreo        = json_decode($_POST['array_monitoreo']);
        if ($this->model_analisis_gastos->update_registros_serviciosudn($gas, $ServiciosAGL, $manttoGRAL,
            $ManttoAlmacen, $Internet, $limpieza, $seguros, $seguridad,
            $monitoreo, $plagas, $basura, $higiene, $publicidad, $fianzas,
            $almacenaje, $facturacion, $gastolegal, $id_general, $noDeduServ)) {
            if (isset($array_serv_alg)) {
                $length = count($array_serv_alg);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_serv_alg[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_serv_alg[$i]->nombre_id_hija,
                        'no_factura'     => $array_serv_alg[$i]->no_factura,
                        'subtotal'       => $array_serv_alg[$i]->sub_total,
                        'iva'            => $array_serv_alg[$i]->iva,
                        'total'          => $array_serv_alg[$i]->total,
                        'id'             => $array_serv_alg[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_fianza)) {
                $length = count($array_fianza);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_fianza[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_fianza[$i]->nombre_id_hija,
                        'no_factura'     => $array_fianza[$i]->no_factura,
                        'subtotal'       => $array_fianza[$i]->sub_total,
                        'iva'            => $array_fianza[$i]->iva,
                        'total'          => $array_fianza[$i]->total,
                        'id'             => $array_fianza[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_facturacion)) {
                $length = count($array_facturacion);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_facturacion[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_facturacion[$i]->nombre_id_hija,
                        'no_factura'     => $array_facturacion[$i]->no_factura,
                        'subtotal'       => $array_facturacion[$i]->sub_total,
                        'iva'            => $array_facturacion[$i]->iva,
                        'total'          => $array_facturacion[$i]->total,
                        'id'             => $array_facturacion[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_inmuebles)) {
                $length = count($array_inmuebles);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_inmuebles[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_inmuebles[$i]->nombre_id_hija,
                        'no_factura'     => $array_inmuebles[$i]->no_factura,
                        'subtotal'       => $array_inmuebles[$i]->sub_total,
                        'iva'            => $array_inmuebles[$i]->iva,
                        'total'          => $array_inmuebles[$i]->total,
                        'id'             => $array_inmuebles[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_internet)) {
                $length = count($array_internet);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_internet[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_internet[$i]->nombre_id_hija,
                        'no_factura'     => $array_internet[$i]->no_factura,
                        'subtotal'       => $array_internet[$i]->sub_total,
                        'iva'            => $array_internet[$i]->iva,
                        'total'          => $array_internet[$i]->total,
                        'id'             => $array_internet[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            if (isset($array_monitoreo)) {
                $length = count($array_monitoreo);
                for ($i = 0; $i < $length; $i++) {
                    $array = array(
                        'nombre_tabla'   => $array_monitoreo[$i]->nombre_tabla,
                        'nombre_id_hija' => $array_monitoreo[$i]->nombre_id_hija,
                        'no_factura'     => $array_monitoreo[$i]->no_factura,
                        'subtotal'       => $array_monitoreo[$i]->sub_total,
                        'iva'            => $array_monitoreo[$i]->iva,
                        'total'          => $array_monitoreo[$i]->total,
                        'id'             => $array_monitoreo[$i]->id,
                    );
                    $this->model_analisis_gastos->update_detalles_gastos($array);
                }
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Se Actualizaron los gastos de Servicios UDN con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se pudo Actualizar los gastos de Servicios UDN";
        }
        echo json_encode($json);
    }

    // +*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*
    public function actualizar_registro_almacen() {
        // $array_datos_usuario = array();

        $merma       = $this->input->post('merma_modal');
        $sistemasAlm = $this->input->post('sistemasAlm_modal');
        $id_general  = $this->input->post('id_general');
        $noDeduAlm   = $this->input->post('noDeduAlm_modal');

        if ($this->model_analisis_gastos->update_registros_almacen($merma, $sistemasAlm, $id_general, $noDeduAlm)) {
            $json['response_code'] = 200;
            $json['response_text'] = "Se Actualizaron los gastos de Almacen con Exito";
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se pudo Actualizar los gastos de Almacen";
        }
        echo json_encode($json);
    }

  
    public function gastos_detalle() {
        $nombre_tabla_hija = $this->input->post('nombre_tabla_hija');
        $nombre_id_hija    = $this->input->post('nombre_id_hija');
        $nombre_id_padre   = $this->input->post('nombre_id_padre');
        $id                = $this->input->post('id');
        
        $resultado         = $this->model_analisis_gastos
            ->select_detalle_gastos_inputs($nombre_id_hija,
                $nombre_tabla_hija, $id, $nombre_id_padre, );
               
        if (!is_null($resultado)) {
            $json['response_code'] = 200;
            $json['response_text'] = "Datos de consulta";
            $json['response_data'] = $resultado;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos registrados";
        }
        echo json_encode($json);
    }

    public function prueba2edit() {
        echo json_encode($this->input->post());
    }
}