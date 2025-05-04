<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Transkrip') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl p-6 mb-6">
                        <div class="mb-4">
                            <div class="flex flex-col lg:flex-row items-center justify-between">
                                <div class="flex -mb-6">
                                    <div class="w-10">
                                        <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                    </div>
                                    <div
                                        class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                        DATA MAHASISWA
                                    </div>
                                </div>
                                <div class="flex gap-4 mb-2">
                                    <div class="mt-4">
                                        <a href="#" onclick="return filter()"
                                            class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-emerald-100 border border-dashed border-emerald-500 text-emerald-500 pl-4 pr-4 pt-2"><i
                                                class="fi fi-sr-filter mr-2 text-lg"></i> <span>Filter
                                                Mahasiswa</span></a>
                                    </div>
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30 mb-4">
                        </div>
                        <form action="{{ route('transkrip.store') }}" method="POST" class="formupdate">
                            @csrf
                            <div class="flex justify-between">
                                <div class="flex items-center w-full mr-4 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                    role="alert">
                                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        Jika <span class="font-medium">kode transkrip</span> belum tersedia, silahkan
                                        pilih mahasiswa terlebih dahulu untuk mendapatkan kodenya
                                    </div>
                                </div>
                                <button
                                    class="mb-4 p-2 border border-sky-600 w-[100px] hover:bg-sky-100 text-sky-600 rounded-xl">
                                    SUBMIT
                                </button>
                            </div>
                            <div class="flex mb-4 items-center">
                                <div class="mr-4 font-bold">Kode Transkrip</div>
                                <div class="flex">
                                    @php
                                        $last = DB::table('transkrip_code')
                                            ->where('id_kelas', request('kelas', ''))
                                            ->orderByDesc('no_mahasiswa')
                                            ->first();

                                        $nextNo = '001';

                                        if ($last && is_numeric($last->no_mahasiswa)) {
                                            $nextNo = str_pad((int) $last->no_mahasiswa + 1, 3, '0', STR_PAD_LEFT);
                                        }
                                    @endphp
                                    <input type="text" value="{{ $nextNo }}" placeholder="Nomor Mahasiswa"
                                        name="no_mahasiswa" readonly
                                        class="bg-gray-50 border text-center border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                                    <input type="text" name="codeLembagadanJurusan" value="T001.025.T"
                                        placeholder="Kode Lembaga dan Jurusan"
                                        class="bg-gray-50 border text-center border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        readonly />
                                    @php
                                        $bulan = request('bulan', '');
                                        $bulanKode = '';

                                        if (preg_match('/^\d{4}-\d{2}$/', $bulan)) {
                                            [$tahun, $bln] = explode('-', $bulan);
                                            $bulanKode = $bln . substr($tahun, 2);
                                        }
                                    @endphp

                                    <input type="text" value="{{ $bulanKode }}"
                                        placeholder="Kode Bulan dan Tahun Cetak" name="codeBulan" readonly
                                        class="bg-gray-50 border text-center border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>
                            <input type="hidden" name="semester" value="{{ request('semester', '') }}">
                            <input type="hidden" name="kurikulum" value="{{ request('kurikulum', '') }}">
                            <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                <table
                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                    <thead
                                        class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                <input type="checkbox" class="rounded-md" onchange="checkAll(this)"
                                                    name="check">
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                NO
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                NIM
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                NAMA
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                KELAS
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                JURUSAN
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                KODE TRANSKRIP
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse($mahasiswa as $i)
                                            @php
                                                $transkripCode = DB::table('transkrip_code')
                                                    ->where('nim', $i->nim)
                                                    ->first();

                                                $noTranskrip = $transkripCode->no_transkrip ?? 0;
                                                $actionTranskrip = '';
                                                if ($noTranskrip != 0) {
                                                    $actionTranskrip = '';
                                                } else {
                                                    $actionTranskrip = 'hidden';
                                                }

                                            @endphp
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-3 text-center bg-gray-100">
                                                    <input type="checkbox" class="rounded-md" name="user_id[]"
                                                        value="{{ $i->nim }}">
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    {{ $no++ }}
                                                </td>
                                                <td class="px-6 py-4 text-center bg-gray-100">
                                                    <a
                                                        href="{{ route('mahasiswa.show', $i->nim) }}">{{ $i->nim }}</a>
                                                </td>
                                                <td class="px-6 py-4 text-left">
                                                    {{ $i->nama }}
                                                </td>
                                                <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                                    {{ $i->kelas }}
                                                </td>
                                                <td class="px-6 py-4 text-left">
                                                    {{ $i->jurusan }}
                                                    <input type="hidden" name="id_jurusan[]"
                                                        value="{{ $i->jurusan }}">
                                                </td>
                                                <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                                    {{ $noTranskrip }}
                                                </td>
                                                <td class="px-6 py-4 text-left">
                                                    <a href="{{route('transkrip.show', $i->nim)}}" class="{{ $actionTranskrip }}">Print Transkrip</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="bg-gray-500 text-white p-3 rounded shadow-sm mb-3">
                                                Data Belum Tersedia!
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-filter" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <h2 class="text-lg font-bold mb-4 bg-amber-50 pl-6 pr-6 p-2 rounded-xl">Filter Mahasiswa</h2>
            <form id="filterForm" action="{{ route('transkrip.index') }}" method="get" class="w-full">

                <p id="modal-content"></p>
                <hr class="mt-4 border-2">
                <button type="submit" id="submitFilter" class="mt-4 bg-sky-500 text-white px-4 py-2 rounded">
                    Submit
                </button>
                <button onclick="closeModalFilter(event)" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Tutup
                </button>
            </form>
        </div>
    </div>
    <script>
        function filter() {
            const modalContent = document.getElementById("modal-content");
            modalContent.innerHTML = `
                <div class="flex flex-col w-full gap-4">
                    <select class="js-example-placeholder-single js-states form-control w-full mb-4" id="tahun_angkatan" name="tahun_angkatan" data-placeholder="Pilih Tahun Angkatan">
                        <option value="">Pilih...</option>
                        @foreach ($tahunAngkatan as $p)
                            <option value="{{ $p }}">{{ $p }}</option>
                        @endforeach
                    </select>
                    <select class="js-example-placeholder-single js-states form-control w-full" id="kelas" name="kelas" data-placeholder="Pilih Kelas">
                        <option value="">Pilih...</option>
                        @foreach ($kelas as $p)
                            <option value="{{ $p->id }}">{{ $p->kelas }}</option>
                        @endforeach
                    </select>
                    <select class="js-example-placeholder-single js-states form-control w-full" id="kurikulum" name="kurikulum" data-placeholder="Pilih Kurikulum">
                        <option value="">Pilih...</option>
                        @foreach ($kurikulum as $p)
                            <option value="{{ $p->id }}">{{ $p->kurikulum }}</option>
                        @endforeach
                    </select>
                    <div>
                        <input type="month" id="bulan" name="bulan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                    </div>
                </div>
            `;
            initializeSelect2();
            const modal = document.getElementById("modal-filter");
            modal.classList.remove("hidden");
        }

        const initializeSelect2 = () => {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih...",
                allowClear: true,
            });
        };

        function closeModalFilter(event) {
            event.preventDefault(); // Mencegah form submit
            const modal = document.getElementById("modal-filter");
            modal.classList.add("hidden");
        }
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const selectedItemsKey = 'selectedItems';
            let selectedItems = JSON.parse(localStorage.getItem(selectedItemsKey)) || [];

            function updateLocalStorage() {
                localStorage.setItem(selectedItemsKey, JSON.stringify(selectedItems));
            }

            function updateCheckboxes() {
                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');
                const checkAllBox = document.querySelector('input[name="check"]');
                let allChecked = true;

                checkboxes.forEach(checkbox => {
                    if (selectedItems.includes(checkbox.value)) {
                        checkbox.checked = true;
                    } else {
                        allChecked = false;
                    }
                });

                checkAllBox.checked = allChecked;
            }

            function handleCheckboxChange(event) {
                const checkbox = event.target;
                const checkAllBox = document.querySelector('input[name="check"]');

                if (checkbox.checked) {
                    if (!selectedItems.includes(checkbox.value)) {
                        selectedItems.push(checkbox.value);
                    }
                } else {
                    selectedItems = selectedItems.filter(item => item !== checkbox.value);
                }

                updateLocalStorage();

                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');
                checkAllBox.checked = Array.from(checkboxes).every(cb => cb.checked);
            }

            document.querySelectorAll('input[name="user_id[]"]').forEach(checkbox => {
                checkbox.addEventListener('change', handleCheckboxChange);
            });

            document.querySelector('input[name="check"]').addEventListener('change', function(event) {
                const checkAll = event.target;
                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');

                checkboxes.forEach(checkbox => {
                    if (!checkbox.disabled) {
                        checkbox.checked = checkAll.checked;
                        if (checkAll.checked) {
                            if (!selectedItems.includes(checkbox.value)) {
                                selectedItems.push(checkbox.value);
                            }
                        } else {
                            selectedItems = selectedItems.filter(item => item !== checkbox.value);
                        }
                    }
                });

                updateLocalStorage();
            });

            // Load existing selections on page load
            updateCheckboxes();

            // Function to reset selections after a successful edit
            function resetSelections() {
                selectedItems = [];
                updateLocalStorage();
                updateCheckboxes();
            }

            // Example: Call this function after a successful data update
            function onDataUpdateSuccess() {
                resetSelections();
                // Additional actions after data update can be added here
            }

            // Simulating a data update operation
            setTimeout(() => {
                onDataUpdateSuccess(); // Trigger reset after update
            }, 1000); // Replace with your actual data update logic
        });
    </script>
</x-app-layout>
