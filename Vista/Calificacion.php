<?php include 'headerCli.php';?>
<style>
    p.clasificacion {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    p.clasificacion input {
        position: absolute;
        top: -100px;
    }

    p.clasificacion label {
        float: right;
        border-color:red;
        color: #333;
        
        
    }

    p.clasificacion label:hover,
    p.clasificacion label:hover~label,
    p.clasificacion input:checked~label {
        color: #dd4;
    }
    .subdiv {
        border-radius: 25px;

        background: linear-gradient(to right, #fff, #dbebfa);
        
        box-shadow: 0 0.0rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;
    }
</style>
<form method="post">
<div class="container">
    <div class="form-row">
        <div class="col-md-5" style="margin-top:50px;">
        <h3>!Gracias por comprar en FastShop¡</h3><br><br>
            <img src="../Recursos/images/FastShop.png">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 subdiv snipcart-details tline-out" style="margin-top:50px;">
            <div class="col-md-12 text-center">
                <h5 style="color:#00334e;"><b>¿QUE TE PARECIO TU COMPRA?</b></h3>
            </div>
            <div class="col-md-12 subdiv" style="margin-top:20px;">
            <h6>Calificación</h6>
                <p class="clasificacion" style="margin-top:5px;">
                    <input id="radio1" type="radio" id="estrellas" name="estrellas" value="5">
                    <label for="radio1"><i class="fa fa-star fa-2x"></i></label>
                    <input id="radio2" type="radio" id="estrellas" name="estrellas" value="4">
                    <label for="radio2"><i class="fa fa-star fa-2x"></i></label>
                    <input id="radio3" type="radio" id="estrellas" name="estrellas" value="3">
                    <label for="radio3"><i class="fa fa-star fa-2x"></i></label>
                    <input id="radio4" type="radio" id="estrellas" name="estrellas" value="2">
                    <label for="radio4"><i class="fa fa-star fa-2x"></i></label>
                    <input id="radio5" type="radio" id="estrellas" name="estrellas" value="1">
                    <label for="radio5"><i class="fa fa-star fa-2x"></i></label>
                </p><br><BR>
                <label>Titulo</label>
            <label class="text-center">Opcional</label>
            <input id="" class="form-control" placeholder="Ingrese el titulo de su compra" type="text"><br>
            <label>Comentarios</label>
            <label class="text-center">Opcional</label>
            <textarea id="txtReseña" name="txtReseña" class="col-md-12 caja" rows="2"  placeholder="ej:este telefono es un xaomi"></textarea>
            </div>
            <div class="col-md-12" style="margin-top:20px;">
            <input id="btnCalificar" name="btnCalificar" class="button btn col-md-12" value="Enviar Calificación" type="submit">
            </div><br>
        </div>
        <div class="col-md-2">

        </div>




    </div>

</div>
</form>

<?php


if(isset($_REQUEST['btnCalificar']))
{
    $variable=$_REQUEST['estrellas'];
}


?>

<?php include 'footerCli.php'; ?> 