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
                            <a href="{{ route('dashboard.admin') }}" class="text-muted text-hover-primary">Home</a>
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
                                <div class="card-toolbar">
                                    <a href="javascript: history.go(-1)" class="btn btn-sm btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <form action="{{ route('manage.work.update.admin', $kindOfWorkDetail->id) }}" method="POST"
                                id="myForm">
                                @csrf
                                @method('PUT')
                                {{-- <div class="card-body">
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
                                                @php
                                                    if ($kindOfWorkDetail->contract_unit_price != 0) {
                                                        $contractUnitPrice = 'Rp ' . number_format($kindOfWorkDetail->contract_unit_price, 0, ',', '.');
                                                    } else {
                                                        $contractUnitPrice = '';
                                                    }
                                                @endphp
                                                <label class="form-label" for="contract_unit_price">Harga Satuan</label>
                                                <input type="text" name="contract_unit_price"
                                                    class="form-control @error('contract_unit_price') is-invalid @enderror"
                                                    value="{{ old('contract_unit_price', $contractUnitPrice) }}"
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
                                                @php
                                                    $contractTotalPrice = ($kindOfWorkDetail->contract_unit_price ?? 0) * ($kindOfWorkDetail->contract_volume ?? 0);
                                                    if ($contractTotalPrice != 0) {
                                                        $contractTotalPriceRupiah = 'Rp ' . number_format($contractTotalPrice, 0, ',', '.');
                                                    } else {
                                                        $contractTotalPriceRupiah = '';
                                                    }
                                                @endphp
                                                <label class="form-label" for="total_contract_price">Total Harga</label>
                                                <input type="text" name="total_contract_price"
                                                    class="form-control @error('total_contract_price') is-invalid @enderror"
                                                    value="{{ old('total_contract_price', $contractTotalPriceRupiah) }}"
                                                    id="total_contract_price" name="total_contract_price" readonly>
                                                @error('total_contract_price')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- harga mc --}}
                                <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <h1>{{ $kindOfWorkDetail->kindOfWork->name }}</h1>
                                            <h6>{{ $kindOfWorkDetail->name }}</h6>
                                            <input type="hidden" id="idDetail" value="{{ $kindOfWorkDetail->id }}">
                                            <input type="hidden" id="kindOfWorkID"
                                                value="{{ $kindOfWorkDetail->kind_of_work_id }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h1>Harga MC</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_volume">Volume</label>
                                                <input type="text" name="mc_volume"
                                                    class="form-control @error('mc_volume') is-invalid @enderror"
                                                    value="{{ old('mc_volume', str_replace('.', ',', $kindOfWorkDetail->mc_volume)) }}"
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
                                                <input type="text" value="{{ $kindOfWorkDetail->mc_unit ?? $unit }}"
                                                    name="mc_unit" id="mc_unit" class="form-control" readonly>
                                                {{-- <select class="form-control @error('mc_unit') is-invalid @enderror" disabled
                                                    name="mc_unit" id="mc_unit" required>
                                                    <option value="">-- Pilih Unit --</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->unit }}"
                                                            {{ old('contract_unt', $kindOfWorkDetail->mc_unit) == $unit->unit ? 'selected' : '' }}>
                                                            {{ $unit->unit }}
                                                        </option>
                                                    @endforeach
                                                </select> --}}
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
                                                @php
                                                    if ($kindOfWorkDetail->mc_unit_price != 0) {
                                                        $mcUnitPrice = 'Rp ' . number_format($kindOfWorkDetail->mc_unit_price, 0, ',', '.');
                                                    } else {
                                                        $mcUnitPrice = '';
                                                    }
                                                @endphp
                                                <label class="form-label" for="mc_unit_price">Harga Satuan</label>
                                                <input type="text" name="mc_unit_price"
                                                    class="form-control @error('mc_unit_price') is-invalid @enderror"
                                                    value="{{ old('mc_unit_price', $mcUnitPrice) }}" id="mc_unit_price">
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
                                                    if ($mcTotalPrice != 0) {
                                                        $mcTotalPriceRupiah = 'Rp ' . number_format($mcTotalPrice, 2, ',', '.');
                                                    } else {
                                                        $mcTotalPriceRupiah = '';
                                                    }
                                                @endphp
                                                <label class="form-label" for="total_mc_price">Total Harga</label>
                                                <input type="text" name="total_mc_price"
                                                    class="form-control @error('total_mc_price') is-invalid @enderror"
                                                    value="{{ old('total_mc_price', $mcTotalPriceRupiah) }}"
                                                    id="total_mc_price" name="total_mc_price" readonly>
                                                @error('total_mc_price')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label">Nilai Pekerjaan</label>
                                                <input type="text" class="form-control" name="work_value"
                                                    value="{{ $kindOfWorkDetail->work_value }}%" id="workValue" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 d-grid">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- old value --}}
                                <input type="text" name="oldMcVolume" hidden value="{{ $kindOfWorkDetail->mc_volume }}"
                                    id="">
                                <input type="text" name="oldMcUnit" hidden value="{{ $kindOfWorkDetail->mc_unit }}"
                                    id="">
                                <input type="text" name="oldMcUnitPrice" hidden
                                    value="{{ $kindOfWorkDetail->mc_unit_price }}" id="">
                                <input type="text" name="oldTotalMcPrice" hidden
                                    value="{{ $kindOfWorkDetail->total_mc_price }}" id="">
                                <input type="text" name="oldWorkValue" hidden
                                    value="{{ $kindOfWorkDetail->work_value }}" id="">
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
    <script src="{{ asset('./assets/js/pages/contract-price.js?r=' . time()) }}"></script>
    <script src="{{ asset('./assets/js/pages/mc-price.js?r=' . time()) }}"></script>
    <script src="{{ asset('./assets/js/pages/count-percentage.js?r=' . time()) }}"></script>

    {{-- <script>
        // Ambil elemen input
        var mcTotalValueInput = document.getElementById("mcTotalValue");
        var mcTotalPriceInput = document.getElementById("total_mc_price");
        var mcUnitPriceInput = document.getElementById("mc_unit_price");
        var mcVolumeInput = document.getElementById("mc_volume");
        var workValueInput = document.getElementById("workValue");

        var mcAllValue = document.getElementById("mcAllValue")

        // Fungsi untuk menghapus karakter "Rp" dan titik-titik, lalu menghitung persentase
        function calculatePercentage() {
            mcTotalValueInput.value = ""

            var mcAllValueStr = mcAllValue.value;
            var mcAllValueClean = parseFloat(mcAllValueStr.replace(/[^\d]/g, ''));

            var mcTotalPriceStr = mcTotalPriceInput.value;
            var mcTotalPriceClean = parseFloat(mcTotalPriceStr.replace(/[^\d]/g, ''));

            // menghitung seluruh total harga dengan harga sekarang
            mcTotalValueInput.value = mcAllValueClean + mcTotalPriceClean

            var mcTotalValueStr = mcTotalValueInput.value;
            var mcTotalValueClean = parseFloat(mcTotalValueStr.replace(/[^\d]/g, ''));

            console.log(mcTotalValueClean)
            console.log(mcTotalPriceClean)

            // Lakukan perhitungan persentase
            if (!isNaN(mcTotalValueClean) && !isNaN(mcTotalPriceClean)) {
                var percentage = (mcTotalPriceClean / mcTotalValueClean) * 100;

                // Tampilkan hasil perhitungan di dalam input workValue
                workValueInput.value = percentage.toFixed(2) + "%";
            }
        }

        // Fungsi ini akan dijalankan saat dokumen telah dimuat
        window.addEventListener("load", function() {
            calculatePercentage();
        });

        // Tambahkan event listener ke mcUnitPriceInput
        mcUnitPriceInput.addEventListener("keyup", calculatePercentage);
        mcVolumeInput.addEventListener("keyup", calculatePercentage);
    </script> --}}
@endpush
