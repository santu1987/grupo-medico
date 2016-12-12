<?php
require_once("../core/conex.php");
class inicioModel extends Conex{
	private $rs;
	//--Metodo constructor...
	public function __construct(){
	}
	//--Consulta los mensajes iniciales
	public function consultar_mensajes_iniciales(){
		$sql = "SELECT id, titulo, descripcion FROM mensajes_pagina WHERE estatus='1' ORDER BY id LIMIT 3;";
		$this->rs = $this->procesarQuery($sql);
		return $this->rs;			
	}
}	
?>