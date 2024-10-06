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
            <div class="top-0 left-0 right-0 text-center -mt-[160px]">
                <img src="{{ asset('img/logo.png') }}" width="10%" alt="Logo" class="mx-auto">
            </div>
            <div class="top-[120px] left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                TASIKMALAYA
            </div>
            <div class="mb-4 left-0 right-0 text-center text-sm font-bold">
                NILAI MAHASISWA
            </div>

            <div class="mb-4 ml-16 left-0 right-0 text-center text-sm font-bold">
                <div class="flex gap-5">
                    <div>
                        <div class="flex">
                            <div>MATERI AJAR</div>
                            <div class="ml-[35px]">:</div>
                            <div class="ml-4">{{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</div>
                        </div>
                        <div class="flex mt-2">
                            <div>DOSEN</div>
                            <div class="ml-[81px]">:</div>
                            <div class="ml-4">{{ $jadwal->dosen->nama_dosen }}</div>
                        </div>
                        <div class="flex mt-2">
                            <div>SEMESTER/SKS</div>
                            <div class="ml-[20px]">:</div>
                            <div class="ml-4">
                                {{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }}/{{ $jadwal->detail_kurikulum->materi_ajar->sks }}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex">
                            <div>HARI</div>
                            <div class="ml-[110px]">:</div>
                            <div class="ml-4">{{ $jadwal->hari->hari }}</div>
                        </div>
                        <div class="flex mt-2">
                            <div>PUKUL</div>
                            <div class="ml-[100px]">:</div>
                            <div class="ml-4">{{ $jadwal->sesi->pukul->pukul }} WIB</div>
                        </div>
                        <div class="flex mt-2">
                            <div>TAHUN AKADEMIK</div>
                            <div class="ml-4">:</div>
                            <div class="ml-4">{{ $jadwal->tahun_akademik->tahunakademik }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" top-[280px] ml-[6px] mr-[90px] left-0 right-0 text-center text-sm ">
                <table class="border border-1 border-black w-full">
                    <thead class="border border-1 border-black">
                        <th class="border border-1 border-black">NO</th>
                        <th class="border border-1 border-black">NIM</th>
                        <th class="border border-1 border-black">PESERTA DIDIK
                        </th>
                        <th class="border border-1 border-black">PRESENSI</th>
                        <th class="border border-1 border-black">TUGAS</th>
                        <th class="border border-1 border-black">FORMATIF</th>
                        <th class="border border-1 border-black">UTS</th>
                        <th class="border border-1 border-black">UAS</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($mahasiswa as $m)
                            @php
                                $nilaiMahasiswa = $nilai->where('nim', $m->nim)->first();
                            @endphp
                            <tr class="border border-1 border-black">
                                <td class="border border-1 border-black">{{ $no++ }}</td>
                                <td class="border border-1 border-black">{{ $m->nim }}</td>
                                <td class="border border-1 border-black">{{ $m->nama }}</td>
                                <td class="border border-1 border-black">{{ $nilaiMahasiswa->presensi ?? '-' }}
                                </td>
                                <td class="border border-1 border-black">
                                    {{ $nilaiMahasiswa->tugas ?? '-' }}</td>
                                <td class="border border-1 border-black">{{ $nilaiMahasiswa->formatif ?? '-' }}
                                </td>
                                <td class="border border-1 border-black">
                                    {{ $nilaiMahasiswa->uts ?? '-' }}</td>
                                <td class="border border-1 border-black">{{ $nilaiMahasiswa->uas ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class=" top-[80px] text-xs mt-12 flex items-center justify-start font-bold ml-10">
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
                            <div class="mt-16 underline underline-offset-2">{{ $jadwal->dosen->nama_dosen }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    window.print()
</script>
