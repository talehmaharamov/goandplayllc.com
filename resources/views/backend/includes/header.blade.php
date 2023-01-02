<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('backend.dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('frontend/img/goandplaylogo.png')}}" alt="logo-sm-light" height="430">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{asset('frontend/img/goandplaylogo.png')}}" alt="logo-light" height="60">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>


        <div class="d-flex">
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(app()->getLocale() == 'en')
                        <img class="" src="{{ asset('backend/images/flags/us.jpg')}}" height="16">
                    @else
                        <img class="" src="{{ asset('backend/images/flags/aze.png')}}" height="16">
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('switchLang',['lang'=>'en']) }}" class="dropdown-item notify-item">
                        <img src="{{ asset('backend/images/flags/us.jpg')}}" alt="user-image" class="me-1" height="12">
                        <span class="align-middle">English</span>
                    </a>
                    <a href="{{ route('switchLang',['lang'=>'az']) }}" class="dropdown-item notify-item">
                        <img src="{{ asset('backend/images/flags/aze.png')}}" alt="user-image" class="me-1" height="12">
                        <span class="align-middle">Azərbaycan</span>
                    </a>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{ asset('backend/images/users/gede.png')}}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <form method="post" id="logOutForm" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                            @lang('backend.logout')
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
