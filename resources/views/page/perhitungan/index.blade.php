<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Master<i class="fi fi-rr-caret-right mt-1"></i> <span
                    class="text-red-500">Perhitungan</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-5/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                FORM INPUT PERHITUNGAN
                            </div>
                            <form action="{{ route('perhitungan.store') }}" method="post">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="flex flex-col lg:flex-row gap-5">
                                        <div class="lg:mb-5 mb-0 w-full">
                                            <label for="perhitungan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">perhitungan</label>
                                            <input type="text" id="perhitungan" name="nama_perhitungan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan perhitungan disini ..." required />
                                        </div>
                                        <div class="lg:mb-5 mb-4 w-full">
                                            <label for="presensi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Presensi</label>
                                            <input type="number" id="presensi" name="presensi"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Perhitungan Presensi disini ..." required />
                                        </div>
                                    </div>
                                    <div class="flex flex-col lg:flex-row gap-5">
                                        <div class="lg:mb-5 w-full">
                                            <label for="tugas"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tugas</label>
                                            <input type="number" id="tugas" name="tugas"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Perhitungan Tugas disini ..." required />
                                        </div>
                                        <div class="lg:mb-5 mb-4 w-full">
                                            <label for="formatif"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Formatif</label>
                                            <input type="number" id="formatif" name="formatif"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan perhitungan Formatif disini ..." required />
                                        </div>
                                    </div>
                                    <div class="flex flex-col lg:flex-row gap-5">
                                        <div class="lg:mb-5 w-full">
                                            <label for="uts"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UTS</label>
                                            <input type="number" id="uts" name="uts"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan perhitungan UTS disini ..." required />
                                        </div>
                                        <div class="lg:mb-5 mb-4 w-full">
                                            <label for="uas"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UAS</label>
                                            <input type="number" id="uas" name="uas"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan perhitungan UAS disini ..." required />
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                            class="fi fi-rr-disk "></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-7/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA PERHITUNGAN
                            </div>
                            <div class="w-full flex justify-center">
                                <div class="w-full p-12" style="width:100%;overflow-x:auto;">
                                    <table class="w-full table table-bordered" id="perhitungan-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>Perhitungan</th>
                                                <th>Presensi</th>
                                                <th>Formatif</th>
                                                <th>Tugas</th>
                                                <th>UTS</th>
                                                <th>UAS</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
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
                    <h3 class="text-xl font-semibold text-gray-900 text-wrap" id="title_source">
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
                        <div>
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Perhitungan</label>
                            <input type="text" id="nama_perhitungans" name="nama_perhitungan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan perhitungan disini...">
                        </div>
                        <div>
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Presensi</label>
                            <input type="number" id="presensis" name="presensi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan perhitungan disini...">
                        </div>
                        <div>
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Formatif</label>
                            <input type="number" id="formatifs" name="formatif"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan perhitungan disini...">
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tugas</label>
                            <input type="number" id="tugass" name="tugas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan perhitungan tugas disini...">
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">UTS</label>
                            <input type="number" id="utss" name="uts"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan perhitungan uts disini...">
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">UAS</label>
                            <input type="bumber" id="uass" name="uas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan perhitungan uas disini...">
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
        $(document).ready(function() {
            console.log('RUN!');
            $('#perhitungan-datatable').DataTable({
                ajax: {
                    url: 'api/perhitungan',
                    dataSrc: 'perhitungan'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#perhitungan-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'nama_perhitungan',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'presensi',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'formatif',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'tugas',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'uts',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'uas',
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
                                                        data-modal-target="sourceModal" data-nama_perhitungan="${data.nama_perhitungan}" data-presensi="${data.presensi}" data-formatif="${data.formatif}" data-tugas="${data.tugas}" data-uts="${data.uts}" data-uas="${data.uas}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl text-xs text-white h-10 w-10">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return perhitunganDelete('${data.id}','${data.nama_perhitungan}')" class="bg-red-500 hover:bg-red-600 px-3 py-1 h-10 w-10 rounded-xl text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const nama_perhitungan = button.dataset.nama_perhitungan;
            const presensi = button.dataset.presensi;
            const formatif = button.dataset.formatif;
            const tugas = button.dataset.tugas;
            const uts = button.dataset.uts;
            const uas = button.dataset.uas;
            let url = "{{ route('perhitungan.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `UPDATE ${nama_perhitungan}`;
            document.getElementById('nama_perhitungans').value = nama_perhitungan;
            document.getElementById('presensis').value = presensi;
            document.getElementById('formatifs').value = formatif;
            document.getElementById('tugass').value = tugas;
            document.getElementById('utss').value = uts;
            document.getElementById('uass').value = uas;
            document.getElementById('formSourceButton').innerText = 'Simpan';
            document.getElementById('formSourceModal').setAttribute('action', url);
            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            status.classList.toggle('hidden');
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const perhitunganDelete = async (id, perhitungan) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus perhitungan ${perhitungan} ?`);
            if (tanya) {
                await axios.post(`/perhitungan/${id}`, {
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
