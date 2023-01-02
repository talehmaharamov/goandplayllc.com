@extends('master.backend')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.new') @lang('backend.team-member')</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.teams-members.store') }}"
                                  class="custom-validation" method="post" enctype="multipart/form-data">
                                @csrf
                                {{--                                @method('PUT')--}}
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach($languages as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif" data-bs-toggle="tab"
                                                   href="#{{ $lang->code }}" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block"> {{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content p-3 text-muted">
                                        @foreach($languages as $lang)
                                            <div class="tab-pane @if($loop->first) active show @endif" id="{{ $lang->code }}"
                                                 role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.name'):</label>
                                                        <div>
                                                            <input name="name[{{ $lang->code }}]" type="text" class="form-control"
                                                                   required="" data-parsley-minlength="6"
                                                                   placeholder="@lang('backend.name')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-5 text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            @lang('backend.submit')
                                        </button>
                                        <a href="{{ url()->previous() }}" type="button"
                                           class="btn btn-secondary waves-effect">
                                            @lang('backend.cancel')
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

