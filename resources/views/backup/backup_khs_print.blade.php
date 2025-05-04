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
            /* position:; */
            top: 0;
            left: 0;
            width: 189px;
            height: 189px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .page::after {
            content: "";
            /* position: ; */
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
                /* position: ; */
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                /* position: ; */
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
        @foreach ($stu_data as $student)
            <div class="page" id="result">
                <div class="-ml-[585px]">
                    <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto">
                </div>
                <div class=" top-0 left-0 right-0 text-center -mt-[160px]">
                    <img src="{{ asset('img/logo.png') }}" width="10%" alt="Logo" class="mx-auto">
                </div>
                <div class=" mb-4 left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                    TASIKMALAYA
                </div>
                <div class=" mb-4 left-0 right-0 text-center text-sm font-bold">
                    KARTU HASIL STUDI
                </div>
                <div class="ml-12 text-sm">
                    <div class="flex">
                        <div>Nama</div>
                        <div class="ml-[52px] mr-4">:</div>
                        <div class="uppercase">{{ $student->nama }}</div>
                    </div>
                    <div class="flex mt-1">
                        <div>NIM</div>
                        <div class="ml-[62px] mr-4">:</div>
                        <div class="uppercase">{{ $student->nim }}</div>
                    </div>
                    <div class="flex mt-1">
                        <div>Konsentrasi</div>
                        <div class="ml-4 mr-4">:</div>
                        <div class="uppercase">{{ $student->jurusan }}</div>
                    </div>
                    <div class="flex mt-1">
                        <div>Dosen</div>
                        <div class="ml-[48px] mr-4">:</div>
                        <div class="uppercase">MUHAMAD ARIPIN, S.KOM</div>
                    </div>
                </div>
                <div class="ml-[6px] mr-[90px] left-0 right-0 text-center text-sm font-bold">
                    <table class="border border-1 border-black w-full">
                        <thead>
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
                                $jumlahSksNotNull = 0;
                                $jumlahSksNull = 0;
                                $jumlahMutu = 0;
                                $jumlahMutuAp = 0;
                                $indexPrestasi = 0;
                            @endphp
                            @foreach ($jadwal as $item)
                                @php
                                    // Ambil nilai berdasarkan nim dan id_materi_ajar
                                    $nilai = DB::table('vw_data_prestasi')
                                        ->where('nim', $student->nim)
                                        ->where('id_materi_ajar', $item->materi_ajar)
                                        ->first();
                                    if ($nilai) {
                                        $perhitunganPresensi = $perhitungan_1->presensi ?? 0;
                                        $persenPresensi = $perhitunganPresensi / 100;
                                        $nilaiPresensi =
                                            $nilaiPerMahasiswa[$student->nim][$item->id_jadwal]->presensi ?? '0';
                                        $amPresensi = $nilaiPresensi * $persenPresensi;

                                        $perhitunganTugas = $perhitungan_1->tugas ?? 0;
                                        $persenTugas = $perhitunganTugas / 100;
                                        $nilaiTugas = $nilaiPerMahasiswa[$student->nim][$item->id_jadwal]->tugas ?? '0';
                                        $amTugas = $nilaiTugas * $persenTugas;

                                        $perhitunganFormatif = $perhitungan_1->formatif ?? 0;
                                        $persenFormatif = $perhitunganFormatif / 100;
                                        $nilaiFormatif =
                                            $nilaiPerMahasiswa[$student->nim][$item->id_jadwal]->formatif ?? '0';
                                        $amFormatif = $nilaiFormatif * $persenFormatif;

                                        $perhitunganUts = $perhitungan_1->uts ?? 0;
                                        $persenUts = $perhitunganUts / 100;
                                        $nilaiUts = $nilaiPerMahasiswa[$student->nim][$item->id_jadwal]->uts ?? '0';
                                        $amUts = $nilaiUts * $persenUts;

                                        $perhitunganUas = $perhitungan_1->uas ?? 0;
                                        $persenUas = $perhitunganUas / 100;
                                        $nilaiUas = $nilaiPerMahasiswa[$student->nim][$item->id_jadwal]->uas ?? '0';
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

                                        $sks = $nilai->sks;
                                        $mutu = $grade * $sks;
                                        $jumlahSksNotNull += $sks;
                                        $jumlahMutu += $mutu;

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
                                    } else {
                                        $nilaiPresensi = 0;
                                        $jumlahSksNull += $item->sks;
                                    }

                                    $jumlahSks = $jumlahSksNotNull + $jumlahSksNull;
                                    $indexPrestasi = $jumlahMutu / $jumlahSks;

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
                                        $apPresensi = $nilaiAplikasi->presensi ?? 0;
                                        $apTugas = $nilaiAplikasi->tugas ?? 0;
                                        $apFormatif = $nilaiAplikasi->formatif ?? 0;
                                        $apUts = $nilaiAplikasi->uts ?? 0;
                                        $apUas = $nilaiAplikasi->uas ?? 0;
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

                                        $mutuAp = $gradeAp * $item->sks;
                                        $jumlahMutuAp += $mutuAp;
                                        $indexPrestasiAp = $jumlahMutuAp / $jumlahSks;

                                        if ($indexPrestasiAp < 2) {
                                            $hasilIndexPrestasiAp = 'KURANG';
                                        } elseif ($indexPrestasiAp < 2.6) {
                                            $hasilIndexPrestasiAp = 'CUKUP';
                                        } elseif ($indexPrestasiAp < 3) {
                                            $hasilIndexPrestasiAp = 'BAIK';
                                        } elseif ($indexPrestasiAp < 3.6) {
                                            $hasilIndexPrestasiAp = 'MEMUASKAN';
                                        } elseif ($indexPrestasiAp >= 3.6) {
                                            $hasilIndexPrestasiAp = 'SANGAT MEMUASKAN';
                                        } else {
                                            $hasilIndexPrestasiAp = '-';
                                        }
                                    }
                                @endphp
                                @if ($nilai)
                                    <tr>
                                        <td class="border border-1 border-black">{{ $no++ }}</td>
                                        <td class="border border-1 border-black text-left pl-2">
                                            {{ $item->materi_ajar }}</td>
                                        <td class="border border-1 border-black text-left pl-2">
                                            {{ $nilaiAplikasi ? $hurufAp : $huruf }}</td>
                                        <td class="border border-1 border-black">
                                            {{ $nilaiAplikasi ? $gradeAp : $grade }}
                                        </td>
                                        <td class="border border-1 border-black">
                                            {{ $item->sks }}</td>
                                        <td class="border border-1 border-black">{{ $nilaiAplikasi ? $mutuAp : $mutu }}
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="border border-1 border-black">{{ $no++ }}</td>
                                        <td class="border border-1 border-black text-left pl-2">
                                            {{ $item->materi_ajar }}</td>
                                        <td class="border border-1 border-black text-center pl-2">
                                            {{ $nilaiAplikasi ? $hurufAp : '0' }}</td>
                                        <td class="border border-1 border-black">{{ $nilaiAplikasi ? $gradeAp : '0' }}
                                        </td>
                                        <td class="border border-1 border-black">
                                            {{ $item->sks }}</td>
                                        <td class="border border-1 border-black">{{ $nilaiAplikasi ? $mutuAp : '0' }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td colspan="4" class="border border-1 border-black">JUMLAH</td>
                                <td class="border border-1 border-black">{{ $jumlahSks }}</td>
                                <td class="border border-1 border-black">
                                    {{ $item->id_materi_ajar == 10 ? $jumlahMutuAp : $jumlahMutu }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="border border-1 border-black">INDEX PRESTASI</td>
                                <td class="border border-1 border-black">
                                    {{ $nilaiAplikasi ? number_format($indexPrestasiAp, 2) : number_format($indexPrestasi, 2) }}
                                </td>
                                <td class="border border-1 border-black text-xs text-wrap w-24">
                                    {{ $nilaiAplikasi ? $hasilIndexPrestasiAp ?? '-' : $hasilIndexPrestasi ?? '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="italic text-left text-xs ml-10 mt-4 font-normal">
                        <div>Catatan:</div>
                        <div>Kartu Hasil Studi ini hanya sah bila di bubuhi stempel lembaga dan tanda tangan Kepala
                            Bagian Akademik, Jika ada penghapusan / coretan pada Kartu Hasil Studi ini dinyatakan tidak
                            sah.</div>
                        <div class="font-bold">
                            <div class="flex">
                                <div class="mr-1">HM:</div>
                                <div>Huruf Mutu</div>
                            </div>
                            <div class="flex">
                                <div class="mr-1">AM:</div>
                                <div>Angka Mutu</div>
                            </div>
                            <div class="flex">
                                <div class="mr-1">SKS:</div>
                                <div>Satuan Kredit Semester</div>
                            </div>
                            <div class="flex">
                                <div class="mr-1">M:</div>
                                <div>Mutu</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-xs mt-6 flex items-center justify-start font-bold ml-10">
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
                                <div class="uppercase">Tasikmalaya, {{ date('d') }}
                                    {{ $bulan }} {{ date('Y') }}</div>
                                <div>LP3I TASIKMALAYA</div>
                                <div class="mt-16 underline underline-offset-2">UNTUNG EKO SETYASARI, S.SOS., M.A</div>
                                <div class="mt-0 underline-offset-2">Kepala Bagian Akademik</div>
                            </div>
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
    //window.print();
</script>
