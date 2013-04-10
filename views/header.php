<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo NAME; ?></title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<!-- Le styles -->
	<link href="./resources/css/bootstrap.css" rel="stylesheet">
	<style>
		body { padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */ }
	</style>
	<link href="./resources/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="./resources/css/main.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="./resources/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="#">SQLMap4Kiddiez</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li <?php if($currentPage == 'singlelink') echo 'class="active"'; ?>><a href="<?php echo createUrl('home'); ?>">Single link</a></li>
						<li <?php if($currentPage == 'fullsite') echo 'class="active"'; ?>><a href="<?php echo createUrl('fullsite'); ?>">Full website</a></li>
						<li <?php if($currentPage == 'googledorks') echo 'class="active"'; ?>><a href="#contact">Google dorks</a></li>
						<li <?php if($currentPage == 'fuzzer') echo 'class="active"'; ?>><a href="#contact">Fuzzer</a></li>
						<li class="divider-vertical"></li>
						<li <?php if($currentPage == 'history') echo 'class="active"'; ?>><a href=<? echo createUrl('history'); ?>>History</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">