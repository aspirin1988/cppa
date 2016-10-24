<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 07.10.16
 * Time: 16:28
 */
?>

<aside class="uk-hidden-small">
    <div class="avatar-box">
        <div class="avatar-img"></div>
            <div class="avatar-caption">
                <h3>{{Auth::user()->name}}</h3>
                <h4>{{Auth::user()->getUserGroup()->name}}</h4>
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
                <li><a href="/admin/pages"><i class="uk-icon uk-icon-list"></i>Список страниц</a></li>
                <li><a href="/admin/pages/new"><i class="uk-icon uk-icon-plus"></i>Добавить</a></li>
            </ul>
        </li>
        <li class="uk-parent">
            <a href="#"><i class="uk-icon uk-icon-pencil-square-o"></i>Посты</a>
            <ul class="uk-nav-sub">
                <li><a href="#"><i class="uk-icon uk-icon-list"></i>Список постов</a></li>
                <li><a href="#"><i class="uk-icon uk-icon-plus"></i>Добавить</a></li>
            </ul>
        </li>
        <li><a href="/admin/gallery/img/"><i class="uk-icon uk-icon-image "></i>Галерея</a></li>
        <li><a href="/admin/users/"><i class="uk-icon uk-icon-users "></i>Пользователи</a></li>
        <li class="uk-parent">
            <a href="#"><i class="uk-icon uk-icon-cog "></i>Настройки</a>
            <ul class="uk-nav-sub">
                <li><a href="#"><i class="uk-icon uk-icon-list"></i>Сайта</a></li>
                <li><a href="/admin/user_groups/"><i class="uk-icon uk-icon-list"></i>Уровней доступа</a></li>
            </ul>
        </li>
    </ul>
</div>
</aside>