<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Nilai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="">
                                <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                                    <div
                                        class="w-full lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                        DATA NILAI</div>
                                </div>
                            </div>
                            <div class="flex w-full justify-center">
                                <div class="pt-4 w-full" style="width:100%;overflow-x:auto;">
                                    <div class="w-full mb-4 flex items-end justify-start">
                                        <form class="flex items-center max-w-sm justify-end w-full ">
                                            <label for="simple-search" class="sr-only">Search</label>
                                            <div class="relative w-full">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                                                    </svg>
                                                </div>
                                                <input type="text" id="simple-search"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Search ......" required onkeyup="searchData()" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="relative overflow-x-auto shadow-lg rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI AJAR
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
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PUKUL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            SEMESTER
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SKS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            RUANG
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            KELAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            JURUSAN
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="nilaiTable">
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($jadwal_reguler as $j)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $j->materi_ajar }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $j->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->hari }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $j->sesi }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->pukul }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $j->semester }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->sks }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $j->ruang }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->kelas }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
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
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fa-solid fa-book"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('nilai.show', $j->kode_jadwal) }}"
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
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
    <script>
        function searchData() {
            let search = document.getElementById('simple-search').value;

            fetch("{{ route('nilai.index') }}?search=" + search, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('nilaiTable').innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</x-app-layout>
