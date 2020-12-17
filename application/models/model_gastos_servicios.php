<?php

class model_gastos_servicios extends CI_Model {

    public function insert_gastos_servicios($id_general, $array_data) {
        $gas                      = $array_data['gas'];
        $arrendamientoinmuebles   = $array_data['inputarrendamientoinmuebles'];
        $ServiciosAGL             = $array_data['inputServiciosAGL'];
        $manttoGRAL               = $array_data['manttoGRAL'];
        $ManttoAlmacen            = $array_data['ManttoAlmacen'];
        $Internet                 = $array_data['inputInternet'];
        $limpieza                = $array_data['limpieza'];
        $seguros                 = $array_data['seguros'];
        $seguridad               = $array_data['seguridad'];
        $monitoreo               = $array_data['inputmonitoreo'];
        $plagas                  = $array_data['plagas'];
        $basura                  = $array_data['basura'];
        $higiene                 = $array_data['higiene'];
        $publicidad              = $array_data['publicidad1'];
        $fianzas                 = $array_data['inputfianzas'];
        $almacenaje              = $array_data['almacenaje'];
        $facturacion             = $array_data['inputfacturacion'];
        $gastolegal              = $array_data['gastolegal'];
        $noDeduServ              = $array_data['noDeduServ'];

    $sql_insert_servicios = "insert into serviciosudn values(null,'"
            . $gas . "','"
            . $arrendamientoinmuebles . "','"
            . $ServiciosAGL . "','"
            . $manttoGRAL . "','"
            . $ManttoAlmacen . "','"
            . $Internet . "','"
            . $limpieza . "','"
            . $seguros . "','"
            . $seguridad . "','"
            . $monitoreo . "','"
            . $plagas . "','"
            . $basura . "','"
            . $higiene . "','"
            . $publicidad . "','"
            . $fianzas . "','"
            . $almacenaje . "','"
            . $facturacion . "','"
            . $gastolegal . "','"
            . $noDeduServ ."',"
            . $id_general .")";
            $this->db->query($sql_insert_servicios);
            return $this->db->insert_id();
    }

    public function select_servudn()
    {
        $sql_consulta = "
            Select
                e.nombre,
                e.apellidos,
                s.gas,
                s.arrendamientoinmuebles,
                s.ServiciosAGL,
                s.manttoGRAL,
                s.ManttoAlmacen,
                s.Internet,
                s.limpieza,
                s.seguros,
                s.seguridad,
                s.monitoreo,
                s.plagas,
                s.basura,
                s.higiene,
                s.publicidad,
                s.fianzas,
                s.almacenaje,
                s.facturacion,
                s.gastolegal,
                s.noDeduServ,
                g.Empresa,
                g.Dia_gasto,
                g.Plaza,
                g.Fecha_captura,
                g.id_general
            from
                general g
                inner join serviciosudn s on g.id_general = s.id_general
                inner join empleados e on e.id_empleados = g.id_empleados";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
}