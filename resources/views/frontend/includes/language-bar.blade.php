<div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('frontend.select-language')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="langbox">
                    <a style="text-decoration: none" href="{{ route('switchLang','az') }}">
                    <img src="{{asset('frontend/img/Flag_of_Azerbaijan.svg')}}" alt="">
                    <span>Azerbaijan</span>
                    </a>
                </div>
                <hr>
                <div class="langbox">
                    <a style="text-decoration: none" href="{{ route('switchLang','en') }}">
                    <img src="{{asset('frontend/img/Flag_of_the_United_Kingdom.svg.webp')}}" alt="">
                    <span>English</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
