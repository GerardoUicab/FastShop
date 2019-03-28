<?php
include 'Conexion.php';
include '../BO/CarruselBO.php';

class CarruselDAO
{

     public function CarruselDAO()
    {
        
    }


    public function Insertar($objImagen)
    {
        $conex=Conexion::conectar();
        $nombreFoto=$objImagen->getNombreFoto();

        $cmd="INSERT INTO carrusel (NombreFoto) VALUES('$nombreFoto')";
        if(!$conex->query($cmd))
        {
            print "erro al insertar";
        }
        else
        {
            print '<div class="alert alert-danger">Guardado con exito</div>';
        }
        $conex=null;
    }

}























?>