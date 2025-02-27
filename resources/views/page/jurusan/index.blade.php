<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Master<i class="fi fi-rr-caret-right mt-1"></i> Jadwal<i
                    class="fi fi-rr-caret-right mt-1"></i> <span class="text-red-500">Jurusan</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-3/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/add.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    FORM INPUT JURUSAN
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30">
                            <form action="{{ route('jurusan.store') }}" method="post" id="jurusanForm">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="mb-5">
                                        <label for="jurusan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                                            Studi <span class="text-red-500">*</span></label>
                                        <input type="text" id="jurusan" name="jurusan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Nama Program Studi disini ..." />
                                        <p id="error-jurusan" class="mt-2 text-sm text-red-500 hidden">Program studi
                                            wajib diisi.
                                        </p>
                                    </div>
                                    <div class="mb-5">
                                        <label for="fakultas"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas
                                            <span class="text-red-500">*</span></label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6" id="fakultas"
                                            name="fakultas" data-placeholder="Pilih Fakultas">
                                            <option value="">Pilih...</option>
                                            @foreach ($fakultas as $p)
                                                <option value="{{ $p->id }}">{{ $p->fakultas }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-fakultas" class="mt-2 text-sm text-red-500 hidden">Fakultas wajib
                                            diisi.</p>
                                    </div>
                                    <button type="submit"
                                        class="border-2 border-dashed border-blue-700 text-blue-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 pt-2 pb-1 text-left dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                            class="fi fi-rr-disk "></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    DATA JURUSAN
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30 mb-6">
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;overflow-x:auto;">
                                    <table class="table table-bordered" id="jurusan-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>Program Studi</th>
                                                <th>Fakultas</th>
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

                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Program
                                Studi <span class="text-red-500">*</span></label>
                            <input type="text" id="jurusans" name="jurusan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Program Studi disini...">
                        </div>
                        <div class="mb-5">
                            <label for="pukul"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-[450px] m-6"
                                name="fakultass" data-placeholder="Pilih Fakultas">
                                <option value="">Pilih...</option>
                                @foreach ($fakultas as $p)
                                    <option value="{{ $p->id }}">{{ $p->fakultas }}</option>
                                @endforeach
                            </select>
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
        const form = document.getElementById('jurusanForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form dikirim

            let isValid = true;

            // Validasi Mata Kuliah
            const jurusan = document.getElementById('jurusan');
            const errorJurusan = document.getElementById('error-jurusan');
            if (jurusan.value === '') {
                errorJurusan.classList.remove('hidden');
                isValid = false;
            } else {
                errorJurusan.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const fakultas = document.getElementById('fakultas');
            const errorFakultas = document.getElementById('error-fakultas');
            if (fakultas.value === '') {
                errorFakultas.classList.remove('hidden');
                isValid = false;
            } else {
                errorFakultas.classList.add('hidden');
            }

            // Jika validasi lolos, kirim form
            if (isValid) {
                form.submit();
            }
        });

        $(document).ready(function() {
            console.log('RUN!');
            $('#jurusan-datatable').DataTable({
                ajax: {
                    url: 'api/jurusan',
                    dataSrc: 'jurusan'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#jurusan-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'jurusan',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'fakultas',
                    render: (data, type, row) => {
                        return data.fakultas;
                    }
                }, {
                    data: {
                        id: 'id',
                        id_fakultas: 'id_fakultas',
                        name: 'name'
                    },
                    render: (data) => {
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-jurusan="${data.jurusan}" data-id_fakultas="${data.id_fakultas}"
                                                        onclick="editSourceModal(this)"
                                                        class="border-2 border-dashed border-amber-500 text-amber-500 hover:bg-amber-100 px-3 py-1 rounded-xl h-10 w-10 text-xs">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return jurusanDelete('${data.id}','${data.jurusan}')" class="border-2 border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const jurusan = button.dataset.jurusan;
            const id_fakultas = button.dataset.id_fakultas;
            let url = "{{ route('jurusan.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `UPDATE ${jurusan}`;
            document.getElementById('jurusans').value = jurusan;
            document.querySelector('[name="fakultass"]').value = id_fakultas;
            let event = new Event('change');
            document.querySelector('[name="fakultass"]').dispatchEvent(event);
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

        const jurusanDelete = async (id, jurusan) => {
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
                    await axios.post(`/jurusan/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        })
                        .then(function(response) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: `Data jurusan ${jurusan} berhasil dihapus.`,
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
        }
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
