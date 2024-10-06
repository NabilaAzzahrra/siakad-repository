<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Jawaban Tugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-3/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-amber-300 rounded-xl font-bold">
                                DATA TUGAS
                            </div>
                            @foreach ($formatif as $d)
                            @endforeach
                            <div class="mt-4">
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-ss-book-open-cover"></i></div>
                                    <div class="font-bold pr-[47px]">Materi Ajar</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600">
                                        {{ $formatif->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-calendar-clock"></i></div>
                                    <div class="font-bold pr-[22px]">Semester/SKS</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600">
                                        {{ $formatif->jadwal->detail_kurikulum->materi_ajar->semester->semester }}
                                        /
                                        {{ $formatif->jadwal->detail_kurikulum->materi_ajar->sks }}
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-chalkboard-user"></i></div>
                                    <div class="font-bold pr-16">Pengajar</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600 text-wrap">
                                        {{ $formatif->jadwal->dosen->nama_dosen }}</div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-apps"></i></div>
                                    <div class="font-bold pr-[14px]">Materi Formatif</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600 text-wrap">{{ $formatif->judul_formatif }}</div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-hourglass-start"></i></div>
                                    <div class="font-bold pr-16">Deadline</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600 text-wrap">
                                        {{ date('d-m-Y H:i', strtotime($formatif->deadline ?? '-')) }} WIB</div>
                                </div>
                                <div>
                                    @php
                                        if (date('Y-m-d H:i:s') < $formatif->deadline) {
                                            $button =
                                                "<div class='flex gap-5'>
                                                    <div class='w-full'>
                                                        <a href=" .
                                                route('jadwal_reguler.formatif_show', $formatif->id) .
                                                " class='bg-green-200 flex items-center justify-center rounded-xl py-2 text-green-800 font-bold shadow-xl text-sm lg:text-[15px]'>
                                                            <i class='fi fi-sr-check-circle pt-1 pr-2'></i> Soal formatif
                                                        </a>
                                                    </div>
                                                    <div class='w-full'>
                                                        <a href='#' class='bg-blue-200 flex items-center justify-center rounded-xl py-2 text-blue-800 font-bold shadow-xl text-sm lg:text-[15px]' onclick='return jawaban_formatif()'><i class='fas fa-upload pt-0 pr-2'></i> Upload Jawaban</a>
                                                    </div>
                                                </div>";
                                        } else {
                                            $button = "<a href='#'
                                                    class='bg-red-200 flex items-center justify-center rounded-xl py-2 text-red-800 font-bold shadow-xl text-sm lg:text-[15px]'>
                                                    <i class='fi fi-sr-cross-circle pt-1 pr-2'></i> Formatif sudah tidak dapat di akses
                                                </a>";
                                        }
                                    @endphp

                                    {!! $button !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex flex-col lg:flex-row gap-2 items-center justify-between">
                                <div class="p-6 bg-amber-300 rounded-xl w-full font-bold">DATA JAWABAN TUGAS</div>
                                <div class="p-2 bg-blue-300 rounded-xl w-20"><a href="#"
                                        onclick="return jawaban_formatif()">TAMBAH</a></div>
                            </div>
                            <div class="flex justify-center">
                                <div class="pt-6 lg:p-6" style="width:100%;  overflow-x:auto;">
                                    @can('role-A')
                                        <div class="mb-4">
                                            <a href="javascript:void(0);" onclick="downloadSelectedFiles()"
                                                class="bg-amber-300 w-28 p-2 flex items-center justify-center font-bold rounded-xl">
                                                Download All
                                            </a>
                                        </div>
                                    @endcan
                                    @can('role-D')
                                        <div class="mb-4">
                                            <a href="javascript:void(0);" onclick="downloadSelectedFiles()"
                                                class="bg-amber-300 w-28 p-2 flex items-center justify-center font-bold rounded-xl">
                                                Download All
                                            </a>
                                        </div>
                                    @endcan
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                        @can('role-D')
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <input type="checkbox" class="rounded-md"
                                                                onchange="checkAll(this)" name="check">
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NO
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NIM
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">NAMA</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">JURUSAN</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">KELAS</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">JAWABAN</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">ACTION</div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach ($detail as $m)
                                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                            <td class="px-6 py-4 text-center">
                                                                <input type="checkbox" class="rounded-md" name="user_id[]"
                                                                    value="{{ $m->jawaban }}">
                                                            </td>
                                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                                {{ $no++ }}
                                                            </td>
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $m->nim }}
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-100">{{ $m->mahasiswa->nama }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->mahasiswa->kelas->jurusan->jurusan }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->mahasiswa->kelas->kelas }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <a href="{{ route('detail_formatif.show', $m->id) }}"
                                                                    class="bg-green-500 hover:bg-bg-green-300 px-3 py-2 rounded-md text-xs text-white">
                                                                    <i class="fa-solid fa-book"></i>
                                                                </a>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100 flex gap-3">
                                                                @can('role-A')
                                                                    <a href="{{ asset('formatif/jawaban/' . $m->jawaban) }}"
                                                                        class="bg-sky-500 hover:bg-bg-red-300 px-3 py-2 rounded-md text-xs text-white"
                                                                        download>
                                                                        <i class="fi fi-sr-file-download"></i>
                                                                    </a>
                                                                    <button
                                                                        onclick="return formatifDelete('{{ $m->id }}','{{ $m->mahasiswa->nama }}','{{ $m->jawaban }}')"
                                                                        class="bg-red-500 hover:bg-red-300 px-3 py-1 rounded-md text-xs text-white">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                                @can('role-D')
                                                                    <a href="{{ asset('formatif/jawaban/' . $m->jawaban) }}"
                                                                        class="bg-sky-500 hover:bg-bg-red-300 px-3 py-2 rounded-md text-xs text-white"
                                                                        download>
                                                                        <i class="fi fi-sr-file-download"></i>
                                                                    </a>
                                                                    <button
                                                                        onclick="return formatifDelete('{{ $m->id }}','{{ $m->mahasiswa->nama }}','{{ $m->jawaban }}')"
                                                                        class="bg-red-500 hover:bg-red-300 px-3 py-1 rounded-md text-xs text-white">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                                <button type="button" data-id="{{ $m->id }}"
                                                                    data-modal-target="sourceModal_update"
                                                                    data-nim="{{ $m->nim }}"
                                                                    data-jawaban="{{ $m->jawaban }}"
                                                                    onclick="editSourceModal(this)"
                                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endcan

                                        @can('role-A')
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <input type="checkbox" class="rounded-md"
                                                                onchange="checkAll(this)" name="check">
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NO
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NIM
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">NAMA</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">JURUSAN</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">KELAS</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">JAWABAN</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">ACTION</div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach ($detail as $m)
                                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                            <td class="px-6 py-4 text-center">
                                                                <input type="checkbox" class="rounded-md"
                                                                    name="user_id[]" value="{{ $m->jawaban }}">
                                                            </td>
                                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                                {{ $no++ }}
                                                            </td>
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $m->nim }}
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-100">{{ $m->mahasiswa->nama }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->mahasiswa->kelas->jurusan->jurusan }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->mahasiswa->kelas->kelas }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <a href="{{ route('detail_formatif.show', $m->id) }}"
                                                                    class="bg-green-500 hover:bg-bg-green-300 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fa-solid fa-book"></i>
                                                                </a>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100 flex gap-3">
                                                                @can('role-A')
                                                                    <a href="{{ asset('formatif/jawaban/' . $m->jawaban) }}"
                                                                        class="bg-sky-500 hover:bg-bg-red-300 px-4 py-3 rounded-xl text-xs text-white"
                                                                        download>
                                                                        <i class="fi fi-sr-file-download"></i>
                                                                    </a>
                                                                    <button
                                                                        onclick="return formatifDelete('{{ $m->id }}','{{ $m->mahasiswa->nama }}','{{ $m->jawaban }}')"
                                                                        class="bg-red-500 hover:bg-red-300 px-4 py-3 rounded-xl text-xs text-white">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                                @can('role-D')
                                                                    <a href="{{ asset('formatif/jawaban/' . $m->jawaban) }}"
                                                                        class="bg-sky-500 hover:bg-bg-red-300 px-4 py-3 rounded-xl text-xs text-white"
                                                                        download>
                                                                        <i class="fi fi-sr-file-download"></i>
                                                                    </a>
                                                                    <button
                                                                        onclick="return formatifDelete('{{ $m->id }}','{{ $m->mahasiswa->nama }}','{{ $m->jawaban }}')"
                                                                        class="bg-red-500 hover:bg-red-300 px-4 py-3 rounded-xl text-xs text-white">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                                <button type="button" data-id="{{ $m->id }}"
                                                                    data-modal-target="sourceModal_update"
                                                                    data-nim="{{ $m->nim }}"
                                                                    data-jawaban="{{ $m->jawaban }}"
                                                                    onclick="editSourceModal(this)"
                                                                    class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endcan

                                        @can('role-M')
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NO
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NIM
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">NAMA</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">JURUSAN</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">KELAS</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">JAWABAN</div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">ACTION</div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach ($detail_mhs as $m)
                                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                                {{ $no++ }}
                                                            </td>
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $m->nim }}
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-100">{{ $m->mahasiswa->nama }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->mahasiswa->kelas->jurusan->jurusan }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->mahasiswa->kelas->kelas }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <a href="{{ route('detail_formatif.show', $m->id) }}"
                                                                    class="bg-green-500 hover:bg-bg-green-300 px-3 py-2 rounded-md text-xs text-white">
                                                                    <i class="fa-solid fa-book"></i>
                                                                </a>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100 flex gap-3">
                                                                @can('role-A')
                                                                    <a href="{{ asset('formatif/jawaban/' . $m->jawaban) }}"
                                                                        class="bg-sky-500 hover:bg-bg-red-300 px-3 py-2 rounded-md text-xs text-white"
                                                                        download>
                                                                        <i class="fi fi-sr-file-download"></i>
                                                                    </a>
                                                                    <button
                                                                        onclick="return formatifDelete('{{ $m->id }}','{{ $m->mahasiswa->nama }}','{{ $m->jawaban }}')"
                                                                        class="bg-red-500 hover:bg-red-300 px-3 py-1 rounded-md text-xs text-white">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                                @can('role-D')
                                                                    <a href="{{ asset('formatif/jawaban/' . $m->jawaban) }}"
                                                                        class="bg-sky-500 hover:bg-bg-red-300 px-3 py-2 rounded-md text-xs text-white"
                                                                        download>
                                                                        <i class="fi fi-sr-file-download"></i>
                                                                    </a>
                                                                    <button
                                                                        onclick="return formatifDelete('{{ $m->id }}','{{ $m->mahasiswa->nama }}','{{ $m->jawaban }}')"
                                                                        class="bg-red-500 hover:bg-red-300 px-3 py-1 rounded-md text-xs text-white">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                                <button type="button" data-id="{{ $m->id }}"
                                                                    data-modal-target="sourceModal_update"
                                                                    data-nim="{{ $m->nim }}"
                                                                    data-jawaban="{{ $m->jawaban }}"
                                                                    onclick="editSourceModal(this)"
                                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="hidden">
                            <label for="id_formatifs" class="block mb-2 text-sm font-medium text-gray-900">Id
                                Formatif</label>
                            <input type="text" id="id_formatifs" name="id_formatif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukan id formatif disini..." value="{{ $formatif->id_formatif }}">
                        </div>
                        <div class="mb-5">
                            <label for="nims" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                            <input type="text" id="nims" name="nim" value="{{ Auth::user()->email }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukan NIM disini..." readonly>
                        </div>
                        <div class="mb-5">
                            <label for="jawabans" class="block mb-2 text-sm font-medium text-gray-900">Jawaban</label>
                            <input type="file" id="jawabans" name="jawaban"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukan Jawaban disini...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="changeSourceModal(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal_update">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="bg-white rounded-lg shadow w-full md:w-1/2 relative p-4">
            <div class="flex items-start justify-between border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="title_source_update">
                    Tambah Sumber Database
                </h3>
                <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal_update"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form method="POST" id="formSourceModal_update" enctype="multipart/form-data">
                @csrf
                <div class="p-4 space-y-6">
                    <div class="mb-5">
                        <label for="nims_update" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                        <input type="text" id="nims_update" name="nim_update"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukan NIM disini..." readonly>
                    </div>
                    <div class="mb-5">
                        <label for="jawabans_sebelumnya" class="block mb-2 text-sm font-medium text-gray-900">Jawaban
                            Sebelumnya</label>
                        <input type="text" id="jawabans_sebelumnya" name="jawaban_sebelumnya"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukan Jawaban disini..." readonly>
                    </div>
                    <div class="mb-5">
                        <label for="jawabans_update"
                            class="block mb-2 text-sm font-medium text-gray-900">Jawaban</label>
                        <input type="file" id="jawabans_update" name="jawaban_update"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="submit" id="formSourceButton_update"
                        class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal_update"
                        class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const jawaban_formatif = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');
            const title = document.getElementById('title_source');
            const formButton = document.getElementById('formSourceButton');

            // Update the modal title and button text
            title.innerText = 'Upload Jawaban';
            formButton.innerText = 'Simpan';

            // Set the form action URL
            let url = "{{ route('detail_formatif.store') }}";
            formModal.setAttribute('action', url);

            // Show the modal
            modal.classList.remove('hidden');
            return false;
        };

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal_update');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const nim = button.dataset.nim;
            const jawaban = button.dataset.jawaban;
            let url = "{{ route('detail_formatif.update', ':id') }}".replace(':id', id);

            document.getElementById('title_source_update').innerText = `Update Formatif dengan NIM ${nim}`;
            document.getElementById('nims_update').value = nim;
            document.getElementById('jawabans_sebelumnya').value = jawaban;
            document.getElementById('formSourceModal_update').setAttribute('action', url);

            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('name', '_token');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            // Menampilkan modal
            document.getElementById(modalTarget).classList.remove('hidden');
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const formatifDelete = async (id, nama, jawaban) => {
            let tanya = confirm(`Apakah Anda yakin untuk menghapus Formatif ${nama}?`);
            if (tanya) {
                try {
                    const response = await axios.post(`/detail_formatif/${id}`, {
                        '_method': 'DELETE',
                        '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    });

                    if (response.status === 200) {
                        // Berhasil menghapus, refresh halaman
                        location.reload();
                    } else {
                        // Tanggapan tak terduga dari server
                        alert('Terjadi kesalahan saat menghapus formatif.');
                    }
                } catch (error) {
                    // Gagal menghapus formatif
                    alert('Gagal menghapus formatif, silakan coba lagi.');
                    console.error(error);
                }
            }
        }
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const selectedItemsKey = 'selectedItems';
            let selectedItems = JSON.parse(localStorage.getItem(selectedItemsKey)) || [];

            function updateLocalStorage() {
                localStorage.setItem(selectedItemsKey, JSON.stringify(selectedItems));
            }

            function updateCheckboxes() {
                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');
                const checkAllBox = document.querySelector('input[name="check"]');
                let allChecked = true;

                checkboxes.forEach(checkbox => {
                    if (selectedItems.includes(checkbox.value)) {
                        checkbox.checked = true;
                    } else {
                        allChecked = false;
                    }
                });

                checkAllBox.checked = allChecked;
            }

            function handleCheckboxChange(event) {
                const checkbox = event.target;
                const checkAllBox = document.querySelector('input[name="check"]');

                if (checkbox.checked) {
                    if (!selectedItems.includes(checkbox.value)) {
                        selectedItems.push(checkbox.value);
                    }
                } else {
                    selectedItems = selectedItems.filter(item => item !== checkbox.value);
                }

                updateLocalStorage();

                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');
                checkAllBox.checked = Array.from(checkboxes).every(cb => cb.checked);
            }

            document.querySelectorAll('input[name="user_id[]"]').forEach(checkbox => {
                checkbox.addEventListener('change', handleCheckboxChange);
            });

            document.querySelector('input[name="check"]').addEventListener('change', function(event) {
                const checkAll = event.target;
                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');

                checkboxes.forEach(checkbox => {
                    if (!checkbox.disabled) {
                        checkbox.checked = checkAll.checked;
                        if (checkAll.checked) {
                            if (!selectedItems.includes(checkbox.value)) {
                                selectedItems.push(checkbox.value);
                            }
                        } else {
                            selectedItems = selectedItems.filter(item => item !== checkbox.value);
                        }
                    }
                });

                updateLocalStorage();
            });

            // Load existing selections on page load
            updateCheckboxes();

            // Function to reset selections after a successful edit
            function resetSelections() {
                selectedItems = [];
                updateLocalStorage();
                updateCheckboxes();
            }

            // Example: Call this function after a successful data update
            function onDataUpdateSuccess() {
                resetSelections();
                // Additional actions after data update can be added here
            }

            // Simulating a data update operation
            setTimeout(() => {
                onDataUpdateSuccess(); // Trigger reset after update
            }, 1000); // Replace with your actual data update logic
        });

        function downloadSelectedFiles() {
            const selectedItems = JSON.parse(localStorage.getItem('selectedItems')) || [];
            selectedItems.forEach(item => {
                const link = document.createElement('a');
                link.href = `{{ asset('formatif/jawaban/') }}/${item}`;
                link.download = item;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        }
    </script>
    <script>
        function downloadSelectedFiles() {
            const checkboxes = document.querySelectorAll('input[name="user_id[]"]:checked');
            let selectedFiles = [];

            checkboxes.forEach(checkbox => {
                selectedFiles.push(checkbox.value);
            });

            if (selectedFiles.length === 0) {
                alert('No files selected');
                return;
            }

            // Make a POST request to the server to download the files as a zip
            fetch('/download-zip', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        selected_files: selectedFiles.join(',')
                    })
                })
                .then(response => response.blob())
                .then(blob => {
                    // Create a link element to download the zip
                    const link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'selected_files.zip';
                    link.click();
                })
                .catch(error => {
                    console.error('Error downloading files:', error);
                });
        }
    </script>
</x-app-layout>
