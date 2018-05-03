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

 }