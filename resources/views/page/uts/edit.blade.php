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
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-red-500 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <div>DATA TAMBAH SOAL UTS</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('ujian_uts.update', $uts->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id_jadwal" value="{{ $uts->jadwal->id_jadwal }}">
                                        <input type="hidden" name="id_uts" value="{{ $uts->id_uts }}">
                                        <div class="flex gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="materi_ajar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                                    Ajar</label>
                                                <input type="text" id="materi_ajar" name="materi_ajar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="sks"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                                <input type="text" id="sks" name="sks"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->jadwal->detail_kurikulum->materi_ajar->sks }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="semester"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                                <input type="text" id="semester" name="semester"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->jadwal->detail_kurikulum->materi_ajar->semester->semester }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="nama_dosen"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengajar</label>
                                                <input type="text" id="nama_dosen" name="nama_dosen"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->jadwal->dosen->nama_dosen }}" />
                                            </div>
                                        </div>

                                        <div class="flex gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="materi_ajar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                                <input type="text" id="materi_ajar" name="materi_ajar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->jadwal->ruang->ruang }}" />
                                            </div>

                                            <div class="mb-5 w-full">
                                                <label for="tgl_ujian"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                                <input type="date" id="tgl_ujian" name="tgl_ujian"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->tgl_ujian }}" />
                                            </div>

                                            @php
                                                $tgl_ujian = $uts->tgl_ujian;
                                                $day = date('l', strtotime($tgl_ujian));

                                                switch ($day) {
                                                    case 'Monday':
                                                        $hari = 'SENIN';
                                                        break;
                                                    case 'Tuesday':
                                                        $hari = 'SELASA';
                                                        break;
                                                    case 'Wednesday':
                                                        $hari = 'RABU';
                                                        break;
                                                    case 'Thursday':
                                                        $hari = 'KAMIS';
                                                        break;
                                                    case 'Friday':
                                                        $hari = 'JUMAT';
                                                        break;
                                                    case 'Saturday':
                                                        $hari = 'SABTU';
                                                        break;
                                                    case 'Sunday':
                                                        $hari = 'MINGGU';
                                                        break;
                                                    default:
                                                        $hari = '';
                                                        break;
                                                }
                                            @endphp


                                            <div class="mb-5 w-full">
                                                <label for="hari"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                                <input type="text" id="hari" name="hari"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 uppercase"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $hari }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="waktu_ujian"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pukul</label>
                                                <input type="text" id="waktu_ujian" name="waktu_ujian"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->waktu_ujian }}" />
                                            </div>
                                        </div>
                                        <div class="flex gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="file_sebelumnya"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                    Sebelumnya</label>
                                                <input type="text" id="file_sebelumnya" name="file_sebelumnya"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uts->file }}" readonly />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="file"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                    UTS</label>
                                                <input type="file" id="file" name="file"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..." />
                                            </div>
                                        </div>

                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('tgl_ujian').addEventListener('change', function() {
            const date = new Date(this.value);
            const options = {
                weekday: 'long'
            };
            const hari = new Intl.DateTimeFormat('id-ID', options).format(date);
            document.getElementById('hari').value = hari;
        });
    </script>
</x-app-layout>
