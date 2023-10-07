@extends('partner.layout.app')

@section('title')
    Detail Laporan Pekerjaan
@endsection

@push('addons-css')
    <style>
        .vertically-centered {
            vertical-align: middle;
        }

        .table>:not(caption)>*>* {
            padding: 0.50rem 0.50rem !important;
        }
    </style>
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
                        Detail Laporan Pekerjaan</h1>
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
                        <li class="breadcrumb-item text-muted">Detail Laporan Pekerjaan</li>
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
                                <div class="card-toolbar">
                                    <a href="{{ route('task.report.supervising.consultant') }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                                <div class="card-toolbar">
                                    <a href="{{ route('report', $taskReport->id) }}" target="_blank"
                                        class="btn btn-sm btn-info mx-2"> Lihat
                                        Laporan
                                    </a>
                                </div>
                            </div>
                            <div class="card-body" style="font-size: 14px">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <table class="table" style="width: 100%">
                                            <tr>
                                                <td style="width: 30%"><b>Nama Kegiatan</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->activity_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Nama Pekerjaan</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->task_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Lokasi</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Tahun Anggaran</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->fiscal_year }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Nilai Kontrak</b></td>
                                                <td class="vertically-centered">: Rp {{ $taskReport->contract_value }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Waktu Pelaksanaan</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->execution_time }} Hari
                                                    Kalender</td>
                                            </tr>
                                            <tr>
                                                <td><b>Status</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->status }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <table class="table" style="width: 100%">
                                            <tr>
                                                <td style="width: 30%"><b>CV / Penyedia Jasa</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->partner->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Nomor SPK</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->spk_number }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Tanggal SPK</b></td>
                                                <td class="vertically-centered">: {{ $taskReport->spk_date }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Konsultan Pengawas</b></td>
                                                <td class="vertically-centered">:
                                                    {{ $taskReport->supervisingConsultant->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Pengawas Lapangan 1</b></td>
                                                <td class="vertically-centered">:
                                                    {{ $taskReport->siteSupervisorFirst->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Pengawas Lapangan 2</b></td>
                                                <td class="vertically-centered">:
                                                    {{ $taskReport->siteSupervisorSecond->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>PPK</b></td>
                                                <td class="vertically-centered">:
                                                    {{ $taskReport->actingCommitmentMarker->name }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-5">
                            <div class="card-header border-0 pt-5">
                                <h2>Progress Pekerjaan Minggu Ini</h2>
                                <div class="card-toolbar">
                                    <button class="btn btn-success btn-sm mx-2 my-1" id="sendWeeklyProgressBtn"
                                        data-week="{{ $week }}" data-taskid="{{ $taskReport->id }}">
                                        Kirim / Setujui Progress Mingguan
                                    </button>
                                    <button class="btn btn-danger btn-sm mx-2 my-1" id="rejectWeeklyProgressBtn"
                                        data-week="{{ $week }}" data-taskid="{{ $taskReport->id }}"
                                        data-status="Awal" data-reject="Ditolak Rekanan">
                                        Tolak
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td><b>Nama Pekerjaan</b></td>
                                        <td><b>Progress</b></td>
                                        {{-- <td><b>Foto</b></td> --}}
                                    </tr>
                                    @foreach ($weeklyProgresses as $weeklyProgress)
                                        <tr>
                                            <td>{{ $weeklyProgress->kindOfWorkDetail->name }}</td>
                                            <td>{{ $weeklyProgress->progress }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-info btn-sm" href="javascript:;"
                                                    id="seePicture">Lihat
                                                    Foto</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.task-report.components.photo-modal')
    @include('admin.task-report.components.agreement-modal')
@endsection

@push('addons-js')
    <script src="{{ asset('./assets/js/pages/task-report.js?r=' . time()) }}"></script>
    <script src="{{ asset('./assets/js/pages/upload-progress-picture.js?r=' . time()) }}"></script>
    <script src="{{ asset('./assets/js/pages/agreement.js?r=' . time()) }}"></script>

    {{-- warning alert --}}
    <script>
        $("body").on("click", "#warning", function() {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Anda belum bisa menambahkan data!',
            })
        })
    </script>
@endpush
