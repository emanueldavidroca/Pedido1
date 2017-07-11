<?php

class ingresoController
{

    public function ingresoUsuario()
    {
        if (isset($_POST["submitIngreso"]) && !isset($_POST["pruebaIngreso"])) {
            /* control de expresiones regulares (validacion de caracteres y numeros)   */
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])) {
                /* Encriptacion de la contraseña */
                $encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datosController = array("usuario" => $_POST["usuarioIngreso"]);

                $respuesta = usuario::ingresoUsuarioModel($datosController, "clientes");
              

                $intentos       = $respuesta["intentosCliente"];
                $usuario        = $_POST["usuarioIngreso"];
                $maximoIntentos = 2;

                if ($intentos < $maximoIntentos) {

                    if ($respuesta["usuarioCliente"] == $usuario && $respuesta["passwordCliente"] == $encriptar) {

                        session_start();

                        $_SESSION["validar"] = true;
                        $_SESSION["idCliente"] = $respuesta["idCliente"];

                        $intentos = 0;

                        $datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);

                        $respuestaActualizarIntentos = usuario::intentosUsuarioModel($datosController, "clientes");
                        header("location:pedido");
                       
                    } else {

                        ++$intentos;

                        $datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);

                        $respuestaActualizarIntentos = usuario::intentosUsuarioModel($datosController, "clientes");

                         header("location:fallo");

                    }

                } else {

                    $intentos = 0;

                    $datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);

                    $respuestaActualizarIntentos = usuario::intentosUsuarioModel($datosController, "clientes");

                    header("location:fallo3intentos");
                }
            }
        }
    }
}
