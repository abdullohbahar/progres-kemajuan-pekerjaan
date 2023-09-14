{{-- add konsultan modal --}}
<div class="modal fade" tabindex="-1" id="modalEdit">
    <div class="modal-dialog">
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Data CV Konsultan</h3>

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
                                <label class="form-label" for="name">Nama Perusahaan</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control edit-name @error('name') is-invalid @enderror">
                                @error('name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="phone_number">Nomor HP</label>
                                <input type="text" name="phone_number" id="phone_number"
                                    value="{{ old('phone_number') }}"
                                    class="form-control edit-phone_number @error('phone_number') is-invalid @enderror">
                                @error('phone_number')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="address">Alamat Perusahaan</label>
                                <textarea name="address" id="address" cols="20" rows="5"
                                    class="form-control edit-address @error('address') is-invalid @enderror"">{{ old('address') }}</textarea>
                                @error('address')
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
