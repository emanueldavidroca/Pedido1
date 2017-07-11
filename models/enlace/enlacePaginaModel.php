<?php

class enlace
{

    public function enlacePagina($datos)
    {
        if ($datos == "pedido" || $datos == "detalles" ||
            $datos == "ingresar" || $datos == "inicio") {
            if ($datos == "pedido") {
                $modules = "views/modules/pedido.php";
            } 
            else if ($datos == "detalles") {
                $modules = "views/modules/detalles.php";
            } 
            else if ($datos == "fallo") {
                $modules = "views/modules/ingresar.php";

            } 
            else if ($datos == "ingresar") {
                $modules = "views/modules/ingresar.php";

            } 
            else if ($datos == "inicio") {
                $modules = "views/modules/ingresar.php";
            }
            } else {
                $modules = "views/modules/ingresar.php";

        }
        return $modules;
    }
}
