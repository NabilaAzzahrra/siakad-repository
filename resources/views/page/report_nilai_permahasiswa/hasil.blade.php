<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report Nilai Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-amber-300 font-bold rounded-xl">
                                <div class="flex flex-col lg:flex-row items-center justify-between">
                                    <div>DATA NILAI <span class="uppercase text-white">{{ $mahasiswa->nama }}</span>
                                    </div>
                                    <a href="{{ route('report_nilai_mahasiswa.show', $mahasiswa->nim) }}" target="_blank"
                                        class="bg-sky-300 p-2 rounded-xl text-white">PRINT</a>
                                </div>
                            </div>
                            <div class="flex flex-row lg:flex-row items-center gap-10">
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="pr-4">NAMA PESERTA DIDIK</div>
                                        <div class="pr-4">:</div>
                                        <div class="uppercase">{{ $mahasiswa->nama }}</div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="pr-[149px]">NIM</div>
                                        <div class="pr-4">:</div>
                                        <div class="">{{ $mahasiswa->nim }}</div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="pr-[131px]">KELAS</div>
                                        <div class="pr-4">:</div>
                                        <div class="">{{ $mahasiswa->kelas->kelas }}</div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="pr-[105px]">PROGRAM STUDI</div>
                                        <div class="pr-4">:</div>
                                        <div class="">{{ $mahasiswa->kelas->jurusan->jurusan }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative overflow-x-auto rounded-lg shadow-lg mt-5">
                                <table
                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                    <thead
                                        class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">NO</th>
                                            <th scope="col" class="px-6 py-3 text-center">MATERI AJAR</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                PENGAJAR</th>
                                            <th scope="col" class="px-6 py-3 text-center">PRESENSI</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">TUGAS
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">FORMATIF</th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">UTS
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($jadwal as $m)
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center bg-gray-100">
                                                    {{ $no++ }}</td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}
                                                </th>
                                                <td class="px-6 py-4 bg-gray-100">{{ $m->dosen->nama_dosen }}
                                                </td>

                                                {{-- PRESENSI --}}
                                                <td class="px-6 py-4 text-center">
                                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->presensi ?? '-' }}
                                                </td>

                                                {{-- TUGAS --}}
                                                <td class="px-6 py-4 text-center bg-gray-100">
                                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->tugas ?? '-' }}
                                                </td>

                                                {{-- FORMATIF --}}
                                                <td class="px-6 py-4 text-center">
                                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->formatif ?? '-' }}
                                                </td>

                                                {{-- UTS --}}
                                                <td class="px-6 py-4 text-center bg-gray-100">
                                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->uts ?? '-' }}
                                                </td>

                                                {{-- UAS --}}
                                                <td class="px-6 py-4 text-center">
                                                    {{ $nilaiPerMahasiswa[$m->id_jadwal]->uas ?? '-' }}
                                                </td>
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
