<?php
require_once("../core/conex.php");
class especialidadesModel extends Conex{
	private $rs;
	//--Metodo constructor...
	public function __construct(){
	}
	//--Consulta los datos de las especialidades
	public function consultar_especialidades(){
		$sql = "SELECT id, titulo, descripcion, imagen FROM especialidad;";
		$this->rs = $this->procesarQuery($sql);
		return $this->rs;			
	}
}	