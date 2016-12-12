angular.module("GrupoMedicoApp")
	.controller("MainController", function($scope,$http,especialidadFactory){
		$scope.inicio = {};
		$scope.citas = { 
							'nombres':'',
							'apellidos':'',
							'email':'',
							'telefono':'',
							'especialidad':'',
							'observacion':''
		}
		$scope.dr = {
							'nombres_apellidos':'',
							'especialidad':''
		}
		$scope.mensajesIniciales = {
										'id':'',
										'titulo':'',
										'descripcion':''
		}
		$scope.especialidadDetalle = {
									'titulo':'',
									'descripcion':'',
									'imagen':''
		}
		$scope.especialidad = []
		$scope.horario = "Lunes - Sábado, 8am a 10pm";
		$scope.contactos = "Contáctanos +58212-456-12-23";
		//--
		$scope.carga_especialidad = function(){
			especialidadFactory.cargar_especialidad(function(data){
				$scope.especialidad = data;
			});

		}
		//--Metodo para cargar las especialidades en la pagina con su detalle...
		$scope.carga_especialidad_detatle = function(){
			especialidadFactory.cargar_especialidad(function(data){
				$scope.especialidadDetalle = data;
				console.log(data);
			});
		}
		//--Metodo para mensajes iniciales
		$scope.carga_mensajes_iniciales =  function(){
			$http.post("./controladores/inicioController.php", 
			{ 
				accion:'consultar_mensajes'})
				.success(function(data, status, headers, config){
					console.log(data);
					$scope.mensajesIniciales = data;
				}).error(function(data,status){
					alert("Error:"+data);
					//$scope.mensaje_error();
			});
		}
		//--
		$scope.carga_especialidad();
		$scope.carga_especialidad_detatle();
		$scope.carga_mensajes_iniciales();
	});