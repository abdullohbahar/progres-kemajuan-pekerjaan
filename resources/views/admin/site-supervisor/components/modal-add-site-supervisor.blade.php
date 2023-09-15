{{-- add konsultan modal --}}
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <form action="{{ route('site-supervisor.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Data Pengawas Lapangan</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Nama Pengawas Lapangan</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="phone_number">Nomor HP</label>
                                <input type="text" name="phone_number" id="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number') }}" required>
                                @error('phone_number')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="nip">NIP</label>
                                <input type="text" name="nip" id="nip"
                                    class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}"
                                    required>
                                @error('nip')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="position">Jabatan</label>
                                <input type="text" name="position" id="position"
                                    class="form-control @error('position') is-invalid @enderror"
                                    value="{{ old('position') }}" required>
                                @error('position')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
