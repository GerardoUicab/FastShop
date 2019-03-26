<?php

include 'headerCli.php';
$conex = Conexion::conectar();

?>
<script>
    <?php if (isset($_SESSION["id_TipoUsu"]) == false) { ?>
    window.location.replace("login.php");
    <?php 
  }
  if (isset($_SESSION["id_TipoUsu"]) == true && $_SESSION["id_TipoUsu"] != 2) { ?>
    window.location.replace("indexAdmin.php");
    <?php 
  } ?>
</script>
<style>
    section.pricing {
        background: #000;
        background: linear-gradient(to right, #dbebfa, #dbebfa);
    }

    .pricing .card {
        border: none;
        border-radius: 1rem;
        transition: all 0.2s;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .pricing hr {
        margin: 1.5rem 0;
    }

    .pricing .card-title {
        margin: 0.5rem 0;
        font-size: 0.9rem;
        letter-spacing: .1rem;
        font-weight: bold;
    }

    .pricing .card-price {
        font-size: 3rem;
        margin: 0;
    }

    .pricing .card-price .period {
        font-size: 0.8rem;
    }

    .pricing ul li {
        margin-bottom: 1rem;
    }

    .pricing .text-muted {
        opacity: 0.7;
    }

    .pricing .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        opacity: 0.7;
        transition: all 0.2s;
    }

    /* Hover Effects on Card */

    @media (min-width: 992px) {
        .pricing .card:hover {

            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        }

        .pricing .card:hover .btn {
            opacity: 1;
        }
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<?php
if ($_GET['txtIdCarrito'] == null) {
    echo '<script>window.location.replace("PedidosCli.php");</script>';
  }
$variable = $_GET['txtIdCarrito'];

$consulta = "select dc.PiezasProduc,dc.PrecioProduc,
dc.costoEnvioD,a.NombreArt from detallecarrito dc,articulo a where
 dc.id_Articulo=a.id_Articulo and dc.id_Carrito='" . $variable . "' and dc.StatusDetalleCarrito='Pagado'";
$lisCons = $conex->prepare($consulta);
$lisCons->execute();
$listaCons = $lisCons->fetchAll();
$buscar = "select C.*,u.Nombre from carrito c, usuario u where c.id_Usuario=u.id_Usuario and c.id_Carrito='" . $variable . "' order by c.id_Carrito desc";
$lisBuscar = $conex->prepare($buscar);
$lisBuscar->execute();
$listaBuscar = $lisBuscar->fetchAll();


$calificacion = "SELECT calificacion from calificar where id_Carrito=$variable";
$lisCalificacion = $conex->prepare($calificacion);
$lisCalificacion->execute();
$listaCalificacion = $lisCalificacion->fetchAll();
foreach ($listaCalificacion as $puntosCali) {
    $numero = $puntosCali['calificacion'];
  }
?>

<div class="container">
    <section class="pricing py-5 " style="margin-top:20px;">
        <div class="container">
            <div class="row">
                <!-- Free Tier -->

                <!-- Plus Tier -->
                <div class="col-lg-12">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <?php foreach ($listaBuscar as $lis) { ?>
                            <div class="form-row">
                                <div class="col-md-12 text-center">
                                    <h1 style="color:#00334e;"><b>TICKET DE COMPRA</b></h1>
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <h3 class="text-center" style="color:#00334e;">Folio Compra:<?php echo $lis['id_Carrito'] ?></h3>
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <h3 class=" text-center" style="color:#00334e;">Nombre: <?php echo $lis['Nombre'] ?><span class="period"></span></h3>
                                </div>
                                <div class="col-md-3 text-right" style="margin-top:20px;">
                                <?php if(empty($numero)==false){ ?>
                                    <h5 style="color:#00334e;"><b>Calificación</b></h6>
                                       
                                       <?php for($i=1; $i<=$numero; $i++){ ?>
                                        <i class="fa fa-star fa-1x" style="color:yellow;"></i>
                                       <?php }?>
                                       <?php }?>

                                </div>
                            </div>

                            <div class="form-row" style="margin-top:20px;">
                                <div class="col-md-4 text-center">
                                    <h5 style="color:#004d73;">Nombre del producto</h5>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h5 style="color:#004d73;">Piezas</h5>
                                </div>
                                <div class="col-md-3 text-center">
                                    <h5 style="color:#004d73;">Precio unitario</h5>
                                </div>
                                <div class="col-md-3 text-center">
                                    <h5 style="color:#004d73;">Costo de envio</h5>
                                </div>
                            </div>


                            <?php 
                          } ?>
                            <hr>

                            <div class="form-row">
                                <?php foreach ($listaCons as $detalle) { ?>
                                <div class="col-md-4">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo $detalle['NombreArt'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-2 text-center">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"></span><?php echo $detalle['PiezasProduc'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 text-center">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"></span>$<?php echo $detalle['PrecioProduc'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 text-center">
                                    <ul class="fa-ul">
                                        <?php if ($detalle['costoEnvioD'] != 0) { ?>
                                        <li><span class="fa-li"></span>$<?php echo $detalle['costoEnvioD'] ?></li>
                                        <?php 
                                      } else {
                                        echo '<li style="color:red;"><span class="fa-li" ></span>Envio Gratis</li>';
                                      } ?>
                                    </ul>
                                </div>
                                <?php 
                              } ?>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-3 text-left">
                                    <ul class="fa-ul">
                                        <li style="color:#00334e;"><span class="fa-li"></span><strong>SubTotal:</strong></li>
                                        <li style="color:#00334e;"><span class="fa-li"></span><strong>Costo Envio:</strong></li>
                                        <li style="color:#00334e;"><span class="fa-li"></span><strong>Total:</strong></li>
                                    </ul>

                                </div>
                                <div class="col-md-7"></div>
                                <?php foreach ($listaBuscar as $totales) { ?>
                                <div class="col-md-2">
                                    <ul class="fa-ul">
                                        <li style="color:#00334e;"><span class="fa-li"></span><strong><strong>$<?php echo $totales['SubTotal'] ?></strong></li>
                                        <?php if ($totales['costoEnvioC'] != 0) { ?>
                                        <li style="color:#00334e;"><span class="fa-li"></span><strong>$<?php echo $totales['costoEnvioC'] ?></strong></li>
                                        <?php 
                                      } else {
                                        echo '<li style="color:red;"><span class="fa-li"></span><strong>Envio Gratis</strong></li>';
                                      } ?>
                                        <li style="color:#00334e;"><span class="fa-li"></span><strong>$<?php echo $totales['Total'] ?></strong></li>
                                    </ul>
                                </div>
                                <?php 
                              } ?>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- Pro Tier -->

            </div>
        </div>
    </section>
</div>

<?php 
include 'footerCli.php'
?> 