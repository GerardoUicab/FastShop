<?php
    include 'headerCli.php';
    include '../DAO/DetalleCarritoDAO.php';
?>
<div class="container" style="margin-top:30px;">
    <div class="jumbotron text-center" style="background-color:#dbebfa;">
        <h1 class="display-4" style="color:#00334e;">¡Paso Final!</h1>
        <hr class="my-4">
            <p class="lead" style="color:#00334e;"><b>Precione el boton Finalizar proceso, para poder terminar su pago con paypal</b>
            <div id="paypal-button-container"></div>
            <form  method="post" action="" class="snipcart-details">
            <input id="txtIdusu" name="txtIdusu" class="form-control" type="hidden" value="<?php echo $_SESSION['ID']?>">
            <input type="submit" id="btnfin" name="btnfin" value="Finalizar proceso" style="width:250px;" class="button btn">
            </form>
            </p>
       
    </div>
</div>
<?php

$obj=new DetalleCarritoDAO();
function validar()
{
    $objUs=new CarritoBO();

    $objUs->setIdUsu($_REQUEST['txtIdusu']);
    return $objUs;
}

if(isset($_REQUEST['btnfin'])==true)
{
    $obj->PasoFinal(validar());
}


?>
<?php
    include 'footerCli.php';


?>