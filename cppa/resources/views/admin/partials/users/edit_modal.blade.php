<div id="edit-modal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <h1>Редактирование пользователя</h1>
        <div style="background: #fff;">
            <div class="uk-form">
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
                        <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-margin-top">
                            <label class="uk-form-label">Добавить курс</label>[[AddNewCourse]]
                            <div class="uk-form-controls">
                                <select ng-model="AddNewCourse">
                                    <option value="" >Выберите курс для добавления</option>
                                    <option ng-repeat="(key, val) in CourseList" value="[[ val.id ]]">
                                        [[ val.title ]]
                                    </option>
                                </select>
                                <button title="Добавить курс пользователю" class="uk-button uk-button-success" ng-click="addUserCourse()">
                                    <i class="uk-icon-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-margin-top">
                            <label class="uk-form-label">Курсы</label>
                            <div class="uk-form-controls">
                                <dl ng-repeat="(key,val) in CurrentUser.course_data" class="uk-description-list-line">
                                    <dt>[[val.data_course.title]]</dt>
                                    <dd ng-bind-html="val.data_course.content"></dd>
                                    <dd class="uk-display-block uk-text-right" >Дата окончания: [[val.date_end]] </dd>
                                    <dt></dt>
                                </dl>
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
