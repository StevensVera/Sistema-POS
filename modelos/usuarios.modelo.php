<?php

require_once "conexion.php";

class ModeloUsuarios{

	/* Mostrar usuarios */

	static public function MdlMostrarUsuarios($tabla,$item,$valor){

		$statement = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$statement -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$statement -> execute();

		return $statement -> fetch();

		$statement -> close();

		$statement = null;

	}


	/* Registro de Usuarios */


	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) VALUES (:nombre, :usuario, :password, :perfil, :foto)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;



	}
	

}