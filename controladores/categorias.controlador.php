<?php 

class ControladorCategorias{

	 /*=============================================
	 =            CREAR CATEGORIAS          =
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

	 /*=============================================
	 =            MOSTRAR CATEGORIAS          =
	 =============================================*/

	 static public function ctrMostrarCategorias($item, $valor){

	 	$tabla = "categorias";

	 	$respuestas = ModeloCategorias::mdlMostrarCategorias($tabla,$item, $valor);

	 	return $respuestas;


	 }

	 /*=============================================
	 =            EDITAR CATEGORIAS          =
	 =============================================*/

	 static public function ctrEditarCategoria(){

		if (isset($_POST["editarCategoria"])) {
		
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])) {

				$tabla = "categorias";

				$datos = array("categoria" => $_POST["editarCategoria"], "id"=>$_POST["idCategoria"]);  

				$respuesta = ModeloCategorias::mdlEditarCategorias($tabla, $datos);

				if($respuesta == ok){

					echo '<script>

					swal({
						type:"success",
						title:"¡La categoria ha sido cambiada correctamente",
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


	 /*=============================================
	 =            BORRAR CATEGORIAS          =
	 =============================================*/

	 static public function ctrborrarCategorias(){

	 	if (isset($_GET["idCategoria"])) {
	 			
	 			$tabla = "categorias";
	 			$datos = $_GET["idCategoria"];

	 			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla,$datos);


	 			if ($respuesta == ok) {

	 					echo '<script>

					swal({
						type:"success",
						title:"La Categoria fue eliminada Correctamente",
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

