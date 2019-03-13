<?php
include '../BO/DetalleCarritoBO.php';

class DetalleCarritoDAO
{

    public function DetalleCarritoDAO()
    {
        
    }

    public function insertarDetalle($objCarrito)
    {
        $conex=Conexion::conectar();
        $piezasProduc=$objCarrito->getIdDetalleCarrito();
        $precioProducto=$objCarrito->getPrecioProducto();
        $idArticulo=$objCarrito->getidArticulo();
        $idUsuario=$objCarrito->getIdUsuario();
        $statusDetalleCarrito=$objCarrito->getStatusDetalleCarrito();

        $cmd="INSERT INTO DetalleCarrito (PiezasProduc,PrecioProduc,id_Articulo,id_Usuario,StatusDetalleCarrito)
        Values('$piezasProduc','$precioProducto','$idArticulo','$idUsuario','$statusDetalleCarrito')";

        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("Se agrego al carrito");</script>';

        }
        else
        {
            print '<script languaje="JavaScript">alert("Se agrego al carrito");</script>';
        }
    }

}






?>