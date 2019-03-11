<?php 
 include 'headerCli.php';
 $conex=Conexion::conectar();
	$sel="SELECT * FROM carrusel";
	$lis=$conex->prepare($sel);
	$lis->execute();
	$baner=$lis->fetchAll();
 ?>
	<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Compra rapida</h3>
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
								<h3>Rapido envío</h3>
								<p>a todo el pais</p>
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
				<!-- //footer second section -->
			</div>
	</div>
	<!-- ==================================== 
	aqui esta la descripcion de que es la pagina
	=======================================-->
	<section id="slider" class="container">
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
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>N</span>uevos
				<span>P</span>roductos</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">Productos</h3>
							<div class="row">
							<?php while($user=mysqli_fetch_array($datos)){ ?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="../Recursos/images/m1.jpg" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.html" class="link-product-add-cart">Ver detalle</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.html"><?php echo $user['NombreProduc'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">$<?php echo $user['Precio'] ?></span>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="<?php echo $user['NombreProduc'] ?>" />
														<input type="hidden" name="amount" value="<?php echo $user['Precio'] ?>" />
														<input type="hidden" name="discount_amount" value="1.00" />
														<input type="hidden" name="currency_code" value="USD" />
														<input type="hidden" name="return" value=" " />
														<input type="hidden" name="cancel_return" value=" " />
														<input type="submit" name="submit"  class="button btn" />
													</fieldset>
												</form>
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
