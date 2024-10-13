<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            <div class="flex items-center">Master<i class="fi fi-rr-caret-right mt-1"></i> <span
                    class="text-red-500">Informasi</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full lg:w-5/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                FORM INPUT INFORMASI
                            </div>
                            <form action="{{ route('informasi.store') }}" method="post">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="mb-5">
                                        <label for="judul"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input id="judul" name="judul"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Judul Informasi disini ..." required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="informasi"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi</label>
                                        <textarea id="informasi" name="informasi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Informasi disini ..." required></textarea>
                                    </div>
                                    <div class="mb-5">
                                        <label for="kategori"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                            <span class="text-red-500">*</span></label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="kategori" data-placeholder="Pilih Kategori">
                                            <option value="">Pilih...</option>
                                            <option value="MAHASISWA">MAHASISWA</option>
                                            <option value="DOSEN">DOSEN</option>
                                            <option value="ORANG TUA">ORANG TUA</option>
                                        </select>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA INFORMASI
                            </div>
                            <div class="flex justify-center">
                                <div class="p-0 py-4 lg:p-12" style="width:100%;overflow-x:auto;">
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
                                                    $no = 1;
                                                @endphp
                                                @foreach ($informasi as $i)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center ">
                                                            {{ $i->judul }}
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
                                                            <button type="button" data-id="{{ $i->id }}"
                                                                data-modal-target="sourceModal"
                                                                data-judul="{{ $i->judul }}"
                                                                data-informasi="{{ $i->informasi }}"
                                                                data-kategori="{{ $i->kategori }}"
                                                                onclick="editSourceModal(this)"
                                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl text-xs text-white h-10 w-10">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button
                                                                onclick="return informasiDelete('{{ $i->id }}','{{ $i->kategori }}')"
                                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-xl text-xs text-white h-10 w-10"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="mt-4">
                                        {{ $informasi->links() }}
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
                                id="" placeholder="Masukan Judul disini...">
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
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const informasi = button.dataset.informasi;
            const kategori = button.dataset.kategori;
            const judul = button.dataset.judul;
            let url = "{{ route('informasi.update', ':id') }}".replace(':id', id);
            console.log(url);

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
            let tanya = confirm(`Apakah anda yakin untuk menghapus informasi ${pukul} ?`);
            if (tanya) {
                await axios.post(`/informasi/${id}`, {
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
