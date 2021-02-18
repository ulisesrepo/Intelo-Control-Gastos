<?php

class model_analisis_gastos extends CI_Model {

    public function select_analisis() {
        $sql_consulta = "SELECT
                e.nombre,
                e.apellidos,
                e.sucursal,
                g.Empresa,
                g.Dia_gasto,
                g.Mes,
                g.Plaza,
                g.Cliente,
                g.Fecha_captura,
                g.id_general,
                g.estatus,
                w.id_vehiculos,
                w.unidad,
                w.km_inicial,
                w.km_final,
                w.km_total,
                w.lts_consumidos,
                w.rendimiento,
                w.combustible,
                w.casetas,
                w.noDeduVehi,
                w.ser_unidades,
                v.id_viaticos,
                v.estacionamientoViaticos,
                v.alimentos,
                v.hospedaje,
                v.taxis,
                v.pasajes,
                v.noDeduVia,
                u.id_gastosudn,
                u.papeleria,
                u.materialempaque,
                u.equipoSeguridad,
                u.infracciones,
                u.plomeria,
                u.ferreteria,
                u.impuestos,
                u.sistemas as sistemasgastos,
                u.cajachica,
                u.asesoria,
                u.arrenamunidades,
                u.servcomputo,
                u.noDeduUDN,
                f.id_fletes,
                f.maniobras,
                f.infraccionesfletes,
                f.fletes,
                f.paqueteria,
                f.noDeduFletes,
                s.id_serviciosudn,
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
                a.merma,
                a.sistemas as sistemasALM,
                a.noDeduAlm
            FROM general g
                left JOIN vehiculos w
                ON w.id_general= g.id_general
                left JOIN viaticos v
                ON v.id_general = g.id_general
                left JOIN gastosudn u
                ON u.id_general = g.id_general
                left JOIN gastosfletes f
                ON f.id_general = g.id_general
                Left JOIN serviciosudn s
                ON s.id_general = g.id_general
                left JOIN almacen a
                ON a.id_general = g.id_general
                INNER JOIN empleados e
                ON e.id_empleados = g.id_empleados
                GROUP BY id_general";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    public function delete_registro($id_general) {
        $sql_update = "
            update
                general set
                    estatus = 0
            where id_general = " . $id_general;
        return $this->db->query($sql_update);
    }

    public function activate_registro($id_general) {
        $sql_update = "
            update
                general set
                    estatus = 1
            where id_general = " . $id_general;
        return $this->db->query($sql_update);
    }

    public function update_registros_almacen($merma, $sistemasAlm, $id_general, $noDeduAlm) {
        $sql_update = "
            update almacen set
            merma = '" . $merma . "',
            sistemas = '" . $sistemasAlm . "',
            noDeduAlm ='" . $noDeduAlm . "'
            where id_general = " . $id_general;
        return $this->db->query($sql_update);

    }
// *+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+
    public function update_registros_vehiculos($combustible, $casetas,
     $id_general,$serviunidades, $noDeduVehi) {
        $sql_update = "
            update vehiculos set
            combustible = '" . $combustible . "',
            casetas = '" . $casetas . "',
            ser_unidades = '" . $serviunidades . "',
            noDeduVehi ='" . $noDeduVehi . "'
            where id_general = " . $id_general;
        return $this->db->query($sql_update);

    }
    public function update_registros_viaticos($estacionamientoViaticos, $alimentos,$hospedaje
    ,$taxis,$pasajes, $id_general, $noDeduVia) {
        $sql_update = "
            update viaticos set
            estacionamientoViaticos = '" . $estacionamientoViaticos . "',
            alimentos = '" . $alimentos . "',
            hospedaje = '" . $hospedaje . "',
            taxis = '" . $taxis . "',
            pasajes = '" . $pasajes . "',
            noDeduVia ='" . $noDeduVia . "'
            where id_general = " . $id_general;
        return $this->db->query($sql_update);

    }
    public function update_registros_gastosudn($papeleria,$materialempaque,$equipoSeguridad,$infracciones,
    $plomeria,$ferreteria,$impuestos,$sistemasgastos,$cajachica,$asesoria,$arrenamunidades,$servcomputo,$id_general,$noDeduUDN) {
        $sql_update = "
            update gastosudn set
            papeleria = '" . $papeleria . "',
            materialempaque = '" . $materialempaque . "',
            equipoSeguridad = '" . $equipoSeguridad . "',
            infracciones = '" . $infracciones . "',
            plomeria = '" . $plomeria . "',
            ferreteria = '" . $ferreteria . "',
            impuestos = '" . $impuestos . "',
            sistemas = '" . $sistemasgastos . "',
            cajachica = '" . $cajachica . "',
            asesoria = '" . $asesoria . "',
            arrenamunidades = '" . $arrenamunidades . "',
            servcomputo = '" . $servcomputo . "',
            noDeduUDN ='" . $noDeduUDN . "'
            where id_general = " . $id_general;
        return $this->db->query($sql_update);

    }

    public function update_registros_gastosfletes($maniobras, 
    $infraccionesfletes,$fletes,$paqueteria, $id_general, $noDeduFletes) {
        $sql_update = "
            update viaticos set
            maniobras = '" . $maniobras . "',
            infraccionesfletes = '" . $infraccionesfletes . "',
            fletes = '" . $fletes . "',
            paqueteria = '" . $paqueteria . "',
            noDeduFletes ='" . $noDeduFletes . "'
            where id_general = " . $id_general;
        return $this->db->query($sql_update);

    }

    public function update_registros_serviciosudn($gas,$ServiciosAGL, $manttoGRAL, $ManttoAlmacen,$Internet,
    $limpieza, $seguros,$seguridad, $monitoreo, $plagas,$basura, $higiene, $publicidad,$fianzas, $almacenaje,
     $facturacion,$gastolegal, $id_general, $noDeduServ) {
        $sql_update = "
            update serviciosudn set
            gas = '" . $gas . "',
            ServiciosAGL = '" . $ServiciosAGL . "',
            manttoGRAL = '" . $manttoGRAL . "',
            ManttoAlmacen = '" . $ManttoAlmacen . "',
            Internet = '" . $Internet . "',
            limpieza = '" . $limpieza . "',
            seguros = '" . $seguros . "',
            seguridad = '" . $seguridad . "',
            monitoreo = '" . $monitoreo . "',
            plagas = '" . $plagas . "',
            basura = '" . $basura . "',
            higiene = '" . $higiene . "',
            publicidad = '" . $publicidad . "',
            fianzas = '" . $fianzas . "',
            almacenaje = '" . $almacenaje . "',
            facturacion = '" . $facturacion . "',
            gastolegal = '" . $gastolegal . "',
            noDeduServ ='" . $noDeduServ . "'
            where id_general = " . $id_general;
        return $this->db->query($sql_update);

    }

    public function update_detalles_gastos($array) {
        $nombre_tabla   = $array['nombre_tabla'];
        $nombre_id_hija = $array['nombre_id_hija'];
        $no_factura     = $array['no_factura'];
        $subtotal       = $array['subtotal'];
        $iva            = $array['iva'];
        $total          = $array['total'];
        $id             = $array['id'];
        $sql_update     = "update {$nombre_tabla}
            set no_factura = {$no_factura}, sub_total = {$sub_total},
            iva = {$iva}, total {$total}
            where {$nombre_id_hijo} = $id";
    }

// *+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+


    public function update_gastos_combustible($no_factura, $sub_total, $iva, $id_vehiculos, $total) {
        $sql_update = "
            update combustible set
            no_factura = '" . $no_factura . "',
            sub_total = '" . $sub_total . "',
            iva ='" . $iva . "'
            total ='" . $total . "'
            where id_vehiculos = " . $id_vehiculos;
        return $this->db->query($sql_update);

    }

    public function select_detalle_gastos_inputs($nombre_id_hija,
        $nombre_tabla_hija, $id, $nombre_id_padre) {
        $sql_consulta = "select {$nombre_id_hija} as id, no_factura, sub_total,
            iva, total from {$nombre_tabla_hija} where {$nombre_id_padre} = {$id}";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
}
