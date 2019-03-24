
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
<style>
.caja {
        border-radius: 25px;
        border: 1px solid #761D0B;
    }
</style>
<div class="container">
<div class="form-row">
<div id="loginbox" style="margin-top: 20px;" class="col-md-12 center-block ">
        <div class="card card-inverse card-info ">
            <div class="card-header">
                <div class="card-title text-center" style="color:#FFFFFF;"><h3 style="margin-top:10px;"><b>PÚBLICAR PRODUCTO</b></h1></div>
                <div style="float: right; font-size: 80%; position: relative; top: -10px;">
                </div>
            </div>
            <div style="padding-top: 30px;" class="">
                <div style="display: none;" id="login-alert" class="col-md-12"></div>
                <?php if(isset($_REQUEST["btnGaleria"])) {?>
                <div class="form-row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                <form method="post" value="" enctype="multipart/form-data">
                <button type="submit" style="margin-top:-15px; height:50px; " name="btnPublicar" id="btnPublicar"  class="btn btn-success col-md-12" >Públicar Producto</button>
                </form>
                </div>
                <div class="col-md-4">
                
                </div>
                
                </div>
                <?php }?>
                <div class="form-row" style="margin-top:5px;">
                <form method="post" value="" enctype="multipart/form-data">
                <div class="col-md-12">
                    
                    <div class="form-group col-md-12 align-content-center">
                    <input name="txtIdArticulo" id="txtIdArticulo" class="form-control" type="hidden"  />
                        <label>Nombre del articulo</label>
                        <input name="txtArticulo" id="txtArticulo" class="form-control caja" type="text" placeholder="Nombre" required/>
                    </div>
                    <div class="col-md-12">
                        <label>Foto Principal</label>
                        <input name="txtFoto" id="txtFoto" class="form-control caja" style="height:48px;" type="file" required placeholder="Precio"/>
                        </div>
                        <div class="col-md-12">
                    <label>Reseña del articulo</label>
                    <textarea id="txtReseña" name="txtReseña" class="col-md-12 caja" rows="2" required placeholder="ej:este telefono es un xaomi"></textarea>
                    </div>
                    <div class="form-group col-md-12 align-content-center">
                        <label>Precio envio</label>
                        <input name="txtPrecio" id="txtPrecio" class="form-control caja" type="text" placeholder="ej: 150.00"  />
                    </div>
                    <div class="form-group col-md-12">
                    <label for="usr">Séleccione la Marca</label>
                                            <select name="cmbMarca" id="cmbMarca" style=" width:100%; height:40px;" required class="caja">
                                            <?php foreach ($listaMarca as $BarridoMarca) { ?>
                                            <option id="optsele" name="optSele" value="<?php echo $BarridoMarca['id_Marca']; ?>" ><?php echo $BarridoMarca['NombreMarca']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>

                    <div class="form-group col-md-12">
                    <label for="usr">Séleccione Categoria</label>
                                            <select name="cmbCategorias" id="cmbCategorias" required style="width:100%; height:40px;"  class="caja">
                                            <?php foreach ($ListaCategoria as $barridoCategoria) {?>
                                            <option id="optsele" name="optSele" value="<?php echo $barridoCategoria['id_Categoria']; ?>" ><?php echo $barridoCategoria['NombreCategoria']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>

                    <div class="col-md-12 controls align-content-center" style="margin-top:10px;"> 
                        <button type="submit" name="btnAgregar" id="btnAgregar" value="activar" class="btn btn-success col-md-12" >Agregar </button>
                        </div>

                </div>
                </form>

                <form method="post" value="" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                
                        <label>Precio del producto</label>
                        <input name="txtPrecioProducto" required id="txtPrecioProducto" class="form-control caja" disabled="true"  type="text" placeholder="ejemplo: 150.00" />
                    
                    </div>

                    <div class="form-group col-md-12">
                        <label>Cantidad de producto</label>
                        <input name="txtCantidad" required id="txtCantidad" class="form-control caja" disabled="true" type="text" placeholder="ejemplo: 5"  />
                    </div>

                    <div class="col-md-12 controls align-content-center" style="margin-top:10px;"> 
                        <button type="submit" name="btnPrecio" id="btnPrecio" disabled="true"  class="btn btn-primary col-md-12" >Guardar</button>
                        </div>
                </form>

                    <form method="post" value="" enctype="multipart/form-data">
                    <div class="form-group col-md-12" style="margin-top:110px;">
                    <label for="usr">Séleccione Caracteristica</label>
                                            <select name="cmbCarac" disabled="true" id="cmbCarac" required  style="width:100%; height:40px;"  class="caja">
                                            <?php foreach ($listaCarac as $barridoCarac) {?>
                                            <option id="optsele" name="optSele" value="<?php echo $barridoCarac['id_Carac']; ?>" ><?php echo $barridoCarac['NombreCarac']; ?></option>
                                            <?php }?>
                                            </select>
                    </div>
                    
                    
                    <div class="form-group col-md-12">
                    
                        <label>Dominio de caracteristica</label>
                    
                        <input name="txtNombreDominio" id="txtNombreDominio" disabled="true"  class="form-control caja" type="text" placeholder="ejemplo: CH,M,G,AZUL,etc.." required />
                        
                    </div>
                    <div class="col-md-12 controls align-content-center" style="margin-top:10px;"> 
                        <button type="submit" name="btnCaracteristica" disabled="true" id="btnCaracteristica"  class="btn btn-primary col-md-12" >Guardar</button>
                        </div>
                    
                    </div>
                    </form>
                <form method="post" value="" enctype="multipart/form-data">
                <div class="col-md-12">
                <div class="form-group col-md-12 align-content-center">
                        <label>Séleccione foto</label><br>
                        <output id="list"></output>
                        <input name="txtGaleria" id="txtGaleria" disabled="true"  class="form-control caja" type="file" style="margin-top:20px; width:250px;" required placeholder="Nombre"/>
                    </div> 
                
                <div class="form-group col-md-12 align-content-center" >
                        <button type="submit" style="margin-top:5px;" disabled="true" name="btnGaleria" id="btnGaleria"  class="btn btn-primary col-md-12" >Guardar</button>
                    </div>
                    </div>
                </form>
                
                </div>
                    
                    
                    
                
            </div>
        </div>
    </div>
    </div>

    </div>
</div>
<script>
<?php if(isset($_REQUEST["btnAgregar"])==true){?>

    //aqui van los texto que se estan inabilitando
    document.getElementById("txtArticulo").disabled = true; 
    document.getElementById("txtFoto").disabled = true;
    document.getElementById("txtReseña").disabled = true;
    document.getElementById("txtPrecio").disabled = true;
    document.getElementById("cmbMarca").disabled = true;
    document.getElementById("cmbCategorias").disabled = true;
    document.getElementById("btnAgregar").disabled = true;

    //texto que se habilitan
    document.getElementById("txtPrecioProducto").disabled = false; 
    document.getElementById("txtCantidad").disabled = false;
    document.getElementById("btnPrecio").disabled = false;

<?php }?>
<?php if(isset($_REQUEST["btnPrecio"])==true){?>

//aqui van los texto que se estan inabilitando
document.getElementById("txtArticulo").disabled = true; 
document.getElementById("txtFoto").disabled = true;
document.getElementById("txtReseña").disabled = true;
document.getElementById("txtPrecio").disabled = true;
document.getElementById("cmbMarca").disabled = true;
document.getElementById("cmbCategorias").disabled = true;
document.getElementById("btnAgregar").disabled = true;
document.getElementById("txtPrecioProducto").disabled = true; 
document.getElementById("txtCantidad").disabled = true;
document.getElementById("btnPrecio").disabled = true;

//texto que se habilitan
document.getElementById("cmbCarac").disabled = false;
document.getElementById("txtNombreDominio").disabled = false;
document.getElementById("btnCaracteristica").disabled = false;
<?php }?>

<?php if(isset($_REQUEST["btnCaracteristica"])==true){?>

//aqui van los texto que se estan inabilitando
document.getElementById("txtArticulo").disabled = true; 
document.getElementById("txtFoto").disabled = true;
document.getElementById("txtReseña").disabled = true;
document.getElementById("txtPrecio").disabled = true;
document.getElementById("cmbMarca").disabled = true;
document.getElementById("cmbCategorias").disabled = true;
document.getElementById("btnAgregar").disabled = true;
document.getElementById("txtPrecioProducto").disabled = true; 
document.getElementById("txtCantidad").disabled = true;
document.getElementById("btnPrecio").disabled = true;
document.getElementById("cmbCarac").disabled = true;
document.getElementById("txtNombreDominio").disabled = true;
document.getElementById("btnCaracteristica").disabled = true;

//texto que se habilitan
document.getElementById("txtGaleria").disabled = false;
document.getElementById("btnGaleria").disabled = false;

<?php }?>
<?php if(isset($_REQUEST["btnGaleria"])==true){?>

//aqui van los texto que se estan inabilitando
document.getElementById("txtArticulo").disabled = true; 
document.getElementById("txtFoto").disabled = true;
document.getElementById("txtReseña").disabled = true;
document.getElementById("txtPrecio").disabled = true;
document.getElementById("cmbMarca").disabled = true;
document.getElementById("cmbCategorias").disabled = true;
document.getElementById("btnAgregar").disabled = true;
document.getElementById("txtPrecioProducto").disabled = true; 
document.getElementById("txtCantidad").disabled = true;
document.getElementById("btnPrecio").disabled = true;
document.getElementById("cmbCarac").disabled = true;
document.getElementById("txtNombreDominio").disabled = true;
document.getElementById("btnCaracteristica").disabled = true;

//texto que se habilitan
document.getElementById("txtGaleria").disabled = false;
document.getElementById("btnGaleria").disabled = false;

<?php }?>
<?php if(isset($_REQUEST["btnPublicar"])==true ){?>
    window.location.replace("Vender.php");
<?php }?>
</script>
<script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" style="width:250px; height:200px;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('txtGaleria').addEventListener('change', archivo, false);
      </script>
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
     $combinacion->setPrecio($_REQUEST['txtPrecioProducto']);
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
 function CaracA()
 {
     # code...
     $conex=Conexion::conectar();
     $caract=new CaracArticuloBO();
     $caract->setIdCarac($_REQUEST['cmbCarac']);
     $caract->setNombreDominio($_REQUEST['txtNombreDominio']);
     $consulta="SELECT max(id_Articulo) from Articulo where id_Usuario='".$_SESSION['ID']."'";
     $listaIdArt=$conex->prepare($consulta);
     $listaIdArt->execute();
     $lisArti=$listaIdArt->fetchAll();
     foreach($lisArti as $barridoCaracArt)
     {
         $idmaxArt=$barridoCaracArt['max(id_Articulo)'];
         $caract->setIdArticulo($idmaxArt);
         $caract->setIdUsuario($idmaxArt);
     }
     return $caract;

     
 }
function Galeria()
 {
    $conex=Conexion::conectar();
    $galeria=new GaleriaArtBO();
    $fecha=new DateTime();
        $archivo=($_FILES["txtGaleria"] !="")?$fecha->getTimestamp()."_".$_FILES["txtGaleria"]["name"]:"usuario.png";
        $tmpFoto=$_FILES["txtGaleria"]["tmp_name"];
        if($tmpFoto !="")
        {
            move_uploaded_file($tmpFoto,"../Recursos/images/".$archivo);
        }
        $galeria->setNombreFoto($archivo);

    $consulta="SELECT max(id_Articulo) from Articulo where id_Usuario='".$_SESSION['ID']."'";
     $listaIdArt=$conex->prepare($consulta);
     $listaIdArt->execute();
     $lisArti=$listaIdArt->fetchAll();
     foreach($lisArti as $barridoCaracArt)
     {
         $idmaxArt=$barridoCaracArt['max(id_Articulo)'];
         $galeria->setIdArt($idmaxArt);
     }
     return $galeria;
 }
 if(isset($_REQUEST["btnGaleria"]))
{
    $cmd->GaleriaArt(Galeria());
}
if(isset($_REQUEST["btnPublicar"]))
{
    $cmd->PublicarArt(Galeria());
}
 if(isset($_REQUEST["btnCaracteristica"]))
{
    $cmd->CaracArt(CaracA());
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