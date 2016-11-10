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
<section ng-controller="courseCTRL" class="user-group">
    <h2>Список курсов</h2>
    <div class="uk-container uk-container-center">
        <div class="uk-accordion" data-uk-accordion="{collapse: false, showfirst: false}">
            <h3 class="uk-accordion-title" ng-class="{'uk-active':newGroup.length==0}">
                Добавить новый курс
                <i class="uk-icon-plus-circle uk-text-success"></i>
            </h3>
            <div class="uk-accordion-content">
                <div>
                    <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                        <div class="uk-width-1-1 uk-margin-top">
                            <label class="uk-form-label">Название</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="NewsCourse.title" placeholder="Название" class="uk-width-1-1">
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-margin-top">
                            <label class="uk-form-label">Ярлык</label>
                            <div class="uk-form-controls">
                                <input  type="text" ng-model="NewsCourse.slug" placeholder="Ярлык" class="uk-width-1-1" ng-class="{'uk-form-danger':PageIsset===true,'uk-form-success':PageIsset===false}">
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
                                        <button class="uk-button uk-button-danger" ng-click="clearNewsCourse()">
                                            <i class="uk-icon-close"></i>
                                        </button>
                                        <button class="uk-button uk-button-success" ng-click="createNewsCoursePost()" >
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
                    <li ng-repeat="(key,val) in PagesPost" ng-class="{'uk-active':CurrentPage==val}" ><span class="uk-pointer" ng-click="selectPage(val)">[[val+1]]</span></li>
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
                    <tr ng-repeat="(key,val) in CoursesPosts">
                        <td>[[val.id]]</td>
                        <td>[[val.title]]</td>
                        <td>[[val.slug]]</td>
                        <td>
                            <button class="uk-button uk-button-success" ng-click="GoToEditPost(val.id)">
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
                    <li ng-repeat="(key,val) in PagesPost" ng-class="{'uk-active':CurrentPage==val}" ><span class="uk-pointer" ng-click="selectPage(val)">[[val+1]]</span></li>
                </ul>
            </div>
        </div>
    </div>
        @include('admin.partials.course.post.remove_modal')
</section>
@endsection