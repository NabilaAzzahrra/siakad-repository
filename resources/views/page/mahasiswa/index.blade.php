<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    @if (count($mahasiswa) > 0)
                        <div class="bg-sky-200 w-full lg:w-1/2 p-5 rounded-xl mb-10 border border-2 shadow-xl border-sky-300">
                            <div class="text-xl font-extrabold flex items-center gap-3 text-sky-800">
                                <div><i class="fi fi-br-info"></i></div>
                                <div class="mb-1">DATA BARU</div>
                            </div>
                            <div class="text-justify mt-2 font-bold text-sky-900 text-wrap mb-4">
                                Hallo, disini terdapat
                                <span
                                    class="text-white font-bold bg-sky-700 p-1 rounded-lg">{{ count($mahasiswa) }}</span>
                                data baru yang harus dilengkapi. Silakan periksa data tersebut
                                dengan cermat sebelum melanjutkan. Pastikan semua informasi sudah benar dan lengkap
                                untuk
                                kebutuhan data lainnya.
                            </div>
                            <a href="{{ route('mahasiswa.create') }}"
                                class="bg-sky-500 hover:bg-sky-700 text-white w-[120px] px-2 py-1 text-center font-bold rounded-lg flex items-center">
                                Lihat Data <i class="fi fi-bs-angle-double-small-right flex pl-2"></i>
                            </a>
                        </div>
                    @else
                        <div></div>
                    @endif
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>DATA MAHASISWA</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-2" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('mahasiswa.store') }}" method="POST" class="formupdate">
                                        @csrf
                                        <div class="flex justify-end">
                                            <button class="mb-3 p-2 text-sm lg:mb-2 lg:p-2 bg-sky-400 text-white rounded-xl">
                                                SUBMIT
                                            </button>
                                        </div>
                                        <div class="relative overflow-x-auto rounded-lg shadow-lg">

                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
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
                                                            <div class="flex items-center">
                                                                NAMA
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">
                                                                JURUSAN
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
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            <div class="flex items-center">
                                                                UJIAN
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            <div class="flex items-center">
                                                                KEAKTIFAN
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($mahasiswa_lengkap as $m)
                                                        <tr
                                                            class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                                <input type="checkbox" class="rounded-md"
                                                                    name="user_id[]" value="{{ $m->nim }}">
                                                            </td>
                                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                                {{ $no++ }}
                                                            </td>
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $m->nim }}
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->nama }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->kelas }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->jurusan }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $m->tingkat }}
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                {{ $m->no_hp }}
                                                            </td>
                                                            @if ($m->status == 0)
                                                                @php
                                                                    $sts = 'No Access';
                                                                    $bg = 'bg-red-500';
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $sts = 'Can Access';
                                                                    $bg = 'bg-green-500';
                                                                @endphp
                                                            @endif
                                                            <td class="px-6 py-4">
                                                                <span
                                                                    class="{{ $bg }} p-2 text-white rounded-full">{{ $sts }}</span>
                                                            </td>
                                                            @php
                                                                switch ($m->keaktifan) {
                                                                    case 'aktif':
                                                                        $keaktifan = 'AKTIF';
                                                                        $bg = 'bg-green-500';
                                                                        break;
                                                                    case 'cuti':
                                                                        $keaktifan = 'CUTI';
                                                                        $bg = 'bg-amber-500';
                                                                        break;
                                                                    default:
                                                                        $keaktifan = 'DO';
                                                                        $bg = 'bg-red-500';
                                                                        break;
                                                                }
                                                            @endphp
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                <span
                                                                    class="{{ $bg }} p-2 text-white rounded-full">{{ $keaktifan }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
