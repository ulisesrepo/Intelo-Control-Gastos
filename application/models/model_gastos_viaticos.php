<?php

class model_gastos_viaticos extends CI_Model
{

    public function insert_gastos_viaticos($id_general, $array_data)
    {
        $estacionamientoViaticos = $array_data['inputestacionamientoViaticos'];
        $alimentos               = $array_data['inputalimentos'];
        $hospedaje               = $array_data['inputhospedaje'];
        $taxis                   = $array_data['taxis'];
        $pasajes                 = $array_data['inputpasajes'];
        $noDeduVia               = $array_data['noDeduVia'];

        $sql_insert_viaticos = "insert into viaticos values(null,'"
            . $estacionamientoViaticos . "','"
            . $alimentos . "','"
            . $hospedaje . "','"
            . $taxis . "','"
            . $pasajes . "','"
            . $noDeduVia . "',"
            . $id_general . ")";

         $this->db->query($sql_insert_viaticos);
         return $this->db->insert_id();
    }
    

    public function select_viaticos()
    {
        $sql_consulta = "
            Select
                v.estacionamientoViaticos,
                v.alimentos,
                v.hospedaje,
                v.taxis,
                v.pasajes,
                v.noDeduVia,
                g.Empresa,
                g.Dia_gasto,
                g.Plaza,
                g.Fecha_captura
            from
                general g
                inner join viaticos v on g.id_general = v.id_general";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
}
