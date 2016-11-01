<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 07.10.16
 * Time: 16:55
 */
?>
@extends('admin.dashboard')

@section('content')
<section ng-controller="questionCTRL" class="question-index">
    <h2>Список вопросов</h2>
    <div class="uk-container uk-container-center">
        <div class="uk-accordion" data-uk-accordion="{collapse: false, showfirst: false}">
            <h3 class="uk-accordion-title" ng-class="{'uk-active':newGroup.length==0}">
                Добавить новый вопрос
                <i class="uk-icon-plus-circle uk-text-success"></i>
            </h3>
            <div class="uk-accordion-content">
                <div>
                    <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                        <div class="uk-width-1-1 uk-margin-top">
                            <label class="uk-form-label">Вопрос</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="NewQuestion.name" placeholder="Вопрос" class="uk-width-1-1">
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-margin-top">
                            <label class="uk-form-label">Категория вопроса</label>
                            [[NewQuestion.question_category]]
                            <div class="uk-form-controls">
                                <select ng-model="NewQuestion.question_category">
                                    <option ng-selected="NewQuestion.question_category" value="" >Выберите катнгорию вопроса</option>
                                    <option ng-selected="NewQuestion.question_category==val.id"  ng-repeat="(key, val) in Questionscategory" value="[[ val.id ]]">[[ val.name ]]
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-margin-top">
                            <button class="uk-button uk-button-success" ng-click="addAnswerNew()"  ><i class="uk-icon-plus"></i></button>
                            <label class="uk-form-label">Ответы</label>
                        </div>
                        <div class="uk-width-1-1 uk-margin-top" ng-repeat="(key,val) in NewQuestion.answer" >
                            <label class="uk-form-label">Ответ №[[key+1]]</label>
                            <button class="uk-button uk-button-mini uk-button-danger uk-margin-bottom" ng-click="removeAnswerNew(key)" ><i class="uk-icon-trash"></i></button>
                            <div class="uk-form-controls">
                                <textarea ng-model="val.text" placeholder="Ответ" class="uk-width-1-1" ng-class="{'uk-form-success':val.value===true}"></textarea>
                                <label class="label-answer" ng-class="{'active':val.value===true}" for=""></label>
                                <input  type="checkbox" ng-model="val.value" placeholder="Описание" class="new-answer" ng-class="{'uk-form-success':val.value===true}">
                            </div>
                        </div>

                    </div>

                    <div class="uk-form">
                        <fieldset data-uk-margin>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <br>
                                    <br>
                                    <div class="uk-text-center uk-form-controls">
                                        <button class="uk-button uk-button-danger" ng-click="clearQuestion()">
                                            <i class="uk-icon-close"></i>
                                        </button>
                                        <button class="uk-button uk-button-success" ng-click="createQuestion()" >
                                            <i class="uk-icon-save"></i>
                                        </button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="uk-pagination">
                    <li ng-repeat="(key,val) in Pages" ng-class="{'uk-active':CurrentPage==val}" ><span class="uk-pointer" ng-click="selectPage(val)">[[val+1]]</span></li>
                </ul>
            </div>

            <div class="uk-width-1-1">
                <table class="uk-table uk-table-hover uk-table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Название</td>
                        <td>Ярлык</td>
                        <td>Действия</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="(key,val) in Questions">
                        <td>[[val.id]]</td>
                        <td>[[val.name]]</td>
                        <td>[[val.updated_at]]</td>
                        <td>
                            <button class="uk-button uk-button-success" ng-click="GoToEdit(val.id)">
                                <i class="uk-icon-edit"></i>
                            </button>
                            <button class="uk-button uk-button-danger" ng-click="openRemoveQuestion(val)">
                                <i class="uk-icon-remove"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="uk-width-1-1">
                <ul class="uk-pagination">
                    <li ng-repeat="(key,val) in Pages" ng-class="{'uk-active':CurrentPage==val}" ><span class="uk-pointer" ng-click="selectPage(val)">[[val+1]]</span></li>
                </ul>
            </div>

        </div>
    </div>

    <div id="remove-modal" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <h2>Вы действительно хотите удалить !</h2>
            <div class="uk-container uk-container-center uk-flex uk-flex-space-around" >
                <button class="uk-button uk-button-danger" ng-click="RemoveQuestion()" >Yes</button>
                <button class="uk-button uk-button-success uk-modal-close" ng-click="closeRemoveQuestion()" >No</button>
            </div>
        </div>
    </div>

</section>
@endsection