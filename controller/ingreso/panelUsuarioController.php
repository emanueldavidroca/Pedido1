<?php 

	class panelUsuarioController
	{
		
		public function panelUsuario()
		{
			$cliente = $_SESSION["idCliente"];
			$respuesta = usuario::getCliente($cliente);

			echo '
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
    .$respuesta["usuarioCliente"].'
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">cambiar contraseña</a>
    <a class="dropdown-item" href="#">editar mi perfil</a>
    <a class="dropdown-item" href="#">cerrar sesion</a>
  </div>
</div>';	
}
	}

 ?>