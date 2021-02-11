<?php

class model_gastos_vehiculos extends CI_Model
{

    public function insert_gastos_vehiculos($id_general, $array_data)
    {
        $unidad         = $array_data['unidad'];
        $km_inicial     = $array_data['km_inicial'];
        $km_final       = $array_data['km_final'];
        $km_total       = $array_data['km_total'];
        $lts_consumidos = $array_data['lts_consumidos'];
        $rendimiento    = $array_data['rendimiento'];
        $combustible    = $array_data['inputcombustible'];
        $casetas        = $array_data['inputcasetas'];
        $noDeduVehi     = $array_data['noDeduVehi'];
        $ser_unidades   = $array_data['inputserviunidades'];

        $sql_insert_vehiculos = "insert into vehiculos values(null,'"
            . $unidad . "','"
            . $km_inicial . "','"
            . $km_final . "','"
            . $km_total . "','"
            . $lts_consumidos . "','"
            . $rendimiento . "','"
            . $combustible . "','"
            . $casetas . "','"
            . $noDeduVehi . "','"
            . $ser_unidades . "',"
            . $id_general . ")";
        $this->db->query($sql_insert_vehiculos);
        return $this->db->insert_id();

    }

    // insert into vehiculos values('123','123','125','2','123','0.016260162601626','','','12344','',)

    public function select_vehiculos()
    {
        $sql_consulta = "
            Select
                e.nombre,
                e.apellidos,
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
                g.Empresa,
                g.Dia_gasto,
                g.Plaza,
                g.Fecha_captura,
                g.id_general
            from
                general g
                inner join vehiculos w on g.id_general = w.id_general
                inner join empleados e on e.id_empleados = g.id_empleados
                where g.estatus = 1";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
}
