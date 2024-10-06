<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('KRS Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="lg:grid lg:grid-cols-2 gap-5">
            <div class="w-full p-4 bg-white rounded-xl shadow-xl">
                <div
                    class="lg:p-6 p-2 mb-6 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                    PILIH KRS
                </div>
                <form action="{{ route('krs_mhs.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="nim" value="{{ Auth::user()->email }}">
                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                            <thead
                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <input type="checkbox" class="rounded-md" onchange="checkAll(this)"
                                            name="check">
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        MATERI AJAR
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <div class="flex items-center">
                                            PENGAJAR
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center">
                                            SKS
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <div class="flex items-center">
                                            HARI
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center">
                                            PUKUL
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        <div class="flex items-center">
                                            RUANGAN
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $total_sks = 0;
                                @endphp
                                @if ($jadwal->isNotEmpty())
                                    @foreach ($jadwal as $m)
                                        @php
                                            // Cek apakah ada nilai yang sudah ada untuk jadwal ini
                                            $nilai_ada = $nilai->where('id_jadwal', $m->id_jadwal)->isNotEmpty();
                                        @endphp

                                        @if ($nilai_ada)
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center bg-gray-100" colspan="7">
                                                    <span class="text-red-600">Data Sudah Ada untuk {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}</span>
                                                </td>
                                            </tr>
                                        @else
                                            @php
                                                $total_sks += $m->detail_kurikulum->materi_ajar->sks;
                                            @endphp
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center bg-gray-100">
                                                    <input type="checkbox" class="rounded-md" name="user_id[]"
                                                        value="{{ $m->id_jadwal }}">
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}
                                                </th>
                                                <td class="px-6 py-4 bg-gray-100">
                                                    {{ $m->dosen->nama_dosen }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $m->detail_kurikulum->materi_ajar->sks }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-100">
                                                    {{ $m->hari->hari }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $m->sesi->pukul->pukul }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-100">
                                                    {{ $m->ruang->ruang }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th class="px-6 py-4 bg-gray-100 text-center" colspan="3">TOTAL SKS</th>
                                    <th class="px-6 py-4 text-center" colspan="4">{{ $total_sks }}</th>
                                </tr>
                            </tfoot>

                        </table>

                    </div>
                    <div class="mt-5">
                        <button class="bg-sky-500 text-white p-2 rounded-xl">Submit</button>
                    </div>
                </form>
            </div>
            <div class="w-full p-4"></div>
        </div>
    </div>
    <script>
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
