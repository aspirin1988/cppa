@extends('admin.dashboard')

@section('content')
    <section ng-controller="courseCTRL" ng-init="CoursePostID={{$id}};" >
        <h2>Редактирование страницы</h2>
        <div class="uk-grid">
            <div class=" uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10 uk-visible-small uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                <h3 class="uk-accordion-title">
                    Действия
                    <i class="uk-icon-plus-circle uk-text-success"></i>
                </h3>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-success" ng-click="saveCoursePost();" >Сохранить</button>
                </div>
            </div>

            <div class="uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10">
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Название</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="CurrentCourse.title" placeholder="Название" class="uk-width-1-1">
                    </div>
                </div>

                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Ярлык</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="CurrentCourse.slug" placeholder="Ярлык" class="uk-width-1-1" ng-class="{'uk-form-danger':PageIsset===true,'uk-form-success':PageIsset===false}">
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Промежуточный тест</label>
                    <div class="uk-form-controls">
                        <select ng-model="CurrentCourse.test_id" title="" name="" >
                            <option value="">Выберите тест</option>
                            <option ng-repeat="(key, val) in Tests" value="[[val.id]]" ng-selected="CurrentCourse.test_id==val.id"  >[[ val.name ]]
                            </option>
                        </select>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Контент</label>
                    <div class="uk-form-controls">
                            <textarea ui-tinymce="tinymceOptions" ng-model="CurrentCourse.content"></textarea>
                    </div>
                </div>
                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Галерея страницы
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
                            <tr ng-repeat="(key,val) in CurrentCourseGallery">
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
                </div>

                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Редактор метаданных страницы
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        <div class="uk-grid">
                            <div class="form-group uk-width-1-1">
                                <section class="snippet-editor__preview">
                                    <div class="snippet_container">
                                        <span class="title">[[CurrentCourse.meta_title]]</span>
                                        <span class="url urlBase" id="snippet_citeBase">{{Request::getHost().'/'}}[[CurrentCourse.slug]]</span>
                                        <p class="desc desc-default" id="snippet_meta">[[CurrentCourse.meta_description]]</p>
                                    </div>
                                </section>
                            </div>
                            <div class="form-group uk-width-1-1">
                                <label>Title</label>
                                <div class="uk-form-controls">
                                    <input type="text" ng-model="CurrentCourse.meta_title" ng-change="verificTitle()" class="form-control uk-width-1-1" placeholder="Введите title">
                                    <div class="uk-progress uk-progress-mini" ng-class="{'uk-progress-warning':Seo.title.status==0, 'uk-progress-success':Seo.title.status==1,'uk-progress-danger':Seo.title.status==2}">
                                        <div class="uk-progress-bar" style="width: [[Seo.title.count]]%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group uk-width-1-1">
                                <label>Описание</label>
                                <div class="uk-form-controls">
                                    <textarea ng-model="CurrentCourse.meta_description"  ng-change="verificDescription()" class="form-control uk-width-1-1" placeholder="Введите описание"></textarea>
                                    <div class="uk-progress uk-progress-mini" ng-class="{'uk-progress-warning':Seo.description.status==0, 'uk-progress-success':Seo.description.status==1,'uk-progress-danger':Seo.description.status==2}">
                                        <div class="uk-progress-bar" style="width: [[Seo.description.count]]%;"></div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group uk-width-1-1">
                                <label>Произвольные</label>
                                <div class="uk-form-controls">
                                    <textarea ng-model="MetaData.meta_custom" class="form-control" placeholder="Введите произвольные мета данные"></textarea>
                                </div>
                            </div>--}}
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
                        <button class="uk-button uk-button-success" ng-click="saveCoursePost();" >Сохранить</button>
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
        @include('admin.partials.course.post.edit_modal')
        @include('admin.partials.course.post.remove_modal')
    </section>

@endsection
