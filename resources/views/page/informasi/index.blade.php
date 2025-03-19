<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Master<i class="fi fi-rr-caret-right mt-1"></i> <span
                class="text-amber-100">Informasi</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full lg:w-5/12 p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/add.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    FORM INPUT INFORMASI
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30">
                            <form action="{{ route('informasi.store') }}" method="post" id="informasiForm">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="mb-5">
                                        <label for="judul"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input id="judul" name="judul"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Judul Informasi disini ..."
                                            oninput="this.value = this.value.toUpperCase();">
                                        <p id="error-judul" class="mt-2 text-sm text-red-500 hidden">Title wajib diisi.
                                        </p>
                                    </div>
                                    <div class="mb-5">
                                        <label for="informasi"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi</label>
                                        <textarea id="informasi" name="informasi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Informasi disini ..." required></textarea>
                                        <p id="error-informasi" class="mt-2 text-sm text-red-500 hidden">Informasi wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5">
                                        <label for="kategori"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                            <span class="text-red-500">*</span></label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            id="kategori" name="kategori" data-placeholder="Pilih Kategori">
                                            <option value="">Pilih...</option>
                                            <option value="MAHASISWA">MAHASISWA</option>
                                            <option value="DOSEN">DOSEN</option>
                                            <option value="ORANG TUA">ORANG TUA</option>
                                        </select>
                                        <p id="error-kategori" class="mt-2 text-sm text-red-500 hidden">Title wajib
                                            diisi.</p>
                                    </div>
                                    <button type="submit"
                                        class="text-blue-700 border-2 border-dashed border-blue-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    DATA INFORMASI
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30 mb-6">
                            <div class="flex justify-center">
                                <div class="p-0 " style="width:100%;overflow-x:auto;">
                                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                            <!-- Form untuk entries -->
                                            <x-show-entries :route="route('informasi.index')" :search="request()->search">
                                            </x-show-entries>
                                        </div>

                                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                            <form action="{{ route('informasi.index') }}" method="GET"
                                                class="flex items-center flex-1">
                                                <input type="text" name="search"
                                                    placeholder="Enter for search . . . " id="search"
                                                    value="{{ request('search') }}"
                                                    class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300" />

                                                <input type="hidden" name="entries"
                                                    value="{{ request('entries', 10) }}">
                                                <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                            </form>
                                        </div>
                                    </div>
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
                                                        JUDUL
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        INFORMASI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center ">
                                                        <div class="flex items-center">
                                                            KATEGORI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            ACTION
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = $informasi->firstItem();
                                                @endphp
                                                @forelse($informasi as $i)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <td class="px-6 py-4 text-left ">
                                                            {{ $i->title }}
                                                        </td>
                                                        <td scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100 text-wrap">
                                                            {{-- {{ $i->informasi }} --}}
                                                            {{-- {!! $i->informasi !!} --}}
                                                            <div>
                                                                {!! $i->informasi !!}
                                                            </div>
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $i->kategori }}
                                                        </th>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100 ">
                                                            <button type="button" data-id="{{ $i->id }}" title="Edit Data"
                                                                data-modal-target="sourceModal"
                                                                data-judul="{{ $i->title }}"
                                                                data-informasi="{{ $i->informasi }}"
                                                                data-kategori="{{ $i->kategori }}"
                                                                onclick="editSourceModal(this)"
                                                                class="border-2 border-dashed border-amber-500 text-amber-500 hover:bg-amber-100 px-3 py-1 rounded-xl h-10 w-10 text-xs">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button
                                                                onclick="return informasiDelete('{{ $i->id }}','{{ $i->kategori }}')" title="Hapus Data"
                                                                class="border-2 border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </th>
                                                    </tr>
                                                @empty
                                                    <div class="bg-gray-500 text-white p-3 rounded shadow-sm mb-3">
                                                        Data Belum Tersedia!
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        @if ($informasi->hasPages())
                                            {{ $informasi->appends(request()->query())->links('vendor.pagination.custom') }}
                                        @else
                                            <div class="flex items-center justify-between">
                                                <nav class="flex justify-start">
                                                    <div class="text-sm flex gap-1">
                                                        <div>Showing</div>
                                                        <div class="font-bold">1</div>
                                                        <div>to</div>
                                                        <div class="font-bold">{{ count($informasi) }}</div>
                                                        <div>of</div>
                                                        <div class="font-bold">{{ count($informasi) }}</div>
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

                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" id="juduls" name="judul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Judul disini..." oninput="this.value = this.value.toUpperCase();">
                        </div>
                        <div class="mb-5">
                            <label for="informasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi</label>
                            <textarea id="informasis" name="informasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Informasi disini ..." required></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="ketori"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                id="kategoris" name="kategoris" data-placeholder="Pilih Kategori">
                                <option value="">Pilih...</option>
                                <option value="MAHASISWA">MAHASISWA</option>
                                <option value="DOSEN">DOSEN</option>
                                <option value="ORANG TUA">ORANG TUA</option>
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
        const form = document.getElementById('informasiForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form dikirim

            let isValid = true;

            // Validasi Mata Kuliah
            const judul = document.getElementById('judul');
            const errorJudul = document.getElementById('error-judul');
            if (judul.value === '') {
                errorJudul.classList.remove('hidden');
                isValid = false;
            } else {
                errorJudul.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const informasi = document.getElementById('informasi');
            const errorInformasi = document.getElementById('error-informasi');
            if (informasi.value === '') {
                errorInformasi.classList.remove('hidden');
                isValid = false;
            } else {
                errorInformasi.classList.add('hidden');
            }

            // Validasi Mata Kuliah
            const kategori = document.getElementById('kategori');
            const errorKategori = document.getElementById('error-kategori');
            if (kategori.value === '') {
                errorKategori.classList.remove('hidden');
                isValid = false;
            } else {
                errorKategori.classList.add('hidden');
            }

            // Jika validasi lolos, kirim form
            if (isValid) {
                form.submit();
            }
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const informasi = button.dataset.informasi;
            const kategori = button.dataset.kategori;
            const judul = button.dataset.judul;
            let url = "{{ route('informasi.update', ':id') }}".replace(':id', id);
            console.log(judul);

            // Judul dan kategori sudah benar
            document.getElementById('title_source').innerText = `Update informasi ${kategori}`;
            document.getElementById('juduls').value = judul;
            document.querySelector('[name="kategoris"]').value = kategori;
            document.querySelector('[name="kategoris"]').dispatchEvent(new Event('change'));

            // Penugasan informasi ke CKEditor
            if (CKEDITOR.instances['informasis']) {
                CKEDITOR.instances['informasis'].setData(informasi);
            }

            // Simpan form
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

            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }

        const informasiDelete = async (id, pukul) => {
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
                    await axios.post(`/informasi/${id}`, {
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
