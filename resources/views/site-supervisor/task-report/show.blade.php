@extends('site-supervisor.layout.app')

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
                @if (count($taskReport->agreementTaskReport->where('role_id', $siteSupervisorID)->whereNull('is_agree')) >= 1)
                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row p-5 mb-10">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-information fs-2hx text-light me-4 mb-5 mb-sm-0"><span
                                class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h4 class="mb-2 light">Konfirmasi Pekerjaan</h4>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span class="text-capitalize">Admin Telah Melakukan Input Data Pekerjaan. Harap Lakukan
                                Pengecekan.
                                Jika selama 2x24 jam anda tidak melakukan konfirmasi maka anda dinyatakan setuju dengan data
                                yang ada</span>
                            <!--end::Content-->
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" id="taskReportID" value="{{ $taskReport->id }}">
                                    <input type="hidden" id="userID" value="{{ Auth::user()->siteSupervisor->id }}">
                                    <input type="hidden" id="role" value="site_supervisor">

                                    <a href="{{ route('list.task.report', $taskReport->id) }}" target="_blank"
                                        class="btn btn-info btn-sm mt-2">Lihat Data Pekerjaan</a>
                                    <button class="btn btn-success btn-sm mt-2 mx-3" id="agreeTaskReport">Setujui</button>
                                    <button class="btn btn-danger btn-sm mt-2"
                                        id="rejectTaskReportSiteSupervisor">Tolak</button>
                                </div>
                            </div>
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </button>
                        <!--end::Close-->
                    </div>
                    <!--end::Alert-->
                @endif
                <div class="row">
                    <div class="col-12">
                        @include('components.detail-task-report')

                        @if ($siteSupervisorRole == 1)
                            @includeWhen(
                                $taskReport->agreement->where('status', 'Disetujui Rekanan')->where('task_report_id', $taskReport->id)->where('week', $week)->count() > 0,
                                'components.alert-sent-weekly-progress')
                        @elseif($siteSupervisorRole == 2)
                            @includeWhen(
                                $taskReport->agreement->where('status', 'Disetujui Pengawas Lapangan 1')->where('task_report_id', $taskReport->id)->where('week', $week)->count() > 0,
                                'components.alert-sent-weekly-progress')
                        @endif

                        <div class="card mt-5">
                            <div class="card-header border-0 pt-5">
                                <h2>Progress Pekerjaan Minggu Ini</h2>
                                <div class="card-toolbar">
                                    @php
                                        if ($siteSupervisorRole == 1) {
                                            $count = $taskReport->agreement
                                                ->where('status', 'Disetujui Rekanan')
                                                ->where('task_report_id', $taskReport->id)
                                                ->where('week', $week)
                                                ->count();
                                        } elseif ($siteSupervisorRole == 2) {
                                            $count = $taskReport->agreement
                                                ->where('status', 'Disetujui Pengawas Lapangan 1')
                                                ->where('task_report_id', $taskReport->id)
                                                ->where('week', $week)
                                                ->count();
                                        }
                                    @endphp
                                    @if ($count > 0)
                                        <button class="btn btn-success btn-sm mx-2 my-1" id="sendWeeklyProgressBtn"
                                            data-week="{{ $week }}" data-taskid="{{ $taskReport->id }}">
                                            Kirim / Setujui Progress Mingguan
                                        </button>
                                        @if ($siteSupervisorRole == 1)
                                            <button class="btn btn-danger btn-sm mx-2 my-1" id="rejectWeeklyProgressBtn"
                                                data-week="{{ $week }}" data-taskid="{{ $taskReport->id }}"
                                                data-status="Disetujui Rekanan" data-reject="Ditolak Pengawas Lapangan 1"
                                                data-role="Partner">
                                                Tolak
                                            </button>
                                        @endif
                                    @endif
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
                                            <td style="width: 50%">{{ $weeklyProgress['name'] }}</td>
                                            <td style="width: 25%">{{ $weeklyProgress['progress'] }}%</td>
                                            <td style="width: 25%" class="text-center">
                                                <button class="btn btn-info btn-sm" href="javascript:;"
                                                    data-kindofworkdetailid="{{ $weeklyProgress['kind_of_work_detail_id'] }}"
                                                    data-week={{ $week }} id="seePictureOtherRole">Lihat
                                                    Foto</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card mt-5">
                            <div class="card-header border-0 pt-5">
                                <h2>Pekerjaan Untuk Minggu Selanjutnya</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td><b>Nama Pekerjaan</b></td>
                                        <td><b>Progress</b></td>
                                        {{-- <td><b>Foto</b></td> --}}
                                    </tr>
                                    @foreach ($taskNextWeeks as $taskNextWeek)
                                        <tr>
                                            <td style="width: 50%">{{ $taskNextWeek['name'] }}</td>
                                            <td style="width: 50%">{{ $taskNextWeek['progress'] }}%</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partner.task-report.components.history-progress-weekly');
            </div>
        </div>
    </div>

    @include('admin.task-report.components.photo-modal')
    @include('site-supervisor.task-report.components.agreement-modal')
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
