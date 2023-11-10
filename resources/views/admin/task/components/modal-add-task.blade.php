<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <form action="{{ route('admin.task.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Data Pekerjaan</h3>

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
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="Division" class="form-label mt-2">Divisi</label>
                            <select class="form-select @error('division_master_data_id') is-invalid @enderror"
                                name="division_master_data_id" data-control="select2" data-dropdown-parent="#kt_modal_1"
                                data-placeholder="Select an option" required>
                                <option value="">-- Pilih Divisi --</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            @error('division_master_data_id')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="Unit" class="form-label mt-2">Unit</label>
                            <select class="form-select @error('unit') is-invalid @enderror" name="unit"
                                data-control="select2" data-dropdown-parent="#kt_modal_1"
                                data-placeholder="Select an option" required>
                                <option value="">-- Pilih Unit --</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->unit }}">{{ $unit->unit }}</option>
                                @endforeach
                            </select>
                            @error('unit')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-capitalize">
                                    {{ $message }}
                                </div>
                            @enderror
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
