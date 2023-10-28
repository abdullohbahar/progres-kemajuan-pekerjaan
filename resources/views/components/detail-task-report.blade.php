<div class="card">
    <div class="card-header border-0 pt-5">
        <div class="card-toolbar">
            <a href="javascript: history.go(-1)" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            @if (auth()->user()->role == 'Acting Commitment Marker')
                @if ($taskReport->status == 'SCM 1' || $taskReport->status == 'SCM 2' || $taskReport->status == 'SCM 3')
                    <button class="btn btn-danger btn-sm" id="terminateContract" data-id="{{ $taskReport->id }}">Putus
                        Kontrak</button>
                @endif
            @endif
            <div class="dropdown">
                <button class="btn btn-info btn-sm dropdown-toggle mx-2 my-1" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Lihat Laporan
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('report', $taskReport->id) }}" class="dropdown-item" target="_blank">
                            Seluruh Laporan
                        </a>
                    </li>
                    @for ($i = 1; $i < $getWeek; $i++)
                        <li><a class="dropdown-item" target="_blank"
                                href="{{ route('weekly.report', [
                                    'id' => $taskReport->id,
                                    'week' => $i,
                                ]) }}">
                                Laporan Minggu Ke-{{ $i }}
                            </a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body" style="font-size: 14px">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <table class="table" style="width: 100%">
                    <tr>
                        <td style="width: 30%"><b>Nama Kegiatan</b></td>
                        <td class="vertically-centered">: {{ $taskReport->activity_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Nama Pekerjaan</b></td>
                        <td class="vertically-centered">: {{ $taskReport->task_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Lokasi</b></td>
                        <td class="vertically-centered">: {{ $taskReport->location }}</td>
                    </tr>
                    <tr>
                        <td><b>Tahun Anggaran</b></td>
                        <td class="vertically-centered">: {{ $taskReport->fiscal_year }}</td>
                    </tr>
                    <tr>
                        <td><b>Nilai Kontrak</b></td>
                        <td class="vertically-centered">: Rp {{ $taskReport->contract_value }}</td>
                    </tr>
                    <tr>
                        <td><b>Waktu Pelaksanaan</b></td>
                        <td class="vertically-centered">: {{ $taskReport->execution_time }} Hari
                            Kalender</td>
                    </tr>
                    <tr>
                        <td><b>Status</b></td>
                        <td class="vertically-centered">: {{ $taskReport->status }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-12 col-md-6">
                <table class="table" style="width: 100%">
                    <tr>
                        <td style="width: 30%"><b>CV / Penyedia Jasa</b></td>
                        <td class="vertically-centered">: {{ $taskReport->partner->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Nomor SPK</b></td>
                        <td class="vertically-centered">: {{ $taskReport->spk_number }}</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal SPK</b></td>
                        <td class="vertically-centered">: {{ $taskReport->spk_date }}</td>
                    </tr>
                    <tr>
                        <td><b>Konsultan Pengawas</b></td>
                        <td class="vertically-centered">:
                            {{ $taskReport->supervisingConsultant->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Pengawas Lapangan 1</b></td>
                        <td class="vertically-centered">:
                            {{ $taskReport->siteSupervisorFirst->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Pengawas Lapangan 2</b></td>
                        <td class="vertically-centered">:
                            {{ $taskReport->siteSupervisorSecond->name }}</td>
                    </tr>
                    <tr>
                        <td><b>PPK</b></td>
                        <td class="vertically-centered">:
                            {{ $taskReport->actingCommitmentMarker->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
