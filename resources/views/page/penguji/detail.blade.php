<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            <div class="flex items-center">Mahsiswa<i class="fi fi-rr-caret-right mt-1"></i> <span
                    class="text-red-500">Detail Mahaiswa</span></div>
        </h2>
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
                                    <div>DATA MAHASISWA</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-4 pt-6" style="width:100%;overflow-x:auto;">
                                    <form action="{{ route('penguji.pengujiAdd') }}" method="POST" class="formupdate">
                                        @csrf
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="mb-2 lg:mb-0 p-2 bg-sky-400 text-white rounded-xl">
                                                SUBMIT
                                            </button>
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
                                                        <th scope="col" class="px-6 py-3 text-center">NIM</th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            NAMA</th>
                                                        <th scope="col" class="px-6 py-3 text-center">PEMBIMBING</th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            PROGRAM STUDI</th>
                                                        <th scope="col" class="px-6 py-3 text-center">JUDUL</th>
                                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                            PENGUJI</th>
                                                        <th scope="col" class="px-6 py-3 text-center">TANGGAL SIDANG
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">WAKTU</th>
                                                        <th scope="col" class="px-6 py-3 text-center">RUANG</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($stu_data as $index => $m)
                                                        <tr
                                                            class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                            <td
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $m->nim }}
                                                                <input type="hidden" value="{{$m->nim}}" name="nim[]">
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">{{ $m->nama }}</td>
                                                            <td class="px-6 py-4">{{ $m->nama_dosen }}<input type="hidden" value="{{$m->idDosen}}" name="id_dosen[]"></td>
                                                            <td class="px-6 py-4 bg-gray-100">{{ $m->jurusan }}</td>
                                                            <td class="px-6 py-4">{{ $m->judul }}</td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                <div class=" w-full">
                                                                    <select
                                                                        class="js-example-placeholder-single js-states form-control"
                                                                        name="id_penguji[]"
                                                                        data-placeholder="Pilih Penguji">
                                                                        <option value="">Pilih...</option>
                                                                        @foreach ($penguji as $p)
                                                                            <option value="{{ $p->id_dosen }}">
                                                                                {{ $p->dosen->nama_dosen }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                <input type="date" id="tgl_sidang" name="tgl_sidang[]"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    placeholder="Masukan Nama kelas disini ..."
                                                                    required />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                <div class="flex flex-col space-y-4">
                                                                    <label for="start_time"
                                                                        class="block text-sm font-medium text-gray-900 dark:text-white">
                                                                        Waktu Mulai
                                                                    </label>
                                                                    <input type="time" id="start_time"
                                                                        name="start_time[]"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required />

                                                                    <label for="end_time[]"
                                                                        class="block text-sm font-medium text-gray-900 dark:text-white">
                                                                        Waktu Selesai
                                                                    </label>
                                                                    <input type="time" id="end_time" name="end_time[]"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required />
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-100">
                                                                <div class=" w-full">
                                                                    <select
                                                                        class="js-example-placeholder-single js-states form-control"
                                                                        name="id_ruang[]"
                                                                        data-placeholder="Pilih Ruang">
                                                                        <option value="">Pilih...</option>
                                                                        @foreach ($ruang as $p)
                                                                            <option value="{{ $p->id }}">
                                                                                {{ $p->ruang }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
