<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <meta name="description" content="This main page">

    <link rel="stylesheet" href="/public/css/uikit.gradient.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="stylesheet" href="/public/css/components/slider.min.css">
    <link rel="stylesheet" href="/public/css/components/slideshow.min.css">
    <link rel="stylesheet" href="/public/css/components/slidenav.min.css">
    <link rel="stylesheet" href="/public/css/components/dotnav.min.css">
    <link rel="stylesheet" href="/public/css/components/slidenav.almost-flat.min.css">
    <link rel="stylesheet" href="/public/css/components/search.min.css">
    <link rel="stylesheet" href="/public/css/components/form-select.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<header>
    <div class="_header">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class=" uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3">
                    <img src="/public/img/cppa_logo_nazvanie_slogan_horizontal_white.png" alt="" class="_logo">
                </div>
                <div class=" uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3 uk-hidden-small">
                    <div class="time-and-date">
                        <p id="date">29 апреля 2016</p>
                        <p id="time" class="time">10:32:40</p>
                    </div>
                </div>
                <div class=" uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3">
                    <div class="_contacts">
                        <ul class="uk-list">
                            <li><a href="tel:+77777777777">+7 777 777 77 77</a></li>
                            <li><a href="tel:+77777777777">+7 777 777 77 77</a></li>
                            <li><a href="mailto:test@mail.ru">test@mail.ru</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-container uk-container-center main-menu uk-hidden-small">
        <div class="uk-grid">
            <div class="uk-width-medium-7-10 uk-width-large-5-10">
                <nav class="uk-navbar menu">
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href="">Главная</a></li>
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
                        <li><a href="">Войти</a></li>
                        <li><a href="">Регистрация</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="uk-container uk-container-center uk-text-center _search">

    </div>
</header>
<nav class="tyb-main-nav uk-navbar nav-bar uk-visible-small" style="margin: 0;">
    <div class="uk-container uk-container-center">
        <a id="menu-nav" href="#myid" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
    </div>
</nav>
<div id="myid" class="uk-offcanvas">
    <div class="uk-offcanvas-bar mobile-menu">
        <ul class="uk-nav">
            <li><a href="">Войти</a></li>
            <li><a href="">Регистрация</a></li>
        </ul>
        <hr>
        <ul class="uk-nav">
            <li class="uk-active"><a href="">Главная</a></li>
            <li><a href="">О нас</a></li>
            <li><a href="">О нас</a></li>
            <li><a href="">О нас</a></li>
            <li><a href="">О нас</a></li>
            <li class="uk-parent"><a href="">Статьи</a>

            </li>
        </ul>
        <hr>
        <address>
            <ul class="uk-list">
                <li><a href="tel:+77777777777">+7 777 777 77 77</a></li>
                <li><a href="tel:+77777777777">+7 777 777 77 77</a></li>
                <li><a href="mailto:test@mail.ru">test@mail.ru</a></li>
            </ul>
        </address>
    </div>
</div>
<body>
<main>
    @yield('content')



</main>
<footer>
    <div class="_footer">
        <div class="uk-container uk-container-center">
            <div class="uk-grid footer-menu">
                <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3">
                    <h3>Мы в соцсетях</h3>
                    <ul class="uk-list uk-flex uk-flex-space-around social">
                        <li><a href=""><i class="uk-icon-vk"></i></a></li>
                        <li><a href=""><i class="uk-icon-facebook"></i></a></li>
                        <li><a href=""><i class="uk-icon-instagram"></i></a></li>
                        <li><a href=""><i class="uk-icon-pinterest"></i></a></li>
                    </ul>
                </div>
                <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3 uk-hidden-small uk-text-center">
                    <h3>Контактная информация</h3>
                    <address>Казыбек би, 65 <br>&nbsp; 510 офис; <br>&nbsp;&nbsp; 5 этаж</address>
                    <ul class="uk-list">
                        <li><a href="tel:+77777777777">+7 777 777 77 77</a></li>
                        <li><a href="tel:+77777777777">+7 777 777 77 77</a></li>
                        <li><a href="mailto:test@mail.ru">test@mail.ru</a></li>
                    </ul>

                </div>
                <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3">
                    <script type="text/javascript" charset="utf-8" async
                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=pYqMMq4kj2yDVyWbEg3HwprG-zi6APs1&amp;width=100%&amp;height=240&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

<script src="public/js/jquery-3.1.0.min.js" ></script>
<script src="public/js/uikit.min.js" ></script>
<script src="public/js/components/slider.min.js" ></script>
<script src="public/js/components/slideshow.min.js" ></script>
<script src="public/js/components/slideset.js" ></script>
<script src="public/js/components/sticky.js" ></script>
<script src="public/js/components/form-select.js" ></script>
<script src="public/js/validation.js" ></script>

<script>
    setInterval(function () {
        var echo = document.getElementById('time');
        var now = new Date();
        var time='';
        time=now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
        echo.innerHTML=time;
    },1000);

    setInterval(function () {
        var echo = document.getElementById('date');
        var now = new Date();
        var date='';
        var day= now.getDate();
        var mon= now.getMonth();
        if (mon<10){
            mon='0'+mon;
        }
        date=+now.getDate()+'.'+mon+'.'+now.getFullYear();
        echo.innerHTML=date;
    },1000);

</script>

<script>
    $(document).ready(function () {
        var reg_modal = $('#register-modal');
        $('[data-uk-modal]').click(function () {
            reg_modal.find('#_title').val($(this).data('reg-name'));
            console.log($(this).data('reg-name'));
        });

        var el = document.querySelector('input[type="tel"]');
        console.log();
        VMasker(el).maskPattern("+9(999) 999-99-99");
    });
</script>
</html>