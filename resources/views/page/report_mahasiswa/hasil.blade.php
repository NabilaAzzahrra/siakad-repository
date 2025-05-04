<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            <div class="flex items-center font-bold">Daftar Presensi</div>
            </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="mb-8">
                                <div class="flex flex-col lg:flex-row items-center justify-between">
                                    <div class="flex -mb-6">
                                        <div class="w-10">
                                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA PRESENSI <span class="text-red-500">{{$jadwal->kelas->kelas}}</span> <span class="text-amber-500">[{{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}-{{ $jadwal->dosen->nama_dosen }}]</span>-{{$jadwal->tahun_akademik->tahunakademik}}
                                        </div>
                                    </div>
                                    <div class="flex gap-4 mb-2">
                                        <div class="mt-4">
                                            <a href="{{ route('report_keseluruhan.show', $jadwal->id_jadwal) }}" target="_blank"
                                                class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-amber-100 border border-dashed border-amber-500 text-amber-500 pl-4 pr-4 pt-2"><i
                                                    class="fi fi-sr-print mr-2 text-lg"></i> <span>Print
                                                    Presensi</span></a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border mt-2 border-black border-opacity-30">
                            </div>
                            <div class="flex justify-start bg-white relative overflow-x-auto rounded-lg shadow-lg">
                                <table
                                    class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                    <thead
                                        class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100 w-10">NO</th>
                                            <th scope="col" class="px-6 py-3 text-center">NIM</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">PESERTA DIDIK
                                            </th>
                                            @for ($i = 1; $i <= 14; $i++)
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    P{{ $i }}
                                                </th>
                                            @endfor
                                            <th scope="col" class="px-6 py-3 text-center bg-emerald-100 text-emerald-600">HADIR</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-sky-100 text-sky-600">IZIN</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-amber-100 text-amber-600">SAKIT</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-red-100 text-red-600">ALPA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($mahasiswa as $m)
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 text-center bg-gray-100">{{ $no++ }}</td>
                                                <td class="px-6 py-4 text-center ">{{ $m->nim }}</td>
                                                <td class="px-6 py-4 text-left bg-gray-100 uppercase">
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
                                                            $bg = 'bg-gray-50';
                                                            $text = '';

                                                            if ($keterangan == 'ALPA') {
                                                                $bg = 'bg-red-100';
                                                                $text = 'text-red-600';
                                                                $alpaCount++;
                                                            } elseif ($keterangan == 'IZIN') {
                                                                $bg = 'bg-sky-100';
                                                                $text = 'text-sky-600';
                                                                $izinCount++;
                                                            } elseif ($keterangan == 'SAKIT') {
                                                                $bg = 'bg-amber-100';
                                                                $text = 'text-amber-600';
                                                                $sakitCount++;
                                                            } elseif ($keterangan == 'HADIR') {
                                                                $bg = 'bg-emerald-100';
                                                                $text = 'text-emerald-600';
                                                                $hadirCount++;
                                                            }
                                                        @endphp
                                                        <td
                                                            class="px-6 py-4 text-center {{ $bg }} {{ $text }}">
                                                            <span>{{ $keterangan }}</span>
                                                        </td>
                                                    @endforeach
                                                @else
                                                    @for ($i = 0; $i < count($presensi); $i++)
                                                        <td class="px-6 py-4 text-center">-</td>
                                                    @endfor
                                                @endif
                                                @php
                                                    if ($hadirCount != 0) {
                                                        $bgHadir = 'bg-emerald-100 text-emerald-600';
                                                    }else{
                                                        $bgHadir = 'bg-gray-50';
                                                    }

                                                    if ($izinCount != 0) {
                                                        $bgIzin = 'bg-sky-100 text-sky-600';
                                                    }else{
                                                        $bgIzin = 'bg-gray-50';
                                                    }

                                                    if ($sakitCount != 0) {
                                                        $bgSakit = 'bg-amber-100 text-amber-600';
                                                    }else{
                                                        $bgSakit = 'bg-gray-50';
                                                    }

                                                    if ($alpaCount != 0) {
                                                        $bgAlpa = 'bg-red-100 text-red-600';
                                                    }else{
                                                        $bgAlpa = 'bg-gray-50';
                                                    }
                                                @endphp
                                                <td class="px-6 py-4 text-center {{$bgHadir}}">{{ $hadirCount }}</td>
                                                <td class="px-6 py-4 text-center {{$bgIzin}}">{{ $izinCount }}</td>
                                                <td class="px-6 py-4 text-center {{$bgSakit}}">{{ $sakitCount }}</td>
                                                <td class="px-6 py-4 text-center {{$bgAlpa}}">{{ $alpaCount }}</td>
                                            </tr>
                                        @endforeach
                                        <th colspan="3" class="px-6 py-4 text-center">TANGGAL PERTEMUAN</th>
                                        @foreach ($presensi as $p)
                                            @php
                                                $date = $p->tgl_presensi
                                                    ? date('d/m/y', strtotime($p->tgl_presensi))
                                                    : '';
                                            @endphp
                                            <th class="px-6 py-4 text-center border">{{ $date }}</th>
                                        @endforeach
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <th colspan="3" class="px-6 py-4 text-center border">JUMLAH MAHASISWA</th>
                                            <th colspan="18" class="px-6 py-4 text-center border">{{ count($mahasiswa) }}
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
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <th colspan="3" class="px-6 py-4 text-center border bg-emerald-100 text-emerald-600">HADIR</th>
                                            @foreach ($hadirPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center border bg-emerald-100 text-emerald-600">
                                                    {{ $count }}
                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <th colspan="3" class="px-6 py-4 text-center border bg-sky-100 text-sky-600">IZIN</th>
                                            @foreach ($izinPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center border bg-sky-100 text-sky-600">
                                                    {{ $count }}
                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <th colspan="3" class="px-6 py-4 text-center border bg-amber-100 text-amber-600">SAKIT</th>
                                            @foreach ($sakitPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center border bg-amber-100 text-amber-600">
                                                    {{ $count }}
                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <th colspan="3" class="px-6 py-4 text-center border bg-red-100 text-red-600">ALPA</th>
                                            @foreach ($alpaPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center border bg-red-100 text-red-600">
                                                    {{ $count }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
