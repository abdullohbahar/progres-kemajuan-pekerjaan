@extends('supervising_consultant.layout.app')

@section('title')
    Dashboard
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
                        Dashboard</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard.admin') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Dashboard</li>
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
                            <div class="card-header pt-5">
                                <h1>Pekerjaan Berjalan</h1>
                            </div>
                            <div class="card-body" style="overflow-y: visible">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped gy-7 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                <th style="width: 30%">Nama Kegiatan</th>
                                                <th style="width: 30%">Nama Pekerjaan</th>
                                                <th>Tahun Anggaran</th>
                                                <th>Tanggal SPK</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activeWorks as $activeWork)
                                                <tr>
                                                    <td>{{ $activeWork->activity_name }}</td>
                                                    <td>{{ $activeWork->task_name }}</td>
                                                    <td>{{ $activeWork->fiscal_year }}</td>
                                                    <td>{{ $activeWork->spk_date }}</td>
                                                    <td><span class="badge badge-success">{{ $activeWork->status }}</span>
                                                    </td>
                                                    <td><a href="{{ route('show.task.report.supervising.consultant', $activeWork->id) }}"
                                                            class="btn btn-info btn-sm">Detail Pekerjaan
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-5">
                                <h1>Pekerjaan Belum Berjalan</h1>
                            </div>
                            <div class="card-body" style="overflow-y: visible">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped gy-7 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                <th style="width: 30%">Nama Kegiatan</th>
                                                <th style="width: 30%">Nama Pekerjaan</th>
                                                <th>Tahun Anggaran</th>
                                                <th>Tanggal SPK</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inactiveWorks as $inactiveWork)
                                                <tr>
                                                    <td>{{ $inactiveWork->activity_name }}</td>
                                                    <td>{{ $inactiveWork->task_name }}</td>
                                                    <td>{{ $inactiveWork->fiscal_year }}</td>
                                                    <td>{{ $inactiveWork->spk_date }}</td>
                                                    <td><span class="badge badge-secondary">Belum Aktif</span>
                                                    </td>
                                                    <td><a href="{{ route('show.task.report.supervising.consultant', $inactiveWork->id) }}"
                                                            class="btn btn-info btn-sm">Detail Pekerjaan
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-5">
                                <h1>Pekerjaan Yang Bermasalah</h1>
                            </div>
                            <div class="card-body" style="overflow-y: visible">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped gy-7 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                <th style="width: 30%">Nama Kegiatan</th>
                                                <th style="width: 30%">Nama Pekerjaan</th>
                                                <th>Tahun Anggaran</th>
                                                <th>Tanggal SPK</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($spWorks as $spWork)
                                                <tr>
                                                    <td>{{ $spWork->activity_name }}</td>
                                                    <td>{{ $spWork->task_name }}</td>
                                                    <td>{{ $spWork->fiscal_year }}</td>
                                                    <td>{{ $spWork->spk_date }}</td>
                                                    <td><span class="badge badge-danger">{{ $spWork->status }}</span>
                                                    </td>
                                                    <td><a href="{{ route('show.task.report.supervising.consultant', $spWork->id) }}"
                                                            class="btn btn-info btn-sm">Detail Pekerjaan
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
@endsection

@push('addons-js')
@endpush
