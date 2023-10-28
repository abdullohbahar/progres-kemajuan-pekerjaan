@extends('acting-commitment-marker.layout.app')

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
                        @include('components.detail-task-report')

                        {{-- <div class="card mt-5">
                            <div class="card-header border-0 pt-5">
                                <h2>Progress Pekerjaan Minggu Ini</h2>
                                <div class="card-toolbar">
                                    @if ($weeklyProgresses->count() > 0)
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
                                    </tr>
                                    @foreach ($weeklyProgresses as $weeklyProgress)
                                        <tr>
                                            <td style="width: 50%">{{ $weeklyProgress->kindOfWorkDetail->name }}</td>
                                            <td style="width: 25%">{{ $weeklyProgress->progress }}%</td>
                                            <td style="width: 25%" class="text-center">
                                                <button class="btn btn-info btn-sm" href="javascript:;"
                                                    data-kindofworkdetailid="{{ $weeklyProgress->kind_of_work_detail_id }}"
                                                    data-week={{ $week }} id="seePictureOtherRole">Lihat
                                                    Foto</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div> --}}

                        {{-- <div class="card mt-5">
                            <div class="card-header border-0 pt-5">
                                <h2>Pekerjaan Untuk Minggu Selanjutnya</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td><b>Nama Pekerjaan</b></td>
                                        <td><b>Progress</b></td>
                                    </tr>
                                    @foreach ($taskNextWeeks as $taskNextWeek)
                                        <tr>
                                            <td style="width: 50%">{{ $taskNextWeek['name'] }}</td>
                                            <td style="width: 50%">{{ $taskNextWeek['progress'] }}%</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('admin.task-report.components.photo-modal')
    @include('site-supervisor.task-report.components.agreement-modal') --}}
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
        $("#terminateContract").on("click", function() {
            var taskReportID = $(this).data("id");

            Swal.fire({
                title: "Apakah anda yakin memutus kontrak?",
                text: "Pekerjaan yang telah diputus tidak dapat diubah",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Setujui",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/terminate-contract/" + taskReportID,
                        dataType: "JSON",
                        method: "POST",
                        success: function(response) {
                            console.log(response);
                            if (response.status == 200) {
                                success(response.message);
                                setTimeout(function() {
                                    window.location = "";
                                }, 1450);
                            }
                        },
                    });
                }
            });
        })
    </script>
@endpush
