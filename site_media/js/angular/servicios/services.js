angular.module("GrupoMedicoApp")
//---------------------------------------------------------------------------------------
//--Bloque de servicios

//--Bloque de factorias
.factory("especialidadFactory",['$http', function($http){
	return{
			cargar_especialidad : function(callback){
				$http.post("./controladores/especialidadesController.php", { accion:'consultar'}).success(callback);
			}
	}
}])