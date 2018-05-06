<?php 

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	=            MOSTRAR PRODUCTOS            =
	=============================================*/

	static public function mdlMostrarProductos($tabla,$item,$valor) {

		if ($item != null) {

			$statement = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$statement -> bindParam(".".$item, $valor, PDO::PARAM_STR);

			$statement -> execute();

			return $statement -> fetch();
			
		}else {

			$statement = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$statement -> execute();

			return $statement -> fetchAll();

		}

		$statement -> close();

		$statement = null;

	}


}
