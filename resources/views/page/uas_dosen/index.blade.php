<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('UAS') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="">
                                <div class="flex flex-col lg:flex-row items-center justify-between">
                                    <div class="flex">
                                        <div class="w-10">
                                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA UAS
                                        </div>
                                    </div>
                                </div>
                                <hr class="border mt-2 border-black border-opacity-30">
                            </div>
                            <div class="flex justify-center">
                                <div class="lg:p-6 pt-4" style="width:100%;overflow-x:auto;">
                                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                            <!-- Form untuk entries -->
                                            <x-show-entries :route="route('ujian_uas.ujian_uas_dosen', Auth::user()->email)" :search="request()->search">
                                            </x-show-entries>
                                        </div>

                                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                            <form action="{{ route('ujian_uas.ujian_uas_dosen', Auth::user()->email) }}" method="GET"
                                                class="flex items-center flex-1">
                                                <input type="text" name="search"
                                                    placeholder="Enter for search . . . " id="search"
                                                    value="{{ request('search') }}"
                                                    class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                                    oninput="this.value = this.value.toUpperCase();" />

                                                <input type="hidden" name="entries"
                                                    value="{{ request('entries', 10) }}">
                                                <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                        @php
                                            $hideShow = '';
                                            $hideShowHer = '';
                                            // HIDDEN/SHOW COLUMN QUESTION (SOAL UTAMA)
                                            $dateNow = date('Y-m-d');
                                            if ($dateNow < $tgl_ujian_susulan) {
                                                $hideShow = '';
                                                $hideShowHer = 'hidden';
                                            } else {
                                                $hideShow = '';
                                                $hideShowHer = 'hidden';
                                            }
                                        @endphp
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI AJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        PENGAJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center"
                                                        {{ $hideShow }}>
                                                        TANGGAL UTAMA
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center"
                                                        {{ $hideShowHer }}>
                                                        TANGGAL SUSULAN
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        HARI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        PUKUL
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        SEMESTER
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        RUANG
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        KELAS
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center"
                                                        {{ $hideShow }}>
                                                        SOAL UTAMA
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center"
                                                        {{ $hideShowHer }}>
                                                        SOAL CADANGAN
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        VERIFIKASI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        AKSI
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="jadwalRegulerTable">
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($jadwal as $key => $j)
                                                    @php
                                                        $uasItem = $uas->where('id_jadwal', $j->kode_jadwal)->first();
                                                        $hari = '';

                                                        if ($uasItem) {
                                                            $day = date('l', strtotime($uasItem->tgl_ujian));

                                                            switch ($day) {
                                                                case 'Monday':
                                                                    $hari = 'SENIN';
                                                                    break;
                                                                case 'Tuesday':
                                                                    $hari = 'SELASA';
                                                                    break;
                                                                case 'Wednesday':
                                                                    $hari = 'RABU';
                                                                    break;
                                                                case 'Thursday':
                                                                    $hari = 'KAMIS';
                                                                    break;
                                                                case 'Friday':
                                                                    $hari = 'JUMAT';
                                                                    break;
                                                                case 'Saturday':
                                                                    $hari = 'SABTU';
                                                                    break;
                                                                case 'Sunday':
                                                                    $hari = 'MINGGU';
                                                                    break;
                                                                default:
                                                                    $hari = '';
                                                                    break;
                                                            }
                                                        }

                                                        if ($j->sesi2 == null) {
                                                            $sesi = $j->sesi1;
                                                            $pukul = $j->pukul1;
                                                        } else {
                                                            $sesi = $j->sesi1 . ' - ' . $j->sesi2;
                                                            $pukul =
                                                                explode('-', $j->pukul1)[0] .
                                                                ' - ' .
                                                                explode('-', $j->pukul2)[1];
                                                        }

                                                    @endphp
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $jadwal->perPage() * ($jadwal->currentPage() - 1) + $key + 1 }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $j->materi_ajar }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $j->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center" {{ $hideShow }}>
                                                            @if ($uasItem)
                                                                {{ date('d-m-Y', strtotime($uasItem->tgl_ujian)) }}
                                                            @else
                                                                <span
                                                                    class="border border-red-500 bg-red-100 text-red-500 px-6 rounded-xl">BELUM</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100 text-center"
                                                            {{ $hideShowHer }}>
                                                            @if ($uasItem)
                                                                {{ date('d-m-Y', strtotime($uasItem->tgl_ujian_susulan)) }}
                                                            @else
                                                                <span>Belum ditentukan</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $j->hari }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            @if ($uasItem)
                                                                {{ $uasItem->waktu_ujian }}
                                                            @else
                                                                {{ $pukul }}
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $j->semester }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $j->ruang }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $j->kelas }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center" {{ $hideShow }}>
                                                            @if ($uasItem)
                                                                <a href="{{ asset('uas/' . $uasItem->file) }}" download
                                                                    class="mr-2 bg-green-50 border border-green-500 text-green-500 hover:bg-green-100 px-4 py-1 rounded-xl text-xs">
                                                                    <i class="fa-solid fa-download"></i> Download
                                                                </a>
                                                            @else
                                                                <span
                                                                    class="border border-red-500 bg-red-100 text-red-500 px-6 rounded-xl">BELUM</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-center" {{ $hideShowHer }}>
                                                            @if ($uasItem)
                                                                <a href="{{ asset('uas/cadangan/' . $uasItem->file_cadangan) }}"
                                                                    download
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                            @else
                                                                <span
                                                                    class="border border-red-500 bg-red-100 text-red-500 px-6 rounded-xl">BELUM</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-right bg-gray-100">
                                                            @if ($uasItem)
                                                                @if ($uasItem->verifikasi == 0)
                                                                    <button type="button"
                                                                        data-id="{{ $uasItem->id }}"
                                                                        data-modal-target="sourceModal"
                                                                        data-verifikasi="{{ $uasItem->verifikasi }}"
                                                                        onclick="editSourceModal(this)"
                                                                        class="border border-red-500 bg-red-100 text-red-500 px-6 rounded-xl">
                                                                        BELUM
                                                                    </button>
                                                                @else
                                                                    <span
                                                                        class="border border-emerald-500 bg-emerald-100 text-emerald-500 px-6 rounded-xl">SUDAH</span>
                                                                @endif
                                                            @else
                                                                <span
                                                                    class="border border-red-500 bg-red-100 text-red-500 px-6 rounded-xl">BELUM</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-right">
                                                            @if ($uasItem)
                                                                {{-- <button type="button" data-id="{{ $uasItem->id }}"
                                                                data-modal-target="sourceModalUpload"
                                                                data-id_uas="{{ $uasItem->id_uas }}"
                                                                onclick="editSourceModalUpload(this)"
                                                                class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                <i class="fas fa-edit"></i>
                                                            </button> --}}

                                                                <div class="relative inline-block text-left">
                                                                    <button onclick="toggleDropdown(this)"
                                                                        class="mr-2 border border-amber-500 hover:bg-amber-100 px-4 py-[14px] rounded-xl text-amber-500 flex items-center">
                                                                        <i class="fa-solid fa-list"></i>
                                                                    </button>

                                                                    <!-- Dropdown Menu -->
                                                                    <div
                                                                        class="hidden fixed left-0 top-0 w-44 -ml-32 bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg z-50">
                                                                        <a href="{{ route('ujian_uas.edit', $uasItem->id) }}"
                                                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                            <i class="fa-solid fa-edit"></i> Edit
                                                                        </a>
                                                                        <a href="{{ route('uas.edit', $uasItem->id_uas) }}"
                                                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                            <i class="fa-solid fa-eye"></i> Jawaban
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <a href="{{ route('uas.show', $j->kode_jadwal) }}"
                                                                    class="mr-2 border border-green-500 hover:bg-green-100 px-4 py-3 rounded-xl  text-green-500">
                                                                    <i class="fa-solid fa-file"></i>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        @if ($jadwal->hasPages())
                                            {{ $jadwal->appends(request()->query())->links('vendor.pagination.custom') }}
                                        @else
                                            <div class="flex items-center justify-between">
                                                <nav class="flex justify-start">
                                                    <div class="text-sm flex gap-1">
                                                        <div>Showing</div>
                                                        <div class="font-bold">1</div>
                                                        <div>to</div>
                                                        <div class="font-bold">{{ count($jadwal) }}</div>
                                                        <div>of</div>
                                                        <div class="font-bold">{{ count($jadwal) }}</div>
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

    {{-- VERIFIKASI --}}
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
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">

                        <div>Apakah yakin untuk verifikasi soal ini?</div>
                        <div hidden>
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Verifikasi</label>
                            <input type="number" id="verifikasi" name="verifikasi"
                                class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer hover:shadow-lg"
                                placeholder="Masukan verifikasi disini..." value="1">
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

    {{-- UPLOAD JAWABAN --}}
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModalUpload">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source_upload">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModalUpload"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModalUpload" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="">
                            <label for="id_uas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Tugas</label>
                            <input type="text" id="id_uass" name="id_uas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan id_uas disini ..." required />
                        </div>
                        <div class="">
                            <label for="nim"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                            <input type="text" id="nims" name="nim"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan NIM disini ..." />
                        </div>
                        <div class="mb-5">
                            <label for="files"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                            <input type="file" id="files" name="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Upload file formatif di sini ..." />
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

    <script>
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const url = "{{ route('uas.update', ':id') }}".replace(':id', id);
            const status = document.getElementById(modalTarget);

            document.getElementById('title_source').innerText = 'Verifikasi';
            document.getElementById('formSourceButton').innerText = 'Simpan';

            formModal.setAttribute('action', url);

            if (!formModal.querySelector('input[name="_method"]')) {
                const methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'PATCH');
                formModal.appendChild(methodInput);
            }

            status.classList.toggle('hidden');
        }


        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const editSourceModalUpload = (button) => {
            const formModal = document.getElementById('formSourceModalUpload');
            const modalTarget = button.dataset.modalTarget;
            const id_uas = button.dataset.id_uas;
            // const file = button.dataset.file;

            let url = "{{ route('uas.jawaban_uas_add') }}";

            // Update form fields
            document.getElementById('title_source_upload').innerText = `Upload Jawaban uas`;
            document.getElementById('id_uass').value = id_uas;
            // document.getElementById('files').value = file;
            document.getElementById('formSourceButton').innerText = 'Simpan';

            // Set form action URL
            formModal.setAttribute('action', url);

            // Show the modal
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        };

        function toggleDropdown(button) {
            let dropdown = button.nextElementSibling;

            // Tutup semua dropdown sebelum membuka yang baru
            document.querySelectorAll(".absolute").forEach(el => {
                if (el !== dropdown) el.classList.add("hidden");
            });

            // Tampilkan dropdown yang diklik
            dropdown.classList.toggle("hidden");
        }
    </script>
    <script>
        function toggleDropdown(button) {
            let dropdown = button.nextElementSibling;
            let rect = button.getBoundingClientRect();

            if (dropdown.classList.contains("hidden")) {
                dropdown.style.left = rect.left + "px";
                dropdown.style.top = rect.bottom + "px";
                dropdown.classList.remove("hidden");
            } else {
                dropdown.classList.add("hidden");
            }
        }
    </script>
</x-app-layout>
