<?php 
$con=new mysqli('localhost','root','','empresa');
$datos=$con->query("SELECT * FROM categoria");
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Fast Shop</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="../Recursos/css/bootstrapCli.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="../Recursos/css/styleCli.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="../Recursos/css/fontawesome-allCli.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="../Recursos/css/popuo-boxCli.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="../Recursos/css/menuCli.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../Recursos/css/carCli.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.html" class="font-weight-bold font-italic">
							<img src="../Recursos/images/logo2.png" alt=" " class="img-fluid">Fast Shop
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- Buscador -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="#" method="post">
								<input class="form-control mr-sm-2" type="search" placeholder="Buscar...." aria-label="Search" required>
								<button class="btn my-2 my-sm-0" type="submit">Buscar</button>
							</form>
						</div>
						<!-- //buscador -->
						<!-- Carrito de compra -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="#" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light" >
				<!--aqui termina-->
				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center col-lg-10">
								<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link text-white" href="index.html">&nbsp; 
								<img src="../Recursos/images/home-icon-silhouette.png" width="40px" height="30px"><br>&nbsp; Inicio
								<span class="sr-only">(current)</span>
							</a>
						</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
							<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
									<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<img src="../Recursos/images/categoria.png" width="40px" height="30px"><br>
										Categorias
									</a>
									<div class="dropdown-menu">
									<?php  while($user=mysqli_fetch_array($datos)){ ?>
										<a class="dropdown-item" id="<?php echo $user['ID']; ?>"  href="product.html"><?php echo $user['Nombre']; ?></a>
										<?php } ?>
										<a class="dropdown-item" href="../Recursos/Carrito.php">Carrito</a>
									</div>
								</li>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="../Recursos/images/conversation.png" width="40px" height="30px"><br>&nbsp;	Información
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">¿En que te podemos ayudar?</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="#">Acerca de</a>
												</li>
												<li>
													<a href="#">Contactanos</a>
												</li>
												<li>
													<a href="#">¿Quienes somos?</a>
												</li>
												<li>
													<a href="#">Servicios</a>
												</li>
												<li>
													<a href="#">Ubicación</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link text-white" href="product.html"><img src="../Recursos/images/pedido.png" width="50px" height="30px"><br>&nbsp; Pedidos</a>
						</li>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link text-white" href="Login.php"><img src="../Recursos/images/usuario.png" width="40px" height="30px"><br> &nbsp;Iniciar Sesión</a>
						</li>
						
					</ul>
				</div>
			</nav>
		</div>
	</div>

</head>

	