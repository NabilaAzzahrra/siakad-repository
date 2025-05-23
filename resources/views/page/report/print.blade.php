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
                PRESENSI PENGAJAR
            </div>
            <div class="ml-2 text-[12px]">
                <table>
                    <tr>
                        <th class="text-left">Pengajar</th>
                        <td class="pl-2 pr-2">:</td>
                        <td>{{ $jadwal->dosen->nama_dosen }}</td>
                    </tr>
                    <tr>
                        <th class="text-left">Materi Ajar</th>
                        <td class="pl-2 pr-2">:</td>
                        <td>{{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</td>
                    </tr>
                    <tr>
                        <th class="text-left">Semester/SKS</th>
                        <td class="pl-2 pr-2">:</td>
                        <td>{{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }} /
                            {{ $jadwal->detail_kurikulum->materi_ajar->sks }}</td>
                    </tr>
                    <tr>
                        <th class="text-left">Hari/Pukul</th>
                        <td class="pl-2 pr-2">:</td>
                        <td>{{ $jadwal->hari->hari }}/{{ $jadwal->sesi->pukul->pukul }} WIB</td>
                    </tr>
                    <tr>
                        <th class="text-left">Tahun Akademik</th>
                        <td class="pl-2 pr-2">:</td>
                        <td>{{ $jadwal->tahun_akademik->tahunakademik }}</td>
                    </tr>
                </table>
            </div>
            <div class="flex">
                <div class="ml-[6px] left-0 right-0 text-center text-[10px] font-bold w-full">
                    <table class="border border-1 border-black w-[700px]">
                        <thead>
                            <tr>
                                <th class="border border-1 border-black w-8">NO</th>
                                <th class="border border-1 border-black w-20">PERTEMUAN</th>
                                <th class="border border-1 border-black">MATERI</th>
                                <th class="border border-1 border-black w-32">TANGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($presensi as $m)
                                <tr>
                                    <td class="border border-1 border-black">{{ $no++ }}</td>
                                    <td class="border border-1 border-black text-center pl-2">
                                        {{ $m->pertemuan }}
                                    </td>
                                    <td class="border border-1 border-black text-left pl-2">
                                        {{ $m->materi }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        @if ($m->tgl_presensi == null)
                                            -
                                        @else
                                            {{ date('d-m-Y', strtotime($m->tgl_presensi)) }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="ml-[6px] mr-[90px] left-0 right-0 text-center text-[10px] font-bold w-full">
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
                                    <td class="border border-1 border-black">{{ $no++ }}</td>
                                    <td class="border border-1 border-black text-left pl-2">
                                        {{ $dk2->materi_ajar }}</td>
                                    <td class="border border-1 border-black">
                                        {{ $huruf_2 }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $grade_2 }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $dk2->sks }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $mutu_2 }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="border border-1 border-black">IP SMT 2 :
                                    {{ number_format($indexPrestasi_2, 2) }}
                                </td>
                                <td class="border border-1 border-black">{{ $jumlahSks_2 }}</td>
                                <td class="border border-1 border-black">{{ $jumlahMutu_2 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
            </div>
            {{-- <div class="flex">
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
                                    <td class="border border-1 border-black">{{ $no++ }}</td>
                                    <td class="border border-1 border-black text-left pl-2">
                                        {{ $dk3->materi_ajar }}</td>
                                    <td class="border border-1 border-black">
                                        {{ $huruf_3 }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $grade_3 }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $dk3->sks }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $mutu_3 }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="border border-1 border-black">IP SMT 3 :
                                    {{ number_format($indexPrestasi_3, 2) }}
                                </td>
                                <td class="border border-1 border-black">{{ $jumlahSks_3 }}</td>
                                <td class="border border-1 border-black">{{ $jumlahMutu_3 }}</td>
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
                                $jumlahSks_4 = 0;
                                $jumlahMutu_4 = 0;
                                $jumlahMutuAp = 0;
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

                                    // NILAI APLIKASI PROJECT
                                    $nilaiAplikasi = $nilaiAplikasiProject->where('nim', $student->nim)->first();
                                    if (!$nilaiAplikasi) {
                                        $apPresensi = 0;
                                        $apTugas = 0;
                                        $apFormatif = 0;
                                        $apUts = 0;
                                        $apUas = 0;
                                        $jumlahNilaiAp = 0;
                                    } else {
                                        $apPresensi = $nilaiAplikasi->presensi;
                                        $apTugas = $nilaiAplikasi->tugas;
                                        $apFormatif = $nilaiAplikasi->formatif;
                                        $apUts = $nilaiAplikasi->uts;
                                        $apUas = $nilaiAplikasi->uas;
                                        $jumlahNilaiAp = ($apPresensi + $apTugas + $apFormatif + $apUts + $apUas) / 5;

                                        if ($jumlahNilaiAp < 50) {
                                            $hurufAp = 'E';
                                        } elseif ($jumlahNilaiAp < 55) {
                                            $hurufAp = 'D';
                                        } elseif ($jumlahNilaiAp < 60) {
                                            $hurufAp = 'C-';
                                        } elseif ($jumlahNilaiAp < 65) {
                                            $hurufAp = 'C';
                                        } elseif ($jumlahNilaiAp < 70) {
                                            $hurufAp = 'C+';
                                        } elseif ($jumlahNilaiAp < 75) {
                                            $hurufAp = 'B-';
                                        } elseif ($jumlahNilaiAp < 80) {
                                            $hurufAp = 'B';
                                        } elseif ($jumlahNilaiAp < 85) {
                                            $hurufAp = 'B+';
                                        } elseif ($jumlahNilaiAp < 90) {
                                            $hurufAp = 'A-';
                                        } else {
                                            $hurufAp = 'A';
                                        }

                                        if ($hurufAp == 'E') {
                                            $gradeAp = '0.0';
                                        } elseif ($hurufAp == 'D') {
                                            $gradeAp = '1.0';
                                        } elseif ($hurufAp == 'C-') {
                                            $gradeAp = '1.6';
                                        } elseif ($hurufAp == 'C') {
                                            $gradeAp = '2.0';
                                        } elseif ($hurufAp == 'C+') {
                                            $gradeAp = '2.3';
                                        } elseif ($hurufAp == 'B-') {
                                            $gradeAp = '2.6';
                                        } elseif ($hurufAp == 'B') {
                                            $gradeAp = '3.0';
                                        } elseif ($hurufAp == 'B+') {
                                            $gradeAp = '3.3';
                                        } elseif ($hurufAp == 'A-') {
                                            $gradeAp = '3.6';
                                        } elseif ($hurufAp == 'A') {
                                            $gradeAp = '4.0';
                                        }

                                        $mutuAp = $gradeAp * $sks_4;
                                        $jumlahMutuAp += $mutuAp;
                                        $indexPrestasiAp = $jumlahMutuAp / $jumlahSks_4;
                                    }
                                @endphp
                                <tr>
                                    <td class="border border-1 border-black">{{ $no++ }}</td>
                                    <td class="border border-1 border-black text-left pl-2">
                                        {{ $dk4->materi_ajar }}</td>
                                    <td class="border border-1 border-black">
                                        {{ $nilaiAplikasi ? $hurufAp : $huruf_4 }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $nilaiAplikasi ? $gradeAp : $grade_4 }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $dk4->sks }}
                                    </td>
                                    <td class="border border-1 border-black">
                                        {{ $nilaiAplikasi ? $mutuAp : $mutu_4 }}
                                    </td>

                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="border border-1 border-black">IP SMT 4 :
                                    {{ number_format($indexPrestasi_4, 2) }}
                                </td>
                                <td class="border border-1 border-black">{{ $jumlahSks_4 }}</td>
                                <td class="border border-1 border-black">
                                    {{ $dk4->id_materi_ajar == 10 ? $jumlahMutuAp : $jumlahMutu_4 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                @php
                    $ipk = 0;
                    $ip1 = $indexPrestasi_1;
                    $ip2 = $indexPrestasi_2;
                    $ip3 = $indexPrestasi_3;
                    $ip4 = $nilaiAplikasi ? $indexPrestasiAp : $indexPrestasi_4;

                    // $ipArray = [$ip1, $ip2, $ip3, $ip4];

                    // $filteredIPs = array_filter($ipArray, function ($ip) {
                    //     return $ip != 0;
                    // });

                    // $jumlah_ip = count($filteredIPs);
                    $ipArray = [$ip1, $ip2, $ip3, $ip4];
                    $jumlah_ip = count($ipArray);

                    $total_ip = array_sum($ipArray);

                    // $total_ip = array_sum($filteredIPs);

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
            </div> --}}
            <div class="text-xs mt-4 flex items-center justify-start font-bold ml-12">
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
    </div>

</body>

</html>
<script>
    // window.print();
</script>
