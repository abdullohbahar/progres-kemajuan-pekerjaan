<div class="modal fade" tabindex="-1" id="modalSendWeeklyProgress">
    <form action="{{ route('agree.from.partner') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Data Progress Minggu Ke-{{ $week }}</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="row" style="overflow-y:visible;">
                        <div class="col-12">
                            <table class="table table-bordered table-striped" id="tableWeeklyProgress">
                                <tr id="headerRow">
                                    <td><b>Nama Pekerjaan</b></td>
                                    <td><b>Progress</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{-- <div class="row mt-5 pt-5">
                        <div class="col-12">
                            <h3>Pekerjaan Untuk Minggu Selanjutnya</h3>
                            <table class="table table-bordered table-striped" id="timeSchedule">
                                <tr id="headerTimeSchedule">
                                    <td><b>Nama Pekerjaan</b></td>
                                    <td><b>Progress Time Schedule</b></td>
                                </tr>
                            </table>
                        </div>
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal fade" tabindex="-1" id="rejectWeeklyProgressModal">
    <form action="{{ route('reject.weekly.progress') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Apakah Anda Yakin Akan Menolak Progress Minggu Ke-{{ $week }}</h3>

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
                            <input type="hidden" name="week" id="rejectWeek">
                            <input type="hidden" name="taskID" id="rejectTaskID">
                            <input type="hidden" name="status" id="rejectStatus">
                            <input type="hidden" name="reject" id="rejectReject">

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

<div class="modal fade" tabindex="-1" id="rejectTaskReportModal">
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
                            <input type="hidden" name="userID" value="{{ $taskReport->supervising_consultant_id }}"
                                id="userID">
                            <input type="hidden" name="role" value="supervising_consultant" id="role">

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

<div class="modal fade" tabindex="-1" id="rejectTaskReportPartnerModal">
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
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="taskReportID" value="{{ $taskReport->id }}"
                                id="taskReportID">
                            <input type="hidden" name="userID" value="{{ $taskReport->partner_id }}"
                                id="userID">
                            <input type="hidden" name="role" value="partner" id="role">

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
