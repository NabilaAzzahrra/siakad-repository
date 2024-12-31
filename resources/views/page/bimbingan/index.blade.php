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
                    <form method="GET" action="{{ route('bimbinganMahasiswa.index') }}" class="flex gap-5 mb-4">
                        <div class="lg:mb-5 w-full">
                            <label for="tahun_angkatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tahun Angkatan
                            </label>
                            <select name="tahun_angkatan" class="js-example-placeholder-single js-states form-control w-full m-6">
                                <option value="">Pilih Tahun Angkatan</option>
                                @foreach ($tahun_angkatan as $k)
                                    <option value="{{ $k->tahun_angkatan }}"
                                        {{ request('tahun_angkatan') == $k->tahun_angkatan ? 'selected' : '' }}>
                                        {{ $k->tahun_angkatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="lg:mb-5 w-full">
                            <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jurusan
                            </label>
                            <select name="jurusan" class="js-example-placeholder-single js-states form-control w-full m-6">
                                <option value="">Pilih Jurusan</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}"
                                        {{ request('jurusan') == $j->id ? 'selected' : '' }}>
                                        {{ $j->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center mt-2">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                                Filter
                            </button>
                        </div>
                    </form>

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
                                                JUMLAH BIMBINGAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                TAHUN ANGKATAN
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
                                                <a
                                                    href="{{ route('bimbinganMahasiswa.show', $m->nim) }}">{{ $m->nim }}</a>
                                            </th>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->nama }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->jurusan_nama }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->nama_dosen }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->bimbingan_count }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->tahun_angkatan }}
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
</x-app-layout>
