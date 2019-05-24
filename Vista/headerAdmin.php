<?php ob_start(); ?> <?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Esteem  An Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="../Recursos/css/bootstrapAdmin.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Recursos/css/componentAdmin.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Recursos/css/exportAdmin.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Recursos/css/flipclockAdmin.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Recursos/css/circlesAdmin.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Recursos/css/style_gridAdmin.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Recursos/css/styleAdmin.css" rel="stylesheet" type="text/css" media="all" />
<link href="../Recursos/css/botonoes.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="../Recursos/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<script>
    <?php if (isset($_SESSION["id_TipoUsu"]) == false) { ?>
    window.location.replace("Login.php");
    <?php 
}
if (isset($_SESSION["id_TipoUsu"]) == true && $_SESSION["id_TipoUsu"] != 3) { ?>
    window.location.replace("indexCliAdmin.php");
    <?php 
} ?>
</script>



<div class="wthree_agile_admin_info">
		  <!-- /w3_agileits_top_nav-->
		  <!-- /nav-->
		  <div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
			  		 <!-- /nav_agile_w3l -->
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller scrollbar1">
							<ul class="gn-menu agile_menu_drop">
								<li><a href="indexAdmin.php"> <i class="fa fa-home"></i>Inicio</a></li>
								<li>
									<a href="UsuariosAdmin.php"><i class="fa fa-user" aria-hidden="true"></i>Gestión Usuarios</a>
								</li>
								<li>
									<a> <i class="fa fa-flag" aria-hidden="true"></i>Gestión Lugar <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<li class="mini_list_w3"><a href="PaisAdmin.php"><i class="fa fa-flag"></i>Pais</a></li>
										<li class="mini_list_w3"><a href="EstadoAdmin.php"><i class="fa fa-flag"></i>Estado</a></li>
										<li class="mini_list_w3"><a href="MunicipioAdmin.php"><i class="fa fa-flag"></i>Municipio</a></li>
										<li class="mini_list_w3"><a href="LocalidadAdmin.php"><i class="fa fa-flag"></i>Localidad</a></li>
									</ul>
								</li>
								<li>
									<a> <i class="fa fa-truck" aria-hidden="true"></i>Gestión Envios <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<li class="mini_list_w3"><a href="input.html"><i class="fa fa-truck"></i>Pendiente</a></li>
										<li class="mini_list_w3"><a href="validation.html"><i class="fa fa-truck"></i>Enviado</a></li>
									</ul>
								</li>
								<li>
									<a > <i class="fa fa-align-justify" aria-hidden="true"></i>Gestión Categorias<i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<li class="mini_list_w3"><a href="CategoriasAdmin.php"><i class="fa fa-align-justify"></i>Categoria</a></li>
										<li class="mini_list_w3"><a href="SubCategoriaAdmin.php"><i class="fa fa-align-justify"></i>SubCategoria</a></li>
									</ul>
								</li>
								<li>
									<a > <i class="fa fa-align-justify" aria-hidden="true"></i>Gestion Frontend<i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<li class="mini_list_w3"><a href="CarruselAdmin.php"><i class="fa fa-align-justify"></i>Carrusel</a></li>
										<li class="mini_list_w3"><a href="MarcasAdmin.php"><i class="fa fa-align-justify"></i>Marcas</a></li>
									</ul>
								</li>
								
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="indexAdmin.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Fast Shop </a></h1></li>
					<li class="second admin-pic">
				       <ul class="top_dp_agile">
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="../Recursos/images/admin.jpg" alt=""> </span> 
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
										 
										<li> <a href="CerrarSession.php"><i class="fa fa-times"></i>Cerrar Sesión</a> </li>
										</ul>
									</li>
									
						</ul>
			<!--	</li>
				<li class="second top_bell_nav">
				   <ul class="top_dp_agile ">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="badge blue">4</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>Your Notifications</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="user_img"><img src="images/a3.jpg" alt=""></div>
											   <div class="notification_desc">
											     <h6>John Smith</h6>
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											 <li class="odd"><a href="#">
												<div class="user_img"><img src="images/a1.jpg" alt=""></div>
											   <div class="notification_desc">
											     <h6>Jasmin Leo</h6>
												<p>Lorem ipsum dolor</p>
												<p><span>3 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li><a href="#">
												<div class="user_img"><img src="images/a2.jpg" alt=""></div>
											   <div class="notification_desc">
											     <h6>James Smith</h6>
												<p>Lorem ipsum dolor</p>
												<p><span>2 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											  <li><a href="#">
												<div class="user_img"><img src="images/a4.jpg" alt=""></div>
											   <div class="notification_desc">
											     <h6>James Smith</h6>
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li>
												<div class="notification_bottom">
													<a href="#">See all Notifications</a>
												</div> 
											</li>
										</ul>
									</li>
									
						</ul>
				</li>
				<li class="second top_bell_nav">
				   <ul class="top_dp_agile ">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="badge blue">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>Your Messages</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="user_img"><img src="images/a3.jpg" alt=""></div>
											   <div class="notification_desc">
											     <h6>John Smith</h6>
												<p>Lorem ipsum dolor</p>
												<p><span>3 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											 <li class="odd"><a href="#">
												<div class="user_img"><img src="images/a1.jpg" alt=""></div>
											   <div class="notification_desc">
											     <h6>Jasmin Leo</h6>
												<p>Lorem ipsum dolor</p>
												<p><span>2 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li><a href="#">
												<div class="user_img"><img src="images/a2.jpg" alt=""></div>
											   <div class="notification_desc">
											     <h6>James Smith</h6>
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li>
												<div class="notification_bottom">
													<a href="#">See all Messages</a>
												</div> 
											</li>
										</ul>
									</li>
									
						</ul>
				</li>
				<li class="second top_bell_nav">
				   <ul class="top_dp_agile ">
				       <li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue">9</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 4 Pending tasks</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Database update</span><span class="percentage">40%</span>
													<div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													<div class="bar yellow" style="width:40%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
												   <div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													 <div class="bar green" style="width:90%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
													<div class="clearfix"></div>	
												</div>
											   <div class="progress progress-striped active">
													 <div class="bar red" style="width: 33%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
												   <div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													 <div class="bar  blue" style="width: 80%;"></div>
												</div>
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="#">See all pending tasks</a>
												</div> 
											</li>
										</ul>
									</li>	
								</ul>
				</li>-->

				<li class="second w3l_search">
				 
						<form action="#" method="post">
							<input type="search" name="search" placeholder="Search here..." required="">
							<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
					
				</li>

			</ul>
			<!-- //nav -->
			
		</div>
		<div class="clearfix"></div>
	</div>

</head><br><br><br><br>

<!-- banner -->
<script>
 <?php if(isset($_SESSION["id_TipoUsu"])==false || $_SESSION["id_TipoUsu"]!=1){?>
    window.location.replace("Login.php");
 <?php } ?>
</script>
