<?php

	/*---------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 03-06-2022
        DESCRIPCIÓN   : ARCHIVO QUE PERMITE LEER LAS CREDENCIALES EN FORMATO .DAT UBICADO EN EL ARCHIVO RAIZ
    ---------------------------------------------------------------------------------------------------------*/

	//LEE LA CONFIGURACION DE CREDENCIALES FUERA DE LAS CARPETA RAIZ
	function load_git_credencial($arch, $seccion = null ){

		//$path = $_SERVER['DOCUMENT_ROOT'] . "/../" . $arch; //para el server
		$path = $_SERVER['DOCUMENT_ROOT'] . "/docs/public/config/" . $arch; ///para el local
		//echo $path;

		$array_ini = parse_ini_file($path, true);
		if( is_array($array_ini)){	
			if($seccion == null){
				return $array_ini;
			} else {
				if(is_array($array_ini[$seccion])){ 
					return $array_ini[$seccion];
				} else {
					return null;
				}
			}
		} else {
			return null;
		}
	}
?>