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
<section ng-controller="testCTRL" class="user-group">
    <h2>Список тестов</h2>
    <div class="uk-container uk-container-center">
        <div class="uk-accordion" data-uk-accordion="{collapse: false, showfirst: false}">
            <h3 class="uk-accordion-title" ng-class="{'uk-active':newGroup.length==0}">
                Добавить новый тест
                <i class="uk-icon-plus-circle uk-text-success"></i>
            </h3>
            <div class="uk-accordion-content">
                <div>
                    <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                        <div class="uk-width-1-1 uk-margin-top">
                            <label class="uk-form-label">Название</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="Test.name" placeholder="Название" class="uk-width-1-1">
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-margin-top">
                            <label class="uk-form-label">Описание</label>
                            <div class="uk-form-controls">
                                <input  type="text" ng-model="Test.description" placeholder="Описание" class="uk-width-1-1">
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
                                        <button class="uk-button uk-button-danger" ng-click="clearTest()">
                                            <i class="uk-icon-close"></i>
                                        </button>
                                        <button class="uk-button uk-button-success" ng-click="createTest()" >
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
                    <li ng-repeat="(key,val) in Pages" ng-class="{'uk-active':CurrentPage==val}" ><span ng-click="selectPage(val)">[[val+1]]</span></li>
                </ul>
            </div>

            <div class="uk-width-1-1">
                <table class="uk-table uk-table-hover uk-table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Название</td>
                        <td>Описвние</td>
                        <td>Действия</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="(key,val) in Tests">
                        <td>[[val.id]]</td>
                        <td>[[val.name]]</td>
                        <td>[[val.description]]</td>
                        <td>
                            <button class="uk-button uk-button-success" ng-click="GoToEdit(val.id)">
                                <i class="uk-icon-edit"></i>
                            </button>
                            <button class="uk-button uk-button-danger" ng-click="openRemovePage(val)">
                                <i class="uk-icon-remove"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="uk-width-1-1">
                <ul class="uk-pagination">
                    <li ng-repeat="(key,val) in Pages" ng-class="{'uk-active':CurrentPage==val}" ><span ng-click="selectPage(val)">[[val+1]]</span></li>
                </ul>
            </div>

        </div>
    </div>

    <div id="remove-modal" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <h2>Вы действительно хотите удалить !</h2>
            <div class="uk-container uk-container-center uk-flex uk-flex-space-around" >
                <button class="uk-button uk-button-danger" ng-click="RemovePage()" >Yes</button>
                <button class="uk-button uk-button-success uk-modal-close" ng-click="closeRemovePage()" >No</button>
            </div>
        </div>
    </div>

</section>
@endsection