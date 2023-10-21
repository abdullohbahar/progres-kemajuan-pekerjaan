{{-- modal upload photo --}}
<div class="modal fade" tabindex="-1" id="showWeeklyProgressRejectRaeasonModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Alasan Penolakan Progress Mingguan</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body" style="overflow-x: scroll;">
                <div class="row">
                    <div class="col-12">
                        <h2> Data Progress Mingguan :
                        </h2>
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered table-striped" id="reject-rason-table">
                            <thead>
                                <tr>
                                    <th style="width: 50%">Nama Pekerjaan</th>
                                    <th style="width: 50%">Progress</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <h3>Alasan Penolakan:</h3>
                        <span id="rejectReason"></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
