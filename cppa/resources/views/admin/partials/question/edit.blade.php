@extends('admin.dashboard')

@section('content')
    <section ng-controller="questionCTRL" class="question-edit" ng-init="QuestionId={{$id}};" >
        <h2>Редактирование страницы</h2>
        <div class="uk-grid">
            <div class=" uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10 uk-visible-small uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                <h3 class="uk-accordion-title">
                    Действия
                    <i class="uk-icon-plus-circle uk-text-success"></i>
                </h3>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-success" ng-click="saveQuestion();" >Сохранить</button>
                </div>
            </div>

            <div class="uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10">
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Вопрос</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="CurrentQuestion.name" placeholder="Вопрос" class="uk-width-1-1">
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-top" ng-repeat="(key,val) in CurrentQuestion.answer" >
                    <label class="uk-form-label">Ответ №[[key+1]]</label>
                    <div class="uk-form-controls">
                        <textarea ng-model="val.text" placeholder="Ответ" class="uk-width-1-1" ng-class="{'uk-form-success':val.value===true}"></textarea>
                        <label class="label-answer" ng-class="{'active':val.value===true}" for=""></label>
                        <input  type="checkbox" ng-model="val.value" placeholder="Описание" class="new-answer" ng-class="{'uk-form-success':val.value===true}">
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
                        <button class="uk-button uk-button-success" ng-click="saveQuestion();" >Сохранить</button>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </section>
@endsection
