<?php

class agregarController
{

    public function agregarProducto($productoController, $cantidadController, $clienteController, $remitoController)
    {

        $respuesta = productosModel::checkPedido($productoController, $cantidadController);
        if ($respuesta == true) {

            $datos_confirmados = array(
                "respuesta"     => "Gracias por su compra",
                "datos"         => 
                "<tr id='".$respuesta["idInventario"].'-'.$respuesta["nombreProducto"]. "'>
                <td><input id='idProducto' name='idProducto[]' readonly='readonly' type='text' value='".$respuesta["idInventario"].'-'.$respuesta["nombreProducto"]. "'></td>

                <td><input id='cantidad' name='idCantidad[]' readonly='readonly' type='text' value='".$cantidadController."'></td>

                <td><input id='categoria' name='idCategoria[]' readonly='readonly' type='text' value='".$respuesta["nombreCategoria"]."'></td> 

                <td> <button class='borrar' type='button' id='".$respuesta["idInventario"]."-".$respuesta['nombreProducto']."'>BORRAR</button></td></tr>",
                "estado"        => true,
            );

        } else {
            $datos_confirmados = array(
                "respuesta" => "<h3>El producto que busca no esta en existencia  o la cantidad ingresada no existe</h3>",
                "estado"    => false,
            );
        }

        echo json_encode($datos_confirmados);

    }
}
