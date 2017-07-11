<?php 

	class cantidadController
	{
		
		public function getCantidad($productoBuscado,$cantidadBuscada)
		{	

			$productoController = $productoBuscado;
			$cantidadController = $cantidadBuscada;

			$respuesta=productosModel::checkCantidad($productoController,$cantidadController);
			if (!empty($respuesta)) {
				$respuesta = array (
					"respuesta" => "<h3>Cantidad valida</h3>",
					"estado" => true
					);
			}
			else {
				$respuesta = array(
					"respuesta" => "<h3>Stock insuficiente</h3>",
					"estado" => false
					);
			}
			echo json_encode($respuesta);


		}
	}