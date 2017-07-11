<?php 
	// CONTROLADORES

	require_once "controller/enlace/enlacePaginaController.php";
	
	require_once "controller/ingreso/captchaUsuarioController.php";
	require_once "controller/ingreso/ingresoUsuarioController.php";
	require_once "controller/ingreso/panelUsuarioController.php";

	require_once "controller/productos/remitoController.php";
	require_once "controller/productos/insertarPedidoController.php";
	require_once "controller/productos/eventoGetCantidadController.php";
	require_once "controller/productos/eventoGetProductoController.php";
	require_once "controller/productos/eventoAgregarProductoController.php";

	// MODELOS 

	require_once "models/productos/productosModel.php";
	require_once "models/enlace/enlacePaginaModel.php";
	require_once "models/usuario/usuarioModel.php";
	require_once "models/conexion.php";

 $mvc = new plantillaController();
 $mvc->plantilla()

 ?>