<?php 

class ControladorCategorias{

	 /*=============================================
	 =            Section comment block            =
	 =============================================*/
	 
	static public function ctrCrearCategoria(){

		if (isset($_POST["nuevaCategoria"])) {
		
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])) {

				$tabla = "categorias";

				$datos = $_POST["nuevaCategoria"];

				$respuesta = ModeloCategorias::mdlIngresarCategorias($tabla, $datos);

				if($respuesta == ok){

					echo '<script>

					swal({
						type:"success",
						title:"¡La categoria ha sido guardada correctamente",
						showConfirmButton: true,
						closeOnConfirm:false
					}).then((result) => {
						
						window.location = "categorias";

					})
					 </script>';

				}
				

			}else{

				echo '<script>

					swal({
						type:"error",
						title:"¡La categoria no puede ir vacia o llevar caracteres especiales!",
						showConfirmButton: true,
						closeOnConfirm:false
					}).then((result) => {
						
						window.location = "categorias";

					})
					 </script>';
			}


		}



	}


}

