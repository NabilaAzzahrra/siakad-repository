<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Daftar Print Jadwal UTS') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="flex gap-5">
                        <div
                            class="w-full bg-white dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl p-6 mb-6">
                            <div class="flex gap-5 items-center justify-center">
                                <div class="w-full p-4 mb-4 text-sm border border-blue-800 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                    role="alert">
                                    Harap checklist terlebih dahulu untuk melakukan <span
                                        class="font-bold underline">print jadwal</span>
                                    🙏
                                </div>
                                <div class="-mt-4">
                                    <a href="#" onclick="return filter()"
                                        class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-emerald-100 border border-emerald-500 text-emerald-500 pl-4 pr-4 pt-2"><i
                                            class="fi fi-sr-filter mr-2 text-lg"></i> <span>Filter
                                            Mahasiswa</span></a>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-0 " style="width:100%;overflow-x:auto;">
                                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                            <!-- Form untuk entries -->
                                            <x-show-entries :route="route('ujian_uts.daftar_print_uts')" :search="request()->search">
                                            </x-show-entries>
                                        </div>

                                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                            <form action="{{ route('ujian_uts.daftar_print_uts') }}" method="GET"
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
                                    <form action="{{ route('ujian_uts.print_kartu_uts') }}" method="POST"
                                        class="formupdate" target="_blank">
                                        @csrf
                                        <input type="hidden" name="kelas" value="{{ request('kelas', '') }}">
                                        <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <input type="checkbox" class="rounded-md"
                                                                onchange="checkAll(this)" name="check">
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
                                                            TINGKAT
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NO HANDPHONE
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            STATUS
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($mahasiswa && $mahasiswa->isNotEmpty())
                                                        @php
                                                            $no = $mahasiswa->firstItem();
                                                        @endphp
                                                        @foreach ($mahasiswa as $i)
                                                            <tr
                                                                class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                                <td class="px-6 py-3 text-center bg-gray-100">
                                                                    <input type="checkbox" class="rounded-md"
                                                                        name="user_id[]" value="{{ $i->nim }}">
                                                                </td>
                                                                <td class="px-6 py-4 text-center">
                                                                    {{ $no++ }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center bg-gray-100">
                                                                    {{ $i->nim }}
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
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <div class="bg-gray-500 text-white p-3 rounded shadow-sm mb-3">
                                                            Data Belum Tersedia!
                                                        </div>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="flex items-end justify-end mt-5">
                                            <button
                                                class="mb-3 p-2 text-sm lg:mb-2 lg:p-2 bg-sky-100 hover:bg-sky-400 text-sky-500 border border-sky-500 hover:text-white rounded-xl flex items-end justify-end">
                                                <i class="fi fi-sr-print mr-2 ml-4"></i> <span
                                                    class="pr-4">Print</span>
                                            </button>
                                        </div>
                                        <div class="mt-4">
                                            @if ($mahasiswa && $mahasiswa->hasPages())
                                                {{ $mahasiswa->appends(request()->query())->links('vendor.pagination.custom') }}
                                            @elseif ($mahasiswa && $mahasiswa->count())
                                                <div class="flex items-center justify-between">
                                                    <nav class="flex justify-start">
                                                        <div class="text-sm flex gap-1">
                                                            <div>Showing</div>
                                                            <div class="font-bold">1</div>
                                                            <div>to</div>
                                                            <div class="font-bold">{{ count($mahasiswa) }}</div>
                                                            <div>of</div>
                                                            <div class="font-bold">{{ count($mahasiswa) }}</div>
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
                                    </form>
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
            <form id="filterForm" action="{{ route('ujian_uts.daftar_print_uts') }}" method="get" class="w-full">

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
                <div class="flex flex-col w-full gap-5">
                        <select class="js-example-placeholder-single js-states form-control w-full" id="tahun_angkatan" name="tahun_angkatan" data-placeholder="Pilih Tahun Angkatan">
                            <option value="">Pilih...</option>
                            @foreach ($tahun_angkatan as $p)
                                <option value="{{ $p->tahun_angkatan }}">{{ $p->tahun_angkatan }}</option>
                            @endforeach
                        </select>
                        <select class="js-example-placeholder-single js-states form-control w-full" id="kelas" name="kelas" data-placeholder="Pilih Kelas">
                            <option value="">Pilih...</option>
                            @foreach ($kelas as $p)
                                <option value="{{ $p->id }}">{{ $p->kelas }}</option>
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
    </script>
</x-app-layout>
