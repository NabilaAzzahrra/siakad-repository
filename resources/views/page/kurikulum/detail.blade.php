<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Master<i class="fi fi-rr-caret-right mt-1"></i> <span
                class="">Kurikulum</span> <i class="fi fi-rr-caret-right mt-1"></i> <span
                class="text-amber-500">Detail Kurikulum</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <input type="text" id="id_kurikulum" value="{{ $kurikulum->id }}" hidden>
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-1/2 p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold text-wrap">
                                MATERI AJAR KURIKULUM <span class="font-bold">{{ $kurikulum->kurikulum }}</span>
                            </div>
                        </div> --}}
                        <div class="flex px-6 pt-6">
                            <div class="w-10">
                                <img src="{{ url('img/library.png') }}" alt="Icon 1" class="">
                            </div>
                            <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                MATERI AJAR KURIKULUM <span
                                    class="font-bold text-amber-500">{{ $kurikulum->kurikulum }}</span>
                            </div>
                        </div>
                        <hr class="border mt-2 border-black border-opacity-30 mx-6">
                        <div class="flex justify-center">
                            <div class="p-6" style="width:100%;  overflow-x:auto;">
                                <table class="table table-bordered" id="detail-datatable">
                                    <thead>
                                        <tr>
                                            <th class="w-7">No.</th>
                                            <th>MATERI AJAR</th>
                                            <th>SKS</th>
                                            <th>SEMESTER</th>
                                            <th>PROGRAM STUDI</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <form action="{{ route('kurikulum.detail') }}" method="post">
                            @csrf
                            <div class="px-6 pt-6 pb-2 text-gray-900 dark:text-gray-100">
                                <div class="flex  items-center justify-between">
                                    <div class="flex">
                                        <div class="w-10">
                                            <img src="{{ url('img/select.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            MATERI AJAR KURIKULUM <span
                                                class="font-bold text-amber-500">{{ $kurikulum->kurikulum }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="text-blue-500 border-2 border-dashed border-blue-500 hover:bg-blue-100 py-2 px-4 rounded-xl">
                                            <i class="fi fi-sr-multiple pt-4"></i> Submit untuk menambahkan
                                        </button>
                                        <input type="hidden" name="id_kurikulum" value="{{ $kurikulum->id }}">
                                        @php
                                            $disabled_ids = $kurikulum_det->pluck('id_materi_ajar')->toArray();
                                        @endphp
                                    </div>
                                </div>
                            </div>
                            <hr class="border border-black border-opacity-30 mx-6">
                            <div id="alert-4"
                                class="flex items-center p-4 mx-6 mt-4 border border-dashed border-emerald-800 text-emerald-800 rounded-lg bg-emerald-50 dark:bg-gray-800 dark:text-yellow-300"
                                role="alert">
                                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    Harap checklist terlebih dahulu sebelum <span class="font-bold text-emerald-800 underline">submit untuk menambahkan</span>
                                </div>
                            </div>
                            <div class="flex justify-center pb-3">
                                <div class="px-6 py-3" style="width:100%;  overflow-x:auto;">
                                    <table class="table table-bordered" id="materi-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>MATERI AJAR</th>
                                                <th>SKS</th>
                                                <th>SEMESTER</th>
                                                <th>PROGRAM STUDI</th>
                                                <th><input type="checkbox" onchange="checkAll(this)" name="check"
                                                        class="w-4 h-4 text-blue-600 bg-white border-black border-2 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#materi-datatable').DataTable({
                ajax: {
                    url: '/api/materi_ajar',
                    dataSrc: 'materiajar'
                },
                paging: false, // Disable pagination
                initComplete: function() {
                    $('#materi-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                        data: 'no',
                        render: (data, type, row, meta) =>
                            `<div style="text-align:center">${meta.row + 1}.</div>`
                    },
                    {
                        data: 'materi_ajar',
                        render: (data, type, row) => data
                    },
                    {
                        data: 'sks',
                        render: (data, type, row) =>
                            `<div style="text-align:center">${data}</div>`
                    },
                    {
                        data: 'semester',
                        render: (data, type, row) =>
                            `<div style="text-align:center">${data.semester}</div>`
                    }, {
                        data: 'jurusan',
                        render: (data, type, row) => data.jurusan
                    },
                    {
                        data: 'id',
                        render: (data, type, row) => {
                            let ditambahkan =
                                '<span class="bg-green-100 border border-green-200 px-4 py-2 rounded-full text-[12px] font-bold text-green-400">Added</span>';
                            let buttonckeck = `
                            <div class="flex items-center justify-center">
                                <input id="checked-checkbox" name="user_id[]" type="checkbox" value="${data}" class="w-4 h-4 text-blue-600 bg-white border-black border-2 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>`;
                            var disabledIds = <?php echo json_encode($disabled_ids); ?>;
                            let disable = disabledIds.includes(data) ?
                                $urlCkeck = ditambahkan :
                                $urlCkeck = buttonckeck;
                            return `<div class="text-center">${$urlCkeck}</div>`;
                        }
                    },
                ],
            });
        });

        $(document).ready(function() {
            const idKurikulum = document.getElementById('id_kurikulum').value;
            console.log(idKurikulum);
            $('#detail-datatable').DataTable({
                ajax: {
                    url: `/api/kurikulum_detail/${idKurikulum}`,
                    dataSrc: 'kurikulum'
                },
                paging: false, // Disable pagination
                initComplete: function() {
                    $('#materi-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                        data: 'no',
                        render: (data, type, row, meta) =>
                            `<div style="text-align:center">${meta.row + 1}.</div>`
                    },
                    {
                        data: 'materi_ajar',
                        render: (data, type, row) => data.materi_ajar
                    },
                    {
                        data: 'materi_ajar',
                        render: (data, type, row) =>
                            `<div style="text-align:center">${data.sks}</div>`
                    },
                    {
                        data: 'materi_ajar',
                        render: (data, type, row) =>
                            `<div style="text-align:center">${data.semester.semester}</div>`
                    }, {
                        data: 'materi_ajar',
                        render: (data, type, row) => data.jurusan.jurusan
                    }, {
                        data: {
                            no: 'no',
                            name: 'name'
                        },
                        render: (data) => {
                            let deleteUrl =
                                `<button onclick="return detailDelete('${data.id}','${data.materi_ajar.materi_ajar}')" class="border-2 border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs"><i class="fas fa-trash"></i></button>`;
                            return `<div style="text-align:center">${deleteUrl}</div>`;
                        }
                    },
                ],
            });
        });

        const detailDelete = async (id, pukul) => {
            Swal.fire({
                title: `Apakah Anda yakin?`,
                text: `Data akan dihapus dari kurikulum!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await axios.post(`/detail/${id}`, {
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

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox' && !checkboxes[i].disabled) {
                    checkboxes[i].checked = ele.checked;
                }
            }
        }
    </script>
        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

        @if (session('message_detail'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('message_detail') }}",
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
