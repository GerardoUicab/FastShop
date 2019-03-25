<script src="../Recursos/js/sweetalert.min.js"></script>
<?php 
include 'headerCli.php';
include '../DAO/DetalleCarritoDAO.php';
$conex = Conexion::conectar();
if (isset($_SESSION['ID']) == false) {
        echo '<script>window.location.replace("Login.php");</script>';
    }
$idUsu = $_SESSION['ID'];
$carrito = "select dc.id_DetaCarrito,dc.id_Articulo,dc.PiezasProduc,dc.PrecioProduc,dc.costoEnvioD,ar.NombreArt,ar.ReseñaArt,ar.FotoArt
from detallecarrito dc, articulo ar where dc.id_Articulo=ar.id_Articulo  and StatusDetalleCarrito='No Pagado' and dc.id_Usuario=$idUsu";
$lisCarrito = $conex->prepare($carrito);
$lisCarrito->execute();
$listaCarrito = $lisCarrito->fetchAll();
$resumen = "select sum(PiezasProduc*PrecioProduc) as SubTotal, sum(PiezasProduc*costoEnvioD) as Envio,
sum((PiezasProduc*PrecioProduc)+(PiezasProduc*costoEnvioD)) as Total
from detallecarrito where  StatusDetalleCarrito='No Pagado' and id_Usuario=$idUsu ";
$lisResumen = $conex->prepare($resumen);
$lisResumen->execute();
$listaResumen = $lisResumen->fetchAll();
?>
<style>
    .subdiv {
        border-radius: 25px;

        background: linear-gradient(to right, #fff, #dbebfa);
        
        box-shadow: 0 0.0rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;
    }

    .subdiv2 {
        border-radius: 25px;
        background:url(../Recursos/images/fondo.jpg);
        
        box-shadow: 0 1rem 3rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;
    }

    .diva {
        border-radius: 10px;
        background: #dbebfa;
        background: linear-gradient(to left, #fff, #dbebfa);
        background:url(../Recursos/images/fondo.jpg);
        box-shadow: 0 0.0rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;

    }

    img {
        border-radius: 15%;
    }

    .boton {
        border-radius: 30px;
        width: 60px;
        height: 60px;
        background-color: #00334e;
        color: #fff;
        opacity: 1;

    }

    .boton:hover {
        background-color: #007fbd;
    }

    .boton1 {
        border-radius: 30px;
        width: 40px;
        height: 40px;
        background-color: #E0320E;
        color: #fff;
        opacity: 1;


    }

    .boton1:hover {
        margin-top: -.25rem;
        margin-bottom: .25rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        background-color: #007fbd;
    }
</style>
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

<div class="container">
    <?php if ($mos != 0) { ?>
    
    <div class="form-row subdiv " style="margin-top:20px;">
        <div class="col-md-8">
            <h1 class="text-center" style="color:#00334e;"><b>MI CARRITO</b></h5><hr>
            <?php foreach ($listaCarrito as $carrito) { ?>
            <?php if ($carrito['PrecioProduc'] != null) { ?>
            <form method="post" value="" enctype="multipart/form-data">
                <div class="form-row diva ">
                    <div class="col-md-3">
                        <img src="../Recursos/images/<?php echo $carrito["FotoArt"]; ?>" style="height:100px; width:200px;" class="col-md-12">
                    </div>
                    <div class="col-md-3">
                        <h6 style="color:#00334e;"><b><?php echo  $carrito['NombreArt']; ?></b></h6>
                        <h6 style="color:#00334e;"><?php echo $carrito['ReseñaArt']; ?> </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="color:#00334e;"><b>Precio: $<?php echo  $carrito['PrecioProduc']; ?></b></h6>
                        <?php if ($carrito['costoEnvioD'] != 0) { ?>
                        <h6 style="color:red;">Costo envio: $<?php echo  $carrito['costoEnvioD']; ?></h6>
                        <?php 
                    } else {
                        echo '<h6 style="color:red;">Envio Gratis</h6>';
                    } ?>
                    </div>
                    <div class="col-md-3">
                        <h6>Cantidad</h6>
                        <input id="txtIdArticulo" name="txtIdArticulo" class="form-control" type="hidden" value="<?php echo $carrito['id_Articulo']; ?>">
                        <input id="txtCantida" name="txtCantida" class="form-control" type="hidden" value="<?php echo $carrito['PiezasProduc']; ?>">
                        <input id="btnMenos1" name="btnMenos1" style="width:40px; height:40px;" class="btn boton" type="submit" value="-">&nbsp;&nbsp;<?php echo $carrito['PiezasProduc']; ?>&nbsp;&nbsp;<input id="btnMas1" name="btnMas1" style="width:40px; height:40px;" class="btn boton" type="submit" value="+">
                    </div>
                    <div class="col-md-1">
                        <input type="hidden" name="txtIdDCarrito" id="txtIdDCarrito" value="<?php echo $carrito['id_DetaCarrito'] ?>">
                        <input id="btnEliminarRow" name="btnEliminarRow" class="btn boton1" type="submit" value="x">
                    </div>
                </div>
            </form>
            <?php 
        } ?>
            <?php if ($carrito['PrecioProduc'] == null) echo '<h1></h1>'; ?>
            <?php 
        } ?>
        </div>
        <?php foreach ($listaResumen as $resumen) { ?>
        <?php if ($resumen['Total'] > 0) { ?>
        <div class="col-md-3 snipcart-details tline-out"><br>


            <div class="col-md-12 text-center subdiv2">
                <h5 style="color:#00334e;"><b>Resumen De Pedido</b></h5><br><br>
                <h5 style="color:#00334e;"><b>SubTotal:</b>
                    <h5 style="color:red;">$<?php echo $resumen['SubTotal']; ?></h5>
                </h5><br>
                <h5 style="color:#00334e;"><b>Costo Envio:</b>
                    <h5 style="color:red;">$<?php echo $resumen['Envio']; ?></h5>
                </h5><br>
                <h5 style="color:#00334e;"><b>Total:</b>
                    <h5 style="color:red;">$<?php echo $resumen['Total']; ?></h5>
                </h5><br><br>
                <form method="post" action="">
                    <input type="hidden" id="txtSub" name="txtSub" value="<?php echo $resumen['SubTotal']; ?>">
                    <input type="hidden" id="txtEnvio" name="txtEnvio" value="<?php echo $resumen['Envio']; ?>">
                    <input type="hidden" id="txtTot" name="txtTot" value="<?php echo $resumen['Total']; ?>">

                    <input type="submit" name="btnProceso" id="btnProceso" value="Procesar Compra" class="button btn col-md-12" />
                </form>
            </div>

        </div>
        <?php 
    } ?>
        <?php 
    } ?>

    </div>
</div>
<?php 
} else { ?>
<div class="form-row text-center subdiv" style="margin-top:50px;">
    <div class="col-md-12">
        <img src="../Recursos/images/car.png">
        <h3 style="color:#00334e;" class="text-center"><b>NO TIENES PRODUCTOS EN TU CARRITO</b></h3>
        <hr>
        <h6>Empieza a comprar ahora,y obtener una mejor experiencia en FastShop</h6>
        <hr>
        <form class="text-center" action="indexCli.php" method="post">
            <input id="" value="COMPRAR AHORA" type="submit" class="btn btn-primary">
        </form>
    </div>


</div>
<?php 
} ?>
</div>
<?php


$objdao = new DetalleCarritoDAO();

function asignarDatos()
{
    $objA = new DetalleCarritoBO();

    $objA->setIdDetalleCarrito($_REQUEST["txtIdDCarrito"]);
    $objA->setPiezasProduc($_REQUEST['txtCantida']);
    $objA->setIdArticulo($_REQUEST['txtIdArticulo']);
    return $objA;
}
function Actualizarr()
{
    $objAc = new CarritoBO();
    $sta = 'Pendiente';
    $objAc->setStatusCar($sta);
    $objAc->setSubTot($_REQUEST['txtSub']);
    $objAc->setCostoEnvioC($_REQUEST['txtEnvio']);
    $objAc->setTotal($_REQUEST['txtTot']);
    $objAc->setIdUsu($_SESSION['ID']);

    return $objAc;
}
if (isset($_REQUEST["btnProceso"]) == true) {
        $objdao->carrito(Actualizarr());
        echo '<script>window.location.replace("PasoFinal.php");
        
            </script>';
    }

if (isset($_REQUEST["btnEliminarRow"])) {
        $objdao->eliminarProductoRow(asignarDatos());
    }

if (isset($_REQUEST["btnMas1"])) {
        $objdao->UpdateMas(asignarDatos());
    }
if (isset($_REQUEST["btnMenos1"])) {
        $objdao->UpdateMenos(asignarDatos());
    }
?>






<?php 
include 'footerCli.php';
?> 