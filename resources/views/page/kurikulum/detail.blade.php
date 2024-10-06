<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('E-Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <input type="text" id="id_kurikulum" value="{{ $kurikulum->id }}" hidden>
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-1/2 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold text-wrap">
                                MATERI AJAR KURIKULUM <span class="font-bold">{{ $kurikulum->kurikulum }}</span>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="p-6" style="width:100%;  overflow-x:auto;">
                                <table class="table table-bordered" id="detail-datatable">
                                    <thead>
                                        <tr>
                                            <th class="w-7">No.</th>
                                            <th>MATERI AJAR</th>
                                            <th>SKS</th>
                                            <th>SEMESTER</th>
                                            <th>JURUSAN</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg h-full">
                        <form action="{{ route('kurikulum.detail') }}" method="post">
                            @csrf
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="flex gap-2 items-center justify-between">
                                    <div
                                        class="lg:p-6 w-full p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold text-wrap">
                                        MATERI AJAR</span>
                                    </div>
                                    <button type="submit"
                                        class="bg-blue-500 py-2 px-4 rounded-xl  hover:bg-blue-600 text-white">
                                        <i class="fa-solid fa-save"></i>
                                    </button>
                                    <input type="hidden" name="id_kurikulum" value="{{ $kurikulum->id }}">
                                    @php
                                        $disabled_ids = $kurikulum_det->pluck('id_materi_ajar')->toArray();
                                    @endphp
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;  overflow-x:auto;">
                                    <table class="table table-bordered" id="materi-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>MATERI AJAR</th>
                                                <th>SKS</th>
                                                <th>SEMESTER</th>
                                                <th>JURUSAN</th>
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
                                '<span class="bg-green-500 px-4 py-2 rounded-full text-[12px] font-bold text-white">Added</span>';
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
                                `<button onclick="return detailDelete('${data.id}','${data.materi_ajar.materi_ajar}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-xl text-xs text-white h-10 w-10 flex items-center justify-center"><i class="fas fa-trash"></i></button>`;
                            return `<div style="text-align:center">${deleteUrl}</div>`;
                        }
                    },
                ],
            });
        });

        const detailDelete = async (id, pukul) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Mater Ajar ${pukul} ?`);
            if (tanya) {
                await axios.post(`/detail/${id}`, {
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

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox' && !checkboxes[i].disabled) {
                    checkboxes[i].checked = ele.checked;
                }
            }
        }
    </script>
</x-app-layout>
