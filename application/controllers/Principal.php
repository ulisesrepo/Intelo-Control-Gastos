<?php
class Principal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_general');
        $this->load->model('model_gastos_vehiculos');
        $this->load->model('model_gastos_viaticos');
        $this->load->model('model_gastos_UDN');
        $this->load->model('model_gastos_fletes');
        $this->load->model('model_gastos_servicios');
        $this->load->model('model_gastos_almacen');
        $this->load->model('model_gastosFacturables');
    }

    public function index()
    {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, true);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, true);
        $data['work_area'] = $this->load->view('work_area/principal_view', $data, true);
        $data['work_area'] = $this->load->view('work_area/reporte_costos_view', $data, true);
        $data['titulo']    = "Principal | Intelo";
        $data['my_jquery'] = "reportes.js";
        $this->load->view("main_view", $data, false);
    }

    public function guardar_dato()
    {
        $array_general = json_decode($_POST['array_general']);
        if (isset($array_general)) {
            $id_general = $this->agregar_general($array_general);
            if ($id_general > 0) {
                $array_vehiculos = json_decode($_POST['array_vehiculos']);
                $array_viaticos     = json_decode($_POST['array_viaticos']);
                $array_gastosUDN    = json_decode($_POST['array_gastosUDN']);
                $array_Gastosfletes = json_decode($_POST['array_Gastosfletes']);
                $array_serviciosUDN = json_decode($_POST['array_serviciosUDN']);
                $array_almacen      = json_decode($_POST['array_almacen']);

                $array_combustible = json_decode($_POST['array_combustible']);
                $array_casetas = json_decode($_POST['array_casetas']);
                $array_serviunidades = json_decode($_POST['array_serviunidades']);

                $array_estacionamientoViaticos = json_decode($_POST['array_estacionamientoViaticos']);
                $array_alimentos = json_decode($_POST['array_alimentos']);
                $array_hospedaje = json_decode($_POST['array_hospedaje']);
                $array_pasajes = json_decode($_POST['array_pasajes']);
                
                $array_papeleria = json_decode($_POST['array_papeleria']);
                $array_impuestos = json_decode($_POST['array_impuestos']);
                $array_sistemas = json_decode($_POST['array_sistemas']);
                $array_caja = json_decode($_POST['array_caja']);
                $array_arreunidades = json_decode($_POST['array_arreunidades']);
                $array_computo = json_decode($_POST['array_computo']);

                $array_fletes = json_decode($_POST['array_fletes']);
                $array_paqueteria = json_decode($_POST['array_paqueteria']);
                $array_arrendamientoinmuebles = json_decode($_POST['array_arrendamientoinmuebles']);
                $array_ServiciosAGL = json_decode($_POST['array_ServiciosAGL']);
                $array_Internet = json_decode($_POST['array_Internet']);


                if (isset($array_vehiculos)) {
                    $valor = $this->agregar_gastos_vehiculos($id_general, $array_vehiculos,
                     $array_combustible, $array_casetas, $array_serviunidades);

                }
                if (isset($array_viaticos)) {
                    $valor = $this->agregar_gastos_viaticos($id_general, $array_viaticos,
                     $array_estacionamientoViaticos, $array_alimentos, $array_hospedaje,$array_pasajes);

                }
                if (isset($array_gastosUDN)) {
                    $valor = $this->agregar_gastos_UDN($id_general, $array_gastosUDN,$array_papeleria,
                    $array_impuestos,$array_sistemas,$array_caja,$array_arreunidades,$array_computo);

                }
                if (isset($array_Gastosfletes)) {
                    $valor = $this->agregar_gastos_fletes($id_general, $array_Gastosfletes,
                    $array_fletes,$array_paqueteria);

                }
                if (isset($array_serviciosUDN)) {
                    $valor = $this->agregar_gastos_servicios($id_general, $array_serviciosUDN,
                    $array_arrendamientoinmuebles,$array_ServiciosAGL,$array_Internet);

                }
                if (isset($array_almacen)) {
                    $valor = $this->agregar_gastos_almacen($id_general, $array_almacen);

                }
            }
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se a guardado los datos
                generales de este registro, es importante que se ingresen";
        }

    }

    public function agregar_general($array_general)
    {
        $empresas   = $array_general->empresas;
        $dia_gasto  = $array_general->dia_gasto;
        $Mes        = $array_general->Mes;
        $Plaza      = $array_general->Plaza;
        $cliente    = $array_general->cliente;
        $fecha_cap  = $array_general->fecha_cap;
        $array_data = array(
            'empresas'  => $empresas,
            'dia_gasto' => $dia_gasto,
            'Mes'       => $Mes,
            'Plaza'     => $Plaza,
            'cliente'   => $cliente,
            'fecha_cap' => $fecha_cap,
        );
        $id_general = $this->model_general->insert_general($array_data);
        if ($id_general > 0) {
            return $id_general;
        } else {
            return 0;
        }
    }

    public function agregar_gastos_vehiculos($id_general, $array_vehiculos, $array_combustible,
     $array_casetas,$array_serviunidades)
    {
        $unidad             = $array_vehiculos->unidad;
        $km_inicial         = $array_vehiculos->km_inicial;
        $km_final           = $array_vehiculos->km_final;
        $km_total           = $array_vehiculos->km_total;
        $lts_consumidos     = $array_vehiculos->lts_consumidos;
        $rendimiento        = $array_vehiculos->rendimiento;
        $inputcombustible   = $array_vehiculos->inputcombustible;
        $inputcasetas       = $array_vehiculos->inputcasetas;
        $noDeduVehi         = $array_vehiculos->noDeduVehi;
        $inputserviunidades = $array_vehiculos->inputserviunidades;
        $array_data         = array(
            'unidad'             => $unidad,
            'km_inicial'         => $km_inicial,
            'km_final'           => $km_final,
            'km_total'           => $km_total,
            'lts_consumidos'     => $lts_consumidos,
            'rendimiento'        => $rendimiento,
            'inputcombustible'   => $inputcombustible,
            'inputcasetas'       => $inputcasetas,
            'noDeduVehi'         => $noDeduVehi,
            'inputserviunidades' => $inputserviunidades,
            'id_general'         => $this->session->userdata('id_general'),
        );
        $id_vehiculos = $this->model_gastos_vehiculos->insert_gastos_vehiculos($id_general,
            $array_data);
        if ($id_vehiculos > 0) {
            if (isset($array_combustible)) {
                $this->agregar_gastos_combustible($id_vehiculos, $array_combustible);
            }
            if (isset($array_casetas)) {
                $this->agregar_gastos_casetas($id_vehiculos, $array_casetas);
            }
            if (isset($array_serviunidades)) {
                $this->agregar_gastos_serviunidades($id_vehiculos, $array_serviunidades);
            }
            return true;
        } else {
            return false;
        }
    }

    public function agregar_gastos_viaticos($id_general, $array_viaticos, $array_estacionamientoViaticos,
        $array_alimentos, $array_hospedaje, $array_pasajes)
    {
    	$inputestacionamientoViaticos = $array_viaticos -> inputestacionamientoViaticos;
    	$inputalimentos = $array_viaticos -> inputalimentos;
    	$inputhospedaje = $array_viaticos -> inputhospedaje;
    	$taxis = $array_viaticos -> taxis;
    	$inputpasajes = $array_viaticos -> inputpasajes;
    	$noDeduVia = $array_viaticos -> noDeduVia;
    	$array_data = array(
    		'inputestacionamientoViaticos' => $inputestacionamientoViaticos,
    		'inputalimentos' => $inputalimentos,
    		'inputhospedaje' => $inputhospedaje,
    		'taxis' => $taxis,
    		'inputpasajes' => $inputpasajes,
    		'noDeduVia' => $noDeduVia,
    		'id_general' => $this -> session -> userdata('id_general'),
    	);
    	$id_viaticos = $this -> model_gastos_viaticos -> insert_gastos_viaticos($id_general,
    		$array_data);
    	if ($id_viaticos > 0) {
    		if (isset($array_estacionamientoViaticos)) {
    			$this -> agregar_gastos_estacionamientoViaticos($id_viaticos, $array_estacionamientoViaticos);
    		}
    		if (isset($array_alimentos)) {
    			$this -> agregar_gastos_alimentos($id_viaticos, $array_alimentos);
    		}
    		if (isset($array_hospedaje)) {
    			$this -> agregar_gastos_hospedaje($id_viaticos, $array_hospedaje);
    		}
    		if (isset($array_pasajes)) {
    			$this -> agregar_gastos_pasajes($id_viaticos, $array_pasajes);
    		}
    		return true;
    	} else {
    		return false;
    	}
    }

    public function agregar_gastos_UDN($id_general, $array_gastosUDN, $array_papeleria,
        $array_impuestos, $array_sistemas, $array_caja, $array_arreunidades, $array_computo) 
    {
    	$inputpapeleria = $array_gastosUDN -> inputpapeleria;
    	$empaque = $array_gastosUDN -> empaque;
    	$inputequipoSeguridad = $array_gastosUDN -> inputequipoSeguridad;
    	$infracciones = $array_gastosUDN -> infracciones;
    	$plomeria = $array_gastosUDN -> plomeria;
    	$ferreteria = $array_gastosUDN -> ferreteria;
    	$inputimpuestos = $array_gastosUDN -> inputimpuestos;
    	$inputsistemas = $array_gastosUDN -> inputsistemas;
    	$inputcaja = $array_gastosUDN -> inputcaja;
    	$asesoria = $array_gastosUDN -> asesoria;
    	$inputarreunidades = $array_gastosUDN -> inputarreunidades;
    	$inputcomputo = $array_gastosUDN -> inputcomputo;
    	$noDeduGastos = $array_gastosUDN -> noDeduGastos;

    	$array_data = array(
    		'inputpapeleria' => $inputpapeleria,
    		'empaque' => $empaque,
    		'inputequipoSeguridad' => $inputequipoSeguridad,
    		'infracciones' => $infracciones,
    		'plomeria' => $plomeria,
    		'ferreteria' => $ferreteria,
    		'inputimpuestos' => $inputimpuestos,
    		'inputsistemas' => $inputsistemas,
    		'inputcaja' => $inputcaja,
    		'asesoria' => $asesoria,
    		'inputarreunidades' => $inputarreunidades,
    		'inputcomputo' => $inputcomputo,
    		'noDeduGastos' => $noDeduGastos,
    		'id_general' => $this -> session -> userdata('id_general'),
    	);
    	$id_gastosudn = $this -> model_gastos_UDN -> insert_gastos_UDN($id_general,
    		$array_data);
    	if ($id_gastosudn > 0) {
    		if (isset($array_papeleria)) {
    			$this -> agregar_gastos_papeleria($id_gastosudn, $array_papeleria);
    		}
    		if (isset($array_impuestos)) {
    			$this -> agregar_gastos_impuestos($id_gastosudn, $array_impuestos);
    		}
    		if (isset($array_sistemas)) {
    			$this -> agregar_gastos_sistemas($id_gastosudn, $array_sistemas);
    		}
    		if (isset($array_caja)) {
    			$this -> agregar_gastos_caja($id_gastosudn, $array_caja);
    		}
    		if (isset($array_arreunidades)) {
    			$this -> agregar_gastos_arreunidades($id_gastosudn, $array_arreunidades);
    		}
    		if (isset($array_computo)) {
    			$this -> agregar_gastos_computo($id_gastosudn, $array_computo);
    		}
    		return true;
    	} else {
    		return false;
    	}

    }

    public function agregar_gastos_fletes($id_general, $array_Gastosfletes, $array_fletes,
        $array_paqueteria) 
    {
    	$inmaniobras = $array_Gastosfletes -> inmaniobras;
    	$infraccionesFletes = $array_Gastosfletes -> infraccionesFletes;
    	$inputfletes = $array_Gastosfletes -> inputfletes;
    	$inputpaqueteria = $array_Gastosfletes -> inputpaqueteria;
    	$noDeduFletes = $array_Gastosfletes -> noDeduFletes;

    	$array_data = array(
    		'inmaniobras' => $inmaniobras,
    		'infraccionesFletes' => $infraccionesFletes,
    		'inputfletes' => $inputfletes,
    		'inputpaqueteria' => $inputpaqueteria,
    		'noDeduFletes' => $noDeduFletes,
    		'id_general' => $this -> session -> userdata('id_general'),
    	);

    	$id_fletes = $this -> model_gastos_fletes -> insert_gastos_fletes($id_general,
    		$array_data);
    	if ($id_fletes > 0) {
    		if (isset($array_fletes)) {
    			$this -> agregar_gastos_por_flete($id_fletes, $array_fletes);
    		}
    		if (isset($array_paqueteria)) {
    			$this -> agregar_gastos_paqueteria($id_fletes, $array_paqueteria);
    		}
    		return true;
    	} else {
    		return false;
    	}

    }

    public function agregar_gastos_servicios($id_general, $array_serviciosUDN,$array_arrendamientoinmuebles,
    $array_ServiciosAGL) 
    {
    	$gas = $array_serviciosUDN -> gas;
    	$inputarrendamientoinmuebles = $array_serviciosUDN -> inputarrendamientoinmuebles;
    	$inputServiciosAGL = $array_serviciosUDN -> inputServiciosAGL;
    	$manttoGRAL = $array_serviciosUDN -> manttoGRAL;
    	$ManttoAlmacen = $array_serviciosUDN -> ManttoAlmacen;
    	$inputInternet = $array_serviciosUDN -> inputInternet;
    	$limpieza = $array_serviciosUDN -> limpieza;
    	$seguros = $array_serviciosUDN -> seguros;
    	$seguridad = $array_serviciosUDN -> seguridad;
    	$inputmonitoreo = $array_serviciosUDN -> inputmonitoreo;
    	$plagas = $array_serviciosUDN -> plagas;
    	$basura = $array_serviciosUDN -> basura;
    	$higiene = $array_serviciosUDN -> higiene;
    	$publicidad1 = $array_serviciosUDN -> publicidad1;
    	$inputfianzas = $array_serviciosUDN -> inputfianzas;
    	$almacenaje = $array_serviciosUDN -> almacenaje;
    	$inputfacturacion = $array_serviciosUDN -> inputfacturacion;
    	$gastolegal = $array_serviciosUDN -> gastolegal;
    	$noDeduServ = $array_serviciosUDN -> noDeduServ;

    	$array_data = array(
    		'gas' => $gas,
    		'inputarrendamientoinmuebles' => $inputarrendamientoinmuebles,
    		'inputServiciosAGL' => $inputServiciosAGL,
    		'manttoGRAL' => $manttoGRAL,
    		'ManttoAlmacen' => $ManttoAlmacen,
    		'inputInternet' => $inputInternet,
    		'limpieza' => $limpieza,
    		'seguros' => $seguros,
    		'seguridad' => $seguridad,
    		'inputmonitoreo' => $inputmonitoreo,
    		'plagas' => $plagas,
    		'basura' => $basura,
    		'higiene' => $higiene,
    		'publicidad1' => $publicidad1,
    		'inputfianzas' => $inputfianzas,
    		'almacenaje' => $almacenaje,
    		'inputfacturacion' => $inputfacturacion,
    		'gastolegal' => $gastolegal,
    		'noDeduServ' => $noDeduServ,
    		'id_general' => $this -> session -> userdata('id_general'),
    	);

    	$id_serviciosudn = $this -> model_gastos_servicios -> insert_gastos_servicios($id_general,
    		$array_data);
    	if ($id_serviciosudn > 0) {
    		if (isset($array_arrendamientoinmuebles)) {
    			$this -> agregar_gastos_arrendamientoinmuebles($id_serviciosudn, $array_arrendamientoinmuebles);
    		}
    		if (isset($array_ServiciosAGL)) {
    			$this -> agregar_gastos_ServiciosAGL($id_serviciosudn, $array_ServiciosAGL);
    		}

    		return true;
    	} else {
    		return false;
    	}
    }
    public function agregar_gastos_almacen($id_general, $array_almacen)
    {
        $merma       = $array_almacen->merma;
        $sistemasAlm = $array_almacen->sistemasAlm;
        $noDeduAlm   = $array_almacen->noDeduAlm;

        $array_data = array(
            'merma'       => $merma,
            'sistemasAlm' => $sistemasAlm,
            'noDeduAlm'   => $noDeduAlm,
            'id_general'  => $this->session->userdata('id_general'),
        );
        if ($this->model_gastos_almacen->insert_gastos_almacen($id_general, $array_data)) {
            return true;
        } else {
            return false;
        }
    }
    //funciones de tablas hijas
    public function agregar_gastos_combustible($id_vehiculos, $data)
    {
        $array_combustible = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_combustible($id_vehiculos,
                    $array_combustible);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_casetas($id_vehiculos, $data)
    {
        $array_casetas = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_casetas($id_vehiculos,
                $array_casetas);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_serviunidades($id_vehiculos, $data)
    {
        $array_serviunidades = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_serviunidades($id_vehiculos,
                $array_serviunidades);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_estacionamientoViaticos($id_viaticos, $data)
    {
        $array_estacionamientoViaticos = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_estacionamientoViaticos($id_viaticos, 
                $array_estacionamientoViaticos);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_alimentos($id_viaticos, $data)
    {
        $array_alimentos = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_alimentos($id_viaticos, 
                $array_alimentos);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_hospedaje($id_viaticos, $data)
    {
        $array_hospedaje = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_hospedaje($id_viaticos,
                $array_hospedaje);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_pasajes($id_viaticos, $data)
    {
        $array_pasajes = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_pasajes($id_viaticos,
                $array_pasajes);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_papeleria($id_gastosudn, $data)
    {
        $array_papeleria = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_papeleria($id_gastosudn,
                $array_papeleria);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_impuestos($id_gastosudn, $data)
    {
        $array_impuestos = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_impuestos($id_gastosudn,
                $array_impuestos);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_sistemas($id_gastosudn, $data)
    {
        $array_sistemas = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_sistemas($id_gastosudn,
                $array_sistemas);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_caja($id_gastosudn, $data)
    {
        $array_caja = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_caja($id_gastosudn,
                $array_caja);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_arreunidades($id_gastosudn, $data)
    {
        $array_caja = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_arreunidades($id_gastosudn,
                $array_arreunidades);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_computo($id_gastosudn, $data)
    {
        $array_computo = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_computo($id_gastosudn,
                $array_computo);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_por_flete($id_fletes, $data)
    {
        $array_fletes = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_por_flete($id_fletes,
                $array_fletes);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_paqueteria($id_fletes, $data)
    {
        $array_paqueteria = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_paqueteria($id_fletes,
                $array_paqueteria);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    public function agregar_gastos_arrendamientoinmuebles($id_serviciosudn, $data)
    {
        $array_arrendamientoinmuebles = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_arrendamientoinmuebles($id_serviciosudn,
                $array_arrendamientoinmuebles);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }

    public function agregar_gastos_ServiciosAGL($id_serviciosudn, $data)
    {
        $array_ServiciosAGL = array();
        $longitud_data = count($data);
        if ($longitud_data == 0) {
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
                $this->model_gastosFacturables->insert_gastos_ServiciosAGL($id_serviciosudn,
                $array_ServiciosAGL);
            }
            $json['response_code'] = 200;
            $json['response_text'] = "Guardado con Exito";
        }
        echo json_encode($json);

    }
    // public function agregar_gastos_Internet()
    // {
    //     $data           = json_decode($_POST['array_Internet']);
    //     $longitud_data  = $this->input->post('longitud_datos_tabla');
    //     $array_Internet = array();
    //     if ($longitud_data == '0') {
    //         $json['response_code'] = 500;
    //         $json['response_text'] = "Favor de agregar productos a la tabla";
    //     } else {
    //         for ($i = 0; $i < count($data); ++$i) {
    //             $no_factura   = $data[$i]->no_factura;
    //             $sub_total    = $data[$i]->sub_total;
    //             $iva          = $data[$i]->iva;
    //             $total        = $data[$i]->total;

    //             $array_Internet["no_factura"]  = $no_factura;
    //             $array_Internet["sub_total"]   = $sub_total;
    //             $array_Internet["iva"]         = $iva;
    //             $array_Internet["total"]       = $total;
    //             $this->model_gastosFacturables->insert_gastos_Internet($array_Internet);
    //         }
    //         $json['response_code'] = 200;
    //         $json['response_text'] = "Guardado con Exito";
    //     }
    //     echo json_encode($json);

    // }
    // public function agregar_gastos_monitoreo()
    // {
    //     $data           = json_decode($_POST['array_monitoreo']);
    //     $longitud_data  = $this->input->post('longitud_datos_tabla');
    //     $array_monitoreo = array();
    //     if ($longitud_data == '0') {
    //         $json['response_code'] = 500;
    //         $json['response_text'] = "Favor de agregar productos a la tabla";
    //     } else {
    //         for ($i = 0; $i < count($data); ++$i) {
    //             $no_factura   = $data[$i]->no_factura;
    //             $sub_total    = $data[$i]->sub_total;
    //             $iva          = $data[$i]->iva;
    //             $total        = $data[$i]->total;

    //             $array_monitoreo["no_factura"]  = $no_factura;
    //             $array_monitoreo["sub_total"]   = $sub_total;
    //             $array_monitoreo["iva"]         = $iva;
    //             $array_monitoreo["total"]       = $total;
    //             $this->model_gastosFacturables->insert_gastos_monitoreo($array_monitoreo);
    //         }
    //         $json['response_code'] = 200;
    //         $json['response_text'] = "Guardado con Exito";
    //     }
    //     echo json_encode($json);

    // }
    // public function agregar_gastos_fianzas()
    // {
    //     $data           = json_decode($_POST['array_fianzas']);
    //     $longitud_data  = $this->input->post('longitud_datos_tabla');
    //     $array_fianzas = array();
    //     if ($longitud_data == '0') {
    //         $json['response_code'] = 500;
    //         $json['response_text'] = "Favor de agregar productos a la tabla";
    //     } else {
    //         for ($i = 0; $i < count($data); ++$i) {
    //             $no_factura   = $data[$i]->no_factura;
    //             $sub_total    = $data[$i]->sub_total;
    //             $iva          = $data[$i]->iva;
    //             $total        = $data[$i]->total;

    //             $array_fianzas["no_factura"]  = $no_factura;
    //             $array_fianzas["sub_total"]   = $sub_total;
    //             $array_fianzas["iva"]         = $iva;
    //             $array_fianzas["total"]       = $total;
    //             $this->model_gastosFacturables->insert_gastos_fianzas($array_fianzas);
    //         }
    //         $json['response_code'] = 200;
    //         $json['response_text'] = "Guardado con Exito";
    //     }
    //     echo json_encode($json);

    // }
    // public function agregar_gastos_facturacion()
    // {
    //     $data           = json_decode($_POST['array_facturacion']);
    //     $longitud_data  = $this->input->post('longitud_datos_tabla');
    //     $array_facturacion = array();
    //     if ($longitud_data == '0') {
    //         $json['response_code'] = 500;
    //         $json['response_text'] = "Favor de agregar productos a la tabla";
    //     } else {
    //         for ($i = 0; $i < count($data); ++$i) {
    //             $no_factura   = $data[$i]->no_factura;
    //             $sub_total    = $data[$i]->sub_total;
    //             $iva          = $data[$i]->iva;
    //             $total        = $data[$i]->total;

    //             $array_facturacion["no_factura"]  = $no_factura;
    //             $array_facturacion["sub_total"]   = $sub_total;
    //             $array_facturacion["iva"]         = $iva;
    //             $array_facturacion["total"]       = $total;
    //             $this->model_gastosFacturables->insert_gastos_facturacion($array_facturacion);
    //         }
    //         $json['response_code'] = 200;
    //         $json['response_text'] = "Guardado con Exito";
    //     }
    //     echo json_encode($json);

    // }

}
