<?php include 'headerCli.php'; ?>
<?php
include '../DAO/UsuarioDAO.php';
$conex = Conexion::conectar();
$cmd = "select u.Nombre,u.Apellido,u.fotoUsuario,u.Contrasenia,u.Email,ti.Nombre as tipoUsuario from usuario u, tipousuario ti where
ti.id_TipoUsu=u.id_TipoUsu and id_Usuario='" . $_SESSION['ID'] . "'";
$liscmd = $conex->prepare($cmd);
$liscmd->execute();
$listacmd = $liscmd->fetchAll();
$usua = "SELECT Nombre,Apellido,Contrasenia,Email FROM usuario where id_Usuario='" . $_SESSION['ID'] . "'";
$lisUsua = $conex->query($usua);
$lisUsua->execute();
$listaUsua = $lisUsua->fetchAll();
foreach ($listaUsua as $datos) {
    $nom = $datos['Nombre'];
    $ape = $datos['Apellido'];
    $contra = $datos['Contrasenia'];
    $email = $datos['Email'];
}

$direccion = "select p.*, e.id_Estado,e.NombreEstado,c.id_Ciudad,c.NombreCiudad,co.id_Comunidad,co.NombreComunidad,
d.Calle,d.CalleExterior,d.CalleInterior,d.CodigoPostal from
pais p, estado e, ciudad c, comunidad co, direccion d where 
p.id_Pais=e.id_Pais and e.id_Estado=c.id_Estado and c.id_ciudad=co.id_Ciudad 
and co.id_Comunidad=d.id_Comunidad
and d.id_Usuario='" . $_SESSION['ID'] . "'";
$lisDirec = $conex->prepare($direccion);
$lisDirec->execute();
$listaDirec = $lisDirec->fetchAll();

foreach ($listaDirec as $datoDirec) {
        $idPais = $datoDirec['id_Pais'];
        $nombrePais = $datoDirec['NombrePais'];
        $idEstado = $datoDirec['id_Estado'];
        $nombreEstado = $datoDirec['NombreEstado'];
        $idCiudad = $datoDirec['id_Ciudad'];
        $nombreCiudad = $datoDirec['NombreCiudad'];
        $idComunidad = $datoDirec['id_Comunidad'];
        $nombreComunidad = $datoDirec['NombreComunidad'];
        $calle = $datoDirec['Calle'];
        $calleEx = $datoDirec['CalleExterior'];
        $calleInte = $datoDirec['CalleInterior'];
        $codigoPos = $datoDirec['CodigoPostal'];
    }
?>
<style>
    .divborde {
        border-radius: 25px;

        background: linear-gradient(to right, #fff, #fff);
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;


    }

    .divPrimero {
        border-radius: 25px;

        background: linear-gradient(to right, #fff, #fff);
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;
        height: 600px;
    }

    .divsegundo {
        border-radius: 25px;

        background: linear-gradient(to right, #fff, #fff);
        background: url(../Recursos/images/fondo.jpg);
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;
        height: 200px;
    }

    .subdiv {
        border-radius: 25px;

        background: linear-gradient(to right, #fff, #fff);

        box-shadow: 0 0.0rem 1rem 0 rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 100%;
    }

    img {
        border-radius: 50%;
    }

    .caja {
        border-radius: 25px;
        border: 1px solid #761D0B;
    }

    .alt {
        border-radius: 10px;
        border: 1px solid #00334e;

        padding: 20px;
        width: 100%;
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
        margin-top: -.25rem;
        margin-bottom: .25rem;
        transition: all 0.3s;
        box-shadow: 0 1.0rem 1rem 0 rgba(0, 0, 0, 0.3);
        background-color: #007fbd;
    }

    .btnenviar {
        border-radius: 10px;

        height: 40px;
        background-color: #00334e;
        color: #fff;
        opacity: 1;
    }

    .btnenviar:hover {

        background-color: #007fbd;
    }
</style>
<script>
    <?php if (isset($_SESSION["id_TipoUsu"]) == false) { ?>
    window.location.replace("Login.php");
    <?php 
}
if (isset($_SESSION["id_TipoUsu"]) == true && $_SESSION["id_TipoUsu"] != 2) { ?>
    window.location.replace("indexAdmin.php");
    <?php 
} ?>
</script>
<div class="container">
    <div class="form-row" style="margin-top:20px;">
        <?php foreach ($listacmd as $lis) { ?>
        <div class="col-md-4 divPrimero">
            <form class="form-inline" method="post">
                <div class="col-md-12 text-center">
                    <div class="col-md-12 divsegundo">

                        <h5 style="text-transform: uppercase;"><b><?php echo $lis['Nombre']; ?></b></h1>
                            <?php if ($lis['fotoUsuario'] != null) { ?>
                            <img src="../Recursos/images/<?php echo $lis['fotoUsuario'] ?>" style="width:50%; height:90%;">
                            <?php 
                        } else {
                            echo  '<img src="../Recursos/images/png.png" style="width:40%; height:60%;">';
                        } ?>
                    </div>
                    <hr>
                    <h5 style="color:red;"><?php echo $lis['Email'] ?></h5>
                    <h5 style="color:red;;"><?php echo $lis['tipoUsuario'] ?></h5>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-4 text-center">
                            <span><button id="btnDatos" name="btnDatos" class="btn boton light-blue text-center" value="" type="submit"><i class="fas fa-address-card"></i></button></span>
                            <div class="tooltip" style="color:#000000;">
                                informacion
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button id="btnDireccion" name="btnDireccion" class="btn boton light-blue text-center" value="" type="submit"><i class="fa fa-map-marker"></i></button>
                        </div>
                        <div class="col-md-4">
                            <button id="btnFoto" name="btnFoto" class="btn boton light-blue text-center" value="" type="submit"><i class="fa fa-camera-retro"></i></button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <?php 
    } ?>
        <div class="col-md-1">
        </div>
        <div class="col-md-7 divborde " disabled="true" style="color:#000;">
            <h5 id="h5datos" name="h5datos" hidden="true" class="text-center text-danger">Datos Personales</h5><br>

            <div class="col-md-12 subdiv" id="divDatos" name="divDatos" hidden="true">
                <form method="POST">
                    <label>Nombre(s) usuario</label>
                    <input type="text" id="txtNombre" value="<?php echo $nom ?>" name="txtNombre" class="col-md-12 caja" required>
                    <label>Apellido(s)</label>
                    <input type="text" class="col-md-12 caja" value="<?php echo $ape ?>" id="txtApe" name="txtApe" required>
                    <label>E-mail</label>
                    <input type="email" class="col-md-12 caja" value="<?php echo $email ?>" id="txtEmail" name="txtEmail" required>
                    <label>Contraseña</label>
                    <input type="password" class="col-md-12 caja" value="<?php echo $contra ?>" id="txtContraseña" name="txtContraseña" required>
                    <input type="submit" style="margin-top:20px;" name="btnGuDatos" id="btnGuDatos" value="Guardar" class="btn btnenviar">
                </form>
            </div>

            <br>
            <h5 class="text-center text-danger" id="h5Direcdion" name="h5Direcdion" hidden="true">Direccion</h1>

                <div class="col-md-12 subdiv " id="divDireccion" name="divDireccion" hidden="true" style="margin-top:20px;">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-3">
                            <label>Seleccione País:</label>
                            <select name="cmbCategorias" id="cmbPais" required style="" class="caja col-md-12">
                                <option id="optsele" name="optSele" value="<?php echo $datoDirec['id_Pais']; ?>"><?php echo $datoDirec['NombrePais']; ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Seleccione Estado:</label>
                            <select name="cmbCategorias" id="cmbEstado" required style="" class="caja col-md-12">
                                <option id="optsele" name="optSele" value="<?php echo $datoDirec['id_Estado']; ?>"><?php echo $datoDirec['NombreEstado']; ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Seleccione Ciudad</label>
                            <select name="cmbCategorias" id="cmbCiudad" required style="" class="caja col-md-12">
                                <option id="optsele" name="optSele" value="<?php echo $datoDirec['id_Ciudad']; ?>"><?php echo $datoDirec['NombreCiudad']; ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Seleccione Colonia</label>
                            <select name="cmbCategorias" id="cmbColonia" required style="" class="caja col-md-12">
                                <option id="optsele" name="optSele" value="<?php echo $datoDirec['id_Comunidad']; ?>"><?php echo $datoDirec['NombreComunidad']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top:20px;">
                        <div class="col-md-3">
                            <label>Codigo postal</label>
                            <input type="text" id="txtCodigoPostal" name="txtCodigoPostal" value="<?php echo $datoDirec['CodigoPostal'] ?>" required class="col-md-12 caja">
                        </div>
                        <div class="col-md-3">
                            <label>Calle Principal</label>
                            <input type="text" id="CallePrin" name="CallePrin" value="<?php echo $datoDirec['Calle'] ?>" required class="col-md-12 caja">
                        </div>
                        <div class="col-md-3">
                            <label>Calle Interior</label>
                            <input type="text" id="txtCalleInt" name="txtCalleInt" value="<?php echo $datoDirec['CalleInterior'] ?>" class="col-md-12 caja">
                        </div>
                        <div class="col-md-3">
                            <label>Calle Exterior</label>
                            <input type="text" id="txtCalleExte" name="txtCalleExte" value="<?php echo $datoDirec['CalleExterior'] ?>" class="col-md-12 caja">
                        </div>
                    </div>

                    <input type="submit" style="margin-top:20px;" value="Guardar" class="btn btnenviar">
                </form>
                </div>
                <br>
                <h5 class="text-center text-danger" id="h5Foto" name="h5Foto" hidden="true">Foto de Perfil</h1>
                    <form method="post" enctype="multipart/form-data">
                        <div class="col-md-12 subdiv " id="divFoto" name="divFoto" hidden="true" style="margin-top:20px;">
                            <label>seleccione Foto</label><br>
                            <output class="text-center" id="fotoli"></output>
                            <input type="file" id="txtfoto" name="txtfoto" class="col-md-12 caja" required>
                            <input type="submit" style="margin-top:20px;" name="btnGuFoto" id="btnGuFoto" value="Guardar" class="btn btnenviar">

                        </div>
                    </form>
                    <div class="col-md-12 text-center" style="margin-top:-60px;" id="divInforma">
                        <img src="../Recursos/images/png.png">
                        <h5 style="color:red;"><b>USTED PUEDE MODIFICAR SUS DATOS</b></h5>
                        <hr>
                        <h6>Dependiendo del boton seleccionado se habilitara los campos para llenar</h6>
                        <hr>
                        <form class="text-center" action="indexCli.php" method="post">
                            <input id="" value="COMPRAR AHORA" type="submit" class="btn btn-primary">
                        </form>
                    </div>
        </div>
        <output id="fotoli"></output>

    </div>
</div>
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
                    document.getElementById("fotoli").innerHTML = ['<img class="thumb" style="width:30%; height:30%;" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }

    document.getElementById('txtfoto').addEventListener('change', archivo, false);
</script>


<script>
    <?php if (isset($_REQUEST['btnDatos']) == true) { ?>
    document.getElementById("divInforma").hidden = true;
    document.getElementById("h5datos").hidden = false;
    document.getElementById("divDatos").hidden = false;

    <?php 
} ?>
    <?php if (isset($_REQUEST['btnDireccion']) == true) { ?>
    document.getElementById("divInforma").hidden = true;
    document.getElementById("h5Direcdion").hidden = false;
    document.getElementById("divDireccion").hidden = false;

    <?php 
} ?>
    <?php if (isset($_REQUEST['btnFoto']) == true) { ?>
    document.getElementById("divInforma").hidden = true;
    document.getElementById("h5Foto").hidden = false;
    document.getElementById("divFoto").hidden = false;

    <?php 
} ?>
</script>
<?php
$objUsuario = new UsuarioDAO();

function asignarDatos()
{
    $objUsuarioBO = new usuarioBO();
    $objUsuarioBO->setId($_SESSION['ID']);
    $fecha = new DateTime();
    $archivo = ($_FILES["txtfoto"] != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtfoto"]["name"] : "usuario.png";
    $tmpFoto = $_FILES["txtfoto"]["tmp_name"];
    if ($tmpFoto != "") {
        move_uploaded_file($tmpFoto, "../Recursos/images/" . $archivo);
    }
    $objUsuarioBO->setFoto($archivo);
    return $objUsuarioBO;
}
function ModificarD()
{
    $objmodi = new usuarioBO();
    $objmodi->setId($_SESSION['ID']);
    $objmodi->setNombre($_REQUEST['txtNombre']);
    $objmodi->setApellido($_REQUEST['txtApe']);
    $objmodi->setEmail($_REQUEST['txtEmail']);
    $objmodi->setContraseña($_REQUEST['txtContraseña']);
    return $objmodi;
}

if (isset($_REQUEST['btnGuFoto']) == true) {
    $objUsuario->ModificarFoto(asignarDatos());
}

if (isset($_REQUEST['btnGuDatos']) == true) {

    $objUsuario->ModificarDatos(ModificarD());
}


?>
<?php 
include 'footerCli.php';
?> 