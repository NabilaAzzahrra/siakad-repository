<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pukul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="flex gap-5 items-start ">
                        <div class="bg-white w-[500px] dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100 overflow-hidden">
                                <div
                                    class="bg-sky-200 p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px]">
                                    DATA MATERI AJAR
                                </div>
                                <div class="mt-5">
                                    <div class="flex gap-5 mb-5">
                                        <div class="w-full" hidden>
                                            <label for="id_presensi"
                                                class="block text-sm font-medium text-gray-700">Kode
                                                Presensi</label>
                                            <input type="text" id="id_presensi" name="id_presensi"
                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                placeholder="Masukkan Id Presensi disini"
                                                value="{{ $presensi->id_presensi }}" readonly>
                                        </div>
                                        <div class="w-full" hidden>
                                            <label for="id_jadwal" class="block text-sm font-medium text-gray-700">Kode
                                                Jadwal</label>
                                        </div>
                                        <div class="w-full">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Materi
                                                Ajar</label>
                                            <input type="text" id="name"
                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                placeholder="Enter your name"
                                                value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}"
                                                readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="name" class="block text-sm font-medium text-gray-700">SKS /
                                                Semester</label>
                                            <input type="text" id="name"
                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                placeholder="Enter your name"
                                                value="{{ $presensi->jadwal->detail_kurikulum->materi_ajar->sks }} / {{ $presensi->jadwal->detail_kurikulum->materi_ajar->semester->semester }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="w-full mb-5">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700">Dosen</label>
                                        <input type="text" id="nama_dosen"
                                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                            placeholder="Enter your name"
                                            value="{{ $presensi->jadwal->dosen->nama_dosen }}" readonly>
                                    </div>
                                    <div class="w-full mb-5">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700">Kelas</label>
                                        <input type="text" id="name"
                                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                            placeholder="Enter your name" value="{{ $presensi->jadwal->kelas->kelas }}"
                                            readonly>
                                    </div>
                                    <div class="w-full mb-5">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700">Jurusan</label>
                                        <input type="text" id="name"
                                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                            placeholder="Enter your name"
                                            value="{{ $presensi->jadwal->kelas->jurusan->jurusan }}" readonly>
                                    </div>
                                    <div class="flex gap-5">
                                        <div class="w-full">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Tahun
                                                Akademik</label>
                                            <input type="text" id="name"
                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                placeholder="Enter your name"
                                                value="{{ $presensi->jadwal->tahun_akademik->tahunakademik }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="flex gap-5">
                                    <div
                                        class="bg-sky-200 p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[20px] w-full">
                                        FORM INPUT PRESENSI
                                    </div>
                                    @php
                                        if ($nilaiMateri->verifikasi == 0) {
                                            $text = 'BELUM VERIFIKASI';
                                            $route = route('nilai.nilai_verifikasi', $nilaiMateri->id_jadwal);
                                        } else {
                                            $text = 'SUDAH VERIFIKASI';
                                            $route = null;
                                        }
                                    @endphp

                                    @if ($route)
                                        <form action="{{ $route }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" value="1" name="verifikasi">
                                            <button type="submit"
                                                class="bg-sky-200 p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[18px] w-[300px]">
                                                <i class="fi fi-sr-cross-circle flex items-center text-red-500 mr-3"></i> {{ $text }}
                                            </button>
                                        </form>
                                    @else
                                        <button disabled
                                            class="bg-gray-200 p-3 rounded-xl font-extrabold text-gray-800 flex items-center justify-center text-[18px] w-[300px]">
                                            <i class="fi fi-sr-check-circle flex items-center text-green-500 mr-3"></i> {{ $text }}
                                        </button>
                                    @endif

                                </div>
                                <form action="{{ route('nilai.update', $nilaiMateri->id_jadwal) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="overflow-hidden rounded-xl border mt-5 mb-5">
                                        <input type="hidden" id="id_jadwal" name="id_jadwal"
                                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                            placeholder="Masukkan Id Jadwal disini" value="{{ $presensi->id_jadwal }}"
                                            readonly>
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400 rounded-t-xl">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NIM
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center justify-center">
                                                            NAMA
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center justify-center">
                                                            PRESENSI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center justify-center">
                                                            TUGAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center justify-center">
                                                            FORMATIF
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center justify-center">
                                                            UAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center justify-center">
                                                            UTS
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($nilai as $m)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->nim }}
                                                            <input type="hidden" id="nim" name="nim[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                                value="{{ $m->nim }}" readonly>
                                                            <input type="hidden" id="id_nilai" name="id_nilai[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                                value="{{ $m->id_nilai }}" readonly>
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100 uppercase">
                                                            {{ $m->mahasiswa->nama }}
                                                            <input type="hidden" id="nama" name="nama[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->mahasiswa->nama }}" readonly>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="presensi" name="presensi[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->presensi }}" readonly>
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            <input type="text" id="tugas" name="tugas[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->tugas }}">
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="formatif" name="formatif[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->formatif }}">
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            <input type="text" id="uts" name="uts[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->uts }}">
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="uas" name="uas[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->uas }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function verifyNilai(route, idJadwal) {
            if (idJadwal) {
                fetch(route, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        ruang: 1
                    })
                }).then(response => {
                    return response.json().then(data => ({
                        status: response.status,
                        body: data
                    }));
                }).then(obj => {
                    if (obj.status === 200) {
                        alert('Data Nilai Sudah diupdate');
                        location.reload(); // Reload the page to reflect the changes
                    } else {
                        console.error('Response:', obj.body);
                        alert(`Gagal mengupdate nilai. Status: ${obj.status}`);
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
            }
        }
    </script>
</x-app-layout>
