<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            <div class="flex items-center">Ujian<i class="fi fi-rr-caret-right mt-1"></i> <span
                    class="text-red-500">UAS</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>DATA UAS</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="lg:p-6 p-4" style="width:100%;overflow-x:auto;">
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">

                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            PENGAJAR
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            TANGGAL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            HARI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center ">
                                                        <div class="flex items-center">
                                                            PUKUL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            SEMESTER
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center ">
                                                        <div class="flex items-center">
                                                            RUANG
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            KELAS
                                                        </div>
                                                    </th>
                                                    {{-- <th scope="col" class="px-6 py-3 text-center ">
                                                        <div class="flex items-center">
                                                            JURUSAN
                                                        </div>
                                                    </th> --}}
                                                    <th scope="col" class="px-6 py-3 text-center ">
                                                        <div class="flex items-center">
                                                            SOAL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            VERIFIKASI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center ">
                                                        <div class="flex items-center">

                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($jadwal as $m)
                                                    @php
                                                        $uasItem = $uas->where('id_jadwal', $m->id_jadwal)->first();
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
                                                    @endphp
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->dosen->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4 ">
                                                            @if ($uasItem)
                                                                {{ date('d-m-Y', strtotime($uasItem->tgl_ujian)) }}
                                                            @else
                                                                <span>Belum ditentukan</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            @if ($uasItem)
                                                                {{ $hari }}
                                                            @else
                                                                {{ $m->hari->hari }}
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @if ($uasItem)
                                                                {{ $uasItem->waktu_ujian }}
                                                            @else
                                                                {{ $m->sesi->pukul->pukul }}
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->detail_kurikulum->materi_ajar->semester->semester }}
                                                        </td>
                                                        <td class="px-6 py-4 ">
                                                            {{ $m->ruang->ruang }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->kelas->kelas }}
                                                        </td>
                                                        {{-- <td class="px-6 py-4 ">
                                                            {{ $m->kelas->jurusan->jurusan }}
                                                        </td> --}}
                                                        <td class="px-6 py-4">
                                                            @if ($uasItem)
                                                                <a href="{{ asset('uas/' . $uasItem->file) }}" download
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                            @else
                                                                BELUM UPLOAD SOAL
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            @if ($uasItem)
                                                                @if ($uasItem->verifikasi == 0)
                                                                    <button type="button"
                                                                        data-id="{{ $uasItem->id }}"
                                                                        data-modal-target="sourceModal"
                                                                        data-verifikasi="{{ $uasItem->verifikasi }}"
                                                                        onclick="editSourceModal(this)"
                                                                        class="bg-amber-500 hover:bg-amber-600 px-4 py-1 rounded-xl text-xs text-white">
                                                                        BELUM VERIFIKASI
                                                                    </button>
                                                                @else
                                                                    <div
                                                                        class="bg-green-500 hover:bg-green-600 px-4 py-1 rounded-xl text-xs text-white">
                                                                        SUDAH</div>
                                                                @endif
                                                            @else
                                                                <div
                                                                    class="bg-red-500 hover:bg-red-600 px-4 py-1 rounded-xl text-xs text-white">
                                                                    BELUM UPLOAD SOAL</div>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @if ($uasItem)
                                                                <a href="{{ route('ujian_uas.edit', $uasItem->id) }}"
                                                                    class="mr-1 bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fa-solid fa-file"></i>
                                                                </a>
                                                                <button type="button" data-id="{{ $uasItem->id }}"
                                                                    data-modal-target="sourceModalUpload"
                                                                    data-id_uas="{{ $uasItem->id_uas }}"
                                                                    onclick="editSourceModalUpload(this)"
                                                                    class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                <a href="{{ route('uas.edit', $uasItem->id_uas) }}"
                                                                    class="mr-2 bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fa-solid fa-list"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('uas.show', $m->id_jadwal) }}"
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
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
                                        {{-- {{ $jadwal->links() }} --}}
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
    </script>
</x-app-layout>
