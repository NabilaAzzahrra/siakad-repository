<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Report Nilai Mahasiswa') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="w-full bg-white dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl p-6 mb-6">
                        <div class="px-6 pb-6 text-gray-900 dark:text-gray-100">
                            <div class="flex flex-col lg:flex-row items-center justify-between">
                                    <div class="flex -mb-6">
                                        <div class="w-10">
                                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA NILAI MAHASISWA
                                        </div>
                                    </div>
                                    <div class="flex gap-4 mb-2">
                                        <div class="mt-4">
                                            <a href="{{ route('report_nilai_mahasiswa.show', $mahasiswa->nim) }}" target="_blank"
                                            class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-amber-100 border border-dashed border-amber-500 text-amber-500 pl-4 pr-4 pt-2"><i
                                                class="fi fi-sr-print mr-2 text-lg"></i> <span>Print
                                                Nilai</span></a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border mt-2 border-black border-opacity-30">
                            <div class="flex flex-row lg:flex-row items-center gap-10">
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="pr-[18px]">NAMA PESERTA DIDIK</div>
                                        <div class="pr-4">:</div>
                                        <div class="uppercase">{{ $mahasiswa->nama }}</div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="pr-[148px]">NIM</div>
                                        <div class="pr-4">:</div>
                                        <div class="">{{ $mahasiswa->nim }}</div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="pr-[131px]">KELAS</div>
                                        <div class="pr-4">:</div>
                                        <div class="">{{ $mahasiswa->kelas->kelas }}</div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="pr-[49px]">PROGRAM STUDI</div>
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
