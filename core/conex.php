<?php
//conexion de bd 
abstract class Conex
{
		private $conexion;
		//private static $servidor="mysql.hostinger.es";
		private static $servidor="localhost";
		private static $clave="123456";
		private static $usuario="root";
		private $bd="grupo_medico";
		//private static $usuario="u418513224_root2";
		//private $bd="u418513224_web2";
		//private $bd="espacio_v_blanco";
		protected $query;
		public $arreglo = array();
		//-- Metodo constructor*/
		public function __construct()
		{
			$this->query="";
		}
		//-- Metodo que permite conectarse a la bd
		private function conectar()
		{
			//valido la sesion antes de conectar
			$this->conexion = mysqli_connect(self::$servidor,self::$usuario,self::$clave,$this->bd);
			mysqli_set_charset($this->conexion,'utf8');
			if($mysqli)
			{
				return 'SI';
			}
			else
			{
				return 'NO';
			}	
		}
		//--Metodo que cierra la conexion a la bd
		private function desconectar()
		{

		}
		//
		//-- Metodo que permite ejecutar un query
		protected function enviarQuery($sql)
		{
			$mysqli  = $this->conexion;
			$this->query = $mysqli->query($sql);
			//$mysqli->close();
			return $this->query;
		}
		//-- Calcula cuantos registros tiene la consulta
		protected function cuantos_registros($resultado)
		{
			return $resultado->num_rows;
		}
		//-- Vectoriza el resultado de una consulta
		protected function vectorizar($result)
		{
			return mysqli_fetch_array ($result, MYSQL_BOTH);
		}
		//--Para Consultas
		protected function execute($sql)
		{
			$result = $this->enviarQuery($sql);
			if($result){
				$arr = array();
				while($row = $this->vectorizar($result)){
					$arr[] = $row;
				}
			}else{
				$arr = "error";
			}
			return $arr;
		}
		//--Para procesar consultas
		protected function procesarQuery($sql)
		{
			$this->conectar();
			$rs = $this->execute($sql);
			return $rs;
		}
		//--Para procesar insert, updare, delete
		protected function procesarQuery2($sql)
		{
			$this->conectar();
			$rs = $this->enviarQuery($sql);
			return $rs;
		}
}
?>