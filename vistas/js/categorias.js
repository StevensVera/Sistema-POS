/*=============================================
=            EDITAR CATEGORIA           =
=============================================*/

$(".tablas").on("click",".btnEditarCategoria",function(){
	
	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({
		url:"ajax/categoria.ajax.php",
		method: "POST",
		data:datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success: function(respuesta){

			$("#editarCategoria").val(respuesta["categoria"]);
			$("#idCategoria").val(respuesta["id"]);





		}

	})

})

/*=============================================
=           ELIMINAR CATEGORIA           =
=============================================*/

$(".tablas").on("click",".btnEliminarCategoria",function(){


	var idCategoria = $(this).attr("idCategoria");

	swal({

		title: '¿Esta seguro de borrar la Categorias',
		text: "!si no lo esta puede cancelar la accion",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar categoria!'
	}).then((result)=>{

		if (result.value) {

			window.location= "index.php?ruta=categorias&idCategoria="+idCategoria;
		}

	})

})



