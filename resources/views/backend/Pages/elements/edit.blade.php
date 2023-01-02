@extends('master.backend')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Element</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="card">
                            <form action="{{ route('backend.updateElement',$element->id) }}"
                                  class="custom-validation" method="post" enctype="multipart/form-data">
                                @csrf
                                <input hidden name="id" value="{{ $element->id }}">

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
                                                            <input name="title[{{ $lang->code }}]" type="text"
                                                                   class="form-control"
                                                                   required="" data-parsley-minlength="6"
                                                                   value="{{ ($lang->code == 'en') ? $element->title_en : $element->title_az }}"
                                                                   placeholder="@lang('backend.name')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.description'):</label>
                                                        <div>
                                                            <textarea name="description[{{ $lang->code }}]" type="text"
                                                                      class="form-control"
                                                                      placeholder="@lang('backend.description')">{{ ($lang->code == 'en') ? $element->description_en : $element->description_az }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--                                            </div>--}}
                                            </div>
                                        @endforeach
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
