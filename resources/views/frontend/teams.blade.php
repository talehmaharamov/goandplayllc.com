@extends('master.frontend')
<style>
    body {
        background-color: #2890c8;
    }
</style>
@section('content')
    <section id="SliderSection">
        <div class="container-fluid">
            <div class="row my-5">
                <div class="title" >
                    <h1>@lang('backend.team')</h1>
                    <div class="line"></div>
                </div>
            </div>
            <div class="uk-margin"></div>
            <div class="uk-section">
                <div class="owl-carousel owl-theme">
                    @foreach($pageElements as $pageElement)
                        <div class="item">
                            <div class="uk-card uk-card-primary uk-card-hover uk-card-body uk-light"
                                 style="background-image: url({{ asset($pageElement->photo) }})">
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
    </section>


    <section id="TextContent">
        <div class="container">
            <div class="row my-3">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                    <div class="titleInfo">
                        <h1>{{ (app()->getLocale() == 'en') ? $teamsDetails->title_en : $teamsDetails->title_az }}</h1>
                    </div>
                    <div class="descInfo">
                        <p>{{ (app()->getLocale() == 'en') ? $teamsDetails->description_en : $teamsDetails->description_az}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="infoCol">
                        <h2>Team Management</h2>
                        <ul>
                            @foreach($teamUsers as $user)
                            <li>{{ (app()->getLocale('applocale')=='en' ? $user->name_en : $user->name_az) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
