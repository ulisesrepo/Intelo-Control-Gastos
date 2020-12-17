<?php

class model_gastos_almacen extends CI_Model {

    public function insert_gastos_almacen($id_general,$array_data) {
        // return $this->db->insert("vehiculos", $array_vehiculos);

        $merma        = $array_data['merma'];
        $sistemas     = $array_data['sistemasAlm'];
        $noDeduAlm    = $array_data['noDeduAlm'];

       $sql_insert_almacen = "insert into almacen values(null,'"
            . $merma . "','"
            . $sistemas . "','"
            . $noDeduAlm ."',"
            . $id_general .")";
        return $this->db->query($sql_insert_almacen);
    }

    public function select_almacen()
    {
        $sql_consulta = "
            Select
                e.nombre,
                e.apellidos,
                a.merma,
                a.sistemas,
                a.noDeduAlm,
                g.Empresa,
                g.Dia_gasto,
                g.Plaza,
                g.Fecha_captura,
                g.id_general
            from
                general g
                inner join almacen a on g.id_general = a.id_general
                inner join empleados e on e.id_empleados = g.id_empleados";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
}