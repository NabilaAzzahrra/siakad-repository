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

                    <div class="bg-emerald-100 p-4 w-6/12 border border-emerald-400 rounded-xl border-2">
                        <div class="text-xl flex items-center gap-3 font-extrabold text-emerald-800"><i
                                class="fi fi-ss-to-do"></i> Formatif</div>
                        <div class="text-wrap p-4 text-emerald-800 font-bold">Formatif merupakan standar untuk mengukur
                            kemamuan atau skil peserta didik selama mengikuti
                            setengah semester, untuk formatif dapat di inputkan pada fitur berikut ini.</div>
                        @foreach ($presensi as $pr)
                        @endforeach
                        <div class="flex items-center justify-end ">
                            <a href="{{ route('jadwal_reguler.formatif', $pr->id_jadwal) }}"
                                class="bg-emerald-300 p-2 font-bold border border-green-400 border-[3px] rounded-3xl text-emerald-800 hover:bg-emerald-500 hover:text-white">Formatif</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-10 mt-5">
                        @php
                            $color = '';
                            $tgl_presensi = '';
                            $materi = '';
                            $isTodayScheduled = true;
                        @endphp
                        @foreach ($presensi as $p)
                            @php
                                if ($p->pertemuan % 2 == 1) {
                                    $color = 'bg-[#F15C67]';
                                    $border = 'border-[#F15C67]';
                                } else {
                                    $color = 'bg-[#00AEB6]';
                                    $border = 'border-[#00AEB6]';
                                }

                                if ($p->tgl_presensi === null) {
                                    $tgl_presensi =
                                        '<i class="fi fi-sr-cross-circle flex items-center text-red-500"></i>';
                                    $link = route('presensi.show', $p->id_presensi);
                                } else {
                                    $tgl_presensi =
                                        '<i class="fi fi-sr-check-circle flex items-center text-green-500"></i>';
                                    $link = route('presensi.edit', $p->id_presensi);
                                }

                                // $hide = '';
                                if ($jadwal->hari->hari == 'SENIN') {
                                    $hari = 'Monday';
                                } elseif ($jadwal->hari->hari == 'SELASA') {
                                    $hari = 'Tuesday';
                                } elseif ($jadwal->hari->hari == 'RABU') {
                                    $hari = 'Wednesday';
                                } elseif ($jadwal->hari->hari == 'KAMIS') {
                                    $hari = 'Thursday';
                                } elseif ($jadwal->hari->hari == 'JUMAT') {
                                    $hari = 'Friday';
                                } elseif ($jadwal->hari->hari == 'SABTU') {
                                    $hari = 'Saturday';
                                } elseif ($jadwal->hari->hari == 'MINGGU') {
                                    $hari = 'Sunday';
                                } else {
                                    $hari = 'Unknown day';
                                }

                                $pukul = $jadwal->sesi->pukul->pukul;

                                // Pisahkan string menjadi dua bagian
                                $pukulArray = explode(' - ', $pukul);

                                // Ambil jam mulai dan jam berakhir
                                $jamMulai = $pukulArray[0]; // "08.00"
                                $jamBerakhir = $pukulArray[1]; // "09.40"

                                $waktuSekarang = date('H:i');

                                $hidePresensiButton = 'hidden';

                                if ($p->tgl_presensi !== null) {
                                    $hidePresensiButton = '';
                                }

                                // Cek apakah hari ini adalah hari yang dijadwalkan
                                if ($hari == date('l')) {
                                    // Cek apakah ini adalah pertemuan pertama yang belum diisi presensinya
                                    if ($p->pertemuan == 1 && $p->tgl_presensi === null) {
                                        if ($waktuSekarang >= $jamMulai || $waktuSekarang <= $jamBerakhir) {
                                            $hidePresensiButton = ''; // Tampilkan tombol
                                            $isTodayScheduled = false;
                                            // dd('ini');
                                        } else {
                                            $hidePresensiButton = 'hidden';
                                        }
                                    } else {
                                        if ($isTodayScheduled && $p->tgl_presensi === null) {
                                            if ($waktuSekarang >= $jamMulai || $waktuSekarang <= $jamBerakhir) {
                                                $hidePresensiButton = '';
                                                $isTodayScheduled = false;
                                                // dd('ini');
                                            } else {
                                                // dd('ini ya');
                                                $hidePresensiButton = 'hidden';
                                            }
                                        } else {
                                            $hidePresensiButton = 'hidden';
                                        }
                                    }
                                } else {
                                    // Jika bukan hari yang dijadwalkan, sembunyikan semua tombol
                                    $hidePresensiButton = 'hidden';
                                }

                                if ($p->tgl_presensi === null) {
                                    $file_materi =
                                        '<i class="fi fi-sr-cross-circle flex items-center text-red-500"></i>';
                                    $link_materi = '#';
                                } else {
                                    $file_materi =
                                        '<i class="fi fi-sr-check-circle flex items-center text-green-500"></i>';
                                    $link_materi = route('presensi.materi_update', $p->id_presensi);
                                }

                            @endphp
                            <div
                                class="{{ $color }} border border-4 {{ $border }} px-2 rounded-3xl h-64 relative">
                                <div
                                    class="h-14 w-14 text-xl font-extrabold bg-white absolute top-0 left-0 mt-3 ml-5 flex items-center justify-center rounded-full border border-4 {{ $border }}">
                                    {{ $p->pertemuan }}
                                </div>
                                <div
                                    class="bg-white border border-4 {{ $border }} mt-10 rounded-3xl h-[198px] flex pt-8 justify-start pl-4">
                                    <div>
                                        <div class="font-bold text-left text-[20px]">Pertemuan {{ $p->pertemuan }}</div>
                                        <div class="font-bold text-left text-[12px] text-sky-800">
                                            @if ($p->tgl_presensi === null)
                                                <div class="bg-red-100 w-44 text-red-500 rounded-full px-2">Belum
                                                    Menginputkan Presensi</div>
                                            @else
                                                {{ date('d-m-Y', strtotime($p->tgl_presensi)) }}
                                            @endif
                                        </div>
                                        <div class="mt-1">
                                            <div class="flex">
                                                <div class="pr-2 font-bold">Materi</div>
                                                <div class="text-wrap text-sky-700 text-justify px-2">
                                                    @php
                                                        $text = "$p->materi";
                                                        $materi =
                                                            strlen($text) > 45 ? substr($text, 0, 30) . '...' : $text;
                                                    @endphp
                                                    @if ($materi == null)
                                                        <div class="text-red-500">Belum Terdapat materi</div>
                                                    @else
                                                        {{ $materi }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex gap-4 mt-3">
                                            <a href="{{ $link }}"
                                                class="border border-gray-300 px-2 py-1 text-xs rounded-full font-extrabold flex items-center justify-center
                                                 {{ $hidePresensiButton }}">
                                                <i class="fi fi-sr-member-list text-sky-700 pr-1 flex items-center"></i>
                                                <span class="pr-1 flex items-center">Presensi
                                                </span>
                                                {!! $tgl_presensi !!}
                                            </a>
                                            <a href="{{ $link_materi }}"
                                                class="border border-gray-300 px-2 py-1 text-xs rounded-full font-extrabold flex items-center justify-center">
                                                <i
                                                    class="fi fi-ss-book-open-cover text-green-500 pr-1 flex items-center"></i>
                                                <span class="pr-1 flex items-center">File Materi</span>
                                                {!! $file_materi !!}
                                            </a>
                                            <a href="{{ route('tugas.show', $p->id_presensi) }}"
                                                class="border border-gray-300 px-2 py-1 text-xs rounded-full font-extrabold flex items-center justify-center ">
                                                <i class="fi fi-sr-web-test text-amber-500 pr-1 flex items-center"></i>
                                                <span class="pr-1 flex items-center">Tugas</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <input type="text" id="id_presensis" name="id_presensi" hidden>
                        <input type="text" id="materis" name="materis" hidden>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Materi
                                Sebelumnya</label>
                            <input type="text" id="file_materis" name="file_materi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan jurusan disini..." readonly>
                        </div>
                        <div class="mb-5">
                            <label for="materi_baru"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi Baru</label>
                            <input type="file" id="materi_baru" name="materi_baru"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Materi disini ..." required />
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id_presensi = button.dataset.id_presensi;
            const file_materi = button.dataset.file_materi;
            const materi = button.dataset.materi;
            let url = "{{ route('presensi.materi_update', ':id') }}".replace(':id', id_presensi);
            let status = document.getElementById(modalTarget);

            // Set modal title and fields
            document.getElementById('title_source').innerText = `Update Materi ${id_presensi}`;
            document.getElementById('id_presensis').value = id_presensi;
            document.getElementById('file_materis').value = file_materi;
            document.getElementById('materis').value = materi;
            document.getElementById('formSourceButton').innerText = 'Simpan';
            formModal.setAttribute('action', url);

            // Add CSRF token if not already present
            if (!document.querySelector('#formSourceModal input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }

            // Add method input for PATCH if not already present
            if (!document.querySelector('#formSourceModal input[name="_method"]')) {
                let methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'PATCH');
                formModal.appendChild(methodInput);
            }

            status.classList.toggle('hidden');
        };

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
