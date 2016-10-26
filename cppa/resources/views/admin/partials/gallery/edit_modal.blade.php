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
                            <label class="uk-form-label">Title</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="CurrentImage.title" placeholder="Title">
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Alt</label>
                            <div class="uk-form-controls">
                                <input type="text" ng-model="CurrentImage.alt" placeholder="Alt">
                            </div>
                        </div>
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                            <label class="uk-form-label">Описание</label>
                            <div class="uk-form-controls">
                                <textarea ng-model="CurrentImage.description" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <br>
                            <br>
                            <div class="uk-text-center uk-form-controls">
                                <button class="uk-button uk-button-success" ng-click="saveImage()" >
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