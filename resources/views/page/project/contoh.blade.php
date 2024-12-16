<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center"><span class="text-red-500">Project</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-3/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-4 p-2 text-sm lg:text-lg text-center lg:text-center bg-amber-200 rounded-xl font-bold">
                                PROFILE
                            </div>
                            <div class="mt-2 border-2 p-2 rounded-xl">
                                <div class="flex p-4 gap-5 bg-gray-100 rounded-xl items-center">
                                    <div class="ms-1 ml-[15px]">
                                        <img src="{{ url('img/user.png') }}" alt="" srcset=""
                                            class="lg:w-20">
                                    </div>
                                    <div class="mt-2">
                                        <input type="hidden" class="form-control" id="identity" name="identity"
                                            value={{ $mahasiswa->nik }}>
                                        <div class="font-bold">{{ $mahasiswa->nama }}</div>
                                        <div>{{ $mahasiswa->nim }}</div>
                                        <div>{{ $mahasiswa->kelas->kelas }}</div>
                                        <div class="text-sm">{{ $mahasiswa->kelas->jurusan->jurusan }}</div>
                                        <div class="text-sm">Tahun Angatan {{ $mahasiswa->tahun_angkatan }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex items-center space-x-12 justify-center">
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 bg-emerald-500 text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 border-black w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/pengajuan-judul.png') }}" alt="Pengajuan"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Pengajuan</div>
                                    </div>
                                </div>
                                <hr class="border w-20 border-black">
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 bg-red-500 text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/bimbingan.png') }}" alt="Bimbingan"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Bimbingan</div>
                                    </div>
                                </div>
                                <hr class="border w-20">
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 bg-red-500 text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/daftar-sidang.png') }}" alt="Daftar"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Daftar</div>
                                    </div>
                                </div>
                                <hr class="border w-20">
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 bg-red-500 text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/sidang.png') }}" alt="Sidang"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Sidang</div>
                                    </div>
                                </div>
                                <hr class="border w-20">
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 bg-red-500 text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/revisi.png') }}" alt="Revisi"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Revisi</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="w-full">
                                    <div
                                        class="tab flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 mb-4">
                                        <button
                                            class="tablinks inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg dark:bg-gray-800 dark:text-blue-500"
                                            onclick="openTab(event, 'Pengajuan')">PENGAJUAN</button>
                                        <button
                                            class="tablinks inline-block p-4 text-gray-600 bg-white rounded-t-lg dark:bg-gray-700 dark:text-gray-400"
                                            onclick="openTab(event, 'Bimbingan')">BIMBINGAN</button>
                                        <button
                                            class="tablinks inline-block p-4 text-gray-600 bg-white rounded-t-lg dark:bg-gray-700 dark:text-gray-400"
                                            onclick="openTab(event, 'Daftar')">DAFTAR</button>
                                        <button
                                            class="tablinks inline-block p-4 text-gray-600 bg-white rounded-t-lg dark:bg-gray-700 dark:text-gray-400"
                                            onclick="openTab(event, 'Sidang')">SIDANG</button>
                                        <button
                                            class="tablinks inline-block p-4 text-gray-600 bg-white rounded-t-lg dark:bg-gray-700 dark:text-gray-400"
                                            onclick="openTab(event, 'Revisi')">REVISI</button>
                                    </div>

                                    <div id="Pengajuan" class="tab-content border border-2 p-2 rounded-xl">
                                        <div><span class="font-bold">Note : </span> Mahasiswa diwajibkan mengajukan 2
                                            judul<span class="text-red-500 fornt-bold">*</span></div>
                                        <div class="flex mt-4 gap-4 items-start">
                                            <div class="bg-gray-100 w-full">
                                                <form action="{{ route('appProjek.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="p-4 rounded-xl">
                                                        <div class="mb-5">
                                                            <label for="judul1"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                                                1</label>
                                                            <input type="text" id="judul1" name="judul1"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Masukan Nama Judul disini ..." required />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="judul2"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                                                2</label>
                                                            <input type="text" id="judul2" name="judul2"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Masukan Nama Judul disini ..." required />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="file"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laporan
                                                                Bab 1</label>
                                                            <input type="file" id="file" name="file"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Masukan Nama Judul disini ..." required />
                                                        </div>
                                                        <button type="submit"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                                class="fi fi-rr-disk "></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="w-full">
                                                <div class="relative overflow-x-auto">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-4 py-3">
                                                                    NO
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    JUDUL
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    VERIFIKASI
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            @foreach ($judul as $m)
                                                                <tr
                                                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                    <th scope="row"
                                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ $no++ }}
                                                                    </th>
                                                                    <td class="px-6 py-4 text-wrap">
                                                                        {{ $m->judul }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $m->verifikasi }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="mt-4">
                                                    <a href="{{ asset('lapBab/' . $file->file) }}" target="_blank"
                                                        class="bg-sky-200 px-2 py-1 rounded-xl">Lihat Laporan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Bimbingan" class="tab-content border border-2 p-2 rounded-xl"
                                        style="display:none;">
                                        <span class="font-bold">Note : </span> Mahasiswa diwajibkan melakukan bimbingan
                                        minimal sebanyak 7x<span class="text-red-500 fornt-bold">*</span>
                                        <div class="flex gap-4 mt-4 items-start">
                                            <div class="relative overflow-x-auto rounded-3xl border-2 w-full">
                                                <table
                                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead
                                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-4 py-3">
                                                                NO
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                TANGGAL
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                PEMBAHASAN
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                KATEGORI BIMBINGAN
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                VERIFIKASI
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no = 1;
                                                        @endphp
                                                        @foreach ($bimbingan as $b)
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    {{ $no++ }}
                                                                </th>
                                                                <td class="px-6 py-4 text-wrap">
                                                                    {{ date('d-m-Y', strtotime($b->tanggal)) }}
                                                                </td>
                                                                <td class="px-6 py-4 text-wrap">
                                                                    {{ $b->pembahasan }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $b->kategori_bimbingan }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $b->verifikasi }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="mt-4 ml-4 mr-4 mb-4">
                                                    {{ $bimbingan->links() }}
                                                </div>
                                            </div>
                                            <div class="bg-gray-100 w-full">
                                                <form action="{{ route('bimbingan.store') }}" method="post">
                                                    @csrf
                                                    <div class="p-4 rounded-xl">
                                                        <div class="flex gap-5">
                                                            <div class="mb-5 w-full">
                                                                <label for="tanggal"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                                                <input type="date" id="tanggal" name="tanggal"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    placeholder="Masukan Tanggal disini ..."
                                                                    required />
                                                            </div>
                                                            <div class="mb-5 w-full">
                                                                <label for="kategori_bimbingan"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Katergori
                                                                    Bimbingan</label>
                                                                <select id="kategori_bimbingan"
                                                                    name="kategori_bimbingan"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    data-placeholder="Pilih">
                                                                    <option value="" selected disabled>PILIH
                                                                    </option>
                                                                    <option value="ONLINE">ONLINE</option>
                                                                    <option value="OFFLINE">OFFLINE</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="pembahasan"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembahasan</label>
                                                            <textarea type="text" id="pembahasan" name="pembahasan"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Masukan Pembahasan disini ..." required></textarea>
                                                        </div>
                                                        <button type="submit"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                                class="fi fi-rr-disk "></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Daftar" class="tab-content border border-2 p-2 rounded-xl text-wrap"
                                        style="display:none;">
                                        <span class="font-bold">Note : </span> Jika belum di upload silahkan login ke
                                        pmb online dengan username dan password pada profile<span
                                            class="text-red-500 fornt-bold">*</span>
                                        <form action="{{ route('app_proj.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="p-4 rounded-xl">
                                                <div class="flex gap-5">
                                                    <div class="mb-5 w-full">
                                                        <label for="file"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laporan</label>
                                                        <input type="file" id="file" name="file"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Masukan Nama Judul disini ..." required />
                                                    </div>
                                                    <div class="mb-5 w-full">
                                                        <label for="judul"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                                        <input type="text" id="judul" name="judul"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Masukan Judul disini ..." required />
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                        class="fi fi-rr-disk "></i></button>
                                            </div>
                                        </form>

                                        <div class="border-2 rounded-xl p-4">
                                            @php
                                                $verifikasi = $appProj->verifikasi;
                                                if ($verifikasi === 'BELUM') {
                                                    $bg = 'bg-red-200';
                                                } else {
                                                    $bg = 'bg-emerald-200';
                                                }
                                            @endphp

                                            <div class="font-bold">Data Pendaftaran <span
                                                    class="text-xs {{ $bg }} px-4 rounded-xl">{{ $appProj->verifikasi }}</span>
                                            </div>
                                            <div class="flex">
                                                <div class="w-full">
                                                    <div class="flex gap-5">
                                                        <div>NIM</div>
                                                        <div>:</div>
                                                        <div>{{ $appProj->nim }}</div>
                                                    </div>
                                                    <div class="flex gap-5">
                                                        <div>NAMA</div>
                                                        <div>:</div>
                                                        <div>{{ $appProj->mahasiswa->nama }}</div>
                                                    </div>
                                                    <div class="flex gap-5">
                                                        <div>KELAS</div>
                                                        <div>:</div>
                                                        <div>{{ $appProj->mahasiswa->kelas->kelas }}</div>
                                                    </div>
                                                    <div class="flex gap-5">1
                                                        <div>JURUSAN</div>
                                                        <div>:</div>
                                                        <div>{{ $appProj->mahasiswa->kelas->jurusan->jurusan }}</div>
                                                    </div>
                                                </div>
                                                <div class="w-full">
                                                    <div class="flex gap-5">
                                                        <div>JUDUL</div>
                                                        <div>:</div>
                                                        <div class="text-wrap">{{ $appProj->judul }}</div>
                                                    </div>
                                                    <div class="flex gap-5">
                                                        <div>Laporan</div>
                                                        <div>:</div>
                                                        <div>
                                                            @if ($appProj->file)
                                                                <a href="{{ asset('appProj/' . $appProj->file) }}"
                                                                    target="_blank">Lihat</a>
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="border-2 rounded-xl mt-2">
                                                        <div class="relative overflow-x-auto rounded-xl">
                                                            <table
                                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                                <thead
                                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                    <tr>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 bg-gray-100">
                                                                            KTP
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            KK
                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 bg-gray-100">
                                                                            IJAZAH
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            AKTA KELAHIRAN
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr
                                                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                        <th
                                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                                            <!-- <i class="fi fi-sr-cross-circle text-red-500"></i> -->
                                                                            <a id="ktpLink" href="#"
                                                                                target="_blank"
                                                                                class="mt-4 bg-amber-200 flex items-center px-2 pt-2 justify-center rounded-xl"><i
                                                                                    class="fi fi-ss-eye"></i></a>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                            <!-- <i class="fi fi-sr-cross-circle text-red-500"></i> -->
                                                                            <a id="kkLink" href="#"
                                                                                target="_blank"
                                                                                class="mt-4 bg-amber-200 flex items-center px-2 pt-2 justify-center rounded-xl"><i
                                                                                    class="fi fi-ss-eye"></i></a>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                                            <!-- <i class="fi fi-sr-cross-circle text-red-500"></i> -->
                                                                            <a id="ijazahLink" href="#"
                                                                                target="_blank"
                                                                                class="mt-4 bg-amber-200 flex items-center px-2 pt-2 justify-center rounded-xl"><i
                                                                                    class="fi fi-ss-eye"></i></a>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                            <!-- <i class="fi fi-sr-cross-circle text-red-500"></i> -->
                                                                            <a id="aktakelahiranLink" href="#"
                                                                                target="_blank"
                                                                                class="mt-4 bg-amber-200 flex items-center px-2 pt-2 justify-center rounded-xl"><i
                                                                                    class="fi fi-ss-eye"></i></a>
                                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Sidang" class="tab-content border border-2 p-2 rounded-xl"
                                    style="display:none;">
                                    <div class="flex gap-5 items-start">
                                        <div class="flex items-center p-4 border-2 rounded-xl gap-4">
                                            <!-- Bagian Tanggal -->
                                            <div class="text-center text-red-500">
                                                <div class="text-lg font-bold">Wed</div>
                                                <div class="text-4xl font-bold">28</div>
                                            </div>
                                            <!-- Garis Vertikal -->
                                            <div class="w-px h-12 bg-gray-300"></div>
                                            <!-- Bagian Detail -->
                                            <div class="flex flex-col gap-1">
                                                <div class="text-gray-700">09:00 - 09:30 WIB | <span
                                                        class="font-bold">404</span></div>
                                                <div class="text-gray-700">Asep Manarul Hidayah, S.Kom</div>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="relative overflow-x-auto">
                                                <table
                                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead
                                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                BAGIAN
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                REVISI
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                BAB I
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                -
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                BAB II
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                -
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                BAB III
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                -
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                BAB IV
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                -
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                BAB V
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                -
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Revisi" class="tab-content border border-2 p-2 rounded-xl"
                                    style="display:none;">
                                    <div class="flex gap-5">
                                        <div class="bg-gray-100 w-full">
                                            <form action="{{ route('revisiProj.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="p-4 rounded-xl">
                                                    <div class="flex gap-5">
                                                        <div class="mb-5 w-full">
                                                            <label for="file"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Revisi</label>
                                                            <input type="file" id="file" name="file"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Masukan Tanggal disini ..." required />
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                            class="fi fi-rr-disk "></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex gap-5">
                                                <div>File</div>
                                                <div>
                                                    @if ($revisi->file)
                                                        <a href="{{ asset('revisi/' . $revisi->file) }}"
                                                            target="_blank">Lihat</a>
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex gap-5">
                                                <div>Verifikasi</div>
                                                <div>
                                                    {{ $revisi->verifikasi }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function openTab(evt, tabName) {
            // Menyembunyikan semua konten tab
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Menghapus kelas aktif dari semua tombol tab
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("bg-gray-100", "text-blue-600", "dark:bg-gray-800", "dark:text-blue-500");
                tablinks[i].classList.add("text-gray-600", "bg-white", "dark:bg-gray-700", "dark:text-gray-400");
            }

            // Menampilkan konten tab yang dipilih dan menambahkan kelas aktif
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("bg-gray-100", "text-blue-600", "dark:bg-gray-800", "dark:text-blue-500");
            evt.currentTarget.classList.remove("text-gray-600", "bg-white", "dark:bg-gray-700", "dark:text-gray-400");
        }

        // Buka tab pertama secara default
        document.querySelector('.tablinks').click();
    </script>
    <script>
        const getResult = async () => {
            const identity = document.getElementById('identity').value;
            console.log(identity);

            await axios.get(`https://pmb-api.politekniklp3i-tasikmalaya.ac.id/applicants/nik/${identity}`, {
                    headers: {
                        'lp3i-api-key': 'aEof9XqcH34k3g6IbJcQLxGY',
                    }
                })
                .then((response) => {
                    const data = response.data;
                    const dataGender = data.data.gender;

                    const iden = data.data.identity;

                    const ktpLink = document.getElementById('ktpLink');
                    const ijazahLink = document.getElementById('ijazahLink');
                    const kkLink = document.getElementById('kkLink');
                    const aktakelahiranLink = document.getElementById('kkLink');
                    ktpLink.href =
                        `https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${iden}&filename=${iden}-foto.jpeg`;
                    ijazahLink.href =
                        `https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${iden}&filename=${iden}-ijazah.pdf`;
                    kkLink.href =
                        `https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${iden}&filename=${iden}-kk.pdf`;
                    aktakelahiranLink.href =
                        `https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${iden}&filename=${iden}-akta.pdf`;

                    console.log(data);
                })
                .catch((error) => {
                    console.log('inii');

                    console.log(error);
                });
        }
        getResult();
    </script>

</x-app-layout>
