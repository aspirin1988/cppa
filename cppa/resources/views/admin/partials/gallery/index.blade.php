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
<section ng-controller="migGalleryCTRL" class="user-group">
    <h2>Список изображений</h2>
    <div class="uk-container uk-container-center">
        <div class="uk-accordion" data-uk-accordion="{collapse: false, showfirst: false}">
            <h3 class="uk-accordion-title" ng-class="{'uk-active':newGroup.length==0}">
                Загрузить изображения в галерею
                <i class="uk-icon-plus-circle uk-text-success"></i>
            </h3>
            <div class="uk-accordion-content">
                <div class="upload-box">
                    <div class="file_upload">
                        <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
                        Перетащите изобрадения для загрузки или
                        <label for="upload-file" class="uk-form-file">выберите его</label>.
                        <input id="upload-file" class="file_upload" ng-form="uploadFile()" type="file" name="file[]" file-model="tempFile" multiple/>
                    </div>
                    <div ng-if="myFile.length" class="box box-primary">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">Список изображений</h3>
                        </div>
                        <div class="box-body">
                            <div class="uk-grid">
                                <div ng-repeat="(key,val) in myFile" data-uk-filter="landing_page" data-grid-prepared="true" class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-2" aria-hidden="false" style="top: 0px; left: 0px; opacity: 1;">
                                    <figure class="uk-overlay uk-overlay-hover">
                                        <div  class="imagePrew" id="imagePrew[[key]]"  ng-init="img=readURL(val,key)"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-fade uk-overlay-background">
                                            <div class="uk-grid">
                                                <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                                    <h3>[[val.name]]</h3>
                                                    <p>
                                                        [[val.type]]
                                                        <br>
                                                        Разме: [[val.size/1024 ]]кб <br>
                                                    </p>
                                                </div>
                                                <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-visible-large">
                                                    <h3 class="uk-button uk-button-danger deletePrewImage" ng-click="remoweImage(key)" >Удалить <i class="uk-icon-trash-o"></i></h3>
                                                </div>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>

                            </div>
                        </div>
                        <div class="uk-border-rounded uk-text-right">
                            <button ng-click="uploadFile()" type="button" class="uk-button uk-button-primary"><i class="fa fa-plus"></i> Загрузить изображения <i ng-if="Upload" class="animation-h fa  fa-hourglass-half"></i></button>
                        </div>
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
                        <td>Ярлык</td>
                        <td>Действия</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="(key,val) in Images">
                        <td>[[val.id]]</td>
                        <td>
                            <a href="[[val.url]]" data-uk-lightbox="{group:'group1'}" title="[[val.title]]">
                                <img src="[[val.url_small]]" alt="">
                            </a>
                        </td>
                        <td>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">Title:[[val.title]]</div>
                                <div class="uk-width-1-1">Alt:[[val.alt]]</div>
                                <div class="uk-width-1-1">Описание:[[val.description]]</div>
                            </div>
                        </td>
                        <td>
                            <button class="uk-button uk-button-success" ng-click="openEditImage(val)">
                                <i class="uk-icon-edit"></i>
                            </button>
                            <button class="uk-button uk-button-danger" ng-click="openRemoveImage(val)">
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

    @include('admin.partials.gallery.edit_modal')
    @include('admin.partials.gallery.remove_modal')

</section>
@endsection