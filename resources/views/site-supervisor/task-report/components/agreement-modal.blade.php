<div class="modal fade" tabindex="-1" id="rejectTaskReportSiteSupervisorModal">
    <form action="{{ route('reject.task.report.agreement') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Apakah Anda Yakin Akan Menolak Data Pekerjaan Tersebut?</h3>

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
                            <input type="hidden" name="taskReportID" value="{{ $taskReport->id }}" id="taskReportID">
                            <input type="hidden" name="userID" value="{{ Auth::user()->siteSupervisor->id }}"
                                id="userID">
                            <input type="hidden" name="role" value="site_supervisor" id="role">

                            <label for="" class="form-label">Alasan Menolak</label>
                            <textarea name="information" class="form-control" id="" required cols="20" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>
            </div>
        </div>
    </form>
</div>
