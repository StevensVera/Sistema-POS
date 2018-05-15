<?php 

 require_once "../controladores/productos.controlador.php";
 require_once "../modelos/productos.modelo.php";


 class TablaProductos{

/*=============================================
=            Section comment block            =
=============================================*/


 public function mostrarTabla(){

	$item = null;
	$valor = null;

	$productos = ControladorProductos::ctrMostrarProductos($item,$valor);

	echo '{
			"data":[';

			for ($i=0; $i < count($productos)-1; $i++) { 
				
			echo '	[	
					"'.($i+1).'",
					"vistas/img/productos/default/anonymous.png",
					"101",
					"Aspiradora Industrial",
					"Equipos Electromecanicos",
					"20",
					"$ 5.00",
					"$10.00",
					"2017-12-21 16:56:28",
					"1"
				], ';

			}

		echo '
				[
					"'.count($productos).'",
					"vistas/img/productos/default/anonymous.png",
					"101",
					"Aspiradora Industrial",
					"Equipos Electromecanicos",
					"20",
					"$ 5.00",
					"$10.00",
					"2017-12-21 16:56:28",
					"2"


				]

			]
		}';




}

 }

 /*=============================================
=            Section comment block            =
=============================================*/


$activar = new TablaProductos();
$activar -> mostrarTabla();