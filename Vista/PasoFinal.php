<?php 
include 'headerCli.php';
include '../DAO/DetalleCarritoDAO.php';
$conex=Conexion::conectar();
$IDUS=$_SESSION['ID'];
$resumen="select sum((PiezasProduc*PrecioProduc)+(PiezasProduc*costoEnvioD)) as Total
from detallecarrito where  StatusDetalleCarrito='No Pagado' and id_Usuario=$IDUS";
$lisResumen=$conex->prepare($resumen);
$lisResumen->execute();
$listaResumen=$lisResumen->fetchAll();
foreach($listaResumen as $barrer)
{
    $tot=$barrer['Total'];
}
?>
<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>


<style>
   /*Consulta para visualizar el viewport*/
   @media screen and (max-width: 400px)
    {
       #paypal-button-container{
           width: 100%;
       }
    }

   /*consulta para vista de escritorio*/
   @media screen and (min-width: 400px) 
   {
       #paypal-button-container{
           width:250px;
           display: inline-block;
       }
   }

</style>
<div class="container" style="margin-top:30px;">
    <div class="jumbotron text-center" style="background-color:#dbebfa;">
        <h1 class="display-4" style="color:#00334e;">¡Paso Final!</h1>
        <hr class="my-4">
            <p class="lead" style="color:#00334e;"><b>Estas a punto de pagar con paypal la cantidad  de:</b>
            <h4 style="color:#25d366;">$ <?php echo number_format($tot,2); ?></h4>
            <div id="paypal-button-container"></div>
            <form  method="post" action="" class="snipcart-details">
            <input id="txtIdusu" name="txtIdusu" class="form-control" type="hidden" value="<?php echo $_SESSION['ID']?>">
            <input type="submit" id="btnfin" name="btnfin" value="Finalizar proceso" style="width:250px;" class="button btn">
            </form>
            </p>
       
    </div>
</div>


<script>
paypal.Button.render({
    env: 'sandbox',
    style: {
        label:'checkout',
        size: 'responsive',
        shape: 'pill',
        color: 'gold'
    },

    client: {
        sandbox: 'AagwRKII9OFF1jgMsny2wSiT4-rKaagBfcmBrf5nwe6fZZSm1se42GorT8FOgtjzhqQlnGTOoq44hwzO',
        production: 'AYKDtUqf_aZGDfRXeClWyvzRFZfMpDvQwSGSMF30UrgVOg_0wfxbOOolGRsXO2wC45V43RjlOo1Ve5QO'
    },

    
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: { total: '<?php echo $tot; ?>', currency: 'MXN' },
                        description:"Compra de productos en FastShop:$<?php echo number_format($tot,2);?>",
                        custom:""
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions){
        return actions.payment.execute().then(function() { 
            console.log(data);
            window.location="TerminarProceso.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
        });
    }
 
 },'#paypal-button-container');

</script>
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