<?php

class insertarPedidoController
{
    public function insertarPedido()
    {
        if (isset($_POST["idConfirmar"])) {
            $iteraciones = count($_POST["idProducto"]);

            for ($i = 0; $i < $iteraciones; $i = $i) {
                
                $producto = explode("-", $_POST["idProducto"][$i]);

                if ($_POST["idCategoria"][$i] == "vacuna") {
                    $categoria = 1;
                } else if ($_POST["idCategoria"][$i] == "Avícola") {
                    $categoria = 4;
                } else if ($_POST["idCategoria"][$i] == "cerdo") {
                    $categoria = 5;
                }

                if (is_numeric($_POST["idCantidad"][$i])) {
                    $cantidad = $_POST["idCantidad"][$i];
                }

                $cliente = $_POST["idCliente"];
                $remito  = $_POST["idRemito"];
                
                $respuesta = productosModel::checkCantidad($producto[0],$cantidad);

                if ($respuesta == false) {
                    
                    $entradasIncorrectas[] = $producto[1];
                    $detener               = "existe,por lo tanto el pedido es invalido";
                }

                else{
                $arrayPedido[$i]["cliente"]=$cliente;
                $arrayPedido[$i]["remito"]=$remito;
                $arrayPedido[$i]["producto"]=$producto[0];
                $arrayPedido[$i]["categoria"]=$categoria;
                $arrayPedido[$i]["cantidad"]=$cantidad;
                }

                $i++;
            }
            if (!isset($detener)) {
                
                for ($i=0; $i < $iteraciones; $i = $i) { 

                $respuesta = productosModel::setPedido($arrayPedido[$i]["cliente"], $arrayPedido[$i]["remito"], $arrayPedido[$i]["producto"], $arrayPedido[$i]["categoria"],$arrayPedido[$i]["cantidad"]);
                $i++;
                }
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
    }
}
