<!--begin::Alert-->
<div class="alert alert-dismissible bg-warning d-flex flex-column flex-sm-row p-5 mb-10 mt-5">
    <!--begin::Icon-->
    <i class="ki-duotone ki-information fs-2hx text-dark me-4 mb-5 mb-sm-0"><span class="path1"></span><span
            class="path2"></span><span class="path3"></span></i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
        <!--begin::Title-->
        <h4 class="mb-2 light">Progress Mingguan Anda Ditolak</h4>
        <!--end::Title-->

        <!--begin::Content-->
        <span class="text-capitalize">Laporan Progress Mingguan Anda, Harap
            lakukan pengecekan ulang</span>
        <div class="row">
            <div class="col">
                <button class="btn btn-info btn-sm mt-2" id="showWeeklyProgressRejectRaeasonBtn"
                    data-taskreportid="{{ $taskReport->id }}">Lihat Alasan
                    Penolakan</button>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
        data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span class="path2"></span></i>
    </button>
    <!--end::Close-->
</div>
<!--end::Alert-->
