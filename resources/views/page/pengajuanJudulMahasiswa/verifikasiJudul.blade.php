<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Pengajuan Judul') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-3xl mb-4">
                        {{-- <div class="relative overflow-x-auto rounded-lg px-12 flex gap-5 justify-between">
                            <div class="bg-amber-50 p-4 w-full rounded-2xl">
                                <table class="w-full">
                                    <tr>
                                        <td>Nama</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $dataMahasiswa->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nim</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $dataMahasiswa->nim }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-amber-50 p-4 w-full rounded-2xl">
                                <table>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $dataMahasiswa->kelas->jurusan->jurusan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dosen Pembimbing</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="relative overflow-x-auto rounded-lg px-12 flex gap-5 justify-between">
                            <div class="bg-amber-50 p-4 w-full rounded-2xl text-center">
                                Jumlah Bimbingan : <span
                                    class="bg-emerald-100 p-2 rounded-xl font-bold">{{ count($data) }}</span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-3xl">
                        <div class="relative overflow-x-auto rounded-lg shadow-lg p-4">
                            @php
                                $no = 1;
                                $hasVerified = $data->contains('verifikasi', 'SUDAH'); // Cek apakah ada data yang sudah diverifikasi
                            @endphp
                            <table
                                class="table table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border"
                                id="bimbingan-datatable">
                                <thead
                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            JUDUL YANG DIAJUKAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            <div class="flex items-center">
                                                VERIFIKASI
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="mahasiswaTable">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $m)
                                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 text-center">
                                                {{ $no++ }}
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $m->judul }}
                                            </th>
                                            <td
                                                class="px-6 py-4 text-center flex items-center justify-center">
                                                @if (!$hasVerified || $m->verifikasi === 'SUDAH')
                                                    <a
                                                        href="{{ $m->verifikasi === 'SUDAH' ? '#' : route('pengajuanJudulMahasiswa.verifikasi', $m->id) }}">
                                                        <img src="{{ $m->verifikasi === 'SUDAH' ? '/img/check.png' : '/img/delete.png' }}"
                                                            alt="{{ $m->verifikasi === 'SUDAH' ? 'Sudah Verifikasi' : 'Belum Verifikasi' }}"
                                                            class="w-5 text-center">
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-full p-3">
                    <iframe src="{{ asset('lapBab/' . $pengajuan->file) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#bimbingan-datatable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                },
                "paging": true,
                "searching": true,
                "info": true,
                "ordering": true,
            });
        });
    </script>

</x-app-layout>
