<?php include 'headerCli.php'; ?>
<?php  

$conex=Conexion::conectar();
if(isset($_SESSION['ID']))
{
    $cmd="select a.id_Articulo, a.NombreArt,a.FotoArt,a.costoEnvio,u.nombre,
    u.fotoUsuario,c.precio,c.stock from 
        articulo a,combinacion c, usuario u 
        where a.id_Usuario=u.id_Usuario and c.id_Articulo=a.id_Articulo
        and a.StatusArt='Públicado' and a.id_Usuario='".$_SESSION['ID']."'
        and c.stock !=0 order by  a.id_Articulo desc";
    $lsitCmd=$conex->prepare($cmd);
    $lsitCmd->execute();
    $listaCmd=$lsitCmd->fetchAll();
}

?>
<script>
    <?php if(isset($_SESSION["id_TipoUsu"])==false){ ?>
        window.location.replace("Login.php");
    <?php }if(isset($_SESSION["id_TipoUsu"])==true && $_SESSION["id_TipoUsu"]!=2){?>
        window.location.replace("indexAdmin.php");
    <?php }?>

    

</script>
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- titulo de los productos -->
			
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>M</span>is
				<span>P</span>roductos</h3>
							<div class="row">
							<?php foreach($listaCmd as $barritoAr){ ?>
								<div class="col-md-3 product-men mt-5" style="-webkit-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
-moz-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
										
										<h5 style="color:#004d73;"><b class="img_wthee_post"><?php echo $barritoAr['NombreArt']?></b></h5>
										
										<form method="POST" action="DetalleArticulo.php">
											<img src="../Recursos/images/<?php echo $barritoAr['FotoArt'] ?>" style="width:80%; height:30%;" alt="">
											
											<div class="men-cart-pro">
											
												<div class="inner-men-cart-pro ">
												
												<input type="hidden" name="txtIdArticulo" value="<?php echo $barritoAr['id_Articulo']; ?>" />
													<input type="submit" name="btnIndex" value="Ver Detalle" id="btnIndex"   class="button btn link-product-add-cart" />
													
													
												</div>
												
											</div>
											
										</div>
										</form>
										<div class="item-info-product text-center border-top mt-4">
											<h5 class="info-product-price my-2">
												<h5><img src="../Recursos/images/<?php echo $barritoAr['fotoUsuario'] ?>" class="imagenes" style="width:40px; height:40px;"> <?php echo $barritoAr['nombre'] ?></h6>
											</h5>
											<div class="info-product-price my-2">
												<h5 style="color:#00334e;">Precio: <?php echo $barritoAr['precio']; ?></h5>
											</div>
											<div class="info-product-price my-2">
											<?php if($barritoAr['costoEnvio']!=0)
											{
												echo '<i class="fas fa-shipping-fast" style="color:#00334e;"></i><span class="item_price">Costo envio:$'. $barritoAr["costoEnvio"].'</span>';
											 }
											 else
											 {
												echo '<i class="fas fa-shipping-fast" style="color:#00334e;"></i><span class="item_price">Envio Gratis</span>';
											 }?>
											</div>
											
										</div>
									</div>
								</div>
							<?php }?>
							</div>
						</div>
					</div>
				</div>
				<!-- //product left -->
			</div>
		</div>
	</div>

















<?php include 'footerCli.php'; 
?>
