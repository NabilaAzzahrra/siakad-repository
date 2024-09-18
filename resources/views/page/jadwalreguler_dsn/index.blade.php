<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pukul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-red-500 rounded-xl">
                                <div class="flex items-center justify-between">
                                    <div>DATA JADWAL REGULER</div>
                                </div>
                            </div>
                            <div class="flex w-full justify-center">
                                <div class="pt-12 w-full" style="width:100%;overflow-x:auto;">

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border shadow-lg">
                                            <thead
                                                class="text-xs bg-gray-200 text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI AJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PENGAJAR
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            HARI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SESI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PUKUL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SEMESTER
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SKS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            RUANG
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            KELAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            JURUSAN
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">

                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($jadwal_reguler as $key => $j)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $no++ }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->dosen->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->hari->hari }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->sesi->sesi }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->sesi->pukul->pukul }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->detail_kurikulum->materi_ajar->semester->semester }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->detail_kurikulum->materi_ajar->sks }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->ruang->ruang }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->kelas->kelas }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->kelas->jurusan->jurusan }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <a href="{{ route('jadwal_reguler.show', $j->id_jadwal) }}"
                                                                class="mr-2 bg-green-500 hover:bg-green-600 px-3 py-1 rounded-md text-xs text-white">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="mt-4">
                                        {{ $jadwal_reguler->links() }}
                                    </div> --}}
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
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">pukul</label>
                            <input type="text" id="pukuls" name="pukul"
                                class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer hover:shadow-lg"
                                id="" placeholder="Masukan pukul disini...">
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
            $('#pukul-datatable').DataTable({
                ajax: {
                    url: 'api/pukul',
                    dataSrc: 'pukul'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#pukul-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'pukul',
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
                                                        data-modal-target="sourceModal" data-pukul="${data.pukul}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return pukulDelete('${data.id}','${data.pukul}','${data.id_jadwal}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const pukul = button.dataset.pukul;
            let url = "{{ route('pukul.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update pukul ${pukul}`;
            document.getElementById('pukuls').value = pukul;
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

        const pukulDelete = async (id, pukul) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus pukul ${pukul} ?`);
            if (tanya) {
                await axios.post(`/pukul/${id}`, {
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

        const jadwalDelete = async (id_jadwal, materi_ajar) => {
            let tanya = confirm(
                `Apakah anda yakin untuk menghapus Jadwal ${id_jadwal} untuk materi ${materi_ajar}?`);
            if (tanya) {
                try {
                    await axios.post(`/jadwal_reguler/${id_jadwal}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    });
                    location.reload(); // Refresh halaman setelah berhasil menghapus
                } catch (error) {
                    alert('Terjadi kesalahan saat menghapus data.');
                    console.log(error);
                }
            }
        };
    </script>
</x-app-layout>
