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
<section ng-controller="user_groupsCTRL" class="user-group">
    <h2>Настройка уровня доступа</h2>
    <div class="uk-container uk-container-center">
        <div class="uk-accordion" data-uk-accordion="{collapse: false, showfirst: false}">
            <h3 class="uk-accordion-title">
                Добавить уровень доступа
                <i class="uk-icon-plus-circle uk-text-success"></i>
            </h3>
            <div class="uk-accordion-content">
                <div>
                    <div class="uk-form">
                        <fieldset data-uk-margin>
                            <legend> Добавление нового уровня доступа</legend>
                            <div class="uk-grid">
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Название</label>
                                    <div class="uk-form-controls">
                                        <input type="text" ng-model="newGroup.name" placeholder="Название">
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Ярлык</label>
                                    <div class="uk-form-controls">
                                        <input type="text" ng-model="newGroup.slug" placeholder="Ярлык">
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Описание</label>
                                    <div class="uk-form-controls">
                                        <textarea ng-model="newGroup.description" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Уровень доступа</label>
                                    <div class="uk-form-controls">
                                        <select ng-model="newGroup.access_level" >
                                            <option value="0">0</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="150">150</option>
                                            <option value="200">200</option>
                                            <option value="800">800</option>
                                            <option value="900">900</option>
                                        </select>
                                    </div>
                                    <div class="uk-form-controls">
                                        <label><input type="checkbox" ng-model="newGroup.access_edit">Редактирование</label>
                                    </div>
                                </div>
                                <div class="uk-width-1-1">
                                    <br>
                                    <br>
                                    <div class="uk-text-center uk-form-controls">
                                        <button class="uk-button uk-button-danger" ng-click="clearUserGroup()">
                                            <i class="uk-icon-close"></i>
                                        </button>
                                        <button class="uk-button uk-button-success" ng-click="addUserGroup()" >
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

        <h2 ng-if="UserGroups.length===0">В данный момент список пуст !!!</h2>
            <div ng-if="UserGroups.length>0" class="uk-overflow-container">
                <h2>Список уровней доступа</h2>
                <table class="uk-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Ярлык</th>
                        <th>Уровень доступа</th>
                        <th>Редактировани</th>
                        <th>Описание</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(key,val) in UserGroups">
                            <td>[[val.id]]</td>
                            <td>[[val.name]]</td>
                            <td>[[val.slug]]</td>
                            <td>[[val.access_level]]</td>
                            <td>[[val.access_edit]]</td>
                            <td>[[val.description]]</td>
                            <td>
                                <button class="uk-button uk-button-success uk-button-mini" data-uk-modal="{target:'#edit-modal'}" ng-click="openEditUserGroup(val);" >
                                    <i class="uk-icon-edit"></i>
                                </button>
                                <button class="uk-button uk-button-danger uk-button-mini" data-uk-modal="{target:'#remove-modal'}" ng-click="openRemoveUserGroup(val)" >
                                    <i class="uk-icon-remove"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>

    @include('admin.partials.user_groups.edit_modal')
    @include('admin.partials.user_groups.remove_modal')
</section>
@endsection