<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Master<i class="fi fi-rr-caret-right mt-1"></i> <span class="text-red-500">Konfigurasi</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-5/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                FORM INPUT KONFIGURASI
                            </div>
                            <form action="{{ route('konfigurasi.store') }}" method="post">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="flex flex-col lg:flex-row gap-5">
                                        <div class="lg:mb-5 mb-0 w-full">
                                            <label for="tahun_akademik"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                                Akademik
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="tahun_akademik" data-placeholder="Pilih Tahun Akademik">
                                                <option value="">Pilih...</option>
                                                @foreach ($tahun_akademik as $ta)
                                                    <option value="{{ $ta->id }}">{{ $ta->tahunakademik }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="lg:mb-5 mb-4 w-full">
                                            <label for="keterangan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="keterangan" data-placeholder="Pilih Keterangan">
                                                <option value="">Pilih...</option>
                                                @foreach ($keterangan as $k)
                                                    <option value="{{ $k->id }}">{{ $k->keterangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex-col lg:flex-row gap-5">
                                        <div class="lg:mb-5 mb-0 w-full">
                                            <label for="kurikulum"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kurikulum
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="kurikulum" data-placeholder="Pilih Kurikulum">
                                                <option value="">Pilih...</option>
                                                @foreach ($kurikulum as $k)
                                                    <option value="{{ $k->id }}">{{ $k->kurikulum }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="lg:mb-5 mb-4 w-full">
                                            <label for="perhitungan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perhitungan
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="perhitungan" data-placeholder="Pilih Perhitungan">
                                                <option value="">Pilih...</option>
                                                @foreach ($perhitungan as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_perhitungan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Pertemuan</label>
                                        <input type="number" id="jml_pertemuan" name="jml_pertemuan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                            id="" placeholder="Masukan Jumlah Pertemuan disini...">
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fi fi-rr-disk "></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-7/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA KONFIGURASI
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;overflow-x:auto;">
                                    <table class="table table-bordered" id="konfigurasi-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>Tahun Akademik</th>
                                                <th>Kurikulum</th>
                                                <th>Keterangan</th>
                                                <th>Perhitungan</th>
                                                <th>Pertemuan</th>
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
                    <div class="flex flex-col lg:flex-row gap-1">
                        <div class="flex flex-col p-4 w-full">
                            <label for="id_tahun_akademiks"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tahun Akademik
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                id="id_tahun_akademiks" name="id_tahun_akademiks" data-placeholder="Pilih Tahun Akademik">
                                <option value="">Pilih...</option>
                                @foreach ($tahun_akademik as $p)
                                    <option value="{{ $p->id }}">{{ $p->tahunakademik }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-4 w-full">
                            <label for="id_keterangans"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Keterangan
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                id="id_keterangans" name="id_keterangans" data-placeholder="Pilih Keterangan">
                                <option value="">Pilih...</option>
                                @foreach ($keterangan as $p)
                                    <option value="{{ $p->id }}">{{ $p->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-1">
                        <div class="flex flex-col p-4 w-full">
                            <label for="id_kurikulums"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Kurikulum
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                id="id_kurikulums" name="id_kurikulums" data-placeholder="Pilih Kurikulum">
                                <option value="">Pilih...</option>
                                @foreach ($kurikulum as $p)
                                    <option value="{{ $p->id }}">{{ $p->kurikulum }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col p-4 w-full">
                            <label for="id_perhitungans"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Perhitungan
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                id="id_perhitungans" name="id_perhitungans" data-placeholder="Pilih Perhitungan">
                                <option value="">Pilih...</option>
                                @foreach ($perhitungan as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_perhitungan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="fex gap-5">
                        <div class="flex flex-col  p-4 w-full">
                            <label for="text" class="block text-sm font-medium text-gray-900 dark:text-white">Jumlah Pertemuan</label>
                            <input type="number" id="jml_pertemuans" name="jml_pertemuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                id="" placeholder="Masukan Jumlah Pertemuan disini...">
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
            $('#konfigurasi-datatable').DataTable({
                ajax: {
                    url: 'api/konfigurasi',
                    dataSrc: 'konfigurasi'
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
                    data: 'kurikulum',
                    render: (data, type, row) => {
                        return data.kurikulum;
                    }
                }, {
                    data: 'keterangan',
                    render: (data, type, row) => {
                        return data.keterangan;
                    }
                }, {
                    data: 'perhitungan',
                    render: (data, type, row) => {
                        return data.nama_perhitungan;
                    }
                },{
                    data: 'jml_pertemuan',
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
                            `<button type="button" data-id="${data.id}" data-jml_pertemuans="${data.jml_pertemuan}"
                                                        data-modal-target="sourceModal" data-id_tahun_akademiks="${data.id_tahun_akademik}" data-id_kurikulums="${data.id_kurikulum}" data-id_keterangans="${data.id_keterangan}" data-id_perhitungans="${data.id_perhitungan}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl text-xs text-white h-10 w-10">
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
            const id_kurikulums = button.dataset.id_kurikulums;
            const id_tahun_akademiks = button.dataset.id_tahun_akademiks;
            const id_keterangans = button.dataset.id_keterangans;
            const id_perhitungans = button.dataset.id_perhitungans;
            const jml_pertemuans = button.dataset.jml_pertemuans;
            let url = "{{ route('konfigurasi.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `UPDATE KONFIGURASI`;

            document.querySelector('[name="id_tahun_akademiks"]').value = id_tahun_akademiks;
            let event = new Event('change');
            document.querySelector('[name="id_tahun_akademiks"]').dispatchEvent(event);

            document.getElementById('jml_pertemuans').value = jml_pertemuans;

            document.querySelector('[name="id_keterangans"]').value = id_keterangans;
            document.querySelector('[name="id_keterangans"]').dispatchEvent(event);

            document.querySelector('[name="id_kurikulums"]').value = id_kurikulums;
            document.querySelector('[name="id_kurikulums"]').dispatchEvent(event);

            document.querySelector('[name="id_perhitungans"]').value = id_perhitungans;
            document.querySelector('[name="id_perhitungans"]').dispatchEvent(event);

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
