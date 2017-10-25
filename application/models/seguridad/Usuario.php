<?php

Class Usuario extends CI_Model
{
    private $query;

    public function getUser($password, $email)
    {
        $this->query = "SELECT  a.id_usuario, a.correoe
                        FROM    sg_usuarios a
                        INNER   JOIN sg_asignaperfil b ON (b.id_usuario = a.id_usuario)
                        INNER   JOIN sg_perfiles c ON (c.id_perfil = b.id_perfil)
                        WHERE   a.contrasena = SHA1('$password')
                        AND     a.correoe = '$email'
                        AND     b.id_perfil = 1
                        AND     c.estado_perfil = 1
                        AND     a.estado = 1;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return false;
        }
    }

    public function getProfiles($id_user)
    {

    }

    public function getModules($id_usuario)
    {
        $this->query = "SELECT e.id_modulo, e.nombre_modulo, f.nombre, f.link_menu
                        FROM sg_usuarios a
                        inner join sg_asignaperfil b ON (b.id_usuario = a.id_usuario)
                        inner join sg_perfiles c ON (c.id_perfil = b.id_perfil)
                        inner join sg_asignamodulo d ON (d.id_perfil = c.id_perfil)
                        inner join sg_modulos e ON (e.id_modulo = d.id_modulo)
                        inner join sg_menu f ON (f.id_modulo = e.id_modulo)
                        where a.id_usuario = $id_usuario
                        ORDER BY f.nombre ASC;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->result();
        }else{
            return false;
        }        
    }

    public function getRoles($id_modulo)
    {
        $this->query = "SELECT c.id_rol, c.nombre_rol, d.nombre, d.link_menu
                        FROM sg_asignamodulo a
                        inner join sg_asignarol b ON (b.id_asignamodulo = a.id_asignamodulo)
                        inner join sg_roles c ON (c.id_rol = b.id_rol)
                        inner join sg_submenu d ON (d.id_rol = c.id_rol)
                        WHERE a.id_modulo = $id_modulo";
        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->result();
        }else{
            return false;
        }                        
    }
}