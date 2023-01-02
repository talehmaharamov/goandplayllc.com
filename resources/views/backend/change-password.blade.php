@extends('master.backend')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.change-password')</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 ">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('backend.changePass') }}" method="POST" class="custom-validation" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    <input hidden name="id" value="{{ Auth()->user()->id }}">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label>@lang('backend.current-password'):</label>
                                        <div>
                                            <input type="password" name="current_password" class="form-control" required="" data-parsley-minlength="6" placeholder="*******">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>@lang('backend.new-password'):</label>
                                        <div>
                                            <input type="password" name="password" class="form-control" required="" data-parsley-maxlength="6" placeholder="*******">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>@lang('backend.cnew-password'):</label>
                                        <div>
                                            <input type="password" name="password_confirmation" class="form-control" required="" data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="*******">
                                        </div>
                                    </div>

                                    <div class="mb-0 text-center">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                @lang('backend.submit')
                                            </button>
                                            <a href="{{url()->previous()}}" type="button" class="btn btn-secondary waves-effect">
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
    </div>
@endsection
