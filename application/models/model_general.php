<?php

class model_general extends CI_Model
{

    public function insert_general($array_data)
    {
        $Empresa            = $array_data['empresas'];
        $Dia_gasto          = $array_data['dia_gasto'];
        $Mes                = $array_data['Mes'];
        $Plaza              = $array_data['Plaza'];
        $Cliente            = $array_data['cliente'];
        $Fecha_captura      = $array_data['fecha_cap'];
        $id_empleado        = $this->session->userdata('id_empleados');
        $sql_insert_general = "insert into general values(null,'"
            . $Empresa . "','"
            . $Dia_gasto . "','"
            . $Mes . "','"
            . $Plaza . "','"
            . $Cliente . "','"
            . $Fecha_captura . "'," . $id_empleado . ")";
        $this->db->query($sql_insert_general);
        return $this->db->insert_id();
    }

    public function select_generales()
    {
        $sql_consulta = "
            Select
                g.Empresa,
                g.Dia_gasto,
                g.Mes,
                g.Plaza,
                g.Cliente,
                g.Fecha_captura
            from
                general g";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

}
