<?php

class plantillaController
{
    public function plantilla()
    {
        require_once "views/template.php";
    }

}
class enlaceController
{

    public function enlacePagina()
    {
        if (isset($_GET["action"])) {
            $datosController = $_GET["action"];
        } else {
            $datosController = "inicio";
        }
        $respuesta = enlace::enlacePagina($datosController);
        require_once $respuesta;
    }
}
