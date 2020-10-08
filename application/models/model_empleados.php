<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empleados_model extends CI_Model {

    // public function insert_productos_empleado($array) {
    //     $id_producto         = $array['id_producto'];
    //     $id_rel_er_el        = $array['id_rel_er_el'];
    //     $vigencia            = $array['vigencia'];
    //     $referencia          = $array['referencia'];
    //     $fecha_contratacion  = $array['fecha_contratacion'];
    //     $sql_insert_producto = "insert into Empleado_producto values(null,"
    //         . $id_producto . ","
    //         . $id_rel_er_el . ",'"
    //         . $vigencia . "','"
    //         . $referencia . "','"
    //         . $fecha_contratacion . "','PENDIENTE','DESACTIVADO')";
    //     return $this->db->query($sql_insert_producto);
    // }

    public function select_empleados($id_empleados) {
        $sql_select = "
            select
                emp.id_empleados,
                ee.id_rel_er_el,
                em.nombre_comercial,
                concat(emp.nombre , ' ' , emp.apellido_1 , ' ' , emp.apellido_2) nombre,
                emp.tel_cel,
                emp.email,
                emp.fecha_alta,
                emp.app_activa
            from
                Empre_empleado ee
                inner join Empleados emp on ee.id_empleados = emp.id_empleados
                inner join Empresa_1 em on ee.id_empresa = em.id_empresa
            where  emp.estatus = 1 and em.id_empresa = " . $id_empleados;
        $query = $this->db->query($sql_select);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    // public function select_producto_emp($id_empleado) { 
    //     $sql_select = "
    //         select
    //             ep.id_empleado_producto,
    //             ep.vigencia,
    //             ep.fecha_contratacion,
    //             ep.referencia,
    //             p.descripcion_producto
    //         from
    //             Producto p
    //             inner join Empleado_producto ep on p.id_producto = ep.id_producto
    //             inner join Empre_empleado ee on ep.id_rel_er_el = ee.id_rel_er_el
    //         where
    //             ep.estatus_solicitud = 'APROBADA'
    //             and  ee.id_rel_er_el = " . $id_empleado;
    //     $query = $this->db->query($sql_select);
    //     return ($query->num_rows() <= 0) ? null : $query->result();
    // }

    // public function select_productos($id_empresa) {
    //     $sql_select = "
    //         select
    //             p.id_producto,
    //             p.descripcion_producto
    //         from
    //             Producto p
    //             inner join Cliente_producto cp on p.id_producto = cp.id_producto
    //         where cp.id_empresa = " . $id_empresa;
    //     $query = $this->db->query($sql_select);
    //     return ($query->num_rows() <= 0) ? null : $query->result();
    // }

    public function exist_email_update($email, $id_empleado) {
        $sql_select = "
            select id_empleados
            from Empleados
            where
                email like binary '$email'
                 and id_empleados not in (" . $id_empleado . ")";
        $query = $this->db->query($sql_select);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function exist_tel_update($tel_cel, $id_empleado) {
        $sql_select = "
            select id_empleados
            from Empleados
            where
                tel_cel like binary '$tel_cel'
                 and id_empleados not in (" . $id_empleado . ")";
        $query = $this->db->query($sql_select);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function update_empleado($email, $app_activa, $tel_cel, $id_empleado) {
        $sql_update = "
            update Empleados set
            email = '" . $email . "',
            app_activa = " . $app_activa . ",
            tel_cel = '" . $tel_cel . "'
            where id_empleados = " . $id_empleado;
        return $this->db->query($sql_update);
    }

    public function delete_empleado($id_empleado) {
        $sql_update = "
            update
                Empleados set
                    estatus = 0,
                    app_activa = 0
            where id_empleados = " . $id_empleado;
        return $this->db->query($sql_update);
    }

    // public function delete_empleado_producto($id_empleado_producto) {
    //     $sql_update = "update Empleado_producto set estatus = 0 where id_empleado_producto = " . $id_empleado_producto;
    //     return $this->db->query($sql_update);
    // }
}
