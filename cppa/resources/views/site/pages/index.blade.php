@extends('layouts.app')

@section('content')
    <div class="uk-container uk-container-center">
        <div class="uk-grid content-box">
            <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 content slider">
                <div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
                    <ul class="uk-slideshow">
                        <li><img src="/img/11.jpg"></li>
                        <li><img src="/img/29_720-170_d.jpg"></li>
                        <li><img src="/img/11.jpg"></li>
                    </ul>
                    <a href="" class="uk-hidden-small uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                    <a href="" class="uk-hidden-small uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                    <ul class="uk-hidden-small uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                        <li data-uk-slideshow-item="0"><a href=""></a></li>
                        <li data-uk-slideshow-item="1"><a href=""></a></li>
                        <li data-uk-slideshow-item="2"><a href=""></a></li>
                    </ul>
                </div>
            </div>

            <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 content about">
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <a href=""><h2 class="uk-article-title">Краткая информация по сертификации профбухгалтер</h2></a>
                    </div>

                    <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3">
                        <img src="/img/84770f_96271fd17a3a6aad442e6b596102f556.jpg" alt="">
                    </div>
                    <div class="uk-width-small-1-1 uk-width-medium-2-3 uk-width-large-2-3">
                        <article>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut incidunt laboriosam rerum similique, vel veritatis vero. Ab at blanditiis delectus facere, nisi quibusdam recusandae ullam? Accusantium amet assumenda at aut autem consectetur consequatur corporis, cumque cupiditate delectus deserunt dicta dignissimos eligendi eos error eveniet hic ipsa itaque minima natus non nostrum officiis praesentium qui reiciendis temporibus unde vero? Impedit mollitia saepe voluptas! Ab adipisci aperiam asperiores assumenda atque beatae culpa cupiditate deleniti doloremque est facere harum ipsa, ipsam laudantium minima nobis nulla, placeat porro praesentium quos ullam vel voluptatem? A ad deleniti doloremque eaque et harum magnam nihil quia saepe.
                        </article>
                    </div>
                </div>
            </div>


            <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 content">
                <a href="">
                    <h2 class="uk-panel-title">Предстоящие семинары</h2>
                    <i class="uk-icon-list uk-fl"></i>
                </a>
                <ul class="uk-list">
                    <li>
                        <a href=""><h3 class="uk-comment-title">Lorem ipsum.</h3></a>
                        <div class="uk-grid">
                            <div class="uk-width-1-3">
                                <img class="preview" src="img/84770f_65e6e6b529ec9ca85ed85f4ef29983cc.jpg" alt="">
                                <time>20.10.2016</time>
                            </div>
                            <div class="uk-width-2-3">
                                <article>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi assumenda blanditiis cumque delectus facere odio quibusdam ratione sit voluptatum.
                                </article>
                            </div>
                        </div>
                        <a href="#register-modal" data-uk-modal data-reg-name="Lorem ipsum." class="uk-button uk-button-primary">Записаться</a>
                    </li>
                    <li>
                        <a href=""><h3 class="uk-comment-title">Lorem ipsum.</h3></a>
                        <div class="uk-grid">
                            <div class="uk-width-1-3">
                                <img class="preview" src="/img/84770f_65e6e6b529ec9ca85ed85f4ef29983cc.jpg" alt="">
                                <time>20.10.2016</time>
                            </div>
                            <div class="uk-width-2-3">
                                <article>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi assumenda blanditiis cumque delectus facere odio quibusdam ratione sit voluptatum.
                                </article>
                            </div>
                        </div>
                        <a href="#register-modal" data-uk-modal class="uk-button uk-button-primary">Записаться</a>
                    </li>
                </ul>
            </div>

            <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 content">
                <a href="">
                    <h2 class="uk-panel-title">Предстоящие вебинары</h2>
                    <i class="uk-icon-list uk-fl"></i>
                </a>
                <ul class="uk-list">
                    <li>
                        <a href=""><h3 class="uk-comment-title">Lorem ipsum.</h3></a>
                        <div class="uk-grid">
                            <div class="uk-width-1-3">
                                <img class="preview" src="/img/84770f_65e6e6b529ec9ca85ed85f4ef29983cc.jpg" alt="">
                                <time>20.10.2016</time>
                            </div>
                            <div class="uk-width-2-3">
                                <article>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi assumenda blanditiis cumque delectus facere odio quibusdam ratione sit voluptatum.
                                </article>
                            </div>
                        </div>
                        <a href="#register-modal" data-uk-modal class="uk-button uk-button-primary">Записаться</a>
                    </li>
                    <li>
                        <a href=""><h3 class="uk-comment-title">Lorem ipsum.</h3></a>
                        <div class="uk-grid">
                            <div class="uk-width-1-3">
                                <img class="preview" src="/img/84770f_65e6e6b529ec9ca85ed85f4ef29983cc.jpg" alt="">
                                <time>20.10.2016</time>
                            </div>
                            <div class="uk-width-2-3">
                                <article>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi assumenda blanditiis cumque delectus facere odio quibusdam ratione sit voluptatum.
                                </article>
                            </div>
                        </div>
                        <a href="#register-modal" data-uk-modal class="uk-button uk-button-primary">Записаться</a>
                    </li>
                </ul>
            </div>

            <div class="uk-width-1-1">
                <div class="uk-grid">
                    <div class="uk-width-1-2 uk-margin">
                        <a href=""><h2 class="uk-article-title">Lorem ipsum dolor.</h2></a>

                        <button class="uk-button uk-button-primary">Lorem ipsum.</button>
                        <button class="uk-button uk-button-primary">Lorem ipsum.</button>
                        <br>
                        <button class="uk-button uk-button-primary">Lorem ipsum.</button>
                        <button class="uk-button uk-button-primary">Lorem ipsum.</button>
                    </div>
                    <div class="uk-width-1-2 uk-margin">
                        <a href=""><h2 class="uk-article-title">Новости</h2></a>
                        <ul class="uk-list">
                            <li>
                                <a href=""><h3 class="uk-comment-title">Lorem ipsum.</h3></a>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <article>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi assumenda blanditiis cumque delectus facere odio quibusdam ratione sit voluptatum.
                                        </article>
                                    </div>
                                </div>
                                <a href="#register-modal" data-uk-modal class="uk-button uk-button-primary uk-align-right">Подробнее</a>
                            </li>
                            <li>
                                <a href=""><h3 class="uk-comment-title">Lorem ipsum.</h3></a>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <article>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi assumenda blanditiis cumque delectus facere odio quibusdam ratione sit voluptatum.
                                        </article>
                                    </div>
                                </div>
                                <a href="#register-modal" data-uk-modal class="uk-button uk-button-primary uk-align-right">Подробнее</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            {{--<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 calendar">--}}
                {{--<div class="nav" >--}}
                    {{--<i class="uk-icon-arrow-circle-o-left"></i>--}}
                    {{--<div class="uk-form-select month" data-uk-form-select>--}}
                        {{--<span></span>--}}
                        {{--<select>--}}
                            {{--<option value="">Январь</option>--}}
                            {{--<option value="">Февраль</option>--}}
                            {{--<option value="">Март</option>--}}
                            {{--<option value="">Апрель</option>--}}
                            {{--<option value="">Май</option>--}}
                            {{--<option value="">Июнь</option>--}}
                            {{--<option value="">Июль</option>--}}
                            {{--<option value="">Август</option>--}}
                            {{--<option value="">Сентябрь</option>--}}
                            {{--<option value="">Октябрь</option>--}}
                            {{--<option value="">Ноябрь</option>--}}
                            {{--<option value="">Декабрь</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<i class="uk-icon-arrow-circle-o-right"></i>--}}
                {{--</div>--}}
                {{--<table border=0 class="day-week">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>П</th>--}}
                        {{--<th>Вт</th>--}}
                        {{--<th>С</th>--}}
                        {{--<th>Ч</th>--}}
                        {{--<th>П</th>--}}
                        {{--<th>Сб</th>--}}
                        {{--<th>Вс</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<td><a data-events="{0:{}">1</a></td>--}}
                        {{--<td>2</td>--}}
                        {{--<td>3</td>--}}
                        {{--<td>4</td>--}}
                        {{--<td>5</td>--}}
                        {{--<td>6</td>--}}
                        {{--<td>7</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>8</td>--}}
                        {{--<td>9</td>--}}
                        {{--<td>10</td>--}}
                        {{--<td>11</td>--}}
                        {{--<td>12</td>--}}
                        {{--<td>13</td>--}}
                        {{--<td>14</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>15</td>--}}
                        {{--<td>16</td>--}}
                        {{--<td>17</td>--}}
                        {{--<td>18</td>--}}
                        {{--<td>19</td>--}}
                        {{--<td>20</td>--}}
                        {{--<td>21</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>22</td>--}}
                        {{--<td>23</td>--}}
                        {{--<td>24</td>--}}
                        {{--<td>25</td>--}}
                        {{--<td>26</td>--}}
                        {{--<td>27</td>--}}
                        {{--<td>28</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>29</td>--}}
                        {{--<td>30</td>--}}
                        {{--<td>31</td>--}}
                        {{--<td>1</td>--}}
                        {{--<td>2</td>--}}
                        {{--<td>3</td>--}}
                        {{--<td>4</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}

            {{--<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 rates">--}}
                {{--<h3 class="uk-article-title">Ставки</h3>--}}
                {{--<div class="uk-form-select month" data-uk-form-select>--}}
                    {{--<span></span>--}}
                    {{--<select>--}}
                        {{--<option value="">Январь</option>--}}
                        {{--<option value="">Февраль</option>--}}
                        {{--<option value="">Март</option>--}}
                        {{--<option value="">Апрель</option>--}}
                        {{--<option value="">Май</option>--}}
                        {{--<option value="">Июнь</option>--}}
                        {{--<option value="">Июль</option>--}}
                        {{--<option value="">Август</option>--}}
                        {{--<option value="">Сентябрь</option>--}}
                        {{--<option value="">Октябрь</option>--}}
                        {{--<option value="">Ноябрь</option>--}}
                        {{--<option value="">Декабрь</option>--}}
                    {{--</select>--}}
                {{--</div>--}}

                {{--<div class="uk-overflow-container">--}}
                    {{--<table class="uk-table uk-table-striped uk-table-hover">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Название</th>--}}
                            {{--<th>Заначение</th>--}}
                            {{--<th>Копировать</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td>МПЗ</td>--}}
                            {{--<td>22 859</td>--}}
                            {{--<td>--}}
                                {{--<button class="uk-button">--}}
                                    {{--<i class="uk-icon-copy"></i>--}}
                                {{--</button>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>МПЗ</td>--}}
                            {{--<td>22 859</td>--}}
                            {{--<td>--}}
                                {{--<button class="uk-button">--}}
                                    {{--<i class="uk-icon-copy"></i>--}}
                                {{--</button>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>                </div>--}}




            <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 content about">
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <a href=""><h2 class="uk-article-title">О нас</h2></a>
                    </div>

                    <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3">
                        <img src="/img/84770f_96271fd17a3a6aad442e6b596102f556.jpg" alt="">
                    </div>
                    <div class="uk-width-small-1-1 uk-width-medium-2-3 uk-width-large-2-3">
                        <article>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut incidunt laboriosam rerum similique, vel veritatis vero. Ab at blanditiis delectus facere, nisi quibusdam recusandae ullam? Accusantium amet assumenda at aut autem consectetur consequatur corporis, cumque cupiditate delectus deserunt dicta dignissimos eligendi eos error eveniet hic ipsa itaque minima natus non nostrum officiis praesentium qui reiciendis temporibus unde vero? Impedit mollitia saepe voluptas! Ab adipisci aperiam asperiores assumenda atque beatae culpa cupiditate deleniti doloremque est facere harum ipsa, ipsam laudantium minima nobis nulla, placeat porro praesentium quos ullam vel voluptatem? A ad deleniti doloremque eaque et harum magnam nihil quia saepe.
                        </article>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('site.modal.registr')
@endsection
