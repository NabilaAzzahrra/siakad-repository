<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('UAS') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="px-6 pb-4 text-gray-900 dark:text-gray-100">
                            <div class="flex flex-col lg:flex-row items-center justify-between">
                                <div class="flex -mb-6">
                                    <div class="w-10">
                                        <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                    </div>
                                    <div
                                        class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                        DATA UAS
                                    </div>
                                </div>
                                <div class="flex gap-4 mb-2">
                                    <div class="mt-4">
                                        <a href="{{ route('ujian_uas_mhs.print_uas_mhs') }}" target="_blank"
                                            class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-amber-100 border border-dashed border-amber-500 text-amber-500 pl-4 pr-4 pt-2"><i
                                                class="fi fi-sr-print mr-2 text-lg"></i> <span>Print
                                                Jadwal</span></a>
                                    </div>
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30">
                            <div class="flex w-full justify-center">
                                <div class="pt-12 w-full" style="width:100%;overflow-x:auto;">

                                    <div class="relative overflow-x-auto shadow-lg rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        MATERI AJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        PENGAJAR
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        TANGGAL
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        HARI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        SESI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        PUKUL
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        SEMESTER
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        SKS
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        RUANG
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        KELAS
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        PROGRAM STUDI
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100 ">
                                                        SOAL
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center ">
                                                        ACTION
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($jadwal_reguler as $key => $j)
                                                    @php
                                                        $uasItem = $uas->where('id_jadwal', $j->id_jadwal)->first();
                                                        $jawaban = null;
                                                        $hari = '';

                                                        if ($uasItem) {
                                                            $jawaban = $detail_uas
                                                                ->where('id_uas', $uasItem->id_uas)
                                                                ->where('nim', Auth::user()->email)
                                                                ->first();

                                                            $day = date('l', strtotime($uasItem->tgl_ujian));
                                                            switch ($day) {
                                                                case 'Monday':
                                                                    $hari = 'SENIN';
                                                                    break;
                                                                case 'Tuesday':
                                                                    $hari = 'SELASA';
                                                                    break;
                                                                case 'Wednesday':
                                                                    $hari = 'RABU';
                                                                    break;
                                                                case 'Thursday':
                                                                    $hari = 'KAMIS';
                                                                    break;
                                                                case 'Friday':
                                                                    $hari = 'JUMAT';
                                                                    break;
                                                                case 'Saturday':
                                                                    $hari = 'SABTU';
                                                                    break;
                                                                case 'Sunday':
                                                                    $hari = 'MINGGU';
                                                                    break;
                                                                default:
                                                                    $hari = '';
                                                                    break;
                                                            }
                                                        }
                                                        $hide = '';
                                                    @endphp
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $j->dosen->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            @if ($uasItem)
                                                                {{ date('d-m-Y', strtotime($uasItem->tgl_ujian)) }}

                                                                @php
                                                                    $hide = 'hidden'; // Default value

                                                                    if ($uasItem->tgl_ujian == date('Y-m-d')) {
                                                                        $endTime = str_replace(
                                                                            '.',
                                                                            ':',
                                                                            explode(' - ', $uasItem->waktu_ujian)[1] ??
                                                                                '',
                                                                        );
                                                                        if (date('H:i') <= $endTime) {
                                                                            $hide = ''; // Show if current time is within the allowed range
                                                                        }
                                                                    }
                                                                @endphp
                                                            @else
                                                                <span
                                                                    class="bg-amber-100 border px-4 rounded-xl border-amber-500 text-amber-500">Belum
                                                                    ditentukan</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100 text-center">
                                                            @if ($uasItem)
                                                                {{ $hari }}
                                                            @else
                                                                {{ $j->hari->hari }}
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $j->sesi->sesi }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100 text-center">
                                                            @if ($uasItem)
                                                                {{ $uasItem->waktu_ujian }}
                                                            @else
                                                                {{ $j->sesi->pukul->pukul }}
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $j->detail_kurikulum->materi_ajar->semester->semester }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100 text-center">
                                                            {{ $j->detail_kurikulum->materi_ajar->sks }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $j->ruang->ruang }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100 text-center">
                                                            {{ $j->kelas->kelas }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $j->kelas->jurusan->jurusan }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100 text-center"
                                                            {{ $hide }}>
                                                            @if ($uasItem)
                                                                <a href="{{ asset('uas/' . $uasItem->file) }}" download
                                                                    class="mr-2 text-green-500 hover:bg-green-100 px-4 py-3 rounded-xl border-2 border-green-500 border-dashed">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                            @else
                                                                <div
                                                                    class="text-red-500 bg-red-100 border border-red-500 px-2 rounded-xl">
                                                                    Belum
                                                                    Terdapat Soal</div>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 text-center" {{ $hide }}>
                                                            @if ($uasItem)
                                                                @if ($jawaban)
                                                                    {{-- If the student's submission exists in detail_uas --}}
                                                                    <a href="{{ asset('uas/jawaban/' . $jawaban->file) }}"
                                                                        download
                                                                        class="mr-2 text-green-500 hover:bg-green-100 px-4 py-3 rounded-xl border-2 border-green-500 border-dashed">
                                                                        <i class="fa-solid fa-file"></i>
                                                                    </a>
                                                                @else
                                                                    {{-- If no submission exists for the student, show the upload button --}}
                                                                    <button type="button"
                                                                        data-id="{{ $uasItem->id }}"
                                                                        data-modal-target="sourceModalUpload"
                                                                        data-id_uas="{{ $uasItem->id_uas }}"
                                                                        onclick="editSourceModalUpload(this)"
                                                                        class="text-amber-500 hover:bg-amber-100 px-4 py-3 rounded-xl border border-amber-500 border-dashed border-2">
                                                                        <i class="fas fa-upload"></i>
                                                                    </button>
                                                                @endif
                                                            @else
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="mt-4">
                                        {{ $jadwal_reguler->links() }}
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- UPLOAD JAWABAN --}}
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModalUpload">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source_upload">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModalUpload"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModalUpload" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="hidden">
                            <label for="id_uas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id uas</label>
                            <input type="text" id="id_uass" name="id_uas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan id_uas disini ..." required />
                        </div>
                        <div class="hidden">
                            <label for="nim"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                            <input type="text" id="nims" name="nim" value="{{ Auth::user()->email }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan NIM disini ..." />
                        </div>
                        <div class="mb-5">
                            <label for="files"
                                class="block mb-2 -mt-8 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                            <input type="file" id="files" name="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Upload file formatif di sini ..." />
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModalUpload"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        const editSourceModalUpload = (button) => {
            const formModal = document.getElementById('formSourceModalUpload');
            const modalTarget = button.dataset.modalTarget;
            const id_uas = button.dataset.id_uas;
            // const file = button.dataset.file;

            let url = "{{ route('uas.jawaban_uas_add') }}";

            // Update form fields
            document.getElementById('title_source_upload').innerText = `Upload Jawaban uas`;
            document.getElementById('id_uass').value = id_uas;
            // document.getElementById('files').value = file;
            document.getElementById('formSourceButton').innerText = 'Simpan';

            // Set form action URL
            formModal.setAttribute('action', url);

            // Show the modal
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        };

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
