<?php 
    include 'headerCli.php';

    include '../DAO/ArticuloDAO.php';
    $conex=Conexion::conectar();
    $Categoria="SELECT id_Categoria,NombreCategoria FROM Categoria";
    $lisCategoria=$conex->prepare($Categoria);
    $lisCategoria->execute();
    $ListaCategoria=$lisCategoria->fetchAll();
    $Marca="SELECT id_Marca,NombreMarca from Marca";
    $lisMarca=$conex->prepare($Marca);
    $lisMarca->execute();
    $listaMarca=$lisMarca->fetchAll();
    $Carac="SELECT * FROM Caracteristicas";
    $lisCarac=$conex->prepare($Carac);
    $lisCarac->execute();
    $listaCarac=$lisCarac->fetchAll();

  
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
<div id="loginbox" style="margin-top: 20px;" class="col-md-12 center-block">
        <div class="card card-inverse card-info">
            <div class="card-header">
                <div class="card-title text-center" style="color:#FFFFFF;">Públicar PRODUCTO</div>
                <div style="float: right; font-size: 80%; position: relative; top: -10px;">
                </div>
            </div>
            <div style="padding-top: 30px;" class="">
                <div style="display: none;" id="login-alert" class="col-md-12"></div>
                
                <form method="post" value="" enctype="multipart/form-data">
                <div class="form-row">

                <div class="col-md-3">
                    
                    <div class="form-group col-md-12 align-content-center">
                    <input name="txtIdArticulo" id="txtIdArticulo" class="form-control" type="hidden"  />
                        <label>Nombre del articulo</label>
                        <input name="txtArticulo" id="txtArticulo" class="form-control" type="text" placeholder="Nombre"/>
                    </div>
                    <div class="col-md-12">
                        <label>Foto</label>
                        <input name="txtFoto" id="txtFoto" class="form-control" style="height:48px;" type="file" placeholder="Precio"/>
                        </div>
                        <div class="col-md-12">
                    <label>Reseña del articulo</label>
                    <textarea id="txtReseña" name="txtReseña" class="col-md-12" rows="2" placeholder="ejemplo:este telefono es un xaomi"></textarea>
                    </div>
                    <div class="form-group col-md-12 align-content-center">
                        <label>Precio envio</label>
                        <input name="txtPrecio" id="txtPrecio" class="form-control" type="text" placeholder="ej: 150.00"  />
                    </div>
                    <div class="form-group col-md-12">
                    <label for="usr">Séleccione la Marca</label>
                                            <select name="cmbMarca" style=" width:100%; height:40px;"  class="caja">
                                            <?php foreach ($listaMarca as $BarridoMarca) { ?>
                                            <option id="optsele" name="optSele" value="<?php echo $BarridoMarca['id_Marca']; ?>" ><?php echo $BarridoMarca['NombreMarca']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>

                    <div class="form-group col-md-12">
                    <label for="usr">Séleccione Categoria</label>
                                            <select name="cmbCategorias" style="width:100%; height:40px;"  class="caja">
                                            <?php foreach ($ListaCategoria as $barridoCategoria) {?>
                                            <option id="optsele" name="optSele" value="<?php echo $barridoCategoria['id_Categoria']; ?>" ><?php echo $barridoCategoria['NombreCategoria']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>

                    <div class="col-md-12 controls align-content-center" style="margin-top:10px;"> 
                        <button type="submit" name="btnAgregar" onClick="activar()" value="activar" class="btn btn-success col-md-12" >Agregar </button>
                        </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group col-md-12">
                
                        <label>Precio del producto</label>
                        <input name="txtPrecio" id="txtPrecio" class="form-control"  type="text" placeholder="ejemplo: 150.00" />
                    
                    </div>

                    <div class="form-group col-md-12">
                        <label>Cantidad de producto</label>
                        <input name="txtCantidad" class="form-control"  type="text" placeholder="ejemplo: 5"  />
                    </div>

                    <div class="col-md-12 controls align-content-center" style="margin-top:10px;"> 
                        <button type="submit" name="btnPrecio"  class="btn btn-primary col-md-12" >Guardar</button>
                        </div>

                        <div class="form-group col-md-12" style="margin-top:110px;">
                    <label for="usr">Séleccione Caracteristica</label>
                                            <select name="cmbCarac" disabled="true" style="width:100%; height:40px;"  class="caja">
                                            <?php foreach ($listaCarac as $barridoCarac) {?>
                                            <option id="optsele" name="optSele" value="<?php echo $barridoCarac['id_Carac']; ?>" ><?php echo $barridoCarac['NombreCarac']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>
                    
                    <div class="form-group col-md-12">
                    
                        <label>Dominio de caracteristica</label>
                    
                        <input name="nombre" disabled="true" class="form-control" type="text" placeholder="ejemplo: CH,M,G,AZUL,etc.." required />
                        
                    </div>
                    <div class="col-md-12 controls align-content-center" style="margin-top:10px;"> 
                        <button type="submit" name="btnCrear" disabled="true" class="btn btn-primary col-md-12" >Guardar</button>
                        </div>

                </div>

                <div class="col-md-4">
                <div class="form-group col-md-12 align-content-center">
                        <label>Nombre del articulo</label>
                        <input name="nombre" class="form-control" type="text" placeholder="Nombre">
                    </div>

                <div class="form-group col-md-12 align-content-center">
                        <label>Nombre del articulo</label>
                        <input name="nombre" class="form-control" type="text" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-12 align-content-center">
                        <label>Nombre del articulo</label>
                        <input name="nombre" class="form-control" type="text" placeholder="Nombre">
                    </div>
                </div>

                

                <div class="col-md-2">
                <div class="form-group col-md-12 align-content-center" >
                        <button type="submit" style="margin-top:25px;" name="btnCrear" disabled="true" class="btn btn-primary col-md-12" >Guardar</button>
                    </div>
                    <div class="form-group col-md-12 align-content-center" >
                        <button type="submit" style="margin-top:25px;" name="btnCrear" disabled="true" class="btn btn-primary col-md-12" >Guardar</button>
                    </div>
                    <div class="form-group col-md-12 align-content-center" >
                        <button type="submit" style="margin-top:25px;" name="btnCrear" disabled="true" class="btn btn-primary col-md-12" >Guardar</button>
                    </div>
                </div>
                </div>
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>
</div>
<?php
 $cmd=new ArticuloDAO();

 function asignar()
 {
     $articulo=new ArticuloBO();
     $articulo->setNombreArticulo($_REQUEST['txtArticulo']);
     
     $fecha=new DateTime();
        $archivo=($_FILES["txtFoto"] !="")?$fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"usuario.png";
        $tmpFoto=$_FILES["txtFoto"]["tmp_name"];
        if($tmpFoto !="")
        {
            move_uploaded_file($tmpFoto,"../Recursos/images/".$archivo);
        }
        $articulo->setFotoArticulo($archivo);
     $articulo->setReseñaArticulo($_REQUEST['txtReseña']);
     $articulo->setPrecio($_REQUEST['txtPrecio']);
     $articulo->setIdmarca($_REQUEST['cmbMarca']);
     $articulo->setCategoria($_REQUEST['cmbCategorias']);
     
     $articulo->setIdUsuario($_SESSION['ID']);
    
     return $articulo;

 }
 function AsigCombi()
 {  
     $conex=Conexion::conectar();
     $combinacion=new CombinacionBO();
     $combinacion->setPrecio($_REQUEST['txtPrecio']);
     $combinacion->setStock($_REQUEST['txtCantidad']);
     $consulta="SELECT max(id_Articulo) from Articulo where id_Usuario='".$_SESSION['ID']."'";
     $listaConsulta=$conex->prepare($consulta);
     $listaConsulta->execute();
     $lisConsulta=$listaConsulta->fetchAll();
     foreach($lisConsulta as $barridoConsul)
     {
        $hola=$barridoConsul['max(id_Articulo)'];
        $combinacion->setIdArticulo($hola);
     }

     
     return $combinacion;

 }

if(isset($_REQUEST["btnAgregar"]))
{
    $cmd->Agregar(asignar());
}
if(isset($_REQUEST["btnPrecio"]))
{
    $cmd->insertarCombinacion(AsigCombi());
}




?>

 <?php include 'footerCli.php' ?>