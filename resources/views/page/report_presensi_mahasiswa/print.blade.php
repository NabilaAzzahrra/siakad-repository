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
        <div class="page" id="result">
            <div class="-ml-[585px]">
                <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto">
            </div>
            <div class="absolute top-0 left-0 right-0 text-center mt-6">
                <img src="{{ asset('img/logo.png') }}" width="10%" alt="Logo" class="mx-auto">
            </div>
            <div class="absolute top-[120px] left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                TASIKMALAYA
            </div>
            <div class="absolute top-[150px] left-0 right-0 text-center text-sm font-bold">
                KEHADIRAN MAHASISWA
            </div>

            <div class="absolute top-[200px] ml-24 left-0 right-0 text-center text-sm font-bold">
                <div class="flex">
                    <div>Peserta Didik</div>
                    <div class="ml-[114px]">:</div>
                    <div class="ml-4">{{ $mahasiswa->nama }}</div>
                </div>
                <div class="flex mt-2">
                    <div>Nomor Induk Peserta Didik</div>
                    <div class="ml-4">:</div>
                    <div class="ml-4">{{ $mahasiswa->nim }}</div>
                </div>
                <div class="flex mt-2">
                    <div>Kelas</div>
                    <div class="ml-[169px]">:</div>
                    <div class="ml-4">{{ $mahasiswa->kelas->kelas }}</div>
                </div>
                <div class="flex mt-2">
                    <div>Jurusan</div>
                    <div class="ml-[152px]">:</div>
                    <div class="ml-4">{{ $mahasiswa->kelas->jurusan->jurusan }}</div>
                </div>
            </div>

            <div class="absolute top-[320px] ml-[6px] mr-[90px] left-0 right-0 text-center text-sm font-bold">
                <table class="border border-1 border-black w-full">
                    <thead class="border border-1 border-black">
                        <th class="border border-1 border-black">NO</th>
                        <th class="border border-1 border-black">MATERI AJAR</th>
                        @for ($i = 1; $i <= 14; $i++)
                            <th scope="col" class="border border-1 border-black">
                                <div>
                                    P{{ $i }}
                                </div>
                            </th>
                        @endfor
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jadwal as $m)
                            <tr class="border border-1 border-black">
                                <td class="border border-1 border-black">
                                    {{ $no++ }}
                                </td>
                                <th scope="row" class="border border-1 border-black text-left pl-2">
                                    {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}
                                </th>
                                @for ($i = 1; $i <= 14; $i++)
                                    <td class="border border-1 border-black">
                                        @php
                                            $presensi = $presensiPerPertemuan[$m->id_jadwal]['P' . $i] ?? null;
                                            $k = '-';

                                            if ($presensi) {
                                                $ket = $presensi->keterangan;
                                                if ($ket == 'HADIR') {
                                                    $k = 'H';
                                                } elseif ($ket == 'IZIN') {
                                                    $k = 'I';
                                                } elseif ($ket == 'ALPA') {
                                                    $k = 'A';
                                                } elseif ($ket == 'SAKIT') {
                                                    $k = 'S';
                                                }
                                            }
                                        @endphp
                                        {{ $k }}
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="absolute top-[80px] text-xs mt-12 flex items-center justify-start font-bold ml-10">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
