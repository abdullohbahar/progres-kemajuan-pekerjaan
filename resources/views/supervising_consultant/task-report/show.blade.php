@extends('supervising_consultant.layout.app')

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
                @if (count($taskReport->agreementTaskReport->where('role_id', $supervisingConsultantID)->whereNull('is_agree')) >= 1)
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
                                    <input type="hidden" id="userID"
                                        value="{{ $taskReport->supervising_consultant_id }}">
                                    <input type="hidden" id="role" value="supervising_consultant">

                                    <a href="{{ route('list.task.report', $taskReport->id) }}" target="_blank"
                                        class="btn btn-info btn-sm mt-2">Lihat Data Pekerjaan</a>
                                    <button class="btn btn-success btn-sm mt-2 mx-3" id="agreeTaskReport">Setujui</button>
                                    <button class="btn btn-danger btn-sm mt-2" id="rejectTaskReport">Tolak</button>
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

                        @includeWhen(
                            $taskReport->agreement->where('status', 'Ditolak Rekanan')->count() > 0,
                            'components.alert-reject-weekly-progress')

                        <div class="card mt-5">
                            @include('components.search')

                            <div class="card-header">
                                <h2 class="mt-5">Macam Pekerjaan</h2>
                                <div class="card-toolbar">
                                    @if ($taskReport->agreement->where('status', 'Awal')->where('week', $week)->count() == 0)
                                        <button class="btn btn-success btn-sm mx-2 my-1" id="sendWeeklyProgressBtn"
                                            data-week="{{ $week }}" data-taskid="{{ $taskReport->id }}">
                                            Kirim / Setujui Progress Mingguan
                                        </button>
                                    @endif
                                    <button class="btn btn-primary btn-sm mx-2 my-1" data-bs-toggle="modal"
                                        data-bs-target="#modalTimeScheduleHistory">
                                        Riwayat Perubahan Time Schedule
                                    </button>
                                    @if (count($totalMcHistories) == 0)
                                        <button class="btn btn-sm btn-info" type="buttom" id="emptyHistory">Riwayat
                                            Perubahan MC</button>
                                    @else
                                        <div class="dropdown">
                                            <button class="btn btn-info btn-sm dropdown-toggle mx-2 my-1" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Riwayat Perubahan MC
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach ($totalMcHistories as $totalMcHistory)
                                                    <li><a class="dropdown-item" target="_blank"
                                                            href="{{ route('mc.history', [
                                                                'taskID' => $taskReport->id,
                                                                'totalMc' => $totalMcHistory->total_mc,
                                                            ]) }}">
                                                            MC-{{ $totalMcHistory->total_mc }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($taskReport->kindOfWork as $key => $kindOfWork)
                                    <div class="card mt-5" style="background-color: rgba(242, 242, 242, 0.667)">
                                        <div class="card-header pt-5" id="{{ $key + 5 }}">
                                            <h1 class="parentSearchable">{{ $key + 1 }}. <span
                                                    class="childSearchable">{{ $kindOfWork->name }}</span></h1>
                                            <div class="card-toolbar">
                                                @if (auth()->user()->role == 'Admin')
                                                    <a href="{{ route('kind.of.work.edit', $kindOfWork->id) }}"
                                                        class="btn btn-sm btn-warning" style="margin-right: 5px">Ubah</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-end p-0" style="padding-left: 30px !important">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    @php
                                                        $identified = $key + 10;
                                                    @endphp
                                                    @foreach ($kindOfWork->kindOfWorkDetails as $key => $detail)
                                                        <div class="mt-4">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-8"
                                                                    id="{{ $key + 9 }}{{ $identified++ }}">
                                                                    <h3 class="parentSearchable">{{ $key + 1 }}.
                                                                        <span
                                                                            class="childSearchable">{{ $detail->name }}</span>
                                                                    </h3>
                                                                    <p>Keterangan:</p>
                                                                    <p>{!! $detail->information !!}</p>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 text-end">
                                                                    <div class="row justify-content-end">
                                                                        @if (auth()->user()->role == 'Admin')
                                                                            <div class="col-sm-12 col-md-6 col-lg-4 d-grid">
                                                                                <a href="{{ route('manage.work', $detail->id) }}"
                                                                                    class="btn btn-sm btn-primary my-5"
                                                                                    style="margin-right: 5px">Kelola
                                                                                    Pekerjaan</a>
                                                                            </div>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Supervising Consultant')
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 d-grid">
                                                                                <a href="{{ route('create.time.schedule', $detail->id) }}"
                                                                                    class="btn btn-sm btn-info my-5"
                                                                                    style="margin-right: 5px">Kelola
                                                                                    Time Schedule</a>
                                                                            </div>

                                                                            @if ($status == 'active')
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-4 d-grid">
                                                                                    <a href="{{ route('manage.work.progress', $detail->id) }}"
                                                                                        class="btn btn-sm btn-success my-5"
                                                                                        style="margin-right: 5px">Kelola
                                                                                        Kemajuan Pekerjaan</a>
                                                                                </div>
                                                                            @else
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-4 d-grid">
                                                                                    <button
                                                                                        class="btn btn-sm btn-success my-5"
                                                                                        style="margin-right: 5px"
                                                                                        id="warning">Kelola
                                                                                        Kemajuan
                                                                                        Pekerjaan</button>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-12">
                                                                    <div class="accordion"
                                                                        id="kt_accordion_{{ $key }}">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="kt_accordion_{{ $key }}_header_{{ $key }}">
                                                                                <button
                                                                                    class="accordion-button fs-4 fw-semibold collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#kt_accordion_{{ $key }}_body_{{ $key }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="kt_accordion_{{ $key }}_body_{{ $key }}">
                                                                                    Harga Kontrak
                                                                                </button>
                                                                            </h2>
                                                                            <div id="kt_accordion_{{ $key }}_body_{{ $key }}"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="kt_accordion_{{ $key }}_header_{{ $key }}"
                                                                                data-bs-parent="#kt_accordion_{{ $key }}">
                                                                                <div class="accordion-body"
                                                                                    style="overflow-x: scroll">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>Volume</td>
                                                                                            <td>:
                                                                                                {{ $detail->contract_volume }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Satuan</td>
                                                                                            <td>:
                                                                                                {{ $detail->contract_unit }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Harga Satuan (Rp)</td>
                                                                                            <td>: Rp
                                                                                                {{ number_format($detail->contract_unit_price, 0, ',', '.') }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Jumlah Harga (Rp)</td>
                                                                                            <td>:
                                                                                                @php
                                                                                                    $contractUnitPrice = $detail->contract_unit_price * $detail->contract_volume;
                                                                                                @endphp
                                                                                                Rp
                                                                                                {{ number_format($contractUnitPrice, 0, ',', '.') }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="col-12 mt-5">
                                                                    <div class="accordion"
                                                                        id="kt_accordion_{{ $key }}_mc">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="kt_accordion_{{ $key }}_mc_header_{{ $key }}_mc">
                                                                                <button
                                                                                    class="accordion-button fs-4 fw-semibold collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#kt_accordion_{{ $key }}_mc_body_{{ $key }}_mc"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="kt_accordion_{{ $key }}_mc_body_{{ $key }}_mc">
                                                                                    MC
                                                                                </button>
                                                                            </h2>
                                                                            <div id="kt_accordion_{{ $key }}_mc_body_{{ $key }}_mc"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="kt_accordion_{{ $key }}_mc_header_{{ $key }}_mc"
                                                                                data-bs-parent="#kt_accordion_{{ $key }}_mc">
                                                                                <div class="accordion-body"
                                                                                    style="overflow-x: scroll">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>Volume</td>
                                                                                            <td>:
                                                                                                {{ str_replace('.', ',', $detail->mc_volume) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Satuan</td>
                                                                                            <td>: {{ $detail->mc_unit }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Harga Satuan (Rp)</td>
                                                                                            <td>: Rp
                                                                                                {{ number_format($detail->mc_unit_price, 0, ',', '.') }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Jumlah Harga (Rp)</td>
                                                                                            <td>:
                                                                                                @php
                                                                                                    $mcUnitPrice = $detail->mc_unit_price * $detail->mc_volume;
                                                                                                @endphp
                                                                                                Rp
                                                                                                {{ number_format($mcUnitPrice, 0, ',', '.') }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Nilai Pekerjaan</td>
                                                                                            <td>:
                                                                                                {{ $detail->work_value }}%
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-5">
                                                                    <div class="accordion"
                                                                        id="kt_accordion_{{ $key }}_time_schedule">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="kt_accordion_{{ $key }}_time_schedule_header_{{ $key }}_time_schedule">
                                                                                <button
                                                                                    class="accordion-button fs-4 fw-semibold collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#kt_accordion_{{ $key }}_time_schedule_body_{{ $key }}_time_schedule"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="kt_accordion_{{ $key }}_time_schedule_body_{{ $key }}_time_schedule">
                                                                                    Time Schedule
                                                                                </button>
                                                                            </h2>
                                                                            <div id="kt_accordion_{{ $key }}_time_schedule_body_{{ $key }}_time_schedule"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="kt_accordion_{{ $key }}_time_schedule_header_{{ $key }}_time_schedule"
                                                                                data-bs-parent="#kt_accordion_{{ $key }}_time_schedule">
                                                                                <div class="accordion-body"
                                                                                    style="overflow-x: scroll">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th>Minggu Ke</th>
                                                                                            <th>Tanggal</th>
                                                                                            <th>Progress Time Schedule</td>
                                                                                        </tr>
                                                                                        <tbody>
                                                                                            @foreach ($detail->timeSchedules as $key => $timeSchedule)
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        {{ $timeSchedule->week }}
                                                                                                    </td>
                                                                                                    <td>{{ $timeSchedule->date }}
                                                                                                    </td>
                                                                                                    <td>{{ $timeSchedule->progress }}%
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-5">
                                                                    <div class="accordion"
                                                                        id="kt_accordion_{{ $key }}{{ $detail->id }}_weekly_progress">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="kt_accordion_{{ $key }}{{ $detail->id }}_weekly_progress_header_{{ $key }}{{ $detail->id }}_weekly_progress">
                                                                                <button
                                                                                    class="accordion-button fs-4 fw-semibold collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#kt_accordion_{{ $key }}{{ $detail->id }}_weekly_progress_body_{{ $key }}{{ $detail->id }}_weekly_progress"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="kt_accordion_{{ $key }}{{ $detail->id }}_weekly_progress_body_{{ $key }}{{ $detail->id }}_weekly_progress">
                                                                                    Progress Mingguan
                                                                                </button>
                                                                            </h2>
                                                                            <div id="kt_accordion_{{ $key }}{{ $detail->id }}_weekly_progress_body_{{ $key }}{{ $detail->id }}_weekly_progress"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="kt_accordion_{{ $key }}{{ $detail->id }}_weekly_progress_header_{{ $key }}{{ $detail->id }}_weekly_progress"
                                                                                data-bs-parent="#kt_accordion_{{ $key }}{{ $detail->id }}_weekly_progress">
                                                                                <div class="accordion-body"
                                                                                    style="overflow-x: scroll">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th>Minggu Ke</th>
                                                                                            <th>Tanggal</th>
                                                                                            <th>Progress Mingguan</td>
                                                                                            <th>Foto</td>
                                                                                        </tr>
                                                                                        <tbody>
                                                                                            @foreach ($detail->schedules as $schedule)
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        {{ $schedule->week }}
                                                                                                    </td>
                                                                                                    <td>{{ $schedule->date }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $schedule->progress }}%
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a href="javascript:void(0);"
                                                                                                            type="button"
                                                                                                            id="uploadPicture"
                                                                                                            data-week="{{ $schedule->week }}"
                                                                                                            data-date="{{ $schedule->date }}"
                                                                                                            data-scheduleid="{{ $schedule->id }}">Upload
                                                                                                            Foto</a> |
                                                                                                        <a href="javascript:;"
                                                                                                            id="seePicture"
                                                                                                            data-scheduleid="{{ $schedule->id }}">Lihat
                                                                                                            Foto</a>
                                                                                                    </td>
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
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Content container-->

    @include('admin.task-report.components.photo-modal')
    @include('admin.task-report.components.agreement-modal')
    @include('supervising_consultant.task-report.components.time-schedule-history-modal')
    @include('supervising_consultant.task-report.components.reject-weekly-progress-modal')
@endsection

@push('addons-js')
    <script src="{{ asset('./assets/js/pages/task-report.js?r=' . time()) }}"></script>
    <script src="{{ asset('./assets/js/pages/upload-progress-picture.js?r=' . time()) }}"></script>
    <script src="{{ asset('./assets/js/pages/agreement.js?r=' . time()) }}"></script>
    <script src="{{ asset('./assets/js/pages/search.js?r=' . time()) }}"></script>

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
