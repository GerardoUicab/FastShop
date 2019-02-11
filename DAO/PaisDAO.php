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
            print '<script languaje="JavaScript">alert("Guardado!");</script>';
        }
        $con=null;

    }


}