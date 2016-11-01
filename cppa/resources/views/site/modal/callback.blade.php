<div class="call-back-view" >
    <a href="#call_back_modal" data-uk-modal class="call-back-button">
        <i class="uk-icon-phone "></i>
    </a>
</div>
<div id="call_back_modal" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-modal-header uk-text-center">
                <h2>Заказать звонок</h2>
            </div>
            <form class="uk-form">
                    <div class="uk-form-row">
                        <input type="hidden" name="_title" value="Обратный звонок" disabled class="uk-form-width-large">
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="_title">Ф.И.О</label>
                        <div class="uk-form-controls">
                            <input type="text" name="full_name" placeholder="Ф.И.О" required class="uk-form-width-large">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="_title">Телефон</label>
                        <div class="uk-form-controls">
                            <input type="tel" name="phone" placeholder="Телефон" required class="uk-form-width-large">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="_title">Email</label>
                        <div class="uk-form-controls">
                            <input type="email" name="email" placeholder="Email" required class="uk-form-width-large">
                        </div>
                    </div>
                <div class="uk-modal-footer uk-text-center">
                    <button class="uk-button uk-button-success">Заказать</button>
                </div>
            </form>
        </div>
    </div>
