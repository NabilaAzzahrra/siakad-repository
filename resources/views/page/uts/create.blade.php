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
                                    <form action="{{ route('ujian_uts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                                        <div class="flex gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="materi_ajar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                                    Ajar</label>
                                                <input type="text" id="materi_ajar" name="materi_ajar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="sks"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                                <input type="text" id="sks" name="sks"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $jadwal->detail_kurikulum->materi_ajar->sks }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="semester"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                                <input type="text" id="semester" name="semester"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }}" />
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="nama_dosen"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengajar</label>
                                                <input type="text" id="nama_dosen" name="nama_dosen"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $jadwal->dosen->nama_dosen }}" />
                                            </div>
                                        </div>

                                        <div class="flex gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="materi_ajar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                                <input type="text" id="materi_ajar" name="materi_ajar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $jadwal->ruang->ruang }}" />
                                            </div>

                                            @php
                                                $tgl_mulai = $konfigurasi_ujian->tgl_mulai;
                                                $hariInggris = date('l', strtotime($tgl_mulai));

                                                $hariIndonesia = [
                                                    'Sunday' => 'Minggu',
                                                    'Monday' => 'Senin',
                                                    'Tuesday' => 'Selasa',
                                                    'Wednesday' => 'Rabu',
                                                    'Thursday' => 'Kamis',
                                                    'Friday' => 'Jumat',
                                                    'Saturday' => 'Sabtu',
                                                ];

                                                $hari = $hariIndonesia[$hariInggris];

                                                // Array untuk mengonversi hari d6ari bahasa Indonesia ke indeks
                                                $hariKeIndeks = [
                                                    'Minggu' => 0,
                                                    'Senin' => 1,
                                                    'Selasa' => 2,
                                                    'Rabu' => 3,
                                                    'Kamis' => 4,
                                                    'Jumat' => 5,
                                                    'Sabtu' => 6,
                                                ];

                                                // Konversi jadwal hari menjadi format kapitalisasi sesuai array
                                                $jadwalHari = ucfirst(strtolower($jadwal->hari->hari));

                                                // Cek apakah tgl_mulai jatuh pada hari yang sama dengan jadwal
                                                if ($hari == $jadwalHari) {
                                                    $mulai = $tgl_mulai;
                                                } else {
                                                    // Hitung selisih hari antara tgl_mulai dan hari di jadwal
                                                    $selisihHari =
                                                        ($hariKeIndeks[$jadwalHari] - $hariKeIndeks[$hari]) % 7;

                                                    // Jika selisih negatif, tambahkan 7 agar menjadi selisih positif
                                                    if ($selisihHari < 0) {
                                                        $selisihHari += 7;
                                                    }

                                                    // Tambahkan selisih hari ke tgl_mulai
                                                    $mulai = date(
                                                        'Y-m-d',
                                                        strtotime("+$selisihHari days", strtotime($tgl_mulai)),
                                                    );
                                                }

                                                // Sekarang, $mulai adalah tanggal ujian yang sesuai

                                            @endphp


                                            <div class="mb-5 w-full">
                                                <label for="tgl_ujian"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                                <input type="date" id="tgl_ujian" name="tgl_ujian"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $mulai }}" />
                                            </div>

                                            <div class="mb-5 w-full">
                                                <label for="hari"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                                <input type="text" id="hari" name="hari"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 uppercase"
                                                    placeholder="Masukan Materi Ajar disini ..." value="{{ $hari }}" readonly/>
                                            </div>
                                            <div class="mb-5 w-full">
                                                <label for="waktu_ujian"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pukul</label>
                                                <input type="text" id="waktu_ujian" name="waktu_ujian"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $jadwal->sesi->pukul->pukul }}"/>
                                            </div>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="file"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal UTS</label>
                                            <input type="file" id="file" name="file"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Materi Ajar disini ..."
                                                />
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
            const options = { weekday: 'long' };
            const hari = new Intl.DateTimeFormat('id-ID', options).format(date);
            document.getElementById('hari').value = hari;
        });
    </script>
</x-app-layout>
