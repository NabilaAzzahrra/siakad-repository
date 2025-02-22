<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Sidang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">

                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex gap-5">
                                <div class="w-full md:w-3/12 p-3">
                                    <div
                                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            <div
                                                class="lg:p-4 p-2 text-sm lg:text-lg text-center lg:text-center bg-amber-200 rounded-xl font-bold">
                                                PROFILE
                                            </div>
                                            <div class="mt-2 border-2 p-2 rounded-xl">
                                                <div class="flex p-4 gap-5 bg-gray-100 rounded-xl items-center">
                                                    <div class="ms-1 ml-[15px]">
                                                        <img src="{{ url('img/user.png') }}" alt=""
                                                            srcset="" class="lg:w-20">
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="hidden" class="form-control" id="identity"
                                                            name="identity" value={{ $mahasiswa->nik }}>
                                                        <div class="font-bold">{{ $mahasiswa->nama }}</div>
                                                        <div>{{ $mahasiswa->nim }}</div>
                                                        <div>{{ $mahasiswa->kelas->kelas }}</div>
                                                        <div class="text-sm">{{ $mahasiswa->kelas->jurusan->jurusan }}
                                                        </div>
                                                        <div class="text-sm">Tahun Angatan
                                                            {{ $mahasiswa->tahun_angkatan }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg mt-4 p-4">
                                        <table
                                            class="table table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border"
                                            id="nilai-sidang-datatable">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th class="px-6 pt-4 text-center bg-gray-100 w-32 text-wrap">
                                                        KRITERIA
                                                    </th>
                                                    <td class="px-6 text-center w-32 text-wrap">
                                                        NILAI
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody id="nilaiSidangTable">
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        PENAMPILAN
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $penampilan }}
                                                    </th>
                                                </tr>
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        BAHASA ASING
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $bahasaAsing }}
                                                    </th>
                                                </tr>
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        BAHASA INDONESIA
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $bahasaIndonesia }}
                                                    </th>
                                                </tr>
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        TEKNIK PRESENTASI
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $teknikPresentasi }}
                                                    </th>
                                                </tr>
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        METODA PENELITIAN
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $metodaPenelitian }}
                                                    </th>
                                                </tr>
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        PENGUASAAN TEORI
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $penguasaanTeori }}
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="w-full">
                                        <div
                                            class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                                <div class="mt-2 border-2 p-2 rounded-xl">
                                                    <div class="flex p-4 gap-5 bg-gray-100 rounded-xl items-center">
                                                        <div class="mt-2">
                                                            <table>
                                                                <tr>
                                                                    <td>PENGUJI</td>
                                                                    <td class="pr-2 pl-2">:</td>
                                                                    <td>{{ $penguji->dosen->nama_dosen }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>PEMBIMBING</td>
                                                                    <td class="pr-2 pl-2">:</td>
                                                                    <td>{{ $penguji->dosen->nama_dosen }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TANGGAL</td>
                                                                    <td class="pr-2 pl-2">:</td>
                                                                    <td>{{ date('l', strtotime($penguji->tgl_sidang)) }},
                                                                        {{ date('d-m-Y', strtotime($penguji->tgl_sidang)) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>PUKUL</td>
                                                                    <td class="pr-2 pl-2">:</td>
                                                                    <td>{{ $penguji->pukul }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>RUANG</td>
                                                                    <td class="pr-2 pl-2">:</td>
                                                                    <td>{{ $penguji->ruang->ruang }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg p-4">
                                        <table
                                            class="table table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border"
                                            id="bimbingan-datatable">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-center bg-gray-100 w-32 text-wrap">
                                                        BAB I
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center w-32 text-wrap">
                                                        BAB II
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-center bg-gray-100 w-32 text-wrap">
                                                        <div class="flex items-center">
                                                            BAB III
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center w-32 text-wrap">
                                                        <div class="flex items-center">
                                                            BAB IV
                                                        </div>
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-center bg-gray-100 w-32 text-wrap">
                                                        <div class="flex items-center">
                                                            BAB V
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="mahasiswaTable">
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $m)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->bab_satu }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->bab_dua }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->bab_tiga }}
                                                        </td>
                                                        <td class="px-6 py-4 ">
                                                            {{ $m->bab_empat }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->bab_lima }}
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
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#bimbingan-datatable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                },
                "paging": false,
                "searching": false,
                "info": true,
                "ordering": true,
            });
            $('#nilai-sidang-datatable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                },
                "paging": false,
                "searching": false,
                "info": true,
                "ordering": true,
            });
        });
    </script>
</x-app-layout>
