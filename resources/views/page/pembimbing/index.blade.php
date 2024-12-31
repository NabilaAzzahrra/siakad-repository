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
                    PILIH Dosen
                </div>
                <form action="{{ route('dosenPembimbing.store') }}" method="post">
                    @csrf
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
                                        DOSEN
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if ($dataDosen->isNotEmpty())
                                    @foreach ($dataDosen as $m)
                                        @php
                                            // Cek apakah ada nilai yang sudah ada untuk jadwal ini
                                            $dosen_ada = $data->where('id_dosen', $m->id)->isNotEmpty();
                                        @endphp

                                        @if ($dosen_ada)
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center bg-gray-100" colspan="7">
                                                    <span class="text-red-600">Data Sudah Ada untuk
                                                        {{ $m->nama_dosen }}</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center bg-gray-100">
                                                    <input type="checkbox" class="rounded-md" name="user_id[]"
                                                        value="{{ $m->id }}">
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $m->nama_dosen }}
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        <button class="bg-sky-500 text-white p-2 rounded-xl">Submit</button>
                    </div>
                </form>
            </div>
            <div class="w-full p-4 bg-white rounded-xl shadow-xl">
                <div
                    class="lg:p-6 p-2 mb-6 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                    Dosen Pembimbing
                </div>
                <div class="relative overflow-x-auto rounded-lg shadow-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                        <thead
                            class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                    NO
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    DOSEN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $m)
                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 text-center bg-gray-100">{{ $no++ }}</td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $m->dosen->nama_dosen }}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
