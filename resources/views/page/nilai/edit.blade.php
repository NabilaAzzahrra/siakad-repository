<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            <div class="flex items-center">Nilai<i class="fi fi-rr-caret-right mt-1"></i> <span class="text-red-500">Edit
                    Data Nilai</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="flex flex-col lg:flex-row gap-5 items-start ">
                        <div class="bg-white lg:w-[500px] w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100 overflow-hidden">
                                <div
                                    class="bg-sky-200 lg:p-3 p-1 rounded-xl font-extrabold text-sky-800 flex items-center justify-center lg:text-[20px] text-sm w-full">
                                    DATA MATERI AJAR
                                </div>
                                <div class="mt-5">
                                    <div class="flex flex-col gap-5 mb-5">
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
                                            class="block text-sm font-medium text-gray-700">Program Studi</label>
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
                                <div class="flex flex-col lg:flex-row lg:gap-5 gap-1">
                                    <button id="exportExcel" class="bg-amber-200 lg:p-3 p-1 rounded-xl font-extrabold text-amber-800 flex items-center justify-center lg:text-[18px] text-sm lg:w-[300px] w-full">
                                        <i class="fi fi-sr-file-excel mr-4"></i> Export Excel
                                    </button>
                                    <div
                                        class="bg-sky-200 lg:p-3 p-1 rounded-xl font-extrabold text-sky-800 flex items-center justify-center lg:text-[20px] text-sm w-full">
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

                                    @can('role-A')
                                    @if ($route)
                                    <form action="{{ $route }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="1" name="verifikasi">
                                        <button type="submit"
                                            class="bg-sky-200 lg:p-3 p-1 rounded-xl font-extrabold text-sky-800 flex items-center justify-center lg:text-[18px] text-sm lg:w-[300px] w-full">
                                            <i
                                                class="fi fi-sr-cross-circle flex items-center text-red-500 mr-3"></i>
                                            {{ $text }}
                                        </button>
                                    </form>
                                    @else
                                    <button disabled
                                        class="bg-gray-200 lg:p-3 p-1 rounded-xl font-extrabold text-gray-800 flex items-center justify-center lg:text-[18px] text-sm lg:w-[300px] w-full">
                                        <i class="fi fi-sr-check-circle flex items-center text-green-500 mr-3"></i>
                                        {{ $text }}
                                    </button>
                                    @endif
                                    @endcan

                                    @can('role-D')
                                    @if ($route)
                                    <button disabled
                                        class="bg-sky-200 p-3 rounded-xl font-extrabold text-sky-800 flex items-center justify-center text-[18px] w-[300px]">
                                        <i class="fi fi-sr-cross-circle flex items-center text-red-500 mr-3"></i>
                                        {{ $text }}
                                    </button>
                                    @else
                                    <button disabled
                                        class="bg-gray-200 p-3 rounded-xl font-extrabold text-gray-800 flex items-center justify-center text-[18px] w-[300px]">
                                        <i class="fi fi-sr-check-circle flex items-center text-green-500 mr-3"></i>
                                        {{ $text }}
                                    </button>
                                    @endif
                                    @endcan

                                </div>
                                <form action="{{ route('nilai.update', $nilaiMateri->id_jadwal) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="overflow-hidden rounded-xl border mt-5 mb-5">
                                        <input type="hidden" id="id_jadwal" name="id_jadwal"
                                            class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                            placeholder="Masukkan Id Jadwal disini"
                                            value="{{ $presensi->id_jadwal }}" readonly>
                                        <div class="relative overflow-x-auto rounded-lg shadow-lg">
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
                                                    @php
                                                    $jumlahPresensi = DB::table('detail_presensi')
                                                    ->join('presensi', 'presensi.id_presensi', '=', 'detail_presensi.id_presensi')
                                                    ->join('jadwal_reguler', 'jadwal_reguler.id_jadwal', '=', 'presensi.id_jadwal')
                                                    ->where('jadwal_reguler.id_jadwal', $m->id_jadwal)
                                                    ->where('detail_presensi.nim', $m->nim)
                                                    ->where('detail_presensi.keterangan', 'HADIR')
                                                    ->count();

                                                    $kehadiran = null;
                                                    $jumlah_hadir = $jumlahPresensi;
                                                    if ($jumlah_hadir < 14) {
                                                        $kehadiran=$jumlah_hadir * 7;
                                                        } else {
                                                        $kehadiran=100;
                                                        }
                                                        @endphp
                                                        <tr
                                                        class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->nim }}
                                                            <input type="hidden" id="nim" name="nim[]"
                                                                class="w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0"
                                                                value="{{ $m->nim }}" readonly>
                                                            <input type="hidden" id="id_nilai"
                                                                name="id_nilai[]"
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
                                                            <input type="text" id="presensi"
                                                                name="presensi[]"
                                                                class="w-[50px] lg:w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $kehadiran }}" readonly>
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            <input type="text" id="tugas" name="tugas[]"
                                                                class="w-[50px] lg:w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->tugas }}">
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="formatif"
                                                                name="formatif[]"
                                                                class="w-[50px] lg:w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->formatif }}">
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            <input type="text" id="uts" name="uts[]"
                                                                class="w-[50px] lg:w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->uts }}">
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="text" id="uas" name="uas[]"
                                                                class="w-[50px] lg:w-full border-0 border-b-2 border-gray-300 focus:border-black focus:ring-0 uppercase"
                                                                value="{{ $m->uas }}">
                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fi fi-rr-disk "></i>
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
    document.getElementById('exportExcel').addEventListener('click', function () {
        // Ambil elemen tabel
        let table = document.querySelector('table');
        let tableData = [];
        let rows = table.querySelectorAll('tr');

        // Looping melalui setiap baris tabel
        rows.forEach((row, rowIndex) => {
            let rowData = [];
            let cells = row.querySelectorAll('th, td');
            cells.forEach((cell) => {
                // Jika ada input, ambil nilai dari atribut value
                let input = cell.querySelector('input');
                if (input) {
                    rowData.push(input.value.trim());
                } else {
                    // Ambil teks langsung jika tidak ada input
                    rowData.push(cell.textContent.trim());
                }
            });
            tableData.push(rowData);
        });

        // Buat workbook dan worksheet dari SheetJS
        let worksheet = XLSX.utils.aoa_to_sheet(tableData);
        let workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Data Nilai');

        // Download file Excel
        XLSX.writeFile(workbook, 'Data_Nilai.xlsx');
    });
</script>


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