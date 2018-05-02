/* Subiendo la foto del Usuario */

$(".nuevaFoto").change(function() {


	var imagen = this.files[0];

	/*Validamos el formato de la imagen sea JPG o PNG*/

	
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
  		 	  type: "error",
		      title: "Error al subir la image.",
			  text: " La imagen debe estar en formato JPG o PNG",
		      confirmButtonText: "Cerrar"
		    });
  		
  		} else  if(imagen["size"] > 2000000){

  			$(".nuevaFoto").val("");

  		 swal({
  		 	  type: "error",
		      title: "Error al subir la image.",
		      text: "La imagen no debe pesar mas de 2MB",
		      confirmButtonText: "Cerrar"
		    });

  		} else{

  			var datosImagen = new FileReader;
  			datosImagen.readAsDataURL(imagen);

  			$(datosImagen).on("load", function(event){

  				var rutaImagen = event.target.result;

  				$(".previsualizar").attr("src", rutaImagen);


  			})

  		}

})

/* Editar Usuario */
$(".tablas").on("click",".btnEditarUsuario",function(){

  var idUsuario = $(this).attr("idUsuario");


  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({

      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data:datos,
      cache:false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
        
        //console.log("respuesta", respuesta);

        $("#editarNombre").val(respuesta["nombre"]);
        $("#editarUsuario").val(respuesta["usuario"]);
        $("#editarPerfil").html(respuesta["perfil"]);
        $("#editarPerfil").val(respuesta["perfil"]);
        $("#fotoActual").val(respuesta["foto"]);

        $("#passwordActual").val(respuesta["password"]);

        if (respuesta["foto"] != "") {
            $(".previsualizar").attr("src",  respuesta["foto"]);
        }

      }
  });

})

/* Activar Usuario */
$(".tablas").on("click",".btnActivar",function(){


  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);


  $.ajax({

      url:"ajax/usuarios.ajax.php",
      method:"POST",
      data:datos,
      cache:false,
      contentType:false,
      processData: false,
      success: function(respuesta){

      
      }

  })

  if(estadoUsuario == 0){

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desactivado');
    $(this).attr("estadoUsuario",1);

  }else{

    $(this).addClass('btn-success');
    $(this).removeClass('btn-danger');
    $(this).html('Activado');
    $(this).attr("estadoUsuario",0);

  }

})

/* Revisar si el Usuario ya esta Registrado */

$("#nuevoUsuario").change(function(){

  $(".alert").remove();

  var usuario = $(this).val();

  var datos = new FormData();

  datos.append("validarUsuario", usuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType:false,
    processData: false,
    dataType: "json",
    success:function(respuesta){
 
       if (respuesta) {

        /*Vericar esta linea de codigo... Posible a usar en otras cosas*/

         $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en el Sistema</div>');

         $("#nuevoUsuario").val("");

       }
    
    }


  })

})

/* Eliminar Usuarios*/

$(".tablas").on("click",".btnEliminarUsuario",function(){

var idUsuario = $(this).attr("idUsuario");

var fotoUsuario = $(this).attr("fotoUsuario");

var usuario = $(this).attr("usuario");

  swal({

    title: '¿Esta seguro de borrar el usuario?',
    text: "¡Si no lo esta puede cancelar la accion",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText:'Cancelar',
    confirmButtonText:'Si, borrar Usuario!'

  }).then((result)=>{

  if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})