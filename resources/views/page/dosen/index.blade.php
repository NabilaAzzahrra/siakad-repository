<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Master<i class="fi fi-rr-caret-right mt-1"></i> <span class="text-red-500">Dosen</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-3/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                FORM INPUT DOSEN
                            </div>
                            <form action="{{ route('dosen.store') }}" method="post">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="mb-5">
                                        <label for="nama_dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Dosen</label>
                                        <input type="text" id="nama_dosen" name="nama_dosen"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Nama Dosen disini ..." required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="email_dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                            Dosen</label>
                                        <input type="email" id="email_dosen" name="email_dosen"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Email Dosen disini ..." required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="no_hp_dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP
                                            Dosen</label>
                                        <input type="number" id="no_hp_dosen" name="no_hp_dosen"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan No HP Dosen disini ..." required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                            Dosen</label>
                                        <input type="password" id="password" name="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Password Dosen disini ..." required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="tgl_lahir"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" name="tgl_lahir"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Password Dosen disini ..." required />
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fi fi-rr-disk "></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA DOSEN
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;overflow-x:auto;">
                                    <table class="table table-bordered" id="dosen-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>Kode Dosen</th>
                                                <th>Nama Dosen</th>
                                                <th>Email Dosen</th>
                                                <th>No HP Dosen</th>
                                                <th>Password Dosen</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Action</th>
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
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Dosen</label>
                            <input type="text" id="nama_dosens" name="nama_dosen"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Nama Dosen disini...">
                        </div>
                        <div hidden>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Email
                                Lama</label>
                            <input type="text" id="email_lama" name="email_lama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Email Dosen disini...">
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Email
                                Dosen</label>
                            <input type="text" id="emails" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Email Dosen disini...">
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">No HP
                                Dosen</label>
                            <input type="text" id="no_hps" name="no_hp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan No Hp Dosen disini...">
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Password
                                Dosen</label>
                            <input type="text" id="passwords" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Password Dosen disini...">
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahirs" name="tgl_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Password Dosen disini...">
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
            $('#dosen-datatable').DataTable({
                ajax: {
                    url: 'api/dosen',
                    dataSrc: 'dosen'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#dosen-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'kode_dosen',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'nama_dosen',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'email',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'no_hp',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'password',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'tgl_lahir',
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
                                                        data-modal-target="sourceModal" data-nama_dosen="${data.nama_dosen}" data-email="${data.email}" data-kode_dosen="${data.kode_dosen}" data-no_hp="${data.no_hp}" data-password="${data.password}" data-tgl_lahir="${data.tgl_lahir}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return dosenDelete('${data.id}','${data.nama_dosen}','${data.kode_dosen}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const nama_dosen = button.dataset.nama_dosen;
            const email = button.dataset.email;
            const kode_dosen = button.dataset.kode_dosen;
            const no_hp = button.dataset.no_hp;
            const password = button.dataset.password;
            const tgl_lahir = button.dataset.tgl_lahir;
            let url = "{{ route('dosen.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update Dosen ${nama_dosen}`;
            document.getElementById('nama_dosens').value = nama_dosen;
            document.getElementById('emails').value = email;
            document.getElementById('email_lama').value = kode_dosen;
            document.getElementById('no_hps').value = no_hp;
            document.getElementById('passwords').value = password;
            document.getElementById('tgl_lahirs').value = tgl_lahir;
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

        const dosenDelete = async (id, nama_dosen, kode_dosen) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus dosen ${nama_dosen} dengan Kode Dosen ${kode_dosen} ?`);
            if (tanya) {
                try {
                    await axios.post(`/dosen/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    });
                    location.reload();
                } catch (error) {
                    alert('Error deleting record');
                    console.log(error);
                }
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const noHpInput = document.getElementById('no_hp_dosen');

            // Fungsi untuk memvalidasi dan memformat input nomor HP
            noHpInput.addEventListener('input', function(event) {
                let value = event.target.value;

                // Jika input pertama kali, mulai dengan '62'
                if (value.length === 1 && value !== '6') {
                    event.target.value = '62'; // Ubah input pertama menjadi '62'
                }

                // Setelah kode negara 62, hanya angka '8' yang bisa dimasukkan
                if (value.length === 3 && value[2] !== '8') {
                    event.target.value = '628'; // Set '628' jika lebih dari 2 digit dan bukan '8'
                }

                // Pastikan hanya angka yang bisa dimasukkan setelah kode negara dan angka 8
                if (value.length > 3 && !/^\d+$/.test(value)) {
                    event.target.value = value.replace(/[^0-9]/g, ''); // Hapus karakter non-numeric
                }

                // Jika lebih dari 3 digit, pastikan formatnya valid (misalnya no HP Indonesia)
                if (value.length > 3 && value[2] !== '8') {
                    event.target.value = '628'; // Set kembali ke '628' jika format tidak benar
                }
            });
        });
    </script>
</x-app-layout>