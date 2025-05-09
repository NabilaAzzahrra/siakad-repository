<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Revisi') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">

                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    REVISI
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30">
                            <div class="flex justify-center mt-2">
                                <div class="p-2" style="width:100%;overflow-x:auto;">
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">

                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NIM
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            NAMA
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PEMBIMBING
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            PROGRAM STUDI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            JUDUL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PENGUJI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            TANGGAL SIDANG
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            WAKTU
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            RUANG
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            VERIFIKASI PEMBIMBING
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            VERIFIKASI PENGUJI
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
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <a
                                                                href="{{ route('sidang.show', $m->nim) }}">{{ $m->nim }}</a>
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->nama }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->nama_dosen_pembimbing }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->nama_jurusan }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->judul }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->nama_dosen_penguji }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ date('d-m-Y', strtotime($m->tgl_sidang)) }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->pukul }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->ruang }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->verifikasi_revisi_pembimbing }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->verifikasi_revisi_penguji }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="mt-4">
                                        {{ $data->links() }}
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
