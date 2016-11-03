<div id="edit-modal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <h1>Редактирование пользователя</h1>
        <div style="background: #fff;">
            <div class="uk-form">
                [[CurrentUser]]
                <fieldset data-uk-margin>
                    <legend> Добавление нового уровня доступа</legend>
                    <div class="uk-grid">
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Название</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="CurrentUser.name" placeholder="Название">
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Логин</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="CurrentUser.email" placeholder="Логин">
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Уровень доступа</label>
                            <div class="uk-form-controls">
                                <select ng-model="CurrentUser.user_group">
                                    <option ng-selected="CurrentUser.user_group==val.id" ng-click="console.log(val.id)"  ng-repeat="(key, val) in UserGroups" value="[[ val.id ]]">[[ val.name ]]
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="uk-width-1-1">
                            <br>
                            <br>
                            <div class="uk-text-center uk-form-controls">
                                <button class="uk-button uk-button-success" ng-click="saveUser()" >
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
