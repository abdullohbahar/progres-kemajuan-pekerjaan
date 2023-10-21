@extends('admin.layout.app')

@section('title')
    Ubah Data Konsultan Pengawas
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
                        Ubah Data Konsultan Pengawas</h1>
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
                        <li class="breadcrumb-item text-muted">Ubah Data Konsultan Pengawas</li>
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
                <form action="{{ route('supervising-consultant.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0 pt-5">
                                    <div class="card-toolbar">
                                        <a href="{{ route('supervising-consultant.index') }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Nama Perusahaan</label>
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name', $data->name) }}"
                                                    class="form-control edit-name @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="phone_number">Nomor HP</label>
                                                <input type="text" name="phone_number" id="phone_number"
                                                    value="{{ old('phone_number', $data->phone_number) }}"
                                                    class="form-control edit-phone_number @error('phone_number') is-invalid @enderror">
                                                @error('phone_number')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="cv_consultant_id">CV</label>
                                                <select name="cv_consultant_id" id="cv_consultant_id"
                                                    value="{{ old('cv_consultant_id') }}"
                                                    class="form-select form-select-solid @error('cv_consultant_id') is-invalid @enderror"
                                                    data-control="select2" data-placeholder="Pilih Perusahaan" required>
                                                    <option value="">-- Pilih CV --</option>
                                                    @foreach ($cvConsultants as $cvConsultant)
                                                        <option value="{{ $cvConsultant->id }}"
                                                            {{ old('cv_consultant_id', $data->cv_consultant_id) == $cvConsultant->id ? 'selected' : '' }}>
                                                            {{ $cvConsultant->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('cv_consultant_id')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="position">Jabatan</label>
                                                <input type="text" name="position" id="position"
                                                    value="{{ old('position', $data->position) }}"
                                                    class="form-control @error('position') is-invalid @enderror" required>
                                                @error('position')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" name="username" id="username"
                                                    value="{{ old('username', $data->user?->username) }}"
                                                    class="form-control @error('username') is-invalid @enderror" required>
                                                @error('username')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="username">Password</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    autocomplete="new-password">
                                                @error('password')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-grid mt-2">
                                            <button type="submit" class="btn btn-success">Simpan</button>
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
@endpush
