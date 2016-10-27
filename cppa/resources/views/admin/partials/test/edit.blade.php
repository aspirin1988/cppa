@extends('admin.dashboard')

@section('content')
    <section ng-controller="testCTRL" ng-init="TestId={{$id}};" >
        <h2>Редактирование теста "[[CurrentTest.name]]"</h2>
        <div class="uk-grid">
            <div class=" uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10 uk-visible-small uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                <h3 class="uk-accordion-title">
                    Действия
                    <i class="uk-icon-plus-circle uk-text-success"></i>
                </h3>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-success" ng-click="saveTest(1);">Сохранить</button>
                </div>
            </div>

            <div class="uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10">
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Название</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="CurrentTest.title" placeholder="Название" class="uk-width-1-1">
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Ярлык</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="CurrentTest.description" placeholder="Описание" class="uk-width-1-1" ng-class="{'uk-form-danger':PageIsset===true,'uk-form-success':PageIsset===false}">
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Контент</label>
                    <div class="uk-form-controls">
                            <textarea ui-tinymce="tinymceOptions" ng-model="Page.content"></textarea>
                    </div>
                </div>
                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Галерея страницы
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus dicta doloremque earum iste nam nostrum, quod. Ad adipisci aliquam consequatur, ducimus, et iure mollitia nostrum quam quas sint soluta!
                    </div>
                </div>
                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Видео страницы
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus dicta doloremque earum iste nam nostrum, quod. Ad adipisci aliquam consequatur, ducimus, et iure mollitia nostrum quam quas sint soluta!
                    </div>
                </div>
                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Редактор метаданных страницы
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus dicta doloremque earum iste nam nostrum, quod. Ad adipisci aliquam consequatur, ducimus, et iure mollitia nostrum quam quas sint soluta!
                    </div>
                </div>
                <div class="uk-width-1-1">
                    <style>
                        .clickedClass {
                            background-color: orange !important;
                        }
                        .containerVertical{
                            padding-top:20px;
                            padding-bottom:20px;
                            width: 50%;
                            float: left;
                            display: inline-block;
                        }
                        .containerVertical >*{
                            cursor: pointer;
                            background: rgba(0,0,0,.5);
                            padding: 5px;
                            margin: 2px;
                            border-radius: 5px;
                            border:1px solid;
                        }
                    </style>

                    <div class='wrapper' ng-controller="BasicModel">
                        <div class='tableRow'>
                            <div class='containerVertical'>
                                <div ng-repeat="item in items1">[[item.content]]</div>
                            </div>
                            <div class='containerVertical'>
                                <div ng-repeat="item in items2">[[item.content]]</div>
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="container">
                                <div>Items1:
                                    <br/>[[items1 | json]]</div>
                            </div>
                            <div class="container">
                                <div>Items2:
                                    <br/>[[items2 | json]]</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-width-small-1-1 uk-width-medium-3-10 uk-width-large-3-10">
                <div class="uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Действия
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content uk-flex uk-flex-space-around uk-flex-column">
                        <button class="uk-button uk-button-success uk-margin uk-margin-top uk-margin-bottom" ng-click="savePage(1);" >Опубликовать</button>
                        <button class="uk-button uk-button-primary uk-margin-bottom" ng-click="savePage(0);">Черновик</button>
                    </div>
                </div>
                <br>
                <div class="uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Миниатюра
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
