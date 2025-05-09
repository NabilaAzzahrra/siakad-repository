<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Bimbingan') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    BIMBINGAN
                                </div>
                            </div>
                            <hr class="border mt-2 mb-4 border-black border-opacity-30">
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
                                                    DOSEN
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
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
                                                        href="{{ route('mahasiswaBimbingan.show', $m->nim) }}">{{ $m->nim }}</a>
                                                </th>
                                                <td class="px-6 py-4 bg-gray-100">
                                                    {{ $m->mahasiswa->nama }}
                                                </td>
                                                <td class="px-6 py-4 ">
                                                    {{ $m->mahasiswa->kelas->jurusan->jurusan }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-100">
                                                    {{ $m->pembimbingProjek->dosen->nama_dosen }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $m->mahasiswa->tahun_angkatan }}
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
    </div>
</x-app-layout>
