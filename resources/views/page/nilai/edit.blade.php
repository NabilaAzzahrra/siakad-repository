<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Nilai') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <form action="{{ route('nilai.update', $presensi->id_jadwal) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" id="id_presensi" name="id_presensi"
                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                            placeholder="Masukkan Id Presensi disini" value="{{ $presensi->id_presensi }}" readonly>
                        <input type="hidden" id="id_jadwal" name="id_jadwal"
                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                            placeholder="Masukkan Id Jadwal disini" value="{{ $presensi->id_jadwal }}" readonly>
                        <div
                            class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                            <div class="px-6 pb-4 text-gray-900 dark:text-gray-100">
                                <div class="px-4">
                                    <div class="flex mt-4 mb-2">
                                        <div class="w-10">
                                            <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA NILAI
                                        </div>
                                    </div>
                                    <hr class="border mt-2 border-black border-opacity-30">
                                </div>
                                <div class="flex w-full justify-center px-12">
                                    <div class="pt-3 px-4 w-full" style="width:100%;overflow-x:auto;">
                                        <div class="font-bold text-amber-500">--- Data Materi Ajar ---</div>
                                        <div class="flex items-center gap-12">
                                            <table>
                                                <tr>
                                                    <th class="text-left">Materi Ajar</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">SKS/Semester</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $presensi->jadwal->detail_kurikulum->materi_ajar->sks }} /
                                                        {{ $presensi->jadwal->detail_kurikulum->materi_ajar->semester->semester }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Dosen</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $presensi->jadwal->dosen->nama_dosen }}</td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>
                                                    <th class="text-left">Kelas</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $presensi->jadwal->kelas->kelas }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Program Studi</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $presensi->jadwal->kelas->jurusan->jurusan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-left">Tahun Akademik</th>
                                                    <td class="pl-2 pr-2">:</td>
                                                    <td>{{ $presensi->jadwal->tahun_akademik->tahunakademik }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="flex mt-4 items-center justify-between">
                                            <div class="font-bold text-amber-500">--- Form Input Presensi ---</div>

                                            <div class="{{$nilaiMateri->verifikasi == 0 ? 'bg-red-100 px-4 py-1 rounded-3xl text-red-500' : 'bg-emerald-100 px-4 py-1 rounded-3xl text-emerald-500'}}">{{$nilaiMateri->verifikasi == 0 ? 'Belum Verifikasi' : 'Sudah Verifikasi'}}</div>
                                        </div>
                                        <div class="mt-2 ">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NO
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NIM
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NAMA
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            PRESENSI
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            TUGAS
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            FORMATIF
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            UAS
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            UTS
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($nilai as $pr)
                                                        @php
                                                            $jumlahPresensi = DB::table('detail_presensi')
                                                                ->join(
                                                                    'presensi',
                                                                    'presensi.id_presensi',
                                                                    '=',
                                                                    'detail_presensi.id_presensi',
                                                                )
                                                                ->join(
                                                                    'jadwal_reguler',
                                                                    'jadwal_reguler.id_jadwal',
                                                                    '=',
                                                                    'presensi.id_jadwal',
                                                                )
                                                                ->where('jadwal_reguler.id_jadwal', $pr->id_jadwal)
                                                                ->where('detail_presensi.nim', $pr->nim)
                                                                ->where('detail_presensi.keterangan', 'HADIR')
                                                                ->count();

                                                            $kehadiran = null;
                                                            $jumlah_hadir = $jumlahPresensi;
                                                            if ($jumlah_hadir < 14) {
                                                                $kehadiran = $jumlah_hadir * 7;
                                                            } else {
                                                                $kehadiran = 100;
                                                            }
                                                        @endphp
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-10 bg-gray-100">
                                                                {{ $no++ }}

                                                            </th>
                                                            <td class="px-6 py-4 w-56">
                                                                {{ $pr->nim }}
                                                                <input type="text" id="nim" name="nim[]"
                                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                                    value="{{ $pr->nim }}" hidden>
                                                                <input type="text" id="id_nilai" name="id_nilai[]"
                                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                                    value="{{ $pr->id_nilai }}" hidden>
                                                            </td>
                                                            <td class="px-6 py-4 w-[500px] text-wrap bg-gray-100">
                                                                {{ $pr->mahasiswa->nama }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <input type="text" id="presensi" name="presensi[]"
                                                                    value="{{ $kehadiran }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-14 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center"
                                                                    readonly>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                <input type="text" id="tugas" name="tugas[]"
                                                                    value="{{ $pr->tugas }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-14 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center"
                                                                    value="0">
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <input type="text" id="formatif" name="formatif[]"
                                                                    value="{{ $pr->formatif }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-14 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center"
                                                                    value="0">
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                <input type="text" id="uts" name="uts[]"
                                                                    value="{{ $pr->uts }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-14 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center"
                                                                    value="0">
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <input type="text" id="uas" name="uas[]"
                                                                    value="{{ $pr->uas }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-14 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center"
                                                                    value="0">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="mt-4">
                                                <button type="submit"
                                                    class="text-blue-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm border border-dashed border-blue-700 w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                        class="fi fi-rr-disk mr-2"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
