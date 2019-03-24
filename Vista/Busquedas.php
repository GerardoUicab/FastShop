<?php include 'headerCli.php';
$conex=Conexion::conectar();
$id=($_GET['id']);
$cmd="SELECT id_Categoria,NombreCategoria,fotoCategoria FROM Categoria where id_SubCate=$id";
$lisSuB=$conex->prepare($cmd);
$lisSuB->execute();
$listaSub=$lisSuB->fetchAll();
$cmd="select a.id_Articulo, a.NombreArt,a.FotoArt,a.costoEnvio,u.nombre,c.precio,c.stock from 
articulo a,Combinacion c, Usuario u where a.id_Usuario=u.id_Usuario
 and c.id_Articulo=a.id_Articulo and a.StatusArt='Públicado' and c.stock !=0 and id_Categoria=$id";
 $lisProducto=$conex->prepare($cmd);
 $lisProducto->execute();
 $listaProducto=$lisProducto->fetchAll();

 ?>
 <div class="container">
    <div class="form-row row w3l-grids-footer border-top border-bottom py-sm-4 py-3" style="margin-top:10px;">
 <?php foreach($listaSub as $subCategoria){ ?>   
    <div class="col-md-3 product-men mt-0" style=" margin-top:-20; -webkit-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
-moz-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center"><br>
                                        <h5 style="color:#004d73;"><b class="img_wthee_post"><?php echo $subCategoria["NombreCategoria"] ?></b></h5>
										<form method="GET">
											<img src="../Recursos/images/<?php echo $subCategoria["fotoCategoria"] ?>" style="width:70%; height:150px;" alt="">
											
											<div class="men-cart-pro">
											
												<div class="inner-men-cart-pro ">
												
													<a name="btnAgregar" href="Busquedas.php?id=<?php echo $subCategoria["id_Categoria"] ?>" value="" id="btnAgregar"   class="button btn link-product-add-cart">Ver Contenido</a>
													
													
												</div>
												
											</div>
										</form>
											
										</div>
										
									</div>
								</div>
<?php }?>
    </div>
    <div class="row">
							<?php foreach($listaProducto as $barritoAr){ ?>
								<div class="col-md-3 product-men mt-2" style="-webkit-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
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
													<input type="submit" name="btnVer" value="Ver Detalle" id="btnVer"   class="button btn link-product-add-cart" />
													
													
												</div>
												
											</div>
											
										</div>
										</form>
										<div class="item-info-product text-center border-top mt-4">
											<h5 class="info-product-price my-2">
												<h5>Públicado por: <?php echo $barritoAr['nombre'] ?></h6>
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
												echo '<i class="fas fa-shipping-fast" style="color:#00334e;"></i>"><span class="item_price">Envio Gratis</span>';
											 }?>
											</div>
											
										</div>
									</div>
								</div>
							<?php }?>
							</div>
 
 </div>

<?php  include 'footerCli.php'?>