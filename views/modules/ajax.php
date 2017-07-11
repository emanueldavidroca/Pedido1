<?php


require_once "../../controller/productos/eventoGetCantidadController.php";
require_once "../../controller/productos/eventoGetProductoController.php";
require_once "../../controller/productos/eventoAgregarProductoController.php";
require_once "../../models/productos/productosModel.php";


class Ajax
{
    public function buscarProducto($producto)
    {
        $respuesta = productosController::getProductos($producto);

        return json_encode($respuesta);
    }
    public function buscarCantidad($cantidad,$producto){
        $respuesta=cantidadController::getCantidad($producto,$cantidad);

        return json_encode($respuesta);
    }
    public function agregarProducto($cantidad,$producto,$cliente,$remito){
 
        $respuesta = agregarController::agregarProducto($producto,$cantidad,$cliente,$remito);

        return json_encode($respuesta);
    }   

}

if (isset($_GET['p'])){
    $producto = $_GET['p'];
	$a = new Ajax();
    $a->buscarProducto($producto);
}

if (isset($_GET['j'])){
    $cantidad=$_GET['c'];
    $producto=$_GET['j'];
    $b = new Ajax();
    $b->buscarCantidad($cantidad,$producto);
}

if (isset($_GET['z']) && isset($_GET['x']) && isset($_GET['y'])) {
    $cantidad=$_GET['z'];
    $producto=$_GET['x'];
    $cliente=$_GET['y'];
    $remito=$_GET['w'];
    $c = new Ajax();
    $c->agregarProducto($cantidad,$producto,$cliente,$remito);
}

