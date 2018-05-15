/*=============================================
=            CARGAR LA TABLA DINAMICA            =
=============================================*/

var table = $(".tablaProductos").DataTable({

	"ajax":"ajax/productos.ajax.php",
	//"scrollX": true,
	"columnDefs":[
		{

			"targets":-9,
			"data":null,
			"defaultContent":'<img class="img-thumbnail imgTabla" width="40px">'

		},
		{

			"targets":-1,
			"data":null,
			"defaultContent":'<div class="btn-group"><button class="btn btn-warning btnEditarProducto" idProducto ><i class="fa fa-pencil"></i></button><button class="btn btn-danger btnEliminarProducto" idProducto ><i class="fa fa-times"></i></button></div>'

		}

	]

})

/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$('.tablaProductos tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();

        $(this).attr("idProducto", data[9])
       
    } );

/*=============================================
	FUNCION PARA CARGAR LAS IMAGENES
=============================================*/

setTimeout(function(){

	var imgTabla = $(".imgTabla");

	for(var i = 0; i < imgTabla.length; i++){

		var data = table.row($(imgTabla[i]).parents("tr")).data();
		

		$(imgTabla[i]).attr("src", data[1]);

	}

},300)













