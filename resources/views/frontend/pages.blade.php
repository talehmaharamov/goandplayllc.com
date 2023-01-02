@extends('master.frontend')
@section('styles')
    <link rel="stylesheet" href="{{asset('frontend/pages.css')}}">
@endsection
@section('content')

    <section id="SliderSection">
        <div class="container-fluid">
            <div class="row my-5">
                <div class="title" >
                    <h1>{{ (app()->getLocale() == 'en' ? $idPage->name_en : $idPage->name_az) }}</h1>
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <div class="uk-margin"></div>
                <div class="uk-section">
                    <div class="owl-carousel owl-theme">
                        @foreach($pageElements as $pageElement)
                            <div class="item">
                                <div class="uk-card uk-card-primary uk-card-hover uk-card-body uk-light" aria-label="{{ (Session()->get('applocale')=='en' ? $pageElement->title_en : $pageElement->title_az) }}"
                                     style="">
                                    <div class="card-titl">
                                        <h3>{{ (Session()->get('applocale')=='en' ? $pageElement->title_en : $pageElement->title_az) }}</h3>
                                        <p>{{ (Session()->get('applocale')=='en' ? $pageElement->description_en : $pageElement->description_az) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

