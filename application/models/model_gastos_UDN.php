<?php

class model_gastos_UDN extends CI_Model {

    public function insert_gastos_UDN($id_general, $array_data) {
        $papeleria          = $array_data['inputpapeleria'];
        $materialempaque    = $array_data['empaque'];
        $equipoSeguridad    = $array_data['inputequipoSeguridad'];
        $infracciones       = $array_data['infracciones'];
        $plomeria           = $array_data['plomeria'];
        $ferreteria         = $array_data['ferreteria'];
        $impuestos          = $array_data['inputimpuestos'];
        $sistemas           = $array_data['inputsistemas'];
        $cajachica          = $array_data['inputcaja'];
        $asesoria           = $array_data['asesoria'];
        $arrenamunidades    = $array_data['inputarreunidades'];
        $servcomputo        = $array_data['inputcomputo'];
        $noDeduUDN          = $array_data['noDeduGastos'];

    $sql_insert_gastos = "insert into gastosudn values(null,'"
            . $papeleria . "','"
            . $materialempaque . "','"
            . $equipoSeguridad . "','"
            . $infracciones . "','"
            . $plomeria . "','"
            . $ferreteria . "','"
            . $impuestos . "','"
            . $sistemas . "','"
            . $cajachica . "','"
            . $asesoria . "','"
            . $arrenamunidades . "','"
            . $servcomputo . "','"
            . $noDeduUDN ."',"
            . $id_general .")";

            $this->db->query($sql_insert_gastos);
         return $this->db->insert_id();
    }

    public function select_gastosudn()
    {
        $sql_consulta = "
            Select
                e.nombre,
                e.apellidos,
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
                g.Empresa,
                g.Dia_gasto,
                g.Plaza,
                g.Fecha_captura,
                g.id_general
            from
                general g
                inner join gastosudn u on g.id_general = u.id_general
                inner join empleados e on e.id_empleados = g.id_empleados
                where g.estatus = 1";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
}