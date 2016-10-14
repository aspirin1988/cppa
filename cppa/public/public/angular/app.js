/**
 * Created by serg on 07.10.16.
 */

var app = angular.module('cppaApp',['ui.tinymce']);

app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files);
                });
            });
        }
    };
}]);

app.service('fileUpload', ['$http', function ($http) {

    this.uploadFileToUrl = function(file, uploadUrl, call){
        var fd = new FormData();
        fd.append('file', file);

        var result=false;

        return $http({
            method: 'POST',
            url: uploadUrl,
            data:fd,
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function success(response) {
            call(response.data);
        }, function error(response) {
            UIkit.notify("Невозможно загрузить данное изображение!", {pos:'top-right',status:'danger',timeout:2000});

        });
    }
}]);

app.service('messageWeb',function () {
    this.messageSuccess=function (message) {
        UIkit.notify(message, {status:'success'})
    };

    this.messageError=function (message) {
        UIkit.notify(message, {status:'danger'})
    };
});

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.controller('user_groupsCTRL',function ($scope, $http, $sce ,fileUpload,messageWeb) {

    $scope.UserGroups=[];
    $scope.newGroup={};
    $scope.CurrentGroup=false;

    var modal_edit=UIkit.modal('#edit-modal');

    var modal_remove=UIkit.modal('#remove-modal');

    $scope.getUserGroup= function(){
        $http({
            method:'GET',
            url:'/admin/user_group/getAll'
        }).then(function success(response) {
            $scope.UserGroups= response.data;
        }, function error(response) {});
    };
    $scope.getUserGroup();
    
    $scope.addUserGroup = function () {
        $http({
            method:'POST',
            url:'/admin/user_group/add',
            data:$scope.newGroup
        }).then(function success(response) {
            if (response.data) {
                $scope.getUserGroup();
                $scope.clearUserGroup();
                messageWeb.messageSuccess('Уровень доступа был успешно добавлен!');
            }
        }, function error(response) {
            messageWeb.messageError('Уровень доступа не был добавлен!');
        });
    };

    $scope.openEditUserGroup = function (val) {
        modal_edit.show();
        $scope.CurrentGroup=val;
    };

    $scope.saveUserGroup = function () {
        if($scope.CurrentGroup){
            $http({
                method:'POST',
                url:'/admin/user_group/save',
                data:$scope.CurrentGroup
            }).then(function success(response) {
                if(response.data) {
                    $scope.CurrentGroup = false;
                    modal_edit.hide();
                    messageWeb.messageSuccess('Уровень доступа был успешно сохранен!');

                }
            }, function error(response) {
                messageWeb.messageError('Уровень доступа не был сохранен!');
            });
        }
    };

    $scope.openRemoveUserGroup = function (val) {
        modal_remove.show();
        $scope.CurrentGroup=val;
    };

    $scope.closeRemoveUserGroup = function (val) {
        modal_remove.hide();
        $scope.CurrentGroup=false;
    };

    $scope.RemoveUserGroup = function () {
        if($scope.CurrentGroup){
            $http({
                method:'GET',
                url:'/admin/user_group/remove/'+$scope.CurrentGroup.id
        }).then(function success(response) {
                if(response.data) {
                    $scope.CurrentGroup = false;
                    $scope.getUserGroup();
                    modal_remove.hide();
                    messageWeb.messageSuccess('Уровень доступа был успешно удален!');
                }
            }, function error(response) {
                messageWeb.messageError('Уровень доступа не был удален!');
            });
        }
    };

    $scope.clearUserGroup = function () {
      $scope.newGroup={};
    }
    

});

app.controller('pageCTRL',function ($scope, $http, $sce ,fileUpload,messageWeb) {

    $scope.PageId=false;
    $scope.Page={};

    $scope.getPage = function () {
        $http({
            method:"GET",
            url:'/admin/pages/get/'+$scope.PageId
        }).then(function success (response) {
            if(response.data){
                console.log(response.data);
                $scope.Page=response.data;
            }
        },function error (response) {});
    };

    $scope.savePage = function (status) {
        $scope.Page.status=status;
        $http({
            method:"POST",
            url:'/admin/pages/edit/'+$scope.PageId,
            data: $scope.Page
        }).then(function success (response) {
            if(response.data){
                console.log(response.data);
                messageWeb.messageSuccess('Данные странцы успешно обновлены!');
            }
        },function error (response) {
            messageWeb.messageError('Данные странцы не обновлены!');
        });
    };

    $scope.$watch('PageId',function () {
        $scope.getPage();
    });


    $scope.tinymceOptions = {
        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
    };

});

