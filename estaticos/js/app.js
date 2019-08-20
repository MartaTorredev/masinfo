var app=angular.module('SCILC',[])

app.controller('guardar_productos',function($scope,$http,$templateCache){
	var controlador=$scope;
	$scope.method = 'GET';
    $scope.site_url = $("html").data('url');

	$scope.buscarNombre=function(){
		$scope.url = $scope.site_url+"/app/buscarNombre?nombre="+$scope.nombre;
	   
     	$scope.code = null;
      	$scope.response = null;

	     $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
	        then(function(response) {
	          	$scope.status = response.status;
	          	$scope.nombres = response.data;
	          	if($scope.nombres!=null){
	          		console.log("asd "+$scope.nombres[0].tipo)
	          	}
	        }, function(response) {
		        $scope.data = response.data || "Request failed";
		        $scope.status = response.status;
	          	console.log("lol "+$scope.status)
	      	}
	    );
		
	}
	$scope.buscarTipo=function(){
		$scope.url = $scope.site_url+"/app/buscarTipo?tipo="+$scope.tipo+"& nombre="+$scope.nombre;
	   
     	$scope.code = null;
      	$scope.response = null;

	     $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
	        then(function(response) {
	          	$scope.status = response.status;
	          	$scope.tipos = response.data;
	          	if($scope.tipos!=null){
	          		console.log("asd "+$scope.tipos[0].tipo)
	          	}
	        }, function(response) {
		        $scope.data = response.data || "Request failed";
		        $scope.status = response.status;
	          	console.log("lol "+$scope.status)
	      	}
	    );
		
	}

	$scope.buscarDescripcion=function(){
		$scope.url = $scope.site_url+"/app/buscarDescripcion?tipo="+$scope.tipo+"& nombre="+$scope.nombre;
	   
     	$scope.code = null;
      	$scope.response = null;

	     $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
	        then(function(response) {
	          	$scope.status = response.status;
	          	$scope.descripcion = response.data;
	          	if($scope.descripcion!=null){
	          		console.log("Descripcion "+$scope.descripcion)
	          		$scope=descripcion=$scope.descripcion[0];
	          	}
	        }, function(response) {
		        $scope.data = response.data || "Request failed";
		        $scope.status = response.status;
	          	console.log("lol "+$scope.status)
	      	}
	    );
	}
	$scope.guardarLote=function(){
		nombre=$scope.nombre;
		tipo=$scope.tipo;
		descripcion=$scope.descripcion;
		cantidad_productos=$scope.cantidad_productos;
		costo_lote=$scope.costo_lote;
		fecha_lote=$scope.fecha_lote;

		if(nombre!=undefined && nombre.length>0 && tipo!=undefined && tipo.length>0 && descripcion!=undefined && descripcion.length>0 &&
			cantidad_productos!=undefined && cantidad_productos.length>0 && costo_lote!=undefined && costo_lote.length>0 && fecha_lote!=undefined && fecha_lote.length>0){
			console.log("Listo")
		}else{
			console.log("Todos los campos deben estar llenos")
		}
	}
})

app.controller('vender',function($scope,$http,$templateCache){
	$scope.productos=[]
	$scope.totalCompra=0;
	$scope.site_url = $("html").data('url');
	$scope.cantidad_productos=0;
	$scope.add=function(){
		var oldTodos = $scope.productos.todos;
	    // $scope.productos = [];
	    producto={
	    	id_almacen:0,
	    	nombre:'',
	    	tipo:'',
	    	cantidad:0,
			costo_unidad:0
		}
	    if($scope.productos.length==0){
	    	producto.id=1
	    	$scope.productos.push( producto)
	    	$scope.cantidad_productos+=1;
	    }else{
	    	new_id=$scope.productos[ $scope.productos.length -1 ].id + 1;
	    	console.log(new_id)
	    	producto.id=new_id
	    	$scope.productos.push(producto);
	    	$scope.cantidad_productos+=1;
	    }
	  //   angular.forEach(oldTodos, function(todo) {
			// $scope.productos.push(todo);
	  //   );

	  	$scope.calcularTotal=function(id){
	  		cantidad=$scope.productos[parseInt(id)-1].cantidad;
	  		total=$scope.productos[parseInt(id)-1].total;
	  		console.log(cantidad)
	  	}
	  	$scope.calcularTotalCompra=function(productos){
	  		$aux=0;
	  		$scope.totalCompra=0;
	  		angular.forEach(productos, function(p) {
	  			$aux+=parseFloat(p.costo_unidad)*parseInt(p.cantidad);
	  		});
	  		$scope.totalCompra=$aux;
			
	  	}
	  	var controlador=$scope;
		$scope.method = 'GET';

		$scope.buscarNombre=function(id,nombre){
			$scope.url = $scope.site_url+"/app/buscarNombre?nombre="+nombre;
	     	$scope.code = null;
	      	$scope.response = null;

		     $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
		        then(function(response) {
		          	$scope.status = response.status;
		          	$scope.nombres = response.data;
		          	if($scope.nombres!=null){		          		
		          		$("#tipo"+id).removeAttr('readonly')
		          	}
		        }, function(response) {
			        $scope.data = response.data || "Request failed";
			        $scope.status = response.status;
		          	console.log("lol "+$scope.status)
		      	}
		    );
			
		}
	}

	$scope.buscarTipo=function(id,nombre){
		$scope.url = $scope.site_url+"/app/buscarTipos?nombre="+nombre;
	   
     	$scope.code = null;
      	$scope.response = null;

	     $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
	        then(function(response) {
	          	$scope.status = response.status;
	          	$scope.tipos = response.data;
	          	console.log("Lol")
	          	console.log(response.data)
	          	if($scope.tipos!=null){
	          		$("#cantidad"+id).removeAttr('readonly')
	          	}
	        }, function(response) {
		        $scope.data = response.data || "Request failed";
		        $scope.status = response.status;
	          	console.log("lol "+$scope.status)
	      	}
	    );
		
	}
	$scope.buscarPrecio=function(id,nombre,tipo){
		console.log(nombre+" "+tipo+" "+id)
		$scope.url = $scope.site_url+"/app/buscarPrecioCantidad?tipo="+encodeURI(tipo)+"&nombre="+encodeURI(nombre);
     	$scope.code = null;
      	$scope.response = null;

	    $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
	        then(function(response) {
	          	$scope.status = response.status;
	          	console.log($scope.url)
	          	console.log(response.data)
	          	if(response.data!=null){
	          		$scope.productos[parseInt(id)-1].costo_unidad = response.data[0].precio;
	          		$scope.productos[parseInt(id)-1].id_almacen = response.data[0].id;
	          		console.log(response.data)
	          		console.log(response.data.precio)
	          	}
	        }, function(response) {
		        $scope.data = response.data || "Request failed";
		        $scope.status = response.status;
	      	}
	    );
		
	}

	$scope.buscarPersona=function(){
		cedula=$scope.cedula;
		$scope.url = $scope.site_url+"/app/buscarPersona?cedula="+cedula;
	   
     	$scope.code = null;
      	$scope.response = null;
      	tam_cedula=cedula.length
      	if(tam_cedula>5 && tam_cedula<10){
		    $http({method: $scope.method, url: $scope.url, cache: $templateCache}).
		        then(function(response) {
		          	$scope.status = response.status;
		          	data=response.data
		          	console.log(response.data)
		          	if(data!=null){
		          		console.log(response.data.precio)
		          		$scope.nombre_persona=data[0].nombres;
		          		$scope.apellidos=data[0].apellidos;
		          	}
		        }, function(response) {
			        $scope.data = response.data || "Request failed";
			        $scope.status = response.status;
		      	}
		    );
      	}
		
	}
})