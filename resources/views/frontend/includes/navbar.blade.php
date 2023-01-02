<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('frontend.index') }}"><img src="{{asset('frontend/img/goandplaylogo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach($pagess as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.toPage',$page->slug) }}">{{ (Session()->get('applocale')=='en' ? $page->name_en : $page->name_az) }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.teamsForm') }}">@lang('backend.team')</a>
                </li>
            </ul>
            <div class="rightbox">
                <a class="nav-link" href="{{ route('frontend.contactForm') }}"> @lang('frontend.contact') <i class="fal fa-phone"></i></a>
                <button class="langBtn" type="button" data-bs-toggle="modal" data-bs-target="#languageModal">
                    @if(app()->getLocale() == 'en')
                        <img src="{{asset('frontend/img/Flag_of_the_United_Kingdom.svg.webp')}}" alt="">
                    @else
                        <img src="{{asset('frontend/img/Flag_of_Azerbaijan.svg')}}" alt="">
                    @endif
                </button>
            </div>
        </div>
    </div>
</nav>
