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
                    <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-5 items-start ">
                            <div class="bg-white w-[500px] dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-hidden">
                                    <div
                                        class="bg-sky-200 p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px]">
                                        DATA MATERI AJAR
                                    </div>
                                    <div class="mt-5">
                                        <div class="flex gap-5 mb-5">
                                            <div class="w-full" hidden>
                                                <label for="id_presensi"
                                                    class="block text-sm font-medium text-gray-700">Kode
                                                    Presensi</label>
                                                <input type="text" id="id_presensi" name="id_presensi"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Masukkan Id Presensi disini"
                                                    value="{{ $presensi->id_presensi }}" readonly>
                                            </div>
                                            <div class="w-full" hidden>
                                                <label for="id_jadwal"
                                                    class="block text-sm font-medium text-gray-700">Kode
                                                    Jadwal</label>
                                                <input type="text" id="id_jadwal" name="id_jadwal"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Masukkan Id Jadwal disini"
                                                    value="{{ $presensi->id_jadwal }}" readonly>
                                            </div>
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Materi
                                                    Ajar</label>
                                                <input type="text" id="name"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Enter your name"
                                                    value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}"
                                                    readonly>
                                            </div>
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">SKS /
                                                    Semester</label>
                                                <input type="text" id="name"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Enter your name"
                                                    value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->sks }} / {{ $presensi->jadwal->detail_kurikulum->materi_ajar->semester->semester }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="w-full mb-5">
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700">Dosen</label>
                                            <input type="text" id="nama_dosen"
                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                placeholder="Enter your name"
                                                value="{{ $presensi->jadwal->dosen->nama_dosen }}" readonly>
                                        </div>
                                        <div class="w-full mb-5">
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700">Kelas</label>
                                            <input type="text" id="name"
                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                placeholder="Enter your name"
                                                value="{{ $presensi->jadwal->kelas->kelas }}" readonly>
                                        </div>
                                        <div class="w-full mb-5">
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700">Jurusan</label>
                                            <input type="text" id="name"
                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                placeholder="Enter your name"
                                                value="{{ $presensi->jadwal->kelas->jurusan->jurusan }}" readonly>
                                        </div>
                                        <div class="flex gap-5">
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Tahun
                                                    Akademik</label>
                                                <input type="text" id="name"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Enter your name"
                                                    value="{{ $presensi->jadwal->tahun_akademik->tahunakademik }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div
                                        class="bg-sky-200 p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px]">
                                        FORM INPUT PRESENSI
                                    </div>
                                    <div class="overflow-hidden rounded-xl border mt-5 mb-5">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400 rounded-t-xl">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NIM
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center justify-center">
                                                            NAMA
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center justify-center">
                                                            PRESENSI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center justify-center">
                                                            TUGAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center justify-center">
                                                            FORMATIF
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center justify-center">
                                                            UAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center justify-center">
                                                            UTS
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($mahasiswa as $m)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->nim }}
                                                            <input type="hidden" id="nim" name="nim[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                                value="{{ $m->nim }}" readonly>
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100 uppercase">
                                                            {{ $m->nama }}
                                                            <input type="hidden" id="nama" name="nama[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->nama }}" readonly>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="presensi"
                                                                name="presensi[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase">
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            <input type="text" id="tugas"
                                                                name="tugas[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase">
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="formatif"
                                                                name="formatif[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase">
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            <input type="text" id="uts"
                                                                name="uts[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase">
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="uas"
                                                                name="uas[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>