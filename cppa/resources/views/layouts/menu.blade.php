<div class="uk-container uk-container-center main-menu uk-hidden-small">
    <div class="uk-grid">
        <div class="uk-width-medium-7-10 uk-width-large-5-10">
            <nav class="uk-navbar menu">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="/">Главная</a></li>
                    <li><a href="">О нас</a></li>
                    <li><a href="">О нас</a></li>
                    <li><a href="">О нас</a></li>
                    <li><a href="">О нас</a></li>
                    <li class="uk-parent"><a href="">Статьи</a>

                    </li>
                </ul>
            </nav>
        </div>
        <div class="uk-width-3-10 uk-visible-large">
            <div class="uk-text-center _search">
                <form class="uk-search" data-uk-search>
                    <input class="uk-search-field" type="search" name="s" placeholder="">
                    <div class=" uk-button uk-form-select" data-uk-form-select>
                        <span></span>
                        <select name="s_to">
                            <option value="site">По сайту</option>
                            <option value="page">На странице</option>
                        </select>
                    </div>
                </form>
            </div>

        </div>
        <div class=" uk-width-medium-3-10 uk-width-large-2-10">
            <nav class="uk-navbar login">
                <ul class="uk-navbar-nav">
                    @if(isset(Auth::user()->access_level))
                    @if(Auth::user()->access_level==900)
                            <li><a href="/admin">Войти</a></li>
                        @else
                            <li><a href="/profile">Войти</a></li>
                        @endif
                    @endif
                    @if(Auth::check())
                            <li><a href="/logout">Выход</a></li>
                        @else
                            <li><a href="/login">Войти</a></li>
                            <li><a href="/register">Регистрация</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
