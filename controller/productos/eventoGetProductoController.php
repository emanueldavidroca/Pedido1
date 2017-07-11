<?php

class productosController
{

    public function  getProductos($valorBusqueda)
    {
    	$datosController = $valorBusqueda;        

    	$respuesta = productosModel::getProductosModel($datosController);
        if (!empty($respuesta)) {
                $respuesta_concatenada = "<option value=''></option>";
        foreach ($respuesta as $key) {
            $respuesta_concatenada .= "<option id=".$key['nombreCategoria']." value='".$key['idInventario'].'-'.$key['nombreProducto']."'>";
            $respuesta_concatenada .= $key["idInventario"] . "-";
            $respuesta_concatenada .= $key["nombreProducto"];
            $respuesta_concatenada .= "</option>";
            
                    }
 
            $respuesta_final = array(
                "datos" => $respuesta_concatenada,
                "estado" => true
            );
        }
        else{
            $respuesta_final = array(
                "estado" => false 
                );
        }	

    		echo json_encode($respuesta_final);

    }
}
