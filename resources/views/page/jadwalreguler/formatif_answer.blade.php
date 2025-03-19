<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Daftar Formatif Mahasiswa</div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start justify-center gap-5">
                <div
                    class="bg-white w-1/2 dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl mb-5 p-5">
                    <div>
                        <div class="flex flex-col lg:flex-row items-center justify-between">
                            <div class="flex -mb-6">
                                <div class="w-10">
                                    <img src="{{ url('img/file.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    DATA FORMATIF
                                </div>
                            </div>
                        </div>
                        <hr class="border mt-8 border-black border-opacity-30">
                        <div class="mt-2">
                            <table>
                                <tr>
                                    <td class="flex items-center justify-center p-2 mt-1"><i
                                            class="fi fi-ss-book-open-cover"></i></td>
                                    <td>Materi Ajar</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $formatif->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</td>
                                </tr>
                                <tr>
                                    <td class="flex items-center justify-center p-2 mt-1"><i
                                            class="fi fi-sr-chalkboard-user"></i></td>
                                    <td>Kelas</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $formatif->jadwal->kelas->kelas }}</td>
                                </tr>
                                <tr>
                                    <td class="flex items-center justify-center p-2 mt-1"><i
                                            class="fi fi-sr-calendar-clock"></i></td>
                                    <td>Semester/SKS</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $formatif->jadwal->detail_kurikulum->materi_ajar->semester->semester }}
                                        /
                                        {{ $formatif->jadwal->detail_kurikulum->materi_ajar->sks }}</td>
                                </tr>
                                <tr>
                                    <td class="flex items-center justify-center p-2 mt-1"><i
                                            class="fi fi-sr-chalkboard-user"></i></td>
                                    <td>Pengajar</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $formatif->jadwal->dosen->nama_dosen }}</td>
                                </tr>
                                <tr>
                                    <td class="flex items-center justify-center p-2 mt-1"><i class="fi fi-sr-apps"></i>
                                    </td>
                                    <td>Materi Formatif</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $formatif->judul_formatif }}</td>
                                </tr>
                                <tr>
                                    <td class="flex items-center justify-center p-2 mt-1"><i
                                            class="fi fi-sr-hourglass-start"></i></td>
                                    <td>Deadline</td>
                                    <td class="px-2">:</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($formatif->deadline ?? '-')) }} WIB</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl mb-5 p-5 text-wrap">
                    <div>
                        <div class="flex flex-col lg:flex-row items-center justify-between">
                            <div class="flex -mb-6 w-full">
                                <div class="w-10">
                                    <img src="{{ url('img/file.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    DAFTAR FORMATIF MAHASISWA
                                </div>
                            </div>
                            <div class="w-full flex items-end justify-end -mb-6">
                                <a href="{{ route('detail_formatif.downloadZip', ['id_formatif' => $formatif->id_formatif]) }}"
                                    class="hover:bg-amber-100 border border-amber-500 text-amber-500 border-dashed w-44 p-2 flex items-center justify-center font-bold rounded-xl">
                                    Download All
                                </a>
                            </div>
                        </div>
                        <hr class="border mt-8 border-black border-opacity-30">
                    </div>
                    <div class="flex justify-center mt-4">
                        <div class="p-0 " style="width:100%;overflow-x:auto;">
                            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                                    <!-- Form untuk entries -->
                                    <x-show-entries :route="route('jadwal_reguler.formatif_answer', $formatif->id_formatif)" :search="request()->search">
                                    </x-show-entries>
                                </div>

                                <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                                    <form
                                        action="{{ route('jadwal_reguler.formatif_answer', $formatif->id_formatif) }}"
                                        method="GET" class="flex items-center flex-1">
                                        <input type="text" name="search" placeholder="Enter for search . . . "
                                            id="search" value="{{ request('search') }}"
                                            class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                            oninput="this.value = this.value.toUpperCase();" />

                                        <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                                        <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                    </form>
                                </div>
                            </div>
                            <form action="{{ route('jadwal_reguler.formatif_answer', $formatif->id_formatif) }}"
                                method="POST" class="formupdate">
                                @csrf
                                <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
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
                                                    FORMATIF
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    TANGGAL PENGUMPULAN
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                    ACTION
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = $detail->firstItem();
                                            @endphp
                                            @forelse($detail as $i)
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="px-6 py-4 text-left">
                                                        {{ $i->mahasiswa->nim }}
                                                    </td>
                                                    <td class="px-6 py-4 text-left">
                                                        {{ $i->mahasiswa->nama }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center flex items-center justify-center">
                                                        <a href="{{ asset('formatif/jawaban/' . $i->jawaban) }}"
                                                            class="flex items-center mr-2 hover:bg-sky-100 w-48 text-sky-600 pr-2 pl-4 py-3 rounded-xl text-md border border-dashed border-sky-600"
                                                            download>
                                                            <i class="fi fi-sr-file-download flex mr-2"></i> Download
                                                            Jawaban
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{ date('d-m-Y H:i:s', strtotime($i->tgl_pengumpulan)) }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center flex items-center justify-center">
                                                        <button type="button" onclick="return dataDelete('{{ $i->id_detail}}')"
                                                            title="Hapus Data"
                                                            class="border-2 border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
                                <div class="mt-4">
                                    @if ($detail->hasPages())
                                        {{ $detail->appends(request()->query())->links('vendor.pagination.custom') }}
                                    @else
                                        <div class="flex items-center justify-between">
                                            <nav class="flex justify-start">
                                                <div class="text-sm flex gap-1">
                                                    <div>Showing</div>
                                                    <div class="font-bold">1</div>
                                                    <div>to</div>
                                                    <div class="font-bold">{{ count($detail) }}</div>
                                                    <div>of</div>
                                                    <div class="font-bold">{{ count($detail) }}</div>
                                                    <div>entries</div>
                                                </div>
                                            </nav>
                                            <div class="flex items-center space-x-2">
                                                <div class="flex">
                                                    <div class="border px-4 py-1 rounded-l-lg">&lt;</div>
                                                    <div class="border px-4 py-1">1</div>
                                                    <div class="border px-4 py-1 rounded-r-lg">&gt;</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

    <script>
        const dataDelete = async (id, pukul) => {
            Swal.fire({
                title: `Apakah Anda yakin?`,
                text: `Data akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await axios.post(`/detail_formatif/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        })
                        .then(function(response) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: `Data berhasil dihapus.`,
                                icon: 'success',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .catch(function(error) {
                            // Alert jika terjadi kesalahan
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.log(error);
                        });
                }
            });
        };
    </script>
</x-app-layout>
