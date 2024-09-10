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
            /* font: 12pt "Tahoma"; */
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
            /* padding-top: 5px; */
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
            /* margin-top: 15px; */
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

        /* body {
            font-family: 'Tahoma';
        } */

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
            position: absolute;
            top: 0;
            left: 0;
            width: 189px;
            height: 189px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .page::after {
            content: "";
            position: absolute;
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
                position: absolute;
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                position: absolute;
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
        @php
            $no = 1;
            $hasil = 1;
        @endphp
        @foreach ($stu_data as $student)
            @php
                $nim = $student->nim;
                $formatted_hasil = sprintf('%03d', $hasil);
            @endphp
            <div class="page" id="result">
                <div class="-ml-[585px]">
                    <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto">
                </div>
                <div class="absolute top-0 left-0 right-0 text-center mt-12">
                    <img src="{{ asset('img/logo-lp3i.png') }}" width="30%" alt="Logo" class="mx-auto">
                </div>
                <div class="absolute top-[140px] left-0 right-0 text-center text-[18px] font-bold">
                    ACADEMIC TRANSCRIPT
                </div>
                <div class="absolute top-[160px] left-0 right-0 text-center text-[12px] italic">
                    TRANSKRIP AKADEMIK
                </div>
                <div class="absolute top-[180px] left-0 right-0 text-center text-sm font-bold">
                    No. {{ $formatted_hasil }}.T001.025.T.{{date('my', strtotime($bulan_tahuns))}}
                </div>
                @php
                    $hasil++;
                @endphp
                <div class="ml-12 mt-4 text-[12px]">
                    <div class="flex font-bold">
                        <div class="">Name</div>
                        <div class="ml-[144px] mr-4">:</div>
                        <div class="">{{ $student->nama }}</div>
                    </div>
                    <div class="flex -mt-2 italic">
                        <div>Nama</div>
                    </div>
                    <div class="flex -mt-1 font-bold">
                        <div>Student Registration Number</div>
                        <div class="ml-[11px] mr-4">:</div>
                        <div class="uppercase">{{ $student->nim }}</div>
                    </div>
                    <div class="flex -mt-2 italic">
                        <div>Nomor Induk Peserta Didik</div>
                    </div>
                    <div class="flex -mt-1 font-bold">
                        <div>Place and Date Birth</div>
                        <div class="ml-[62px] mr-4">:</div>
                        <div class="">{{ $student->tempat_lahir }} / {{ $student->tgl_lahir }}</div>
                    </div>
                    <div class="flex -mt-2 italic">
                        <div>Tempat dan Tanggal Lahir</div>
                    </div>
                    <div class="flex -mt-1 font-bold">
                        <div>Program</div>
                        <div class="ml-[128px] mr-4">:</div>
                        <div class="">{{ $student->jurusan }}</div>
                    </div>
                    <div class="flex -mt-2 italic">
                        <div>Bidang Keahlian</div>
                    </div>
                </div>

                <div class="ml-[6px] mr-[90px] left-0 right-0 text-center text-sm font-bold">
                    <table class="border border-1 border-black w-full">
                        <thead>
                            <tr class="h-[1px]">
                                <th class="border border-1 border-black text-[10px] bg-[#808080] text-white w-8"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;"
                                    rowspan="2">NO</th>
                                <th class="border border-1 border-black text-[10px] bg-[#808080] text-white w-96"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;"
                                    rowspan="2">SUBJECT</th>
                                <th class="border border-1 border-black text-[10px] bg-[#808080] text-white"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;"
                                    rowspan="2">CREDIT</th>
                                <th class="border border-1 border-black text-[10px] bg-[#808080] text-white"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;"
                                    colspan="3">RESULT</th>
                            </tr>
                            <tr>
                                <th class="border border-1 border-black text-[10px] bg-[#808080] text-white">SCORE</th>
                                <th class="border border-1 border-black text-[10px] bg-[#808080] text-white">GRADE</th>
                                <th class="border border-1 border-black text-[10px] bg-[#808080] text-white">POINT
                                    EARNED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    SEMESTER 1
                                </td>
                            </tr>
                            @php
                                $no = 1;
                                $jumlahSks_1 = 0;
                                $jumlahMutu_1 = 0;
                                $indexPrestasi_1 = 0;
                            @endphp
                            @foreach ($detail_kurikulum_1 as $dk1)
                                @php
                                    if ($dk1->id_perhitungan != null) {
                                        $perhitunganPresensi_1 = $perhitungan_1->presensi;
                                        $persenPresensi_1 = $perhitunganPresensi_1 / 100;
                                        $nilaiPresensi_1 =
                                            $nilaiPerMahasiswa[$student->nim][$dk1->id_jadwal]->presensi ?? '0';
                                        $amPresensi_1 = $nilaiPresensi_1 * $persenPresensi_1;

                                        $perhitunganTugas_1 = $perhitungan_1->tugas;
                                        $persenTugas_1 = $perhitunganTugas_1 / 100;
                                        $nilaiTugas_1 =
                                            $nilaiPerMahasiswa[$student->nim][$dk1->id_jadwal]->tugas ?? '0';
                                        $amTugas_1 = $nilaiTugas_1 * $persenTugas_1;

                                        $perhitunganFormatif_1 = $perhitungan_1->formatif;
                                        $persenFormatif_1 = $perhitunganFormatif_1 / 100;
                                        $nilaiFormatif_1 =
                                            $nilaiPerMahasiswa[$student->nim][$dk1->id_jadwal]->formatif ?? '0';
                                        $amFormatif_1 = $nilaiFormatif_1 * $persenFormatif_1;

                                        $perhitunganUts_1 = $perhitungan_1->uts;
                                        $persenUts_1 = $perhitunganUts_1 / 100;
                                        $nilaiUts_1 = $nilaiPerMahasiswa[$student->nim][$dk1->id_jadwal]->uts ?? '0';
                                        $amUts_1 = $nilaiUts_1 * $persenUts_1;

                                        $perhitunganUas_1 = $perhitungan_1->uas;
                                        $persenUas_1 = $perhitunganUas_1 / 100;
                                        $nilaiUas_1 = $nilaiPerMahasiswa[$student->nim][$dk1->id_jadwal]->uas ?? '0';
                                        $amUas_1 = $nilaiUas_1 * $persenUas_1;

                                        $jumlahAm_1 = $amPresensi_1 + $amTugas_1 + $amFormatif_1 + $amUts_1 + $amUas_1;

                                        if ($jumlahAm_1 < 50) {
                                            $huruf_1 = 'E';
                                        } elseif ($jumlahAm_1 < 55) {
                                            $huruf_1 = 'D';
                                        } elseif ($jumlahAm_1 < 60) {
                                            $huruf_1 = 'C-';
                                        } elseif ($jumlahAm_1 < 65) {
                                            $huruf_1 = 'C';
                                        } elseif ($jumlahAm_1 < 70) {
                                            $huruf_1 = 'C+';
                                        } elseif ($jumlahAm_1 < 75) {
                                            $huruf_1 = 'B-';
                                        } elseif ($jumlahAm_1 < 80) {
                                            $huruf_1 = 'B';
                                        } elseif ($jumlahAm_1 < 85) {
                                            $huruf_1 = 'B+';
                                        } elseif ($jumlahAm_1 < 90) {
                                            $huruf_1 = 'A-';
                                        } else {
                                            $huruf_1 = 'A';
                                        }

                                        if ($huruf_1 == 'E') {
                                            $grade_1 = '0.0';
                                        } elseif ($huruf_1 == 'D') {
                                            $grade_1 = '1.0';
                                        } elseif ($huruf_1 == 'C-') {
                                            $grade_1 = '1.6';
                                        } elseif ($huruf_1 == 'C') {
                                            $grade_1 = '2.0';
                                        } elseif ($huruf_1 == 'C+') {
                                            $grade_1 = '2.3';
                                        } elseif ($huruf_1 == 'B-') {
                                            $grade_1 = '2.6';
                                        } elseif ($huruf_1 == 'B') {
                                            $grade_1 = '3.0';
                                        } elseif ($huruf_1 == 'B+') {
                                            $grade_1 = '3.3';
                                        } elseif ($huruf_1 == 'A-') {
                                            $grade_1 = '3.6';
                                        } elseif ($huruf_1 == 'A') {
                                            $grade_1 = '4.0';
                                        }
                                        $sks_1 = $dk1->sks;
                                        $mutu_1 = $grade_1 * $sks_1;
                                        $jumlahSks_1 += $sks_1;
                                        $jumlahMutu_1 += $mutu_1;

                                        $indexPrestasi_1 = $jumlahMutu_1 / $jumlahSks_1;

                                        if ($indexPrestasi_1 < 2) {
                                            $hasilIndexPrestasi_1 = 'KURANG';
                                        } elseif ($indexPrestasi_1 < 2.6) {
                                            $hasilIndexPrestasi_1 = 'CUKUP';
                                        } elseif ($indexPrestasi_1 < 3) {
                                            $hasilIndexPrestasi_1 = 'BAIK';
                                        } elseif ($indexPrestasi_1 < 3.6) {
                                            $hasilIndexPrestasi_1 = 'MEMUASKAN';
                                        } elseif ($indexPrestasi_1 >= 3.6) {
                                            $hasilIndexPrestasi_1 = 'SANGAT MEMUASKAN';
                                        }
                                    } else {
                                        $huruf_1 = 'E';
                                        $grade_1 = '0.0';
                                        $mutu_1 = 0;
                                        $sks_1 = $dk1->sks;
                                        $jumlahSks_1 += $sks_1;
                                    }

                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                        {{ $no++ }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $dk1->materi_ajar }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                        {{ $dk1->sks }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $grade_1 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $huruf_1 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $mutu_1 }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    SEMESTER 2
                                </td>
                            </tr>
                            @php
                                $no = 1;
                                $jumlahSks_2 = 0;
                                $jumlahMutu_2 = 0;
                                $indexPrestasi_2 = 0;
                            @endphp
                            @foreach ($detail_kurikulum_2 as $dk2)
                                @php
                                    if ($dk2->id_perhitungan != null) {
                                        $perhitunganPresensi_2 = $perhitungan_2->presensi;
                                        $persenPresensi_2 = $perhitunganPresensi_2 / 100;
                                        $nilaiPresensi_2 =
                                            $nilaiPerMahasiswa2[$student->nim][$dk2->id_jadwal]->presensi ?? '0';
                                        $amPresensi_2 = $nilaiPresensi_2 * $persenPresensi_2;

                                        $perhitunganTugas_2 = $perhitungan_2->tugas;
                                        $persenTugas_2 = $perhitunganTugas_2 / 100;
                                        $nilaiTugas_2 =
                                            $nilaiPerMahasiswa2[$student->nim][$dk2->id_jadwal]->tugas ?? '0';
                                        $amTugas_2 = $nilaiTugas_2 * $persenTugas_2;

                                        $perhitunganFormatif_2 = $perhitungan_2->formatif;
                                        $persenFormatif_2 = $perhitunganFormatif_2 / 100;
                                        $nilaiFormatif_2 =
                                            $nilaiPerMahasiswa2[$student->nim][$dk2->id_jadwal]->formatif ?? '0';
                                        $amFormatif_2 = $nilaiFormatif_2 * $persenFormatif_2;

                                        $perhitunganUts_2 = $perhitungan_2->uts;
                                        $persenUts_2 = $perhitunganUts_2 / 100;
                                        $nilaiUts_2 = $nilaiPerMahasiswa2[$student->nim][$dk2->id_jadwal]->uts ?? '0';
                                        $amUts_2 = $nilaiUts_2 * $persenUts_2;

                                        $perhitunganUas_2 = $perhitungan_2->uas;
                                        $persenUas_2 = $perhitunganUas_2 / 100;
                                        $nilaiUas_2 = $nilaiPerMahasiswa2[$student->nim][$dk2->id_jadwal]->uas ?? '0';
                                        $amUas_2 = $nilaiUas_2 * $persenUas_2;

                                        $jumlahAm_2 = $amPresensi_2 + $amTugas_2 + $amFormatif_2 + $amUts_2 + $amUas_2;

                                        if ($jumlahAm_2 < 50) {
                                            $huruf_2 = 'E';
                                        } elseif ($jumlahAm_2 < 55) {
                                            $huruf_2 = 'D';
                                        } elseif ($jumlahAm_2 < 60) {
                                            $huruf_2 = 'C-';
                                        } elseif ($jumlahAm_2 < 65) {
                                            $huruf_2 = 'C';
                                        } elseif ($jumlahAm_2 < 70) {
                                            $huruf_2 = 'C+';
                                        } elseif ($jumlahAm_2 < 75) {
                                            $huruf_2 = 'B-';
                                        } elseif ($jumlahAm_2 < 80) {
                                            $huruf_2 = 'B';
                                        } elseif ($jumlahAm_2 < 85) {
                                            $huruf_2 = 'B+';
                                        } elseif ($jumlahAm_2 < 90) {
                                            $huruf_2 = 'A-';
                                        } else {
                                            $huruf_2 = 'A';
                                        }

                                        if ($huruf_2 == 'E') {
                                            $grade_2 = '0.0';
                                        } elseif ($huruf_2 == 'D') {
                                            $grade_2 = '1.0';
                                        } elseif ($huruf_2 == 'C-') {
                                            $grade_2 = '1.6';
                                        } elseif ($huruf_2 == 'C') {
                                            $grade_2 = '2.0';
                                        } elseif ($huruf_2 == 'C+') {
                                            $grade_2 = '2.3';
                                        } elseif ($huruf_2 == 'B-') {
                                            $grade_2 = '2.6';
                                        } elseif ($huruf_2 == 'B') {
                                            $grade_2 = '3.0';
                                        } elseif ($huruf_2 == 'B+') {
                                            $grade_2 = '3.3';
                                        } elseif ($huruf_2 == 'A-') {
                                            $grade_2 = '3.6';
                                        } elseif ($huruf_2 == 'A') {
                                            $grade_2 = '4.0';
                                        }
                                        $sks_2 = $dk2->sks;
                                        $mutu_2 = $grade_2 * $sks_2;
                                        $jumlahSks_2 += $sks_2;
                                        $jumlahMutu_2 += $mutu_2;

                                        $indexPrestasi_2 = $jumlahMutu_2 / $jumlahSks_2;

                                        if ($indexPrestasi_2 < 2) {
                                            $hasilIndexPrestasi_2 = 'KURANG';
                                        } elseif ($indexPrestasi_2 < 2.6) {
                                            $hasilIndexPrestasi_2 = 'CUKUP';
                                        } elseif ($indexPrestasi_2 < 3) {
                                            $hasilIndexPrestasi_2 = 'BAIK';
                                        } elseif ($indexPrestasi_2 < 3.6) {
                                            $hasilIndexPrestasi_2 = 'MEMUASKAN';
                                        } elseif ($indexPrestasi_2 >= 3.6) {
                                            $hasilIndexPrestasi_2 = 'SANGAT MEMUASKAN';
                                        }
                                    } else {
                                        $huruf_2 = 'E';
                                        $grade_2 = '0.0';
                                        $mutu_2 = 0;
                                        $sks_2 = $dk2->sks;
                                        $jumlahSks_2 += $sks_2;
                                    }
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                        {{ $no++ }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $dk2->materi_ajar }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                        {{ $dk2->sks }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $grade_2 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $huruf_2 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $mutu_2 }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    SEMESTER 3
                                </td>
                            </tr>
                            @php
                                $no = 1;
                                $jumlahSks_3 = 0;
                                $jumlahMutu_3 = 0;
                                $indexPrestasi_3 = 0;
                            @endphp
                            @foreach ($detail_kurikulum_3 as $dk3)
                                @php
                                    if ($dk3->id_perhitungan != null) {
                                        $perhitunganPresensi_3 = $perhitungan_3->presensi;
                                        $persenPresensi_3 = $perhitunganPresensi_3 / 100;
                                        $nilaiPresensi_3 =
                                            $nilaiPerMahasiswa3[$student->nim][$dk3->id_jadwal]->presensi ?? '0';
                                        $amPresensi_3 = $nilaiPresensi_3 * $persenPresensi_3;

                                        $perhitunganTugas_3 = $perhitungan_3->tugas;
                                        $persenTugas_3 = $perhitunganTugas_3 / 100;
                                        $nilaiTugas_3 =
                                            $nilaiPerMahasiswa3[$student->nim][$dk3->id_jadwal]->tugas ?? '0';
                                        $amTugas_3 = $nilaiTugas_3 * $persenTugas_3;

                                        $perhitunganFormatif_3 = $perhitungan_3->formatif;
                                        $persenFormatif_3 = $perhitunganFormatif_3 / 100;
                                        $nilaiFormatif_3 =
                                            $nilaiPerMahasiswa3[$student->nim][$dk3->id_jadwal]->formatif ?? '0';
                                        $amFormatif_3 = $nilaiFormatif_3 * $persenFormatif_3;

                                        $perhitunganUts_3 = $perhitungan_3->uts;
                                        $persenUts_3 = $perhitunganUts_3 / 100;
                                        $nilaiUts_3 = $nilaiPerMahasiswa3[$student->nim][$dk3->id_jadwal]->uts ?? '0';
                                        $amUts_3 = $nilaiUts_3 * $persenUts_3;

                                        $perhitunganUas_3 = $perhitungan_3->uas;
                                        $persenUas_3 = $perhitunganUas_3 / 100;
                                        $nilaiUas_3 = $nilaiPerMahasiswa3[$student->nim][$dk3->id_jadwal]->uas ?? '0';
                                        $amUas_3 = $nilaiUas_3 * $persenUas_3;

                                        $jumlahAm_3 = $amPresensi_3 + $amTugas_3 + $amFormatif_3 + $amUts_3 + $amUas_3;

                                        if ($jumlahAm_3 < 50) {
                                            $huruf_3 = 'E';
                                        } elseif ($jumlahAm_3 < 55) {
                                            $huruf_3 = 'D';
                                        } elseif ($jumlahAm_3 < 60) {
                                            $huruf_3 = 'C-';
                                        } elseif ($jumlahAm_3 < 65) {
                                            $huruf_3 = 'C';
                                        } elseif ($jumlahAm_3 < 70) {
                                            $huruf_3 = 'C+';
                                        } elseif ($jumlahAm_3 < 75) {
                                            $huruf_3 = 'B-';
                                        } elseif ($jumlahAm_3 < 80) {
                                            $huruf_3 = 'B';
                                        } elseif ($jumlahAm_3 < 85) {
                                            $huruf_3 = 'B+';
                                        } elseif ($jumlahAm_3 < 90) {
                                            $huruf_3 = 'A-';
                                        } else {
                                            $huruf_3 = 'A';
                                        }

                                        if ($huruf_3 == 'E') {
                                            $grade_3 = '0.0';
                                        } elseif ($huruf_3 == 'D') {
                                            $grade_3 = '1.0';
                                        } elseif ($huruf_3 == 'C-') {
                                            $grade_3 = '1.6';
                                        } elseif ($huruf_3 == 'C') {
                                            $grade_3 = '2.0';
                                        } elseif ($huruf_3 == 'C+') {
                                            $grade_3 = '2.3';
                                        } elseif ($huruf_3 == 'B-') {
                                            $grade_3 = '2.6';
                                        } elseif ($huruf_3 == 'B') {
                                            $grade_3 = '3.0';
                                        } elseif ($huruf_3 == 'B+') {
                                            $grade_3 = '3.3';
                                        } elseif ($huruf_3 == 'A-') {
                                            $grade_3 = '3.6';
                                        } elseif ($huruf_3 == 'A') {
                                            $grade_3 = '4.0';
                                        }
                                        $sks_3 = $dk3->sks;
                                        $mutu_3 = $grade_3 * $sks_3;
                                        $jumlahSks_3 += $sks_3;
                                        $jumlahMutu_3 += $mutu_3;

                                        $indexPrestasi_3 = $jumlahMutu_3 / $jumlahSks_3;

                                        if ($indexPrestasi_3 < 2) {
                                            $hasilIndexPrestasi_3 = 'KURANG';
                                        } elseif ($indexPrestasi_3 < 2.6) {
                                            $hasilIndexPrestasi_3 = 'CUKUP';
                                        } elseif ($indexPrestasi_3 < 3) {
                                            $hasilIndexPrestasi_3 = 'BAIK';
                                        } elseif ($indexPrestasi_3 < 3.6) {
                                            $hasilIndexPrestasi_3 = 'MEMUASKAN';
                                        } elseif ($indexPrestasi_3 >= 3.6) {
                                            $hasilIndexPrestasi_3 = 'SANGAT MEMUASKAN';
                                        }
                                    } else {
                                        $huruf_3 = 'E';
                                        $grade_3 = '0.0';
                                        $mutu_3 = 0;
                                        $sks_3 = $dk3->sks;
                                        $jumlahSks_3 += $sks_3;
                                    }

                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                        {{ $no++ }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $dk3->materi_ajar }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1;  padding-top:2px; padding-bottom:2px;">
                                        {{ $dk3->sks }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $grade_3 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $huruf_3 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $mutu_3 }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    SEMESTER 4
                                </td>
                            </tr>
                            @php
                                $no = 1;
                                $jumlahSks_4 = 0;
                                $jumlahMutu_4 = 0;
                                $indexPrestasi_4 = 0;
                            @endphp
                            @foreach ($detail_kurikulum_4 as $dk4)
                                @php
                                    if ($dk4->id_perhitungan != null) {
                                        $perhitunganPresensi_4 = $perhitungan_4->presensi;
                                        $persenPresensi_4 = $perhitunganPresensi_4 / 100;
                                        $nilaiPresensi_4 =
                                            $nilaiPerMahasiswa4[$student->nim][$dk4->id_jadwal]->presensi ?? '0';
                                        $amPresensi_4 = $nilaiPresensi_4 * $persenPresensi_4;

                                        $perhitunganTugas_4 = $perhitungan_4->tugas;
                                        $persenTugas_4 = $perhitunganTugas_4 / 100;
                                        $nilaiTugas_4 =
                                            $nilaiPerMahasiswa4[$student->nim][$dk4->id_jadwal]->tugas ?? '0';
                                        $amTugas_4 = $nilaiTugas_4 * $persenTugas_4;

                                        $perhitunganFormatif_4 = $perhitungan_4->formatif;
                                        $persenFormatif_4 = $perhitunganFormatif_4 / 100;
                                        $nilaiFormatif_4 =
                                            $nilaiPerMahasiswa4[$student->nim][$dk4->id_jadwal]->formatif ?? '0';
                                        $amFormatif_4 = $nilaiFormatif_4 * $persenFormatif_4;

                                        $perhitunganUts_4 = $perhitungan_4->uts;
                                        $persenUts_4 = $perhitunganUts_4 / 100;
                                        $nilaiUts_4 = $nilaiPerMahasiswa4[$student->nim][$dk4->id_jadwal]->uts ?? '0';
                                        $amUts_4 = $nilaiUts_4 * $persenUts_4;

                                        $perhitunganUas_4 = $perhitungan_4->uas;
                                        $persenUas_4 = $perhitunganUas_4 / 100;
                                        $nilaiUas_4 = $nilaiPerMahasiswa3[$student->nim][$dk4->id_jadwal]->uas ?? '0';
                                        $amUas_4 = $nilaiUas_4 * $persenUas_4;

                                        $jumlahAm_4 = $amPresensi_4 + $amTugas_4 + $amFormatif_4 + $amUts_4 + $amUas_4;

                                        if ($jumlahAm_4 < 50) {
                                            $huruf_4 = 'E';
                                        } elseif ($jumlahAm_4 < 55) {
                                            $huruf_4 = 'D';
                                        } elseif ($jumlahAm_4 < 60) {
                                            $huruf_4 = 'C-';
                                        } elseif ($jumlahAm_4 < 65) {
                                            $huruf_4 = 'C';
                                        } elseif ($jumlahAm_4 < 70) {
                                            $huruf_4 = 'C+';
                                        } elseif ($jumlahAm_4 < 75) {
                                            $huruf_4 = 'B-';
                                        } elseif ($jumlahAm_4 < 80) {
                                            $huruf_4 = 'B';
                                        } elseif ($jumlahAm_4 < 85) {
                                            $huruf_4 = 'B+';
                                        } elseif ($jumlahAm_4 < 90) {
                                            $huruf_4 = 'A-';
                                        } else {
                                            $huruf_4 = 'A';
                                        }

                                        if ($huruf_4 == 'E') {
                                            $grade_4 = '0.0';
                                        } elseif ($huruf_4 == 'D') {
                                            $grade_4 = '1.0';
                                        } elseif ($huruf_4 == 'C-') {
                                            $grade_4 = '1.6';
                                        } elseif ($huruf_4 == 'C') {
                                            $grade_4 = '2.0';
                                        } elseif ($huruf_4 == 'C+') {
                                            $grade_4 = '2.3';
                                        } elseif ($huruf_4 == 'B-') {
                                            $grade_4 = '2.6';
                                        } elseif ($huruf_4 == 'B') {
                                            $grade_4 = '3.0';
                                        } elseif ($huruf_4 == 'B+') {
                                            $grade_4 = '3.3';
                                        } elseif ($huruf_4 == 'A-') {
                                            $grade_4 = '3.6';
                                        } elseif ($huruf_4 == 'A') {
                                            $grade_4 = '4.0';
                                        }
                                        $sks_4 = $dk4->sks;
                                        $mutu_4 = $grade_4 * $sks_4;
                                        $jumlahSks_4 += $sks_4;
                                        $jumlahMutu_4 += $mutu_4;

                                        $indexPrestasi_4 = $jumlahMutu_4 / $jumlahSks_4;

                                        if ($indexPrestasi_4 < 2) {
                                            $hasilIndexPrestasi_4 = 'KURANG';
                                        } elseif ($indexPrestasi_4 < 2.6) {
                                            $hasilIndexPrestasi_4 = 'CUKUP';
                                        } elseif ($indexPrestasi_4 < 3) {
                                            $hasilIndexPrestasi_4 = 'BAIK';
                                        } elseif ($indexPrestasi_4 < 3.6) {
                                            $hasilIndexPrestasi_4 = 'MEMUASKAN';
                                        } elseif ($indexPrestasi_4 >= 3.6) {
                                            $hasilIndexPrestasi_4 = 'SANGAT MEMUASKAN';
                                        }
                                    } else {
                                        $huruf_4 = 'E';
                                        $grade_4 = '0.0';
                                        $mutu_4 = 0;
                                        $sks_4 = $dk4->sks;
                                        $jumlahSks_4 += $sks_4;
                                    }
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                        {{ $no++ }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $dk4->materi_ajar }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                        {{ $dk4->sks }}
                                    </td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $grade_4 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $huruf_4 }}</td>
                                    <td class="border border-1 border-black text-[10px] font-normal"
                                        style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                        {{ $mutu_4 }}</td>
                                </tr>
                            @endforeach
                            @php
                                $sks = 0;
                                $total_sks = 0;
                                $sks1 = $jumlahSks_1;
                                $sks2 = $jumlahSks_2;
                                $sks3 = $jumlahSks_3;
                                $sks4 = $jumlahSks_4;

                                $total_sks = $sks1 + $sks2 + $sks3 + $sks4;

                                $ipk = 0;
                                $ip1 = $indexPrestasi_1;
                                $ip2 = $indexPrestasi_2;
                                $ip3 = $indexPrestasi_3;
                                $ip4 = $indexPrestasi_4;

                                $ipArray = [$ip1, $ip2, $ip3, $ip4];
                                $jumlah_ip = count($ipArray);

                                $total_ip = array_sum($ipArray);

                                if ($jumlah_ip > 0) {
                                    $ipk = $total_ip / $jumlah_ip;
                                }

                            @endphp
                            <tr>
                                <th colspan="2" class="border border-1 border-black text-[10px] text-left"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px; padding-left:4px;">
                                    TOTAL</th>
                                <th class="border border-1 border-black text-[10px]"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                    {{ $total_sks }}</th>
                                <th colspan="2" class="border border-1 border-black text-[10px]"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;"></th>
                                <th class="border border-1 border-black text-[10px]"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">00.00</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="border border-1 border-black text-[10px] text-left"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px; padding-left:4px;">
                                    GRADE
                                    POINT
                                    AVERAGE: 0.64</th>
                                <th colspan="4" class="border border-1 border-black text-[10px] text-left"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px; padding-left:4px;">
                                    REMARK: KURANG</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-[12px] mt-4 ml-[45px]">
                    @php
                        $month = date('F');
                        switch ($month) {
                            case 'January':
                                $bulan = 'Januari';
                                break;
                            case 'February':
                                $bulan = 'Februari';
                                break;
                            case 'March':
                                $bulan = 'Maret';
                                break;
                            case 'April':
                                $bulan = 'April';
                                break;
                            case 'May':
                                $bulan = 'Mei';
                                break;
                            case 'June':
                                $bulan = 'Juni';
                                break;
                            case 'July':
                                $bulan = 'Juli';
                                break;
                            case 'August':
                                $bulan = 'Agustus';
                                break;
                            case 'September':
                                $bulan = 'September';
                                break;
                            case 'October':
                                $bulan = 'Oktober';
                                break;
                            case 'November':
                                $bulan = 'November';
                                break;
                            case 'December':
                                $bulan = 'Desember';
                                break;
                            default:
                                $bulan = 'UNKNOWN';
                                break;
                        }

                    @endphp
                    <div class="mb-14">Tasikmalaya, {{ date('d') }}
                        {{ $bulan }} {{ date('Y') }}</div>
                    <div class="font-bold">Dr. H. Rudi Kurniawan, S.T., M.M</div>
                    <div class="italic -mt-[6px]">Branch Manager</div>
                </div>
            </div>
            <div class="page-break"></div>
        @endforeach
    </div>

</body>

</html>
