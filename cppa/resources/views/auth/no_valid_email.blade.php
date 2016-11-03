@extends('layouts.app')

@section('content')
<div class="uk-container uk-container-center">
    <div class="uk-block uk-block-muted uk-block-secondary uk-contrast uk-block-large uk-border-rounded uk-margin-top uk-margin-bottom">

        <div class="uk-container">

            <h3 class="uk-text-center uk-article-title" >{{$title}}</h3>

            <div class="uk-grid uk-grid-match" data-uk-grid-margin="">
                <div class="uk-width-medium-1-2 uk-row-first">
                    <div class="uk-panel uk-text-center">
                        <p>{{$message1}}</p>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-panel uk-text-center">
                        <p>{{$message2}}</p>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
@endsection
