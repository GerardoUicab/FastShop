<?php
    include '../BO/CategoriaBO.php';
    include 'Conexion.php';


    class CategoriaDAO
    {

        public function CategoriaDAO()
        {

        }

        public function insertar($objcate)
        {
            $con=Conexion::conectar();
            $nombre=$objcate->getNombre();
            $id_sub=$objcate->getId_sub();
            $FotoCategoria=$objcate->getFotoCategoria();

            $ejecu="insert into Categoria (NombreCategoria,id_SubCate,fotoCategoria) values ('$nombre',$id_sub,'$FotoCategoria')";
    
            if(!$con->query($ejecu))
            {
                print '<script languaje="JavaScript">alert("Error al agregar");</script>';
            }
            else
            {   
                print '<script languaje="JavaScript">alert("Guardado");</script>';
            }
            $con=null;

        }








    }










?>