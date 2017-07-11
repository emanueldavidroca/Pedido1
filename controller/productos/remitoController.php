<?php

class remitoController
{
    public function getRemito()
    {
    	$respuesta = productosModel::checkRemito($_SESSION["idCliente"]);
    	if ($respuesta == false) {
    		$remito = 1;
    	}

    	else if(is_numeric($respuesta["idRemito"])){
    		$remito = $respuesta["idRemito"] + 1 ;
    	}
    	
    	echo '<input class="form-control" id="idRemito" name="idRemito" value='.$remito.' readonly="readonly">';


    }
}
