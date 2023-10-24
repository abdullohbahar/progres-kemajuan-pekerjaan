<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <title>PROGRES KEMAJUAN PEKERJAAN MINGGU KE-{{ $week }}</title>
    <style>
        body {
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>

<body style="font-size: 10pt">
    <div class="container mb-5">

    </div>
    <div class="container text-center">
        <h4><b>PROGRES KEMAJUAN PEKERJAAN MINGGU KE-{{ $week }}</b></h4>
    </div>
    <div class="card-body" style="font-size: 14px">
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <table class="table table-borderless" style="width: 100%">
                    <tr>
                        <td style="width: 30%"><b>Kegiatan</b></td>
                        <td class="vertically-centered">: {{ $taskReport->activity_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Pekerjaan</b></td>
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
                </table>
            </div>
            <div class="col-sm-12 col-md-5">
                <table class="table table-borderless" style="width: 100%">
                    <tr>
                        <td><b>Minggu Ke</b></td>
                        <td class="vertically-centered">: {{ $week }} ({{ $spelledNumber }})</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td class="vertically-centered">: {{ $formattedfirstDateOfWeek }} s/d
                            {{ $formattedlastDateOfWeek }}</td>
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
                        <td><b>Surat Pesanan</b></td>
                        <td class="vertically-centered">: {{ $taskReport->spk_number }}</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Perjanjian</b></td>
                        <td class="vertically-centered">: {{ $formattedAgreementDate }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr class="fw-bolder text-center">
            <td style="vertical-align: middle" colspan="2" rowspan="3">
                No
            </td>
            <td style="vertical-align: middle" rowspan="3">
                Macam Pekerjaan
            </td>
            <td colspan="3">
                MC-0
            </td>
            <td style="vertical-align: middle" rowspan="3">Bobot Tiap Pekerjaan</td>
            <td colspan="3">
                Progress Pelaksanaan Pekerjaan
            </td>
        </tr>
        <tr class="fw-bolder text-center">
            <td style="vertical-align: middle" rowspan="2">
                Satuan
            </td>
            <td style="vertical-align: middle" rowspan="2">
                Volume
            </td>
            <td style="vertical-align: middle" rowspan="2">Jumlah Harga (Rp)</td>
            <td>
                s/d Minggu Lalu
            </td>
            <td>Minggu Ini</td>
            <td>s/d Minggu Ini</td>
        </tr>
        <tr class="fw-bolder text-center">
            <td>Bobot (%)</td>
            <td>Bobot (%)</td>
            <td>Bobot (%)</td>
        </tr>
        @php
            $totalPrice = 0;
            $totalWorkValue = 0; // Inisialisasi variabel total work value
            $totalProgressNow = 0;
            $totalTimeSchedule = 0;
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
                    <td>{{ str_replace('.', ',', $kindOfWorkDetil->mc_volume) }}</td>
                    <td class="text-end">{{ number_format($kindOfWorkDetail->total_mc_price, 2, '.', ',') }}</td>
                    <td class="text-center">{{ $kindOfWorkDetail->work_value }}%</td>

                    {{-- minggu lalu --}}
                    @php
                        $progressLastWeek = 0;
                        for ($i = 1; $i < $week; $i++) {
                            $detailLastWeek = $kindOfWorkDetail->schedules->where('week', $i)->first();
                            $progressLastWeek += $detailLastWeek->progress ?? 0;
                        }
                    @endphp
                    <td>{{ $progressLastWeek }}%</td>

                    {{-- minggu ini --}}
                    @php
                        $detailThisWeek = $kindOfWorkDetail->schedules->where('week', $week)->first();
                        $progressThisWeek = $detailThisWeek->progress ?? 0;
                    @endphp
                    <td>{{ $progressThisWeek }}%</td>

                    {{-- minggu lalu + minggu ini --}}
                    @php
                        $progressNow = 0;
                        for ($i = 1; $i < $week + 1; $i++) {
                            // dump($i);
                            $detailNow = $kindOfWorkDetail->schedules->where('week', $i)->first();
                            $progressNow += $detailNow->progress ?? 0;
                        }
                    @endphp
                    <td>{{ $progressNow }}%</td>
                </tr>

                @php
                    $totalWorkValue += $kindOfWorkDetail->work_value;
                    $totalPrice += $kindOfWorkDetail->total_mc_price;
                    $totalProgressNow += $progressNow;
                @endphp

                @php
                    for ($i = 1; $i < $week + 1; $i++) {
                        $timeScheduleProgress = $kindOfWorkDetail->timeSchedules->where('week', $i)->first();
                        $totalTimeSchedule += $timeScheduleProgress->progress ?? 0;
                    }
                @endphp
            @endforeach
        @endforeach
        <tr class="fw-bolder text-end">
            <td colspan="3">Jumlah</td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalPrice, 2, '.', ',') }}</td>
            <td class="text-center">{{ round($totalWorkValue) }}%</td>
        </tr>
        <tr>
            <td colspan="14" style="height: 50px"></td>
        </tr>
        <tr>
            <td colspan="3" class="fw-bolder text-end">Bobot Penyelesaian</td>
            <td class="fw-bolder text-end">{{ $totalProgressNow }}%</td>
        </tr>
        <tr>
            <td colspan="3" class="fw-bolder text-end">Menurut Time Schedule</td>
            <td class="fw-bolder text-end">{{ $totalTimeSchedule }}%</td>
        </tr>
        <tr>
            <td colspan="3" class="fw-bolder text-end">Terlambat</td>
            <td class="fw-bolder text-end">{{ $totalProgressNow - $totalTimeSchedule }}%</td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 100px">
        <tr>
            <td colspan="2">
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
