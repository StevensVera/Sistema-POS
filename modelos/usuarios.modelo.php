<?php

require_once "conexion.php";

class ModeloUsuarios{

	/* Mostrar usuarios */

	static public function MdlMostrarUsuarios($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();


		} else{

			$statement = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$statement -> execute();

			return $statement -> fetchAll();



		}

				

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

	/* Registro de Usuarios */

	static public function mdlEditarUsuario($tabla, $datos){

		$statement = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$statement -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$statement -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$statement -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$statement -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$statement -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);


		if($statement->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$statement->close();
		
		$statement = null;

	}
	

}