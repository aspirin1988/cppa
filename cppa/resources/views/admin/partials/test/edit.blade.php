@extends('admin.dashboard')

@section('content')
    <section ng-controller="testCTRL" ng-init="TestId={{$id}};" class="test-edit" >
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

                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Редактор теста
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        <div id="testEdit" class='wrapper'>
                            <div class='tableRow'>
                                <div id="containerTest"  class='containerVertical'>
                                    <div class="" ng-repeat="item in TestQList">[[item.name]]</div>
                                </div>
                                <div id="containerQuesctions" class='containerVertical'>
                                    <div ng-repeat="item in QuestionList">[[item.name]]</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1">
                    <div class="tableRow">
                        <div class="container">
                            <div>Items1:
                                <br/>[[TestQList | json]]</div>
                        </div>
                        <div class="container">
                            <div>Items2:
                                <br/>[[QuestionList | json]]</div>
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
