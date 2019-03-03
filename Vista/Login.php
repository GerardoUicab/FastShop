
<!------ Include the above in your HEAD tag ---------->
<?php include 'headerCli.php' ?>
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
                <form id="loginform" class="" role="form">
				<div style="margin-bottom: 25px;" class="input-group">
                        <img src="../Recursos/images/FastShop.png" style="width:40%; height:40%; margin:10px auto;">
                    </div> 
                    <div style="margin-bottom: 25px;" class="input-group"> 
					<div class="col-md-12 controls"> 
					<label>E-mail</label>	
                        <input id="login-username" type="email" class="form-control" name="username" value="" placeholder="ingrese su e-mail" required />
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
						<button type="submit" name="btnIniciar" class="btn btn-primary" style="width:100%;">Iniciar sesión </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	</div>
<?php include 'footerCli.php' ?>