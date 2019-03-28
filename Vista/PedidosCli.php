<?php include 'headerCli.php'; ?>
<?php 
$conex=Conexion::conectar();

?>
<script>
    <?php if(isset($_SESSION["id_TipoUsu"])==false){ ?>
        window.location.replace("Login.php");
    <?php }if(isset($_SESSION["id_TipoUsu"])==true && $_SESSION["id_TipoUsu"]!=2){?>
        window.location.replace("IndexAdmin.php");
    <?php }?>
    

</script>
<?php
$buscar="select c.*,u.Nombre from carrito c, usuario u where c.id_Usuario=u.id_Usuario and StatusCarrito='Pagado' and c.id_Usuario='".$_SESSION['ID']."' order by c.id_Carrito desc";
$lisBuscar=$conex->prepare($buscar);
$lisBuscar->execute();
$listaBuscar=$lisBuscar->fetchAll();
?>
<div class="container">
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">TICKETS DE COMPRAS</h3>
							<div class="row">
							<?php foreach($listaBuscar as $barritoAr){ ?>
								<div class="col-md-4 product-men mt-5" style="-webkit-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
-moz-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
										
										<h5 style="color:#004d73;"><b class="img_wthee_post">NO pedido: <?php echo $barritoAr['id_Carrito']?></b></h5>
										
										<form method="get" action="DetalleTicket.php">
											<img src="../Recursos/images/formulario.png" style="width:80%; height:30%;" alt="">
											
											<div class="men-cart-pro">
											
												<div class="inner-men-cart-pro ">
												
												<input type="hidden" name="txtIdCarrito" name="txtIdCarrito" value="<?php echo $barritoAr['id_Carrito']; ?>" />
													<input type="submit" name="btnIndex" value="Ver Ticket" id="btnIndex"   class="button btn link-product-add-cart" />
												</div>
												
											</div>
											
										</div>
										</form>
										<div class="item-info-product text-center border-top mt-4">
											<h5 class="info-product-price my-2">
												<h5>Nombre del compradro: <?php echo $barritoAr['Nombre'] ?></h6>
											</h5>
											<div class="info-product-price my-2">
												<h5 style="color:#00334e;">SubTotal: $<?php echo $barritoAr['SubTotal']; ?></h5>
											</div>
											<div class="info-product-price my-2">
											<?php if($barritoAr['costoEnvioC']!=0)
											{
												echo '<i class="fas fa-shipping-fast" style="color:#00334e;"></i><span class="item_price">Costo envio:$'. $barritoAr["costoEnvioC"].'</span>';
											 }
											 else
											 {
												echo '<i class="fas fa-shipping-fast" style="color:#00334e;"></i>"><span class="item_price">Envio Gratis</span>';
											 }?>
                                             <h5 style="color:#00334e;">Total: $<?php echo $barritoAr['Total']; ?></h5>
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
    </div>

<?php include 'footerCli.php';
 ?>
 