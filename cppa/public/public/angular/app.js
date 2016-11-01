/**
 * Created by serg on 07.10.16.
 */

var app = angular.module('cppaApp',['dragularModule','ui.tinymce']);

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
        if (file.length>1) {
            for (var i = 0; i < file.length; i++) {
                fd.append('files[]', file[i]);

            }
        }
        else{
            fd.append('file[]', file[0]);
        }
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

app.service('Translate',function () {
   this.RuEn = function (text) {

       if(text) {
           text=text.toLowerCase();
           var translit_table = {
               "а": "a", "ый": "iy", "ые": "ie",
               "б": "b", "в": "v", "г": "g",
               "д": "d", "е": "e", "ё": "yo",
               "ж": "zh", "з": "z", "и": "i",
               "й": "y", "к": "k", "л": "l",
               "м": "m", "н": "n", "о": "o",
               "п": "p", "р": "r", "с": "s",
               "т": "t", "у": "u", "ф": "f",
               "х": "kh", "ц": "ts", "ч": "ch",
               "ш": "sh", "щ": "shch", "ь": "",
               "ы": "y", "ъ": "", "э": "e",
               "ю": "yu", "я": "ya", "йо": "yo",
               "ї": "yi", "і": "i", "є": "ye",
               "ґ": "g"
           };

       var ignor ={",": "-", ".": "-",
               ":": "-", " ": "-", "<": "-",
               ">": "-", "#": "-", "@": "-",
               "?": "-", "*": "-", "%": "-",
               "(": "-", ")": "-"};
       var res ='';
           for(var i=0;i<text.length;i++) {
               if (ignor[text[i]]) {
                   if (ignor[text[i-1]]!='-')
                   res += ignor[text[i]];
               }
               else {
                   if ((text[i].charCodeAt() >= 1072 && text[i].charCodeAt() <= 1103)) {
                       res += translit_table[text[i]];
                   }
                   else {
                       res += text[i];
                   }
               }
           }
           if(res[res.length-1]=='-')
               res= res.substring(0, res.length - 1);
            return res;
       }
       return '';
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

app.controller('usersCTRL',function ($scope, $http, $sce ,fileUpload,messageWeb) {

    $scope.Users=[];
    $scope.newUser={};
    $scope.CurrentUser=false;

    var modal_edit=UIkit.modal('#edit-modal');

    var modal_remove=UIkit.modal('#remove-modal');

    $scope.getUsers= function(){
        $http({
            method:'GET',
            url:'/admin/users/getAll'
        }).then(function success(response) {
            $scope.Users= response.data;
        }, function error(response) {});
    };
    $scope.getUsers();

    $scope.addUser = function () {
        $http({
            method:'POST',
            url:'/admin/users/add',
            data:$scope.newUser
        }).then(function success(response) {
            if (response.data) {
                $scope.getUsers();
                $scope.clearUser();
                messageWeb.messageSuccess('Уровень доступа был успешно добавлен!');
            }
        }, function error(response) {
            messageWeb.messageError('Уровень доступа не был добавлен!');
        });
    };

    $scope.openEditUser = function (val) {
        modal_edit.show();
        $scope.CurrentUser=val;
    };

    $scope.saveUser = function () {
        if($scope.CurrentUser){
            $http({
                method:'POST',
                url:'/admin/users/save',
                data:$scope.CurrentUser
            }).then(function success(response) {
                if(response.data) {
                    $scope.CurrentUser = false;
                    modal_edit.hide();
                    messageWeb.messageSuccess('Уровень доступа был успешно сохранен!');
                }
            }, function error(response) {
                messageWeb.messageError('Уровень доступа не был сохранен!');
            });
        }
    };

    $scope.openRemoveUser = function (val) {
        modal_remove.show();
        $scope.CurrentUser=val;
    };

    $scope.closeRemoveUser = function (val) {
        modal_remove.hide();
        $scope.CurrentUser=false;
    };

    $scope.RemoveUser = function () {
        if($scope.CurrentUser){
            $http({
                method:'GET',
                url:'/admin/users/remove/'+$scope.CurrentUser.id
        }).then(function success(response) {
                if(response.data) {
                    $scope.CurrentUser = false;
                    $scope.getUsers();
                    modal_remove.hide();
                    messageWeb.messageSuccess('Уровень доступа был успешно удален!');
                }
            }, function error(response) {
                messageWeb.messageError('Уровень доступа не был удален!');
            });
        }
    };

    $scope.clearUser = function () {
      $scope.newUser={};
    }


});

app.controller('pageCTRL',function ($scope, $http, $sce ,fileUpload,messageWeb,Translate) {

    $scope.PageId = false;
    $scope.Page = {};
    $scope.Pages = [];
    $scope.newPage = {};
    $scope.PageIsset = '';
    $scope.CurrentPage=false;

    var modal_remove=UIkit.modal('#remove-modal');

    $scope.getPage = function () {
        $http({
            method: "GET",
            url: '/admin/pages/get/' + $scope.PageId
        }).then(function success(response) {
            if (response.data) {
                $scope.Page = response.data;
            }
        }, function error(response) {
        });
    };

    $scope.getPages=function () {
        $http({
            method: "GET",
            url: '/admin/pages/get/'
        }).then(function success(response) {
            if (response.data) {
                $scope.Pages = response.data;
            }
        }, function error(response) {
        });
    };
    $scope.getPages();

    $scope.GoToEdit = function (id) {
        location.href='/admin/pages/edit/'+id;
    };

    $scope.savePage = function (status) {
        $scope.Page.public = status;
        $http({
            method: "POST",
            url: '/admin/pages/edit/' + $scope.PageId,
            data: $scope.Page
        }).then(function success(response) {
            if (response.data) {
                messageWeb.messageSuccess('Данные странцы успешно обновлены!');
            }
        }, function error(response) {
            messageWeb.messageError('Данные странцы не обновлены!');
        });
    };

    $scope.createPage = function () {
        if (!$scope.PageIsset) {
            $http({
                method: "POST",
                url: '/admin/pages/create/',
                data: $scope.newPage
            }).then(function success(response) {
                if (response.data) {
                    messageWeb.messageSuccess('Страница успешно создана!');
                    $scope.getPages();

                }
            }, function error(response) {
            });
        }
        else {
        messageWeb.messageError('Невозможно создать страницу с заданным именем!');
        }
};

    $scope.ValidationSlug = function (val) {
        if (val) {
            $http({
                method: "POST",
                url: '/admin/pages/vslug/',
                data: {slug: val}
            }).then(function success(response) {
                if (response.data) {
                    $scope.PageIsset = response.data.res;
                }
            }, function error(response) {
            });
        }
        else {
            $scope.PageIsset=undefined;
        }
    };

    $scope.$watch('PageId',function () {
        $scope.getPage();
    });

    $scope.$watch('newPage.title',function () {
       $scope.newPage.slug = $scope.newPage.title;
        $scope.newPage.slug=Translate.RuEn($scope.newPage.title);
    });

    $scope.$watch('newPage.slug',function () {
        $scope.ValidationSlug($scope.newPage.slug);
    });

    $scope.openRemovePage = function (val) {
        modal_remove.show();
        $scope.CurrentPage=val;
    };

    $scope.closeRemovePage = function (val) {
        modal_remove.hide();
        $scope.CurrentPage=false;
    };

    $scope.RemovePage = function () {
        if($scope.CurrentPage){
            $http({
                method:'GET',
                url:'/admin/pages/remove/'+$scope.CurrentPage.id
            }).then(function success(response) {
                if(response.data) {
                    $scope.CurrentPage = false;
                    $scope.getPages();
                    modal_remove.hide();
                    messageWeb.messageSuccess('Страница была успешно удален!');
                }
            }, function error(response) {
                messageWeb.messageError('Страница не может быть удален!');
            });
        }
    };


    $scope.tinymceOptions = {
        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code mybutton',
        setup: function (editor) {
            editor.addButton('mybutton', {
                text: 'My button',
                icon: false,
                onclick: function () {
                    editor.insertContent('&nbsp;<b>It\'s my button!</b>&nbsp;');
                }
            });
        }
    };

});

app.controller('migGalleryCTRL',function ($scope, $http, $sce ,fileUpload,messageWeb) {

    $scope.Images=[];
    $scope.myFile=[];
    $scope.tempFile=[];
    $scope.temp=[];
    $scope.CurrentImage=false;
    $scope.CurrentPage=0;
    $scope.ErrorUpload=false;

    var modal_edit=UIkit.modal('#edit-modal');

    var modal_remove=UIkit.modal('#remove-modal');

    //Чтение чайта до загрузки его preview
    $scope.readURL=function (file,id) {
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePrew' + id).css('background-image', "url('" + e.target.result + "')");
            };
            reader.readAsDataURL(file);
        }
    };

    $scope.$watch('tempFile', function () {

        $scope.Upload = false;

        if (!$scope.myFile.length) {
            $scope.myFile = $scope.tempFile;
        }
        else {
            var tmp_files = [];
            for (var i = 0; i <= $scope.myFile.length - 1; i++) {
                tmp_files.push($scope.myFile[i]);
            }
            for (i = 0; i <= $scope.tempFile.length - 1; i++) {
                var isset = find(tmp_files, $scope.tempFile[i]);
                if (!isset) {
                    tmp_files.push($scope.tempFile[i]);
                }
            }
            $scope.myFile=tmp_files;
        }
    });

    $scope.$watch('CurrentPage', function () {
        $scope.getGalleryAll($scope.CurrentPage);
    });

    $scope.remoweImage = function(key) {
        var tmp_files = [];
        for (var i = 0; i <= $scope.myFile.length - 1; i++) {
            tmp_files.push($scope.myFile[i]);
        }
        tmp_files.splice(key, 1);
        $scope.myFile = tmp_files;
        if (!$scope.myFile.length) {
            $scope.tempFile = [];
        }
    };

    $scope.openEditImage = function (val) {
        modal_edit.show();
        $scope.CurrentImage=val;
    };

    $scope.RemoveImage = function () {
        if($scope.CurrentImage){
            $http({
                method:'GET',
                url:'/admin/gallery/img/remove/'+$scope.CurrentImage.id
            }).then(function success(response) {
                if(response.data) {
                    $scope.CurrentImage = false;
                    $scope.getGalleryAll($scope.CurrentPage);
                    modal_remove.hide();
                    messageWeb.messageSuccess('Изображение было успешно удалено!');
                }
            }, function error(response) {
                messageWeb.messageError('Изображение не может быть удалено!');
            });
        }
    };

    $scope.openRemoveImage = function (val) {
        modal_remove.show();
        $scope.CurrentImage=val;
    };

    $scope.closeRemoveImage = function () {
        modal_remove.hide();
        $scope.CurrentGroup=false;
    };

    $scope.getGalleryAll =function (page) {
        $http({
            method:'GET',
            url:'/admin/gallery/img/get/page/'+page
        }).then(function success(response) {
            if(response.data) {
                $scope.Images = response.data.images;
                $scope.Pages = response.data.pages;
            }
        }, function error(response) {
        });
    };

    $scope.uploadFile=function () {
        var file = $scope.myFile;
        var uploadUrl = '/admin/gallery/img/upload/0/gallery';
            fileUpload.uploadFileToUrl(file, uploadUrl, function (e) {
                if (e){
                    for(var i=0; i<e.length; i++){
                        if (!e[i]) {
                            $scope.ErrorUpload[i] = true;
                            messageWeb.messageError('Изображение '+$scope.myFile[i].name+' не может быть загружен!');
                        }
                        else {
                            messageWeb.messageSuccess('Изображение '+$scope.myFile[i].name+' загружено!');
                        }
                    }
                    $scope.myFile=[];
                    $scope.getGalleryAll($scope.CurrentPage);
                }
            });
    };

    $scope.selectPage =function (page) {
        $scope.CurrentPage = page;
    };
    
    $scope.saveImage =function () {
        $http({
            method: "POST",
            url: '/admin/gallery/img/edit/' + $scope.CurrentImage.id,
            data: $scope.CurrentImage
        }).then(function success(response) {
            if (response.data) {
                messageWeb.messageSuccess('Данные странцы успешно обновлены!');
                modal_remove.hide();
            }
        }, function error(response) {
            messageWeb.messageError('Данные странцы не обновлены!');
        });
    }

});

app.controller('testCTRL',function ($scope, $http, $sce ,fileUpload,messageWeb,$element, dragularService, $timeout) {

    $scope.Test=false;
    $scope.TestId=false;
    $scope.CurrentTest={};
    $scope.QuestionList=false;
    $scope.TestQList=false;
    $scope.Questionscategory=[];
    $scope.CurrentCategory=0;
    $scope.TempTestQList=[];
    $scope.Tests=[];
    $scope.Pages=[];
    $scope.CurrentPage=0;

    $scope.getTestAll =function (page) {
        $http({
            method:'GET',
            url:'/admin/tests/page/'+page
        }).then(function success(response) {
            if(response.data) {
                $scope.Tests = response.data.tests;
                $scope.Pages = response.data.pages;
            }
        }, function error(response) {
        });
    };

    $scope.getQuestionCategory=function () {
        $http({
            method: 'GET',
            url: '/admin/question/category/get/'
        }).then(function success(response) {
            if (response.data) {
                $scope.Questionscategory = response.data;
            }
        }, function error(response) {
        });
    };

    $scope.getQuestionCategory();

    $scope.$watch('CurrentPage', function () {
        $scope.getTestAll($scope.CurrentPage);
    });

    $scope.$watch('CurrentCategory', function () {
        $scope.getQuestions();
    });

    $scope.$watch('TestId', function () {
        $scope.getTest();
        $scope.getQuestions();
    });

    $scope.clearTest =function () {
        $scope.Test={};
    };

    $scope.createTest = function () {
        if ($scope.Test) {
            $http({
                method: "POST",
                url: '/admin/tests/add',
                data: $scope.Test
            }).then(function success(response) {
                if (response.data) {
                    messageWeb.messageSuccess('Тест успешно создан!');
                    $scope.getTestAll($scope.CurrentPage);
                }
            }, function error(response) {
            });
        }
        else {
            messageWeb.messageError('Тест не может быть создан!');
        }
    };

    $scope.getTest=function () {
        $http({
            method: 'GET',
            url: '/admin/tests/get/' + $scope.TestId
        }).then(function success(response) {
            if (response.data) {
                $scope.CurrentTest = response.data;
                if ($scope.CurrentTest.data.test_on_time){
                    $scope.CurrentTest.data.test_on_time=true;
                }
                else{
                    $scope.CurrentTest.data.test_on_time=false;
                }
                if ($scope.CurrentTest.data.rand){
                    $scope.CurrentTest.data.rand=true;
                }
                else{
                    $scope.CurrentTest.data.rand=false;
                }
                for (var i=0; i<response.data.question.length; i++){
                    $scope.TempTestQList[i] = response.data.question[i];
                }
                $scope.TestQList = $scope.CurrentTest.question;
                inintDrag();
            }
        }, function error(response) {
        });
    };

    $scope.saveTest = function () {
        if ($scope.TestQList) {
            $http({
                method: "POST",
                url: '/admin/tests/save/'+$scope.TestId,
                data: $scope.CurrentTest.data
            }).then(function success(response) {
                if (response.data) {
                    messageWeb.messageSuccess('Тест успешно сохранен!');
                    // $scope.getTestAll($scope.CurrentPage);
                }
            }, function error(response) {
            });
        }
        else {
            messageWeb.messageError('Тест не может быть сохранен!');
        }
    };

    $scope.selectPage =function (page) {
        $scope.CurrentPage = page;
    };

    $scope.GoToEdit = function (id) {
        location.href='/admin/tests/edit/'+id;
    };

    $scope.getQuestions=function () {
        $http({
            method: 'GET',
            url: '/admin/questions/test/get/' + $scope.TestId +'/'+$scope.CurrentCategory
        }).then(function success(response) {
            if (response.data) {
                $scope.QuestionList = response.data;
                inintDrag();
            }
        }, function error(response) {
        });
    };

    $scope.removeTQ=function (key) {
        $http({
            method: "POST",
            url: '/admin/tests/remove/question/'+$scope.TestId,
            data: {'question_id':$scope.TestQList[key].id}
        }).then(function success(response) {
            if (response.data) {
                messageWeb.messageSuccess('Вопрос успешно удален!');
                $scope.QuestionList[$scope.QuestionList.length]=$scope.TestQList[key];
                $scope.TestQList.splice(key,1);
                $scope.TempTestQList=[];
                for (var i=0; i<$scope.TestQList.length; i++){

                    $scope.TempTestQList[i] = $scope.TestQList[i];
                }
            }
        }, function error(response) {
            messageWeb.messageError('Вопрос не может быть удален!');
        });
    };
    
    $scope.addQuestion = function (id) {
        $http({
            method: "POST",
            url: '/admin/tests/add/question/'+$scope.TestId,
            data: {'question_id':id}
        }).then(function success(response) {
            if (response.data) {
                messageWeb.messageSuccess('Вопрос успешно добавлен!');
            }
        }, function error(response) {
            messageWeb.messageError('Вопрос не может быть добавлен!');
        });
    };


    var inintDrag= function () {
        if ($scope.QuestionList && $scope.TestQList) {
            dragularService.cleanEnviroment();
            var containerLeft = document.querySelector('#containerTest'),
                containerRight = document.querySelector('#containerQuesctions');

            dragularService([containerLeft, containerRight], {
                containersModel: [$scope.TestQList, $scope.QuestionList],
                revertOnSpill: true
            });
        }
    };

    Array.prototype.diff = function(a) {
        return this.filter(function(i){return a.indexOf(i) < 0;});
    };

    $scope.$watch('TestQList.length', function () {
        if ($scope.TestQList.length!=undefined) {
            $scope.CurrentTest.data.count_question = $scope.TestQList.length;
        }
        if ($scope.TempTestQList.length<$scope.TestQList.length){
            var result = $scope.TestQList.diff($scope.TempTestQList);
            $scope.addQuestion(result[0].id);
            $scope.TempTestQList=[];
            for (var i=0; i<$scope.TestQList.length; i++){
                $scope.TempTestQList[i] = $scope.TestQList[i];
            }
        }
    });
});

app.controller('questionCTRL',function ($scope, $http, $sce ,fileUpload,messageWeb,$element, dragularService, $timeout) {

    $scope.QuestionId=false;
    $scope.NewQuestion={name:'',answer:[]};
    $scope.NewCategory={name:''};
    $scope.Questions=[];
    $scope.Questionscategory=[];
    $scope.Pages=[];
    $scope.CurrentQuestion=false;
    $scope.CurrentPage=0;

    var modal_remove=UIkit.modal('#remove-modal');

    $scope.$watch('QuestionId', function () {
        if ($scope.QuestionId) {
            $scope.getQuestion($scope.QuestionId);
        }
    });

    $scope.$watch('CurrentPage', function () {
        $scope.getQuestionAll($scope.CurrentPage);
    });

    $scope.getQuestion=function () {
        $http({
            method: 'GET',
            url: '/admin/question/get/' + $scope.QuestionId
        }).then(function success(response) {
            if (response.data) {
                $scope.CurrentQuestion = response.data;
            }
        }, function error(response) {
        });
    };

    $scope.getQuestionCategory=function () {
        $http({
            method: 'GET',
            url: '/admin/question/category/get/'
        }).then(function success(response) {
            if (response.data) {
                $scope.Questionscategory = response.data;
            }
        }, function error(response) {
        });
    };

    $scope.getQuestionCategory();

    $scope.getQuestionAll =function (page) {
        $http({
            method:'GET',
            url:'/admin/question/get/page/'+page
        }).then(function success(response) {
            if(response.data) {
                $scope.Questions = response.data.question;
                $scope.Pages = response.data.pages;
            }
        }, function error(response) {
        });
    };

    $scope.GoToEdit = function (id) {
        location.href='/admin/question/edit/'+id;
    };

    $scope.selectPage=function (id) {
        $scope.CurrentPage=id;
    };

    $scope.createQuestion=function () {
        if (!$scope.NewQuestion.name){
            messageWeb.messageError('Поле "Вопрос" не может быть пустым!');
        }
        else {
            if (!$scope.NewQuestion.answer.length) {
                messageWeb.messageError('Вопрос не может быть добавлен! Так как внем нет ни одного ответа !');
            }
            else {
                var Answer=false;
                for(var i=0; i<$scope.NewQuestion.answer.length; i++){
                    if ($scope.NewQuestion.answer[i].value===true){
                        Answer=true;
                        break;
                    }
                }
                if (Answer){
                    if ($scope.NewQuestion.question_category!='' && $scope.NewQuestion.question_category!=undefined) {
                        $http({
                            method: 'POST',
                            url: '/admin/question/add',
                            data: $scope.NewQuestion
                        }).then(function success(response) {
                            if (response.data) {
                                $scope.getQuestionAll($scope.CurrentPage);
                                messageWeb.messageSuccess('Вопрос успешно добавлен !');
                                $scope.clearQuestion();

                            }
                        }, function error(response) {
                            messageWeb.messageError('Вопрос не может быть добавлен !');
                        });
                    }
                    else {
                        messageWeb.messageError('Необходимо выбрать "Категорию вопроса" !');
                    }

                }
                else{
                    messageWeb.messageError('Не выбран правельный ответ!');
                }
            }
        }
    };

    $scope.createQuestionCategory=function () {
        if (!$scope.NewCategory.name) {
            messageWeb.messageError('Поле "Название категории" не может быть пустым!');
        }
        else {
                $http({
                    method: 'POST',
                    url: '/admin/question/category/add',
                    data: $scope.NewCategory
                }).then(function success(response) {
                    if (response.data) {
                        console.log(response.data);
                        $scope.getQuestionCategory();
                        messageWeb.messageSuccess('Категория успешно добавлена !');

                    }
                }, function error(response) {
                    messageWeb.messageError('Категория не может быть добавлена !');
                });
        }
    };

    $scope.clearQuestion=function () {
        $scope.NewQuestion={name:'',answer:[]};
    };

    $scope.saveQuestion=function () {
        if (!$scope.CurrentQuestion.name) {
            messageWeb.messageError('Поле "Вопрос" не может быть пустым!');
        }
        else {
            if (!$scope.CurrentQuestion.answer.length) {
                messageWeb.messageError('Вопрос не может быть добавлен! Так как внем нет ни одного ответа !');
            }
            else {
                var Answer = false;
                for (var i = 0; i < $scope.CurrentQuestion.answer.length; i++) {
                    if ($scope.CurrentQuestion.answer[i].value === true) {
                        Answer = true;
                        break;
                    }
                }
                if (Answer) {
                    if ($scope.CurrentQuestion.question_category != '' && $scope.CurrentQuestion.question_category != undefined) {
                        $http({
                            method: 'POST',
                            url: '/admin/question/save/' + $scope.QuestionId,
                            data: $scope.CurrentQuestion
                        }).then(function success(response) {
                            if (response.data) {
                                console.log(response.data);
                                $scope.getQuestionAll($scope.CurrentPage);
                                messageWeb.messageSuccess('Вопрос успешно сохранен !');
                            }
                        }, function error(response) {
                            messageWeb.messageError('Вопрос не может быть сохранен !');
                        });
                    }
                    else {
                        messageWeb.messageError('Необходимо выбрать "Категорию вопроса" !');
                    }
                }
                else {
                    messageWeb.messageError('Не выбран правельный ответ!');
                }
            }
        }
    };

    $scope.openRemoveQuestion = function (val) {
        modal_remove.show();
        $scope.CurrentQuestion=val;
    };

    $scope.closeRemoveQuestion = function (val) {
        modal_remove.hide();
        $scope.CurrentQuestion=false;
    };

    $scope.RemoveQuestion = function () {
        if($scope.CurrentQuestion){
            $http({
                method:'GET',
                url:'/admin/question/remove/'+$scope.CurrentQuestion.id
            }).then(function success(response) {
                if(response.data) {
                    $scope.CurrentQuestion = false;
                    $scope.getQuestionAll($scope.CurrentPage);
                    modal_remove.hide();
                    messageWeb.messageSuccess('Вопрос был успешно удален!');
                }
            }, function error(response) {
                console.log(response);
                messageWeb.messageError('Вопрос не был удален!');
            });
        }
    };

    $scope.addAnswerNew=function () {
        $scope.NewQuestion.answer[$scope.NewQuestion.answer.length]={text:'',value:"false"};
    };

    $scope.removeAnswerNew=function (key) {
       $scope.NewQuestion.answer.splice(key,1);
    };

    $scope.addAnswerCurrent=function () {
        $scope.CurrentQuestion.answer[$scope.CurrentQuestion.answer.length]={text:'',value:"false"};
    };

    $scope.removeAnswerCurrent=function (key) {
        $scope.CurrentQuestion.answer.splice(key,1);
    };



});