<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Pedidos INCAR</title>
<!-- 	<link rel="icon"  href="favicon.ico"> -->
	<link rel="stylesheet" type="text/css" href="views/bootstrap/css/forma.css">
	<link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="views/bootstrap/css/jquery-ui.min.css">

	<link type="text/img" href="views/bootstrap/img/chosen-sprite.png">
	<link rel="stylesheet" type="text/css" href="views/bootstrap/css/chosen.min.css">


</head>
<body>

<header>
	<?php

session_start();

if(!$_SESSION["validar"]):

    header("location:ingresar");

    exit();

endif;



?>
</header>

