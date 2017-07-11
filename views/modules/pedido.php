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
                <div class="mx-auto col-sm-4">
                    <div class="primerElemento row">
                

                <!-- AGREGAR PRODUCTO -->
                <div class="col-sm-5 " style="  padding-right: 0px !important;">
                    <div class="form-group ">
                            <button class="btn btn-primary botonAgregar" style="text-align:center;" id="idAgregar" type="button">
                                AGREGAR 
                            </button>

                    </div>
                </div>
                        <div class="col-sm-7" style="padding-left: 1px !important;"> 
                        <div class="row ">
                        <!-- CAMBIAR CATEGORIA  -->
                        <div class="form-group col-sm-12" style="margin-bottom: 0 !important;">
                            <input class="form-control" id="idCategoria" type="text">
                            </input>
                        </div>

                        <!-- CANTIDAD -->

                        <div class="form-group  col-sm-12" style="margin-bottom: 0 !important;">
                                <input class="form-control"  id="idCantidad" min="1" placeholder="cantidad" type="number" value="">
                                </input>
                            </div>
                    </div>
                     </div>
                
            </div>
        </div>

            <div class="col-sm-4 mx-auto">
                <div class="row ">


                        <!-- BUSCAR PRODUCTO -->
                        <div class="form-group col-sm-12 ">

                                <input class="form-control" id="idBuscar" placeholder="buscar" type="text" value="">
                                </input>

                        </div>
                    </div>
                    <div class="row segundoElemento">
                        <!-- ELEGIR PRODUCTO -->
                        <div class="chosen-seleccion  col-sm-12 ">

                                <select class="chosen-select productoSeleccionado" data-placeholder="Elige un producto" id="idElegir" name="formElegir" placeholder="elegir" value="">
                                </select>
 
                        </div>
                    </div>
                </div>

            
            

    </form>
</div>
<script>
$(document).ready(function(){
    $(".borrar").click(function(){
        console.log("BIEN LOCO");

    });
});

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
