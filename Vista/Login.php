<?php include 'headerCli.php'; ?>
<?php

print("Que onda man");

if(isset($_POST['btnIniciar']))
{
    if(empty($_POST['username']) || empty($_POST['password']))
    {
        $message='<label>Todos los campos son requeridos</label>'; 
    }
    else
    {
        $query="SELECT * FROM usuario WHERE Email=:username and Contrasenia=:password";
        $cmd=$conex->prepare($query);
        $cmd->execute(
            array(
                'username'=>$_POST['username'],
                'password'=>$_POST['password']
            )
        );

        $count=$cmd->rowCount();
        if($count>0)
        {
                
                
                $lista=$cmd->fetchAll();
                foreach($lista as $lis)
                {
                    $_SESSION['ID']=$lis['id_Usuario'];
                    $_SESSION['id_TipoUsu']=$lis['id_TipoUsu'];
                    $_SESSION['Nombre']=$lis['Nombre'];
                    $_SESSION['Apellido']=$lis['Apellido'];
                    $_SESSION['Contrasenia']=$lis['Contrasenia'];
                    $_SESSION['Email']=$lis['Email'];
                    $_SESSION['Foto']=$lis['fotoUsuario'];
                }
                
                
            
        }
        else
        {
            $message='<label>Datos Incorrectos</label>'; 
            
        }

    }



}
?>
<script>
 <?php if($_SESSION["id_TipoUsu"]==2){ ?>
    
        window.location.replace("indexCli.php");
    
    <?php }?>
    <?php if($_SESSION["id_TipoUsu"]==1) {?>
        window.location.replace("indexAdmin.php");
    <?php }?>
    </script>
<div class="container">
    <div id="loginbox" style="margin-top: 50px;" class="mainbox col-lg-6 offset-md-3 col-md-8 offset-sm-2">
        <div class="card card-inverse card-info">
            <div class="card-header">
                <div class="card-title" style="color:#FFFFFF;">Inicio de sesión</div>
                <div style="float: right; font-size: 80%; position: relative; top: -10px;"><a href="Registrar.php" style="color:#FFFFFF;">Crear Cuenta</a>
                </div>
            </div>
            <div style="padding-top: 30px;" class="card-block">
                <div style="display: none;" id="login-alert" class="alert alert-danger col-md-12"></div>
                <form id="loginform" method="POST" class="" role="form">
				<div style="margin-bottom: 25px;" class="input-group">
                        <img src="../Recursos/images/FastShop.png" style="width:40%; height:30%; margin:10px auto;">
                    </div> 
                    <div style="margin-bottom: 25px;" class="input-group"> 
					<div class="col-md-12 controls"> 
					  
                    <?php  
                         if(isset($message))  
                            {  
                                 echo '<label class="text-danger">'.$message.'</label>';  
                            }  
                    ?> 
                    </div>
					</div>
                    <div style="margin-bottom: 25px;" class="input-group"> 
					<div class="col-md-12 controls"> 
					<label>E-mail</label>	
                        <input id="login-username" type="email" class="form-control" name="username" value="" placeholder="ingrese su e-mail"  />
                    </div>
					</div>
                    <div style="margin-bottom: 25px;" class="input-group"> 
					<div class="col-md-12 controls"> 
					<label>Contraseña</label>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Contraseña"  required/>
                    </div>
					</div>
                    <div style="margin-top: 10px;" class="form-group">
                        <!-- Button -->
                        <div class="col-md-12 controls"> 
						<button type="submit"   name="btnIniciar" class="btn btn-primary" style="width:100%;">Iniciar sesión </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	</div>
    
<?php include 'footerCli.php'?>
