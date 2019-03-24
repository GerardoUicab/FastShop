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

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) 
        {
            #paypal-button-container 
            {
                width: 100%;
            }
        }
        
        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) 
        {
            #paypal-button-container
             {
                width: 250px;
            }
        }
    </style>
</head>

<body>
    <!-- Set up a container element for the button -->
    

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=MXN"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({env: 'sandbox',
style:
{
	size: 'responsive',
	shape: 'pill',
	color: 'blue'
},

    createOrder: function(data, actions) {
      // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $tot; ?>'
          }
        }]
      });
    }

}).render('#paypal-button-container');

    </script>
</body>
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