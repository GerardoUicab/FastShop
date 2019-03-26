<?php
include '../BO/DetalleCarritoBO.php';
include '../BO/CarritoBO.php';
include '../BO/CalificarBO.php';

class DetalleCarritoDAO
{

    public function DetalleCarritoDAO()
    {
        
    }
     public function Calificar($objCali)
    {
        $conex=Conexion::conectar();
        $idCarrito=$objCali->getIdCarrito();
        $titulo=$objCali->getTitulo();
        $comentarios=$objCali->getComentario();
        $calificacion=$objCali->getCalificacion();
        $cmd="INSERT INTO calificar(calificacion,titulo,comentario,id_Carrito)
        values('$calificacion','$titulo','$comentarios','$idCarrito')";
        if(!$conex->query($cmd))
        {

            print '<script languaje="JavaScript">swal("Calificación de compra", "No se pudo Calificar","warning");</script>';
        }
        else
        {
            echo '<script>swal (
                {
                    title:"Calificación de compra",
                    text:"Gracias por calificar tu compra",
                    icon: "success",
                    button:"Aceptar",
    
                }).then((value)=>
                {
                    window.location.replace("PedidosCli.php");
                });</script>';
        }
    }
    public function carrito($objcar)
    {
        $conex=Conexion::conectar();
        $statusDetalleCarrito=$objcar->getStatusCar();
        $sub=$objcar->getSubTot();
        $tot=$objcar->getTotal();
        $idUs=$objcar->getIdUsu();
        $cos=$objcar->getCostoEnvioC();
        $cmd="INSERT INTO carrito(StatusCarrito,SubTotal,Total,id_Usuario,costoEnvioC)VALUES
        ('$statusDetalleCarrito','$sub','$tot','$idUs',$cos)";
        $conex->query($cmd);
        $select="SELECT max(id_Carrito)as mas from carrito where id_Usuario=$idUs and StatusCarrito='Pendiente'";
        $lisSele=$conex->prepare($select);
        $lisSele->execute();
        $listaSele=$lisSele->fetchAll();

        foreach($listaSele as $barri)
        {
            $idCar=$barri['mas'];
        }
        $actulizar="UPDATE detallecarrito set id_Carrito=$idCar where id_Usuario=$idUs 
        and StatusDetalleCarrito='No Pagado'";
        if(!$conex->query($actulizar))
        {
            print '<script languaje="JavaScript">alert("No se pudo");</script>';
        }
        else
        {
            
            

        }
        $conex=null;
    }
    public function PasoFinal($objPaso)
    {
        $conex=Conexion::conectar();
        $idUs=$objPaso->getIdUsu();
        $carrito="select dc.id_DetaCarrito,dc.id_Articulo,dc.PiezasProduc,dc.PrecioProduc,dc.costoEnvioD,ar.NombreArt,ar.ReseñaArt,ar.FotoArt
                from detallecarrito dc, articulo ar where dc.id_Articulo=ar.id_Articulo  and StatusDetalleCarrito='No Pagado' and dc.id_Usuario=$idUs";
                $lisCarrito=$conex->prepare($carrito);
                $lisCarrito->execute();
                $listaCarrito=$lisCarrito->fetchAll();
        foreach($listaCarrito as $valor)
        {
            $idArt=$valor['id_Articulo'];
        
            $select="SELECT Stock from combinacion where id_Articulo=$idArt";
            $lisSele=$conex->prepare($select);
            $lisSele->execute();
            $listaSele=$lisSele->fetchAll();
            foreach($listaSele as $columna)
            {
                $stock=$columna['Stock'];
            }
            $stockDes=$valor['PiezasProduc'];

            $resultado=$stock-$stockDes;
           
            $query="UPDATE combinacion set Stock=$resultado where id_Articulo='".$valor['id_Articulo']."'";
            $conex->query($query);

            $queryActualizar="UPDATE detallecarrito set StatusDetalleCarrito='Pagado' where id_DetaCarrito='".$valor['id_DetaCarrito']."'";
            $conex->query($queryActualizar);
        }
        $dato="select max(id_Carrito) as id from carrito where 
        StatusCarrito='Pendiente' and id_Usuario='".$idUs."'";
        $lisdato=$conex->prepare($dato);
        $lisdato->execute();
        $listadoDato=$lisdato->fetchAll();
        foreach($listadoDato as $obtener)
        {
            $varid=$obtener['id'];
        }
        $cmduodate="UPDATE carrito set StatusCarrito='Pagado' where id_Carrito=$varid";
        $conex->query($cmduodate);
        echo '<script>swal (
            {
                title:"Proceso terminado",
                icon: "success",
                button:"Aceptar",

            }).then((value)=>
            {
                window.location.replace("TerminarProceso.php");
            });</script>';
        $conex=null;
    }
    public function insertarDetalle($objCarrito)
    {
        $conex=Conexion::conectar();
        $piezasProduc=$objCarrito->getPiezasProduc();
        $precioProducto=$objCarrito->getPrecioProducto();
        $idArticulo=$objCarrito->getidArticulo();
        $idUsuario=$objCarrito->getIdUsuario();
        $CostoEnvioD=$objCarrito->getCostoEnvioD();
        $statusDetalleCarrito=$objCarrito->getStatusDetalleCarrito();

        $cmd="CALL ingresar('$piezasProduc','$precioProducto','$idArticulo','$idUsuario','$statusDetalleCarrito',$CostoEnvioD)";

        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("No se puede agregar al carrito");</script>';

        }
        else
        {
            
            print '<script languaje="JavaScript">swal("Producto agregado al carrito", "Bien hecho!","success");</script>';
           
        }
        $conex=null;
    }
    public function eliminarProductoRow($objd)
    {
        $conex=Conexion::conectar();
        $idDCarrito=$objd->getIdDetalleCarrito();
        $cmd="DELETE from detallecarrito where id_DetaCarrito=$idDCarrito";
        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("No se pudo eliminar");</script>';
        }
        else{
            echo '<script>
            swal (
            {
                title:"Producto eliminado del carrito",
                icon: "success",
                button:"Aceptar",

            }).then((value)=>
            {
                window.location.replace("CarritoProceso.php");
            });
            </script>';
            

        }
        $conex=null;

    }

    public function UpdateMas($objMas)
    {
        $conex=Conexion::conectar();
        $unoMas=$objMas->getPiezasProduc();
        $idDCarrito=$objMas->getIdDetalleCarrito();
        $idArticulo=$objMas->getidArticulo();
        $aunmenta=$unoMas+1;
        $validacion="select stock from combinacion where id_Articulo=$idArticulo";
        $lisVal=$conex->prepare($validacion);
        $lisVal->execute();
        $listaVal=$lisVal->fetchAll();
        foreach($listaVal as $barrido)
        {
            $checar=$barrido['stock'];
        }
        
        
        if($aunmenta>$checar)
        {
            echo '<script>
            swal(
                {
                    title: "Mi carrito",
                    text: "No puede aumentar más, stock limite",
                    icon: "warning",
                    button: "Aceptar",
                }
            );
            </script>';
        }
        else
        {
            $cmd="UPDATE detallecarrito set PiezasProduc=$aunmenta where id_DetaCarrito=$idDCarrito";
            if(!$conex->query($cmd))
            {
                print '<script>alert("no se puede eliminar")</script>';  
            }
            else
            {
                echo '<script>
            swal (
            {
                title:"Mi Carrito",
                text: "Usted esta aumentandos una pieza de este producto",
                icon: "success",
                button:"Aceptar",

            }).then((value)=>
            {
                window.location.replace("CarritoProceso.php");
            });
            </script>';
            }
        }
        $conex=null;
    }
    public function UpdateMenos($objMas)
    {
        $conex=Conexion::conectar();
        $unoMas=$objMas->getPiezasProduc();
        $idDCarrito=$objMas->getIdDetalleCarrito();
        $aunmenta=$unoMas-1;
        if($aunmenta<=0)
        {
            echo '<script>
            swal
            (
                {
                    title:"Mi Carrito",
                text: "No puede tener 0 piezas de este producto",
                icon: "warning",
                button:"Aceptar",

                }
            );
            </script>';
        }else
        {
            $cmd="UPDATE detallecarrito set PiezasProduc=$aunmenta where id_DetaCarrito=$idDCarrito";
            if(!$conex->query($cmd))
        {
            print '<script>alert("no se puede eliminar")</script>';   
        }
        else
        {
            echo '<script>
            swal (
            {
                title:"Mi Carrito",
                text: "Usted esta descontando una pieza de este producto",
                icon: "success",
                button:"Aceptar",

            }).then((value)=>
            {
                window.location.replace("CarritoProceso.php");
            });
            </script>';
        }

        }
        
        $conex=null;
        
    }

}






?>