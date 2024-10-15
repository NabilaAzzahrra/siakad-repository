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
        @foreach ($stu_data as $student)
            <div class="page" id="result">
                <div class="-ml-[585px]">
                    <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto">
                </div>
                <div class="-mt-[160px] top-0 left-0 right-0 text-center">
                    <img src="{{ asset('img/logo.png') }}" width="10%" alt="Logo" class="mx-auto">
                </div>
                <div class=" left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                    TASIKMALAYA
                </div>
                <div class="mt-6 left-0 right-0 text-center text-md font-bold">
                    KARTU UJIAN TENGAH SEMESTER
                </div>
                <div class="mt-6 ml-12 left-0 right-0 text-center text-sm font-bold">
                    <div class="flex">
                        <div>Peserta Didik</div>
                        <div class="ml-[114px]">:</div>
                        <div class="ml-4">{{ $student->nama }}</div>
                    </div>
                    <div class="flex">
                        <div>Nomor Induk Peserta Didik</div>
                        <div class="ml-4">:</div>
                        <div class="ml-4">{{ $student->nim }}</div>
                    </div>
                    <div class="flex">
                        <div>Kelas</div>
                        <div class="ml-[169px]">:</div>
                        <div class="ml-4">{{ $student->kelas }}</div>
                    </div>
                    <div class="flex">
                        <div>Jurusan</div>
                        <div class="ml-[152px]">:</div>
                        <div class="ml-4">{{ $student->jurusan }}</div>
                    </div>
                </div>
                <div class="mt-2 text-xs w-full">
                    <table class="border border-1 border-black">
                        <thead class="border border-1 border-black bg-[#808080] text-white">
                            <th class="border border-1 border-black w-20 h-10">NO</th>
                            <th class="border border-1 border-black w-[500px]">MATERI AJAR</th>
                            <th class="border border-1 border-black w-[100px]">KELAS</th>
                            <th class="border border-1 border-black w-40">RUANG</th>
                            <th class="border border-1 border-black w-[540px]">DOSEN</th>
                            <th class="border border-1 border-black w-[350px]">JAM</th>
                            <th class="border border-1 border-black w-[200px]">TANGGAL UJIAN</th>
                            <th class="border border-1 border-black w-28">PARAF</th>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($jadwal_reguler as $key => $j)
                                @php
                                    $utsItem = $uts->where('id_jadwal', $j->id_jadwal)->first();
                                    $hari = '';

                                    if ($utsItem) {
                                        $day = date('l', strtotime($utsItem->tgl_ujian));

                                        switch ($day) {
                                            case 'Monday':
                                                $hari = 'SENIN';
                                                break;
                                            case 'Tuesday':
                                                $hari = 'SELASA';
                                                break;
                                            case 'Wednesday':
                                                $hari = 'RABU';
                                                break;
                                            case 'Thursday':
                                                $hari = 'KAMIS';
                                                break;
                                            case 'Friday':
                                                $hari = 'JUMAT';
                                                break;
                                            case 'Saturday':
                                                $hari = 'SABTU';
                                                break;
                                            case 'Sunday':
                                                $hari = 'MINGGU';
                                                break;
                                            default:
                                                $hari = '';
                                                break;
                                        }
                                    }
                                @endphp
                                <tr class="h-10">
                                    <td class="border border-1 border-black text-center text-[11px]">
                                        {{ $no++ }}
                                    </td>
                                    <td class="border border-1 border-black text-left pl-2 text-[11px]">
                                        {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}</td>
                                    <td class="border border-1 border-black text-center text-[11px]">
                                        {{ $j->kelas->kelas }}</td>
                                    <td class="border border-1 border-black text-center text-[11px]">
                                        {{ $j->ruang->ruang }}
                                    </td>
                                    <td class="border border-1 border-black text-left pl-2 text-[11px]">
                                        {{ $j->dosen->nama_dosen }}</td>
                                    <td class="border border-1 border-black text-center text-[11px]">
                                        @if ($utsItem)
                                            {{ $utsItem->waktu_ujian }}
                                        @else
                                            {{ $j->sesi->pukul->pukul }}
                                        @endif
                                    </td>
                                    <td class="border border-1 border-black text-center text-[11px]">
                                        @if ($utsItem)
                                            {{ date('d-m-Y', strtotime($utsItem->tgl_ujian)) }}
                                        @else
                                            <span>Belum ditentukan</span>
                                        @endif
                                    </td>
                                    <td class="border border-1 border-black text-center text-[11px]"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class=" top-[80px] text-xs mt-4 flex items-center justify-start ml-10">
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
                            <div class="mt-16 underline underline-offset-2 font-bold">UNTUNG EKO SETYASARI, S.SOS., M.A
                            </div>
                            <div class="mt-0 italic">Head of Education</div>
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
