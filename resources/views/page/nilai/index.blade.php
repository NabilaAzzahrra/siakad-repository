<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pukul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-red-500 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <div>DATA JADWAL REGULER</div>
                                    <div>
                                        <a href="{{ route('jadwal_reguler.create') }}" class="href">TAMBAH</a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full justify-center">
                                <div class="pt-12 w-full" style="width:100%;overflow-x:auto;">

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border shadow-lg">
                                            <thead
                                                class="text-xs bg-gray-200 text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI AJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PENGAJAR
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            HARI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SESI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PUKUL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SEMESTER
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SKS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            RUANG
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            KELAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            JURUSAN
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($jadwal_reguler as $j)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $j->materi_ajar }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $j->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->hari }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->sesi }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->pukul }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->semester }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->sks }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->ruang }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->kelas }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->jurusan }}
                                                        </td>
                                                        <td class="px-6 py-4 text-right">
                                                            @php
                                                                $nilaiExist = $nilai->contains(
                                                                    'id_jadwal',
                                                                    $j->kode_jadwal,
                                                                );
                                                            @endphp

                                                            @if ($nilaiExist)
                                                                <a href="{{ route('nilai.edit', $j->kode_jadwal) }}"
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-3 py-1 rounded-md text-xs text-white">
                                                                    <i class="fa-solid fa-book"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('nilai.show', $j->kode_jadwal) }}"
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-3 py-1 rounded-md text-xs text-white">
                                                                    <i class="fa-solid fa-file"></i>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        {{ $jadwal_reguler->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>