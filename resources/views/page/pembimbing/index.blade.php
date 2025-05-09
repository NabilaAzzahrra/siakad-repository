<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Dosen Pembimbing') }}
        </P>
    </x-slot>

    <div class="py-12 px-6">
        <div class="lg:grid lg:grid-cols-2 gap-5">

            <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <div class="w-10">
                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                        </div>
                        <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                            DOSEN
                        </div>
                    </div>
                    <hr class="border mt-2 mb-4 border-black border-opacity-30">
                    <form action="{{ route('dosenPembimbing.store') }}" method="post">
                        @csrf
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
                            <button
                                class="text-blue-700 border-2 border-dashed border-blue-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <div class="w-10">
                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                        </div>
                        <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                            DOSEN PEMBIMBING
                        </div>
                    </div>
                    <hr class="border mt-2 mb-4 border-black border-opacity-30">
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
