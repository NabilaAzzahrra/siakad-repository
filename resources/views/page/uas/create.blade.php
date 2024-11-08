<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Soal UAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-between">
                                    <div>DATA TAMBAH SOAL UAS</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="lg:p-12 p-4" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('ujian_uas.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                                        <div class="flex flex-col lg:flex-row lg:gap-5">
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

                                        <div class="flex flex-col lg:flex-row lg:gap-5">
                                            <div class="mb-5 w-full">
                                                <label for="materi_ajar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                                <input type="text" id="materi_ajar" name="materi_ajar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $jadwal->ruang->ruang }}" />
                                            </div>

                                            {{-- UTS UTAMA --}}
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

                                                // dd($tgl_mulai, $hariInggris, $hari);

                                                // Array untuk mengonversi hari dari bahasa Indonesia ke indeks
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

                                                // dd($tgl_mulai, $hariInggris, $hari, $jadwalHari);

                                                // Cek apakah tgl_mulai jatuh pada hari yang sama dengan jadwal
                                                if ($hari == $jadwalHari) {
                                                    // dd('ini');
                                                    $mulai = $tgl_mulai;
                                                } else {
                                                    // dd('ini lah');
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

                                                $hariMulai = date('l', strtotime($mulai));
                                                // dd($hariMulai);
                                                if ($hariMulai == 'Monday') {
                                                    $dayStart = 'Senin';
                                                } elseif ($hariMulai == 'Tuesday') {
                                                    $dayStart = 'Selasa';
                                                } elseif ($hariMulai == 'Wednesday') {
                                                    $dayStart = 'Rabu';
                                                } elseif ($hariMulai == 'Thursday') {
                                                    $dayStart = 'Kamis';
                                                } elseif ($hariMulai == 'Friday') {
                                                    $dayStart = 'Jumat';
                                                } elseif ($hariMulai == 'Saturday') {
                                                    $dayStart = 'Sabtu';
                                                } elseif ($hariMulai == 'Sunday') {
                                                    $dayStart = 'Minggu';
                                                } else {
                                                    $dayStart = 'Hari tidak valid';
                                                }

                                                // dd($dayStart);

                                            @endphp

                                            {{-- UTS SUSULAN --}}
                                            @php
                                                $tgl_susulan = $konfigurasi_ujian->tgl_susulan;
                                                $hariInggris = date('l', strtotime($tgl_susulan));

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

                                                // dd($tgl_mulai, $hariInggris, $hari);

                                                // Array untuk mengonversi hari dari bahasa Indonesia ke indeks
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

                                                // dd($tgl_mulai, $hariInggris, $hari, $jadwalHari);

                                                // Cek apakah tgl_mulai jatuh pada hari yang sama dengan jadwal
                                                if ($hari == $jadwalHari) {
                                                    // dd('ini');
                                                    $mulai = $tgl_susulan;
                                                } else {
                                                    // dd('ini lah');
                                                    // Hitung selisih hari antara tgl_mulai dan hari di jadwal
                                                    $selisihHari =
                                                        ($hariKeIndeks[$jadwalHari] - $hariKeIndeks[$hari]) % 7;

                                                    // Jika selisih negatif, tambahkan 7 agar menjadi selisih positif
                                                    if ($selisihHari < 0) {
                                                        $selisihHari += 7;
                                                    }

                                                    // Tambahkan selisih hari ke tgl_mulai
                                                    $susulan = date(
                                                        'Y-m-d',
                                                        strtotime("+$selisihHari days", strtotime($tgl_susulan)),
                                                    );
                                                }

                                                $hariMulai = date('l', strtotime($susulan));
                                                // dd($hariMulai);
                                                if ($hariMulai == 'Monday') {
                                                    $dayStart = 'Senin';
                                                } elseif ($hariMulai == 'Tuesday') {
                                                    $dayStart = 'Selasa';
                                                } elseif ($hariMulai == 'Wednesday') {
                                                    $dayStart = 'Rabu';
                                                } elseif ($hariMulai == 'Thursday') {
                                                    $dayStart = 'Kamis';
                                                } elseif ($hariMulai == 'Friday') {
                                                    $dayStart = 'Jumat';
                                                } elseif ($hariMulai == 'Saturday') {
                                                    $dayStart = 'Sabtu';
                                                } elseif ($hariMulai == 'Sunday') {
                                                    $dayStart = 'Minggu';
                                                } else {
                                                    $dayStart = 'Hari tidak valid';
                                                }

                                                // dd($dayStart);

                                            @endphp


                                            <div class="mb-5 w-full">
                                                <label for="tgl_ujian"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai</label>
                                                <input type="date" id="tgl_ujian" name="tgl_ujian"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $mulai }}" />
                                            </div>

                                            <div class="mb-5 w-full">
                                                <label for="tgl_ujian"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Susulan</label>
                                                <input type="date" id="tgl_ujian_susulan" name="tgl_ujian_susulan"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Masukan Materi Ajar disini ..."
                                                    value="{{ $susulan }}" />
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
                                                    value="{{ $jadwal->sesi->pukul->pukul }}" />
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
