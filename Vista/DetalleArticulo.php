
<?php include 'headerCli.php'; 
 include '../DAO/DetalleCarritoDAO.php';
$conex=Conexion::conectar();
$idArticulo=$_POST['txtIdArticulo'];
$cmd="select a.NombreArt,a.ReseñaArt,a.FotoArt,a.CostoEnvio,u.Nombre,
c.NombreCategoria,m.NombreMarca,cm.precio,cm.stock,
cr.NombreCarac,d.NombreDominio
from Articulo a, Usuario u, Categoria c, Marca m,Combinacion cm, Caracteristicas cr, Dominio d
where a.id_Categoria=c.id_Categoria and a.id_Marca=m.id_Marca 
and a.id_Usuario=u.id_Usuario and cm.id_Articulo=a.id_Articulo 
and cr.id_Carac=(select id_Carac from artcarac where id_Articulo=a.id_Articulo) and d.id_UsuarioDomi=a.id_Articulo
and a.id_Articulo=$idArticulo";
$listado=$conex->prepare($cmd);
$listado->execute();
$listDetalle=$listado->fetchAll();
$galeria="select Foto from Foto where id_Articulo=$idArticulo";
$lisGaleria=$conex->prepare($galeria);
$lisGaleria->execute();
$listaGaleria=$lisGaleria->fetchAll();
?>

<style>
.img1{
    -webkit-transform:scale(1,1);
    -webkit-transition-timig-function: ease-out;
    -webkit-transition-duration: 250ms;
    -moz-transform: scale(1,1);
    -moz-transition.timing-function: ease-out;
    -moz-transition-duration: 250ms;

}
.img1:hover
{
    -webkit-transform:scale(1.12,1.12);
    -webkit-transition-timig-function: ease-out;
    -webkit-transition-duration: 100ms;
    -moz-transform: scale(1.12,1.12);
    -moz-transition.timing-function: ease-out;
    -moz-transition-duration: 100ms;
}
</style>

<div class="container">
<?php foreach($listDetalle as $detalle) {?>
    <form  method="post" value="" enctype="multipart/form-data">
    <div class="form-row  row w3l-grids-footer border-top border-bottom py-sm-4 py-3" style="margin-top:20px;">
        <div class="col-md-12 " style="margin-top:-20px;">
        <h1 style="color:#000000;"><b><?php echo $detalle["NombreArt"]; ?></b></p>
        </div><br>
        <div class="col-md-2" style="margin-top:5px;">
        <p style="color:#000000;">Marca: <?php echo $detalle["NombreMarca"]; ?> </h1>
        </div>
        <div class="col-md-3" style="margin-top:5px;">
        <p style="color:#000000;">Categoria: <?php echo $detalle["NombreCategoria"]; ?></h1>
        </div>
        <div class="col-md-4" style="margin-top:5px;">
        <p style="color:#000000;">Públicado por: <?php echo $detalle["Nombre"]; ?></h1>
        </div>
    </div>
    <div class="form-row" style="margin-top:10px;">
        <div class="col-md-5">
        <img src="../Recursos/images/<?php echo $detalle["FotoArt"]; ?>" style="height:300px; width:400px;" class="col-md-12">

        </div>
        <div class="col-md-4">
        <h3 style="color:#000000;">Características</h3><br>
        <h6>
        <?php echo $detalle["ReseñaArt"]; ?><br><br>
        Marca: <?php echo $detalle["NombreMarca"]; ?><br><br>
        Categoria: <?php echo $detalle["NombreCategoria"]; ?><br><br>
         <?php echo $detalle["NombreCarac"]; ?>:
         <?php echo $detalle["NombreDominio"]; ?><br><br>
         Disponibles: 
         <?php echo $detalle["stock"]; ?>
         </h6>
        </div>
        <div class="col-md-3">
        <h6 style="color:#000000;">Precio: $<?php echo $detalle["precio"]; ?></h6><br>
        <?php if($detalle['CostoEnvio']!=0) {?>
            <i class="fas fa-shipping-fast" style="color:#00334e;"></i><h6 style="color:#000000;">Costo envio: $<?php echo $detalle["CostoEnvio"]; ?> </h6>
        <?php } else{?>
            <i class="fas fa-shipping-fast" style="color:#00334e;"></i><h6 style="color:#000000;">Envio gratis</h6>
        <?php }?><br>
        <label for="usr">Séleccione la Cantidad</label>
        <?php if($detalle["stock"]!=0){ ?>
            <select name="cmbCantida" id="cmbCantida" style=" width:100%; height:40px;" required class="navbar-nav ml-auto text-center col-md-12">
                                            <?php for($i=1; $i<=$detalle["stock"]; $i++) { ?>
                                            
                                            <option id="optsele" name="optSele" value="<?php echo $i?>" ><?php echo $i?></option>
                                            
                                            <?php }?>
            </select>
        <?php }?>

        
        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out" style="margin-top:20px;">
        <input type="hidden" id="txtIdArticulo"name="txtIdArticulo" value="<?php echo $idArticulo ?>" >
        <input type="hidden" id="txtPrecio"name="txtPrecio" value="<?php echo $detalle["precio"]; ?> " >
        <input type="hidden" id="txtCostoEnvio"name="txtCostoEnvio" value="<?php echo $detalle["CostoEnvio"]; ?> " >

        <input type="submit"  name="btnAgregar" id="btnAgregar" value="Agregar al carrito"  class="button btn col-md-12" />
        </div>
        
        </div>
        </form>
    </div>
<?php } ?>
<div class="form-row"><h5>Galeria</h5></div>
<div class="form-row row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
<?php foreach($listaGaleria as $Galeria) {?>
<div class="col-lg-2">
<img src="../Recursos/images/<?php echo $Galeria["Foto"];?>"  class="col-md-12 img1" style=" height:150px; -webkit-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
-moz-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);">
</div>
<?php }?>


</div>
</div>

<?php

$detalleDAO=new DetalleCarritoDAO();
function asignar()
	{
		$detalleBO=new DetalleCarritoBO();
		
		
		$detalleBO->setIdArticulo($_REQUEST['txtIdArticulo']);
		$detalleBO->setPrecioProducto($_REQUEST['txtPrecio']);
		$detalleBO->setIdUsuario($_SESSION['ID']);
		$StatusCarrito="No Pagado";
		$detalleBO->setStatusDetalleCarrito($StatusCarrito);
        $detalleBO->setPiezasProduc($_REQUEST['cmbCantida']);
        $detalleBO->setCostoEnvioD($_REQUEST['txtCostoEnvio']);

		return $detalleBO;
    }
    
    if(isset($_SESSION["id_TipoUsu"])==true)
	{
		if(isset($_REQUEST["btnAgregar"]))
		{
		$detalleDAO->insertarDetalle(asignar());
		}
	}
	if(isset($_SESSION["ID"])==FALSE && isset($_REQUEST["btnAgregar"]))
	{
		print '<script languaje="JavaScript">swal(
            {
                title: "ADVERTENCIA",
                text: "inicie sesión para agregar productos a su carrito",
                icon: "warning",
                button: "Aceptar",
            }
        );</script>';
	}





?>
<?php include 'footerCli.php';?>