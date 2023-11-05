<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat SP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .garis {
            border-top: 5px solid black;
            border-bottom: 1px solid black;
            padding: 1px 0;
        }

        /* body {
            margin-left: 1.5cm;
            margin-top: 1cm;
            margin-right: 1.5cm;
            margin-bottom: 1cm;
        } */

        p {
            line-height: 1.5;
            /* Contoh: jarak antar paragraf 1.5 kali tinggi font */
        }

        @media print {
            body {
                margin-left: 1.5cm;
                margin-top: 1cm;
                margin-right: 1.5cm;
                margin-bottom: 1cm;
            }

            /* Contoh: menyembunyikan elemen dengan class "no-print" */
            .no-print {
                display: none;
            }

            /* Contoh: mengatur font cetakan khusus */
            p {
                font-family: "Times New Roman", Times, serif;
                font-size: 12pt;
                line-height: 1.5;
            }
        }

        @page {
            size: 215.9mm 330.2mm;
        }
    </style>
</head>

<body>
    {{-- space kosong untuk kop --}}
    <div class="text-center">
        {{-- <h1>Disini Kop</h1> --}}
    </div>
    <div class="garis" style="margin-top: 5cm">

    </div>
    {{-- tanggal --}}
    <div class="row">
        <div class="text-end mt-4">
            Yogyakarta, {{ $formattedTanggalSPKeluar }}
        </div>
    </div>

    {{-- Perihal --}}
    <table>
        <tr>
            <td>Nomor</td>
            <td style="padding-right: 5px; padding-left: 5px">:</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/
                {{ $monthOut }} / {{ $yearOut }}
            </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td style="padding-right: 5px; padding-left: 5px">:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td style="padding-right: 5px; padding-left: 5px">:</td>
            <td><b>Teguran</b></td>
        </tr>
    </table>

    <p style="margin-top: 0.5cm">Yth, <br>
        Pimpinan<br>
        <b>{{ $partnerCv }}</b><br>
        Di {{ $partnerCvAddress }}
    </p>

    {{-- isi surat --}}
    <p>Dengan hormat,</p>
    <p>Sehubung dengan pelaksanaan pekerjaan {{ $taskReport->task_name }}, yang pelaksanaannya dipercayakan kepada
        {{ $partnerCv }}, dan
        kami selaku konsultan pengawas dari {{ $supervisingConsultantCv }}. </p>
    <p>
        Setelah kami melihat adanya keterlambatan pada proses pekerjaan yang sekiranya menurut Time Schedule yang ada.
        Sampai minggu ke <b>{{ $spWeek }} ({{ $spWeekTerbilang }})</b> tanggal {{ $firstDateOfWeek }} s/d
        {{ $lastDateOfWeek }} harus
        sudah mencapai
        <b>{{ $timeScheduleTilThisWeek }}%</b> akan
        tetapi progress yang dicapai baru <b>{{ $progressTillThisWeek }}%</b>, sehingga terjadi keterlambatan
        <b>{{ $lateProgress }}%</b>.
    </p>
    <p>Dengan kondisi tersebut diatas, kami memberikan Teguran, dan memerintahkan kepada kontraktor pelaksana untuk
        segera mempercepat pekerjaannya.</p>
    <p>Demikian Surat teguran ini kami buat untuk menjadi periksa dan mohon untuk segera ditindaklanjut di lapangan.</p>

    {{-- TTD --}}
    <div class="text-end">
        <p>Konsultan Pengawas <br>
            {{ $supervisingConsultantCv }}
            <br>
            <br>
            <br>
            <br>
            <br>
            <u style="text-transform:uppercase">{{ $supervisingConsultantName }}</u>
        </p>
    </div>

    <div>
        <i><u>Tembusan :</u></i> <br>
        1. PPK <br>
        2. PPHP <br>
        3. Ketua Tim Pemeriksa dari Dinas PUPKP Kabupaten Bantul <br>
        4. Konsultan Perencana <br>
        5. Arsip <br>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
