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
	<title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
	<!-- Favicon-->
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
		  type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="/plugins/node-waves/waves.css" rel="stylesheet"/>

	<!-- Animation Css -->
	<link href="/plugins/animate-css/animate.css" rel="stylesheet"/>

	<!-- Morris Chart Css-->
	<link href="/plugins/morrisjs/morris.css" rel="stylesheet"/>

	<!-- Bootstrap Select Css -->
	<link href="/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>

	<!-- Dropzone Css -->
	<link href="/plugins/dropzone/dropzone.css" rel="stylesheet">

	<!-- Custom Css -->
	<link href="/css/style.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="/css/themes/all-themes.css" rel="stylesheet"/>
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
				<img src="/images/user.png" width="48" height="48" alt="User"/>
			</div>
			<div class="info-container">
				<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
				<div class="email">john.doe@example.com</div>
				<div class="btn-group user-helper-dropdown">
					<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
					<ul class="dropdown-menu pull-right">
						<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
						<li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
						<li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- #User Info -->
		<!-- Menu -->
		<div class="menu">
			<ul class="list">
				<li class="header">MAIN NAVIGATION</li>
				<li class="active">
					<a href="../index.html">
						<i class="material-icons">home</i>
						<span>Home</span>
					</a>
				</li>
				<li>
					<a href="/admin/category">
						<i class="material-icons">widgets</i>
						<span>Categories</span>
					</a>
				</li>
				<li>
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
			<div class="copyright">
				&copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
			</div>
			<div class="version">
				<b>Version: </b> 1.0.5
			</div>
		</div>
		<!-- #Footer -->
	</aside>
	<!-- #END# Left Sidebar -->
</section>
