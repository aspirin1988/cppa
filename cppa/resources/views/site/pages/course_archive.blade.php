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

            <div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 archive">

                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-text-center">
                        <h1 class="uk-article-title" >Список курсов</h1>
                    </div>
                    @foreach(\App\Course::get() as $key=>$item)
                    <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 content ">
                        <a href=""><h3 class="uk-comment-title">{{$item->title}}</h3></a>
                        <div class="uk-grid">
                            @if($item->thumbnail)
                            <div class="uk-width-1-3">
                                <img class="preview"
                                     src="{{$item->thumbnail}}" alt="">
                                <time>20.10.2016</time>
                            </div>
                            @endif
                            <div class="uk-width-2-3">
                                <article>
                                    <?=$item->content?>
                                </article>
                            </div>
                        </div>
                        <a href="#register-modal" data-uk-modal data-reg-name="Lorem ipsum."
                           class="uk-button uk-button-primary">Подробнее</a>
                    </div>
                    @endforeach

                    {{--<div class="uk-width-1-1 pagination">--}}
                        {{--<ul class="uk-pagination">--}}
                            {{--<li><a href="">1</a></li>--}}
                            {{--<li class="uk-active"><span>2</span></li>--}}
                            {{--<li ><span>3</span></li>--}}
                            {{--<li><span>4</span></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                </div>
            </div>
        </div>
    </div>
    @include('site.modal.registr')
@endsection
