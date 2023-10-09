@extends('admin.layout.app')

@section('title')
    Kelola Kemajuan Pekerjaan
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
                        Kelola Kemajuan Pekerjaan</h1>
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
                        <li class="breadcrumb-item text-muted">Kelola Kemajuan Pekerjaan</li>
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
                            <form action="{{ route('update.work.progress', $kindOfWorkDetail->id) }}" method="POST"
                                id="myForm">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="py-5">
                                            <h1>Kelola Kemajuan Pekerjaan</h1>
                                            <h3>{{ $kindOfWorkDetail->name }}</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 mt-4">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_unit">Satuan</label>
                                            </div>
                                            <input type="text" class="form-control"
                                                value="{{ $kindOfWorkDetail->mc_unit }}" name="mc_unit" id="mc_unit"
                                                disabled>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mt-4">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_volume">Volume</label>
                                            </div>
                                            <input type="text" class="form-control"
                                                value="{{ $kindOfWorkDetail->mc_volume }}" name="mc_volume" id="mc_volume"
                                                disabled>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mt-4">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_unit_price">Jumlah Satuan Harga
                                                    (Rp)</label>
                                            </div>
                                            <input type="text" class="form-control"
                                                value="Rp {{ number_format($kindOfWorkDetail->mc_unit_price, 0, ',', '.') }}"
                                                name="mc_unit_price" id="mc_unit_price" disabled>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mt-4">
                                            @php
                                                $totalPrice = $kindOfWorkDetail->mc_unit_price * $kindOfWorkDetail->mc_volume;
                                                $totalPriceRupiah = number_format($totalPrice, 0, ',', '.');
                                            @endphp
                                            <div class="form-group">
                                                <label class="form-label" for="total_price">Total Harga (Rp)</label>
                                            </div>
                                            <input type="text" class="form-control" value="Rp {{ $totalPriceRupiah }}"
                                                id="total_price" disabled>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mt-4">
                                            <div class="form-group">
                                                <label class="form-label" for="work_value">Nilai Pekerjaan</label>
                                            </div>
                                            <input type="text" class="form-control" id="work_value"
                                                value="{{ $kindOfWorkDetail->work_value }}%" disabled>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <h2>Waktu Pengerjaan</h2>
                                        @foreach ($groupedDates as $key => $groupDate)
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
                                            <div class="col-sm-12 col-md-6 mt-5 pt-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="work_value">Minggu ke -
                                                        {{ $key += 1 }} (Tanggal :
                                                        {{ $date }}) | Progress di Time Schedule :
                                                        {{ $data->progress ?? '-' }}</label>
                                                </div>
                                                <input type="text" name="date[]" hidden
                                                    value="{{ $kindOfWorkDetail->date ?? $date }}" class="form-control">
                                                <input type="text" name="week[]" hidden
                                                    value="{{ $kindOfWorkDetail->week ?? $key }}" class="form-control">
                                                <input type="text" name="progress[]"
                                                    value="{{ $schedule->progress ?? 0 }}"
                                                    class="form-control progress-value" data-key="{{ $key }}"
                                                    {{ $disabled }} id="progress">
                                                <div style="color: red" class="warning{{ $key }}">
                                                </div>
                                            </div>

                                            {{-- old value --}}
                                            {{-- <input type="text" name="date[]" hidden
                                                value="{{ $kindOfWorkDetail->date ?? $date }}" class="form-control">
                                            <input type="text" name="week[]" hidden
                                                value="{{ $kindOfWorkDetail->week ?? $key }}" class="form-control">
                                            <input type="text" name="progress[]"
                                                value="{{ $schedule->progress ?? '' }}"
                                                class="form-control progress-value" data-key="{{ $key }}"
                                                {{ $disabled }} id="progress"> --}}
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-grid">
                                            <button type="submit" class="btn btn-success mt-5 btn-submit">Simpan</button>
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
    <script src="{{ asset('./assets/js/pages/count-remaining-work-value.js?r=' . time()) }}"></script>
@endpush
