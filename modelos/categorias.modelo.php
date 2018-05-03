<?php 

require_once "conexion.php";

 class ModeloCategorias{

 	/* CREAR CATEGORIA */

 	static public function mdlIngresarCategorias($tabla, $datos){

 		$statement = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) values (:categoria)");

 		$statement->bindParam(":categoria",$datos, PDO::PARAM_STR);

 		if ($statement->execute()) {
 			
 			return "ok";
 		}else{

 			return "error";
 		}

 		$statement->close();
 		$statement = null;
 	}

 	 /*=============================================
	 =            MOSTRAR CATEGORIAS          =
	 =============================================*/


	 static public function mdlMostrarCategorias($tabla, $item ,$valor){

	 	if ($item != null) {
	 		
	 		$statement = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

	 		$statement -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	 		$statement -> execute();

	 		return $statement -> fetch();

	 	}else{

	 		$statement = Conexion::conectar()->prepare("SELECT * FROM $tabla");

	 		$statement -> execute();

	 		return $statement -> fetchAll();
	 	}

	 	$statement -> close();

	 	$statement = null;

	 }


	 /* CREAR CATEGORIA */

 	static public function mdlEditarCategorias($tabla, $datos){

 		$statement = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id ");

 		$statement->bindParam(":categoria",$datos["categoria"], PDO::PARAM_STR);
 		$statement->bindParam(":id",$datos["id"], PDO::PARAM_STR);

 		if ($statement->execute()) {
 			
 			return "ok";
 		}else{

 			return "error";
 		}

 		$statement->close();
 		$statement = null;
 	}


 	 /* BORRAR CATEGORIA */


 	 static public function mdlBorrarCategoria($tabla, $datos){

 	 	$statement = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

 	 	$statement -> bindParam(":id", $datos, PDO::PARAM_INT);

 	 	if ($statement -> execute()) {
 	 	  
 	 	  return "ok";

 	 	}else{

 	 		return "error";

 	 	}

 	 	$statement -> close();

 	 	$statement = null;


 	 }

 }