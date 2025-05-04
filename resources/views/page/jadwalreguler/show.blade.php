<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Jadwal Pembelajaran<i class="fi fi-rr-caret-right mt-1"></i> <span
                class="text-amber-100">Presensi Jadwal Pembelajaran</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="flex gap-5 items-start justify-start">
                        <div
                            class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl mb-5 p-5">
                            <div>
                                <div class="flex flex-col lg:flex-row items-center justify-between">
                                    <div class="flex -mb-6">
                                        <div class="w-10">
                                            <img src="{{ url('img/file.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA JADWAL PEMBELAJARAN
                                        </div>
                                    </div>
                                </div>
                                <hr class="border mt-8 border-black border-opacity-30">
                                <div>
                                    <div class="flex items-center justify-between px-4 pt-6 pb-2">
                                        <div class="w-full">
                                            <table>
                                                <tr>
                                                    <th class="text-left">Materi Ajar</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Pengajar</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td class="text-wrap">{{ $jadwal->dosen->nama_dosen }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Hari</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $jadwal->hari->hari }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Sesi</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ optional($jadwal->sesi2)->sesi ? $jadwal->sesi->sesi . '-' . optional($jadwal->sesi2)->sesi : $jadwal->sesi->sesi }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Pukul</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{!! optional($jadwal->sesi2)->pukul
                                                        ? $jadwal->sesi->pukul->pukul . ' <span class="font-bold">s/d</span> ' . optional($jadwal->sesi2->pukul)->pukul
                                                        : $jadwal->sesi->pukul->pukul !!}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="w-full ml-12">
                                            <table>
                                                <tr>
                                                    <th class="text-left">Semester/SKS</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }}/{{ $jadwal->detail_kurikulum->materi_ajar->sks }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Tahun Akademik</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $jadwal->tahun_akademik->tahunakademik }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Ruang</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $jadwal->ruang->ruang }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Kelas</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $jadwal->kelas->kelas }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Program Studi</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $jadwal->kelas->jurusan->jurusan }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl mb-5 p-5">
                            <div class="flex flex-col lg:flex-row items-center justify-between">
                                <div class="flex -mb-6">
                                    <div class="w-10">
                                        <img src="{{ url('img/test.png') }}" alt="Icon 1" class="">
                                    </div>
                                    <div
                                        class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                        FORMATIF
                                    </div>
                                </div>
                                <div class="flex -mb-5">
                                    <button
                                        class="flex border border-sky-500 px-4 pt-2 pb-2 rounded-xl text-sky-500 hover:bg-sky-100"
                                        onclick="return formatif()"><i class="fi fi-sr-add flex mr-2 mt-1"></i> Tambah
                                        Formatif</button>
                                </div>
                            </div>
                            <hr class="border mt-8 border-black border-opacity-30">
                            <div class="flex w-full justify-center">
                                <div class="pt-3 w-full" style="width:100%;overflow-x:auto;">
                                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                            <!-- Form untuk entries -->
                                            <x-show-entries :route="route('jadwal_reguler.show', $idJadwal)" :search="request()->searchFormatif">
                                            </x-show-entries>
                                        </div>

                                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                            <form action="{{ route('jadwal_reguler.show', $idJadwal) }}" method="GET"
                                                class="flex items-center flex-1">
                                                <input type="text" name="searchFormatif"
                                                    placeholder="Enter for search . . . " id="search"
                                                    value="{{ request('searchFormatif') }}"
                                                    class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                                    oninput="this.value = this.value.toUpperCase();" />

                                                <input type="hidden" name="entriesFormatif"
                                                    value="{{ request('entriesFormatif', 10) }}">
                                                <input type="hidden" name="page"
                                                    value="{{ request('pageFormatif', 1) }}">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="relative overflow-x-auto shadow-md rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        JUDUL FORMATIF
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        DEADLINE
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        ACTION
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="formatifTable">
                                                @php
                                                    $no = $formatif->firstItem();
                                                @endphp
                                                @forelse ($formatif as $key => $j)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <td class="px-6 py-4 text-wrap">
                                                            {{ $j->judul_formatif }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $j->deadline }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-center flex items-center justify-center">
                                                            <a href="{{ asset('formatif/' . $j->formatif) }}"
                                                                target="_blank"
                                                                class="flex items-center mr-2 hover:bg-emerald-100 text-emerald-600 pr-2 pl-4 py-3 rounded-xl text-md border border-dashed border-emerald-600">
                                                                <i class="fi fi-sr-document flex mr-2"></i>
                                                            </a>
                                                            <button onclick="formatifUpdate(this)"
                                                                class="flex items-center mr-2 hover:bg-amber-100 text-amber-600 pr-2 pl-4 py-3 rounded-xl text-md border border-dashed border-amber-600"
                                                                data-id="{{ $j->id }}"
                                                                data-judul="{{ $j->judul_formatif }}"
                                                                data-deadline="{{ $j->deadline }}"
                                                                data-formatif="{{ $j->formatif }}"
                                                                data-action="{{ route('jadwal_reguler.formatif_update', $j->id) }}">
                                                                <i class="fi fi-sr-file-edit flex mr-2"></i>
                                                            </button>
                                                            <a href="{{ route('jadwal_reguler.formatif_answer', $j->id_formatif) }}"
                                                                class="flex items-center mr-2 hover:bg-sky-100 text-sky-600 pr-2 pl-4 py-3 rounded-xl text-md border border-dashed border-sky-600">
                                                                <i class="fi fi-sr-member-list flex mr-2"></i>
                                                            </a>
                                                            <button type="button"
                                                                onclick="return dataDelete('{{ $j->id }}')"
                                                                title="Hapus Data"
                                                                class="border border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <div
                                                        class="border border-red-500 bg-red-100 font-bold text-red-500 p-3 rounded-xl shadow-sm mb-3">
                                                        Data Belum Tersedia!
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        @if ($formatif->hasPages())
                                            {{ $formatif->appends(request()->query())->links('vendor.pagination.custom') }}
                                        @else
                                            <div class="flex items-center justify-between">
                                                <nav class="flex justify-start">
                                                    <div class="text-sm flex gap-1">
                                                        <div>Showing</div>
                                                        <div class="font-bold">1</div>
                                                        <div>to</div>
                                                        <div class="font-bold">{{ count($formatif) }}</div>
                                                        <div>of</div>
                                                        <div class="font-bold">{{ count($formatif) }}</div>
                                                        <div>entries</div>
                                                    </div>
                                                </nav>
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex">
                                                        <div class="border px-4 py-1 rounded-l-lg">&lt;</div>
                                                        <div class="border px-4 py-1">1</div>
                                                        <div class="border px-4 py-1 rounded-r-lg">&gt;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div>
                                <div class="flex flex-col lg:flex-row items-center justify-between">
                                    <div class="flex -mb-6">
                                        <div class="w-10">
                                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA PRESENSI JADWAL PEMBELAJARAN
                                        </div>
                                    </div>
                                </div>
                                <hr class="border mt-8 border-black border-opacity-30">
                            </div>
                            <div class="flex w-full justify-center">
                                <div class="pt-3 w-full" style="width:100%;overflow-x:auto;">
                                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                            <!-- Form untuk entries -->
                                            <x-show-entries :route="route('jadwal_reguler.show', $idJadwal)" :search="request()->search">
                                            </x-show-entries>
                                        </div>

                                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                            <form action="{{ route('jadwal_reguler.show', $idJadwal) }}"
                                                method="GET" class="flex items-center flex-1">
                                                <input type="text" name="search"
                                                    placeholder="Enter for search . . . " id="search"
                                                    value="{{ request('search') }}"
                                                    class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                                    oninput="this.value = this.value.toUpperCase();" />

                                                <input type="hidden" name="entries"
                                                    value="{{ request('entries', 10) }}">
                                                <input type="hidden" name="page"
                                                    value="{{ request('page', 1) }}">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="relative overflow-x-auto shadow-md rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        PERTEMUAN
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        MATERI PEMBELAJARAN
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        PENDUKUNG MATERI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        TANGGAL PRESENSI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        ACTION
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="jadwalRegulerTable">
                                                @php
                                                    $no = $presensi->firstItem();
                                                @endphp
                                                @forelse ($presensi as $key => $j)
                                                    <tr
                                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $j->pertemuan }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {!! $j->tgl_presensi
                                                                ? $j->materi
                                                                : '<div class="bg-red-100 inline-block px-6 rounded-full font-bold text-red-500">Belum Presensi</div>' !!}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {!! $j->file_materi
                                                                ? '<a href="' . route('presensi.materi_update', $j->id_presensi) . '">File Materi ' . $j->materi . '</a>'
                                                                : '<div class="bg-red-100 inline-block px-6 rounded-full font-bold text-red-500">Belum Presensi</div>' !!}
                                                        </td>
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {!! $j->tgl_presensi
                                                                ? date('d-m-Y', strtotime($j->tgl_presensi))
                                                                : '<div class="bg-red-100 inline-block px-6 rounded-full font-bold text-red-500">Belum Presensi</div>' !!}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-center flex items-center justify-center">
                                                            @if ($j->tgl_presensi)
                                                                <a href="{{ route('presensi.edit', $j->id_presensi) }}"
                                                                    class="flex items-center mr-2 hover:bg-amber-100 text-amber-600 pr-3 pl-4 py-3 rounded-xl text-md border border-dashed border-amber-600">
                                                                    <i class="fi fi-sr-eye flex mr-2"></i> <span>Lihat
                                                                        Presensi</span></a>
                                                                <a href="{{ asset('materi/' . $j->file_materi) }}"
                                                                    download
                                                                    class="mr-2 flex items-center hover:bg-emerald-100 text-emerald-600 pr-3 pl-4 py-3 rounded-xl text-md border border-dashed border-emerald-600"><i
                                                                        class="fi fi-sr-document flex mr-2"></i>
                                                                    <span>Dokumen
                                                                        Materi</span></a>
                                                            @else
                                                                @php
                                                                    $day = date('l');
                                                                    $hari = match ($day) {
                                                                        'Monday' => 'SENIN',
                                                                        'Tuesday' => 'SELASA',
                                                                        'Wednesday' => 'RABU',
                                                                        'Thursday' => 'KAMIS',
                                                                        'Friday' => 'JUMAT',
                                                                        'Saturday' => 'SABTU',
                                                                        'Sunday' => 'MINGGU',
                                                                        default => 'Tidak diketahui',
                                                                    };

                                                                    $lastPresensi = $presensi
                                                                        ->whereNotNull('tgl_presensi')
                                                                        ->count();
                                                                @endphp
                                                                @if ($hari != $jadwal->hari->hari)
                                                                    <a href="#"
                                                                        class="mr-2 flex items-center hover:bg-red-100 text-red-600 pr-3 pl-4 py-3 rounded-xl text-md border border-dashed border-red-600"><i
                                                                            class="fi fi-sr-document flex mr-2"></i>
                                                                        <span>Belum Terdapat Jadwal</span></a>
                                                                @else
                                                                    @if ($key == $lastPresensi)
                                                                        <a href="{{ route('presensi.show', $j->id_presensi) }}"
                                                                            class="flex items-center mr-2 hover:bg-sky-100 text-sky-600 pr-3 pl-4 py-3 rounded-xl text-md border border-dashed border-sky-600">
                                                                            <i class="fi fi-sr-add flex mr-2"></i>
                                                                            <span>Input Presensi dan Dokumen /
                                                                                Materi</span>
                                                                        </a>
                                                                    @else
                                                                        <span
                                                                            class="bg-red-100 inline-block px-6 rounded-full font-bold text-red-500">Belum
                                                                            Terjadwal</span>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <div
                                                        class="border border-red-500 bg-red-100 font-bold text-red-500 p-3 rounded-xl shadow-sm mb-3">
                                                        Data Belum Tersedia!
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        @if ($presensi->hasPages())
                                            {{ $presensi->appends(request()->query())->links('vendor.pagination.custom') }}
                                        @else
                                            <div class="flex items-center justify-between">
                                                <nav class="flex justify-start">
                                                    <div class="text-sm flex gap-1">
                                                        <div>Showing</div>
                                                        <div class="font-bold">1</div>
                                                        <div>to</div>
                                                        <div class="font-bold">{{ count($presensi) }}</div>
                                                        <div>of</div>
                                                        <div class="font-bold">{{ count($presensi) }}</div>
                                                        <div>entries</div>
                                                    </div>
                                                </nav>
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex">
                                                        <div class="border px-4 py-1 rounded-l-lg">&lt;</div>
                                                        <div class="border px-4 py-1">1</div>
                                                        <div class="border px-4 py-1 rounded-r-lg">&gt;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-formatif" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <h2 class="text-lg font-bold mb-4 bg-amber-50 pl-6 pr-6 p-2 rounded-xl">Formatif</h2>
            <form id="formatifForm" action="{{ route('jadwal_reguler.formatif_add') }}" method="post"
                enctype="multipart/form-data" class="w-full">
                @csrf
                <input type="hidden" value="{{ $idJadwal }}" name="id_jadwal">
                <p id="modal-content"></p>
                <hr class="mt-4 border-2">
                <button type="submit" id="submitFormatif" class="mt-4 bg-sky-500 text-white px-4 py-2 rounded">
                    Submit
                </button>
                <button onclick="closeModalFormatif(event)" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Tutup
                </button>
            </form>
        </div>
    </div>

    <div id="modal-formatif-update" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>

        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <h2 class="text-lg font-bold mb-4 bg-amber-50 pl-6 pr-6 p-2 rounded-xl">Edit Formatif</h2>

            <form id="formatifFormUpdate" method="post" enctype="multipart/form-data" class="w-full">
                @csrf
                @method('PATCH')
                <input type="hidden" id="formatif-id" name="id">

                <div id="modal-content-update"></div>

                <hr class="mt-4 border-2">

                <button type="submit" id="submitFormatifUpdate"
                    class="mt-4 bg-sky-500 text-white px-4 py-2 rounded">
                    Submit
                </button>

                <button onclick="closeModalFormatifUpdate(event)"
                    class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Tutup
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

    <script>
        const dataDelete = async (id) => {
            Swal.fire({
                title: `Apakah Anda yakin?`,
                text: `Data akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await axios.delete(`/testFormatif/${id}`, {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Data berhasil dihapus.',
                                icon: 'success',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.log(error);
                        });
                }
            });
        };
    </script>
    <script>
        function formatif() {
            const modalContent = document.getElementById("modal-content");
            modalContent.innerHTML = `
                <div class="flex flex-col w-full">
                    <lable>Judul Formatif</lable>
                    <input type="text" id="judul_formatif" name="judul_formatif" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Judul Formatif disini ..." oninput="this.value = this.value.toUpperCase();"/>
                </div>
                <div class="flex flex-col w-full mt-4">
                    <lable>Deadline</lable>
                    <input type="datetime-local" id="deadline" name="deadline" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Judul Formatif disini ..." oninput="this.value = this.value.toUpperCase();"/>
                </div>
                <div class="flex flex-col w-full mt-4">
                    <lable>File Soal Formatif</lable>
                    <input type="file" id="file" name="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Judul Formatif disini ..." oninput="this.value = this.value.toUpperCase();"/>
                </div>
            `;
            const modal = document.getElementById("modal-formatif");
            modal.classList.remove("hidden");
        }

        function closeModalFormatif(event) {
            event.preventDefault(); // Mencegah form submit
            const modal = document.getElementById("modal-formatif");
            modal.classList.add("hidden");
        }

        function formatifUpdate(button) {
            const modal = document.getElementById("modal-formatif-update");
            const modalContent = document.getElementById("modal-content-update");
            const form = document.getElementById("formatifFormUpdate");

            if (!modal || !modalContent || !form) {
                console.error("Modal atau modal-content tidak ditemukan!");
                return;
            }

            // Ambil data dari tombol yang diklik
            const id = button.getAttribute("data-id") || "";
            const judul = button.getAttribute("data-judul") || "";
            const deadline = button.getAttribute("data-deadline") || "";
            const formatif = button.getAttribute("data-formatif") || "";
            const actionUrl = button.getAttribute("data-action"); // Ambil URL dari data-action

            console.log("URL:", actionUrl);
            console.log("ID:", id);
            console.log("Judul:", judul);
            console.log("Deadline:", deadline);
            console.log("Formatif:", formatif);

            // Isi modal dengan data yang benar
            modalContent.innerHTML = `
        <div class="flex flex-col w-full">
            <label class="font-semibold">Judul Formatif</label>
            <input type="text" id="judul_formatif-update" name="judul_formatif" value="${judul}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" oninput="this.value = this.value.toUpperCase();" />
        </div>
        <div class="flex flex-col w-full mt-4">
            <label class="font-semibold">Deadline</label>
            <input type="datetime-local" id="deadline-update" name="deadline" value="${deadline}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
        </div>
        <div class="flex flex-col w-full mt-4">
            <label class="font-semibold">File Sebelumnya</label>
            <input type="text" id="formatif-update" name="formatif" value="${formatif}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly/>
        </div>
        <div class="flex flex-col w-full mt-4">
            <label class="font-semibold">File Baru</label>
            <input type="file" id="file" name="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
        </div>
    `;

            // Atur action pada form
            form.setAttribute('action', actionUrl);

            // Tampilkan modal
            modal.classList.remove("hidden");
        }


        function closeModalFormatifUpdate(event) {
            event.preventDefault(); // Mencegah submit form jika ada
            const modal = document.getElementById("modal-formatif-update");
            if (modal) {
                modal.classList.add("hidden");
            } else {
                console.error("Modal tidak ditemukan!");
            }
        }

        const form = document.getElementById('informasiForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form dikirim

            let isValid = true;

            // Validasi Mata Kuliah
            const judul = document.getElementById('judul');
            const errorJudul = document.getElementById('error-judul');
            if (judul.value === '') {
                errorJudul.classList.remove('hidden');
                isValid = false;
            } else {
                errorJudul.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const informasi = document.getElementById('informasi');
            const errorInformasi = document.getElementById('error-informasi');
            if (informasi.value === '') {
                errorInformasi.classList.remove('hidden');
                isValid = false;
            } else {
                errorInformasi.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const kategori = document.getElementById('kategori');
            const errorKategori = document.getElementById('error-kategori');
            if (kategori.value === '') {
                errorKategori.classList.remove('hidden');
                isValid = false;
            } else {
                errorKategori.classList.add('hidden');
            }

            // Jika validasi lolos, kirim form
            if (isValid) {
                form.submit();
            }
        });
    </script>
    @push('scripts')

        @if (session('message_insert'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('message_insert') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    didOpen: () => {
                        const swalBtn = Swal.getConfirmButton();
                        swalBtn.disabled = false;
                        swalBtn.textContent = "OK";
                    }
                });
            </script>
        @endif

        @if (session('message_update'))
            <script>
                Swal.fire({
                    title: 'Update Berhasil!',
                    text: "{{ session('message_update') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    didOpen: () => {
                        const swalBtn = Swal.getConfirmButton();
                        swalBtn.disabled = false;
                        swalBtn.textContent = "OK";
                    }
                });
            </script>
        @endif

    @endpush

</x-app-layout>
