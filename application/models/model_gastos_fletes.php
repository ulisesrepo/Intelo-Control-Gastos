<?php

class model_gastos_fletes extends CI_Model
{

    public function insert_gastos_fletes($id_general, $array_data)
    {
        $maniobras          = $array_data['inmaniobras'];
        $infraccionesfletes = $array_data['infraccionesFletes'];
        $fletes             = $array_data['inputfletes'];
        $paqueteria         = $array_data['inputpaqueteria'];
        $noDeduFletes       = $array_data['noDeduFletes'];

        $sql_insert_Gastosfletes = "insert into gastosfletes values(null,'"
            . $maniobras . "','"
            . $infraccionesfletes . "','"
            . $fletes . "','"
            . $paqueteria . "','"
            . $noDeduFletes . "',"
            . $id_general . ")";
            $this->db->query($sql_insert_Gastosfletes);
            return $this->db->insert_id();
    }

    public function select_fletes()
    {
        $sql_consulta = "
            Select
                e.nombre,
                e.apellidos,
                f.maniobras,
                f.infraccionesfletes,
                f.fletes,
                f.paqueteria,
                f.noDeduFletes,
                g.Empresa,
                g.Dia_gasto,
                g.Plaza,
                g.Fecha_captura,
                g.id_general
            from
                general g
                inner join gastosfletes f on g.id_general = f.id_general
                inner join empleados e on e.id_empleados = g.id_empleados
                where g.estatus = 1";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
}
