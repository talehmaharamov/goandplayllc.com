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
                            <h4 class="mb-sm-0"> {{ (Session()->get('applocale') == 'en' ? $currentPage->name_en : $currentPage->name_az) }} @lang('backend.elements') </h4>
                            <a href="{{ route('backend.createElementForm',$currentPage->id) }}"
                               class="btn btn-success mb-3"><i class="fas fa-plus"></i> &nbsp;@lang('backend.add-new')
                            </a>
                        </div>
                    </div>
                </div>
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
                                <th>@lang('backend.page'):</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($elements as $element)
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>{{ $element->title_en }}</td>
                                    <td>{{ $element->title_az }}</td>

                                    <td><img src="{{ asset($element->photo) }}" width="64" height="64"></td>
                                    <td>
                                        <a href="{{ route('backend.elementStatus',['id'=>$element->id]) }}"
                                           class="btn btn-{{ $element->status == 1 ? 'success' : 'secondary' }}">{{ $element->status == 1 ? __('backend.active') : __('backend.deactive') }}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info"
                                           href={{ route('backend.editElement',['id'=>$element->id]) }}>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger"
                                           href="{{ route('backend.delPage',['id'=>$element->id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>{{ $element->description_en }}</td>
                                    <td>{{ $element->description_az }}</td>

                                    <td>{{(Session()->get('applocale') == 'en') ? $currentPage->name_en : $currentPage->name_az}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
