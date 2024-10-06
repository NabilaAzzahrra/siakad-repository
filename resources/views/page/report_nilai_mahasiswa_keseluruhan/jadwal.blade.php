<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Nilai Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="bg-white p-6 m-4 shadow-lg  rounded-xl">
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
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 mb-5 bg-amber-300 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <div>DATA PRESENSI</div>
                                    <a href="{{ route('report_nilai_keseluruhan.show', $jadwal->id_jadwal) }}" class="bg-sky-300 p-2 rounded-xl text-white">PRINT</a>
                                </div>
                            </div>
                            <div class="flex justify-start bg-white relative overflow-x-auto rounded-lg shadow-lg">
                                <table
                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                    <thead
                                        class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100 w-10">NO</th>
                                            <th scope="col" class="px-6 py-3 text-center">NIM</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">PESERTA DIDIK
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">PRESENSI</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">TUGAS</th>
                                            <th scope="col" class="px-6 py-3 text-center">FORMATIF</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">UTS</th>
                                            <th scope="col" class="px-6 py-3 text-center">UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($mahasiswa as $m)
                                            @php
                                                $nilaiMahasiswa = $nilai->where('nim', $m->nim)->first();
                                            @endphp
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center bg-gray-100">{{ $no++ }}</td>
                                                <td class="px-6 py-4 text-center">{{ $m->nim }}</td>
                                                <td class="px-6 py-4 text-left bg-gray-100 uppercase">
                                                    {{ $m->nama }}</td>
                                                <td class="px-6 py-4 text-left">{{ $nilaiMahasiswa->presensi ?? '-' }}
                                                </td>
                                                <td class="px-6 py-4 text-left bg-gray-100">
                                                    {{ $nilaiMahasiswa->tugas ?? '-' }}</td>
                                                <td class="px-6 py-4 text-left">{{ $nilaiMahasiswa->formatif ?? '-' }}
                                                </td>
                                                <td class="px-6 py-4 text-left bg-gray-100">
                                                    {{ $nilaiMahasiswa->uts ?? '-' }}</td>
                                                <td class="px-6 py-4 text-left">{{ $nilaiMahasiswa->uas ?? '-' }}</td>
                                            </tr>
                                        @endforeach
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
