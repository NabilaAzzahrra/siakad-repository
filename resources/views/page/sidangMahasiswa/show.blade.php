<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>DATA SIDANG</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-2" style="width:100%;overflow-x:auto;">
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                        <div class="flex p-4 gap-4">
                                            <div class="w-full">
                                                <div>Profile Mahasiswa</div>
                                                <div>
                                                    <img src="{{ url('img/user.png') }}" class="w-32 h-32"
                                                        alt="" srcset="">
                                                    <div>
                                                        <table>
                                                            <tr>
                                                                <td>NIM</td>
                                                                <td>:</td>
                                                                <td>{{ $data->mahasiswa->nim }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td>{{ $data->mahasiswa->nama }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kelas</td>
                                                                <td>:</td>
                                                                <td>{{ $data->mahasiswa->kelas->kelas }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jurusan</td>
                                                                <td>:</td>
                                                                <td>{{ $data->mahasiswa->kelas->jurusan->jurusan }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-2 p-4 rounded-xl w-full">
                                                <form action="{{ route('sidangMahasiswa.store') }}" method="post"
                                                    {{ $revisiForm }}>
                                                    @csrf
                                                    <input type="hidden" value="{{ $data->mahasiswa->nim }}"
                                                        name="nim">
                                                    <div class="flex gap-5 mb-5">
                                                        <div class="mt-6">BAB 1</div>
                                                        <div class="text-wrap">
                                                            <textarea name="bab_satu" id="bab_satu"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div>BAB 2</div>
                                                        <div class="text-wrap">
                                                            <textarea name="bab_dua" id="bab_dua"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div>BAB 3</div>
                                                        <div class="text-wrap">
                                                            <textarea name="bab_tiga" id="bab_tiga"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div>BAB 4</div>
                                                        <div class="text-wrap">
                                                            <textarea name="bab_empat" id="bab_empat"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div>BAB 5</div>
                                                        <div class="text-wrap">
                                                            <textarea name="bab_lima" id="bab_lima"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <button type="submit">Submit</button>
                                                    </div>
                                                </form>
                                                <div {{ $revisiTable }}>
                                                    <div class="flex gap-5 mb-5">
                                                        <div class="mt-6">BAB I</div>
                                                        <div class="text-wrap">
                                                            <textarea
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3" readonly>{{ $babSatu }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div class="mt-6">BAB II</div>
                                                        <div class="text-wrap">
                                                            <textarea
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3" readonly>{{ $babDua }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div class="mt-6">BAB III</div>
                                                        <div class="text-wrap">
                                                            <textarea
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3" readonly>{{ $babTiga }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div class="mt-6">BAB IV</div>
                                                        <div class="text-wrap">
                                                            <textarea
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3" readonly>{{ $babEmpat }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-5 mb-5">
                                                        <div class="mt-6">BAB V</div>
                                                        <div class="text-wrap">
                                                            <textarea
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                cols="120" rows="3" readonly>{{ $babLima }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <form action="{{ route('nilaiPenguji.store') }}" {{ $nilaiForm }}
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $data->mahasiswa->nim }}"
                                                        name="nim">
                                                    <table>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kemampuan Penilaian</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>PENAMPILAN</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" name="penampilan"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>BAHASA ASING/INGGRIS</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" name="bahasaAsing"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3.</td>
                                                            <td>BAHASA INDONESIA</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" name="bahasaIndonesia"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.</td>
                                                            <td>TEKNIK PRESENTASI</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" name="teknikPresentasi"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5.</td>
                                                            <td>METODA PENELITIAN DAN SISTEMATIKA PENULISAN</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" name="metodaPenelitian"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6.</td>
                                                            <td>PENGUASAAN DAN PEMAHAMAN TENTANG TUGAS AKHIR</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" name="penguasaanTugas"></td>
                                                        </tr>
                                                    </table>
                                                    <div class="flex gap-5 mb-5">
                                                        <button type="submit">Submit</button>
                                                    </div>
                                                </form>
                                                <div {{ $nilaiTable }}>
                                                    <table>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kemampuan Penilaian</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>PENAMPILAN</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" value="{{ $penampilan }}" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>BAHASA ASING/INGGRIS</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" value="{{ $bahasaAsing }}" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3.</td>
                                                            <td>BAHASA INDONESIA</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" value="{{ $bahasaIndonesia }}" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.</td>
                                                            <td>TEKNIK PRESENTASI</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" value="{{ $teknikPresentasi }}" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5.</td>
                                                            <td>METODA PENELITIAN DAN SISTEMATIKA PENULISAN</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" value="{{ $metodaPenelitian }}" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6.</td>
                                                            <td>PENGUASAAN DAN PEMAHAMAN TENTANG TUGAS AKHIR</td>
                                                            <td><input
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    type="number" value="{{ $penguasaanTeori }}" readonly>
                                                            </td>
                                                        </tr>
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
            </div>
        </div>
    </div>
</x-app-layout>
