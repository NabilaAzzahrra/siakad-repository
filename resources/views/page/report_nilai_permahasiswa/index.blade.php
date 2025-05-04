<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Report Presensi Mahasiswa') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="flex gap-5">
                        <div
                            class="w-full bg-white dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl p-6 mb-6">
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
                                <hr class="border mt-2 border-black border-opacity-30">
                            </div>
                            <div class="flex justify-center">
                                <div class="p-0 " style="width:100%;overflow-x:auto;">
                                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                            <!-- Form untuk entries -->
                                            <x-show-entries :route="route('report_nilai_mahasiswa.index')" :search="request()->search">
                                            </x-show-entries>
                                        </div>

                                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                            <form action="{{ route('report_nilai_mahasiswa.index') }}" method="GET"
                                                class="flex items-center flex-1">
                                                <input type="text" name="search"
                                                    placeholder="Enter for search . . . " id="search"
                                                    value="{{ request('search') }}"
                                                    class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                                    oninput="this.value = this.value.toUpperCase();" />

                                                <input type="hidden" name="entries"
                                                    value="{{ request('entries', 10) }}">
                                                <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                            </form>
                                        </div>
                                    </div>
                                    @csrf
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
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
                                                        TINGKAT
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NO HANDPHONE
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        STATUS
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        ACTION
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = $mahasiswa_lengkap->firstItem();
                                                @endphp
                                                @forelse($mahasiswa_lengkap as $i)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
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
                                                        </td>
                                                        <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                                            {{ $i->tingkat }}
                                                        </td>
                                                        <td class="px-6 py-4 text-left">
                                                            {{ $i->no_hp }}
                                                        </td>
                                                        @php
                                                            switch ($i->keaktifan) {
                                                                case 'aktif':
                                                                    $keaktifan = 'AKTIF';
                                                                    $bg =
                                                                        'bg-green-100 text-green-500 border border-green-500';
                                                                    break;
                                                                case 'cuti':
                                                                    $keaktifan = 'CUTI';
                                                                    $bg =
                                                                        'bg-amber-100 text-amber-500 border border-amber-500';
                                                                    break;
                                                                default:
                                                                    $keaktifan = 'DO';
                                                                    $bg =
                                                                        'bg-red-100 text-red-500 border border-red-500';
                                                                    break;
                                                            }
                                                        @endphp
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            <span
                                                                class="{{ $bg }} p-2 rounded-full">{{ $keaktifan }}</span>
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{-- <a href="{{ route('report_nilai_mahasiswa.edit', $i->nim) }}"
                                                                class="mr-2 text-green-500 hover:bg-green-100 px-4 py-3 rounded-xl border border-dashed border-green-600">
                                                                <i class="fa-solid fa-file"></i>
                                                            </a> --}}

                                                            <a href="#"
                                                                onclick="return printPresensi('{{ $i->nim }}')"
                                                                class="mr-2 text-green-500 hover:bg-green-100 px-4 pt-3 pb-2 rounded-xl border border-dashed border-green-600"><i
                                                                    class="fi fi-sr-print text-lg"></i></a>
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
                                    <div class="mt-4">
                                        @if ($mahasiswa_lengkap->hasPages())
                                            {{ $mahasiswa_lengkap->appends(request()->query())->links('vendor.pagination.custom') }}
                                        @else
                                            <div class="flex items-center justify-between">
                                                <nav class="flex justify-start">
                                                    <div class="text-sm flex gap-1">
                                                        <div>Showing</div>
                                                        <div class="font-bold">1</div>
                                                        <div>to</div>
                                                        <div class="font-bold">{{ count($mahasiswa_lengkap) }}
                                                        </div>
                                                        <div>of</div>
                                                        <div class="font-bold">{{ count($mahasiswa_lengkap) }}
                                                        </div>
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
    <div id="modal-filter" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <h2 class="text-lg font-bold mb-4 bg-amber-50 pl-6 pr-6 p-2 rounded-xl">Filter Mahasiswa</h2>
            <form id="filterForm" action="{{ route('report_nilai_mahasiswa.index') }}" method="get"
                class="w-full">

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

    <div id="modal-print" class="hidden fixed inset-0 flex justify-center items-center z-50">
        <!-- Backdrop Blur -->
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl z-10">
            <h2 class="text-lg font-bold mb-4 bg-amber-50 pl-6 pr-6 p-2 rounded-xl">Print Presensi</h2>
            <form id="printForm" action="#" method="get" class="w-full">

                <p id="modal-content-print"></p>
                <hr class="mt-4 border-2">
                <button type="submit" id="submitPrint" class="mt-4 bg-sky-500 text-white px-4 py-2 rounded">
                    Submit
                </button>
                <button onclick="closeModalPrint(event)" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
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
                    <select class="js-example-placeholder-single js-states form-control w-full" id="jurusan" name="jurusan" data-placeholder="Pilih Jurusan">
                        <option value="">Pilih...</option>
                        @foreach ($jurusan as $p)
                            <option value="{{ $p->id }}">{{ $p->jurusan }}</option>
                        @endforeach
                    </select>
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

        function printPresensi(nim) {
            const modalContent = document.getElementById("modal-content-print");

            modalContent.innerHTML = `
            <div class="flex flex-col w-full gap-4">
                <select class="js-example-placeholder-single js-states form-control w-full mb-4" id="semester" name="semester" data-placeholder="Pilih Semester">
                    <option value="">Pilih...</option>
                    @foreach ($semester as $p)
                        <option value="{{ $p->semester }}" {{ request('id_semester') == $p->semester ? 'selected' : '' }}>
                            {{ $p->semester }}
                        </option>
                    @endforeach
                </select>
            </div>
        `;

            // Set action form pakai JS
            const form = document.getElementById("printForm");
            form.action = `{{ url('report_nilai_mahasiswa') }}/${nim}`;

            initializeSelect2();
            const modal = document.getElementById("modal-print");
            modal.classList.remove("hidden");
        }

        function closeModalPrint(event) {
            event.preventDefault(); // Mencegah form submit
            const modal = document.getElementById("modal-print");
            modal.classList.add("hidden");
        }
    </script>
</x-app-layout>
