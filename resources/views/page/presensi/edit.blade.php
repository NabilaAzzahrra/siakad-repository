<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Presensi</div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center items-start">
                <div class="w-full md:w-full p-3">
                    <form action="{{ route('presensi.update', $presensi->id_presensi) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" id="id_presensi" name="id_presensi"
                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                            placeholder="Masukkan Id Presensi disini" value="{{ $presensi->id_presensi }}">
                        <input type="hidden" id="id_jadwal" name="id_jadwal"
                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                            placeholder="Masukkan Id Presensi disini" value="{{ $presensi->id_jadwal }}">
                        <div class="flex flex-col lg:flex-row gap-5 items-start justify-center">
                            <div
                                class="bg-white w-[70%] dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl mb-5 p-5">
                                <div class="flex flex-col lg:flex-row items-center justify-between mb-4">
                                    <div class="flex -mb-6">
                                        <div class="w-10">
                                            <img src="{{ url('img/file.png') }}" alt="Icon 1" class="">
                                        </div>
                                        <div
                                            class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                            DATA JADWAL PEMBELAJARAN
                                        </div>
                                    </div>
                                </div>
                                <hr class="border mt-8 border-black border-opacity-30">
                                <div class="mt-4 p-8">
                                    <div class="w-full">
                                        <div class="font-bold text-amber-500">
                                            DATA PRESENSI
                                        </div>
                                        <hr class="border w-32 mt-1 border-opacity-30 border-amber-500 border-dashed">
                                        <div class="mt-1">
                                            <div class="flex gap-5">
                                                <div class="w-1/2">
                                                    <table>
                                                        <tr>
                                                            <th class="text-left">Materi Ajar</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ $presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Pengajar</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td class="text-wrap">
                                                                {{ $presensi->jadwal->dosen->nama_dosen }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Hari</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ $presensi->jadwal->hari->hari }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Sesi</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ optional($presensi->jadwal->sesi2)->sesi ? $presensi->jadwal->sesi->sesi . '-' . optional($presensi->jadwal->sesi2)->sesi : $presensi->jadwal->sesi->sesi }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Pukul</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{!! optional($presensi->jadwal->sesi2)->pukul
                                                                ? $presensi->jadwal->sesi->pukul->pukul .
                                                                    ' <span class="font-bold">s/d</span> ' .
                                                                    optional($presensi->jadwal->sesi2->pukul)->pukul
                                                                : $presensi->jadwal->sesi->pukul->pukul !!}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="w-full">
                                                    <table>
                                                        <tr>
                                                            <th class="text-left">Semester/SKS</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ $presensi->jadwal->detail_kurikulum->materi_ajar->semester->semester }}/{{ $presensi->jadwal->detail_kurikulum->materi_ajar->sks }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Tahun Akademik</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ $presensi->jadwal->tahun_akademik->tahunakademik }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Ruang</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ $presensi->jadwal->ruang->ruang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Kelas</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ $presensi->jadwal->kelas->kelas }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Program Studi</th>
                                                            <td class="pl-2 pr-2">:</td>
                                                            <td>{{ $presensi->jadwal->kelas->jurusan->jurusan }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-4">
                                        <div class="font-bold text-amber-500">
                                            DATA MENGAJAR
                                        </div>
                                        <hr class="border w-32 mt-1 border-opacity-30 border-amber-500 border-dashed">
                                        <div class="mt-4">
                                            <table>
                                                <tr>
                                                    <td class="pr-2">
                                                        <div
                                                            class="block mb-1 text-sm text-gray-900 dark:text-white font-bold">
                                                            Materi</div>
                                                    </td>
                                                    <td class="w-full">
                                                        <input id="materi" name="materi"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4"
                                                            placeholder="Masukan Materi disini ..."
                                                            value="{{ $presensi->materi }}"
                                                            oninput="this.value = this.value.toUpperCase();">
                                                        <p id="error-materi" class="mt-2 text-sm text-red-500 hidden">
                                                            Materi wajib
                                                            diisi.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-2">
                                                        <div
                                                            class="block mb-1 text-sm text-gray-900 dark:text-white font-bold">
                                                            Materi Sebelumnya</div>
                                                    </td>
                                                    <td class="w-full">
                                                        <input id="materi_sebelumnya" name="materi_sebelumnya"
                                                            class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4"
                                                            placeholder="Masukan Materi disini ..."
                                                            value="{{ $presensi->file_materi }}"
                                                            oninput="this.value = this.value.toUpperCase();" readonly>
                                                        <p id="error-materi_sebelumnya"
                                                            class="mt-2 text-sm text-red-500 hidden">
                                                            Materi wajib
                                                            diisi.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-2">
                                                        <div
                                                            class="block mb-1 text-sm text-gray-900 dark:text-white font-bold">
                                                            File Materi</div>
                                                    </td>
                                                    <td>
                                                        <input id="file" name="file" type="file"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Masukan Materi disini ..."
                                                            oninput="this.value = this.value.toUpperCase();">
                                                        <p id="error-file" class="mt-2 text-sm text-red-500 hidden">
                                                            Materi wajib
                                                            diisi.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="font-bold text-amber-500">
                                            DATA PRESENSI
                                        </div>
                                        <hr class="border w-32 mt-1 border-opacity-30 border-amber-500 border-dashed">
                                        <div class="mt-2 ">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NO
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NIM
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NAMA
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            KETERANGAN
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($mahasiswa as $pr)
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-10">
                                                                {{ $no++ }}
                                                            </th>
                                                            <td class="px-6 py-4 w-56">
                                                                {{ $pr->nim }}
                                                                <input type="text" id="nim" name="nim[]"
                                                                    class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                                    value="{{ $pr->nim }}" hidden>
                                                            </td>
                                                            <td class="px-6 py-4 w-[500px] text-wrap">
                                                                {{ $pr->mahasiswa->nama }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <select
                                                                    class="select-keterangan form-control w-full m-2"
                                                                    name="keterangan[]"
                                                                    data-placeholder="Pilih Keterangan">
                                                                    <option value="">Pilih...</option>
                                                                    <option value="HADIR"
                                                                        {{ $pr->keterangan == 'HADIR' ? 'selected' : '' }}>
                                                                        HADIR
                                                                    </option>
                                                                    <option value="SAKIT"
                                                                        {{ $pr->keterangan == 'SAKIT' ? 'selected' : '' }}>
                                                                        SAKIT
                                                                    </option>
                                                                    <option value="IZIN"
                                                                        {{ $pr->keterangan == 'IZIN' ? 'selected' : '' }}>
                                                                        IZIN
                                                                    </option>
                                                                    <option value="ALPA"
                                                                        {{ $pr->keterangan == 'ALPA' ? 'selected' : '' }}>
                                                                        ALPA
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="text-blue-500 border border-blue-500 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <i class="fi fi-rr-disk mr-2 mt-2"></i> <span>Simpan Presensi</span>
                                        </button>
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
