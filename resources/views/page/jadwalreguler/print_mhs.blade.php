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
            <div class="-ml-[916px]">
                <img src="{{ asset('img/graphic.png') }}" alt="" width="10%" class="mx-auto">
            </div>
            <div class=" top-0 left-0 right-0 text-center -mt-[160px]">
                <img src="{{ asset('img/logo.png') }}" width="5%" alt="Logo" class="mx-auto">
            </div>
            <div class=" top-[100px] left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                TASIKMALAYA
            </div>
            <div class="mt-6 left-0 right-0 text-center text-sm font-bold">
                JADWAL MATERI AJAR
            </div>

            <div class="mt-6 text-xs w-full">
                <table class="border border-1 border-black">
                    <thead class="border border-1 border-black">
                        <th class="border border-1 border-black w-20 h-10">NO</th>
                        <th class="border border-1 border-black w-[500px]">MATERI AJAR</th>
                        <th class="border border-1 border-black w-[500px]">PENGAJAR</th>
                        <th class="border border-1 border-black w-52">HARI</th>
                        <th class="border border-1 border-black w-28">SESI</th>
                        <th class="border border-1 border-black w-[400px]">PUKUL</th>
                        <th class="border border-1 border-black w-28">SEMESTER</th>
                        <th class="border border-1 border-black w-28">SKS</th>
                        <th class="border border-1 border-black w-52">RUANG</th>
                        <th class="border border-1 border-black w-52">KELAS</th>
                        <th class="border border-1 border-black w-[500px]">PROGRAM STUDI</th>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($jadwal_reguler as $key => $j)
                            <tr class="h-10">
                                <td class="border border-1 border-black text-center">
                                    {{ $no++ }}
                                </td>
                                <td class="border border-1 border-black text-left pl-2">{{ $j->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</td>
                                <td class="border border-1 border-black text-left pl-2">{{ $j->jadwal->dosen->nama_dosen }}</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->hari->hari }}</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->sesi->sesi }}</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->sesi->pukul->pukul }} WIB</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->detail_kurikulum->materi_ajar->semester->semester }}</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->detail_kurikulum->materi_ajar->sks }}</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->ruang->ruang }}</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->kelas->kelas }}</td>
                                <td class="border border-1 border-black text-center">{{ $j->jadwal->kelas->jurusan->jurusan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
<script>
    window.print();
</script>
