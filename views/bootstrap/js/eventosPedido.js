
/*-------BUSQUEDA DE PRODUCTOS-------*/
//si se busca un producto en el campo de busqueda 
//se ejecuta la funcion de producto
$(document).ready(function() {
    $("#idBuscar").keyup(function() {
        producto();
    });
});
//se recibe el dato buscado y se envia a ajax para 
//recibir la lista de productos relacionado con lo buscado
//si la busqueda del producto no coincide con un producto existente
//la lista de opciones se borrara
    function producto(){
        var valor = $("#idBuscar").val();
        $.ajax({
            type: "GET",
            url: "views/modules/ajax.php",
            dataType: "json",
            data: {
                p: valor
            },
            success: function(data) {
                if (data.estado == true) {
                    $("#idElegir").html(data.datos);
                    $("#idElegir").trigger("chosen:updated");
                    $("#idCantidad").prop("disabled", false);


                } else {
                    $("#idElegir option").each(function(){

                        $(this).remove();
                    });

                    $("#idElegir").trigger("chosen:updated");
                    $("#idCantidad").prop("disabled", true);
                }
            }
        });
    }

/*-X-X-X-FIN DE BUSQUEDA DE PRODUCTO-X-X-X-*/




/*-------TRAE LA CATEGORIA DEL PRODUCTO ELEGIDO-------*/
//si cambia el option del producto elegido 
//se ejecuta la funcion de categoria

$(document).ready(function() {
    $("#idBuscar").keyup(function() {
        categoria();
    });
    $("#idElegir").change(function() {
        categoria();
    });
});
//la categoria del producto se configura a la del producto
function categoria() {
    $("#idCategoria").val($("#idElegir option:selected").attr("id"));
}
/*-X-X-X-FIN DE CATEGORIA-X-X-X-*/



/*-------VERIFICÁ SI LA CANTIDAD ES VALIDA O NO-------*/

//Si cambia el campo del input cantidad o si cambia de producto elegido
//, se ejecuta la funcion cantidad.

$(document).ready(function() {
    $("#idCantidad").keyup(function() {
        cantidad();
    });
    $("#idElegir").change(function() {
        cantidad();
    });
});
//Se recibe la cantidad del campo cantidad y el producto elegido y se envia a ajax 
//para comprabar que la cantidad ingresada sobrepasa o no lo que esta en la base de datos
// sumandola a la de los pedidos en temporal.
function cantidad() {
    var cantidadBuscada = $("#idCantidad").val();
    var producto = $("#idElegir").val().split("-");

    var id = producto[0];
    $.ajax({
        type: "GET",
        url: "views/modules/ajax.php",
        dataType: "json",
        data: {
            c: cantidadBuscada,
            j: id
        },
        success: function(data) {
            if (data.estado == true) {
                $("#idAgregar").prop('disabled', false);
            } else if (data.estado == false) {
                $("#idAgregar").prop('disabled', true);
            }
        }
    });
}
/*-X-X-X-FIN DE CANTIDAD-X-X-X-*/



/*-------AGREGAR EL PRODUCTO-------*/

//si apreta el boton de agregar 
//se ejecuta la funcion de agregar
$(document).ready(function() {
    $("#idAgregar").click(function() {
        agregar();
    });
});


//en este se comprueba que el producto por agregar ya exista en la pagina
//actual ,en el caso de que no exista se procede a agregar a la lista de pedidos
function agregar() {
    var productoAComparar=$("#idElegir").val();
    var producto = productoAComparar.split("-");
    var id = producto[0];
    var cantidadBuscada = $("#idCantidad").val();
    var cliente = $("#idCliente").val();
    var remito = $("#idRemito").val();
    var coincidencia = "sin coincidencia";

    $("#idDetalles tfoot").find("tr").each(function(){

        if ($(this).attr("id")==productoAComparar) {

            coincidencia = "hubo una coincidencia";
        }
        else{

        }
    });
    if (coincidencia == "sin coincidencia") {
    $.ajax({
        type: "GET",
        url: "views/modules/ajax.php",
        dataType: "json",
        data: {
            z: cantidadBuscada,
            x: id,
            y: cliente,
            w: remito
        },
        success: function(data) {
            if (data.estado == true) {
                console.log("SI LLEGE HASTA ACA");
                $("#idDetalles tfoot").append(data.datos);
                $("#idElegir").val("");
                $("#idBuscar").val("");
                $("#idCategoria").val("");
                $("#idCantidad").val("");
                $("#idElegir").trigger("chosen:updated");
            } else {
                console.log("NO NO LLEGE HASTA ACA");
            }
        }
    });
    }
}
/*-X-X-X-FIN DE AGREGAR-X-X-X-*/