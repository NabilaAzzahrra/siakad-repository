<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Mahasiswa</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            /* Adjusted for A4 portrait height (297mm minus padding and border) */
            outline: 2cm #FFEAEA solid;
        }

        td {
            padding-top: 5px;
        }

        .kp {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .logo {
            text-align: center;
            font-size: small;
        }

        .text {
            text-align: center;
            margin-top: 15px;
        }

        .cntr {
            font-size: small;
            text-align: left;
            margin-left: 40px;
            margin-right: 40px;
        }

        .translation {
            display: block;
            font-size: small;
            margin-top: -9px;
            font-style: italic;
        }

        table {
            border-collapse: collapse;
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 10px;
        }

        .ini {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: small;
            padding: 0;
        }

        .ttd {
            text-align: left;
            font-size: small;
            padding: 0px;
            margin-top: -10px;
            font-style: italic;
        }

        .ttd1 {
            text-align: left;
            font-size: small;
            padding: 0px;
        }

        .left {
            padding-left: 10px;
        }

        .footer {
            background: #204b8c;
            color: #fff;
            text-align: center;
            font-size: small;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .ket {
            margin-left: 290px;
        }

        body {
            font-family: 'Tahoma';
        }

        .tengah {
            text-align: center;
        }

        .page {
            width: 210mm;
            /* Adjusted for A4 portrait width */
            min-height: 297mm;
            /* Adjusted for A4 portrait height */
            padding: 0mm;
            margin: 0mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .page::before {
            content: "";
            top: 0;
            left: 0;
            width: 189px;
            height: 189px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .page::after {
            content: "";
            bottom: 0;
            right: 0;
            width: 794px;
            height: 49px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @page {
            size: A4 portrait;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                padding: 0mm;
                margin: 0mm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .page::before {
                content: "";
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                bottom: 0;
                right: 0;
                width: 794px;
                height: 49px;
                background-size: cover;
                background-repeat: no-repeat;
            }
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="book">
        @foreach ($students as $student)
            @php
                $nim = $student->nim;
            @endphp
            <div class="page" id="result">
                <div class="-ml-[585px]">
                    <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto">
                </div>
                <div class=" top-0 left-0 right-0 text-center -mt-[160px]">
                    <img src="{{ asset('img/logo.png') }}" width="10%" alt="Logo" class="mx-auto">
                </div>
                <div class="mb-4 left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                    TASIKMALAYA
                </div>
                <div class="mb-8 left-0 right-0 text-center text-sm font-bold">
                    DATA PRESTASI AKADEMIK
                </div>
                <div class="ml-12 text-[10px]">
                    <div class="flex">
                        <div>Nama</div>
                        <div class="ml-[63px] mr-4">:</div>
                        <div class="uppercase">{{ $student->nama }}</div>
                    </div>
                    <div class="flex mt-0">
                        <div>NIM</div>
                        <div class="ml-[70px] mr-4">:</div>
                        <div class="uppercase">{{ $student->nim }}</div>
                    </div>
                    <div class="flex mt-0">
                        <div>Tempat/Tgl Lahir</div>
                        <div class="ml-[14px] mr-4">:</div>
                        <div class="uppercase">{{ $student->tempat_lahir }} / {{ $student->tgl_lahir }}</div>
                    </div>
                    <div class="flex mt-0">
                        <div>Konsentrasi</div>
                        <div class="ml-[37px] mr-4">:</div>
                        <div class="uppercase">{{ $student->jurusan }}</div>
                    </div>
                </div>
                <div class="flex">
                    <div class="ml-[6px] left-0 right-0 text-center text-[10px] font-bold w-full">
                        <table class="border border-1 border-black w-full">
                            <thead>
                                <tr>
                                    <th class="border border-1 border-black" colspan="6">SEMESTER 1</th>
                                </tr>
                                <tr>
                                    <th class="border border-1 border-black">NO</th>
                                    <th class="border border-1 border-black">MATERI AJAR</th>
                                    <th class="border border-1 border-black">HM</th>
                                    <th class="border border-1 border-black">AM</th>
                                    <th class="border border-1 border-black">SKS</th>
                                    <th class="border border-1 border-black">M</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $jumlahSks = 0;
                                    $jumlahMutu = 0;
                                    $indexPrestasi = 0;
                                    $hasilIndexPrestasi = 0;
                                @endphp
                                @foreach ($prestasi1 as $item)
                                    @php
                                        $nilai = DB::table('vw_data_prestasi')
                                            ->where('nim', $student->nim)
                                            ->where('materi_ajar', $item->materi_ajar)
                                            ->first();

                                            //dd($nilai);

                                        $nilaiPresensi = $nilai->presensi ?? 0;
                                        $nilaiTugas = $nilai->tugas ?? 0;
                                        $nilaiFormatif = $nilai->formatif ?? 0;
                                        $nilaiUts = $nilai->uts ?? 0;
                                        $nilaiUas = $nilai->uas ?? 0;

                                        $idPerhitungan = $item->id_perhitungan ?? 0;
                                        $perhitungan = DB::table('perhitungan')->where('id', $idPerhitungan)->first();

                                        $perhitunganPresensi = $perhitungan->presensi ?? 0;
                                        $persenPresensi = $perhitunganPresensi / 100;
                                        $amPresensi = $nilaiPresensi * $persenPresensi;

                                        $perhitunganTugas = $perhitungan->tugas ?? 0;
                                        $persenTugas = $perhitunganTugas / 100;
                                        $amTugas = $nilaiTugas * $persenTugas;

                                        $perhitunganFormatif = $perhitungan->formatif ?? 0;
                                        $persenFormatif = $perhitunganFormatif / 100;
                                        $amFormatif = $nilaiFormatif * $persenFormatif;

                                        $perhitunganUts = $perhitungan->uts ?? 0;
                                        $persenUts = $perhitunganUts / 100;
                                        $amUts = $nilaiUts * $persenUts;

                                        $perhitunganUas = $perhitungan->uas ?? 0;
                                        $persenUas = $perhitunganUas / 100;
                                        $amUas = $nilaiUas * $persenUas;

                                        $jumlahAm = $amPresensi + $amTugas + $amFormatif + $amUts + $amUas;

                                        if ($jumlahAm < 50) {
                                            $huruf = 'E';
                                        } elseif ($jumlahAm < 55) {
                                            $huruf = 'D';
                                        } elseif ($jumlahAm < 60) {
                                            $huruf = 'C-';
                                        } elseif ($jumlahAm < 65) {
                                            $huruf = 'C';
                                        } elseif ($jumlahAm < 70) {
                                            $huruf = 'C+';
                                        } elseif ($jumlahAm < 75) {
                                            $huruf = 'B-';
                                        } elseif ($jumlahAm < 80) {
                                            $huruf = 'B';
                                        } elseif ($jumlahAm < 85) {
                                            $huruf = 'B+';
                                        } elseif ($jumlahAm < 90) {
                                            $huruf = 'A-';
                                        } else {
                                            $huruf = 'A';
                                        }

                                        if ($huruf == 'E') {
                                            $grade = '0.0';
                                        } elseif ($huruf == 'D') {
                                            $grade = '1.0';
                                        } elseif ($huruf == 'C-') {
                                            $grade = '1.6';
                                        } elseif ($huruf == 'C') {
                                            $grade = '2.0';
                                        } elseif ($huruf == 'C+') {
                                            $grade = '2.3';
                                        } elseif ($huruf == 'B-') {
                                            $grade = '2.6';
                                        } elseif ($huruf == 'B') {
                                            $grade = '3.0';
                                        } elseif ($huruf == 'B+') {
                                            $grade = '3.3';
                                        } elseif ($huruf == 'A-') {
                                            $grade = '3.6';
                                        } elseif ($huruf == 'A') {
                                            $grade = '4.0';
                                        }

                                        $sks = $item->sks ?? 0;
                                        $jumlahSks += $sks;

                                        $mutu = $grade * $sks;
                                        $jumlahMutu += $mutu;
                                        if ($jumlahSks > 0) {
                                            $indexPrestasi = $jumlahMutu / $jumlahSks;
                                        } else {
                                            $indexPrestasi = 0; // atau null, tergantung kebutuhan
                                        }

                                        if ($indexPrestasi < 2) {
                                            $hasilIndexPrestasi = 'KURANG';
                                        } elseif ($indexPrestasi < 2.6) {
                                            $hasilIndexPrestasi = 'CUKUP';
                                        } elseif ($indexPrestasi < 3) {
                                            $hasilIndexPrestasi = 'BAIK';
                                        } elseif ($indexPrestasi < 3.6) {
                                            $hasilIndexPrestasi = 'MEMUASKAN';
                                        } elseif ($indexPrestasi >= 3.6) {
                                            $hasilIndexPrestasi = 'SANGAT MEMUASKAN';
                                        } else {
                                            $hasilIndexPrestasi = '-';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="border border-1 border-black">{{ $no++ }}</td>
                                        <td class="border border-1 border-black text-left pl-2">{{ $item->materi_ajar }}
                                        </td>
                                        <td class="border border-1 border-black text-center pl-2">{{ $huruf }}
                                        </td>
                                        <td class="border border-1 border-black">{{ $grade }}</td>
                                        <td class="border border-1 border-black">{{ $item->sks }}</td>
                                        <td class="border border-1 border-black">{{ $mutu }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="border border-1 border-black">IP SMT 1 :
                                        {{ number_format($indexPrestasi, 2) }}
                                    </td>
                                    <td class="border border-1 border-black">{{ $jumlahSks }}</td>
                                    <td class="border border-1 border-black">{{ $jumlahMutu }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ml-[6px] mr-[90px] left-0 right-0 text-center text-[10px] font-bold w-full">
                        <table class="border border-1 border-black w-full">
                            <thead>
                                <tr>
                                    <th class="border border-1 border-black" colspan="6">SEMESTER 2</th>
                                </tr>
                                <tr>
                                    <th class="border border-1 border-black">NO</th>
                                    <th class="border border-1 border-black">MATERI AJAR</th>
                                    <th class="border border-1 border-black">HM</th>
                                    <th class="border border-1 border-black">AM</th>
                                    <th class="border border-1 border-black">SKS</th>
                                    <th class="border border-1 border-black">M</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $jumlahSks2 = 0;
                                    $jumlahMutu2 = 0;
                                    $indexPrestasi2 = 0;
                                    $hasilIndexPrestasi2 = 0;
                                @endphp
                                @foreach ($prestasi2 as $item2)
                                    @php
                                        $nilai2 = DB::table('vw_data_prestasi')
                                            ->where('nim', $student->nim)
                                            ->where('materi_ajar', $item2->materi_ajar)
                                            ->first();

                                        $nilaiPresensi2 = $nilai2->presensi ?? 0;
                                        $nilaiTugas2 = $nilai2->tugas ?? 0;
                                        $nilaiFormatif2 = $nilai2->formatif ?? 0;
                                        $nilaiUts2 = $nilai2->uts ?? 0;
                                        $nilaiUas2 = $nilai2->uas ?? 0;

                                        $idPerhitungan2 = $item2->id_perhitungan ?? 0;
                                        $perhitungan2 = DB::table('perhitungan')->where('id', $idPerhitungan2)->first();

                                        $perhitunganPresensi2 = $perhitungan2->presensi ?? 0;
                                        $persenPresensi2 = $perhitunganPresensi2 / 100;
                                        $amPresensi2 = $nilaiPresensi2 * $persenPresensi2;

                                        $perhitunganTugas2 = $perhitungan2->tugas ?? 0;
                                        $persenTugas2 = $perhitunganTugas2 / 100;
                                        $amTugas2 = $nilaiTugas2 * $persenTugas2;

                                        $perhitunganFormatif2 = $perhitungan2->formatif ?? 0;
                                        $persenFormatif2 = $perhitunganFormatif2 / 100;
                                        $amFormatif2 = $nilaiFormatif2 * $persenFormatif2;

                                        $perhitunganUts2 = $perhitungan2->uts ?? 0;
                                        $persenUts2 = $perhitunganUts2 / 100;
                                        $amUts2 = $nilaiUts2 * $persenUts2;

                                        $perhitunganUas2 = $perhitungan2->uas ?? 0;
                                        $persenUas2 = $perhitunganUas2 / 100;
                                        $amUas2 = $nilaiUas2 * $persenUas2;

                                        $jumlahAm2 = $amPresensi2 + $amTugas2 + $amFormatif2 + $amUts2 + $amUas2;

                                        if ($jumlahAm2 < 50) {
                                            $huruf2 = 'E';
                                        } elseif ($jumlahAm2 < 55) {
                                            $huruf2 = 'D';
                                        } elseif ($jumlahAm2 < 60) {
                                            $huruf2 = 'C-';
                                        } elseif ($jumlahAm2 < 65) {
                                            $huruf2 = 'C';
                                        } elseif ($jumlahAm2 < 70) {
                                            $huruf2 = 'C+';
                                        } elseif ($jumlahAm2 < 75) {
                                            $huruf2 = 'B-';
                                        } elseif ($jumlahAm2 < 80) {
                                            $huruf2 = 'B';
                                        } elseif ($jumlahAm < 85) {
                                            $huruf2 = 'B+';
                                        } elseif ($jumlahAm2 < 90) {
                                            $huruf2 = 'A-';
                                        } else {
                                            $huruf2 = 'A';
                                        }

                                        if ($huruf2 == 'E') {
                                            $grade2 = '0.0';
                                        } elseif ($huruf2 == 'D') {
                                            $grade2 = '1.0';
                                        } elseif ($huruf2 == 'C-') {
                                            $grade2 = '1.6';
                                        } elseif ($huruf2 == 'C') {
                                            $grade2 = '2.0';
                                        } elseif ($huruf2 == 'C+') {
                                            $grade2 = '2.3';
                                        } elseif ($huruf2 == 'B-') {
                                            $grade2 = '2.6';
                                        } elseif ($huruf2 == 'B') {
                                            $grade2 = '3.0';
                                        } elseif ($huruf2 == 'B+') {
                                            $grade2 = '3.3';
                                        } elseif ($huruf2 == 'A-') {
                                            $grade2 = '3.6';
                                        } elseif ($huruf2 == 'A') {
                                            $grade2 = '4.0';
                                        }

                                        $sks2 = $item2->sks ?? 0;
                                        $jumlahSks2 += $sks2;

                                        $mutu2 = $grade2 * $sks2;
                                        $jumlahMutu2 += $mutu2;
                                        if ($jumlahSks2 > 0) {
                                            $indexPrestasi2 = $jumlahMutu2 / $jumlahSks2;
                                        } else {
                                            $indexPrestasi2 = 0; // atau null, tergantung kebutuhan
                                        }

                                        if ($indexPrestasi2 < 2) {
                                            $hasilIndexPrestasi2 = 'KURANG';
                                        } elseif ($indexPrestasi2 < 2.6) {
                                            $hasilIndexPrestasi2 = 'CUKUP';
                                        } elseif ($indexPrestasi2 < 3) {
                                            $hasilIndexPrestasi2 = 'BAIK';
                                        } elseif ($indexPrestasi2 < 3.6) {
                                            $hasilIndexPrestasi2 = 'MEMUASKAN';
                                        } elseif ($indexPrestasi2 >= 3.6) {
                                            $hasilIndexPrestasi2 = 'SANGAT MEMUASKAN';
                                        } else {
                                            $hasilIndexPrestasi2 = '-';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="border border-1 border-black">{{ $no++ }}</td>
                                        <td class="border border-1 border-black text-left pl-2">
                                            {{ $item2->materi_ajar }}
                                        </td>
                                        <td class="border border-1 border-black text-center pl-2">{{ $huruf2 }}
                                        </td>
                                        <td class="border border-1 border-black">{{ $grade2 }}</td>
                                        <td class="border border-1 border-black">{{ $item2->sks }}</td>
                                        <td class="border border-1 border-black">{{ $mutu2 }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="border border-1 border-black">IP SMT 2 :
                                        {{ number_format($indexPrestasi2, 2) }}
                                    </td>
                                    <td class="border border-1 border-black">{{ $jumlahSks2 }}</td>
                                    <td class="border border-1 border-black">{{ $jumlahMutu2 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex">
                    <div class="ml-[6px] left-0 right-0 text-center text-[10px] font-bold w-full">
                        <table class="border border-1 border-black w-full">
                            <thead>
                                <tr>
                                    <th class="border border-1 border-black" colspan="6">SEMESTER 3</th>
                                </tr>
                                <tr>
                                    <th class="border border-1 border-black">NO</th>
                                    <th class="border border-1 border-black">MATERI AJAR</th>
                                    <th class="border border-1 border-black">HM</th>
                                    <th class="border border-1 border-black">AM</th>
                                    <th class="border border-1 border-black">SKS</th>
                                    <th class="border border-1 border-black">M</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $jumlahSks3 = 0;
                                    $jumlahMutu3 = 0;
                                    $indexPrestasi3 = 0;
                                    $hasilIndexPrestasi3 = 0;
                                @endphp
                                @foreach ($prestasi3 as $item3)
                                    @php
                                        $nilai3 = DB::table('vw_data_prestasi')
                                            ->where('nim', $student->nim)
                                            ->where('materi_ajar', $item3->materi_ajar)
                                            ->first();

                                        $nilaiPresensi3 = $nilai3->presensi ?? 0;
                                        $nilaiTugas3 = $nilai3->tugas ?? 0;
                                        $nilaiFormatif23= $nilai3->formatif ?? 0;
                                        $nilaiUts3 = $nilai3->uts ?? 0;
                                        $nilaiUas3 = $nilai3->uas ?? 0;

                                        $idPerhitungan3 = $item3->id_perhitungan ?? 0;
                                        $perhitungan3 = DB::table('perhitungan')->where('id', $idPerhitungan3)->first();

                                        $perhitunganPresensi3 = $perhitungan3->presensi ?? 0;
                                        $persenPresensi3 = $perhitunganPresensi3 / 100;
                                        $amPresensi3 = $nilaiPresensi3 * $persenPresensi3;

                                        $perhitunganTugas3 = $perhitungan3->tugas ?? 0;
                                        $persenTugas3 = $perhitunganTugas3 / 100;
                                        $amTugas3 = $nilaiTugas3 * $persenTugas3;

                                        $perhitunganFormatif3 = $perhitungan3->formatif ?? 0;
                                        $persenFormatif3 = $perhitunganFormatif3 / 100;
                                        $amFormatif3 = $nilaiFormatif3 * $persenFormatif3;

                                        $perhitunganUts3 = $perhitungan3->uts ?? 0;
                                        $persenUts3 = $perhitunganUts3 / 100;
                                        $amUts3 = $nilaiUts3 * $persenUts3;

                                        $perhitunganUas3 = $perhitungan3->uas ?? 0;
                                        $persenUas3 = $perhitunganUas3 / 100;
                                        $amUas3 = $nilaiUas3 * $persenUas3;

                                        $jumlahAm3 = $amPresensi3 + $amTugas3 + $amFormatif3 + $amUts3 + $amUas3;

                                        if ($jumlahAm3 < 50) {
                                            $huruf3 = 'E';
                                        } elseif ($jumlahAm3 < 55) {
                                            $huruf3 = 'D';
                                        } elseif ($jumlahAm3 < 60) {
                                            $huruf3 = 'C-';
                                        } elseif ($jumlahAm3 < 65) {
                                            $huruf3 = 'C';
                                        } elseif ($jumlahAm3 < 70) {
                                            $huruf3 = 'C+';
                                        } elseif ($jumlahAm3 < 75) {
                                            $huruf3 = 'B-';
                                        } elseif ($jumlahAm3 < 80) {
                                            $huruf3 = 'B';
                                        } elseif ($jumlahAm3 < 85) {
                                            $huruf3 = 'B+';
                                        } elseif ($jumlahAm3 < 90) {
                                            $huruf3 = 'A-';
                                        } else {
                                            $huruf3 = 'A';
                                        }

                                        if ($huruf3 == 'E') {
                                            $grade3 = '0.0';
                                        } elseif ($huruf3 == 'D') {
                                            $grade3 = '1.0';
                                        } elseif ($huruf3 == 'C-') {
                                            $grade3 = '1.6';
                                        } elseif ($huruf3 == 'C') {
                                            $grade3 = '2.0';
                                        } elseif ($huruf3 == 'C+') {
                                            $grade3 = '2.3';
                                        } elseif ($huruf3 == 'B-') {
                                            $grade3 = '2.6';
                                        } elseif ($huruf3 == 'B') {
                                            $grade3 = '3.0';
                                        } elseif ($huruf3 == 'B+') {
                                            $grade3 = '3.3';
                                        } elseif ($huruf3 == 'A-') {
                                            $grade3 = '3.6';
                                        } elseif ($huruf3 == 'A') {
                                            $grade3 = '4.0';
                                        }

                                        $sks3 = $item3->sks ?? 0;
                                        $jumlahSks3 += $sks3;

                                        $mutu3 = $grade3 * $sks3;
                                        $jumlahMutu3 += $mutu3;
                                        if ($jumlahSks3 > 0) {
                                            $indexPrestasi3 = $jumlahMutu3 / $jumlahSks3;
                                        } else {
                                            $indexPrestasi3 = 0; // atau null, tergantung kebutuhan
                                        }

                                        if ($indexPrestasi3 < 2) {
                                            $hasilIndexPrestasi3 = 'KURANG';
                                        } elseif ($indexPrestasi3 < 2.6) {
                                            $hasilIndexPrestasi3 = 'CUKUP';
                                        } elseif ($indexPrestasi3 < 3) {
                                            $hasilIndexPrestasi3 = 'BAIK';
                                        } elseif ($indexPrestasi3 < 3.6) {
                                            $hasilIndexPrestasi3 = 'MEMUASKAN';
                                        } elseif ($indexPrestasi3 >= 3.6) {
                                            $hasilIndexPrestasi3 = 'SANGAT MEMUASKAN';
                                        } else {
                                            $hasilIndexPrestasi3 = '-';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="border border-1 border-black">{{ $no++ }}</td>
                                        <td class="border border-1 border-black text-left pl-2">
                                            {{ $item3->materi_ajar }}
                                        </td>
                                        <td class="border border-1 border-black text-center pl-2">{{ $huruf3 }}
                                        </td>
                                        <td class="border border-1 border-black">{{ $grade3 }}</td>
                                        <td class="border border-1 border-black">{{ $item3->sks }}</td>
                                        <td class="border border-1 border-black">{{ $mutu3 }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="border border-1 border-black">IP SMT 3 :
                                        {{ number_format($indexPrestasi3, 2) }}
                                    </td>
                                    <td class="border border-1 border-black">{{ $jumlahSks3 }}</td>
                                    <td class="border border-1 border-black">{{ $jumlahMutu3 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ml-[6px] mr-[90px] left-0 right-0 text-center text-[10px] font-bold w-full">
                        <table class="border border-1 border-black w-full">
                            <thead>
                                <tr>
                                    <th class="border border-1 border-black" colspan="6">SEMESTER 4</th>
                                </tr>
                                <tr>
                                    <th class="border border-1 border-black">NO</th>
                                    <th class="border border-1 border-black">MATERI AJAR</th>
                                    <th class="border border-1 border-black">HM</th>
                                    <th class="border border-1 border-black">AM</th>
                                    <th class="border border-1 border-black">SKS</th>
                                    <th class="border border-1 border-black">M</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $jumlahSks4 = 0;
                                    $jumlahMutu4 = 0;
                                    $indexPrestasi4 = 0;
                                    $hasilIndexPrestasi4 = 0;
                                @endphp
                                @foreach ($prestasi4 as $item4)
                                    @php
                                        $nilai4 = DB::table('vw_data_prestasi')
                                            ->where('nim', $student->nim)
                                            ->where('materi_ajar', $item4->materi_ajar)
                                            ->first();

                                        $nilaiPresensi4 = $nilai4->presensi ?? 0;
                                        $nilaiTugas4 = $nilai4->tugas ?? 0;
                                        $nilaiFormatif4= $nilai4->formatif ?? 0;
                                        $nilaiUts4 = $nilai4->uts ?? 0;
                                        $nilaiUas4 = $nilai4->uas ?? 0;

                                        $idPerhitungan4 = $item4->id_perhitungan ?? 0;
                                        $perhitungan4 = DB::table('perhitungan')->where('id', $idPerhitungan4)->first();

                                        $perhitunganPresensi4 = $perhitungan4->presensi ?? 0;
                                        $persenPresensi4 = $perhitunganPresensi4 / 100;
                                        $amPresensi4 = $nilaiPresensi4 * $persenPresensi4;

                                        $perhitunganTugas4 = $perhitungan4->tugas ?? 0;
                                        $persenTugas4 = $perhitunganTugas4 / 100;
                                        $amTugas4 = $nilaiTugas4 * $persenTugas4;

                                        $perhitunganFormatif4 = $perhitungan4->formatif ?? 0;
                                        $persenFormatif4 = $perhitunganFormatif4 / 100;
                                        $amFormatif4 = $nilaiFormatif4 * $persenFormatif4;

                                        $perhitunganUts4 = $perhitungan4->uts ?? 0;
                                        $persenUts4 = $perhitunganUts4 / 100;
                                        $amUts4 = $nilaiUts4 * $persenUts4;

                                        $perhitunganUas4 = $perhitungan4->uas ?? 0;
                                        $persenUas4 = $perhitunganUas4 / 100;
                                        $amUas4 = $nilaiUas4 * $persenUas4;

                                        $jumlahAm4 = $amPresensi4 + $amTugas4 + $amFormatif4 + $amUts4 + $amUas4;

                                        if ($jumlahAm4 < 50) {
                                            $huruf4 = 'E';
                                        } elseif ($jumlahAm4 < 55) {
                                            $huruf4 = 'D';
                                        } elseif ($jumlahAm4 < 60) {
                                            $huruf4 = 'C-';
                                        } elseif ($jumlahAm4 < 65) {
                                            $huruf4 = 'C';
                                        } elseif ($jumlahAm4 < 70) {
                                            $huruf4 = 'C+';
                                        } elseif ($jumlahAm4 < 75) {
                                            $huruf4 = 'B-';
                                        } elseif ($jumlahAm4 < 80) {
                                            $huruf4 = 'B';
                                        } elseif ($jumlahAm4 < 85) {
                                            $huruf4 = 'B+';
                                        } elseif ($jumlahAm4 < 90) {
                                            $huruf4 = 'A-';
                                        } else {
                                            $huruf4 = 'A';
                                        }

                                        if ($huruf4 == 'E') {
                                            $grade4 = '0.0';
                                        } elseif ($huruf4 == 'D') {
                                            $grade4 = '1.0';
                                        } elseif ($huruf4 == 'C-') {
                                            $grade4 = '1.6';
                                        } elseif ($huruf4 == 'C') {
                                            $grade4 = '2.0';
                                        } elseif ($huruf4 == 'C+') {
                                            $grade4 = '2.3';
                                        } elseif ($huruf4 == 'B-') {
                                            $grade4 = '2.6';
                                        } elseif ($huruf4 == 'B') {
                                            $grade4 = '3.0';
                                        } elseif ($huruf4 == 'B+') {
                                            $grade4 = '3.3';
                                        } elseif ($huruf4 == 'A-') {
                                            $grade4 = '3.6';
                                        } elseif ($huruf4 == 'A') {
                                            $grade4 = '4.0';
                                        }

                                        $sks4 = $item4->sks ?? 0;
                                        $jumlahSks4 += $sks4;

                                        $mutu4 = $grade4 * $sks4;
                                        $jumlahMutu4 += $mutu4;
                                        if ($jumlahSks4 > 0) {
                                            $indexPrestasi4 = $jumlahMutu4 / $jumlahSks4;
                                        } else {
                                            $indexPrestasi4 = 0; // atau null, tergantung kebutuhan
                                        }

                                        if ($indexPrestasi4 < 2) {
                                            $hasilIndexPrestasi4 = 'KURANG';
                                        } elseif ($indexPrestasi4 < 2.6) {
                                            $hasilIndexPrestasi4 = 'CUKUP';
                                        } elseif ($indexPrestasi4 < 3) {
                                            $hasilIndexPrestasi4 = 'BAIK';
                                        } elseif ($indexPrestasi4 < 3.6) {
                                            $hasilIndexPrestasi4 = 'MEMUASKAN';
                                        } elseif ($indexPrestasi4 >= 3.6) {
                                            $hasilIndexPrestasi4 = 'SANGAT MEMUASKAN';
                                        } else {
                                            $hasilIndexPrestasi4 = '-';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="border border-1 border-black">{{ $no++ }}</td>
                                        <td class="border border-1 border-black text-left pl-2">
                                            {{ $item4->materi_ajar }}
                                        </td>
                                        <td class="border border-1 border-black text-center pl-2">{{ $huruf4 }}
                                        </td>
                                        <td class="border border-1 border-black">{{ $grade4 }}</td>
                                        <td class="border border-1 border-black">{{ $item4->sks }}</td>
                                        <td class="border border-1 border-black">{{ $mutu4 }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="border border-1 border-black">IP SMT 4 :
                                        {{ number_format($indexPrestasi4, 2) }}
                                    </td>
                                    <td class="border border-1 border-black">{{ $jumlahSks4 }}</td>
                                    <td class="border border-1 border-black">{{ $jumlahMutu4 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    @php
                        $ipk = 0;
                        $ip1 = $indexPrestasi;
                        $ip2 = $indexPrestasi2;
                        $ip3 = $indexPrestasi3;
                        $ip4 = $indexPrestasi4;

                        $ipArray = [$ip1, $ip2, $ip3, $ip4];
                                $jumlah_ip = count($ipArray);

                                $total_ip = array_sum($ipArray);

                        if ($jumlah_ip > 0) {
                            $ipk = $total_ip / $jumlah_ip;
                        }
                    @endphp

                    <div class="text-xs mt-4 flex items-center justify-start font-bold ml-10">INDEKS PRESTASI KUMULATIF
                        : {{ number_format($ipk, 2) }}</div>
                </div>
                <div class="italic text-left text-xs ml-10 mt-4 mr-4 font-normal">
                    <div>Catatan:</div>
                    <div>Kartu Hasil Studi ini hanya sah bila di bubuhi stempel lembaga dan tanda tangan Kepala Bagian
                        Akademik, Jika ada penghapusan / coretan pada Kartu Hasil Studi ini dinyatakan tidak sah.</div>
                </div>
                <div class="text-xs mt-4 flex items-center justify-start font-bold ml-10">
                    <div class="flex text-left">
                        <div>
                            @php
                                $month = date('F');
                                switch ($month) {
                                    case 'January':
                                        $bulan = 'JANUARI';
                                        break;
                                    case 'February':
                                        $bulan = 'FEBRUARI';
                                        break;
                                    case 'March':
                                        $bulan = 'MARET';
                                        break;
                                    case 'April':
                                        $bulan = 'APRIL';
                                        break;
                                    case 'May':
                                        $bulan = 'MEI';
                                        break;
                                    case 'June':
                                        $bulan = 'JUNI';
                                        break;
                                    case 'July':
                                        $bulan = 'JULI';
                                        break;
                                    case 'August':
                                        $bulan = 'AGUSTUS';
                                        break;
                                    case 'September':
                                        $bulan = 'SEPTEMBER';
                                        break;
                                    case 'October':
                                        $bulan = 'OKTOBER';
                                        break;
                                    case 'November':
                                        $bulan = 'NOVEMBER';
                                        break;
                                    case 'December':
                                        $bulan = 'DESEMBER';
                                        break;
                                    default:
                                        $bulan = 'UNKNOWN';
                                        break;
                                }

                            @endphp
                            <div class="text-[10px] uppercase">Tasikmalaya, {{ date('d') }}
                                {{ $bulan }} {{ date('Y') }}</div>
                            <div>LP3I TASIKMALAYA</div>
                            <div class="mt-16 underline underline-offset-2">UNTUNG EKO SETYASARI, S.SOS., M.A</div>
                            <div class="mt-0 underline-offset-2">Kepala Bagian Akademik</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-break"></div>
        @endforeach
    </div>

</body>

</html>
<script>
    // window.print();
</script>
