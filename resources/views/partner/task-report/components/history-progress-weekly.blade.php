@foreach ($taskLastWeeks as $key => $lastWeeks)
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-5">Progress Minggu Ke-{{ $key }} </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td><b>Nama Pekerjaan</b></td>
                            <td><b>Progress</b></td>
                            {{-- <td><b>Foto</b></td> --}}
                        </tr>
                        @foreach ($lastWeeks as $lastWeek)
                            <tr>
                                <td style="width: 50%">{{ $lastWeek['name'] }}</td>
                                <td style="width: 25%">{{ $lastWeek['progress'] }}%</td>
                                <td style="width: 25%" class="text-center">
                                    <button class="btn btn-info btn-sm" href="javascript:;"
                                        data-kindofworkdetailid="{{ $lastWeek['kind_of_work_detail_id'] }}"
                                        data-week={{ $key }} id="seePictureOtherRole">Lihat
                                        Foto</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach
