<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('backend.dashboard') }}" class="waves-effect">
                        <i class="fas fa-home"></i>
                        <span>@lang('backend.dashboard')</span>
                    </a>
                </li>
                <li class="menu-title">@lang('backend.pages')</li>
                <li>
                    <a href="{{ route('backend.pages.index') }}" class="waves-effect">
                        <i class="fas fa-pager"></i>
                        <span>@lang('backend.pages')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.blogs.index') }}" class="waves-effect">
                        <i class="fas fa-blog"></i>
                        <span>@lang('backend.blogs')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.teams.index') }}" class="waves-effect">
                        <i class=" ri-group-fill"></i>
                        <span>@lang('backend.teams-elements')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.teams-members.index') }}" class="waves-effect">
                        <i class="ri-team-fill"></i>
                        <span>@lang('backend.team-member')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.contactForm') }}" class="waves-effect">
                        <i class="ri-contacts-fill"></i>
                        <span>@lang('frontend.contact-us')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('backend.settings.index') }}" class="waves-effect">
                        <i class="ri-settings-2-fill"></i>
                        <span>@lang('backend.setings')</span>
                    </a>
                </li>

                <li class="menu-title">@lang('backend.ap-setting')</li>
                <li>
                    <a href="{{ route('backend.passForm') }}" class=" waves-effect">
                        <i class="ri-lock-password-fill"></i>
                        <span>@lang('backend.change-password')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
