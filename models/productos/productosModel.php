<?php 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Pedido1/models/conexion.php');
class productosModel extends conexion
{
	
	public function getProductosModel($busqueda)
	{

		$stmt = Conexion::conectar()->prepare("SELECT inv.idInventario,prod.idProducto,prod.nombreProducto,cat.nombreCategoria FROM productos prod INNER JOIN  categorias cat ON prod.idCategoria = cat.idCategoria INNER JOIN inventario inv ON prod.idProducto = inv.idProducto WHERE prod.nombreProducto LIKE :busqueda");
		$busqueda = "%".$busqueda."%";
		$stmt->bindParam(":busqueda",$busqueda, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}




	public function checkCantidad($producto,$cantidad){

		$stmt = Conexion::conectar()->prepare("SELECT idInventario,SUM(cantidadProducto) as cantidadtemp FROM pedidotemp WHERE idInventario = :producto");
		$stmt->bindParam(":producto",$producto, PDO::PARAM_INT);
		

		$stmt->execute();
		$stmt=$stmt->fetch();
		if (isset($stmt["cantidadtemp"])) {
			$cantidad=$cantidad+$stmt["cantidadtemp"];
		}
		else{
			
		}
		

		$stmt = Conexion::conectar()->prepare("SELECT inv.idInventario,inv.cantidadIngresada FROM inventario inv WHERE inv.idInventario = :producto AND inv.cantidadIngresada >= :cantidad AND :cantidad >= 1");
		$stmt->bindParam(":producto",$producto, PDO::PARAM_INT);
		$stmt->bindParam(":cantidad",$cantidad, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}




		public function checkPedido($producto,$cantidad){
		$stmt = Conexion::conectar()->prepare("SELECT prod.idProducto,prod.nombreProducto,inv.cantidadIngresada,inv.idInventario,cat.idCategoria,cat.nombreCategoria FROM productos prod INNER JOIN categorias cat ON prod.idCategoria = cat.idCategoria INNER JOIN inventario inv ON prod.idProducto = inv.idProducto WHERE inv.idInventario = :producto AND inv.cantidadIngresada >= :cantidad AND :cantidad >= 1");
		$stmt->bindParam(":producto",$producto, PDO::PARAM_INT);
		$stmt->bindParam(":cantidad",$cantidad, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}



		public function checkRemito($cliente){
		$stmt = Conexion::conectar()->prepare("SELECT idRemito,idCliente FROM pedidotemp WHERE idCliente = :cliente  ORDER BY idRemito DESC LIMIT 1");
		$stmt->bindParam(":cliente",$cliente, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}



		public function setPedido($cliente,$remito,$producto,$categoria,$cantidad){
		$stmt = Conexion::conectar()->prepare("INSERT INTO pedidotemp(idCliente,idRemito,idInventario,idCategoria,cantidadProducto) 
			VALUES (:cliente,:remito,:producto,:categoria,:cantidad)");
		$stmt->bindParam(":cliente",$cliente, PDO::PARAM_INT);
		$stmt->bindParam(":remito",$remito, PDO::PARAM_INT);
		$stmt->bindParam(":producto",$producto, PDO::PARAM_INT);
		$stmt->bindParam(":categoria",$categoria, PDO::PARAM_INT);
		$stmt->bindParam(":cantidad",$cantidad, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return true;
		}
		else{
			return false;
		}
		$stmt->close();
	}


}

 ?>