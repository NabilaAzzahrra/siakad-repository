<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pukul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="bg-white p-3 m-12 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="font-bold pr-2 pt-1"><i class="fi fi-ss-book-open-cover"></i>
                        </div>
                        <div class="font-bold pr-[57px]">Materi Ajar</div>
                        <div class="font-bold pr-4">:</div>
                        <div class="font-bold text-sky-600">
                            {{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</div>
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="font-bold pr-2 pt-1"><i class="fi fi-ss-book-open-cover"></i>
                        </div>
                        <div class="font-bold pr-[93px]">Dosen</div>
                        <div class="font-bold pr-4">:</div>
                        <div class="font-bold text-sky-600 text-wrap">
                            {{ $jadwal->dosen->nama_dosen }}</div>
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="font-bold pr-2 pt-1"><i class="fi fi-ss-book-open-cover"></i>
                        </div>
                        <div class="font-bold pr-[33px]">Semester/SKS</div>
                        <div class="font-bold pr-4">:</div>
                        <div class="font-bold text-sky-600">
                            {{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }}/{{ $jadwal->detail_kurikulum->materi_ajar->sks }}
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="font-bold pr-2 pt-1"><i class="fi fi-ss-book-open-cover"></i>
                        </div>
                        <div class="font-bold pr-[109px]">Hari</div>
                        <div class="font-bold pr-4">:</div>
                        <div class="font-bold text-sky-600">
                            {{ $jadwal->hari->hari }}</div>
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="font-bold pr-2 pt-1"><i class="fi fi-ss-book-open-cover"></i>
                        </div>
                        <div class="font-bold pr-[20px]">Tahun Akademik</div>
                        <div class="font-bold pr-4">:</div>
                        <div class="font-bold text-sky-600">
                            {{ $jadwal->tahun_akademik->tahunakademik }}</div>
                    </div>
                </div>

                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 mb-5 bg-red-500 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <div>DATA PRESENSI</div>
                                    <a href="{{ route('report_keseluruhan.show', $jadwal->id_jadwal) }}">PRINT</a>
                                </div>
                            </div>
                            <div class="flex justify-start bg-white relative overflow-x-auto sm:rounded-lg shadow-lg">
                                <table
                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
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
                                            <th scope="col" class="px-6 py-3 text-center">HADIR</th>
                                            <th scope="col" class="px-6 py-3 text-center">IZIN</th>
                                            <th scope="col" class="px-6 py-3 text-center">SAKIT</th>
                                            <th scope="col" class="px-6 py-3 text-center">ALPA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($mahasiswa as $m)
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center bg-gray-100">{{ $no++ }}</td>
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
                                                            // Reset background and text classes
                                                            $bg = '';
                                                            $text = '';

                                                            if ($keterangan == 'ALPA') {
                                                                $bg = 'bg-red-500';
                                                                $text = 'text-white';
                                                                $alpaCount++;
                                                            } elseif ($keterangan == 'IZIN') {
                                                                $izinCount++;
                                                            } elseif ($keterangan == 'SAKIT') {
                                                                $sakitCount++;
                                                            } elseif ($keterangan == 'HADIR') {
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
                                                <td class="px-6 py-4 text-center">{{ $hadirCount }}</td>
                                                <td class="px-6 py-4 text-center">{{ $izinCount }}</td>
                                                <td class="px-6 py-4 text-center">{{ $sakitCount }}</td>
                                                <td class="px-6 py-4 text-center">{{ $alpaCount }}</td>
                                            </tr>
                                        @endforeach
                                        <th colspan="3" class="px-6 py-4 text-center">TANGGAL PERTEMUAN</th>
                                        @foreach ($presensi as $p)
                                            @php
                                                $date = $p->tgl_presensi
                                                    ? date('d/m/y', strtotime($p->tgl_presensi))
                                                    : '-';
                                            @endphp
                                            <th class="px-6 py-4 text-center">{{ $date }}</th>
                                        @endforeach
                                        <tr>
                                            <th colspan="3" class="px-6 py-4 text-center">JUMLAH MAHASISWA</th>
                                            <th colspan="18" class="px-6 py-4 text-center">{{ count($mahasiswa) }}
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
                                            <th colspan="3" class="px-6 py-4 text-center">HADIR</th>
                                            @foreach ($hadirPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center">
                                                    {{ $count }}
                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="px-6 py-4 text-center">IZIN</th>
                                            @foreach ($izinPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center">
                                                    {{ $count }}
                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="px-6 py-4 text-center">SAKIT</th>
                                            @foreach ($sakitPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center">
                                                    {{ $count }}
                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="px-6 py-4 text-center">ALPA</th>
                                            @foreach ($alpaPerPertemuan as $count)
                                                <th class="px-6 py-4 text-center">
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
