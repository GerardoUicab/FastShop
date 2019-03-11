<?php
include 'Conexion.php';
include '../BO/MarcaBO.php';

class MarcaDAO
{
    public function MarcaDAO()
    {
        
    }

    public function InsertarMarca($objMarca)
    {
        $conex=Conexion::conectar();
        $NombreMarca=$objMarca->getNombre();
        $FotoMarca=$objMarca->getFotoMarca();

        $cmd="INSERT INTO marca(NombreMarca,FotoMarca)Values('$NombreMarca','$FotoMarca')";

        if(!$conex->query($cmd))
        {
            print "erro al insertar";
        }
        else
        {
            print "Guardado con exito";
        }

    }





}




?>