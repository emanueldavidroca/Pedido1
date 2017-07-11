<?php

class captcha
{

    public function captchaIngresoController()
    {
        
        $letras  = str_split("abcdefghijklmnñopqrstuvwxyz");
        $numeros = str_split(1234567890);
        

        //var_dump($mescla[1][1]);
        for ($i = 0; $i < 5; $i++) {
            $LoN = rand(0, 1);

            if ($LoN == 0) {
                $test[$i] = $letras[rand(0, 26)];
            } else if ($LoN == 1) {
                $test[$i] = $numeros[rand(0, 9)];
            }
        }
        $prueba = $test[0] . $test[1] . $test[2] . $test[3] . $test[4];

        if (!isset($_POST["pruebaIngreso"])) {
        	echo '<input class="col-sm-2" style="position:absolute;" type="hidden" name="pruebaIngreso"  value="'.$prueba.'"onselectstart="return false">
        	</input>';

            echo '<div class="captcha col-sm-3" style="float:left;" onselectstart="return false"><span><h2>' . $prueba . '</h2></span></div>';
        }
        if (isset($_POST["pruebaIngreso"])) {
        	$usuario = $_POST["usuarioIngreso"];
        	$prueba = $_POST["pruebaIngreso"];
            /* control de expresiones regulares (validacion de caracteres y numeros)   */
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])) {
                /* Encriptacion de la contraseña */
                $encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $captcha   = $_POST["captchaIngreso"];
                echo $encriptar . "<br>";
                echo $captcha . "<br>";
                echo $prueba;
                $datosController = array("usuario" => $_POST["usuarioIngreso"]);

                $respuesta = usuario::ingresoUsuarioModel($datosController, "clientes");
                if ($respuesta["usuarioCliente"] == $usuario && $respuesta["passwordCliente"] == $encriptar && $captcha == $prueba){

                    session_start();

                    $_SESSION["validar"] = true;

                    $intentos = 0;

                    $datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);

                    $respuestaActualizarIntentos = usuario::intentosUsuarioModel($datosController, "clientes");
                    header("location:pedido");
                }
                else{
                	 header("location:fallo3intentos");
                }
            }

        }
    }
}
