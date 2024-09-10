<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8sm mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                @can('role-A')
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>Master</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('perhitungan.index')">
                                        {{ __('Perhitungan') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('konfigurasi.index')">
                                        {{ __('Konfigurasi Akademik') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('konfigurasi_ujian.index')">
                                        {{ __('Konfigurasi Ujian') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('kurikulum.index')">
                                        {{ __('Kurikulum') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('dosen.index')">
                                        {{ __('Dosen') }}
                                    </x-dropdown-link>

                                    <div class="relative">
                                        <button id="jadwal-button"
                                            class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150">
                                            {{ __('Jadwal') }}
                                            <svg class="ml-2 fill-current h-4 w-4 transform -rotate-90"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div id="jadwal-submenu"
                                            class="hidden absolute left-full top-0 ml-2 -mt-[184px] w-48 bg-white shadow-lg rounded-md border">
                                            <x-dropdown-link :href="route('hari.index')">
                                                {{ __('Hari') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('pukul.index')">
                                                {{ __('Pukul') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('ruang.index')">
                                                {{ __('Ruang') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('sesi.index')">
                                                {{ __('Sesi') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('jurusan.index')">
                                                {{ __('Jurusan') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('kelas.index')">
                                                {{ __('Kelas') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('materi_ajar.index')">
                                                {{ __('Materi Ajar') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('semester.index')">
                                                {{ __('Semester') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('keterangan.index')">
                                                {{ __('Keterangan') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('tahunakademik.index')">
                                                {{ __('Tahun Akademik') }}
                                            </x-dropdown-link>
                                        </div>
                                    </div>

                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>


                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('mahasiswa.index')" :active="request()->routeIs('dashboard')">
                            {{ __('Mahasiswa') }}
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('jadwal_reguler.index')" :active="request()->routeIs('dashboard')">
                            {{ __('Jadwal') }}
                        </x-nav-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-nav-link :href="route('nilai.index')" :active="request()->routeIs('dashboard')">
                            {{ __('Nilai') }}
                        </x-nav-link>
                    </div>
                @endcan

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <li class="relative list-none">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>Ujian</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('ujian_uts.index')">
                                    {{ __('UTS') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('ujian_uas.index')">
                                    {{ __('UAS') }}
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>
                    </li>
                </div>

                @can('role-A')
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>Ujian</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('ujian_uts.index')">
                                        {{ __('UTS') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('ujian_uas.index')">
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
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>Report</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="relative">
                                        <button id="presensi-button"
                                            class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150">
                                            {{ __('Presensi') }}
                                            <svg class="ml-2 fill-current h-4 w-4 transform -rotate-90"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div id="presensi-submenu"
                                            class="hidden absolute left-full top-0 ml-2 -mt-1 w-52 bg-white shadow-lg rounded-md border">
                                            <x-dropdown-link :href="route('report_dosen.index')">
                                                {{ __('Dosen') }}
                                            </x-dropdown-link>
                                            <div class="relative">
                                                <button id="anak-presensi-submenu-button"
                                                    class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150">
                                                    {{ __('Mahasiswa') }}
                                                    <svg class="ml-2 fill-current h-4 w-4 transform -rotate-90"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="anak-presensi-submenu"
                                                    class="hidden absolute left-full top-0 ml-2 -mt-9 w-48 bg-white shadow-lg rounded-md border">
                                                    <x-dropdown-link :href="route('report_keseluruhan.index')">
                                                        {{ __('Keseluruhan') }}
                                                    </x-dropdown-link>
                                                    <x-dropdown-link :href="route('report_presensi_mahasiswa.index')">
                                                        {{ __('Per Mahasiswa') }}
                                                    </x-dropdown-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <button id="nilai-button"
                                            class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150">
                                            {{ __('Nilai') }}
                                            <svg class="ml-2 fill-current h-4 w-4 transform -rotate-90"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div id="nilai-submenu"
                                            class="hidden absolute left-full top-0 -mt-10 ml-2 w-48 bg-white border shadow-lg rounded-md">
                                            <div class="relative">
                                                <button id="anak-nilai-submenu-button"
                                                    class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150">
                                                    {{ __('Mahasiswa') }}
                                                    <svg class="ml-2 fill-current h-4 w-4 transform -rotate-90"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="anak-nilai-submenu"
                                                    class="hidden absolute left-full top-0 ml-2 -mt-0 w-48 bg-white shadow-lg rounded-md border">
                                                    <x-dropdown-link :href="route('report_nilai_keseluruhan.index')">
                                                        {{ __('Keseluruhan') }}
                                                    </x-dropdown-link>
                                                    <x-dropdown-link :href="route('report_nilai_mahasiswa.index')">
                                                        {{ __('Per Mahasiswa') }}
                                                    </x-dropdown-link>
                                                </div>
                                            </div>
                                            <x-dropdown-link :href="route('khs.index')">
                                                {{ __('KHS') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('data_prestasi.index')">
                                                {{ __('Data Prestasi') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('transkrip.index')">
                                                {{ __('Transkrip') }}
                                            </x-dropdown-link>
                                        </div>
                                    </div>
                                </x-slot>

                            </x-dropdown>
                        </li>
                    </div>
                @endcan

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-nav-link :href="route('krs_mhs.index')" :active="request()->routeIs('dashboard')">
                        {{ __('KRS') }}
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-nav-link :href="route('jadwal_reguler.jadwal_mhs', Auth::user()->email)" :active="request()->routeIs('dashboard')">
                        {{ __('Jadwal') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
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
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

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
