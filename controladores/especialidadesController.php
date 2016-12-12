<?php
require_once("../modelos/especialidadesModel.php");
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
		case 'consultar':
			consultar($arreglo_datos);
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
function consultar($arreglo_datos){
	//------------------------------------
	$recordset = array();
	$objeto = new especialidadesModel();
	$recordset = $objeto->consultar_especialidades();
	//die(json_encode($recordset));
	$i = 0;
	foreach ($recordset as $campo) {
		$especialidades[] = array("id"=>$campo[0],"titulo"=>$campo[1], "descripcion"=>$campo[2],"imagen"=>$campo[3],"number"=>$i, "selected"=>false);
		$i++;
	}
	die(json_encode($especialidades));
	//----------------------------------
}
?>