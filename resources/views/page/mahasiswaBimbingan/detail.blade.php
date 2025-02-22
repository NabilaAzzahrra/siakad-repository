<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Bimbingan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-3xl mb-4">
                        <div class="relative overflow-x-auto rounded-lg px-12 flex gap-5 justify-between">
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
                        </div>
                    </div>
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-3xl">
                        <div class="relative overflow-x-auto rounded-lg shadow-lg p-4">
                            <table
                                class="table table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border"
                                id="bimbingan-datatable">
                                <thead
                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            TANGGAL
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                PEMBAHASAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            <div class="flex items-center">
                                                KATEGORI BIMBINGAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
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
                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                {{ $no++ }}
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ date('d-m-Y', strtotime($m->tanggal)) }}
                                            </th>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->pembahasan }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->kategori_bimbingan }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                <a
                                                    href="{{ route('mahasiswaBimbingan.verifikasi', $m->id) }}">{{ $m->verifikasi === 'SUDAH' ? 'Ubah ke BELUM' : 'Ubah ke SUDAH' }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-full p-3">
                    <iframe src="{{ asset('lapBab/' . $pengajuan->file) }}" frameborder="0"
                        style="width: 100%; height: 500px;"></iframe>
                </div>
            </div>
            <div class="bg-white p-4 shadow-lg rounded-3xl">
                <div class="bg-gray-100 px-4 py-2 text-center uppercase font-bold">Input Nilai Mahasiswa Bimbingan
                    (Verifikasi : {{ $verifikasi }})</div>
                <div class="p-6">
                    <form action="{{ route('mahasiswaBimbingan.store') }}" method="post" {{ $formNilai }}>
                        @csrf
                        <div class="flex gap-5">
                            <input type="hidden" value="{{ $dataMahasiswa->nim }}" name="nim">
                            <div class="w-full">
                                <div>SIKAP</div>
                                <div><input
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="number" name="sikap" required></div>
                            </div>
                            <div class="w-full">
                                <div>INTENSITAS DAN KESUNGGUHAN BIMBINGAN</div>
                                <div><input
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="number" name="intensitasKesungguhan" required></div>
                            </div>
                            <div class="w-full">
                                <div>KEMAMPUAN DAN KEDALAMAN MATERI TUGAS AKHIR</div>
                                <div><input
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="number" name="kedalamanMateri" required></div>
                            </div>
                            <div>
                                <button type="submit">SIMPAN</button>
                            </div>
                        </div>
                    </form>

                    <div class="flex gap-5" {{ $tableNilai }}>
                        <div class="w-full">
                            <div>SIKAP</div>
                            <div><input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" value="{{ $sikap }}" readonly></div>
                        </div>
                        <div class="w-full">
                            <div>INTENSITAS DAN KESUNGGUHAN BIMBINGAN</div>
                            <div><input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" value="{{ $intensitasKesungguhan }}" readonly></div>
                        </div>
                        <div class="w-full">
                            <div>KEMAMPUAN DAN KEDALAMAN MATERI TUGAS AKHIR</div>
                            <div><input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" value="{{ $kedalamanMateri }}" readonly></div>
                        </div>
                    </div>

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
