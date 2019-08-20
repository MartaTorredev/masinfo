var app=angular.module('hoteles', [])
app.controller('HotelCntrl',function($http,$scope, $location,$q) {
    var url=$("html").data('url');
    getAllCategorias()
    getAllProvincias()
    $scope.add=function(){
        var nombre=$scope.nombre
        var provincia=$scope.provincia
        var categoria=$scope.categoria
        var portada=$("#portada").prop('files')[0].name
        // var portada=$("#portada").prop('files')[0]
        var qems=$scope.qems
        var bienvenido=$scope.bienvenido
        var habitaciones=$scope.habitaciones
        var instalaciones=$scope.instalaciones
        var servicios=$scope.servicios
        var accesos=$scope.accesos
        var videinterpretacion=$scope.videinterpretacion
        var faq=$scope.faq
        if(nombre.length>0 && provincia.length>0 && categoria.length>0){
            var datos={
                nombre:nombre,
                provincia:provincia,
                categoria:categoria,
                portada:portada,
                qems:qems,
                bienvenido:bienvenido,
                habitaciones:habitaciones,
                instalaciones:instalaciones,
                servicios:servicios,
                accesos:accesos,
                videinterpretacion:videinterpretacion,
                faq:faq
            }
            // console.log(datos)
            // return 
            $.ajax({
                url: url+'index.php/admin/hoteles/add',
                type: 'POST',
                dataType: 'JSON',
                data: datos,
                success:function(data){
                    if(data){
                        console.log(data.id_hotel)
                        $scope.uploadFile(data.id_hotel)
                        $scope.nombre=""
                        $scope.provincia=""
                        $scope.categoria=""
                        $scope.portada=""
                        $scope.qems=""
                        $scope.bienvenido=""
                        $scope.habitaciones=""
                        $scope.instalaciones=""
                        $scope.servicios=""
                        $scope.accesos=""
                        $scope.videinterpretacion=""
                        $scope.faq=""
                    }
                },
                error:function(err,statusText,xhr){
                    console.error(err,statusText,xhr)
                }
            })
            
        }

    }

    function getAllCategorias(){
        $http({
            method:'GET',
            url:url+'index.php/admin/categoria_getAll'
        }).then(function success(res){
            if(res.data.categorias){
                $scope.categorias=res.data.categorias
            }
        }, function error(error){
            if(error){
                console.error(error)
            }
        })
        
    }

    function getAllProvincias(){
        $http({
            method:'GET',
            url:url+'index.php/admin/provincia_getAll'
        }).then(function success(res){
            if(res.data.provincias){
                $scope.provincias=res.data.provincias
                $scope.provincia=""
            }
        }, function error(error){
            if(error){
                console.error(error)
            }
        })
        
    }


    function updoadImg(id){
        var portada=$("#portada").prop('files')[0]
        $.ajax({
            url: url+'index.php/admin/hoteles/upload',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: {portada:portada},
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                console.log("Subiendo")        
            },
            //una vez finalizado correctamente
            success: function(data){
                if(data){
                    console.log(data)
                }
            },
            //si ha ocurrido un error
            error: function(){
                console.log("Ocurrio un error")
            }
        });
    }

    $scope.uploadFile = function(id)
    // function uploadFile(id)
    {
        var name = id;
        var file = $scope.portada;
        uploadFile = function(file, name)
        {
            var deferred = $q.defer();
            var formData = new FormData();
            formData.append("name", name);
            formData.append("portada", file);
            return $http.post(url+"index.php/admin/hoteles/upload", formData, {
                headers: {
                    "Content-type": undefined
                },
                transformRequest: angular.identity
            })
            .success(function(res)
            {
                deferred.resolve(res);
            })
            .error(function(msg, code)
            {
                deferred.reject(msg);
            })
            return deferred.promise;
        }   
        uploadFile(file, name).then(function(res)
        {
            console.log(res);
        })
    }
}).directive('uploaderModel', ["$parse", function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, iElement, iAttrs) 
        {
            iElement.on("change", function(e)
            {
                $parse(iAttrs.uploaderModel).assign(scope, iElement[0].files[0]);
            });
        }
    };
}])