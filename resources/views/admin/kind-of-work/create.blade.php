@extends('admin.layout.app')

@section('title')
    Tambah Macam Pekerjaan
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
                        Tambah Macam Pekerjaan</h1>
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
                        <li class="breadcrumb-item text-muted">Tambah Macam Pekerjaan</li>
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
                <form action="{{ route('kind.of.work.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" id="" value="{{ $task_id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0 pt-5">
                                    <div class="card-toolbar">
                                        <a href="{{ route('task-report.index') }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" id="multiple_name">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Nama Pekerjaan</label>
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div data-repeater-list="multiple_name">
                                                <div data-repeater-item>
                                                    <div class="row mt-5 justify-content-end">
                                                        <div class="col-8">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label" for="sub_name">Sub
                                                                    Pekerjaan</label>
                                                                <input type="text" name="sub_name" id="sub_name"
                                                                    value="{{ old('sub_name') }}"
                                                                    class="form-control @error('sub_name') is-invalid @enderror">
                                                                @error('sub_name')
                                                                    <div id="validationServerUsernameFeedback"
                                                                        class="invalid-feedback text-capitalize">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-3"></div>
                                                        <div class="col-8">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label"
                                                                    for="information">Keterangan</label>
                                                                <textarea name="information" class="form-control @error('information') is-invalid @enderror" id="information"
                                                                    cols="10" rows="2">{{ old('information') }}</textarea>
                                                                @error('information')
                                                                    <div id="validationServerUsernameFeedback"
                                                                        class="invalid-feedback text-capitalize">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Hapus</label>
                                                                <div class="d-grid">
                                                                    <a href="javascript:;" data-repeater-delete
                                                                        class="btn btn-danger">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-11 d-grid mt-4">
                                            <a href="javascript:;" data-repeater-create class="btn btn-light-primary">Tambah
                                                Sub
                                                Pekerjaan</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-grid">
                                    <button class="btn btn-success"> Simpan Pekerjaan</button>
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
    <script src="{{ asset('./assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>
        $('#multiple_name').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
@endpush
