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
                                    @php
                                        if ($verifikasiPengajuan) {
                                            if ($verifikasiPembimbing) {
                                                $border = 'border-black';
                                                $b = 'bg-emerald-500';
                                            } else {
                                                $border = '';
                                                $b = 'bg-red-500';
                                            }
                                        } else {
                                            $border = '';
                                            $b = 'bg-red-500';
                                        }

                                    @endphp
                                    <div
                                        class="absolute top-4 left-10 {{ $b }} text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        @if ($verifikasiPengajuan)
                                            @if ($verifikasiPembimbing)
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 {{ $border }} w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/pengajuan-judul.png') }}" alt="Pengajuan"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Pengajuan</div>
                                    </div>
                                </div>
                                <hr class="border w-20 {{ $border }}">
                                @php
                                    if ($verifikasiBimbingan >= 7) {
                                        $bBimbingan = 'bg-emerald-500';
                                        $border = 'border-black';
                                    } else {
                                        $bBimbingan = 'bg-red-500';
                                        $border = '';
                                    }

                                @endphp
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 {{ $bBimbingan }} text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        @if ($verifikasiBimbingan)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 {{ $border }} w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/bimbingan.png') }}" alt="Bimbingan"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Bimbingan</div>
                                    </div>
                                </div>
                                <hr class="border w-20 {{ $border }}">
                                @php
                                    if ($verifikasiDaftar) {
                                        $bDaftar = 'bg-emerald-500';
                                        $border = 'border-black';
                                    } else {
                                        $bDaftar = 'bg-red-500';
                                        $border = '';
                                    }

                                @endphp
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 {{ $bDaftar }} text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        @if ($verifikasiDaftar)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 {{ $border }} w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/daftar-sidang.png') }}" alt="Daftar"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Daftar</div>
                                    </div>
                                </div>
                                <hr class="border w-20">
                                @php
                                    if ($verifikasiSidang) {
                                        $bSidang = 'bg-emerald-500';
                                        $border = 'border-black';
                                    } else {
                                        $bSidang = 'bg-red-500';
                                        $border = '';
                                    }
                                @endphp
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 {{ $bSidang }} text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        @if ($verifikasiSidang)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 {{ $border }} w-28 h-28 rounded-full justify-center p-3">
                                        <img src="{{ url('project/sidang.png') }}" alt="Sidang"
                                            class="w-14 h-14 mb-2">
                                        <div class="text-center text-sm font-medium">Sidang</div>
                                    </div>
                                </div>
                                <hr class="border w-20">
                                @php
                                    if ($verifikasiRevisi) {
                                        $bRevisi = 'bg-emerald-500';
                                        $border = 'border-black';
                                    } else {
                                        $bRevisi = 'bg-red-500';
                                        $border = '';
                                    }
                                @endphp
                                <div class="relative">
                                    <div
                                        class="absolute top-4 left-10 {{ $bRevisi }} text-white w-6 h-6 flex items-center justify-center rounded-full shadow-md">
                                        @if ($verifikasiRevisi)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </div>
                                    <div
                                        class="flex flex-col items-center border-2 {{ $border }} w-28 h-28 rounded-full justify-center p-3">
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
                                                        <div class="mb-5">
                                                            <label for="judul2"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembimbing</label>
                                                            <select
                                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                                name="dosen" data-placeholder="Pilih Dosen">
                                                                <option value="">
                                                                    PILIH</option>
                                                                @foreach ($dosen as $k)
                                                                    <option value="{{ $k->id }}">
                                                                        {{ $k->dosen->nama_dosen }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
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
                                                    <a href="{{ asset('lapBab/' . $fileFile) }}" target="_blank"
                                                        class="bg-sky-200 px-2 py-1 rounded-xl">Lihat Laporan</a>
                                                </div>
                                                <div class="mt-4">
                                                    Dosen Pembimbing :
                                                    {{ $namaDosen }}<br>
                                                    Verifikasi : {{ $namaDosenVerifikasi }}
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
                                                            <input type="hidden" id="id_dosen" name="id_dosen"
                                                                value="{{ $idDosen }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Masukan Tanggal disini ..." required />
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
                                            <input type="hidden" id="id_dosen" name="id_dosen"
                                                value="{{ $idDosen }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Tanggal disini ..." required />
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
                                                if ($appProjVerifikasi) {
                                                    if ($appProjVerifikasi === 'BELUM') {
                                                        $bg = 'bg-red-200';
                                                    } else {
                                                        $bg = 'bg-emerald-200';
                                                    }
                                                } else {
                                                    $bg = 'bg-emerald-200';
                                                }
                                            @endphp

                                            <div class="font-bold">Data Pendaftaran <span
                                                    class="text-xs {{ $bg }} px-4 rounded-xl">{{ $appProjVerifikasi }}</span>
                                            </div>
                                            <div class="flex">

                                                <div class="w-full">
                                                    <p class="font-bold mt-4">Data Mahasiswa</p>
                                                    <table>
                                                        <tr>
                                                            <td>Nim</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td>{{ $appProjNim }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td>{{ $appProjMahasiswa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelas</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td>{{ $appProjKelas }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jurusan</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td>{{ $appProjJurusan }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="w-full">
                                                    <p class="font-bold mt-4">Data Project</p>
                                                    <table>
                                                        <tr>
                                                            <td>Judul</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td>{{ $appProjJudul }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pembimbing</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td>{{ $namaDosen }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Laporan</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td><a href="{{ asset('appProj/' . $appProjFile) }}"
                                                                    target="_blank">Lihat</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="w-full">
                                                    <p class="font-bold mt-4">Data Pendukung</p>
                                                    <table>
                                                        <tr>
                                                            <td>Ijazah</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td><span id="status-ijazah">-</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Foto</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td><span id="status-foto">-</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>KK</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td><span id="status-kk">-</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>KTP</td>
                                                            <td class="pr-2 pl-2">:</td>
                                                            <td><span id="status-ktp">-</span></td>
                                                        </tr>
                                                    </table>
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
                                                    <div class="text-lg font-bold">
                                                        {{ date('l', strtotime($penguji->tgl_sidang)) }}</div>
                                                    <div class="text-4xl font-bold">
                                                        {{ date('d', strtotime($penguji->tgl_sidang)) }}</div>
                                                </div>
                                                <!-- Garis Vertikal -->
                                                <div class="w-px h-12 bg-gray-300"></div>
                                                <!-- Bagian Detail -->
                                                <div class="flex flex-col gap-1">
                                                    <div class="text-gray-700">{{ $penguji->pukul }} WIB | <span
                                                            class="font-bold">{{ $penguji->ruang }}</span></div>
                                                    <div class="text-gray-700">{{ $penguji->nama_dosen_penguji }}
                                                    </div>
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
                                                                    {{ $detailRevisi->bab_satu }}
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    BAB II
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    {{ $detailRevisi->bab_dua }}
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    BAB III
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    {{ $detailRevisi->bab_tiga }}
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    BAB IV
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    {{ $detailRevisi->bab_empat }}
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    BAB V
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    {{ $detailRevisi->bab_lima }}
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
                                                    <input type="hidden" id="id_dosen" name="id_dosen"
                                                        value="{{ $idDosen }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Tanggal disini ..." required />
                                                    <div class="p-4 rounded-xl">
                                                        <div class="flex gap-5">
                                                            <div class="mb-5 w-full">
                                                                <label for="file"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Revisi</label>
                                                                <input type="file" id="file" name="file"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    placeholder="Masukan Tanggal disini ..."
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                                class="fi fi-rr-disk "></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="w-full">
                                                @php
                                                    if ($revisiVerifikasi) {
                                                        if ($revisiVerifikasi === 'BELUM') {
                                                            $bg = 'bg-red-200';
                                                        } else {
                                                            $bg = 'bg-emerald-200';
                                                        }
                                                    } else {
                                                        $bg = 'bg-emerald-200';
                                                    }
                                                @endphp
                                                <div class="font-bold">Data Revisi <span
                                                        class="text-xs {{ $bg }} px-4 rounded-xl">{{ $revisiVerifikasi }}</span>
                                                </div>
                                                <div class="flex">

                                                    <div class="w-full">
                                                        <p class="font-bold mt-4">Data Mahasiswa</p>
                                                        <table>
                                                            <tr>
                                                                <td>Nim</td>
                                                                <td class="pr-2 pl-2">:</td>
                                                                <td>{{ $revisiNim }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td class="pr-2 pl-2">:</td>
                                                                <td>{{ $revisiMahasiswa }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kelas</td>
                                                                <td class="pr-2 pl-2">:</td>
                                                                <td>{{ $revisiKelas }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jurusan</td>
                                                                <td class="pr-2 pl-2">:</td>
                                                                <td>{{ $revisiJurusan }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="w-full">
                                                        <p class="font-bold mt-4">Data Project</p>
                                                        <table>
                                                            <tr>
                                                                <td>Judul</td>
                                                                <td class="pr-2 pl-2">:</td>
                                                                <td>{{ $appProjJudul }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pembimbing</td>
                                                                <td class="pr-2 pl-2">:</td>
                                                                <td>{{ $namaDosen }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Laporan</td>
                                                                <td class="pr-2 pl-2">:</td>
                                                                <td><a href="{{ asset('revisi/' . $revisiFile) }}"
                                                                        target="_blank">Lihat</a></td>
                                                            </tr>
                                                        </table>
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

                    const uploads = data.useruploads;

                    // Default status
                    let statusIjazah = '<img src="/img/delete.png" class="h-4 w-4" alt="Ijazah Preview">';
                    let statusFoto = '<img src="/img/delete.png" class="h-4 w-4" alt="Foto Preview">';
                    let statusKTP = '<img src="/img/delete.png" class="h-4 w-4" alt="KTP Preview">';
                    let statusKK = '<img src="/img/delete.png" class="h-4 w-4" alt="KK Preview">';

                    const iden = data.data.identity;

                    // Cek keberadaan file di useruploads
                    uploads.forEach(upload => {
                        if (upload.fileupload.namefile === 'ijazah') {
                            statusIjazah =
                                `<a href="https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${identity}&filename=${identity}-ijazah.pdf" target="_blank"><img src="/img/check.png" class="h-4 w-4" alt="Ijazah Preview"></a>`;
                        } else if (upload.fileupload.namefile === 'foto') {
                            statusFoto =
                                `<a href="https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${identity}&filename=${identity}-foto.jpeg" target="_blank"><img src="/img/check.png" class="h-4 w-4" alt="Foto Preview"></a>`;
                        } else if (upload.fileupload.namefile === 'kk') {
                            statusKK =
                                `<a href="https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${identity}&filename=${identity}-kk.pdf" target="_blank"><img src="/img/check.png" class="h-4 w-4" alt="KK Preview"></a>`;
                        } else if (upload.fileupload.namefile === 'ktp') {
                            statusKTP =
                                `<a href="https://uploadhub.politekniklp3i-tasikmalaya.ac.id/preview?identity=${identity}&filename=${identity}-ktp.pdf" target="_blank"><img src="/img/check.png" class="h-4 w-4" alt="KTP Preview"></a>`;
                        }
                    });

                    // Update HTML
                    document.getElementById('status-ijazah').innerHTML = statusIjazah;
                    document.getElementById('status-foto').innerHTML = statusFoto;
                    document.getElementById('status-kk').innerHTML = statusKK;
                    document.getElementById('status-ktp').innerHTML = statusKTP;

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
