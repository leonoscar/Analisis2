<?php

Class Usuario extends CI_Model
{
    private $query;

    public function getUser($password, $email)
    {
        $this->query = "SELECT  id_usuario, correoe, estado 
                        FROM    usuarios
                        WHERE   contrasena = SHA1('$password')
                        AND     correoe = '$email'";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() == 1){
            return $sql->row();
        }else{
            return false;
        }
    }
}