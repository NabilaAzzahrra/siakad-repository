<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8sm mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center lg:mr-6">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ url('img/logo.png') }}" alt="" srcset="" class="w-8">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <div class="text-[16px] font-bold tracking-wide">Dashboard</div>
                    </x-nav-link>
                </div>

                @can('role-A')
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs(['perhitungan.index', 'konfigurasi.index', 'fakultas.index', 'konfigurasi_ujian.index', 'kurikulum.index', 'dosen.index', 'informasi.index', 'hari.index', 'pukul.index', 'ruang.index', 'sesi.index', 'jurusan.index', 'kelas.index', 'materi_ajar.index', 'semester.index', 'keterangan.index', 'tahunakademik.index']) || request()->routeIs(['perhitungan.index', 'konfigurasi.index', 'konfigurasi_ujian.index', 'kurikulum.index', 'dosen.index', 'informasi.index', 'hari.index', 'pukul.index', 'ruang.index', 'sesi.index', 'jurusan.index', 'kelas.index', 'materi_ajar.index', 'semester.index', 'keterangan.index', 'tahunakademik.index']) ? 'text-[#F2994A]' : '' }}">
                                            Master</div>
                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs(['perhitungan.index', 'konfigurasi.index', 'fakultas.index', 'konfigurasi_ujian.index', 'kurikulum.index', 'dosen.index', 'informasi.index', 'hari.index', 'pukul.index', 'ruang.index', 'sesi.index', 'jurusan.index', 'kelas.index', 'materi_ajar.index', 'semester.index', 'keterangan.index', 'tahunakademik.index']) || request()->routeIs(['perhitungan.index', 'konfigurasi.index', 'konfigurasi_ujian.index', 'kurikulum.index', 'dosen.index', 'informasi.index', 'hari.index', 'pukul.index', 'ruang.index', 'sesi.index', 'jurusan.index', 'kelas.index', 'materi_ajar.index', 'semester.index', 'keterangan.index', 'tahunakademik.index']) ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="relative">
                                        <button id="jadwal-button"
                                            class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150 {{ request()->routeIs([
                                                'hari.index',
                                                'pukul.index',
                                                'ruang.index',
                                                'sesi.index',
                                                'jurusan.index',
                                                'kelas.index',
                                                'materi_ajar.index',
                                                'semester.index',
                                                'keterangan.index',
                                                'tahunakademik.index',
                                                'fakultas.index',
                                            ])
                                                ? 'text-red-500 font-bold'
                                                : '' }}">
                                            Jadwal
                                            <i class="fi fi-rr-caret-right"></i>
                                        </button>
                                        <div id="jadwal-submenu"
                                            class="hidden absolute left-full top-0 ml-2 -mt-1 w-48 bg-white shadow-lg rounded-md border">
                                            <x-dropdown-link :href="route('hari.index')" :class="request()->routeIs('hari.index') ? 'text-red-500 font-bold' : ''">
                                                {{ __('Hari') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('pukul.index')" :class="request()->routeIs('pukul.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Pukul') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('ruang.index')" :class="request()->routeIs('ruang.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Ruang') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('sesi.index')" :class="request()->routeIs('sesi.index') ? 'text-red-500 font-bold' : ''">
                                                {{ __('Sesi') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('fakultas.index')" :class="request()->routeIs('fakultas.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Fakultas') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('jurusan.index')" :class="request()->routeIs('jurusan.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Program Studi') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('kelas.index')" :class="request()->routeIs('kelas.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Kelas') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('semester.index')" :class="request()->routeIs('semester.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Semester') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('keterangan.index')" :class="request()->routeIs('keterangan.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Keterangan') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('tahunakademik.index')" :class="request()->routeIs('tahunakademik.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Tahun Akademik') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('materi_ajar.index')" :class="request()->routeIs('materi_ajar.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Materi Ajar') }}
                                            </x-dropdown-link>
                                        </div>
                                    </div>

                                    <x-dropdown-link :href="route('dosen.index')" :class="request()->routeIs('dosen.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Dosen') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('kurikulum.index')" :class="request()->routeIs('kurikulum.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Kurikulum') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('perhitungan.index')" :class="request()->routeIs('perhitungan.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Perhitungan') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('informasi.index')" :class="request()->routeIs('informasi.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Informasi') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('konfigurasi.index')" :class="request()->routeIs('konfigurasi.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Konfigurasi Akademik') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('konfigurasi_ujian.index')" :class="request()->routeIs('konfigurasi_ujian.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Konfigurasi Ujian') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('mahasiswa.index')" :active="request()->routeIs('mahasiswa.index')">
                            <div class="text-[16px] font-bold tracking-wide">Mahasiswa</div>
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('jadwal_reguler.index')" :active="request()->routeIs('jadwal_reguler.index')">
                            <div class="text-[16px] font-bold tracking-wide">Jadwal</div>
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('nilai.index')" :active="request()->routeIs(['nilai.index', 'nilai.show'])">
                            <div class="text-[16px] font-bold tracking-wide">Nilai</div>
                        </x-nav-link>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('ujian_uts.index') || request()->routeIs('ujian_uas.index') ? 'text-[#F2994A]' : '' }}">
                                            Ujian</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs('ujian_uts.index') || request()->routeIs('ujian_uas.index') ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('ujian_uts.index')" :class="request()->routeIs('ujian_uts.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('UTS') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('ujian_uas.index')" :class="request()->routeIs('ujian_uas.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('UAS') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>


                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400  dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs(['report_dosen.index', 'report_keseluruhan.index', 'report_presensi_mahasiswa.index', 'khs.index', 'data_prestasi.index', 'transkrip.index', 'report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) || request()->routeIs(['report_dosen.index', 'report_keseluruhan.index', 'report_presensi_mahasiswa.index', 'khs.index', 'data_prestasi.index', 'transkrip.index', 'report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) ? 'text-[#F2994A]' : '' }}">
                                            Report</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs(['report_dosen.index', 'report_keseluruhan.index', 'report_presensi_mahasiswa.index', 'khs.index', 'data_prestasi.index', 'transkrip.index', 'report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) || request()->routeIs(['report_dosen.index', 'report_keseluruhan.index', 'report_presensi_mahasiswa.index', 'khs.index', 'data_prestasi.index', 'transkrip.index', 'report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="relative">
                                        <button id="presensi-button"
                                            class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150 {{ request()->routeIs(['report_dosen.index', 'report_keseluruhan.index', 'report_presensi_mahasiswa.index']) ? 'text-red-500 font-bold' : '' }}">
                                            {{ __('Presensi') }}
                                            <i class="fi fi-rr-caret-right"></i>
                                        </button>
                                        <div id="presensi-submenu"
                                            class="hidden absolute left-full top-0 ml-2 -mt-1 w-52 bg-white shadow-lg rounded-md border">
                                            <x-dropdown-link :href="route('report_dosen.index')" :class="request()->routeIs('report_dosen.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Dosen') }}
                                            </x-dropdown-link>
                                            <div class="relative">
                                                <button id="anak-presensi-submenu-button"
                                                    class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150 {{ request()->routeIs(['report_keseluruhan.index', 'report_presensi_mahasiswa.index']) ? 'text-red-500 font-bold' : '' }}">
                                                    {{ __('Mahasiswa') }}
                                                    <i class="fi fi-rr-caret-right"></i>
                                                </button>
                                                <div id="anak-presensi-submenu"
                                                    class="hidden absolute left-full top-0 ml-2 -mt-9 w-48 bg-white shadow-lg rounded-md border">
                                                    <x-dropdown-link :href="route('report_keseluruhan.index')" :class="request()->routeIs('report_keseluruhan.index')
                                                        ? 'text-red-500 font-bold'
                                                        : ''">
                                                        {{ __('Keseluruhan') }}
                                                    </x-dropdown-link>
                                                    <x-dropdown-link :href="route('report_presensi_mahasiswa.index')" :class="request()->routeIs('report_presensi_mahasiswa.index')
                                                        ? 'text-red-500 font-bold'
                                                        : ''">
                                                        {{ __('Per Mahasiswa') }}
                                                    </x-dropdown-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <button id="nilai-button"
                                            class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150 {{ request()->routeIs(['khs.index', 'data_prestasi.index', 'transkrip.index', 'report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) ? 'text-red-500 font-bold' : '' }}">
                                            {{ __('Nilai') }}
                                            <i
                                                class="fi fi-rr-caret-right {{ request()->routeIs(['khs.index', 'data_prestasi.index', 'transkrip.index', 'report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) ? 'text-red-500 font-bold' : '' }}"></i>
                                        </button>
                                        <div id="nilai-submenu"
                                            class="hidden absolute left-full top-0 -mt-10 ml-2 w-48 bg-white border shadow-lg rounded-md">
                                            <div class="relative">
                                                <button id="anak-nilai-submenu-button"
                                                    class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150 {{ request()->routeIs(['report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) ? 'text-red-500 font-bold' : '' }}">
                                                    {{ __('Mahasiswa') }}
                                                    <i
                                                        class="fi fi-rr-caret-right {{ request()->routeIs(['report_nilai_keseluruhan.index', 'report_nilai_mahasiswa.index']) ? 'text-red-500 font-bold' : '' }}"></i>
                                                </button>
                                                <div id="anak-nilai-submenu"
                                                    class="hidden absolute left-full top-0 ml-2 -mt-0 w-48 bg-white shadow-lg rounded-md border">
                                                    <x-dropdown-link :href="route('report_nilai_keseluruhan.index')" :class="request()->routeIs('report_nilai_keseluruhan.index')
                                                        ? 'text-red-500 font-bold'
                                                        : ''">
                                                        {{ __('Keseluruhan') }}
                                                    </x-dropdown-link>
                                                    <x-dropdown-link :href="route('report_nilai_mahasiswa.index')" :class="request()->routeIs('report_nilai_mahasiswa.index')
                                                        ? 'text-red-500 font-bold'
                                                        : ''">
                                                        {{ __('Per Mahasiswa') }}
                                                    </x-dropdown-link>
                                                </div>
                                            </div>
                                            <x-dropdown-link :href="route('khs.index')" :class="request()->routeIs('khs.index') ? 'text-red-500 font-bold' : ''">
                                                {{ __('KHS') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('data_prestasi.index')" :class="request()->routeIs('data_prestasi.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Data Prestasi') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('transkrip.index')" :class="request()->routeIs('transkrip.index')
                                                ? 'text-red-500 font-bold'
                                                : ''">
                                                {{ __('Transkrip') }}
                                            </x-dropdown-link>
                                        </div>
                                    </div>
                                </x-slot>

                            </x-dropdown>
                        </li>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('dosenPembimbing.index') || request()->routeIs('revisiProj.index') || request()->routeIs('penguji.index') || request()->routeIs('sidang.index') || request()->routeIs('daftarSidang.index') || request()->routeIs('bimbinganMahasiswa.index') || request()->routeIs('penguji.index') ? 'text-[#F2994A]' : '' }}">
                                            Project</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs('dosenPembimbing.index') || request()->routeIs('revisiProj.index') || request()->routeIs('penguji.index') || request()->routeIs('sidang.index') || request()->routeIs('daftarSidang.index') || request()->routeIs('bimbinganMahasiswa.index') || request()->routeIs('penguji.index') ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('dosenPembimbing.index')" :class="request()->routeIs('dosenPembimbing.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Dosen Pembimbing') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('pengajuanJudul.index')" :class="request()->routeIs('pengajuanJudul.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Pengajuan Judul') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('bimbinganMahasiswa.index')" :class="request()->routeIs('bimbinganMahasiswa.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Bimbingan') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('daftarSidang.index')" :class="request()->routeIs('daftarSidang.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Daftar') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('penguji.index')" :class="request()->routeIs('penguji.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Penguji') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('sidang.index')" :class="request()->routeIs('sidang.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Sidang') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('revisiProj.index')" :class="request()->routeIs('revisiProj.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Revisi') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('inputNilaiPembimbing.create')" :class="request()->routeIs('inputNilaiPembimbing.create') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Verifikasi Nilai Pembimbing') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('nilaiPenguji.index')" :class="request()->routeIs('revisiProj.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Verifikasi Nilai Penguji') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>
                @endcan

                @can('role-M')
                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('krs_mhs.index')" :active="request()->routeIs('krs_mhs.index')">
                            <div class="text-[16px] font-bold tracking-wide">KRS</div>
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('jadwal_reguler.jadwal_mhs', Auth::user()->email)" :active="request()->routeIs('jadwal_reguler.jadwal_mhs', Auth::user()->email)">
                            <div class="text-[16px] font-bold tracking-wide">Jadwal</div>
                        </x-nav-link>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('ujian_uts_mhs.index', 'ujian_uas_mhs.index') || request()->routeIs('ujian_uts_mhs.index', 'ujian_uas_mhs.index') ? 'text-[#F2994A]' : '' }}">
                                            Ujian</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs('ujian_uts_mhs.index', 'ujian_uas_mhs.index') || request()->routeIs('ujian_uts_mhs.index', 'ujian_uas_mhs.index') ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('ujian_uts_mhs.index')" :class="request()->routeIs('ujian_uts_mhs.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('UTS') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('ujian_uas_mhs.index')" :class="request()->routeIs('ujian_uas_mhs.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('UAS') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('report_presensi_mahasiswa.edit', Auth::user()->email)" :active="request()->routeIs('report_presensi_mahasiswa.edit', Auth::user()->email)">
                            <div class="text-[16px] font-bold tracking-wide">Presensi</div>
                        </x-nav-link>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('report_nilai_mahasiswa.edit', Auth::user()->email, 'report_khs_mahasiswa.edit', Auth::user()->email, 'report_dapres_mahasiswa.edit', Auth::user()->email) || request()->routeIs('report_nilai_mahasiswa.edit', Auth::user()->email, 'report_khs_mahasiswa.edit', Auth::user()->email, 'report_dapres_mahasiswa.edit', Auth::user()->email) ? 'text-[#F2994A]' : '' }}">
                                            Nilai</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs('report_nilai_mahasiswa.edit', Auth::user()->email, 'report_khs_mahasiswa.edit', Auth::user()->email, 'report_dapres_mahasiswa.edit', Auth::user()->email) || request()->routeIs('report_nilai_mahasiswa.edit', Auth::user()->email, 'report_khs_mahasiswa.edit', Auth::user()->email, 'report_dapres_mahasiswa.edit', Auth::user()->email) ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('report_nilai_mahasiswa.edit', Auth::user()->email)" :class="request()->routeIs('report_nilai_mahasiswa.edit', Auth::user()->email)
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Keseluruhan') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('report_khs_mahasiswa.edit', Auth::user()->email)" :class="request()->routeIs('report_khs_mahasiswa.edit', Auth::user()->email)
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('KHS') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('report_dapres_mahasiswa.edit', Auth::user()->email)" :class="request()->routeIs('report_dapres_mahasiswa.edit', Auth::user()->email)
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Data Prestasi') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('appProjek.edit', Auth::user()->email)" :active="request()->routeIs('appProjek.edit', Auth::user()->email)">
                            <div class="text-[16px] font-bold tracking-wide">Project</div>
                        </x-nav-link>
                    </div>
                @endcan

                @can('role-O')
                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('jadwal_reguler.jadwal_mhs', str_replace('ortu', '', Auth::user()->email))" :active="request()->routeIs(
                            'jadwal_reguler.jadwal_mhs',
                            str_replace('ortu', '', Auth::user()->email),
                        )">
                            <div class="text-[16px] font-bold tracking-wide">Jadwal</div>
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route(
                            'report_presensi_mahasiswa.edit',
                            str_replace('ortu', '', Auth::user()->email),
                        )" :active="request()->routeIs(
                            'report_presensi_mahasiswa.edit',
                            str_replace('ortu', '', Auth::user()->email),
                        )">
                            <div class="text-[16px] font-bold tracking-wide">Presensi</div>
                        </x-nav-link>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs([
                                                'report_nilai_mahasiswa.edit',
                                                str_replace('ortu', '', Auth::user()->email),
                                                'report_khs_mahasiswa.edit',
                                                str_replace('ortu', '', Auth::user()->email),
                                                'report_dapres_mahasiswa.edit',
                                                str_replace('ortu', '', Auth::user()->email),
                                            ])
                                                ? 'text-[#F2994A]'
                                                : '' }}">
                                            Nilai</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs([
                                                    'report_nilai_mahasiswa.edit',
                                                    str_replace('ortu', '', Auth::user()->email),
                                                    'report_khs_mahasiswa.edit',
                                                    str_replace('ortu', '', Auth::user()->email),
                                                    'report_dapres_mahasiswa.edit',
                                                    str_replace('ortu', '', Auth::user()->email),
                                                ])
                                                    ? 'text-[#F2994A]'
                                                    : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route(
                                        'report_nilai_mahasiswa.edit',
                                        str_replace('ortu', '', Auth::user()->email),
                                    )" :class="request()->routeIs(
                                        'report_nilai_mahasiswa.edit',
                                        str_replace('ortu', '', Auth::user()->email),
                                    )
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Keseluruhan') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route(
                                        'report_khs_mahasiswa.edit',
                                        str_replace('ortu', '', Auth::user()->email),
                                    )" :class="request()->routeIs(
                                        'report_khs_mahasiswa.edit',
                                        str_replace('ortu', '', Auth::user()->email),
                                    )
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('KHS') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route(
                                        'report_dapres_mahasiswa.edit',
                                        str_replace('ortu', '', Auth::user()->email),
                                    )" :class="request()->routeIs(
                                        'report_dapres_mahasiswa.edit',
                                        str_replace('ortu', '', Auth::user()->email),
                                    )
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Data Prestasi') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>
                @endcan

                @can('role-D')
                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('jadwal_reguler.jadwal_dosen', Auth::user()->email)" :active="request()->routeIs('jadwal_reguler.jadwal_dosen', Auth::user()->email)">
                            <div class="text-[16px] font-bold tracking-wide">Jadwal</div>
                        </x-nav-link>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs(['ujian_uts.ujian_uts_dosen', Auth::user()->email, 'ujian_uas.ujian_uas_dosen', Auth::user()->email]) ? 'text-[#F2994A]' : '' }}">
                                            Ujian</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs(['ujian_uts.ujian_uts_dosen', Auth::user()->email, 'ujian_uas.ujian_uas_dosen', Auth::user()->email]) ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('ujian_uts.ujian_uts_dosen', Auth::user()->email)" :class="request()->routeIs('ujian_uts.ujian_uts_dosen', Auth::user()->email)
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('UTS') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('ujian_uas.ujian_uas_dosen', Auth::user()->email)" :class="request()->routeIs('ujian_uas.ujian_uas_dosen', Auth::user()->email)
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('UAS') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('nilai.nilai_dosen', Auth::user()->email)" :active="request()->routeIs('nilai.nilai_dosen', Auth::user()->email)">
                            <div class="text-[16px] font-bold tracking-wide">Nilai</div>
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('report_dosen.show_dosen', Auth::user()->email)" :active="request()->routeIs('report_dosen.show_dosen', Auth::user()->email)">
                            <div class="text-[16px] font-bold tracking-wide">Report Presensi Dosen</div>
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('report_keseluruhan.r_mahasiswa')" :active="request()->routeIs('report_keseluruhan.r_mahasiswa')">
                            <div class="text-[16px] font-bold tracking-wide">Report Presensi Mahasiswa</div>
                        </x-nav-link>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('mahasiswaBimbingan.index') || request()->routeIs('pengajuanJudulMahasiswa.index') || request()->routeIs('sidangMahasiswa.index') || request()->routeIs('sidang.index') || request()->routeIs('daftarSidang.index') || request()->routeIs('bimbinganMahasiswa.index') || request()->routeIs('penguji.index') ? 'text-[#F2994A]' : '' }}">
                                            Project</div>

                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs('mahasiswaBimbingan.index') || request()->routeIs('pengajuanJudulMahasiswa.index') || request()->routeIs('sidangMahasiswa.index') || request()->routeIs('sidang.index') || request()->routeIs('daftarSidang.index') || request()->routeIs('bimbinganMahasiswa.index') || request()->routeIs('penguji.index') ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('pengajuanJudulMahasiswa.index')" :class="request()->routeIs('pengajuanJudulMahasiswa.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Pengajuan Judul') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('mahasiswaBimbingan.index')" :class="request()->routeIs('mahasiswaBimbingan.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Mahasiswa Bimbingan') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('sidangMahasiswa.index')" :class="request()->routeIs('sidangMahasiswa.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Sidang') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('verifikasiPembimbing.index')" :class="request()->routeIs('verifikasiPembimbing.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Verifikasi Pembimbing') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('verifikasiPenguji.index')" :class="request()->routeIs('verifikasiPenguji.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Verifikasi Penguji') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>
                @endcan

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black tracking-wide dark:text-gray-400  dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-left">
                                <div class="text-[16px] font-bold tracking-wide">{{ Auth::user()->name }}</div>
                                <div class="mt-1">{{ Auth::user()->email }}</div>
                            </div>

                            <div class="ms-1 ml-[15px]">
                                <img src="{{ url('img/user.png') }}" alt="" srcset="" class="lg:w-8">
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        @can('role-A')
            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Master') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('perhitungan.index')" :active="request()->routeIs('perhitungan.index')">
                        {{ __('Perhitungan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('konfigurasi.index')" :active="request()->routeIs('konfigurasi.index')">
                        {{ __('Konfigurasi Akademik') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('konfigurasi_ujian.index')" :active="request()->routeIs('konfigurasi_ujian.index')">
                        {{ __('Konfigurasi Ujian') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('kurikulum.index')" :active="request()->routeIs('kurikulum.index')">
                        {{ __('Kurikulum') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('dosen.index')" :active="request()->routeIs('dosen.index')">
                        {{ __('Dosen') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('informasi.index')" :active="request()->routeIs('informasi.index')">
                        {{ __('Informasi') }}
                    </x-responsive-nav-link>
                    <!-- Jadwal Dropdown -->
                    <div x-data="{ openAccountSettings: false }">
                        <button @click="openAccountSettings = !openAccountSettings"
                            class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ __('Jadwal') }}
                        </button>

                        <!-- Sub-menu for Jadwal -->
                        <div x-show="openAccountSettings" class="pl-4 space-y-1">
                            <x-responsive-nav-link :href="route('hari.index')" :active="request()->routeIs('hari.index')">
                                {{ __('Hari') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('pukul.index')" :active="request()->routeIs('pukul.index')">
                                {{ __('Pukul') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('ruang.index')" :active="request()->routeIs('ruang.index')">
                                {{ __('Ruang') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('sesi.index')" :active="request()->routeIs('sesi.index')">
                                {{ __('Sesi') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('fakultas.index')" :active="request()->routeIs('fakultas.index')">
                                {{ __('Fakultas') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.index')">
                                {{ __('Jurusan') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.index')">
                                {{ __('Kelas') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('materi_ajar.index')" :active="request()->routeIs('materi_ajar.index')">
                                {{ __('Materi Ajar') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('semester.index')" :active="request()->routeIs('semester.index')">
                                {{ __('Semester') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('keterangan.index')" :active="request()->routeIs('keterangan.index')">
                                {{ __('Keterangan') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('tahunakademik.index')" :active="request()->routeIs('tahunakademik.index')">
                                {{ __('Tahun Akademik') }}
                            </x-responsive-nav-link>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('mahasiswa.index')" :active="request()->routeIs('mahasiswa.index')">
                    {{ __('Mahasiswa') }}
                </x-responsive-nav-link>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('jadwal_reguler.index')" :active="request()->routeIs('jadwal_reguler.index')">
                    {{ __('Jadwal') }}
                </x-responsive-nav-link>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('nilai.index')" :active="request()->routeIs('nilai.index')">
                    {{ __('Nilai') }}
                </x-responsive-nav-link>
            </div>

            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Ujian') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('ujian_uts.index')" :active="request()->routeIs('ujian_uts.index')">
                        {{ __('UTS') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('ujian_uas.index')" :active="request()->routeIs('ujian_uas.index')">
                        {{ __('UAS') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Report') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <!-- Presensi Dropdown -->
                    <div x-data="{ openPresensi: false }">
                        <button @click="openPresensi = !openPresensi"
                            class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ __('Presensi') }}
                        </button>

                        <!-- Sub-menu for Presensi -->
                        <div x-show="openPresensi" class="pl-4 space-y-1">
                            <x-responsive-nav-link :href="route('report_dosen.index')" :active="request()->routeIs('report_dosen.index')">
                                {{ __('Dosen') }}
                            </x-responsive-nav-link>

                            <!-- Mahasiswa Submenu -->
                            <div x-data="{ openMahasiswa: false }">
                                <button @click="openMahasiswa = !openMahasiswa"
                                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    {{ __('Mahasiswa') }}
                                </button>

                                <!-- Sub-menu for Mahasiswa -->
                                <div x-show="openMahasiswa" class="pl-4 space-y-1">
                                    <x-responsive-nav-link :href="route('report_keseluruhan.index')" :active="request()->routeIs('report_keseluruhan.index')">
                                        {{ __('Keseluruhan') }}
                                    </x-responsive-nav-link>
                                    <x-responsive-nav-link :href="route('report_presensi_mahasiswa.index')" :active="request()->routeIs('report_presensi_mahasiswa.index')">
                                        {{ __('Per Mahasiswa') }}
                                    </x-responsive-nav-link>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nilai Dropdown -->
                    <div x-data="{ openNilai: false }">
                        <button @click="openNilai = !openNilai"
                            class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ __('Nilai') }}
                        </button>

                        <!-- Sub-menu for Nilai -->
                        <div x-show="openNilai" class="pl-4 space-y-1">
                            <!-- Mahasiswa Submenu -->
                            <div x-data="{ openMahasiswaNilai: false }">
                                <button @click="openMahasiswaNilai = !openMahasiswaNilai"
                                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    {{ __('Mahasiswa') }}
                                </button>

                                <!-- Sub-menu for Mahasiswa Nilai -->
                                <div x-show="openMahasiswaNilai" class="pl-4 space-y-1">
                                    <x-responsive-nav-link :href="route('report_nilai_keseluruhan.index')" :active="request()->routeIs('report_nilai_keseluruhan.index')">
                                        {{ __('Keseluruhan') }}
                                    </x-responsive-nav-link>
                                    <x-responsive-nav-link :href="route('report_nilai_mahasiswa.index')" :active="request()->routeIs('report_nilai_mahasiswa.index')">
                                        {{ __('Per Mahasiswa') }}
                                    </x-responsive-nav-link>
                                </div>
                            </div>

                            <x-responsive-nav-link :href="route('khs.index')" :active="request()->routeIs('khs.index')">
                                {{ __('KHS') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('data_prestasi.index')" :active="request()->routeIs('data_prestasi.index')">
                                {{ __('Data Prestasi') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('transkrip.index')" :active="request()->routeIs('transkrip.index')">
                                {{ __('Transkrip') }}
                            </x-responsive-nav-link>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('role-M')
            <div class="space-y-1">
                <x-responsive-nav-link :href="route('krs_mhs.index')" :active="request()->routeIs('krs_mhs.index')">
                    {{ __('KRS') }}
                </x-responsive-nav-link>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('jadwal_reguler.jadwal_mhs', Auth::user()->email)" :active="request()->routeIs('jadwal_reguler.jadwal_mhs', Auth::user()->email)">
                    {{ __('Jadwal') }}
                </x-responsive-nav-link>
            </div>

            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Ujian') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('ujian_uts_mhs.index')" :active="request()->routeIs('ujian_uts_mhs.index')">
                        {{ __('UTS') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('ujian_uas_mhs.index')" :active="request()->routeIs('ujian_uas_mhs.index')">
                        {{ __('UAS') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('report_presensi_mahasiswa.edit', Auth::user()->email)" :active="request()->routeIs('report_presensi_mahasiswa.edit', Auth::user()->email)">
                    {{ __('Presensi') }}
                </x-responsive-nav-link>
            </div>

            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Nilai') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('report_nilai_mahasiswa.edit', Auth::user()->email)" :active="request()->routeIs('report_nilai_mahasiswa.edit', Auth::user()->email)">
                        {{ __('Keseluruhan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report_khs_mahasiswa.edit', Auth::user()->email)" :active="request()->routeIs('report_khs_mahasiswa.edit', Auth::user()->email)">
                        {{ __('KHS') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report_dapres_mahasiswa.edit', Auth::user()->email)" :active="request()->routeIs('report_dapres_mahasiswa.edit', Auth::user()->email)">
                        {{ __('Data Prestasi') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('appProjek.edit', Auth::user()->email)" :active="request()->routeIs('appProjek.edit', Auth::user()->email)">
                    {{ __('Project') }}
                </x-responsive-nav-link>
            </div>
        @endcan

        @can('role-D')
            <div class="space-y-1">
                <x-responsive-nav-link :href="route('jadwal_reguler.jadwal_dosen', Auth::user()->email)" :active="request()->routeIs('jadwal_reguler.jadwal_dosen', Auth::user()->email)">
                    {{ __('Jadwal') }}
                </x-responsive-nav-link>
            </div>

            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Ujian') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('ujian_uts.ujian_uts_dosen', Auth::user()->email)" :active="request()->routeIs('ujian_uts.ujian_uts_dosen', Auth::user()->email)">
                        {{ __('UTS') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('ujian_uas.ujian_uas_dosen', Auth::user()->email)" :active="request()->routeIs('ujian_uas.ujian_uas_dosen', Auth::user()->email)">
                        {{ __('UAS') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('nilai.nilai_dosen', Auth::user()->email)" :active="request()->routeIs('nilai.nilai_dosen', Auth::user()->email)">
                    {{ __('Nilai') }}
                </x-responsive-nav-link>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('report_dosen.show_dosen', Auth::user()->email)" :active="request()->routeIs('report_dosen.show_dosen', Auth::user()->email)">
                    {{ __('Report Presensi Dosen') }}
                </x-responsive-nav-link>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('report_keseluruhan.r_mahasiswa')" :active="request()->routeIs('report_keseluruhan.r_mahasiswa')">
                    {{ __('Report Presensi Mahasiswa') }}
                </x-responsive-nav-link>
            </div>
        @endcan

        @can('role-O')
            <div class="space-y-1">
                <x-responsive-nav-link :href="route('jadwal_reguler.jadwal_mhs', str_replace('ortu', '', Auth::user()->email))" :active="request()->routeIs(
                    'jadwal_reguler.jadwal_mhs',
                    str_replace('ortu', '', Auth::user()->email),
                )">
                    {{ __('Jadwal') }}
                </x-responsive-nav-link>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('report_presensi_mahasiswa.edit', str_replace('ortu', '', Auth::user()->email))" :active="request()->routeIs(
                    'report_presensi_mahasiswa.edit',
                    str_replace('ortu', '', Auth::user()->email),
                )">
                    {{ __('Presensi') }}
                </x-responsive-nav-link>
            </div>

            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Nilai') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('report_nilai_mahasiswa.edit', str_replace('ortu', '', Auth::user()->email))" :active="request()->routeIs(
                        'report_nilai_mahasiswa.edit',
                        str_replace('ortu', '', Auth::user()->email),
                    )">
                        {{ __('Keseluruhan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report_khs_mahasiswa.edit', str_replace('ortu', '', Auth::user()->email))" :active="request()->routeIs(
                        'report_khs_mahasiswa.edit',
                        str_replace('ortu', '', Auth::user()->email),
                    )">
                        {{ __('KHS') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report_dapres_mahasiswa.edit', str_replace('ortu', '', Auth::user()->email))" :active="request()->routeIs(
                        'report_dapres_mahasiswa.edit',
                        str_replace('ortu', '', Auth::user()->email),
                    )">
                        {{ __('Data Prestasi') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endcan

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>
    const dropdownDigital = () => {
        let content = document.getElementById('digitalNavbar');
        let nonactive = content.classList.contains('hidden');
        if (nonactive) {
            content.classList.remove('hidden');
        } else {
            content.classList.add('hidden');
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var jadwalButton = document.getElementById('jadwal-button');
        var jadwalSubmenu = document.getElementById('jadwal-submenu');
        var presensiButton = document.getElementById('presensi-button');
        var presensiSubmenu = document.getElementById('presensi-submenu');
        var nilaiButton = document.getElementById('nilai-button');
        var nilaiSubmenu = document.getElementById('nilai-submenu');
        var anakPresensiButton = document.getElementById('anak-presensi-submenu-button');
        var anakPresensiSubmenu = document.getElementById('anak-presensi-submenu');
        var anakNilaiButton = document.getElementById('anak-nilai-submenu-button');
        var anakNilaiSubmenu = document.getElementById('anak-nilai-submenu');

        var allSubmenus = [jadwalSubmenu, presensiSubmenu, nilaiSubmenu];
        var allButtons = [jadwalButton, presensiButton, nilaiButton];

        function closeAllSubmenus() {
            allSubmenus.forEach(function(submenu) {
                submenu.classList.add('hidden');
            });
            anakPresensiSubmenu.classList.add('hidden');
            anakNilaiSubmenu.classList.add('hidden');
        }

        function toggleSubmenu(button, submenu) {
            closeAllSubmenus();
            submenu.classList.toggle('hidden');
        }

        allButtons.forEach(function(button, index) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                toggleSubmenu(button, allSubmenus[index]);
            });
        });

        anakPresensiButton.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            anakPresensiSubmenu.classList.toggle('hidden');
        });

        anakNilaiButton.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            anakNilaiSubmenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!allButtons.some(button => button.contains(event.target)) &&
                !allSubmenus.some(submenu => submenu.contains(event.target)) &&
                !anakPresensiButton.contains(event.target) &&
                !anakPresensiSubmenu.contains(event.target) &&
                !anakNilaiButton.contains(event.target) &&
                !anakNilaiSubmenu.contains(event.target)) {
                closeAllSubmenus();
            }
        });

        allSubmenus.concat(anakPresensiSubmenu, anakNilaiSubmenu).forEach(function(submenu) {
            submenu.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    });
</script>
