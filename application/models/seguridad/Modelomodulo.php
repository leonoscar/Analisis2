<?php

Class Modelomodulo extends CI_Model
{
    private $query;

    public function getModules()
    {
        $this->query = "SELECT nombre_modulo, descrip_modulo, estado AS estado_num,
        						CASE WHEN estado = 1 THEN 'Activo' ELSE 'Inactivo' END AS estado
        				FROM sg_modulos;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
        	return $sql->result();
        }else{
        	return false;
        }
        
    }

    public function saveModule($nombre,$descripcion)
    {
    	$this->query = "INSERT INTO sg_modulos (nombre_modulo,descrip_modulo,1)
    					VALUES ('{$nombre}','{$descripcion}')";

    	$sql = $this->db->query($this->query);

    	if($sql->num_rows() > 0){
    		return $this->db->insert_id();
    	}else{
    		return false;
    	}
    }
}