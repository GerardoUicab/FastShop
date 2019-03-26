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
        <h1 class="display-4" style="color:#00334e;">¡Estas a un paso más de terminar!</h1>
        <hr class="my-4">
            <p class="lead" style="color:#00334e;"><b>Estas a punto de pagar con paypal la cantidad  de:</b>
            <h4 style="color:#25d366;">$ <?php echo number_format($tot,2); ?></h4>
            <div id="paypal-button-container"></div>
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
        color: 'blue'
    },

    client: {
        sandbox: 'Adp-a7UQl9lALMccLe7tEaagSgBurUUNdmLGJHo7ufm3eOF00piwVD5nL65ul9r1Yk539em23a2UjFeW',
        production: '<insert production client id>'
    },

    
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: { total: '<?php echo $tot; ?>', currency: 'MXN' },
                        description:"Total de Compra de productos en FastShop:$<?php echo number_format($tot,2);?>",
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
include 'footerCli.php';
?>