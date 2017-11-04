<?php

Class ModeloCliente extends CI_Model
{
    private $query;

    public function saveCliente($nombre,$apellido,$direccion,$nit,$telefono,$correo_electronico)
    {
        $this->query = "INSERT INTO cc_cliente
                        (idtipo_cliente,nombre_cliente,apellido_cliente,direccion_cliente,telefono_cliente,nit_cliente,
                        correo_cliente)
                        values(1,'$nombre','$apellido','$direccion',$telefono,'$nit','$correo_electronico')";

        $sql = $this->db->query($this->query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function getClientes()
    {
        $this->query = "SELECT CONCAT (nombre_cliente,' ',apellido_cliente) AS nombrecliente,
                        direccion_cliente,nit_cliente,telefono_cliente,direccion_cliente,correo_cliente 
                        FROM cc_cliente";

        $sql = $this->db->query($this->query);

        if($sql->num_rows() > 0){
            return $sql->result();
        }else{
            return false;
        }
    }
}