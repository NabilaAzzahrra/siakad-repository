<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Report<i class="fi fi-rr-caret-right mt-1"></i> Presensi Dosen <i class="fi fi-rr-caret-right mt-1"></i> <span
                class="text-amber-100">Materi Ajar</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div
                    class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                    <div class="flex px-12 pt-8">
                        <div class="w-10">
                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                        </div>
                        <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                            DATA MATERI AJAR
                        </div>
                    </div>
                    <hr class="border mt-2 border-black border-opacity-30 mx-12">
                    <div class="px-12 pt-6 pb-6 text-gray-900 dark:text-gray-100">
                        <div class="flex w-full justify-center">
                            <div class="pt-3 w-full" style="width:100%;overflow-x:auto;">
                                <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                    <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                        <!-- Form untuk entries -->
                                        <x-show-entries :route="route('report_dosen.show', $id)" :search="request()->search">
                                        </x-show-entries>
                                    </div>
                                    <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                        <form action="{{ route('report_dosen.show', $id) }}" method="GET"
                                            class="flex items-center flex-1">
                                            <input type="text" name="search" placeholder="Enter for search . . . "
                                                id="search" value="{{ request('search') }}"
                                                class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                                oninput="this.value = this.value.toUpperCase();" />

                                            <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                                            <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                        </form>
                                    </div>
                                </div>
                                <div class="relative overflow-x-auto shadow-md rounded-lg">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                        <thead
                                            class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    NO
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    MATERI AJAR
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    PENGAJAR
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    HARI
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    SESI
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    PUKUL
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    SEMESTER
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    SKS
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    RUANG
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    KELAS
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    PROGRAM STUDI
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    ACTION
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="jadwalRegulerTable">
                                            @php
                                                $no = $jadwal->firstItem();
                                            @endphp
                                            @forelse($jadwal as $key => $i)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 text-center bg-gray-100">
                                                        {{ $jadwal->perPage() * ($jadwal->currentPage() - 1) + $key + 1 }}
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $i->detail_kurikulum->materi_ajar->materi_ajar }}
                                                    </th>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        {{ $i->dosen->nama_dosen }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $i->hari->hari }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100 text-center">
                                                        {{ $i->sesi->sesi }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $i->sesi->pukul->pukul }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100 text-center">
                                                        {{ $i->detail_kurikulum->materi_ajar->semester->semester }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $i->detail_kurikulum->materi_ajar->sks }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100 text-center">
                                                        {{ $i->ruang->ruang }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $i->kelas->kelas }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100 text-center">
                                                        {{ $i->kelas->jurusan->jurusan }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        <a href="{{ route('report_dosen.edit', $i->id_jadwal) }}"
                                                            class="mr-2 border border-dashed border-green-500 hover:bg-green-100 px-4 py-3 rounded-xl text-xs text-green-500">
                                                            <i class="fa-solid fa-file"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="bg-gray-500 text-white p-3 rounded shadow-sm mb-3">
                                                    Data Belum Tersedia!
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    @if ($jadwal->hasPages())
                                        {{ $jadwal->appends(request()->query())->links('vendor.pagination.custom') }}
                                    @else
                                        <div class="flex items-center justify-between">
                                            <nav class="flex justify-start">
                                                <div class="text-sm flex gap-1">
                                                    <div>Showing</div>
                                                    <div class="font-bold">1</div>
                                                    <div>to</div>
                                                    <div class="font-bold">{{ count($jadwal) }}</div>
                                                    <div>of</div>
                                                    <div class="font-bold">{{ count($jadwal) }}</div>
                                                    <div>entries</div>
                                                </div>
                                            </nav>
                                            <div class="flex items-center space-x-2">
                                                <div class="flex">
                                                    <div class="border px-4 py-1 rounded-l-lg">&lt;</div>
                                                    <div class="border px-4 py-1">1</div>
                                                    <div class="border px-4 py-1 rounded-r-lg">&gt;</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
