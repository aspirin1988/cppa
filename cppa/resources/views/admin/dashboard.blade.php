<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CPPA</title>
    <link rel="stylesheet" href="public/css/uikit.min.css">
    <link rel="stylesheet" href="public/css/components/search.min.css">
    <link rel="stylesheet" href="public/css/components/accordion.min.css">
    <link rel="stylesheet" href="public/css/app.css">
</head>

<body>
<header>
    <h1>Admin CPPA</h1>
</header>
<main>
    @yield('content')
</main>

<aside class="uk-hidden-small">
    <div class="avatar-box">
        <div class="avatar-img"></div>
        <div class="avatar-caption">
            <h3>{{Auth::user()->name}}</h3>
            <h4>{{Auth::user()->user_group}}</h4>
            <h5><span class="online-status"></span>online</h5>
        </div>
    </div>
    <form class="uk-search" data-uk-search>
        <input class="uk-search-field" type="search" placeholder="Поиск...">
    </form>
    <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title">Меню</h3>
        <ul class="uk-nav uk-nav-side  uk-nav-parent-icon" data-uk-nav="{multiple:true}">
            <li><a href="#"><i class="uk-icon uk-icon-user"></i>Профиль</a></li>
            <li class="uk-parent">
                <a href="#"><i class="uk-icon uk-icon-book"></i>Страницы</a>
                <ul class="uk-nav-sub">
                    <li><a href="#"><i class="uk-icon uk-icon-list"></i>Список страниц</a></li>
                    <li><a href="#"><i class="uk-icon uk-icon-plus"></i>Добавить</a></li>
                </ul>
            </li>
            <li class="uk-parent">
                <a href="#"><i class="uk-icon uk-icon-pencil-square-o"></i>Посты</a>
                <ul class="uk-nav-sub">
                    <li><a href="#"><i class="uk-icon uk-icon-list"></i>Список постов</a></li>
                    <li><a href="#"><i class="uk-icon uk-icon-plus"></i>Добавить</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="uk-icon uk-icon-image "></i>Галерея</a></li>
            <li><a href="#"><i class="uk-icon uk-icon-users "></i>Пользователи</a></li>
            <li><a href="#"><i class="uk-icon uk-icon-cog "></i>Настройки</a></li>
        </ul>
    </div>
</aside>


<footer>

</footer>
</body>

<script src="public/js/jquery-3.1.0.min.js"></script>
<script src="public/js/uikit.min.js"></script>
<script src="public/js/components/search.min.js"></script>
<script src="public/js/components/accordion.min.js"></script>
<script src="public/js/components/grid.min.js"></script>
</html>