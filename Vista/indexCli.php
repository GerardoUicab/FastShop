<?php 
 include 'headerCli.php';
 include '../DAO/DetalleCarritoDAO.php';
 $conex=Conexion::conectar();
	$sel="SELECT * FROM carrusel";
	$lis=$conex->prepare($sel);
	$lis->execute();
	$baner=$lis->fetchAll();
	$cmdProducto="select a.id_Articulo, a.NombreArt,a.FotoArt,a.costoEnvio,u.nombre,c.precio from articulo a,Combinacion c, Usuario u where a.id_Usuario=u.id_Usuario and c.id_Articulo=a.id_Articulo";
	$lisArti=$conex->prepare($cmdProducto);
	$lisArti->execute();
	$listaArti=$lisArti->fetchAll();
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
							<?php foreach($listaArti as $barritoAr){ ?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
										
										<h5 style="color:#004d73;">Publicado: <?php echo $barritoAr['nombre']?></h5>
										
										
											<img src="../Recursos/images/<?php echo $barritoAr['FotoArt'] ?>" style="width:80%; height:30%;" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="DetalleArticulo.php" class="link-product-add-cart">Ver detalle</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h5 class="pt-1">
												Nombre del producto:<h6><?php echo $barritoAr['NombreArt'] ?></h6>
											</h5>
											<div class="info-product-price my-2">
												<h5>Precio: <h6><?php echo $barritoAr['precio']; ?></h6></h5>
											</div>
											<div class="info-product-price my-2">
											<?php if($barritoAr['costoEnvio']!=0)
											{
												echo '<span class="item_price">Costo envio:$'. $barritoAr["costoEnvio"].'</span>';
											 }
											 else
											 {
												echo '<span class="item_price">Envio Gratis</span>';
											 }?>
											</div>
											<form  method="post" value="" enctype="multipart/form-data">
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												
													
														
														<input type="hidden" name="item_name" value="<?php echo $barritoAr['NombreArt']; ?>" />
														<input type="hidden" name="amount" value="<?php echo $barritoAr['precio']; ?>" />
														<input type="hidden" name="txtIdArticulo" value="<?php echo $barritoAr['id_Articulo']; ?>" />
													
														<input type="submit" name="btnAgregar" id="btnAgregar"  class="button btn" />	
											</div>
											</form>
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

	$detalleDAO=new DetalleCarritoDAO();

	function asignar()
	{
		$detalleBO=new DetalleCarritoBO();
		$pieza="1";
		
		$detalleBO->setIdArticulo($_REQUEST['txtIdArticulo']);
		$detalleBO->setPrecioProducto($_REQUEST['amount']);
		$detalleBO->setIdUsuario($_SESSION['ID']);
		$StatusCarrito="No Pagado";
		$detalleBO->setStatusDetalleCarrito($StatusCarrito);
		$detalleBO->setPiezasProduc($pieza);

		return $detalleBO;
	}
	if(isset($_SESSION["id_TipoUsu"])==true)
	{
		if(isset($_REQUEST["btnAgregar"]))
		{
		$detalleDAO->insertarDetalle(asignar());
		}
	}
	{
		print '<script languaje="JavaScript">alert("Para Agregar al carrito debe loguearse");</script>';
	}

?>
<?php
include "footerCli.php";
?>
