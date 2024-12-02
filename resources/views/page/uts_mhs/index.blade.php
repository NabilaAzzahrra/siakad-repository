<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('UTS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="">
                                <div class="flex flex-col lg:flex-row items-center justify-between gap-5">
                                    <div
                                        class="w-full lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                        DATA UTS</div>
                                    @if ($mahasiswa->status == 1)
                                    <div class="rounded-xl lg:p-6 p-2 text-sm lg:text-md bg-sky-300">
                                        <a href="{{ route('ujian_uts_mhs.print_uts_mhs') }}" target="_blank"
                                            class="href">PRINT</a>
                                    </div>
                                    @else
                                    @endif
                                </div>
                            </div>
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
                                                        <div class="flex items-center">
                                                            PENGAJAR
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            TANGGAL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            HARI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SESI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            PUKUL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            SEMESTER
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            SKS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            RUANG
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            KELAS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            PROGRAM STUDI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100 ">
                                                        <div class="flex items-center">
                                                            SOAL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center ">
                                                        <div class="flex items-center">
                                                            ACTION
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($jadwal_reguler as $key => $j)
                                                @php
                                                $utsItem = $uts->where('id_jadwal', $j->id_jadwal)->first();
                                                $jawaban = null;
                                                $hari = '';

                                                if ($utsItem) {
                                                $jawaban = $detail_uts
                                                ->where('id_uts', $utsItem->id_uts)
                                                ->where('nim', Auth::user()->email)
                                                ->first();

                                                $day = date('l', strtotime($utsItem->tgl_ujian));
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
                                                    <td class="px-6 py-4 text-center">
                                                        {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        {{ $j->dosen->nama_dosen }}
                                                    </td>
                                                    <td class="px-6 py-4 ">
                                                        @if ($utsItem)
                                                        {{ date('d-m-Y', strtotime($utsItem->tgl_ujian)) }}
                                                            @php
                                                                $hide = 'hidden'; // Default value

                                                                if ($utsItem->tgl_ujian == date('Y-m-d')) {
                                                                    $endTime = str_replace('.', ':', explode(' - ', $utsItem->waktu_ujian)[1]);
                                                                    if (date('H:i') <= $endTime) {
                                                                        $hide = ''; // Show if current time is within the allowed range
                                                                    }
                                                                }
                                                            @endphp
                                                        @else
                                                        <span>Belum ditentukan</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        @if ($utsItem)
                                                        {{ $hari }}
                                                        @else
                                                        {{ $j->hari->hari }}
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $j->sesi->sesi }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        @if ($utsItem)
                                                        {{ $utsItem->waktu_ujian }}
                                                            
                                                        @else
                                                        {{ $j->sesi->pukul->pukul }}
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $j->detail_kurikulum->materi_ajar->semester->semester }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        {{ $j->detail_kurikulum->materi_ajar->sks }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $j->ruang->ruang }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100">
                                                        {{ $j->kelas->kelas }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $j->kelas->jurusan->jurusan }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-100" {{$hide}}>
                                                        @if ($utsItem)
                                                        <a href="{{ asset('uts/' . $utsItem->file) }}" download
                                                            class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                            <i class="fa-solid fa-download"></i>
                                                        </a>
                                                        @else
                                                        <div class="bg-red-500 text-white px-2 rounded-xl">Belum
                                                            Terdapat Soal</div>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4" {{$hide}}>
                                                        @if ($utsItem)
                                                        @if ($jawaban)
                                                        {{-- If the student's submission exists in detail_uts --}}
                                                        <a href="{{ asset('uts/jawaban/' . $jawaban->file) }}"
                                                            download
                                                            class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                                                            <i class="fa-solid fa-file"></i>
                                                        </a>
                                                        @else
                                                        {{-- If no submission exists for the student, show the upload button --}}
                                                        <button type="button"
                                                            data-id="{{ $utsItem->id }}"
                                                            data-modal-target="sourceModalUpload"
                                                            data-id_uts="{{ $utsItem->id_uts }}"
                                                            onclick="editSourceModalUpload(this)"
                                                            class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
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
                            <label for="id_uts"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id UTS</label>
                            <input type="text" id="id_utss" name="id_uts"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan id_uts disini ..." required />
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
                        <button type="button" data-modal-target="sourceModalUpload" onclick="sourceModalClose(this)"
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
            const id_uts = button.dataset.id_uts;
            // const file = button.dataset.file;

            let url = "{{ route('uts.jawaban_uts_add') }}";

            // Update form fields
            document.getElementById('title_source_upload').innerText = `Upload Jawaban UTS`;
            document.getElementById('id_utss').value = id_uts;
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