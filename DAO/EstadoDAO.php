<?php
include '../BO/EstadoBO.php';
include 'Conexion.php';
class EstadoDAO
{   
    public function EstadoDAO()
    {
        
    }
    public function insertar($objEstado)
    {
        # code...
        $conex=Conexion::conectar();
        $nombre=$objEstado->getNombre();
        $idPais=$objEstado->getIdPais();

        $cmd="insert into estado(NombreEstado, id_Pais) values('$nombre','$idPais')";

        if(!$conex->query($cmd))
        {
            print '<div class="alert alert-danger">Error al insertar</div>';
        }
        else
        {
            print '<div class="alert alert-primary"">Guardado con exito</div>';
        }

        $conex=null;
    }

    public function Modificar($objEstado)
    {
        

    }

}
?>