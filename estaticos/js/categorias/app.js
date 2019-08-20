var app=angular.module('categorias', [])
app.controller('CategoriaCntrl',function($http,$scope, $location) {
    var url=$("html").data('url');
    $scope.categorias=[]
    getAllCategorias()
    $scope.categoria_selected
    $scope.addCategoria=function(){
        // alert($scope.categoria)
        // toastr.error("Ocurrio un error al obtener la lista de estudiantes de la seccion")
        var categoria=$scope.categoria
        // alert(categoria)
        console.log(url+"index.php/admin/categoria_add")
        var datos={
                nombre_categoria:categoria,
                asdasd:"asdasd",
                lol:"asdasd"
            }
        $.ajax({
            url: url+"index.php/admin/categoria_add",
            type: 'POST',
            dataType: 'JSON',
            data: datos,
            success:function(data){
                if(data){
                    getAllCategorias()
                }
            },
            error:function(err,statusError,xhr){
                console.error(err,statusError,xhr)
            }
        })
    }
    $scope.selectCategoria=function(){
        var id=this.c.id
        var old_id=$scope.categoria_selected
        $("#categoria"+id).addClass("row_table_selected")
        $("#categoria"+old_id).removeClass("row_table_selected")
        $scope.categoria_selected=id
    }

    $scope.update=function(){
        console.log(this.c.id)
    }
    $scope.delete=function(){
        $.ajax({
            url: url+'index.php/admin/categoria_delete',
            type: 'POST',
            dataType: 'JSON',
            data: {id_categoria: this.c.id},
            success:function(data){
                if(data){
                    getAllCategorias()
                }
            },
            error:function(error,statusText,xhr){
                console.error(error,statusText,xhr)
            }
        })
        
        // console.log(this.c.id)
    }
    function getAllCategorias(){
            // $.ajax({
            //     url: url+'index.php/admin/categoria_getAll',
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
});
