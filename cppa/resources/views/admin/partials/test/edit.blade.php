@extends('admin.dashboard')

@section('content')
    <section ng-controller="testCTRL" ng-init="TestId={{$id}};" class="test-edit" >
        <h2>Редактирование теста "[[CurrentTest.data.name]]"</h2>
        <div class="uk-grid">
            <div class=" uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10 uk-visible-small uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                <h3 class="uk-accordion-title">
                    Действия
                    <i class="uk-icon-plus-circle uk-text-success"></i>
                </h3>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-success" ng-click="saveTest();">Сохранить</button>
                </div>
            </div>

            <div class="uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10">

                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Редактор теста
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        <div class="uk-form">
                            <fieldset data-uk-margin>
                                <div class="uk-grid">
                                    <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                        <label class="uk-form-label">Название</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-width-1-1" type="text" ng-model="CurrentTest.data.name" placeholder="Название">
                                        </div>
                                    </div>
                                    <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                        <label class="uk-form-label">Описание</label>
                                        <div class="uk-form-controls">
                                            <textarea class="uk-width-1-1" ng-model="CurrentTest.data.description" placeholder="Описание"></textarea>
                                        </div>
                                    </div>
                                    <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                        <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                            <div class="uk-form-controls">
                                                <label for="rand" class="uk-form-label">Тест на время</label>
                                                <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" ng-model="CurrentTest.data.test_on_time" ng-checked="CurrentTest.data.test_on_time==1" class="onoffswitch-checkbox" id="rand">
                                                    <label class="onoffswitch-label" for="rand">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="uk-form-label">Время мин.</label>
                                        <div class="uk-form-controls">
                                            <input type="text" class="uk-width-1-1" ng-model="CurrentTest.data.time" ng-disabled="CurrentTest.data.test_on_time==0" placeholder="Время" >
                                        </div>
                                    </div>
                                    <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                        <label class="uk-form-label">Количество выводимых вопросов</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-width-1-1" type="text" ng-model="CurrentTest.data.count_question" placeholder="Название">
                                        </div>
                                    </div>
                                    <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                        <div class="uk-form-controls">
                                            <label for="rand" class="uk-form-label">Случайный порядок</label>
                                            <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" ng-model="CurrentTest.data.rand" ng-checked="CurrentTest.data.rand==1" class="onoffswitch-checkbox" id="rand">
                                                <label class="onoffswitch-label" for="rand">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                            <div id="testEdit" class="wrapper">
                                <div class='uk-grid'>
                                    <div class="uk-width-1-2 test">
                                        <h3>Тест</h3>
                                        <div id="containerTest" class="containerVertical">
                                            <div class="" ng-repeat="(key,item) in TestQList">[[item.name]]
                                                <a ng-click="removeTQ(key)" class="uk-button uk-button-danger uk-button-mini uk-float-right" title="Удалить вопрос">
                                                    <i class="uk-icon-remove"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2 question">
                                        <div class="uk-form">
                                            <h3>Вопросы
                                                <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-text-left uk-margin-left">
                                                    <label class="uk-form-label">Категория вопросов</label>
                                                    <div class="uk-form-controls">
                                                        <select ng-model="CurrentCategory">
                                                            <option ng-selected="CurrentCategory" value="0">Выберите
                                                                категорию вопроса
                                                            </option>
                                                            <option ng-selected="CurrentCategory==val.id"
                                                                    ng-repeat="(key, val) in Questionscategory"
                                                                    value="[[ val.id ]]">
                                                                [[ val.name ]]
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-text-left uk-margin-left">
                                                    <label class="uk-form-label">Название вопроса</label>
                                                    <div class="uk-form-controls">
                                                        <input type="text" ng-model="Search"
                                                               placeholder="Название вопроса">
                                                    </div>
                                                </div>

                                            </h3>
                                        </div>                                        <div id="containerQuesctions" class="uk-width-1-2 containerVertical">
                                            <div ng-repeat="item in QuestionList| filter:Search">[[item.name]]</div>
                                        </div>
                                    </div>
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
                        <button class="uk-button uk-button-success uk-margin uk-margin-top uk-margin-bottom" ng-click="saveTest();" >Сохранить</button>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </section>
@endsection
