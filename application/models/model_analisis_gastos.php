<?php

class model_analisis_gastos extends CI_Model {


    public function select_analisis()
    {
        $sql_consulta = 
        " 
        SELECT
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
        v.estacionamientoViaticos,
        v.alimentos,
        v.hospedaje,
        v.taxis,
        v.pasajes,
        v.noDeduVia,
        u.papeleria,
        u.materialempaque,
        u.equipoSeguridad,
        u.infracciones,
        u.plomeria,
        u.ferreteria,
        u.impuestos,
        u.sistemas,
        u.cajachica,
        u.asesoria,
        u.arrenamunidades,
        u.servcomputo,
        u.noDeduUDN,
        f.maniobras,
        f.infraccionesfletes,
        f.fletes,
        f.paqueteria,
        f.noDeduFletes,
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
        a.sistemas,
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

    public function delete_registro($id_general)
    {
        $sql_update = "
            update
                general set
                    estatus = 0
            where id_general = " . $id_general;
        return $this->db->query($sql_update);
    }

    public function activate_registro($id_general)
    {
        $sql_update = "
            update
                general set
                    estatus = 1
            where id_general = " . $id_general;
        return $this->db->query($sql_update);
    }

    public function update_registros_almacen($merma, $sistemasAlm, $id_general,$noDeduAlm)
    {
        $sql_update = "
            update almacen set
            merma = '" . $merma . "',
            sistemas = '" . $sistemasAlm . "',
            noDeduAlm ='" . $noDeduAlm . "'
            where id_general = " . $id_general;
        return $this->db->query($sql_update);

    }

    public function update_gastos_combustible($no_factura, $sub_total,$iva, $id_vehiculos,$total)
    {
        $sql_update = "
            update combustible set
            no_factura = '" . $no_factura . "',
            sub_total = '" . $sub_total . "',
            iva ='" . $iva . "'
            total ='" . $total . "'
            where id_vehiculos = " . $id_vehiculos;
        return $this->db->query($sql_update);

    }
}
