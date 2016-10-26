<div id="edit-modal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <h1>Edit access_level</h1>
        <div style="background: #fff;">
            <div class="uk-form">
                <fieldset data-uk-margin>
                    <legend> Добавление нового уровня доступа</legend>
                    <div class="uk-grid">
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Название</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="CurrentGroup.name" placeholder="Название">
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Ярлык</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="CurrentGroup.slug" placeholder="Ярлык">
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Описание</label>
                            <div class="uk-form-controls">
                                <textarea ng-model="CurrentGroup.description" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Уровень доступа</label>
                            <div class="uk-form-controls">
                                <input ng-model="CurrentGroup.access_level">
                            </div>
                            <div class="uk-form-controls">
                                <label><input type="checkbox" ng-model="CurrentGroup.access_edit">Редактирование</label>
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <br>
                            <br>
                            <div class="uk-text-center uk-form-controls">
                                <button class="uk-button uk-button-success" ng-click="saveUserGroup()" >
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
