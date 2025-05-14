<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Presensi Mahasiswa') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-amber-300 font-bold rounded-xl">
                                <div class="flex items-center justify-between">
                                    <div>DATA JADWAL</div>
                                    <a href="{{ route('report_presensi_mahasiswa.show', $mahasiswa->nim) }}"
                                        target="_blank" class="bg-sky-300 text-white p-2 rounded-xl">PRINT</a>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row items-center justify-between">
                                <div class="flex -mb-6">
                                    <div class="w-10">
                                        <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                    </div>
                                    <div
                                        class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                        DATA UAS
                                    </div>
                                </div>
                                <div class="flex gap-4 mb-2">
                                    <div class="mt-4">
                                        <a href="{{ route('ujian_uas_mhs.print_uas_mhs') }}" target="_blank"
                                            class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-amber-100 border border-dashed border-amber-500 text-amber-500 pl-4 pr-4 pt-2"><i
                                                class="fi fi-sr-print mr-2 text-lg"></i> <span>Print
                                                Jadwal</span></a>
                                    </div>
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30">
                            @can('role-A')
                                <form action="" method="GET">
                                    <div class="flex items-start justify-start gap-5 px-12">
                                        <div class="mb-5 mt-6 w-[400px]">
                                            <label for="id_semester"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                                id="id_semester" name="id_semester" data-placeholder="Pilih semester">
                                                <option value="">Pilih...</option>
                                                @foreach ($semester as $p)
                                                    <option value="{{ $p->semester }}"
                                                        {{ request('id_semester') == $p->semester ? 'selected' : '' }}>
                                                        {{ $p->semester }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex justify-end mt-[54px]">
                                            <button class="mb-4 p-2 bg-sky-400 text-white rounded-xl">
                                                FILTER
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endcan

                            @can('role-M')
                                <form action="{{ route('report_presensi_mahasiswa.edit', Auth::user()->email) }}"
                                    method="GET">
                                    <div class="flex items-start justify-start gap-5 px-12">
                                        <div class="mb-5 mt-6 w-[400px]">
                                            <label for="id_semester"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                                id="id_semester" name="id_semester" data-placeholder="Pilih semester">
                                                <option value="">Pilih...</option>
                                                @foreach ($semester as $p)
                                                    <option value="{{ $p->semester }}"
                                                        {{ request('id_semester') == $p->semester ? 'selected' : '' }}>
                                                        {{ $p->semester }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex justify-end mt-[54px]">
                                            <button class="mb-4 p-2 bg-sky-400 text-white rounded-xl">
                                                FILTER
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endcan

                            @can('role-O')
                                <form action="" method="GET">
                                    <div class="flex items-start justify-start gap-5 px-12">
                                        <div class="mb-5 mt-6 w-[400px]">
                                            <label for="id_semester"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester
                                                <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                                id="id_semester" name="id_semester" data-placeholder="Pilih semester">
                                                <option value="">Pilih...</option>
                                                @foreach ($semester as $p)
                                                    <option value="{{ $p->semester }}"
                                                        {{ request('id_semester') == $p->semester ? 'selected' : '' }}>
                                                        {{ $p->semester }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex justify-end mt-[54px]">
                                            <button class="mb-4 p-2 bg-sky-400 text-white rounded-xl">
                                                FILTER
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endcan

                            <div class="flex justify-center">
                                <div class="lg:p-12 p-2" style="width:100%;overflow-x:auto;">
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI AJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        SEMESTER
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            PENGAJAR
                                                        </div>
                                                    </th>
                                                    @for ($i = 1; $i <= 14; $i++)
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">
                                                                P {{ $i }}
                                                            </div>
                                                        </th>
                                                    @endfor
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($jadwal as $m)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->detail_kurikulum->materi_ajar->materi_ajar }}
                                                        </th>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->detail_kurikulum->materi_ajar->semester->semester }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->dosen->nama_dosen }}
                                                        </td>
                                                        @for ($i = 1; $i <= 14; $i++)
                                                            <td class="px-6 py-4">
                                                                @php
                                                                    $presensi =
                                                                        $presensiPerPertemuan[$m->id_jadwal][
                                                                            'P' . $i
                                                                        ] ?? null;
                                                                @endphp
                                                                {{ $presensi ? $presensi->keterangan : '-' }}
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
