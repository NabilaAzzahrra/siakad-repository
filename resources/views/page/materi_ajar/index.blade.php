<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Master<i class="fi fi-rr-caret-right mt-1"></i> Jadwal<i class="fi fi-rr-caret-right mt-1"></i> <span class="text-red-500">Materi Ajar</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-3/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                FORM INPUT MATERI AJAR
                            </div>
                            <form action="{{ route('materi_ajar.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="p-4 rounded-xl">
                                    <div class="mb-5">
                                        <label for="materi_ajar"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">materi_ajar</label>
                                        <input type="text" id="materi_ajar" name="materi_ajar"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Nama materi_ajar disini ..." required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="sks"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                        <input type="text" id="sks" name="sks"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Nama sks disini ..." required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="semester"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">semester
                                            <span class="text-red-500">*</span></label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="id_semester" data-placeholder="Pilih semester">
                                            <option value="">Pilih...</option>
                                            @foreach ($semester as $p)
                                                <option value="{{ $p->id }}">{{ $p->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="id_jurusan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan
                                            <span class="text-red-500">*</span></label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="id_jurusan" data-placeholder="Pilih Jurusan">
                                            <option value="">Pilih...</option>
                                            @foreach ($jurusan as $j)
                                                <option value="{{ $j->id }}">{{ $j->jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="ebook"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-Book</label>
                                        <input type="file" id="ebook" name="ebook"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan E-Book disini ..." required />
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fi fi-rr-disk "></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA MATERI AJAR
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;  overflow-x:auto;">
                                    <table class="table table-bordered" id="materi_ajar-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>materi_ajar</th>
                                                <th>SKS</th>
                                                <th>Semester</th>
                                                <th>Jurusan</th>
                                                <th>E-Book</th>
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
                    <div class="flex flex-col  p-4 space-y-6">

                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">materi_ajar</label>
                            <input type="text" id="materi_ajars" name="materi_ajar"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan materi_ajar disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">sks</label>
                            <input type="text" id="skss" name="sks"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan materi_ajar disini...">
                        </div>
                        <div class="mb-5">
                            <label for="id_semester"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">semester
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                id="id_semester" name="id_semesterl" data-placeholder="Pilih semester">
                                <option value="">Pilih...</option>
                                @foreach ($semester as $p)
                                    <option value="{{ $p->id }}">{{ $p->semester }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="id_jurusan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                id="id_jurusan" name="id_jurusanl" data-placeholder="Pilih Jurusan">
                                <option value="">Pilih...</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Ebook</label>
                            <input type="text" id="ebooks_lama" name="ebooks_lama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan Ebook lama disini..." readonly>
                        </div>
                        <div class="mb-5">
                            <label for="ebook" class="block mb-2 text-sm font-medium text-gray-900">E-Book</label>
                            <input type="file" id="ebooks" name="ebook"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan E-Book disini...">
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
            $('#materi_ajar-datatable').DataTable({
                ajax: {
                    url: 'api/materi_ajar',
                    dataSrc: 'materiajar'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#materi_ajar-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'materi_ajar',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'sks',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'semester',
                    render: (data, type, row) => {
                        return data.semester;
                    }
                }, {
                    data: 'jurusan',
                    render: (data, type, row) => {
                        return data.jurusan;
                    }
                }, {
                    data: 'id',
                    render: (data, type, row) => {
                        var UrlEbook = "{{ route('materi_ajar.show', ':id') }}".replace(
                            ':id',
                            data
                        );
                        return `<a href=${UrlEbook} class="bg-emerald-500 hover:bg-emerald-600 px-3 py-1 rounded-xl text-xs text-white w-10 h-10 flex items-center justify-center"><i class="fas fa-book"></i></a>`;
                    }
                }, {
                    data: {
                        id: 'id',
                        id_semester: 'id_semester',
                        materi_ajar: 'materi_ajar'
                    },
                    render: (data) => {
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-ebooks_lama="${data.ebook}" data-materi_ajar="${data.materi_ajar}"  data-sks="${data.sks}" data-id_semester="${data.id_semester}" data-id_jurusan="${data.id_jurusan}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return materi_ajarDelete('${data.id}','${data.materi_ajar}','${data.ebook}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const materi_ajar = button.dataset.materi_ajar;
            const id_semester = button.dataset.id_semester;
            const sks = button.dataset.sks;
            const ebook = button.dataset.ebooks_lama;
            const id_jurusan = button.dataset.id_jurusan;
            let url = "{{ route('materi_ajar.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update materi_ajar ${materi_ajar}`;
            document.getElementById('materi_ajars').value = materi_ajar;
            document.getElementById('skss').value = sks;
            document.getElementById('ebooks_lama').value = ebook;
            let event = new Event('change');
            document.querySelector('[name="id_semesterl"]').value = id_semester;
            document.querySelector('[name="id_semesterl"]').dispatchEvent(event);
            document.querySelector('[name="id_jurusanl"]').value = id_jurusan;
            document.querySelector('[name="id_jurusanl"]').dispatchEvent(event);
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

        const materi_ajarDelete = async (id, materi_ajar, ebook) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Materi Ajar ${materi_ajar} ?`);
            if (tanya) {
                await axios.post(`/materi_ajar/${id}`, {
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
