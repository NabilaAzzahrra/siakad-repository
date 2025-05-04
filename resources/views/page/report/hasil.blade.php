<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Report<i class="fi fi-rr-caret-right mt-1"></i> <span
                class="text-amber-100">Presensi</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div
                    class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                    <div class="flex px-12 pt-8">
                        <div class="w-10">
                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                        </div>
                        <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                            PRESENSI
                        </div>
                    </div>
                    <hr class="border mt-2 border-black border-opacity-30 mx-12">
                    <div class="mt-4 px-12 mb-6 flex gap-5 items-start">
                        <div
                            class="bg-white w-1/2 px-4 pt-4 pb-4 dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                            <table>
                                <tr>
                                    <td class="pr-2 pt-2"><i class="fi fi-ss-book-open-cover"></i></td>
                                    <td class="font-bold">Materi Ajar</td>
                                    <td class="pl-2 pr-2">:</td>
                                    <td class="text-wrap">{{ $jadwal->detail_kurikulum->materi_ajar->materi_ajar }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pr-2 pt-2"><i class="fi fi-sr-calendar-clock"></i></td>
                                    <td class="font-bold">Semester/SKS</td>
                                    <td class="pl-2 pr-2">:</td>
                                    <td>{{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }} /
                                        {{ $jadwal->detail_kurikulum->materi_ajar->sks }}</td>
                                </tr>
                                <tr>
                                    <td class="pr-2 pt-2"><i class="fi fi-sr-chalkboard-user"></i></td>
                                    <td class="font-bold">Pengajar</td>
                                    <td class="pl-2 pr-2">:</td>
                                    <td class="text-wrap">{{ $jadwal->dosen->nama_dosen }}</td>
                                </tr>
                                <tr>
                                    <td class="pr-2 pt-2"><i class="fi fi-sr-hourglass-start"></i></td>
                                    <td class="font-bold">Hari/Pukul</td>
                                    <td class="pl-2 pr-2">:</td>
                                    <td>{{ $jadwal->hari->hari }}/{{ $jadwal->sesi->pukul->pukul }} WIB</td>
                                </tr>
                            </table>
                        </div>
                        <div
                            class="bg-white w-full px-4 pb-4 dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                            <div class="flex justify-center">
                                <div class="lg:p-6 p-2" style="width:100%;  overflow-x:auto;">
                                    <div class="mb-4">
                                        <a href="{{ route('report_dosen.printPresensiDosen', $jadwal->id) }}"
                                            class="bg-amber-50 text-amber-500 border border-amber-500 hover:bg-amber-100 p-2 flex items-center justify-center font-bold rounded-xl">
                                            <i class="fi fi-sr-print mr-2 mt-1"></i> Print
                                        </a>
                                    </div>
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
                                                        PERTEMUAN
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        MATERI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        TANGGAL
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($presensi as $m)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                            {{ $m->pertemuan }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100 uppercase">
                                                            {{ $m->materi }}</td>
                                                        <td class="px-6 py-4  uppercase text-center">
                                                            @if ($m->tgl_presensi == null)
                                                                -
                                                            @else
                                                                {{ date('d-m-Y', strtotime($m->tgl_presensi)) }}
                                                            @endif
                                                        </td>
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
