    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse mb-4">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pedido">Pedido</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="detalles">Detalles</a>
          </li>
        </ul>
        <?php 
        if (isset($_SESSION["idCliente"])){
          $mvc = new panelUsuarioController();
          $mvc->panelUsuario();
        }
          
         ?>
      </div>
    </nav>