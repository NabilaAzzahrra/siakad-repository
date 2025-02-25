<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-8xl mx-auto text-white">

            <div class="flex h-[542px]">
                <div class="w-[800px] p-12">
                    <div class="bg-[#005F9D] bg-opacity-65 pt-6 pb-4 pr-6 pl-4 w-[300px] rounded-3xl" data-aos="fade-down" data-aos-delay="70" data-aos-duration="1000">
                        <div class="flex gap-5 items-center justify-between">
                            <div><img src="{{ url('img/major.png') }}" alt="Icon 1" class=""></div>
                            <div>
                                <div class="font-extrabold text-right text-md">PROGRAM STUDI</div>
                                <div class="font-extrabold text-right text-[40px] mt-2">{{ $totalProgramStudi }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#F2C94C] bg-opacity-65 pt-6 pb-4 pr-6 pl-4 w-[300px] rounded-3xl mt-4" data-aos="fade-down" data-aos-delay="60" data-aos-duration="1000">
                        <div class="flex gap-5 items-center justify-between">
                            <div><img src="{{ url('img/graduated.png') }}" alt="Icon 1" class="w-20"></div>
                            <div>
                                <div class="font-extrabold text-right text-md">PESERTA DIDIK</div>
                                <div class="font-extrabold text-right text-[40px] mt-2">{{ $totalPesertaDidik }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#F15B67] bg-opacity-65 pt-6 pb-4 pr-6 pl-4 w-[300px] rounded-3xl mt-5" data-aos="fade-down" data-aos-delay="50" data-aos-duration="1000">
                        <div class="flex gap-5 items-center justify-between">
                            <div><img src="{{ url('img/teacher.png') }}" alt="Icon 1" class="w-24"></div>
                            <div>
                                <div class="font-extrabold text-right text-md">PENGAJAR</div>
                                <div class="font-extrabold text-right text-[40px] mt-2">{{ $totalPengajar }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full p-12 mt-36 text-right">
                    <div class="text-wrap pr-28 text-3xl font-extrabold" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">Sistem Informasi Akademik (SIAKAD)</div>
                    <div class="text-wrap px-28 text-lg" data-aos="fade-left" data-aos-delay="55" data-aos-duration="1000">Sistem informasi akademik merupakan sebuah platform
                        terintegrasi yang dirancang untuk memudahkan pengelolaan berbagai aspek dalam kegiatan akademik,
                        khususnya di lingkungan perguruan tinggi. Sistem ini berfungsi sebagai sarana untuk mengelola
                        data mahasiswa, data perkuliahan, jadwal, nilai, hingga informasi administrasi akademik lainnya.
                    </div>
                </div>
            </div>
            <div class="bg-[#005F9D] py-12 pb-12 md:block hidden">
                <div class="flex items-center justify-center">
                    <div class="relative bg-white w-full mx-56 py-2 m-12 rounded-full h-12">
                        <div class="absolute inset-0 flex justify-between items-center -top-5">
                            <!-- Lingkaran 1 -->
                            <button
                                class="bg-white w-32 h-32 ml-52 rounded-full flex items-center justify-center shadow-md"
                                onclick="ketidakhadiran()">
                                <div
                                    class="w-24 h-24 border-2 border-black rounded-full flex items-center justify-center shadow-md" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
                                    <img src="{{ url('img/calendar.png') }}" alt="Icon 1" class="w-12 h-12" >
                                </div>
                            </button>
                            <!-- Lingkaran 2 -->
                            <button class="bg-white w-32 h-32 rounded-full flex items-center justify-center shadow-md"
                                onclick="informasi()">
                                <div
                                    class="w-24 h-24 border-2 border-black rounded-full flex items-center justify-center shadow-md" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
                                    <img src="{{ url('img/info.png') }}" alt="Icon 2" class="w-12 h-12">
                                </div>
                            </button>
                            <!-- Lingkaran 3 -->
                            <button class="bg-white w-32 h-32 rounded-full flex items-center justify-center shadow-md"
                                onclick="ulangtahun()">
                                <div
                                    class="w-24 h-24 border-2 border-black rounded-full flex items-center justify-center shadow-md" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
                                    <img src="{{ url('img/birth.png') }}" alt="Icon 3" class="w-12 h-12">
                                </div>
                            </button>
                            <!-- Lingkaran 4 -->
                            <button
                                class="bg-white w-32 h-32 mr-52 rounded-full flex items-center justify-center shadow-md" onclick="jadwal()">
                                <div
                                    class="w-24 h-24 border-2 border-black rounded-full flex items-center justify-center shadow-md" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
                                    <img src="{{ url('img/timetable.png') }}" alt="Icon 4" class="w-12 h-12">
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex mx-[380px]">
                    <div class="font-bold">Ketidakhadiran Mahasiswa</div>
                    <div class="ml-[160px] font-bold">Informasi</div>
                    <div class="ml-[200px] font-bold">Ulang Tahun Dosen</div>
                    <div class="ml-[168px] font-bold">Jadwal Hari ini</div>
                </div>
            </div>
            <div class="md:hidden block">
                hsvchvs
            </div>
        </div>
    </div>

    {{-- KETIDAKHADIRAN MAHASISWA --}}
    <div id="modal-info-ketidakhadiran" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <div class="flex">
                <div class="w-10">
                    <img class="rounded-full shadow-lg" src="{{ url('img/exclamation.png') }}" alt="Bonnie image" />
                </div>
                <div>
                    <h2 class="text-lg font-bold mb-4 p-2 rounded-xl">KETIDAKHADIRAN MAHASISWA</h2>
                </div>
            </div>
            <hr class="border mb-5 border-black border-opacity-30">
            <p id="modal-content-ketidakhadiran">
            <div class="mt-3">
                @foreach ($presensiMahasiswa as $pm)
                    <div class="bg-red-100 p-2 px-6 mb-2 rounded-xl flex justify-between border-2 border-red-300">
                        <div>
                            <div class="text-sm">{{ $pm->presensi->jadwal->sesi->pukul->pukul }} WIB</div>
                            <div class="font-bold lg:text-lg text-sm">
                                {{ $pm->presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}
                            </div>
                            <div class="text-sm">{{ $pm->presensi->jadwal->dosen->nama_dosen }}</div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm">{{ $pm->presensi->jadwal->ruang->ruang }}</div>
                            <div class="font-bold lg:text-lg text-sm text-wrap">
                                {{ $pm->mahasiswa->nama }}
                            </div>
                            <div class="text-sm">
                                @php
                                    if ($pm->keterangan == 'SAKIT') {
                                        $bg = 'bg-emerald-300';
                                    } elseif ($pm->keterangan == 'IZIN') {
                                        $bg = 'bg-amber-300';
                                    } elseif ($pm->keterangan == 'ALPA') {
                                        $bg = 'bg-red-300';
                                    }
                                @endphp
                                <span
                                    class="{{ $bg }}  px-6 rounded-xl font-extrabold">{{ $pm->keterangan }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </p>
            <hr class="border mt-5 border-black border-opacity-30">
            <button onclick="closeModalKetidakhadiran()"
                class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    {{-- INFORMASI --}}
    <div id="modal-info-informasi" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <div class="flex">
                <div class="w-10">
                    <img class="rounded-full shadow-lg" src="{{ url('img/letter-i.png') }}" alt="Bonnie image" />
                </div>
                <div>
                    <h2 class="text-lg font-bold mb-4 p-2 rounded-xl">INFORMASI</h2>
                </div>
            </div>
            <hr class="border-2 mb-5 border-[#005F9D] border-opacity-30">
            <p id="modal-content-informasi">
                @foreach ($informasi as $i)
                    <div class="flex gap-2">
                        <div class="h-10 w-10">
                            <img class="rounded-full shadow-lg" src="{{ url('img/user.png') }}" alt="Bonnie image" />
                        </div>
                        <div class="w-full">
                            <div class="flex gap-3 items-center">
                                <div>
                                    <h3
                                        class="flex text-sm -ml-3  items-center mb-1 lg:text-lg font-semibold text-gray-900 dark:text-white text-wrap">
                                        {{ $i->judul }} <span
                                            class="bg-blue-100 text-blue-800 text-xs lg:text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ $i->kategori }}</span>
                                    </h3>
                                </div>
                                <div>
                                    <time
                                        class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 text-wrap">Released
                                        on {{ date('F - d - Y', strtotime($i->created_at)) }}</time>
                                </div>
                            </div>
                            <div class="w-full bg-[#005F9D] rounded-b-[50px] rounded-tr-[50px] bg-opacity-30 mt-1">
                                <div class="text-wrap p-6">
                                    {!! $i->informasi !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </p>
            <hr class="border-2 mt-5 border-[#005F9D] border-opacity-30">
            <button onclick="closeModalInformasi()"
                class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    {{-- ULANG TAHUN DOSEN --}}
    <div id="modal-info-ulangtahun" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>

        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <div class="flex gap-5">
                <div class="w-10">
                    <img class="mb-2" src="{{ url('img/balloon.png') }}"
                                            alt="Balloon" />
                </div>
                <div>
                    <h2 class="text-lg font-bold rounded-xl">ULANG TAHUN DOSEN</h2>
                </div>
            </div>
            <hr class="border mb-5 border-black border-opacity-30">
            <p id="modal-content-ulangtahun">
            <div class="grid grid-cols-2 gap-2">
                @foreach ($dosenUlangtahun as $key => $j)
                    @php
                       $button = date('d-m') === date('d-m', strtotime($j->tgl_lahir))
                                ? '<a href="https://wa.me/?text=' . urlencode('Assalamualaikum Bapak/Ibu, Hari ini ' . $j->nama_dosen . ' sedang berulang tahun, selamat ulang tahun! Semoga Allah SWT senantiasa memberikan kesehatan, kebahagiaan, dan kesuksesan dalam setiap langkah. Terima kasih atas segala ilmu dan bimbingannya yang sangat berarti bagi mahasiswa kami. Semoga tahun ini menjadi tahun penuh berkah dan kebahagiaan.') . '" target="_blank" class="text-blue-500">
                                    <img class="" src="' . url('img/conversation.png') . '" alt="Bonnie image" />
                                </a>'
                                : '';
                    @endphp
                    <div class="bg-white shadow-xl p-4 border rounded-xl border-black">
                        <div class="flex gap-2 items-center">
                            <div class="w-10">
                                <img class="rounded-full shadow-lg" src="{{ url('img/user.png') }}"
                                    alt="Bonnie image" />
                            </div>
                            <div>
                                <div class="text-sm text-wrap">
                                    {{ $j->nama_dosen }}
                                </div>
                                <div class="flex">
                                    <div class="w-5">
                                        <img class="rounded-full shadow-lg" src="{{ url('img/balloon.png') }}"
                                            alt="Balloon" />
                                    </div>
                                    <div class="text-sm">
                                        {{ date('d-m-Y', strtotime($j->tgl_lahir)) }}
                                    </div>
                                </div>
                            </div>
                            <div class="w-8 ml-6">
                                {!! $button !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </p>
            <hr class="border mt-5 border-black border-opacity-30">
            <button onclick="closeModalUlangtahun()"
                class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    {{-- JADWAL HARI INI --}}
    <div id="modal-info-jadwal" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-10/12 w-full shadow-xl z-10">
            <div class="flex">
                <div class="w-10">
                    <img class="rounded-full shadow-lg" src="{{ url('img/timetable.png') }}" alt="Bonnie image" />
                </div>
                <div>
                    <h2 class="text-lg font-bold mb-4 p-2 rounded-xl">JADWAL HARI INI</h2>
                </div>
            </div>
            <hr class="border mb-5 border-black border-opacity-30">
            <p id="modal-content-jadwal">
                <div class="flex justify-center">
                    <div class="" style="width:100%;  overflow-x:auto;">
                        <table class="table table-bordered" id="jadwal-datatable">
                            <thead>
                                <tr>
                                    <th class="w-7">NO.</th>
                                    <th>MATERI AJAR</th>
                                    <th>PENGAJAR</th>
                                    <th>HARI</th>
                                    <th>SESI</th>
                                    <th>PUKUL</th>
                                    <th>SKS</th>
                                    <th>RUANG</th>
                                    <th>KELAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($jadwal as $key => $j)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{ $j->detail_kurikulum->materi_ajar->materi_ajar }}</td>
                                        <td>{{ $j->dosen->nama_dosen }}</td>
                                        <td>{{ $j->hari->hari }}</td>
                                        <td>{{ $j->sesi->sesi }}</td>
                                        <td>{{ $j->sesi->pukul->pukul }}</td>
                                        <td>{{ $j->detail_kurikulum->materi_ajar->sks }}</td>
                                        <td>{{ $j->ruang->ruang }}</td>
                                        <td>{{ $j->kelas->kelas }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </p>
            <hr class="border mt-5 border-black border-opacity-30">
            <button onclick="closeModalJadwal()"
                class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#jadwal-datatable').DataTable(); // Inisialisasi sederhana
        });
    </script>

    {{-- SCRIPT KETIDAKHADIRAN MAHASISWA --}}
    <script>
        function ketidakhadiran() {
            const modalContent = document.getElementById("modal-content-ketidakhadiran");
            const modal = document.getElementById("modal-info-ketidakhadiran");
            modal.classList.remove("hidden");
        }

        function closeModalKetidakhadiran() {
            const modal = document.getElementById("modal-info-ketidakhadiran");
            modal.classList.add("hidden");
        }
    </script>
    {{-- SCRIPT KETIDAKHADIRAN MAHASISWA --}}
    <script>
        function informasi() {
            const modalContent = document.getElementById("modal-content-informasi");
            const modal = document.getElementById("modal-info-informasi");
            modal.classList.remove("hidden");
        }

        function closeModalInformasi() {
            const modal = document.getElementById("modal-info-informasi");
            modal.classList.add("hidden");
        }
    </script>
    {{-- SCRIPT ULANG TAHUN DOSEN --}}
    <script>
        function ulangtahun() {
            const modalContent = document.getElementById("modal-content-ulangtahun");
            const modal = document.getElementById("modal-info-ulangtahun");
            modal.classList.remove("hidden");
        }

        function closeModalUlangtahun() {
            const modal = document.getElementById("modal-info-ulangtahun");
            modal.classList.add("hidden");
        }
    </script>
    {{-- SCRIPT JADWAL HARI INI --}}
    <script>
        function jadwal() {
            const modalContent = document.getElementById("modal-content-jadwal");
            const modal = document.getElementById("modal-info-jadwal");
            modal.classList.remove("hidden");
        }

        function closeModalJadwal() {
            const modal = document.getElementById("modal-info-jadwal");
            modal.classList.add("hidden");
        }
    </script>
</x-app-layout>
