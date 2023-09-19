@extends('admin.layout.app')

@section('title')
    Kelola Pekerjaan
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
                        Kelola Pekerjaan</h1>
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
                        <li class="breadcrumb-item text-muted">Kelola Pekerjaan</li>
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
                                <div>
                                    <h1>{{ $kindOfWorkDetail->kindOfWork->name }}</h1>
                                    <h6>{{ $kindOfWorkDetail->name }}</h6>
                                </div>
                                <div class="header-toolbar">
                                    <h1>Nilai Kontrak : Rp {{ $kindOfWorkDetail->kindOfWork->task->contract_value }}</h1>
                                </div>
                            </div>
                            <form action="{{ route('manage.work.update', $kindOfWorkDetail->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <h1>Harga Kontrak</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="contract_volume">Volume</label>
                                                <input type="number" name="contract_volume"
                                                    class="form-control @error('contract_volume') is-invalid @enderror"
                                                    value="{{ old('contract_volume', $kindOfWorkDetail->contract_volume) }}"
                                                    id="contract_volume">
                                                @error('contract_volume')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="contract_unit">Satuan</label>
                                                <select class="form-control @error('contract_unit') is-invalid @enderror"
                                                    name="contract_unit" id="contract_unit" required>
                                                    <option value="">-- Pilih Unit --</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->unit }}"
                                                            {{ old('contract_unt', $kindOfWorkDetail->contract_unit) == $unit->unit ? 'selected' : '' }}>
                                                            {{ $unit->unit }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('contract_unit')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="contract_unit_price">Harga Satuan</label>
                                                <input type="text" name="contract_unit_price"
                                                    class="form-control @error('contract_unit_price') is-invalid @enderror"
                                                    value="{{ old('contract_unit_price', 'Rp ' . number_format($kindOfWorkDetail->contract_unit_price, 0, ',', '.')) }}"
                                                    id="contract_unit_price">
                                                @error('contract_unit_price')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                {{-- menghitung total harga kontrak --}}
                                                @php
                                                    $contractTotalPrice = ($kindOfWorkDetail->contract_unit_price ?? 0) * ($kindOfWorkDetail->contract_volume ?? 0);
                                                    $contractTotalPriceRupiah = 'Rp ' . number_format($contractTotalPrice, 0, ',', '.');
                                                @endphp
                                                <label class="form-label" for="contract_total_price">Total Harga</label>
                                                <input type="text" name="contract_total_price"
                                                    class="form-control @error('contract_total_price') is-invalid @enderror"
                                                    value="{{ old('contract_total_price', $contractTotalPriceRupiah) }}"
                                                    id="contract_total_price" readonly>
                                                @error('contract_total_price')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <h1>Harga MC</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_volume">Volume</label>
                                                <input type="number" name="mc_volume"
                                                    class="form-control @error('mc_volume') is-invalid @enderror"
                                                    value="{{ old('mc_volume', $kindOfWorkDetail->mc_volume) }}"
                                                    id="mc_volume">
                                                @error('mc_volume')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_unit">Satuan</label>
                                                <select class="form-control @error('mc_unit') is-invalid @enderror"
                                                    name="mc_unit" id="mc_unit" required>
                                                    <option value="">-- Pilih Unit --</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->unit }}"
                                                            {{ old('contract_unt', $kindOfWorkDetail->mc_unit) == $unit->unit ? 'selected' : '' }}>
                                                            {{ $unit->unit }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('mc_unit')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_unit_price">Harga Satuan</label>
                                                <input type="text" name="mc_unit_price"
                                                    class="form-control @error('mc_unit_price') is-invalid @enderror"
                                                    value="{{ old('mc_unit_price', 'Rp ' . number_format($kindOfWorkDetail->mc_unit_price, 0, ',', '.')) }}"
                                                    id="mc_unit_price">
                                                @error('mc_unit_price')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                @php
                                                    $mcTotalPrice = ($kindOfWorkDetail->mc_unit_price ?? 0) * ($kindOfWorkDetail->mc_volume ?? 0);
                                                    $mcTotalPriceRupiah = 'Rp ' . number_format($mcTotalPrice, 0, ',', '.');
                                                @endphp
                                                <label class="form-label" for="mc_total_price">Total Harga</label>
                                                <input type="text" name="mc_total_price"
                                                    class="form-control @error('mc_total_price') is-invalid @enderror"
                                                    value="{{ old('mc_total_price', $mcTotalPriceRupiah) }}"
                                                    id="mc_total_price" readonly>
                                                @error('mc_total_price')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- hidden contract Value --}}
                                        <input type="text" hidden id="contractValue"
                                            value="{{ $kindOfWorkDetail->kindOfWork->task->contract_value }}">
                                        {{-- End --}}
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label">Nilai Pekerjaan</label>
                                                <input type="text" class="form-control" name="work_value"
                                                    value="{{ $kindOfWorkDetail->work_value }}" id="workValue" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 d-grid">
                                            <button type="submit" class="btn btn-success">Simpan</button>
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
    <script src="{{ asset('./assets/js/pages/contract-price.js') }}"></script>
    <script src="{{ asset('./assets/js/pages/mc-price.js') }}"></script>

    <script>
        // Ambil elemen input
        var contractValueInput = document.getElementById("contractValue");
        var mcTotalPriceInput = document.getElementById("mc_total_price");
        var mcUnitPriceInput = document.getElementById("mc_unit_price");
        var mcVolumeInput = document.getElementById("mc_volume");
        var workValueInput = document.getElementById("workValue");

        // Fungsi untuk menghapus karakter "Rp" dan titik-titik, lalu menghitung persentase
        function calculatePercentage() {
            var contractValueStr = contractValueInput.value;
            var mcTotalPriceStr = mcTotalPriceInput.value;

            // Hapus karakter "Rp" dan titik-titik
            var contractValueClean = parseFloat(contractValueStr.replace(/[^\d]/g, ''));
            var mcTotalPriceClean = parseFloat(mcTotalPriceStr.replace(/[^\d]/g, ''));

            // Lakukan perhitungan persentase
            if (!isNaN(contractValueClean) && !isNaN(mcTotalPriceClean)) {
                var percentage = (mcTotalPriceClean / contractValueClean) * 100;

                // Tampilkan hasil perhitungan di dalam input workValue
                workValueInput.value = percentage.toFixed(3) + "%";
            }
        }

        // Fungsi ini akan dijalankan saat dokumen telah dimuat
        window.addEventListener("load", function() {
            calculatePercentage();
        });

        // Tambahkan event listener ke mcUnitPriceInput
        mcUnitPriceInput.addEventListener("keyup", calculatePercentage);
        mcVolumeInput.addEventListener("keyup", calculatePercentage);
    </script>
@endpush
