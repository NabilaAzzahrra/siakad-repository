<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('OJT') }}
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
                            <hr class="border mt-2 border-black border-opacity-30">
                        </div>
                        <form action="{{ route('ojt.store') }}" method="POST" class="formupdate">
                            @csrf
                            <div class="flex justify-end">
                                <button type="button" onclick="konfirmasiSubmit()" class="mb-4 p-2 border border-sky-600 hover:bg-sky-100 text-sky-600 rounded-xl">
                                    SUBMIT
                                </button>
                            </div>
                            <input type="hidden" name="kelas" value="{{ request('kelas', '') }}">
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
                                                TAHUN ANGKATAN
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center w-44">
                                                NILAI
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse($mahasiswa as $i)
                                            @php
                                                $nilaiOjt = DB::table('ojt')->where('nim', $i->nim)->first();
                                                $nilai = $nilaiOjt->nilai ?? 0;
                                            @endphp
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
                                                    <input type="hidden" class="rounded-md" name="user_id[]"
                                                        value="{{ $i->nim }}">
                                                </td>
                                                <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                                    {{ $i->kelas }}
                                                </td>
                                                <td class="px-6 py-4 text-left">
                                                    {{ $i->jurusan }}
                                                </td>
                                                <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                                    {{ $i->tahun_angkatan }}
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <input type="number" value="{{ $nilai }}" name="nilai[]"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center w-full">
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
            <form id="filterForm" action="{{ route('ojt.index') }}" method="get" class="w-full">

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
    <script>
        function konfirmasiSubmit() {
            if (confirm("Apakah Anda yakin ingin menyimpan data ini?")) {
                document.querySelector('.formupdate').submit();
            }
        }
    </script>
</x-app-layout>
