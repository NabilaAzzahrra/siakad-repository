<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            <div class="flex items-center">Mahsiswa<i class="fi fi-rr-caret-right mt-1"></i> <span
                    class="text-amber-100">Detail Mahaiswa</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>DATA MAHASISWAa</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-4 pt-6" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('mahasiswa.edit_detDataBaru') }}" method="POST" class="formupdate">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="mb-2 lg:mb-0 p-2 bg-sky-400 text-white rounded-xl">
                                                SUBMIT
                                            </button>
                                        </div>
                                        <div class="mb-5">
                                            <div class="flex flex-col lg:flex-row gap-5">
                                                <div class="w-full">
                                                    <label for="kelas"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Kelas
                                                    </label>
                                                    <select
                                                        class="js-example-placeholder-single js-states form-control w-full m-6"
                                                        name="kelas" data-placeholder="Pilih Kelas"
                                                        onchange="getkelas()">
                                                        <option value="">Pilih...</option>
                                                        @foreach ($kelas as $k)
                                                            <option value="{{ $k->id }}">{{ $k->kelas }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class=" w-full">
                                                    <label for="jurusan"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                                    <input type="text" id="jurusan" name="jurusan"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan jurusan disini ..."
                                                        value="{{ old('jurusan') }}" readonly />
                                                </div>
                                                <div class=" w-full">
                                                    <label for="tingkat"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Tingkat
                                                    </label>
                                                    <select class="js-example-placeholder-single js-states form-control"
                                                        name="tingkat" data-placeholder="Pilih Tingkat">
                                                        <option value="">Pilih...</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                            @foreach ($stu_data as $index => $s)
                                                <input type="hidden" value="{{ $s->nim }}"
                                                    name="id{{ $index + 1 }}">
                                            @endforeach

                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                                <thead
                                                    class="text-md font-bold text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">NO
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">NIM</th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NAMA</th>
                                                        <th scope="col" class="px-6 py-3 text-center ">NO
                                                            HP</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($stu_data as $index => $m)
                                                        <tr
                                                            class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                            <td class="px-6 py-4 text-center bg-gray-100">
                                                                {{ $index + 1 }}</td>
                                                            <td
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $m->nim }}</td>
                                                            <td class="px-6 py-4 bg-gray-100">{{ $m->nama }}</td>
                                                            <td class="px-6 py-4 ">{{ $m->no_hp }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-4">
                                            {{ $stu_data->links() }}
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
    <script>
        const getkelas = async () => {
            var selectedOption = document.querySelector('[name="kelas"] option:checked');
            var jurusanId = selectedOption.value;

            if (jurusanId) {
                await axios.get(`/api/kelas/${jurusanId}`)
                    .then((response) => {
                        const data = response.data;
                        if (data && data.kelas) {
                            document.getElementById('jurusan').value = data.kelas.jurusan.jurusan;
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                document.getElementById('jurusan').value = '';
            }
        };
    </script>
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

                // Check if all checkboxes are selected to set the state of the "Select All" checkbox
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
        });
    </script>
</x-app-layout>
