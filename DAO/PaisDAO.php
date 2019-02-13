<?php
include '../BO/PaisBO.php';
include 'Conexion.php';
class PaisDAO
{

    public function PaisDAO()
    {

    }

    public function insertar($objPais)
    {
        $con=Conexion::conectar();
        $nombre=$objPais->getNombre();

        $ejecu="insert into pais (nombrePais) values('$nombre')";

        if(!$con->query($ejecu))
        {
            print "erro al insertar";
        }
        else
        {   
            print '<div class="alert alert-danger">Guardado con exito</div>';
        }
        $con=null;

    }

    public function modificar($objPais)
    {
        $con=Conexion::conectar();
        $id=$objPais->getId();
        $nombre=$objPais->getNombre();

        $eje="update pais set NombrePais='$nombre' where id_Pais=$id";
        if(!$con->query($eje))
        {
            print '<script languaje="JavaScript">alert("Error al Modificar!");</script>';

        }
        else
        {
            print '<script languaje="JavaScript">alert("Modificado!");</script>';
        }
        $con=null;
    }

    public function eliminar($objPais)
    {
        $con=Conexion::conectar();
        $id=$objPais->getId();

        $ejecutar="delete from pais where id_Pais=$id";

        if(!$con->query($ejecutar))
        {
            print '<script languaje="JavaScript">alert("Error al eliminar!");</script>';
        }
        else
        {
            print '<script languaje="JavaScript">alert("Eliminado!");</script>';
        }

    }

}