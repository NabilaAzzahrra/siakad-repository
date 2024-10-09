<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Materi Ajar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>DATA MATERI AJAR</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="lg:p-12 pt-4" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('mahasiswa.store') }}" method="POST" class="formupdate">
                                        @csrf
                                        <div class="relative overflow-x-auto rounded-lg shadow-lg">

                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NO
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center ">
                                                            <div class="flex items-center">
                                                                MATERI AJAR
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                PENGAJAR
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">
                                                                HARI
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                SESI
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center ">
                                                            <div class="flex items-center">
                                                                PUKUL
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                SEMESTER
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center ">
                                                            <div class="flex items-center">
                                                                SKS
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                RUANG
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center ">
                                                            <div class="flex items-center">
                                                                KELAS
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                JURUSAN
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center ">
                                                            <div class="flex items-center">

                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($jadwal as $m)
                                                        <tr
                                                            class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                                {{ $no++ }}
                                                            </td>
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->dosen->nama_dosen }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->hari->hari }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->sesi->sesi }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->sesi->pukul->pukul }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->detail_kurikulum->materi_ajar->semester->semester }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->detail_kurikulum->materi_ajar->sks }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->ruang->ruang }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->kelas->kelas }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->kelas->jurusan->jurusan }}
                                                            </td>
                                                            <td class="px-6 py-4 ">
                                                                <a href="{{ route('report_dosen.edit', $m->id_jadwal) }}"
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fa-solid fa-file"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="mt-4">
                                            {{-- {{ $dosen->links() }} --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
