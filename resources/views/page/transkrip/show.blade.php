<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Transkrip') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            {{-- <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">NIM</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Jurusan</th>
                        <th class="px-6 py-3">Nomor Transkrip</th>
                        <th class="px-6 py-3">Kode Bulan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stu_data as $index => $student)
                        @php
                            $data = $userTranskripData[$index] ?? null;
                            $no_mahasiswa = $data['no_mahasiswa'] ?? '-';
                            $bulanKode = '';

                            if (preg_match('/^\d{4}-\d{2}$/', $bulan_tahuns)) {
                                [$tahun, $bln] = explode('-', $bulan_tahuns);
                                $bulanKode = $bln . substr($tahun, 2);
                            }
                        @endphp
                        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $student->nim }}</td>
                            <td class="px-6 py-4">{{ $student->nama }}</td>
                            <td class="px-6 py-4">{{ $student->jurusan }}</td>
                            <td class="px-6 py-4 text-center">{{ $no_mahasiswa }}</td>
                            <td class="px-6 py-4 text-center">{{ $bulanKode }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}

            {{-- <div class="mt-6">
                <a href="{{ route('transkrip.index') }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Kembali
                </a>
            </div> --}}
            <div
                class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl p-6 mb-6">
                <form action="{{ route('transkrip.storeTranskrip') }}" method="POST" class="formupdate">
                    @csrf
                    <div class="flex justify-between">
                        <div class="flex items-center w-full mr-4 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                Berikut Merupakan Preview <span class="font-medium">kode transkrip</span> untuk di simpan. Mohon cek kembali sebelum melakukan submit
                            </div>
                        </div>
                        <button
                            class="mb-4 p-2 border border-sky-600 w-[100px] hover:bg-sky-100 text-sky-600 rounded-xl">
                            SUBMIT
                        </button>
                    </div>
                    <input type="hidden" name="semester" value="{{ request('semester', '') }}">
                    <input type="hidden" name="kurikulum" value="{{ request('kurikulum', '') }}">
                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
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
                                        KODE TRANSKRIP
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse($stu_data as $index => $student)
                                    @php
                                        $data = $userTranskripData[$index] ?? null;
                                        $no_mahasiswa = $data['no_mahasiswa'] ?? '-';
                                        $bulanKode = '';

                                        if (preg_match('/^\d{4}-\d{2}$/', $bulan_tahuns)) {
                                            [$tahun, $bln] = explode('-', $bulan_tahuns);
                                            $bulanKode = $bln . substr($tahun, 2);
                                        }
                                    @endphp
                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            {{ $student->nim }}
                                            <input type="hidden" class="rounded-md" name="user_id[]" value="{{ $student->nim }}">
                                        </td>
                                        <td class="px-6 py-4 text-left">
                                            {{ $student->nama }}
                                        </td>
                                        <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                            {{ $student->kelas }}
                                            <input type="hidden" name="id_kelas[]" value="{{ $student->id_kelas }}">
                                        </td>
                                        <td class="px-6 py-4 text-left">
                                            {{ $student->jurusan }}
                                            <input type="hidden" name="id_jurusan[]" value="{{ $student->jurusan }}">
                                        </td>
                                        <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                            {{ $no_mahasiswa }}.T001.025T.{{ $bulan_tahuns }}
                                            <input type="hidden" class="rounded-md" name="noTranskrip[]" value="{{ $no_mahasiswa }}.T001.025T.{{ $bulan_tahuns }}">
                                            <input type="hidden" class="rounded-md" name="noMhs[]" value="{{ $no_mahasiswa }}">
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
</x-app-layout>
