<?php

Class ModeloPerfil extends CI_Model
{
    private $query;

    public function getPerfiles()
    {
        $this->query = "SELECT id_perfil, nombre_perfil, descrip_perfil, estado_perfil AS estado_num,
        						CASE WHEN estado_perfil = 1 THEN 'Activo' ELSE 'Inactivo' END AS estado
        				FROM sg_perfiles;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
        	return $sql->result();
        }else{
        	return false;
        }
        
    }

    public function savePerfil($nombre,$descripcion)
    {
    	$this->query = "INSERT INTO sg_perfiles (nombre_perfil,descrip_perfil,estado_perfil)
    					VALUES ('$nombre','$descripcion',1)";

    	$sql = $this->db->query($this->query);

    	if($sql){
    		return $this->db->insert_id();
    	}else{
    		return false;
    	}
    }

    public function editPerfil($id_perfil,$nombre,$descripcion)
    {
        $this->query = "UPDATE sg_perfiles
                        SET nombre_perfil = '$nombre',
                        descrip_perfil = '$descripcion'
                        WHERE id_perfil = $id_perfil;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function enabledDisabledPerfil($id_perfil,$estado)
    {
        $this->query = "UPDATE sg_perfiles
                        SET estado_perfil = $estado
                        WHERE id_perfil = $id_perfil;";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function getPerfilById($id_perfil)
    {
        $this->query = "SELECT * FROM sg_perfiles
                        WHERE id_perfil = $id_perfil;";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return false;
        }
    }
}