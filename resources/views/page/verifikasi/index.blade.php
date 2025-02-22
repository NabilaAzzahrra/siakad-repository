<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Verifikasi Pembimbing</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA MAHASISWA
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;  overflow-x:auto;">
                                    <table class="table table-bordered" id="verifikasi-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>VERIFIKASI</th>
                                                <th>FILE</th>
                                                <th>NIM</th>
                                                <th>NAMA</th>
                                                <th>JUDUL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $d)
                                                @php
                                                    if ($d->verifikasi_pembimbing == 'BELUM') {
                                                        $val = 'BELUM';
                                                        $bg = 'bg-red-300';
                                                        $dis = '';
                                                    } else {
                                                        $val = 'SUDAH';
                                                        $bg = 'bg-emerald-300';
                                                        $dis = 'disabled';
                                                    }

                                                @endphp
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><button type="button"
                                                            onclick="confirmVerification({{ $d->id }})"
                                                            class="{{ $bg }} px-2 text-sm rounded-xl font-bold"
                                                            {{ $dis }}>{{ $val }}</button>
                                                    </td>
                                                    <td><a href="{{ url('revisi/' . $d->file) }}"
                                                            target="_blank">Lihat</a></td>
                                                    <td>{{ $d->nim }}</td>
                                                    <td>{{ $d->mahasiswa->nama }}</td>
                                                    <td>{{ $d->appProj->judul }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#verifikasi-datatable').DataTable(); // Inisialisasi sederhana
        });
    </script>
    <script>
        function confirmVerification(id) {
            if (confirm("Apakah Anda yakin ingin melakukan verifikasi?")) {
                fetch("{{ route('verifikasiPembimbing.update', ':id') }}".replace(':id', id), {
                        method: 'PUT', // atau 'POST' tergantung definisi route Anda
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token untuk keamanan
                        },
                        body: JSON.stringify({}) // Data kosong karena tidak ada input tambahan
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // Parse response sebagai JSON
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message); // Tampilkan pesan sukses
                            if (data.redirect) {
                                window.location.href = data.redirect; // Redirect ke halaman sebelumnya
                            }
                        } else {
                            alert(data.message); // Tampilkan pesan error
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memproses permintaan.');
                    });
            }
        }
    </script>
    {{-- <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
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
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">sesi</label>
                            <input type="text" id="sesis" name="sesi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan sesi disini...">
                        </div>
                        <div class="">
                            <label for="id_pukul"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pukul
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-[930px] m-6" id="id_pukul"
                                name="id_pukull" data-placeholder="Pilih Pukul">
                                <option value="">Pilih...</option>
                                @foreach ($pukul as $p)
                                    <option value="{{ $p->id }}">{{ $p->pukul }}</option>
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
        $(document).ready(function() {
            console.log('RUN!');
            $('#sesi-datatable').DataTable({
                ajax: {
                    url: 'api/sesi',
                    dataSrc: 'sesi'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#sesi-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'sesi',
                    render: (data, type, row) => {
                        return data;
                    }
                },{
                    data: 'pukul',
                    render: (data, type, row) => {
                        return data.pukul;
                    }
                }, {
                    data: {
                        id: 'id',
                        id_pukul: 'id_pukul',
                        sesi: 'sesi'
                    },
                    render: (data) => {
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-sesi="${data.sesi}" data-id_pukul="${data.id_pukul}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return sesiDelete('${data.id}','${data.sesi}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const sesi = button.dataset.sesi;
            const id_pukul = button.dataset.id_pukul;
            let url = "{{ route('sesi.update', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `UPDATE SESI ${sesi}`;
            document.getElementById('sesis').value = sesi;
            document.querySelector('[name="id_pukull"]').value = id_pukul;
            let event = new Event('change');
            document.querySelector('[name="id_pukull"]').dispatchEvent(event);
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

        const sesiDelete = async (id, sesi) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus sesi ${sesi} ?`);
            if (tanya) {
                await axios.post(`/sesi/${id}`, {
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
    </script> --}}
</x-app-layout>
