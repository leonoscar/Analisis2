<?php

Class ModeloPermiso extends CI_Model
{
    private $query;

    public function getPerfilesAsignacion($id_usuario = false)
    {
        $this->query = "SELECT a.id_perfil, a.nombre_perfil, b.id_asignaperfil, b.estado,
						CASE WHEN b.id_asignaperfil is not null
							THEN 
                                CASE WHEN b.estado = 1
                                    THEN 'Asignado'
                                    ELSE 'No asignado'
                                END
							ELSE 'No asignado' 
						END estado_asignacion
						FROM sg_perfiles a
						LEFT JOIN sg_asignaperfil b ON (b.id_perfil = a.id_perfil AND b.id_usuario = $id_usuario)";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
        	return $sql->result();	
        }else{

        }
        
        # return $this->db->insert_id();
    }

    public function getUserById($id_usuario)
    {
    	$this->query = "SELECT id_usuario, correoe, estado FROM sg_usuarios WHERE id_usuario = $id_usuario";

    	$sql = $this->db->query($this->query);

    	if($sql->num_rows() > 0){
    		return $sql->row();
    	}else{
    		return false;
    	}
    }

    public function asignarDesasignarPerfil($id_usuario,$id_perfil,$estado)
    {
        $this->query = "SELECT * FROM sg_asignaperfil 
                        WHERE id_usuario = $id_usuario 
                        AND id_perfil = $id_perfil";

        $getAsignacion = $this->db->query($this->query);

        if($getAsignacion->num_rows() > 0){
            $this->query = "UPDATE sg_asignaperfil
                            SET estado = $estado
                            WHERE id_usuario = $id_usuario
                            AND id_perfil = $id_perfil;";

            $sql = $this->db->query($this->query);
        }else{
            $this->query = "INSERT INTO sg_asignaperfil (id_usuario,id_perfil,estado)
                            VALUES ($id_usuario,$id_perfil,$estado);";

            $sql = $this->db->query($this->query);
        }

        if($sql){
            return true;
        }else{
            return false;
        }
    }
}