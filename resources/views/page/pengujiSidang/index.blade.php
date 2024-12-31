<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Daftar Sidang Aplikasi Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">

                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="relative overflow-x-auto rounded-lg shadow-lg p-4">

                            <table
                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                <thead
                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            NO
                                        </th>
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
                                                JURUSAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                PEMBIMBING
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            <div class="flex items-center">
                                                JUDUL
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                TAHUN ANGKATAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            <div class="flex items-center">
                                                VERIFIKASI
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                ACTION
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
                                                {{ $m->nim }}
                                            </th>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->nama }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->jurusan }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->nama_dosen }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->judul }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->tahun_angkatan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $m->verifikasi }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                <button type="button" data-id="{{ $m->id }}"
                                                    data-modal-target="sourceModal"
                                                    data-verifikasi="{{ $m->verifikasi }}"
                                                    data-nim="{{ $m->nim }}" data-id_dosen="{{ $m->id_dosen }}"
                                                    onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white">
                                                    <i class="fi fi-sr-check-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $data->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        VERIFIKASI DAFTAR SIDANG APLIKASI PROJECT
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-2">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="nim" name="nim" placeholder="Masukkan NIM" required>

                        <div>
                            <p>Verifikasi <span class="text-red-500">*</span></p>
                            <label>
                                <input type="radio" id="verifikasi-sudah" name="verifikasi" value="SUDAH">
                                SUDAH
                            </label>
                            <label class="ml-4">
                                <input type="radio" id="verifikasi-belum" name="verifikasi" value="BELUM">
                                BELUM
                            </label>
                        </div>

                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">
                            Simpan
                        </button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
