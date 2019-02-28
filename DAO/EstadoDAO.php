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
        $conex=Conexion::conectar();
        $idEstado=$objEstado->getId();
        $nombreEstado=$objEstado->getNombre();
        $idPais=$objEstado->getIdPais();
        $cmd="update estado set NombreEstado=$nombreEstado, id_Pais=$idPais where id_Estado=$idEstado";

        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("Error al Modificar!");</script>';

        }
        else
        {
            print '<script languaje="JavaScript">alert("Modificado con exito!");</script>';
        }
        $conex=null;
        

    }

    public function Eliminar($objEstado)
    {
        $conex=Conexion::conectar();
        $idEstado=$objEstado->getId();
        $cmd="delete from estado where id_Estado=$idEstado";

        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("Error al Eliminar!");</script>';
        }
        else
        {
            print '<script languaje="JavaScript">alert("Eliminado con exito!");</script>';
        }
    }

}
?>