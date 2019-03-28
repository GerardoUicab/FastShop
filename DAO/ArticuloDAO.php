<?php
 include '../BO/ArticuloBO.php';
 include '../BO/CombinacionBO.php';
 include '../BO/CaracArticuloBO.php';
 include '../BO/GaleriaArtBO.php';

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
        $statusArt="No Públicado";
        $cmd="INSERT INTO articulo(NombreArt,ReseñaArt,FotoArt,FechaSubido,StatusArt,id_Usuario,id_Categoria,id_Marca,CostoEnvio)Values('$nombreArticulo','$reseñaArtiulo','$fotoArticulo','$fechaSubido','$statusArt',$idUsuario,$categoria,$idMarca,'$precioArticulo')";
        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("No se puede agregar el Producto");</script>';
        }
        else{
            print '<script languaje="JavaScript">swal (
                {
                    title:"SUBIR PRODUCTO",
                    text: "Llene los siguientes campos que se habilitaran",
                    icon: "success",
                    button:"Aceptar",
    
                });</script>';
        }
        $conex=null;
    }
    public function insertarCombinacion($objCombi)
    {
        $conex=Conexion::conectar();
        $precio=$objCombi->getPrecio();
        $stock=$objCombi->getStock();
        $idArticulo=$objCombi->getIdArticulo();
        $comando="INSERT INTO combinacion (precio, stock,id_Articulo) values('$precio','$stock','$idArticulo')";
        if(!$conex->query($comando))
        {
            print '<script languaje="JavaScript">alert("Error al agregar Cantidad y precio");</script>';
        }
        else
        {
            print '<script languaje="JavaScript">swal (
                {
                    title:"SUBIR PRODUCTO",
                    text: "Llene los siguientes campos que se habilitaran",
                    icon: "success",
                    button:"Aceptar",
    
                });</script>';
        }
        $conex=null;
    }
    public function CaracArt($objcarac)
    {
        $conex=Conexion::conectar();
        $idArt=$objcarac->getIdArticulo();
        $idCarac=$objcarac->getIdCarac();
        $nomDomi=$objcarac->getNombreDominio();
        $idUsu=$objcarac->getIdUsuario();

        $cmd="INSERT INTO artcarac(id_Carac,id_Articulo) values('$idCarac',$idArt)";
        $cmd1="INSERT INTO dominio(NombreDominio,id_Caracteristicas,id_UsuarioDomi)VALUES('$nomDomi','$idCarac',$idUsu)";

        if(!$conex->query($cmd) || !$conex->query($cmd1))
        {
            print '<script languaje="JavaScript">alert("error al insertar");</script>';
        }
        else
        {
            print '<script languaje="JavaScript">swal (
                {
                    title:"SUBIR PRODUCTO",
                    text: "Llene los siguientes campos que se habilitaran",
                    icon: "success",
                    button:"Aceptar",
    
                });</script>';
        }
        $conex=null;

    }
    public function GaleriaArt($objGaleria)
    {
        $conex=Conexion::conectar();
        $nombreFoto=$objGaleria->getNombreFoto();
        $idArt=$objGaleria->getIdArt();

        $cmd="INSERT INTO foto(Foto,id_Articulo) values ('$nombreFoto',$idArt)";
        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("error al insertar foto");</script>';
        }
        else
        {
            print '<script languaje="JavaScript">
            swal (
                {
                    title:"SUBIR PRODUCTO",
                    text: "Usted puede seguir subiendo fotos",
                    icon: "success",
                    button:"Aceptar",
    
                });
            </script>';
        }
        $conex=null;
    }
    public function PublicarArt($objPublicar)
    {
        $conex=Conexion::conectar();
        $idArt=$objPublicar->getIdArt();
        $statusArt="Públicado";
        $cmd="UPDATE articulo set StatusArt='$statusArt' where id_Articulo=$idArt";
        
        if(!$conex->query($cmd))
        {
            print '<script languaje="JavaScript">alert("error al públicar");</script>';
        }
        else
        {
            print '<script languaje="JavaScript">
            swal (
                {
                    title:"SUBIR PRODUCTO",
                    text: "Usted público su producto con exito",
                    icon: "success",
                    button:"Aceptar",
    
                }).then((value)=>
                {
                    window.location.replace("MisProducto.php");
                });
            
            </script>';
        }
        $conex=null;
    }

 }
 
 
 
 
 
 
 
 
 
 ?>