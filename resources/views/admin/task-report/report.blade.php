<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <title>PROGRES KEMAJUAN PEKERJAAN</title>
</head>

<body style="font-size: 12px">
    <div class="container mb-5">

    </div>
    <div class="container text-center">
        <h4><b>PROGRES KEMAJUAN PEKERJAAN</b></h4>
    </div>
    <div class="card-body" style="font-size: 14px">
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <table class="table table-borderless" style="width: 100%">
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

    <table class="table table-bordered">
        <tr class="fw-bolder text-center">
            <td rowspan="3" style="vertical-align: middle" colspan="2">
                No
            </td>
            <td rowspan="3" style="vertical-align: middle">
                Macam Pekerjaan
            </td>
            <td rowspan="3" style="vertical-align: middle">
                Satuan
            </td>
            <td rowspan="3" style="vertical-align: middle">
                Volume
            </td>
            <td rowspan="3" style="vertical-align: middle">Harga Satuan (Rp)</td>
            <td rowspan="3" style="vertical-align: middle">Jumlah Harga (Rp)</td>
            <td rowspan="3" style="vertical-align: middle">Nilai Pekerjaan</td>
            <td colspan="{{ $schedules->count() }}">
                Minggu Ke</td>
        </tr>
        <tr class="text-center">
            @for ($i = 0; $i < $schedules->count(); $i++)
                <td>{{ $i + 1 }}</td>
            @endfor
        </tr class="text-center">
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
            <tr>
                <td class="text-center" colspan="2">{{ angkaKeRomawi($key + 1) }}</td>
                <td class="text-center fw-bolder">{{ $kindOfWork->name }}</td>
            </tr>
            @foreach ($kindOfWork->kindOfWorkDetails as $key => $kindOfWorkDetail)
                <tr>
                    <td></td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kindOfWorkDetail->name }}</td>
                    <td>{{ $kindOfWorkDetail->mc_unit }}</td>
                    <td>{{ $kindOfWorkDetail->mc_volume }}</td>
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
        <tr>
            <td colspan="7"></td>
            <td class="text-center">{{ round($totalWorkValue) }}%</td>
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
                    
                        $totalTimeSchedule[] = $sum;
                    }
                @endphp
            @endforeach
        </tr>
        <tr>
            <td colspan="7"></td>
            <td></td>
            @foreach ($totalTimeSchedule as $value)
                <td class="text-center">{{ $value }}%</td>
            @endforeach
        </tr>
        <tr>
            <td colspan="6"></td>
            <td class="text-end d-flex justify-content-between">
                <span class="">Rp</span>
                <span>{{ number_format($totalPrice, 0, ',', '.') }}
                </span>
            </td>
            <td></td>
            @foreach ($totalProgressByWeek as $key => $totalProgress)
                <td class="text-center">{{ $totalProgress }}%</td>
            @endforeach
        </tr>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
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
