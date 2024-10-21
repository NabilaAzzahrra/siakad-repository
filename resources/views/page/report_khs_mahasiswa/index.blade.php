<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data KHS Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="p-6 bg-amber-300 font-bold rounded-xl">
                                <div class="flex items-center justify-between">
                                    <div>DATA KHS MAHASISWA</div>
                                </div>
                            </div>
                            <form action="">
                                <div class="mt-12 lg:mx-12 flex gap-5">
                                    <div class="w-full">
                                        <label for="semester"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SEMESTER
                                            <span class="text-red-500">*</span></label>
                                        <select
                                            class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                            id="semester" name="semester" data-placeholder="Pilih Semester" required>
                                            <option value="">Pilih...</option>
                                            @foreach ($semester as $s)
                                                <option value="{{ $s->semester }}">{{ $s->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex justify-end mt-7">
                                        <button class="mb-4 p-2 bg-sky-400 text-white rounded-xl">
                                            PILIH
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="flex justify-center">
                                <div class="lg:p-12" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('khs.store') }}" method="POST" class="formupdate">
                                        @csrf
                                        <div class="flex justify-end">
                                            <button class="mb-4 p-2 bg-sky-400 text-white rounded-xl">
                                                SUBMIT
                                            </button>
                                        </div>
                                        <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                            <input type="hidden" name="semester" value="{{ request('semester', '') }}">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100 hidden">
                                                            <input type="checkbox" class="rounded-md"
                                                                onchange="checkAll(this)" name="check">
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            NIM
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                NAMA
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">
                                                                PROGRAM STUDI
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                KELAS
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">
                                                                TINGKAT
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                NO HP
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @if ($mahasiswa_lengkap)
                                                        @foreach ($mahasiswa_lengkap as $m)
                                                            <tr
                                                                class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                                <td class="px-6 py-4 text-center bg-gray-100 hidden">
                                                                    <input type="checkbox" class="rounded-md"
                                                                        name="user_id[]" value="{{ Auth::user()->email }}" checked>
                                                                </td>
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    {{ Auth::user()->email }}
                                                                </th>
                                                                <td class="px-6 py-4 bg-gray-100">
                                                                    {{ $m->nama }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $m->kelas }}
                                                                </td>
                                                                <td class="px-6 py-4 bg-gray-100">
                                                                    {{ $m->jurusan }}
                                                                    <input type="hidden" name="id_jurusan[]"
                                                                        value="{{ $m->id_jurusan }}">
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $m->tingkat }}
                                                                </td>
                                                                <td class="px-6 py-4 bg-gray-100">
                                                                    {{ $m->no_hp }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td class="px-6 py-4 text-center" colspan="8">
                                                                DATA TIDAK DITEMUKAN
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="mt-4">
                                            {{-- {{ $mahasiswa_lengkap->links() }} --}}
                                        </div>
                                    </form>
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
    </script>
</x-app-layout>
