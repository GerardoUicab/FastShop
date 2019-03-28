<?php include 'headerCli.php'; ?>
<?php 
$id = $_GET['id'];
$conex = Conexion::conectar();
$cmd = "select a.id_Articulo, a.NombreArt,a.FotoArt,a.costoEnvio,u.nombre,c.precio,c.stock from 
articulo a,combinacion c, usuario u where a.id_Usuario=u.id_Usuario
 and c.id_Articulo=a.id_Articulo and a.StatusArt='Públicado' and c.stock !=0  and id_Marca=$id";
$lisProducto = $conex->prepare($cmd);
$lisProducto->execute();
$listaProducto = $lisProducto->fetchAll();


?>
<style>
    .subdiv {
        border-radius: 25px;

        background: linear-gradient(to right, #fff, #dbebfa);

        box-shadow: 0 0.0rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;
    }
</style>
<div class="container">
    <div class="row" style="margin-top:20px;">
        <?php foreach ($listaProducto as $barritoAr) { ?>
        <?php if ($barritoAr > 0) { ?>
        <div class="col-md-3 product-men mt-2" style="-webkit-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
-moz-box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);
box-shadow: 3px 10px 56px -16px rgba(181,188,232,1);">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item text-center">

                    <h5 style="color:#004d73;"><b class="img_wthee_post"><?php echo $barritoAr['NombreArt'] ?></b></h5>

                    <form method="POST" action="DetalleArticulo.php">
                        <img src="../Recursos/images/<?php echo $barritoAr['FotoArt'] ?>" style="width:80%; height:30%;" alt="">

                        <div class="men-cart-pro">

                            <div class="inner-men-cart-pro ">

                                <input type="hidden" name="txtIdArticulo" value="<?php echo $barritoAr['id_Articulo']; ?>" />
                                <input type="submit" name="btnMarca" value="Ver Detalle" id="btnMarca" class="button btn link-product-add-cart" />


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
                            <?php if ($barritoAr['costoEnvio'] != 0) {
									echo '<i class="fas fa-shipping-fast" style="color:#00334e;"></i><span class="item_price">Costo envio:$' . $barritoAr["costoEnvio"] . '</span>';
								} else {
									echo '<i class="fas fa-shipping-fast" style="color:#00334e;"></i>"><span class="item_price">Envio Gratis</span>';
								} ?>
                        </div>

                </div>
            </div>
        </div>
        <?php 
	} else { ?>
        <P>No hay nada</P>
        <?php 
	} ?>


        <?php 
	} ?>
        <?php if (empty($listaProducto)) { ?>
        <div class="form-row text-center subdiv" style="margin-top:30px;">
            <div class="col-md-12 ">
                <img src="../Recursos/images/car.png">
                <h3 style="color:#00334e;" class="text-center"><b>No se encontrarón productos con respectiva marca</b></h3>
                <hr>
                <h6>Esta marca no tiene productos</h6>
                <hr>

            </div>


        </div>
    </div><br>
    <?php 
} ?>
</div>



</div>

<?php include 'footerCli.php'; ?> 