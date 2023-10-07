@extends('admin.layout.app')

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
                                    <a href="{{ route('task.report.admin') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                                <div class="card-toolbar">
                                    @if (auth()->user()->role == 'Admin')
                                        <a href="{{ route('edit.task.report.admin', $taskReport->id) }}"
                                            class="btn btn-sm btn-warning"> Ubah
                                        </a>
                                    @endif
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
                            <div class="card-header">
                                <h2 class="mt-5">Macam Pekerjaan</h2>
                                <div class="card-toolbar">
                                    @if ($taskReport->spk_date >= date('Y-m-d'))
                                        <a href="{{ route('kind.of.work', $taskReport->id) }}"
                                            class="btn btn-primary btn-sm mx-1 my-1">Tambah Macam Pekerjaan</a>
                                    @endif
                                    @if (count($totalMcHistories) == 0)
                                        <button class="btn btn-sm btn-info mx-1 my-1" type="button"
                                            id="emptyHistory">Riwayat
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
                                        <div class="card-header pt-5">
                                            <h1>{{ $key + 1 }}. {{ $kindOfWork->name }}</h1>
                                            <div class="card-toolbar">
                                                @if ($taskReport->spk_date >= date('Y-m-d'))
                                                    <button id="removeItemButton" data-id="{{ $kindOfWork->id }}"
                                                        data-name="{{ $kindOfWork->name }}" class="btn btn-sm btn-danger"
                                                        style="margin-right: 5px">Hapus</button>
                                                @endif
                                                @if (auth()->user()->role == 'Admin')
                                                    <a href="{{ route('kind.of.work.edit', $kindOfWork->id) }}"
                                                        class="btn btn-sm btn-warning" style="margin-right: 5px">Ubah</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-end p-0" style="padding-left: 30px !important">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    @foreach ($kindOfWork->kindOfWorkDetails as $key => $detail)
                                                        <div class="mt-4">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <h3>{{ $key + 1 }}. {{ $detail->name }}</h3>
                                                                    <p>Keterangan:</p>
                                                                    <p>{!! $detail->information !!}</p>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 text-end">
                                                                    <div class="row justify-content-end">
                                                                        @if (auth()->user()->role == 'Admin')
                                                                            <div class="col-sm-12 col-md-6 col-lg-4 d-grid">
                                                                                <a href="{{ route('manage.work.admin', $detail->id) }}"
                                                                                    class="btn btn-sm btn-primary my-5"
                                                                                    style="margin-right: 5px">Kelola
                                                                                    Pekerjaan</a>
                                                                            </div>
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
                                                                                            <td>: {{ $detail->mc_volume }}
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
                                                                                                    <td>{{ $timeSchedule->progress }}
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
                                                                        id="kt_accordion_{{ $key }}_weekly_progress">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="kt_accordion_{{ $key }}_weekly_progress_header_{{ $key }}_weekly_progress">
                                                                                <button
                                                                                    class="accordion-button fs-4 fw-semibold collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#kt_accordion_{{ $key }}_weekly_progress_body_{{ $key }}_weekly_progress"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="kt_accordion_{{ $key }}_weekly_progress_body_{{ $key }}_weekly_progress">
                                                                                    Progress Mingguan
                                                                                </button>
                                                                            </h2>
                                                                            <div id="kt_accordion_{{ $key }}_weekly_progress_body_{{ $key }}_weekly_progress"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="kt_accordion_{{ $key }}_weekly_progress_header_{{ $key }}_weekly_progress"
                                                                                data-bs-parent="#kt_accordion_{{ $key }}_weekly_progress">
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
                                                                                                            data-date="{{ $schedule->date }}"
                                                                                                            data-scheduleid="{{ $detail->schedules[$key]->id }}">Upload
                                                                                                            Foto</a> |
                                                                                                        <a href="javascript:;"
                                                                                                            id="seePicture"
                                                                                                            data-scheduleid="{{ $detail->schedules[$key]->id }}">Lihat
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

    <script>
        $("body").on("click", "#emptyHistory", function() {
            Swal.fire({
                icon: "warning",
                title: "Belum Ada Riwayat",
            });
        });
    </script>
@endpush
