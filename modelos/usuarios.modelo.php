<?php

require_once "conexion.php";

class ModeloUsuarios{

	/* Mostrar usuarios */

	static public function MdlMostrarUsuarios($tabla,$item,$valor){

		$statement = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$statement -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$statement -> execute();

		return $statement -> fetch();

	}
	

}