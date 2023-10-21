@extends('admin.layout.app')

@section('title')
    Kelola Time Schedule
@endsection

@push('addons-css')
    <style>
        input[readonly] {
            color: var(--bs-gray-500);
            background-color: var(--bs-gray-200);
            border-color: var(--bs-gray-300);
            opacity: 1;
            cursor: not-allowed;
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
                        Kelola Time Schedule</h1>
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
                        <li class="breadcrumb-item text-muted">Kelola Time Schedule</li>
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
                            <div class="card-header border-0">
                                <div class="card-toolbar">
                                    <a href="javascript: history.go(-1)" class="btn btn-sm btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <form action="{{ route('update.time.schedule', $kindOfWorkDetail->id) }}" method="POST"
                                id="myForm">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="py-5">
                                                <h1>Kelola Time Schedule</h1>
                                                <h3>{{ $kindOfWorkDetail->name }}</h3>
                                                <h3>Nilai Pekerjaan: <span
                                                        id="workValue">{{ $kindOfWorkDetail->work_value }}</span>%
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <h2>Time Schedule</h2>
                                        @foreach ($groupedDates as $key => $groupDate)
                                            {{-- mencari data time schedule --}}
                                            {{-- {{ dd($groupedDates) }} --}}
                                            @php
                                                $date = \Carbon\Carbon::parse(reset($groupDate))->format('d') . '-' . \Carbon\Carbon::parse(end($groupDate))->format('d');
                                                $data = $kindOfWorkDetail->timeSchedules->where('date', $date)->first();
                                                $schedule = $kindOfWorkDetail->schedules->where('date', $date)->first();
                                                
                                                foreach ($groupDate as $progressDate) {
                                                    $progressDate = strtotime($progressDate);
                                                
                                                    if ($progressDate > $dateNow) {
                                                        $disabled = '';
                                                    } else {
                                                        $disabled = 'readonly';
                                                    }
                                                }
                                            @endphp
                                            <div class="col-sm-12 col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="work_value">Minggu ke -
                                                        {{ $key += 1 }} (Tanggal :
                                                        {{ $date }})</label>
                                                </div>
                                                <input type="text" name="date[]" hidden
                                                    value="{{ $data->date ?? $date }}" class="form-control">
                                                <input type="text" name="week[]" hidden
                                                    value="{{ $data->week ?? $key }}" class="form-control">
                                                <input type="text" name="progress[]" {{ $disabled }}
                                                    value="{{ $data->progress ?? 0 }}" class="form-control progress-value"
                                                    id="work_value">
                                            </div>


                                            {{-- old value --}}
                                            <input type="text" name="oldDate[]" hidden
                                                value="{{ $data->date ?? $date }}" class="form-control">
                                            <input type="text" name="oldWeek[]" hidden value="{{ $data->week ?? $key }}"
                                                class="form-control">
                                            <input type="text" name="oldProgress[]" hidden
                                                value="{{ $data->progress ?? 0 }}" class="form-control">
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-grid">
                                            <button type="submit" class="btn btn-success mt-5">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <script src="{{ asset('./assets/js/pages/timeschedule.js?r=' . time()) }}"></script>
@endpush
