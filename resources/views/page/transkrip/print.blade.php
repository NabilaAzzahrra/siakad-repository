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
            padding: 0;
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
            min-height: 297mm;
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
            size: F4;
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
                /* border: 1px #D3D3D3 solid; */
                border-radius: 5px;
                /* background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
                position: relative;
            }

            .page::before {
                content: "";
                position: ;
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                position: ;
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
        {{-- @foreach ($studentstudents as $students) --}}
        @php
            // $nim = $studentstudents->nim;
            // $formatted_hasil = sprintf('%03d', $hasil);
        @endphp
        <div class="page" id="result">
            <div class="-ml-[585px]">
                {{-- <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto"> --}}
            </div>
            <div class="top-0 left-0 right-0 text-center mt-[160px]">
                {{-- <img src="{{ asset('img/logo-lp3i.png') }}" width="30%" alt="Logo" class="mx-auto"> --}}
            </div>
            <div class="mt-4 left-0 right-0 text-center text-[18px] font-bold">
                {{-- ACADEMIC TRANSCRIPT --}}
            </div>
            <div class=" top-[160px] left-0 right-0 text-center text-[12px] italic">
                {{-- TRANSKRIP AKADEMIK --}}
            </div>
            <div class=" top-[180px] mt-[205px] left-0 right-0 text-center text-[12px] font-bold">
                No. {{ $kodeTranskrip->no_transkrip }}
            </div>
            @php
                $hasil++;
            @endphp
            <div class="ml-12 mt-10 text-[11px]">
                <div class="flex font-bold">
                    <div class="">Name</div>
                    <div class="ml-[143px] mr-4">:</div>
                    <div class="">{{ $students->nama }}</div>
                </div>
                <div class="flex -mt-1 italic">
                    <div>Nama</div>
                </div>
                <div class="flex mt-[-3px] font-bold">
                    <div>Student Registration Number</div>
                    <div class="ml-[13px] mr-4">:</div>
                    <div class="uppercase">{{ $students->nim }}</div>
                </div>
                <div class="flex -mt-1 italic">
                    <div>Nomor Induk Peserta Didik</div>
                </div>
                <div class="flex mt-[-3px] font-bold">
                    <div>Place and Date Birth</div>
                    <div class="ml-[62px] mr-4">:</div>
                    <div class="">{{ $students->tempat_lahir }} / {{ $students->tgl_lahir }}</div>
                </div>
                <div class="flex -mt-1 italic">
                    <div>Tempat dan Tanggal Lahir</div>
                </div>
                <div class="flex mt-[-3px] font-bold">
                    <div>Program</div>
                    <div class="ml-[127px] mr-4">:</div>
                    <div class="">{{ $students->kelas->jurusan->jurusan }}</div>
                </div>
                <div class="flex -mt-1 italic">
                    <div>Bidang Keahlian</div>
                </div>
            </div>

            <div class="ml-[6px] mr-[85px] left-0 right-0 text-center text-sm font-bold">
                <table class="border border-1 border-black w-full">
                    <thead>
                        <tr class="h-[1px]">
                            <th class="border border-1 border-black text-[10px] bg-[#808080] text-white w-[50px]"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;" rowspan="2">
                                NO</th>
                            <th class="border border-1 w-[300px] border-black text-[10px] bg-[#808080] text-white"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;" rowspan="2">
                                SUBJECT</th>
                            <th class="border border-1 w-[70px] border-black text-[10px] bg-[#808080] text-white"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;" rowspan="2">
                                CREDIT</th>
                            <th class="border border-1 border-black text-[10px] bg-[#808080] text-white"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;" colspan="3">
                                RESULT</th>
                        </tr>
                        <tr>
                            <th class="border border-1 border-black text-[10px] bg-[#808080] w-[95px] text-white">SCORE
                            </th>
                            <th class="border border-1 border-black text-[10px] bg-[#808080] w-[95px] text-white">GRADE
                            </th>
                            <th class="border border-1 border-black text-[10px] bg-[#808080] w-[95px] text-white">POINT
                                EARNED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:4px; padding-bottom:4px;">
                                SEMESTER 1
                            </td>
                        </tr>
                        @php
                            $no = 1;
                            $jumlahSks = 0;
                            $jumlahMutu = 0;
                            $indexPrestasi = 0;
                            $hasilIndexPrestasi = 0;
                        @endphp
                        @foreach ($prestasi1 as $dk1)
                            @php
                                $nilai = DB::table('vw_data_prestasi')
                                    ->where('nim', $students->nim)
                                    ->where('materi_ajar', $dk1->materi_ajar)
                                    ->first();

                                //dd($nilai);

                                $nilaiPresensi = $nilai->presensi ?? 0;
                                $nilaiTugas = $nilai->tugas ?? 0;
                                $nilaiFormatif = $nilai->formatif ?? 0;
                                $nilaiUts = $nilai->uts ?? 0;
                                $nilaiUas = $nilai->uas ?? 0;

                                $idPerhitungan = $dk1->id_perhitungan ?? 0;
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

                                $sks = $dk1->sks ?? 0;
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
                                    {{ $grade }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $huruf }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $mutu }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:4px; padding-bottom:4px;">
                                SEMESTER 2
                            </td>
                        </tr>
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

                                dd($prestasi2);

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
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                    {{ $no++ }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $item2->materi_ajar }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                    {{ $item2->sks }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $grade2 }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $huruf2 }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $mutu2 }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:4px; padding-bottom:4px;">
                                SEMESTER 3
                            </td>
                        </tr>
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
                                    ->where('nim', $students->nim)
                                    ->where('materi_ajar', $item3->materi_ajar)
                                    ->first();

                                $nilaiPresensi3 = $nilai3->presensi ?? 0;
                                $nilaiTugas3 = $nilai3->tugas ?? 0;
                                $nilaiFormatif23 = $nilai3->formatif ?? 0;
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
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                    {{ $no++ }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $item3->materi_ajar }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1;  padding-top:2px; padding-bottom:2px;">
                                    {{ $item3->sks }}
                                </td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $grade3 }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $huruf3 }}</td>
                                <td class="border border-1 border-black text-[10px] font-normal"
                                    style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                    {{ $mutu3 }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-1 border-black text-[10px] text-left pl-2 ini" colspan="6"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:4px; padding-bottom:4px;">
                                SEMESTER 4
                            </td>
                        </tr>
                        {{-- @php
                            $no = 1;
                            $jumlahSks4 = 0;
                            $jumlahMutu4 = 0;
                            $indexPrestasi4 = 0;
                            $hasilIndexPrestasi4 = 0;
                        @endphp
                        @foreach ($prestasi4 as $item4)
                            @php
                                $nilai4 = DB::table('vw_data_prestasi')
                                    ->where('nim', $students->nim)
                                    ->where('materi_ajar', $item4->materi_ajar)
                                    ->first();

                                $nilaiPresensi4 = $nilai4->presensi ?? 0;
                                $nilaiTugas4 = $nilai4->tugas ?? 0;
                                $nilaiFormatif4 = $nilai4->formatif ?? 0;
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
                            @endphp --}}
                        @php
                            $nilaiPembimbing = DB::table('nilai_pembimbing')->where('nim', $students->nim)->first();
                            $sikap = $nilaiPembimbing->sikap ?? 0;
                            $intensitas_kesungguhan = $nilaiPembimbing->intensitas_kesungguhan ?? 0;
                            $kedalaman_materi = $nilaiPembimbing->kedalaman_materi ?? 0;
                            $jumlahNilaiPembimbing = $sikap + $intensitas_kesungguhan + $kedalaman_materi;
                            $hasilNilaiPembimbing = ($jumlahNilaiPembimbing / 3) * 0.6;

                            $nilaiPenguji = DB::table('nilai_penguji')->where('nim', $students->nim)->first();
                            $penampilan = $nilaiPenguji->penampilan ?? 0;
                            $bahasa_asing = $nilaiPenguji->bahasa_asing ?? 0;
                            $bahasa_indonesia = $nilaiPenguji->bahasa_indonesia ?? 0;
                            $teknik_presentasi = $nilaiPenguji->teknik_presentasi ?? 0;
                            $metoda_penelitian = $nilaiPenguji->metoda_penelitian ?? 0;
                            $penguasaan_teori = $nilaiPenguji->penguasaan_teori ?? 0;
                            $jumlahNilaiPenguji =
                                $penampilan +
                                $bahasa_asing +
                                $bahasa_indonesia +
                                $teknik_presentasi +
                                $metoda_penelitian +
                                $penguasaan_teori;
                            $hasilNilaiPenguji = ($jumlahNilaiPenguji / 6) * 0.4;

                            $nilaiSidang = $hasilNilaiPembimbing + $hasilNilaiPenguji;

                            if ($nilaiSidang < 50) {
                                $hurufSidang = 'E';
                            } elseif ($nilaiSidang < 55) {
                                $hurufSidang = 'D';
                            } elseif ($nilaiSidang < 60) {
                                $hurufSidang = 'C-';
                            } elseif ($nilaiSidang < 65) {
                                $hurufSidang = 'C';
                            } elseif ($nilaiSidang < 70) {
                                $hurufSidang = 'C+';
                            } elseif ($nilaiSidang < 75) {
                                $hurufSidang = 'B-';
                            } elseif ($nilaiSidang < 80) {
                                $hurufSidang = 'B';
                            } elseif ($nilaiSidang < 85) {
                                $hurufSidang = 'B+';
                            } elseif ($nilaiSidang < 90) {
                                $hurufSidang = 'A-';
                            } else {
                                $hurufSidang = 'A';
                            }

                            if ($hurufSidang == 'E') {
                                $gradeSidang = '0.0';
                            } elseif ($hurufSidang == 'D') {
                                $gradeSidang = '1.0';
                            } elseif ($hurufSidang == 'C-') {
                                $gradeSidang = '1.6';
                            } elseif ($hurufSidang == 'C') {
                                $gradeSidang = '2.0';
                            } elseif ($hurufSidang == 'C+') {
                                $gradeSidang = '2.3';
                            } elseif ($hurufSidang == 'B-') {
                                $gradeSidang = '2.6';
                            } elseif ($hurufSidang == 'B') {
                                $gradeSidang = '3.0';
                            } elseif ($hurufSidang == 'B+') {
                                $gradeSidang = '3.3';
                            } elseif ($hurufSidang == 'A-') {
                                $gradeSidang = '3.6';
                            } elseif ($hurufSidang == 'A') {
                                $gradeSidang = '4.0';
                            }

                            $mutuSidang = $gradeSidang * $prestasi4->sks;
                        @endphp
                        <tr>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                {{ $no++ }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $prestasi4->materi_ajar }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                {{ $prestasi4->sks }}
                            </td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $gradeSidang }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $hurufSidang }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $mutuSidang }}</td>
                        </tr>
                        @php
                            $nilaiOjt = DB::table('ojt')->where('nim', $students->nim)->first();
                            $nilai = $nilaiOjt->nilai;
                            if ($nilai < 50) {
                                $hurufOjt = 'E';
                            } elseif ($nilai < 55) {
                                $hurufOjt = 'D';
                            } elseif ($nilai < 60) {
                                $hurufOjt = 'C-';
                            } elseif ($nilai < 65) {
                                $hurufOjt = 'C';
                            } elseif ($nilai < 70) {
                                $hurufOjt = 'C+';
                            } elseif ($nilai < 75) {
                                $hurufOjt = 'B-';
                            } elseif ($nilai < 80) {
                                $hurufOjt = 'B';
                            } elseif ($nilai < 85) {
                                $hurufOjt = 'B+';
                            } elseif ($nilai < 90) {
                                $hurufOjt = 'A-';
                            } else {
                                $hurufOjt = 'A';
                            }

                            if ($hurufOjt == 'E') {
                                $gradeOjt = '0.0';
                            } elseif ($hurufOjt == 'D') {
                                $gradeOjt = '1.0';
                            } elseif ($hurufOjt == 'C-') {
                                $gradeOjt = '1.6';
                            } elseif ($hurufOjt == 'C') {
                                $gradeOjt = '2.0';
                            } elseif ($hurufOjt == 'C+') {
                                $gradeOjt = '2.3';
                            } elseif ($hurufOjt == 'B-') {
                                $gradeOjt = '2.6';
                            } elseif ($hurufOjt == 'B') {
                                $gradeOjt = '3.0';
                            } elseif ($hurufOjt == 'B+') {
                                $gradeOjt = '3.3';
                            } elseif ($hurufOjt == 'A-') {
                                $gradeOjt = '3.6';
                            } elseif ($hurufOjt == 'A') {
                                $gradeOjt = '4.0';
                            }

                            $mutuOjt = $gradeOjt * $prestasiOjt->sks;
                        @endphp
                        <tr>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                {{ $no++ }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal  text-left"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $prestasiOjt->materi_ajar }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                {{ $prestasiOjt->sks }}
                            </td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $gradeOjt }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $hurufOjt }}</td>
                            <td class="border border-1 border-black text-[10px] font-normal"
                                style="padding: 0; line-height: 1; padding-left: 10px; padding-top:2px; padding-bottom:2px;">
                                {{ $mutuOjt }}</td>
                        </tr>
                        {{-- @endforeach --}}
                        @php
                            $mutu4 = $mutuSidang + $mutuOjt;
                            $jumlahSks4 = $prestasi4->sks + $prestasiOjt->sks;
                            if ($mutu4 > 0) {
                                $indexPrestasi4 = $mutu4 / $jumlahSks4;
                            } else {
                                $indexPrestasi4 = 0;
                            }
                        @endphp
                        @php
                            $studentsks = 0;
                            $total_sks = 0;
                            $studentsks1 = $jumlahSks;
                            $studentsks2 = $jumlahSks2;
                            $studentsks3 = $jumlahSks3;
                            $studentsks4 = $jumlahSks4;

                            $total_sks = $studentsks1 + $studentsks2 + $studentsks3 + $studentsks4;

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

                            if ($ipk < 2) {
                                $hasilIndexPrestasiK = 'KURANG';
                            } elseif ($ipk < 2.6) {
                                $hasilIndexPrestasiK = 'CUKUP';
                            } elseif ($ipk < 3) {
                                $hasilIndexPrestasiK = 'BAIK';
                            } elseif ($ipk < 3.6) {
                                $hasilIndexPrestasiK = 'MEMUASKAN';
                            } elseif ($ipk >= 3.6) {
                                $hasilIndexPrestasiK = 'SANGAT MEMUASKAN';
                            }

                            $pointEarned = $jumlahMutu + $jumlahMutu2 + $jumlahMutu3 + $mutu4;
                        @endphp
                        <tr>
                            <th colspan="2" class="border border-1 border-black text-[10px] text-left"
                                style="padding: 0; line-height: 1; padding-top:4px; padding-bottom:4px; padding-left:10px;">
                                TOTAL</th>
                            <th class="border border-1 border-black text-[10px]"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;">
                                {{ $total_sks }}</th>
                            <th colspan="2" class="border border-1 border-black text-[10px]"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px;"></th>
                            <th class="border border-1 border-black text-[10px]"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px; padding-left:10px;">
                                {{ $pointEarned }}</th>
                        </tr>
                        <tr>
                            <th colspan="2" class="border border-1 border-black text-[10px] text-left"
                                style="padding: 0; line-height: 1; padding-top:4px; padding-bottom:4px; padding-left:10px;">
                                GRADE
                                POINT
                                AVERAGE: {{ number_format($ipk, 2) }}</th>
                            <th colspan="4" class="border border-1 border-black text-[10px] text-left"
                                style="padding: 0; line-height: 1; padding-top:2px; padding-bottom:2px; padding-left:8px;">
                                REMARK: {{ $hasilIndexPrestasiK }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-[12px] mt-8 ml-[45px]">
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
                <div class="flex justify-between mr-[52px]">
                    <div>
                        <div class="mb-[92px]">Tasikmalaya, {{ date('d') }}
                            {{ $bulan }} {{ date('Y') }}</div>
                        <div class="font-bold">Untung Eko Setyasari, S.Sos., M.A. </div>
                        <div class="italic -mt-[5px]">Head Of Education</div>
                    </div>
                    <div>
                        <div class="mb-[110px]"></div>
                        <div class="font-bold">Dr. H. Rudi Kurniawan, S.T., M.M</div>
                        <div class="italic -mt-[5px]">Branch Manager</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-break"></div>
        {{-- @endforeach --}}
    </div>

</body>

</html>
