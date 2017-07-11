<!-- FORMULARIO DE INGRESO -->

<div class="container ingresar">
<div class="col-sm-6 mx-auto">
<form method="post">
    <!-- INPUT DE USUARIO  -->
    <div class="form-group row">
        <label for="usuarioIngreso">
            Usuario
        </label>
        <input class="form-control" id="idUsuario" name="usuarioIngreso" placeholder="Ingresar usuario" type="text">
        </input>
    </div>
    <!-- FIN DEL INPUT DE USUARIO -->

    <!-- INPUT DE PASSWORD  -->
    <div class="form-group row">
        <label for="passwordIngreso">
            Contraseña
        </label>
        <input class="form-control" id="idPassword" name="passwordIngreso" placeholder="ingrese contraseña" type="password">
        </input>
    </div>
    <!-- FIN DEL INPUT DE PASSWORD -->
<?php if (isset($_GET["action"])):

    if ($_GET["action"] == "fallo") {

        echo "Fallo al ingresar";

    }

    else if ($_GET["action"] == "fallo3intentos") {

        $captcha = new captcha();
        $captcha->captchaIngresoController();

        

        echo '<div class="form-group col-sm-3">
        <label for="captchaIngreso">
            
        </label>
        <input class="form-control" id="idCaptcha" name="captchaIngreso" placeholder="" type="text">
        </input>
    </div>';
    // echo "<p>Ha fallado 3 veces para ingresar, favor llenar el captcha</p>";   

    }
endif;
?>
    <!-- INPUT DE SUBMIT  -->
    <div class="row">
        <button type="submit" name="submitIngreso" class="btn btn-primary mx-auto">Ingresar</button>
    </div>
</form>
</div>
</div>
<?php

        $ingreso = new ingresoController();
        $ingreso->ingresoUsuario();



?>

<!-- FIN DE FORMULARIO DE INGRESO -->