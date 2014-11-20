var angularTodo = angular.module('myAppDesarrolloHidrocalido', []);
var rootURL = "model/modulos/modulo1/cat_precios";
var id_producto = ''; 
function miController($scope, $http) {
    $scope.productos = [ ];
    obtenerProductos($http,$scope);
    $scope.agregarProducto = function() {
      agregarProducto($http,$scope);
    }
    $scope.eliminarProducto = function( cat_prec_id ) {
      eliminarProducto($http,$scope,cat_prec_id);
    }
    $scope.mostrarInformacion = function( cat_prec_id,nombre,precio ) {
      mostrarInformacion($http,$scope,cat_prec_id,nombre,precio);
    }
    $scope.editarProducto = function() {
      editarProducto($http,$scope);
    }
 }

   function obtenerProductos($http,$scope){
    $http.get(rootURL)
        .success(function(data) {
            var array = data == null ? [] : (data.cat_precios instanceof Array ? data.cat_precios : [data.cat_precios]);
            $scope.productos = array;
             console.log(array)
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });    
   }
   function agregarProducto($http,$scope){
        $http.post(rootURL, formToJSON($scope))
                .success(function(data) {
                        obtenerProductos($http,$scope);
                        console.log(data)
                    })
                .error(function(data) {
                        console.log('Error: ' + data);
                });
        $scope.txtNombre="";
        $scope.txtPrecio="";     
   }
   function formToJSON($scope) {
      return JSON.stringify({
           "nombre": $scope.txtNombre,
           "precio": $scope.txtPrecio
      });
   }
   function eliminarProducto($http,$scope,cat_prec_id){        
            $http.delete(rootURL+'/'+cat_prec_id)
                .success(function(data) {
                        obtenerProductos($http,$scope);
                        console.log(data)
                    })
                .error(function(data) {
                        console.log('Error: ' + data);
                });
    }
   function mostrarInformacion($http,$scope,cat_prec_id,nombre,precio){        
        $scope.txtNombre = nombre;
        $scope.txtPrecio = precio; 
        id_producto      = cat_prec_id;
    }
   function editarProducto($http,$scope){        
        $http.put(rootURL+'/'+id_producto, formToJSON($scope))
                .success(function(data) {
                        obtenerProductos($http,$scope);
                        console.log(data)
                    })
                .error(function(data) {
                        console.log('Error: ' + data);
                });
        $scope.txtNombre="";
        $scope.txtPrecio="";     
    }