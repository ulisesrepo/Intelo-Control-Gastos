<?php

class model_gastosFacturables extends CI_Model {

    public function insert_gastos_combustible($id_vehiculos,$array_data) {
        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_combustible = "insert into combustible values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_vehiculos . ")";
        return $this->db->query($sql_insert_combustible);
    }

     public function insert_gastos_casetas($id_vehiculos,$array_data) {
        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_casetas = "insert into casetas values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_vehiculos . ")";
        return $this->db->query($sql_insert_casetas);
    }

    public function insert_gastos_serviunidades($id_vehiculos,$array_data) {
        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_serviunidades = "insert into serviunidades values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_vehiculos . ")";
        return $this->db->query($sql_insert_serviunidades);
    }

    public function insert_gastos_estacionamientoViaticos($id_viaticos,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_estacionamientoViaticos = "insert into estacionamientoviaticos values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_viaticos . ")";
        return $this->db->query($sql_insert_estacionamientoViaticos);
    }

    public function insert_gastos_alimentos($id_viaticos,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_alimentos = "insert into alimentos values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_viaticos . ")";
        return $this->db->query($sql_insert_alimentos);
    }

    
    public function insert_gastos_hospedaje($id_viaticos,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_hospedaje = "insert into hospedaje values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_viaticos . ")";
        return $this->db->query($sql_insert_hospedaje);
    }

    public function insert_gastos_pasajes($id_viaticos,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_pasajes = "insert into pasajes values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_viaticos . ")";
        return $this->db->query($sql_insert_pasajes);
    }

    public function insert_gastos_papeleria($id_gastosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_papeleria = "insert into papeleria values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_gastosudn . ")";
        return $this->db->query($sql_insert_papeleria);
    }

    public function insert_gastos_impuestos($id_gastosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_impuestos = "insert into impuestos values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_gastosudn . ")";
        return $this->db->query($sql_insert_impuestos);
    }

    public function insert_gastos_sistemas($id_gastosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_sistemas = "insert into sistemas values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_gastosudn . ")";
        return $this->db->query($sql_insert_sistemas);
    }

    public function insert_gastos_caja($id_gastosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_caja = "insert into caja_chica values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_gastosudn . ")";
        return $this->db->query($sql_insert_caja);
    }
    public function insert_gastos_arreunidades($id_gastosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_arreunidades = "insert into arrendam_unidades values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_gastosudn . ")";
        return $this->db->query($sql_insert_arreunidades);
    }

    public function insert_gastos_computo($id_gastosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_computo = "insert into serv_computo values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_gastosudn . ")";
        return $this->db->query($sql_insert_computo);
    }

    public function insert_gastos_por_flete($id_fletes,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_fletes = "insert into fletes values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_fletes . ")";
        return $this->db->query($sql_insert_fletes);
    }

    public function insert_gastos_paqueteria($id_fletes,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_paqueteria = "insert into paqueteria values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_fletes . ")";
        return $this->db->query($sql_insert_paqueteria);
    }

    public function insert_gastos_arrendamientoinmuebles($id_serviciosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_arrendamientoinmuebles = "insert into arrendamientoinmuebles values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_serviciosudn . ")";
        return $this->db->query($sql_insert_arrendamientoinmuebles);
    }

    public function insert_gastos_ServiciosAGL($id_serviciosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_serviciosagl = "insert into serviciosagl values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_serviciosudn . ")";
        return $this->db->query($sql_insert_serviciosagl);
    }
     
    public function insert_gastos_internet($id_serviciosudn,$array_data) {

        $no_factura    = $array_data['no_factura'];
        $sub_total     = $array_data['sub_total'];
        $iva           = $array_data['iva'];
        $total         = $array_data['total'];

       $sql_insert_internet = "insert into internet values(null,'"
            . $no_factura . "','"
            . $sub_total . "','"
            . $iva ."','"
            . $total .  "',"
            . $id_serviciosudn . ")";
        return $this->db->query($sql_insert_internet);
    }
    // public function insert_gastos_monitoreo($array_data) {

    //     $no_factura    = $array_data['no_factura'];
    //     $sub_total     = $array_data['sub_total'];
    //     $iva           = $array_data['iva'];
    //     $total         = $array_data['total'];

    //    $sql_insert_monitoreo = "insert into monitoreo values('"
    //         . $no_factura . "','"
    //         . $sub_total . "','"
    //         . $iva ."','"
    //         . $total ."')";
    //     return $this->db->query($sql_insert_monitoreo);
    // }
    // public function insert_gastos_fianzas($array_data) {

    //     $no_factura    = $array_data['no_factura'];
    //     $sub_total     = $array_data['sub_total'];
    //     $iva           = $array_data['iva'];
    //     $total         = $array_data['total'];

    //    $sql_insert_fianzas = "insert into fianzas values('"
    //         . $no_factura . "','"
    //         . $sub_total . "','"
    //         . $iva ."','"
    //         . $total ."')";
    //     return $this->db->query($sql_insert_fianzas);
    // }
    // public function insert_gastos_facturacion($array_data) {

    //     $no_factura    = $array_data['no_factura'];
    //     $sub_total     = $array_data['sub_total'];
    //     $iva           = $array_data['iva'];
    //     $total         = $array_data['total'];

    //    $sql_insert_facturacion = "insert into facturacion values('"
    //         . $no_factura . "','"
    //         . $sub_total . "','"
    //         . $iva ."','"
    //         . $total ."')";
    //     return $this->db->query($sql_insert_facturacion);
    // }
}