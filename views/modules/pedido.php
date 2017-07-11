<script src="views/bootstrap/js/jquery.min.js">
</script>
<script src="views/bootstrap/js/jquery-ui.min.js">
</script>
<script src="views/bootstrap/js/tether.min.js">
</script>
<script src="views/bootstrap/js/bootstrap.min.js">
</script>
<script src="views/bootstrap/js/chosen.jquery.min.js">
</script>
<script src="views/bootstrap/js/truncado.js">
</script>
<script src="views/bootstrap/js/eventosPedido.js">
</script>


<div class="container ingresar">
    <form method="post">
        <div class="col-sm-6 mx-auto">
            <div class="row">
            <div class="PedidoBuscador">
                <!-- AGREGAR PRODUCTO -->
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="">
                            <button class="btn btn-primary" id="idAgregar" style="height: 90px;font-size: 12px;" type="button">
                                AGREGAR
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">

                        <!-- BUSCAR PRODUCTO -->
                        <div class="form-group col-sm-5 ">
                            <div class="">
                                <input class="form-control" id="idBuscar" placeholder="buscar" type="text" value="">
                                </input>
                            </div>
                        </div>
                        <!-- CAMBIAR CATEGORIA -->
                        <div class="form-group col-sm-5 ">
                            <input class="form-control" id="idCategoria" type="text">
                            </input>
                        </div>
                        <!-- ELEGIR PRODUCTO -->
                        <div class="form-group col-sm-5">
                            <div class="">
                                <select class="chosen-select " data-placeholder="Elige un producto" id="idElegir" name="formElegir" placeholder="elegir" value="">
                                </select>
                            </div>
                        </div>
                        <!-- CANTIDAD -->
                        <div class="form-group col-sm-5 ">
                            <div class="">
                                <input class="form-control" id="idCantidad" min="1" name="formCantidad" placeholder="cantidad" type="number" value="">
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
            </div>
        </div>
    </form>
</div>
<script>

    $(document).ready(function(){
    $("#idElegir").chosen({width: "100%",disable_search_threshold: 10});
    $("#idAgregar").prop("disabled", true );
    $("#idCantidad").prop("disabled", true );
    $("#idCategoria").prop("disabled", true );




  });
</script>
<div class="container">
<form method="post">
    <div class="row justify-content-between">

        <div class="col-sm-2">
            <input class="form-control" type="text" value="Remito nº">
           
        </div>
        <div class="col-sm-1">
        <?php  
        $crud= new remitoController();
        $crud->getRemito();
        ?>
          </div>  

        
        <?php  
        echo '<input type="hidden" id="idCliente" name="idCliente" value="'.$_SESSION['idCliente'].'">';
        ?>
        <div class="col-sm-2">
            <input class="form-control btn-success" name="idConfirmar" id="idConfirmar" type="submit" value="idConfirmar">
        </div>

    </div>
    <div id="detalles">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-sm" id="idDetalles">
                    <tbody>
                        <tr>
                            <th>
                                Producto
                            </th>
                            <th>
                                Cantidad
                            </th>
                            <th>
                                Categoria
                            </th>
                            <th>
                                Quitar
                            </th>
                        </tr>
                    </tbody>
                    
                        <tfoot>
                        </tfoot>
                    </form>
                    <?php
    $mvc = new insertarPedidoController();
    $mvc->insertarPedido();

    
?>
                </table>
            </div>
        </div>
    </div>
</div>
