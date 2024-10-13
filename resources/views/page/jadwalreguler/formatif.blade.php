<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Formatif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                @can('role-A')
                    <div class="w-full md:w-3/12 p-3">
                        <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div
                                    class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                    FORM INPUT FORMATIF
                                </div>
                                <form action="{{ route('jadwal_reguler.formatif_add') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-4 rounded-xl">
                                        <div class="mb-5">
                                            <label for="formatif"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                                Formatif</label>
                                            <input type="text" id="judul_formatif" name="judul_formatif"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan formatif disini ..." required />
                                        </div>
                                        <div class="mb-5">
                                            <label for="deadline"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline</label>
                                            <input type="datetime-local" id="deadline" name="deadline"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Deadline formatif disini ..." required />
                                        </div>
                                        @foreach ($presensi as $p)
                                        @endforeach
                                        <div class="mb-5" hidden>
                                            <label for="deadline"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id_Jadwal</label>
                                            <input type="text" id="id_jadwal" name="id_jadwal"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Deadline formatif disini ..."
                                                value="{{ $p->id_jadwal }}" readonly />
                                        </div>
                                        <div class="mb-5">
                                            <label for="deadline"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File
                                                Formatif</label>
                                            <input type="file" id="file" name="file"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Deadline formatif disini ..." required />
                                        </div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                class="fi fi-rr-disk "></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan
                @can('role-D')
                    <div class="w-full md:w-3/12 p-3">
                        <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div
                                    class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                    FORM INPUT formatif
                                </div>
                                <form action="{{ route('jadwal_reguler.formatif_add') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-4 rounded-xl">
                                        <div class="mb-5">
                                            <label for="formatif"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                                Formatif</label>
                                            <input type="text" id="judul_formatif" name="judul_formatif"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan formatif disini ..." required />
                                        </div>
                                        <div class="mb-5">
                                            <label for="deadline"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline</label>
                                            <input type="datetime-local" id="deadline" name="deadline"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Deadline formatif disini ..." required />
                                        </div>
                                        @foreach ($presensi as $p)
                                        @endforeach
                                        <div class="mb-5" hidden>
                                            <label for="deadline"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id_Jadwal</label>
                                            <input type="text" id="id_jadwal" name="id_jadwal"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Deadline formatif disini ..."
                                                value="{{ $p->id_jadwal }}" readonly />
                                        </div>
                                        <div class="mb-5">
                                            <label for="deadline"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File
                                                Formatif</label>
                                            <input type="file" id="file" name="file"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Deadline formatif disini ..." required />
                                        </div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA FORMATIF
                            </div>
                            <div class="flex justify-center w-full">
                                <div class="relative overflow-x-auto rounded-lg shadow-lg mt-6 w-full">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border shadow-lg">
                                        <thead
                                            class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    NO
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    MATERI FORMATIF
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    <div class="flex items-center">
                                                        DEADLINE
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    <div class="flex items-center">
                                                        FILE
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    <div class="flex items-center">

                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($formatif as $j)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 text-center bg-gray-100">
                                                        {{ $no++ }}
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $j->judul_formatif }}
                                                    </th>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        {{ date('d-m-Y H:i', strtotime($j->deadline)) }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{ route('jadwal_reguler.formatif_show', $j->id) }}"
                                                            class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                            <i class="fa-solid fa-book"></i>
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        <a href="{{ route('jadwal_reguler.formatif_answer', $j->id_formatif) }}"
                                                            class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                            <i class="fi fi-sr-member-list"></i>
                                                        </a>
                                                        @can('role-A')
                                                            <button type="button" data-id="{{ $j->id }}"
                                                                data-modal-target="sourceModal"
                                                                data-judul_formatif="{{ $j->judul_formatif }}"
                                                                data-deadline="{{ $j->deadline }}"
                                                                data-formatif="{{ $j->formatif }}"
                                                                onclick="editSourceModal(this)"
                                                                class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button
                                                                onclick="return formatifDelete('{{ $j->id }}','{{ $j->judul_formatif }}','{{ $j->formatif }}')"
                                                                class="bg-red-500 hover:bg-bg-red-300 px-4 py-3 rounded-xl text-xs text-white"><i
                                                                    class="fas fa-trash"></i></button>
                                                        @endcan
                                                        @can('role-D')
                                                            <button type="button" data-id="{{ $j->id }}"
                                                                data-modal-target="sourceModal"
                                                                data-judul_formatif="{{ $j->judul_formatif }}"
                                                                data-deadline="{{ $j->deadline }}"
                                                                data-formatif="{{ $j->formatif }}"
                                                                onclick="editSourceModal(this)"
                                                                class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button
                                                                onclick="return formatifDelete('{{ $j->id }}','{{ $j->judul_formatif }}','{{ $j->formatif }}')"
                                                                class="bg-red-500 hover:bg-bg-red-300 px-4 py-3 rounded-xl text-xs text-white"><i
                                                                    class="fas fa-trash"></i></button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                    @method('PATCH')
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="">
                            <label for="formatif"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                Formatif</label>
                            <input type="text" id="judul_formatifs" name="judul_formatif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan formatif disini ..." required />
                        </div>
                        <div class="mb-5">
                            <label for="deadline"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline</label>
                            <input type="datetime-local" id="deadlines" name="deadline"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Deadline formatif disini ..." required />
                        </div>
                        <div>
                            <label for="formatifs"
                                class="block mb-2 text-sm font-medium text-gray-900">Formatif</label>
                            <input type="text" id="formatifs" name="formatif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan formatif disini...">
                        </div>
                        <div class="mb-5">
                            <label for="files"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File
                                Formatif</label>
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
        $(document).ready(function() {
            console.log('RUN!');
            $('#formatif-datatable').DataTable({
                ajax: {
                    url: 'api/formatif',
                    dataSrc: 'formatif'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#formatif-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'formatif',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: {
                        no: 'no',
                        name: 'name'
                    },
                    render: (data) => {
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-formatif="${data.formatif}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return formatifDelete('${data.id}','${data.formatif}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const formatif = button.dataset.formatif;
            const judul_formatif = button.dataset.judul_formatif;
            const deadline = button.dataset.deadline;

            let url = "{{ route('jadwal_reguler.formatif_update', ':id') }}".replace(':id', id);

            // Update form fields
            document.getElementById('title_source').innerText = `Update formatif ${formatif}`;
            document.getElementById('judul_formatifs').value = judul_formatif;
            document.getElementById('deadlines').value = deadline;
            document.getElementById('formatifs').value = formatif;
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

        const formatifDelete = async (id, judul_formatif, formatif) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus formatif ${judul_formatif} ?`);
            if (tanya) {
                await axios.post(`/formatif_destroy/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>
