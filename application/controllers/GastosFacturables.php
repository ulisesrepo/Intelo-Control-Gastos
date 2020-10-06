<?php
class GastosFacturables extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_gastosFacturables');
    }

   

    public function agregar_gastos_combustible()
    {
        $data           = json_decode($_POST['array_combustible']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_combustible = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva;
                $total        = $data[$i]->total;

                $array_combustible["no_factura"]  = $no_factura;
                $array_combustible["sub_total"]   = $sub_total;
                $array_combustible["iva"]         = $iva;
                $array_combustible["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_combustible($array_combustible);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }

    public function agregar_gastos_casetas()
    {
        $data           = json_decode($_POST['array_casetas']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_casetas = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva;
                $total        = $data[$i]->total;

                $array_casetas["no_factura"]  = $no_factura;
                $array_casetas["sub_total"]   = $sub_total;
                $array_casetas["iva"]         = $iva;
                $array_casetas["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_casetas($array_casetas);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }

    public function agregar_gastos_serviunidades()
    {
        $data           = json_decode($_POST['array_serviunidades']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_serviunidades = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_serviunidades["no_factura"]  = $no_factura;
                $array_serviunidades["sub_total"]   = $sub_total;
                $array_serviunidades["iva"]         = $iva;
                $array_serviunidades["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_serviunidades($array_serviunidades);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_estacionamientoViaticos()
    {
        $data           = json_decode($_POST['array_estacionamientoViaticos']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_estacionamientoViaticos = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_estacionamientoViaticos["no_factura"]  = $no_factura;
                $array_estacionamientoViaticos["sub_total"]   = $sub_total;
                $array_estacionamientoViaticos["iva"]         = $iva;
                $array_estacionamientoViaticos["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_estacionamientoViaticos($array_estacionamientoViaticos);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }

    public function agregar_gastos_alimentos()
    {
        $data           = json_decode($_POST['array_alimentos']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_alimentos = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_alimentos["no_factura"]  = $no_factura;
                $array_alimentos["sub_total"]   = $sub_total;
                $array_alimentos["iva"]         = $iva;
                $array_alimentos["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_alimentos($array_alimentos);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }

    public function agregar_gastos_hospedaje()
    {
        $data           = json_decode($_POST['array_hospedaje']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_hospedaje = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_hospedaje["no_factura"]  = $no_factura;
                $array_hospedaje["sub_total"]   = $sub_total;
                $array_hospedaje["iva"]         = $iva;
                $array_hospedaje["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_hospedaje($array_hospedaje);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }

    public function agregar_gastos_pasajes()
    {
        $data           = json_decode($_POST['array_pasajes']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_pasajes = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_pasajes["no_factura"]  = $no_factura;
                $array_pasajes["sub_total"]   = $sub_total;
                $array_pasajes["iva"]         = $iva;
                $array_pasajes["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_pasajes($array_pasajes);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }

    public function agregar_gastos_papeleria()
    {
        $data           = json_decode($_POST['array_papeleria']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_papeleria = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_papeleria["no_factura"]  = $no_factura;
                $array_papeleria["sub_total"]   = $sub_total;
                $array_papeleria["iva"]         = $iva;
                $array_papeleria["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_papeleria($array_papeleria);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_impuestos()
    {
        $data           = json_decode($_POST['array_impuestos']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_impuestos = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_impuestos["no_factura"]  = $no_factura;
                $array_impuestos["sub_total"]   = $sub_total;
                $array_impuestos["iva"]         = $iva;
                $array_impuestos["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_impuestos($array_impuestos);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_sistemas()
    {
        $data           = json_decode($_POST['array_sistemas']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_sistemas = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_sistemas["no_factura"]  = $no_factura;
                $array_sistemas["sub_total"]   = $sub_total;
                $array_sistemas["iva"]         = $iva;
                $array_sistemas["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_sistemas($array_sistemas);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_caja()
    {
        $data           = json_decode($_POST['array_caja']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_caja = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_caja["no_factura"]  = $no_factura;
                $array_caja["sub_total"]   = $sub_total;
                $array_caja["iva"]         = $iva;
                $array_caja["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_caja($array_caja);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_arreunidades()
    {
        $data           = json_decode($_POST['array_arreunidades']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_arreunidades = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_arreunidades["no_factura"]  = $no_factura;
                $array_arreunidades["sub_total"]   = $sub_total;
                $array_arreunidades["iva"]         = $iva;
                $array_arreunidades["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_arreunidades($array_arreunidades);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_computo()
    {
        $data           = json_decode($_POST['array_computo']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_computo = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_computo["no_factura"]  = $no_factura;
                $array_computo["sub_total"]   = $sub_total;
                $array_computo["iva"]         = $iva;
                $array_computo["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_computo($array_computo);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_por_flete()
    {
        $data           = json_decode($_POST['array_fletes']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_fletes = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_fletes["no_factura"]  = $no_factura;
                $array_fletes["sub_total"]   = $sub_total;
                $array_fletes["iva"]         = $iva;
                $array_fletes["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_por_flete($array_fletes);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_paqueteria()
    {
        $data           = json_decode($_POST['array_paqueteria']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_paqueteria = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_paqueteria["no_factura"]  = $no_factura;
                $array_paqueteria["sub_total"]   = $sub_total;
                $array_paqueteria["iva"]         = $iva;
                $array_paqueteria["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_paqueteria($array_paqueteria);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_arrendamientoinmuebles()
    {
        $data           = json_decode($_POST['array_arrendamientoinmuebles']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_arrendamientoinmuebles = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_arrendamientoinmuebles["no_factura"]  = $no_factura;
                $array_arrendamientoinmuebles["sub_total"]   = $sub_total;
                $array_arrendamientoinmuebles["iva"]         = $iva;
                $array_arrendamientoinmuebles["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_arrendamientoinmuebles($array_arrendamientoinmuebles);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_ServiciosAGL()
    {
        $data           = json_decode($_POST['array_ServiciosAGL']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_ServiciosAGL = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_ServiciosAGL["no_factura"]  = $no_factura;
                $array_ServiciosAGL["sub_total"]   = $sub_total;
                $array_ServiciosAGL["iva"]         = $iva;
                $array_ServiciosAGL["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_ServiciosAGL($array_ServiciosAGL);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_Internet()
    {
        $data           = json_decode($_POST['array_Internet']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_Internet = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_Internet["no_factura"]  = $no_factura;
                $array_Internet["sub_total"]   = $sub_total;
                $array_Internet["iva"]         = $iva;
                $array_Internet["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_Internet($array_Internet);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_monitoreo()
    {
        $data           = json_decode($_POST['array_monitoreo']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_monitoreo = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_monitoreo["no_factura"]  = $no_factura;
                $array_monitoreo["sub_total"]   = $sub_total;
                $array_monitoreo["iva"]         = $iva;
                $array_monitoreo["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_monitoreo($array_monitoreo);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_fianzas()
    {
        $data           = json_decode($_POST['array_fianzas']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_fianzas = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_fianzas["no_factura"]  = $no_factura;
                $array_fianzas["sub_total"]   = $sub_total;
                $array_fianzas["iva"]         = $iva;
                $array_fianzas["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_fianzas($array_fianzas);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }
    public function agregar_gastos_facturacion()
    {
        $data           = json_decode($_POST['array_facturacion']);
        $longitud_data  = $this->input->post('longitud_datos_tabla');
        $array_facturacion = array();
        if ($longitud_data == '0') {
            $json['response_code'] = 500;
            $json['response_text'] = "Favor de agregar productos a la tabla";
        } else {
            for ($i = 0; $i < count($data); ++$i) {
                $no_factura   = $data[$i]->no_factura;
                $sub_total    = $data[$i]->sub_total;
                $iva          = $data[$i]->iva; 
                $total        = $data[$i]->total;

                $array_facturacion["no_factura"]  = $no_factura;
                $array_facturacion["sub_total"]   = $sub_total;
                $array_facturacion["iva"]         = $iva;
                $array_facturacion["total"]       = $total;
                $this->model_gastosFacturables->insert_gastos_facturacion($array_facturacion);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

      
    }

    

}

