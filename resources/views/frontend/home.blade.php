@extends('master.frontend')
@section('content')

    <section id="Pages">
        <div class="">
            <div class="row ">
                @foreach($pages as $page)
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <a href="{{ route('frontend.toPage',$page->slug) }}">
                        <div class="cardPages">
                            <img src="{{ asset($page->photo) }}" alt="">
                            <div class="overlayy"></div>
                            <div class="textCard">
                                <h2>{{ (Session()->get('applocale') == 'en' ? $page->name_en : $page->name_az) }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <a href="team.html">
                        <div class="cardPages">
                            <img src="{{asset('frontend/img/team.jpg')}}" alt="">
                            <div class="overlayy"></div>
                            <div class="textCard">
                                <h2>TEAM</h2>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="Blog">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="title" >
                        <h1>Blog</h1>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="cardBlog" data-aos="flip-left">
                        <div class="headerCard">
                            <img src="{{ asset($blog->photo) }}" alt="">
                        </div>
                        <div class="bodyCard">
                            <h3>{{ app()->getLocale()== 'en' ? $blog->title_en : $blog->title_az }}</h3>
                            <p>{{ app()->getLocale()== 'en' ? $blog->description_en : $blog->description_az }}</p>
                        </div>
                        <hr>
                        <div class="footerCard">
                            <a target="_blank" href="{{ $blog->link }}">Youtube @lang('frontend.links') : <i class="fab fa-youtube"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
