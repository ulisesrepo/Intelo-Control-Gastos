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

    public function actualizar_gastos_combustible() {
        $data              = json_decode($_POST['array_combustible']);
        $longitud_data     = $this->input->post('longitud_datos_tabla');
        $array_combustible = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura = $data[$i]->no_factura;
                $sub_total  = $data[$i]->sub_total;
                $iva        = $data[$i]->iva;
                $total      = $data[$i]->total;

                $array_combustible["no_factura"] = $no_factura;
                $array_combustible["sub_total"]  = $sub_total;
                $array_combustible["iva"]        = $iva;
                $array_combustible["total"]      = $total;
                if ($this->model_analisis_gastos->update_gastos_combustible($array_combustible, 
                    $id_vehiculos));
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);
    }

    public function gastos_detalle() {
        $nombre_tabla_hija = $this->input->post('nombre_tabla_hija');
        $nombre_id_hija    = $this->input->post('nombre_id_hija');
        $nombre_id_padre   = $this->input->post('nombre_id_padre');
        $id                = $this->input->post('id');
        $resultado = $this->model_analisis_gastos
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