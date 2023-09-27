@extends('admin.layout.app')

@section('title')
    Ubah Pekerjaan
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
                        Ubah Pekerjaan</h1>
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
                        <li class="breadcrumb-item text-muted">Ubah Pekerjaan</li>
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
                <form action="{{ route('update.task.report.admin', $taskReport->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0 pt-5">
                                    <div class="card-toolbar">
                                        <a href="{{ route('task.report') }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Nama Kegiatan</label>
                                                <input type="text" name="activity_name" id="name"
                                                    value="{{ old('activity_name', $taskReport->activity_name) }}"
                                                    class="form-control @error('activity_name') is-invalid @enderror"
                                                    required>
                                                @error('activity_name')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Nama Pekerjaan</label>
                                                <input type="text" name="task_name" id="name"
                                                    value="{{ old('task_name', $taskReport->task_name) }}"
                                                    class="form-control @error('task_name') is-invalid @enderror" required>
                                                @error('task_name')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Tahun Anggaran</label>
                                                <input type="number" min="1900" max="9999" name="fiscal_year"
                                                    id="name"
                                                    value="{{ old('fiscal_year', $taskReport->fiscal_year) }}"
                                                    class="form-control @error('fiscal_year') is-invalid @enderror" required
                                                    maxlength="4">
                                                @error('fiscal_year')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">No. SPK</label>
                                                <input type="text" name="spk_number" id="name"
                                                    value="{{ old('spk_number', $taskReport->spk_number) }}"
                                                    class="form-control @error('spk_number', $taskReport->spk_number) is-invalid @enderror"
                                                    required>
                                                @error('spk_number')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                @php
                                                    $spkDate = \Carbon\Carbon::parse($taskReport->spk_date)->format('Y-m-d');
                                                @endphp
                                                <label class="form-label" for="name">Tanggal SPK</label>
                                                <input type="date" name="spk_date" id="name"
                                                    value="{{ old('spk_date', $spkDate) }}"
                                                    class="form-control @error('spk_date') is-invalid @enderror" required>
                                                @error('spk_date')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Waktu Pelaksanan (Hari
                                                    Kalender)</label>
                                                <input type="number" name="execution_time" placeholder="misal: 40"
                                                    id="name"
                                                    value="{{ old('execution_time', $taskReport->execution_time) }}"
                                                    class="form-control @error('execution_time') is-invalid @enderror"
                                                    required>
                                                @error('execution_time')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="contract_value">Nilai Kontrak</label>
                                                <input type="text" name="contract_value" id="contract_value"
                                                    value="Rp {{ old('contract_value', $taskReport->contract_value) }}"
                                                    class="form-control @error('contract_value') is-invalid @enderror"
                                                    required>
                                                @error('contract_value')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="supervising_consultant_id">Konsultan
                                                    Pengawas</label>
                                                <select name="supervising_consultant_id" id="supervising_consultant_id"
                                                    value="{{ old('supervising_consultant_id') }}"
                                                    class="form-select form-select-solid @error('supervising_consultant_id') is-invalid @enderror"
                                                    required data-control="select2"
                                                    data-placeholder="Pilih Konsultan Pengawas">
                                                    <option value="">-- Pilih CV --</option>
                                                    @foreach ($supervisingConsultants as $supervisingConsultant)
                                                        <option value="{{ $supervisingConsultant->id }}"
                                                            {{ old('supervising_consultant_id', $taskReport->supervising_consultant_id) == $supervisingConsultant->id ? 'selected' : '' }}>
                                                            {{ $supervisingConsultant->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('supervising_consultant_id')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="partner_id">Rekanan</label>
                                                <select name="partner_id" id="partner_id"
                                                    value="{{ old('partner_id') }}"
                                                    class="form-select form-select-solid @error('partner_id') is-invalid @enderror"
                                                    required data-control="select2" data-placeholder="Pilih Rekanan">
                                                    <option value="">-- Pilih Rekanan --</option>
                                                    @foreach ($partners as $partner)
                                                        <option value="{{ $partner->id }}"
                                                            {{ old('partner_id', $taskReport->partner_id) == $partner->id ? 'selected' : '' }}>
                                                            {{ $partner->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('partner_id')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="site_supervisor_id_1">Pengawas Lapangan
                                                    1</label>
                                                <select name="site_supervisor_id_1" id="site_supervisor_id_1"
                                                    value="{{ old('site_supervisor_id_1') }}"
                                                    class="form-select form-select-solid @error('site_supervisor_id_1') is-invalid @enderror"
                                                    required data-control="select2"
                                                    data-placeholder="Pilih Pengawas Lapangan 1">
                                                    <option value="">-- Pilih CV --</option>
                                                    @foreach ($siteSupervisors as $siteSupervisor)
                                                        <option value="{{ $siteSupervisor->id }}"
                                                            {{ old('site_supervisor_id_1', $taskReport->site_supervisor_id_1) == $siteSupervisor->id ? 'selected' : '' }}>
                                                            {{ $siteSupervisor->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('site_supervisor_id_1')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="site_supervisor_id_2">Pengawas Lapangan
                                                    2</label>
                                                <select name="site_supervisor_id_2" id="site_supervisor_id_2"
                                                    value="{{ old('site_supervisor_id_2') }}"
                                                    class="form-select form-select-solid @error('site_supervisor_id_2') is-invalid @enderror"
                                                    required data-control="select2"
                                                    data-placeholder="Pilih Pengawas Lapangan 2">
                                                    <option value="">-- Pilih CV --</option>
                                                    @foreach ($siteSupervisors as $siteSupervisor)
                                                        <option value="{{ $siteSupervisor->id }}"
                                                            {{ old('site_supervisor_id_2', $taskReport->site_supervisor_id_2) == $siteSupervisor->id ? 'selected' : '' }}>
                                                            {{ $siteSupervisor->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('site_supervisor_id_2')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="acting_commitment_marker_id">PPK</label>
                                                <select name="acting_commitment_marker_id"
                                                    id="acting_commitment_marker_id"
                                                    value="{{ old('acting_commitment_marker_id') }}"
                                                    class="form-select form-select-solid @error('acting_commitment_marker_id') is-invalid @enderror"
                                                    required data-control="select2" data-placeholder="Pilih PPK">
                                                    <option value="">-- Pilih CV --</option>
                                                    @foreach ($actingCommitmentMarkers as $actingCommitmentMarker)
                                                        <option value="{{ $actingCommitmentMarker->id }}"
                                                            {{ old('acting_commitment_marker_id', $taskReport->acting_commitment_marker_id) == $actingCommitmentMarker->id ? 'selected' : '' }}>
                                                            {{ $actingCommitmentMarker->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('acting_commitment_marker_id')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror" required
                                                    id="status">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="Aktif"
                                                        {{ old('status', $taskReport->status) == 'Aktif' ? 'selected' : '' }}>
                                                        Aktif</option>
                                                    <option value="SP 1"
                                                        {{ old('status', $taskReport->status) == 'SP 1' ? 'selected' : '' }}>
                                                        SP 1</option>
                                                    <option value="SCM 1"
                                                        {{ old('status', $taskReport->status) == 'SCM 1' ? 'selected' : '' }}>
                                                        SCM 1</option>
                                                    <option value="SCM 2"
                                                        {{ old('status', $taskReport->status) == 'SCM 2' ? 'selected' : '' }}>
                                                        SCM 2</option>
                                                    <option value="SCM 3"
                                                        {{ old('status', $taskReport->status) == 'SCM 3' ? 'selected' : '' }}>
                                                        SCM 3</option>
                                                </select>
                                                @error('status')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-grid mt-2">
                                            <button type="submit" class="btn btn-success">Ubah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection

@push('addons-js')
    <script src="{{ asset('./assets/js/pages/format-rupiah.js') }}"></script>
@endpush
