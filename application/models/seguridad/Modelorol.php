<?php

Class ModeloRol extends CI_Model
{
    private $query;

    public function getRoles()
    {
        $this->query = "SELECT a.id_rol, a.nombre_rol, a.descrip_rol, a.estado_rol AS estado_num,
        						CASE WHEN a.estado_rol = 1 THEN 'Activo' ELSE 'Inactivo' END AS estado,
                                b.nombre, b.link_menu
        				FROM sg_roles a
                        LEFT JOIN sg_submenu b ON (b.id_rol = a.id_rol);";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
        	return $sql->result();
        }else{
        	return false;
        }
        
    }

    public function saveRol($nombre,$descripcion)
    {
    	$this->query = "INSERT INTO sg_roles (nombre_rol,descrip_rol,estado_rol)
    					VALUES ('$nombre','$descripcion',1)";

    	$sql = $this->db->query($this->query);

    	if($sql){
    		return $this->db->insert_id();
    	}else{
    		return false;
    	}
    }

    public function saveSubmenuItem($nombreItem,$linkItem,$idRol)
    {
        $this->query = "INSERT INTO sg_submenu (nombre,link_menu,id_rol)
                        VALUES ('$nombreItem','$linkItem',$idRol);";

        $sql = $this->db->query($this->query);

        if($sql){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function editRol($id_rol,$nombre,$descripcion)
    {
        $this->query = "UPDATE sg_roles
                        SET nombre_rol = '$nombre',
                        descrip_rol = '$descripcion'
                        WHERE id_rol = $id_rol;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function editSubmenuItem($nombre_item,$link_menu,$id_rol)
    {
        $this->query = "UPDATE sg_submenu
                        SET nombre = '$nombre_item',
                        link_menu = '$link_menu'
                        WHERE id_rol = $id_rol;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function enabledDisabledRol($id_rol,$estado)
    {
        $this->query = "UPDATE sg_roles
                        SET estado_rol = $estado
                        WHERE id_rol = $id_rol;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function getRolById($id_rol)
    {
        $this->query = "SELECT a.id_rol, a.nombre_rol, a.descrip_rol,
                        b.id_submenu, b.nombre, b.link_menu
                        FROM sg_roles a
                        LEFT JOIN sg_submenu b ON (b.id_rol = a.id_rol)
                        WHERE a.id_rol = $id_rol;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return false;
        }
    }
}