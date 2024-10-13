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
        <div class="page" id="result">
            <div class="-ml-[585px]">
                <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto">
            </div>
            <div class=" top-0 left-0 right-0 text-center -mt-[160px]">
                <img src="{{ asset('img/logo.png') }}" width="8%" alt="Logo" class="mx-auto">
            </div>
            <div class=" top-[125px] left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                TASIKMALAYA
            </div>
            <div class=" top-[150px] left-0 right-0 text-center text-sm font-bold">
                KEHADIRAN MAHASISWA
            </div>

            <div class="mt-6 ml-11 left-0 right-0 text-center text-xs font-bold">
                <div class="flex">
                    <div>Peserta Didik</div>
                    <div class="ml-[100px]">:</div>
                    <div class="ml-4">{{ $mahasiswa->nama }}</div>
                </div>
                <div class="flex">
                    <div>Nomor Induk Peserta Didik</div>
                    <div class="ml-4">:</div>
                    <div class="ml-4">{{ $mahasiswa->nim }}</div>
                </div>
                <div class="flex">
                    <div>Kelas</div>
                    <div class="ml-[148px]">:</div>
                    <div class="ml-4">{{ $mahasiswa->kelas->kelas }}</div>
                </div>
                <div class="flex">
                    <div>Jurusan</div>
                    <div class="ml-[133px]">:</div>
                    <div class="ml-4">{{ $mahasiswa->kelas->jurusan->jurusan }}</div>
                </div>
            </div>

            <div class="ml-[6px] mr-[90px] left-0 right-0 text-center text-sm">
                <table class="border border-1 border-black w-full">
                    <thead class="border border-1 border-black text-[10px] text-white bg-[#808080]">
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">NO</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[200px]">MATERI AJAR</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[70px]">SEMESTER</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">BOBOT</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">PRESENSI</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">TUGAS</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">FORMATIF</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">UTS</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">UAS</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">ANGKA</th>
                        <th class="border border-1 border-black text-[10px] text-white bg-[#808080] w-[50px]">HURUF</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $presensi = 0;
                            $tugas = 0;
                            $formatif = 0;
                            $uts = 0;
                            $uas = 0;
                        @endphp
                        @foreach ($jadwal as $m)
                            @php
                                $presensi = isset($nilaiPerMahasiswa[$m->id_jadwal])
                                    ? $nilaiPerMahasiswa[$m->id_jadwal]->presensi
                                    : 0;
                                $tugas = isset($nilaiPerMahasiswa[$m->id_jadwal])
                                    ? $nilaiPerMahasiswa[$m->id_jadwal]->tugas
                                    : 0;
                                $formatif = isset($nilaiPerMahasiswa[$m->id_jadwal])
                                    ? $nilaiPerMahasiswa[$m->id_jadwal]->formatif
                                    : 0;
                                $uts = isset($nilaiPerMahasiswa[$m->id_jadwal])
                                    ? $nilaiPerMahasiswa[$m->id_jadwal]->uts
                                    : 0;
                                $uas = isset($nilaiPerMahasiswa[$m->id_jadwal])
                                    ? $nilaiPerMahasiswa[$m->id_jadwal]->uas
                                    : 0;

                                $angka = ($presensi + $tugas + $formatif + $uts + $uas) / 5;
                                if ($angka < 50) {
                                    $huruf = "E";
                                } elseif ($angka < 55) {
                                    $huruf = "D";
                                } elseif ($angka < 60) {
                                    $huruf = "C-";
                                } elseif ($angka < 65) {
                                    $huruf = "C";
                                } elseif ($angka < 70) {
                                    $huruf = "C+";
                                } elseif ($angka < 75) {
                                    $huruf = "B-";
                                } elseif ($angka < 80) {
                                    $huruf = "B";
                                } elseif ($angka < 85) {
                                    $huruf = "B+";
                                } elseif ($angka < 90) {
                                    $huruf = "A-";
                                } elseif ($angka > 90) {
                                    $huruf = "A";
                                }
                            @endphp
                            <tr class="border border-1 border-black">
                                <td class="border border-1 border-black text-[11px] w-[40px] text-center">
                                    {{ $no++ }}
                                </td>
                                <td scope="row" class="border border-1 border-black text-left pl-2 text-[11px] w-[200px]">
                                    {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}
                                </td>
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $m->detail_kurikulum->materi_ajar->semester->semester }}
                                </td>
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[50px]">
                                    {{ $m->detail_kurikulum->materi_ajar->sks }}
                                </td>

                                {{-- PRESENSI --}}
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->presensi ?? '-' }}
                                </td>

                                {{-- TUGAS --}}
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->tugas ?? '-' }}
                                </td>

                                {{-- FORMATIF --}}
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->formatif ?? '-' }}
                                </td>

                                {{-- UTS --}}
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->uts ?? '-' }}
                                </td>

                                {{-- UAS --}}
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->uas ?? '-' }}
                                </td>

                                {{-- ANGKA --}}
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $angka }}
                                </td>

                                {{-- HURUF --}}
                                <td scope="row" class="border border-1 border-black text-center text-[11px] w-[60px]">
                                    {{ $huruf }}
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <div class=" top-[80px] text-xs mt-6 flex items-center justify-start font-bold ml-10">
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
                            <div class="mt-16 underline underline-offset-2">UNTUNG EKO SETYASARI, S.SOS., M.A</div>
                            <div class="mt-0">Kepala Bagian Akademik</div>
                        </div>
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
