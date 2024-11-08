<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            <div class="flex items-center">Master<i class="fi fi-rr-caret-right mt-1"></i> <span
                    class="text-red-500">Konfigurasi Ujian</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-5/12 p-3 hidden">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                FORM INPUT Konfigurasi
                            </div>
                            <form action="{{ route('konfigurasi_ujian.store') }}" method="post">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <input type="hidden" name="id_tahun_akademik" id="id_tahun_akademik"
                                        value="{{ $konfigurasi->id_tahun_akademik }}">
                                    <input type="hidden" name="id_keterangan" id="id_keterangan"
                                        value="{{ $konfigurasi->id_keterangan }}">
                                    <div class="flex gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="jenis_ujian"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                Ujian
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="jenis_ujian" data-placeholder="Pilih Jenis Ujian">
                                                <option value="">Pilih...</option>
                                                <option value="UTS">UTS</option>
                                                <option value="UAS">UAS</option>
                                            </select>
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="tgl_mulai"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Mulai
                                                <span class="text-red-500">*</span></label>
                                            <input type="date" id="tgl_mulai" name="tgl_mulai"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="tgl_susulan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Susulan
                                                <span class="text-red-500">*</span></label>
                                            <input type="date" id="tgl_susulan" name="tgl_susulan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
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
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA KONFIGURASI
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;overflow-x:auto;">
                                    <table class="table table-bordered" id="konfigurasi-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>Tahun Akademik</th>
                                                <th>Keterangan</th>
                                                <th>Jenis Ujian</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Susulan</th>
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
                    <div class="flex gap-5 hidden">
                        <div class="flex flex-col p-4 space-y-6 w-full">
                            <label for="id_tahun_akademiks"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tahun Akademik
                                <span class="text-red-500">*</span></label>
                            <input type="number" id="id_tahun_akademiks" name="id_tahun_akademiks"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Masukan Tahun Akademik disini...">
                        </div>
                        <div class="flex flex-col  p-4 space-y-6 w-full">
                            <label for="id_keterangans"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Keterangan
                                <span class="text-red-500">*</span></label>
                            <input type="number" id="id_keterangans" name="id_keterangans"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Masukan Keterangan disini...">
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-5">
                        <div class="flex flex-col p-4 w-full">
                            <label for="jenis_ujians"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Jenis Ujian
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                id="jenis_ujians" name="jenis_ujians" data-placeholder="Pilih Kurikulum">
                                <option value="">Pilih...</option>
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                            </select>
                        </div>
                        <div class="flex flex-col p-4 w-full">
                            <label for="tgl_mulais"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai
                                <span class="text-red-500">*</span></label>
                            <input type="date" id="tgl_mulais" name="tgl_mulais"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Masukan Keterangan disini...">
                        </div>
                        <div class="flex flex-col p-4 w-full">
                            <label for="tgl_susulans"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tanggal Susulan
                                <span class="text-red-500">*</span></label>
                            <input type="date" id="tgl_susulans" name="tgl_susulans"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Masukan Keterangan disini...">
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
            $('#konfigurasi-datatable').DataTable({
                ajax: {
                    url: 'api/konfigurasi_ujian',
                    dataSrc: 'konfigurasi_ujian'
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
                    data: 'tahun_akademik',
                    render: (data, type, row) => {
                        return data.tahunakademik;
                    }
                }, {
                    data: 'keterangan',
                    render: (data, type, row) => {
                        return data.keterangan;
                    }
                }, {
                    data: 'jenis_ujian',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'tgl_mulai',
                    render: (data, type, row) => {
                        if (data) {
                            const date = new Date(data);
                            const day = String(date.getDate()).padStart(2, '0');
                            const month = String(date.getMonth() + 1).padStart(2,
                                '0'); // Bulan dimulai dari 0, jadi tambahkan 1
                            const year = date.getFullYear();

                            return `${day}-${month}-${year}`;
                        }
                        return '';
                    }
                },{
                    data: 'tgl_susulan',
                    render: (data, type, row) => {
                        if (data) {
                            const date = new Date(data);
                            const day = String(date.getDate()).padStart(2, '0');
                            const month = String(date.getMonth() + 1).padStart(2,
                                '0'); // Bulan dimulai dari 0, jadi tambahkan 1
                            const year = date.getFullYear();

                            return `${day}-${month}-${year}`;
                        }
                        return '';
                    }
                }, {
                    data: {
                        no: 'no',
                        name: 'name'
                    },
                    render: (data) => {
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-id_tahun_akademiks="${data.id_tahun_akademik}" " data-id_keterangans="${data.id_keterangan}" data-jenis_ujians="${data.jenis_ujian}" data-tgl_mulais="${data.tgl_mulai}" data-tgl_susulans="${data.tgl_susulan}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        return `<div style="text-align:center">${editUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const id_tahun_akademiks = button.dataset.id_tahun_akademiks;
            const id_keterangans = button.dataset.id_keterangans;
            const jenis_ujians = button.dataset.jenis_ujians;
            const tgl_mulais = button.dataset.tgl_mulais;
            const tgl_susulans = button.dataset.tgl_susulans;
            let url = "{{ route('konfigurasi_ujian.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `UPDATE KONFIGURASI UJIAN`;

            document.getElementById('tgl_mulais').value = tgl_mulais;
            document.getElementById('tgl_susulans').value = tgl_susulans;
            document.getElementById('id_keterangans').value = id_keterangans;
            document.getElementById('id_tahun_akademiks').value = id_tahun_akademiks;

            document.querySelector('[name="jenis_ujians"]').value = jenis_ujians;
            let event = new Event('change');
            document.querySelector('[name="jenis_ujians"]').dispatchEvent(event);

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
    </script>
</x-app-layout>
