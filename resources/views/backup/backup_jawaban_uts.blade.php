<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('UTS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-3/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA UTS
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-ss-book-open-cover"></i></div>
                                    <div class="font-bold pr-[47px]">Materi Ajar</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600">
                                        {{ $uts->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-calendar-clock"></i></div>
                                    <div class="font-bold pr-[22px]">Semester/SKS</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600">
                                        {{ $uts->jadwal->detail_kurikulum->materi_ajar->semester->semester }} /
                                        {{ $uts->jadwal->detail_kurikulum->materi_ajar->sks }}
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-chalkboard-user"></i></div>
                                    <div class="font-bold pr-16">Pengajar</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600 text-wrap">
                                        {{ $uts->jadwal->dosen->nama_dosen }}</div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-hourglass-start"></i></div>
                                    <div class="font-bold pr-[36px]">Tanggal UTS</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600">
                                        {{ date('d-m-Y', strtotime($uts->tgl_ujian)) }} </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <div class="font-bold pr-2 pt-1"><i class="fi fi-sr-hourglass-start"></i></div>
                                    <div class="font-bold pr-[79px]">Waktu</div>
                                    <div class="font-bold pr-4">:</div>
                                    <div class="font-bold text-sky-600">
                                        {{ date($uts->waktu_ujian) }} WIB</div>
                                </div>
                                <div>
                                    {{-- @php
                                        if (date('Y-m-d H:i:s') < $d->m_tugas->deadline) {
                                            $button = "
                                                <div class='w-full'>
                                                    <a href=". route('tugass.tugas_show', $d->m_tugas->id) ."
                                                        class='bg-green-200 flex items-center justify-center rounded-xl p-2 text-green-800 font-bold shadow-xl'>
                                                        <i class='fi fi-sr-check-circle pt-1 pr-2'></i> Soal formatif
                                                    </a>
                                                </div>
                                            ";
                                        } else {
                                            $button = "<a href='#'
                                                    class='bg-red-200 flex items-center justify-center rounded-xl p-2 text-red-800 font-bold shadow-xl'>
                                                    <i class='fi fi-sr-cross-circle pt-1 pr-2'></i> Formatif sudah tidak dapat di akses
                                                </a>";
                                        }
                                    @endphp

                                    {!! $button !!} --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div>DAFTAR JAWABAN UTS MAHASISWA</div>
                            </div>
                            <div class="flex justify-center">
                                <div class="lg:p-6 p-2" style="width:100%;  overflow-x:auto;">
                                    <div class="mb-4">
                                        <a href="javascript:void(0);" onclick="downloadSelectedFiles()"
                                            class="bg-amber-300 w-28 p-2 flex items-center justify-center font-bold rounded-xl">
                                            Download All
                                        </a>
                                    </div>
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <input type="checkbox" class="rounded-md"
                                                            onchange="checkAll(this)" name="check">
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NIM
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">NAMA</div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">KATEGORI</div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">DOWNLOAD</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($detail as $m)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center">
                                                            <input type="checkbox" class="rounded-md" name="user_id[]"
                                                                value="{{ $m->file }}">
                                                        </td>
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->nim }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100 uppercase">
                                                            {{ $m->mahasiswa->nama }}</td>
                                                        <td class="px-6 py-4  uppercase">
                                                            {{ $m->kategori }}</td>
                                                        <td class="px-6 py-4 flex gap-3 bg-gray-100">
                                                            <a href="{{ asset('uts/jawaban/' . $m->file) }}"
                                                                class="bg-sky-500 hover:bg-bg-red-300 px-4 py-3 rounded-xl text-xs text-white"
                                                                download>
                                                                <i class="fi fi-sr-file-download"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
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
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const selectedItemsKey = 'selectedItems';
            let selectedItems = JSON.parse(localStorage.getItem(selectedItemsKey)) || [];

            function updateLocalStorage() {
                localStorage.setItem(selectedItemsKey, JSON.stringify(selectedItems));
            }

            function updateCheckboxes() {
                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');
                const checkAllBox = document.querySelector('input[name="check"]');
                let allChecked = true;

                checkboxes.forEach(checkbox => {
                    if (selectedItems.includes(checkbox.value)) {
                        checkbox.checked = true;
                    } else {
                        allChecked = false;
                    }
                });

                checkAllBox.checked = allChecked;
            }

            function handleCheckboxChange(event) {
                const checkbox = event.target;
                const checkAllBox = document.querySelector('input[name="check"]');

                if (checkbox.checked) {
                    if (!selectedItems.includes(checkbox.value)) {
                        selectedItems.push(checkbox.value);
                    }
                } else {
                    selectedItems = selectedItems.filter(item => item !== checkbox.value);
                }

                updateLocalStorage();

                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');
                checkAllBox.checked = Array.from(checkboxes).every(cb => cb.checked);
            }

            document.querySelectorAll('input[name="user_id[]"]').forEach(checkbox => {
                checkbox.addEventListener('change', handleCheckboxChange);
            });

            document.querySelector('input[name="check"]').addEventListener('change', function(event) {
                const checkAll = event.target;
                const checkboxes = document.querySelectorAll('input[name="user_id[]"]');

                checkboxes.forEach(checkbox => {
                    if (!checkbox.disabled) {
                        checkbox.checked = checkAll.checked;
                        if (checkAll.checked) {
                            if (!selectedItems.includes(checkbox.value)) {
                                selectedItems.push(checkbox.value);
                            }
                        } else {
                            selectedItems = selectedItems.filter(item => item !== checkbox.value);
                        }
                    }
                });

                updateLocalStorage();
            });

            // Load existing selections on page load
            updateCheckboxes();

            // Function to reset selections after a successful edit
            function resetSelections() {
                selectedItems = [];
                updateLocalStorage();
                updateCheckboxes();
            }

            // Example: Call this function after a successful data update
            function onDataUpdateSuccess() {
                resetSelections();
                // Additional actions after data update can be added here
            }

            // Simulating a data update operation
            setTimeout(() => {
                onDataUpdateSuccess(); // Trigger reset after update
            }, 1000); // Replace with your actual data update logic
        });

        function downloadSelectedFiles() {
            const selectedItems = JSON.parse(localStorage.getItem('selectedItems')) || [];
            selectedItems.forEach(item => {
                const link = document.createElement('a');
                link.href = `{{ asset('uts/jawaban/') }}/${item}`;
                link.download = item;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        }
    </script>
    <script>
        function downloadSelectedFiles() {
            const checkboxes = document.querySelectorAll('input[name="user_id[]"]:checked');
            let selectedFiles = [];

            checkboxes.forEach(checkbox => {
                selectedFiles.push(checkbox.value);
            });

            if (selectedFiles.length === 0) {
                alert('No files selected');
                return;
            }

            // Make a POST request to the server to download the files as a zip
            fetch('/download-zip-uts', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        selected_files: selectedFiles.join(',')
                    })
                })
                .then(response => response.blob())
                .then(blob => {
                    // Create a link element to download the zip
                    const link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'selected_files.zip';
                    link.click();
                })
                .catch(error => {
                    console.error('Error downloading files:', error);
                });
        }
    </script>
</x-app-layout>
