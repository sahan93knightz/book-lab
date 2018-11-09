<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 10/17/18
 * Time: 2:23 PM
 */

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>BookLab Admin Dashboard</title>
	<!-- Favicon-->
	<link rel="icon" href="/client/img/core-img/favicon.png">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
		  type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="/admin_resources/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="/admin_resources/plugins/node-waves/waves.css" rel="stylesheet"/>

	<!-- Animation Css -->
	<link href="/admin_resources/plugins/animate-css/animate.css" rel="stylesheet"/>

	<!-- Bootstrap Select Css -->
	<link href="/admin_resources/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>

	<!-- Custom Css -->
	<link href="/admin_resources/css/style.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="/admin_resources/css/themes/all-themes.css" rel="stylesheet"/>

</head>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
	<div class="loader">
		<div class="preloader">
			<div class="spinner-layer pl-blue">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>
		<p>Please wait...</p>
	</div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
			   data-target="#navbar-collapse" aria-expanded="false"></a>
			<a href="javascript:void(0);" class="bars"></a>
			<a class="navbar-brand" href="../index.html">Admin Dashboard - Book Lab</a>
		</div>
	</div>
</nav>
<!-- #Top Bar -->
<section>
	<!-- Left Sidebar -->
	<aside id="leftsidebar" class="sidebar">
		<!-- User Info -->
		<div class="user-info">
			<div class="image">
				<img src="/admin_resources/images/user.png" width="48" height="48" alt="User"/>
			</div>
			<div class="info-container">
				<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
				<div class="email">admin@booklab.com</div>
				<div class="btn-group user-helper-dropdown">
					<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
					<ul class="dropdown-menu pull-right">
						<li><a href="/admin/logout"><i class="material-icons">input</i>Sign Out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- #User Info -->
		<!-- Menu -->
		<div class="menu">
			<ul class="list">
				<li class="header">MAIN NAVIGATION</li>
				<li id="category_menu">
					<a href="/admin/category">
						<i class="material-icons">widgets</i>
						<span>Categories</span>
					</a>
				</li>
				<li id="book_menu">
					<a href="/admin/book">
						<i class="material-icons">book</i>
						<span>Books</span>
					</a>
				</li>
			</ul>
		</div>
		<!-- #Menu -->
		<!-- Footer -->
		<div class="legal">
			<div>
				<strong>Book<span class="text-muted">Lab</span></strong> - Sahan Ranasinghe
			</div>
			<hr>
			<div class="copyright">
				&copy; 2018 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
			</div>
			<div class="version">
				<b>Version: </b> 1.0.5
			</div>
		</div>
		<!-- #Footer -->
	</aside>
	<!-- #END# Left Sidebar -->
</section>
