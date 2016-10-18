@extends('admin.dashboard')

@section('content')
    <section ng-controller="pageCTRL" ng-init="PageId={{$id}};" >
        <h2>Редактирование страницы</h2>
        <div class="uk-grid">
            <div class=" uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10 uk-visible-small uk-accordion" data-uk-accordion="{collapse: true, showfirst: true}">
                <h3 class="uk-accordion-title">
                    Действия
                    <i class="uk-icon-plus-circle uk-text-success"></i>
                </h3>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-success" ng-click="savePage(1);" >Опубликовать</button>
                    <button class="uk-button uk-button-primary" ng-click="savePage(0);">Черновик</button>
                </div>
            </div>

            <div class="uk-form uk-width-small-1-1 uk-width-medium-7-10 uk-width-large-7-10">
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Название</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="newGroup.name" placeholder="Название" class="uk-width-1-1">
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Ярлык</label>
                    <div class="uk-form-controls">
                        <input type="text" ng-model="newGroup.slug" placeholder="Ярлык" class="uk-width-1-1">
                    </div>
                </div>
                [[page.content]]
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label">Контент</label>
                    <div class="uk-form-controls">
                            <textarea ui-tinymce="tinymceOptions" ng-model="page.content"></textarea>
                    </div>
                </div>
                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Галерея страницы
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus dicta doloremque earum iste nam nostrum, quod. Ad adipisci aliquam consequatur, ducimus, et iure mollitia nostrum quam quas sint soluta!
                    </div>
                </div>
                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Видео страницы
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus dicta doloremque earum iste nam nostrum, quod. Ad adipisci aliquam consequatur, ducimus, et iure mollitia nostrum quam quas sint soluta!
                    </div>
                </div>
                <div class="uk-form uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-accordion uk-margin-top" data-uk-accordion="{collapse: true, showfirst: true}">
                    <h3 class="uk-accordion-title">
                        Редактор метаданных страницы
                        <i class="uk-icon-plus-circle uk-text-success"></i>
                    </h3>
                    <div class="uk-accordion-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur delectus dicta doloremque earum iste nam nostrum, quod. Ad adipisci aliquam consequatur, ducimus, et iure mollitia nostrum quam quas sint soluta!
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
