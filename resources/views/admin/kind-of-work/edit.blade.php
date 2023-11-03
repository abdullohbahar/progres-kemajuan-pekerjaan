@extends('admin.layout.app')

@section('title')
    Ubah Macam Pekerjaan
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
                        Ubah Macam Pekerjaan</h1>
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
                        <li class="breadcrumb-item text-muted">Ubah Macam Pekerjaan</li>
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
                <form action="{{ route('kind.of.work.update', $kindOfWork->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="kind_of_work_id" value="{{ $kindOfWork->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0 pt-5">
                                    <div class="card-toolbar">
                                        <a href="{{ route('show.task.report.admin', $kindOfWork->task_id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" id="multiple_name">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="work_name">Divisi</label>
                                                <select class="form-select" name="work_name" data-control="select2"
                                                    data-placeholder="Pilih Divisi" required>
                                                    <option></option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->name }}"
                                                            {{ old('name', $kindOfWork->name) == $division->name ? 'selected' : '' }}>
                                                            {{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" name="work_name" id="work_name"
                                                    value="{{ old('work_name', $kindOfWork->name) }}"
                                                    class="form-control @error('work_name') is-invalid @enderror"> --}}
                                                @error('work_name')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div data-repeater-list="multiple_name">
                                                <div data-repeater-item
                                                    data-deletable="{{ now() <= $kindOfWork->task->spk_date ? 'true' : 'false' }}">
                                                    <div class="row mt-5 justify-content-end">
                                                        <div class="col-8">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label" for="name">
                                                                    Pekerjaan</label>
                                                                <select class="form-select select2-opt" name="name"
                                                                    id="name" data-control="select2"
                                                                    data-placeholder="Pilih Pekerjaan" required>
                                                                    <option></option>
                                                                    @foreach ($tasks as $task)
                                                                        <option value="{{ $task->name }}"
                                                                            {{ old('name') == $task->name ? 'selected' : '' }}>
                                                                            {{ $task->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                {{-- <input type="text" name="name" id="name"
                                                                    value="{{ old('name') }}"
                                                                    class="form-control @error('name') is-invalid @enderror"> --}}
                                                                @error('name')
                                                                    <div id="validationServerUsernameFeedback"
                                                                        class="invalid-feedback text-capitalize">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="hidden" name="id" value=""
                                                                id="id">
                                                        </div>
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
                                                            {{-- @if (now() <= $kindOfWork->task->spk_date) --}}
                                                            <div class="form-group">
                                                                <label class="form-label"></label>
                                                                <div class="d-grid">
                                                                    <button type="button" href="javascript:;"
                                                                        data-repeater-delete class="btn btn-danger mt-3"
                                                                        id="dButton" name="dButton"
                                                                        value="Hapus">Hapus</button>
                                                                </div>
                                                            </div>
                                                            {{-- @endif --}}
                                                        </div>
                                                    </div>
                                                    <hr>
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
                                    <button type="submit" class="btn btn-success"> Simpan Pekerjaan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- deleted item --}}
                    <div id="listDeletedItem">
                    </div>
                </form>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    <input type="text" hidden value="{{ $expired }}" id="expired">
@endsection

@push('addons-js')
    <script src="{{ asset('./assets/plugins/custom/formrepeater/formrepeater.bundle.js?r=' . time()) }}"></script>

    <script>
        var dataFromDatabase = @json($kindOfWork->kindOfWorkDetails);

        var repeater = $('#multiple_name').repeater({
            initEmpty: false,

            show: function() {
                $(this).slideDown();
                $('.select2-opt').select2();
            },

            hide: function(deleteElement) {
                // Temukan elemen form yang berada dalam elemen data-repeater-item yang sesuai
                var formElement = $(this).closest('[data-repeater-item]').find(
                    'input[id="id"]');

                // Ambil nilai dari elemen input form
                var nilaiInput = formElement.val();

                // alert konfirmasi
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    html: "Data yang sudah dihapus tidak bisa dikembalikan! <br> Data akan benar-benar terhapus ketika anda telah klik <b> Simpan Pekerjaan </b>",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Berhasil',
                            '',
                            'success'
                        )
                        $(this).slideUp(deleteElement);
                        // Lakukan sesuatu dengan nilai input yang Anda dapatkan
                        console.log('Nilai input yang dihapus:', nilaiInput);

                        $("#listDeletedItem").append(`
                            <input type="text" name="deletedItem[]" hidden value=${nilaiInput}>
                        `)
                    }
                })
            },

            isFirstItemUndeletable: true,
        });

        dataFromDatabase.forEach(function(item, index) {
            // Dapatkan elemen Form Repeater yang ada
            var existingRepeater = repeater.find('[data-repeater-item]:last');

            // Clone elemen Form Repeater yang ada dan tambahkan sebagai elemen baru
            var newRepeater = existingRepeater.clone();
            newRepeater.find('select').val(item.name).trigger('change');

            // Setel nilai pada elemen input tersembunyi
            newRepeater.find('[name="id"]').val(item.id);

            // Atur elemen baru sebagai elemen terakhir dalam Form Repeater
            existingRepeater.after(newRepeater);

            // Inisialisasi select2 untuk elemen yang baru ditambahkan
            newRepeater.find('.select2-opt').select2({
                placeholder: "Pilih Pekerjaan",
                allowClear: true
            });
        });

        // Mengatur data dalam daftar
        repeater.setList(dataFromDatabase);

        var expired = $("#expired").val()

        if (!expired) {
            for (var i = 0; i < dataFromDatabase.length; i++) {
                $('button[name="multiple_name[' + i + '][dButton]"]').css('display', 'none');
            }
        }
    </script>
@endpush
