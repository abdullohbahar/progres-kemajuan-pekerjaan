@php
    $roles = $taskReport->agreement->first()->role;

    if ($roles == 'Supervising Consultant') {
        $roles = 'Konsultan Pengawas';
    } elseif ($roles == 'Partner') {
        $roles = 'Konsultan Pengawas';
    } elseif ($roles == 'Site Supervisor') {
        $roles = 'Rekanan';
    } elseif ($roles == 'Site Supervisor 2') {
        $roles = 'Pengawas Lapangan 1';
    }
@endphp
<!--begin::Alert-->
<div class="alert alert-dismissible bg-info d-flex flex-column flex-sm-row p-5 mb-10 mt-5">
    <!--begin::Icon-->
    <i class="ki-duotone ki-information fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span
            class="path2"></span><span class="path3"></span></i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <!--begin::Title-->
        <h4 class="mb-2 text-light text-capitalize">{{ $roles }} Telah Mengirim Progress Mingguan</h4>
        <!--end::Title-->

        <!--begin::Content-->
        <span class="text-capitalize">Harap untuk melakukan pengecekan data dibawah</span>
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
