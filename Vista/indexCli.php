<?php 
 include 'headerCli.php';
 include '../DAO/DetalleCarritoDAO.php';
 $conex=Conexion::conectar();
	$sel="SELECT * FROM carrusel";
	$lis=$conex->prepare($sel);
	$lis->execute();
	$baner=$lis->fetchAll();
	$cmdProducto="select a.id_Articulo, a.NombreArt,a.FotoArt,a.costoEnvio,u.nombre,u.fotoUsuario,c.precio,c.stock from 
	articulo a,Combinacion c, Usuario u 
	where a.id_Usuario=u.id_Usuario and c.id_Articulo=a.id_Articulo and a.StatusArt='Públicado' and c.stock !=0 order by a.id_Articulo desc";
	$lisArti=$conex->prepare($cmdProducto);
	$lisArti->execute();
	$listaArti=$lisArti->fetchAll();
 ?>
 <style>
 .imagenes
 {
	 border-radius:50%;
 }
 
 
 
 </style>
 
	<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fab fa-cc-paypal"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Paga con Paypal</h3>
								<p>pedidos arriba de  $100</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Envios México </h3>
								<p>Solo en el interior de México</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Gran eleccion</h3>
								<p>de productos</p>
							</div>
						</div>
					</div>
				</div>
				
			</div>
	</div>

	<!-- ==================================== 
	aqui esta la descripcion de que es la pagina
	=======================================-->
	<section id="slider"  class="container">
		<ul class="slider-wrapper">
		<?php foreach ($baner as $lista1) { ?>
		<li class="current-slide">
			<img src="../Recursos/images/<?php echo $lista1['NombreFoto']?>" width="100%" height="20%">
			
		</li>
		<?php }?>
		</ul>
		<!-- Sombras -->
		<div class="slider-shadow"></div>
		
		
		<!-- Controles de Navegacion -->
		<ul id="control-buttons" class="control-buttons"></ul>
	</section>
	

	<!-- top de productos -->
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
				<span>N</span>uevos
				<span>P</span>roductos</h3>
							<div class="row">
							<?php foreach($listaArti as $barritoAr){ ?>
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
	<!-- //top products -->
<?php
include "footerCli.php";
?>
