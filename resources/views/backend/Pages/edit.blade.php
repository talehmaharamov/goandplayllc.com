@extends('master.backend')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.new') @lang('backend.page')</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <div class="card">
                            <form action="{{ route('backend.pages.update',$page->id) }}"
                                  class="custom-validation" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input hidden name="id" value="{{ $page->id }}">
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
                                            <div class="tab-pane @if($loop->first) active show @endif"
                                                 id="{{ $lang->code }}"
                                                 role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.name'):</label>
                                                        <div>
                                                            <input name="name[{{ $lang->code }}]" type="text"
                                                                   class="form-control"
                                                                   required="" data-parsley-minlength="6"
                                                                   value="{{ ($lang->code == 'en') ? $page->name_en : $page->name_az }}"
                                                                   placeholder="@lang('backend.name')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <label>Slug:</label>
                                            <div>
                                                <input name="slug" type="text" class="form-control"
                                                       data-parsley-maxlength="6"
                                                       value="{{ $page->slug }}"
                                                       placeholder="Slug">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>@lang('backend.photo'):</label>
                                            <div>
                                                <input name="photo" type="file" class="form-control"
                                                       data-parsley-pattern="#[A-Fa-f0-9]{6}">
                                            </div>
                                        </div>
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
