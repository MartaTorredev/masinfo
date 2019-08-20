var app=angular.module('provincias', [])
app.controller('ProvinciaCntrl',function($http,$scope, $location) {
    var url=$("html").data('url');
    $scope.provincias=[]
    getAllProvincias()
    $scope.provincia_selected
    $scope.addProvincia=function(){
        // alert($scope.categoria)
        // toastr.error("Ocurrio un error al obtener la lista de estudiantes de la seccion")
        var provincia=$scope.provincia
        // alert(categoria)
        console.log(url+"index.php/admin/provincia_add")
        var datos={
                nombre_provincia:provincia
            }
        $.ajax({
            url: url+"index.php/admin/provincia_add",
            type: 'POST',
            dataType: 'JSON',
            data: datos,
            success:function(data){
                if(data){
                    getAllProvincias()
                }
            },
            error:function(err,statusError,xhr){
                console.error(err,statusError,xhr)
            }
        })
    }
    $scope.selectProvincia=function(){
        var id=this.c.id
        var old_id=$scope.provincia_selected
        $("#provincia"+id).addClass("row_table_selected")
        $("#provincia"+old_id).removeClass("row_table_selected")
        $scope.provincia_selected=id
    }

    $scope.update=function(){
        console.log(this.c.id)
    }
    $scope.delete=function(){
        // console.log(this)
        // return
        $.ajax({
            url: url+'index.php/admin/provincia_delete',
            type: 'POST',
            dataType: 'JSON',
            data: {id_provincia: this.p.id},
            success:function(data){
                if(data){
                    getAllProvincias()
                }
            },
            error:function(error,statusText,xhr){
                console.error(error,statusText,xhr)
            }
        })
        
        // console.log(this.c.id)
    }
    function getAllProvincias(){
            // $.ajax({
            //     url: url+'index.php/admin/provincia_getAll',
            //     type: 'GET',
            //     dataType: 'JSON',
            //     success:function(data){
            //         if(data){
            //             $scope.categorias=data.categorias
            //             console.log($scope.categorias)
            //             // console.log(data.categorias[0].id)                        
            //         }
            //     },
            //     error:function(err,statusText,xhr){
            //         console.error(err,statusText,xhr);
            //     }
            // })

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
});
