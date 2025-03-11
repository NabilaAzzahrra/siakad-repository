<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Jadwal Pembelajaran') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="">
                                <div class="flex flex-col lg:flex-row items-center justify-between">
                                    <div class="flex -mb-6">
                                        <div class="w-10">
                                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA JADWAL PEMBELAJARAN
                                        </div>
                                    </div>
                                    <div class="flex gap-4 mb-2">
                                        <div class="mt-4">
                                            <a href="#" onclick="return filter()" class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-emerald-100 border border-dashed border-emerald-500 text-emerald-500 pl-4 pr-4 pt-2"><i class="fi fi-sr-filter mr-2 text-lg"></i> <span>Filter Jadwal</span></a>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('jadwal_reguler.create') }}" class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-sky-100 border border-dashed border-sky-500 text-sky-500 pl-4 pr-4 pt-2"><i class="fi fi-sr-add mr-2 text-lg"></i> <span>Input Jadwal</span></a>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('jadwal_reguler.print_jadwal') }}" target="_blank"
                                            class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-amber-100 border border-dashed border-amber-500 text-amber-500 pl-4 pr-4 pt-2"><i class="fi fi-sr-print mr-2 text-lg"></i> <span>Print Jadwal</span></a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border mt-2 border-black border-opacity-30">
                            </div>
                            <div class="flex w-full justify-center">
                                <div class="pt-3 w-full" style="width:100%;overflow-x:auto;">
                                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                            <!-- Form untuk entries -->
                                            <x-show-entries :route="route('jadwal_reguler.index')" :search="request()->search">
                                            </x-show-entries>
                                        </div>

                                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                            <form action="{{ route('jadwal_reguler.index') }}" method="GET"
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
                                    <div class="relative overflow-x-auto shadow-md rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI AJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            PENGAJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                            HARI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            SESI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                            PUKUL
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            SEMESTER
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                            SKS
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            RUANG
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                            KELAS
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            PROGRAM STUDI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        ACTION
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="jadwalRegulerTable">
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($jadwal_reguler as $key => $j)
                                                @php
                                                if($j->sesi2 == null){
                                                $sesi = $j->sesi1;
                                                $pukul = $j->pukul1;
                                                }else{
                                                $sesi = $j->sesi1 . ' - ' . $j->sesi2;
                                                $pukul = explode('-', $j->pukul1)[0] . ' - ' . explode('-', $j->pukul2)[1];
                                                }
                                                @endphp
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 text-center bg-gray-100">
                                                        {{ $jadwal_reguler->perPage() * ($jadwal_reguler->currentPage() - 1) + $key + 1 }}
                                                    </td>
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $j->materi_ajar }}
                                                    </th>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        {{ $j->nama_dosen }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $j->hari }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100 text-center">
                                                        {{ $sesi }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $pukul }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100 text-center">
                                                        {{ $j->semester }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $j->sks }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray- text-center">
                                                        {{ $j->ruang }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $j->kelas }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100 text-center">
                                                        {{ $j->jurusan }}
                                                    </td>
                                                    <td class="px-6 py-4 text-right">
                                                        <a href="{{ route('jadwal_reguler.show', $j->kode_jadwal) }}"
                                                            class="mr-2 hover:bg-green-100 text-green-600 pr-3 pl-4 py-3 rounded-xl text-xs border border-dashed border-green-600" title="Detail Jadwal Pembelajaran">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        @php
                                                        if ($j->sesi2 == null) {
                                                        @endphp
                                                        <a href="{{ route('jadwal_reguler.editJadwal', $j->id_jadwal) }}"
                                                            class="mr-2 hover:bg-amber-100 text-amber-600 pr-3 pl-4 py-3 rounded-xl text-xs border border-dashed border-amber-600" title="Update Jadwal Pembelajaran">
                                                            <i class="fa-solid fa-edit"></i>
                                                        </a>
                                                        @php
                                                        } else {
                                                        @endphp
                                                        <a href="{{ route('jadwal_reguler.edit', $j->id_jadwal) }}"
                                                            class="mr-2 hover:bg-amber-100 text-amber-600 pr-3 pl-4 py-3 rounded-xl text-xs border border-dashed border-amber-600" title="Update Jadwal Pembelajaran">
                                                            <i class="fa-solid fa-edit"></i>
                                                        </a>
                                                        @php
                                                        }
                                                        @endphp
                                                        <a onclick="return jadwalDelete('{{ $j->kode_jadwal }}', '{{ $j->materi_ajar }}')"
                                                            class="hover:bg-red-100 text-red-600 pr-4 pl-4 py-3 rounded-xl text-xs border border-dashed border-red-600" title="Hapus Jadwal Pembelajaran">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        @if ($jadwal_reguler->hasPages())
                                            {{ $jadwal_reguler->appends(request()->query())->links('vendor.pagination.custom') }}
                                        @else
                                            <div class="flex items-center justify-between">
                                                <nav class="flex justify-start">
                                                    <div class="text-sm flex gap-1">
                                                        <div>Showing</div>
                                                        <div class="font-bold">1</div>
                                                        <div>to</div>
                                                        <div class="font-bold">{{ count($jadwal_reguler) }}</div>
                                                        <div>of</div>
                                                        <div class="font-bold">{{ count($jadwal_reguler) }}</div>
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
            <h2 class="text-lg font-bold mb-4 bg-amber-50 pl-6 pr-6 p-2 rounded-xl">Filter Jadwal Pembelajaran Per Tahun Akademik</h2>
            <form id="filterForm" action="{{ route('jadwal_reguler.index') }}" method="get" class="w-full">

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
                <div class="flex flex-col w-full">
                    <select class="js-example-placeholder-single js-states form-control w-full" id="id_tahun_akademiks" name="id_tahun_akademiks" data-placeholder="Pilih Tahun Akademik">
                        <option value="">Pilih...</option>
                        @foreach ($tahunAkademik as $p)
                            <option value="{{ $p->id }}">{{ $p->tahunakademik }}</option>
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
