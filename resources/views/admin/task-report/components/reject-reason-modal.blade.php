{{-- modal upload photo --}}
<div class="modal fade" tabindex="-1" id="rejectReasonModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Penolakan Pekerjaan</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td><b>Nama</b></td>
                            <td><b>Posisi</b></td>
                            <td><b>Status</b></td>
                            <td><b>Alasan</b></td>
                        </tr>
                        <tr id="supervisingConsultant">
                        </tr>
                        <tr id="partners">
                        </tr>
                        <tr id="siteSupervisor1">
                        </tr>
                        <tr id="siteSupervisor2">
                        </tr>
                        <tr id="ppk">
                        </tr>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
