<?php

Class Modelomodulo extends CI_Model
{
    private $query;

    public function getModules()
    {
        $this->query = "SELECT a.id_modulo, a.nombre_modulo, a.descrip_modulo, a.estado AS estado_num,
        						CASE WHEN a.estado = 1 THEN 'Activo' ELSE 'Inactivo' END AS estado,
                                b.nombre, b.link_menu
        				FROM sg_modulos a
                        LEFT JOIN sg_menu b ON (b.id_modulo = a.id_modulo);";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
        	return $sql->result();
        }else{
        	return false;
        }
        
    }

    public function saveModule($nombre,$descripcion)
    {
    	$this->query = "INSERT INTO sg_modulos (nombre_modulo,descrip_modulo,estado)
    					VALUES ('$nombre','$descripcion',1)";

    	$sql = $this->db->query($this->query);

    	if($sql){
    		return $this->db->insert_id();
    	}else{
    		return false;
    	}
    }

    public function saveMenuItem($nombreItem,$linkItem,$idModulo)
    {
        $this->query = "INSERT INTO sg_menu (nombre,link_menu,id_modulo)
                        VALUES ('$nombreItem','$linkItem',$idModulo);";

        $sql = $this->db->query($this->query);

        if($sql){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }    

    public function editModule($id_modulo,$nombre,$descripcion)
    {
        $this->query = "UPDATE sg_modulos
                        SET nombre_modulo = '$nombre',
                        descrip_modulo = '$descripcion'
                        WHERE id_modulo = $id_modulo;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function editMenuItem($nombreItem,$linkItem,$idModulo)
    {
        $this->query = "UPDATE sg_menu
                        SET nombre = '$nombreItem',
                        link_menu = '$linkItem'
                        WHERE id_modulo = $idModulo;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }        
    }

    public function enabledDisabledModule($id_modulo,$estado)
    {
        $this->query = "UPDATE sg_modulos
                        SET estado = $estado
                        WHERE id_modulo = $id_modulo;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function getModuleById($id_modulo)
    {
        $this->query = "SELECT *
                        FROM sg_modulos a
                        LEFT JOIN sg_menu b ON (b.id_modulo = a.id_modulo)
                        WHERE a.id_modulo = $id_modulo;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return false;
        }
    }
}