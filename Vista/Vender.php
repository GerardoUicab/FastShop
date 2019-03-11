<?php 
    include 'headerCli.php';
    $conex=Conexion::conectar();
    $Categoria="SELECT id_Categoria,NombreCategoria FROM categoria";
    $lisCategoria=$conex->query($Categoria);
    $ListaCategoria=$lisCategoria->fetchAll();
    $Marca="SELECT id_Marca,NombreMarca from marca";
    $lisMarca=$conex->query($Marca);
    $listaMarca=$lisMarca->fetchAll();

 ?>
    <script>
    <?php if(isset($_SESSION["id_TipoUsu"])==false){ ?>
        window.location.replace("login.php");
    <?php }if(isset($_SESSION["id_TipoUsu"])==true && $_SESSION["id_TipoUsu"]!=2){?>
        window.location.replace("indexAdmin.php");
    <?php }?>
    

</script>

<div class="container">
<div class="form-row">
<div class="col-md-0"></div>
    <div id="loginbox" style="margin-top: 20px;" class="col-md-6 center-block">
        <div class="card card-inverse card-info">
            <div class="card-header">
                <div class="card-title text-center" style="color:#FFFFFF;">SUBIR PRODUCTO</div>
                <div style="float: right; font-size: 80%; position: relative; top: -10px;">
                </div>
            </div>
            <div style="padding-top: 30px;" class="">
                <div style="display: none;" id="login-alert" class="col-md-12"></div>
                <form method="post" value="" role="form">
                <div class="form-row">
                    <div class="form-group col-md-4 align-content-center">
                        <label>Nombre del articulo</label>
                        <input name="nombre" class="form-control" type="text" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="usr">Séleccione la Marca</label>
                                            <select name="Categorias" style=" width:100%; height:40px;"  class="caja">
                                            <?php foreach ($listaMarca as $BarridoMarca) { ?>
                                            <option id="optsele" name="optSele" value="<?php echo $BarridoMarca['id_Marca']; ?>" ><?php echo $BarridoMarca['NombreMarca']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="usr">Séleccione Categoria</label>
                                            <select name="Categorias" style="width:100%; height:40px;"  class="caja">
                                            <?php foreach ($ListaCategoria as $barridoCategoria) {?>
                                            <option id="optsele" name="optSele" value="<?php echo $barridoCategoria['id_Categoria']; ?>" ><?php echo $barridoCategoria['NombreCategoria']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-12">
                    <label>Reseña del articulo</label>
                    ​<textarea id="txtArea" class="col-md-12" rows="4" ></textarea>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                        <label>Precio</label>
                        <input name="nombre" class="form-control" type="text" placeholder="Precio">
                        </div>
                        <div class="col-md-6">
                        <label>Cantidad</label>
                        <input name="nombre" class="form-control" type="Numeric" placeholder="Cantidad">
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="col-md-6">
                        <label>Foto</label>
                        <input name="nombre" class="form-control" style="height:38px;" type="file" placeholder="Precio">
                        </div>
                        <div class="col-md-6">
                        <label>Costo de envio</label>
                        <input name="nombre" class="form-control" type="text"  placeholder="Cantidad">
                        </div>
                    </div>    
                    <div style="margin-top: 10px;" class="form-group">
                        <!-- Button -->
                        <div class="col-md-12 controls align-content-center"> 
						<button type="submit" name="btnCrear" class="btn btn-primary align-content-center" style="width:32%;">Agregar </button>
                        <button type="submit" name="btnCrear" class="btn btn-success" style="width:32%;">Modificar </button>
                        <button type="submit" name="btnCrear" class="btn btn-danger" style="width:32%;">Eliminar </button>
                        </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
 <?php include 'footerCli.php' ?>