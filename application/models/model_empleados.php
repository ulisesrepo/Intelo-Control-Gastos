<?php

class model_empleados extends CI_Model
{

    public function insert_empleados($array_data)
    {
        $nombre               = $array_data['nombre'];
        $apellidos            = $array_data['apellidos'];
        $email                = $array_data['email'];
        $password             = $array_data['password'];
        $sucursal             = $array_data['sucursal'];
        $id_usuario           = $array_data['id_usuario'];
        $sql_insert_empleados = "insert into empleados values(null,'"
            . $nombre . "','"
            . $apellidos . "','"
            . $email . "','"
            . $password . "','"
            . $sucursal . "',1,'"
            . $id_usuario . "')";

        return $this->db->query($sql_insert_empleados);
    }

    public function select_empleados()
    {
        $sql_consulta = "
            Select
                e.id_empleados,
                e.nombre,
                e.apellidos,
                e.email,
                e.sucursal,
                e.estatus,
                u.id_usuario
            from
                usuarios u
                inner join empleados e on u.id_usuario = e.id_usuario";

        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    public function existe_email($email)
    {
        $sql_consulta = "select id_empleados from empleados where email like BINARY '$email'";
        $query        = $this->db->query($sql_consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function exist_email_update($email, $id_empleado)
    {
        $sql_consulta = "
            select id_empleados
            from empleados
            where email like BINARY '$email' and id_empleados not in ('.$id_empleado.')";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function return_password($id_empleado)
    {
        $sql_consulta = "select password from empleados where id_empleados = '.$id_empleado'";
        $query        = $this->db->query($sql_consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function delete_empleado($id_empleado)
    {
        $sql_update = "
            update
                empleados set
                    estatus = 0
            where id_empleados = " . $id_empleado;
        return $this->db->query($sql_update);
    }

    public function activate_empleado($id_empleado)
    {
        $sql_update = "
            update
                empleados set
                    estatus = 1
            where id_empleados = " . $id_empleado;
        return $this->db->query($sql_update);
    }

    public function update_usuario($email, $password,$sucursal, $id_usuario, $id_empleado)
    {
        $sql_update = "
            update empleados set
            email = '" . $email . "',
            password = '" . $password . "',
            sucursal = '" . $sucursal . "',
            id_usuario = " . $id_usuario . "
            where id_empleados = " . $id_empleado;
        return $this->db->query($sql_update);

    }

    public function select_usuario() {
        $sql_consulta = "select id_usuario, tipo_usuario from usuarios";
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    public function select_empresa_caratula($fecha_comprobacion, $id_empleado)
    {
        $consulta = " Select id_general, Empresa from general 
            where Fecha_captura = '$fecha_comprobacion' 
                and id_empleados = $id_empleado ";
        $query    = $this->db->query($consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }
    public function select_empleado_caratula(){
        $consulta="";
    }

    public function select_caratula_vehiculos($id_general)
    {
        $sql_gastos_vehiculos = "
            Select
                w.combustible,
                w.casetas,
                g.id_general
            from general g
                inner join vehiculos w on g.id_general = w.id_general
            where g.id_general = $id_general";
        $query = $this->db->query($sql_gastos_vehiculos);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    public function select_caratula_viaticos($id_general)
    {
        $sql_gastos_viaticos = "
            Select
                v.estacionamientoViaticos,
                v.alimentos,
                v.hospedaje,
                v.pasajes,
                g.id_general
            from general g
                inner join viaticos v on g.id_general = v.id_general
                where g.id_general = $id_general";

        $query = $this->db->query($sql_gastos_viaticos);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    public function select_caratula_gastosudn($id_general)
    {
        $sql_gastos_gastosudn = "
            Select
                u.papeleria,
                u.impuestos,
                u.sistemas,
                u.cajachica,
                u.arrenamunidades,
                u.servcomputo,
                g.id_general
            from
                general g
            inner join gastosudn u on g.id_general = u.id_general
            where g.id_general = $id_general";

        $query = $this->db->query($sql_gastos_gastosudn);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    public function select_caratula_fletes($id_general)
    {
        $sql_gastos_fletes = "
            Select
                f.maniobras,
                f.infraccionesfletes,
                f.fletes,
                f.paqueteria,
                g.id_general
            from general g
                inner join gastosfletes f on g.id_general = f.id_general
                where g.id_general = $id_general";
        $query = $this->db->query($sql_gastos_fletes);
        return ($query->num_rows() <= 0) ? null : $query->result();

    }

    public function select_caratula_servudn($id_general)
    {
        $sql_gastos_servudn = "
        Select
            s.gas,
            s.arrendamientoinmuebles,
            s.ServiciosAGL,
            s.Internet,
            s.monitoreo,
            s.fianzas,
            s.facturacion,
            g.id_general
        from
            general g
            inner join serviciosudn s on g.id_general = s.id_general
            where g.id_general = $id_general";
        $query = $this->db->query($sql_gastos_servudn);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

}
