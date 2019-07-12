<!DOCTYPE HTML>

<html>
	<head>
		<title>Telephasic by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?=base_url('assets/css/main.css')?>" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<?php require_once('application/views/frontend/base/complementosCalendario.php'); ?> 
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="<?=site_url('Home/index')?>">Bienvenidos</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li>
										<a href="#">Turismo</a>
										<ul>
											<li><a href="<?=site_url('Home/guias')?>">Guías</a></li>
											<li><a href="<?=site_url('Home/tours')?>">Tours</a></li>
											<li>
												<a href="#">Sitios Recomendados</a>
												<ul>
													<li><a href="<?=site_url('Home/restaurantes')?>">Restaurates</a></li>
													<li><a href="<?=site_url('Home/centrosComerciales')?>">Centros Comerciales</a></li>
													<li><a href="<?=site_url('Home/localesNocturnos')?>">Locales Nocturnos</a></li>
													<li><a href="<?=site_url('Home/entreOtros')?>">Entre Otros</a></li>
												</ul>
											</li>
											<li><a href="<?=site_url('Backend/login')?>">Login</a></li>
										</ul>
									</li>
									<li><a href="<?=site_url('Home/blog')?>">Nuestro Blog</a></li>
									<li class="break"><a href="<?=site_url('Reservaciones/inicio')?>">Reservaciones</a></li>
									<li><a href="<?=site_url('Home/nosotros')?>">Nosotros</a></li>
								</ul>
							</nav>

					</div>