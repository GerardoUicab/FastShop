<?php
 include '../DAO/UsuarioDAO.php';
$conex=Conexion::conectar();  
$cmd="SELECT * FROM tipousuario WHERE id_TipoUsu!=1";
$lis=$conex->query($cmd);
$lista=$lis->fetchAll(PDO::FETCH_ASSOC); 
$objUsu=new UsuarioDAO();
    

function asignar()
{
    $usu=new usuarioBO();
    
    $usu->setNombre($_REQUEST["txtNombreUsu"]);
    $usu->setEmail($_REQUEST["txtEmail"]);
    $usu->setContraseña($_REQUEST["txtcontraseña"]);
    $usu->setIdTipoUsu($_REQUEST["TipoUsu"]);   
    return $usu;

}

if(isset($_REQUEST["btnAceptar"]))
{
    $objUsu->insertar(asignar());
}


?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
    <TITLE>Inicio de Sesión</TITLE>
<head>
<link href="../Recursos/css/login.css"rel="stylesheet" type="text/css" media="all">
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/dpinnick/pen/LjdLmo?limit=all&page=21&q=service" />

<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300);
/* GENERAL RESETS */
</style>
</head><body>
        <!-- LOGIN MODULE -->
        <div class="login">
            <div class="wrap">
                <!-- TOGGLE -->
                <div id="toggle-wrap">
                    <div id="toggle-terms">
                        <div id="cross">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <!-- TERMS -->


                <!-- RECOVERY -->

                <!-- SLIDER -->
                <div class="content">
                    <!-- LOGO -->
                    <div class="logo">
                        <a href="#"><img src="../Recursos/images/linio.png" alt=""></a>
                    </div>
                    <!-- SLIDESHOW -->
                    <div id="slideshow">
                        <div class="one">
                            <h2><span>FAST SHOP</span></h2>
                            <p>Es una tienda en linea donde puedes adquirir tus productos</p>
                        </div>
                        <div class="two">
                            <h2><span>Registrate</span></h2>
                            <p>Y obten la mejor experiencia con Fast Shop</p>
                        </div>
                        <div class="three">
                            <h2><span>Compras</span></h2>
                            <p>obten los beneficios al comprar en Fast SHOP</p>
                        </div>
                        <div class="four">
                            <h2><span>Beneficios</span></h2>
                            <p>Entrega rapida e inmediata, el producto llega en buen estado</p>
                        </div>
                    </div>
                </div>
                <!-- LOGIN FORM -->
                <div class="user">
                    <!-- ACTIONS
                    <div class="actions">
                        <a class="help" href="#signup-tab-content">Sign Up</a><a class="faq" href="#login-tab-content">Login</a>
                    </div>
                    -->
                    <div class="form-wrap">
                        <!-- TABS -->
                    	<div class="tabs">
                            <h3 class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Inicio de Sesión<span></a></h3>
                    		<h3 class="signup-tab"><a class="sign-up" href="#signup-tab-content"><span>Registrate</span></a></h3>
                    	</div>
                        <!-- TABS CONTENT -->
                    	<div class="tabs-content">
                            <!-- TABS CONTENT LOGIN -->
                    		<div id="login-tab-content" class="active">
                    			<form class="login-form" action="" method="post">
                    				<input type="text" name="correo" class="input" id="user_login" autocomplete="off" placeholder="Correo">
                    				<input type="password" name="contraseña" class="input" id="user_pass" autocomplete="off" placeholder="Contraseña">
                    				<input type="submit" name="btnlogin" class="btn btn-success">
                    			</form>
                    			<div class="">
                    				<a class="" href="indexCli.php">Regresar al Incio</a>
                    			</div>
                    		</div>
                            <!-- TABS CONTENT SIGNUP -->
                    		<div id="signup-tab-content">
                    			<form class="signup-form" enctype="multipart/form-data" action="" method="POST">
                                <select name="TipoUsu" class="input" style="width:295px; height:40px;" class="caja">
                                <?php foreach ($lista as $tipo) {?>
                                    <option id="optsele" name="optSele" value="<?php echo $tipo['id_TipoUsu'] ?>"><?php echo $tipo['Nombre'] ?></option>
                                <?php }?>
                                </select>
                    				<input type="" class="input" name="txtEmail" id="txtEmail" autocomplete="off" placeholder="Email" >
                    				<input type="text" class="input" name="txtNombreUsu" id="txtNombreUsu" autocomplete="off" placeholder="Nombre de usuario">
                    				<input type="password" class="input" name="txtcontraseña" id="txtcontraseña" required autocomplete="off" placeholder="Contraseña" >
                                    <button type="submit" height="48" class="btn btn-success" name="btnAceptar">Aceptar</button>
                    			</form>
                                
                    		</div>
                    	</div>
                	</div>
                </div>
            </div>
        </div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script >/* LOGIN - MAIN.JS - dp 2017 */

// LOGIN TABS
$(function() {
	var tab = $('.tabs h3 a');
	tab.on('click', function(event) {
		event.preventDefault();
		tab.removeClass('active');
		$(this).addClass('active');
		tab_content = $(this).attr('href');
		$('div[id$="tab-content"]').removeClass('active');
		$(tab_content).addClass('active');
	});
});

// SLIDESHOW
$(function() {
	$('#slideshow > div:gt(0)').hide();
	setInterval(function() {
		$('#slideshow > div:first')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('#slideshow');
	}, 3850);
});

// CUSTOM JQUERY FUNCTION FOR SWAPPING CLASSES
(function($) {
	'use strict';
	$.fn.swapClass = function(remove, add) {
		this.removeClass(remove).addClass(add);
		return this;
	};
}(jQuery));

// SHOW/HIDE PANEL ROUTINE (needs better methods)
// I'll optimize when time permits.
$(function() {
	$('.agree,.forgot, #toggle-terms, .log-in, .sign-up').on('click', function(event) {
		event.preventDefault();
		var terms = $('.terms'),
        recovery = $('.recovery'),
        close = $('#toggle-terms'),
        arrow = $('.tabs-content .fa');
		if ($(this).hasClass('agree') || $(this).hasClass('log-in') || ($(this).is('#toggle-terms')) && terms.hasClass('open')) {
			if (terms.hasClass('open')) {
				terms.swapClass('open', 'closed');
				close.swapClass('open', 'closed');
				arrow.swapClass('active', 'inactive');
			} else {
				if ($(this).hasClass('log-in')) {
					return;
				}
				terms.swapClass('closed', 'open').scrollTop(0);
				close.swapClass('closed', 'open');
				arrow.swapClass('inactive', 'active');
			}
		}
		else if ($(this).hasClass('forgot') || $(this).hasClass('sign-up') || $(this).is('#toggle-terms')) {
			if (recovery.hasClass('open')) {
				recovery.swapClass('open', 'closed');
				close.swapClass('open', 'closed');
				arrow.swapClass('active', 'inactive');
			} else {
				if ($(this).hasClass('sign-up')) {
					return;
				}
				recovery.swapClass('closed', 'open');
				close.swapClass('closed', 'open');
				arrow.swapClass('inactive', 'active');
			}
		}
	});
});

// DISPLAY MSSG
$(function() {
	$('.recovery .button').on('click', function(event) {
		event.preventDefault();
		$('.recovery .mssg').addClass('animate');
		setTimeout(function() {
			$('.recovery').swapClass('open', 'closed');
			$('#toggle-terms').swapClass('open', 'closed');
			$('.tabs-content .fa').swapClass('active', 'inactive');
			$('.recovery .mssg').removeClass('animate');
		}, 2500);
	});
});

// DISABLE SUBMIT FOR DEMO
$(function() {
	$('.button').on('click', function(event) {
		$(this).stop();
		event.preventDefault();
		return false;
	});
});
//# sourceURL=pen.js
</script>
</body>
</html>
