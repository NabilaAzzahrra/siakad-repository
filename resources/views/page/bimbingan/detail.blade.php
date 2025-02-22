<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Bimbingan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-3xl">
                        <div class="relative overflow-x-auto rounded-lg shadow-lg p-4">
                            <table
                                class="table table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border"
                                id="bimbingan-datatable">
                                <thead
                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            TANGGAL
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                PEMBAHASAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            <div class="flex items-center">
                                                KATEGORI BIMBINGAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                VERIFIKASI
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
                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                {{ $no++ }}
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ date('d-m-Y', strtotime($m->tanggal)) }}
                                            </th>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->pembahasan }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->kategori_bimbingan }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->verifikasi }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-full p-3">

                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-3xl">
                        <div class="relative overflow-x-auto rounded-lg px-12 pt-12 flex gap-5 justify-between">
                            <div class="bg-amber-50 p-4 w-full rounded-2xl">
                                <table class="w-full">
                                    <tr>
                                        <td>Nama</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $dataMahasiswa->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nim</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $dataMahasiswa->nim }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-amber-50 p-4 w-full rounded-2xl">
                                <table>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $dataMahasiswa->jurusan_nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dosen Pembimbing</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $dataMahasiswa->nama_dosen }}</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="relative overflow-x-auto rounded-lg px-12 pt-4 pb-10 flex gap-5 justify-between">
                            <div class="bg-amber-50 p-4 w-full rounded-2xl text-center">
                                Jumlah Bimbingan : <span
                                    class="bg-emerald-100 p-2 rounded-xl font-bold">{{ count($data) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-3xl p-4 mt-6">
                        <table
                            class="table table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border"
                            id="nilai-pembimbing-datatable">
                            <thead
                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        KRITERIA
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        NILAI
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="mahasiswaTable">
                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-center bg-gray-100">
                                        SIKAP
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $sikap }}
                                    </th>
                                </tr>
                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-center bg-gray-100">
                                        INTENSITAS KESUNGGUHAN
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $intensitasKesungguhan }}
                                    </th>
                                </tr>
                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-center bg-gray-100">
                                       KEDALAMAN MATERI
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $kedalamanMateri }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>
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
                "paging": true,
                "searching": true,
                "info": true,
                "ordering": true,
            });
            $('#nilai-pembimbing-datatable').DataTable({
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
