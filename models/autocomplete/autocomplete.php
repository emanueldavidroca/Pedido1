<?php
require_once "models/conexion.php";

$nombreProducto= $_GET["produc"];
$sql = conexion::conectar()->prepare("SELECT nombreProducto FROM productos WHERE idProducto = '$nombreProducto' ORDER BY asc");
$sql->execute();
$productos=$sql->fetch(PDO::FETCH_OBJ);
echo json_encode($productos);

 ?>