<?php

Class Modelomodulo extends CI_Model
{
    private $query;

    public function getModules()
    {
        $this->query = "SELECT id_modulo, nombre_modulo, descrip_modulo, estado AS estado_num,
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
    	$this->query = "INSERT INTO sg_modulos (nombre_modulo,descrip_modulo,estado)
    					VALUES ('$nombre','$descripcion',1)";

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
        $this->query = "SELECT * FROM sg_modulos
                        WHERE id_modulo = $id_modulo;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return false;
        }
    }
}