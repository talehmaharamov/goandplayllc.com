@extends('master.backend')
@section('styles')
    <link href="{{ asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('backend/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.teams-elements')</h4>
                            <a href="{{ route('backend.teams.create') }}"
                               class="btn btn-success mb-3"><i class="fas fa-plus"></i> &nbsp;@lang('backend.add-new')
                            </a>
                        </div>
                    </div>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons"
                               class="table table-striped table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('backend.title')(en):</th>
                                <th>@lang('backend.title')(az):</th>
                                <th>@lang('backend.photo'):</th>
                                <th>Status:</th>
                                <th>@lang('backend.actions'):</th>
                                <th>@lang('backend.description')(en):</th>
                                <th>@lang('backend.description')(az):</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teamElements as $element)
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>{{ $element->title_en }}</td>
                                    <td>{{ $element->title_az }}</td>
                                    <td><img src="{{ asset($element->photo) }}" width="64" height="64"></td>
                                    <td>
                                        <a href="{{ route('backend.teamStatus',['id'=>$element->id]) }}"
                                           class="btn btn-{{ $element->status == 1 ? 'success' : 'secondary' }}">{{ $element->status == 1 ? __('backend.active') : __('backend.deactive') }}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info"
                                           href={{ route('backend.teams.edit',['team'=>$element->id]) }}>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger"
                                           href="{{ route('backend.delTeamElement',['id'=>$element->id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>{{ $element->description_en }}</td>
                                    <td>{{ $element->description_az }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@lang('backend.teams-details')</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 ">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('backend.teamsDetails') }}" method="POST" class="custom-validation" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    @if(session()->has('detailsMessage'))
                                        <div class="alert alert-success">
                                            {{ session()->get('detailsMessage') }}
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label>@lang('backend.title')(en):</label>
                                        <div>
                                            <input type="text" value="{{ $teamsDetails->title_en }}" name="title_en" class="form-control" required="" data-parsley-maxlength="6">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>@lang('backend.title')(az):</label>
                                        <div>
                                            <input type="text"  value="{{ $teamsDetails->title_az }}" name="title_az" class="form-control" required="" data-parsley-maxlength="6">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>@lang('backend.description')(en):</label>
                                        <div>
                                            <textarea type="text" name="description_en" class="form-control" required="" data-parsley-maxlength="6">{{ $teamsDetails->description_en }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>@lang('backend.description')(az):</label>
                                        <div>
                                            <textarea type="text" name="description_az" class="form-control" required="" data-parsley-pattern="#[A-Fa-f0-9]{6}">{{ $teamsDetails->description_az }}</textarea>
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
@section('scripts')
    <script src="{{ asset('backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/datatables.init.js') }}"></script>
@endsection
