<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Form Edit Soal UTS') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="flex px-12 pt-8">
                            <div class="w-10">
                                <img src="{{ url('img/cells.png') }}" alt="Icon 1" class="">
                            </div>
                            <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                FORM EDIT UTS
                            </div>
                        </div>
                        <hr class="border mt-2 border-black border-opacity-30 mx-12">
                        <div class="flex justify-center">
                            <div class="lg:px-12 pt-4 pb-12" style="width:100%;overflow-x:auto;">
                                <form action="{{ route('ujian_uts.update', $uts->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id_jadwal" value="{{ $uts->jadwal->id_jadwal }}">
                                        <input type="hidden" name="id_uts" value="{{ $uts->id_uts }}">
                                    <div class="flex flex-col lg:flex-row lg:gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="materi_ajar"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                                Ajar</label>
                                            <input type="text" id="materi_ajar" name="materi_ajar"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $uts->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}" readonly/>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="sks"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                            <input type="text" id="sks" name="sks"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $uts->jadwal->detail_kurikulum->materi_ajar->sks }}" readonly/>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="semester"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                            <input type="text" id="semester" name="semester"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $uts->jadwal->detail_kurikulum->materi_ajar->semester->semester }}" readonly/>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="nama_dosen"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengajar</label>
                                            <input type="text" id="nama_dosen" name="nama_dosen"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $uts->jadwal->dosen->nama_dosen }}" readonly/>
                                        </div>
                                    </div>

                                    <div class="flex flex-col lg:flex-row lg: gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="materi_ajar"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                            <input type="text" id="materi_ajar" name="materi_ajar"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $uts->jadwal->ruang->ruang }}" readonly/>
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
                                            <label for="tgl_ujian"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Utama</label>
                                            <input type="date" id="tgl_ujian" name="tgl_ujian"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $uts->tgl_ujian }}" />
                                        </div>

                                        <div class="mb-5 w-full">
                                            <label for="tgl_ujian"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Susulan</label>
                                            <input type="date" id="tgl_ujian_susulan" name="tgl_ujian_susulan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $uts->tgl_ujian_susulan }}" />
                                        </div>

                                        <div class="mb-5 w-full hidden">
                                            <label for="hari"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                            <input type="text" id="hari" name="hari"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 uppercase"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                value="{{ $hari }}" readonly />
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
                                    <div class="flex flex-col lg:flex-row gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="file_sebelumnya"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                Utama</label>
                                            <input type="text" id="file_sebelumnya" name="file_sebelumnya"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..." value="{{ $uts->file }}" readonly/>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="file_cadangan_sebelumnya"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                Cadangan</label>
                                            <input type="text" id="file_cadangan_sebelumnya" name="file_cadangan_sebelumnya"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..." value="{{ $uts->file_cadangan }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="flex flex-col lg:flex-row gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="file"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                Utama</label>
                                            <input type="file" id="file" name="file"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..." />
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="file_cadangan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal
                                                Cadangan</label>
                                            <input type="file" id="file_cadangan" name="file_cadangan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..." />
                                        </div>
                                    </div>

                                    <button type="submit"
                                    class="text-blue-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm border border-dashed border-blue-700 w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                        class="fi fi-rr-disk mr-2"></i> Simpan</button>
                                </form>
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
