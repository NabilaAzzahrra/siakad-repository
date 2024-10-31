<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-start justify-between">
                <div class="lg:w-1/2 w-full">
                    <div class="mx-4 text-wrap bg-white shadow-xl p-6 rounded-xl items-center">
                        <div class="font-bold text-red-500">Tahun Akademik
                            {{ $konfigurasi->tahun_akademik->tahunakademik }}</div>
                        <div class="font-extrabold text-2xl">Sistem Informasi Akademik (SIAKAD)</div>
                        <div class="text-md text-wrap text-justify">Sistem informasi akademik merupakan sebuah platform
                            terintegrasi yang dirancang untuk memudahkan pengelolaan berbagai aspek dalam kegiatan
                            akademik, khususnya di lingkungan perguruan tinggi. Sistem ini berfungsi sebagai sarana
                            untuk mengelola data mahasiswa, data perkuliahan, jadwal, nilai, hingga informasi
                            administrasi akademik lainnya.</div>

                    </div>
                </div>
                <div class="grid grid-cols-3 gap-5 mx-4">
                    <div class="bg-[#005F9D] p-4 w-64 rounded-xl shadow-xl">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-ss-building text-white" style="font-size: 40px;"></i>
                            </div>
                            <div class="text-right text text-white">
                                <div>PROGRAM STUDI</div>
                                <div><span class="bg-white px-2 rounded-xl text-black">{{ $totalProgramStudi }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-amber-300 p-4 w-64 rounded-xl shadow-xl">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="ffi fi-sr-student-alt text-white"
                                    style="font-size: 40px;"></i>
                            </div>
                            <div class="text-right">
                                <div>PESERTA DIDIK</div>
                                <div><span class="bg-black px-2 rounded-xl text-white">{{ $totalPesertaDidik }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#F15B67] p-4 w-64 rounded-xl shadow-xl">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-sr-chalkboard-user text-white"
                                    style="font-size: 40px;"></i>
                            </div>
                            <div class="text-right text-white">
                                <div>PENGAJAR</div>
                                <div><span class="bg-white px-2 rounded-xl text-black">{{ $totalPengajar }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-5 items-start md:flex-row justify-center p-3">
                {{-- <div class="w-full p-3"> --}}
                @can('role-O')
                    <div class="bg-white w-1/2 dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg sm:rounded-lg p-6">
                        <div
                            class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                            PRESENSI <span class="uppercase">{{ str_replace('Orang Tua', '', Auth::user()->name) }}</span>
                            HARI INI
                        </div>
                        <div class="mt-3">
                            @if (!$presensiRealtime->isEmpty())
                                @foreach ($presensiRealtime as $pr)
                                    <div
                                        class="bg-red-100 p-2 px-6 rounded-xl flex justify-between border border-2 border-red-300">
                                        <div>
                                            <div>{{ $pr->presensi->jadwal->sesi->pukul->pukul }} WIB</div>
                                            <div class="font-bold text-lg">
                                                {{ $pr->presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}
                                            </div>
                                            <div class="">{{ $pr->presensi->jadwal->dosen->nama_dosen }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div>{{ $pr->presensi->jadwal->ruang->ruang }}</div>
                                            <div class="font-bold text-lg">
                                                {{ str_replace('Orang Tua', '', Auth::user()->name) }}
                                            </div>
                                            <div><span
                                                    class="bg-emerald-300 p-1 px-6 rounded-xl font-extrabold">{{ $pr->keterangan }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach ($presensiRealtimeNoData as $pr)
                                    <div
                                        class="bg-red-100 p-2 px-6 rounded-xl flex justify-between border border-2 border-red-300">
                                        <div>
                                            <div>{{ $pr->sesi->pukul->pukul }} WIB</div>
                                            <div class="font-bold text-lg">
                                                {{ $pr->detail_kurikulum->materi_ajar->materi_ajar }}
                                            </div>
                                            <div class="">{{ $pr->dosen->nama_dosen }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div>{{ $pr->ruang->ruang }}</div>
                                            <div class="font-bold text-lg">
                                                {{ str_replace('Orang Tua', '', Auth::user()->name) }}
                                            </div>
                                            <div><span
                                                    class="bg-emerald-300 p-1 px-6 rounded-xl font-extrabold">{{ $pr->keterangan }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endcan

                @can('role-A')
                    <div class="bg-white w-1/2 dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg sm:rounded-lg p-6">
                        <div
                            class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                            PRESENSI <span class="uppercase">MAHASISWA</span>
                            HARI INI
                        </div>
                        <div class="mt-3">
                            @foreach ($presensiMahasiswa as $pm)
                                <div
                                    class="bg-red-100 p-2 px-6 mb-2 rounded-xl flex justify-between border border-2 border-red-300">
                                    <div>
                                        <div>{{ $pm->presensi->jadwal->sesi->pukul->pukul }} WIB</div>
                                        <div class="font-bold text-lg">
                                            {{ $pm->presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}
                                        </div>
                                        <div class="">{{ $pm->presensi->jadwal->dosen->nama_dosen }}</div>
                                    </div>
                                    <div class="text-right">
                                        <div>{{ $pm->presensi->jadwal->ruang->ruang }}</div>
                                        <div class="font-bold text-lg">
                                            {{ $pm->mahasiswa->nama }}
                                        </div>
                                        <div>
                                            @php
                                                if ($pm->keterangan == 'SAKIT') {
                                                    $bg = 'bg-emerald-300';
                                                } elseif ($pm->keterangan == 'IZIN') {
                                                    $bg = 'bg-amber-300';
                                                }else if($pm->keterangan == 'ALPA'){
                                                    $bg = 'bg-red-300';
                                                }
                                            @endphp
                                            <span
                                                class="{{$bg}}  px-6 rounded-xl font-extrabold">{{ $pm->keterangan }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endcan


                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg sm:rounded-lg p-6">
                    <div
                        class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                        INFORMASI TERBARU
                    </div>
                    <div class="p-4">
                        <ol class="relative border-s border-gray-200 dark:border-gray-700 mt-6">
                            @can('role-A')
                                @foreach ($informasi as $i)
                                    <li class="mb-10 ms-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <img class="rounded-full shadow-lg" src="{{ url('img/user.png') }}"
                                                alt="Bonnie image" />
                                        </span>
                                        <h3
                                            class="flex text-sm  items-center mb-1 lg:text-lg font-semibold text-gray-900 dark:text-white text-wrap">
                                            {{ $i->judul }} <span
                                                class="bg-blue-100 text-blue-800 text-xs lg:text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ $i->kategori }}</span>
                                        </h3>
                                        <time
                                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 text-wrap">Released
                                            on {{ date('F - d - Y', strtotime($i->created_at)) }}</time>
                                        <div class="bg-gray-100 rounded-xl px-4 pt-2 pb-2 text-wrap">
                                            <div
                                                class="mb-2 text-xs lg:text-base font-normal text-gray-500 dark:text-gray-400 break-words">
                                                {!! $i->informasi !!}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            @endcan
                            @can('role-M')
                                @foreach ($informasi as $i)
                                    <li class="mb-10 ms-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <img class="rounded-full shadow-lg" src="{{ url('img/user.png') }}"
                                                alt="Bonnie image" />
                                        </span>
                                        <h3
                                            class="flex text-sm  items-center mb-1 lg:text-lg font-semibold text-gray-900 dark:text-white text-wrap">
                                            {{ $i->judul }} <span
                                                class="bg-blue-100 text-blue-800 text-xs lg:text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ $i->kategori }}</span>
                                        </h3>
                                        <time
                                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 text-wrap">Released
                                            on {{ date('F - d - Y', strtotime($i->created_at)) }}</time>
                                        <div class="bg-gray-100 rounded-xl px-4 pt-2 pb-2 text-wrap">
                                            <div
                                                class="mb-2 text-xs lg:text-base font-normal text-gray-500 dark:text-gray-400 break-words">
                                                {!! $i->informasi !!}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            @endcan
                            @can('role-D')
                                @foreach ($informasi as $i)
                                    <li class="mb-10 ms-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <img class="rounded-full shadow-lg" src="{{ url('img/user.png') }}"
                                                alt="Bonnie image" />
                                        </span>
                                        <h3
                                            class="flex text-sm  items-center mb-1 lg:text-lg font-semibold text-gray-900 dark:text-white text-wrap">
                                            {{ $i->judul }} <span
                                                class="bg-blue-100 text-blue-800 text-xs lg:text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ $i->kategori }}</span>
                                        </h3>
                                        <time
                                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 text-wrap">Released
                                            on {{ date('F - d - Y', strtotime($i->created_at)) }}</time>
                                        <div class="bg-gray-100 rounded-xl px-4 pt-2 pb-2 text-wrap">
                                            <div
                                                class="mb-2 text-xs lg:text-base font-normal text-gray-500 dark:text-gray-400 break-words">
                                                {!! $i->informasi !!}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            @endcan
                            @can('role-O')
                                @foreach ($informasi as $i)
                                    <li class="mb-10 ms-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <img class="rounded-full shadow-lg" src="{{ url('img/user.png') }}"
                                                alt="Bonnie image" />
                                        </span>
                                        <h3
                                            class="flex text-sm  items-center mb-1 lg:text-lg font-semibold text-gray-900 dark:text-white text-wrap">
                                            {{ $i->judul }} <span
                                                class="bg-blue-100 text-blue-800 text-xs lg:text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ $i->kategori }}</span>
                                        </h3>
                                        <time
                                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500 text-wrap">Released
                                            on {{ date('F - d - Y', strtotime($i->created_at)) }}</time>
                                        <div class="bg-gray-100 rounded-xl px-4 pt-2 pb-2 text-wrap">
                                            <div
                                                class="mb-2 text-xs lg:text-base font-normal text-gray-500 dark:text-gray-400 break-words">
                                                {!! $i->informasi !!}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            @endcan
                        </ol>
                    </div>
                </div>
                {{-- </div> --}}
            </div>


            <div class="bg-white mx-4 mt-2 rounded-xl shadow-xl p-4">
                <span class="font-bold text-lg">JADWAL PEMBELAJARAN HARI INI</span>
                <hr class=" border-2 border-amber-300 rounded-xl mt-1">
                @can('role-A')
                    <div class="w-full flex items-end justify-end mt-4">
                        <form class="flex items-center max-w-sm justify-end w-full px-4">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search ......" required onkeyup="searchData()" />
                            </div>
                        </form>
                    </div>
                @endcan
                <div class="p-4 rounded-xl">
                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                            <thead
                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        MATERI AJAR
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <div class="flex items-center">
                                            PENGAJAR
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center">
                                            HARI
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <div class="flex items-center">
                                            SESI
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center">
                                            PUKUL
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <div class="flex items-center">
                                            SKS
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center">
                                            RUANG
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <div class="flex items-center">
                                            KELAS
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="jadwalTable">
                                @php
                                    $no = 1;
                                @endphp
                                @can('role-A')
                                    @foreach ($jadwal as $key => $j)
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                {{ $jadwal->perPage() * ($jadwal->currentPage() - 1) + $key + 1 }}
                                            </td>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->dosen->nama_dosen }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->hari->hari }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->sesi->sesi }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->sesi->pukul->pukul }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->detail_kurikulum->materi_ajar->sks }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->ruang->ruang }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->kelas->kelas }}
                                            </th>
                                        </tr>
                                    @endforeach
                                @endcan

                                @can('role-M')
                                    @foreach ($jadwal_mhs as $key => $j)
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                {{ $jadwal_mhs->perPage() * ($jadwal_mhs->currentPage() - 1) + $key + 1 }}
                                            </td>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->dosen->nama_dosen }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->hari->hari }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->sesi->sesi }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->sesi->pukul->pukul }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->detail_kurikulum->materi_ajar->sks }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->ruang->ruang }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->kelas->kelas }}
                                            </th>
                                        </tr>
                                    @endforeach
                                @endcan

                                @can('role-D')
                                    @foreach ($jadwal_mhs as $key => $j)
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                {{ $jadwal_mhs->perPage() * ($jadwal_mhs->currentPage() - 1) + $key + 1 }}
                                            </td>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->dosen->nama_dosen }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->hari->hari }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->sesi->sesi }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->sesi->pukul->pukul }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->detail_kurikulum->materi_ajar->sks }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->ruang->ruang }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->kelas->kelas }}
                                            </th>
                                        </tr>
                                    @endforeach
                                @endcan

                                @can('role-O')
                                    @foreach ($jadwal_mhs as $key => $j)
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                {{ $jadwal_mhs->perPage() * ($jadwal_mhs->currentPage() - 1) + $key + 1 }}
                                            </td>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->dosen->nama_dosen }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->hari->hari }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->sesi->sesi }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->sesi->pukul->pukul }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->detail_kurikulum->materi_ajar->sks }}
                                            </th>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div>
                                                    {{ $j->ruang->ruang }}
                                                </div>
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $j->kelas->kelas }}
                                            </th>
                                        </tr>
                                    @endforeach
                                @endcan
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>
        function searchData() {
            let search = document.getElementById('simple-search').value;

            fetch("{{ route('dashboard') }}?search=" + search, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('jadwalTable').innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</x-app-layout>
