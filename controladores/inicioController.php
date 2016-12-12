<?php
require_once("../modelos/inicioModel.php");
require_once("../core/fbasic.php");
//--Declaraciones
$mensajes = array();
//--Recibo lo enviado por POST
$data = json_decode(file_get_contents("php://input"));

$post = helper_userdata($data);
redireccionar_metodos($post);
//--
function redireccionar_metodos($arreglo_datos){
	switch ($arreglo_datos["accion"]) {
		case 'consultar_mensajes':
			consultar_mensajes($arreglo_datos);
			break;	 			
	}
}
//---
function helper_userdata($data){
	$user_data = array();
	$user_data["accion"] = $data->accion;
	return $user_data;
}
//------------------------------------------------------
function consultar_mensajes($arreglo_datos){
	$recordset = array();
	$mensajes_iniciales = array();
	$objeto = new inicioModel();
	$recordset = $objeto->consultar_mensajes_iniciales();
	$i = 0;
	foreach ($recordset as $campo) {
		$mensajes_iniciales[] = array("id"=>$campo[0],"titulo"=>$campo[1],"descripcion"=>$campo[2] );
		$i++;
	}
	die(json_encode($mensajes_iniciales));	
}