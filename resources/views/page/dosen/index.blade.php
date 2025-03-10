<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <div class="flex items-center font-bold">Master<i class="fi fi-rr-caret-right mt-1"></i> <span
                class="text-amber-100">Dosen</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-3/12 p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/add.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    FORM INPUT DOSEN
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30">
                            <form action="{{ route('dosen.store') }}" method="post" id="dosenForm">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="mb-5">
                                        <label for="nama_dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Dosen</label>
                                        <input type="text" id="nama_dosen" name="nama_dosen"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Nama Dosen disini ..."
                                            oninput="this.value = this.value.toUpperCase();" />
                                        <p id="error-nama_dosen" class="mt-2 text-sm text-red-500 hidden">Nama dosen
                                            wajib diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <label for="email_dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                            Dosen</label>
                                        <input type="email" id="email_dosen" name="email_dosen"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Email Dosen disini ..." />
                                        <p id="error-email_dosen" class="mt-2 text-sm text-red-500 hidden">Email wajib
                                            diisi.
                                        </p>
                                    </div>
                                    <div class="mb-5">
                                        <label for="no_hp_dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP
                                            Dosen</label>
                                        <input type="number" id="no_hp_dosen" name="no_hp_dosen"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan No HP Dosen disini ..." />
                                        <p id="error-no_hp_dosen" class="mt-2 text-sm text-red-500 hidden">No Hp wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                            Dosen</label>
                                        <input type="password" id="password" name="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Password Dosen disini ..." />
                                        <p id="error-password" class="mt-2 text-sm text-red-500 hidden">Password wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <label for="tgl_lahir"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                            Lahir</label>
                                        <input type="date" id="tgl_lahir" name="tgl_lahir"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Password Dosen disini ..." />
                                        <p id="error-tgl_lahir" class="mt-2 text-sm text-red-500 hidden">Tanggal lahir
                                            wajib diisi.</p>
                                    </div>
                                    <button type="submit"
                                        class="text-blue-700 border-2 border-dashed border-blue-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                            class="fi fi-rr-disk "></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    DATA DOSEN
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30 mb-6">
                            <div class="flex justify-center">
                                <div class="p-6" style="width:100%;overflow-x:auto;">
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
            <div class="w-full md:w-1/4 relative bg-white rounded-lg shadow mx-5">
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
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Lahir</label>
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
        const form = document.getElementById('dosenForm');

        const noHpInput = document.getElementById('no_hp_dosen');
        const errorNoHp = document.createElement('p');
        errorNoHp.id = 'error-no_hp_dosen';
        errorNoHp.className = 'mt-2 text-sm text-red-500 hidden';
        errorNoHp.innerText = 'No HP wajib diisi dan harus minimal 13 karakter.';
        noHpInput.parentNode.appendChild(errorNoHp);

        noHpInput.addEventListener('focus', () => {
            if (!noHpInput.value.startsWith('62')) {
                noHpInput.value = '62';
            }
        });

        noHpInput.addEventListener('input', () => {
            let value = noHpInput.value;

            // Pastikan selalu dimulai dengan "62"
            if (!value.startsWith('62')) {
                value = '62';
            }

            // Pastikan karakter setelah "62" adalah "8"
            if (value.length > 2 && value.charAt(2) !== '8') {
                value = value.slice(0, 2) + '8' + value.slice(3);
            }

            // Batasi hingga maksimal 14 karakter
            if (value.length > 14) {
                value = value.slice(0, 14);
            }

            noHpInput.value = value;

            // Tampilkan pesan error jika kurang dari 13 karakter
            if (value.length < 13) {
                errorNoHp.classList.remove('hidden');
            } else {
                errorNoHp.classList.add('hidden');
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form dikirim

            let isValid = true;

            // Validasi Mata Kuliah
            const nama_dosen = document.getElementById('nama_dosen');
            const errorDosen = document.getElementById('error-nama_dosen');
            if (nama_dosen.value === '') {
                errorDosen.classList.remove('hidden');
                isValid = false;
            } else {
                errorDosen.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const email_dosen = document.getElementById('email_dosen');
            const errorEmail = document.getElementById('error-email_dosen');
            if (email_dosen.value === '') {
                errorEmail.classList.remove('hidden');
                isValid = false;
            } else {
                errorEmail.classList.add('hidden');
            }

            // Validasi No HP
            const noHpValue = noHpInput.value.trim();
            if (noHpValue === '' || noHpValue.length < 13) {
                errorNoHp.classList.remove('hidden');
                isValid = false;
            } else {
                errorNoHp.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const password = document.getElementById('password');
            const errorPassword = document.getElementById('error-password');
            if (password.value === '') {
                errorPassword.classList.remove('hidden');
                isValid = false;
            } else {
                errorPassword.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const tgl_lahir = document.getElementById('tgl_lahir');
            const errorTglLahir = document.getElementById('error-tgl_lahir');
            if (tgl_lahir.value === '') {
                errorTglLahir.classList.remove('hidden');
                isValid = false;
            } else {
                errorTglLahir.classList.add('hidden');
            }

            // Jika validasi lolos, kirim form
            if (isValid) {
                form.submit();
            }
        });

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
                        return `<div class="text-wrap">${data}</div>`;
                    }
                }, {
                    data: 'email',
                    render: (data, type, row) => {
                        return `<div class="text-wrap">${data}</div>`;
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
                                                        class="border-2 border-dashed border-amber-500 text-amber-500 hover:bg-amber-100 px-3 py-1 rounded-xl h-10 w-10 text-xs">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return dosenDelete('${data.id}','${data.nama_dosen}','${data.kode_dosen}')" class="border-2 border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs"><i class="fas fa-trash"></i></button>`;
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
            document.getElementById('title_source').innerText = `${nama_dosen}`;
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
            Swal.fire({
                title: `Apakah Anda yakin?`,
                text: `Data akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await axios.post(`/dosen/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        })
                        .then(function(response) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: `Data berhasil dihapus.`,
                                icon: 'success',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then(() => {
                                // Refresh halaman setelah menekan tombol OK
                                location.reload();
                            });
                        })
                        .catch(function(error) {
                            // Alert jika terjadi kesalahan
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.log(error);
                        });
                }
            });
        };
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
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

        @if (session('message_insert'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('message_insert') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    didOpen: () => {
                        const swalBtn = Swal.getConfirmButton();
                        swalBtn.disabled = false;
                        swalBtn.textContent = "OK";
                    }
                });
            </script>
        @endif

        @if (session('message_update'))
            <script>
                Swal.fire({
                    title: 'Update Berhasil!',
                    text: "{{ session('message_update') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    didOpen: () => {
                        const swalBtn = Swal.getConfirmButton();
                        swalBtn.disabled = false;
                        swalBtn.textContent = "OK";
                    }
                });
            </script>
        @endif

    @endpush
</x-app-layout>
