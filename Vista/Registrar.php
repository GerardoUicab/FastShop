<?php include 'headerCli.php';

include '../DAO/UsuarioDAO.php';



?>
<div class="container">
    <div id="loginbox" style="margin-top: 50px;" class="mainbox col-lg-6 offset-md-3 col-md-8 offset-sm-2">
        <div class="card card-inverse card-info">
            <div class="card-header">
                <div class="card-title" style="color:#FFFFFF;">Crear cuenta</div>
                <div style="float: right; font-size: 80%; position: relative; top: -10px;"><a href="Login.php" style="color:#FFFFFF;">Iniciar sesión</a>
                </div>
            </div>
            <div style="padding-top: 30px;" class="card-block">
                <div style="display: none;" id="login-alert" class="alert alert-danger col-md-12"></div>
                <form method="post" value="" role="form">
				<div style="margin-bottom: 25px;" class="input-group">
                        <img src="../Recursos/images/FastShop.png" style="width:50%; height:40%; margin:1px auto;">
                    </div> 
                    <div style="margin-bottom: 25px;" class="input-group"> 
                    <div class="col-md-12 controls">
                        <span class="label label-primary">Nombre de usuario</span>	
                        <input id="txtNombre" type="text" class="form-control" name="txtNombre" value="" placeholder="Nombre" required />
                    </div>
                    </div>
                    <div style="margin-bottom: 25px;" class="input-group"> 
                    <div class="col-md-12 controls">
                    <label>Email del usuario</label>
                        <input id="txtEmail" type="email" class="form-control" name="txtEmail" placeholder="e-mail" required/>
                    </div>
                    </div>
                    <div style="margin-bottom: 25px;" class="form-group"> 
                    <div class="col-md-12 controls">
                    <label>Contraseña del usuario</label>
                        <input id="txtPassword" type="password" class="form-control" name="txtPassword" placeholder="contraseña" required/>
                    </div>
                    </div>
                    <div style="margin-top: 10px;" class="form-group">
                        <!-- Button -->
                        <div class="col-md-12 controls"> 
						<button type="submit" name="btnCrear" class="btn btn-primary" style="width:100%;">Iniciar sesión </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	</div>
<?php 
 $cmd=new UsuarioDAO();

function Asignar()
{
    $usuario=new usuarioBO();
    $usuario->setNombre($_REQUEST['txtNombre']);
    $usuario->setEmail($_REQUEST['txtEmail']);
    $usuario->setContraseña($_REQUEST['txtPassword']);
    return $usuario;
}

if(isset($_REQUEST["btnCrear"]))
{
    $cmd->insertar(Asignar());
    
    
}


?>
<?php include 'footerCli.php'
?>