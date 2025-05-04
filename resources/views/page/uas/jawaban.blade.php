<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Jawaban Mahasiswa') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div
                        class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                        <div class="flex px-12 pt-8">
                            <div class="w-10">
                                <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                            </div>
                            <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                JAWABAN UAS MAHASISWA
                            </div>
                        </div>
                        <hr class="border mt-2 border-black border-opacity-30 mx-12">
                        <div class="mt-4 px-12 mb-6 flex gap-5 items-start">
                            <div
                                class="bg-white w-1/2 px-4 pt-4 pb-4 dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                                <table>
                                    <tr>
                                        <td class="pr-2 pt-2"><i class="fi fi-ss-book-open-cover"></i></td>
                                        <td class="font-bold">Materi Ajar</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td class="text-wrap">{{ $uas->jadwal->detail_kurikulum->materi_ajar->materi_ajar }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 pt-2"><i class="fi fi-sr-calendar-clock"></i></td>
                                        <td class="font-bold">Semester/SKS</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ $uas->jadwal->detail_kurikulum->materi_ajar->semester->semester }} /
                                            {{ $uas->jadwal->detail_kurikulum->materi_ajar->sks }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 pt-2"><i class="fi fi-sr-chalkboard-user"></i></td>
                                        <td class="font-bold">Pengajar</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td class="text-wrap">{{ $uas->jadwal->dosen->nama_dosen }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 pt-2"><i class="fi fi-sr-hourglass-start"></i></td>
                                        <td class="font-bold">Tanggal uas</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ date('d-m-Y', strtotime($uas->tgl_ujian)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 pt-2"><i class="fi fi-sr-hourglass-start"></i></td>
                                        <td class="font-bold">Waktu</td>
                                        <td class="pl-2 pr-2">:</td>
                                        <td>{{ date($uas->waktu_ujian) }} WIB</td>
                                    </tr>
                                </table>
                            </div>
                            <div
                                class="bg-white w-full px-4 pb-4 dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                                <div class="flex justify-center">
                                    <div class="lg:p-6 p-2" style="width:100%;  overflow-x:auto;">
                                        <div class="mb-4">
                                            <a href="javascript:void(0);" onclick="downloadSelectedFiles()"
                                                class="bg-amber-50 text-amber-500 border border-amber-500 hover:bg-amber-100 p-2 flex items-center justify-center font-bold rounded-xl">
                                                <i class="fi fi-sr-down-to-line mr-2 mt-1"></i> Download All
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
                                                            NAMA
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            KATEGORI
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            DOWNLOAD
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
                                                            <td class="px-6 py-4 flex gap-3 bg-gray-100 text-center items-center justify-center">
                                                                <a href="{{ asset('uas/jawaban/' . $m->file) }}"
                                                                    class="hover:bg-sky-100 border border-dashed border-sky-500 text-sky-500 hover:bg-bg-red-300 px-4 py-3 rounded-xl"
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
                link.href = `{{ asset('uas/jawaban/') }}/${item}`;
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
            fetch('/download-zip-uas', {
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
