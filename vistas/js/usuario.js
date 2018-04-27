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
