<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Soal UAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>DATA EDIT SOAL UAS</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="lg:p-12 p-4" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('ujian_uas.update', $uas->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id_jadwal" value="{{ $uas->jadwal->id_jadwal }}">
                                        <input type="hidden" name="id_uas" value="{{ $uas->id_uas }}">
                                        <div class="flex flex-col lg:flex-row lg:gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="materi_ajar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                                    Ajar</label>
                                                <input type="text" id="materi_ajar" name="materi_ajar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uas->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="sks"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                                <input type="text" id="sks" name="sks"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uas->jadwal->detail_kurikulum->materi_ajar->sks }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="semester"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                                <input type="text" id="semester" name="semester"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uas->jadwal->detail_kurikulum->materi_ajar->semester->semester }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="nama_dosen"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengajar</label>
                                                <input type="text" id="nama_dosen" name="nama_dosen"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uas->jadwal->dosen->nama_dosen }}" />
                                            </div>
                                        </div>

                                        <div class="flex flex-col lg:flex-row lg:gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="materi_ajar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                                <input type="text" id="materi_ajar" name="materi_ajar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uas->jadwal->ruang->ruang }}" />
                                            </div>

                                            <div class="mb-5 w-full">
                                                <label for="tgl_ujian"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                                <input type="date" id="tgl_ujian" name="tgl_ujian"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uas->tgl_ujian }}" />
                                            </div>

                                            @php
                                                $tgl_ujian = $uas->tgl_ujian;
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
                                                    value="{{ $uas->waktu_ujian }}" />
                                            </div>
                                        </div>
                                        <div class="flex flex-col lg:flex-row lg:gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="file_sebelumnya"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                    Sebelumnya</label>
                                                <input type="text" id="file_sebelumnya" name="file_sebelumnya"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $uas->file }}" readonly />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="file"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                    uas</label>
                                                <input type="file" id="file" name="file"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..." />
                                            </div>
                                        </div>

                                        <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                            class="fi fi-rr-disk "></i></button>

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
