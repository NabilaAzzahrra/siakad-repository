<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pukul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center items-start">
                <div class="w-full md:w-full p-3">
                    <form action="{{ route('presensi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-5 items-start ">
                            <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-hidden">
                                    <div
                                        class="bg-sky-200 p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px]">
                                        DATA PRESENSI
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
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Pertemuan</label>
                                                <input type="text" id="name"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Enter your name" value="{{ $presensi->pertemuan }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="flex gap-5 mb-5">
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Kelas</label>
                                                <input type="text" id="name"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Enter your name"
                                                    value="{{ $presensi->jadwal->kelas->kelas }}" readonly>
                                            </div>
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Jurusan</label>
                                                <input type="text" id="name"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Enter your name"
                                                    value="{{ $presensi->jadwal->kelas->jurusan->jurusan }}" readonly>
                                            </div>
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
                                        <div class="flex gap-5">
                                            <div class="w-full">
                                                <label for="materi"
                                                    class="block text-sm font-medium text-gray-700">Materi</label>
                                                <input type="text" id="materi" name="materi"
                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Masukkan Judul Materi disini">
                                            </div>
                                            <div class="w-full">
                                                <label for="file"
                                                    class="block text-sm font-medium text-gray-700">File Materi</label>
                                                <input type="file" id="file" name="file"
                                                    class="w-full border-0 mt-3 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                    placeholder="Enter your name">
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
                                    <div class="mt-10 mb-8">
                                        <div class="flex gap-5">
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">NIM</label>
                                            </div>
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Mahasiswa</label>
                                            </div>
                                            <div class="w-full">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Keterangan</label>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($mahasiswa as $pr)
                                        <div class="mb-6">
                                            <div class="flex gap-5">
                                                <div class="w-full">
                                                    <input type="text" id="nim" name="nim[]"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        value="{{ $pr->nim }}">
                                                </div>
                                                <div class="w-full">
                                                    <input type="text" id="nama" name="nama[]"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                        value="{{ $pr->nama }}">
                                                </div>
                                                <div class="w-full">
                                                    <select
                                                        class="js-example-placeholder-single js-states form-control w-full m-6"
                                                        name="keterangan[]" data-placeholder="Pilih semester">
                                                        <option value="">Pilih...</option>
                                                        <option value="HADIR">HADIR</option>
                                                        <option value="SAKIT">SAKIT</option>
                                                        <option value="IZIN">IZIN</option>
                                                        <option value="ALPA">ALPA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
