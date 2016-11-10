@extends('admin.dashboard')

@section('content')
    <section ng-controller="courseCTRL" ng-init="CourseID={{$id}};" class="test-edit" >
        <h2>Редактирование страницы</h2>
        <div class="uk-grid">
            <div class=" uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10 uk-visible-small uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                <h3 class="uk-accordion-title">
                    Действия
                    <i class="uk-icon-plus-circle uk-text-success"></i>
                </h3>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-success" ng-click="saveCourse();" >Сохранить</button>
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
                    <label class="uk-form-label">Пордолжительность в днях</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="CurrentCourse.duration" placeholder="Пордолжительность">
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
                        Редактор занятий
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        <div id="testEdit" class="wrapper">
                            <div class='uk-grid'>
                                <div class="uk-width-1-2 test">
                                    <h3>Курс</h3>
                                    <div id="containerTest" class="containerVertical">
                                        <div class="" ng-repeat="(key,item) in CurrentPost">[[item.title]]
                                            <a ng-click="removeTQ(item,key)" class="uk-button uk-button-danger uk-button-mini uk-float-right" title="Удалить вопрос">
                                                <i class="uk-icon-remove"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-1-2 question">
                                    <div class="uk-form">
                                        <h3>Занятия
                                        </h3>
                                    </div>
                                    <div id="containerQuesctions" class="uk-width-1-2 containerVertical">
                                        <div ng-repeat="item in CurrentLesson">[[item.title]]</div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <button class="uk-button uk-button-success" ng-click="saveCourse();" >Сохранить</button>
                    </div>
                </div>
                <br>
                <div class="uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Миниатюра
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        <a ng-click="OpenModalThumb()">
                            <img src="[[Myconfig.NoImage]]" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.course.thumbnail_select')
    </section>
@endsection
