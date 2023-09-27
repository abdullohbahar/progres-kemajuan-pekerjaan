{{-- modal upload photo --}}
<div class="modal fade" tabindex="-1" id="modalTimeScheduleHistory">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Riwayat Perubahan Time Schedule</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body" style="overflow-x: scroll;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pekerjaan</th>
                            <th>Minggu Ke</th>
                            <th>Dari</th>
                            <th>Menjadi</th>
                            <th>Tanggal Merubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timeScheduleHistories as $history)
                            <tr>
                                <td>{{ $history->kindOfWorkDetail->name }}</td>
                                <td>{{ $history->week }}</td>
                                <td>{{ $history->from }}</td>
                                <td>{{ $history->to }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->created_at)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
