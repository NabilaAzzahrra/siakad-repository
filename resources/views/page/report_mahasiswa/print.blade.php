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
            height: 190mm;
            /* Adjusted for A4 landscape height (210mm minus padding and border) */
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
            width: 297mm;
            /* Adjusted for A4 landscape width */
            min-height: 210mm;
            /* Adjusted for A4 landscape height */
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
            size: A4 landscape;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 297mm;
                height: 210mm;
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
        <div class="page" id="result">
            <div class="-ml-[916px]">
                <img src="{{ asset('img/graphic.png') }}" alt="" width="10%" class="mx-auto">
            </div>
            <div class="absolute top-0 left-0 right-0 text-center mt-6">
                <img src="{{ asset('img/logo.png') }}" width="5%" alt="Logo" class="mx-auto">
            </div>
            <div class="absolute top-[100px] left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                TASIKMALAYA
            </div>
            <div class="absolute top-[130px] left-0 right-0 text-center text-sm font-bold">
                TRANSKRIP MAHASISWA
            </div>

            <div class="absolute top-[150px] text-xs mx-12 mt-4 flex items-center justify-between">
                <div>
                    <div class="grid grid-cols-2 gap-[400px]">
                        <div class="flex gap-4">
                            <div>MATERI AJAR</div>
                            <div class="ml-5">:</div>
                            <div>{{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</div>
                        </div>
                        <div class="flex gap-4">
                            <div>SEMESTER/SKS</div>
                            <div class="ml-5">:</div>
                            <div>
                                {{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }}/{{ $jadwal->detail_kurikulum->materi_ajar->sks }}
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-[400px] mt-2">
                        <div class="flex gap-4">
                            <div>DOSEN</div>
                            <div class="ml-[53px]">:</div>
                            <div>{{ $jadwal->dosen->nama_dosen }}</div>
                        </div>
                        <div class="flex gap-4">
                            <div>KELAS</div>
                            <div class="ml-[70px]">:</div>
                            <div>{{ $jadwal->kelas->kelas }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-[400px] mt-2">
                        <div class="flex gap-4">
                            <div>RUANG</div>
                            <div class="ml-[53px]">:</div>
                            <div>{{ $jadwal->ruang->ruang }}</div>
                        </div>
                        <div class="flex gap-4">
                            <div>HARI/PUKUL</div>
                            <div class="ml-[37px]">:</div>
                            <div>{{ $jadwal->hari->hari }} / {{ $jadwal->sesi->pukul->pukul }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute top-[180px] text-xs w-full mt-12">
                <table class="border border-1 border-black">
                    <thead class="border border-1 border-black">
                        <th class="border border-1 border-black w-10">NO</th>
                        <th class="border border-1 border-black w-32">NIM</th>
                        <th class="border border-1 border-black w-52">PESERTA DIDIK</th>
                        @for ($i = 1; $i <= 14; $i++)
                            <th scope="col" class="border border-1 border-black w-10">
                                P{{ $i }}
                            </th>
                        @endfor
                        <th scope="col" class="border border-1 border-black w-14">HADIR</th>
                        <th scope="col" class="border border-1 border-black w-14">IZIN</th>
                        <th scope="col" class="border border-1 border-black w-14">SAKIT</th>
                        <th scope="col" class="border border-1 border-black w-14">ALPA</th>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($mahasiswa as $m)
                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                <td class="border border-1 border-black text-center">{{ $no++ }}</td>
                                <td class="border border-1 border-black pl-2">{{ $m->nim }}</td>
                                <td class="border border-1 border-black w-[100px] pl-2 items-center">
                                    {{ $m->nama }}</td>
                                @if (isset($detailPresensiData[$m->nim]))
                                    @php
                                        $hadirCount = 0;
                                        $izinCount = 0;
                                        $sakitCount = 0;
                                        $alpaCount = 0;
                                    @endphp
                                    @foreach ($detailPresensiData[$m->nim] as $keterangan)
                                        @php
                                            // Reset background and text classes
                                            $bg = '';
                                            $text = '';
                                            $ket = '';

                                            if ($keterangan == 'ALPA') {
                                                $bg = 'bg-red-500';
                                                $text = 'text-white';
                                                $alpaCount++;
                                                $ket = 'A';
                                            } elseif ($keterangan == 'IZIN') {
                                                $izinCount++;
                                                $ket = 'I';
                                            } elseif ($keterangan == 'SAKIT') {
                                                $sakitCount++;
                                                $ket = 'S';
                                            } elseif ($keterangan == 'HADIR') {
                                                $hadirCount++;
                                                $ket = 'H';
                                            }
                                        @endphp
                                        <td
                                            class="border border-1 border-black text-center {{ $bg }} {{ $text }}">
                                            <span>{{ $ket }}</span>
                                        </td>
                                    @endforeach
                                @else
                                    @for ($i = 0; $i < count($presensi); $i++)
                                        <td class="border border-1 border-black">-</td>
                                    @endfor
                                @endif
                                <td class="border border-1 border-black text-center">{{ $hadirCount }}</td>
                                <td class="border border-1 border-black text-center">{{ $izinCount }}</td>
                                <td class="border border-1 border-black text-center">{{ $sakitCount }}</td>
                                <td class="border border-1 border-black text-center">{{ $alpaCount }}</td>
                            </tr>
                        @endforeach
                        <th colspan="3" class="border border-1 border-black">TANGGAL PERTEMUAN</th>
                        @foreach ($presensi as $p)
                            @php
                                $date = $p->tgl_presensi ? date('d/m/y', strtotime($p->tgl_presensi)) : '-';
                            @endphp
                            <th class="border border-1 border-black w-4 text-wrap">{{ $date }}</th>
                        @endforeach
                        <tr>
                            <th colspan="3" class="border border-1 border-black">JUMLAH MAHASISWA</th>
                            <th colspan="18" class="border border-1 border-black">{{ count($mahasiswa) }}
                            </th>
                        </tr>
                        @php
                            $hadirPerPertemuan = array_fill(0, count($presensi), 0);
                            $izinPerPertemuan = array_fill(0, count($presensi), 0);
                            $sakitPerPertemuan = array_fill(0, count($presensi), 0);
                            $alpaPerPertemuan = array_fill(0, count($presensi), 0);

                            foreach ($detailPresensiData as $nim => $presensiArray) {
                                foreach ($presensiArray as $index => $keterangan) {
                                    if ($keterangan == 'HADIR') {
                                        $hadirPerPertemuan[$index]++;
                                    } elseif ($keterangan == 'IZIN') {
                                        $izinPerPertemuan[$index]++;
                                    } elseif ($keterangan == 'SAKIT') {
                                        $sakitPerPertemuan[$index]++;
                                    } elseif ($keterangan == 'ALPA') {
                                        $alpaPerPertemuan[$index]++;
                                    }
                                }
                            }
                        @endphp
                        <tr>
                            <th colspan="3" class="border border-1 border-black">HADIR</th>
                            @foreach ($hadirPerPertemuan as $count)
                                <th class="border border-1 border-black">
                                    {{ $count }}
                                </th>
                            @endforeach
                        </tr>
                        <tr>
                            <th colspan="3" class="border border-1 border-black">IZIN</th>
                            @foreach ($izinPerPertemuan as $count)
                                <th class="border border-1 border-black">
                                    {{ $count }}
                                </th>
                            @endforeach
                        </tr>
                        <tr>
                            <th colspan="3" class="border border-1 border-black">SAKIT</th>
                            @foreach ($sakitPerPertemuan as $count)
                                <th class="border border-1 border-black">
                                    {{ $count }}
                                </th>
                            @endforeach
                        </tr>
                        <tr>
                            <th colspan="3" class="border border-1 border-black">ALPA</th>
                            @foreach ($alpaPerPertemuan as $count)
                                <th class="border border-1 border-black">
                                    {{ $count }}
                                </th>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="absolute top-[400px] text-xs mt-12 flex items-center justify-start font-bold ml-10">
                <div class="flex">
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
                        <div class=" uppercase">Tasikmalaya, {{ date('d') }}
                            {{ $bulan }} {{ date('Y') }}</div>
                        <div class="mt-16 underline underline-offset-2">{{ $jadwal->dosen->nama_dosen }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
