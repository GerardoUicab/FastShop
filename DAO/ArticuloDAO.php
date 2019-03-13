<?php
 include '../BO/ArticuloBO.php';
 include '../BO/CombinacionBO.php';


 class ArticuloDAO
 {
     public function ArticuloDAO()
     {
        
     }

    public function Agregar($objArticulo)
    {
        $conex=Conexion::conectar();
        
        $fotoArticulo=$objArticulo->getFotoArticulo();
        $nombreArticulo=$objArticulo->getNombreArticulo();
        $reseñaArtiulo=$objArticulo->getReseñaArticulo();
        $precioArticulo=$objArticulo->getPrecio();
        $idMarca=$objArticulo->getIdmarca();
        $categoria=$objArticulo->getCategoria();
        $fechaSubido=$objArticulo->getFechaSubido();
        $idUsuario=$objArticulo->getIdUsuario();

        $cmd="INSERT INTO Articulo(NombreArt,ReseñaArt,FotoArt,FechaSubido,id_Usuario,id_Categoria,id_Marca,CostoEnvio)Values('$nombreArticulo','$reseñaArtiulo','$fotoArticulo','$fechaSubido',$idUsuario,$categoria,$idMarca,'$precioArticulo')";
        if(!$conex->query($cmd))
        {
            print 'Error al insertar';
        }
        else{
            print 'Insertado con exito';
        }
        $conex=null;
    }
    public function insertarCombinacion($objCombi)
    {
        $conex=Conexion::conectar();
        $precio=$objCombi->getPrecio();
        $stock=$objCombi->getStock();
        $idArticulo=$objCombi->getIdArticulo();
        $comando="INSERT INTO Combinacion (precio, stock,id_Articulo) values('$precio','$stock','$idArticulo')";
        if(!$conex->query($comando))
        {
            Print 'Error al guardar'.$comando;
        }
        else
        {
            print 'Guardado';
        }
        $conex=null;
    }

 }
 
 
 
 
 
 
 
 
 
 ?>