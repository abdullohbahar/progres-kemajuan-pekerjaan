<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRES KEMAJUAN PEKERJAAN</title>
</head>

<body>
    <div>
        <h4><b>PROGRES KEMAJUAN PEKERJAAN</b></h4>
    </div>
    <div>
        <div>
            <div>
                <table>
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
            <div class="col-sm-12 col-md-5">
                <table class="table table-borderless" style="width: 100%">
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

    <table>
        <tr class="fw-bolder text-center">
            <td rowspan="3" colspan="2">
                No
            </td>
            <td rowspan="3">
                Macam Pekerjaan
            </td>
            <td rowspan="3">
                Satuan
            </td>
            <td rowspan="3">
                Volume
            </td>
            <td rowspan="3">Harga Satuan (Rp)</td>
            <td rowspan="3">Jumlah Harga (Rp)</td>
            <td rowspan="3">Nilai Pekerjaan</td>
            <td colspan="{{ $schedules->count() }}">
                Minggu Ke</td>
        </tr>
        <tr class="text-center">
            @for ($i = 0; $i < $schedules->count(); $i++)
                <td>{{ $i + 1 }}</td>
            @endfor
        </tr>
        <tr>
            @foreach ($schedules as $schedule)
                <td class="text-center">{{ $schedule->date }}</td>
            @endforeach
        </tr>
        @php
            $totalWorkValue = 0; // Inisialisasi variabel total work value
            $totalPrice = 0; // Inisialisasi variabel total work value
            $totalProgressByWeek = []; // Inisialisasi array asosiatif untuk menyimpan total progress berdasarkan minggu
            $totalTimeSchedule = [];
        @endphp
        @foreach ($taskReport->kindOfWork as $key => $kindOfWork)
            <tr class="print-separate">
                <td class="text-center" colspan="2">{{ angkaKeRomawi($key + 1) }}</td>
                <td class="text-left fw-bolder" colspan="6">{{ $kindOfWork->name }}</td>
            </tr>
            @foreach ($kindOfWork->kindOfWorkDetails as $key => $kindOfWorkDetail)
                <tr class="print-separate">
                    <td></td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kindOfWorkDetail->name }}</td>
                    <td>{{ $kindOfWorkDetail->mc_unit }}</td>
                    <td>{{ str_replace('.', ',', $kindOfWorkDetail->mc_volume) }}</td>
                    <td class="text-end">{{ number_format($kindOfWorkDetail->mc_unit_price, 2, '.', ',') }}</td>
                    <td class="text-end">{{ number_format($kindOfWorkDetail->total_mc_price, 2, '.', ',') }}</td>
                    <td class="text-center">{{ $kindOfWorkDetail->work_value }}%</td>
                    @foreach ($kindOfWorkDetail->schedules as $key => $schedule)
                        <td class="text-center">
                            {{ $schedule->progress ?? 0 }}%
                        </td>

                        @php
                            // Mengambil minggu dan progress dari entri schedule saat ini
                            $week = $schedule->week;
                            $progress = $schedule->progress;

                            // Jika minggu ini belum ada dalam array totalProgressByWeek, inisialisasi dengan nilai 0
                            if (!isset($totalProgressByWeek[$week])) {
                                $totalProgressByWeek[$week] = 0;
                            }

                            // Menambahkan nilai progress saat ini ke total progress untuk minggu ini
                            $totalProgressByWeek[$week] += $progress;
                        @endphp
                    @endforeach
                </tr>
                @php
                    $totalWorkValue += $kindOfWorkDetail->work_value;
                    $totalPrice += $kindOfWorkDetail->total_mc_price;
                @endphp
            @endforeach
        @endforeach
        <tr class="print-separate">
            <td colspan="6" class="text-center fw-bolder">Jumlah Nilai Pekerjaan</td>
            <td class="text-end d-flex justify-content-between">
                <span class="">Rp</span>
                <span>{{ number_format($totalPrice, 2, '.', ',') }}
                </span>
            </td>
            <td class="text-center">{{ round($totalWorkValue) }}%</td>
        </tr>
        <tr class="print-separate">
            <td colspan="6" class="text-center fw-bolder">Kemajuan Pekerjaan Mingguan</td>
            <td colspan="2"></td>
            @foreach ($totalProgressByWeek as $key => $totalProgress)
                <td class="text-center">{{ $totalProgress }}%</td>
                @php
                    if ($totalProgress == 0) {
                        $totalTimeSchedule[] = 0;
                    } else {
                        $sum = 0;
                        for ($i = $key; $i >= 1; $i--) {
                            // dump($i);
                            $sum += $totalProgressByWeek[$i];
                        }

                        $totalTimeSchedule[] = round($sum, 2);
                    }
                @endphp
            @endforeach
        </tr>
        <tr class="print-separate">
            <td colspan="6" class="text-center fw-bolder">Kemajuan Pekerjaan Kumulatif</td>
            <td colspan="2"></td>
            @foreach ($totalTimeSchedule as $value)
                <td class="text-center">{{ $value }}%</td>
            @endforeach
        </tr>

        <tr class="print-separate">
            <td colspan="6" class="text-center fw-bolder">Time Schedule Pekerjaan Kumulatif</td>
            <td colspan="2"></td>
            @foreach ($cumulativeTimeSchedules as $key => $cumulativeTimeSchedule)
                <td class="text-center">{{ $cumulativeTimeSchedule }}%</td>
            @endforeach
        </tr>
    </table>

    <table style="width: 100%; margin-top: 200px;" class="print-separate">
        <tr>
            <td colspan="2">
                <br>
                <br>
                Mengetahui <br>
                Pejabat Pembuat Komitmen <br>
                Dinas Perhubungan Kab. Bantul
                <br>
                <br>
                <br>
                <br>
                <br>
                <u>{{ $ppk->name }}</u> <br>
                NIP. {{ $ppk->nip }}
            </td>
            <td colspan="2">
                <br>
                <br>
                Mengetahui <br>
                Tim Teknis Pelaksana Lapangan <br>
                <u>1. {{ $siteSupervisor1->name }}</u> <br>
                NIP. {{ $siteSupervisor1->nip }}
                <br>
                <br>
                <u>2. {{ $siteSupervisor2->name }}</u> <br>
                NIP. {{ $siteSupervisor2->nip }}
                <br>
                <br>
                <u>3. {{ $siteSupervisor3->name }}</u> <br>
                NIP. {{ $siteSupervisor3->nip }}
            </td>
            <td colspan="2" class="text-center">
                <br>
                <br>
                Disetujui <br>
                Penyedia Jasa <br>
                {{ $partner->cvConsultant->name }}
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <u>{{ $partner->name }}</u> <br>
                {{ $partner->position }}
            </td>
            <td colspan="3" class="text-center">
                <br>
                <br>
                Yogyakarta, {{ $formattedlastDateOfWeek }}<br>
                Dibuat <br>
                Konsultan Pengawas <br>
                {{ $supervisingConsultant->cvConsultant->name }}
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <u>{{ $supervisingConsultant->name }}</u> <br>
                {{ $supervisingConsultant->position }}
            </td>
        </tr>
    </table>
</body>

</html>


{{-- Konversi angka biasa ke romawi --}}
@php
    function angkaKeRomawi($angka)
    {
        $romawi = '';
        $angkaRomawi = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];

        foreach ($angkaRomawi as $simbol => $nilai) {
            while ($angka >= $nilai) {
                $romawi .= $simbol;
                $angka -= $nilai;
            }
        }

        return $romawi;
    }
@endphp
