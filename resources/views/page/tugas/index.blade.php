<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center items-start">
                <div class="w-full md:w-full p-3">
                    <form action="{{ route('tugass.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col lg:flex-row gap-5 items-start ">
                            @can('role-A')
                                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100 overflow-hidden">
                                        <div
                                            class="bg-sky-200 lg:p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px]">
                                            DATA JADWAL
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex flex-col lg:flex-row gap-5 mb-5">
                                                <div class="w-full">
                                                    <label for="id_presensi"
                                                        class="block text-sm font-medium text-gray-700">Kode
                                                        Presensi</label>
                                                    <input type="text" id="id_presensi" name="id_presensi"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Masukkan Id Presensi disini"
                                                        value="{{ $presensi->id_presensi }}" readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Materi
                                                        Ajar</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}"
                                                        readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">SKS /
                                                        Semester</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->sks }} / {{ $presensi->jadwal->detail_kurikulum->materi_ajar->semester->semester }}"
                                                        readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Pertemuan</label>
                                                    <input type="text" id="name" name=""
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name" value="{{ $presensi->pertemuan }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="flex flex-col lg:flex-row gap-5 mb-5">
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Kelas</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->kelas->kelas }}" readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Jurusan</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->kelas->jurusan->jurusan }}" readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Tahun
                                                        Akademik</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->tahun_akademik->tahunakademik }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="flex flex-col lg:flex-row gap-5">
                                                <div class="w-full">
                                                    <label for="tugas"
                                                        class="block text-sm font-medium text-gray-700">Tugas</label>
                                                    <input type="text" id="tugas" name="tugas"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Masukkan Judul Tugas disini">
                                                </div>
                                                <div class="w-full">
                                                    <label for="deadline"
                                                        class="block text-sm font-medium text-gray-700">Deadline</label>
                                                    <input type="datetime-local" id="deadline" name="deadline"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name">
                                                </div>
                                                <div class="w-full">
                                                    <label for="file"
                                                        class="block text-sm font-medium text-gray-700">File Tugas</label>
                                                    <input type="file" id="file" name="file"
                                                        class="w-full border-0 mt-3 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <button type="submit" class="mt-5">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            @can('role-D')
                                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100 overflow-hidden">
                                        <div
                                            class="bg-sky-200 lg:p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px]">
                                            DATA JADWAL
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex flex-col lg:flex-row gap-5 mb-5">
                                                <div class="w-full">
                                                    <label for="id_presensi"
                                                        class="block text-sm font-medium text-gray-700">Kode
                                                        Presensi</label>
                                                    <input type="text" id="id_presensi" name="id_presensi"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Masukkan Id Presensi disini"
                                                        value="{{ $presensi->id_presensi }}" readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Materi
                                                        Ajar</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}"
                                                        readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">SKS /
                                                        Semester</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->sks }} / {{ $presensi->jadwal->detail_kurikulum->materi_ajar->semester->semester }}"
                                                        readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Pertemuan</label>
                                                    <input type="text" id="name" name=""
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name" value="{{ $presensi->pertemuan }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="flex gap-5 mb-5">
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Kelas</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->kelas->kelas }}" readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Jurusan</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->kelas->jurusan->jurusan }}" readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Tahun
                                                        Akademik</label>
                                                    <input type="text" id="name"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name"
                                                        value="{{ $presensi->jadwal->tahun_akademik->tahunakademik }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="flex gap-5">
                                                <div class="w-full">
                                                    <label for="tugas"
                                                        class="block text-sm font-medium text-gray-700">Tugas</label>
                                                    <input type="text" id="tugas" name="tugas"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Masukkan Judul Tugas disini">
                                                </div>
                                                <div class="w-full">
                                                    <label for="deadline"
                                                        class="block text-sm font-medium text-gray-700">Deadline</label>
                                                    <input type="datetime-local" id="deadline" name="deadline"
                                                        class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name">
                                                </div>
                                                <div class="w-full">
                                                    <label for="file"
                                                        class="block text-sm font-medium text-gray-700">File Tugas</label>
                                                    <input type="file" id="file" name="file"
                                                        class="w-full border-0 mt-3 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                        placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <button type="submit" class="mt-5">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div
                                        class="bg-sky-200 lg:p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px]">
                                        TUGAS
                                    </div>
                                    <div class="mt-10 mb-8 relative overflow-x-auto rounded-lg shadow-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        DEADLINE
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            TUGAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            ACTIONS
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($tugas as $t)
                                                    @php
                                                        $jawaban = $detail_tugas
                                                            ->where('id_tugas', $t->id_tugas)
                                                            ->where('nim', Auth::user()->email)
                                                            ->first();
                                                    @endphp
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ date('d-m-Y H:i', strtotime($t->id_tugas)) }}
                                                        </th>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                            <a href="{{ asset('tugas/' . $t->file_tugas) }}"
                                                                class="bg-sky-500 hover:bg-bg-red-300 px-4 py-3 rounded-xl text-xs text-white"
                                                                download>
                                                                <i class="fi fi-sr-file-download"></i>
                                                            </a>
                                                        </th>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                                            @can('role-A')
                                                                <a href="{{ route('tugass.edit', $t->id_tugas) }}"
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fi fi-sr-member-list"></i>
                                                                </a>
                                                                <button
                                                                    onclick="return tugasDelete('{{ $t->id_tugas }}','{{ $t->file_tugas }}')"
                                                                    class="bg-red-500 hover:bg-red-300 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <button type="button" data-id="{{ $t->id }}"
                                                                    data-modal-target="sourceModal"
                                                                    data-id_tugas="{{ $t->id_tugas }}"
                                                                    onclick="editSourceModal(this)"
                                                                    class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            @endcan
                                                            @can('role-D')
                                                                <a href="{{ route('tugass.edit', $t->id_tugas) }}"
                                                                    class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fi fi-sr-member-list"></i>
                                                                </a>
                                                                <button
                                                                    onclick="return tugasDelete('{{ $t->id_tugas }}','{{ $t->file_tugas }}')"
                                                                    class="bg-red-500 hover:bg-red-300 px-4 py-3 rounded-xl text-xs text-white">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            @endcan
                                                            @can('role-M')
                                                                @if ($jawaban)
                                                                    <a href="{{ asset('tugas/jawaban/' . $t->id_tugas . '-' . Auth::user()->email . '.pdf') }}"
                                                                        download
                                                                        class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                        <i class="fa-solid fa-file"></i>
                                                                    </a>
                                                                @else
                                                                    <button type="button" data-id="{{ $t->id }}"
                                                                        data-modal-target="sourceModal"
                                                                        data-id_tugas="{{ $t->id_tugas }}"
                                                                        onclick="editSourceModal(this)"
                                                                        class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                @endif
                                                            @endcan
                                                        </th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="hidden">
                            <label for="id_tugas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Tugas</label>
                            <input type="text" id="id_tugass" name="id_tugas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Id_Tugas disini ..." required />
                        </div>
                        <div class="">
                            <label for="nim"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                            <input type="text" id="nims" name="nim"
                                value="{{ Auth::user()->email ?? 0 }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan NIM disini ..."
                                @if (Auth::user()->role == 'M') readonly @endif />
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
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        const tugasDelete = async (id, file_tugas) => {
            let tanya = confirm(`Apakah Anda yakin untuk menghapus Formatif ${id}?`);
            if (tanya) {
                try {
                    const response = await axios.post(`/tugass/${id}`, {
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

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id_tugas = button.dataset.id_tugas;
            // const file = button.dataset.file;

            let url = "{{ route('tugass.tugas_add') }}";

            // Update form fields
            document.getElementById('title_source').innerText = `Upload Tugas `;
            document.getElementById('id_tugass').value = id_tugas;
            // document.getElementById('files').value = file;
            document.getElementById('formSourceButton').innerText = 'Simpan';

            // Set form action URL
            formModal.setAttribute('action', url);

            // Show the modal
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        };

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
