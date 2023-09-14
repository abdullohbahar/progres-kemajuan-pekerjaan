@extends('admin.layout.app')

@section('title')
    Data Konsultan Pengawas
@endsection

@push('addons-css')
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Konsultan Pengawas</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Data Konsultan Pengawas</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-0 pt-5">
                                <h3></h3>
                                <div class="card-toolbar">
                                    <button data-bs-toggle="modal" data-bs-target="#kt_modal_1"
                                        class="btn btn-sm btn-primary">
                                        <i class="ki-duotone ki-plus fs-2"></i>Tambah Konsultan Pengawas
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="kt_datatable_dom_positioning"
                                    class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Nomor HP</th>
                                            <th>Nama CV</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    @include('admin.supervising-consultant.components.modal-add-supervising-consultant')
@endsection

@push('addons-js')
    {{-- show datatable data --}}
    <script>
        $("#kt_datatable_dom_positioning").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{!! url()->current() !!}",
            },
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            columns: [{
                    orderable: false,
                    data: null,
                    name: null,
                },
                {
                    orderable: true,
                    data: "name",
                    name: "name",
                },
                {
                    orderable: false,
                    data: "address",
                    name: "address",
                },
                {
                    orderable: true,
                    data: "cv_id",
                    name: "cv_id",
                },
                {
                    orderable: true,
                    data: "position",
                    name: "position",
                },
                {
                    data: "id",
                    name: "id",
                }
            ],
            columnDefs: [{
                    targets: 0,
                    data: null,
                    searchable: false,
                    orderable: false,
                    className: "text-left border-bottom",
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    targets: -1,
                    searchable: false,
                    orderable: false,
                    className: 'text-left',
                    render: function(data, type, row) {
                        return `<a href="#" class="btn btn-sm btn-bg-warning my-1 text-white">Ubah</a>
                            <a href="#" class="btn btn-sm btn-bg-danger my-1 text-white">Hapus</a>`;
                    },
                },
            ]
        });
    </script>
@endpush
